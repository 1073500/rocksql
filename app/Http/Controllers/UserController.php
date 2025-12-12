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

    public function isActive($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = $user->is_active ? 0 : 1;
//        if ($user->is_active === 0) {
//            abort(403, 'Account is deactivated.');
//        }
        $user->save();


        return redirect()->back();
    }

}
