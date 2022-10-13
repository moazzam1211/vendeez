<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $product = Product::orderBy('created_at', 'desc');
        $categories = Categories::all();
//        $item = Cart::all();
//        if(Auth()->user()) {
//            $item = $item->where('user_id', Auth()->user()->role_id)->count();
//        }
        if ($request->search) {
            $product = $product->where('name', 'like', '%' . $request->search . "%");
        }
        if ($request->filter && $request->filter != 'all') {
            $product = $product->where('category_id', $request->filter);
        }
        $product = $product->paginate(6);
        return view('dashboard', compact('product', 'categories'));
    }
}
