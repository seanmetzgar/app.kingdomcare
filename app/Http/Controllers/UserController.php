<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\Traits\DashboardAPI;
use Auth;
use Gate;

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

    public function view(Request $request, User $profile = null) {

        if ($profile === null) {
            $profile = Auth::user();
        }

        if (Gate::allows('view-user', $profile)) {
            if ($profile->is(Auth::user())) {
                if ($profile->hasRole('sitter')) {
                    return view('app.profile.self.sitter', ['profile' => $profile]);
                } elseif ($profile->hasRole('parent')) {
                    return view('app.profile.self.parent', ['profile' => $profile]);
                } elseif ($profile->hasRole('admin')) {
                    return view('app.profile.self.admin', ['profile' => $profile]);
                } else {
                    return view('app.profile.self.unknown', ['profile' => $profile]);
                }
            } else {
                return "someone else's profile";
            }
        } else { return "nope"; }
    }

    public function edit(Request $request, User $profile = null) {

        if ($profile === null) {
            $profile = Auth::user();
        }

        if (Gate::allows('update-user', $profile)) {
            if ($profile->hasRole('sitter')) {
                return view('app.profile.edit.sitter', ['profile' => $profile]);
            } elseif ($profile->hasRole('parent')) {
                return view('app.profile.edit.parent', ['profile' => $profile]);
            } elseif ($profile->hasRole('admin')) {
                return view('app.profile.edit.admin', ['profile' => $profile]);
            } else {
                return view('app.profile.edit.unknown', ['profile' => $profile]);
            }
        } else { abort(403); }
    }



}
