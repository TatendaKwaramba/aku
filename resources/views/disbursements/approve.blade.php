@extends('layouts.app')

@section('content')
    <div class="">
        <div class="card bg-light col-md-12 mt-3 ml-auto mr-auto">
            <div class="card-title valign center">
                CSV Data
            </div>
            <div class="card-content valign center">
        <table class="table">
            @foreach ($data as $row)
                @if ($loop->first)
                    <thead class="thead-dark">
                        <tr>
                            @foreach ($row as $key => $value)
                                <th>{{ $value }}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                @endif
            @endforeach
            
            @foreach ($data as $r)
                @if($loop->first)
                    @continue
                @endif
                <tr>
                    <td class="">{{ $r[0] }}</td>
                    <td class="">{{ $r[1] }}</td>
                    <td class="">{{ $r[2] }}</td>
                    <td class="">{{ $r[3] }}</td>
                    <td class="">{{ $r[4] }}</td>
                    @if($r[3] != "Successfully Initiated")
                        <td>
                            <form method="POST" action="{{ route('validatePayment') }}">
                                <input type="hidden" name="id" value="{{ $r[4] }}"/>
                                <input type="hidden" name="json" value="{{ $json_data }}"/>
                                <button style="border: none;" type="button" onclick="func()">
                                    <i class="fa fa-check text-success"></i>
                                </button>
                            </form>
                        </td>
                    @else 
                    <td>
                        <label style="border: none;">
                            <i class="fa fa-times text-danger"></i>
                        </label>
                    </td>
                    @endif
                    
                </tr>
            @endforeach
        </table>
</div>
</div>
</div>
</div>
</div>

@stop
  