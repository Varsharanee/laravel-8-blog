@extends('layouts.master')@section('title') View Category @endsection @section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card-header py-2">
            <div class="mr-auto p-2 bd-highlight">
                <h3>Show Category</h3>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>ID: </th>
                <td>{{$categoryData['id']}}</td>
            </tr>
            <tr>
                <th>Name: </th>
                <td>{{$categoryData['title']}}</td>
            </tr>
            <tr>
                <th>Image: </th>
                <td>
                    <img height="80px" width="80px" src="{{asset('uploads/category_image/'.$categoryData->image)}}" alt="{{$categoryData->image}}">
                </td>
            </tr>
        </table>
    </div>
    <a href="{{url('/category/index')}}"><button type="button" class="btn btn-info">Back To Category Table</button></a>
</section>
@endsection