<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome', [
            'posts' => Post::all()
        ]);
    }
}
