@extends('principal')
@section('continut')
	<ul>
		@foreach($colectie as $cat=>$cat_name)
			<h3> {{ $cat }} </h3>
			@foreach($cat_name as $elem)
				<li class="bg-info"> {{ $elem["prenume"] }} - {{ $elem['venit'] }}</li>
			@endforeach
		@endforeach
		<br/>
		<b> {{ $totalvenit }} </b>

		<h2> Gratuitati </h2>

		<b> {{ $gratuitate }} </b>
	</ul>
@endsection