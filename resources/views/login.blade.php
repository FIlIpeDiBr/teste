@extends('site/template/master')

@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="{{route('login.log')}}" method="POST" autocomplete="on">
                    @csrf
                    
                    <div class="form-outline mb-4">
                        <label class="form-label" for="siape">Siape</label>
                        <input type="text" name="siape" class="form-control form-control-lg" placeholder="1234567" value="{{old('siape')}}" required/>
                        @error('siape')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Senha</label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="************" required/>
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="remember_token" name="remember_token"/>
                            <label class="form-check-label" for="remember">
                                Lembre de mim
                            </label>
                        </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection