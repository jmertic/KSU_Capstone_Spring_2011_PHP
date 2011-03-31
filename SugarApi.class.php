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
        
            if (!empty($username))
            {
                $login->setUsername($username);
            }
        
            if (!empty($password)) 
            {
                $login->setPassword($password);
            }

            $this->_sessionId = $login->execute()->id;
        
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

        /**
         * Retrieve a single SugarBean based on ID
         *
         * @param string $module_name
         * @param string $query
         * @param string $id
         * @param array $select_fields
         * @param array $link_name_to_fields_array
         * @return object
         */
        final public function get_entry($module_name, $query = '', $id = '', $select_fields = array(), $link_name_to_fields_array = array())
        {
            require_once 'api/GetEntry.class.php';

            $entry = new Api_GetEntry();

            $entry->setSessionId($this->_sessionId);
            $entry->setModuleName($module_name);
            $entry->setId($id);
            $entry->setSelectFields($select_fields);
            $entry->setLinkNameToFieldsArray($link_name_to_fields_array);
            
            return $entry->execute();
        }

        /**
         * Retrieve a list of SugarBeans based on IDs
         *
         * @param string $module_name
         * @param string $query
         * @param array $ids
         * @param array $select_fields
         * @param array $link_name_to_fields_array
         * @return object
         */
        final public function get_entries($module_name, $query = '', $ids = array(), $select_fields = array(), $link_name_to_fields_array = array())
        {
            require_once 'api/GetEntries.class.php';

            $entries = new Api_GetEntries();

            $entry->setSessionId($this->_sessionId);
            $entry->setModuleName($module_name);
            $entry->setIds($ids);
            $entry->setSelectFields($select_fields);
            $entry->setLinkNameToFieldsArray($link_name_to_fields_array);

            return $entries->execute();
        }

        /**
         * Returns the ID, module name and fields for specified modules
         *
         * @param string $search_string
         * @param string $modules
         * @param integer $offset
         * @param integer $max_results
         * @return object
         */
        final public function search_by_module($search_string, $modules = '', $offset = '', $max_results = '')
        {
            require_once 'api/SearchByModule.class.php';

            $module = new Api_SearchByModule();

            $module->setSessionId($this->_sessionId);
            $module->setSearchString($search_string);
            $module->setModule($modules);
            $module->setOffset($offset);
            $module->setMaxresults($max_results);

            return $module->execute();
        }

        /**
         * Sets a new revision for a document
         *
         * @param string $document_revision
         * @param string $id
         * @ return object
         */
        final public function set_document_revision($document_revision = '', $id = '')
        {
            require_once 'api/SetDocumentRevision.class.php';

            $document = new Api_SetDocumentRevision();

            $document->setSessionId($this->_sessionId);
            $document->setDocumentRevision($document_revision);
            $document->setDocumentId($id);

            return $document->execute();
        }

        /**
         * In case of .htaccess lock-down on the cache directory,
         * allows an authenticated user with the appropriate permissions to download a document
         *
         * @param string $id
         * @return object
         */
        final public function get_document_revision($id = '')
        {
            require_once 'api/GetDocumentRevision.class.php';

            $document = new Api_GetDocumentRevision();

            $document->setSessionId($this->_sessionId);
            $document->setDocumentId($id);
            
            return $document->execute();
        }
    }
?>
