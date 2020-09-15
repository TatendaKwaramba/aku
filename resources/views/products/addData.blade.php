@extends('layouts.app')

@section('content')
    <br>
    <a href="/product/view" id="back" class="chip red white-text z-depth-1" ng-click="backToProductList()">
        <i class="fa fa-arrow-left"></i> Back To Products
    </a>
    <br>
    <div class="card">
        <div class="card-content with padding">
            <h4>
                Netone - Upload Data File
            </h4>
            <form enctype="multipart/form-data" action="{{url('/api/products/add_data')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="csv" id="csv">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" name="csv" id="csv" required>
                    </div>
                </div>
                <button class="btn btn-flat blue white-text" pattern="(.*?\.csv)" type="submit">Submit</button>
            </form>

        </div>
    </div>

@endsection




@section('scripts')
    @if (session('info->invalid_format'))
        <script>
            alert('Invalid CSV FORMAT!');
        </script>
    @endif

    @if (session('response'))
        <div id="modal1" class="modal">
            <div class="modal-content">
                {{session('response')}}
            </div>
        </div>
        <script>
            $(function () {
                $('#modal1').openModal()
            })
        </script>
    @endif
@endsection