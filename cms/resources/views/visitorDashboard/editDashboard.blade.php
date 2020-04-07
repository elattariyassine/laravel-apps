@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">
            Visitor dashboard
        </div>
        <div class="card-body">
        <form action="{{ route('visitor.dashboard') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category">Title:</label>
                    <input type="text" value="{{ $vd->title }}" name="title" class="form-control">
                </div> 
                <div class="form-group">
                    <label for="email">Description:</label>
                    {{-- <input type="text" value="{{ $vd->description }}" name="description" class="form-control"> --}}
                    <textarea class="form-control" name="description" cols="10" rows="5">{{ $vd->description }}</textarea>
                </div> 
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update dashboard</button>
                </div>
            </form>
        </div>
    </div>
@endsection