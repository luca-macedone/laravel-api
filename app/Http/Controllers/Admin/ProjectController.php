<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc('year_of_development')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.create', compact('types', 'tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Project::generateSlug($val_data['title']); 
        // dd($val_data);
        $newProject = Project::create($val_data);

        if($request->has('tecnologies')){
            $newProject->tecnologies()>attach($request->tecnologies);
        }

        return to_route('admin.projects.index')->with('message', "Project: '" . $val_data['title'] . "' added with success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // dd($project);
        $type = Type::find($project->type_id);
        // dd($type);
        return view('admin.projects.show', compact(['project', 'type']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.edit', compact(['project', 'types', 'tecnologies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request);
        $val_data = $request->validated();
        $val_data['slug'] = Project::generateSlug($val_data['title']); 

        $project->update($val_data);

        if($request->has('tecnologies')){
            $project->tecnologies()->sync($request->tecnologies);
        }

        return to_route('admin.projects.index')->with('message', "Project: '" . $val_data['title'] . "' edited with success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project deleted with success');
    }
}
