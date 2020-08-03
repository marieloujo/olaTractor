@extends('layouts.app')

@section('title')
    Connexion - Ola Tractor
@endsection

@section('content')


<section class="upper">
    <div class="container">
        <div class="col-lg-5 col-md-8 mx-auto">
            <div class="card bg-secondary shadow border-0">

                <div class="card-header bg-white pb-2">

                    <div class="text-muted text-center mb-1">
                        <i class="fa fa-user fa-3x" aria-hidden="true"></i> <br>
                        <span>Connexion</span>
                    </div>
                </div>

                <div class="card-body px-lg-5 py-lg-5 ">

                    <form method="POST" id="login-form" action="{{ route('login') }}">
                        @csrf

                        <input type="hidden" name="hidden" value="web_authentifition">

                        <div class="form-group mb-3 @error('email') has-error @enderror">

                            <div class="input-group input-group-alternative">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ni ni-email-83"></i>
                                    </span>
                                </div>

                                <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                    class="form-control " autocomplete="email" autofocus 
                                    placeholder="Email" required>

                            </div>

                            @error('email')
                                <label id="email-error" class="error" for="email">
                                    {{ $message }}
                                </label>
                            @enderror

                        </div>


                        <div class="form-group @error('email') has-error @enderror">

                            <div class="input-group input-group-alternative">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ni ni-lock-circle-open"></i>
                                    </span>
                                </div>

                                <input id="password" type="password" placeholder="Mot de passe" required
                                    class="form-control " name="password" autocomplete="current-password">

                            </div>

                            @error('password')
                                <label id="password-error" class="error" for="password">
                                    {{ $message }}
                                </label>
                            @enderror

                        </div>


                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" 
                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="custom-control-label" for="remember">
                                <span class="text-default opacity-5">Se souvenir de moi</span>
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Se connecter</button>
                        </div>

                    </form>

                </div>

            </div>
            <div class="row">
                <div class="col-6">
                  <a href="#" class=""><small>Mot de passe oublié?</small></a>
                </div>
                <div class="col-6 text-right">
                  <a href="{{url('register')}}" class=""><small>Créer un compte</small></a>
                </div>
              </div>
        </div>
    </div>
</section>


@endsection
