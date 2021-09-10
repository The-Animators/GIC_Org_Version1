<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_policy extends Admin_gic_core
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
		$this->data["title"] = $title = "Sub Policy Name";
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
	}
	// Sub Policy Name Section Start

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

		$this->data["main_page"] = "master/policy/sub_policy";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function view()
	{
		$this->data["view"] = $view = $this->uri->segment(3);
		// print_r( $view);die();
		$this->data["company_id"] = $company_id = $this->uri->segment(4);
		$this->data["policy_name_id"] = $policy_name_id = $this->uri->segment(5);
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"],
			"breadcrumb_url" => base_url() . "master/sub_policy/",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/policy/view_sub_policy";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_sub_policy_name()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('sub_policy_name', 'Sub Policy Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"sub_policy_name_err" => form_error("sub_policy_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));
				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				$sub_policy_name = $this->security->xss_clean($this->input->post('sub_policy_name'));

				$family_size_type = $this->security->xss_clean($this->input->post('family_size_type'));
				$add_of_child_type = $this->security->xss_clean($this->input->post('add_of_child_type'));
				$family_size_json = $this->security->xss_clean($this->input->post('family_size_json'));
				$add_of_child_json = $this->security->xss_clean($this->input->post('add_of_child_json'));

				if ($family_size_json == "undefined")
					$family_size_json = json_encode([]);
				if ($add_of_child_json == "undefined")
					$add_of_child_json = json_encode([]);

				$add_arr[] = array(
					'fk_company_id' => $company,
					'fk_department_id' => $department,
					'fk_policy_type_id' => $policy_name,
					'policy_type' => $policy_type,
					'sub_policy_name' => $sub_policy_name,
					'family_size_type' => $family_size_type,
					'add_of_child_type' => $add_of_child_type,
					'family_size_json' => $family_size_json,
					'add_of_child_json' => $add_of_child_json,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);

				$query = $this->Mquery_model_v3->addQuery($tableName = "master_sub_policy_name", $add_arr, $return_type = "lastID");
				$sub_policy_name_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($sub_policy_name_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Sub Policy Name is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_sub_policy_name()
	{
		$validator = array('status' => false, 'messages' => array());
		$sub_policy_name_id = $this->input->post("sub_policy_name_id");

		if ($sub_policy_name_id != "") {

			$joins_main_1[] = array("tbl" => "master_company", "condtn" => "master_sub_policy_name.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_department", "condtn" => "master_sub_policy_name.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_policy_type", "condtn" => "master_sub_policy_name.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =   "master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.sub_policy_name, master_sub_policy_name.family_size_type, master_sub_policy_name.add_of_child_type, master_sub_policy_name.family_size_json, master_sub_policy_name.add_of_child_json, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.policy_type, master_sub_policy_name.sub_policy_name_status, master_sub_policy_name.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = array("master_sub_policy_name.sub_policy_name_id" => $sub_policy_name_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_1, $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
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

	public function update_sub_policy_name()
	{
		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('sub_policy_name', 'Sub Policy Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"sub_policy_name_err" => form_error("sub_policy_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {

				$sub_policy_name_id = $this->security->xss_clean($this->input->post('sub_policy_name_id'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));
				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				$sub_policy_name = $this->security->xss_clean($this->input->post('sub_policy_name'));

				$family_size_type = $this->security->xss_clean($this->input->post('family_size_type'));
				$add_of_child_type = $this->security->xss_clean($this->input->post('add_of_child_type'));
				$family_size_json = $this->security->xss_clean($this->input->post('family_size_json'));
				$add_of_child_json = $this->security->xss_clean($this->input->post('add_of_child_json'));

				if ($family_size_json == "undefined")
					$family_size_json = json_encode([]);
				if ($add_of_child_json == "undefined")
					$add_of_child_json = json_encode([]);

				if (!empty($sub_policy_name_id)) {
					$updateArr[] = array(
						'sub_policy_name_id' => $sub_policy_name_id,
						'fk_company_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'policy_type' => $policy_type,
						'sub_policy_name' => $sub_policy_name,
						'family_size_type' => $family_size_type,
						'add_of_child_type' => $add_of_child_type,
						'family_size_json' => $family_size_json,
						'add_of_child_json' => $add_of_child_json,
						'modify_dt' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					// print_r($updateArr);
					// die();
					$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_policy_name", $updateArr, $updateKey = "sub_policy_name_id", $whereArr = array("sub_policy_name_id", $sub_policy_name_id), $likeCondtnArr = array(), $whereInArray = array());
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($sub_policy_name_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Sub Policy Name is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function delete_sub_policy()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");

			if ($id != "") {
				$query = $this->Mquery_model_v3->deleteQuery($tableName = "master_sub_policy_name", $whereArr = array("master_sub_policy_name.sub_policy_name_id" => $id));

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =  "master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.fk_document_id, master_sub_policy_name.policy_type, master_sub_policy_name.sub_policy_name_status, master_sub_policy_name.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub Policy Name Deleted Permanently Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Deletinging Permanently Sub Policy Name.";
			}
			echo json_encode($result);
		}
	}

	public function remove_sub_policy_name()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"sub_policy_name_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_sub_policy_name.sub_policy_name_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_policy_name", $updateArr, $updateKey = "sub_policy_name_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =  "master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.policy_type, master_sub_policy_name.sub_policy_name_status, master_sub_policy_name.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub Policy Name Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Sub Policy Name.";
			}
			echo json_encode($result);
		}
	}

	public function recover_sub_policy_name()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"sub_policy_name_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_sub_policy_name.sub_policy_name_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_policy_name", $updateArr, $updateKey = "sub_policy_name_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =  "master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.policy_type, master_sub_policy_name.sub_policy_name_status, master_sub_policy_name.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub Policy Name Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover Sub Policy Name.";
			}
			echo json_encode($result);
		}
	}

	public function update_sub_policy_name_status()
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
				"sub_policy_name_id" => $id,
				"sub_policy_name_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_sub_policy_name.sub_policy_name_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_policy_name", $updateArr, $updateKey = "sub_policy_name_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =  "master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.policy_type, master_sub_policy_name.sub_policy_name_status, master_sub_policy_name.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub Policy Name " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Sub Policy Name Status.";
			}
			echo json_encode($result);
		}
	}

	public function filter_sub_policy_name_list()
	{
		$filter_company = $this->input->post("filter_company");
		$filter_department = $this->input->post("filter_department");
		$filter_policy_name = $this->input->post("filter_policy_name");
		$filter_policy_type = $this->input->post("filter_policy_type");
		$filter_sub_policy = $this->input->post("filter_sub_policy");
		$filter_family_size_type = $this->input->post("filter_family_size_type");
		$filter_child_type = $this->input->post("filter_child_type");
		$filter_status = $this->input->post("filter_status");
		$company_id = $this->input->post("company_id");
		$policy_name_id = $this->input->post("policy_name_id");
		$view = $this->input->post("view");

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {

			if ($view == "view") {
				$groupByArr = array();
				$whereArr = array("master_sub_policy_name.fk_company_id" => $company_id);
				$whereArr["master_sub_policy_name.fk_policy_type_id"] = $policy_name_id;
				// if (!empty($filter_company))
				// 	$whereArr["master_sub_policy_name.fk_company_id"] = $filter_company;
				if (!empty($filter_department))
					$whereArr["master_sub_policy_name.fk_department_id"] = $filter_department;
				// if (!empty($filter_policy_name))
				// 	$whereArr["master_sub_policy_name.fk_policy_type_id"] = $filter_policy_name;
				if (!empty($filter_policy_type))
					$whereArr["master_sub_policy_name.policy_type"] = $filter_policy_type;
				if (!empty($filter_sub_policy))
					$likeCondtnArr["master_sub_policy_name.sub_policy_name"] = $filter_sub_policy;
				if (!empty($filter_family_size_type))
					$whereArr["master_sub_policy_name.family_size_type"] = $filter_family_size_type;
				if (!empty($filter_child_type))
					$whereArr["master_sub_policy_name.add_of_child_type"] = $filter_child_type;
				if (!empty($filter_status)) {
					if ($filter_status == 1)
						$filter_status = 1; // Active
					else if ($filter_status == 2)
						$filter_status = 0; // In-Active

					$whereArr["master_sub_policy_name.sub_policy_name_status"] = $filter_status;
				}
			} else {
				if (!empty($filter_company))
					$whereArr["master_sub_policy_name.fk_company_id"] = $filter_company;
				if (!empty($filter_department))
					$whereArr["master_sub_policy_name.fk_department_id"] = $filter_department;
				if (!empty($filter_policy_name))
					$whereArr["master_sub_policy_name.fk_policy_type_id"] = $filter_policy_name;
					
				$groupByArr = array("master_sub_policy_name.fk_company_id");
			}
			$result2 = array();
			$total_policy = "";
			if ($view != "view") {
				$joins_main[] = array("tbl" => "master_company", "condtn" => "master_sub_policy_name.fk_company_id = master_company.mcompany_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_department", "condtn" => "master_sub_policy_name.fk_department_id = master_department.department_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_sub_policy_name.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =   "count(master_sub_policy_name.sub_policy_name_id) as total_policy,master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.policy_type ,master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name ,master_sub_policy_name.sub_policy_name ,master_sub_policy_name.family_size_type ,master_sub_policy_name.add_of_child_type ,master_sub_policy_name.family_size_json ,master_sub_policy_name.add_of_child_json", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$result2 = $query["userData"];
			} else {
				$joins_main[] = array("tbl" => "master_company", "condtn" => "master_sub_policy_name.fk_company_id = master_company.mcompany_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_department", "condtn" => "master_sub_policy_name.fk_department_id = master_department.department_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_sub_policy_name.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =   "master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.sub_policy_name, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.policy_type, master_sub_policy_name.sub_policy_name_status, master_sub_policy_name.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name, master_sub_policy_name.policy_type ,master_sub_policy_name.family_size_type ,master_sub_policy_name.add_of_child_type ,master_sub_policy_name.family_size_json ,master_sub_policy_name.add_of_child_json", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$result2 = $query["userData"];
			}
			$total_sub_policy_data = count($result2);
		}
		

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_policy"] = $total_policy;
			$result["total_sub_policy_data"] = $total_sub_policy_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["userdata"] = "";
			$result["userdata"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_sub_policy_name_list()
	{
		$view = $this->uri->segment(4);
		$company_id = $this->uri->segment(5);
		// $department_id = $this->uri->segment(6);
		$policy_name_id = $this->uri->segment(6);
		// $policy_type = $this->uri->segment(7);
		if ($view == "view") {
			$groupByArr = array();
			$whereArr = array("master_sub_policy_name.fk_company_id" => $company_id);
			// $whereArr["master_sub_policy_name.policy_type"]=$department_id;
			// $whereArr["master_sub_policy_name.fk_policy_type_id"] = $policy_name_id;
			// $whereArr["master_sub_policy_name.policy_type"]=$policy_type;
		} else {
			$groupByArr = array("master_sub_policy_name.fk_company_id");
			// $groupByArr = array("master_sub_policy_name.fk_policy_type_id");
			// $groupByArr = array("master_sub_policy_name.policy_type");
			$whereArr = array();
		}

		$validator = array('status' => false, 'messages' => array());
		$result2 = array();
		$total_policy = "";
		if ($view != "view") {
			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_sub_policy_name.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "master_sub_policy_name.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_sub_policy_name.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =   "count(master_sub_policy_name.sub_policy_name_id) as total_policy,master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.policy_type ,master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name ,master_sub_policy_name.sub_policy_name ,master_sub_policy_name.family_size_type ,master_sub_policy_name.add_of_child_type ,master_sub_policy_name.family_size_json ,master_sub_policy_name.add_of_child_json", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
		} else {
			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_sub_policy_name.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "master_sub_policy_name.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_sub_policy_name.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_policy_name", $colNames =   "master_sub_policy_name.sub_policy_name_id, master_sub_policy_name.sub_policy_name, master_sub_policy_name.fk_company_id, master_sub_policy_name.fk_department_id, master_sub_policy_name.fk_policy_type_id, master_sub_policy_name.policy_type, master_sub_policy_name.sub_policy_name_status, master_sub_policy_name.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name, master_sub_policy_name.policy_type ,master_sub_policy_name.family_size_type ,master_sub_policy_name.add_of_child_type ,master_sub_policy_name.family_size_json ,master_sub_policy_name.add_of_child_json", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
		}
		$total_sub_policy_data = count($result2);
		// print_r($view);
		// echo $this->db->last_query();
		// die();

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_policy"] = $total_policy;
			$result["total_sub_policy_data"] = $total_sub_policy_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["userdata"] = "";
			$result["userdata"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	// Sub Policy Name Section End

}
