@extends('layouts.app')

@section('title', '| Toate Categoriile')

@section('continut')

@if ( Session::get('mesaj') )

    <p class="lead card p-4 mx-3 text-success font-weight-bold"> {{ Session::get('mesaj') }}</p>

@endif

<div class="p-2">
    <div class="row">
        <div class="col-md-8">
            <h2>Categorii</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nume</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td> {{ $category->id }} </td>
                            <td> {{ $category->nume }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-dark text-white col-md-3">
            <div class="p-3">
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    <h3> Categorie Noua </h3>

                    {{ Form::label('nume', 'Nume: ') }}

                    {{ Form::text('nume', null, ['class' => 'form-control']) }}

                    <br />

                    {{ Form::submit('Creaza o categorie noua',['class'=> ['form-control', 'btn', 'btn-warning']]) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection