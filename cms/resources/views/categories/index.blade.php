@extends('layouts.app')

@section('content')
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
        <div class="card-body">
            <table class="table">
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
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
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