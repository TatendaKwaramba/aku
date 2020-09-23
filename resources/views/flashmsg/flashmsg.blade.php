@if ($message = Session::get('success'))
<div class="card blue-grey darken-1 alert alert-success alert-block">
	<button type="button" class="btn close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class=" card red darken-1 alert alert-danger alert-block">
	<button type="button" class="btn grey close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="btn close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="btn close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="btn close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif