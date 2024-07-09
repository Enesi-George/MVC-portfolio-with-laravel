<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\SkillResource;
use App\Http\Resources\ProjectResource;

class welcomeController extends Controller
{
    public function welcome()
    {
        $skillLists = ["Django", "Laravel", "NodeJs", "ReactJS"];
        $majorSkills = SkillResource::collection(Skill::whereIn('name', $skillLists)->get());
        $skills = SkillResource::collection(Skill::all());
        $projects = ProjectResource::collection(Project::with('skill')->get());

        return Inertia::render('Welcome', compact('skills', 'projects', 'majorSkills'));
    }
}
