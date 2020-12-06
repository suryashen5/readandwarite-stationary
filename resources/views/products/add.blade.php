@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="container">
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
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
                                <input type="file" class="form-control-file" name="image-file" id="image-file">
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="text" name="description" placeholder="Description">
                            </div>
                            <div class="form-group col-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="select-type">Types</label>
                                    </div>
                                    <select class="custom-select" id="select-type" name="stationary_type_id">
                                      @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="text" name="price" placeholder="Price">
                            </div>
                            <div class="form-group col-12">
                                <input class="form-control" type="number" name="stock" placeholder="Stock">
                            </div>
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">Add Stationary Data</button>
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
