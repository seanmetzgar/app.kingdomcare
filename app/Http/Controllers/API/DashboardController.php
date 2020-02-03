<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\DashboardAPI;

class DashboardController extends Controller
{
    use DashboardAPI;

    public function newSignups(Request $request) {
        $timeRestraint = $request->has('timeRestraint') ? $request->timeRestraint : null;
        return response()->json($this->getNewSignupsCounts($timeRestraint));
    }

    public function activeUsers(Request $request) {
        $timeRestraint = $request->has('timeRestraint') ? $request->timeRestraint : null;
        return response()->json($this->getActiveUsersCounts($timeRestraint));
    }
}
