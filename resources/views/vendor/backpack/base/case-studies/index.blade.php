@extends('backpack::layout')

@section('content')
   <h1>Works Admin</h1>
   
   <table class="table">
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Body</th>
        <th>Skills</th>
        <th>Created At</th>
        <th>Updated On</th>
      </tr>
    </thead>
    <tbody>
   @if($casestudies)
   @foreach($casestudies as $casestudy)
       <tr>
               <td><img height="50" src="{{ $casestudy->thumbnail ? $casestudy->thumbnail->file : 'http://placeholder.it' }}" alt=""</td>
               <td>{{ $casestudy->id }}</td>
               <td>{{ $casestudy->user->name }}</td>
               <td>{{ $casestudy->title }}</td>
               <td>{{ str_limit($casestudy->body, 25) }}</td>
               <td>{{ $casestudy->created_at->diffForhumans() }}</td>
               <td>{{ $casestudy->updated_at->diffForhumans() }}</td>
               <td><a class="btn btn-primary" href="{{ route('case-studies.edit', $casestudy->id) }}">Edit</a></td>
            </tr>
   @endforeach
   @endif

    </tbody>
  </table>

  <div class="row">
     <div class="col-sm-6 col-sm-offset-6">
        {{ $casestudies->render()}}
     </div>
  </div>
@stop
