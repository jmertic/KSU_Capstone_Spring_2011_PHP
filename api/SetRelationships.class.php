<?php
    require_once 'ApiFunction.class.php';

	/**
     * Sets multiple relationships between two SugarBeans
     * 
     * @author Nick Thomas
     * @package api
     */
	class Api_SetRelationships extends Api_ApiFunction
	{
		/**
		 * Session Id
		 * 
	     * @var string
	     */
    	private $_sessionId;
    
    	/**
		 * Module Names
		 * 
	     * @var array
	     */
    	private $_moduleNames = array();
    
		/**
		 * Module Ids
		 * 
	     * @var array
	     */
    	private $_moduleIds = array();
    
		/**
		 * Link Field Names
		 * 
	     * @var array
	     */
    	private $_linkFieldNames = array();
    
		/**
		 * Related Id
		 * 
	     * @var array
	     */
    	private $_relatedId = array();


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
		
			if (empty($this->_moduleNames)) {
				throw new Exception('Module Names not set');
			}
		
			if (empty($this->_moduleIds)) {
				throw new Exception('Module Ids not set');
			}
			
			if (empty($this->_linkFieldNames)) {
				throw new Exception('Link Field Names not set');
			}
  		
  			if (empty($this->_relatedId)) {
				throw new Exception('Related Id not set');
			}
	    
	    	return array(
		    	'session' => $this->_sessionId,
		    	'module_names' => $this->_moduleNames,
		    	'module_ids' => $this->_moduleIds,
		    	'link_field_names' => $this->_linkFieldNames,
		    	'related_id' => $this->_relatedId,
		   	);
    	}
	}
?>