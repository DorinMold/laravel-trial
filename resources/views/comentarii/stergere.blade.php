@extends('layouts.app')

@section('titlu', 'Stergere Comentariu')

@section('continut')

    <div class="row">
        <div class="col-md-8 offset-md-2"> <h1> Sigur stergi comentariul? </h1>
        <p><strong>Nume: </strong> {{ $comentariu->nume }}
            <strong>Email: </strong> {{ $comentariu->email }}
            <strong>Comentariu: </strong> {{ $comentariu->comentariu }}
        </p>

        {{ Form::open(['route' => ['comentarii.distrugere', $comentariu->id], 'method' => 'GET']) }}
            {{ Form::submit('Da, Sterge comentariul', ['class' => 'btn btn-lg btn-block btn-danger']) }}
        {{ Form::close() }}
        </div>
    </div>

@stop