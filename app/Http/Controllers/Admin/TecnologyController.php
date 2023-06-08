<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTecnologyRequest;
use App\Http\Requests\UpdateTecnologyRequest;
use App\Models\Tecnology;
use App\Models\Project;

class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologies = Tecnology::all();
        return view('admin.tecnologies.index', compact('tecnologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTecnologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTecnologyRequest $request)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Tecnology::generateSlug($val_data['name']);
        Tecnology::create($val_data);
        return to_route('admin.tecnologies.index')->with('message', 'Tecnology created with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnology  $tecnology
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnology $tecnology)
    {
        $projects = Project::where("tecnology_id", '=', "$tecnology->id")->get();
        return view('admin.tecnologies.index', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnology  $tecnology
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnology $tecnology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTecnologyRequest  $request
     * @param  \App\Models\Tecnology  $tecnology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTecnologyRequest $request, Tecnology $tecnology)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Project::generateSlug($val_data['name']);

        $tecnology->update($val_data);
        return to_route('admin.tecnologies.index')->with('message', 'Tecnology updated with success'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnology  $tecnology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnology $tecnology)
    {
        $tecnology->delete();
        return to_route('admin.tecnologies.index')->with('message', 'Tecnology deleted with success');
    }
}
