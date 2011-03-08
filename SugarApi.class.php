<?php
    /**
     * Wrapper class for the Sugar CRM API
     * 
     * @author Carl Weybrecht <cweybrec@cs.kent.edu>
     */
    class SugarApi
    {
        /**
         * Session ID
         * 
         * @var string
         */
        protected $_sessionId;
        
        /**
         * Constructor
         */
        public function __construct()
        {
            // Do nothing
        }
        
        /**
         * Log in to the system
         * 
         * @param string $username
         * @param string $password
         * @return string
         */
        final public function login($username = '', $password = '')
        {
            require_once 'api/Login.class.php';
            
            $login = new Api_Login();
            
            if (!empty($username)) {
            	$login->setUsername($username);
            }
            
            if (!empty($password)) {
            	$login->setPassword($password);
            }
            
            $this->_sessionId    =    $login->execute()->id;
            
            return $this->_sessionId;
        }
        
        /**
         * Log out of the system
         */
        final public function logout()
        {
            require_once 'api/Logout.class.php';
            
            $logout = new Api_Logout();
            
            $logout->setSessionId($this->_sessionId);
            
            $logout->execute();
        }
        
        /**
         * Get an entry list for the specified module
         * 
         * @param string $module_name
         * @param string $query
         * @param string $order_by
         * @param string $offset
         * @param array $select_fields
         * @param array $link_name_to_fields_array
         * @return object
         */
        final public function get_entry_list($module_name, $query = '', $order_by = '', $offset = '', $select_fields = array(), $link_name_to_fields_array = array())
        {
            require_once 'api/GetEntryList.class.php';
            
            $entry_list = new Api_GetEntryList();
            
            $entry_list->setSessionId($this->_sessionId);
            $entry_list->setModuleName($module_name);
            $entry_list->setQuery($query);
            $entry_list->setOrderBy($order_by);
            $entry_list->setOffset($offset);
            $entry_list->setSelectFields($select_fields);
            $entry_list->setLinkNameToFieldsArray($link_name_to_fields_array);
            
            return $entry_list->execute();
        }
    }
?>