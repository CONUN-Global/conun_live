<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Loader extends CI_Loader {
    public function __construct()
    {
        parent::__construct();
        
        
      
         
        $this->_ci_view_paths = array('views/'.APP_THEME.'/' => TRUE);
        log_message('debug', "My Loader Class Initialized");
    }
}
