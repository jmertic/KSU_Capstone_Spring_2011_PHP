<?php
    require_once 'ApiFunction.class.php';

	/**
	 * Sets a single relationship between two SugarBeans.
	 *
	 * @author
	 * @package api
	 */    
    class Api_SetRelationship extends Api_ApiFunction
    {
    	/**
    	 * Session ID
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
         * Module ID
         *
         * @var string
         */
        private $_moduleId;
        
        /**
         * Link Field Name
         *
         * @var string
        private $_linkFieldName;
        
        /**
         * Related IDs
         *
         * @var array
         */
        private $_relatedIds = array();
        
        /**
         * Constructor
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
        protected function _buildParameters()
        {
            return array(
                'session' => $this->_sessionId,
                'module_name' => $this->_moduleName,
                'module_id' => $this->_moduleId,
                'link_field_name' => $this->_linkFieldName,
                'related_ids' => $this->_relatedIds,
            );
        }
    }
?>