<?php
    /**
     * Base class for the Sugar CRM API funcitons
     * 
     * @author Carl Weybrecht <cweybrec@cs.kent.edu>
     * @package api
     */
    abstract class Api_ApiFunction
    {
        /**
         * Instance of a curl object
         * 
         * @var object
         */
        private $_curl;

        /**
         * Constructor
         */
        public function __construct()
        {
            // Do nothing
        }
        
        public function __set($name, $value)
        {
        	$this->$name = $value;
        }
        
        /**
         * Execute the function with the specified parameters
         * 
         * @return object
         */
        final public function execute()
        {
            if(empty($this->_curl)) {
                require_once dirname(dirname(__FILE__)).'/curl/SugarCurlRequest.class.php';
                
                $this->_curl = new Curl_SugarCurlRequest();
            }
            
            // Build the parameter array using the overridden method in each child class
        	$parameters = $this->buildParameters();
            
            if (empty($parameters)) {
                throw new Exception('Parameter array empty');
            }
            
            // Encode the parameter array 
            $data = self::_encode($parameters);
            
            // Use the class name to build the API function name
            $name = self::_buildApiFunctionName(get_class($this));
            
            if (empty($name)) {
                throw new Exception('Module name empty');
            }
            
            // Build the field data to be sent to the server
            $post = self::_buildFields($name, $data);
            
            $this->_curl->setPostFields($post);
            
            // Make the cURL request
            $response = $this->_curl->execute();
            
            // Did the server send any type of response?
            if (empty($response)) {
                throw new Exception('Response is empty.');
            }
            
            // If the server responded, it may not have data to send back
            // SEE: logout function
            if ($response === 'null') {
                return;
            }
            
            // Decode the server response
            $result = self::_decode($response);
            
            // Check the result for errors
            self::errorCheck($result);
            
            // If all is working correctly, return the data transfer object
            return $result;
        }
        
        /**
         * Set the Curl object
         *
         * @param object $curl
         */
        public function setCurlObject($curl)
        {
            $this->_curl = $curl;
        }
         
        /**
         * Builds the parameter array
         * 
         * Overrrid this method in each child class to build that function's
         * specific parameter array
         * 
         * @return array
         */
        protected function buildParameters()
        {
            return array();
        }
        
        /**
         * Encode the data to be sent to the server
         * 
         * @param array $array
         */
        private static function _encode($array)
        {
            return json_encode($array);
        }
        
        /**
         * Decode the data returned from the server
         * 
         * @param string $string
         */
        private static function _decode($string)
        {
            return json_decode($string);
        }
        
        /**
         * Build the fields to be sent to the server
         * 
         * @param string $method
         * @param string $data
         */
        private static function _buildFields($method, $data)
        {
            return array(
                'method' => $method,
                'input_type' => 'JSON',
                'response_type' => 'JSON',
                'rest_data' => $data,
            );
        }
        
        /**
         * Build the API function name using the name of the child class
         * 
         * Assumes PEAR naming conventions
         * 
         * @param string $class_name
         */
        private static function _buildApiFunctionName($class_name)
        {
        	$result = $class_name;
        	
        	// The name may or may not have underscores in it separating the package(s) and actual class name
        	$result = explode('_',$result);
        	
        	// The class name will be at the end of any string with underscores
        	$result = end($result);
        	
        	// Each word is denoted by a capital letter.
        	// Add an underscore before each word.
        	$result = preg_replace('/([A-Z])/','_$0',$result);
        	
        	// Make everything lowercase
        	$result = strtolower($result);
        	
        	// Remove the first underscore
        	$result = substr($result,1);
        	
        	// Return the finished API function name
        	return $result;
        }
        
        /**
         * Checks the cURL result for errors
         * 
         * @param string $result
         */
        protected static function errorCheck($result)
        {
        	// Do nothing
        }
        
        /**
         * Is the result empty?
         * 
         * @param mixed $result
         */
        final protected static function isEmpty($result)
        {
        	if(empty($result)) {
        		throw new Exception('Result is empty.');
        	}
        }
        
        /**
         * Is the result an object?
         * 
         * @param mixed $result
         */
        final protected static function isObject($result)
        {
        	if (!is_object($result)) {
                throw new Exception('Result is not an object');
            }
        }
        
        /**
         * Does the specified object have the specified property?
         * 
         * @param object $result
         * @param string $field_name
         * @return bool
         */
        final protected static function keyFieldSet($result,$field_name)
        {
        	if(property_exists($result,$field_name)) {
        		return TRUE;
        	}
        	else {
        		return FALSE;
        	}
        }
    }
?>
