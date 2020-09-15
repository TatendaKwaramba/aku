<!DOCTYPE html >

{{--* Created by PhpStorm.--}}
{{--* User: Nyasha--}}
{{--* Date: 26/09/2016--}}
{{--* Time: 19:09--}}


<html lang="en" ng-app="adminApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href={{ asset('img/gc/ico.jpeg') }} type="image/x-icon"/>
    <link rel="stylesheet" href={{ asset('lib/materialize/css/materialize.min.css') }}>
    <link rel="stylesheet" href={{ asset('lib/font-awesome/css/font-awesome.min.css') }}>
    <link rel="stylesheet" href={{ asset('lib/animate.css/animate.min.css') }}>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('lib/angular-material/angular-material.css') }}>
    <link rel="stylesheet" href={{ asset('css/index.css') }}>
    <!--    <link rel="stylesheet" href="lib/semantic/dist/semantic.min.css">

        -->
    <script src={{ asset('lib/jquery/dist/jquery.min.js') }}></script>
</head>


<body>


<div class="navbar-fixed">
    <nav class="white">
        <div class="nav-wrapper">
            <div class="row">
                <div class="col s4 grey-text" ng-controller="dateController" ng-cloak>
                    @{{now}}
                </div>


                <ul class="right hide-on-med-and-down">
                    @if( ! (Request::is('login*')))
                        <li><a class="grey-text" href="{{ url('/login') }}">Login</a></li>
                    @endif

                    @if( ! (Request::is('register*')))
                        <li><a class="grey-text" href="{{ url('/register') }}">Register</a></li>@endif
                </ul>
            </div>
        </div>

    </nav>
</div>
<center>
    <img class="materialboxed center" height="120" src={{ asset("img/gc/logo.jpeg") }}>
</center>

<div style="margin-top: 40px">
    @yield('content')
</div>
</body>
</html>
