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
                <label>Title</label>
                <input type="hidden" class="form-control" name="id" value="{{$post->id}}">
                <input type="text" class="form-control" name="title" value="{{$post['title']}}">
            </div>
            <div class="form-group">
                <label for="inputState">Category ID</label>
                <select id="inputState" class="form-control" name="cat_id">
                    <option value="{{$yourCategory->id}}" selected disabled>{{$yourCategory->title}}</option>
                    @foreach($category_id as $items)
                    <option value="{{$items->id}}">{{$items->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Title Discription</label>
                <input type="text" class="form-control" name="title_discription" value="{{$post['title_discription']}}">
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Thumbnail Image</label><br>
                    <img src="{{asset('uploads/thumbnail_image/'.$post->thumbnail)}}" height="70px" width="80px" alt="{{$post->thumbnail}}"><br>   
                    <input type="file" class="form-control mt-3" name="image" value="{{$post['thumbnail']}}">
                </div>
                <div class="form-group col-6">
                    <label>Post Image</label><br>
                    <img src="{{asset('uploads/post_image/'.$post->full_image)}}" height="70px" width="80px" alt="{{$post->full_image}}"><br>   
                    <input type="file" class="form-control mt-3" name="image" value="{{$post['full_image']}}">
                </div>                            
            </div>
            <div class="form-group">
                <label>Details</label>
                <textarea class="form-control" name="detail" rows="3">{{$post->detail}}</textarea>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <textarea class="form-control" name="tags" rows="3">{{$post->tags}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/post/index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection