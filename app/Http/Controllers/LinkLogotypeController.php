<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LinkLogotypeController extends Controller
{
    public function __invoke()
    {
        $logotype = asset('/storage/logotype/imgonline-com-ua-Resize-s6QNQZl3Ab63g8.jpg');

        return Inertia::render('Logotype', ['logo' => $logotype]);
    }
}
