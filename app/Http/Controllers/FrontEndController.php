<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
        return view("index")
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::take(4)->get())
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(2)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(2)->get()->first())
            ->with('java', Category::find(2))
            ->with('angular', Category::find(4))
            ->with('settings', Setting::first());
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail(); // Ensure post exists or throw 404

        // Fetch next post (newer, higher ID)
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $next = $next_id ? Post::find($next_id) : null;

        // Fetch previous post (older, lower ID)
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        $prev = $prev_id ? Post::find($prev_id) : null;

        return view('single')
            ->with('post', $post)
            ->with('title', $post->title)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(4)->get())
            ->with('next', $next)
            ->with('prev', $prev)
            ->with('tags',Tag::all())

            ;
    }


    public function category($id){
        $category = Category::find($id);

        return view('category')->with('category', $category)
                                     ->with('title', $category->name)
                                     ->with('settings', Setting::first())
                                     ->with('categories', Category::take(4)->get())

                                     ;
    }




    public function tag($id)
    {
        $tag = Tag::find($id);

        return view('tag')
            ->with('tag', $tag)
            ->with('title', $tag->tag)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(4)->get());
    }

}
