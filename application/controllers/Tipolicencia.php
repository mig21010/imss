<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipolicencia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}
	public function proCrear()
	{
		$data=[];
		$data['csrf']=$this->security->get_csrf_hash();
		$this->form_validation->set_rules('tipo_lic_desc', 'Tipo licencia', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->mtipolicencia->insert(['tipo_lic_desc' => $this->input->post('tipo_lic_desc', TRUE)]);
			$data['success'] = 'Se agrego nuevo tipo licencia';
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEditar()
	{
		$data=[];
		$data['csrf']=$this->security->get_csrf_hash();
		$this->form_validation->set_rules('tipo_lic_desc', 'Tipo licencia', 'trim|required');
		$this->form_validation->set_rules('tipo_lic_id', 'Id Tipo licencia', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->mtipolicencia->update(['tipo_lic_id' => $this->input->post('tipo_lic_id', TRUE)],['tipo_lic_desc' => $this->input->post('tipo_lic_desc', TRUE)]);
			$data['success'] = 'Se modifico el tipo licencia';
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEliminar()
	{
		$data=[];
		$data['csrf']=$this->security->get_csrf_hash();
		$this->form_validation->set_rules('tipo_lic_id', 'Id Tipo licencia', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->mlicencia->get(['tipo_lic_id' => $this->input->post('tipo_lic_id', TRUE)]);
			if (empty($exist)) {
				$this->mtipolicencia->delete(['tipo_lic_id' => $this->input->post('tipo_lic_id', TRUE)]);
				$data['success']= 'Se elimino el tipo licencia';	
			} else {
				$data['error'] ='No se pudo eliminar el tipo licencia';
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}
}

/* End of file Tipolicencia.php */
/* Location: ./application/controllers/Tipolicencia.php */
