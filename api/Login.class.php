<?php
    require_once 'ApiFunction.class.php';
    
    /**
     * Logs a specified user into the Sugar CRM API
     * 
     * @author Carl Weybrecht <cweybrec@cs.kent.edu>
     * @package api
     */
    class Api_Login extends Api_ApiFunction
    {
        /**
         * Username
         * 
         * @var string
         */
        private $_username;
        
        /**
         * Password
         * 
         * @var password
         */
        private $_password;
        
        /**
         * Constructor
         * 
         * @param string $username
         * @param string $password
         */
        public function __construct($username = '', $password = '')
        {
            parent::__construct();
            
            // If login credentials are not supplied, use the defaults stored in the config file
            
            require_once dirname(dirname(__FILE__)).'/Config.class.php';
            
            $config = new Config();
            
            if (!empty($username)) {
                $this->_username = $username;
            }
            else {
                $this->_username = $config->username;
            }
            
            if (!empty($password)) {
                $this->_password = $password;
            }
            else {
                $this->_password = $config->password;
            }
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
        
        /**
         * Builds the parameter array
         * 
         * @return array
         */
        protected function buildParameters()
        {
            if (empty($this->_username)) {
            	throw new Exception('Username not set');
            }
            
            if (empty($this->_password)) {
            	throw new Exception('Password not set');
            }
        	
        	return array(
                'user_auth' => array(
                    'user_name' => $this->_username,
                    'password' => self::_passwordHash($this->_password),
                ),
            );
        }
        
        /**
         * Hash the password
         * 
         * @param string $password
         */
        private static function _passwordHash($password)
        {
            return md5($password);
        }
        
        /**
         * Check the result for errors
         * 
		 * @param $result
		 */
		protected static function errorCheck($result)
		{
			self::isEmpty($result);
			self::isObject($result);

			if(!self::keyFieldSet($result,'id')) {
				throw new Exception('ID not found. Error: '.$result->name.' - '.$result->description);
			}
		}
    }
?>