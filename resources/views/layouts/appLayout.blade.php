<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendeez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
@php
    if(Auth()->user()) {
        $item = \App\Models\Cart::where('user_id', Auth()->user()->id)->count();
    }
@endphp
<body style="background: white;">
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" style="color: white; margin-left: 1%;">Vendeez</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex: inherit">
            @if(\Auth()->user() && \Auth()->user()->role_id == 2)
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="margin: -55%">
                        @if(\Auth()->user())
                            <div>
                                <a type="submit" href="/checkout" class="btn-outline-light position-relative">
                                    <i class="bi bi-cart3 bi-lg"
                                       style="color: white; margin: -40%; font-size: 130%"></i>
                                    @if($item != 0)
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge bg-danger border rounded-pill"
                                            style="font-size: x-small">
                                   {{$item}}
                                </span>
                                    @endif
                                </a>
                            </div>
                        @endif
                    </li>
                </ul>
            @endif
            @if(\Auth()->user() && (\Auth()->user()->role_id == 1 || \Auth()->user()->role_id == 3))
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="/admin-panel"
                           style="color: white">Admin</a>
                    </li>
                </ul>
            @endif
            <form class="d-flex" role="logout">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @if(\Auth()->user())
                            <a class="nav-link active" aria-current="page" href="/logout"
                               style="color: white">Logout</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="/login" style="color: white">Login</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(Auth()->user() && Auth()->user()->role_id == 2)
                            <a class="nav-link active" aria-current="page"
                               style="color: white; text-align: center; font-weight: bold">
                                {{Auth()->user()->name}}</a>
                        @endif
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
