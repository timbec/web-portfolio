@extends('backpack::layout')

@section('content')

   <h1>Edit Post</h1>

 <div class="row">
    <div class="col-sm-3">
      <img src="{{ $post->photo ? $post->photo->file : 'http://placeholder.it' }}" alt="" class="img-responsive">
    </div>

    {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminControllers\PostsController@update', $post->id], 'files'=>true]) !!}
         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
         </div>


         <div class="form-group">
            {!! Form::label('photo_id', 'Thumbnail:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control', 'rows'=>5])!!}
         </div>

         <div class="form-group">
            {!! Form::label('excerpt', 'Excerpt:') !!}
            {!! Form::textarea('excerpt', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::submit('Edit Post', ['class'=>'btn btn-primary']) !!}
         </div>

      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminControllers\PostsController@destroy', $post->id], 'class'=>'pull-right']) !!}

         <div class="form-group">
            {!!Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
         </div>
      {!! Form::close() !!}
 </div>

      @if(count($errors)>0)
      <div class="alert alert-danger">
         <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
         </ul>
      </div>
      @endif

@stop
