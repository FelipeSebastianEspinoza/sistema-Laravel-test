@extends('layouts.usersearch')

@section('content')
<div class="container">
    <h2>Lista de usuarios registrados <a href="usuarios/create"><button type="button"
                class="btn btn-success float-right">Agregar usuario</button></a>
    </h2>

    <h6>
        @if($search)
        <!--poner en la vista de usuarios solo para que busque ahi  -->
        <div class="alert alert-primary" role="alert">
            Search results = '{{ $search }}'.
        </div>
        @endif
    </h6>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{route('usuarios.show',$user->id)}}"><button type="button"
                            class="btn btn-secondary float-right">View</button></a>
                    <a href="{{route('usuarios.edit',$user->id)}}"><button type="button"
                            class="btn btn-info float-right">Edit</button></a>
                    <form action="{{route('usuarios.destroy', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-right">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
