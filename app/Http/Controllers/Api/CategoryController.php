<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::orderBy('name')->get();
        
        return $categories;
    }

    function show($category_id){
        $category = Category::where('id', $category_id)->with(['posts', 'posts.category', 'posts.tags'])->first();

        return $category;
    }

   /*  function show(Category $category){
        $array = $category->with('posts')->find($category->id);
        dd($array);

        return $array;
    } */
}


