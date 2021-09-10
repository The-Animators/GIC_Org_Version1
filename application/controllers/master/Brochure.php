<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brochure extends CI_Controller
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
		$this->data["title"] = $title = "Prospectus / Brochure";
	}
	// Member Section Start

	// Member Section End


	// Prospectus / Brochure Document Section Start
	public function index()
	{
		$this->data["title"] = $title = "Prospectus / Brochure";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => "Prospectus / Brochure List",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/member/brochure_form";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_brochure_doc_list()
	{
		$this->data["title"] = $title = "Prospectus / Brochure";
		$validator = array('status' => false, 'messages' => array());
		$brochure_doc_list = array();
		$count_doc = "";
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_brochure_doc.fk_company_id = master_company.mcompany_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_brochure_doc.fk_department_id = master_department.department_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_brochure_doc.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");

		$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_brochure_doc", $colNames = "master_brochure_doc.brochure_doc_id, DATE(master_brochure_doc.brochure_date) as brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_reason, master_brochure_doc.brochure_doc_status, master_brochure_doc.brochure_doc_del_flag, master_brochure_doc.create_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("TIMESTAMP(master_brochure_doc.brochure_date)" => "DESC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$brochure_doc_list = $query2["userData"];
		$count_doc = count($brochure_doc_list);

		if (!empty($brochure_doc_list)) {
			$result["status"] = true;
			$result["userdata"] = $brochure_doc_list;
			$result["count_doc"] = $count_doc;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["count_doc"] = "";
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function remove_brochure_doc()
	{
		$this->data["title"] = $title = "Prospectus / Brochure";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"brochure_doc_id" => $id,
				"brochure_doc_del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_brochure_doc.brochure_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_brochure_doc", $updateArr, $updateKey = "brochure_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_brochure_doc", $colNames =  "master_brochure_doc.brochure_doc_id, DATE(master_brochure_doc.brochure_date) as brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_status, master_brochure_doc.brochure_doc_del_flag, master_brochure_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Prospectus / Brochure Documnet Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Prospectus / Brochure Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function recover_brochure_doc()
	{
		$this->data["title"] = $title = "Prospectus / Brochure";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"brochure_doc_id" => $id,
				"brochure_doc_del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_brochure_doc.brochure_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_brochure_doc", $updateArr, $updateKey = "brochure_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_brochure_doc", $colNames =   "master_brochure_doc.brochure_doc_id, DATE(master_brochure_doc.brochure_date) as brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_status, master_brochure_doc.brochure_doc_del_flag, master_brochure_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Prospectus / Brochure Documnet Recovered Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recovered Prospectus / Brochure Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function update_brochure_upload()
	{
		$this->data["title"] = $title = "Prospectus / Brochure";
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));

				$brochure_date = $this->security->xss_clean($this->input->post('brochure_date'));
				$brochure_doc_reason = $this->security->xss_clean($this->input->post('brochure_doc_reason'));
				$company_short_name = "";

				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				if (!empty($_FILES["brochure_upload"])) {
					$brochure_upload_data = $_FILES["brochure_upload"]["name"];
					$brochure_upload_img = $this->file_lib->file_upload($img_name = "brochure_upload", $directory_name = "./assets/plans_policy/prospectus_brochure/", $overwrite = False, $allowed_types = "pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($brochure_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["brochure_upload_err"] = $brochure_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($brochure_upload_img["file_name"] != "") {
						$brochure_upload_file_name = $brochure_upload_img["file_name"];
						$brochure_upload_file_size = $brochure_upload_img["file_size"];
						$brochure_upload_file_type = $brochure_upload_img["file_type"];
					}
				}

				if (!empty($brochure_date) && !empty($brochure_upload_file_name)) {
					$add_brochure_doc_arr[] = array(
						'fk_company_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'brochure_date' => $brochure_date . " " . date("h:i:s"),
						'brochure_upload' => $brochure_upload_file_name,
						'brochure_doc_reason' => $brochure_doc_reason,
						'create_date' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					// print_r($add_brochure_doc_arr);
					// die();
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_brochure_doc", $add_brochure_doc_arr, $return_type = "lastID");
					$brochure_doc_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	
			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "Prospectus / Brochure Documnet is Uploaded Successfully.";
			}
		}

		echo json_encode($validator);
	}
	// Prospectus / Brochure Document Section End

	//  One Pager Document Section Start
	public function one_pager()
	{
		$this->data["title"] = $title = "One Pager";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => "One Pager List",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/member/one_pager_form";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_one_pager_doc_list()
	{
		$this->data["title"] = $title = "One Pager";
		$validator = array('status' => false, 'messages' => array());
		$one_pager_doc_list = array();
		$count_doc = "";
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_one_pager_doc.fk_company_id = master_company.mcompany_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_one_pager_doc.fk_department_id = master_department.department_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_one_pager_doc.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");

		$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_one_pager_doc", $colNames = "master_one_pager_doc.one_pager_doc_id, DATE(master_one_pager_doc.one_pager_date) as one_pager_date, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_doc_reason, master_one_pager_doc.one_pager_doc_status, master_one_pager_doc.one_pager_doc_del_flag, master_one_pager_doc.create_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("TIMESTAMP(master_one_pager_doc.one_pager_date)" => "DESC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$one_pager_doc_list = $query2["userData"];
		$count_doc = count($one_pager_doc_list);

		if (!empty($one_pager_doc_list)) {
			$result["status"] = true;
			$result["userdata"] = $one_pager_doc_list;
			$result["count_doc"] = $count_doc;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["count_doc"] = "";
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function remove_one_pager_doc()
	{
		$this->data["title"] = $title = "One Pager";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"one_pager_doc_id" => $id,
				"one_pager_doc_del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_one_pager_doc.one_pager_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_one_pager_doc", $updateArr, $updateKey = "one_pager_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_one_pager_doc", $colNames =  "master_one_pager_doc.one_pager_doc_id, DATE(master_one_pager_doc.one_pager_date) as one_pager_date, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_doc_status, master_one_pager_doc.one_pager_doc_del_flag, master_one_pager_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "One Pager Documnet Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing One Pager Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function recover_one_pager_doc()
	{
		$this->data["title"] = $title = "One Pager";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"one_pager_doc_id" => $id,
				"one_pager_doc_del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_one_pager_doc.one_pager_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_one_pager_doc", $updateArr, $updateKey = "one_pager_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_one_pager_doc", $colNames =   "master_one_pager_doc.one_pager_doc_id, DATE(master_one_pager_doc.one_pager_date) as one_pager_date, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_doc_status, master_one_pager_doc.one_pager_doc_del_flag, master_one_pager_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "One Pager Documnet Recovered Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recovered One Pager Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function update_one_pager_upload()
	{
		$this->data["title"] = $title = "One Pager";
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));

				$one_pager_date = $this->security->xss_clean($this->input->post('one_pager_date'));
				$one_pager_doc_reason = $this->security->xss_clean($this->input->post('one_pager_doc_reason'));
				$company_short_name = "";

				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				if (!empty($_FILES["one_pager_upload"])) {
					$one_pager_upload_data = $_FILES["one_pager_upload"]["name"];
					$one_pager_upload_img = $this->file_lib->file_upload($img_name = "one_pager_upload", $directory_name = "./assets/plans_policy/prospectus_one_pager/", $overwrite = False, $allowed_types = "pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($one_pager_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["one_pager_upload_err"] = $one_pager_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($one_pager_upload_img["file_name"] != "") {
						$one_pager_upload_file_name = $one_pager_upload_img["file_name"];
						$one_pager_upload_file_size = $one_pager_upload_img["file_size"];
						$one_pager_upload_file_type = $one_pager_upload_img["file_type"];
					}
				}

				if (!empty($one_pager_date) && !empty($one_pager_upload_file_name)) {
					$add_one_pager_doc_arr[] = array(
						'fk_company_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'one_pager_date' => $one_pager_date . " " . date("h:i:s"),
						'one_pager_upload' => $one_pager_upload_file_name,
						'one_pager_doc_reason' => $one_pager_doc_reason,
						'create_date' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					// print_r($add_one_pager_doc_arr);
					// die();
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_one_pager_doc", $add_one_pager_doc_arr, $return_type = "lastID");
					$one_pager_doc_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	
			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "One Pager Documnet is Uploaded Successfully.";
			}
		}

		echo json_encode($validator);
	}
	//  One Pager Document Section End

	public function download_all_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Policy Wording , 2:Claims Form ,3 : Circular Upload
		$this->data["doc_id"] = $doc_id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		if (!empty($doc_name) || !empty($doc_name)) {
			if ($doc_type == 1)
				$document_file = $doc_name;
			elseif ($doc_type == 2)
				$document_file = $doc_name;
			elseif ($doc_type == 3)
				$document_file = $doc_name;
		}

		$this->load->helper('download');

		if ($document_file != "") {
			if ($doc_type == 1)
				$data = file_get_contents("./assets/plans_policy/prospectus_brochure/" . $document_file);
			elseif ($doc_type == 2)
				$data = file_get_contents("./assets/plans_policy/claim_upload/" . $document_file);
			elseif ($doc_type == 3)
				$data = file_get_contents("./assets/plans_policy/brochure_upload/" . $document_file);
		}

		force_download($document_file, $data);
	}

	public function view_all_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Policy Wording , 2:Claims Form ,3 : Circular Upload
		$this->data["doc_id"] = $doc_id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);
		// print_r($doc_name);
		// die("Test");
		if (!empty($doc_name) || !empty($doc_name)) {
			if ($doc_type == 1) {
				$document_file = $doc_name;
				$extension = pathinfo("assets/plans_policy/prospectus_brochure/" . $document_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/plans_policy/prospectus_brochure/" . $document_file);
			} elseif ($doc_type == 2) {
				$document_file = $doc_name;
				$file = file_get_contents("./assets/plans_policy/claim_upload/" . $document_file);
				$extension = pathinfo("assets/plans_policy/claim_upload/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 3) {
				$document_file = $doc_name;
				$file = file_get_contents("./assets/plans_policy/brochure_upload/" . $document_file);
				$extension = pathinfo("assets/plans_policy/brochure_upload/" . $document_file, PATHINFO_EXTENSION);
			}
			// print_r($doc_name);
			// die("Test");
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}
}
