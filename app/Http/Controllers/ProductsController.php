<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\User;
use App\Models\Categories;

//use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use MongoDB\Driver\Session;

class ProductsController extends Controller
{
    function addProduct()
    {
        $categories = Categories::all();
        return view('addProduct', ['categories'=>$categories]);
    }

    function store(Request $request)
    {
        $rules = array(
            'name' => 'required | max:225',
            'price' => 'required',
            'qty' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required'

        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return Redirect::back()->withErrors($validate->errors())->withInput($request->all());
        }
        $categories = Categories::all();
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $image = $request->file('img');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $product->image = '/images/' . $name;
        $product->save();
        return redirect('/');
    }

    function products(Request $request)
    {
        $categories = Categories::all();
        $product = Product::orderBy('created_at', 'desc');
        if ($request->search) {
            $product = $product->where('name', 'like', '%' . $request->search . "%");
        }
        if ($request->filter && $request->filter != 'all') {
            $product = $product->where('category_id', $request->filter);
        }
        $product = $product->paginate(6);
        return view('admin', compact('product', 'categories'));

    }

    function userHome()
    {
        $product = Product::paginate(6);
        return view('products', compact('product'));
    }

    function admin()
    {
        $product = Product::paginate(6);
        return view('adminPanel', compact('product'));
    }

    function adminPanel()
    {
        return redirect('/products');
    }


    function show()
    {
        $data = Product::paginate(6);
        return view('dashboard', ['product' => $data]);
    }

    function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect('/admin');
    }


    function edit($id)
    {
        $categories = Categories::all();
        $data = Product::find($id);
        return view('/updateProduct', ['data' => $data, 'categories' => $categories]);
    }

    function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $image = $request->file('img');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $product->image = '/images/' . $name;
        $product->update();
        return redirect('/products');
    }

    function search(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->search . "%")->paginate(6);
        return view('dashboard', ['product' => $data]);
    }

    function AdminProductSearch(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->search . "%")->paginate(6);
        return view('admin', ['product' => $data]);
    }


    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }

    function productDetail($id)
    {
        $data = Product::find($id);
        $item = Cart::all();
        $item = $item->where('user_id', Auth()->user()->role_id)->count();
        return view('productDetail', ['product' => $data, 'item' => $item]);
    }

    function cart($id, Request $request)
    {
        $cart = Cart::where('product_id', $id)->where('user_id', Auth()->user()->id)->first();
        if (!$cart) {
            $data = Product::find($id);
            $item = new Cart();
            $item->product_id = $data->id;
            $item->product_qty++;
            $item->user_id = Auth()->user()->id;
            $item->save();
        } else {
            $cart->product_qty++;
            $cart->update();
        }
        return redirect('/checkout');
    }

    function categories()
    {
        return Categories::all();
    }

    function checkout()
    {
        $data = Cart::where('user_id', Auth()->user()->id)->get();
        return view('/cart', ['products' => $data]);
    }

    function removeFromCart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect('/checkout');
    }

    function checkoutProducts(Request $request)
    {
        if (isset($request->selectItem)) {
            foreach ($request->selectItem as $value) {
                $cart_item = Cart::find($value);
                if ($cart_item) {
                    $product = Product::find($cart_item->product_id);
                    if ($product) {
                        $checkout_item = new Checkout();
                        $checkout_item->product_id = $product->id;
                        $checkout_item->product_qty = $request['qty-' . $value];
                        $checkout_item->product_price = $product->price;
                        $checkout_item->total_price = $product->price * $request['qty-' . $value];
                        $checkout_item->user_id = Auth()->user()->id;
                        $checkout_item->save();
                        $product->qty = $product->qty - $request['qty-' . $value];
                        $product->update();
                    }
                    $cart_item->delete();
                }
            }
        }
        return redirect('/checkout');
    }
}
