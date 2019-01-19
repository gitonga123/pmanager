<?php

namespace pmanager\Http\Controllers;

use Illuminate\Http\Request;
use pmanager\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->id === 3) {
            $projects = Project::all();
        } else if (Auth::check()) {

            $projects = Project::where('user_id', Auth::user()->id)->get();
        } else {
            return redirect()->route('login')->with("Kasambuyu Oyole");
        }
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = false;
        if (Auth::check()) {
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input(['description']),
                'user_id' => Auth::user()->id,
            ]);
        }

        if($project) {
            return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'project Created Successfully');
        } else {
            return back()->withInput()->with('errors', ['The project could not be created, Contact your Admin']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
//        $project =  Project::where('id', $project->id)->first();
        $project = Project::find($project->id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project =  Project::find($project->id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //save data
        $projectUpdate = Project::where('id', $project->id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);
        if ($projectUpdate) {
            return redirect()->route('projects.show', ['project' => $project->id])
                ->with('success', 'Project Updated Successfully');
        }
        // redirect
        return back()->withInput()->with('errors', ['Project could not be updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $findProject = Project::find($project->id);

        if ($findProject->delete()) {
            return redirect()->route('projects.index')->with('success', 'Project Deleted Successfully');
        }

        return back()->withInput()->with('error', ['Project could not be deleted']);
    }
}
