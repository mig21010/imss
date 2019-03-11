<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msustitucion extends CI_Model {
private $table = 'sustitucion';
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

/*where es un arreglo asociativo,where limit es un numero, order_by es una cadena de caracteres, y direaction puede ser asc o desc*/
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
	function count_all_results($column_name = array(),$where=array(), $table_name = array())
	{
        $this->db->select($column_name);
        // If Where is not NULL
        if(!empty($where) && count($where) > 0 )
        {
            $this->db->where($where);
        }
        // Return Count Column
        return $this->db->count_all_results($table_name[0]);//table_name array sub 0
	}


	public function get_monthly_sust($emp_matr_id = ''){
		// return $query->num_rows();
		// get this month 
        $date_range = date('F Y');
       
        // set start of month
        $date = new DateTime($date_range);
        $start_date = $date->format('Y-m-d G:i:s');
        
        // set end of month and time to last second of month 
        $date->modify('last day of this month')->setTime(23,59,59);
        $end_date = $date->format('Y-m-d G:i:s');
        
        //  do a search with dates
        $count = $this->db->from('sustitucion')
        	->where('emp_matr_id', $emp_matr_id)
            ->where('sus_fech >=', $start_date)
            ->where('sus_fech <=', $end_date)
            ->count_all_results();
        
        return $count; 
	}

	public function get_monthly_sust_all($search){
        $query = $this->db->select('COUNT(*) as num_sust,s.emp_matr_id,e.emp_nom,e.emp_ape_pat,e.emp_ape_mat,s.sus_id,MONTHNAME(s.sus_fech) as month,YEAR(s.sus_fech) as year')
        	->from('sustitucion as s')
        	->like('s.emp_matr_id', $search)
        	->or_like('e.emp_nom', $search)
        	->or_like('e.emp_ape_pat', $search)
        	->or_like('e.emp_ape_mat', $search)
        	// ->or_like('s.sus_fech', $search)
            ->group_by('s.emp_matr_id')
            ->group_by('MONTH(s.sus_fech), YEAR(s.sus_fech)')
            ->join('empleado as e', 's.emp_matr_id = e.emp_matr_id');
            $query = $this->db->get();
			// $result = $query->result(); 
			// var_dump($result); 
			// return $result;

    	return $query->result();
       
	}
}

// public function count_all($table,$date)
// {
//     $this->db->select('emp_matr_id');
//     $this->db->from($table);
//     $this->db->where('sus_fech >=', $start_date);
//     $this->db->where('sus_fech <=', $end_date);
//     $this->db->order_by('sus_fech','desc');
//     $this->db->group_by('MONTH(sus_fech), YEAR(sus_fech)');
//     $num_results = $this->db->count_all_results();
// }
// p
// SELECT count(*) FROM `sustitucion` WHERE emp_matr_id = "0000000000000" WHERE sus_fech BETWEEN '2018-03-01' AND '2018-03-31'

/* End of file Sustitucion.php */
/* Location: ./application/models/Sustitucion.php */