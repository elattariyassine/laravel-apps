@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="{{ asset('images/erwinSmith.jpg') }}" alt="" class="rounded-circle profile-image">
        </div>
        <div class="col-9" style="margin-top:10px;padding-left: 87px;">
            <div><h2>Erwin Smith</h2></div>
            <div style="display: flex">
                <div class=""><strong>100</strong> posts</div>
                <div style="padding-left:50px;"><strong>100</strong> followers</div>
                <div style="padding-left:50px;"><strong>100</strong> following</div>
            </div>
            <div class="site" style="margin-top: 34px;">
                <strong>attackonhumans.com</strong>
            </div>
            <div style="padding-right:160px;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem enim ratione consectetur quam eveniet labore, nobis voluptate exercitationem commodi accusamus veritatis quibusdam aut porro. Saepe voluptas earum a expedita accusamus.
            </div>
            <div>
                <a href="">www.attackonhumans.com</a>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-4">
            <img src="{{ asset('images/post.png') }}" style="max-width: 293px">
        </div>
        <div class="col-4">
            <img src="{{ asset('images/post.png') }}" style="max-width: 293px">
        </div>
        <div class="col-4">
            <img src="{{ asset('images/post.png') }}" style="max-width: 293px">
        </div>
    </div>
</div>
@endsection
