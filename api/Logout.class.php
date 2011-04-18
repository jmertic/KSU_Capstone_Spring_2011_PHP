<?php
    require_once 'ApiFunction.class.php';
    
    class Api_Logout extends Api_ApiFunction
    {
        private $_sessionId;
        
        public function __construct()
        {
            parent::__construct();
        }
        
        protected function buildParameters()
        {
            return array(
                'session' => $this->_sessionId,
            );
        }
    }
?>