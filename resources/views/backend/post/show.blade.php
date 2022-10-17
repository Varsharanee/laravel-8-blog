@extends('layouts.master')@section('title') View Post @endsection @section('content')
<section class="content">
    <div class="container-fluid m-1">
        <div class="card-header py-2">
            <div class="mr-auto p-2 bd-highlight">
                <h3>Show Post</h3>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>ID: </th>
                <td>{{$post->id}}</td>
            </tr>
            <tr>
                <th>Category: </th>
                <td>{{$post->ctitle}}</td>
            </tr>
            <tr>
                <th>Title: </th>
                <td>{{$post->title}}</td>
            </tr>
            <tr>
                <th>Title Discription</th>
                <td>{{$post->title_discription}}</td>
            </tr>
            <tr>
                <th>Thumbnail: </th>
                <td>
                    <img height="80px" width="80px" src="{{asset('uploads/thumbnail_image/'.$post->thumbnail)}}"
                        alt="{{$post->thumbnail}}">
                </td>
            </tr>
            <tr>
                <th>Post Image: </th>
                <td>
                    <img height="80px" width="80px" src="{{asset('uploads/post_image/'.$post->full_image)}}"
                        alt="{{$post->full_image}}">
                </td>
            </tr>
            <tr>
                <th>Details: </th>
                <td>{{$post->detail}}</td>
            </tr>
            <tr>
                <th>Tags: </th>
                <td>{{$post->tags}}</td>
            </tr>
            <tr>
                <th>Comments: </th>
                <td>
                    @foreach($Comments as $key => $item)
                    {{$key+1}} :   {{$item->comment}}, 
                    @endforeach
                </td>
            </tr>
        </table>
        <a class="mx-3" href="{{url('/post/index')}}"><button type="button" class="btn btn-info">Back</button></a>
    </div>
</section>
@endsection