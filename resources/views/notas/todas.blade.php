@extends('layouts.app')

@section('content')
<div class="container  ">
    <div class="row mx-auto ">

        @foreach ($notas as $obj)
        <div class="card mr-3" style="width: 18rem;">
            <div class="card-header">
                <h5 class="card-title"><b>{{$obj->titulo}}</b></h5>
                <p class="small float-right  text-info">{{$obj->created_at}}</p>
            </div>
            <img src="https://www.metodistachile.cl/wp-content/uploads/2018/04/sunset-sky-1455125487HWs.jpg"
                class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">{{$obj->texto}}</p>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
