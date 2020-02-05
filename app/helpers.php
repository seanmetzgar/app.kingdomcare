<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Hashids\Hashids;
use Illuminate\Support\HtmlString;
use Illuminate\Http\Request;

class TimeRestraints {
    public $start = null;
    public $end = null;

    public function __construct($start = null, $end = null) {
        $this->start = $start;
        $this->end = $end;
    }
}

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

function trimPrefix($string, $prefix) {
    if (substr($string, 0, strlen($prefix)) == $prefix) {
        $string = substr($string, strlen($prefix));
    }

    return $string;
}

function newHasher() {
    return new Hashids(env('HASHIDS_SALT', 'Sean Metzgar was here'), env('HASHIDS_PAD', 10));
}

function verifyModelHash($hash, $model) {
    $hasher = newHasher();

    $verified = false;
    $decoded = null;

    if (is_string($hash)) {
        $decoded = $hasher->decode($hash);

        if (is_array($decoded) && count($decoded) === 1) {
            if ($model->id === $decoded[0]) {
                $verified = true;
            }
        }
    }

    return $verified;
}

function verifyUserHash($hash, User $user = null) {
    if ($user === null && is_string($hash)) {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return false;
        }
    }

    return verifyModelHash($hash, $user);
}

function getUserHash(User $user = null) {
    if ($user === null) {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return '';
        }
    }

    return getModelHash($user);
}

function getModelHash($model) {
    $hasher = newHasher();
    return $hasher->encode($model->id);
}

function modelkey_field($model) {
    $hash = getModelHash($model);
    $html = sprintf('<input type="hidden" name="_modelkey" value="%s">', $hash);
    return new HtmlString($html);
}

function verify_modelkey_field(Request $request, $model) {
    $hash = $request->_modelkey;
    return verifyModelHash($hash, $model);
}

function meta_prefix() {
    return env('MODEL_PREFIX', '_meta_');
}

function checkboxBoolean($value) {
    $rVal = null;
    if (isset($value) && $value !== null) {
        switch($value) {
            case "1":
            case 1:
            case "ok":
            case "on":
            case "true":
                $rVal = true;
                break;
            case "0":
            case 0:
            case "off":
            case "false":
                $rVal = false;
                break;
            default:
                $rVal = null;
        }
    }
    return $rVal;
}

function buildChildrenArray($children, bool $json = false) {
    $childrenArray = false;
    if (isset($children) && is_array($children)) {
        $childrenArray = [];
        foreach ($children as $child) {
            if (array_key_exists("name", $child) && array_key_exists("age", $child)) {
                if (is_string($child["name"]) && strlen($child["name"]) > 0
                    && in_array($child["age"], array("infant", "toddler", "school_age"))) {
                    $childObject = new stdClass();
                    $childObject->name = $child["name"];
                    $childObject->age = $child["age"];

                    array_push($childrenArray, $childObject);

                    $childObject = null;
                }
            }
        }
    }

    if (is_array($childrenArray) && $json) {
        $childrenArray = json_encode($childrenArray);
    }

    return $childrenArray;
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

function getPreviousTimeRestraints($timeRestraint) {
    $restraints = null;
    if (Str::startsWith($timeRestraint, 'this-')) {
        $timeRestraint = str_replace('this-', 'last-', $timeRestraint);
        $restraints = getTimeRestraints($timeRestraint);
    }

    return $restraints;
}

function getTimeRestraintType($timeRestraint) {
    $type = null;
    if (Str::startsWith($timeRestraint, 'this-')) {
        $type = str_replace('this-', '', $timeRestraint);
    }

    return $type;
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
