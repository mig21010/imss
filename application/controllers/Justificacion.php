<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Justificacion extends CI_Controller {

	private $info;
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		if ($this->session->has_userdata('admin')) {
			$this->info = $this->mempleado->get(['usu_id' => $this->session->userdata('admin')],1);
		} else if($this->session->has_userdata('emp')) {
			$this->info = $this->mempleado->get(['usu_id' => $this->session->userdata('emp')],1);
		}else{
			redirect(site_url(),'refresh');
		}

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data = [];
		if ($this->session->has_userdata('admin')) {
			$data['justificaciones']= $this->mjustificacion->get();
		} else if($this->session->has_userdata('emp')) {
			$data['justificaciones'] = $this->mjustificacion->get(['emp_matr_id' => $this->info->emp_matr_id]);
		}
		$this->utilidades->layouts('justificacion/index', $data);

	}

	// Add a new item
	public function crear()
	{
		$data = [
			'usuario' => $this->info,
			'info' => $this->info	

		];
		$this->utilidades->layouts('justificacion/crear', $data);
	}

	public function proCrear()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('emp_matr_id', 'Matricula', 'trim|required|numeric');
		$this->form_validation->set_rules('jus_fech', 'Horario', 'trim|required');
		$this->form_validation->set_rules('jus_moti', 'Asunto', 'trim|required');
		$this->form_validation->set_rules('jus_omi', 'Omision', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$values = [
				'emp_matr_id'=>$this->input->post('emp_matr_id', TRUE),
				'jus_fech'=>$this->input->post('jus_fech', TRUE),
				'jus_moti'=>$this->input->post('jus_moti', TRUE),
				'jus_omi'=>$this->input->post('jus_omi', TRUE),
				'jus_est' => 0
			];
			if ($this->mjustificacion->insert($values)) {
				$data['success'] = 'Se registro formato Justificacion.';
			}else{
				$data['error'] = 'No se pudo registrar formato Justificacion.';
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}	
		echo json_encode($data);
	}
	public function pdf($jus_id = '')
	{
		$justificacion = $this->mjustificacion->get(['jus_id' => $jus_id],1);
		$data = [
			'emp'=> $this->mempleado->get(['emp_matr_id' => $justificacion->emp_matr_id],1),
			'jus'=> $justificacion
		];
		$this->load->view('justificacion/pdf',$data);

	}
	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Justificacion.php */
/* Location: ./application/controllers/Justificacion.php */
