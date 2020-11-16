@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="card bg-light col-md-6 mt-3 ml-auto mr-auto">
                <div class="card-content valign center">
                    <div class="card-title">Enter Number of Records to View</div>
                   
                    <form action="{{ action('ClientController@getMoreClients') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="input-field valign center">
                        <div class="col s3"></div>
                        <div class="col s4">
                        <select name="size" class="browser-default">
                            <option value="" disabled selected>Select</option>
                            <option value="100">100 records</option>
                            <option value="200">200 records</option>
                            <option value="500">500 records</option>
                            <option value="1000">1000 records</option>
                            <option value="1500">1500 records</option>
                            <option value="2000">2000 records</option>
                            <option value="2500">2500 records</option>
                            </select>
                        </div>
                          <div class="col s2"><button type="submit" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">send</i></button></div>  
                            <div class="col s3"></div>
                        </div>
                        </div>   
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
    @stop
    @push('script')
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
    @endpush