<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BuyStatusController extends Controller
{
    public function index() {
        return Inertia::render('DashboardUserPages/StatusPages/TopStatus');
    }

    public function vip() {
        return Inertia::render('DashboardUserPages/StatusPages/VipStatus');
    }

    public function premium() {
        return Inertia::render('DashboardUserPages/StatusPages/PremiumStatus');
    }
}
