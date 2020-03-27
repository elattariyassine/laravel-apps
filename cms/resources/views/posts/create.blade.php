@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? "Update Post" : "Add a new Post" }}
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
                              placeholder="Description">{{ isset($post) ? $post->description : '' }}</textarea>
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
                {{-- <div class="form-group">
                    <label for="post">Image:</label>
                    <input type="file" 
                           name="image" 
                           class="form-control @error('image') is-invalid @enderror">
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
                <label for="post">Image</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    </div>
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="selectCategory">Select a category</label>
                    <select class="form-control @error('cat') is-invalid @enderror" id="selectCategory" name="categoryID">
                        {{-- <option disabled selected>Choose a category</option> --}}
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('cat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if (!$tags->count() <= 0)
                <div class="form-group">
                    <label for="selectTag">Select a tag</label>
                    <select class="form-control tags @error('cat') is-invalid @enderror" id="selectTag" name="tags[]" multiple>
                        {{-- <option disabled selected>Choose a category</option> --}}
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            @if (isset($post))
                                @if ($post->hasTag($tag->id))
                                    selected
                                @endif 
                            @endif   
                        >{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>  
                @endif               
                <div class="form-group">
                 <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update' : 'Add'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.tags').select2();
        });
    </script>
@endsection