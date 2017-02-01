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
        <th>Skills</th>
        <th>Created At</th>
        <th>Updated On</th>
      </tr>
    </thead>
    <tbody>
   @if($projects)
  
   @foreach($projects as $project)
       <tr>
               <td><img height="50" src="{{ $project->photo ? $project->photo->file : 'http://placeholder.it' }}" alt=""</td>
               <td>{{ $project->id }}</td>
               <td>{{ $project->user->name }}</td>
               <td>{{ $project->category ? $project->category->name : 'Uncategorized'}}</td>
               <td>{{ $project->title }}</td>
               <td>{{ str_limit($project->body, 25) }}</td>
               <td>
            @foreach ($project->skills as $skill)
                <li>{{ $skill->name }}</li>
            @endforeach
               </td>
               <td>{{ $project->excerpt }}</td>
               <td>{{ $project->created_at->diffForhumans() }}</td>
               <td>{{ $project->updated_at->diffForhumans() }}</td>
               <td><a class="btn btn-primary" href="{{ route('projects.edit', $project->id) }}">Edit</a></td>
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
