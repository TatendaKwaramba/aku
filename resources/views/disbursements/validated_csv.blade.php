@extends('layouts.app')

@section('content')
    <div class="">

        <div class="card bg-light col-md-12 mt-3 ml-auto mr-auto">
            <div class="card-title valign center">
                Validation Results
            </div>
            <div class="card-content valign center">

                <form action="{{ route('submitdisbursements') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="json" value="{{ $json_data }}">
                    <button type="submit" class="btn btn-primary">
                        submit
                    </button>
                    <table id="myTable" class="table bordered data-table">
                        <thead>
                            <tr>
                                <th>trans_id</th>
                                <th>mobile</th>
                                <th>amount</th>
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
                ajax: '{{ url('/disbursments/datatable') }}',
                columns: [{
                    data: 'transid',
                    name: 'transid'
                }, {
                    data: 'mobile',
                    name: 'mobile'
                }, {
                    data: 'amount',
                    name: 'amount'
                }, {
                    data: 'status',
                    name: 'status'
                },
                ]
            });
        });

    </script>
@endpush
