@extends('layouts.app')
@section('title')
update
@endsection
@section('content')
<form method='post' action="{{route('posts.update',['post'=>$post->id])}}" >
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" value="{{$post->title}}" class="form-control"  placeholder="Title"  >
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea  name="description" placeholder="{{$post->description}}" class="form-control"  rows="3"></textarea>
    </div>


    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
        <select name="user_name" class="form-control">
            @foreach ($users as $user)
            <option value="{{$user->id}}" @if($user->id==$post->user_id) selected @endif>{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection