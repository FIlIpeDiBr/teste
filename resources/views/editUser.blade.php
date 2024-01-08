<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">

    <title>Editar Usuário</title>
</head>
<body>
    <form action="{{route('user.update',['user'=>$user->id])}}" method="post">
        @csrf
        @method('PUT')

        <label for="">Nome:</label>
        <input type="text" name="name" value="{{$user->name}}">
        <br>
        
        <label for="">Email:</label>
        <input type="email" name="email" value="{{$user->email}}">
        <br>
        
        <label for="">Senha:</label>
        <input type="password" name="password">
        <br>
        
        <input type="submit" value="Confirmar alteração">
    </form>
</body>
</html>