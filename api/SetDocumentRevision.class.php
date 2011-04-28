<?php
    require_once 'ApiFunction.class.php';

    /**
     * Sets a new revision for a document
     *
     * @author Nathan Osysko
     * @package api
     */
    class Api_SetDocumentRevision extends Api_ApiFunction
    {
        /**
         * Session ID
         *
         * @var string
         */
        private $_sessionId;

        /**
         * Document Revision
         *
         * @var string
         */
        private $_documentRevision;

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
         * Set the document revision
         *
         * @param string $documentrevision
         */
        final public function setDocumentRevision($documentrevision)
        {
            $this->_documentRevision = $documentrevision;
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

            if(empty($this->_documentRevision)){
                throw new Exception('Document revision not set');
            }

            if(empty($this->_id)){
                throw new Exception('ID of document not set');
            }

            $parameters = array(
                'session' => $this->_sessionId,
                'document_revision' => $this->_documentRevision,
                'id' => $this->_documentId,
            );

            return $parameters;
        }
    }
?>