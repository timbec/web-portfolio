@extends('backpack::app')

@section('content')


   @if($post)
      <img height="500px" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50*50'}}" alt="">
      <header>
         <h1>{{ $post->title}}</h1>
         <p>By: <span>{{ $post->user->name}}</span> Posted: {{$post->created_at->diffForHumans()}} </p>

         <p>Posted In: {{ $post->category ? $post->category->name : 'Uncategorized'}}</p>
      </header>

      <section class="post-content">
         <p>{{ $post->body }}</p>
      </section>
   @endif
@stop
