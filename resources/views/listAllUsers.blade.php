@extends('site/template/master')

@section('content')
<div class="container">
    <div class="table-responsive col-11">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </thead>
            <tbody class="table-group-divider">
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('user.show', ['user'=>$user->id])}}" class="btn btn-info">Ver Usuário</a>
                        <form action="{{route('user.destroy', ['user'=>$user->id])}}" method="post" class="btn">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Remover" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('user.create')}}" class="btn btn-success">Novo usuário</a>
    </div>
</div>

@endsection