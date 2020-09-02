@extends('layouts.admin')

@section('title') Media @stop 

@section('content')

@if(session('upload_img'))

<div class="alert alert-success">{{ session('upload_img')}}</div>

@endif

@if(session('del_img'))
<div class="alert alert-success">{{ session('del_img')}}</div>
@endif

@if(session('noAction'))
<div class="alert alert-danger">{{ session('noAction')}}</div>
@endif
 
     <h1>All Image Uploads</h1>

    <form action="/admin/delete/media " method="post">
     {{ csrf_field() }}

     {{ method_field('delete') }}

    @if($photos)

    <br>
    
    <div class="form-group col-md-5">
        <select class="form-control" required name="action" id="" placeholder="Select Action">
            <option>Select Action</option>
            <option  value="delete">Delete</option>
        </select>

    @error('action')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror

    </div>
    
    <button type="submit" class="btn btn-danger">Delete Capture(s)</button>
    <a class="btn btn-success" href="{{ route('media.create') }}"> Upload a new Capture </a>

    <br>
    <br>
    <table class="table table-responsive table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th><input type="checkbox" name="" id="options" value=""></th>
                <th>Id</th>
                <th>Capture</th>
                <th>Created</th>
                <th>Action</th>



            </tr>
        </thead>

        <tbody>

        @foreach($photos as $photo)
            <tr>
            <td><input type="checkbox" name="checkboxArray[]" class="checkboxes" value="{{ $photo->id }}"></td>
            </form>
            <td>{{ $photo->id }}</td>
            <td><img width="100" id="photo" src="{{ $photo->name}}"></td>
            <td>{{ $photo->created_at->diffForHumans() }}</td>
            <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['MediaController@destroy', $photo->id] ]) !!}
                    {!! Form::submit('Delete Capture', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
            </tr>
        @endforeach

</tbody>
</table>
    @endif

    <div class="row">
        <div class="col-sm-6 col-offset-sm-5">
            {{ $photos->links() }}
        </div> 
    </div>

@stop 

<script src="{{asset('assets/js/libs/jquery.js')}}"></script>

<script>
   $(document).ready(function(){
       $('#options').click(function(){
          if(this.checked){
              $('.checkboxes').each(function(){
                  this.checked = true;
              });
          }else{
            $('.checkboxes').each(function(){
                  this.checked = false;
              });
          }
       })
   })
</script>