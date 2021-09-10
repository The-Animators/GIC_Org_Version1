
<?php
class Mcommon extends CI_Model
{

	function get_policy_counter($serial_no_year,$serial_no_month)
	{
		$this->db->select('*');
		$this->db->from('policy_member_details');
		$this->db->where('serial_no_year',$serial_no_year);
		$this->db->where('serial_no_month',$serial_no_month);
		$this->db->order_by('policy_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

	function get_policy_counter_bak()
	{
		$this->db->select('*');
		$this->db->from('policy_member_details');
		$this->db->order_by('policy_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

	function get_last_counter($table_name="",$id="",$counter_col_name="")
	{
		$this->db->select($counter_col_name);
		$this->db->from($table_name);
		$this->db->order_by($id, 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

}
?>
