@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(!Auth::guest() && Auth::user()->role_id == 1)
            <div class="mb-3">
                <a class="btn btn-primary" href="{{route('product.create')}}" role="button">Add New Stationary</a>
                <a class="btn btn-primary" href="{{route('type.create')}}" role="button">Add New Stationary Type</a>
                <a class="btn btn-primary" href="{{route('type.index')}}" role="button">Edit Stationary Type</a>
            </div>
            @endif
            <div class="card bg-light">
                <div class="card-header">Home</div>
                <div class="card-body">
                    <div class="container">
                        <div class="d-flex flex-wrap justify-content-between">
                            @if (count($products)>0)
                                @foreach ($products as $product)
                                <div class="card text-white bg-dark mb-3" style="width: 18rem;">
                                    <a href="{{route('product.show', $product->id)}}">
                                        <img class="card-img-top image" src="{{ asset('storage/images/'.$product->image)}}" alt="No image">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <h5 class="card-details">{{ $product->description }}</h5>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <h5 class="card-title">There's no product match with the keyword</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
