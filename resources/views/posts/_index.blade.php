@extends('layouts.app')
@section('content')
@push('custom-styles')
{{-- <link href="{{ asset('css/comments.css') }}" rel="stylesheet"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="jquery-comments/css/jquery-comments.css">
<link href="{{ asset('css/comments.css') }}" rel="stylesheet">
@endpush
<div class="container">
    <div class="card mt-5">
        <div class="d-flex justify-content-center row p-2">
         <div class="col">
           <div class="d-flex flex-column comment-section">
               <div class="bg-white p-2">
                   <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                       <div class="d-flex flex-column justify-content-start" style="margin-left: 10px;"><span class="d-block font-weight-bold name">Rahi</span><span class="date text-black-50">22 Min Ago</span></div>
                   </div>
                   <div class="mt-2">
                       <p class="" style="margin: 0px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <a href="">Read More</a></p>
                   </div>
               </div>
               <div class="bg-white">
                   <div class="d-flex flex-row fs-12">
                       <div class="like p-2 cursor"><i class="fa fa-thumbs-up" style="margin-right: 5px;"></i><span class="ml-1">Like</span></div>
                       <div class="like p-2 cursor comments_icon"><i class="fa fa-commenting-o" style="margin-right: 5px;"></i><span class="ml-1">Comments</span></div>
                       <div class="like p-2 cursor"><i class="fa fa-share" style="margin-right: 5px;"></i><span class="ml-1">Share</span></div>
                   </div>
               </div>
            <div id= "comments-container"></div>
       </div>
   </div>
</div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="jquery-comments/js/jquery-comments.js"></script>
<script>
    $('#comments-container').comments({
  profilePictureURL: 'https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png',
  enableNavigation: false,
  
  getComments: function(success, error) {
    var commentsArray = [{
      id: 1,
      created: '2015-10-01',
      content: 'Lorem ipsum dolort sit amet',
      fullname: 'Simon Powell',
      upvote_count: 4,
    }];
    success(commentsArray);
  }
});
</script>

@endpush