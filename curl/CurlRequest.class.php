<?php
    /**
     * This class creates a generic cURL object
     * 
     * @author Carl Weybrecht <cweybrec@cs.kent.com>
     * @package curl
     */
    class Curl_CurlRequest
    {
        /**
         * Instance of a the curl connection
         * 
         * @var curl_handle
         */
        private $_curl;
        
        /**
         * Data to be sent to the server in the cURL request
         * 
         * @var mixed
         */
        private $_postFields;
        
        /**
         * URL that you will be connecting to
         * 
         * @var string
         */
        private $_url;
        
        /**
         * DTO for cURL options
         * 
         * @var object
         */
        protected $options;
        
        /**
         * Constructor
         * 
         * @param string $url
         * @param mixed $postFields
         */
        public function __construct($url = '', $postFields = '')
        {
            if (!empty($url)) {
                $this->_url = $url;
                
                if(!empty($postFields)) {
                    $this->_postFields = $postFields;
                }
            }
            
            $this->options = new Curl_CurlOptions();
        }
        
        /**
         * Set the URL
         * 
         * @param string $url
         */
        final public function setUrl($url)
        {
            $this->_url = $url;
        }
        
        /**
         * Set the post data to be sent to the server
         * 
         * @param mixed $postFields
         */
        final public function setPostFields($postFields)
        {
            $this->_postFields = $postFields;
        }
        
        /**
         * Perform the cURL request
         * 
         * @return string
         */
        final public function execute()
        {
            if (!isset($this->_curl)) {
                // Perform any needed run-time calculations on the URL
                $this->_url = $this->prepareUrl();
                
                // Open a link to the specified URL and store the connection handle
                $this->_curl = curl_init($this->_url);
                
                // Error out if the connection could not be made
                if (!$this->_curl) {
                    throw new Exception('Could not initialize cURL using URL ['.$this->_url.']');
                }
                
                // Set any options that are needed
                $this->setOptions($this->_curl);
            }
            
            // Attempt to set the data to be sent to the server
            if (!curl_setopt($this->_curl, CURLOPT_POSTFIELDS, $this->_postFields)) {
                throw new Exception('Could not set option [post fields]');
            }
            
            // Make the cURL request and store the result
            $result = curl_exec($this->_curl);
            
            // Error out if the result is empty
            if (empty($result) || !$result) {
                throw new Exception('cURL result empty');
            }
            
            return $result;
        }
        
        /**
         * Set the options to be set before making your cURL request
         * 
         * @param object $curl
         */
        protected function setOptions($curl)
        {
            // no default options
        }
        
        /**
         * Perform any run-time calculations on the URL
         * 
         * @return string
         */
        protected function prepareUrl()
        {
            return $this->_url;
        }
    }
    
    /**
     * Data Transfer Object to hold any cURL options
     * 
     * @author Carl Weybrecht <cweybrec@cs.kent.com>
     * @package curl
     */
    class Curl_CurlOptions
    {
        public $post;
        public $header;
        public $returnTransfer;
    }
?>