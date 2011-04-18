<?php
    require_once 'ApiFunction.class.php';

	/**
	 *Add or replace a note’s attachment. Optionally, you can set the relationship of this note to related modules using related_module_id and related_module_name.
	 *@author Yousef Guzaiz
	 *@package api
	 */
	class Api_SetNoteAttachment extends Api_ApiFunction
	{
		/**
		 * Session ID
		 *The ID of the session
		 * @var string
		 */
		private $_sessionId;
	
		/**
		 *Note
		 *The ID of the note containing the attachment.
		 * @var array
		 */
		private $_note;
        
        /**
		 *filename
		 *The file name of the attachment..
		 * @var string
		 */
        private $_filename;
        
        /**
		 *file
		 *The binary contents of the file..
		 * @var Binary
		 */
        private $_file;
	
		/**
		 *related_module_id
		 *The id of the module to which this note is related.
		 * @var string
		 */
		private $_related_module_id;
        
        /**
		 *related_module_name
		 *The name of the module to which this note is related.
		 * @var string
		 */
        private $_related_module_name;
		
		/**
		 * Constructor
		 */
 		public function __construct()
       	{
        	parent::__construct();
        }
		
		/**
		 * Builds the parameter array
		 *
		 * @return $parameters
		 */
		protected function buildParameters()
        {
        	if (empty($this->_sessionId)) {
            	throw new Exception('Session ID not set');
            }


            $parameters = array(
                'session' => $this->_sessionId,
                'note' => $this->_note,
                'filename'=>$this->filename,
				'file'=>$this->file,
				'related_module_id'=>$this->related_module_id,
				'related_module_name'=>$this->related_module_name,
            );
        
			return $parameters;
		}
	}
?>