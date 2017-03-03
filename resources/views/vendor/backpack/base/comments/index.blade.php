@extends('backpack::layout')

@section('content')

    @if(count($comments) > 0)

    <h1 class="text-center">Comments</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Comment ID</th>
            <th>Comment Author</th>
            <th>Author Email</th>
            <th>Comment Body</th>
            <th>Post</th>
        </tr>
        </thead>
        
        @foreach($comments as $comment)
        <tbody>
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td><a href="/blog/{{ $comment->post->slug }}">{{ $comment->post->title }}</a></td>

                <td>
                @if($comment->is_active==1)

                {!! Form::open(['method'=>'PATCH', 'action'=> ['AdminControllers\PostCommentsController@update', $comment->id]]) !!}

                <input type="hidden" name="is_active" value="0">

                <div class="form-group">
                    {!! Form::submit('Un-approve', ['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}

                @else

                {!! Form::open(['method'=>'PATCH', 'action'=> ['AdminControllers\PostCommentsController@update', $comment->id]]) !!}

                <input type="hidden" name="is_active" value="1">

                <div class="form-group">
                    {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
                </td>
                @endif
                

                <td>
                {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminControllers\PostCommentsController@destroy', $comment->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
                </td>

            </tr>
        </tbody>
        @endforeach
    </table>
    
    @else 
        <h1 class="text-center">No Comments</h1>
    @endif


@stop