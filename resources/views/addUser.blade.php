<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">

    <title>Adicionar Usuário</title>
</head>
<body>
    <form action="{{route('user.store')}}" method="post">
        @csrf

        <label for="">Nome:</label>
        <input type="text" name="name">
        <br>
        
        <label for="">Email:</label>
        <input type="email" name="email">
        <br>
        
        <label for="">Senha:</label>
        <input type="password" name="password">
        <br>
        
        <input type="submit" value="Cadastrar usuário">
    </form>
</body>
</html>