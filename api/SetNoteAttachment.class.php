
//author Yousef Guzaiz

<?php
    require_once 'ApiFunction.class.php';

class Api_SetNoteAttachment extends Api_ApiFunction
{
//session, note)
	private $_sessionId;
	private $_note;
        private $_filename;
        private $_file;
	private $_related_module_id;
        private $_related_module_name;
	
 public function __construct()
        {
            parent::__construct();
        }
        
  public function setSessionId($session_id)
        {
            $this->_sessionId = $session_id;
        }
        
 public function setNote($array)
        {
            $this->_note = $array;
        }


 public function setFilename($file_name)
        {
            $this->_filename = $file_name;
        }

 public function setFile($File)
        {
            $this->_file = $File;
        }


public function setRelated_module_id($Related_module_id)
        {
            $this->_related_module_id = $Related_module_id;
        }

public function setRelated_module_name($Related_module_name)
        {
            $this->_related_module_name = $Related_module_name;
        }


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



}//end


?>
