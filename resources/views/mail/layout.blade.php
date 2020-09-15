<!DOCTYPE html>
<html>
<head>
    <title>@section('title')</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body>
<div class="row">
    <strong class="jumbotron">{{config('app.name')}}</strong>
</div>

<p class="row">Hello</p>
<p class="row">
    @yield('tr1')
</p>
<p class="row">
    @yield('tr2')
</p>
<p class="row">
    @yield('tr3')
</p>

<p>Regards, </p>
<p>{{config('app.name')}}</p><br>
<div class="row">
    <center>
        <small>©{{date("Y")}} {{config('app.organisation')}}</small>
    </center>
</div>
</body>
</html>