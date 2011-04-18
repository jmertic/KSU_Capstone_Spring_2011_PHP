<?php
    require_once 'ApiFunction.class.php';

 	/**
     * Creates or updates a list of SugarBeans.
     * 
     * @author Nick Thomas
     * @package api
     */
	class Api_SetEntries extends Api_ApiFunction
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
		 * Name Value Lists
		 * 
	     * @var string
	     */
    	private $_name_value_lists;

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
	    	return array(
		    	'session' => $this->_sessionId,
		    	'module_name' => $this->_moduleName,
		    	'name_value_lists' => $this->_name_value_lists
	    	);
    	}
	}
?>