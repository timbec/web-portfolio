@extends('backpack::layout')

@section('content')
   <h1>Works Admin</h1>
   
   <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Body</th>
        <th>Tags</th>
        <th>Created At</th>
        <th>Updated On</th>
      </tr>
    </thead>
    <tbody>

   @if($works)
  
   @foreach($works as $work)
       <tr>
               <td>{{ $work->id }}</td>
               <td>{{ $work->user->name }}</td>
               <td>{{ $work->title }}</td>
               <td>{{ str_limit($work->body, 25) }}</td>
               <td>
            @foreach ($work->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
               </td>
               <td>{{ $work->created_at->diffForhumans() }}</td>
               <td>{{ $work->updated_at->diffForhumans() }}</td>
              
            </tr>
   @endforeach
   @endif

    </tbody>
  </table>

  <div class="row">
     <div class="col-sm-6 col-sm-offset-6">
        {{ $works->render()}}
     </div>
  </div>
@stop
