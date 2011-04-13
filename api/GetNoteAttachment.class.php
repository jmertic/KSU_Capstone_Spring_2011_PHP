<?php
    require_once 'ApiFunction.class.php';
/**
*Retrieves an attachment from a note.
*
*@author Yousef Guzaiz
*@package api
*/

class Api_GetNoteAttachment extends Api_ApiFunction
{
//session, id)
        private $_sessionId;
        private $_id;

 public function __construct()
        {
            parent::__construct();
        }

  public function setSessionId($session_id)
        {
            $this->_sessionId = $session_id;
        }

 public function setId($ID)
        {
            $this->_id = $ID;
        }

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



}//end


?>

