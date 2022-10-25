<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Actions\updatePriceAction;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $services = Service::all();

        return Inertia::render('DashboardAdminPages/Price', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePrice(Request $request, $id, updatePriceAction $action) 
    {
        $action->handle($request, $id);

        return back();
    }
     
}
