<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        //$postList = Post::all();
        $postList = Post::with("category")->with("tags")->paginate(4);
        
        return response()->json($postList);
    }

    function show($slug){
        $post = Post::where("slug", $slug)->first();

        return response()->json($post);
    }
}

