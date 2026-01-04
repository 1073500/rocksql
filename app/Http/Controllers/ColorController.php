<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['color', 'required|string|max:255']);
    }

    public function destroy(Color $color)
    {
        $color->delete();
    }
}
