<?php
    // Include SugarApi and SugarCurlRequest classes
    require_once '../SugarApi.class.php';
    require_once '../curl/SugarCurlRequest.class.php';
    
    // Instantiate the classes
    $sugar = new SugarApi();
    $curlR = new Curl_SugarCurlRequest();
    
    // Set the host, Api version, and curl object
    $curlR->setHost("ruttanvm.cs.kent.edu:4080");
    $curlR->setApiVersion(2);
    $sugar->_curl = $curlR;

    // Log in with username and password
    $user_id = $sugar->login('class', 'class123');
    
    // Get the result of findcontactbylastname function
    $result = $sugar->findContactByLastName("Scholl");

    // Print result
    print_r($result);
?>
