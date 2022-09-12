<?php

namespace App\Actions;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BuyPremiumAction
{
    public function handle($buy_data) {

        $service = Service::all()->find($buy_data['buy_premium_id']);
        $project = Project::all()->find($buy_data['project_id']);

        User::where('id', Auth::user()->id)->update(['balance' => (Auth::user()->balance - $service->price)]);

        switch ($buy_data['premium_state']) {
            case (0) :
                $project->update(['premium_term' => Carbon::now()->addDays($service->term)->toDateString(), 'premium' => 1]);
                break;
            case (1) :
                $project->update(['premium_term' => (Carbon::create($project->premium_term)->addDays($service->term)->toDateString())]);
                break;
        }
    }
}
