<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professions = Profession::all();
        return view('professions.index', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image_path' => 'required|image|max:2048',
        ]);
        $imagePath = $request->file('image_path')->store('public/images/professions');
        $profession = new Profession([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'short_description' => $request->get('short_description'),
            'example' => $request->get('example'),
            'image_path' => $imagePath,
            'occupation' => $request->get('occupation'),
            'history' => $request->get('history'),
            'demanded_industries' => $request->get('demanded_industries'),
            'career' => $request->get('career'),
            'description_count_vacancies' => $request->get('description_count_vacancies'),
            'description_salary' => $request->get('description_salary'),
            'is_have_statistics' => $request->boolean('is_have_statistics'),
        ]);
        $profession->save();

        return redirect('/professions')->with('success', 'Profession create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profession $profession)
    {
        return view('professions.show', compact('profession'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profession $profession)
    {
        return view('professions.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profession $profession)
    {
        $image_path = $request->file('image_path');
        if (!is_null($image_path))
            Storage::delete($profession->image_path);
        $image_path = $image_path?->store('public/images/professions');

        $profession->update(array_filter([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'short_description' => $request->get('short_description'),
            'example' => $request->get('example'),
            'image_path' => $image_path,
            'occupation' => $request->get('occupation'),
            'history' => $request->get('history'),
            'demanded_industries' => $request->get('demanded_industries'),
            'career' => $request->get('career'),
            'description_count_vacancies' => $request->get('description_count_vacancies'),
            'description_salary' => $request->get('description_salary'),
        ]));

        $profession->is_have_statistics = $request->boolean('is_have_statistics');
        $profession->save();

        return redirect()->route('professions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profession $profession)
    {
        //
    }
}
