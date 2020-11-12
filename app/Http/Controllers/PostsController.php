<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('create_at', 'desc')->get();

        return view('posts.index', ['posts' => $posts]);
    }
}
