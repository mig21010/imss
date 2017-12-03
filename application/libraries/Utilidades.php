<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilidades {

	protected $ext;

	function __construct()
	{
		$this->ext =& get_instance();
	}

	public function layouts($view = '', $data = '')
	{
		$this->ext->load->view('layouts/_css_files.php');
		$this->ext->load->view('layouts/_header.php');
		$this->ext->load->view($view, $data);
		$this->ext->load->view('layouts/_footer.php');
		$this->ext->load->view('layouts/_js_files.php');
	}

	public function horario()
	{
		$time = [];
		$seg = 0;
		for ($i = 0; $i < 24; $i++) {
			for ($j = 0; $j <= .50 ; $j+=.10) {
				if ($j == 0) {
					if ($i < 10 ) {
						array_push($time, '0'.floor($i).':00');
					}else{
						array_push($time, floor($i).':00');
					}
				}else{
					if ($i < 10 ) {
						array_push($time, '0'.floor($i).':'.($j * 100));
					}else{
						array_push($time, floor($i).':'.($j * 100));
					}
				}
			}
		}
		return $time;
	}

}

/* End of file Utilidades.php */
/* Location: ./application/libraries/Utilidades.php */