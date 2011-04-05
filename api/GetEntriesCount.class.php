<?php
    require_once 'ApiFunction.class.php';

  /**
     * Retrieves the specified number of records in a module
     * 
     * @author Nick Thomas
     * @package api
     */

class Api_GetEntriesCount extends Api_ApiFunction
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
         * Query
         * 
         * @var string
         */
	private $_query;

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
         * Set the sessionId
         * 
         * @param string $session_id
         */
	public function setSessionId($session_id)
	{
		$this->_sessionId = $session_id;
	}
	
        /**
         * Set the ModuleName
         * 
         * @param string $module_name
         */
	public function setModuleName($module_name)
	{
		$this->_moduleName = $module_name;
	}
	
        /**
         * Set the Query
         * 
         * @param string $query
         */
	public function setQuery($query)
	{
		$this->_query = $query;
	}
	
        /**
         * Set the deleted value
         * 
         * @param integer $deleted
         */
	public function setDeleted($deleted)
	{
		$this->_deleted = $deleted;
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
		if (empty($this->_query)) {
			$this->_query = '';
		}
		if (empty($this->_deleted)) {
			$this->_deleted = '0';
		}
            
		return array(
			'session' => $this->_sessionId,
			'module_name' => $this->_moduleName,
			'query' => $this->_query,
			'deleted' => $this->_deleted,
		);
	}
	}
?>
