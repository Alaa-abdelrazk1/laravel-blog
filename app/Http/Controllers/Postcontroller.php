<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
class Postcontroller extends Controller
{
    public function index()
    {
        $allPosts=post::all();
        $allPosts=post::paginate(3);
        return view('posts.index',[
            
            'allPosts' =>  $allPosts
        
        ]);
    
    }

    public function create()
    {

        $Users=User::all();
        return view('posts.create',[
             'users'=>$Users
        ]);
    }
    public function store(StorePostRequest $request)
    {
        $data =$request->all();
        post::create([
            'title'=>$data["title"],
            'description'=>$data["description"],
            'user_id'=>$data["post_creator"]
        
        ]);
        // db
        return redirect()->route('posts.index');
    }

    public function show($slug)
    {

        $onePost = Post::where('slug', $slug)->get();
   //  dd($onePost);
      //  $onePost=post::findOrFail($postId);
        return view('posts.show',['post'=>$onePost]);
    }
    public function edit($postId)
    {// db
        $onePost=post::findOrFail($postId);
        $users = User::all();
        return view('posts.update',['post'=>$onePost,'users'=>$users]);

    }
    public function update($postId,Request $req,StorePostRequest $request){
        $onePost=post::findOrFail($postId);
        $onePost->update([
            'title' => $req['title'],
            'description' => $req['description'],
            'user_id' => $req['user_name'],
        ]);

    }





    public function destroy($postId,Request $req)
    {
        $onePost=post::findOrFail($postId);
        $onePost->delete();
        return redirect()->route('posts.index');
    }


}
