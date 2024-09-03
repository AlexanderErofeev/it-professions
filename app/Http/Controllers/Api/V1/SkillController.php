<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;


class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Skill::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request) : Skill
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
        return $skill;
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill) : Skill
    {
        return $skill;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill) : Skill
    {
        $skill->update($request->all());
        return $skill;
    }

    /**
     * Remove the specified resource from storage.
     * @param Skill $skill
     * @return JsonResponse
     */
    public function destroy(Skill $skill): \Illuminate\Http\JsonResponse
    {
        if (!is_null($skill->image_path)) Storage::delete($skill->image_path);
        $skill->delete();
        return response()->json([
            'message' => 'Навык удален'
            ]
        );
    }
}
