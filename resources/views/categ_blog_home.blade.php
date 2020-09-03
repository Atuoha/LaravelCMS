@extends('layouts.template')

  
@section('content')
    @if($posts)

        @foreach($posts as $post)
                <!--  Blog Posts -->
               <div class="alert alert-success"> Posts with category name of: {{ $sing_category->name }}</div>
            <h2>
                <a href="{{ route('home.post', $post->slug) }}">{{ Str::title($post->title) }}</a>
            </h2>
            <p class="lead">
                by <a href="{{ route('author.post', $post->user->id) }}">{{ Str::title($post->user->name) }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>
            <hr>
            <img class="img-responsive" src="{{ $post->photo->name }}" alt="">
            <hr>
            <p>{{ Str::limit($post->body, 150) }}</p>
            <a class="btn btn-primary" href="{{ route('home.post', $post->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        @endforeach

    @endif
@stop
             
