<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkCategory')->only('create');
    }

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
        return view('posts.create')->withCategories(Category::all())->withTags(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->categoryID,
            'user_id' => Auth::user()->id,
            'image' => $request->image->store('images', 'public')
        ]);
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
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
        return view('posts.show')->withPost($post)->withCategories(Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create', ['post' => $post, 'categories' => Category::all()])->withTags(Tag::all());
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
        if ($request->tags) {
            $post->tags()->sync($request->tags);
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

    public function restore($id){
        Post::withTrashed()->where('id', $id)->restore();
        session()->flash('success', 'Post restored successfuly');
        return redirect()->route('posts.index');
    }
}
