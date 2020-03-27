@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category">Name:</label>
                    <input value="{{ $user->name }}" type="text" name="name" class="form-control">
                </div> 
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input value="{{ $user->email }}" type="text" name="email" class="form-control">
                </div> 
                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea type="text" 
                              name="about" 
                              class="form-control @error('description') is-invalid @enderror" 
                              placeholder="Tell us about you">{{ $user->profile->about }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="facebook">Facebook:</label>
                    <input value="{{ $user->profile->facebook }}" type="text" name="facebook" class="form-control">
                </div> 
                <div class="form-group">
                    <label for="twitter">Twitter:</label>
                    <input value="{{ $user->profile->twitter }}" type="text" name="twitter" class="form-control">
                </div>
                <div class="form-group">
                    <label for="twitter">Picture:</label><br>
                    <img src="{{ $user->hasPicture() ? asset('storage/'.$user->getPicture()) : $user->getGravatar()}}">
                    <input type="file" name="picture" class="form-control mt-2">
                </div>  
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection