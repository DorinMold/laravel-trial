@extends('principal')

@section('titlu', 'Front page')

@section('continut')

	<div class="container">
	
		<div class="row">
			
			<div class="col-md-10">
				<h1> Toate mesajele </h1>
				
			</div>
			
			<div class="col-md-2">
				<a class="btn btn-primary btn-block mb-3" href="{{ route('posts.create') }}"> create new post </a>
			</div>
		</div>
		<div class="row">
			<table class="table">
				<thead> 
					<th> # </th>
					<th> Title </th>
					<th> Slug </th>
					<th> Body </th>
					<th> Created At </th>
					<th> Edit/Delete </th>
				</thead>
				<tbody>
					@foreach($messages as $message)
						<tr>
							<th> {{ $message->id }} </th>
							<td> {{ $message->created_at }} </td>
							<td> {{ $message->slug }} </td>
							<td> {{ substr($message->content, 0, 50) }} {{ strlen($message->content) > 50 ? "..." : " " }} 
							     <!-- <a href="{{ url('blog/'. $message->slug) }}" class="btn btn-primary w-100 d-block"> Blog view </a>  SAU MAI JOS-->
								 <a href="{{ route('blog.single', $message->slug) }}" class="btn btn-primary w-100 d-block"> Blog view </a>
							</td>
							<td> {{ date('M j, Y', strtotime($message->created_at)) }} </td>
							<td> 
								<a class="btn btn-default bg-dark text-white" href="{{ route('posts.show' , ['show' => $message->id]) }}"> View </a> 
								<a class="btn btn-info text-white" href="{{ route('posts.editare',['post'=> $message]) }}"> Edit </a> 
								{!! Form::open(array('route'=> ['posts.stergere', $message->id], 'method' => 'DELETE' )) !!}
								<!-- {!! Html::linkRoute('posts.stergere','Sterge', array($message->id), ['class'=> 'btn btn-danger btn-block']) !!} -->
								{!! Form::submit('Stergere', ['class'=> 'btn btn-danger btn-block']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center" style="margin: 0 auto;">
					{!! $messages->links(); !!}
					{{ $messages->currentPage() }} of {{ $messages->lastPage()  }} <!-- $messages->count() -->
			</div>
		</div>
	</div>
	
@endsection
