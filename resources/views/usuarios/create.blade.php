@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/usuarios" method="post">
        @csrf

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="select">Rol</label>
                    <select name="rol" class="form-control">
                        <option selected disabled>elige un rol para el usuario</option>
                        @foreach ($roles as $rol)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection
