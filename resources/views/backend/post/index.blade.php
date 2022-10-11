@extends('layouts.master') @section('title') All Post @endsection @section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card-header py-2">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <h3>Post Table</h3>
                </div>

                <div class="p-2 bd-highlight"> <a href="/post/create" class="btn btn-primary"><i
                            class="fa fa-plus" aria-hidden="true"></i> Add Post</a></div>
            </div>
        </div>

        <table class="table m-5">
            <thead>
                <tr>
                    <th scope="col">Post ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Cat ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Post Image</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            @foreach($post as $items)
            <tbody>
                <td>{{$items->id}}</td>
                <td>{{$items->user_id}}</td>
                <td>{{$items->cat_id}}</td>
                <td>{{$items->title}}</td>
                <td>
                    <img height="40px" width="40px" src="{{asset('uploads/thumbnail_image/'.$items->thumbnail)}}" alt="{{$items->thumbnail}}">
                </td>
                <td>
                    <img height="40px" width="40px" src="{{asset('uploads/post_image/'.$items->full_image)}}" alt="{{$items->full_image}}">
                </td>
                <td>{{$items->tags}}</td>
                <td>
                    <a href="{{ " /post/edit/ ".$items[ 'id']}}"><i class="fa-solid fa-pen mx-3"></i></a></i>
                    <a href={{ "/post/show/".$items[ 'id']}}><i class="fa-solid fa-eye mx-3"></i></i></a></i>
                    <a href="{{ " /post/destroy/ ".$items[ 'id']}}"><i class="fa-solid fa-trash-can mx-3"></i></i></a></i>
                </td>

            </tbody>
            @endforeach
        </table>
    </div>
</section>
@endsection