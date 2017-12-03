<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcomision extends CI_Model {
private $table = 'comision';
/*recibe un arreglo asociativo con los campos y valores a insertar*/	
	public function insert($value = '')
	{
		if ($this->db->insert($this->table, $value)) {
			if ($this->db->insert_id() == '0') {
					return true;
				} else {
					return $this->db->insert_id();
				}	
		} else {
			return false;
		}
		
	}
/*recibe un arreglo asociativo de valores con los campos y valores a modificar y un arreglo asociativo para indicar la coincidencia del campo*/
	public function update($where = '', $set = '')
	{
		$this->db->where($where);
		$this->db->limit(1);
		if ($this->db->update($this->table, $set)) {
			return true;
		} else {
			return false;
		}
		
	}

/*where es un arreglo asociativo, limit es un numero, order_by es una cadena de caracteres, y direaction puede ser asc o desc*/
	public function get($where = '', $limit = '', $order_by = '',  $direction = '')
	{
		if ($where != '') {
			$this->db->where($where);	
		}
		if ($order_by != '' && $direction != '') {
			$this->db->order_by($order_by, $direction);
		}
		if ($limit != '') {
			if ($limit == 1) {
				$this->db->limit($limit);
				$result = $this->db->get($this->table);
				return $result->row();		
			}else{
				$this->db->limit($limit);
				$result = $this->db->get($this->table);
				return $result->result();
			}
		}
		$result = $this->db->get($this->table);
		return $result->result();
	}
/*where es un arreglo asociativo que indica la coincidencia campo - valor a eliminar*/
	public function delete($where = '')
	{
		$this->db->where($where);
		$this->db->limit(1);
		if ($this->db->delete($this->table)) {
			return true;	
		} else {
			return false;
		}
		
	}
	

}

/* End of file Comision.php */
/* Location: ./application/models/Comision.php */