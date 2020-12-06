<?php

namespace App\Http\Controllers;

use App\Product;
use App\StationaryType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = StationaryType::all();
        return view('products.add',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image-file' => 'required|image',
            'name' => 'required|unique:products|min:5',
            'description' => 'required|min:10',
            'stationary_type_id' => 'required',
            'price' => 'required|numeric|min:5001',
            'stock' => 'required|numeric|min:1',
        ]);

        $file = $request->file('image-file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/product', $filename);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'stationary_type_id' => $request->stationary_type_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => 'product/'.$filename
        ]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.view',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.update',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|unique:products|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:5001',
            'stock' => 'required|numeric|min:1',
        ]);

        Product::findOrFail($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock
        ]);
        return redirect('/product/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/home');
    }
}
