<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ip_master extends Admin_gic_core
{

    function __construct()
    {
        parent::__construct();
        //Templete	
        $this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "summernote", "date_picker");
        $this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "summernote", "date_picker");
        $this->data["base_url"] = $this->config->item("base_url");
        $this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
        $this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
        $this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$all_userdata = $this->session->all_userdata();
		$this->data["title"] = $title = "IP Address";
		// print_r($all_userdata);
		// die();
    }

	public function index()
	{
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/ip/ip_master";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	// IP AddressSection Start
	public function get_global_local_status(){
		$validator = array('status' => false, 'messages' => array());

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_global_ip_address", $colNames =  "master_global_ip_address.global_id, master_global_ip_address.global_ip_address_btn_status, master_global_ip_address.fk_staff_id, master_global_ip_address.fk_user_role_id, master_global_ip_address.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if(empty($result))
			$result = array();
		
		if (!empty($result)) {
			$validator["status"] = true;
			$validator["userdata"] = $result;
			$validator["message"] = "";
		} else {
			$validator["status"] = false;
			$validator["userdata"] = array();
			$validator["message"] = "Fatal Error: Contact Support:";
		}

		echo json_encode($validator);
	}

	public function update_global_local_status()
	{
		if ($this->input->post() != "") {
			$global_id = $this->input->post("global_id");
			$global_ip_address_btn_status = $this->input->post("global_ip_address_btn_status");
			$user_role_id = $this->input->post("user_role_id");
			$staff_id = $this->input->post("staff_id");
			if ($global_ip_address_btn_status == 1) {
				$status = 2;
				$status_txt = "Local";
			} else if ($global_ip_address_btn_status == 2){
				$status = 1;
				$status_txt = "Global";
			}

			$this->db->trans_start();	//Start Transaction	
			$whereArr_check["master_global_ip_address.global_id"] = $global_id;
			$query_check = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_global_ip_address", $colNames =  "master_global_ip_address.global_id, master_global_ip_address.global_ip_address_btn_status, master_global_ip_address.fk_staff_id, master_global_ip_address.fk_user_role_id, master_global_ip_address.del_flag", $whereArr = $whereArr_check, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$check_result = $query_check["userData"];
			
			if(empty($check_result)){
				$add_arr[] = array(
					"global_ip_address_btn_status" => $status, //1:Global, 2:Local
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);

				$query = $this->Mquery_model_v3->addQuery($tableName = "master_global_ip_address", $add_arr, $return_type = "lastID");
				$global_id = $query["lastID"];
				$add_status = "Added";
			}else{
				$updateArr[] = array(
					"global_id" => $global_id,
					"global_ip_address_btn_status" => $status, //1:Global, 2:Local
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				if (!empty($global_id)) {
					$whereArr["master_global_ip_address.global_id"] = $global_id;
					$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_global_ip_address", $updateArr, $updateKey = "global_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
	
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_global_ip_address", $colNames =  "master_global_ip_address.global_id, master_global_ip_address.global_ip_address_btn_status, master_global_ip_address.fk_staff_id, master_global_ip_address.fk_user_role_id, master_global_ip_address.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
	
					$result = $query["userData"];
					$add_status = "Updated";
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while ".$add_status." ".$status_txt." Status.";
			} else {
				if(!empty($global_id)){
					$result["status"] = true;
					$result["userdata"] = $result;
					$result["message"] = $status_txt." Status is " . $add_status . " Successfully.";
				}
			}
			echo json_encode($result);
		}
	}

	public function check_ip_address()
	{
		$ip_address = $this->input->post('ip_address');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_ip_address", $colNames = "master_ip_address.ip_address_id, master_ip_address.ip_address, master_ip_address.ip_address_status, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.del_flag", $whereArr = array("master_ip_address.ip_address" => $ip_address), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_ip_address', 'This IP Address is already Exist.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_ip_address()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('ip_address', 'IP Address', 'trim|required|callback_check_ip_address');
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
		// $this->form_validation->set_rules('staff', 'Staff', 'trim|required');
		// $this->form_validation->set_rules('user_role', 'User Role', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"ip_address_err" => form_error("ip_address"),
				"user_name_err" => form_error("user_name"),
				// "staff_err" => form_error("staff"),
				// "user_role_err" => form_error("user_role"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$user_name = $this->security->xss_clean($this->input->post('user_name'));
				$ip_address = $this->security->xss_clean($this->input->post('ip_address'));
				$staff = $this->security->xss_clean($this->input->post('staff'));
				$user_role = $this->security->xss_clean($this->input->post('user_role'));
				
				$add_arr[] = array(
					'user_name' => $user_name,
					'ip_address' => $ip_address,
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					'create_date' => date("Y-m-d h:i:s")
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_ip_address", $add_arr, $return_type = "lastID");
				$ip_address_id = $query["lastID"];
				
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($ip_address_id != "") {
				$validator["status"] = true;
				$validator["message"] = "IP Address is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_ip_address()
	{
		$validator = array('status' => false, 'messages' => array());
		$ip_address_id = $this->input->post("ip_address_id");

		if ($ip_address_id != "") {
			$joins_main[] = array("tbl" => "staff", "condtn" => "master_ip_address.fk_staff_id = staff.staff_id", "type" => "left");
			$joins_main[] = array("tbl" => "user_roles", "condtn" => "master_ip_address.fk_user_role_id = user_roles.user_role_id", "type" => "left");
			$whereArr["master_ip_address.ip_address_id"] = $ip_address_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_ip_address", $colNames =  "master_ip_address.ip_address_id, master_ip_address.ip_address, master_ip_address.user_name, master_ip_address.ip_address_status, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.del_flag,user_roles.user_role_title,staff.staff_name", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}

		if (!empty($result)) {
			$validator["status"] = true;
			$validator["userdata"] = $result;
			$validator["message"] = "";
		} else {
			$validator["status"] = false;
			$validator["userdata"] = array();
			$validator["message"] = "Fatal Error: Contact Support:";
		}

		echo json_encode($validator);
	}

	public function update_ip_address()
	{
		$validator = array('status' => false, 'messages' => array());

		$ip_address_id = $this->security->xss_clean($this->input->post('ip_address_id'));
		$whereArr["master_ip_address.ip_address_id"] = $ip_address_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_ip_address", $colNames =  "master_ip_address.ip_address_id, master_ip_address.ip_address, master_ip_address.ip_address_status, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_ip_address = $result["ip_address"];
		$updated_ip_address = $this->input->post("ip_address");

		if ($current_ip_address != $updated_ip_address)
			$this->form_validation->set_rules('ip_address', 'IP Address', 'trim|required|callback_check_ip_address');
		else
			$this->form_validation->set_rules('ip_address', 'IP Address', 'trim|required');

		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
		// $this->form_validation->set_rules('staff', 'Staff', 'trim|required');
		// $this->form_validation->set_rules('user_role', 'User Role', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"ip_address_err" => form_error("ip_address"),
				"user_name_err" => form_error("user_name"),
				// "staff_err" => form_error("staff"),
				// "user_role_err" => form_error("user_role"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$ip_address_id = $this->security->xss_clean($this->input->post('ip_address_id'));
				$user_name = $this->security->xss_clean($this->input->post('user_name'));
				$ip_address = $this->security->xss_clean($this->input->post('ip_address'));
				$staff = $this->security->xss_clean($this->input->post('staff'));
				$user_role = $this->security->xss_clean($this->input->post('user_role'));

				$updateArr[] = array(
					'ip_address_id' => $ip_address_id,
					'user_name' => $user_name,
					'ip_address' => $ip_address,
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					'modify_dt' => date("Y-m-d h:i:s")
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_ip_address", $updateArr, $updateKey = "ip_address_id", $whereArr = array("ip_address_id", $ip_address_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($ip_address_id != "") {
				$validator["status"] = true;
				$validator["message"] = "IP Address is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_ip_address()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"ip_address_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_ip_address.ip_address_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_ip_address", $updateArr, $updateKey = "ip_address_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_ip_address", $colNames =  "master_ip_address.ip_address_id, master_ip_address.ip_address, master_ip_address.ip_address_status, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "IP Address Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing IP Address.";
			}
			echo json_encode($result);
		}
	}

	public function recover_ip_address()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"ip_address_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_ip_address.ip_address_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_ip_address", $updateArr, $updateKey = "ip_address_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_ip_address", $colNames =  "master_ip_address.ip_address_id, master_ip_address.ip_address, master_ip_address.ip_address_status, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "IP Address Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover IP Address.";
			}
			echo json_encode($result);
		}
	}

	public function filter_ip_add()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_user_name = $this->input->post("filter_user_name");
		$filter_ip_address = $this->input->post("filter_ip_address");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_ip_address.ip_address_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(master_ip_address.create_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_ip_address.create_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_ip_address.create_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(master_ip_address.create_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(master_ip_address.create_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(master_ip_address.create_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(master_ip_address.create_date,'%d')"] = $filter_day;
			}
			if (!empty($filter_user_name)){
				$likeCondtnArr["master_ip_address.user_name"] = $filter_user_name;
			}
			if (!empty($filter_ip_address)){
				// $whereArr["master_ip_address.ip_address"] = $filter_ip_address;
				$likeCondtnArr["master_ip_address.ip_address"] = $filter_ip_address;
			}
			if (!empty($filter_user_role))
				$whereArr["master_ip_address.fk_user_role_id"] = $filter_user_role;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active
				$whereArr["master_ip_address.ip_address_status"] = $filter_status;
			}

			$joins_main[] = array("tbl" => "staff", "condtn" => "master_ip_address.fk_staff_id = staff.staff_id", "type" => "left");
			$joins_main[] = array("tbl" => "user_roles", "condtn" => "master_ip_address.fk_user_role_id = user_roles.user_role_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_ip_address", $colNames =  "master_ip_address.ip_address_id, master_ip_address.ip_address, master_ip_address.user_name, master_ip_address.ip_address_status, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.del_flag,master_ip_address.create_date,user_roles.user_role_title,staff.staff_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_ip_add_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_ip_add_data"] = $total_ip_add_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_ip_add_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_ip_address_list()
	{
		$validator = array('status' => false, 'messages' => array());

		$joins_main[] = array("tbl" => "staff", "condtn" => "master_ip_address.fk_staff_id = staff.staff_id", "type" => "left");
		$joins_main[] = array("tbl" => "user_roles", "condtn" => "master_ip_address.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_ip_address", $colNames =  "master_ip_address.ip_address_id, master_ip_address.ip_address, master_ip_address.user_name, master_ip_address.ip_address_status, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.del_flag,user_roles.user_role_title,staff.staff_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("master_ip_address.ip_address_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_ip_add_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_ip_add_data"] = $total_ip_add_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_ip_add_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_ip_address_status()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$status = $this->input->post("status");
			if ($status == 0) {
				$status = 1;
				$status_txt = "Active";
			} else {
				$status = 0;
				$status_txt = "In-Active";
			}
			$updateArr[] = array(
				"ip_address_id" => $id,
				"ip_address_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_ip_address.ip_address_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_ip_address", $updateArr, $updateKey = "ip_address_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_ip_address", $colNames =  "master_ip_address.ip_address_id, master_ip_address.ip_address, master_ip_address.user_name, master_ip_address.ip_address_status, master_ip_address.fk_staff_id, master_ip_address.fk_user_role_id, master_ip_address.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "IP Address " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update IP Address Status.";
			}
			echo json_encode($result);
		}
	}

	// IP AddressSection End


}
