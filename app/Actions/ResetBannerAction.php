<?php

namespace App\Actions;

use App\Models\Banner;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResetBannerAction {

    public function handle($id) 
    {
        $banner = Banner::findOrFail($id);

        if($banner->file_name && Storage::disk('banners')->exists($banner->file_name)) {
            Storage::disk('banners')->delete($banner->file_name);
            Banner::findOrFail($id)->update([
                'name_project' => null,
                'project_url' => null,
                'path_img' => null,
                'file_name' => null,
                'buy_term' => null,
                'state' => 0,
                'reserved' => 0,
                'user_id' => Auth::user()->id,
            ]);
            Session::flash('message', 'reset');
        } else {
            Session::flash('message', 'error');
        }
    }

}