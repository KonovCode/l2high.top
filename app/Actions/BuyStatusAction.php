<?php

namespace App\Actions;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BuyStatusAction
{
    public function handle($buy_data)
    {
        $service = Service::all()->find($buy_data['buy_service_id']);
        $project = Project::findOrFail($buy_data['project_id']);

        User::where('id', Auth::user()->id)->update([
            'balance' => (Auth::user()->balance - $service->price),
        ]);

        if($project->status === $service->name)
        {
            $project->update(['status_term' => Carbon::create($project->status_term)->addDays($service->term)->toDateString()]);
        }

        if($project->status === 'default')
        {
            $project->update(['status' => $service->name, 'status_term' => Carbon::now()->addDays($service->term)->toDateString()]);
        }

        if($project->status !== 'default' && $project->status !== $service->name) {
            $project->update([
                'status' => $service->name,
                'status_term' => Carbon::now()->addDays($service->term)->toDateString()
            ]);
        }
    }
}
