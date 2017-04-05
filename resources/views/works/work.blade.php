@extends('backpack::app')

@section('content')


   @if($work)
   
      <header class="work-single">
         <h1>{{ $work->title}}</h1>    
      </header>

      <section class="work-content">
          <!--Preview Image-->
          <img class="img-responsive" src="{{ $work->photo ? $work->photo->file : null }}" alt="">
         <p>{!! $work->body !!}</p>
      </section>
      <sidebar>
          <p> {!! $work->description !!}</p>
          <a href="{{ $work->website_link }}">Live Site</a>

        <ul class="tag-cloud skills">
        @foreach($tags as $tag) 
        <li>
            <a href="/tags/{{ $tag->name }}">
            {{ $tag->name }}
            </a>
        </li>
    @endforeach
      </sidebar>
   @endif
@stop
