@extends('layouts.app')

@php

    $titleTag = htmlspecialchars($mess->title)

@endphp

@section('titlu', " $titleTag")

@section('continut')
<div class="container">
@if ( Session::get('succes') )
    <div class="row">
        <p class="text-success bg-warning p-3 border"><strong style="font-size: 20px">Succes: </strong>{{ Session::get('succes') }}</p>
    </div>
@endif
    <div class="row">
        <div class="col-md-8 offset-md-2">  
            <h3 class="mb-4"> <span class="title-comentariu"> </span> {{ $mess->comentarii->count() }} Comentarii</h3>
            @foreach ( $mess->comentarii as $comentariu) 
                <div class="comentariu">
                    randul de mai jos e
                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comentariu->email))) . '?s=50&d=monsterid' }}" alt="" class="imagine-autor" />
                    <div class="nume-autor">
                        <h4>{{ $comentariu->name }} </h4> 
                        <p class="autor-timp">{{ date('nS F, Y - g:iA', strtotime($comentariu->created_at)) }}</p>
                    </div>
                    <div class="continut-comentariu"> 
                            Comentariu: <br />{{ $comentariu->comentariu }}
                    </div>
                    <!-- <div class="info-autor"> <strong class="text-danger"> 
                        Nume: </strong>{{ $comentariu->name }} 
                        {{ $comentariu->created_at }}
                    </div>
                     -->
                </div>
               @if ( !$loop->last ) 
                  <!-- <hr> BAD PRACTICE -->
                @endif
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <img src="{{ asset('imagini/' . basename($mess->imagine)) }}" height="600" width="600"/>
            <h1> {{ $mess->title }} </h1>
            <p class="jumbotron">  {{ $mess->content }} </p>
            <hr/>
            <p> Postat la: {{ $mess->category->nume }}  </p>
        </div>
    </div>
    <div class="row">
        <div id="comment-form" class="col-md-8 offset-md-2"> 
            {{ Form::open(array('route' => ['comentarii.store', $mess->id], 'method' => 'POST' )) }}
            <div class="row">
                <div class="col-md-6">
                {{ Form::label('nume', "Nume: ") }}
                {{ Form::text('nume', null, ['class'=>'form-control']) }}
                </div>
                <div class="col-md-6">
                {{ Form::label('email', "Email: ") }}
                {{ Form::text('email', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                {{ Form::label('comentariu', "Comentariu: ") }}
                {{ Form::textarea('comentariu', null, ['class'=>'form-control', 'rows' => '5']) }}
                </div>
            </div>
            {{ Form::submit('Adauga Comentariu', ['class' => 'btn btn-success btn-block', 
                     'style' => 'margin-top:15px;']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop