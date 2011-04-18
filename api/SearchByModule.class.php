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
         * Modules
         *
         * @var string
         */
        private $_modules;

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

            if(empty($this->_modules)){
                throw new Exception('Modules not set');
            }

            $parameters = array(
                'session' => $this->_sessionId,
                'search_string' => $this->_searchString,
                'modules' => $this->_modules,
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