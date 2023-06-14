<?php

    include 'callAPI.php';
	
	$contentBodyJson = file_get_contents('php://input');
	$content = json_decode($contentBodyJson, true);

    echo $content['message']*2;
    
?>