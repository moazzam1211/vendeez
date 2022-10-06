@extends('layouts.admin-layout')
@section('content')
<div class="container container2" style="margin-top:80px">
    <div class="searchbar">
        <form class="d-flex" role="search" action="/user-search" method="get">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
    <div class="card card-shadow" style="padding: 1%; margin-top: 2%; background: gray">
        <table class="table tb-1" border="1">
            <thead>
            <tr>
                <th scope="col" style="color: white">ID</th>
                <th scope="col" style="color: white">Name</th>
                <th scope="col" style="color: white">Email</th>
                <th scope="col" style="color: white">Role</th>
                <th scope="col" style="color: white">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td style="color: white">{{$user['id']}}</td>
                    <td style="color: white">{{$user['name']}}</td>
                    <td style="color: white">{{$user['email']}}</td>
                    <td style="color: white">{{$user->role ? $user->role->role : ''}}</td>
                    <td style="color: white">
                        <a href="/user-edit/{{$user['id']}}" class="btn btn-outline-light">Edit</a>
                        <form action="/delete/" method="post" style="display: inline-block; margin-left: 2%">
                            @csrf
                            @if(Auth()->user()->role_id == 3)
                            <button type="submit" class="btn btn-outline-danger" >Delete</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
