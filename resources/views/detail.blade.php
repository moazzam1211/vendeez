@extends('layouts.appLayout')
@section('content')
    <div class="container container2">
        <a href="/" style="font-size: medium">Go Back</a>
    </div>
    <div class="container container2">
        <div class="card card-shadow">
            <div class="row">
                <div class="col-3">
                    <img src="{{$product['image']}}" class="card-img-top img-size2" alt="...">
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <h4 class="card-title title-f1">{{$product['name']}}</h4>
                        <h6 class="card-title title-f2">Price: Rs.{{$product['price']}}</h6>
                        <p class="card-text title-f3">Detail: {{$product['description']}}</p>
                        <div>
                            <a href="/cart" class="btn btn-primary edit-button container2 disabled">Add to Cart</a>
                            <br>
                            <a href="/login">Login add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
