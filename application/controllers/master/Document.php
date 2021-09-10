<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends Admin_gic_core
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
	// document Section Start
	public function check_document_name()
	{
		$document_name = $this->input->post('document_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames = "master_document.document_id, master_document.document_name, master_document.document_status, master_document.del_flag", $whereArr = array("master_document.document_name" => $document_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_document_name', 'This Document is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_document()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('document_name', 'document', 'trim|required|callback_check_document_name');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"document_name_err" => form_error("document_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$document_name = $this->security->xss_clean($this->input->post('document_name'));
				
				$add_arr[] = array(
					'document_name' => $document_name,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_document", $add_arr, $return_type = "lastID");
				$document_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($document_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Document is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_document()
	{
		$validator = array('status' => false, 'messages' => array());
		$document_id = $this->input->post("document_id");

		if ($document_id != "") {
			$whereArr["master_document.document_id"] = $document_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames =  "master_document.document_id, master_document.document_name, master_document.document_status, master_document.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// print_r($document_id);
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

	public function update_document()
	{
		$validator = array('status' => false, 'messages' => array());

		$document_id = $this->security->xss_clean($this->input->post('document_id'));
		$whereArr["master_document.document_id"] = $document_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames =  "master_document.document_id, master_document.document_name, master_document.document_status, master_document.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_document_name = $result["document_name"];
		$updated_document_name = $this->input->post("document_name");
		$sub_menu = $this->security->xss_clean($this->input->post('sub_menu'));

		if ($current_document_name != $updated_document_name)
			$this->form_validation->set_rules('document_name', 'document', 'trim|required|callback_check_document_name');
		else
			$this->form_validation->set_rules('document_name', 'document', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"document_name_err" => form_error("document_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$document_id = $this->security->xss_clean($this->input->post('document_id'));
				$document_name = $this->security->xss_clean($this->input->post('document_name'));

				$updateArr[] = array(
					'document_id' => $document_id,
					'document_name' => $document_name,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_document", $updateArr, $updateKey = "document_id", $whereArr = array("document_id", $document_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($document_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Document is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_document()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"document_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_document.document_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_document", $updateArr, $updateKey = "document_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames =  "master_document.document_id, master_document.document_name, master_document.document_status, master_document.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Document Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Document.";
			}
			echo json_encode($result);
		}
	}

	public function recover_document()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"document_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_document.document_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_document", $updateArr, $updateKey = "document_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames =  "master_document.document_id, master_document.document_name, master_document.document_status, master_document.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Document Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover Document.";
			}
			echo json_encode($result);
		}
	}
	public function index()
	{
		$this->data["title"] = $title = "document";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => ucfirst($title),
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/document/document";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_document_list()
	{
		$filter_doc_name = $this->input->post("filter_doc_name");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_document.document_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {

			if (!empty($filter_doc_name))
				$likeCondtnArr["master_document.document_name"] = $filter_doc_name;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_document.document_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames =  "master_document.document_id, master_document.document_name, master_document.document_status, master_document.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("master_document.document_name"=>"ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_document_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_document_data"] = $total_document_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_document_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_document_list()
	{
		$validator = array('status' => false, 'messages' => array());

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames =  "master_document.document_id, master_document.document_name, master_document.document_status, master_document.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_document.document_name"=>"ASC"), $groupByArr = array("master_document.document_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_document_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_document_data"] = $total_document_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_document_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_document_status()
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
				"document_id" => $id,
				"document_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_document.document_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_document", $updateArr, $updateKey = "document_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames =  "master_document.document_id, master_document.document_name, master_document.document_status, master_document.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Document " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Document Status.";
			}
			echo json_encode($result);
		}
	}
	// document Section End





}
