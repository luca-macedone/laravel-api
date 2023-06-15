<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Official pagination: 9
        $projects = Project::with(['technologies', 'type', 'user'])->orderByDesc('id')->paginate(3);

        if (count($projects) > 0) {
            // if the db have something returns it
            return response()->json([
                'status' => true,
                'projects' => $projects,
            ]);

        } else {
            // if the db is empty return false
            return response()->json([
                'status' => false,
                'projects' => null,
            ]);

        }
    }

    public function show($slug)
    {
        $result = Project::with(['technologies', 'type', 'user'])->where('slug', $slug)->first();

        if ($result) {
            return response()->json([
                'status' => true,
                'project' => $result,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'project' => null,
            ]);

        }
    }
}
