<?php


$secret_key_huntrewievs = get_option('secret_key_huntrewievs');

$api_secret = $secret_key_huntrewievs; // secret key
$url = "https://api.freelancehunt.com/v2/my/reviews";
$method = "GET";


$token = 'Bearer ' . $api_secret;
$args = array(
    'method' => $method,
    'headers' => array(
        'Authorization' => $token
    ),

);
$result1 = wp_remote_request($url, $args);


if (is_wp_error($result1)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($result1);

