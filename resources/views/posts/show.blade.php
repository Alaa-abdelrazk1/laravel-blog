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
        <h5 class="card-title">Title : {{$post->title}}</h5>
        <h5 class="card-title">Description : </h5>
        <p>{{$post->description}}</p>
        <h5 class="card-text">Created At : {{$post->created_at->format("Y-m-d")}}</h5>

    </div>

</div>

<div class="card  mt-5">
    <div class="card-header">
        Post creator info:
    </div>
    <div class="card-body">
        <h5 class="card-title">Name: {{$post->user->name}}</h5>
        <h5 class="card-title">Email : {{$post->user->email}}</h5>
    </div>
 
</div>

@endsection