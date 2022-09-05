<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyStatusRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BuyStatusController extends Controller
{
    public function index() {
        $projects = ProjectResource::collection(Project::all()->where('user_id', Auth::user()->id));
        return Inertia::render('DashboardUserPages/StatusPages/StatusPage', ['projects' => $projects]);
    }

    public function top() {
        return Inertia::render('DashboardUserPages/StatusPages/TopStatus');
    }

    public function vip() {
        return Inertia::render('DashboardUserPages/StatusPages/VipStatus');
    }

    public function premium() {
        return Inertia::render('DashboardUserPages/StatusPages/PremiumStatus');
    }
}
