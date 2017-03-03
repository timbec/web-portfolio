@extends('backpack::app')

@section('content')

<div class="blog-content">
   @if($post)
   <article class="post">
        <!--<img height="500px" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50*50'}}" alt="">-->
        <header>
            <h1>{{ $post->title}}</h1>
            <time>Posted: {{$post->created_at->diffForHumans()}} </time>

            <cite>In: {{ $post->category ? $post->category->name : 'Uncategorized'}}</cite>
            
        </header>

        <div class="entry-content">
            <!--Preview Image-->
            <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : null }}" alt="">
            <p>{!! $post->body !!}</p>
            <ul>
        </div>
            <ul class="tags">
                <h5>Posted under: </h5>
             @unless($post->tags->isEmpty())
                @foreach($post->tags as $tag)
                    <li>
                    <a href="/tags/{{ $tag->name }}">
                    {{ $tag->name }}
                    </a>
                    </li>
                @endforeach
            @endunless
            </ul>
      </article>
   @endif
   <hr>
   <!--Blog Comments-->

   @if(Session::has('comment_message'))

        {{session('comment_message')}}

    @endif

    @if(Auth::check())
   <!--Comments Form-->
   <div class="well">
       <h4>Leave A Comment</h4>

       {!! Form::open(['method'=>'POST', 'action'=> 'AdminControllers\PostCommentsController@store']) !!}

       <input type="hidden" name='post_id' value="{{$post->id}}">

        <div class="form-group">
            {!! Form::label('body', 'Comment:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
   </div>
   @endif

   <hr>
   @if(count($comments)>0)

    @foreach($comments as $comment)
        @if($comment->photo)
        <div class="media">
            <a href="" class="pull-left">
                <img src="{{$comment->photo}}" alt="" class="media">
            </a>
        </div>
        @endif
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->author}}</h4>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
            <p>{{$comment->body}}</p>
            <!--Nested Comment-->
            @if(count($comment->replies) > 0)

                @foreach($comment->replies as $reply)

            <!-- Nested Comment -->
                        <div id="nested-comment" class=" media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>


                            <div class="comment-reply-container">


                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>


                                <div class="comment-reply col-sm-6">


                                    {!! Form::open(['method'=>'POST', 'action'=> 'AdminControllers\CommentRepliesController@store']) !!}
                                <div class="form-group">

                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                    {!! Form::label('body', 'Body:') !!}
                                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                             </div>

                                             <div class="form-group">
                                    {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                             </div>
                                    {!! Form::close() !!}


                                </div>

                          </div>
            <!-- End Nested Comment -->
                </div><!--.comment-reply-container-->
                @endforeach
            @endif
            </div><!--.media-body-->
    @endforeach

   @endif
   
</div><!--.blog-content-->

<aside class="blog-sidebar">
    <h3>Blog Sidebar</h3>
    <ul class="tag-cloud">
        @foreach($tags as $tag) 
        <li>
            <a href="/tags/{{ $tag->name }}">
            {{ $tag->name }}
            </a>
        </li>
    @endforeach
    </ul>
    <ul>
    <h3>Archives</h3>
    @foreach($archives as $month) 
        <li><a href="/blog/?month={{ $month['month']}}&year={{$month['year']}}">
        {{ $month['month'] . ' ' . $month['year'] }}
        </a></li>
    @endforeach
    </ul>
</aside>
@stop
