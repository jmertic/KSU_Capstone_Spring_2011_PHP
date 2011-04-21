<?php
	require_once 'ApiFunction.class.php';
	
	/**
     * Retrieves the ID of the default team of the user who is logged into the current session.
     * 
     * @author Amin Alrusayni <aalrusay@kent.edu>
     */
	class Api_GetUserTeamId extends Api_ApiFunction
	{
		/**
		 * Session ID
		 *
		 * @var string
		 */
		private $_sessionId;
	
		/**
		 * Constructor
		 */
		public function __construct()
		{
			parent::__construct();
		}

        /**
         * Set the variables
         *
         * @param string $name
         * @param $value
         */
        public function __set($name, $value)
        {
            $this->$name = $value;
        }
		
		/**
		 * Build the parameter array
		 *
		 * @return array
		protected function buildParameters()
		{
			if (empty($this->_sessionId)) {
            	throw new Exception('Session ID not set');
            }
            
        	return array(
        		'session' => $this->_sessionId
        	);   
		}
	}
?>