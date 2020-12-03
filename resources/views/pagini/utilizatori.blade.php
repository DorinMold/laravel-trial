@extends('principal')
@section('titlu', 'Utilizatori')
@section('continut')
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center"> Despre noi </h1>
			<p class="lead text-center"> Multumesc pentru vizita. Poti arunca o provore si sa-mi spui parerea ta </p>
			<p class="text-center"><a class="btn btn-primary btn-lg" href="" role="button"> Citeste </a></p>
		</div>
		
		{{ $message }}
		
		
		<!--  Session::flash('success', 'Actiunea a reusit...deplin')  
		  return redurect()->route('routename', $var_name)      -->
		
	</div>
@endsection