<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sustitucion extends CI_Controller {

	private $info;
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		if ($this->session->has_userdata('admin')) {
			$this->info = $this->mempleado->get(['usu_id' => $this->session->userdata('admin')],1);
		} else if($this->session->has_userdata('emp')) {
			$this->info = $this->mempleado->get(['usu_id' => $this->session->userdata('emp')],1);
		}
		
	}

	public function index( $offset = 0 )
	{
		$data = [];
		if ($this->session->has_userdata('admin')) {
			$data['sustituciones']= $this->msustitucion->get();
		} else if($this->session->has_userdata('emp')) {
			$data['sustituciones'] = $this->msustitucion->get(['emp_matr_id' => $this->info->emp_matr_id]);
		}else{
			redirect(site_url(),'refresh');
		}
		$data['count'] = $this->msustitucion->get_monthly_sust(); 
		 // var_dump($data);
		$this->utilidades->layouts('sustitucion/index', $data);
		
	}

	public function crear()
	{
		$data = [
			'categorias' => $this->mcategoria->get(),
			'departamentos' => $this->mdepartamento->get(),
			'time' => $this->utilidades->horario(),
			'info' => $this->info	
		];
		$this->utilidades->layouts('sustitucion/crear', $data);		
	}

	public function proCrear()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('emp_matr_id', 'Matricula sustituido', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('sus_emp', 'Matricula Sustituto', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('sus_fech', 'Fecha sustitución', 'trim|required');
		$this->form_validation->set_rules('sus_hora', 'Horario Sustitución', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('sus_turn', 'Turno sustitución', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$values = [
				'emp_matr_id' => $this->input->post('emp_matr_id', TRUE),
				'sus_emp' => $this->input->post('sus_emp', TRUE),
				'sus_fech' => $this->input->post('sus_fech', TRUE),
				'sus_hora' => $this->input->post('sus_hora', TRUE),
				'sus_turn' => $this->input->post('sus_turn', TRUE),
				'sus_est' => 0
			];
			/*valida que no sea la misma matricula*/
			if ($values['emp_matr_id'] != $values['sus_emp']) {
				// $exist = $this->msustitucion->get(['emp_matr_id'=>$values['emp_matr_id'],'sus_est' => '1', 'create_at > ' => date('m')]);
				// $data['query'] = $this->msustitucion->countRow(); 
				// $exist = $this->msustitucion->get('emp_matr_id'=>$values['emp_matr_id'], 'sus_fech'=>$values['sus_fech']);
				// $data['count'] = count($exist);
				/*valida que no tenga mas de 6 sustituciones aprobadas en el mes*/
				if ($data['count'] = $this->msustitucion->get_monthly_sust($this->input->post('emp_matr_id', TRUE))  < 6) {
					$exist = $this->msustitucion->get(['emp_matr_id'=>$values['sus_emp'],'sus_est' => '1', 'sus_fech' => $values['sus_fech']], 1);
						/*valida que el usuario sustituto no tenga guardias en la fecha*/
						if (empty($exist)) {
							if ($this->msustitucion->insert($values)) {
								$data['success'] = 'Se genero correctamente el formato.';
							} else {
								$data['error'] = 'No se pudo generar el formato.';	
							}	
						} else {
							$data['error'] = 'El usuario sustituto ya tiene una guardia.';
						}
				} else {
					$data['error'] = 'No se puede tener más de 6 sustituciones en el mes.';	
				}	
			}else{
				$data['error'] = 'No se puede generar una matricula del mismo empleado.';
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function pdf($sus_id = '')
	{
		$sustitucion = $this->msustitucion->get(['sus_id' => $sus_id], 1);
		$data = [
			'emp_a' => $this->mempleado->get(['emp_matr_id' => $sustitucion->emp_matr_id],1),
			'emp_b' => $this->mempleado->get(['emp_matr_id' => $sustitucion->sus_emp],1),
			'sus' => $sustitucion,
		];
		$this->load->view('sustitucion/pdf', $data);
	}

	public function proEliminar()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$exist = $this->msustitucion->get(['sus_id' => $this->input->post('sus_id', TRUE), 'sus_est' => 0], 1);
		if (!empty($exist)) {
			if ($this->msustitucion->delete(['sus_id' => $this->input->post('sus_id', TRUE), 'sus_est' => 0])) {
				$data['success'] = 'Se elimino el formato.';
			} else {
				$data['error'] = 'No se pudo eliminar formato.';	
			}
		}else{
			$data['error'] = 'No se pudo eliminar formato.';
		}
		echo json_encode($data);
	}

	public function proEstatus()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$exist = $this->msustitucion->get(['sus_id' => $this->input->post('sus_id', TRUE)], 1);
		if (!empty($exist)) {
			if ($exist->sus_est == 1) {
				$set = ['sus_est' => 0];
				$this->msustitucion->update(['sus_id' => $this->input->post('sus_id', TRUE)], $set);
			} else {
				$set = ['sus_est' => 1];
				$this->msustitucion->update(['sus_id' => $this->input->post('sus_id', TRUE)], $set);
			}
			$data['success'] = 'Se modifico estatus.';
		}else{
			$data['error'] = 'No se pudo modificar estatus.';
		}
		echo json_encode($data);	
	}
	function your_method_model()
	{
        return $this->msustitucion->count_all_results(
               ['emp_matr_id'],
               ['fech_sus'],
               ['sustitucion']
           );
	}

	public function countTotalrow(){	
     $data['query'] = $this->msustitucion->countRow(); 
     var_dump($data);
     $this->utilidades->layouts('sustitucion/index', $data);	
}

}

/* End of file Sustitucion.php */
/* Location: ./application/controllers/Sustitucion.php */
