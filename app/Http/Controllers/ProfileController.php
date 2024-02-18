<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->user()->id,
            'age' => 'required|integer',
            'location' => 'sometimes|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'language' => 'nullable|string', // Adjust based on how you store languages; use 'array' if multiple selections are stored as an array
            'user_profile' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048',
        ]);

        
        $user = $request->user();
        $user->fill($validatedData);

        //$request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('user_profile')) {
            $uploadedFile = $request->file('user_profile');

            // Delete the old profile picture if it exists
            if ($user->user_profile) {
                $oldProfilePicturePath = public_path($user->user_profile);
                if (file_exists($oldProfilePicturePath)) {
                    unlink($oldProfilePicturePath);
                }
            }

            // Upload the new profile picture
            $profilePicturePath = $uploadedFile->store('user_profile', 'public');
            $user->user_profile = '/storage/' . $profilePicturePath;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
