@extends('layouts.app')
@section('content')
@push('custom-styles')
<link href="{{ asset('css/comments.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endpush
<div class="container">
  

    <div class="card mt-5">
        <div class="d-flex justify-content-center row p-2">
         <div class="col">
           <div class="d-flex flex-column comment-section">
               <div class="bg-white p-2">
                   <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://robohash.org/{{$post->id}}" width="40">
                       <div class="d-flex flex-column justify-content-start" style="margin-left: 10px;"><span class="d-block font-weight-bold name"><a href="/post/{{$post->id}}">{{ucfirst($post->title)}}</a></span><span class="date text-black-50">{{$post->created_at->diffForHumans()}}, {{$post->user->name}}</span></div>
                   </div>
                   <div class="mt-2">
                    <p class="" style="margin: 0px;">
                     {{ $post->description }}</a>
                    </p>
                    @if ($post->image)
                    <img src="/storage/uploads/images/{{$post->image}}" alt="" width="50%">
                    @endif
                   </div>
               </div>
               <div class="bg-white">
                   <div class="d-flex flex-row fs-12">
                    <div class="like p-2 cursor" onclick="$('form#myForm').submit();"><i class="fa  {{$post->likes()->where('user_id',Auth::user()->id)->first() ? 'fa-thumbs-up' : 'fa-thumbs-o-up'}} " style="margin-right: 5px;"></i><span class="ml-1">Like ({{count($post->likes)}}) </span></div>
                    <form action="/post/{{$post->id}}/like" method="post" id="myForm">
                     @csrf
                     </form>
                       <div class="like p-2 cursor "><i class="fa fa-commenting-o" style="margin-right: 5px;"></i><span class="ml-1">Comments ({{count($post->comments)}})</span></div>
                       <div class="like p-2 cursor"><i class="fa fa-share" style="margin-right: 5px;"></i><span class="ml-1">Share</span></div>
                   </div>
               </div>
               <div class="comments">
                @foreach ($post->comments as $comment)
                    @include('layouts.comment', ['comment' => $comment])  
                 @endforeach
               </div>
               <div class="bg-light p-2">
                <form action="/post/comment/{{$post->id}}" method="post">
                    @csrf
                    <div class="d-flex flex-row align-items-start">
                        <img class="rounded-circle" src="https://robohash.org/{{$post->id}}" width="40">
                     <textarea class="form-control ml-1 shadow-none textarea" name="comment_body" style="margin-left: 5px;"></textarea>
                    </div>
                    <div class="mt-2 text-right">
                        <button class="btn btn-primary btn-sm shadow-none" type="submit">Post comment</button>
                </form>
                <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button>
            </div>
           </div>
       </div>
   </div>
</div>
</div>
@endsection
@push('custom-scripts')
<script>
    // $(".reply").on("click", function(){
    //     $(this).parent().parent().next().toggle();
    // })

    $(".cancel-reply").on("click", function(){
        $(".reply_box").hide();
    })

    $(".comments_icon").on("click", function(){
       $(this).parent().parent().next().toggle();
    })
</script>

@endpush