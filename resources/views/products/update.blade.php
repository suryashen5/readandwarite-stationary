@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="container">
                        <form action="{{route('product.update', $product->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $messages)
                                    <li>{{$messages}}</li>
                                @endforeach
                                </ul>
                                </div>
                            @endif
                            <div class="form-group col-12">
                                <input class="form-control" type="text" placeholder="Name" name="name" value="{{$product->name}}">
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="text" placeholder="Description" name="description" value="{{$product->description}}">
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="text" placeholder="Price" name="price" value="{{$product->price}}">
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="number" placeholder="Stock" name="stock" value="{{$product->stock}}">
                            </div>
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">Update Stationary Data</button>
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
