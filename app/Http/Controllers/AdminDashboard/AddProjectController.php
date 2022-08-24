<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddProjectController extends Controller
{
    public function index() {
        return Inertia::render('DashboardAdminPages/AddProject');
    }
}
