@if(session('reset_password'))
    <div class="card-content green lighten-5">
        Your password has expired. Please follow this
         <a class="red-text" href="{{ url('/password/reset') }}">
            link
        </a>
        to reset.
    </div>
@endif