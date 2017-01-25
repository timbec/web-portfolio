@extends('backpack::layout')

@section('content')
   <h1>Projects Admin</h1>

   <table class="table">
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Project Category</th>
        <th>Body</th>
        <th>Created At</th>
        <th>Updated On</th>
      </tr>
    </thead>
    <tbody>
   @if($projects)
   @foreach($projects as $project)
      <tr>
         <td><img height="50px" src="{{ $project->thumbnail ? $project->thumbnail->file : 'http://placehold.it/50*50'}}" alt=""></td>


        <td>{{ $project->id}}</td>
        <td><a href="{{route('projects.edit', $project->id)}}">{{ $project->title}}</a></td>
        <td>{{ $project->project_category ? $project->project_category->name : 'Uncategorized'}}</td>
        <td>{{ str_limit($project->body, 20)}}</td>
        <td>{{ $project->created_at->diffForHumans()}}</td>
        <td>{{ $project->updated_at->diffForHumans()}}</td>


      </tr>
   @endforeach
   @endif

    </tbody>
  </table>

  <div class="row">
     <div class="col-sm-6 col-sm-offset-6">
        {{ $projects->render()}}
     </div>
  </div>
@stop
