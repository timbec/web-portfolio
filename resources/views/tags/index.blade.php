@extends('backpack::app')

@section('content')
   <h1>Tag List</h1>

   <!--{{ $tag }}-->
   @if($posts)
      @foreach($posts as $post)
         <figure>
            <a href="{{route('blog.post', $post->slug)}}"><img height="100px" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50*50'}}" alt=""></a>
         </figure>
         <header>
            <h1><a href="{{route('blog.post', $post->slug)}}">{{ $post->title}}</a></h1>
            {{$post->created_at->diffForHumans()}}
         </header>

      @endforeach
   @endif

   @if($works)
      @foreach($works as $work)
         <figure>
            <a href="{{route('works.work', $work->slug)}}"><img height="100px" src="{{ $work->photo ? $work->photo->file : 'http://placehold.it/50*50'}}" alt=""></a>
         </figure>
         <header>
            <h1><a href="{{route('works.work', $work->slug)}}">{{ $work->title}}</a></h1>
            {{$work->created_at->diffForHumans()}}
         </header>

      @endforeach
   @endif
   <div class="row">

   </div>
@stop
