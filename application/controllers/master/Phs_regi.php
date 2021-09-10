<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Phs_regi extends Admin_gic_core
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
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "date_picker");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "date_picker");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";

		$this->data["title"] = $title = "PHS Register";
	}
	// PHS Register Master Section Start
	public function filter_phs_regi_list()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_serial_no = $this->input->post("filter_serial_no");
		$filter_policy_no = $this->input->post("filter_policy_no");
		$filter_branch_code = $this->input->post("filter_branch_code");
		$filter_receipt_no = $this->input->post("filter_receipt_no");
		$filter_due_date = $this->input->post("filter_due_date");
		$filter_holder_type = $this->input->post("filter_holder_type");
		$filter_company_type = $this->input->post("filter_company_type");
		$filter_policy_holder = $this->input->post("filter_policy_holder");
		$filter_company = $this->input->post("filter_company");
		
		$groupByArr = array(
			"phs_regi_master.phs_regi_id",
		);

		$result2 = array();
		$likeCondtnArr = array();
		// $whereArr = array();
		// $whereArr["DATE_FORMAT(phs_regi_master.create_date,'%m-%Y')"] = date("m-Y");
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(phs_regi_master.create_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(phs_regi_master.create_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(phs_regi_master.create_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(phs_regi_master.create_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(phs_regi_master.create_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(phs_regi_master.create_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(phs_regi_master.create_date,'%d')"] = $filter_day;
			}

			if (!empty($filter_serial_no))
				$likeCondtnArr["phs_regi_master.serial_no"] = $filter_serial_no;

			if (!empty($filter_policy_no))
				$likeCondtnArr["phs_regi_master.policy_no"] = $filter_policy_no;

			if (!empty($filter_branch_code))
				$likeCondtnArr["phs_regi_master.branch_code"] = $filter_branch_code;

			if (!empty($filter_receipt_no))
				$likeCondtnArr["phs_regi_master.receipt_no"] = $filter_receipt_no;

			if (!empty($filter_due_date))
				$whereArr["DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y')"] = $filter_due_date;
			// $whereArr["DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y')"] = date("Y-m-d", strtotime($filter_due_date));

			if (!empty($filter_holder_type))
				$whereArr["phs_regi_master.holder_type"] = $filter_holder_type;
			if (!empty($filter_company_type))
				$whereArr["phs_regi_master.company_type"] = $filter_company_type;

			if (!empty($filter_policy_holder)) {
				if (!empty($filter_holder_type)) {
					if ($filter_holder_type == "System") {
						$whereArr["phs_regi_master.policy_holder_id"] = $filter_policy_holder;
					} elseif ($filter_holder_type == "Manual") {
						$likeCondtnArr["phs_regi_master.policy_holder"] = $filter_policy_holder;
					}
				} else {
					$likeCondtnArr["phs_regi_master.policy_holder"] = $filter_policy_holder;
				}
			}

			if (!empty($filter_company)) {
				if (!empty($filter_company_type)) {
					if ($filter_company_type == "System") {
						$whereArr["phs_regi_master.company_id"] = $filter_company;
					} elseif ($filter_company_type == "Manual") {
						$likeCondtnArr["phs_regi_master.fk_company_id"] = $filter_company;
					}
				} else {
					$likeCondtnArr["phs_regi_master.fk_company_id"] = $filter_company;
				}
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames =  "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_id, phs_regi_master.policy_holder_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc,DATE_FORMAT(phs_regi_master.create_date,'%d-%m-%Y') as create_date, DATE_FORMAT(phs_regi_master.modify_dt,'%d-%m-%Y') as modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_phs_regi_data = count($result2);
		}
		// print_r($this->input->post());
		// echo $this->db->last_query();die();

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_phs_regi_data"] = $total_phs_regi_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_phs_regi_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function check_serial_no()
	{
		$serial_no = $this->input->post('serial_no');

		if ($serial_no == "") {
			$this->form_validation->set_message('check_serial_no', 'The Policy No. field is required.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function check_serial_no_isexist()
	{
		$serial_no = $this->input->post('serial_no');
		if ($serial_no == "")
			return TRUE;

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames = "phs_regi_master.phs_regi_id, phs_regi_master.serial_no", $whereArr = array("phs_regi_master.serial_no" => $serial_no), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];
		$serial_no = "";
		if (!empty($result))
			$serial_no = $result["serial_no"];
		if ($result) {
			$this->form_validation->set_message('check_serial_no_isexist', 'This Serial No is already Used for Current System. <span class="text-success">' . $serial_no . '</span>');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function get_last_serial_no()
	{
		$serial_no_counter = $this->db->query('SELECT MAX(CONVERT(serial_no_counter, SIGNED INTEGER)) as serial_no_counter FROM phs_regi_master order by serial_no_counter desc')->row()->serial_no_counter;
		// print_r($maxid );
		// die();
		return $serial_no_counter;
	}

	public function get_serial_no_counter()
	{
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$this->load->model("Mcommon");
			$counter = $this->Mcommon->get_last_counter($table_name = "phs_regi_master", $id = "phs_regi_id", $counter_col_name = "serial_no_counter");
			if (!empty($counter))
				$counter_no = $counter["serial_no_counter"];
			else
				$counter_no = "";
			// print_r($counter_no);die();
			if (!empty($counter)) {
				$result["status"] = true;
				$result["userdata"] = $counter;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function add_phs_regi()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('serial_no', 'Serial No.', 'trim|required|callback_check_serial_no|callback_check_serial_no_isexist');
		$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|required');
		$this->form_validation->set_rules('policy_holder', 'Policy Holder', 'trim|required');
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('receipt_no', 'Receipt No.', 'trim');
		$this->form_validation->set_rules('due_date', 'Due Date', 'trim');
		$this->form_validation->set_rules('ammount', 'Ammount', 'trim');
		$this->form_validation->set_rules('purpose_of_send', 'Purpose Of Sending', 'trim');
		$this->form_validation->set_rules('document', 'Types Of Document', 'trim');
		$this->form_validation->set_rules('remark', 'Remark', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"serial_no_err" => form_error("serial_no"),
				"policy_no_err" => form_error("policy_no"),
				"policy_holder_err" => form_error("policy_holder"),
				"company_err" => form_error("company"),
				"receipt_no_err" => form_error("receipt_no"),
				"due_date_err" => form_error("due_date"),
				"ammount_err" => form_error("ammount"),
				"purpose_of_send_err" => form_error("purpose_of_send"),
				"document_err" => form_error("document"),
				"remark_err" => form_error("remark"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$serial_no = $this->security->xss_clean($this->input->post('serial_no'));
				$serial_no_counter = $this->security->xss_clean($this->input->post('serial_no_counter'));
				$policy_no = $this->security->xss_clean($this->input->post('policy_no'));
				$policy_holder = $this->security->xss_clean($this->input->post('policy_holder'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$receipt_no = $this->security->xss_clean($this->input->post('receipt_no'));
				$due_date = $this->security->xss_clean($this->input->post('due_date'));
				$due_date = date("Y-m-d", strtotime($due_date));
				$ammount = $this->security->xss_clean($this->input->post('ammount'));
				$purpose_of_send = $this->security->xss_clean($this->input->post('purpose_of_send'));
				$document = $this->security->xss_clean($this->input->post('document'));
				$remark = $this->security->xss_clean($this->input->post('remark'));

				$branch_code = $this->security->xss_clean($this->input->post('branch_code'));
				$holder_type = $this->security->xss_clean($this->input->post('holder_type'));
				$company_type = $this->security->xss_clean($this->input->post('company_type'));

				// $serial_no_counter = $this->get_last_serial_no();

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name", $whereArr = array("master_company.mcompany_id" => $company), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$company_result = $query["userData"];

				if ($holder_type == "Manual") {
					$policy_holder = $policy_holder;
					$policy_holder_id = "";
				} elseif ($holder_type == "System") {
					$policy_holder_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS name", $whereArr = array("customermem_tbl.id" => $policy_holder), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$policy_holder_result = $policy_holder_query["userData"];
					$policy_holder = $policy_holder_result["name"];
					$policy_holder_id = $policy_holder_result["id"];
				}

				if ($company_type == "Manual") {
					$company = $company;
					$company_id = "";
				} elseif ($company_type == "System") {
					$company_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name", $whereArr = array("master_company.mcompany_id" => $company), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$company_name_result = $company_name_query["userData"];
					$company = $company_name_result["company_name"];
					$company_id = $company_name_result["mcompany_id"];
				}

				if (!empty($company_result))
					$company_short_code = $company_result["short_name"];
				else
					$company_short_code = "";

				$receipt_doc_file_name = "";
				$final_doc_file_name = "";

				if (!empty($_FILES["receipt_doc"])) {
					$receipt_doc_data = $_FILES["receipt_doc"]["name"];

					$receipt_doc_img = $this->file_lib->file_upload($img_name = "receipt_doc", $directory_name = "./assets/phs_register_doc/receipt_doc/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = "serial_no_" . $serial_no . "-" . "policy_no_" . $policy_no . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

					if ($receipt_doc_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["receipt_doc_err"]  = $receipt_doc_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($receipt_doc_img["file_name"] != "") {
						$receipt_doc_file_name = $receipt_doc_img["file_name"];
						$receipt_doc_file_size = $receipt_doc_img["file_size"];
						$receipt_doc_file_type = $receipt_doc_img["file_type"];
					}
				}

				if (!empty($_FILES["final_doc"])) {
					$final_doc_data = $_FILES["final_doc"]["name"];
					$final_doc_img = $this->file_lib->file_upload($img_name = "final_doc", $directory_name = "./assets/phs_register_doc/final_doc/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = "serial_no_" . $serial_no . "-" . "policy_no_" . $policy_no . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

					if ($final_doc_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["final_doc_err"] = $final_doc_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($final_doc_img["file_name"] != "") {
						$final_doc_file_name = $final_doc_img["file_name"];
						$final_doc_file_size = $final_doc_img["file_size"];
						$final_doc_file_type = $final_doc_img["file_type"];
					}
				}

				$add_arr[] = array(
					'serial_no' => $serial_no,
					'serial_no_counter' => $serial_no_counter,
					'policy_no' => $policy_no,
					'policy_holder' => $policy_holder,
					'fk_company_id' => $company,
					'company_short_code' => $company_short_code,
					'receipt_no' => $receipt_no,
					'due_date' => $due_date,
					'ammount' => $ammount,
					'purpose_of_send' => $purpose_of_send,
					'document' => $document,
					'remark' => $remark,
					'company_id' => $company_id,
					'policy_holder_id' => $policy_holder_id,

					'branch_code' => $branch_code,
					'holder_type' => $holder_type,
					'company_type' => $company_type,
					'receipt_doc' => $receipt_doc_file_name,
					'final_doc' => $final_doc_file_name,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "phs_regi_master", $add_arr, $return_type = "lastID");
				$phs_regi_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($phs_regi_id != "") {
				$validator["status"] = true;
				$validator["message"] = $this->data["title"] . " is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_phs_regi()
	{
		$validator = array('status' => false, 'messages' => array());
		$phs_regi_id = $this->input->post("phs_regi_id");

		if (!empty($phs_regi_id)) {
			$whereArr["phs_regi_master.phs_regi_id"] = $phs_regi_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames = "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc, phs_regi_master.company_id, phs_regi_master.policy_holder_id,phs_regi_master.create_date, phs_regi_master.modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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

	public function update_phs_regi()
	{
		$validator = array('status' => false, 'messages' => array());
		$phs_regi_id = $this->security->xss_clean($this->input->post('phs_regi_id'));
		$whereArr_serial_no_check["phs_regi_master.phs_regi_id"] = $phs_regi_id;
		$query_serial_no_check = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames = "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc, phs_regi_master.company_id, phs_regi_master.policy_holder_id,phs_regi_master.create_date, phs_regi_master.modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr_serial_no_check, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result_serial_no_check = $query_serial_no_check["userData"];

		$current_serial_no = $result_serial_no_check["serial_no"];
		$updated_serial_no = $this->input->post("serial_no");

		if ($current_serial_no != $updated_serial_no)
			$this->form_validation->set_rules('serial_no', 'Serial No.', 'trim|callback_check_serial_no|callback_check_serial_no_isexist');
		else
			$this->form_validation->set_rules('serial_no', 'Serial No.', 'trim');

		// $this->form_validation->set_rules('serial_no', 'Serial No.', 'trim|required|callback_check_serial_no|callback_check_serial_no_isexist');
		$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|required');
		$this->form_validation->set_rules('policy_holder', 'Policy Holder', 'trim|required');
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('receipt_no', 'Receipt No.', 'trim');
		$this->form_validation->set_rules('due_date', 'Due Date', 'trim');
		$this->form_validation->set_rules('ammount', 'Ammount', 'trim');
		$this->form_validation->set_rules('purpose_of_send', 'Purpose Of Sending', 'trim');
		$this->form_validation->set_rules('document', 'Types Of Document', 'trim');
		$this->form_validation->set_rules('remark', 'Remark', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"serial_no_err" => form_error("serial_no"),
				"policy_no_err" => form_error("policy_no"),
				"policy_holder_err" => form_error("policy_holder"),
				"company_err" => form_error("company"),
				"receipt_no_err" => form_error("receipt_no"),
				"due_date_err" => form_error("due_date"),
				"ammount_err" => form_error("ammount"),
				"purpose_of_send_err" => form_error("purpose_of_send"),
				"document_err" => form_error("document"),
				"remark_err" => form_error("remark"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$phs_regi_id = $this->security->xss_clean($this->input->post('phs_regi_id'));
				$serial_no = $this->security->xss_clean($this->input->post('serial_no'));
				$serial_no_counter = $this->security->xss_clean($this->input->post('serial_no_counter'));
				$policy_no = $this->security->xss_clean($this->input->post('policy_no'));
				$policy_holder = $this->security->xss_clean($this->input->post('policy_holder'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$receipt_no = $this->security->xss_clean($this->input->post('receipt_no'));
				$due_date = $this->security->xss_clean($this->input->post('due_date'));
				$due_date = date("Y-m-d", strtotime($due_date));
				$ammount = $this->security->xss_clean($this->input->post('ammount'));
				$purpose_of_send = $this->security->xss_clean($this->input->post('purpose_of_send'));
				$document = $this->security->xss_clean($this->input->post('document'));
				$remark = $this->security->xss_clean($this->input->post('remark'));

				$branch_code = $this->security->xss_clean($this->input->post('branch_code'));
				$holder_type = $this->security->xss_clean($this->input->post('holder_type'));
				$company_type = $this->security->xss_clean($this->input->post('company_type'));

				$company_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name", $whereArr = array("master_company.mcompany_id" => $company), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$company_result = $company_query["userData"];

				if (!empty($company_result))
					$company_short_code = $company_result["short_name"];
				else
					$company_short_code = "";

				if ($holder_type == "Manual") {
					$policy_holder = $policy_holder;
					$policy_holder_id = "";
				} elseif ($holder_type == "System") {
					$policy_holder_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS name", $whereArr = array("customermem_tbl.id" => $policy_holder), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$policy_holder_result = $policy_holder_query["userData"];
					$policy_holder = $policy_holder_result["name"];
					$policy_holder_id = $policy_holder_result["id"];
				}

				if ($company_type == "Manual") {
					$company = $company;
					$company_id = "";
				} elseif ($company_type == "System") {
					$company_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name", $whereArr = array("master_company.mcompany_id" => $company), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$company_name_result = $company_name_query["userData"];
					$company = $company_name_result["company_name"];
					$company_id = $company_name_result["mcompany_id"];
				}

				$receipt_doc_file_name = "";
				$final_doc_file_name = "";

				if (!empty($phs_regi_id)) {

					$staff_doc_whereArrstaff["phs_regi_master.phs_regi_id"] = $phs_regi_id;
					$staff_doc_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames = "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc,phs_regi_master.create_date, phs_regi_master.modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr = $staff_doc_whereArrstaff, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$this->data["phs_regi_doc_details"] = $phs_regi_doc_details = $staff_doc_query["userData"];

					$receipt_file_name = $phs_regi_doc_details["receipt_doc"];
					$final_file_name = $phs_regi_doc_details["final_doc"];

					if (empty($receipt_doc_file_name))
						$receipt_doc_file_name = $phs_regi_doc_details["receipt_doc"];
					if (empty($final_doc_file_name))
						$final_doc_file_name = $phs_regi_doc_details["final_doc"];
				}

				$receipt_file_name = "";
				$final_file_name = "";

				if (!empty($_FILES["receipt_doc"])) {
					if (!empty($receipt_file_name)) {
						$receipt_doc_data = $_FILES["receipt_doc"]["name"];
						$receipt_doc_img = $this->file_lib->file_upload($img_name = "receipt_doc", $directory_name = "./assets/phs_register_doc/receipt_doc/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = "serial_no_" . $serial_no . "-" . "policy_no_" . $policy_no . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");
						if ($receipt_doc_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["receipt_doc_err"]  = $receipt_doc_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($receipt_doc_img["file_name"] != "") {
							$receipt_doc_file_name = $receipt_doc_img["file_name"];
							$receipt_doc_file_size = $receipt_doc_img["file_size"];
							$receipt_doc_file_type = $receipt_doc_img["file_type"];
						}
					} elseif (empty($receipt_file_name)) {
						$receipt_doc_data = $_FILES["receipt_doc"]["name"];
						$receipt_doc_img = $this->file_lib->file_upload($img_name = "receipt_doc", $directory_name = "./assets/phs_register_doc/receipt_doc/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = "serial_no_" . $serial_no . "-" . "policy_no_" . $policy_no . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

						if ($receipt_doc_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["receipt_doc_err"]  = $receipt_doc_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($receipt_doc_img["file_name"] != "") {
							$receipt_doc_file_name = $receipt_doc_img["file_name"];
							$receipt_doc_file_size = $receipt_doc_img["file_size"];
							$receipt_doc_file_type = $receipt_doc_img["file_type"];
						}
					}
				}

				if (!empty($_FILES["final_doc"])) {
					if (!empty($final_file_name)) {
						$final_doc_data = $_FILES["final_doc"]["name"];
						$final_doc_img = $this->file_lib->file_upload($img_name = "final_doc", $directory_name = "./assets/phs_register_doc/final_doc/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = "serial_no_" . $serial_no . "-" . "policy_no_" . $policy_no . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");
						if ($final_doc_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["final_doc_err"]  = $final_doc_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($final_doc_img["file_name"] != "") {
							$final_doc_file_name = $final_doc_img["file_name"];
							$final_doc_file_size = $final_doc_img["file_size"];
							$final_doc_file_type = $final_doc_img["file_type"];
						}
					} elseif (empty($final_file_name)) {
						$final_doc_data = $_FILES["final_doc"]["name"];
						$final_doc_img = $this->file_lib->file_upload($img_name = "final_doc", $directory_name = "./assets/phs_register_doc/final_doc/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = "serial_no_" . $serial_no . "-" . "policy_no_" . $policy_no . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

						if ($final_doc_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["final_doc_err"]  = $final_doc_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($final_doc_img["file_name"] != "") {
							$final_doc_file_name = $final_doc_img["file_name"];
							$final_doc_file_size = $final_doc_img["file_size"];
							$final_doc_file_type = $final_doc_img["file_type"];
						}
					}
				}

				$updateArr[] = array(
					'phs_regi_id' => $phs_regi_id,
					'serial_no' => $serial_no,
					'serial_no_counter' => $serial_no_counter,
					'policy_no' => $policy_no,
					'policy_holder' => $policy_holder,
					'fk_company_id' => $company,
					'company_short_code' => $company_short_code,
					'receipt_no' => $receipt_no,
					'due_date' => $due_date,
					'ammount' => $ammount,
					'purpose_of_send' => $purpose_of_send,
					'document' => $document,
					'remark' => $remark,
					'company_id' => $company_id,
					'policy_holder_id' => $policy_holder_id,

					'branch_code' => $branch_code,
					'holder_type' => $holder_type,
					'company_type' => $company_type,
					'receipt_doc' => $receipt_doc_file_name,
					'final_doc' => $final_doc_file_name,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "phs_regi_master", $updateArr, $updateKey = "phs_regi_id", $whereArr = array("phs_regi_id", $phs_regi_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($phs_regi_id != "") {
				$validator["status"] = true;
				$validator["message"] = $this->data["title"] . " is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_phs_regi()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"phs_regi_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);

			if ($id != "") {
				$whereArr["phs_regi_master.phs_regi_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "phs_regi_master", $updateArr, $updateKey = "phs_regi_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames =  "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_id, phs_regi_master.policy_holder_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc,phs_regi_master.create_date, phs_regi_master.modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $this->data["title"] . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing " . $this->data["title"] . ".";
			}
			echo json_encode($result);
		}
	}

	public function recover_phs_regi()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"phs_regi_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["phs_regi_master.phs_regi_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "phs_regi_master", $updateArr, $updateKey = "phs_regi_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames =  "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_id, phs_regi_master.policy_holder_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc,phs_regi_master.create_date, phs_regi_master.modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $this->data["title"] . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $this->data["title"] . " Status.";
			}
			echo json_encode($result);
		}
	}

	public function index()
	{
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"] . " Master",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/phs_register/phs_regi";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function phs_regi()
	{
		$this->data["edit_add_flage"] = $edit_add_flage = $this->uri->segment(4);
		$this->data["phs_regi_id"] = $phs_regi_id = $this->uri->segment(5);
		if ($edit_add_flage == 1) : $add = "Add ";
		elseif ($edit_add_flage == 0) : $add = "Edit ";
		endif;
		$this->data["add"] = $add;

		if (!empty($phs_regi_id)) {
			$whereArr_phs_regi["phs_regi_master.phs_regi_id"] = $phs_regi_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames =  "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_id, phs_regi_master.policy_holder_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc,phs_regi_master.create_date, phs_regi_master.modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr = $whereArr_phs_regi, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$this->data["phs_regi_details"] = $phs_regi_details = $query["userData"];
		} else
			$this->data["phs_regi_details"] = $phs_regi_details = "";

		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"] . " Master",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/phs_register/phs_regi_common";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_phs_regi_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$whereArr["DATE_FORMAT(phs_regi_master.create_date,'%m-%Y')"] = date("m-Y");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames =  "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_id, phs_regi_master.policy_holder_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc,DATE_FORMAT(phs_regi_master.create_date,'%d-%m-%Y') as create_date, DATE_FORMAT(phs_regi_master.modify_dt,'%d-%m-%Y') as modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		// print_r($result2);die();
		$total_phs_regi_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_phs_regi_data"] = $total_phs_regi_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_phs_regi_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_phs_regi_status()
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
				"phs_regi_id" => $id,
				"phs_regi_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["phs_regi_master.phs_regi_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "phs_regi_master", $updateArr, $updateKey = "phs_regi_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "phs_regi_master", $colNames =  "phs_regi_master.phs_regi_id, phs_regi_master.serial_no, phs_regi_master.serial_no_counter, phs_regi_master.policy_no, phs_regi_master.policy_holder,  phs_regi_master.fk_company_id, phs_regi_master.company_id, phs_regi_master.policy_holder_id, phs_regi_master.company_short_code, phs_regi_master.receipt_no, DATE_FORMAT(phs_regi_master.due_date,'%d-%m-%Y') as due_date, phs_regi_master.ammount, phs_regi_master.purpose_of_send, phs_regi_master.document, phs_regi_master.remark,  phs_regi_master.holder_type, phs_regi_master.company_type, phs_regi_master.branch_code, phs_regi_master.receipt_doc, phs_regi_master.final_doc,phs_regi_master.create_date, phs_regi_master.modify_dt, phs_regi_master.fk_staff_id, phs_regi_master.fk_user_role_id, phs_regi_master.phs_regi_status, phs_regi_master.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $this->data["title"] . " " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $this->data["title"] . " Status.";
			}
			echo json_encode($result);
		}
	}

	public function download_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Staff Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);
		$this->load->helper('download');

		if (!empty($doc_type)) {
			if ($doc_type == 1)
				$data = file_get_contents("./assets/phs_register_doc/receipt_doc/" . $doc_name);
			elseif ($doc_type == 2)
				$data = file_get_contents("./assets/phs_register_doc/final_doc/" . $doc_name);
		}
		force_download($doc_name, $data);
	}

	public function view_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Staff Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$extension = pathinfo("assets/phs_register_doc/receipt_doc/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/phs_register_doc/receipt_doc/" . $doc_name);
			} elseif ($doc_type == 2) {
				$extension = pathinfo("assets/phs_register_doc/final_doc/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/phs_register_doc/final_doc/" . $doc_name);
			}
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}

	public function delete_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Staff Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$title = "Receipt Document";
				$staff_profile = "";
				$extension = pathinfo("assets/phs_register_doc/receipt_doc/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/phs_register_doc/receipt_doc/" . $doc_name);
				unlink("./assets/phs_register_doc/receipt_doc/" . $doc_name);
				$updateArr[] = array(
					"phs_regi_id" => $id,
					"receipt_doc" => $staff_profile,
				);
				$whereArr["phs_regi_master.phs_regi_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "phs_regi_master", $updateArr, $updateKey = "phs_regi_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 2) {
				$title = "Final Document";
				$staff_pan = "";
				$extension = pathinfo("assets/phs_register_doc/final_doc/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/phs_register_doc/final_doc/" . $doc_name);
				unlink("./assets/phs_register_doc/final_doc/" . $doc_name);
				$updateArr[] = array(
					"phs_regi_id" => $id,
					"final_doc" => $staff_pan,
				);
				$whereArr["phs_regi_master.phs_regi_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "phs_regi_master", $updateArr, $updateKey = "phs_regi_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			}
		}

		$this->session->set_flashdata("msg", "Document is Deleted successfully.");
		if ($query["status"] == true) {
			$result["message"] = $title . " is Deleted successfully.";
			$result["userdata"] = array();
			$result["status"] = true;
		} else {
			$result["message"] = "";
			$result["userdata"] = array();
			$result["status"] = false;
		}
		echo json_encode($result);
	}

	// PHS Register Mater Section End





}
