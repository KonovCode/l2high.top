<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AddProjectController extends Controller
{
    public function index() {
        return Inertia::render('DashboardUserPages/AddProjectComponent');
    }
}
