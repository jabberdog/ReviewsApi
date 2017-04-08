<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);

include_once __DIR__ . '/ReviewsApi.php';

// Build GET data
$request = array(
    'sku' => isset($_POST['sku']) ? $_POST['sku'] : '',
);

// Send the request data
$getReviewResponse = ReviewsApi::productReviewPublish($request);

if ( true == $getReviewResponse['success'] ) {

    $params = http_build_query(array(
        'success' => true,
        'message' => sprintf('There are %s reviews for %s', $getReviewResponse['response']['stats']['count'], $request['sku']),
    ));

    header('Location: '.sprintf('/?%s', $params), '', 302);
    exit;
}

$params = http_build_query(array(
    'success' => false,
    'message' => sprintf('There are no reviews for %s', $request['sku']),
    'sku' => $request['sku']
));

header('Location: '.sprintf('/?%s', $params), '', 302);
exit;
