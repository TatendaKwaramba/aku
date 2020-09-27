@extends('layouts.app')
@section('content')
@if (session('status'))
    <div class=" card teal darken-1 alert alert-danger alert-block">
        <button type="button" class="btn red close" data-dismiss="alert">×</button>	
            <strong>{{ session('status') }}</strong>
    </div>
@endif
    @include('business.view_content')
@stop