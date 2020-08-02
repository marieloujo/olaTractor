


<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Ola Tractor - Administration</title>

    @include('app.include-css')

</head>


<body>
    

    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" 
        id="sidenav-main">

        <div class="scrollbar-inner">
            
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="{{asset('dashboard/assets/img/brand/blue.png')}}" 
                        class="navbar-brand-img" alt="...">
                </a>
            </div>

            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                    <!-- Nav items -->
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link @if($name_page == 'Dashboard') active @endif" 
                                href="{{url('app/dashboard')}}">

                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>

                            </a>
                        </li>


                        @if (Auth::user()->role == 'admin')

                            <li class="nav-item">

                                <a class="nav-link 
                                    @if($name_page == 'Proprietaire' || $name_page == 'Agricoles') active @endif" 
                                    href="#navbar-examples" data-toggle="collapse" 
                                    role="button" aria-expanded="true" aria-controls="navbar-examples">

                                    <i class="ni ni-planet text-orange"></i>
                                    <span class="nav-link-text">Utilisateurs</span>

                                </a>
            
                                <div class="collapse show" id="navbar-examples" style="">
                                    <ul class="nav nav-sm flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('app_admin_users_proprietaires')}}">
                                                <i class="ni ni-single-02 text-yellow"></i>
                                                Proprietaires
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('app_admin_users_agricoles')}}">
                                                <i class="ni ni-single-02 text-info"></i>
                                                Agricoles
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                        @endif

                        <li class="nav-item">
                            <a class="nav-link @if($name_page == 'Tracteur') active @endif" 
                                href="{{url('app/tracteurs')}}">

                                <i class="ni ni-spaceship text-primary"></i>
                                <span class="nav-link-text">Tracteurs</span>

                            </a>
                        </li>

                    </ul>

                </div>
            </div>

        </div>
    </nav>
    <!-- Main content -->


    <!-- Main content -->
    <div class="main-content" id="panel">

        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
    
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Rechercher" type="text">
                            </div>
                        </div>
                        
                        <button type="button" class="close" data-action="search-close" 
                            data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
    
                    </form>

                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
    
                        <li class="nav-item d-xl-none">

                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" 
                                data-target="#sidenav-main">

                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>

                            </div>
                        </li>
    
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" 
                                data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
    
                        <li class="nav-item dropdown">
    
                            <a class="btn btn-neutral" href="#" role="button" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false">

                                <i class="ni ni-bell-55"></i>
                                <span>
                                    Notifications
                                </span>
                                <span class="badge badge-md badge-circle badge-floating badge-danger 
                                    border-white">4
                                </span>

                            </a>
    
                            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                                
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                                </div>
    
                                <!-- List group -->
                                <div class="list-group list-group-flush">
    
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
    
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="{{asset('dashboard/assets/img/theme/team-1.jpg')}}" class="avatar rounded-circle">
                                            </div>
    
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">
                                                    Let's meet at Starbucks at 11:30. Wdyt?
                                                </p>
                                            </div>
    
                                        </div>
                                    </a>
    
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
    
                                            <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="{{asset('dashboard/assets/img/theme/team-2.jpg')}}" class="avatar rounded-circle">
                                            </div>
    
                                            <div class="col ml--2">
    
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>3 hrs ago</small>
                                                </div>
                                            </div>
    
                                            <p class="text-sm mb-0">
                                                A new issue has been reported for Argon.
                                            </p>
                                            
                                            </div>
    
                                        </div>
                                    </a>
    
                                </div>
    
                                <!-- View all -->
                                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold 
                                    py-3">View all</a>
                            
                            </div>
    
                        </li>
    
                    </ul>
  
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
    
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
    
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" 
                                        src="{{asset('dashboard/assets/img/default-avatar.png')}}">
                                    </span>
    
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">
                                            {{Auth::user()->name}}
                                        </span>
                                    </div>
    
                                </div>
                            </a>
    
                            <div class="dropdown-menu  dropdown-menu-right ">
    
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bienvenu!</h6>
                                </div>
    
                                <a href="{{route('app_user_profile')}}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Mon profile</span>
                                </a>
    
                                <div class="dropdown-divider"></div>
    
                                <a href="{{url('logout')}}" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Déconnexion</span>
                                </a>
    
                            </div>
    
                        </li>
                    </ul>
  
                </div>
            </div>
        </nav>


        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">

                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">

                            <h6 class="h2 text-white d-inline-block mb-0">Page</h6>

                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">

                                    <li class="breadcrumb-item"><a href="{{url('app/dashboard')}}">
                                        <i class="fas fa-home"></i></a>
                                    </li>
                                    
                                    <li class="breadcrumb-item"><a href="#">{{($name_page)}}</a></li>
                                    
                                
                                </ol>
                            </nav>

                        </div>

                        <div class="col-lg-6 col-5 text-right">

                            @if ($name_page == 'Proprietaire')

                                <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" 
                                    data-target="#modal-new-user">Nouveau</a>

                            @else 

                                <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" 
                                    data-target="#modal-new-tracteur">Nouveau</a>

                            @endif 

                        </div>

                    </div>

                    @yield('statistique')

                </div>
            </div>
        </div>

        

        <div class="container-fluid mt--6">


            @yield('content')
            

            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">

                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2020 <a href="https://www.creative-tim.com" 
                            class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">

                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" 
                                    target="_blank">Creative Tim</a>
                            </li>

                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" 
                                    target="_blank">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" 
                                    target="_blank">Blog</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" target="_blank"
                                    href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md">
                                    MIT License
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
            </footer>

        </div>

  
  
    </div>





    @include('app.include-js')




</body>



</html>