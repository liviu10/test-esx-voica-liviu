<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Handles profile management tasks such as viewing, updating, and deleting a user's profile.
 */
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param \App\Http\Requests\ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        if ($request->hasFile('profile_image')) {
            $request->validate([
                'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);
            if ($user->profile_image && file_exists(storage_path('app/public/profile_images/' . $user->profile_image))) {
                unlink(storage_path('app/public/profile_images/' . $user->profile_image));
            }
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
            $user->fill($request->validated());
            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();
        
            return Redirect::route('profile.edit');
        }
    }

    /**
     * Delete the user's account.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
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
