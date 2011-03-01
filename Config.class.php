<?php
    /**
     * Configuration file for the Sugar CRM API
     */
    
    /**
     * Data Transfer Object holding the basic configuration data for the Sugar CRM API
     * 
     * @author Carl Weybrecht <cweybrec@cs.kent.edu>
     */
    class Config
    {
        /**
         * Address that your Sugar CRM installation is at
         * 
         * @var string
         */
    	public $host       = 'ruttanvm.cs.kent.edu:4080/cweybrec';
    	
    	/**
    	 * Version number of the API that you wish to use
    	 * 
    	 * @var string
    	 */
        public $apiVersion = '2';
        
        /**
         * Username to connect to Sugar CRM with
         * 
         * @var string
         */
        public $username   = 'cweybrec';
        
        /**
         * Password to connect to Sugar CRM with
         * 
         * @var string
         */
        public $password   = '810246270';
    }
?>