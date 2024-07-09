<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ProjectResource::collection(Project::with('skill')->get());
        return Inertia::render('Projects/Index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();

        return Inertia::render('Projects/Create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        try {
            $data = $request->ProjectDTO()->toArray();

            //remove image from the data as it is handled seperately
            unset($data['image']);

            //begin db transaction for data integrity
            DB::beginTransaction();
            Log::info('Data received for project creation', $data);

            $skill = Project::create([
                'name' => $data['name'],
                'project_url' => $data['project_url']
            ]);
            $skill->skill_id = $data['skill_id'];
            $skill->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image')->store('projects');
                $skill->image = $image;
                $skill->save();
            }

            DB::commit();

            return Redirect::route('projects.index')->with('message', 'Project created successfully');;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Create Project Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return Redirect::back()->withErrors(['error' => 'An error occurred while saving the project.'])->withInput();
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
    public function edit(Project $project)
    {
        $skills = Skill::all();
        return Inertia::render('Projects/Edit', compact('project', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        try {
            $data = $request->ProjectDTO()->toArray();

            //remove image from the data as it is handled seperately
            unset($data['image']);

            //begin db transaction for data integrity
            DB::beginTransaction();
            Log::info('Data received for project creation', $data);

            $project->update([
                'name' => $data['name'],
                'project_url' => $data['project_url']
            ]);
            $project->skill_id = $data['skill_id'];
            $project->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image')->store('projects');
                $project->image = $image;
                $project->save();
            }

            DB::commit();

            return Redirect::route('projects.index')->with('message', 'Project updated successfully');;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Update Project Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return Redirect::back()->withErrors(['error' => 'An error occurred while update the project.'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            Storage::delete($project->image);
            $project->delete();
            return Redirect::back()->with('message', 'Project deleted successfully');
        } catch (\Exception $e) {
            Log::error('Delete Project Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return Redirect::back()->withErrors(['error' => 'An error occur while deleting the skill'])->withInput();
        }
    }
}
