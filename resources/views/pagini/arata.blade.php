@extends('layouts.app')

@section('continut')
  <!-- <h3 class="text-center bg-primary w-50 mx-auto d-block">  <a class="text-warning text-decoration-none" href="{{ url($slug) }}"> Slug: {{ url($slug) }} </a> </h3> -->
  <h3 class="text-center bg-primary w-50 mx-auto d-block">  
      <a class="text-warning text-decoration-none" href="{{ url($slug) }}"> Slug: {{ url($slug) }} </a> 
  </h3>
  <br />

  <hr/>

  <div class="tags container">

  @foreach($tags as $tag)

    <span class="badge badge-secondary mr-2"> {{ $tag->nume }} </span>
     
  @endforeacH

  </div>

  <h3 class="text-center bg-primary w-50 mx-auto d-block">  
      <a class="text-warning text-decoration-none" href="{{ url('caterinca/oficial') }}"> Caterinca oficial </a> 
  </h3>
  <br />

  <div class="jumbotron text-center text-danger h4"> {{ $id }} - {!! $content !!}</div>
@stop