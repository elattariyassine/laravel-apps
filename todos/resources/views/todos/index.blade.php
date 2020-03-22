@extends('layout.master')

@section('title', 'All todos')

@section('content')
    <div class="container">
		<div class="row pt-3 justify-content-center">
			<div class="card" style="width: 50%">
				<div class="card-header text-center">
					<h1>All Todos</h1>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
				<div class="card-body">
					<ul class="list-group">
						@forelse ($todos as $todo)
							<li class="list-group-item text-muted">
                                @if ($todo->completed)
                                  <del>{{ $todo->title }}</del>  
                                @else
                                  {{ $todo->title }}
                                @endif
								<span class="float-right">
                                    <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background: transparent;
                                    border: 0;" type="submit"><i style="color: #f44336" class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                {{-- <a href="{{ route('todos.destroy', ['todo' => $todo->id]) }}" style="color: #f44336">
										
									</a> --}}
								</span>
								<span class="float-right mr-2">
                                    <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}" style="color: #4caf50">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									</a>
								</span>
								<span class="float-right mr-2">
                                <a href="{{ route('todos.show', ['todo' => $todo->id]) }}" style="color: #00bcd4">
										<i class="fa fa-eye" aria-hidden="true"></i>
									</a>
                                </span>
                                @if (!$todo->completed)
                                    <span class="float-right mr-2">
                                    <a href="{{ route('todos.completed', ['todo' => $todo->id]) }}" style="color: #ff9800">
                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                @endif
                            </li>
                            @empty
                                <p class="text-center"> No todos. </p>
						@endforelse
					</ul>
                </div>
                <div style="margin: 0 auto;">
                    {{ $todos->links() }}
                </div>
			</div>
		</div>
	</div>
@endsection