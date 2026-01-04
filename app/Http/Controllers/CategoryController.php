<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['category', 'required|string|max:255']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
