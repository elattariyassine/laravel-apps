@extends('layouts.app')

@section('content')
    <div class="clearfix">
        <a href="{{ route('posts.create') }}" 
       class="btn btn-success float-right" 
       style="margin-bottom: 10px;">Add Post</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">All Posts</div>
        <div class="card-body" style="text-align: center;padding:0;">
            @if (count($posts) != 0)
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th style="vertical-align: middle;" scope="row">{{ $loop->index + 1 }}</th>
                        <td>
                            <img class="img-thumbnail img-fluid" width="100px" height="50px" src="{{ asset('storage/' . $post->image) }}" alt="">
                        </td>
                        <td style="vertical-align: middle;">{{$post->title}}</td>
                        <td style="vertical-align: middle;">
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" 
                               class="btn btn-primary">Edit</a>
                            <form method="post" style="display: inline;" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            @else
            Not posts yet
            @endif
            
        </div>
    </div>
@endsection