<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pase extends CI_Controller {

	private $info;
	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('admin')) {
			$this->info = $this->mempleado->get(['usu_id' => $this->session->userdata('admin')],1);
		} else if($this->session->has_userdata('emp')) {
			$this->info = $this->mempleado->get(['usu_id' => $this->session->userdata('emp')],1);
		}else{
			redirect(site_url(),'refresh');
		}
	}

	public function index( $offset = 0 )
	{
		$data = [];
		if ($this->session->has_userdata('admin')) {
			$data['pases']= $this->mpase->get();
		} else if($this->session->has_userdata('emp')) {
			$data['pases'] = $this->mpase->get(['emp_matr_id' => $this->info->emp_matr_id]);
		}
		$this->utilidades->layouts('pase/index', $data);
	}

	public function crear()
	{
		$data = [
			'time' => $this->utilidades->horario(),
			'usuario' => $this->info
		];
		$this->utilidades->layouts('pase/crear', $data);
	}

	//Update one item
	public function proCrear()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('emp_matr_id', 'Matricula', 'trim|required|numeric');
		$this->form_validation->set_rules('pas_hora', 'Horario', 'trim|required');
		$this->form_validation->set_rules('pas_asun', 'Asunto', 'trim|required');
		$this->form_validation->set_rules('pas_hora_ini', 'Hora de inicio', 'trim|required');
		$this->form_validation->set_rules('pas_acti', 'Ocurre a:', 'trim|required');
		$this->form_validation->set_rules('pas_moti', 'Motivo', 'trim|required');
		if ($this->form_validation->run() == TRUE or FALSE) {
			$values = [
				'emp_matr_id'=> $this->input->post('emp_matr_id', TRUE),
				'pas_hora'=>$this->input->post('pas_hora', TRUE),
				'pas_asun'=>$this->input->post('pas_asun', TRUE),
				'pas_hora_ini'=> $this->input->post('pas_hora_ini', TRUE),
				'pas_acti'=>$this->input->post('pas_acti', TRUE),
				'pas_moti'=>$this->input->post('pas_moti', TRUE),
				'pas_est' => 0
			];
			if ($this->mpase->insert($values)) {
				$data['success'] = 'Se registro formato pase.';
			}else{
				$data['error'] = 'No se pudo registrar formato pase.';
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}	
		echo json_encode($data);
	}

	//Delete one item
	public function pdf()
	{

	}
}

/* End of file Pase.php */
/* Location: ./application/controllers/Pase.php */
