@extends('backpack::layout')

@section('after_styles')

@stop
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@section('content')

   <h1>Upload Photos</h1>

   {!! Form::open(['method'=>'POST','action'=>'AdminControllers\MediaController@store', 'class'=>'dropzone']) !!}

     {!! Form::close() !!}



@stop


@section('after_scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@stop
