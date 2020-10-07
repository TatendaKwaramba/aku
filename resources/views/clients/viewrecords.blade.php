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
                        <div class="col s4"><input id="last_name" name="size" type="number" placeholder="e.g. 400" class="validate valign center"></div>
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