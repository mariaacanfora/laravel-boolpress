<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private function createSlug($title) {
        $slug = Str::slug($title);
    
        $alreadyExists = Post::where("slug", $slug)->first();
        $counter = 1;
    
        while ($alreadyExists) {
          $newSlug = $slug . "-" . $counter;
          $alreadyExists = Post::where("slug", $newSlug)->first();
          $counter++;
    
          if (!$alreadyExists) {
            $slug = $newSlug;
          }
        }
    
        return $slug;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $postList = Post::with("category")->get();;
        return view('admin.posts.index', compact('postList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tagsList = Tag::all();
        return view('admin.posts.create', ['categories' => $categories, 'tagsList' => $tagsList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $post = new Post();
        $post->fill($data);
        $post->user_id = Auth::user()->id;
        $post->slug = $this->createSlug($data["title"]);
        $post->category_id = $data['category'];
    
        $post->save();
        
        $post->tags()->sync($data['tag']);
        return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::all();
        $tagsList = Tag::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tagsList' => $tagsList
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $postData = $request->all();
        $oldTitle = $post->title;
        $titleChanged = $oldTitle !== $postData["title"];
    
        $post->fill($postData);
    
        if ($titleChanged) {
          $post->slug = $this->createSlug($postData["title"]);
        }
    
        $post->save();
        $post->tags()->sync($postData['tag']);

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')->with([
            'status' => 'Post cancellato!'
        ]);
    }
}
