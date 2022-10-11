@extends('layouts.master') @section('title') All Comments @endsection @section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card-header py-2">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <h3>Comment Table</h3>
                </div>
            </div>
        </div>

        <table class="table m-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Post Id</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comment as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->user_id}}</td>
                    <td>{{$items->user->name}}</td>
                    <td>{{$items->post_id}}</td>
                    <td>{{$items->comment}}</td>
                    <td>
                        <a href={{ "/comment/show/".$items[ 'id']}}><i class="fa-solid fa-eye mx-3"></i></i></a></i>
                        <a href="{{ " /comment/destroy/ ".$items[ 'id']}}"><i class="fa-solid fa-trash-can mx-3"></i></i></a></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection