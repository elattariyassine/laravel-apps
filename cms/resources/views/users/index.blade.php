@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">All users</div>
        <div class="card-body" style="text-align: center;padding:0;">
            @if (count($users) != 0)
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Username</th>
                    <th scope="col">Permission</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th style="vertical-align: middle;" scope="row">{{ $loop->index + 1 }}</th>
                        <td>
                            <img src="{{ $user->hasPicture() ? asset('storage/'.$user->getPicture()) : $user->getGravatar()}}" style="border-radius: 50%" width="60px" height="60px">
                        </td>
                        <td style="vertical-align: middle;">{{$user->name}}</td>
                        <td style="vertical-align: middle;">
                        @if (!$user->isAdmin())
                            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success" type="submit">Make admin</button>
                            </form>
                        @else
                        {{$user->role}}
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            @else
            <h1 class="text-center">No users yet.</h1>
            @endif
            
        </div>
    </div>
@endsection