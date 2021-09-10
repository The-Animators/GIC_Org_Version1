<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		//Templete	
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$all = $this->session->all_userdata();
		// print_r($all);
		// die();
	}


	public function get_log_path_track()
	{
		$staff_id = $this->session->userdata("@_staff_id");
		$staff_name = $this->session->userdata("@_staff_name");
		$staff_username = $this->session->userdata("@_staff_username");
		$staff_password = $this->session->userdata("@_staff_password");
		$user_role_id = $this->session->userdata("@_user_role_id");
		$user_role_title = $this->session->userdata("@_user_role_title");
		$page_title = $this->input->post("page_title");
		// print_r($page_title);die();
		// print_r($title);die();
		$page_log_track_path = $_SERVER["HTTP_REFERER"];
		$browser_name = $_SERVER["HTTP_SEC_CH_UA"];
		$route_ip_address = $this->input->ip_address();
		$staff_arr = array((int)$staff_id);
		$task_data = array();
		$this->db->trans_start();	//Start Transaction	

		$date_time = date("Y-m-d h:i:s a");
		$date_time = explode(" ", $date_time);

		$add_arr[] = array(
			'page_name' => $page_title,
			'page_log_track_path' => $page_log_track_path,
			'browser_name' => $browser_name,
			'fk_user_role_id' => $user_role_id,
			'fk_staff_id' => $staff_id,
			'staff_name' => $staff_name,
			'user_role' => $user_role_title,
			'staff_username' => $staff_username,
			'staff_password' => $staff_password,
			'route_ip_address' => $route_ip_address,
			'log_date' => date("Y-m-d"),
			'log_time' => date("h:i:s a"),
			'create_date' => date("Y-m-d h:i:s"),
		);
		// print_r($add_arr);die();
		$query = $this->Mquery_model_v3->addQuery($tableName = "page_log_track", $add_arr, $return_type = "lastID");
		$page_log_track_id  = $query["lastID"];
		// $query2 = $this->Mquery_model_v3->deleteQuery($tableName="page_log_track", $whereArr=array("log_date <"=> strtotime('-7 days')));
		$this->db->where('log_date < DATE_SUB(NOW(), INTERVAL 7 DAY)');
		$this->db->delete('page_log_track');

		$this->db->trans_complete();		// Transaction End	

		if ($this->db->trans_status() === FALSE) {
			$result["status"] = false;
			$result["userdata"] = array();
		} else {
			if ($page_log_track_id != "") {
				$result["status"] = true;
				$result["userdata"] = array();
			}
		}
		echo json_encode($result);
	}


	function get_sub_policy_details()
	{
		$company_id = $this->input->post("company_id");
		$department_id = $this->input->post("department_id");
		$policy_name_id = $this->input->post("policy_name_id");
		$policy_type_id = $this->input->post("policy_type_id");
		// $sub_policy_id = $this->input->post("sub_policy_id");

		$company_txt = $this->input->post("company_txt");
		$department_txt = $this->input->post("department_txt");
		$policy_name_txt = $this->input->post("policy_name_txt");
		$policy_type_txt = $this->input->post("policy_type_txt");
		// $sub_policy_name_txt = $this->input->post("sub_policy_name_txt");
		$this->db->trans_start();	//Start Transaction
		$groupByArr = array(
			"master_sub_policy_name.sub_policy_name_id ",
		);
		$whereArr = array();
		if (!empty($company_id))
			$whereArr["master_sub_policy_name.fk_company_id"] = $company_id;
		if (!empty($department_id))
			$whereArr["master_sub_policy_name.fk_department_id"] = $department_id;
		if (!empty($policy_name_id))
			$whereArr["master_sub_policy_name.fk_policy_type_id"] = $policy_name_id;
		if (!empty($policy_type_id))
			$whereArr["master_sub_policy_name.policy_type"] = $policy_type_id;

		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_sub_policy_name.fk_company_id = master_company.mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_sub_policy_name.fk_department_id = master_department.department_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_sub_policy_name.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =  "master_sub_policy_name.sub_policy_name_id , master_sub_policy_name.sub_policy_name, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.fk_staff_id, master_sub_policy_name.fk_user_role_id, master_sub_policy_name.policy_type, master_sub_policy_name.family_size_type, master_sub_policy_name.add_of_child_type, master_sub_policy_name.family_size_json, master_sub_policy_name.add_of_child_json,master_sub_policy_name.sub_policy_name_status,master_sub_policy_name.del_flag,master_sub_policy_name.create_date,master_sub_policy_name.modify_dt , master_policy_type.policy_type as policy_name,master_company.company_name,master_department.department_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$this->db->trans_complete();		// Transaction End

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}

		echo json_encode($result);

		// print_r($result);
		// die();
	}

	function get_single_sub_policy_details()
	{
		$company_id = $this->input->post("company_id");
		$department_id = $this->input->post("department_id");
		$policy_name_id = $this->input->post("policy_name_id");
		$policy_type_id = $this->input->post("policy_type_id");
		$sub_policy_id = $this->input->post("sub_policy_id");

		$company_txt = $this->input->post("company_txt");
		$department_txt = $this->input->post("department_txt");
		$policy_name_txt = $this->input->post("policy_name_txt");
		$policy_type_txt = $this->input->post("policy_type_txt");
		$sub_policy_name_txt = $this->input->post("sub_policy_name_txt");
		$this->db->trans_start();	//Start Transaction
		$groupByArr = array();
		$whereArr = array();
		if (!empty($company_id))
			$whereArr["master_sub_policy_name.fk_company_id"] = $company_id;
		if (!empty($department_id))
			$whereArr["master_sub_policy_name.fk_department_id"] = $department_id;
		if (!empty($policy_name_id))
			$whereArr["master_sub_policy_name.fk_policy_type_id"] = $policy_name_id;
		if (!empty($policy_type_id))
			$whereArr["master_sub_policy_name.policy_type"] = $policy_type_id;
		if (!empty($sub_policy_name_txt))
			$whereArr["master_sub_policy_name.sub_policy_name"] = $sub_policy_name_txt;

		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_sub_policy_name.fk_company_id = master_company.mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_sub_policy_name.fk_department_id = master_department.department_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_sub_policy_name.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =  "master_sub_policy_name.sub_policy_name_id , master_sub_policy_name.sub_policy_name, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.fk_staff_id, master_sub_policy_name.fk_user_role_id, master_sub_policy_name.policy_type, master_sub_policy_name.family_size_type, master_sub_policy_name.add_of_child_type, master_sub_policy_name.family_size_json, master_sub_policy_name.add_of_child_json,master_sub_policy_name.sub_policy_name_status,master_sub_policy_name.del_flag,master_sub_policy_name.create_date,master_sub_policy_name.modify_dt , master_policy_type.policy_type as policy_name,master_company.company_name,master_department.department_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = True, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$this->db->trans_complete();		// Transaction End

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}

		echo json_encode($result);

		// print_r($result);
		// die();
	}
}
