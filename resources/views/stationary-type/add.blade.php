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
                            <div class="col">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Stationary Type Name</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($types as $type)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$type->name}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                            <div class="col">
                                <form action="{{route('type.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-12">
                                        <input type="file" class="form-control-file" name="image-file" id="image-file">
                                    </div>
                                    <div class="form-group col-12">
                                        <input class="form-control" type="text" name="name" placeholder="Stationary Type">
                                    </div>
                                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Add Stationary Type</button>
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
