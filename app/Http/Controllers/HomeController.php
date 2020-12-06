<?php

namespace App\Http\Controllers;

use App\Product;
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
        if($request->search != null){
            $search = $request->search;
            $products = Product::where('name', 'LIKE', '%'.$search.'%');
            return view('home',compact('products'));
        }else{
            $products = Product::paginate(6);
            return view('home',compact('products'));
        }
    }
}
