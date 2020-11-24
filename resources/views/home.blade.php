@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(!Auth::guest() && Auth::user()->role_id == 1)
            <div class="mb-3">
                <a class="btn btn-primary" href="#" role="button">Add New Stationary</a>
                <a class="btn btn-primary" href="#" role="button">Add New Stationary Type</a>
                <a class="btn btn-primary" href="#" role="button">Edit Stationary Type</a>
            </div>
            @endif
            <div class="card bg-light">
                <div class="card-header">Home</div>
                <div class="card-body">
                    <div class="container">
                        <div class="d-flex flex-wrap justify-content-between">
                            {{-- foreach --}}
                            <div class="card text-white bg-dark" style="width: 16rem;">
                                <img class="card-img-top image" src="{{ asset('storage/images/product/fabercastell.jpg')}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">pensil</h5>
                                    <a href="#" class="btn btn-secondary">LIHAT FILM</a>
                                </div>
                            </div>
                            {{-- pagination --}}
                            {{-- {{ $episodes->links() }} --}}
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
