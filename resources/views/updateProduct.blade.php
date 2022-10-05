@extends('layouts.admin-layout')
@section('content')
    <div class="container" style="margin-top: 70px; font-weight: bold">
        <h2 style="color: #0A6EFD">Edit {{$data['name']}}</h2>
    </div>
<div class="card card-shadow" style="margin-left: 50px; margin-right: 50px; margin-top: 10px">
    <div class="card-body" style="background: gray">
        <div class="container">
            <form class="row g-3" action="/update/{{$data['id']}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputName" class="form-label" style="color: white">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{$data['name']}}" id="inputName"
                           placeholder="enter product name">
                </div>
                <div class="col-md-2">
                    <label for="inputPrice" class="form-label" style="color: white">Price</label>
                    <input type="text" name="price" class="form-control"
                           value="{{$data['price']}}" id="inputPrice"
                           placeholder="Rs.100">
                </div>
                <div class="col-md-1">
                    <label for="inputQty" class="form-label" style="color: white">Quantity</label>
                    <input type="number" name="qty" class="form-control" value="{{$data['qty']}}"
                           id="inputQty" min="1" max=""
                           placeholder="123">
                </div>
                <div class="col-md-6">
                    <label for="inputDes" class="form-label" style="color: white">Description</label>
                    <textarea type="text" name="description" class="form-control"
                           id="inputDes" placeholder="enter product description">{{$data['description']}}</textarea>
                </div>

                <label for="inputDes" class="form-label" style="color: white">Select an Image</label>
                <input type="file" name="img">

                @if($data['image'])
                    <div style="width: 60%; height: 40%;">
                        <img src="{{$data['image']}}" class="card-img-top " style="width: 15%;" alt="...">
                    </div>
                @else{
                @error('image'){{$message}}@enderror
                }
                @endif
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" style="margin-top: 15px">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
