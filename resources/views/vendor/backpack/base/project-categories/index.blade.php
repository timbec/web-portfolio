@extends('backpack::layout')

@section('content')
   <div class="col-sm-6">
      <h1>Create Project Category</h1>
   {!!  Form::open(['method'=>'POST','action'=>'AdminControllers\ProjectCategoriesController@store', 'files'=>true]) !!}
         <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
         </div>
         <div class="form-group">
            {!! Form::submit('Create Project Category', ['class'=>'btn btn-primary']) !!}
         </div>
      {!! Form::close() !!}
   </div>

   <div class="col-sm-6">
      @if($project_categories)
      <table class="table">
         <thead>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Created At:</th>
           </tr>
        </thead>
        <tbody>
           @foreach($project_categories as $project_category)
           <tr>
              <td>{{ $project_category->id}}</td>
              <td><a href="{{route('project-categories.edit', $project_category->id)}}">{{ $project_category->name }}</a></td>
              <td>{{ $project_category->created_at ? $project_category->created_at->diffForHumans() : 'no date'}}</td>
           </tr>
           @endforeach
        </tbody>
        @endif
      </table>

   </div>
@stop
