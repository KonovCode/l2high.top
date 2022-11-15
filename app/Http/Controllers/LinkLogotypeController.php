<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LinkLogotypeController extends Controller
{
    public function __invoke()
    {
        $logotype = asset('/storage/logotype/l2tops.fun-logo.png');

        return Inertia::render('Logotype', ['logo' => $logotype]);
    }
}
