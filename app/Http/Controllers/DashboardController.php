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
        // Get time restraint values from session
        $defaultTimeRestraint = 'this-week';
        $globalTimeRestraint = $request->session()->get('dashboard-globalTimeRestraint', $defaultTimeRestraint);
        if ($globalTimeRestraint === 'custom') {
            $signupsTimeRestraint = $request->session()->get('dashboard-signupsTimeRestraint', $defaultTimeRestraint);
            $activeTimeRestraint = $request->session()->get('dashboard-activeTimeRestraint', $defaultTimeRestraint);
        } else {
            $signupsTimeRestraint = $globalTimeRestraint;
            $activeTimeRestraint = $globalTimeRestraint;
            $request->session()->put('dashboard-signupsTimeRestraint', $signupsTimeRestraint);
            $request->session()->put('dashboard-activeTimeRestraint', $activeTimeRestraint);
        }

        //Set empty view data array
        $viewData = [];

        //Signups
        $viewData = array_merge($viewData, $this->getNewSignupsViewData($signupsTimeRestraint));

        //Active Users
        $viewData = array_merge($viewData, $this->getActiveUsersViewData($activeTimeRestraint));

        return view('app.dashboard')->with($viewData);
    }
}
