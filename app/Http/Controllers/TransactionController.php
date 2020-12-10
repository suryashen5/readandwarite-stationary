<?php

namespace App\Http\Controllers;

use App\Cart;
use App\DetailTransaction;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function checkout(){
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);

        $carts = Cart::where('user_id', Auth::user()->id)->get();

        foreach($carts as $cart){
            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product->id,
                'quantity' => $cart->quantity,
                'subtotal' => $cart->quantity * $cart->product->price
            ]);

            $product = Product::findOrFail($cart->product->id);
            $product->update([
                'stock' => $product->stock - $cart->quantity,
            ]);

            $cart->delete();
        };

        return redirect('/transaction-history');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        $detailTransactions = DetailTransaction::all();

        foreach($transactions as $transaction){
            foreach($detailTransactions as $dt){
                if($dt->transaction_id == $transaction->id){
                    $transaction->total += $dt->subtotal;
                }
            }
        }

        return view('transactions.view',compact('transactions','detailTransactions'));
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
