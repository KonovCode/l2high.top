<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Banner;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $project_user = ProjectResource::collection(Project::all()->where('user_id', Auth::user()->id));
        
        $banners_all = BannerResource::collection(Banner::all());
        $projects_all = ProjectResource::collection(Project::all());
        $users_all = UserResource::collection(User::all()->where('role', 'user'));
        
        return Inertia::render('Dashboard', [
            'projects' => Auth::user()->role === 'admin' ? $projects_all : $project_user,
            'banners' => Auth::user()->role === 'admin' ? $banners_all : null,
            'users' => Auth::user()->role === 'admin' ? $users_all : null,
        ]);
    }
}
