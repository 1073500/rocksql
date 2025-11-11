<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Continent;

class ContinentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['name', 'required|string|max:255']);
    }

    public function destroy(Continent $continent)
    {
        $continent->delete();
    }
}
