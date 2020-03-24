<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = false;
        if (Route::currentRouteName() == 'posts.index') {
            $action = true;
        } 
        return view('posts.index', ['posts' => Post::all(), 'action' => $action]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->image->store('images', 'public')
        ]);
        session()->flash('success', 'Post created successfuly');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content']);
        if ($request->hasFile('image')) {
            $image = $request->image->store('images', 'public');
            Storage::disk('public')->delete($post->image);
            $data['image'] = $image;
        }
        $post->update($data);
        session()->flash('success', 'Post updated successfuly');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        if ($post->trashed()) {
            //permanetly deleting post from DB
            Storage::disk('public')->delete($post->image);
            $post->forceDelete();
            //delete image from folder
            $trashed = Post::onlyTrashed()->get();
            session()->flash('success', 'Post deleted successfuly');
            return view('posts.index')->withPosts($trashed);

        } else {
            session()->flash('success', 'Post trashed successfuly');
            $post->delete();
            return redirect()->route('posts.index');
        }
    }
    
    public function trashed(){
        $action = false;
        if (Route::currentRouteName() == 'posts.index') {
            $action = true;
        } 
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index', ['posts' => $trashed, 'action' => $action]);
    }
}
