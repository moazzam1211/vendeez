@extends('layouts.admin-layout')
@section('content')
<div class="container" style="margin-top: 80px; font-weight: bold">
    <h2 style="color: #0A6EFD">Edit {{$data['name']}}</h2>
</div>
<div class="container" style="width: 65%;">
    <div class="card card-shadow" style="margin-top: 30px">
        <div class="card-body" style="background: gray">
            <div class="container container2">
                <form class="row g-3" action="/update2/{{$data['id']}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="inputName" class="form-label" style="color: white">Name</label>
                        <input type="text" name="name" class="form-control"
                               value="{{$data['name']}}" id="inputName"
                               placeholder="Enter your name">
                    </div>
                    <div>
                        <label for="inputEmail" class="form-label" style="color: white">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{$data['email']}}" id="inputPrice"
                               placeholder="Enter your email">
                    </div>

                    <div>
                        <select class="form-select" name="role" aria-label="Default select example">
                            <option selected>Select role</option>
                            @foreach($roles as $role)
                                <option
                                    value="{{$role->id}}" {{$data->role_id == $role->id ? 'selected' : ''}}>{{$role->role}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-light" style="margin-top: 15px">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
