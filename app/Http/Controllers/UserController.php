<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Edit user (owner or admin).
     */
    public function edit(User $user): View
    {
        if ($user->id !== auth()->id() && ! auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function destroy(User $user)
    {
        if ($user->id !== auth()->id() && ! auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $user->delete();
        return redirect('admin.dashboard')->with('status', 'User deleted successfully.');
    }
}
