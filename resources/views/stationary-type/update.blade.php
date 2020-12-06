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
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Stationary Type Name</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$type->name}}</td>
                                    <td class="d-flex m-0">
                                        <form action="{{route('type.update', $type->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <div class="form-group col-12 d-flex m-0 pr-2">
                                                <input class="form-control mr-2" type="text" placeholder="Name" name="name">
                                                <button class="btn btn-primary my-2 my-sm-0" type="submit">Update</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('type.destroy', $type->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mr-0" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
