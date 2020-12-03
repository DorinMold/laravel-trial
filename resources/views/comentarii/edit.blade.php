@extends('layouts.app')

@section('titlu' ,'Editare Comentariu')

@section('continut')
    <div class="container">
        <div class="row">
            <h2 class="col-md-8 offse-md-2">Editare Comentariu</h2>

            {{ Form::model($comentariu, ['route' => ['comentarii.actualizare', $comentariu->id], 'method' => 'PUT', 'class' => 'w-75']) }}
                {{ Form::label('name','Nume: ') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
                {{ Form::label('email', 'Email: ') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
                {{ Form::label('comentariu', 'Comentariu: ') }}
                {{ Form::textarea('comentariu', null, ['class' => 'form-control', 'rows' => '5']) }}

                {{ Form::submit('Actualizeaza Comentariu' , ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
