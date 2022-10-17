@extends('layouts.master')@section('title') Edit Category @endsection @section('content')
<section class="content">
    <div class="card-header my-2">
        <div class="mr-auto p-2 bd-highlight">
            <h3>Update Category</h3>
        </div>
    </div>
    <div class="container-fluid">
        <form class="m-3" action="/category/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="hidden" class="form-control" name="id" value="{{$category->id}}">
                <input type="text" class="form-control" name="title" value="{{$category['title']}}">
            </div>
            <div class="form-group">
                <label>Details</label>
                <textarea class="form-control" name="details" rows="3">{{$category->details}}</textarea>
            </div>
            <div class="form-group">
                <label>Your Image</label><br>
                <img src="{{asset('uploads/category_image/'.$category->image)}}" height="150px" width="200px" alt="{{$category->image}}"><br>   
                <div class="my-2">
                    <a href="{{asset('uploads/category_image/'.$category->image)}}" class="btn btn-info" download="">Download Image</a>
                </div>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" class="form-control" name="image" value="{{$category['image']}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/category/index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection