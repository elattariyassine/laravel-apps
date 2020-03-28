@extends('layouts.master')

@section('content')
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            @forelse ($posts as $post)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="blog-single.html" class="block-20" style="background-image: url('{{ asset('storage/' . $post->image) }}');">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="topper d-flex align-items-center">
                            <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                <span class="day">18</span>
                            </div>
                            <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                <span class="yr">2019</span>
                                <span class="mos">October</span>
                            </div>
                        </div>
                        <h3 class="heading mb-3"><a href="{{ route('posts.show', $post->id) }}">All you want to know about industrial laws</a></h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection