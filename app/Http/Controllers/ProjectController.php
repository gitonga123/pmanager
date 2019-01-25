<?php

namespace pmanager\Http\Controllers;

use Illuminate\Http\Request;
use pmanager\Company;
use pmanager\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->roles === 3) {
            $projects = Project::all();
        } else if (Auth::check()) {

            $projects = Project::all();
        } else {
            return redirect()->route('login')->with("Kasambuyu Oyole");
        }
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $company_id
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {

        $companies = null;
        if ($company_id) {

            $company = Company::find(intval($company_id));
            return view('projects.create', compact(['company', 'companies' ]));
        } else {
            $companies = Company::where('user_id', Auth::user()->id)->get();
            return view('projects.create', compact('companies'));
        }

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
                'company_id' => $request->input('company_id'),
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
        $comments = $project->comments;
        return view('projects.show', compact(['comments', 'project']));
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

        /**
     * Remove the specified resource from storage.
     *
     * @param  project  $project
     * @return \Illuminate\Http\Response
     */
    public function adduser(Reequest $request)
    {
        $project = ProjectUser::find($request->input('project_id'));
        $user = User::where('email', $request->input('email'));

        if ($user && $project) {
            $project->users()->attach($user->id);
        }
    }
 
}
