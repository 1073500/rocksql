<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rock;
use App\Models\Continent;

class RockController extends Controller
{
    public function index()
    {
        $rocks = Rock::all();
        return view('rocks.index', compact('rocks'));
    }

    public function store(Request $request)
    {
        //dd(auth()->id());

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'hardness' => 'required|numeric|min:1|max:10',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'continent_id' => 'required|exists:continents,id',
        ]);

        //insert into
        $rock = new Rock();
        $rock->name = $request->input('name');
        $rock->type = $request->input('type');
        $rock->color = $request->input('color');
        $rock->hardness = $request->input('hardness');
        $rock->category = $request->input('category');
        $rock->description = $request->input('description');
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

        return view('rocks.create', compact('rock'), compact('continents') );
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
        $continents = Continent::all();
        return view('rocks.edit', compact('rock', 'continents'));
    }

    //Update
    public function update(Request $request, Rock $rock)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'hardness' => 'required|numeric|min:1|max:10',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'continent_id' => 'required|exists:continents,id',
        ]);
        $rock->update($request->all());

        $rock->save();
        return redirect()->route('rocks.show', $rock->id);
    }

    //Delete
    public function destroy(Rock $rock)
    {
        $rock->delete();
        return redirect()->route('rocks.index', $rock);
    }
}
