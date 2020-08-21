@extends('layouts.app_auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s8 push-s2">
                <div class="card">
                    <div class="card-content blue-grey lighten-5">Login</div>

                    @include('partials.flush')
                    @include('partials.reset')

                    <div class="card-content">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            {{ session('status') }}


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="">E-Mail Address</label>

                                <div class="">
                                    <input id="email" type="email" class="" name="email" value="{{ old('email') }}"
                                           required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="">Password</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="off">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        {{--    <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Remember Me </label>
                                    </div>
                                </div>
                            </div>--}}
                            <br>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn akupay">
                                        Login
                                    </button>

                                    @if(!session('partials.reset'))
                                    <a class="right akupay-text" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="akupay-text center">v 1.0.5</div>

            </div>
        </div>
    </div>
@endsection
