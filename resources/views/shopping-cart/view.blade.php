@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="container">
                        @if (count($carts)>0)
                            @foreach ($carts as $cart)
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item">
                                    <h5>Stationary Name: {{$cart->product->name}}</h5>
                                    <ul>
                                        <li>Stationary Price: {{$cart->product->price}}</li>
                                        <li>Quantity: {{$cart->quantity}}</li>
                                    </ul>
                                  </li>
                                  <li class="list-group-item">
                                    <h6>Total: {{$cart->total}} </h6>
                                    <form action="{{route('cart.destroy', $cart->id)}}" method="post">
                                        <a href="{{route('cart.edit', $cart->id)}}" class="btn btn-primary">Edit Item</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete Item</button>
                                    </form>
                                  </li>
                                </ul>
                            </div>
                            @endforeach
                            <a href="{{route('transaction.checkout')}}" class="btn btn-danger">Checkout</a>
                        @else
                            <h5 class="card-title">Do some transaction to see your product in cart</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
