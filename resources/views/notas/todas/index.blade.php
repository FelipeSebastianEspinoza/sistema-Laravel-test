@extends('layouts.app')

@section('content')
@include('notas.todas.modal')
<div class="container  ">
    <div class="row mx-auto ">

        @foreach ($notas as $obj)
        @include('notas.todas.modal-delete')
        <div class="card mr-3" style="width: 18rem;">
            <div class="card-header">
                <h5 class="card-title"><b>{{$obj->titulo}}</b></h5>
                <p class="small float-right  text-info">{{$obj->created_at}}</p>
            </div>
            <img src="https://www.metodistachile.cl/wp-content/uploads/2018/04/sunset-sky-1455125487HWs.jpg"
                class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">{{$obj->texto}}</p>
                <a href="{{URL::action('NotasController@edit', $obj->id)}}">
                    <button type="button" class="btn btn-info btn-sm float-right">
                        <i class="far fa-edit"></i>
                    </button>
                </a>

                <button type="submit" data-toggle="modal" data-target="#modalEliminar-{{$obj->id}}"
                    class="btn btn-danger btn-sm float-right mr-2">
                    <i class="far fa-trash-alt"></i>
                </button>

            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
