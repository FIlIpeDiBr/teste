@extends('site/template/master')

@section('content')
@if(Gate::allows('isAdmin'))
<div class="container">
    <div class="table-responsive col-11">
        <table class="table table-striped table-hover align-middle text-center">
            <thead class="table-dark">
                <th>Tag</th>
                <th>Descrição</th>
                <th>Ações</th>
            </thead>
            <tbody class="table-group-divider">
            @foreach($laboratories as $laboratory)
                <tr>
                    <td class="col-2">{{$laboratory->id}}</td>
                    <td class="col-6">{{$laboratory->description}}</td>
                    <td class="col-5">
                        <div>
                            <!-- Remover a visualização individual de laboratórios(que não tem nada pra mostrar) e implementar a edição sem troca de contexto com ajax -->
                            <a href="{{route('laboratory.show', ['laboratory'=>$laboratory->id])}}" class="btn btn-info col">Informações</a>
                            <a href="{{route('appointment.create', ['laboratory'=>$laboratory->id, 'day'=>now()->format('Y-m-d')])}}" class="btn btn-success col">Reservar</a>
                        </div>
                        
                        <form action="{{route('laboratory.destroy', ['laboratory'=>$laboratory->id])}}" method="post" class="">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Remover" class="col mt-2 btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('laboratory.create')}}" class="btn btn-success">Cadastrar laboratório</a>
    </div>
</div>
@else
<div class="container">
    <div class="table-responsive col-11">
        <table class="table table-striped table-hover align-middle text-center">
            <thead class="table-dark">
                <th>Tag</th>
                <th>Descrição</th>
                <th>Ações</th>
            </thead>
            <tbody class="table-group-divider">
            @foreach($laboratories as $laboratory)
                <tr>
                    <td class="col-2">{{$laboratory->id}}</td>
                    <td class="col-6">{{$laboratory->description}}</td>
                    <td class="col-5">
                        <div>
                            <!-- Remover a visualização individual de laboratórios(que não tem nada pra mostrar) e implementar a edição sem troca de contexto com ajax -->
                            <a href="{{route('laboratory.show', ['laboratory'=>$laboratory->id])}}" class="btn btn-info col">Informações</a>
                            <a href="{{route('appointment.create', ['laboratory'=>$laboratory->id, 'day'=>now()->format('Y-m-d')])}}" class="btn btn-success col">Reservar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection