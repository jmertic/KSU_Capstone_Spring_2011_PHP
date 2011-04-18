<?php
    require_once 'ApiFunction.class.php';

  	/**
     * Retrieves a collection of beans that are related to the specified
     * bean and, optionally, returns relationship data
     * 
     * @author Nick Thomas
     * @package api
     */
	class Api_GetRelationship extends Api_ApiFunction
	{
        /**
         * Session Id
         * 
         * @var string
         */
		private $_sessionId;

        /**
         * Module Name
         * 
         * @var string
         */
		private $_moduleName;

        /**
         * Module Ids
         * 
         * @var string
         */
		private $_moduleIds;

        /**
         * Link Field Name
         * 
         * @var string
         */
		private $_linkFieldName;

        /**
         * Related Module Query
         * 
         * @var string
         */
		private $_relatedModuleQuery;

        /**
         * Related Fields
         * 
         * @var array
         */
		private $_relatedFields = array();

        /**
         * Related Module Link Name To Fields Array
         * 
         * @var array
         */
		private $_relatedModuleLinkNameToFieldsArray = array();

        /**
         * Deleted
         * 
         * @var integer
         */
		private $_deleted;

        /**
         * Constructor
         * 
         */
		public function __construct()
		{
			parent::__construct();
		}

		/**
         * Builds the parameter array
         * 
         * @return array
         */
		protected function buildParameters()
		{
			if (empty($this->_sessionId)) {
				throw new Exception('Session ID not set');
			}
		
			if (empty($this->_moduleName)) {
				throw new Exception('Module name not set');
			}
		
			if (empty($this->_moduleIds)) {
				throw new Exception('Module Ids not set');
			}
		
			if (empty($this->_linkFieldName)) {
				throw new Exception('Link Field Name not set');
			}
		
			if (empty($this->_relatedModuleQuery)) {
				throw new Exception('Related Module Query not set');
			}
		
			if (empty($this->_relatedFields)) {
				throw new Exception('Related Fields Name not set');
			}
		
			if (empty($this->_relatedModuleLinkNameToFieldsArray)) {
				throw new Exception('Related Module Link Name To Fields Array not set');
			}
			
			if (empty($this->_deleted)) {
				throw new Exception('Deleted not set');
			}
		
			return array(
				'session' => $this->_sessionId,
				'module_name' => $this->_moduleName,
				'module_ids' => $this->_moduleIds,
				'link_field_name' => $this->_linkFieldName,
				'related_module_query' => $this->_relatedModuleQuery,
				'related_fields' => $this->_relatedFields,
				'related_module_link_name_to_fields_array' => $this->_relatedModuleLinkNameToFieldsArray,
				'deleted' => $this->_deleted,
			);
		}
	}
?>