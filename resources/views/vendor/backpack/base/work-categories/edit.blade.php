@extends('backpack::layout')

@section('content')

   <h1>Edit Project Category</h1>

   <div class="col-sm-6">

      {!!  Form::model($project_category, ['method'=>'PATCH','action'=>['AdminControllers\ProjectCategoriesController@update', $project_category->id]]) !!}
            <div class="form-group">
               {!! Form::label('name', 'Name:') !!}
               {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
               {!! Form::submit('Update Project Category', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
         {!! Form::close() !!}

         {!!  Form::open( ['method'=>'DELETE','action'=>['AdminControllers\ProjectCategoriesController@destroy', $project_category->id]]) !!}

               <div class="form-group">
                  {!! Form::submit('Delete Project Category', ['class'=>'btn btn-danger col-sm-6']) !!}
               </div>
            {!! Form::close() !!}

   </div>

@stop
