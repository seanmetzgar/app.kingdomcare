<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

class TimeRestraints {
    public $start = null;
    public $end = null;

    public function __construct($start = null, $end = null) {
        $this->start = $start;
        $this->end = $end;
    }
}

function getTimeRestraints($timeRestraint) {
    $timeRestraint = (is_string($timeRestraint) && strlen($timeRestraint) > 0) ? $timeRestraint : 'today';
    $now = Carbon::now();

    switch($timeRestraint) {
        case 'this-year':
            $timeRestraintStart = $now->copy()->startOfYear()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->endOfYear()->toDateTimeString();
            break;
        case 'last-year':
            $timeRestraintStart = $now->copy()->subYear()->startOfYear()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->subYear()->endOfYear()->toDateTimeString();
            break;
        case 'this-quarter':
            $timeRestraintStart = $now->copy()->startOfQuarter()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->endOfQuarter()->toDateTimeString();
            break;
        case 'last-quarter':
            $timeRestraintStart = $now->copy()->subQuarter()->startOfQuarter()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->subQuarter()->endOfQuarter()->toDateTimeString();
            break;
        case 'this-month':
            $timeRestraintStart = $now->copy()->startOfMonth()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->endOfMonth()->toDateTimeString();
            break;
        case 'last-month':
            $timeRestraintStart = $now->copy()->subMonth()->startOfMonth()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->subMonth()->endOfMonth()->toDateTimeString();
            break;
        case 'this-week':
            $timeRestraintStart = $now->copy()->startOfWeek(Carbon::SUNDAY)->toDateTimeString();
            $timeRestraintEnd = $now->copy()->endOfWeek(Carbon::SATURDAY)->toDateTimeString();
            break;
        case 'last-week':
            $timeRestraintStart = $now->copy()->startOfWeek(Carbon::SUNDAY)->subWeek()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->endOfWeek(Carbon::SATURDAY)->subWeek()->toDateTimeString();
            break;
        case 'yesterday':
            $timeRestraintStart = $now->copy()->subDay()->startOfDay()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->subDay()->endOfDay()->toDateTimeString();
            break;
        case 'today':
        default:
            $timeRestraintStart = $now->copy()->startOfDay()->toDateTimeString();
            $timeRestraintEnd = $now->copy()->endOfDay()->toDateTimeString();
    }

    $restraints = new TimeRestraints($timeRestraintStart, $timeRestraintEnd);

    return $restraints;
}

function getDeltaRestraints($timeRestraint) {
    $restraints = null;
    if (Str::startsWith($timeRestraint, 'this-')) {
        $timeRestraint = str_replace('this-', 'last-', $timeRestraint);
        $restraints = getTimeRestraints($timeRestraint);
    }

    return $restraints;
}

function getDeltaSpan($timeRestraint) {
    $deltaSpan = null;
    if (Str::startsWith($timeRestraint, 'this-')) {
        $deltaSpan = str_replace('this-', '', $timeRestraint);
    }

    return $deltaSpan;
}

function processSignupCounts($users) {
    $usersObj = [];

    foreach ($users as $user) {
        $roles = $user->roles()->get();
        foreach ($roles as $role) {
            if (!array_key_exists($role->name, $usersObj)) {
                $usersObj[$role->name] = 1;
            } else {
                $usersObj[$role->name]++;
            }
        }
    }

    return (object)$usersObj;
}
