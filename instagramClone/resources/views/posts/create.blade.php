@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="postCaption">Post caption</label>
                    <input type="text" class="form-control" id="postCaption" name="caption" placeholder="post caption">
                </div>
                @if($errors->has('caption'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('caption') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <label>Choose image</label> 
                    <input type="file" class="form-control" name="image" id="image">
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
