<?php
    require_once 'ApiFunction.class.php';

    /**
     * Retrieves a list of SugarBeans based on the specified IDs
     *
     * @author Nathan Osysko
     * @package api
     */
    class Api_GetEntries extends Api_ApiFunction
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
         * IDs
         *
         * @var array
         */
        private $_ids = array();

        /**
         * Select Fields
         *
         * @var array
         */
        private $_selectFields = array();

        /**
         * Link Name To Fields Array
         *
         * @var array
         */
        private $_linkNameToFieldsArray = array();

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
            if(empty($this->_sessionId)){
                throw new Exception('Session ID not set');
            }

            if(empty($this->_moduleName)){
                throw new Exception('Module Names not set');
            }
                                                                                        
            if(empty($this->_ids)){       
                throw new Exception('IDs not set');
            }                                                                                                   
            $parameters = array(
                'session' => $this->_sessionId,
                'module_name' => $this->_moduleName,
                'ids' => $this->_ids,
            );

            if(!empty($this->_selectFields)){
                $parameters['select_fields'] = $this->_selectFields;
            }
            
            if(!empty($this->_linkNameToFieldsArray)){
                $parameters['link_name_to_fields_array'] = $this->_linkNameToFieldsArray;
            }

            return $parameters;
        }
    }
?>