@extends('layouts.app')

@section('content')
    <div class="">

        <div class="card bg-light col-md-12 mt-3 ml-auto mr-auto">
            <div class="card-title valign center">
                <h4>SUBSCRIBERS</h4>
            </div>
            <div class="card-content valign center">

                <form class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="size" id="size" value="{{ $size }}"/>
                    <table id="myTable" class="table bordered data-table" data-page-length='100'>
                        <thead>
                            <tr>
                                <th>MOBILE</th>
                                <th>FIRSTNAME</th>
                                <th>LASTNAME</th>
                                <th>EMAIL</th>
                                <th>STATUS</th>
                                <th>REGISTRATION DATE</th>
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
            var size = $('#size').val();
            console.log("Size : ", size);
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/client/size?size=') }}'+size+'&',
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
