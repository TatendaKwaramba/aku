@if(session('status'))
  <div class="card-content green lighten-5">
      {{ session('status') }}
  </div>
@endif