@extends('backpack::app')

@section('content')


   @if($work)
   
      <header>
         <h1>{{ $work->title}}</h1>
         <p>By: <span>{{ $work->user->name}}</span> worked: {{$work->created_at->diffForHumans()}} </p>

    
      </header>

      <section class="work-content">
         <p>{{ $work->body }}</p>
      </section>
   @endif
@stop
