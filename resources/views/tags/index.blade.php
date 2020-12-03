@extends('layouts.app')

@section('title', '| Toate Tagurile')

@section('continut')

@if ( Session::get('succes') )

    <p class="lead card p-4 mx-3 text-success font-weight-bold"> {{ Session::get('succes') }}</p>

@endif

<div class="p-2">
    <div class="row">
        <div class="col-md-8">
            <h2>Taguri</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nume</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td> {{ $tag->id }} </td>
                            <td> <a href="{{ route('tags.show', $tag->id) }}"> {{ $tag->nume }} </a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-dark text-white col-md-3">
            <div class="p-3">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                    <h3> Tag Nou </h3>

                    {{ Form::label('nume', 'Nume: ') }}

                    {{ Form::text('nume', null, ['class' => 'form-control']) }}

                    <br />

                    {{ Form::submit('Creaza un tag nou',['class'=> ['form-control', 'btn', 'btn-warning']]) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection