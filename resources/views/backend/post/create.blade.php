@extends('layouts.master')@section('title') Create Post @endsection @section('content')
<section class="content">
    <div class="card-header py-2">
        <div class="mr-auto p-2 bd-highlight">
            <h3>Add New Post</h3>
        </div>
    </div>
    <div class="container-fluid">
        <form class="m-3" action="/post/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>User ID</label>
                <input type="number" class="form-control" name="user_id" id="" placeholder="Enter User ID" required>
            </div>
            <div class="form-group col-md-5">
                <label for="inputState">Category ID</label>
                <select id="inputState" class="form-control" name="cat_id">
                  <option selected disabled>Choose</option>
                  @foreach($category_id as $items)
                  <option>{{$items->id}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" id="" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label>Title Discription</label>
                <input type="text" class="form-control" name="title_discription" id="" placeholder="Enter Title Discription" required>
            </div>
            <div class="form-group">
                <label>Upload Thumbnail</label>
                <input type="file" class="form-control" name="thumbnail" id="" required>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" class="form-control" name="full_image" id="" required>
            </div>
            <div class="form-group">
                <label>Details</label>
                <textarea class="form-control" id="" name="detail" rows="3" placeholder="Enter Details" required></textarea>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input type="text" class="form-control" name="tags" id="" placeholder="Enter Tags" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Post</button>

            <a href="/post/index" class="btn btn-secondary">Back</a>
        </form>
    </div>
</section>
@endsection