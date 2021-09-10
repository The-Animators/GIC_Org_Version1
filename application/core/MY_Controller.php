<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->set_stream_context();
	}
	
	function set_stream_context()
	{
		$this->ctx= stream_context_create(array('http' => array('timeout' => 1)));
	}	
}

class Admin_gic_core extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->authenticator->check_session();
		$url_segments=uri_string();

		$this->staff_id=$this->session->userdata["@_staff_id"];
		$this->user_role_id=$this->session->userdata["@_user_role_id"];
		// ---------------------------------------------It is use to Get Class && Method Name Start-----------------------------------//		
		$this->data['method']=$this->router->fetch_method();
		$this->data['class']=$this->router->fetch_class();
		// ---------------------------------------------It is use to Get Class && Method Name End-----------------------------------//	
	}

}


?>
