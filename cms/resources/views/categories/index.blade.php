@extends('layouts.app')

@section('content')
    @if (session()->has('error'))
    <div class="alert alert-danger">{{ session()->get('error') }}</div>
    @endif
    <div class="clearfix">
        <a href="{{ route('categories.create') }}" 
       class="btn btn-success float-right" 
       style="margin-bottom: 10px;">Add category</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">All categories</div>
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
                    @forelse ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" 
                               class="btn btn-primary">Edit</a>
                            <form method="post" style="display: inline;" action="{{ route('categories.destroy', ['category' => $category->id]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        Not categories yet
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
@endsection