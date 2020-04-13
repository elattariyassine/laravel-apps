@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="{{ asset('images/erwinSmith.jpg') }}" alt="" class="rounded-circle profile-image">
        </div>
        <div class="col-9" style="margin-top:10px;padding-left: 87px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <h2>{{ $user->username }}</h2>
                <a href="{{ route('posts.create') }}">Add new Post</a>
            </div>
            <div style="display: flex">
                <div class=""><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div style="padding-left:50px;"><strong>100</strong> followers</div>
                <div style="padding-left:50px;"><strong>100</strong> following</div>
            </div>
            <div class="site" style="margin-top: 34px;">
                <strong>{{ $user->profile->title }}</strong>
            </div>
            <div style="padding-right:160px;">
                {{ $user->profile->description }}
            </div>
            <div>
                <a href="">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        @forelse ($user->posts as $post)
        <div class="col-4 pb-4">
            <img src="{{ asset('storage') .'/'. $post->image }}" class="w-100">
        </div>
        @empty
            <h1>No post yet.</h1>
        @endforelse
    </div>
</div>
@endsection
