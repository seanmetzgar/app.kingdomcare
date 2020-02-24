<?php

function wowzers() { return "hi"; }

function getStatus($errors) {
    $status = 500;
    $codes = [];
    if (count($errors)) {
        $status = $errors[0]->status;

        foreach($errors as $error) {
            if (property_exists($error, "status")) {
                $codes[] = $error->status;
            }
        }

        if (count($codes) === 1) {
            $status = $codes[0];
        }
    }

    return $status;
}

function addAPIError($code, &$errors) {
    if (!(is_string($code) && strlen($code) > 0) && !is_numeric($code)) {
        $code = "---";
    }

    $status = 500;

    switch($code) {
        case 100:
            $title = "Invalid Collection";
            $message = "The expected collection of results is invalid, or does not exist.";
            break;
        case 101:
            $title = "Empty Collection";
            $message = "The requested collection of results was empty.";
            break;
        case 403:
            $status = 403;
            $title = "Not Authorized";
            $message = "The request is not authorized for the current user.";
        default:
            $title = "Unknown Error";
            $message = "An unknown error was encountered.";
    }

    $errors[] = (object)[
        "status" => $status,
        "code" => $code,
        "title" => $title,
        "detail" => $message
    ];
}
