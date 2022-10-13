@extends('layouts.appLayout')
@section('content')
    <div style="text-align: center;">
        <img src="/images/Banner.png" width="700" height="50"
             class="img-fluid" alt="...">
    </div>
    <div class="container text-center container2">
        <div class="row" style="margin-bottom: 5%">
            <div class="col-6" style="margin-left: 25%">
                <form role="search" action="/" method="get">
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
        </div>
        <div class="row">
            @foreach($product as $prod)
                <div class="col-md-4 product-card ">
                    <a href="/productDetail/{{$prod['id']}}" class="f2" style="text-decoration: none">
                        <div class="card card-size card-shadow" style="background: mintcream;">
                            <div class="card-image ">
                                <img src="{{$prod['image']}}" class="card-img-top img-s" alt="...">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title f2" style="color: black">{{$prod['name']}}</h4>
                                <h6 class="card-title f1">Price: Rs.{{$prod['price']}}</h6>
                                <p class="card-text f1 ">Detail: {{$prod['description']}}</p>
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
