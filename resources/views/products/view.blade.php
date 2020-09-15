@extends('layouts.app')
@section('content')
    @include('products.view_content')
@stop
@section('scripts')
    @if (session('info->invalid_format'))
        <script>
            alert('Invalid CSV FORMAT!');
        </script>
    @endif

    @if (session('response'))
        <script>
            alert('Success!');
        </script>
    @endif
@endsection
