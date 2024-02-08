@extends('site/template/master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>{{$user->name}}</h1>
            <p>{{$user->email}}</p>
            <p>{{$user->siape}}</p>

            <label for="criado" class="label label-default">Criado em:</label>
            <p id="criado">{{date('d/m/y H:i', strtotime($user->created_at))}}</p>

            <a href="{{route('user.edit',['user'=>$user->id])}}" class="btn btn-primary">Editar</a>

        </div>
        <div class="col-6 placehold">
            
        </div>
    </div>
</div>
@endsection
