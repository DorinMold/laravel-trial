@extends('principal')

@section('titlu', 'contact')

@section('stylesheet')

<!-- json_encode($post->tags()->allRelatedIds())  -->

	{!! Html::style('css/select2.min.css') !!}
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
	tinymce.init({
		selector: "textarea",  // change this value according to your HTML
		plugins: "link code",
		menubar: false
	//	menubar: "insert",
	//	toolbar: "link"
	});
	</script>

@endsection

@section('continut')
<div class="row"> {{ Session::get('salvare') }} </div>
@if( count($errors)>0 ) 
	<div class="alert alert-danger">sunt erori
		{{ $errors->all()[0] }}
	</div>

@else
    <div> Nu sunt erori </div>
@endif
	<div class="row">
		<div class="col-md-12">
			<h2> Creare mesaj nou </h2>
			<hr/>
			<form action="{{ route('posts.salvare') }}" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					{{ csrf_field() }}
					<label name="title" for="title"> Titlu </label>
					<input type="title" id="title" name="title" class="form-control"/>
				</div>

			{!! Form::label('slug', 'Slug:') !!}
			{!! Form::text('slug',"pune un slug", array('class' => 'form-control') ) !!}     <!--   "input text" si label impreuna cu coloana din tabel trebuie sa aiba aceeasi denumire "slug" -->

			{!! Form::label('category_id','Category: ') !!}
			<!-- Form::select  -->
			<select class="form-control" name="category_id" > <!-- category_id the column name of the table messages   -->
				
				@foreach($categories as $category)
					<option value="{{ $category->id }}"> {{ $category->nume }} </option>
				@endforeach
			
			</select>

			{{ Form::label('imagine_prim','Incarca imaginea pricnipala') }}
			{{ Form::file('imagine_prim') }}

			{!! Form::label('tags','Taguri: ') !!}
			<!-- Form::select  -->
			<select class="form-control select2-multi" name="taguri[]" multiple="multiple" > <!-- category_id the column name of the table messages   -->
					
			@foreach($tags as $tag)
				<option value="{{ $tag->id }}"> {{ $tag->nume }} </option>
			@endforeach
				
			</select>

				<div class="form-group">
					<label name="content" for="content"> Mesaj </label>
					<textarea id="content" name="content" class="form-control"> Continut </textarea>
				</div>
				<input type="submit" value="Trimite mesaj" class="btn btn-success"/>
			</form>
		</div>
	</div>
@endsection

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script>
	
		$('.select2-multi').select2();
	
	</script>
	
@endsection
