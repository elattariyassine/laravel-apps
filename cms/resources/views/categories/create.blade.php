@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">Add new Category</div>
        <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category">Category Name:</label>
                    <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Add a new category">
                </div>
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection