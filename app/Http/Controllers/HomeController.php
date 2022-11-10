<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index() 
    {
        Banner::check_term();
        
        return Inertia::render('Home', 
        [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
