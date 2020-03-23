@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Update category' : 'Add new category' }}
        </div>
        <div class="card-body">
        <form action="{{ isset($category) ? route('categories.update', ['category' => $category->id]) : route('categories.store') }}" method="POST">
                @csrf
                @if (isset($category) ? true : false)
                  @method('PUT')  
                @endif
                <div class="form-group">
                    <label for="category">Category Name:</label>
                    <input value="{{ isset($category) ? $category->name : '' }}" 
                           type="text" 
                           name="name" 
                           class="@error('name') is-invalid @enderror form-control" 
                           placeholder="Add a new category">
                </div>
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($category) ? 'Update' : 'Add' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection