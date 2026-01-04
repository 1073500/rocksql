<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Hardness;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Rock;
use App\Models\Continent;
use App\Models\Comment;

class RockController extends Controller
{
    public function index(Request $request)
    {
        $rocks = Rock::query();

        $continents = Continent::all();
        $types = Type::all();
        $colors = Color::all();
        $hardnesses = Hardness::all();
        $categories = Category::all();

        //search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $rocks->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }


        //filter op continent
        $continentId = $request->input('continent');
        $rocks->when($continentId, function ($query, $continentId) {
            return $query->where('continent_id', $continentId);
        });


        //filter op type
        $typeId = $request->input('type');
        $rocks->when($typeId, function ($query, $typeId) {
            return $query->where('type_id', $typeId);
        });

        //filter op color
        $colorId = $request->input('color');
        $rocks->when($colorId, function ($query, $colorId) {
            return $query->where('color_id', $colorId);
        });

        //filter op hardness
        $hardnessId = $request->input('hardness');
        $rocks->when($hardnessId, function ($query, $hardnessId) {
            return $query->where('hardness_id', $hardnessId);
        });

        //filter op category
        $categoryId = $request->input('category');
        $rocks->when($categoryId, function ($query, $categoryId) {
            return $query->where('category_id', $categoryId);
        });

        $rocks = $rocks->paginate(6);

        //voor remove knop filteren
        $activeFilters = 0;

        $filterKeys = [
            'continent',
            'type',
            'color',
            'hardness',
            'category',
            'search',
        ];

        foreach ($filterKeys as $key) {
            if ($request->filled($key)) {
                $activeFilters++;
            }
        }


        return view('rocks.index', compact('rocks', 'continents', 'types', 'colors', 'hardnesses', 'categories', 'activeFilters'));
    }

    public function store(Request $request)
    {
        //dd(auth()->id());

        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'color_id' => 'required|exists:colors,id',
            'hardness_id' => 'required|exists:hardness,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
//            'image' => 'nullable|url|max:2048',
            'continent_id' => 'required|exists:continents,id',
        ]);

        //insert into
        $rock = new Rock();
        $rock->title = $request->input('title');
        $rock->name = $request->input('name');
        $rock->type_id = $request->input('type_id');
        $rock->color_id = $request->input('color_id');
        $rock->hardness_id = $request->input('hardness_id');
        $rock->category_id = $request->input('category_id');
        $rock->description = $request->input('description');
        $rock->image = $request->input('image');
        $rock->continent_id = $request->input('continent_id');
        $rock->user_id = auth()->id();
        $rock->save();

        return redirect()->route('rocks.index', $rock->id);
    }

    //CRUD
    //Create
    public function create()
    {
        $rock = Rock::all();

        $continents = Continent::all();
        $types = Type::all();
        $colors = Color::all();
        $hardnesses = Hardness::all();
        $categories = Category::all();

        return view('rocks.create', compact('rock'), compact('continents', 'types', 'colors', 'hardnesses', 'categories'));
    }

    //Read
    public function show(Rock $rock)
    {
        //$rock = Rock::all();
        return view('rocks.show', compact('rock'));
    }

    //edit
    public function edit(Rock $rock)
    {
        if ($rock->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $continents = Continent::all();
        $types = Type::all();
        $colors = Color::all();
        $hardnesses = Hardness::all();
        $categories = Category::all();
        return view('rocks.edit', compact('rock', 'continents', 'types', 'colors', 'hardnesses', 'categories'));
    }

    //Update
    public function update(Request $request, Rock $rock)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'color_id' => 'required|exists:colors,id',
            'hardness_id' => 'required|exists:hardness,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|url|max:2048',
            'continent_id' => 'required|exists:continents,id',
        ]);
        $rock->update($request->all());

        $rock->save();
        return redirect()->route('rocks.show', $rock->id);
    }

    //Delete
    public function destroy(Rock $rock)
    {
        if ($rock->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $rock->delete();
        return redirect()->route('rocks.index', $rock);
    }

    //comments
    public function storeComment(Request $request, Rock $rock)
    {
        //diepere validatie
        $user = $request->user();

        if ($user->rock()->count() < 1) {
            return redirect()->route('rocks.show', $rock->id)
                ->withErrors(['comment_error' => 'You must have added at least 5 rocks to comment.']);
        }

        //store en val gedeelte
        $request->validate(['comment' => 'required|string|max:1000',]);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = auth()->id();
        $comment->rock_id = $rock->id;
        $comment->save();

        return redirect()->route('rocks.show', $rock->id);
    }

    public
    function destroyComment(Request $request, Rock $rock, Comment $comment)
    {
        if ($comment->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $rock = $comment->rock;

        $comment->delete();

        return redirect()->route('rocks.show', $rock->id);
    }
}
