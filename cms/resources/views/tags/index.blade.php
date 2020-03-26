@extends('layouts.app')

@section('content')
    @if (session()->has('error'))
    <div class="alert alert-danger">{{ session()->get('error') }}</div>
    @endif
    <div class="clearfix">
        <a href="{{ route('tags.create') }}" 
       class="btn btn-success float-right" 
       style="margin-bottom: 10px;">Add tag</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">All tags</div>
        <div class="card-body" style="text-align: center;padding:0;">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{$tag->name}}</td>
                        <td>
                            <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}" 
                               class="btn btn-primary">Edit</a>
                            <form method="post" style="display: inline;" action="{{ route('categories.destroy', ['category' => $tag->id]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        Not tags yet
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
@endsection