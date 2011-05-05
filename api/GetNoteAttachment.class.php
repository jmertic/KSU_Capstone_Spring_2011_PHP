<?php
    require_once 'ApiFunction.class.php';

	/**
	 * Retrieves an attachment from a note.
	 *
	 * @author Yousef Guzaiz
	 * @package api
	 */
	class Api_GetNoteAttachment extends Api_ApiFunction
	{
		/**
		 * Session ID
		 * The ID of the session
		 * @var string
		 */
		private $_sessionId;

		/**
		 * id
		 * The ID of the note.
		 * @var string
		 */
		private $_id;

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
		protected function buildParameters()
		{
			if (empty($this->_sessionId)) {
				throw new Exception('Session ID not set');
			}

			return array(
				'session' => $this->_sessionId,
				'id' => $this->_id,
			);
		}
	}
?>