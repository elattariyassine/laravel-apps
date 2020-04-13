<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($id)
    {
        $user = User::findOrfail($id);
        return view('profiles.index', ['user' => $user]);
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'image' => 'required'
        ]);
        if(request('image')){
            $imagePath = request()->image->store('profiles', 'public');
        }
        auth()->user()->profile->update(array_merge($data, ['image' => $imagePath]));
        return redirect()->route('userProfile.show', ['user' => $user->id]);
    }
}
