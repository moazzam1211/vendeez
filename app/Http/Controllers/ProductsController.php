<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    function addProduct()
    {
        return view('addProduct');
    }

    function store(Request $request)
    {
        $rules = array(
            'name' => 'required | max:225',
            'price' => 'required',
            'qty' => 'required',
            'description' => 'required',
            'image' => 'required'

        );
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return Redirect::back()->withErrors($validate->errors())->withInput($request->all());
        }
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
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
        return view('productDetail', ['product' => $data]);
    }

    function cart($id, Request $request)
    {
        $data = Product::find($id);
        if ($data) {
            $data->qty--;
            $data->update();
        }
//        return view('cart',['product'=>$data]);
    }

    function categories()
    {
        return Categories::all();
    }

}
