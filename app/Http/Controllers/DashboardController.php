<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rock;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user->load('rock.continent');
        $rocks = $user->rock ?? collect(); //lege array, dn blijft ie werken
        return view('dashboard', compact('user', 'rocks'));
    }

    public function getProfilePicture(Request $request)
    {
        $user = $request->user();

        $url = $user->profile_picture
            ? Storage::url($user->profile_picture)
            : asset('images/profile.png');

        return response()->json(['profile_picture' => $url]);
    }
}
