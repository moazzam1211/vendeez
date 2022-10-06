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
                            @if(Auth()->user() && Auth()->user()->role_id == 2)
                                <a href="/cart" class="btn btn-primary edit-button container2 ">Add to Cart</a>
                            @elseif(Auth()->user() && (Auth()->user()->role_id == 3 || Auth()->user()->role_id == 1))
                                <a href="/edit/{{$product['id']}}" class="btn btn-primary edit-button">Edit</a>
                                <form action="/delete/{{$product['id']}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @else
                                <div>
                                    <a href="/login">Login add to cart</a>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
