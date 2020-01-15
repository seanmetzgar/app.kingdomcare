<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Traits\DashboardAPI;

class DashboardController extends Controller
{
    use DashboardAPI;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $defaultTimeRestraint = 'this-week';
        $globalTimeRestraint = $request->session()->get('dashboard-globalTimeRestraint', $defaultTimeRestraint);
        if ($globalTimeRestraint === 'custom') {
            $request->session()->get('dashboard-signupsTimeRestraint', $defaultTimeRestraint);
        } else {
            $signupsTimeRestraint = $globalTimeRestraint;
            $request->session()->put('dashboard-signupsTimeRestraint', $signupsTimeRestraint);
        }

        //New Signups
        $newSignups = $this->getNewSignupsCounts($signupsTimeRestraint);
        if (property_exists($newSignups, 'current')) {
            $newSitters = (property_exists($newSignups->current, 'sitter')) ? $newSignups->current->sitter : 0;
            $newParents = (property_exists($newSignups->current, 'parent')) ? $newSignups->current->parent : 0;
        } else {
            $newSitters = 0;
            $newParents = 0;
        }
        $newUsers = $newParents + $newSitters;

        $viewData = [
            'newSitters' => $newSitters,
            'newParents' => $newParents,
            'newSignups' => $newUsers
        ];

        if (property_exists($newSignups, 'delta')) {
            $deltaSitters = (property_exists($newSignups->delta, 'sitter')) ? $newSignups->delta->sitter : 0;
            $deltaParents = (property_exists($newSignups->delta, 'parent')) ? $newSignups->delta->parent : 0;
            $deltaUsers = $deltaParents + $deltaSitters;

            $deltaUsersIncrease = $newUsers - $deltaUsers;
            $deltaUsersChange = $deltaUsers !== 0 ? round(($deltaUsersIncrease / $deltaUsers) * 100) : false;
            $newSignupsDeltaSpan = (property_exists($newSignups, 'deltaSpan')) ? $newSignups->deltaSpan : false;
        } else {
            $newSignupsDeltaSpan = false;
        }

        if ($newSignupsDeltaSpan !== false && $deltaUsersChange !== false) {
            $viewData['deltaSignupsSpan'] = $newSignupsDeltaSpan;
            $viewData['deltaSignups'] = (int)$deltaUsersChange;
        }

        return view('app.dashboard')->with($viewData);
    }
}
