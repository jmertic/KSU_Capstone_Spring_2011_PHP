<?php
	require_once '../api/Login.class.php';
	require_once '../api/Logout.class.php';
	require_once '../api/GetEntryList.class.php';
	
	$login = new Api_Login();
	
	$session_id = $login->execute()->id;
	
	$accounts   =   new Api_GetEntryList();
	
	$accounts->_sessionId = $session_id;
	$accounts->_moduleName = 'Contacts';
	$accounts->_query = 'contacts.primary_address_state = "CA"';
	$accounts->_orderBy = 'last_name';
	
	$result = $accounts->execute();
	
	foreach($result->entry_list as $item)
	{
		echo '"'.$item->name_value_list->first_name->value.' '.$item->name_value_list->last_name->value.'","'.$item->name_value_list->title->value.'","'.$item->name_value_list->phone_work->value.'"'."\n";
	}
	
	$logout = new Api_Logout();
	
	$logout->execute();
?>