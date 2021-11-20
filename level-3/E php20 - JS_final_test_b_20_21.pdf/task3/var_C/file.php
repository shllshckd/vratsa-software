<?php

function hasNumbers($string)
{
    $containsNumbers = false;
    for ($i = 0; $i < strlen($string); $i++) {
        if (ctype_digit($string[$i])) {
            $containsNumbers = true;
            break;
        }
    }

    return $containsNumbers;
}

$response = [];
if (strlen(trim($_POST['city'])) < 3 || hasNumbers(trim($_POST['city']))) {
    $response['error']['city'] = 'City field is required, should be at least 3 characters long and not contain any numbers!';
}

if (empty(trim($_POST['city-code']))) {
    $response['error']['city-code'] = 'City code is required!';
}

if (empty(trim($_POST['street-name']))) {
    $response['error']['street-name'] = 'Street name is required!';
}

if (strlen(trim($_POST['street-num'])) > 0 && !is_numeric(trim($_POST['street-num']))) {
	$response['error']['street-num'] = 'Street number should be numeric if provided!';
}

if (!isset($response['error'])) {
    $response['success'] = 'Success!';
}

//$response['asd'] = 'asd!';
//$response = 'asd!';

echo json_encode($response);
