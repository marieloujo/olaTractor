
@extends('app.layout')


@section('content')
    


    <div class="row">
        <div class="col">
            <div class="card">

                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Light table</h3>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Project</th>
                                <th scope="col" class="sort" data-sort="budget">Budget</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col">Users</th>
                                <th scope="col" class="sort" data-sort="completion">Completion</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody class="list">

                            <tr>

                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">
                                                Argon Design System
                                            </span>
                                        </div>
                                    </div>
                                </th>

                                <td class="budget">$2500 USD</td>

                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">pending</span>
                                    </span>
                                </td>

                                <td>
                                    <div class="avatar-group">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="completion mr-2">60%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" 
                                                    role="progressbar" aria-valuenow="60" 
                                                    aria-valuemin="0" aria-valuemax="100" 
                                                    style="width: 60%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{url('app/user-profile')}}">Profile</a>
                                            <a class="dropdown-item" href="{{url('app/tracteurs')}}">Tracteurs</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" 
                                                data-target="#modal-notification">Désactivé
                                            </a>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                        </div>
                                    </div>
                                </th>

                                <td class="budget">
                                    $1800 USD
                                </td>

                                <td>
                                    <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i>
                                    <span class="status">completed</span>
                                    </span>
                                </td>

                                <td>
                                    <div class="avatar-group">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="completion mr-2">100%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" 
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" 
                                                    style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" 
                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{url('app/user-profile')}}">
                                                Profile
                                            </a>
                                            <a class="dropdown-item" href="{{url('app/tracteurs')}}">
                                                Tracteurs
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" 
                                                data-target="#modal-notification">Désactivé
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">Black Dashboard</span>
                                        </div>
                                    </div>
                                </th>

                                <td class="budget">
                                    $3150 USD
                                </td>

                                <td>
                                    <span class="badge badge-dot mr-4">
                                    <i class="bg-danger"></i>
                                    <span class="status">delayed</span>
                                    </span>
                                </td>

                                <td>
                                    <div class="avatar-group">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                    <span class="completion mr-2">72%</span>
                                    <div>
                                        <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                        </div>
                                    </div>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" 
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{url('app/user-profile')}}">
                                                Profile
                                            </a>
                                            <a class="dropdown-item" href="{{url('app/tracteurs')}}">
                                                Tracteurs
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" 
                                                data-target="#modal-notification">Désactivé
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>


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
                                <span>Enregistrer un nouveau propriétaire</span>
                            </div>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Or sign in with credentials</small>
                            </div>
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



@endsection