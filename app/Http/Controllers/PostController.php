<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class PostController extends Controller
{
    public function category(Request $request, $cateogry_slug)
    {
        $category = Category::where('slug', $cateogry_slug)->with('posts')->first();

        return view('posts.category', compact('category'));
    }

    public function post(Request $request, $post_slug)
    {
        $post = Post::where('slug', $post_slug)->first();

        return view('posts.post', compact('post'));
    }
}
