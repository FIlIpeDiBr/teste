@extends('site/template/master')

@section('content')
    <form action="{{route('user.store')}}" method="post" class="container p-4">
        @csrf
            <div class="row justify-content-around pt-4">
                <div class="col-6">
                    <div class="m-3 row">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    
                    <div class="m-3 row">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    
                    <div class="m-3 row">
                        <label for="" class="form-label">Senha:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    
                    <div class="row justify-content-start">
                        <button type="submit" value="Cadastrar usuário" class="btn btn-primary col-3 mx-4">Cadastrar usuário</button>
                    </div>
                </div>
                <div class="col-4">
                    <figure class="figure">
                        <!--<img src="#" class="figure-img img-fluid rounded" alt="#">-->
                        <svg class="figure-img img-fluid rounded" width="400" height="300" role="img" aria-label="Placeholder: 400x300" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Placeholder</text></svg>
                        <figcaption class="figure-caption">Inserir imagem</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </form>
@endsection