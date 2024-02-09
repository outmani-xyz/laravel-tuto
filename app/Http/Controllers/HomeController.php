<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {
        $posts = Post::all();
        return view('home', ['posts' => $posts]);
    }
}
