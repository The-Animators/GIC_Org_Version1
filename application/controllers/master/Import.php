<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Import extends Admin_gic_core
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
		$all_userdata = $this->session->all_userdata();
		$this->staff_name = $this->session->userdata('@_staff_name');
		$this->staff_id = $this->session->userdata('@_staff_id');
		$this->user_role = $this->session->userdata('@_user_role_title');
		$this->user_role_id = $this->session->userdata('@_user_role_id');
		// print_r($all_userdata);die();
		$this->data["title"] = $title = "Import Section";
	}
	// CSV Mater Section Start

	public function spreadsheet_policy_import()
	{
		$validator = array('status' => false, 'messages' => array());
		if (empty($_FILES['dummy_file']['name'])) {
			$message = "CSV Field cannot be empty";
			$validator["message"]["dummy_file_err"] = $message;
			$validator["status"] = false;
			$validator["messages"] = $message;
			echo json_encode($validator);
			die();
		} elseif (!empty($_FILES['dummy_file']['name'])) {
			$upload_file = $_FILES['dummy_file']['name'];
			$extension = pathinfo($upload_file, PATHINFO_EXTENSION);
			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if ($extension == 'xls') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $reader->load($_FILES['dummy_file']['tmp_name']);
			$sheetdata = $spreadsheet->getActiveSheet()->toArray();
			$sheetcount = count($sheetdata);
			if ($sheetcount > 1) {
				$data = array();
				for ($i = 1; $i < $sheetcount; $i++) {
					$policy_data = array();
					$remark_data = array();
					$serial_no_year = $sheetdata[$i][0];
					$serial_no_month = $sheetdata[$i][1];
					$serial_no = $sheetdata[$i][2];
					$policy_counter = $sheetdata[$i][3];
					$company_name = $sheetdata[$i][4];

					if (!empty($company_name)) {
						$whereArr_company_name["master_company.company_name"] = $company_name;
						$company_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =  "master_company.mcompany_id , master_company.company_name, master_company.short_name", $whereArr = $whereArr_company_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_company.company_name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$company_result = $company_name_query["userData"];
						if (!empty($company_result))
							$company_name = $company_result["mcompany_id"];
					}

					$department_name = $sheetdata[$i][5];

					if (!empty($department_name)) {
						$whereArr_department_name["master_department.department_name"] = $department_name;
						$department_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id , master_department.department_name", $whereArr = $whereArr_department_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_department.department_name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$department_result = $department_name_query["userData"];
						if (!empty($department_result))
							$department_name = $department_result["department_id"];
					}
					// print_r($department_name);
					// print_r($department_result);
					// die();
					$policy_name = $sheetdata[$i][6];
					if ($policy_name == "Marine") {  // If Policy Name == "Marine" Replace With "Stop Policy"
						$policy_name = "Stop Policy";
					}
					if (!empty($policy_name)) {
						$whereArr_policy_name["master_policy_type.policy_type"] = $policy_name;
						$policy_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_type", $colNames =  "master_policy_type.policy_type_id , master_policy_type.policy_type", $whereArr = $whereArr_policy_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_policy_type.policy_type"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$policy_result = $policy_name_query["userData"];
						if (!empty($policy_result))
							$policy_name = $policy_result["policy_type_id"];
					}

					$policy_type = $sheetdata[$i][7];
					if ($policy_type == "Individual")
						$policy_type = 1;
					elseif ($policy_type == "Floater")
						$policy_type = 2;
					elseif ($policy_type == "Residential & Commercial")
						$policy_type = 3;
					elseif ($policy_type == "Common Individual")
						$policy_type = 4;
					elseif ($policy_type == "Common Floater")
						$policy_type = 5;

					$agency_name = $sheetdata[$i][8];
					if (!empty($agency_name)) {
						$whereArr_agency_name["master_agency.name"] = $agency_name;
						$agency_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames =  "master_agency.magency_id , master_agency.name , master_agency.code", $whereArr = $whereArr_agency_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_agency.name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$agency_result = $agency_name_query["userData"];

						if (!empty($agency_result))
							$agency_name = $agency_result["magency_id"];
					}
					$sub_agent_name = $sheetdata[$i][9];
					if (!empty($sub_agent_name)) {
						$whereArr_sub_agent["master_sub_agent.sub_agent_name"] = $sub_agent_name;
						$sub_agent_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =  "master_sub_agent.sub_agent_id , master_sub_agent.sub_agent_name , master_sub_agent.sub_agent_code", $whereArr = $whereArr_sub_agent, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_sub_agent.sub_agent_name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$sub_agent_result = $sub_agent_query["userData"];
						if (!empty($sub_agent_result))
							$sub_agent_name = $sub_agent_result["sub_agent_id"];
					}
					$mode_of_premimum = $sheetdata[$i][10];
					$date_from = $sheetdata[$i][11];
					$date_to = $sheetdata[$i][12];
					$date_commenced = $sheetdata[$i][13];
					$client_name = $sheetdata[$i][14];
					if (!empty($client_name)) {
						$whereArr_client_name["customer_tbl.grpname"] = $client_name;
						$client_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =  "customer_tbl.id , customer_tbl.grpname , customer_tbl.reffered_by", $whereArr = $whereArr_client_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("customer_tbl.grpname"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$client_name_result = $client_name_query["userData"];
						if (!empty($client_name_result))
							$client_name = (int)$client_name_result["id"];
					}
					if (is_string($client_name)) {
						$client_name = 0;
					} else {
						$client_name = $client_name;
					}
					$member_name = $sheetdata[$i][15];

					if (!empty($member_name)) {
						$whereArr_member_name2["customermem_tbl.name"] = $member_name;
						if ($client_name != 0 || $client_name == "")
							$whereArr_member_name2["customermem_tbl.customer_id"] = $client_name;
						$member_name_query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =  "customermem_tbl.id , CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS name , customermem_tbl.email", $whereArr = $whereArr_member_name2, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$member_name_result2 = $member_name_query2["userData"];

						if (!empty($member_name_result2)) {
							$member_name = (int)$member_name_result2["id"];
						} else if (empty($member_name_result2)) {
							$member_name = explode(" ", $member_name);

							$whereArr_member_name["customermem_tbl.name"] = $member_name[0];
							if ($client_name != 0 || $client_name == "")
								$whereArr_member_name["customermem_tbl.customer_id"] = $client_name;
							$member_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =  "customermem_tbl.id , CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS name , customermem_tbl.email", $whereArr = $whereArr_member_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
							$member_name_result = $member_name_query["userData"];
							if (!empty($member_name_result))
								$member_name = (int)$member_name_result["id"];
							else
								$member_name = 0;
						}
						if (is_string($member_name)) {
							$member_name = 0;
						} else {
							$member_name = $member_name;
						}
					}
					$reg_mobile = $sheetdata[$i][16];
					$reg_email = $sheetdata[$i][17];
					$policy_no = $sheetdata[$i][18];
					$policy_upload = $sheetdata[$i][19];
					$quotation_date = $sheetdata[$i][20];
					$quotation_upload = $sheetdata[$i][21];
					$quotation_male_link = $sheetdata[$i][22];
					$floater_policy_type = $sheetdata[$i][23];
					$family_size = $sheetdata[$i][24];
					$addition_of_more_child = $sheetdata[$i][25];
					$remarks = $sheetdata[$i][26];
					$male_date = $sheetdata[$i][27];
					$policy_data[$i] = array(
						'serial_no_year' => $serial_no_year,
						'serial_no_month' => $serial_no_month,
						'serial_no' => $serial_no,
						'policy_counter' => $policy_counter,
						'fk_company_id' => $company_name,
						'fk_department_id' => $department_name,
						'fk_policy_type_id' => $policy_name,
						'policy_type' => $policy_type,
						'fk_agency_id' => $agency_name,
						'fk_sub_agent_id' => $sub_agent_name,
						'mode_of_premimum' => $mode_of_premimum,
						'date_from' => date("Y-m-d", strtotime($date_from)),
						'date_to' => date("Y-m-d", strtotime($date_to)),
						'date_commenced' => date("Y-m-d", strtotime($date_commenced)),
						'fk_client_id' => $client_name,
						'fk_cust_member_id' => $member_name,
						'reg_mobile' => $reg_mobile,
						'reg_email' => $reg_email,
						'policy_no' => $policy_no,
						'policy_upload' => $policy_upload,
						'quotation_date' => $quotation_date,
						'quotation_upload' => $quotation_upload,
						'quotation_male_link' => $quotation_male_link,
						'floater_policy_type' => $floater_policy_type,
						'family_size' => $family_size,
						'addition_of_more_child' => $addition_of_more_child,
						'fk_staff_id' => $this->staff_id,
						'fk_user_role_id' => $this->user_role_id,
					);
					$insert_result = $this->Mquery_model_v3->addQuery($tableName = "policy_member_details", $policy_data, $return_type = "lastID");

					if(empty($male_date))
						$male_date = "";
					else
						$male_date = date("Y-m-d", strtotime($male_date));
					// policy_remark_details
					// policy_member_details
					if (!empty($insert_result)) {
						$remark_data[$i] = array(
							'remarks' => $remarks,   // Remark
							'male_date' => $male_date,   // Remark Mail Date
							'fk_policy_id' => $insert_result["lastID"],   // Policy ID
							'fk_staff_id' => $this->staff_id,   // Staff ID
							'fk_user_role_id' => $this->user_role_id,   // User Role ID
						);
					}
					$remark_result = $this->Mquery_model_v3->addQuery($tableName = "policy_remark_details", $remark_data, $return_type = "lastID");
				}
				$folder_name = "policy";
				$dummy_file_name = "";
				if (!empty($_FILES["dummy_file"])) {
					$dummy_file_data = $_FILES["dummy_file"]["name"];
					$dummy_file_img = $this->file_lib->file_upload($img_name = "dummy_file", $directory_name = "./assets/csv_import/".str_replace(" ","_",$this->session->userdata('@_staff_name'))."/".$folder_name, $overwrite = False, $allowed_types = "csv|xls", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = uniqid(), $url = "", $user_session_id = "_Policy_No_");
	
					if ($dummy_file_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["dummy_file_err"]  = $dummy_file_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($dummy_file_img["file_name"] != "") {
						$dummy_file_name = $dummy_file_img["file_name"];
						$dummy_file_size = $dummy_file_img["file_size"];
						$dummy_file_type = $dummy_file_img["file_type"];
					}
				}
				if (!empty($policy_data)) {
					if ($insert_result) {
						$message = "Policy CSV uploaded Successfully !";
						$validator["status"] = true;
						$validator["messages"] = $message;
						echo json_encode($validator);
						die();
					} else {
						$message = "Error while uploading CSV";
						$validator["status"] = false;
						$validator["messages"] = $message;
						echo json_encode($validator);
						die();
					}
				} else {
					$message = "CSV cannot be empty";
					$validator["status"] = false;
					$validator["messages"] = $message;
					echo json_encode($validator);
					die();
				}
			}
		}
	}

	public function spreadsheet_agency_import()
	{
		$validator = array('status' => false, 'messages' => array());
		if (empty($_FILES['dummy_file']['name'])) {
			$message = "CSV Field cannot be empty";
			$validator["message"]["dummy_file_err"] = $message;
			$validator["status"] = false;
			$validator["messages"] = $message;
			echo json_encode($validator);
			die();
		} elseif (!empty($_FILES['dummy_file']['name'])) {
			$upload_file = $_FILES['dummy_file']['name'];
			$extension = pathinfo($upload_file, PATHINFO_EXTENSION);
			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if ($extension == 'xls') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $reader->load($_FILES['dummy_file']['tmp_name']);
			$sheetdata = $spreadsheet->getActiveSheet()->toArray();
			$sheetcount = count($sheetdata);
			if ($sheetcount > 1) {
				for ($i = 1; $i < $sheetcount; $i++) {
					$agency_data = array();
					$company_name = $sheetdata[$i][0];
					$agency_code = $sheetdata[$i][1];
					$agency_name = $sheetdata[$i][2];
					$portal_link = $sheetdata[$i][3];
					$username = $sheetdata[$i][4];
					$password = $sheetdata[$i][5];

					if (!empty($company_name)) {
						$whereArr_company_name["master_company.company_name"] = $company_name;
						$company_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =  "master_company.mcompany_id , master_company.company_name, master_company.short_name", $whereArr = $whereArr_company_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_company.company_name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$company_result = $company_name_query["userData"];
						if (!empty($company_result))
							$company_name = $company_result["mcompany_id"];
					}
					$agency_data[$i] = array(
						'code' => $agency_code,
						'name' => $agency_name,
						'link' => $portal_link,
						'username' => $username,
						'password' => $password,
						'fk_mcompany_id' => $company_name,
						'fk_staff_id' => $this->staff_id,
						'fk_user_role_id' => $this->user_role_id,
					);
					$insert_result = $this->Mquery_model_v3->addQuery($tableName = "master_agency", $agency_data, $return_type = "lastID");
				}
				$folder_name = "agency";
				$dummy_file_name = "";
				if (!empty($_FILES["dummy_file"])) {
					$dummy_file_data = $_FILES["dummy_file"]["name"];
					$dummy_file_img = $this->file_lib->file_upload($img_name = "dummy_file", $directory_name = "./assets/csv_import/".str_replace(" ","_",$this->session->userdata('@_staff_name'))."/".$folder_name, $overwrite = False, $allowed_types = "csv|xls", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = uniqid(), $url = "", $user_session_id = "_Policy_No_");
	
					if ($dummy_file_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["dummy_file_err"]  = $dummy_file_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($dummy_file_img["file_name"] != "") {
						$dummy_file_name = $dummy_file_img["file_name"];
						$dummy_file_size = $dummy_file_img["file_size"];
						$dummy_file_type = $dummy_file_img["file_type"];
					}
				}

				if (!empty($agency_data)) {
					if ($insert_result) {
						$message = "Agency CSV uploaded Successfully !";
						$validator["status"] = true;
						$validator["messages"] = $message;
						echo json_encode($validator);
						die();
					} else {
						$message = "Error while uploading CSV";
						$validator["status"] = false;
						$validator["messages"] = $message;
						echo json_encode($validator);
						die();
					}
				} else {
					$message = "CSV cannot be empty";
					$validator["status"] = false;
					$validator["messages"] = $message;
					echo json_encode($validator);
					die();
				}
			}
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

		$this->data["main_page"] = "master/import/import_section";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	// GST Mater Section End





}
