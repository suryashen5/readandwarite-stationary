<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        foreach($carts as $cart){
            $cart->total = $cart->quantity * $cart->product->price;
        }

        return view('shopping-cart.view',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $product = Product::findOrFail($id);
        if($product->stock <= 0){
            return redirect('/product/'.$id)->withErrors(['Out of stock']);
        }

        if(Cart::where('product_id', '=', $id)->where('user_id', '=', Auth::user()->id)->exists()){
            Cart::where('product_id', '=', $id)->where('user_id', '=', Auth::user()->id)->update([
                'quantity'=>$request->quantity,
            ]);
        }else{
            Cart::create([
                'quantity' => $request->quantity,
                'product_id' => $id,
                'user_id' => Auth::user()->id
            ]);
        }
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Cart::findOrFail($id);
        return view('shopping-cart.update',compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        Cart::findOrFail($id)->update([
            'quantity' => $request->quantity,
        ]);
        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carts = Cart::findOrFail($id);
        $carts->delete();

        return redirect('/cart');
    }
}
