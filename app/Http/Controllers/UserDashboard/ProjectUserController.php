<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectUserRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;


class ProjectUserController extends Controller
{
    
    public function create()
    {
        $countProject = count(Project::all()->where('user_id', Auth::user()->id));

        return Inertia::render('DashboardUserPages/AddProjectComponent', ['count_project' => $countProject]);
    }

    
    public function store(ProjectUserRequest $request)
    {
        new ProjectResource(Project::create($request->validated()));

        Session::flash('message', 'Проект успешно добавлен!.');

        return redirect()->back();
    }

    
    public function queryDelete($id)
    {
        new ProjectResource(Project::where('user_id', Auth::user()->id)->findOrFail($id)->update(['state_project' => 1]));

        return back();
    }

    
    public function queryUnDelete($id)
    {
        new ProjectResource(Project::where('user_id', Auth::user()->id)->findOrFail($id)->update(['state_project' => 0]));

        return back();
    }
}
