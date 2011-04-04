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
        
        /**
         * Retrieves the specified number of records in a module.
         *
         * @param string $module_name
         * @param string $query
         * @param integer $deleted
         * @return object
         */
        final public function get_entries_count($module_name, $query, $deleted)
        {
			require_once 'api/GetEntriesCount.class.php';
			
			$entries_count = new Api_GetEntriesCount();
			
			$entries_count->setSessionId($this->_session_id);
			$entries_count->setModuleName($module_name);
			$entries_count->setQuery($query);
			$entries_count->setDeleted($deleted);
			
			return $entries_count->execute();
        }
        
        /**
         * Sets multiple relationships between two SugarBeans.
         *
         * @param array $module_names
         * @param array $module_ids
         * @param array $link_field_names
         * @param array $related_id
         * @return object
         */
   		final public function set_relationships($module_names = array(), $module_ids = array(), $link_field_names = array(), $related_id = array())
        {
			require_once 'api/SetRelationships.class.php';
			
			$set_relationships = new Api_SetRelationships();
			
			$set_relationships->setSessionId($this->_session_id);
			$set_relationships->setModuleNames($module_names);
			$set_relationships->setModuleIds($module_ids);
			$set_relationships->setLinkFieldNames($link_field_names);
			$set_relationships->setRelatedId($related_id);
			
			return $set_relationships->execute();
        }
        
        /**
         * Creates or updates a list of SugarBeans.
         *
         * @param string $module_name
         * @param array $name_value_lists
         * @return object
         */
       	final public function set_entries($module_name, $name_value_lists = array())
        {
			require_once 'api/SetEntries.class.php';
			
			$set_entries = new Api_SetEntries();
			
			$set_entries->setSessionId($this->_session_id);
			$set_entries->setModuleName($module_name);
			$set_entries->setNameValueList($name_value_lists);
			
			return $set_entries->execute();
        }
        
        /**
         * Retrieves a collection of beans that are related to the specified bean and, optionally, returns relationship data.
         *
         * @param string $module_name
         * @param string $module_ids
         * @param string $link_field_name
         * @param string $related_module_query
         * @param array $related_fields
         * @param array $related_module_link_name_to_fields_array
         * @param integer $deleted
         * @return object
         */
		final public function get_relationship($module_name, $module_name, $module_ids,  $link_field_name, $related_module_query,
		 $related_fields = array(), $related_module_link_name_to_fields_array = array(), $deleted)
        {
			require_once 'api/SetEntries.class.php';
			
			$get_relationship = new Api_GetRelationship();
			
			$get_relationship->setSessionId($this->_session_id);
			$get_relationship->setModuleName($module_name);
			$get_relationship->setModuleIds($module_ids);
			$get_relationship->setLinkFieldName($link_field_name);
			$get_relationship->setRelatedModuleQuery($related_module_query);
			$get_relationship->setRelatedFields($related_fields);
			$get_relationship->setRelatedModuleLinkNameToFieldsArray($related_module_link_name_to_fields_array);
			$get_relationship->setDeleted($deleted);
			
			return $get_relationship->execute();
        }
        
    }
?>
