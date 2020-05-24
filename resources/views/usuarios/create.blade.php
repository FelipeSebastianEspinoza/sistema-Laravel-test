@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            @if ($errors->any)
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    <h2>Crear nuevo usuario</h2>

    <form action="/usuarios" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group col-md-6">
                <label>Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Confirmar Contraseña">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="select">Rol</label>
                <select name="role" class="form-control">
                    <option selected disabled>Elige un rol para el usuario</option>
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Imagen</label>
                <input type="file" class="form-control-file" name="imagen" id="exampleFormControlFile1">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
