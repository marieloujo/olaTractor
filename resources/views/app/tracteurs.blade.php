
@extends('app.layout')


@section('content')
    


    <div class="row">
        <div class="col">
            <div class="card">

                <!-- Card header -->
                <div class="card-header border-0">

                    <div class="row">
                        <h3 class="mb-0 my-auto">Liste des tracteurs</h3>

                        <a href="{{route('app_tracteurs_export')}}" class="btn btn-md btn-primary ml-auto">
                            Exporter en excel
                        </a>
                            
                    </div>

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



                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                @if (Auth::user()->role == 'admin')
                                    <th scope="col" class="sort" data-sort="budget">Propriétaire</th>
                                @endif
                                <th scope="col" class="sort" data-sort="budget">Marque</th>
                                <th scope="col" class="sort" data-sort="status">Modèle</th>
                                <th scope="col">Puissance</th>
                                <th scope="col" class="sort" data-sort="completion">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="list">

                            @foreach ($tracteurs as $tracteur)
                            <tr>

                                @if (Auth::user()->role == 'admin')
                                    <td class="budget">{{$tracteur->user_add->name}}</td>
                                @endif

                                <td class="budget">{{$tracteur->marque}}</td>

                                <td>{{$tracteur->modele}}</td>

                                <td>{{$tracteur->type}}</td>

                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-success"></i>
                                        <span class="status">Disponible</span>
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">

                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" 
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                            <a class="dropdown-item edit" data-target="#modal-upadate" href="#" 
                                            
                                                data-id="{{$tracteur->id}}" data-url="{{route('app_update_tracteurs',$tracteur->id)}}"
                                                data-type="{{$tracteur->type}}" data-modele="{{$tracteur->modele}}" 
                                                data-toggle="modal" data-marque="{{$tracteur->marque}}">

                                                Modifier

                                            </a>

                                            <a class="dropdown-item" href="{{route('app_tracking',$tracteur->id)}}">
                                                Surveiller
                                            </a>

                                            <a class="dropdown-item supprimer" href="#" data-toggle="modal" 
                                                data-target="#modal-delete" 
                                                data-id="{{$tracteur->id}}" 
                                                data-url="{{route('app_delete_tracteurs',$tracteur->id)}}">

                                                Supprimer

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






    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-deleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-deleteLabel">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST" id="deleteForm">
                    {{  csrf_field() }}

                    <div class="modal-body text-center">
                        <h4 class="heading mt-4">Voullez-vous effectuer cette action?</h4>
                        <p>Vous ne pourrez plus restorer si vous supprimer.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Anuler
                        </button>
                        <button type="button" class="btn btn-primary">Oui, Supprimer</button>
                    </div>

                </form>

            </div>
        </div>
    </div>



    <div class="modal fade" id="modal-upadate" tabindex="-1" role="dialog" aria-labelledby="modal-upadate" 
        aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                
                <div class="modal-body p-0">
                    
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-header bg-transparent pb-1">
                            <div class="text-muted text-center mt-1 mb-1">
                                <span>Modification</span>
                            </div>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" id="updateForm" method="POST">

                                {{ csrf_field() }}


                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="input-address">
                                        Marque
                                    </label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Marque" type="text" name="marque" 
                                            id="marque-upadate">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">
                                        Modèle
                                    </label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Modèle" type="text" name="modele" 
                                            id="modele-upadate">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">
                                        Puissance
                                    </label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Puissance" type="number" name="type" 
                                            id="type-upadate">
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Modifer</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="modal-new-tracteur" tabindex="-1" role="dialog" aria-labelledby="modal-new-tracteur" 
        aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                
                <div class="modal-body p-0">
                    
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-header bg-transparent pb-1">
                            <div class="text-muted text-center mt-1 mb-1">
                                <span>Enregistrer un nouveau tracteur</span>
                            </div>
                        </div>
                        

                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" id="updateForm" action="{{route('app_add_tracteurs')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="input-address">
                                        Marque
                                    </label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Marque" type="text" name="marque" 
                                            id="marque">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">
                                        Modèle
                                    </label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Modèle" type="text" name="modele" 
                                            id="modele">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">
                                        Puissance
                                    </label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Puissance" type="number" name="type" 
                                            id="type">
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Enregistrer</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection