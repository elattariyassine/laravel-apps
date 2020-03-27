<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index',[
            'posts_count' => Post::all()->count(),
            'categories_count' => Category::all()->count(),
            'users_count' => User::all()->count()
        ]);
    }
}
