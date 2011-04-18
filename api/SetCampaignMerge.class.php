<?php
    require_once 'ApiFunction.class.php';

    /**
     * Performs a mail merge for the specified campaign. 
     *
     * @author Nathan Osysko
     * @package api
     */
    class Api_SetCampaignMerge extends Api_ApiFunction
    {
        /**
         * Session ID
         *
         * @var string
         */
        private $_sessionId;

        /**
         * Targets
         *
         * @var array
         */
        private $_targets;

        /**
         * Campaign ID
         *
         * @var string
         */
        private $_campaign_Id;

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
         * @returns $parameters
         */
        protected function buildParameters()
        {
            if(empty($this->_sessionId)){
                throw new Exception('Session ID not set');
            }

            if(empty($this->_targets)){
                throw new Exception('Targets not set');
            }

            if(empty($this->_campaign_Id)){
                throw new Exception('Campaign-ID not set');
            }

            $parameters = array(
                'session' => $this->_sessionId,
                'targets' => $this->_targets,
                'campaign_id' => $this->_campaign_Id,
            );

            return $parameters;
        }
    }
?>