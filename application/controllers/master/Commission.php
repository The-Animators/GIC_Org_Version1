<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commission extends Admin_gic_core
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
	// Commission Section Start

	public function index()
	{
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =   "customermem_tbl.id,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name" => "ASC"), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$this->data["policy_holder"] = $policy_holder = $query["userData"];
		$this->data["title"] = $title = "Commission";
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

		$this->data["main_page"] = "master/commission/commission_list";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_commission_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$whereArr["policy_member_details.policy_member_status"] = 1;
		$whereArr["policy_member_details.del_flag"] = 1;
		$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
		$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
		$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
		$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames = "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum , policy_member_details.date_from , policy_member_details.date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company , policy_member_details.basic_sum_insured , policy_member_details.basic_gross_premium , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag  ,policy_member_details.floater_policy_type, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("policy_member_details.policy_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];

		$total_commission_data = count($result);
		// print_r($result);
		// die();

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_commission_data"] = $total_commission_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function filter_commission()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_company = $this->input->post("filter_company");
		$filter_agency = $this->input->post("filter_agency");
		$filter_policy_holder = $this->input->post("filter_policy_holder");
		$result = array();
		$whereArr["policy_member_details.policy_member_status"] = 1;
		$whereArr["policy_member_details.del_flag"] = 1;
		if (!empty($this->input->post())) {
			//"DATE_FORMAT(column_name,'%Y-%m')
			//DATE_FORMAT("policy_member_details.date_to", "%Y-%m")
			if (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(policy_member_details.date_to,'%Y-%m')"] = $filter_year . "-" . $filter_month;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(policy_member_details.date_to,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(policy_member_details.date_to,'%m')"] = $filter_month;
			}
			if (!empty($filter_company))
				$whereArr["policy_member_details.fk_company_id"] = $filter_company;
			if (!empty($filter_agency))
				$whereArr["policy_member_details.fk_agency_id"] = $filter_agency;
			if (!empty($filter_policy_holder))
				$whereArr["policy_member_details.fk_cust_member_id"] = $filter_policy_holder;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames = "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum , policy_member_details.date_from , policy_member_details.date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company , policy_member_details.basic_sum_insured , policy_member_details.basic_gross_premium , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag  ,policy_member_details.floater_policy_type, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, customermem_tbl.id, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("policy_member_details.policy_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];

			$total_commission_data = count($result);
			// echo $this->db->last_query();
			// print_r($result);
			// print_r($filter_company."filter_company");
			// die();
		}

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_commission_data"] = $total_commission_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	function update_policy_commission_data()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->db->trans_start();	//Start Transaction	
		if ($this->input->post() != "") {
			$policy_id = $this->security->xss_clean($this->input->post('policy_id'));
			$commission_rece_company = $this->security->xss_clean($this->input->post('commission_rece_company'));
			$commission_amt_rece_company = $this->security->xss_clean($this->input->post('commission_amt_rece_company'));

			$updateArr = array(
				'policy_id ' => $policy_id,
				'commission_rece_company' => $commission_rece_company,
				'commission_amt_rece_company' => $commission_amt_rece_company,
				'modify_dt' => date("Y-m-d h:i:s"),
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);

			if (!empty($updateArr)) {
				$this->db->where("policy_member_details.policy_id", $policy_id);
				$this->db->update('policy_member_details', $updateArr);
			}
			// print_r($updateArr);
			// die();
			// $query = $this->Mquery_model_v3->updateBatchQuery($tableName = "policy_member_details", $updateArr, $updateKey = "policy_id", $whereArr = array("policy_id" => $policy_id), $likeCondtnArr = array(), $whereInArray = array());
			// echo $this->db->last_query();
			// die();
		}
		$this->db->trans_complete();		// Transaction End	

		if ($this->db->trans_status() === FALSE) {
			$validator["status"] = false;
			$validator["message"] = "Fatal Error: Contact Support:";
		} else {
			$validator["status"] = true;
			$validator["message"] = "Commission is Updated Successfully.";
		}

		echo json_encode($validator);
	}

	function commission_bill_entry()
	{
		$this->data["title"] = $title = "Commission Bill Entry";
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

		$this->data["main_page"] = "master/commission/commission_bill_entry_list";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_commission_bill_entry()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('bill_upload', 'Bill Upload', 'trim');
		$this->form_validation->set_rules('date_checking', 'Date Checking', 'trim|required');
		$this->form_validation->set_rules('bill_remark', 'Bill Details', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"bill_upload_err" => form_error("bill_upload"),
				"date_checking_err" => form_error("date_checking"),
				"bill_remark_err" => form_error("bill_remark"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$date_checking = $this->security->xss_clean($this->input->post('date_checking'));
				$bill_remark = $this->security->xss_clean($this->input->post('bill_remark'));

				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				$bill_upload_file_name = "";

				if (!empty($_FILES["bill_upload"])) {
					$bill_upload_data = $_FILES["bill_upload"]["name"];
					$bill_upload_img = $this->file_lib->file_upload($img_name = "bill_upload", $directory_name = "./commission/bill_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name, $url = "", $user_session_id = "_Policy_No_");

					if ($bill_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["bill_upload_err"] = $bill_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($bill_upload_img["file_name"] != "") {
						$bill_upload_file_name = $bill_upload_img["file_name"];
						$bill_upload_file_size = $bill_upload_img["file_size"];
						$bill_upload_file_type = $bill_upload_img["file_type"];
					}
				}

				$add_arr[] = array(
					'fk_company_id' => $company,
					'date_checking' => $date_checking . " " . date("h:i:s"),
					'bill_remark' => $bill_remark,
					'bill_upload_file_name' => $bill_upload_file_name,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);

				$query = $this->Mquery_model_v3->addQuery($tableName = "commission_bill_entry", $add_arr, $return_type = "lastID");
				$commission_bill_entry_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($commission_bill_entry_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Commission Bill Entry is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_commission_bill_entry()
	{
		$validator = array('status' => false, 'messages' => array());
		$commission_bill_entry_id = $this->input->post("commission_bill_entry_id");
		if ($commission_bill_entry_id != "") {
			$joins_main[] = array("tbl" => "master_company", "condtn" => "commission_bill_entry.fk_company_id = master_company.mcompany_id", "type" => "left");
			$whereArr["commission_bill_entry.commission_bill_entry_id"] = $commission_bill_entry_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking, commission_bill_entry.end_date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, master_company.company_name, commission_bill_entry.bill_no, commission_bill_entry.bill_date", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];
		}
		// print_r($result);die();
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

	public function update_commission_bill_entry()
	{
		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('bill_upload', 'Bill Upload', 'trim');
		$this->form_validation->set_rules('date_checking', 'Date Checking', 'trim|required');
		$this->form_validation->set_rules('bill_remark', 'Bill Details', 'trim|required');
		$this->form_validation->set_rules('bill_no', 'Bill Number', 'trim|required');
		$this->form_validation->set_rules('bill_date', 'Bill Date', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"bill_upload_err" => form_error("bill_upload"),
				"date_checking_err" => form_error("date_checking"),
				"bill_remark_err" => form_error("bill_remark"),
				"bill_no_err" => form_error("bill_no"),
				"bill_date_err" => form_error("bill_date"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$commission_bill_entry_id = $this->security->xss_clean($this->input->post('commission_bill_entry_id'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$date_checking = $this->security->xss_clean($this->input->post('date_checking'));
				$end_date_checking = $this->security->xss_clean($this->input->post('end_date_checking'));
				$bill_remark = $this->security->xss_clean($this->input->post('bill_remark'));
				$bill_no = $this->security->xss_clean($this->input->post('bill_no'));
				$bill_date = $this->security->xss_clean($this->input->post('bill_date'));

				$commission_file_name = "";
				$bill_upload_file_name = "";

				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];

					$joins_main_commission_file_name[] = array("tbl" => "master_company", "condtn" => "commission_bill_entry.fk_company_id = master_company.mcompany_id", "type" => "left");
					$whereArr_commission_file_name["commission_bill_entry.commission_bill_entry_id"] = $commission_bill_entry_id;
					$query1 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, master_company.company_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_commission_file_name, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$commission_file_name_data = $query1["userData"];
					$commission_file_name = $commission_file_name_data["bill_upload_file_name"];

					if (empty($bill_upload_file_name))
						$commission_file_name = $commission_file_name;
				}

				if (!empty($_FILES["bill_upload"])) {
					if (!empty($commission_file_name)) {
						$bill_upload_data = $_FILES["bill_upload"]["name"];
						$bill_upload_img = $this->file_lib->file_upload($img_name = "bill_upload", $directory_name = "./commission/bill_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name, $url = "", $user_session_id = "_Policy_No_");

						if ($bill_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["bill_upload_err"] = $bill_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($bill_upload_img["file_name"] != "") {
							$bill_upload_file_name = $bill_upload_img["file_name"];
							$bill_upload_file_size = $bill_upload_img["file_size"];
							$bill_upload_file_type = $bill_upload_img["file_type"];
						}
					} elseif (empty($commission_file_name)) {
						$bill_upload_data = $_FILES["bill_upload"]["name"];
						$bill_upload_img = $this->file_lib->file_upload($img_name = "bill_upload", $directory_name = "./commission/bill_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name, $url = "", $user_session_id = "_Policy_No_");

						if ($bill_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["bill_upload_err"] = $bill_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($bill_upload_img["file_name"] != "") {
							$bill_upload_file_name = $bill_upload_img["file_name"];
							$bill_upload_file_size = $bill_upload_img["file_size"];
							$bill_upload_file_type = $bill_upload_img["file_type"];
						}
					}
				}

				// print_r($bill_upload_file_name);
				// die();
				$updateArr[] = array(
					'commission_bill_entry_id' => $commission_bill_entry_id,
					'fk_company_id' => $company,
					'date_checking' => $date_checking . " " . date("h:i:s"),
					'end_date_checking' => $end_date_checking . " " . date("h:i:s"),
					// 'date_checking' => $date_checking . " " . date("h:i:s"),
					// 'end_date_checking' => $end_date_checking . " " . date("h:i:s"),
					'bill_remark' => $bill_remark,
					'bill_upload_file_name' => $bill_upload_file_name,
					'bill_no' => $bill_no,
					'bill_date' => $bill_date,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_bill_entry", $updateArr, $updateKey = "commission_bill_entry_id", $whereArr = array("commission_bill_entry_id", $commission_bill_entry_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($commission_bill_entry_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Commission Bill Entry is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function get_commission_bill_entry_list()
	{
		$joins_main[] = array("tbl" => "master_company", "condtn" => "commission_bill_entry.fk_company_id = master_company.mcompany_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking,commission_bill_entry.end_date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, commission_bill_entry.bill_no, commission_bill_entry.bill_date, commission_bill_entry.policy_ids, master_company.company_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];

		$total_commission_bill_entry = count($result);

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_commission_bill_entry"] = $total_commission_bill_entry;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function filter_commission_bill_entry()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_date = $this->input->post("filter_date");
		$filter_company = $this->input->post("filter_company");
		$filter_status = $this->input->post("filter_status");
		$result = array();

		if (!empty($this->input->post())) {
			//"DATE_FORMAT(column_name,'%Y-%m')
			//DATE_FORMAT("policy_member_details.date_to", "%Y-%m")
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_date)) {
				$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%Y-%m-%d')"] = $filter_year . "-" . $filter_month . "-" . $filter_date;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%Y-%m')"] = $filter_year . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_date)) {
				$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%Y-%d')"] = $filter_year . "-"  . $filter_date;
			} elseif (!empty($filter_month) && !empty($filter_date)) {
				$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%m-%d')"] = $filter_month . "-"  . $filter_date;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%m')"] = $filter_month;

				if (!empty($filter_date))
					$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%d')"] = $filter_date;
			}
			if (!empty($filter_company))
				$whereArr["commission_bill_entry.fk_company_id"] = $filter_company;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["commission_bill_entry.commission_bill_entry_status"] = $filter_status;
			}

			// if (empty($filter_date) && empty($filter_company)){
			// 	$result = array();
			// }else {
			// 	if (!empty($filter_date)) {
			// 		$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%Y-%m-%d')"] = $filter_date;
			// 	}
			// 	if (!empty($filter_company))
			// 		$whereArr["commission_bill_entry.fk_company_id"] = $filter_company;

			$joins_main[] = array("tbl" => "master_company", "condtn" => "commission_bill_entry.fk_company_id = master_company.mcompany_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking,commission_bill_entry.end_date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, commission_bill_entry.bill_no, commission_bill_entry.bill_date, commission_bill_entry.policy_ids, master_company.company_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];
			$total_commission_bill_entry = count($result);
		}
		// echo $this->db->last_query();
		// print_r($result);
		// die();
		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_commission_bill_entry"] = $total_commission_bill_entry;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function filter_commission_bill_entry_bak()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_date = $this->input->post("filter_date");
		$filter_company = $this->input->post("filter_company");
		$result = array();

		if (empty($filter_date) && empty($filter_company)) {
			$result = array();
		} else {
			if (!empty($filter_date)) {
				$whereArr["DATE_FORMAT(commission_bill_entry.date_checking,'%Y-%m-%d')"] = $filter_date;
			}
			if (!empty($filter_company))
				$whereArr["commission_bill_entry.fk_company_id"] = $filter_company;

			$joins_main[] = array("tbl" => "master_company", "condtn" => "commission_bill_entry.fk_company_id = master_company.mcompany_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, master_company.company_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];
			$total_commission_bill_entry = count($result);
		}

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_commission_bill_entry"] = $total_commission_bill_entry;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function download_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Billing Upload , 2:TDS Certificate ,3 : Circular Upload
		$this->data["commission_bill_entry_id"] = $commission_bill_entry_id = (int)$this->uri->segment(5);
		$this->data["file_name"] = $file_name = $this->uri->segment(6);

		if (!empty($file_name) || !empty($doc_type)) {
			if ($doc_type == 1 || $doc_type == 2 || $doc_type == 3)
				$document_file = $file_name;
		}

		$this->load->helper('download');

		if ($document_file != "") {
			if ($doc_type == 1)
				$data = file_get_contents("./commission/bill_upload/" . $document_file);
			elseif ($doc_type == 2)
				$data = file_get_contents("./commission/tds_doc_upload/" . $document_file);
			elseif ($doc_type == 3)
				$data = file_get_contents("./assets/plans_policy/circular_upload/" . $document_file);
		}

		force_download($document_file, $data);
	}

	public function view_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Billing Upload , 2:TDS Certificate ,3 : Circular Upload
		$this->data["commission_bill_entry_id"] = $commission_bill_entry_id = (int)$this->uri->segment(5);
		$this->data["file_name"] = $file_name = $this->uri->segment(6);


		if (!empty($file_name) || !empty($doc_type)) {
			if ($doc_type == 1) {
				$document_file = $file_name;
				$extension = pathinfo("commission/bill_upload/" . $document_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./commission/bill_upload/" . $document_file);
			} elseif ($doc_type == 2) {
				$document_file = $file_name;
				$file = file_get_contents("./commission/tds_doc_upload/" . $document_file);
				$extension = pathinfo("commission/tds_doc_upload/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 3) {
				$document_file = $file_name;
				$file = file_get_contents("./assets/plans_policy/circular_upload/" . $document_file);
				$extension = pathinfo("assets/plans_policy/circular_upload/" . $document_file, PATHINFO_EXTENSION);
			}
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}

	public function delete_doc()
	{
		$doc_type = $this->input->post("doc_type");
		$commission_bill_entry_id = $this->input->post("id");
		$doc_name = $this->input->post("doc_name");

		// $bill_upload_file_name = $plans_policy_doc_details["policy_wording"];

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$title = "Bill Upload Document";
				$bill_upload_file_name = "";
				$extension = pathinfo("commission/bill_upload/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./commission/bill_upload/" . $doc_name);
				unlink("./commission/bill_upload/" . $doc_name);
				$updateArr[] = array(
					"commission_bill_entry_id" => $commission_bill_entry_id,
					"bill_upload_file_name" => $bill_upload_file_name, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["commission_bill_entry.commission_bill_entry_id"] = $commission_bill_entry_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_bill_entry", $updateArr, $updateKey = "commission_bill_entry_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 2) {
				$title = "TDS Certificate";
				$tds_doc_upload = "";
				$extension = pathinfo("commission/tds_doc_upload/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./commission/tds_doc_upload/" . $doc_name);
				unlink("./commission/tds_doc_upload/" . $doc_name);
				$updateArr[] = array(
					"tds_certificate_id" => $commission_bill_entry_id,
					"tds_doc_upload" => $tds_doc_upload, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["commission_tds_certificate.tds_certificate_id"] = $commission_bill_entry_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_tds_certificate", $updateArr, $updateKey = "tds_certificate_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			}
		}

		$this->session->set_flashdata("msg", $title . " is Deleted successfully.");
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

	function tds_cert()
	{
		$this->data["title"] = $title = "TDS Certificate";
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

		$this->data["main_page"] = "master/commission/tds_certificate";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_tds_cert()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('tds_doc_upload', 'TDS document ', 'trim');
		$this->form_validation->set_rules('agency', 'Agency', 'trim|required');
		$this->form_validation->set_rules('quarterly_period', 'Quarterly Period', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"tds_doc_upload_err" => form_error("tds_doc_upload"),
				"agency_err" => form_error("agency"),
				"quarterly_period_err" => form_error("quarterly_period"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$agency = $this->security->xss_clean($this->input->post('agency'));
				$quarterly_period = $this->security->xss_clean($this->input->post('quarterly_period'));

				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				$tds_doc_upload = "";

				if (!empty($_FILES["tds_doc_upload"])) {
					$tds_doc_upload_data = $_FILES["tds_doc_upload"]["name"];
					$tds_doc_upload_img = $this->file_lib->file_upload($img_name = "tds_doc_upload", $directory_name = "./commission/tds_doc_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name, $url = "", $user_session_id = "_Policy_No_");

					if ($tds_doc_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["tds_doc_upload_err"] = $tds_doc_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($tds_doc_upload_img["file_name"] != "") {
						$tds_doc_upload = $tds_doc_upload_img["file_name"];
						$tds_doc_upload_file_size = $tds_doc_upload_img["file_size"];
						$tds_doc_upload_file_type = $tds_doc_upload_img["file_type"];
					}
				}

				$add_arr[] = array(
					'fk_company_id' => $company,
					'fk_agency_id' => $agency,
					'quarterly_period' => $quarterly_period,
					'tds_doc_upload' => $tds_doc_upload,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);

				$query = $this->Mquery_model_v3->addQuery($tableName = "commission_tds_certificate", $add_arr, $return_type = "lastID");
				$tds_certificate_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($tds_certificate_id != "") {
				$validator["status"] = true;
				$validator["message"] = "TDS Certificate is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_tds_cert()
	{
		$validator = array('status' => false, 'messages' => array());
		$tds_certificate_id = $this->input->post("tds_certificate_id");
		if ($tds_certificate_id != "") {
			$joins_main[] = array("tbl" => "master_company", "condtn" => "commission_tds_certificate.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "commission_tds_certificate.fk_agency_id = master_agency.magency_id", "type" => "left");
			$whereArr["commission_tds_certificate.tds_certificate_id"] = $tds_certificate_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_tds_certificate", $colNames =   "commission_tds_certificate.tds_certificate_id, commission_tds_certificate.fk_company_id, commission_tds_certificate.fk_agency_id, commission_tds_certificate.quarterly_period, commission_tds_certificate.tds_doc_upload, commission_tds_certificate.commission_tds_certificate_status, commission_tds_certificate.commission_tds_certificate_del_flag, master_company.company_name,CONCAT(master_agency.name, ' ', REPLACE(master_agency.code,'null','')) AS agency_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}


		$agency_list = array();
		if (!empty($result["fk_company_id"])) {
			$whereArr_agency["master_agency.fk_mcompany_id"] = $result["fk_company_id"];
			$whereArr_agency["master_agency.magency_status"] = 1;
			$whereArr_agency["master_agency.del_flag"] = 1;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.code, master_agency.name, master_agency.username, master_agency.password, master_agency.link", $whereArr = $whereArr_agency, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_agency.code"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$agency_list = $query["userData"];
		}
		$result["agency_data_arr"] = $agency_list;
		// print_r($result);die();
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

	public function update_tds_cert()
	{
		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('tds_doc_upload', 'TDS document', 'trim|');
		$this->form_validation->set_rules('agency', 'Agency', 'trim|required');
		$this->form_validation->set_rules('quarterly_period', 'Quarterly Period', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"tds_doc_upload_err" => form_error("tds_doc_upload"),
				"agency_err" => form_error("agency"),
				"quarterly_period_err" => form_error("quarterly_period"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$tds_certificate_id = $this->security->xss_clean($this->input->post('tds_certificate_id'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$agency = $this->security->xss_clean($this->input->post('agency'));
				$quarterly_period = $this->security->xss_clean($this->input->post('quarterly_period'));

				$tds_doc_upload_file_name = "";
				$tds_doc_upload = "";

				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];

					$joins_main_commission_file_name[] = array("tbl" => "master_company", "condtn" => "commission_tds_certificate.fk_company_id = master_company.mcompany_id", "type" => "left");
					$whereArr_commission_file_name["commission_tds_certificate.tds_certificate_id"] = $tds_certificate_id;
					$query1 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_tds_certificate", $colNames =   "commission_tds_certificate.tds_certificate_id, commission_tds_certificate.fk_company_id, commission_tds_certificate.fk_agency_id, commission_tds_certificate.quarterly_period, commission_tds_certificate.tds_doc_upload, commission_tds_certificate.commission_tds_certificate_status, commission_tds_certificate.commission_tds_certificate_del_flag, master_company.company_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_commission_file_name, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$commission_file_name_data = $query1["userData"];
					$tds_doc_upload_file_name = $commission_file_name_data["tds_doc_upload"];

					if (empty($tds_doc_upload))
						$tds_doc_upload_file_name = $tds_doc_upload_file_name;
				}

				if (!empty($_FILES["tds_doc_upload"])) {
					if (!empty($tds_doc_upload_file_name)) {
						$tds_doc_upload_data = $_FILES["tds_doc_upload"]["name"];
						$tds_doc_upload_img = $this->file_lib->file_upload($img_name = "tds_doc_upload", $directory_name = "./commission/tds_doc_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name, $url = "", $user_session_id = "_Policy_No_");

						if ($tds_doc_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["tds_doc_upload_err"] = $tds_doc_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($tds_doc_upload_img["file_name"] != "") {
							$tds_doc_upload = $tds_doc_upload_img["file_name"];
							$tds_doc_upload_file_size = $tds_doc_upload_img["file_size"];
							$tds_doc_upload_file_type = $tds_doc_upload_img["file_type"];
						}
					} elseif (empty($tds_doc_upload_file_name)) {
						$tds_doc_upload_data = $_FILES["tds_doc_upload"]["name"];
						$tds_doc_upload_img = $this->file_lib->file_upload($img_name = "tds_doc_upload", $directory_name = "./commission/tds_doc_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name, $url = "", $user_session_id = "_Policy_No_");

						if ($tds_doc_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["tds_doc_upload_err"] = $tds_doc_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($tds_doc_upload_img["file_name"] != "") {
							$tds_doc_upload = $tds_doc_upload_img["file_name"];
							$tds_doc_upload_file_size = $tds_doc_upload_img["file_size"];
							$tds_doc_upload_file_type = $tds_doc_upload_img["file_type"];
						}
					}
				}
				// print_r($tds_doc_upload);
				// die();
				$updateArr[] = array(
					'tds_certificate_id' => $tds_certificate_id,
					'fk_company_id' => $company,
					'fk_agency_id' => $agency,
					'quarterly_period' => $quarterly_period,
					'tds_doc_upload' => $tds_doc_upload,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_tds_certificate", $updateArr, $updateKey = "tds_certificate_id", $whereArr = array("tds_certificate_id", $tds_certificate_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($tds_certificate_id != "") {
				$validator["status"] = true;
				$validator["message"] = "TDS Certificate is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function get_tds_cert_list()
	{
		$joins_main[] = array("tbl" => "master_company", "condtn" => "commission_tds_certificate.fk_company_id = master_company.mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_agency", "condtn" => "commission_tds_certificate.fk_agency_id = master_agency.magency_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_tds_certificate", $colNames =   "commission_tds_certificate.tds_certificate_id, commission_tds_certificate.fk_company_id, commission_tds_certificate.fk_agency_id, commission_tds_certificate.quarterly_period, commission_tds_certificate.tds_doc_upload, commission_tds_certificate.commission_tds_certificate_status, commission_tds_certificate.commission_tds_certificate_del_flag, master_company.company_name,CONCAT(master_agency.name, ' ', REPLACE(master_agency.code,'null','')) AS agency_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];

		$total_commission_tds_certificate = count($result);

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_commission_tds_certificate"] = $total_commission_tds_certificate;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function filter_tds_cert()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_company = $this->input->post("filter_company");
		$filter_agency = $this->input->post("filter_agency");
		$filter_quarterly_period = $this->input->post("filter_quarterly_period");
		$filter_status = $this->input->post("filter_status");
		$result = array();
		$whereArr = array();
		if (!empty($filter_company) || !empty($filter_agency) || !empty($filter_quarterly_period) || !empty($filter_status)) {
			if (!empty($filter_company))
				$whereArr["commission_tds_certificate.fk_company_id"] = $filter_company;
			if (!empty($filter_agency))
				$whereArr["commission_tds_certificate.fk_agency_id"] = $filter_agency;

			if (!empty($filter_quarterly_period))
				$whereArr["commission_tds_certificate.quarterly_period"] = $filter_quarterly_period;
			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["commission_tds_certificate.commission_tds_certificate_status"] = $filter_status;
			}
			// if (!empty($filter_status))
			// 	$whereArr["commission_tds_certificate.commission_tds_certificate_status"] = $filter_status;

			$joins_main[] = array("tbl" => "master_company", "condtn" => "commission_tds_certificate.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "commission_tds_certificate.fk_agency_id = master_agency.magency_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_tds_certificate", $colNames =   "commission_tds_certificate.tds_certificate_id, commission_tds_certificate.fk_company_id, commission_tds_certificate.fk_agency_id, commission_tds_certificate.quarterly_period, commission_tds_certificate.tds_doc_upload, commission_tds_certificate.commission_tds_certificate_status, commission_tds_certificate.commission_tds_certificate_del_flag, master_company.company_name,CONCAT(master_agency.name, ' ', REPLACE(master_agency.code,'null','')) AS agency_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];

			$total_commission_tds_certificate = count($result);
			// echo $this->db->last_query();
			// print_r($result);
			// die();
		}

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_commission_tds_certificate"] = $total_commission_tds_certificate;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_commission_tds_certificate"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function remove_commission_tds_cert()
	{
		$this->data["title"] = $title = "TDS Certificate";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"tds_certificate_id" => $id,
				"commission_tds_certificate_del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["commission_tds_certificate.tds_certificate_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_tds_certificate", $updateArr, $updateKey = "tds_certificate_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_tds_certificate", $colNames =   "commission_tds_certificate.tds_certificate_id, commission_tds_certificate.fk_company_id, commission_tds_certificate.fk_agency_id, commission_tds_certificate.quarterly_period, commission_tds_certificate.tds_doc_upload, commission_tds_certificate.commission_tds_certificate_status, commission_tds_certificate.commission_tds_certificate_del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing " . $title . ".";
			}
			echo json_encode($result);
		}
	}

	public function recover_commission_tds_cert()
	{
		$this->data["title"] = $title = "TDS Certificate";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"tds_certificate_id" => $id,
				"commission_tds_certificate_del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["commission_tds_certificate.tds_certificate_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_tds_certificate", $updateArr, $updateKey = "tds_certificate_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_tds_certificate", $colNames =   "commission_tds_certificate.tds_certificate_id, commission_tds_certificate.fk_company_id, commission_tds_certificate.fk_agency_id, commission_tds_certificate.quarterly_period, commission_tds_certificate.tds_doc_upload, commission_tds_certificate.commission_tds_certificate_status, commission_tds_certificate.commission_tds_certificate_del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $title . " Status.";
			}
			echo json_encode($result);
		}
	}

	public function update_commission_tds_cert_status()
	{
		$this->data["title"] = $title = "TDS Certificate";
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
				"tds_certificate_id" => $id,
				"commission_tds_certificate_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["commission_tds_certificate.tds_certificate_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_tds_certificate", $updateArr, $updateKey = "tds_certificate_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_tds_certificate", $colNames =   "commission_tds_certificate.tds_certificate_id, commission_tds_certificate.fk_company_id, commission_tds_certificate.fk_agency_id, commission_tds_certificate.quarterly_period, commission_tds_certificate.tds_doc_upload, commission_tds_certificate.commission_tds_certificate_status, commission_tds_certificate.commission_tds_certificate_del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . " " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $title . " Status.";
			}
			echo json_encode($result);
		}
	}
	// Commission Section End


	public function add_commission_bill_entry_by_commission_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('bill_upload', 'Bill Upload', 'trim');
		$this->form_validation->set_rules('date_checking', 'Start Date Checking', 'trim');
		$this->form_validation->set_rules('end_date_checking', 'End Date Checking', 'trim');
		$this->form_validation->set_rules('bill_remark', 'Bill Details', 'trim|required');
		$this->form_validation->set_rules('bill_no', 'Bill Number', 'trim|required');
		$this->form_validation->set_rules('bill_date', 'Bill Date', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"bill_upload_err" => form_error("bill_upload"),
				"date_checking_err" => form_error("date_checking"),
				"end_date_checking_err" => form_error("end_date_checking"),
				"bill_remark_err" => form_error("bill_remark"),
				"bill_no_err" => form_error("bill_no"),
				"bill_date_err" => form_error("bill_date"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$date_checking = $this->security->xss_clean($this->input->post('date_checking'));
				$end_date_checking = $this->security->xss_clean($this->input->post('end_date_checking'));
				$bill_remark = $this->security->xss_clean($this->input->post('bill_remark'));
				$bill_no = $this->security->xss_clean($this->input->post('bill_no'));
				$bill_date = $this->security->xss_clean($this->input->post('bill_date'));
				$policy_ids = $this->security->xss_clean($this->input->post('policy_ids'));

				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}
				$commission_bill_no = "";
				$commission_company_id = "";
				$commission_policy_ids = "";
				if (!empty($company) && !empty($bill_no) && !empty($bill_date)) {
					// print_r("Hi");
					$whereArr2["commission_bill_entry.fk_company_id"] = $company;
					$whereArr2["commission_bill_entry.bill_no"] = $bill_no;
					$whereArr2["DATE_FORMAT(commission_bill_entry.bill_date,'%Y-%m-%d')"] = $bill_date;
					$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id,commission_bill_entry.bill_no, commission_bill_entry.bill_date , commission_bill_entry.fk_company_id , commission_bill_entry.policy_ids", $whereArr2, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$result2 = $query2["userData"];

					// echo $this->db->last_query();
					// print_r($result2);

					if (!empty($result2)) {
						$policy_ids = explode(",", $policy_ids);
						$commission_bill_no = $result2["bill_no"];
						$commission_policy_ids = explode(",", $result2["policy_ids"]);
						$commission_company_id = $result2["fk_company_id"];
						$commission_bill_entry_id = $result2["commission_bill_entry_id"];
					}
				}

				// print_r($policy_ids);
				// die();

				$bill_upload_file_name = "";

				if (!empty($_FILES["bill_upload"])) {
					$bill_upload_data = $_FILES["bill_upload"]["name"];
					$bill_upload_img = $this->file_lib->file_upload($img_name = "bill_upload", $directory_name = "./commission/bill_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name, $url = "", $user_session_id = "_Policy_No_");

					if ($bill_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["bill_upload_err"] = $bill_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($bill_upload_img["file_name"] != "") {
						$bill_upload_file_name = $bill_upload_img["file_name"];
						$bill_upload_file_size = $bill_upload_img["file_size"];
						$bill_upload_file_type = $bill_upload_img["file_type"];
					}
				}
				$title = "";
				if (($commission_bill_no == $bill_no) && ($commission_company_id == $company)) {
					// print_r($commission_policy_ids);
					// print_r($policy_ids);
					$policy_ids = array_unique(array_merge($commission_policy_ids, $policy_ids));

					// print_r($policy_ids);
					// die();
					$policy_ids = implode(",", $policy_ids);
					// print_r($policy_ids);
					// die();
					$title = "Updated";
					$update_arr[] = array(
						'commission_bill_entry_id' => $commission_bill_entry_id,
						'fk_company_id' => $company,
						'date_checking' => $date_checking . " " . date("h:i:s"),
						'end_date_checking' => $end_date_checking . " " . date("h:i:s"),
						'bill_remark' => $bill_remark,
						'bill_no' => $bill_no,
						'bill_date' => $bill_date,
						'policy_ids' => $policy_ids,
						'bill_upload_file_name' => $bill_upload_file_name,
						'modify_dt' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_bill_entry", $update_arr, $updateKey = "commission_bill_entry_id", $whereArr = array("commission_bill_entry_id", $commission_bill_entry_id), $likeCondtnArr = array(), $whereInArray = array());
				} else {
					$title = "Added";
					$add_arr[] = array(
						'fk_company_id' => $company,
						'date_checking' => $date_checking . " " . date("h:i:s"),
						'end_date_checking' => $end_date_checking . " " . date("h:i:s"),
						'bill_remark' => $bill_remark,
						'bill_no' => $bill_no,
						'bill_date' => $bill_date,
						'policy_ids' => $policy_ids,
						'bill_upload_file_name' => $bill_upload_file_name,
						'create_date' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					$query = $this->Mquery_model_v3->addQuery($tableName = "commission_bill_entry", $add_arr, $return_type = "lastID");
					$commission_bill_entry_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				if (!empty($commission_bill_entry_id)) {
					$validator["status"] = true;
					$validator["message"] = "Commission Bill Entry is " . $title . " Successfully.";
				}
			}
		}
		echo json_encode($validator);
	}


	public function view_commission_bill_uploaded_policy()
	{
		$validator = array('status' => false, 'messages' => array());
		$commission_bill_entry_id = $this->input->post("commission_bill_entry_id");
		if ($commission_bill_entry_id != "") {
			$joins_main[] = array("tbl" => "master_company", "condtn" => "commission_bill_entry.fk_company_id = master_company.mcompany_id", "type" => "left");
			$whereArr["commission_bill_entry.commission_bill_entry_id"] = $commission_bill_entry_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, master_company.company_name, commission_bill_entry.bill_no, commission_bill_entry.bill_date, commission_bill_entry.policy_ids", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];
			$bill_no = $result["bill_no"];
			$policy_ids = explode(",", $result["policy_ids"]);
		}

		if (!empty($policy_ids)) {
			$whereArr2["policy_member_details.policy_member_status"] = 1;
			$whereArr2["policy_member_details.del_flag"] = 1;
			$whereInArray2["policy_member_details.policy_id"] = $policy_ids;
			$joins_main2[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main2[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main2[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main2[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main2[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main2[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main2[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames = "policy_member_details.policy_id,  policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id, policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum , policy_member_details.date_from , policy_member_details.date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company , policy_member_details.basic_sum_insured , policy_member_details.basic_gross_premium , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag  ,policy_member_details.floater_policy_type, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname", $whereArr = $whereArr2, $whereInArray = $whereInArray2, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main2, $orderByArr = array(), $groupByArr = array("policy_member_details.policy_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			// $result2_data = array_push($result2,$bill_no);
			// $result2["bill_no"] = $bill_no;
		}

		$total_commission_data = count($result2);
		if (!empty($result2)) {
			$validator["status"] = true;
			$validator["userdata"] = $result2;
			$validator["bill_no"] = $bill_no;
			$validator["total_commission_data"] = $total_commission_data;
			$validator["message"] = "";
		} else {
			$validator["status"] = false;
			$validator["userdata"] = array();
			$validator["bill_no"] = "";
			$validator["total_commission_data"] = "";
			$validator["message"] = "Fatal Error: Contact Support:";
		}

		echo json_encode($validator);
	}

	public function remove_commission_bill_entry()
	{
		$this->data["title"] = $title = "Commission Bill Uploaded";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"commission_bill_entry_id" => $id,
				"commission_bill_entry_del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["commission_bill_entry.commission_bill_entry_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_bill_entry", $updateArr, $updateKey = "commission_bill_entry_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, commission_bill_entry.bill_no, commission_bill_entry.bill_date, commission_bill_entry.policy_ids", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing " . $title . ".";
			}
			echo json_encode($result);
		}
	}

	public function recover_commission_bill_entry()
	{
		$this->data["title"] = $title = "Commission Bill Uploaded";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"commission_bill_entry_id" => $id,
				"commission_bill_entry_del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["commission_bill_entry.commission_bill_entry_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_bill_entry", $updateArr, $updateKey = "commission_bill_entry_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, commission_bill_entry.bill_no, commission_bill_entry.bill_date, commission_bill_entry.policy_ids", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $title . " Status.";
			}
			echo json_encode($result);
		}
	}

	public function update_commission_bill_entry_status()
	{
		$this->data["title"] = $title = "Commission Bill Uploaded";
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
				"commission_bill_entry_id" => $id,
				"commission_bill_entry_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["commission_bill_entry.commission_bill_entry_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "commission_bill_entry", $updateArr, $updateKey = "commission_bill_entry_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "commission_bill_entry", $colNames =   "commission_bill_entry.commission_bill_entry_id, commission_bill_entry.fk_company_id, commission_bill_entry.date_checking, commission_bill_entry.bill_remark, commission_bill_entry.bill_upload_file_name, commission_bill_entry.commission_bill_entry_status, commission_bill_entry.commission_bill_entry_del_flag, commission_bill_entry.bill_no, commission_bill_entry.bill_date, commission_bill_entry.policy_ids", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . " " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $title . " Status.";
			}
			echo json_encode($result);
		}
	}
}
