<?php
    require_once 'ApiFunction.class.php';
    
    class Api_GetModuleFields extends Api_ApiFunction
    {
        private $_sessionId;
        
        private $_moduleName;
        
        public function __construct()
        {
            parent::__construct();
        }

        protected function buildParameters()
        {
            return array(
                'session' => $this->_sessionId,
                'module_name' => $this->_moduleName,
            );
        }
    }
?>