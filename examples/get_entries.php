<?php
    // Include login, getentrylist, and getentries classes
    require_once '../api/Login.class.php';
    require_once '../api/GetEntryList.class.php';
    require_once '../api/GetEntries.class.php';

    // Instantiate the classes
    $login = new Api_Login();
    $list = new Api_GetEntryList();
    $entries = new Api_GetEntries();

    // Get the session ID from log in
    $sessionId = $login->execute()->id;

    // Set the members of getentrylist class
    $list->_sessionId = $sessionId;
    $list->_moduleName = 'Contacts';
    $list->_query = "contacts.title = 'President'";    
    
    // Get the result of executing the getentrylist function
    $entry_list = $list->execute();

    // Get the IDs of entries
    $ids = array();
    for($i = 0; $i < $entry_list->result_count; $i++)
    {
        array_push($ids, $entry_list->entry_list[$i]->id);
    }

    // Set the members of getentries class
    $entries->_sessionId = $sessionId;
    $entries->_moduleName = 'Contacts';
    $entries->_ids = $ids;
    $entries->_selectFields = array('first_name', 'last_name');

    // Get the result of executing the getentries function
    $result = $entries->execute();

    // Print result
    print_r($result);
?>
