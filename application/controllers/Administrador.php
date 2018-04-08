<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index( $offset = 0 )
	{
		if (!$this->session->has_userdata('admin')) {
			redirect(site_url(),'refresh');
		}
		$data = [
			'usuario' => $this->mempleado->get(['usu_id'=>$this->session->userdata('admin')], 1),
			'categorias' => $this->mcategoria->get(),
			'departamentos' => $this->mdepartamento->get(),
			'tipolicencias' => $this->mtipolicencia->get(),
			'empleados' => $this->mempleado->get(),
			'time' => $this->utilidades->horario()
		];
		$this->utilidades->layouts('administrador/index', $data);
	}

	public function registro()
	{
		if (!$this->session->has_userdata('admin')) {
			redirect(site_url(),'refresh');
		}
		$data = [
			'categorias' => $this->mcategoria->get(),
			'departamentos' => $this->mdepartamento->get(),
			'time' => $this->utilidades->horario()
		];
		$this->utilidades->layouts('administrador/registro', $data);
	}

	public function proRegistro()
	{
		if (!$this->session->has_userdata('admin')) {
			redirect(site_url(),'refresh');
		}
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('usu_corr', 'Correo Electrónico', 'trim|required|valid_email|max_length[100]|is_unique[usuario.usu_corr]');
		$this->form_validation->set_rules('usu_pass', 'Contraseña', 'trim|required|min_length[8]|max_length[20]');
		$this->form_validation->set_rules('emp_matr_id', 'Matricula', 'trim|required|max_length[20]|is_unique[empleado.emp_matr_id]');
		$this->form_validation->set_rules('emp_nom', 'Nombre(s)', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('emp_ape_pat', 'Apellido Paterno', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('emp_ape_mat', 'Apellido Materno', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('emp_adsc', 'Adscripción', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('cat_id', 'Categoria', 'trim|required|numeric');
		$this->form_validation->set_rules('dep_id', 'Departamento', 'trim|required|numeric');
		$this->form_validation->set_rules('emp_entr', 'Horario de entrada', 'trim|required');
		$this->form_validation->set_rules('emp_sali', 'Horario de salida', 'trim|required');
		$this->form_validation->set_rules('emp_turn', 'Turno', 'trim|required');
		$this->form_validation->set_rules('emp_dia_desc', 'Dias de descanso', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$values = [
				'usu_corr' => $this->input->post('usu_corr', TRUE),
				'usu_pass' => $this->encryption->encrypt($this->input->post('usu_pass', TRUE))
			];
			$id = $this->musuario->insert($values);
			if ($id) {
				$values = [
				'emp_matr_id' => $this->input->post('emp_matr_id', TRUE),
				'emp_nom' => $this->input->post('emp_nom', TRUE),
				'emp_ape_pat' => $this->input->post('emp_ape_pat', TRUE),
				'emp_ape_mat' => $this->input->post('emp_ape_mat', TRUE),
				'cat_id' => $this->input->post('cat_id', TRUE),
				'dep_id' => $this->input->post('dep_id', TRUE),
				'emp_entr' => $this->input->post('emp_entr', TRUE),
				'emp_sali' => $this->input->post('emp_sali', TRUE),
				'emp_turn' => $this->input->post('emp_turn', TRUE),
				'emp_dia_desc' => $this->input->post('emp_dia_desc', TRUE),
				'emp_est' => '1',
				'usu_id' => $id,
				'emp_adsc' => $this->input->post('emp_adsc', TRUE)
				];
				if ($this->mempleado->insert($values)) {
					$values = [
						'usu_id' => $id,
						'adm_est' => '1'
					];
					if ($this->madministrador->insert($values)) {
						$data['success'] = 'Se registro nuevo administrador.';	
					}else{
						$data['error'] = 'No se ha podido registrar el administrador';
					}	
				}else{
					$data['error'] = 'No se ha podido registrar el empleado';
				}		
			}else{
				$data['error'] = 'No se ha podido registrar el usuario';
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function iniciar_sesion()
	{
		$this->utilidades->layouts('administrador/iniciar_sesion');
	}

	public function proLogin()
	{
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('usu_corr', 'Correo Electrónico', 'trim|required|valid_email|max_length[100]');
		$this->form_validation->set_rules('usu_pass', 'Contraseña', 'trim|required|min_length[8]|max_length[20]');
		if ($this->form_validation->run() == TRUE) {
			$exist = $this->musuario->get(['usu_corr'=>$this->input->post('usu_corr', TRUE)], 1);
			if (!empty($exist)) {
				$is_admin = $this->madministrador->get(['usu_id' => $exist->usu_id], 1);
				if (!empty($is_admin)) {
					$pass = $this->input->post('usu_pass', TRUE);
					if ($pass == $this->encryption->decrypt($exist->usu_pass)) {
						$this->session->set_userdata('admin', $exist->usu_id);
						$data['success'] = '¡Bienvenido!';
					} else {
						$data['error'] = 'La contraseña es incorrecta verifiquela.';
					}	
				} else {
					$data['error'] = 'El usuario no es un administrador.';	
				}
			} else {
				$data['error'] = 'El correo electrónico no esta registrado.';	
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proEditar( $id = NULL )
	{
		if (!$this->session->has_userdata('admin')) {
			redirect(site_url(),'refresh');
		}
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('emp_matr_id', 'Matricula', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('emp_nom', 'Nombre(s)', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('emp_ape_pat', 'Apellido Paterno', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('emp_ape_mat', 'Apellido Materno', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('emp_adsc', 'Adscripción', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('cat_id', 'Categoria', 'trim|required|numeric');
		$this->form_validation->set_rules('dep_id', 'Departamento', 'trim|required|numeric');
		$this->form_validation->set_rules('emp_entr', 'Horario de entrada', 'trim|required');
		$this->form_validation->set_rules('emp_sali', 'Horario de salida', 'trim|required');
		$this->form_validation->set_rules('emp_turn', 'Turno', 'trim|required');
		$this->form_validation->set_rules('emp_dia_desc', 'Dias de descanso', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
				$set = [
				'emp_nom' => $this->input->post('emp_nom', TRUE),
				'emp_ape_pat' => $this->input->post('emp_ape_pat', TRUE),
				'emp_ape_mat' => $this->input->post('emp_ape_mat', TRUE),
				'cat_id' => $this->input->post('cat_id', TRUE),
				'dep_id' => $this->input->post('dep_id', TRUE),
				'emp_entr' => $this->input->post('emp_entr', TRUE),
				'emp_sali' => $this->input->post('emp_sali', TRUE),
				'emp_turn' => $this->input->post('emp_turn', TRUE),
				'emp_dia_desc' => $this->input->post('emp_dia_desc', TRUE),
				'emp_est' => '1',
				'emp_adsc' => $this->input->post('emp_adsc', TRUE)
				];
				if ($this->mempleado->update(['emp_matr_id' => $this->input->post('emp_matr_id', TRUE)], $set)) {
					$data['success'] = 'Se modifico la información del empleado';
				}else{
					$data['error'] = 'No se ha podido modificar la información el empleado';
				}		
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function changePass()
	{
		if (!$this->session->has_userdata('admin')) {
			redirect(site_url(),'refresh');
		}
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$this->form_validation->set_rules('usu_id', 'Usuario id', 'trim|required|numeric');
		$this->form_validation->set_rules('usu_pass', 'Contraseña', 'trim|required|min_length[8]|max_length[20]');
		if ($this->form_validation->run() == TRUE) {
			$set = [
				'usu_pass' => $this->encryption->encrypt($this->input->post('usu_pass', TRUE))
			];
			if ($this->musuario->update(['usu_id' => $this->input->post('usu_id', TRUE)], $set)) {
				$data['success'] = 'Se modifico la contraseña del administrador';	
			} else {
				$data['error'] = 'No se pudo modificar la contraseña del administrador';
			}
		} else {
			$data['error'] = validation_errors('<br>');
		}
		echo json_encode($data);
	}

	public function proAdministrador( $id = NULL )
	{
		if (!$this->session->has_userdata('admin')) {
			redirect(site_url(),'refresh');
		}
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$exist = $this->madministrador->get(['usu_id' => $this->input->post('usu_id', TRUE)], 1);
		if (!empty($exist)) {
			$this->madministrador->delete(['usu_id' => $this->input->post('usu_id', TRUE)]);	
			$data['success'] = 'El empleado dejo de ser administrador.';
		}else{
			$this->madministrador->insert(['usu_id' => $this->input->post('usu_id', TRUE), 'adm_est' => 1]);
			$data['success'] = 'El empleado es ahora administrador.';
		}
		echo json_encode($data);
	}
	public function proEstatus()
	{
		if (!$this->session->has_userdata('admin')) {
			redirect(site_url(),'refresh');
		}
		$data = [];
		$data['csrf'] = $this->security->get_csrf_hash();
		$exist = $this->mempleado->get(['usu_id' => $this->input->post('usu_id', TRUE)], 1);
		if (!empty($exist)) {
			if ($exist->emp_est == 1) {
				$set = ['emp_est' => 0];
				$this->mempleado->update(['usu_id' => $this->input->post('usu_id', TRUE)], $set);
			} else {
				$set = ['emp_est' => 1];
				$this->mempleado->update(['usu_id' => $this->input->post('usu_id', TRUE)], $set);
			}
			$data['success'] = 'Se modifico estatus.';
		}else{
			$data['error'] = 'No se pudo modificar estatus.';
		}
		echo json_encode($data);
	}
	
	
}

/* End of file Administrador.php */
/* Location: ./application/controllers/Administrador.php */
