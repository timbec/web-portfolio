@extends('backpack::app')

@section('content')


   @if($work)
   
      <header>
         <h1>{{ $work->title}}</h1>    
      </header>

      <section class="work-content">
          <!--Preview Image-->
          <img class="img-responsive" src="{{ $work->photo ? $work->photo->file : null }}" alt="">
         <p>{!! $work->body !!}</p>
      </section>
      <sidebar>
          <a href="{{ $work->website_link }}">Live Site</a>
      </sidebar>
   @endif
@stop
