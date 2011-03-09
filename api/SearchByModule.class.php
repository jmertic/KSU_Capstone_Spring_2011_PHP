<?php
    require_once 'ApiFunction.class.php';

    /**
     * Returns the ID, module name and fields for specified modules. 
     * Supported modules are Accounts, Bugs, Calls, Cases, Contacts, 
     * Leads, Opportunities, Projects, Project Tasks, and Quotes.
     *
     * @author Nathan Osysko
     * @package api
     */
    class Api_SearchByModule extends Api_ApiFunction
    {
        /**
         * Session ID
         * 
         * @var string
         */
        private $_sessionId;

        /**
         * Search String
         *
         * @var string
         */
        private $_searchString;

        /**
         *
         * Module Names
         *
         * @var string
         */
        private $_moduleNames;

        /**
         * Offset
         * 
         * @var integer
         */
        private $_offset;

        /**
         * Max Results
         *
         * @var integer
         */
        private $_maxResults;

        /**
         * Constructor 
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Set the sessionid
         *
         * @param string $sessionid
         */
        final public function setSessionId($sessionid)
        {
            $this->_sessionId = $sessionid;
        }

        /**
         * Set the searchstring
         *
         * @param string $searchstring
         */
        final public function setSearchString($searchstring)
        {
            $this->_searchString = $searchstring;
        }

        /**
         * Set the modulenames
         *
         * @param string $modulenames
         */
        final public function setModule($modulenames)
        {
            $this->_moduleNames = $modulenames;
        }

        /**
         * Set the offset
         *
         * @param string $offset
         */
        final public function setOffset($offset)
        {
            $this->_offset = $offset;
        }

        /**
         * Set the maxresults
         *
         * @param string $maxresults
         */
        final public function setMaxResults($maxresults)
        {
            $this->_maxResults = $maxresults;
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

            if(empty($this->_searchString)){
                throw new Exception('Search string not set');
            }

            if(empty($this->_moduleNames)){
                throw new Exception('Module Names not set');
            }

            $parameters = array(
                'session' => $this->_sessionId,
                'search_string' => $this->_searchString,
                'modules' => $this->_moduleNames,
            );

            if(!empty($this->_offset)){
                $parameters['offset'] = $this->_offset;
            else
                parameters['offset'] = ' ';

            if(!empty($this->_maxResults)){
                $parameters['max_results'] = $this->_maxResults;
            else
                parameters['max_results'] = ' ';

                'max_results' => $this->_maxResults,

            return $parameters;
        }
    }
?>
