@extends('layouts.admin-layout')
@section('content')
<div class="container container2" style="margin-top:80px">
        <div class=" " style="column-count: 2; margin-left: 25%">
            <form class="d-flex" role="search" action="/product-search" method="get">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <div class="" style="text-align: left;">
                <a href="/add" class="btn btn-primary" style="margin-left: 71%">Add Product</a>
            </div>
        </div>
</div>
<div class="container text-center container2">
    <div class="row">
        @foreach($product as $item)
            <div class="col-md-4 product-card">
                <div class="card card-size-2 card-shadow">
                    <div class="card-image">
                        <img src="{{$item['image']}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title f2">{{$item['name']}}</h4>
                        <h6 class="card-title f1">Price: Rs.{{$item['price']}}</h6>
                        <h6 class="card-title f1">Qty: {{$item['qty']}}</h6>
                        <p class="card-text f1">Detail: {{$item['description']}}</p>
                        <a href="/edit/{{$item['id']}}" class="btn btn-primary edit-button">Edit</a>
                        <form action="/delete/{{$item['id']}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
            <div class="links-pagination">
                {{$product->links()}}
            </div>
@endsection
