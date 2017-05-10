<?php
class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if(strtolower(substr(PHP_OS, 0, 3)) !== 'win') {
        	$this->load->library("linuxinfo");
        	$this->systemstat = $this->linuxinfo;
        } else {
        	$this->load->library("wininfo");
			$this->systemstat = $this->wininfo;
        }
    }
}
?>  