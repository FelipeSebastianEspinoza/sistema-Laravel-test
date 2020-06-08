@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">{{$user->name}}</h1>
    <p class="lead">{{$user->email}}</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
</div>

@endsection