<!-- @/extends('principal') -->
<!-- @/extends mai sus vine inclus daca nu are "/" in @/extends chiar daca e comment -->
@extends('layouts.app')

@section('continut')
	
	<a class="offset-md-5 col-md-2 btn btn-primary btn-block mb-3" href="{{ route('posts.create') }}"> create new post </a>
		
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1 class="text-center"> Bine ai venit pe site-ul meu </h1>
				<p class="lead text-center"> Multumesc pentru vizita. Poti arunca o provore si sa-mi spui parerea ta </p>
				<p class="text-center w-100 text-danger font-weight-bold lead">Butonul "Citeste" duce la un singur post unde se adauga <u>comentariu</u></p>
				<p class="text-center"><a class="btn btn-primary btn-lg" href=" {{ url('/blog/' . $messages[0]->slug) }}" role="button"> Citeste </a></p>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8">
			<div class="postare">
				<h3 class="text-center w-75 mx-auto mb-3 bg-warning rounded py-2">Tilul postarii</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. </p>
				<p class="text-center w-100"><a class="btn btn-primary btn-lg" href="" role="button"> Mai Mult</a></p>
			</div>
			<hr/>
			<div class="postare">
				<h3 class="text-center w-75 mx-auto mb-3 bg-warning rounded py-2">Tilul postarii</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. </p>
				<p class="text-center w-100"><a class="btn btn-primary btn-lg" href="" role="button"> Mai Mult</a></p>
			</div>
			<hr/>
			<div class="postare">
				<h3 class="text-center w-75 mx-auto mb-3 bg-warning rounded py-2">Tilul postarii</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. </p>
				<p class="text-center w-100"><a class="btn btn-primary btn-lg" href="" role="button"> Mai Mult</a></p>
			</div>
			<hr/>
			<div class="postare">
				<h3 class="text-center w-75 mx-auto mb-3 bg-warning rounded py-2">Tilul postarii</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. </p>
				<p class="text-center w-100"><a class="btn btn-primary btn-lg" href="" role="button"> Mai Mult</a></p>
			</div>
			<hr/>
		</div>
		<div class="col-md-3 offset-md-1">
			<h3> Sectiune </h3>
		</div>
	</div>
	@foreach($messages as $message)
		<div class="postare container">
				<h3 class="text-center w-75 mx-auto mb-3 bg-warning rounded py-2">{{ $message->nume }}</h3>
				<!-- AICI AICI AICI strip_tags -->
				<p> {{ strip_tags(substr($message->content, 0, 300) )  }} {{ strlen($message->content) > 300 ? "..." : "" }}</p> 
				@if($message->tags)
					@foreach($message->tags as $tag)
					<span class="bg-dark p-2 text-white mr-3"> {{ $tag->nume }} </span>
					@endforeach
				@endif
				<p class="text-center w-100">
				      <a class="btn btn-primary btn-lg" href="" role="button"> Mai Mult</a>
					  <a class="btn btn-primary btn-lg" href="{{ url( '/post/editare') . '/' . $message->id }}" role="button"> Editare</a>
					<!--  URL::to('/box').'/'.$box->id -->
				</p>
			</div>
	@endforeach
@stop
