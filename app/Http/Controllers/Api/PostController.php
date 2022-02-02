<?php

namespace App\Http\Controllers\Api;
use App\Models\post;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function index()
    {

        $allPosts=post::all();
 
        return PostResource::collection($allPosts);    
    }

    public function show($postId){
        $allposts= post::find($postId);
        return new PostResource($allposts);
    }
    public function store(StorePostRequest $request)
    {
        $data =$request->all();
      $post=  post::create([
            'title'=>$data["title"],
            'description'=>$data["description"],
            'user_id'=>$data["post_creator"]
        
        ]);
        // db
        return new PostResource($post);
    }


}
