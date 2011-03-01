<?php
    require_once 'curl/CurlRequest.class.php';
    
    /**
     * Provides Sugar-specific logic for cURL requests
     * 
     * @author Carl Weybrecht <cweybrec@cs.kent.edu>
     * @package curl
     */
    class Curl_SugarCurlRequest extends Curl_CurlRequest
    {
        /**
         * Host name for the cURL request
         * 
         * @var string
         */
        private $_host;
        
        /**
         * Version number of the Sugar CRM API that will be used
         * 
         * @var int
         */
        private $_apiVersion;
        
        /**
         * Constructor
         * 
         * @param string $host
         * @param int $version
         */
        public function __construct($host = '', $version = '')
        {
            parent::__construct();
            
            require_once 'Config.class.php';
            
            $config = new Config();
            
            // If the paramaters are not specified when the object is created,
            // load some default values from a configuation file.
            if (!empty($host)) {
                $this->_host = $host;
            }
            else {
                $this->_host = $config->host;
            }
            
            if (!empty($version)) {
                $this->_apiVersion = $version;
            }
            else {
                $this->_apiVersion = $config->apiVersion;
            }
            
            // Set some default cURL options
            $this->setOptionPost(TRUE);
            $this->setOptionHeader(FALSE);
            $this->setOptionReturnTransfer(TRUE);
        }
        
        /**
         * Set the host address that Sugar CRM is being used at
         * 
         * @param string $host
         */
        final public function setHost($host)
        {
            $this->_host = $host;
        }
        
        /**
         * Set the version number of the Sugar CRM API that is to be used
         * 
         * @param int $version
         */
        final public function setApiVersion($version)
        {
            $this->_apiVersion = $version;
        }
        
        /**
         * Should cURL use GET or POST?
         * 
         * @param bool $option
         */
        final public function setOptionPost($option)
        {
            $this->options->post = $option;
        }
        
        /**
         * Should cURL return a header or not?
         * 
         * @param bool $option
         */
        final public function setOptionHeader($option)
        {
            $this->options->header = $option;
        }
        
        /**
         * Should cURL return the result of the request
         * 
         * @param bool $option
         */
        final public function setOptionReturnTransfer($option)
        {
            $this->options->returnTransfer = $option;
        }
        
        /**
         * Set the options to be set before making your cURL request
         * 
         * @param object $curl
         */
        protected function setOptions($curl)
        {
            if(!curl_setopt($curl, CURLOPT_POST, $this->options->post))
            {
                throw new Exception('Could not set option [post]');
            }
            
            if(!curl_setopt($curl, CURLOPT_HEADER, $this->options->header))
            {
                throw new Exception('Could not set option [header]');
            }
            
            if(!curl_setopt($curl, CURLOPT_RETURNTRANSFER, $this->options->returnTransfer))
            {
                throw new Exception('Could not set option [return transfer]');
            }
        }
        
        /**
         * Perform any run-time calculations on the URL
         * 
         * @return string
         */
        protected function prepareUrl()
        {
            return 'http://'.$this->_host.'/service/v'.$this->_apiVersion.'/rest.php';
        }
    }
?>