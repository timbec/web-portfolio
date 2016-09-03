@extends('backpack::app')

@section('content')
   <h1>Blog Home</h1>

   @if($posts)
      @foreach($posts as $post)
         <figure>
            <a href="{{route('blog.post', $post->slug)}}"><img height="100px" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50*50'}}" alt=""></a>
         </figure>
         <header>
            <h1><a href="{{route('blog.post', $post->slug)}}">{{ $post->title}}</a></h1>
            {{$post->created_at->diffForHumans()}}
            <p>Posted In: {{ $post->category ? $post->category->name : 'Uncategorized'}}</p>
         </header>

      @endforeach
   @endif
   <div class="row">

   </div>
@stop
