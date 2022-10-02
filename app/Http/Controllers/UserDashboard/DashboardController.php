<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index() {
        $projects = ProjectResource::collection(Project::all()->where('user_id', Auth::user()->id));
        return Inertia::render('Dashboard', ['projects' => $projects]);
    }
}
