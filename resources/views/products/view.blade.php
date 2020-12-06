@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col col-sm">
                                <img class="card-img-top image" src="{{ asset('storage/images/'.$product->image)}}" alt="No image">
                            </div>
                            <div class="col col-sm">
                                <h3>Stationary Name: {{$product->name}}</h3>
                                <h3>Stationary Price: {{$product->price}}</h3>
                                <h3>Stationary Stock: {{$product->stock}}</h3>
                                <h3>Stationary Type: {{$product->stationaryType->name}}</h3>
                                <h3>Description: {{$product->description}}</h3>
                                @if(!Auth::guest() && Auth::user()->role_id == 1)
                                <form action="{{ route('product.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    <a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                </form>
                                @elseif(!Auth::guest() && Auth::user()->role_id == 2)
                                <div class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-1" type="number" placeholder="Quantity">
                                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Add to cart</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
