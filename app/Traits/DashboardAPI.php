<?php

namespace App\Traits;

use App\User;

trait DashboardAPI {
    private function getNewSignupsCounts($timeRestraint = null) {
        $restraints = getTimeRestraints($timeRestraint);
        $deltaRestraints = getDeltaRestraints($timeRestraint);
        $deltaSpan = getDeltaSpan($timeRestraint);
        $data = [];

        $users = User::whereBetween('created_at', [$restraints->start, $restraints->end])->get();
        $usersObj = processSignupCounts($users);
        $data['current'] = $usersObj;

        if ($deltaRestraints !== null && $deltaSpan !== null) {
            $deltaUsers = User::whereBetween('created_at', [$deltaRestraints->start, $deltaRestraints->end])->get();
            $deltaUsersObj = processSignupCounts($deltaUsers);
            $data['delta'] = $deltaUsersObj;
            $data['deltaSpan'] = $deltaSpan;
        }

        return (object)$data;
    }
}
