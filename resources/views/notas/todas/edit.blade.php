@extends('layouts.app')

@section('content')

{!!Form::open(['action' => ['NotasController@update', $nota->id], 'method'=> 'PATCH'])!!}
{{Form::token()}}
<div class="container">
    <div class="row mx-auto ">
        <div class="card mr-3" style="width: 18rem;">
            <div class="card-header">
                <h5 class="card-title">
                    <b>
                        <input type="text" name="titulo" class="form-control" value="{{$nota->titulo}}">
                    </b>
                </h5>
                <p class="small float-right  text-info">{{$nota->created_at}}</p>
            </div>
            <img src="https://www.metodistachile.cl/wp-content/uploads/2018/04/sunset-sky-1455125487HWs.jpg"
                class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">
                    <input type="text" name="texto" class="form-control" rows="6" value="{{$nota->texto}}">
                </p>
            </div>
            <div class="card-footer text-muted small">
                {{$nota->update_at}}
                <a href="{{URL::action('NotasController@index')}}">
                    <button type="button" class="btn btn-danger btn-sm float-right">
                        <i class="far fa-window-close"></i>
                    </button>
                </a>
                <a href="{{URL::action('NotasController@edit', $nota->id)}}">
                    <button type="submit" class="btn btn-success btn-sm float-right mr-2">
                        <i class="far fa-save"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection
