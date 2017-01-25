@extends('backpack::layout')

@section('content')
      <h1>Edit Project</h1>
 
      {!! Form::model($project, ['method'=>'PATCH','action'=>['AdminControllers\ProjectsController@update', $project->id], 'files'=>true]) !!}


         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('project_category_id', 'Category:') !!}
            {!! Form::select('project_category_id', array('' => 'Choose Categories') + $project_categories, null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
         </div>


         <div class="form-group">
            {!! Form::label('thumbnail_id', 'Thumbnail:') !!}
            {!! Form::file('thumbnail_id', null, ['class'=>'form-control', 'rows'=>5])!!}
         </div>

         <div class="form-group">
            {!! Form::submit('Edit Project', ['class'=>'btn btn-primary']) !!}
         </div>
      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminControllers\ProjectsController@destroy', $project->id], 'class'=>'pull-right']) !!}

         <div class="form-group">
            {!!Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
         </div>
      {!! Form::close() !!}

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
