@extends('backpack::app')

@section('content')
   <h1>Works</h1>

   @if($works)
      @foreach($works as $work)
         
         <header>
            <h1><a href="{{route('works.work', $work->slug)}}">{{ $work->title}}</a></h1>
            {{$work->created_at->diffForHumans()}}
            
         </header>

      @endforeach
   @endif
   <div class="row">

   </div>
@stop
