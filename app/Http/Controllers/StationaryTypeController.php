<?php

namespace App\Http\Controllers;

use App\StationaryType;
use Illuminate\Http\Request;

class StationaryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = StationaryType::all();
        return view('stationary-type.update',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = StationaryType::all();
        return view('stationary-type.add',compact('types'));
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
            'name' => 'required|unique:stationary_types',
            'image-file' => 'required|image'
        ]);

        $file = $request->file('image-file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/type', $filename);

        StationaryType::create([
            'name' => $request->name,
            'image' => 'type/'.$filename
        ]);

        return redirect('/type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StationaryType  $stationaryType
     * @return \Illuminate\Http\Response
     */
    public function show(StationaryType $stationaryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StationaryType  $stationaryType
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StationaryType  $stationaryType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:stationary_types'
        ]);

        StationaryType::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect('/type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StationaryType  $stationaryType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = StationaryType::findOrFail($id);
        $type->delete();

        return redirect('/type');
    }
}
