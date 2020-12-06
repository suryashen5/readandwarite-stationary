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
                                <img class="card-img-top image" src="{{ asset('storage/images/product/fabercastell.jpg')}}" alt="Card image cap">
                            </div>
                            <div class="col col-sm">
                                <h3>Stationary Name: </h3>
                                <h3>Stationary Price: </h3>
                                <h3>Stationary Stock: </h3>
                                <h3>Stationary Type: </h3>
                                <h3>Description: </h3>
                                <div class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-1" type="number" placeholder="Quantity">
                                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Update cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
