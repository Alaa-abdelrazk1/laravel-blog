@extends('layouts.app')
@section('title')
Create
@endsection
@section('content')
<div class="card  mt-5">
    <div class="card-header">
        Post info :
    </div>
    <div class="card-body">
        @foreach ($post as $data)

        <h5 class="card-title">Title : {{$data->title}}</h5>
        <h5 class="card-title">Description :{{$data->description}} </h5>
        <h5 class="card-text">Created At : {{$data->created_at->format("Y-m-d")}}</h5>
        @endforeach

    </div>

</div>

<div class="card  mt-5">
    <div class="card-header">
        Post creator info:
    </div>
    <div class="card-body">
    @foreach ($post as $data)

        <h5 class="card-title">Name: {{$data->user->name}}</h5>
        <h5 class="card-title">Email : {{$data->user->email}}</h5>

        @endforeach

    </div>

</div>

@endsection