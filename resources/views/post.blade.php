@extends('layouts.blog-post')

@section('content')
@if($post)

 <!-- Blog Post -->
    <p>
        @if(Auth::check())
            @if(Auth::user()->is_admin())
                <a href="{{ route('posts.edit', $post->slug) }}">Edit Post</a>
            @endif
        @endif
    </p>

        <!-- Title -->
        <h1>{{ Str::title($post->title) }}</h1>

        <!-- Author -->
        <p class="lead">
        by <a href="{{ route('author.post', $post->user->id) }}">{{ Str::title($post->user->name) }}</a>

        </p>
        <hr>
        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>
        <hr>
        <!-- Preview Image -->
        <img class="img-responsive" src="{{ $post->photo->name }}" alt="">
        <hr>
        <!-- Post Content -->
        <p>{{ $post->body }}</p>
        <hr>

        <!-- Blog Comments -->
        @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            @if(session('comment_create'))
                <div class="alert alert-success">{{ session('comment_create') }}</div>
            @endif
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentController@store']) !!}           
                <div class="form-group">
                    {!! Form::label('comment', 'Comment') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}

                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}      
        </div>
        @endif

        <hr>

        <!-- Posted Comments -->
    @if($comments)

        @foreach($comments as $comment)
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                    <img class="media-object img-rounded" width="50" src="{{ $comment->photo == '' ? '/images/default.png' : $comment->photo }}" alt="">
                {{-- <img class="media-object img-circle" width="50" src="{{ Auth::user()->gravatar }}" alt=""> --}}
                
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->author }}
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </h4>
                {{ $comment->body }}

                <a class="reply">Reply</a>

                <script>
                $('.reply').click(function(){
                    $('.reply_form').fadeIn("slow")
                    $('.reply').fadeOut("slow")

                })
                </script>

                <!-- Nested Comment -->
                @if($comment->replies) 
                    @foreach($comment->replies as $reply) 
                    @if($reply->is_active == 1)
                        <div class="media" style="margin-top:40px;">
                            <a class="pull-left" href="#">
                                <img class="media-object img-rounded" width="50" src="{{ $reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"> {{ $reply->author }} 
                                <small>{{ $reply->created_at->diffForHumans() }}</small> 
                                </h4>
                            {{ $reply->reply }} 
                            </div>
                        </div>  
                        @endif   
                    @endforeach
                @endif    

                @if(Auth::check()) 

                @if(session('reply_created'))
                    <div class="alert alert-success">{{ session('reply_created') }}</div>
                @endif
                
                <div class="reply_form">
                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store'])!!}
                    <div class="form-group">
                        {!! Form::label('comment', 'Reply') !!}
                        {!! Form::textarea('reply', null, ['class'=>'form-control', 'rows'=>1]) !!}

                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                        @error('reply')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    </div>

                @endif

                </div>
                <!-- End Nested Comment -->
            </div>
            @endforeach
    @endif

        
    @if(Auth::guest())
        <div class="alert alert-success">Login to comment on this post. Your comment counts :)</div>
    @endif
    

@endif

@stop



<style>
    .reply_form{
        display:none;
    }
    .reply:hover{
        cursor:pointer;
    }
</style>


<script src="{{asset('assets/js/libs/jquery.js')}}"></script>
