@extends('layouts.master')

@section('content')
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            @forelse ($posts as $post)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="{{ route('posts.show', $post->id) }}" class="block-20" style="background-image: url('{{ $post->getImage() }}');">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="topper d-flex align-items-center">
                            <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                <span class="day">{{ $post->created_at->isoFormat('D') }}</span>
                            </div>
                            <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                <span class="yr">{{ $post->created_at->isoFormat('YYYY') }}</span>
                                <span class="mos">{{ $post->created_at->isoFormat('MMMM') }}</span>
                            </div>
                        </div>
                        <h3 class="heading mb-3"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                        <p>{{ $post->description }}</p>
                        <p><a href="{{ route('posts.show', $post->id) }}" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
                    </div>
                </div>
            </div>
            @empty
                <h1>No articles yet.</h1>
            @endforelse
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