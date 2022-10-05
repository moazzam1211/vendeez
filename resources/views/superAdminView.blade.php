<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body style="background: white">
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard" style="color: white">Vendeez</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" style="color:white" href="/dashboard">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="/products" style="color: white">Products</a>
            </li>
        </ul>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex: inherit">

            {{--            <form class="d-flex" role="search" action="/search2" method="get">--}}
            {{--                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">--}}
            {{--                <button class="btn btn-outline-light" type="submit">Search</button>--}}
            {{--            </form>--}}
            <form class="d-flex" role="logout">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/logout" style="color: white">Logout</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
{{--<div class="container">--}}
{{--    <div style="text-align: right">--}}
{{--        <a href="/add" class="btn btn-primary card-shadow" style="margin-top: 20px">Add Product</a>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="container container2">
    <div class="card card-shadow" style="padding: 1%">
        <table class="table tb-1" border="1">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user->role->role}}</td>
                    <td>
                        <a href="/edit2/{{$user['id']}}" class="btn btn-outline-primary">Edit</a>
                        <form action="/delete/" method="post" style="display: inline-block; margin-left: 2%">
                            @csrf

                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="container text-center container2">

    {{--    {{$product->links()}}--}}
</div>
</body>
{{--<style>--}}
{{--    .w-5 {--}}
{{--        display: none;--}}
{{--    }--}}
{{--</style>--}}
</html>
