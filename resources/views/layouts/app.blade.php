<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .navbar-nav .nav-link {
            position: relative;
            color: #ffffff;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }
    
        /* Underline Effect */
        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -3px;
            width: 0;
            height: 2px;
            background-color: #f8d7da; /* Light red underline */
            transition: all 0.3s ease-in-out;
        }
    
        /* Hover Effect */
        .navbar-nav .nav-link:hover {
            color: #f8d7da; /* Light red text */
        }
    
        .navbar-nav .nav-link:hover::after {
            width: 100%;
            left: 0;
        }
    </style>

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>Convocation Student Registration</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{--    datepicker--}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
{{--    <link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">--}}
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">

</head>

<body style="background-color: rgba(128,15,15,0.11)">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #800f0f;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">SUSL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Hello, {{ Auth::user()->name }}</a>
                    </li>
                    @if(checkPermission(['Admin', 'EBSC_Applied', 'EBSC_Geo', 'EBSC_Social', 'EBSC_Mana']))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('eligibleStudents.index') }}">Dashboard</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#" id="logout-link">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


        <main >
{{--            <div class="welcomebgimage">--}}
                @yield('content')
{{--            </div>--}}

        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('logout-link').addEventListener('click', function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, logout!",
            cancelButtonText: "No, cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>
</body>
</html>
