<?php

namespace App\Actions;

use App\Models\Service;
use Illuminate\Support\Facades\Session;

class updatePriceAction 
{

    public function handle($price, $id) 
    {
        $new = $price->validate([
            'price' => ['required', 'numeric', 'between:0,3000'],
        ]);

        Service::findOrFail($id)->update(['price' => $new['price']]);

        Session::flash('message', 'update');
    }

}