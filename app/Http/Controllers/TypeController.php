<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['type', 'required|string|max:255']);
    }

    public function destroy(Type $type)
    {
        $type->delete();
    }
}
