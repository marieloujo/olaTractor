
@extends('app.layout')


@section('content')
    


    <div class="row">
        <div class="col">
            <div class="card">

                <!-- Card header -->
                <div class="card-header border-0">

                    <div class="row">

                        <h3 class="mb-0">
                            @if($name_page == 'Proprietaire') Liste des Proprietaires @endif
                            @if($name_page == 'Agricoles') Liste des Agricoles @endif
                        </h3>

                        <button class="btn btn-md btn-primary ml-auto">Exporter en excel</button>
                            
                    </div>

                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Nom et prénom</th>
                                <th scope="col" class="sort" data-sort="budget">Age</th>
                                <th scope="col" class="sort" data-sort="status">Numéro de téléphone</th>
                                <th scope="col">Adresse email</th>
                                <th scope="col" class="sort" data-sort="completion">Localité</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody class="list">

                            @foreach ($users as $user)
                            <tr>

                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">
                                                {{$user->name}}
                                            </span>
                                        </div>
                                    </div>
                                </th>

                                <td class="budget">{{$user->age}}</td>

                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{$user->telephone}}</span>
                                    </span>
                                </td>

                                <td>{{$user->email}}</td>

                                <td>{{$user->localite->libelle}}</td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                            <a class="dropdown-item" href="{{route('app_admin_user_profile', $user->id)}}">
                                                Profile
                                            </a>

                                            @if ($user->role == 'proprietaire')
                                                <a class="dropdown-item" href="{{route('app_admin_tracteurs_by_user', $user->id)}}">
                                                    Tracteurs
                                                </a>
                                                <a class="dropdown-item" target="_blank" href="{{route('app_admin_user_pieces', $user->id)}}">
                                                    Pièces fournies
                                                </a>
                                            @endif

                                            <a class="dropdown-item" href="#" data-toggle="modal" 
                                                data-target="#modal-notification">Désactivé
                                            </a>

                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">

                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="page-item"><a class="page-link" href="#">3</a></li>

                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>





    <div class="modal fade" id="modal-new-user" tabindex="-1" role="dialog" aria-labelledby="modal-new-user" 
        aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                
                <div class="modal-body p-0">
                    
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-header bg-transparent pb-1">
                            <div class="text-muted text-center mt-1 mb-1">
                                <span>Enregistrer un nouveau utilisateur</span>
                            </div>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form">

                                {{ csrf_field() }}

                   

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Marque" type="text" name="marque" 
                                            id="marque">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Modèle" type="text" name="modele" 
                                            id="modele">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Puissance" type="number" name="type" 
                                            id="type">
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="button" class="btn btn-primary my-4">Sign in</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" 
        aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Attention !!</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">Etes vous certain d'effectuer cette action!</h4>
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-white">Oui, Désactivé</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Annuler</button>
                </div>
                
            </div>
        </div>
    </div>



@endsection