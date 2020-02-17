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
                } elseif ($user->hasRole('parent')) {
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
                setIfHasInput($request, 'experience_description', $user);

                // Experience Fields
                setIfHasBoolInput($request, 'experience_infant', $user);
                setIfHasBoolInput($request, 'experience_toddler', $user);
                setIfHasBoolInput($request, 'experience_school_age', $user);
                // END Experience Fields

                // Special Needs
                setIfHasBoolInput($request, 'experience_add_adhd', $user);
                setIfHasBoolInput($request, 'experience_asd', $user);
                setIfHasBoolInput($request, 'experience_visually_impaired', $user);
                setIfHasBoolInput($request, 'experience_hearing_impaired', $user);
                setIfHasBoolInput($request, 'experience_developmental', $user);
                setIfHasBoolInput($request, 'experience_behavioral', $user);
                setIfHasBoolInput($request, 'experience_down_syndrome', $user);
                setIfHasBoolInput($request, 'experience_seizures', $user);
                // END Special Needs

                // Video Resume
                setIfHasInput($request, 'video_resume', $user);

                // Hourly Rate
                setIfHasInput($request, 'standard_hourly_rate', $user);

            } elseif ($user->hasRole('parent')) {
                $children = buildChildrenArray($request->input("children"));
                if (is_array($children)) {
                    $user->children = json_encode($children);
                }
            }

            // Name
            setIfHasInput($request, 'first_name', $user);
            setIfHasInput($request, 'last_name', $user);
            setIfHasInput($request, 'display_name', $user);

            // Address Info
            setIfHasInput($request, 'city', $user);
            setIfHasInput($request, 'region', $user);

            // About
            setIfHasInput($request, 'about', $user);

            // Journey with Christ
            setIfHasInput($request, 'journey', $user);

            if ($request->input('registration_complete') === "1") {
                $user->registration_complete = true;
            }

            $user->save();
            return back();
        }

        abort(403);
    }


}
