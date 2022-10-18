@extends('frontend.master')@section('title') Create Category @endsection @section('content')
<!-- Page Header-->
<header class="masthead">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog by Varsharaniii</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="row container-fluid">
    @foreach($posts as $post)
    <div class="col-sm-3">
        <a href="{{url('post/'.Str::slug($post->title).'/'.$post->id)}}">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('uploads/thumbnail_image/'.$post->thumbnail)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{Illuminate\Support\Str::of($post->title_discription)->limit(50)}}</p>
                </div>
                <p class="m-2">Read More...</p>
            </div>
        </a>
    </div>
    @endforeach
</div>
<!-- Divider-->
<hr class="my-4" /> @endsection