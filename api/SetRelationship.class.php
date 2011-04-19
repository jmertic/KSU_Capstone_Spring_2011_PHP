<?php
    require_once 'ApiFunction.class.php';
    
    class Api_SetRelationship extends Api_ApiFunction
    {
        private $_sessionId;
        
        private $_moduleName;
        
        private $_moduleId;
        
        private $_linkFieldName;
        
        private $_relatedIds = array();
        
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
        
        protected function _buildParameters()
        {
            return array(
                'session' => $this->_sessionId,
                'module_name' => $this->_moduleName,
                'module_id' => $this->_moduleId,
                'link_field_name' => $this->_linkFieldName,
                'related_ids' => $this->_relatedIds,
            );
        }
    }
?>
