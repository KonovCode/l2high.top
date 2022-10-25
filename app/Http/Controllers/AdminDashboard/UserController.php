<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Actions\updateUserBalanceAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserResource::collection(User::all()->where('role', 'user'));

        return Inertia::render('DashboardAdminPages/Users', ['users' => $users]);
    }

    public function updateBalance(Request $request, $id, updateUserBalanceAction $action) 
    {
        $action->handle($request, $id);

        return back();
    }

    public function blockUser($id) 
    {
        User::findOrFail($id)->update(['user_state' => 1]);

        Session::flash('message', 'block');

        return back();
    }

    public function unblockUser($id) {
        User::findOrFail($id)->update(['user_state' => 0]);

        Session::flash('message', 'unblock');

        return back();
    }
}
