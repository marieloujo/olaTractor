

@extends('layouts.app')


@section('title')
    Inscrption - Ola Tractor
@endsection


@section('content')


{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}



<div class="container upper pb-5">
    
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card bg-secondary border-0">

                <div class="card-header bg-transparent pb-2">

                    <div class="text-muted text-center mb-1">
                        <i class="fa fa-user fa-3x" aria-hidden="true"></i> <br>
                        <span>Inscrption</span>
                    </div>

                </div>

                <div class="card-body">

                    <form id="inscription" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" value="proprietaire" name="role">
                        <input type="hidden" name="hidden" value="web_registation">

                        <h6 class="heading-small text-muted mb-4">Informations personnelle</h6>

                        <div class="pl-lg-4">

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="name">
                                            Nom et prénom
                                        </label>

                                        <div class="input-group input-group-alternative">
                                            <input type="text" id="name" name="name" 
                                                class="form-control" 
                                                placeholder="Nom et prénom">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="email">
                                            Address email 
                                        </label>

                                        <div class="input-group input-group-alternative 
                                            @error('email') has-error has-danger @enderror">
                                            <input type="email" id="email" name="email" placeholder="Address email"
                                                class="form-control form-control-alternative" >
                                        </div>

                                        @error('email')
                                            <label id="email-error" class="error" for="email">
                                                {{ $message }}
                                            </label>
                                        @enderror

                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="telephone">
                                            Télephone
                                        </label>

                                        <div class="input-group input-group-alternative 
                                            @error('telephone') has-error has-danger @enderror">

                                            <input type="number" id="telephone" name="telephone" 
                                                class="form-control form-control-alternative"  
                                                placeholder="Télephone">
                                                
                                        </div>

                                        @error('telephone')
                                            <label id="telephone-error" class="error" for="telephone">
                                                {{ $message }}
                                            </label>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="sexe">
                                            Sexe
                                        </label>

                                        <div class="input-group input-group-alternative">
                                            <select class="form-control" id="sexe" name="sexe">
                                                <option value="Féminin">Féminin</option>
                                                <option value="Masculin">Masculin</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="age">
                                            Age
                                        </label>

                                        <div class="input-group input-group-alternative">
                                            <input type="number" id="age" class="form-control form-control-alternative" 
                                                name="age" placeholder="Age">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="localite">
                                            Localité
                                        </label>

                                        <div class="input-group input-group-alternative">
                                            <select class="form-control" id="localite" name="localite">
                                                <option value="1">Cotonou</option>
                                                <option value="2">Calavi</option>
                                                <option value="3">Godomey</option>
                                                <option value="4">Cocotomey</option>
                                                <option value="5">Kpahou</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>


                        <hr class="my-4 col-lg-11 col-md-11"/>


                        <h6 class="heading-small text-muted mb-4">Mot de passe</h6>

                        <div class="pl-lg-4">


                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="password">
                                            Mot de passe
                                        </label>

                                        <div class="input-group input-group-alternative">
                                            <input type="password" id="password" class="form-control form-control-alternative" 
                                                placeholder="Mot de passe" name="password">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="password_confirmation">
                                            Confirmer mot de passe
                                        </label>

                                        <div class="input-group input-group-alternative">
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="form-control form-control-alternative" 
                                                placeholder="Confirmer mot de passe" equalTo="#password" required >
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>


                        <hr class="my-4 col-lg-11 col-md-11"/>


                        <h6 class="heading-small text-muted mb-4">Pièces à fournir</h6>

                        <div class="pl-lg-4">


                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input" id="acte_naissance" 
                                            name="acte_naissance" lang="en">

                                        <label class="custom-file-label" for="acte_naissance">
                                            Fichier d'acte de naissance
                                        </label>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input"
                                            id="carte_identite" name="carte_identite" lang="fr">

                                        <label class="custom-file-label" for="carte_identite">
                                            Fichier de carte d'identité
                                        </label>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="custom-file mt-3">

                                        <input type="file" class="custom-file-input" name="certificat_nationalite"
                                            id="certificat_nationalite" lang="fr">

                                        <label class="custom-file-label" for="certificat_nationalite">
                                            Fichier de certificat de nationalité
                                        </label>
                                        
                                    </div>
                                </div>

                            </div>


                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">S'inscrire</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
  </div>


@endsection


