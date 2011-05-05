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

    // Get the result of executing the getentrylist function
    $entry_list = $sugar->get_entry_list('Contacts',"contacts.title = 'President'");

    // Get the IDs of entries
    $ids = array();
    for($i = 0; $i < $entry_list->result_count; $i++)
    {
        array_push($ids, $entry_list->entry_list[$i]->id);
    }

    // Get the result of executing the getentries function
    $result = $sugar->get_entries('Contacts', $ids, array('first_name', 'last_name'));

    // Pring result
    print_r($result);
?>
