@extends('layouts.app')
@section('title')Index @endsection


       @section('content')
        <div class="text-center ">
            <a  href="{{route('posts.create')}}" type="button" class="btn btn-success p-2">Create Post</a>
        </div>


        <table class="table table-dark table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($allPosts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{isset($post->user)?  $post->user->name:"not found"}}</td>
                    <td>{{$post->created_at->format("Y-m-d")}}</td>
                    <td>
                        <a  href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-primary">View</a>
                        <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-secondary">Edit</a>
                        <form method='post' action="{{route('posts.destroy',['post'=>$post->id])}}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id='delete' class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <span>

        {{ $allPosts->links()}}

        </span>
<style>
.w-5{
    display: none;

}
.text-gray-700{
    padding: 10px;
}

</style>
        <script>
            const del=document.getElementById('delete');
            del.addEventListener('click',function(e){
                const massage=confirm("are you want Deleted !");
                if(massage == false){
                   e.preventDefault();
                }
            })
        </script>

        @endsection