@extends('layouts.app')

@section('content')
    <div class="clearfix">
        <a href="{{ route('posts.create') }}" 
       class="btn btn-success float-right" 
       style="margin-bottom: 10px;">Add Post</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">{{ isset($action) ? 'All Posts' : 'Trashed Posts' }}</div>
        <div class="card-body" style="text-align: center;padding:0;">
            @if (count($posts) != 0)
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th style="vertical-align: middle;" scope="row">{{ $loop->index + 1 }}</th>
                        <td>
                            <img class="img-thumbnail img-fluid" width="100px" height="50px" src="{{ $post->getImage() }}" alt="">
                        </td>
                        <td style="vertical-align: middle;">{{$post->title}}</td>
                        <td style="vertical-align: middle;">
                            @if (!$post->trashed())
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" 
                               class="btn btn-primary">Edit</a>
                            @else
                            <a href="{{ route('trashed.restore', ['id' => $post->id]) }}" 
                                class="btn btn-primary">Restore</a>
                            @endif
                            <form method="post" style="display: inline;" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    {{ $post->trashed() ? 'Delete': 'Trashed' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                    <ul>
                         {{ $posts->links() }}
                    </ul>
                    </div>
                </div>
            </div>
            @else
            <h1 class="text-center">No post yet.</h1>
            @endif
            
        </div>
    </div>
@endsection