@extends('layouts.master')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @forelse ($posts as $post)
                <div class="case">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                        <a href="{{ route('posts.show', $post->id) }}" class="img w-100 mb-3 mb-md-0" style="background-image: url({{ asset('storage/' . $post->image) }});"></a>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                        <div class="text w-100 pl-md-3">
                            <span class="subheading">{{ $post->category->name }}</span>
                            <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                            <ul class="media-social list-unstyled">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                            <div class="meta">
                                <p class="mb-0"><a href="#">{{ $post->created_at->diffForHumans() }}</a> | <a href="#">{{
                                    $post->user->name}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h1>No post found</h1>
            @endforelse
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                <ul>
                     {{ $posts->links() }}
                </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
