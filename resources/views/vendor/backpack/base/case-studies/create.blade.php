@extends('backpack::layout')

@section('content')
      <h1>Create Case Study</h1>

      {!! Form::open(['method'=>'POST','action'=>'AdminControllers\CaseStudiesController@store', 'files'=>true]) !!}
         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
         </div>


        <div class="form-group">
            {!! Form::label('work_category_id', 'Work Category:') !!}
            {!! Form::select('work_category_id', array('' => 'Choose Work Categories') + $work_categories, null, ['class'=>'form-control'])!!}
         </div>


         <div class="form-group">
            {!! Form::label('thumbnail_id', 'Thumbnail:') !!}
            {!! Form::file('thumbnail_id', null, ['class'=>'form-control', 'rows'=>5])!!}
         </div>

         <div class="form-group">
            {!! Form::label('website_link', 'Website Link:') !!}
            {!! Form::text('website_link', null, ['class'=>'form-control'])!!}
         </div>


         <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            {!! Form::select('tags[]', $tags, null, ['class'=>'form-control', 'multiple'])!!}
         </div>

         <div class="form-group">
            {!! Form::submit('Create Case Study', ['class'=>'btn btn-primary']) !!}
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
