@extends('layouts.admin-layout')
@section('content')
<div class="container container2" style="margin-top:80px">
    <div class="searchbar">
        <form class="d-flex" role="search" action="/user-search" method="get">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
    <div class="card card-shadow" style="padding: 1%; margin-top: 2%">
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
                    <td>{{$user->role ? $user->role->role : ''}}</td>
                    <td>
                        <a href="/edit2/{{$user['id']}}" class="btn btn-outline-primary">Edit</a>
                        <form action="/delete/" method="post" style="display: inline-block; margin-left: 2%">
                            @csrf
                            @if($user->role_id == 1)
                            <button type="submit" class="btn btn-outline-danger" style="visibility: hidden">Delete</button>
                            @elseif($user->role_id ==3)
                                <button type="submit" class="btn btn-outline-danger" style="visibility: visible">Delete</button>
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
