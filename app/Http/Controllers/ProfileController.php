<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, User $user): View
    {
//        if ($user->id !== auth()->id() && ! auth()->user()->isAdmin()) {
//            abort(403, 'Unauthorized action.');
//        }

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    //user edit

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
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

    public function updatePicture(Request $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        //dan raakt de storage niet vol
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        $user->profile_picture = $path;
        $user->save();

        if ($request->wantsJson()) {
            return response()->json(['profile_picture' => Storage::url($path)]);
        }

        return back()->with('status', 'Profile picture updated.');
    }
}
