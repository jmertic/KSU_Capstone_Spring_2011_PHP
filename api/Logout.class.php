<?php
    require_once 'ApiFunction.class.php';
    
    class Api_Logout extends Api_ApiFunction
    {
        private $_sessionId;
        
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
        
        protected function buildParameters()
        {
            return array(
                'session' => $this->_sessionId,
            );
        }
    }
?>
