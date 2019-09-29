<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class PostController extends Controller
{
    public function category(Request $request, $cateogry_slug)
    {
        $category = Category::where('slug', $cateogry_slug)->with('posts')->first();

        return view('posts.category', compact('category'));
    }
}
