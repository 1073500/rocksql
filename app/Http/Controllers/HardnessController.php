<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardness;

class HardnessController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['hardness', 'required|numeric|min:1|max:10']);
    }

    public function destroy(Hardness $hardness)
    {
        $hardness->delete();
    }
}
