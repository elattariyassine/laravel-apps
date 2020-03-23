@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Add a new post
        </div>
        <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="post">Title:</label>
                    <input type="text" 
                           name="title" 
                           class="form-control @error('title') is-invalid @enderror"
                           placeholder="Add a new post">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="post">Description:</label>
                    <textarea type="text" 
                           name="description" 
                           class="form-control @error('description') is-invalid @enderror" 
                           placeholder="Description"></textarea>
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="post">Content:</label>
                    <textarea 
                           name="content" 
                           class="form-control @error('content') is-invalid @enderror" 
                           placeholder="Content"></textarea>
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="post">Image:</label>
                    <input type="file" 
                           name="image" 
                           class="form-control @error('image') is-invalid @enderror">
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection