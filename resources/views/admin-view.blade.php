@extends('layouts.admin-layout')
@section('content')
    <div class="container text-center container2" style="margin-top:80px">
        <div class="row">
            @foreach($product as $item)
                <div class="col-md-4 product-card ">
                    <a href="/detail/{{$item['id']}}" class="f2" style="text-decoration: none">
                        <div class="card card-size card-shadow">
                            <div class="card-image ">
                                <img src="{{$item['image']}}" class="card-img-top img-s" alt="...">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title f2" style="color: black">{{$item['name']}}</h4>
                                <h6 class="card-title f1">Price: Rs.{{$item['price']}}</h6>
                                <p class="card-text f1 ">Detail: {{$item['description']}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="links-pagination">
            {{$product->links()}}
        </div>
    </div>
@endsection
