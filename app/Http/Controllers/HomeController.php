<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
Use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home')
                ->with('post_count', Post:: all()->count())
                ->with('trash_count', Post:: onlyTrashed()->get()->count())
                ->with('user_count', User:: all()->count())
                ->with('category_count', Category:: all()->count())
        ;
    }
}
