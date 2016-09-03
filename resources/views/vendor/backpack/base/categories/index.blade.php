@extends('backpack::layout')

@section('content')

<div class="row">
   <h1>All Categories</h1>

   <div class="col-sm-6">
      {!! Form::open(['method'=>'POST','action'=>'AdminControllers\CategoriesController@store']) !!}
           <div class="form-group">
             {!! Form::label('name', 'Category Name:') !!}
             {!! Form::text('name', null, ['class'=>'form-control'])!!}
           </div>

           <div class="form-group">
             {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
           </div>

        {!! Form::close() !!}

   </div>

   @if($categories)
   <div class="col-sm-6">
      <table class="table">
         <thead>
            <tr>
               <th>id</th>
               <th>Name</th>
               <th>Created date</th>
            </tr>
         </thead>
         <tbody>
            @foreach($categories as $category)
            <tr>
               <td>{{ $category->id }}</td>
               <td>{{ $category->name }}</td>
               <td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'no date' }}</td>
               <td> <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach
         </tbody>

      </table>
   </div>
   @endif
</div>

@stop
