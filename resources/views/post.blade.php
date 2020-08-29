@extends('layouts.blog-post')

@section('content')
@if($post)

 <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ Str::title($post->title) }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ Str::title($post->user->name) }}</a>
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
                        {!! Form::submit('Sumbit', ['class'=>'btn btn-primary']) !!}

                  {!! Form::close() !!}      
                </div>
                @endif

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
              
            @if($comments)

                @foreach($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object img-circle" width="50" src="{{ $comment->photo }}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $comment->author }}
                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                        </h4>
                        {{ $comment->body }}

                        <a id="reply">Reply</a>

                        <!-- Nested Comment -->
                        @if($comment->replies) 
                         @foreach($comment->replies as $reply) 
                        <div class="media" style="margin-top:40px;">
                            <a class="pull-left" href="#">
                                <img class="media-object img-circle" width="50" src="{{ $reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"> {{ $reply->author }} 
                                  <small>{{ $reply->created_at->diffForHumans() }}</small> 
                                </h4>
                              {{ $reply->reply }} 
                            </div>
                        </div>    
                            @endforeach
                        @endif    

                        @if(Auth::check()) 

                        @if(session('reply_created'))
                            <div class="alert alert-success">{{ session('reply_created') }}</div>
                        @endif

                         {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store', 'id'=>"reply_form"])!!}
                            <div class="form-group">
                                {!! Form::label('comment', 'Reply') !!}
                                {!! Form::textarea('reply', null, ['class'=>'form-control', 'rows'=>1]) !!}

                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                                @error('reply')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {!! Form::submit('Sumbit', ['class'=>'btn btn-primary']) !!}
                         {!! Form::close() !!}

                        @endif

                        </div>
                        <!-- End Nested Comment -->
                    </div>
                    @endforeach
            @endif
                </div>

             


            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @if($categories)

                                    @foreach($categories as $category)
                                    <li> <a href="#">{{ $category->name }}</a> </li>
                                    @endforeach

                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->

@endif

@stop