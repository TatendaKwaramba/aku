@extends('layouts.app')

@section('content')
    <div class="">

        <div class="card bg-light col-md-12 mt-3 ml-auto mr-auto">
            <div class="card-title valign center">
                Validation Results
            </div>
            <div class="card-content valign center">

                <form action="{{ route('bulksubmit') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="json" value="{{ $json_data }}">
                    <div class="input-field col s2">
                        <button type="submit" class="btn blue btn-primary">
                            submit
                        </button>
                      </div>
                    <div class="input-field col s4">
                        <input id="batch_name" name="batchname" type="text" class="">
                        <label for="batch_name">Enter Batch Name</label>
                    </div>
                    <table id="myTable" class="table bordered data-table">
                        <thead>
                            <tr>
                                <th>mobile</th>
                                <th>firstname</th>
                                <th>lastname</th>
                                <th>email</th>
                                <th>status</th>
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
                ajax: '{{ url('/client/datatable') }}',
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
                    data: 'status',
                    name: 'status'
                }]
            });
        });

    </script>
@endpush
