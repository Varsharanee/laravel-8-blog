@extends('frontend.master')@section('title') Create Category @endsection @section('content')
<div>
    <div class="" id="">
        <h1> <img class="post_img" src="{{asset('uploads/thumbnail_image/'.$detail_post->thumbnail)}}" alt="{{$detail_post->title}}"><br></h1>
    </div>
</div>

<!-- Post Content-->
<article>
    <div class="m-5 justify-content-center">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="post-preview">
            <h1 class="post-title">{{$detail_post->title}}</h1>
            <img class="post-img" src="{{asset('uploads/post_image/'.$detail_post->full_image)}}" alt="{{$detail_post->title}}">
            <h4 class="post-subtitle mt-5">{{$detail_post->title_discription}}</h4>
            <div class="row mt-5">
                <div class="col-sm-1"><i class="fa-solid fa-clock"></i></div>
                <div class="col-sm-3">{{$detail_post->created_at}}</div>
            </div>
            <p class="post-subtitle">{{$detail_post->detail}}</p>
            <p class="">{{$detail_post->tags}}</p>
        </div>
        <!-- Add Comment -->
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif @auth
        <div class="my-5">
            <h3>Comment Section</h3>
            <form id="contactForm" method="POST" action="{{url('save-comment/'.Str::slug($detail_post->title).'/'.$detail_post->id)}}">
                @csrf
                <div class="form-floating">
                    <textarea name="comment" class="form-control" id="message" placeholder="Enter your message here..." style="height: 5rem" data-sb-validations="required"></textarea>
                    <input type="submit" class="btn btn-primary mt-2" />
                </div>
            </form>
        </div>
        @endif
        <!-- Fetch Comment -->
        <div class="card my-4">
            <h5 class="card-header">Comments <span class="badge rounded-pill bg-dark">{{count($detail_post->comments)}}</span></h5>
            <div class="card-body">
                @if(count($detail_post->comments)>0) @foreach($detail_post->comments as $comment)
                <blockquote class="blockquote">
                    <p class="mb-0">{{$comment->comment}}</p>
                    @if($comment->user_id==0)
                    <footer class="blockquote-footer">Admin</footer>
                    @else
                    <footer class="blockquote-footer">{{$comment->user->name}}</footer>
                    @endif
                </blockquote>
                <hr> @endforeach @else
                <blockquote class="blockquote">
                    <p class="mb-0">No Comment Yet</p>
                </blockquote>
                @endif
            </div>
        </div>
    </div>
    </div>
</article>
@endsection