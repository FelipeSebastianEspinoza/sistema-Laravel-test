@extends('layouts/app')





@section('content')

<div class="Container">
    <h2>Lista de usuarios
        <a href="usuarios/create">
            <button type="button" class="btn btn-success float-right">
                Agregar usuario
            </button>
        </a>
    </h2>
    <h6>
        @if ($search)
        <div class="alert alert-primary" role="alert">
            Los resultados para la búsqueda '{{$search}}' son:
        </div>
        @endif
    </h6>
    <!-- SEARCH FORM -->
    <div class="col-4 float-right">
        <form class="form-inline ml-3 float-right">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" name="search" placeholder="Búsqueda"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                @can('administrador')
                <th>
                </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach ($user->roles as $role)
                        {{$role->name}}
                    @endforeach
                
                </td>
                @can('administrador')
                <td>

                    <a href="{{ route('usuarios.show', $user->id) }}">
                        <button type="button" class="btn btn-secondary btn-sm float-right mr-2">ver
                            <i class="far fa-eye"></i>
                        </button>
                    </a>



                    <a href="{{ route('usuarios.edit', $user->id) }}">
                        <button type="button" class="btn btn-primary btn-sm float-right mr-2">Editar
                            <i class="far  pencil"></i>
                        </button>
                    </a>


                    <button type="submit" data-toggle="modal" data-target="#modalEliminar-{{ $user->id }}"
                        class="btn btn-danger btn-sm float-right mr-2">
                        <i class="far fa-trash-alt"></i>
                    </button>
                    @include('usuarios.modal-delete')
                </td>
                @endcan
            </tr>
            @endforeach
        </tbody>

    </table>
    {{ $users->links() }}

</div>


@endsection