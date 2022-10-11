@extends('layouts.master')@section('title') Create Category @endsection @section('content')
<section class="content">
    <div class="card-header py-2">
        <div class="mr-auto p-2 bd-highlight">
            <h3>Add New Category</h3>
        </div>
    </div>
    <div class="container-fluid">
        <form class="m-3" action="/category/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" id="" required placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label>Details</label>
                <textarea class="form-control" id="" name="details" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" class="form-control" name="image" id="" required>
            </div>
            <button type="submit" class="btn btn-primary">Save category</button>

            <a href="/category/index" class="btn btn-secondary">Back</a>
        </form>
    </div>
</section>
@endsection