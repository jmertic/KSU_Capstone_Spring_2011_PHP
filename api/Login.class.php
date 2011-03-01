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
         * Set the username
         * 
         * @param string $username
         */
        final public function setUsername($username)
        {
            $this->_username = $username;
        }
        
        /**
         * Set the password
         * 
         * @param string $password
         */
        final public function setPassword($password)
        {
            $this->_password = $password;
        }
        
        /**
         * Builds the parameter array
         * 
         * @return array
         */
        protected function buildParameters()
        {
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
    }
?>