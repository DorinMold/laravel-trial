@extends('principal')

@section('title', "Edit Tag")

@section('continut')

    {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT', 'class' => 'mt-4' ]) }}

        {{ Form::label('nume', "Title") }}
        {{ Form::text('nume', null, ['class' => 'form-control']) }} <!-- 'nume' trebuie sa fie exact ca in 
         tabelul din baza de date -->

        {{ Form::submit('Salveaza schimbarile', ['class' => 'btn btn-success mt-4']) }}

    {{ Form::close() }}

@endsection

