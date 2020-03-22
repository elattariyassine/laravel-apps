@extends('layout.master')

@section('title', 'Edit Todo')

@section('content')

<div class="container pt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h1>edit todo</h1>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('todos.update', ['todo' => $todo->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text"
                            class="form-control"
                            placeholder="Enter todo title"
                            name="todoTitle"
                            class="@error('todoTitle') is-invalid @enderror"
                            value="{{ $todo->title }}"
                            >
                        </div>
                        @error('todoTitle')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <textarea class="form-control"
                            rows="3"
                            placeholder="Enter description for you todo"
                            name="todoDescription"
                            class="@error('todoDescription') is-invalid @enderror"
                            >{{ $todo->description }}</textarea>
                        </div>
                        @error('todoDescription')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group text-center">
                            <button type="submit"
                            class="btn btn-success"
                            style="width: 40%"
                            >Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection