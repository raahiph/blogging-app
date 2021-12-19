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
                   <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                       <div class="d-flex flex-column justify-content-start" style="margin-left: 10px;"><span class="d-block font-weight-bold name">{{ucfirst($comment->body)}}</span><span class="date text-black-50">{{$comment->created_at->diffForHumans()}}, Posted By: demo</span></div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
    @foreach ($comment->replies as $reply)
       @include('layouts.comment', ['comment' => $reply])  
    @endforeach
    <div class="card mt-3" style="background: white;">
       <div class="bg-light p-2">
            <form action="/comment/{{$comment->id}}/reply" method="post">
                @csrf
                <div class="d-flex flex-row align-items-start">
                <img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                 <textarea class="form-control ml-1 shadow-none textarea" name="reply_body" style="margin-left: 5px;"></textarea>
                </div>
                <input type="hidden" name="post_id" value="{{$comment->post->id}}">
                <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">Post Reply</button>
            </form>
           <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Back</button></div>
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