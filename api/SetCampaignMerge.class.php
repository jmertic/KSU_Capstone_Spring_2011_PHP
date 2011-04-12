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
         * Set the session id
         * 
         * @param string $sessionid
         */
        final public function setSessionId($sessionid)
        {
            $this->_sessionId = $sessionid;
        }

        /**
         * Set the targets
         *
         * @param array $targets
         */
        final public function setTargets($targets)
        {
            $this->_targets = $targets;
        }

        /**
         * Set the Campaign-ID
         * 
         * @param string $campaign_id
         */
        final public function setCampaignId($campaign_id)
        {
            $this->_campaign_Id = $campaign_id;
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
