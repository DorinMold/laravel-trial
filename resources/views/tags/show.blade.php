@extends('layouts.app')

@section('titlu', " $tag->nume Tag")

@section('continut')
    <div class="container">
        <div class="row"> 
          @if( Session::get('succes') ) 
              <span class="bg-success p-3 text-white"> {{ Session::get('succes') }}  </span> 
          @endif
        </div>
        <div class="row">
            <div class="col-md-8">
                <h1 class="float-left ml-2">{{ $tag->nume }} Tag  </h1> 
                <small class="mesaj-small ml-3">Nr. Mesaje: {{ $tag->messages()->count() }}</small>
            </div>
            <div class="col-md-2">
                <a class="btn btn-md btn-primary btn-block float-right" href="{{ route('tags.edit', $tag->id) }}">Modifica</a>
            </div>
            <div class="col-md-2">
                {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE' ]) }}

                    {{ Form::submit('Sterge', ['class' => 'btn btn-block btn-danger']) }}

                {!! Form::close() !!}

            </div>
           
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tag->messages as $post)
                            <tr>
                                <td> {{ $post->id }} </td>
                                <td> {{ $post->nume }} </td>
                                <td>  @foreach ( $post->tags as $tag) 
                                    <span class="label label-default px-3 rounded py-1 ml-2"> {{ $tag->nume }} </span>  
                                    @endforeach 
                                </td>
                                <td> <a href="{{ route('posts.show', $post->id ) }}" 
                                        class="btn btn-default btn-sm text-white border-white">Vizualizeaza
                                     </a> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    
    

@endsection