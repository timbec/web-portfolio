@extends('backpack::app')

@section('content')

<div class="blog-content">
   @if($post)
   <article class="post">
        <!--<img height="500px" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50*50'}}" alt="">-->
        <header>
            <h1>{{ $post->title}}</h1>
            <time>Posted: {{$post->created_at->diffForHumans()}} </time>

            <cite>In: {{ $post->category ? $post->category->name : 'Uncategorized'}}</cite>
            
        </header>

        <div class="entry-content">
            <!--Preview Image-->
            <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : null }}" alt="">
            <p>{!! $post->body !!}</p>
            <ul>
        </div>
            <ul class="tags">
                <h5>Posted under: </h5>
             @unless($post->tags->isEmpty())
                @foreach($post->tags as $tag)
                    <li>
                    <a href="/tags/{{ $tag->name }}">
                    {{ $tag->name }}
                    </a>
                    </li>
                @endforeach
            @endunless
            </ul>
      </article>
   @endif

   <hr>
   
</div><!--.blog-content-->

<aside class="blog-sidebar">
    <h3>Blog Sidebar</h3>
    <ul class="tag-cloud">
        @foreach($tags as $tag) 
        <li>
            <a href="/tags/{{ $tag->name }}">
            {{ $tag->name }}
            </a>
        </li>
    @endforeach
    </ul>
    <ul>
    <h3>Archives</h3>
    @foreach($archives as $month) 
        <li><a href="/blog/?month={{ $month['month']}}&year={{$month['year']}}">
        {{ $month['month'] . ' ' . $month['year'] }}
        </a></li>
    @endforeach
    </ul>
</aside>
@stop
