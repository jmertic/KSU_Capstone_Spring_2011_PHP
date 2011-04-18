<?php
 	require_once 'ApiFunction.class.php';

	/**
	 *Returns server information such as version, flavor, and gmt_time.
	 *
	 *@author Yousef Guzaiz
	 *@package api
	 */
	class Api_GetServerInfo  extends Api_ApiFunction
	{
		/**
		 * Constructor
		 */
		public function __construct()
        {
            parent::__construct();
        }

		/**
		 * Builds the parameter array
		 *
		 * @return $parameters
		 */
		protected function buildParameters()
        {
			if (empty($this->_sessionId)) {
                throw new Exception('Session ID not set');
            }
            
            return array (
                );
        }
  	}
?>