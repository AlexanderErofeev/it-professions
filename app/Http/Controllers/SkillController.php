<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillsUpdateRequest;
use App\Http\Requests\SkillsStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function store(SkillsStoreRequest $request) : RedirectResponse
    {
        $imagePath = $request->file('image_path')->store('public/images/skills');
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
    public function update(SkillsUpdateRequest $request, Skill $skill) : RedirectResponse
    {
        $image_path = $request->file('image_path');
        if (!is_null($image_path))
            Storage::delete($skill->image_path);
        $image_path = $image_path?->store('public/images/skills');
        $skill->update(array_filter([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description'),
            'image_path' => $image_path,
        ]));
        return redirect()->route('skills.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill) : RedirectResponse
    {
        Storage::delete($skill->image_path);
        $skill->delete();
        return redirect()->route('skills.index');
    }
}
