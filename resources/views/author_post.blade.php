@extends('layouts.template')

  
@section('content')
    @if($posts)

        @foreach($posts as $post)
                <!--  Blog Posts -->
               <div class="alert alert-success">Posts authored by: {{ $user->name }}</div>
            <h2>
                <a href="{{ route('home.post', $post->slug) }}">{{ Str::title($post->title) }}</a>
            </h2>
            <p class="lead">
                by {{ Str::title($post->user->name) }}
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
             
