<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->withUsers(User::all());
    }

    public function create()
    {
        return view('users.create');
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        return redirect()->route('users.index');
    }

    public function edit(User $user){
        $this->authorize('update', $user);
        return view('users.profile', ['user' => $user]);
    }

    public function update(User $user, Request $request){
        $data = $request->all();
        // dd($data);
        $profile = $user->profile;
        if ($request->hasFile('picture')) {
            $picture = $request->picture->store('profilesPictures', 'public');
            $data['picture'] = $picture;
        }
        $profile->update($data);
        $user->update($request->all());
        return redirect()->route('home');
    }
}
