<?php

    include 'callAPI.php';
    
	include_once 'api.php';

    $baseUrl = getMarketplaceBaseUrl();
	$packageId = getPackageID();

    $contentBodyJson = file_get_contents('php://input');
	$content = json_decode($contentBodyJson, true);

    if($content['method'] == 'GET'){
        //querying a custom table as an example
        $body = [
        
            [
                'Name' => 'bid',        //column name in table
                'Operator' => 'eq',
                'Value' => 120
            ]
        
        ];
        $url = $baseUrl . '/api/v2/plugins/'. $packageId .'/custom-tables/bids_table';
        $response = callAPI('GET', null, $url, $body);

        echo $response;
    }

    if($content['method'] == 'POST'){
        // do something else with another API
    }

    if($content['method'] == 'PUT'){
        // do something else with another API
    }

    if($content['method'] == 'delete'){
        // do something else with another API
    }
    
?>