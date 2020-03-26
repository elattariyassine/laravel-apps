@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($tag) ? 'Update tag' : 'Add new tag' }}
        </div>
        <div class="card-body">
        <form action="{{ isset($tag) ? route('tags.update', ['tag' => $tag->id]) : route('tags.store') }}" method="POST">
                @csrf
                @if (isset($tag) ? true : false)
                  @method('PUT')  
                @endif
                <div class="form-group">
                    <label for="category">Tag Name:</label>
                    <input value="{{ isset($tag) ? $tag->name : '' }}" 
                           type="text" 
                           name="name" 
                           class="@error('name') is-invalid @enderror form-control" 
                           placeholder="Add a new tag">
                </div>
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($tag) ? 'Update' : 'Add' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection