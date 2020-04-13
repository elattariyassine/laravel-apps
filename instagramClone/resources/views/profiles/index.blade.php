@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="{{ asset($user->profile->profileImage()) }}" alt="" class="rounded-circle profile-image">
        </div>
        <div class="col-9" style="margin-top:10px;padding-left: 87px;">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    <button class="btn btn-primary ml-4">Follow</button>
                </div>
                @can('update', $user->profile)
                <a href="{{ route('posts.create') }}">Add new Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="{{ route('userProfile.edit', ['user' => $user->id]) }}">Edit profile</a>
            @endcan
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
            <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                <img src="{{ asset('storage/' . $post->image) }}" class="w-100">
            </a>
        </div>
        @empty
            <h1>No post yet.</h1>
        @endforelse
    </div>
</div>
@endsection
