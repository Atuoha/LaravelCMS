@extends('layouts.admin')

@section('title') Post View @endsection


@section('content')
@if($post)

    <div style="float:right">
   <img class="img-rounded" width="100" src="{{$post->photo != '' ? $post->photo->name : '/images/default.png'}}" alt="">
   <h4>Post: {{ $post->title }}</h4>
   </div>

<br>
    <table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $post->id }}</td>
            </tr> 
                
                <tr>
                    <th>Category</th>
                    <td>{{ $post->category->name }}</td>
                </tr> 
            
                <tr>
                <th>Title</th>
                <td>{{ $post->title }}</td>
                </tr>

                <tr>   
                <th>Body</th>
                <td>{{ $post->body }}</td>
                </tr>

                <tr>
                <th>Author</th>
                <td>{{ $post->user != '' ? $post->user->name : 'Post has no author' }}</td>
                </tr>

                <tr>
                <th>Status</th>
                <td> {{$post->status == 1 ? 'Active' : 'Not Active'}}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Delete Action</th>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id] ]) !!}

                        {!! Form::submit('Delete post',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                </tr>  

                <tr>
                <th>Edit post</th>
                <td><a class="btn btn-primary" href="{{ route('posts.edit', $post->id)}}">Edit post</a></td>
                </tr>


        <tbody>
    </table>
    
 @endif
    


@stop