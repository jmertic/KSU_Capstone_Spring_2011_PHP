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
        
        public function setSessionId($session_id)
        {
            $this->_sessionId = $session_id;
        }
        
        public function setModuleName($module_name)
        {
            $this->_moduleName = $module_name;
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