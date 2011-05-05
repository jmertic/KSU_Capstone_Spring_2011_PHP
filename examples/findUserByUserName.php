<?php
    require_once '../SugarApi.class.php';
    
    $sugar = new SugarApi();
    
    $session_id = $sugar->login();
    
    $result = $sugar->findUserByUserName('cweybrec');
    
    print_r($result);
    
    $sugar->logout();
?>