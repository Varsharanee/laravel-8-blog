@extends('layouts.master')@section('title') Create Post @endsection @section('content')
<section class="content m-3">
    <div class="card-header py-2">
        <div class="mr-auto p-2 bd-highlight m-2">
            <h3>Add New Post</h3>
        </div>
    </div>
    <div class="container-fluid">
        <form class="m-2" action="/post/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label>Title Discription</label>
                <textarea class="form-control" name="title_discription" rows="2" placeholder="Enter Title Discription"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="inputState">Select Category</label>
                <select id="inputState" class="form-control" name="cat_id">
                    <option selected disabled>Choose</option>
                    @foreach($category_data as $items)
                    <option value="{{$items->id}}">{{$items->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Upload Thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Upload Image</label>
                    <input type="file" class="form-control" name="full_image" required>
                </div>
            </div>
            <div class="form-group">
                <label>Details</label>
                <textarea class="form-control" name="detail" rows="5" placeholder="Enter Details"
                    required></textarea>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input type="text" class="form-control" name="tags" placeholder="Enter Tags" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Post</button>
            <a href="/post/index" class="btn btn-secondary">Back</a>
        </form>
    </div>
</section>
@endsection