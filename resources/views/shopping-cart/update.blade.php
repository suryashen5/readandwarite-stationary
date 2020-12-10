@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="container">
                        @if($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all() as $messages)
                                <li>{{$messages}}</li>
                            @endforeach
                            </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col col-sm">
                                <img class="card-img-top image" src="{{ asset('storage/images/'.$cart->product->image)}}" alt="No image">
                            </div>
                            <div class="col col-sm">
                                <h3>Stationary Name: {{$cart->product->name}}</h3>
                                <h3>Stationary Price: {{$cart->product->price}}</h3>
                                <h3>Stationary Stock: {{$cart->product->stock}}</h3>
                                <h3>Stationary Type: {{$cart->product->stationaryType->name}}</h3>
                                <h3>Description: {{$cart->product->description}}</h3>
                                <form action="{{ route('cart.update', $cart->id)}}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-1" type="number" name="quantity" placeholder="Quantity" value="{{$cart->quantity}}">
                                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Update cart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
