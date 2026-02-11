<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $user->load('experiences', 'skills');

        // Format dates for <input type="month">
        $user->experiences->transform(function ($exp) {
            $exp->start_date = $exp->start_date ? Carbon::parse($exp->start_date)->format('Y-m') : null;
            $exp->end_date = $exp->end_date ? Carbon::parse($exp->end_date)->format('Y-m') : null;
            return $exp;
        });

        return view('dashboard.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'skills' => 'nullable|string',
            'experiences' => 'nullable|array',
            'experiences.*.title' => 'nullable|string|max:255',
            'experiences.*.company' => 'nullable|string|max:255',
            'experiences.*.start_date' => 'nullable|date_format:Y-m',
            'experiences.*.end_date' => 'nullable|date_format:Y-m',
        ]);

        // Update basic info
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        // Avatar upload
        if ($request->hasFile('avatar')) {
            if ($user->avatar) Storage::disk('public')->delete($user->avatar);
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
            $user->save();
        }

        // ------------------------------
        // Experiences
        // ------------------------------
        if ($request->has('experiences')) {

            $user->experiences()->delete();

            foreach ($request->experiences as $exp) {
                if (empty($exp['title']) && empty($exp['company']) && empty($exp['start_date'])) continue;

                $user->experiences()->create([
                    'user_id' => $user->id, // <-- Important fix
                    'title' => $exp['title'],
                    'company' => $exp['company'],
                    'start_date' => $exp['start_date'] ? Carbon::createFromFormat('Y-m', $exp['start_date'])->startOfMonth() : null,
                    'end_date' => $exp['end_date'] ? Carbon::createFromFormat('Y-m', $exp['end_date'])->startOfMonth() : null,
                ]);
            }
        }

        // ------------------------------
        // Skills
        // ------------------------------
        if ($request->filled('skills')) {
            $user->skills()->delete();

            $skillNames = array_filter(array_map('trim', explode(',', $request->skills)));

            foreach ($skillNames as $name) {
                $user->skills()->create([
                    'user_id' => $user->id, // <-- Important fix
                    'name' => $name,
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
    }
}