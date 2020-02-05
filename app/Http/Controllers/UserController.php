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
                $experience_description = $request->input('experience_description');
                $user->experience_description = $experience_description ?
                    $experience_description : $user->experience_description;

                // Experience Fields
                $experience_infant = checkboxBoolean($request->input('experience_infant'));
                $user->experience_infant = is_bool($experience_infant) ?
                    $experience_infant : $user->experience_infant;

                $experience_toddler = checkboxBoolean($request->input('experience_toddler'));
                $user->experience_toddler = is_bool($experience_toddler) ?
                    $experience_toddler : $user->experience_toddler;

                $experience_school_age = checkboxBoolean($request->input('experience_school_age'));
                $user->experience_school_age = is_bool($experience_school_age) ?
                    $experience_school_age : $user->experience_school_age;
                // END Experience Fields

                // Special Needs
                $experience_add_adhd = checkboxBoolean($request->input('experience_add_adhd'));
                $user->experience_add_adhd = is_bool($experience_add_adhd) ?
                    $experience_add_adhd : $user->experience_add_adhd;

                $experience_asd = checkboxBoolean($request->input('experience_asd'));
                $user->experience_asd = is_bool($experience_asd) ?
                    $experience_asd : $user->experience_asd;

                $experience_visually_impaired = checkboxBoolean($request->input('experience_visually_impaired'));
                $user->experience_visually_impaired = is_bool($experience_visually_impaired) ?
                    $experience_visually_impaired : $user->experience_visually_impaired;

                $experience_hearing_impaired = checkboxBoolean($request->input('experience_hearing_impaired'));
                $user->experience_hearing_impaired = is_bool($experience_hearing_impaired) ?
                    $experience_hearing_impaired : $user->experience_hearing_impaired;

                $experience_developmental = checkboxBoolean($request->input('experience_developmental'));
                $user->experience_developmental = is_bool($experience_developmental) ?
                    $experience_developmental : $user->experience_developmental;

                $experience_behavioral = checkboxBoolean($request->input('experience_behavioral'));
                $user->experience_behavioral = is_bool($experience_behavioral) ?
                    $experience_behavioral : $user->experience_behavioral;

                $experience_down_syndrome = checkboxBoolean($request->input('experience_down_syndrome'));
                $user->experience_down_syndrome = is_bool($experience_down_syndrome) ?
                    $experience_down_syndrome : $user->experience_down_syndrome;

                $experience_seizures = checkboxBoolean($request->input('experience_seizures'));
                $user->experience_seizures = is_bool($experience_seizures) ?
                    $experience_seizures : $user->experience_seizures;
                // END Special Needs

                // Video Resume
                $video_resume = $request->input('video_resume');
                $user->video_resume = $video_resume ?
                    $video_resume : $user->video_resume;

                // Hourly Rate
                $standard_hourly_rate = $request->input('standard_hourly_rate');
                $user->standard_hourly_rate = $standard_hourly_rate ?
                    $standard_hourly_rate : $user->standard_hourly_rate;

            } elseif ($user->hasRole('parent')) {
                $children = buildChildrenArray($request->input("children"));
                if (is_array($children)) {
                    $user->children = json_encode($children);
                }
            }

            // Name
            $first_name = $request->input('first_name');
            $user->first_name = $first_name ?
                $first_name : $user->first_name;
            $last_name = $request->input('last_name');
            $user->last_name = $last_name ?
                $last_name : $user->last_name;

            // Address Info
            $city = $request->input('city');
            $user->city = $city ?
                $city : $user->city;
            $region = $request->input('region');
            $user->region = $region ?
                $region : $user->region;

            // Journey with Christ
            $journey = $request->input('journey');
            $user->journey = $journey ?
                $journey : $user->journey;

            if ($request->input('registration_complete') === "1") {
                $user->registration_complete = true;
            }

            $user->save();
            return back();
        }

        abort(403);
    }


}
