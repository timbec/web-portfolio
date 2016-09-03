@extends('backpack::layout')

@section('content')

<div class="row">
   <h1>Edit Category</h1>

   <div class="col-sm-6">
      {!! Form::model([$category, ['method'=>'PATCH','action'=>'AdminControllers\CategoriesController@update', $category->id]]) !!}
           <div class="form-group">
             {!! Form::label('name', 'Category Name:') !!}
             {!! Form::text('name', null, ['class'=>'form-control'])!!}
           </div>

           <div class="form-group">
             {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
           </div>

        {!! Form::close() !!}

        {!!  Form::open( ['method'=>'DELETE','action'=>['AdminControllers\CategoriesController@destroy', $category->id]]) !!}

               <div class="form-group">
                  {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
               </div>
            {!! Form::close() !!}
   </div>

   <div class="col-sm6">

   </div>

</div>

@stop
