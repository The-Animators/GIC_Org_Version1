
<?php
class Magent extends CI_Model
{
	function update_remarks($update_remarks_arr, $new_policy_remark_id, $policy_id)
	{
		$remark_id = explode(",", $new_policy_remark_id);
		// $this->db->where("policy_remark_details.fk_policy_id", $policy_id);
		// $this->db->where("policy_remark_details.magency_id", $agent_id);
		// $this->db->where_in("policy_remark_details.policy_remark_id", $remark_id);
		// $this->db->update_batch('policy_remark_details', $update_remarks_arr, 'policy_remark_id');

		for ($i = 0; $i < count($remark_id); $i++) {
			$this->db->where("policy_remark_details.fk_policy_id", $policy_id);
			$this->db->where_in("policy_remark_details.policy_remark_id", $remark_id[$i]);
			$this->db->update_batch('policy_remark_details', $update_remarks_arr, 'policy_remark_id');
		}
		return true;
	}
	function remove_remark($remove_policy_remark_id)
	{
		if (!empty($remove_policy_remark_id)) {
			for ($i = 0; $i < count($remove_policy_remark_id); $i++) {
				$this->db->where("policy_remark_id", $remove_policy_remark_id[$i][0]);
				$this->db->delete('policy_remark_details');
			}
			// echo $this->db->last_query();
			// die();
			return true;
		}
	}

	function update_agent($update_agent_arr, $new_agent_id, $company_id)
	{
		$agent_id = explode(",", $new_agent_id);
		$this->db->where("master_agency.fk_mcompany_id", $company_id);
		// $this->db->where("master_agency.magency_id", $agent_id);
		$this->db->where_in("master_agency.magency_id", $agent_id);
		$this->db->update_batch('master_agency', $update_agent_arr, 'magency_id');
		return true;
	}
	function remove_agent($remove_agent_id)
	{
		if (!empty($remove_agent_id)) {
			for ($i = 0; $i < count($remove_agent_id); $i++) {
				$this->db->where_in("magency_id", $remove_agent_id[$i][0]);
				$this->db->delete('master_agency');
			}
			return true;
		}
	}

	function update_employee($update_employee_arr, $new_member_id, $company_id)
	{
		$member_id = explode(",", $new_member_id);
		$this->db->where("master_member.fk_mcompany_id", $company_id);
		// $this->db->where("master_member.mmember_id", $member_id);
		$this->db->where_in("master_member.mmember_id", $member_id);
		$this->db->update_batch('master_member', $update_employee_arr, 'mmember_id');
		return true;
	}
	function remove_employee($remove_employee_id)
	{
		if (!empty($remove_employee_id)) {
			for ($i = 0; $i < count($remove_employee_id); $i++) {
				$this->db->where_in("mmember_id", $remove_employee_id[$i][0]);
				$this->db->delete('master_member');
			}
			return true;
		}
	}

	function remove_tpa_employee($remove_tpaemployee_id)
	{
		// print_r($remove_tpaemployee_id);
		if (!empty($remove_tpaemployee_id)) {
			
			// $this->db->where('mtpa_member_id',$this->input->post('mtpa_member_id'));
			
			for ($i = 0; $i < count($remove_tpaemployee_id); $i++) {
				// print_r($remove_tpaemployee_id[$i][0]);
				// die();
				$this->db->where("mtpa_member_id", $remove_tpaemployee_id[$i][0]);
				$this->db->delete('master_tpa_member');
				
				// $this->db->where_in('mtpa_member_id',$remove_tpaemployee_id);
				// $this->db->delete('master_tpa_member');
			}
			// echo $this->db->last_query();
			// die();
			return true;
		}
	}

	function remove_agent_bak($remove_agent_id, $company_id)
	{
		// print_r($remove_agent_id);
		// die("Test");
		// $agent_id = explode(",", $remove_agent_id);
		if (!empty($remove_agent_id)) {
			// $this->db->where("master_agency.fk_mcompany_id", $company_id);
			$this->db->where_in("magency_id", $remove_agent_id);
			$this->db->delete('master_agency');
			// echo $this->db->last_query();
			return true;
		}
	}
}
?>
