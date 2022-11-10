<?php

namespace App\Http\Controllers;

use App\Events\StatusProjectControll;
use App\Http\Filter\ProjectFilter;
use App\Http\Requests\ProjectFilterRequest;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Banner;
use App\Models\Project;
use App\Models\Service;

class HomeController extends Controller
{
    public function index(ProjectFilterRequest $request) 
    {
        Banner::check_term();

        event(new StatusProjectControll());

        $data = $request->validated();

        $filter = app()->make(ProjectFilter::class, ['queryParams' => array_filter($data)]);
        
        $projects = ProjectResource::collection(Project::filter($filter)->where('state_public', 1)->get());

        $services = Service::all();

        return Inertia::render('Home', 
        [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'projects' => $projects,
            'services' => $services,
        ]);
    }
}
