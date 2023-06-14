<?php
function callAPI($method, $access_token, $url, $data = false) {
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) {
                $jsonDataEncoded = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            if ($data) {
                $jsonDataEncoded = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            }
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }
    $headers = ['Content-Type: application/json'];
    if ($access_token != null && $access_token != '') {
        array_push($headers, sprintf('Authorization: Bearer %s', $access_token));
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    curl_close($curl);
    
    return json_decode($result, true);
    
}

function shopifyAPI($method, $access_token, $url, $data = false) {
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) {
                $jsonDataEncoded = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            if ($data) {
                $jsonDataEncoded = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            }
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }
    $headers = ['Content-Type: application/json'];
    if ($access_token != null && $access_token != '') {
        array_push($headers, sprintf('X-Shopify-Access-Token: %s', $access_token));
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    curl_close($curl);
    
    return json_decode($result, true);
    
}

function getInstallURL($method, $access_token, $url, $data = false) {
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) {
                $jsonDataEncoded = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            if ($data) {
                $jsonDataEncoded = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            }
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }
    $headers = ['Content-Type: application/json'];
    if ($access_token != null && $access_token != '') {
        array_push($headers, sprintf('Authorization: Bearer %s', $access_token));
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    curl_close($curl);
    
    if(is_string($result)){
        return $result;
    }
    else{
        return json_decode($result, true);
    }
    
}


function error_logging($data){
    error_log(json_encode($data), 3, "tanoo_log.php");
    error_log("\"\n\"");
}