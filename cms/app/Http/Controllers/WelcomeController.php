<?php

namespace App\Http\Controllers;

use App\Post;
use App\VisitorDashboard;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $dashData = VisitorDashboard::find(1);
        $lastTwoPosts = Post::orderBy('id', 'desc')->skip(0)->take(2)->get();
        return view('welcome', [
            'posts' => Post::paginate(1),
            'lastTwoPosts' => $lastTwoPosts,
            'dashData' => $dashData
        ]);
    }

    public function articles(){
        $lastTwoPosts = Post::orderBy('id', 'desc')->skip(0)->take(2)->get();
        return view('posts.blog', [
            'lastTwoPosts' => $lastTwoPosts,
            'posts' => Post::paginate(9)
        ]);
    }
}
