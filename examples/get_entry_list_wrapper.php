<?php
    require_once '../SugarApi.class.php';
    
    $api = new SugarApi();
    
    $session_id = $api->login();
    
    $result = $api->get_entry_list('Contacts', 'contacts.primary_address_state = "CA"', 'last_name', '', array('first_name','last_name','title','phone_work'));
    
    foreach($result->entry_list as $item) {
        echo '"'.$item->name_value_list->first_name->value.' '.$item->name_value_list->last_name->value.'","'.$item->name_value_list->title->value.'","'.$item->name_value_list->phone_work->value.'"'."\n";
    }
    
    $api->logout();
?>