@extends('layouts.app')
@section('content')
@push('custom-styles')
<link href="{{ asset('css/comments.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endpush
<div class="container">
  @foreach ($posts as $post)
  @include('layouts.post', ['post' => $post])
  @endforeach
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