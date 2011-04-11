<?php
    require_once 'ApiFunction.class.php';

    /**
     * In case of .htaccess lock-down on the cache directory, 
     * allows an authenticated user with the appropriate permissions to download a document.
     *
     * @author Nathan Osysko
     * @package api
     */
    class Api_GetDocumentRevision extends Api_ApiFunction
    {
        /**
         * Session ID
         *
         * @var string
         */
        private $_sessionId;

        /**
         * Document ID
         *
         * @var string
         */
        private $_documentId;

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
         * Set the document id
         *
         * @param string $documentid
         */
        final public function setDocumentId($documentid)
        {
            $this->_documentId = $documentid;
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

            if(empty($this->_documentId)){
                throw new Exception('ID of document not set');
            }

            $parameters = array(
                'session' => $this->_sessionId,
                'id' => $this->_documentId,
            );

            return $parameters;
        }
    }
?>
