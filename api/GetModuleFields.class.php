<?php
    require_once 'ApiFunction.class.php';

	/**
	 * Retrieves variable definitions (vardefs) for fields of the specified SugarBean.
	 *
	 * @author Carl Weybrecht
	 * @package api
	 */    
    class Api_GetModuleFields extends Api_ApiFunction
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
         * Fields
         *
         * @var array
         */
        private $_fields = array();
        
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
        	if(empty($this->_sessionId)){
                throw new Exception('Session ID not set');
            }

            if(empty($this->_moduleName)){
                throw new Exception('Module Names not set');
            }
            $parameters = array(
                'session' => $this->_sessionId,
                'module_name' => $this->_moduleName,
            );
            
            if(!empty($this->_fields)){
                $parameters['fields'] = $this->_fields;
            }
            
            return $parameters
        }
    }
?>