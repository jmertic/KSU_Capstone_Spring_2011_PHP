<?php
    require_once 'ApiFunction.class.php';

    /**
     * Retrieves a single SugarBean based on ID 
     *
     * @author Nathan Osysko
     * @package api
     */
    class Api_GetEntry extends Api_ApiFunction
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
         * ID
         *
         * @var string
         */
        private $_id;

        /**
         * Select Fields
         *
         * @var array
         */
        private $_selectFields = array();

        /**
         * Link Name To Fields Array
         *
         * @var array
         */
        private $_linkNameToFields = array();

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

            if(empty($this->_id)){
                throw new Exception('IDs not set');
            }

            $parameters = array(
                'session' => $this->_sessionId,
                'module_name' => $this->_moduleName,
                'id' => $this->_id,
            );

            if(!empty($this->_selectFields)){
                $parameters['select_fields'] = $this->_selectFields;
            }

            if(!empty($this->_linkNameToFields)){
                $parameters['link_name_to_fields_array'] = $this->_linkNameToFields;
            } 
            
            return $parameters; 
        }
    }
?>