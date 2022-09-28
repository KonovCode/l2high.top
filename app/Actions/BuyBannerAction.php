<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BuyBannerAction {
    
    public function handle($buy_data) {

        $service = Service::find($buy_data['buy_term']);
        $banner = Banner::find($buy_data['banner_id']);
        
        if(Auth::user()->balance >= $service->price && $banner->reserved === 0) {
            User::where('id', Auth::user()->id)->update(['balance' => (Auth::user()->balance - $service->price)]);
            $image = Storage::putFile('public/banners', $buy_data->file('img'));
            $banner->update([
                'name_project' => $buy_data['name_project'],
                'url' => $buy_data['url'],
                'img' => $image,
                'buy_term' => Carbon::now()->addDays($service->term)->toDateTimeString(),
                'reserved' => 1,
                'user_id' => Auth::user()->id, 
            ]);
            Session::flash('message', 'ok');
        } else {
            Session::flash('message', 'balance');
        }

    }

}