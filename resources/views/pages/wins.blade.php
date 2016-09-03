@extends('backpack::app')

@section('content')

      <div class="title">League Wins</div>
      <div>
          <wins-graph :player="{{ json_encode($cody)}}"
                      :opponent="{{ json_encode($angel) }}">

          </wins-graph>
      </div>

@stop
