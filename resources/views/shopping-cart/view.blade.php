@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="container">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                <h5>Stationary Name: </h5>
                                <ul>
                                    <li>Stationary Price: </li>
                                    <li>Quantity: </li>
                                </ul>
                              </li>
                              <li class="list-group-item">
                                  <h6>Total: </h6>
                                  <a class="btn btn-primary" href="#" role="button">Edit Item</a>
                                  <a class="btn btn-danger" href="#" role="button">Delete Item</a>
                              </li>
                            </ul>
                          </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
