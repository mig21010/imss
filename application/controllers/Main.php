<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{
		/*esta funcion personalizada permite cargar una vista con las librerias css, js, menu y footer*/
		$this->utilidades->layouts('main/index');
	}

	// Add a new item
	public function close_session()
	{
		session_destroy();
		redirect(site_url(),'refresh');
	}
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */
