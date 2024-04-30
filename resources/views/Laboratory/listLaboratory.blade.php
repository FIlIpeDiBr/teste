@extends('site/template/master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>{{$laboratory->id}}</h1>
            <p>{{$laboratory->description}}</p>

            <label for="criado" class="label label-default">Criado em:</label>
            <p id="criado">{{date('d/m/y H:i', strtotime($laboratory->created_at))}}</p>

            @if(Gate::allows('isadmin'))
            <a href="{{route('laboratory.edit',['laboratory'=>$laboratory->id])}}" class="btn btn-primary">Editar</a>
            @endif
            <a href="{{route('appointment.create', ['laboratory'=>$laboratory->id])}}" class="btn btn-success col">Reservar</a>

        </div>
        <div class="col-6 placehold">
            
        </div>
    </div>
</div>
@endsection
