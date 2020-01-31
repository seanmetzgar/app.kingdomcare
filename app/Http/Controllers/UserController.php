<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\Traits\DashboardAPI;
use Auth;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function selectRole(Request $request, User $user) {
        if ($user->is(Auth::user()) && $user->hasRole('unknown')) {
            $role = $request->role;
            if (in_array($role, array('sitter', 'parent'))) {
                $role = Role::where('name', $role)->first();
                $role_unknown = Role::where('name', 'unknown')->first();
                if ($role !== null) {
                    $user->roles()->attach($role);
                    $user->roles()->detach($role_unknown);
                }
            }
        }

        return redirect()->route('dashboard');
    }
}
