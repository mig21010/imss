<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('admin')) {
			redirect(site_url(),'refresh');
		}

	}

	public function proCrear()
	{
		$data=[];
		$data['csrf']=$this->security->get_csrf_hash();
		$this->form_validation->set_rules('dep_desc', 'Categoria', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->mdepartamento->insert(['dep_desc' => $this->input->post('dep_desc', TRUE)]);
			$data['success'] = 'Se agrego nuevo departamento';
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEditar()
	{
		$data=[];
		$data['csrf']=$this->security->get_csrf_hash();
		$this->form_validation->set_rules('dep_desc', 'Categoria', 'trim|required');
		$this->form_validation->set_rules('dep_id', 'Id Categoria', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->mdepartamento->update(['dep_id' => $this->input->post('dep_id', TRUE)],['dep_desc' => $this->input->post('dep_desc', TRUE)]);
			$data['success'] = 'Se modifico el departamento';
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEliminar()
	{
		$data=[];
		$data['csrf']=$this->security->get_csrf_hash();
		$this->form_validation->set_rules('dep_id', 'Id categoria', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->mempleado->get(['dep_id' => $this->input->post('dep_id', TRUE)]);
			if (empty($exist)) {
				$this->mdepartamento->delete(['dep_id' => $this->input->post('dep_id', TRUE)]);
				$data['success']= 'Se elimino el departamento';	
			} else {
				$data['error'] ='No se pudo eliminar el departamento';
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}
}

/* End of file Departamento.php */
/* Location: ./application/controllers/Departamento.php */
