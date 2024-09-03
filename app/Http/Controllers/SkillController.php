<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSkillRequest;
use App\Http\Requests\StoreSkillRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use App\Models\Skill;
use Illuminate\View\View;


class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('skills.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request) : RedirectResponse
    {
        $imagePath = $request->file('image_path');
        if (!is_null($imagePath))
            $imagePath->store('public/images/skills');
        $skill = new Skill([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description'),
            'image_path' => $imagePath,
        ]);
        $skill->save();

        return redirect('/skills')->with('success', 'Skills create successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Skill $skill) : View
    {
        return view('skills.show', compact('skill'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill) : View
    {
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill) : RedirectResponse
    {
        $imagePath = $request->file('image_path');
        if (!is_null($imagePath))
            Storage::delete($skill->image_path);
        $imagePath = $imagePath?->store('public/images/skills');
        $skill->update(array_filter([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description'),
            'image_path' => $imagePath,
        ]));
        return redirect()->route('skills.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill) : RedirectResponse
    {
        if (!is_null($skill->image_path)) Storage::delete($skill->image_path);
        $skill->delete();
        return redirect()->route('skills.index');
    }
}
