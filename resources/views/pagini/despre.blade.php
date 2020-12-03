@extends('principal')
@section('titlu', 'Despre noi')
@section('continut')
	<div class="row">
	<!-- <div class="alert {{ Session::get('salvare') ? 'alert-success' : 'alert-primary' }}"> 	{{ Session::get('salvare') }}  </div> -->
	<div class="alert @if (Session::get('salvare')) alert-success @else alert-primary @endif "> 	{{ Session::get('salvare') }}  </div>
		<div class="col-md-12">
		    @if ( $hhh ) 
				<h1> {{ $hhh }} </h1>
			@endif
			<h1 class="text-center"> Despre noi </h1>
			<p class="lead text-center"> Multumesc pentru vizita. Poti arunca o provore si sa-mi spui parerea ta </p>
			<p class="text-center"><a class="btn btn-primary btn-lg" href="" role="button"> Citeste </a></p>
		</div>
	</div>
@endsection
@if(count($errors)>0) 
	<div>sunt erori</div>
@else
    <div>Nu sunt erori</div>
@endif