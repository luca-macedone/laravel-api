<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with(['technologies', 'type', 'user'])->orderByDesc('id')->paginate(8);
        
        if(count($projects) > 0){
            // if the db have something returns it
            return response()->json([
                'status' => true,
                'projects' => $projects,
            ]);

        }else{
            // if the db is empty return false
            return response()->json([
                'status' => false,
                'projects' => null,
            ]);

        }
    }
}
