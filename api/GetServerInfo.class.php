//author Yousef Guzaiz  <yguzaiz@cs.kent.edu>

<?php
    require_once 'ApiFunction.class.php';

class Api_GetServerInfo  extends Api_ApiFunction
{

public function __construct()
        {
            parent::__construct();
        }




protected function buildParameters()
        {
		if (empty($this->_sessionId)) {
                throw new Exception('Session ID not set');
            }
             return array (
                );
        }
  }
?>
                                 
