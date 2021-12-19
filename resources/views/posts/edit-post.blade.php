@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="post" action="/post-update/{{$post->id}}" enctype="multipart/form-data">
            @csrf
           <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label">Title</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="title" value="{{$post->title}}" >
            </div>
            <div class="mb-3">
                 <label for="exampleFormControlTextarea1" class="form-label">Small Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" >{{$post->description}}</textarea>
            </div>
            <div class="mb-3"> 
                  <label for="form_image"  class="form-label">Image</label>
                  <input type="file" id="form_image" class="form-control" name="images" accept="image/png, image/jpeg" >
                  <img class="img-thumbnail" src="{{ asset('storage/uploads/images/'.$post->image) }}">
            </div>
            <div class="mb-3">
                   <input type="submit" class="btn btn-primary" >
                  
            </div>
         </form>
    </div>
</div>

@endsection