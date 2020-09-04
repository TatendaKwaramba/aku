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
    <button type="submit" class="btn btn-primary">
        submit
    </button>
    <table id="dtBasicExample" class="table bordered">
  
    @foreach ($csv_data as $row)
      @if ($loop->first)
          <thead>
              <tr>
                  @foreach ($row as $key => $value)
                      <th>{{ $value }}</th>
                  @endforeach
              </tr>
          </thead>
      @endif
    <tbody>
      @if ($row[7] == "status")
          @continue
      @endif
      @if ($row[7] == "FAIL")
          <tr>
              @foreach ($row as $key => $value)
                  <td class="alert alert-danger">{{ $value }}</td>
              @endforeach
          </tr>
      @else
          <tr>
              @foreach ($row as $key => $value)
                  <td class="alert alert-success">{{ $value }}</td>
              @endforeach
          </tr>
      @endif
      </tbody>
       @endforeach
  </table>

    </form>
</div>
</div>
</div>

</div>
</div>
<script>
    $(document).ready(function() {
      $('#dtBasicExample').DataTable();
  } );
</script>

@stop
  