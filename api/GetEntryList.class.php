<?php
    require_once 'ApiFunction.class.php';
    
    /**
     * Get a list of all entries matching the specified query
     * 
     * @author Carl Weybrecht <cweybrec@cs.kent.edu>
     * @package api
     */
    class Api_GetEntryList extends Api_ApiFunction
    {
        /**
         * Session ID
         * 
         * @var string
         */
        private $_sessionId;
        
        /**
         * Name of the module to be queried
         * 
         * @var string
         */
        private $_moduleName;
        
        /**
         * Query to be run on the specified module
         * 
         * @var string
         */
        private $_query;
        
        /**
         * Field to order the result by
         * 
         * @var string
         */
        private $_orderBy;
        
        /**
         * Number of records to offset the result by
         * 
         * @var int
         */
        private $_offset;
        
        /**
         * Fields to return
         * 
         * @var array
         */
        private $_selectFields = array();
        
        /**
         * Fields to link
         * 
         * @var array
         */
        private $_linkNameToFieldsArray = array();
        
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
         * 
         * 
         * @return array
         */
        protected function buildParameters()
        {
            if (empty($this->_sessionId)) {
                throw new Exception('Session ID not set');
            }
            
            if (empty($this->_moduleName)) {
                throw new Exception('Module name not set');
            }
            
            if (empty($this->_query)) {
                $this->_query = '';
            }
            
            $parameters = array(
                'session' => $this->_sessionId, 
                'module_name' => $this->_moduleName, 
                'query' => $this->_query,
            );
            
            if (!empty($this->_orderBy)) {
                $parameters['order_by'] = $this->_orderBy;
            }
            
            if (!empty($this->_offset)) {
                $parameters['offset'] = $this->_offset;
            }
            else {
                $parameters['offset'] = '';
            }
            
            if (!empty($this->_selectFields)) {
                $parameters['select_fields'] = $this->_selectFields;
            }
            
            if (!empty($this->_linkNameToFieldsArray)) {
                $parameters['link_name_to_fields_array'] = $this->_linkNameToFieldsArray;
            }
            
            return $parameters;
        }
    }
?>