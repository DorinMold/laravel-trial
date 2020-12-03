@extends('principal')

@section('titlu', 'ontact')

@section('continut')
	<div class="row">
		<div class="col-md-12">
			<h2> Contacteaza-ne </h2>
			</hr>
			<form action="{{ url('contact') }}" method="POST">

				{{ csrf_field() }}

				<div class="form-group">
					<label name="email" for="email"> Email: </label>
					<input type="email" id="email" name="email" class="form-control"/>
				</div>
				<div class="form-group">
					<label name="tema" for="tema"> In ce privinta </label>
					<input type="tema" id="tema" name="tema" class="form-control"/>
				</div>
				<div class="form-group">
					<label name="email" for="mesaj"> Mesaj </label>
					<textarea id="mesaj" name="mesaj" class="form-control"> Introducere mesaj </textarea>
				</div>
				<input type="submit" value="Trimite mesaj" class="btn btn-success"/>
			</form>
		</div>
	</div>
@endsection