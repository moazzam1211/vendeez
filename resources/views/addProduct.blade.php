@extends('layouts.admin-layout')
@section('content')
    <div style="margin-left: 50px; margin-top: 20px; margin-right: 50px">
        <h2 style="color: #0A6EFD">Add New Product</h2>
    </div>
<div class="card" style="margin: 50px">
    <div class="card-body" style="background: #4f9aff">
        <div class="container">
            <form class="row g-3" action="/add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputName" class="form-label" style="color: white">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="inputName" placeholder="enter product name">
                    <span style="color: red">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="col-md-2">
                    <label for="inputPrice" class="form-label" style="color: white">Price</label>
                    <input type="text" name="price" value="{{old('price')}}" class="form-control" id="inputPrice" placeholder="Rs.100">
                    <span style="color: red">@error('price'){{$message}}@enderror</span>
                </div>
                <div class="col-md-1">
                    <label for="inputQty" class="form-label" style="color: white">Quantity</label>
                    <input type="number" min="1" max="" name="qty" value="{{old('qty')}}" class="form-control" id="inputQty" placeholder="123">
                    <span style="color: red">@error('qty'){{$message}}@enderror</span>
                </div>
                <div class="col-md-6">
                    <label for="inputDes" class="form-label" style="color: white">Description</label>
                    <textarea type="text" name="description" class="form-control" id="inputDes"
                           placeholder="enter product description">{{old('description')}}</textarea>
                    <span style="color: red">@error('description'){{$message}}@enderror</span>
                </div>

                <label for="inputDes" class="form-label" style="color: white">Select an Image</label>
                <input type="file" name="img" value="{{old('image')}}">
                <span style="color: red">@error('image'){{$message}}@enderror</span>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" style="margin-top: 15px">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
