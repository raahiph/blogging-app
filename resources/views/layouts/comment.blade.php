<div class="bg-white p-2 ml-4" style="margin-left: 50px;">
    <div class="d-flex flex-row user-info">
        <img class="rounded-circle" src="https://robohash.org/{{$comment->id}}" width="40">
        <div class="d-flex flex-column justify-content-start" style="margin-left: 10px;">
            <span class="d-block font-weight-bold name">{{ucfirst($comment->user->name)}} <span class="date text-black-50">{{$comment->created_at->diffForHumans()}}</span></span>
            <p class="" style="margin: 0px;">{{ucfirst($comment->body)}}</p>
        </div>
    </div>
    <div class="d-flex flex-row fs-12" style="margin-left: 50px;" >
        <div class="like p-2 cursor" onclick="window.location = '/comment/{{$comment->id}}'">
            <i class="fa fa-share" style="margin-right: 5px;"></i>
            <span class="ml-1 reply">Reply</span>
        </div>
        @if ($comment->user_id == Auth::user()->id)
        <div class="like p-2 cursor" onclick="$('#deleteCommentForm-'+{{$comment->id}}+'').submit()">
            <i class="fa fa-trash" ></i>
            <span class="ml-1 delete">Delete</span>
            <form action="/comment/{{$comment->id}}" method="POST" id="deleteCommentForm-{{$comment->id}}">
                @csrf
                @method('DELETE')
            </form>
        </div>
        @endif
    </div>
  </div>    

  