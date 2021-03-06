<?php
    require_once 'ApiFunction.class.php';

  	/**
     * Retrieves a collection of beans that are related to the specified
     * bean and, optionally, returns relationship data
     * 
     * @author Nick Thomas
     * @package api
     */
	class Api_GetRelationships extends Api_ApiFunction
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
         * Module Id
         * 
         * @var string
         */
		private $_moduleId;

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
         * @var string
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
			if (empty($this->_sessionId)) {
				throw new Exception('Session ID not set');
			}
		
			if (empty($this->_moduleName)) {
				throw new Exception('Module name not set');
			}
		
			if (empty($this->_moduleId)) {
				throw new Exception('Module Id not set');
			}
		
			if (empty($this->_linkFieldName)) {
				throw new Exception('Link Field Name not set');
			}
		
			if (empty($this->_relatedModuleQuery)) {
				$this->_relatedModuleQuery = "";
			}
		
			if (empty($this->_relatedFields)) {
				throw new Exception('Related Fields Name not set');
			}
		
			if (empty($this->_relatedModuleLinkNameToFieldsArray)) {
				$this->_relatedModuleLinkNameToFieldsArray = array();
			}
			
			if (empty($this->_deleted)) {
				$this->_deleted = 0;
			}
		
			return array(
				'session' => $this->_sessionId,
				'module_name' => $this->_moduleName,
				'module_id' => $this->_moduleId,
				'link_field_name' => $this->_linkFieldName,
				'related_module_query' => $this->_relatedModuleQuery,
				'related_fields' => $this->_relatedFields,
				'related_module_link_name_to_fields_array' => $this->_relatedModuleLinkNameToFieldsArray,
				'deleted' => $this->_deleted,
			);
		}
	}
?>