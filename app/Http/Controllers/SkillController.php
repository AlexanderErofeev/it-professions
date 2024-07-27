<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|max:2048',
        ]);

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
}
