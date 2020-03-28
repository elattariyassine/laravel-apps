<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $lastTwoPosts = Post::orderBy('id', 'desc')->skip(0)->take(2)->get();
        return view('welcome', [
            'posts' => Post::paginate(1),
            'lastTwoPosts' => $lastTwoPosts,
        ]);
    }

    public function articles(){
        $lastTwoPosts = Post::orderBy('id', 'desc')->skip(0)->take(2)->get();
        return view('posts.blog', [
            'lastTwoPosts' => $lastTwoPosts,
            'posts' => Post::take(9)->get()
        ]);
    }
}
