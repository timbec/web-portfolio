@extends('backpack::layout')

@section('content')

   <h1>Posts</h1>
   <table class="table">
      <thead>
         <tr>
            <th>Photo</th>
            <th>ID</th>
            <th>Author</th>
            <th>Category</th>
            <th>Title</th>
            
            <th>Body</th>
            <th>Tag</th>
            <th>Excerpt</th>
            <th>Created At</th>
            <th>Updated At</th>
         </tr>
      </thead>
      <tbody>
         @if($posts)

            @foreach($posts as $post)

            <tr>
               <td><img height="50" src="{{ $post->photo ? $post->photo->file : 'http://placeholder.it' }}" alt=""</td>
               <td>{{ $post->id }}</td>
               <td>{{ $post->user->name }}</td>
               <td>{{ $post->category ? $post->category->name : 'Uncategorized'}}</td>
               <td>{{ $post->title }}</td>
               <td>{{ str_limit($post->body, 25) }}</td>
               <td>
            @foreach ($post->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
               </td>
               <td>{{ $post->excerpt }}</td>
               <td>{{ $post->created_at->diffForhumans() }}</td>
               <td>{{ $post->updated_at->diffForhumans() }}</td>
               <td><a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
            </tr>
            @endforeach
         @endif
      </tbody>
   </table>

   <div class="row">
      <div class="col-sm-6 col-sm-offset-5">
         {{ $posts->render() }}
      </div>
   </div>

@stop
