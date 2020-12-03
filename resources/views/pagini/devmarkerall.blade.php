@extends('principal')

@section('titlu', 'devmarketerall')
@section('continut')
@if ( Session::get('succes') )
	<div class="row">
		<div class="col-sm-12 p-3 bg-dark text-white h2 mt-3">{{ Session::get('succes') }}</div>
	</div>
@endif
  <!-- pentru ca in HomeController e ASSOCIATIVE array atunci si in blade avem o colectie ASSOCIATIVA  -->
	<div class="row">
		<div class="col-md-8">
			<h1> {{ $message['title'] }} </h1>
			<p> {{ $message['content'] }} </p>
		</div>
		<div class="col-md-4">
			<div class="card">  <!--   text-center -->
			
				<dl class="row">
					<dt class="col-xs-5 pt-2 pl-4"> Created at:  </dt>
					<dd class="col-xs-7 pt-2 pl-4"> {{ date('M j, Y H:i', strtotime($message['created_at'])) }} </dd>
				</dl>
				
				<dl class="row">
					<dt class="col-xs-5 pt-2 pl-4"> Last updated at:  </dt>
					<dd class="col-xs-7 pt-2 pl-4"> {{  date('M j, Y H:i', strtotime($message['created_at']))}} </dd>
				</dl>
				<hr/>
				<div class="row">
					<div class="col-sm-6"> 
					{!! Html::linkRoute('dev', 'Edit', array($message['id']), array('class' => 'btn btn-primary btn-block'))  !!} 
					    <!--  adaugat prin LaravelCollective SAU se poate folosi a tag classic ca mai jos-->
						<!-- <a href="#" class="btn btn-primary btn-block"> Edit </a>  -->
					</div>
					<div class="col-sm-6">
						<a href="#" class="btn btn-danger btn-block"> Delete </a>
					</div>
				</div>			
			</div>
		</div>
	</div>
@endsection
