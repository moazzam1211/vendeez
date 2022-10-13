@extends('layouts.admin-layout')
@section('content')
    <div class="container container2" style="margin-top:80px">

        <div class="row">
            <div class="col-6" style="margin-left: 25%">
                <form role="search" action="/products" method="get">
                    <div class="col-7" style="display: inline-flex">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search"
                               aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                    <div class="col-4" style="display: inline-flex">
                        <select class="form-select" name="filter" id="filter" aria-label="Default select example"
                                onchange="this.form.submit()">
                            <option value="" selected disabled>Select Category</option>
                            <option value="all">All</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}">{{$category->category}}
                                </option>
                            @endforeach
                        </select>
                        <script type="text/javascript">
                            document.getElementById('filter').value = "<?php echo $_GET['filter'] ?? '';?>";
                        </script>
                    </div>
                </form>
            </div>
            <div class="col-3" style="text-align: end">
                <a href="/add" class="btn btn-primary flex-fill">Add Product</a>
            </div>
        </div>
    </div>
    <div class="container text-center container2">
        <div class="row">
            @foreach($product as $item)
                <div class="col-md-4 product-card">
                    <div class="card card-size-2 card-shadow" style="background: mintcream;">
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
