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
         * Curl object
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
        
        /**
         * Check if curl object is set
         *
         * return bool
         */ 
        private function _isCurlSet()
        {
            return !empty($this->_curl);
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
         * Log in to the system
         *
         * @param string $username
         * @param string $password
         * @return object
         */
        final public function login($username = '', $password = '')
        {
            require_once 'api/Login.class.php';
        
            $login = new Api_Login();
            
            if($this->_isCurlSet())
            {
                $login->_curl = $this->_curl;
            }

            if (!empty($username))
            {
                $login->_username = $username;
            }
        
            if (!empty($password)) 
            {
                $login->_password = $password;
            }

            $result = $login->execute();

            $this->_sessionId = $result->id;

            return $result;
        }
    
        /**
         * Log out of the system
         */
        final public function logout()
        {
            require_once 'api/Logout.class.php';                    
        
            $logout = new Api_Logout();
        
            if($this->_isCurlSet())
            {
                $logout->_curl = $this->_curl;
            }

            $logout->_sessionId = $this->_sessionId;
        
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

            if($this->_isCurlSet())
            {
                $entry_list->_curl = $this->_curl;
            }

            $entry_list->_sessionId = $this->_sessionId;
            $entry_list->_moduleName = $module_name;
            $entry_list->_query =  $query;
            $entry_list->_orderBy = $order_by;
            $entry_list->_offset = $offset;
            $entry_list->_selectFields = $select_fields;
            $entry_list->_linkNameToFieldsArray = $link_name_to_fields_array;
       
            return $entry_list->execute();
        }

        /**
         * Retrieve a single SugarBean based on ID
         *
         * @param string $module_name
         * @param string $id
         * @param array $select_fields
         * @param array $link_name_to_fields_array
         * @return object
         */
        final public function get_entry($module_name = '', $id = '', $select_fields = array(), $link_name_to_fields_array = array())
        {
            require_once 'api/GetEntry.class.php';

            $entry = new Api_GetEntry();

            if($this->_isCurlSet())
            {
                $entry->_curl = $this->_curl;
            }

            $entry->_sessionId = $this->_sessionId;
            $entry->_moduleName = $module_name;
            $entry->_id = $id;
            $entry->_selectFields = $select_fields;
            $entry->_linkNameToFieldsArray = $link_name_to_fields_array;
            
            return $entry->execute();
        }

        /**
         * Retrieve a list of SugarBeans based on IDs
         *
         * @param string $module_name
         * @param array $ids
         * @param array $select_fields
         * @param array $link_name_to_fields_array
         * @return object
         */
        final public function get_entries($module_name = '', $ids = array(), $select_fields = array(), $link_name_to_fields_array = array())
        {
            require_once 'api/GetEntries.class.php';

            $entries = new Api_GetEntries();

            if($this->_isCurlSet())
            {
                $entries->_curl = $this->_curl;
            }

            $entries->_sessionId = $this->_sessionId;
            $entries->_moduleName = $module_name;
            $entries->_ids = $ids;
            $entries->_selectFields = $select_fields;
            $entries->_linkNameToFieldsArray = $link_name_to_fields_array;

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
        final public function search_by_module($search_string = '', $modules = '', $offset = '', $max_results = '')
        {
            require_once 'api/SearchByModule.class.php';

            $module = new Api_SearchByModule();

            if($this->_isCurlSet())
            {
                $module->_curl = $this->_curl;
            }

            $module->_sessionId = $this->_sessionId;
            $module->_searchString = $search_string;
            $module->_modules = $modules;
            $module->_offset = $offset;
            $module->_maxResults = $max_results;

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

            if($this->_isCurlSet())
            {
                $document->_curl = $this->_curl;
            }

            $document->_sessionId = $this->_sessionId;
            $document->_documentRevision = $document_revision;
            $document->_documentId = $id;

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

            if($this->_isCurlSet())
            {
                $document->_curl = $this->_curl;
            }

            $document->_sessionId = $this->_sessionId;
            $document->_documentId = $id;
            
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

            if($this->_isCurlSet())
            {
                $entries_count->_curl = $this->_curl;
            }

            $entries_count->_sessionId = $this->_sessionId;
            $entries_count->_moduleName = $module_name;
            $entries_count->_query = $query;
            $entries_count->_deleted = $deleted;

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

            if($this->_isCurlSet())
            {
                $set_relationships->_curl = $this->_curl;
            }

            $set_relationships->_sessionId = $this->_sessionId;
            $set_relationships->_moduleNames = $module_names;
            $set_relationships->_moduleIds = $module_ids;
            $set_relationships->_linkFieldNames = $link_field_names;
            $set_relationships->_relatedId = $related_id;

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

            if($this->_isCurlSet())
            {
                $set_entries->_curl = $this->_curl;
            }

            $set_entries->_sessionId = $this->_sessionId;
            $set_entries->_moduleName = $module_name;
            $set_entries->_nameValueList = $name_value_lists;

            return $set_entries->execute();
        }
                                                                                                                                
        /**
         * Retrieves a collection of beans that are related to the specified bean and, optionally, returns relationship data.
         *
         * @param string $module_name
         * @param string $module_id
         * @param string $link_field_name
         * @param string $related_module_query
         * @param array $related_fields
         * @param array $related_module_link_name_to_fields_array
         * @param integer $deleted
         * @return object
         */
        final public function get_relationships($module_name, $module_name, $module_id, $link_field_name, $related_module_query, $related_fields = array(), $related_module_link_name_to_fields_array = array(), $deleted)
        {
            require_once 'api/GetRelationships.class.php';

            $get_relationships = new Api_GetRelationships();

            if($this->_isCurlSet())
            {
                $get_relationships->_curl = $this->_curl;
            }

            $get_relationships->_sessionId = $this->_sessionId;
            $get_relationships->_moduleName = $module_name;
            $get_relationships->_moduleId = $module_id;
            $get_relationships->_linkFieldName = $link_field_name;
            $get_relationships->_relatedModuleQuery = $related_module_query;
            $get_relationships->_relatedFields = $related_fields;
            $get_relationships->_relatedModuleLinkNameToFieldsArray = $related_module_link_name_to_fields_array;
            $get_relationships->_deleted = $deleted;

            return $get_relationships->execute();
        }

        /**
         * Retrieves the list of modules available to the current user logged into the system.
         * 
         * @return object
         */
        final public function get_available_modules()
        {
            require_once 'api/GetAvailableModules.class.php';

            $modules = new Api_GetAvailableModules();

            if($this->_isCurlSet())
            {
                $modules->_curl = $this->_curl;
            }

            $modules->_sessionId = $this->_sessionId;

            return $modules->execute();
        }

        /**
         * Retrieves a list of report entries based on specified report IDs.
         *
         * @param array $ids
         * @param string $select_fields
         * @return object
         */
        final public function get_report_entries($ids = array(), $select_fields = '')
        {
            require_once 'api/GetReportEntries.class.php';

            $entries = new Api_GetReportEntries();

            if($this->_isCurlSet())
            {
                $entries->_curl = $this->_curl;
            }

            $entries->_sessionId = $this->_sessionId;
            $entries->_ids = $ids;
            $entries->_selectFields = $select_fields;

            return $entries->execute();
        }

        /**
         * Performs a mail merge for the specified campaign.
         *
         * @param array $targets
         * @param string $campaign_id
         * @return object
         */
        final public function set_campaign_merge($targets = array(), $campaign_id = '')
        {
            require_once 'api/SetCampaignMerge.class.php';

            $merge = new Api_SetCampaignMerge();

            if($this->_isCurlSet())
            {
                $merge->_curl = $this->_curl;
            }

            $merge->_sessionId = $this->_sessionId;
            $merge->_targets = $targets;
            $merge->_camapaignId = $campaign_id;
            
            return $merge->execute();
        }
        
        /**
         * Creates or updates a SugarBean.
         *
         * @param string $module_name
         * @param array $name_value_list;
         * @return object
         */
        final public function set_entry($module_name = '', $name_value_list = array())
        {
        	require_once 'api/SetEntry.class.php';
        	
        	$entry = new Api_SetEntry();
        	
        	if($this->_isCurlSet())
        	{
        		$entry->_curl = $this->_curl;
        	}
        	
        	$entry->_sessionId = $this->_sessionId;
        	$entry->_moduleName = $module_name;
        	$entry->_nameValueList = $name_value_list;
        	
        	return $entry->execute();
        }
        
        /**
         * Returns server information such as version, flavor, and gmt_time.
         *
         * @return object
         */
        final public function get_server_info()
        {
        	require_once 'api/GetServerInfo.class.php';
        	
        	$info = new Api_GetServerInfo();
        	
        	if($this->_isCurlSet())
        	{
        		$info->_curl = $this->_curl;
        	}
        	
        	return $info->execute();
        }
        
        /**
         * Returns the ID of the user who is logged into the current session.
         *
         * @return object
         */
        final public function get_user_id()
        {
        	require_once 'api/GetUserId.class.php';
        	
        	$id = new Api_GetUserId();
        	
        	if($this->_isCurlSet())
        	{
        		$info->_curl = $this->_curl;
        	}
        	
        	$id->_sessionId = $this->_sessionId;
        	
        	return $id->execute();
        }
        
        /**
         * Performs a seamless login during synchronization.
         *
         * @return object
         */
        final public function seamless_login()
        {
        	require_once 'api/SeamlessLogin.class.php';
        	
        	$login = new Api_SeamlessLogin();
        	
        	if($this->_isCurlSet())
        	{
        		$info->_curl = $this->_curl;
        	}
        	
        	$login->_sessionId = $this->_sessionId;
        	
        	return $login->execute();
        }
        
        /**
         * Retrieves the ID of the default team of the user who is logged into the current session.
         *
         * @return object
         */
        final public function get_user_team_id()
        {
        	require_once 'api/GetUserTeamId.class.php';
        	
        	$id = new Api_GetUserTeamId();
        	
        	if($this->_isCurlSet())
        	{
        		$info->_curl = $this->_curl;
        	}
        	
        	$id->_sessionId = $this->_sessionId;
        	
        	return $id->execute();
        }
        
        /**
         * Retrieves variable definitions (vardefs) for fields of the specified SugarBean.
         *
         * @param string $module_name
         * @param array $fields
         * @return object
         */
        final public function get_module_fields($module_name = '', $fields = array())
        {
        	require_once 'api/GetModuleFields.class.php';
        	
        	$modFields = new Api_GetModuleFields();
        	
        	if($this->_isCurlSet())
        	{
        		$modFields->_curl = $this->_curl;
        	}
        	
        	$modFields->_sessionId = $this->_sessionId;
        	$modFields->_moduleName = $module_name;
        	$modFields->_fields = $fields;
        	
        	return $modFields->execute();
        }
        
        /**
         * Add or replace a notes attachment. Optionally, you can set the relationship of this note to related modules using related_module_id and related_module_name.
         *
         * @param array $note
         * @param string $filename
         * @param binary $file
         * @param string $related_module_id
         * @param string $related_module_name
         * @return object
         */
        final public function set_note_attachment($note = array(), $filename = '', $file, $related_module_id = '', $related_module_name = '')
        {
        	require_once 'api/SetNoteAttachment.class.php';
        	
        	$attachment = new Api_SetNoteAttachment();
        	
        	if($this->_isCurlSet())
        	{
        		$attachment->_curl = $this->_curl;
        	}
        	
        	$attachment->_sessionId = $this->_sessionId;
        	$attachment->_note = $note;
        	$attachment->_filename = $filename;
        	$attachment->_file = $file;
        	$attachment->_related_module_id = $related_module_id;
        	$attachment->_related_module_name = $related_module_name;
        	
        	return $attachment->execute();
        }
        
        /**
         * Retrieves an attachment from a note.
         *
         * @param string $id
         * @return object
         */
        final public function get_note_attachment($id = '')
        {
        	require_once 'api/GetNoteAttachment.class.php';
        	
        	$attachment = new Api_GetNoteAttachment();
        	
        	if($this->_isCurlSet())
        	{
        		$attachment->_curl = $this->_curl;
        	}
        	
        	$attachment->_sessionId = $this->_sessionId;
        	$attachment->_id = $id;
        	
        	return $attachment->execute();
        }
        
        /**
         * Sets a single relationship between two SugarBeans.
         * 
         * @param string $module_name
         * @param string $module_id
         * @param string $link_field_name
         * @param array $related_ids
         * @return object
         */
        final public function set_relationship($module_name = '', $module_id = '', $link_field_name = '', $related_ids = array())
        {
        	require_once 'api/SetRelationship.class.php';
        	
        	$relationship = new Api_SetRelationship();
        	
        	if($this->_isCurlSet())
        	{
        		$relationship->_curl = $this->_curl;
        	}
        	
        	$relationship->_sessionId = $this->_sessionId;
        	$relationship->_moduleName = $module_name;
        	$relationship->_moduleId = $module_id;
        	$relationship->_linkFieldName = $link_field_name;
        	$relationship->_relatedIds = $related_ids;
        	
        	return $relationship->execute();
        }
    }
?>
