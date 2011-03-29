<?php
	/**
     * Get User Id class for the Sugar CRM API
     * 
     * @author Amin Alrusayni <aalrusay@kent.edu>
     */

	require_once 'ApiFunction.class.php';
	
		class Api_GetUserId extends Api_ApiFunction
		{
				private $_sessionId;
				
				private $_userId;
				
				public  function __construct()
				{
					parent:: __construct();
				}
				
				public function setSessionId($session_id)
				{
					$this->_sessionId = $session_id;
				}
				
				public function setUserId($user_id)
				{
					$this->_userId = $user_id;
				}
				
				protected  function buildParameters()
				{
					if (empty($this->_sessionId)) {
            			throw new Exception('Session ID not set');
            		}
            		
				if (empty($this->_userId)) {
            			throw new Exception('User ID not set');
            		}
            		
		        return $parameters;
            		
				}
		}
?>