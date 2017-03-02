@extends('backpack::layout')

@section('content')
      <h1>Edit Work</h1>
 
      {!! Form::model($work, ['method'=>'PATCH','action'=>['AdminControllers\WorksController@update', $work->id], 'files'=>true]) !!}


         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('work_category_id', 'Category:') !!}
            {!! Form::select('work_category_id', array('' => 'Choose Categories') + $work_categories, null, ['class'=>'form-control'])!!}
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
            {!! Form::submit('Edit Work', ['class'=>'btn btn-primary']) !!}
         </div>
      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminControllers\CaseStudiesController@destroy', $work->id], 'class'=>'pull-right']) !!}

         <div class="form-group">
            {!!Form::submit('Delete Case Study', ['class'=>'btn btn-danger']) !!}
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
