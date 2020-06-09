@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-4">

            <h3>Editar Usuario: {{$user->name}}</h3>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <form action="{{route('usuarios.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        </br>
                        <label>Contraseña <span class="small">(Opcional)</span></label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Confirme Contraseña<span class="small">(Opcional)</span></label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="select">Rol</label>
                        <select name="role" class="form-control">
                            <option selected disabled>Elige un rol para el usuario</option>
                            @foreach ($roles as $role)
                            @if ($role->name == str_replace(array('["', '"]'),'', $user->tieneRol()))
                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                            @endif
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                        @if ($user->imagen != "")
                        <img src="{{asset('imagenes/'.$user->imagen)}}" alt="{{$user->imagen}}" height="50px"
                            width="50px">
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-danger">Borrar Campos</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection