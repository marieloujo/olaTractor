

@extends('app.layout')


@section('content')
    


    <div class="row">

        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">

                <img src="{{asset('dashboard/assets/img/img-1-1000x600.jpg')}}" alt="Image placeholder" 
                    class="card-img-top">
                
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{asset('dashboard/assets/img/default-avatar.png')}}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>

                <div class="card-body pt-0">

                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">

                                @if ($user->role == 'proprietaire')
                                    <div>
                                        <span class="heading text-primary">22</span>
                                        <span class="description ">Tracteurs</span>
                                    </div>
                                    <div>
                                        <span class="heading text-orange">10</span>
                                        <span class="description">En location</span>
                                    </div>
                                    <div>
                                        <span class="heading text-success">89</span>
                                        <span class="description">Disponible</span>
                                    </div>
                                @endif

                                @if ($user->role == 'agricole')
                                    <div>
                                        <span class="heading text-primary">22</span>
                                        <span class="description ">Tracteurs Louerr</span>
                                    </div>
                                    <div>
                                        <span class="heading text-orange">10</span>
                                        <span class="description">En uttilisation</span>
                                    </div>
                                    <div>
                                        <span class="heading text-success">89</span>
                                        <span class="description">Rendu</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="text-center">

                        <h5 class="h3">
                            {{$user->name}}<span class="font-weight-light">, {{$user->age}}</span>
                        </h5>

                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{$user->localite->libelle}}
                        </div>

                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>
                            @if ($user->role == 'admin')
                                Administrateur
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary">

                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Modifier le profile </h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Informations personnelle</h6>

                        
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text">
                                <strong>Success!</strong> 
                                {{ Session::get('success') }}
                            </span>
    
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
    
                        </div>
                        @endif
    


                        <div class="pl-lg-4">

                            <form action="{{route('app_user_profile_update')}}" method="POST" id="user-update">

                                @csrf

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="name">
                                                    Nom et prénom
                                                </label>
                                                <input type="text" id="name" name="name" 
                                                    class="form-control form-control-alternative" 
                                                    placeholder="Nom et prénom" value="{{$user->name}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">

                                                <label class="form-control-label" for="email">
                                                    Address email 
                                                </label>

                                                <input type="email" id="email" name="email" 
                                                    class="form-control form-control-alternative" 
                                                    value="{{$user->email}}">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="telephone">
                                                    Télephone
                                                </label>
                                                <input type="number" id="telephone" name="telephone" 
                                                    class="form-control form-control-alternative" 
                                                    value="{{$user->telephone}}" placeholder="Télephone">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="sexe">
                                                    Sexe
                                                </label>
                                                <input type="text" id="sexe" class="form-control form-control-alternative" 
                                                    value="{{$user->sexe}}" name="sexe" placeholder="Sexe">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="age">
                                                    Age
                                                </label>
                                                <input type="number" id="age" class="form-control form-control-alternative" 
                                                    value="{{$user->age}}" name="age" placeholder="Age">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="localite">
                                                    Localité
                                                </label>
                                                <input type="text" id="localite" class="form-control form-control-alternative" 
                                                    value="{{$user->localite->libelle}}" name="localite" placeholder="Localité">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
                                    </div>

                            </form>

                        </div>

                        <hr class="my-4" />

                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Mot de passe</h6>

                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">
                                            Mot de passe actuel
                                        </label>
                                        <input id="input-address" class="form-control form-control-alternative"
                                            placeholder="Mot de passe actuel" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-city">
                                            Noueau mot de passe
                                        </label>
                                        <input type="text" id="input-city" class="form-control form-control-alternative" 
                                            placeholder="Noueau mot de passe">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="form-control-label" for="input-country">
                                            Confirmer mot de passe
                                        </label>

                                        <input type="text" id="input-country" class="form-control form-control-alternative" 
                                            placeholder="Confirmer mot de passe" >

                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-3">Changer mot de passe</button>
                            </div>

                        </div>

                </div>

            </div>
        </div>

    </div>



@endsection