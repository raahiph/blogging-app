 <div class="card mt-5">
            <div class="d-flex justify-content-center row p-2">
             <div class="col">
               <div class="d-flex flex-column comment-section">
                   <div class="bg-white p-2">
                       <div class="d-flex flex-row user-info">
                           {{-- <img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"> --}}
                           <div class="d-flex flex-column justify-content-start" style="margin-left: 10px;"><span class="d-block font-weight-bold name"><a href="/post/{{$post->id}}">{{ucfirst($post->title)}}</a></span><span class="date text-black-50">{{$post->created_at->diffForHumans()}}, Posted By - {{ucfirst($post->user->name)}}</span></div>
                       </div>
                       <div class="mt-2">
                        <p class="" style="margin: 0px;">
                         {{-- {{  $post->description }} <a href="">j</a> --}}
                         {!! ucfirst(Str::limit( $post->description,  500 , $end =  "...   <a href = '/post/$post->id'>Read More</a>")) !!}
                        </p>
                       </div>
                   </div>
                   <div class="bg-white">
                       <div class="d-flex flex-row fs-12">
                           <div class="like p-2 cursor" onclick="$('form#myForm-'+{{$post->id}}).submit();"><i class="fa  {{$post->likes()->where('user_id',Auth::user()->id)->first() ? 'fa-thumbs-up' : 'fa-thumbs-o-up'}} " style="margin-right: 5px;"></i><span class="ml-1">Like ({{count($post->likes)}}) </span></div>
                           <form action="/post/{{$post->id}}/like" method="post" id="myForm-{{$post->id}}">
                            @csrf
                            </form>
                           <div class="like p-2 cursor comments_icon"><i class="fa fa-commenting-o" style="margin-right: 5px;"></i><span class="ml-1">Comments ({{count($post->comments)}})</span></div>
                           <div class="like p-2 cursor"><i class="fa fa-share" style="margin-right: 5px;"></i><span class="ml-1">Share</span></div>
                       </div>
                   </div>
                   <div class="comments">
                    <?php $i = 0; ?>
                    @foreach ($post->comments as $comment)
                    <?php if($i == 2){break;} ?>
                    @include('layouts.comment', ['comment' => $comment])  
                    <?php $i++; ?>
                    @endforeach
                    @if (count($post->comments) > 2)
                    <div class="like p-2 cursor" onclick="window.location = '/post/{{$post->id}}'" style="margin-left: 50px;">
                        <i class="fa fa-eye" style="margin-right: 5px;"></i>
                        <span class="ml-1">Show More</span>
                    </div> 
                    @endif
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
    </div>
