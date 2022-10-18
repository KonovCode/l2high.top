<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Actions\AddAdminBannerAction;
use App\Actions\ResetBannerAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use Inertia\Inertia;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index() 
    {
        $banners = BannerResource::collection(Banner::all());
        $services = Service::all();

        return Inertia::render('DashboardAdminPages/Banner', ['banners' => $banners, 'services' => $services]);
    }

    public function reset($id, ResetBannerAction $action) 
    {
        $action->handle($id);

        return back();
    }

    public function activate($id) 
    {
        Banner::findOrFail($id)->update(['state' => 1]);

        return back();
    }

    public function unactivate($id) 
    {
        Banner::findOrFail($id)->update(['state' => 0]);

        return back();
    }

    public function download($id) 
    {

        return response()->download(public_path('storage/banners/'.Banner::findOrFail($id)->file_name));

    }

    public function upload(Request $request, AddAdminBannerAction $action) 
    {
        
        $action->handle($request);

    }


}
