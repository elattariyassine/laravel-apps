@extends('layouts.app')

@section('content')
<div class="container">
    <row>
        <h2 class="text-center">Edit profile</h2>
    </row>
    <div class="row">
        <div class="col-6 offset-3">
            <form action="{{ route('userProfile.update', ['user' => $user->id]) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" value="{{ old('title') ?? $user->profile->title }}" class="form-control" id="title" name="title" placeholder="title">
                </div>
                @if($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <label for="title">Description</label>
                    <input type="text" value="{{ old('description') ?? $user->profile->description }}" class="form-control" id="description" name="description" placeholder="description">
                </div>
                @if($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <label for="title">Url</label>
                    <input type="text" value="{{ old('url') ?? $user->profile->url }}" class="form-control" id="url" name="url" placeholder="url">
                </div>
                @if($errors->has('url'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <label>Profile image</label> 
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="form-group">
                    <img src="{{ asset('storage/' . $user->profile->image) }}" alt="">
                </div>
                @if($errors->has('caption'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
