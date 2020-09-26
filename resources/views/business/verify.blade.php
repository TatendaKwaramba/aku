@extends('layouts.app')

@section('content')
    <div class="">

        <div class="card bg-light col-md-12 mt-3 ml-auto mr-auto">
            <div class="card-title valign center">
                <h4>Approve Transfers</h4>
            </div>
            <div class="card-content valign center">
                    <table id="myTable" class="display" data-page-length='50'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>REFERENCE</th>
                                <th>TRANSFER_CODE</th>
                                <th>AMOUNT</th>
                                <th>INITIATED</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                    </table>
            </div>
        </div>
    </div>

    </div>
    </div>
@stop
@push('script')
    <script>
        $(document).ready(function() {
            var ttable = $('#myTable').DataTable({
                dom: 'Blfrtip',
                processing: true,
                serverSide: true,
                ajax: '{{ url('/business/transfer/verify') }}',
                columns: [ {
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'reference',
                    name: 'reference'
                }, {
                    data: 'transfer_code',
                    name: 'transfer_code'
                }, {
                    data: 'amount',
                    name: 'amount'
                }, {
                    data: 'initiated_by',
                    name: 'initiated_by'
                },
                {data: 'action', name: 'action', orderable: false, searchable: false}
              ]
            });

    });
    </script>
@endpush
