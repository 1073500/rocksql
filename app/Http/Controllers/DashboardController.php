<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rock;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user->load('rock.continent');
        $rocks = $user->rock ?? collect();
        return view('dashboard', compact('user', 'rocks'));
    }
}
