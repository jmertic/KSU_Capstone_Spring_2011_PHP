<?php
    require_once 'ApiFunction.class.php';
    
    class Api_GetEntryList extends Api_ApiFunction
    {
        private $_sessionId;
        
        private $_moduleName;
        
        private $_query;
        
        private $_orderBy;
        
        private $_offset;
        
        private $_selectFields = array();
        
        private $_linkNameToFieldsArray = array();
        
        public function __construct()
        {
            parent::__construct();
        }
        
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