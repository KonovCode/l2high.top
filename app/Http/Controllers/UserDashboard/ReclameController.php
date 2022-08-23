<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReclameController extends Controller
{
    public function index() {
        return Inertia::render('DashboardUserPages/ReclameComponent');
    }
}
