<?php
	/**
     * Get User Team Id class for the Sugar CRM API
     * 
     * @author Amin Alrusayni <aalrusay@kent.edu>
     */

	require_once 'ApiFunction.class.php';
	
	class Api_GetUserTeamId extends Api_ApiFunction
	{
		private $_sessionId;
	
	
		public function __construct()
		{
			parent::__construct();
		}
		
		public function setSessionId($session_id)
		{
			$this->_sessionId = $session_id;
		}
		
		protected function buildParameters()
		{
			if (empty($this->_sessionId)) {
            	throw new Exception('Session ID not set');
            }
            
        return $parameters;
       
		}
}
?>