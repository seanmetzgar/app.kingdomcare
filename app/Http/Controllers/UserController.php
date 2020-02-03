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

    public function continueRegistration(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();

            if (!$user->registration_complete) {
                if ($user->hasRole('sitter')) {
                    return view('auth.register.next.sitter');
                } elseif ($user->hasRole('parent') && $user->hasRole('incomplete')) {
                    return view('auth.register.next.parent');
                }
            } else {
                return redirect()->route('dashboard');
            }
        }
        abort(403);
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

    public function update(Request $request, User $user = null) {
        if (verify_modelkey_field($request, $user)) {
            if ($user->hasRole('sitter')) {
                // Experience Description
                $experience_description = $request->input('experience_description');
                $user->experience_description = $experience_description ?
                    $experience_description : $user->experience_description;

                // Experience Fields
                $experience_infant = $request->input('experience_infant');
                $user->experience_infant = $experience_infant ? true : false;
                $experience_toddler = $request->input('experience_toddler');
                $user->experience_toddler = $experience_toddler ? true : false;
                $experience_school_age = $request->input('experience_school_age');
                $user->experience_school_age = $experience_school_age ? true : false;

                //Video Resume
                $video_resume = $request->input('video_resume');
                $user->video_resume = $video_resume ?
                    $video_resume : $user->video_resume;


            }

            // Journey with Christ
            $journey = $request->input('journey');
            $user->journey = $journey ?
                $journey : $user->journey;

            if ($request->input('registration_complete') === "1") {
                $user->registration_complete = true;
            }

            $user->save();
            return redirect()->route('dashboard');
        }

        abort(403);
    }


}
