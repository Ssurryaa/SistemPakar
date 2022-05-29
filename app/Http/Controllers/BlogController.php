<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Penyakit;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);

        return view('blog')
            ->with('posts', $posts)
            ->with('categories', Category::all());
    }

    public function singlePost($id)
    {
        $post = Post::find($id);
        return view('post')
            ->with('post', $post)
            ->with('categories', Category::all());
    }

    public function blogCategory($category)
    {
        $category = Category::where('name', '=', $category)->first();
        $posts = Post::where('category_id', '=', $category->id)->orderBy('created_at', 'desc')->paginate(6);
        //dd($categories);
        return view('category')
            ->with('categories', Category::all())
            ->with('category', $category)
            ->with('posts', $posts);
    }

    public function tag($id)
    {
        $tag = Tag::find($id);

        return view('tag')->with('tag', $tag)
            ->with('categories', Category::take(5)->get());
    }

    public function penyakitMata()
    {
        return view('penyakitMata')
        ->with('categories', Category::all())
        ->with('penyakits', Penyakit::all());
    }

}
