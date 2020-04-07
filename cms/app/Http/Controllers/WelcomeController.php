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
            'posts' => Post::paginate(10),
            'lastTwoPosts' => $lastTwoPosts,
            'dashData' => $dashData
        ]);
    }

    public function articles(){
        $lastTwoPosts = Post::orderBy('id', 'desc')->skip(0)->take(2)->get();
        $dashData = VisitorDashboard::find(1);
        return view('posts.blog', [
            'lastTwoPosts' => $lastTwoPosts,
            'posts' => Post::paginate(9),
            'dashData' => $dashData
        ]);
    }

    public function about(){
        $lastTwoPosts = Post::orderBy('id', 'desc')->skip(0)->take(2)->get();
        return view('posts.about')->withLastTwoPosts($lastTwoPosts);
    }

    public function contact(){
        $lastTwoPosts = Post::orderBy('id', 'desc')->skip(0)->take(2)->get();
        return view('posts.contact')->withLastTwoPosts($lastTwoPosts);
    }
}
