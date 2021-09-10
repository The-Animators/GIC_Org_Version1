<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Description_policy extends Admin_gic_core
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

	public function add_policy_description()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('description_name', 'Description Name', 'trim|required|callback_check_description_name');


		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"description_name_err" => form_error("description_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$description_name = $this->security->xss_clean($this->input->post('description_name'));

				$add_arr[] = array(
					'policy_description_name' => $description_name,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_policy_description", $add_arr, $return_type = "lastID");
				$policy_description_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($policy_description_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Description is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function get_policy_description()
	{
		$validator = array('status' => false, 'messages' => array());

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =  "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$risk_description = $query["userData"];

		if (!empty($risk_description)) {
			$result["status"] = true;
			$result["userdata"] = $risk_description;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function check_description_name()
	{
		$description_name = $this->input->post('description_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames = "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr = array("master_policy_description.policy_description_name" => $description_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_description_name', 'This Description is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function edit_policy_description()
	{
		$validator = array('status' => false, 'messages' => array());
		$policy_description_id = $this->input->post("policy_description_id");

		if ($policy_description_id != "") {
			$whereArr["master_policy_description.policy_description_id"] = $policy_description_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =  "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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

	public function update_policy_description()
	{
		$validator = array('status' => false, 'messages' => array());

		$policy_description_id = $this->security->xss_clean($this->input->post('policy_description_id'));
		$whereArr["master_policy_description.policy_description_id"] = $policy_description_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =  "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_description_name = $result["policy_description_name"];
		$updated_description_name = $this->input->post("description_name");

		if ($current_description_name != $updated_description_name)
			$this->form_validation->set_rules('description_name', 'Description Name', 'trim|required|callback_check_description_name');
		else
			$this->form_validation->set_rules('description_name', 'Description Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"description_name_err" => form_error("description_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$policy_description_id = $this->security->xss_clean($this->input->post('policy_description_id'));
				$description_name = $this->security->xss_clean($this->input->post('description_name'));

				$updateArr[] = array(
					'policy_description_id' => $policy_description_id,
					'policy_description_name' => $description_name,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_policy_description", $updateArr, $updateKey = "policy_description_id", $whereArr = array("policy_description_id", $policy_description_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($policy_description_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Description is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_department()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"policy_description_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_policy_description.policy_description_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_policy_description", $updateArr, $updateKey = "policy_description_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =   "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Description Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Description.";
			}
			echo json_encode($result);
		}
	}

	public function recover_department()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"policy_description_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_policy_description.policy_description_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_policy_description", $updateArr, $updateKey = "policy_description_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =  "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Description Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Description Status.";
			}
			echo json_encode($result);
		}
	}
	public function index()
	{
		$this->data["title"] = $title = "Description";
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

	public function get_policy_description_list()
	{
		$validator = array('status' => false, 'messages' => array());

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =  "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];
		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_policy_description_status()
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
				"policy_description_id" => $id,
				"policy_description_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_policy_description.policy_description_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_policy_description", $updateArr, $updateKey = "policy_description_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =  "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Description " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Description Status.";
			}
			echo json_encode($result);
		}
	}
	// Department Section End





}
