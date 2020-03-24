@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{-- {{ isset($post) ? "Update Post" : "Add a new Post" }} --}}
        </div>
        <div class="card-body">
        <form action="{{ isset($post) ? route('posts.update', ['post' => $post->id]) : route('posts.store')  }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="post">Title:</label>
                    <input type="text" 
                           name="title" 
                           value="{{ isset($post) ? $post->title : '' }}"
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
                              placeholder="Description">{{ isset($post) ? $post->description : '' }}
                    </textarea>
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="post">Content:</label>
                    {{-- <textarea 
                           name="content" 
                           class="form-control @error('content') is-invalid @enderror" 
                           placeholder="Content"></textarea> --}}
                           <input id="x" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                    <trix-editor input="x"></trix-editor>
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if (isset($post))
                <div class="form-group">
                    <img src="{{ asset('storage/' . $post->image) }}" style="margin:0 auto;" class="img-fluid" alt="">
                </div>
                @endif
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
                 <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update' : 'Add'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection