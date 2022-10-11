@extends('layouts.master')@section('title') Edit Post @endsection @section('content')
<section class="content">
    <div class="card-header py-2">
        <div class="mr-auto p-2 bd-highlight">
            <h3>Update Post</h3>
        </div>
    </div>
    <div class="container-fluid">
        <form class="m-3" action="/post/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>User ID</label>
                <input type="number" class="form-control" name="user_id" id="" value="{{$post->user_id}}">
            </div>
            <div class="form-group col-md-5">
                <label for="inputState">Category ID</label>
                <select id="inputState" class="form-control" name="cat_id">
                    <option value="" selected>{{$post->cat_id}}</option>
                    @foreach($category_id as $items)
                    <option>{{$items->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="hidden" class="form-control" name="id" value="{{$post->id}}">
                <input type="text" class="form-control" name="title" value="{{$post['title']}}">
            </div>
            <div class="form-group">
                <label>Title Discription</label>
                <input type="text" class="form-control" name="title_discription" value="{{$post['title_discription']}}">
            </div>
            <div class="form-group">
                <label>Upload Thumbnail</label>
                <p class="my-2"><img width="40px" height="40px" src="{{asset('uploads/thumbnail_image')}}/{{$post->thumbnail}}" /></p>
                <input type="hidden" value="{{$post->thumbnail}}" name="thumbnail" />
                <input type="file" name="thumbnail" />
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <p class="my-2"><img width="40px" height="40px" src="{{asset('uploads/post_image')}}/{{$post->full_image}}" /></p>
                <input type="hidden" value="{{$post->full_image}}" name="full_image" />
                <input type="file" name="full_image" />
            </div>
            <div class="form-group">
                <label>Details</label>
                <textarea class="form-control" name="detail" rows="3" value="{{$post->detail}}"></textarea>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <textarea class="form-control" name="tags" rows="3" value="{{$post->tags}}"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Record</button>
            </div>
        </form>
    </div>
</section>
@endsection