<?php

namespace App\Listeners;

use App\Events\StatusProjectControll;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Project;
use Illuminate\Support\Carbon;

class CheckTermProjectPremium
{
    public function handle(StatusProjectControll $event)
    {
        $projects = Project::all();

        foreach($projects as $project) {

            if(Carbon::create($project->premium_term)->toDateString() < Carbon::now()->toDateString()) {

                Project::findOrFail($project->id)->update(['premium_term' => null, 'premium' => '0']);

            }

        }

        
    }
}
