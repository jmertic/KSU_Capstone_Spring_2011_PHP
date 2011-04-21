<?php
    require_once 'ApiFunction.class.php';

	/**
	 * Creates or updates a SugarBean.
	 *
	 * @author
	 * @package api
	 */
    class Api_SetEntry extends Api_ApiFunction
    {
    	/**
    	 * Session ID
    	 *
    	 * @var string
    	 */
        private $_sessionId;
        
        /**
         * Module Name
         *
         * @var string
         */
        private $_moduleName;
        
        /**
         * Name Value List
         *
         * @var array
         */
        private $_nameValueList = array();
        
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
         * @return $parameters
         */
        protected function buildParameters()
        {
            return array(
                'session' => $this->_sessionId,
                'module' => $this->_moduleName,
                'name_value_list' => $this->_nameValueList,
            );
        }
    }
?>
