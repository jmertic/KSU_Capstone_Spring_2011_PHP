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
        
        public function setSessionId($session_id)
        {
            $this->_sessionId = $session_id;
        }
        
        public function setModuleName($module_name)
        {
            $this->_moduleName = $module_name;
        }
        
        public function setNameValueList($array)
        {
            $this->_nameValueList = $array;
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