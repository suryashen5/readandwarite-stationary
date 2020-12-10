<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $products = Product::where('name', 'LIKE', '%'.$search.'%')->get();
            return view('home',compact('products'));
        }else{
            $products = Product::all();
            return view('home',compact('products'));
        }
    }

    public function welcome()
    {
        $types = DB::table('stationary_types')
                ->leftJoin('products', 'stationary_types.id', '=', 'products.stationary_type_id')
                ->leftJoin('detail_transactions', 'products.id', '=', 'detail_transactions.product_id')
                ->select('stationary_types.id', DB::raw('SUM(detail_transactions.quantity) as total'), 'stationary_types.image')
                ->groupBy('stationary_types.id','stationary_types.image')
                ->orderByDesc('total')
                ->take(4)
                ->get();

        return view('welcome',compact('types'));
    }

    public function show($id)
    {
        $products = Product::where('stationary_type_id', 'LIKE', $id)->get();
        return view('home',compact('products'));
    }
}
