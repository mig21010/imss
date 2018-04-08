<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

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
		$this->form_validation->set_rules('cat_desc', 'Categoria', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->mcategoria->insert(['cat_desc' => $this->input->post('cat_desc', TRUE)]);
			$data['success'] = 'Se agrego nueva categoria';
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEditar()
	{
		$data=[];
		$data['csrf']=$this->security->get_csrf_hash();
		$this->form_validation->set_rules('cat_desc', 'Categoria', 'trim|required');
		$this->form_validation->set_rules('cat_id', 'Id Categoria', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->mcategoria->update(['cat_id' => $this->input->post('cat_id', TRUE)],['cat_desc' => $this->input->post('cat_desc', TRUE)]);
			$data['success'] = 'Se modifico la categoria';
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEliminar()
	{
		$data=[];
		$data['csrf']=$this->security->get_csrf_hash();
		$this->form_validation->set_rules('cat_id', 'Id categoria', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->mempleado->get(['cat_id' => $this->input->post('cat_id', TRUE)]);
			if (empty($exist)) {
				$this->mcategoria->delete(['cat_id' => $this->input->post('cat_id', TRUE)]);
				$data['success']= 'Se elimino la categoria';	
			} else {
				$data['error'] ='No se pudo eliminar la categoria';
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}
}

/* End of file Categoria.php */
/* Location: ./application/controllers/Categoria.php */
