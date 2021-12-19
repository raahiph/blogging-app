@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Post Title</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td><a href="/post/{{$post->id}}">{{$post->title}}</a></td>
            <td>{{date_format($post->updated_at,'d-m-Y')}}</td>
            <td>
                <a class="btn btn-primary" href="/edit-post/{{$post->id}}">Edit</a>
                <a class="btn btn-danger" onclick="$('#deletePostForm-'+{{$post->id}}+'').submit()">Delete</a>
                <form action="/post/{{$post->id}}" method="post" id="deletePostForm-{{$post->id}}">
                  @csrf
                  @method('DELETE')
                </form>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
