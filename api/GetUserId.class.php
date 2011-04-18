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
						
		public  function __construct()
		{
			parent:: __construct();
		}
				
		protected  function buildParameters()
		{
			if (empty($this->_sessionId)) {
            	throw new Exception('Session ID not set');
            }
            		
		    return $parameters;	
		}
	}
?>