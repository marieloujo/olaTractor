<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    
    @include('include-css')

</head>



<body class="login-page">


    <div class="section-shaped my-0 skew-separator skew-mini">
        <div class="page-header page-header-small header-filter">
            <div class="page-header-image" style="background-image: url('./assets/img/dg3.jpg');">
            </div>
        </div>
    </div>

    
    @yield('content')

    {{--@include('footer')--}}

    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">

                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2020 
                        <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                            target="_blank">Ola Tractor
                        </a>
                    </div>
                </div>

                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" 
                                target="_blank">Ola Tractor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" 
                                target="_blank">A propos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" 
                                target="_blank">Nous contacter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>




    @include('include-js')

    

</body>


</html>
