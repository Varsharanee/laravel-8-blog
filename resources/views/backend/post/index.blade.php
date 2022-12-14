@extends('layouts.master') @section('title') All Post @endsection @section('content')
<section class="content">
    <div class="container-fluid">
        @if (session('msg'))
        <div class="alert alert-success mt-2" role="alert">
            {{ session('msg') }}
        </div>
        @endif
        <div class="card-header py-2">
            <div class="d-flex bd-highlight my-3">
                <div class="mr-auto p-2 bd-highlight">
                    <h3>Post Table</h3>
                </div>

                <div class="p-2 bd-highlight"> <a href="/post/create" class="btn btn-primary"><i
                            class="fa fa-plus" aria-hidden="true"></i> Add Post</a></div>
            </div>
        </div>

        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col">Post ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Edit</th>
                    <th scope="col">View</th>
                    <th scope="col">Trash</th>
                </tr>
            </thead>
            @foreach($post as $items)
            <tbody>
                <td>{{$items->id}}</td>
                <td>{{$items->title}}</td>
                <td>
                    <img height="60px" width="70px" src="{{asset('uploads/thumbnail_image/'.$items->thumbnail)}}" alt="{{$items->thumbnail}}">
                </td>
                <td>{{$items->tags}}</td>
                <td>
                    <a href="/post/edit/{{$items['id']}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a></i>
                </td>
                <td>
                    <a href="/post/show/{{$items['id']}}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></i></a></i>
                </td>
                <td>
                    <a href="/post/status/1/{{$items ->id}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></i></a></i>
                </td>
            </tbody>
            @endforeach
        </table>
        <br><br><br>
        <div class="container text-center my-2">
            <h3><b>Trash Data</b></h3>
        </div><br>
        <table class="table m-3">
            <thead>
                <tr>
                    <th scope="col">Post ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Restore</th>
                </tr>
            </thead>
            @foreach($trash as $items)
            <tbody>
                <td>{{$items->id}}</td>
                <td>{{$items->title}}</td> 
                <td>
                    <img height="60px" width="70px" src="{{asset('uploads/thumbnail_image/'.$items->thumbnail)}}" alt="{{$items->thumbnail}}">
                </td>               
                <td>{{$items->tags}}</td>                
                <td>
                    <a href="/post/status/0/{{$items->id}}" class="badge bg-success"> Restore</a>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>
</section>
@endsection