@extends('backpack::app')

    @section('content')

<div class="blog-content">
   <h1>Blog Home</h1>

    @if($posts)
        @foreach($posts as $post)
        <article class="post">
            <header class="blog-header">
                <h1><a href="{{route('blog.post', $post->slug)}}">{{ $post->title}}</a></h1>
                <date>{{$post->created_at->toFormattedDateString()}}</date>
            </header>
            <figure class="entry-thumbnail">
                <a href="{{route('blog.post', $post->slug)}}"><img height="100px" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50*50'}}" alt=""></a>
            </figure>
            <div class="entry-summary">
                <p>{{ $post->excerpt }}</p>

                 <cite>Posted In: {{ $post->category ? $post->category->name : 'Uncategorized'}}</cite>
            </div>
        </article>

        @endforeach
    @endif

    {{ $posts->links() }}
    </div><!--.blog-content-->
    
    <aside class="blog-sidebar">
        <h3>Blog Sidebar</h3>
        <p>What to put here</p>

    </aside>
        
    @stop

