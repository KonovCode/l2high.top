<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class updateUserBalanceAction {

    public function handle($balance, $id) 
    {
        $new = $balance->validate([
            'balance' => ['required', 'numeric', 'between:0,500'],
        ]);

        User::findOrFail($id)->update(['balance' => $new['balance']]);
        
        Session::flash('message', 'update');
    }

}