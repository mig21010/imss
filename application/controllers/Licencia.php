<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Licencia extends CI_Controller {

	private $info; 
	private $tipo;
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		if ($this->session->has_userdata('admin')) {
			$this->info = $this->mempleado->get(['usu_id'=> $this->session->userdata('admin')],1);
		}elseif ($this->session->has_userdata('emp')) {
			$this->info = $this->mempleado->get(['usu_id'=> $this->session->userdata('emp')],1);
		}else{
			redirect(site_url(),'refresh');
		}

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data = [];
		if ($this->session->has_userdata('admin')) {
			$data['licencias'] = $this->mlicencia->get();
			// $data['licencias'] = $this->mtipolicencia->get();
		}elseif ($this->session->has_userdata('emp')) {
			$data['licencias'] = $this->mlicencia->get(['emp_matr_id'=> $this->info->emp_matr_id]);
		}
		$this->utilidades->layouts('licencia/index', $data);

	}

	// Add a new item
	public function crear()
	{
		$data = [
			'time' => $this->utilidades->horario(),
			'info' => $this->info,
			'tipo' => $this->mtipolicencia->get()
		];
		$this->utilidades->layouts('licencia/crear', $data);

	}

	public function proCrear()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('tipo_lic_id', 'Tipo', 'trim|required');
		$this->form_validation->set_rules('emp_matr_id', 'Matricula', 'trim|required|numeric');
		$this->form_validation->set_rules('lic_fech_ini', 'Fecha Inicial', 'trim|required');
		$this->form_validation->set_rules('lic_fech_fin', 'Fecha final', 'trim|required');
		$this->form_validation->set_rules('lic_fech_sol', 'Fecha solicitada', 'trim|required');
		$this->form_validation->set_rules('lic_tot_dias', 'Total dias', 'trim|required|numeric');
		$this->form_validation->set_rules('lic_moti', 'Motivo', 'trim|required');
		if ($this->form_validation->run() == TRUE or FALSE) {
			$values = [
				'tipo_lic_id'=>$this->input->post('tipo_lic_id', TRUE),
				'emp_matr_id'=>$this->input->post('emp_matr_id', TRUE),
				'lic_fech_ini'=>$this->input->post('lic_fech_ini', TRUE),
				'lic_fech_fin'=>$this->input->post('lic_fech_fin', TRUE),
				'lic_fech_sol'=>$this->input->post('lic_fech_sol', TRUE),
				'lic_tot_dias'=>$this->input->post('lic_tot_dias', TRUE),
				'lic_moti'=>$this->input->post('lic_moti', TRUE),
				'lic_est' => 0

			];
			if ($this->mlicencia->insert($values) ) {
				$data['success'] = 'Se registro el formato de licencia';
			}else{
				$data['error'] = 'No se pudo registrar el formato de licencia';
			}

		}else{
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);

	}
	public function pdf($lic_id = '')
	{
		$licencia = $this->mlicencia->get(['lic_id' => $lic_id],1);
		$data = [
			'emp'=> $this->mempleado->get(['emp_matr_id' => $licencia->emp_matr_id],1),
			 'lic'=> $licencia,
			// 'lic'=> $this->mlicencia->get(['emp_matr_id' => $licencia->emp_matr_id],1)
		];
		$this->load->view('licencia/pdf',$data);

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Licencia.php */
/* Location: ./application/controllers/Licencia.php */
