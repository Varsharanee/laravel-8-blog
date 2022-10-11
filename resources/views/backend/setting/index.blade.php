@extends('layouts.master')@section('title') Create Setting @endsection @section('content')
<section class="content">
    <div class="card-header py-2">
        <div class="mr-auto p-2 bd-highlight">
            <h3>Manage Setting</h3>
        </div>
    </div>
    <div class="container-fluid">
        <form class="m-3" action="/admin/setting" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Comment Auto	Approve</label>
                <input type="text" class="form-control" name="comment_auto" @if($setting) value="{{$setting->comment_auto}}" @endif>
            </div>
            <div class="form-group">
                <label>User Auto Approve</label>
                <input type="text" class="form-control" name="user_auto" @if($setting) value="{{$setting->user_auto}}" @endif>
            </div>
            <div class="form-group">
                <label>Recent Post Limit</label>
                <input type="text" class="form-control" name="recent_limit" @if($setting) value="{{$setting->recent_limit}}" @endif>
            </div>
            <div class="form-group">
                <label>Popular Post Limit	</label>
                <input type="text" class="form-control" name="popular_limit" @if($setting) value="{{$setting->popular_limit}}" @endif>
            </div>
            <div class="form-group">
                <label>Recent Comment Limit	</label>
                <input type="text" class="form-control" name="recent_comment_limit" @if($setting) value="{{$setting->recent_comment_limit}}" @endif>
            </div>
            <button type="submit" class="btn btn-primary">Save setting</button>
        </form>
    </div>
</section>
@endsection