<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $premiumLimit = Project::all()->where('premium', 1);
        $projects = ProjectResource::collection(Project::all());

        return Inertia::render('DashboardAdminPages/Projects', ['projects' => $projects, 'premiumLimit' => count($premiumLimit)]);
    }

    public function create()
    {
        return Inertia::render('DashboardAdminPages/AddProject');
    }

    public function store(ProjectRequest $request)
    {
        new ProjectResource(Project::create($request->validated()));

        Session::flash('message', 'ok');

        return redirect()->back();
    }

    public function update(ProjectUpdateRequest $request, $id)
    {
        Project::findOrFail($id)->update($request->validated());

        Session::flash('message', 'update');

        return back();
    }

    
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();

        Session::flash('message', 'delete');

        return back();
    }

    public function projectAddPublic($id) 
    {
        Project::findOrFail($id)->update(['state_public' => 1]);

        Session::flash('message', 'public');

        return back();
    }

    public function projectRemovePublic($id) {
        Project::findOrFail($id)->update(['state_public' => 0]);

        Session::flash('message', 'del_public');

        return back();
    }
}
