@extends('layouts.master')@section('title') View Comment @endsection @section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card-header py-2">
            <div class="mr-auto p-2 bd-highlight">
                <h3>Show Comment</h3>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>ID: </th>
                <td>{{$commentData->id}}</td>
            </tr>
            <tr>
                <th>User ID: </th>
                <td>{{$commentData->user_id}}</td>
            </tr>
            <tr>
                <th>User Name: </th>
                <td>{{$commentData->user->name}}</td>
            </tr>
            <tr>
                <th>Post ID: </th>
                <td>{{$commentData->post_id}}</td>
            </tr>
            <tr>
                <th>Comment: </th>
                <td>{{$commentData->comment}}</td>
            </tr>
        </table>
    </div>
    <a href="{{url('/comment/index')}}"><button type="button" class="btn btn-info">Back To Comment Table</button></a>
</section>
@endsection