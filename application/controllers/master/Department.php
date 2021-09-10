<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends Admin_gic_core
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
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
	}
	// Department Section Start
	public function check_department_name()
	{
		$department_name = $this->input->post('department_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames = "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr = array("master_department.department_name" => $department_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_department_name', 'This Department is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_department()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('department_name', 'Department', 'trim|required|callback_check_department_name');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"department_name_err" => form_error("department_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$department_name = $this->security->xss_clean($this->input->post('department_name'));
				
				$add_arr[] = array(
					'department_name' => $department_name,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_department", $add_arr, $return_type = "lastID");
				$department_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($department_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Department is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_department()
	{
		$validator = array('status' => false, 'messages' => array());
		$department_id = $this->input->post("department_id");

		if ($department_id != "") {
			$whereArr["master_department.department_id"] = $department_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// print_r($department_id);
		// print_r($result);
		// die("Test 121");
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

	public function update_department()
	{
		$validator = array('status' => false, 'messages' => array());

		$department_id = $this->security->xss_clean($this->input->post('department_id'));
		$whereArr["master_department.department_id"] = $department_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_department_name = $result["department_name"];
		$updated_department_name = $this->input->post("department_name");
		$sub_menu = $this->security->xss_clean($this->input->post('sub_menu'));

		if ($current_department_name != $updated_department_name)
			$this->form_validation->set_rules('department_name', 'Department', 'trim|required|callback_check_department_name');
		else
			$this->form_validation->set_rules('department_name', 'Department', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"department_name_err" => form_error("department_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$department_id = $this->security->xss_clean($this->input->post('department_id'));
				$department_name = $this->security->xss_clean($this->input->post('department_name'));

				$updateArr[] = array(
					'department_id' => $department_id,
					'department_name' => $department_name,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_department", $updateArr, $updateKey = "department_id", $whereArr = array("department_id", $department_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($department_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Department is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_department()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"department_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_department.department_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_department", $updateArr, $updateKey = "department_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Department Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Department.";
			}
			echo json_encode($result);
		}
	}

	public function recover_department()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"department_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_department.department_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_department", $updateArr, $updateKey = "department_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Department Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Department Status.";
			}
			echo json_encode($result);
		}
	}
	public function index()
	{
		$this->data["title"] = $title = "Department";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/department/department";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_department_list()
	{
		$filter_department_name = $this->input->post("filter_department_name");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_department.department_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_department_name))
				$likeCondtnArr["master_department.department_name"] = $filter_department_name;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_department.department_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("master_department.department_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_department_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_department_data"] = $total_department_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_department_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_department_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$groupByArr = array(
			"master_department.department_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_department.department_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_department_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_department_data"] = $total_department_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_department_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_department_status()
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
				"department_id" => $id,
				"department_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_department.department_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_department", $updateArr, $updateKey = "department_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Department " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Department Status.";
			}
			echo json_encode($result);
		}
	}
	// Department Section End





}
