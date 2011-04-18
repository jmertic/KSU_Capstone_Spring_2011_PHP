<?php
    require_once 'ApiFunction.class.php';
    
    class Api_SetEntry extends Api_ApiFunction
    {
        private $_sessionId;
        
        private $_moduleName;
        
        private $_nameValueList;
        
        public function __construct()
        {
            parent::__construct();
        }
        
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