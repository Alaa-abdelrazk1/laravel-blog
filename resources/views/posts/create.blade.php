@extends('layouts.app')
@section('title')create @endsection


@section('content')


<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"  >Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" >
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" ></textarea>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select class="form-control"  name="post_creator">

            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>
    </div>

    <button class="btn btn-success">Create Post</button>
</form>

@endsection