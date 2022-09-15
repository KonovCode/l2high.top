<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StatusController extends Controller
{
    public function index() {

        $projects = ProjectResource::collection(Project::all()->where('user_id', Auth::user()->id));

        return Inertia::render('DashboardUserPages/StatusPages/StatusPage', ['projects' => $projects]);
    }

    public function top($id = null) {

        $top_service = Service::all()->where('name', 'top');
        $select_project = new ProjectResource(Project::where('user_id', Auth::user()->id)->findOrFail($id));

        return Inertia::render('DashboardUserPages/StatusPages/TopStatus', ['top_services' => $top_service, 'select_project' => $select_project]);
    }

    public function vip($id = null) {

        $vip_service = Service::all()->where('name', 'vip');
        $select_project = new ProjectResource(Project::where('user_id', Auth::user()->id)->findOrFail($id));

        return Inertia::render('DashboardUserPages/StatusPages/VipStatus',['vip_services' => $vip_service, 'select_project' => $select_project]);
    }

    public function premium($id = null) {

        $limit = Project::all()->where('premium', 1);
        $premium_service = Service::all()->where('name', 'premium');
        $select_project = new ProjectResource(Project::where('user_id', Auth::user()->id)->findOrFail($id));

        return Inertia::render('DashboardUserPages/StatusPages/PremiumStatus', ['premium_services' => $premium_service, 'select_project' => $select_project, 'limit' => count($limit)]);
    }

}
