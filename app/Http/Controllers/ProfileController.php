<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        // get user name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        //handle avatar upload
        if($request->hasfile('avatar')){
            // Delete old avatar
            if($user->avatar){
                Storage::delete('public/'.$user->avatar);
            }

            //Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars','public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('dashboard')->with('success','Profile info updated.');
    }
}
