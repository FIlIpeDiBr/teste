<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">

    <title>Listar Usuário</title>
</head>
<body>
    <h1>{{$user->name}}</h1>
    <p>{{$user->email}}</p>
    <p>{{date('d/m/y H:i', strtotime($user->created_at))}}</p>

    <a href="{{route('user.edit',['user'=>$user->id])}}">Editar</a>

</body>
</html>