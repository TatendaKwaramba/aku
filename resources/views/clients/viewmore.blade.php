@extends('layouts.app')

@section('content')
    <div class="">

        <div class="card bg-light col-md-12 mt-3 ml-auto mr-auto">
            <div class="card-title valign center">
                SUBSCRIBERS
            </div>
            <div class="card-content valign center">

                <form action="{{ route('bulksubmit') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="input-field col s3">
                        <input id="size" type="text" placeholder="number of records" class="validate col s8">
                        <span class="col s3"><a href="/client/size" data-toggle="tooltip" data-original-title="Verify" class="btn-floating waves-effect waves-light blue"><i class = "material-icons">send</i></a></span>
                    </div>
                    <table id="myTable" class="table bordered data-table" data-page-length='100'>
                        <thead>
                            <tr>
                                <th>mobile</th>
                                <th>firstname</th>
                                <th>lastname</th>
                                <th>email</th>
                                <th>status</th>
                                <th>registration date</th>
                            </tr>
                        </thead>
                    </table>

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
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/client/size') }}',
                columns: [{
                    data: 'mobile',
                    name: 'mobile'
                }, {
                    data: 'firstname',
                    name: 'firstname'
                }, {
                    data: 'lastname',
                    name: 'lastname'
                }, {
                    data: 'email',
                    name: 'email'
                }, {
                    data: 'state',
                    name: 'state'
                }, {
                    data: 'registrationDate',
                    name: 'registrationDate'
                }]
            });
        });

    </script>
@endpush
