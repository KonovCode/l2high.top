<?php

namespace App\Http\Controllers\UserDashboard;

use App\Actions\BuyStatusAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuyStatusRequest;
use Inertia\Inertia;

class BuyStatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(BuyStatusRequest $request, BuyStatusAction $action)
    {
        $action->handle($request->validated());
    }
}
