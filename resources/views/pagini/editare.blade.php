@extends('layouts.app')

@section('titlu', 'editare')

@section('stylesheet')

	{!! Html::style('css/select2.min.css') !!}

    {!! Html::style('css/select2.min.css') !!}
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
	tinymce.init({
		selector: "textarea",  // change this value according to your HTML
		plugins: "link code",
		menubar: false
	//	menubar: "insert",
	//	toolbar: "link"
	});
	</script>

@endsection

@section('continut')
<div class="row">
<pre>
<div> {{ $errors->first('content') }} </div>
</pre>

{!! Form::model($post,['route' => ['post.actualizare', $post->id], 'class' => 'col-sm-12','files'=>true]) !!}
    <div class="container">    
        <div class="row">
            <div class="col-md-8">
            {{ Form::label('title',"Title:") }}
            {{ Form::text('title', $post->nume, ['class' => 'form-control']) }}  <!-- null se refera la placeholder -->
            <!-- mai sus, title trebuie sa fie ca $post->title, deci tb sa aiba denumirea coloanei -->
            {!! Form::label('slug', "Slug: ", ['class' => 'mt-3'] ) !!}
            {!! Form::text('slug', $post->slug, ['class' => 'form-control']) !!} 

            {{ Form::label('category_id', "Categorie: ", ['class' => 'mt-3'] ) }}
            {{ Form::select('category_id', $catgs, null, [ 'class' => 'form-control' ] ) }}

            <!-- mai sus $catgs este o pereche de key si val din controller care se imparte in value <option value>
               si ceea ce apare (se afiseaza) in cadrul <select/> la fiecare <option>
             -->

            {{ Form::label('taguri', 'Taguri: ', ['class' => 'mt-3']) }}
            <!-- Form::select('tags[]', $tags, '' , ['class' => 'select2-multi form-control', 'multiple' => 'multiple']) -->

            <select class="form-control select2-multi" name="taguri[]" multiple="multiple" > <!-- category_id the column name of the table messages   -->
					
			@foreach($taguri as $tag)
				<option value="{{ $tag->id }}"> {{ $tag->nume }} </option>
			@endforeach
				
            </select>
            
            {{ Form::label('imagine_prim', 'Actualizeaza poza:', ['class' => ['d-block','mt-3', 'lead']]) }}
            {{ Form::file('imagine_prim') }}

            <div id="backend-comments" style="margin-top: 50px;">
                <h3> Comentarii <small>{{ $post->comentarii->count() }} (total)</small></h3>
                <table class="table "> 
                    <thead>
                        <tr>
                            <th>
                                Nume
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Comentariu
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comentarii as $comentariu)
                            <tr>
                                <td> {{ $comentariu->name }}</td>
                                <td> {{ $comentariu->email }}</td>
                                <td> {{ $comentariu->comentariu }}</td>
                                <td> 
                                    <a href="{{ route('comentarii.editare', $comentariu->id) }}" class="btn btn-xs btn-primary">Edit</a>   <!-- ar fi trebuit si un glyphicon dar nu merge -->
                                    <a href="{{ route('comentarii.sterge', $comentariu->id) }}" class="btn btn-xs btn-danger">Sterge</a>   <!-- ar fi trebuit si un glyphicon dar nu merge -->
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ Form::label('title',"Continut:", ['class' => 'mt-3']) }}
            {{ Form::textarea('content', null,['class' => 'form-control']) }}   <!-- null se refera la marime -->
                <h1> {{ $post->nume }}  </h1>
                <p class="lead"> {!! $post->content !!} </p> <!-- aici se scoate strip_tags() prin ...!!}  -->
            </div>

            <div class="col-md-4">
                <dl class="dl-horizontal"> 
                    <dt> Creat la: </dt>
                    <dd> {{ date('M j, Y h:i', strtotime($post->created_at)) }} </dd>
                </dl>
                <dl class="dl-horizontal"> 
                    <dt> Category </dt>
                    <dd> {{ $post->category->nume }} </dd>
                </dl>
                <dl class="dl-horizontal"> 
                    <dt> Actualizat la: </dt>
                    <dd> {{ date('M j, Y h:i', strtotime($post->updated_at)) }} </dd>
                </dl>
                <hr/>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel', array($post->id), ['class'=> 'btn btn-danger btn-block']) !!}
                    </div>
                    <div class="col-sm-6">

                    <!-- <button type="submit" class="btn btn-success" role="button">
                        Salveaza
                    </button> -->
                        {{ Form::submit("Salveaza",['class'=>'btn btn-success']) }}
                        <!-- {!! Html::linkRoute('posts.show','Actualizare', array($post->id), ['class'=> 'btn btn-success btn-block']) !!} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!} 
</div>
@endsection

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script>
	
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
	
	</script>
	
@endsection
