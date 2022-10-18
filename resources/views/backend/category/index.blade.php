@extends('layouts.master') @section('title') All Categories @endsection @section('content')
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
                    <h3>Category Table</h3>
                </div>
                <div class="p-2 bd-highlight"> <a href="/category/create" class="btn btn-primary"><i class="fa fa-plus"
                            aria-hidden="true"></i> Add Category</a></div>
            </div>
        </div>
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">View</th>
                    <th scope="col">Trash</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->title}}</td>
                    <td>
                        <img height="60px" width="70px" src="{{asset('uploads/category_image/'.$items->image)}}"
                            alt="{{$items->image}}">
                    </td>
                    <td>
                        <a href="/category/edit/{{$items['id']}}" class="btn btn-success"><i
                                class="fa-solid fa-pen"></i></a></i>
                    </td>
                    <td>
                        <a href="/category/show/{{$items['id']}}" class="btn btn-info"><i
                                class="fa-solid fa-eye"></i></i></a></i>
                    </td>
                    <td>
                        <a href="/category/status/1/{{$items ->id}}" class="btn btn-danger"><i
                                class="fa-solid fa-trash-can"></i></i></a></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><br><br><br>
        <div class="container text-center my-2">
            <h3><b>Trash Data</b></h3>
        </div><br>
        <table class="table m-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Restore</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trash as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->title}}</td>
                    <td>
                        <img height="60px" width="70px" src="{{asset('uploads/category_image/'.$items->image)}}"
                            alt="{{$items->image}}">
                    </td>
                    <td>
                        <a href="/category/status/0/{{$items ->id}}" class="badge bg-success"> Restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection