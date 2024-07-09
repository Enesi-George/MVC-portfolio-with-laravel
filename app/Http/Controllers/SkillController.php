<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SkillRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\SkillResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = SkillResource::collection(Skill::all());
        return Inertia::render('Skills/Index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Skills/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        try {
            $data = $request->SkillsDTO()->toArray();

            //remove image from the data as it is handled seperately
            unset($data['image']);

            //begin db transaction for data integrity
            DB::beginTransaction();
            $skill = Skill::create($data);

            //handle the image
            if ($request->hasfile('image')) {
                $image = $request->file('image')->store('skills');
                $skill->image = $image;
                $skill->save();
            }

            DB::commit();

            return Redirect::route('skills.index')->with('message', 'Skill created successfully');;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Create Skill Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return Redirect::back()->withErrors(['error' => 'An error occurred while saving the skill.'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return Inertia::render('Skills/Edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        try {
            $data = $request->SkillsDTO()->toArray();

            //unset the image data
            unset($data['image']);

            //begin db transaction for data integrity
            DB::beginTransaction();
            $skill->update($data);

            //handle the image
            if ($request->hasfile('image')) {
                $image = $request->file('image')->store('skills');
                $skill->image = $image;
                $skill->save();
            }
            DB::commit();
            return Redirect::route('skills.index')->with('message', 'Skill updated successfully');;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Edit Skill Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return Redirect::back()->withErrors(['error' => 'An error occur while editing the skill'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        try {
            Storage::delete($skill->image);
            $skill->delete();
            
            return Redirect::back()->with('message', 'Sskill deleted successfully');
        } catch (\Exception $e) {
            Log::error('Delete Skill Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return Redirect::back()->withErrors(['error' => 'An error occur while deleting the skill'])->withInput();
        }
    }
}
