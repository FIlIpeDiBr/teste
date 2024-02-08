@extends('site/template/master')

@section('content')
    <form action="{{route('laboratory.update',['laboratory'=>$laboratory->id])}}" method="post" class="container p-4">
        @csrf
        @method('PUT')
            <div class="row justify-content-around pt-4">
                <div class="col-6">
                    <div class="m-3 row">
                        <label for="tag" class="form-label">Tag:</label>
                        <input name="tag" class="form-control" value="{{$laboratory->id}}" disabled>    
                    </div>

                    <div class="m-3 row">
                        <label for="description" class="form-label">Descrição:</label>
                        <input type="text" name="description" class="form-control" value="{{$laboratory->description}}">
                    </div>
                    
                    <div class="row justify-content-start">
                        <button type="submit" class="btn btn-primary col-3 mx-4">Confirmar Alterações</button>
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