<?php
    require_once 'ApiFunction.class.php';

    /**
     * Retrieves the list of modules available to the current user logged into the system.
     *
     * @author Nathan Osysko
     * @package api
     */
    class Api_GetAvailableModules extends Api_ApiFunction
    {
        /**
         * Session ID
         *
         * @var string
         */
        private $_sessionId;
        
        /**
         * Constructor
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Set the session id
         *
         * @param string $sessionid
         */
        final public function setSessionId($sessionid)
        {
            $this->_sessionId = $sessionid;
        }

        /**
         * Builds the parameter array
         * 
         * @return $parameters
         */
        protected function buildParameters()
        {
            if(empty($this->_sessionId)){
                throw new Exception('Session ID not set');
            }

            $parameters = array(
                'session' => $this->_sessionId,
            );

            return $parameters;
        }
    }
?>
