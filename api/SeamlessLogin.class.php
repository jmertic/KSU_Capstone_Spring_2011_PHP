<?php
	/**
     * Seamless Login class for the Sugar CRM API
     * 
     * @author Amin Alrusayni <aalrusay@kent.edu>
     */

	require_once 'ApiFunction.class.php';
	
	class Api_SeamlessLogin extends Api_ApiFunction
	{
		private $_sessionId;
	
	
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

		protected function buildParameters()
		{
			if (empty($this->_sessionId)) {
            	throw new Exception('Session ID not set');
            }

         	return $parameters;        
		}
	}
?>
