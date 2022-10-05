<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendeez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" style="color: white">Vendeez</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex: inherit">

            <form class="d-flex" role="search" action="/search" method="get">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <form class="d-flex" role="logout">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard" style="color: white">Login</a>
                    </li>
                </ul>

            </form>

        </div>
    </div>
</nav>
{{--<div class="algin-class">--}}
{{--<div>--}}
{{--    <h3>{{$product['name']}}</h3>--}}
{{--</div>--}}
{{--<div class="container text-center" style="margin-bottom: 20px">--}}
{{--    <img src="{{$product['image']}}" class="rounded mx-auto d-block" alt="...">--}}
{{--</div>--}}
{{--<div>--}}
{{--    <h5>--}}
{{--        Price {{$product['price']}}--}}
{{--    </h5>--}}
{{--    <h6>--}}
{{--        Details: {{$product['description']}}--}}
{{--    </h6>--}}
{{--</div>--}}
{{--</div>--}}

<div class="container container2">
    <div class="card card-size card-shadow">
        <div class="row">
            <div class="col-4">
                <img src="{{$product['image']}}" class="card-img-top img-size2" alt="...">
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h4 class="card-title title-f1">{{$product['name']}}</h4>
                    <h6 class="card-title title-f2">Price: Rs.{{$product['price']}}</h6>
                    <p class="card-text title-f3">Detail: {{$product['description']}}</p>
                </div>

            </div>
        </div>
    </div>

</div>
</body>
</html>
