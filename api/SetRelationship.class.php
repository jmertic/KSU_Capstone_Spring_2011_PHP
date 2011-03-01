<?php
    require_once 'api/ApiFunction.class.php';
    
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
        
        public function setSessionId($session_id)
        {
            $this->_sessionId = $session_id;
        }
        
        public function setModuleName($module_name)
        {
            $this->_moduleName = $module_name;
        }
        
        public function setModuleId($module_id)
        {
            $this->_moduleId = $module_id;
        }
        
        public function setLinkFieldName($link_field_name)
        {
            $this->_linkFieldName = $link_field_name;
        }
        
        public function addRelatedId($id)
        {
            $this->_relatedIds[] = $id;
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