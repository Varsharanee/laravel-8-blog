@extends('layouts.master')@section('title') View Post @endsection @section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card-header py-2">
            <div class="mr-auto p-2 bd-highlight">
                <h3>Show Post</h3>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>ID: </th>
                <td>{{$postData['id']}}</td>
            </tr>
            <tr>
                <th>User ID: </th>
                <td>{{$postData->user_id}}</td>
            </tr>
            <tr>
                <th>Category ID: </th>
                <td>{{$postData->cat_id}}</td>
            </tr>
            <tr>
                <th>Title: </th>
                <td>{{$postData->title}}</td>
            </tr>
            <tr>
                <th>Title Discription</th>
                <td>{{$postData->title_discription}}</td>
            </tr>
            <tr>
                <th>Thumbnail: </th>
                <td>
                    <img height="80px" width="80px" src="{{asset('uploads/thumbnail_image/'.$postData->thumbnail)}}" alt="{{$postData->thumbnail}}">
                </td>
            </tr>
            <tr>
                <th>Post Image: </th>
                <td>
                    <img height="80px" width="80px" src="{{asset('uploads/post_image/'.$postData->full_image)}}" alt="{{$postData->full_image}}">
                </td>
            </tr>
            <tr>
                <th>Details: </th>
                <td>{{$postData->detail}}</td>
            </tr>
            <tr>
                <th>Tags: </th>
                <td>{{$postData->tags}}</td>
            </tr>
        </table>
    </div>
    <a href="{{url('/post/index')}}"><button type="button" class="btn btn-info">Back To Post Table</button></a>
</section>
@endsection