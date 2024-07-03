<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\updateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(updateAvatarRequest $request)
    {
        
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar'=>  storage_path('app')."/$path"]);
        // Store Avatar
        return redirect(route('profile.edit'))->with('message', 'Avatar is Updated.');
    }
}
