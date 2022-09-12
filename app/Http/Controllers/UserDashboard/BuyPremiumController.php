<?php

namespace App\Http\Controllers\UserDashboard;

use App\Actions\BuyPremiumAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuyPremiumRequest;

class BuyPremiumController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(BuyPremiumRequest $request, BuyPremiumAction $action)
    {
        $action->handle($request->validated());
    }
}
