@extends('backpack::layout')

@section('content')
   <div class="col-sm-6">
      <h1>Create Tag</h1>
   {!!  Form::open(['method'=>'POST','action'=>'AdminControllers\TagsController@store', 'files'=>true]) !!}
         <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
         </div>
         <div class="form-group">
            {!! Form::submit('Create Tag', ['class'=>'btn btn-primary']) !!}
         </div>
      {!! Form::close() !!}
   </div>

   <div class="col-sm-6">
      @if($tags)
      <table class="table">
         <thead>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Created At:</th>
           </tr>
        </thead>
        <tbody>
           @foreach($tags as $tag)
           <tr>
              <td>{{ $tag->id}}</td>
              <td><a href="{{route('work-categories.edit', $tag->id)}}">{{ $tag->name }}</a></td>
              <td>{{ $tag->created_at ? $tag->created_at->diffForHumans() : 'no date'}}</td>
           </tr>
           @endforeach
        </tbody>
        @endif
      </table>

   </div>
@stop
