<?php
	require_once 'ApiFunction.class.php';
	
	/**
     * Performs a seamless login during synchronization.
     * 
     * @author Amin Alrusayni <aalrusay@kent.edu>
     */
    class Api_SeamlessLogin extends Api_ApiFunction
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
		 * Builds the parameter array
		 *
		 * @return array
                 */

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