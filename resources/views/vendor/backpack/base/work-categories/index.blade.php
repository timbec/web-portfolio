@extends('backpack::layout')

@section('content')
   <div class="col-sm-6">
      <h1>Create Work Category</h1>
   {!!  Form::open(['method'=>'POST','action'=>'AdminControllers\WorkCategoriesController@store', 'files'=>true]) !!}
         <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
         </div>
         <div class="form-group">
            {!! Form::submit('Create Work Category', ['class'=>'btn btn-primary']) !!}
         </div>
      {!! Form::close() !!}
   </div>

   <div class="col-sm-6">
      @if($work_categories)
      <table class="table">
         <thead>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Created At:</th>
           </tr>
        </thead>
        <tbody>
           @foreach($work_categories as $work_category)
           <tr>
              <td>{{ $work_category->id}}</td>
              <td><a href="{{route('work-categories.edit', $work_category->id)}}">{{ $work_category->name }}</a></td>
              <td>{{ $work_category->created_at ? $work_category->created_at->diffForHumans() : 'no date'}}</td>
           </tr>
           @endforeach
        </tbody>
        @endif
      </table>

   </div>
@stop
