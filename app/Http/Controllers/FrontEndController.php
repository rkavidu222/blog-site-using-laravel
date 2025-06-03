<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;

class FrontEndController extends Controller
{
   public function index(){

        return view("index")
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::take(4)->get())
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(2)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(2)->get()->first())

            ;

    }
}
