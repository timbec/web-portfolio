@extends('backpack::layout')

@section('content')
   <h1>Works Admin</h1>
   
   <table class="table">
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Id</th>
        <th>Author</th>
        <th>Work Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Skills</th>
        <th>Created At</th>
        <th>Updated On</th>
      </tr>
    </thead>
    <tbody>
   @if($works)
  
   @foreach($works as $work)
       <tr>
               <td><img height="50" src="{{ $work->thumbnail ? $work->thumbnail->file : 'http://placeholder.it' }}" alt=""</td>
               <td>{{ $work->id }}</td>
               <td>{{ $work->user->name }}</td>
               <td>{{ $work->work_category ? $work->work_category->name : 'Uncategorized'}}</td>
               <td>{{ $work->title }}</td>
               <td>{{ str_limit($work->body, 25) }}</td>
               <td>
            @foreach ($work->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
               </td>
               <td>{{ $work->description }}</td>
               <td>{{ $work->created_at->diffForhumans() }}</td>
               <td>{{ $work->updated_at->diffForhumans() }}</td>
               <td><a class="btn btn-primary" href="{{ route('works.edit', $work->id) }}">Edit</a></td>
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
