<?php

namespace App\Http\Controllers;

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
    function products()
    {
        $product = Product::paginate(6);
        return view('admin', compact('product'));
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
        $product = Product::paginate(6);
        return view('admin', compact('product'));
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
        $data = Product::find($id);
        return view('/updateProduct', ['data' => $data]);
    }

    function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $image = $request->file('img');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $product->image = '/images/' . $name;
        $product->update();
        return redirect('/dashboard');
    }

    function search(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->search . "%")->paginate(6);
        return view('products', ['product' => $data]);
    }

    function AdminProductSearch(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->search . "%")->paginate(6);
        return view('admin', ['product' => $data]);
    }



    function detail($id){
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }
    function productDetail($id){
        $data = Product::find($id);
        return view('productDetail',['product'=>$data]);
    }
    function cart($id,  Request $request){
        $data = Product::find($id);
        if ($data) {
            $data->qty--;
            $data->update();
        }
//        return view('cart',['product'=>$data]);
    }

}
