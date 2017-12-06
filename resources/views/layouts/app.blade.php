<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<style>
    .nav1 {
        font-family: 'Satisfy', cursive;
        margin-bottom: 0;
        padding-left: 0;
        list-style: none;

    }
    .dropdown-toggle1{
        font-family: 'Marvel';
    }
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '5Meals') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom:0px; border: none; padding: 0px">
            <div class="container-fluid">
                <div class="navbar-header col-lg-12 col-md-12">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/menu') }}" style="padding: 1px 0px 2px;margin-left: 0px;margin-bottom: 0px;height: 58px;" >
                        <img src="/images/logo.png" style="width: 50px;height: 50px;border: 0px;padding-top: 0px;margin-top: 2px;">
                    </a>
                    <!--a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', '5Meals') }}
                        </a-->


                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav1 navbar-nav">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (!Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle1" data-toggle="dropdown" role="button" aria-expanded="false"
                                   style="font-size: 18px; margin-right: 30px;margin-top: 8px;">
                                    <strong>{{ Auth::user()->name }} </strong><span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
