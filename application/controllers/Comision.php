<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comision extends CI_Controller {
	private $info; 
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
			$data['comisiones'] = $this->mcomision->get();
		}elseif ($this->session->has_userdata('emp')) {
			$data['comisiones'] = $this->mcomision->get(['emp_matr_id'=> $this->info->emp_matr_id]);
		}
		$this->utilidades->layouts('comision/index', $data);

	}

	// Add a new item
	public function crear()
	{
		$data = [
			'time' => $this->utilidades->horario(),
			'info' => $this->info,
		];
		$this->utilidades->layouts('comision/crear', $data);

	}

	public function proCrear()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('emp_matr_id', 'Matricula', 'trim|required|numeric');
		$this->form_validation->set_rules('com_obje', 'Motivo', 'trim|required');
		$this->form_validation->set_rules('com_luga', 'Lugar', 'trim|required');
		$this->form_validation->set_rules('com_medi_tran', 'Medio de Transporte', 'trim|required');
		$this->form_validation->set_rules('com_ant_alim', 'Anticipo de Alimentacion', 'trim|required');
		$this->form_validation->set_rules('com_ant_pasa', 'Anticipo de Pasaje', 'trim|required');
		$this->form_validation->set_rules('com_ant_vehi', 'Anticipo de gastos por uso de Vehiculo', 'trim|required');
		$this->form_validation->set_rules('com_suma', 'Total', 'trim|required|numeric');
		$this->form_validation->set_rules('com_ant_otor', 'Total', 'trim|required');
		$this->form_validation->set_rules('com_comp_pres', 'Total', 'trim|required');
		$this->form_validation->set_rules('com_saldo', 'Total', 'trim|required|numeric');

		if ($this->form_validation->run() == TRUE or FALSE) {
			$values = [
				'emp_matr_id'=>$this->input->post('emp_matr_id', TRUE),
				'com_obje'=>$this->input->post('com_obje', TRUE),
				'com_luga'=>$this->input->post('com_luga', TRUE),
				'com_medi_tran'=>$this->input->post('com_medi_tran', TRUE),
				'com_ant_alim'=>$this->input->post('com_ant_alim', TRUE),
				'com_ant_pasa'=>$this->input->post('com_ant_pasa', TRUE),
				'com_ant_vehi'=>$this->input->post('com_ant_vehi', TRUE),
				'com_suma'=>$this->input->post('com_suma', TRUE),
				'com_ant_otor'=>$this->input->post('com_ant_otor', TRUE),
				'com_comp_pres'=>$this->input->post('com_comp_pres', TRUE),
				'com_saldo'=>$this->input->post('com_saldo', TRUE),
				'com_est' => 0,
				'com_simbolo' => 'X'

			];
			if ($this->mcomision->insert($values) ) {
				$data['success'] = 'Se registro el formato de Comision';
			}else{
				$data['error'] = 'No se pudo registrar el formato de Comision';
			}

		}else{
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);

	}
	public function pdf($com_id = '')
	{
		$comision = $this->mcomision->get(['com_id' => $com_id],1);
		$data = [
			'emp'=> $this->mempleado->get(['emp_matr_id' => $comision->emp_matr_id],1),
			'com'=> $comision,
			// 'lic'=> $this->mlicencia->get(['emp_matr_id' => $licencia->emp_matr_id],1)
		];
		$this->load->view('comision/pdf',$data);

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Comision.php */
/* Location: ./application/controllers/Comision.php */
