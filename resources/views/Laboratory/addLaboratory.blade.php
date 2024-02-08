@extends('site/template/master')

@section('content')
    <form action="{{route('laboratory.store')}}" method="post" class="container p-4">
        @csrf
            <div class="row justify-content-around pt-4">
                <div class="col-6">
                    <div class="m-3 row">
                        <label for="room" class="form-label">Sala:</label>
                        <input type="number" name="room" min=101 max=320 class="form-control" required>    
                    </div>

                    
                    <div class="m-3 row">
                        <label for="tag_block" class="form-label">Bloco:</label>
                        <span class="btn-group p-0" role="group" aria-label="Bloco de salas" name="tag_block">
                            <input type="radio" class="btn-check" name="block" id="A" value="A" checked>
                            <label class="btn btn-outline-primary" for="A">A</label>

                            <input type="radio" class="btn-check" name="block" id="B" value="B">
                            <label class="btn btn-outline-primary" for="B">B</label>

                            <input type="radio" class="btn-check" name="block" id="C" value="C">
                            <label class="btn btn-outline-primary" for="C">C</label>
                            
                            <input type="radio" class="btn-check" name="block" id="D" value="D">
                            <label class="btn btn-outline-primary" for="D">D</label>

                            <input type="radio" class="btn-check" name="block" id="E" value="E">
                            <label class="btn btn-outline-primary" for="E">E</label>
                        </span>
                    </div>

                    <div class="m-3 row">
                        <label for="description" class="form-label">Descrição:</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    
                    <div class="row justify-content-start">
                        <button type="submit" class="btn btn-primary col-3 mx-4">Cadastrar laboratório</button>
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