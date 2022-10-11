@extends('layouts.master') @section('title') All Categories @endsection @section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card-header py-2">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <h3>Category Table</h3>
                </div>

                <div class="p-2 bd-highlight"> <a href="/category/create" class="btn btn-primary"><i
                            class="fa fa-plus" aria-hidden="true"></i> Add Category</a></div>
            </div>
        </div>

        <table class="table m-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->title}}</td>
                    <td>
                        <img height="40px" width="40px" src="{{asset('uploads/category_image/'.$items->image)}}" alt="{{$items->image}}">
                    </td>
                    <td>
                        <a href="{{ " /category/edit/ ".$items[ 'id']}}"><i class="fa-solid fa-pen mx-3"></i></a></i>

                        <a href={{ "/category/show/".$items[ 'id']}}><i class="fa-solid fa-eye mx-3"></i></i></a></i>

                        <a href="{{ " /category/destroy/ ".$items[ 'id']}}"><i class="fa-solid fa-trash-can mx-3"></i></i></a></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection