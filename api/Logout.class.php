<?php
    require_once 'ApiFunction.class.php';
    
    class Api_Logout extends Api_ApiFunction
    {
        private $_sessionId;
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function setSessionId($session_id)
        {
            $this->_sessionId = $session_id;
        }
        
        protected function buildParameters()
        {
            return array(
                'session' => $this->_sessionId,
            );
        }
    }
?>