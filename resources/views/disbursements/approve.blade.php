@extends('layouts.app')

@section('content')
    <div class="">

        <div class="card bg-light col-md-12 mt-3 ml-auto mr-auto">
            <div class="card-title valign center">
                Approve Transactions
            </div>
            <div class="card-content valign center">

                <form action="{{ route('multiValidatePayment') }}" method="POST" id="tableform" class="form-horizontal">
                    {{ csrf_field() }}
                        <button type="submit" class="btn blue btn-primary">
                            Approve_All
                        </button>
                    <table id="myTable" class="display" data-page-length='50'>
                        <thead>
                            <tr>
                                <th><input type="button" class="check_header waves-effect waves-teal btn-flat" value="Select All"/></th>
                                <th>trans_id</th>
                                <th>mobile</th>
                                <th>amount</th>
                                <th>state</th>
                                <th>batch</th>
                                <th>action</th>
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
            var ttable = $('#myTable').DataTable({
                dom: 'Blfrtip',
                processing: true,
                serverSide: true,
                ajax: '{{ url('/disbursments/approve') }}',
                columns: [ {
                                    name: 'checkbox',
                                    data: 'checkbox', orderable: false
                                }, {
                    data: 'transid',
                    name: 'transid'
                }, {
                    data: 'mobile',
                    name: 'mobile'
                }, {
                    data: 'amount',
                    name: 'amount'
                }, {
                    data: 'state',
                    name: 'state'
                }, {
                    data: 'batch',
                    name: 'batch'
                },
                {data: 'action', name: 'action', orderable: false, searchable: false}
              ]
            });

            document.querySelector('.check_header').addEventListener('click', e => {
                if (e.target.value == 'Select All') {
                    document.querySelectorAll('.checkall').forEach(checkbox => {
                    checkbox.checked = true;
                    });
                    e.target.value = 'Deselect All';
                } else {
                    document.querySelectorAll('.checkall').forEach(checkbox => {
                    checkbox.checked = false;
                    });
                    e.target.value = 'Select All';
                }
            });

    });
    </script>
@endpush
