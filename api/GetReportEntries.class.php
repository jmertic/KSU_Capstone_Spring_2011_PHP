<?php
    require_once 'ApiFunction.class.php';

    /**
     * Retrieves a list of report entries based on specified report IDs.
     *
     * @author Nathan Osysko
     * @package api
     */
    class Api_GetReportEntries extends Api_ApiFunction
    {
        /**
         * Session ID
         *
         * @var string
         */
        private $_sessionId;

        /**
         * IDs
         *
         * @var array
         */
        private $_ids;

        /**
         * Select Fields
         *
         * @var string
         */
        private $_selectFields;

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
         * Set the IDs
         *
         * @param array $ids
         */
        final public function setIds($ids)
        {
            $this->_ids = $ids;
        }

        /**
         * Set select fields 
         * 
         * @param string $selectfields
         */
        final public function setSelectFields($selectfields)
        {
            $this->_selectFields = $selectfields;
        }

        /**
         * Builds the parameter array
         * 
         * @returns $parameters
         */
        protected function buildParameters()
        {
            if(empty($this->_sessionId)){
                throw new Exception('Session ID not set');
            }

            if(empty($this->_ids)){
                throw new Exception('IDs not set');
            }

            $parameters = array(
                'session' => $this->_sessionId,
                'ids' => $this->_ids,
            );

            if(!empty($this->_selectFields)){
                $parameters['select_fields'] = $this->_selectFields;
            }

            return $parameters;
        }
    }
?>
