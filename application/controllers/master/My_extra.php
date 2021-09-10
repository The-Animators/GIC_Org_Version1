<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class My_extra extends Admin_gic_core
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

		$this->data["title"] = $title = "GST";
	}
	// CSV Mater Section Start

	public function spreadsheet_import()
	{
		$validator = array('status' => false, 'messages' => array());
		$upload_file = $_FILES['dummy_file']['name'];
		// print_r($upload_file);die();
		$extension = pathinfo($upload_file, PATHINFO_EXTENSION);
		// print_r($extension);die();
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
				$personal_data = array();
				$remark_data = array();
				$serial_no_year = $sheetdata[$i][0];
				$serial_no_month = $sheetdata[$i][1];
				$serial_no = $sheetdata[$i][2];
				$company_name = $sheetdata[$i][3];

				if (!empty($company_name)) {
					$whereArr_company_name["master_company.company_name"] = $company_name;
					$company_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =  "master_company.mcompany_id , master_company.company_name, master_company.short_name", $whereArr = $whereArr_company_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_company.company_name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$company_result = $company_name_query["userData"];
					// print_r($company_result);die();
					if (!empty($company_result))
						$company_name = $company_result["mcompany_id"];
				}

				$department_name = $sheetdata[$i][4];

				if (!empty($department_name)) {
					$whereArr_department_name["master_department.department_name"] = $department_name;
					$department_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id , master_department.department_name", $whereArr = $whereArr_department_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_department.department_name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$department_result = $department_name_query["userData"];
					if (!empty($department_result))
						$department_name = $department_result["department_id"];
				}
				$policy_name = $sheetdata[$i][5];
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

				$policy_type = $sheetdata[$i][6];
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

				$agency_name = $sheetdata[$i][7];
				if (!empty($agency_name)) {
					$whereArr_agency_name["master_agency.name"] = $agency_name;
					$agency_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames =  "master_agency.magency_id , master_agency.name , master_agency.code", $whereArr = $whereArr_agency_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_agency.name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$agency_result = $agency_name_query["userData"];
					// echo $this->db->last_query();
					// print_r($agency_result);die();
					if (!empty($agency_result))
						$agency_name = $agency_result["magency_id"];
				}
				$sub_agent_name = $sheetdata[$i][8];
				if (!empty($sub_agent_name)) {
					$whereArr_sub_agent["master_sub_agent.sub_agent_name"] = $sub_agent_name;
					$sub_agent_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =  "master_sub_agent.sub_agent_id , master_sub_agent.sub_agent_name , master_sub_agent.sub_agent_code", $whereArr = $whereArr_sub_agent, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_sub_agent.sub_agent_name"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$sub_agent_result = $sub_agent_query["userData"];
					if (!empty($sub_agent_result))
						$sub_agent_name = $sub_agent_result["sub_agent_id"];
				}
				$mode_of_premimum = $sheetdata[$i][9];
				$date_from = $sheetdata[$i][10];
				$date_to = $sheetdata[$i][11];
				$date_commenced = $sheetdata[$i][12];
				$client_name = $sheetdata[$i][13];
				if (!empty($client_name)) {
					$whereArr_client_name["customer_tbl.grpname"] = $client_name;
					$client_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =  "customer_tbl.id , customer_tbl.grpname , customer_tbl.reffered_by", $whereArr = $whereArr_client_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("customer_tbl.grpname"), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$client_name_result = $client_name_query["userData"];
					if (!empty($client_name_result))
						$client_name = (int)$client_name_result["id"];

					// print_r($client_name);die();

					// echo $this->db->last_query();
				}
				if (is_string($client_name)) {
					$client_name = 0;
				} else {
					$client_name = $client_name;
				}
				$member_name = $sheetdata[$i][14];

				if (!empty($member_name)) {
					// $member_name_result2 = array();
					// $member_name_result = array();
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
					// echo $this->db->last_query();
					// print_r($member_name_result2.'$member_name_result2');
					// print_r($member_name_result . '$member_name_result');
					// print($member_name.'$member_name');
					// die();
				}
				$reg_mobile = $sheetdata[$i][15];
				$reg_email = $sheetdata[$i][16];
				$policy_no = $sheetdata[$i][17];
				$policy_upload = $sheetdata[$i][18];
				$quotation_date = $sheetdata[$i][19];
				$quotation_upload = $sheetdata[$i][20];
				$quotation_male_link = $sheetdata[$i][21];
				$floater_policy_type = $sheetdata[$i][22];
				$family_size = $sheetdata[$i][23];
				$addition_of_more_child = $sheetdata[$i][24];
				$remarks = $sheetdata[$i][25];
				$male_date = $sheetdata[$i][26];
				$personal_data[$i] = array(
					'serial_no_year' => $serial_no_year,
					'serial_no_month' => $serial_no_month,
					'serial_no' => $serial_no,
					'fk_company_id' => $company_name,
					'fk_department_id' => $department_name,
					'fk_policy_type_id' => $policy_name,
					'policy_type' => $policy_type,
					'fk_agency_id' => $agency_name,
					'fk_sub_agent_id' => $sub_agent_name,
					'mode_of_premimum' => $mode_of_premimum,
					'date_from' => $date_from,
					'date_to' => $date_to,
					'date_commenced' => $date_commenced,
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
					'fk_staff_id' => $this->session->userdata('@_staff_id'),
					'fk_user_role_id' => $this->session->userdata('@_user_role_id'),
				);
				// print_r($client_name);print_r($member_name);print_r($personal_data);die();
				$insert_result = $this->Mquery_model_v3->addQuery($tableName = "policy_member_csv_dummy", $personal_data, $return_type = "lastID");

				if (!empty($insert_result)) {
					$remark_data[$i] = array(
						'remarks' => $remarks,   // Remark
						'male_date' => $male_date,   // Remark Mail Date
						'fk_policy_id' => $insert_result["lastID"],   // Policy ID
						'fk_staff_id' => $this->session->userdata('@_staff_id'),   // Policy ID
						'fk_user_role_id' => $this->session->userdata('@_user_role_id'),   // Policy ID
					);
				}
				$remark_result = $this->Mquery_model_v3->addQuery($tableName = "policy_remark_details_csv_dummy", $remark_data, $return_type = "lastID");
			}
			// print_r($personal_data);
			// die();
			// $insert_result = $this->Mquery_model_v3->addQuery($tableName = "policy_member_csv_dummy", $personal_data, $return_type = "lastID");
			// for ($i = 1; $i < $sheetcount; $i++) {

			// 	if (!empty($insert_result)) {
			// 		$remarks = $sheetdata[$i][25];
			// 		$male_date = $sheetdata[$i][26];
			// 		$remark_data[] = array(
			// 			'remarks' => $remarks,   // Remark
			// 			'male_date' => $male_date,   // Remark Mail Date
			// 			'fk_policy_id' => $i,   // Policy ID
			// 		);
			// 	}
			// }
			// $remark_result = $this->Mquery_model_v3->addQuery($tableName = "policy_remark_details_csv_dummy", $remark_data, $return_type = "lastID");

			if (!empty($personal_data)) {
				
				if ($insert_result) {
					$message = "CSV uploaded Successfully !";
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

	function validate_csv()
	{
		$mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv');
		if ($_FILES["dummy_file"]["name"] == "" && in_array($_FILES['dummy_file']['type'], $mimes)) {
			$this->form_validation->set_message('validate_csv', 'Select a Valid file File to Upload');
			return false;
		} else
			return true;
	}

	function upload_csv()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('test', 'test', 'required');
		$this->form_validation->set_rules('dummy_file', "CSV", 'callback_validate_csv');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"test_err" => form_error("test"),
				"dummy_file_err" => form_error("dummy_file"),
			);
		} else {
			// $this->db->trans_start();	//Start Transaction	
			if (!empty($_FILES["dummy_file"])) {
				$dummy_file_data = $_FILES["dummy_file"]["name"];

				$dummy_file_img = $this->file_lib->file_upload($img_name = "dummy_file", $directory_name = "./assets/my_extra_csv/dummy_csv/", $overwrite = False, $allowed_types = "csv|xls", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "Priyanshu_Singh_Dummy-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

				if ($dummy_file_img["error"] != "") {
					$validator["status"] = false;
					$validator["messages"]["dummy_file_err"]  = $dummy_file_img["error"];
					echo json_encode($validator);
					die();
				} elseif ($dummy_file_img["file_name"] != "") {
					$dummy_file_file_name = $dummy_file_img["file_name"];
					$dummy_file_file_size = $dummy_file_img["file_size"];
					$dummy_file_file_type = $dummy_file_img["file_type"];
					$dummy_file_full_path = $dummy_file_img["full_path"];
				}
			}
			// print_r($dummy_file_full_path);die();
			$csv_file_name = $dummy_file_file_name;
			$csv_file_path = $dummy_file_full_path;
			$fp = file($csv_file_path);

			$i = 0;
			$column_heading_flag = TRUE;
			$csv_line = array();
			$csv_array = array();
			$file = fopen($csv_file_path, "r");
			$personal_data = array();
			$csv_line = array();

			$error_count = 0;

			while (!feof($file)) {
				$csv_line = fgetcsv($file);
				$csv_array[$i] = $csv_line;

				if ($i == 0) {
					if (trim(strtolower($csv_line[0])) != strtolower("First Name"))
						$column_heading_flag = FALSE;
					elseif (trim(strtolower($csv_line[1])) != strtolower("Middle Name"))
						$column_heading_flag = FALSE;
					elseif (trim(strtolower($csv_line[2])) != strtolower("Last Name"))
						$column_heading_flag = FALSE;

					if ($column_heading_flag == FALSE) {
						fclose($file);
						$message = "The CSV file you are trying to upload is not in correct format, please check the format and try again.";
						unlink($csv_file_path);
						$validator["status"] = false;
						$validator["messages"] = $message;
						echo json_encode($validator);
						die();
					}
				} else {
					if (!empty($csv_array[$i][0])) {

						if (!empty($csv_array[$i][0]) && !empty($csv_array[$i][1])) {
							$personal_data[] = array(
								'fname' => $csv_array[$i][0],
								'mname' => $csv_array[$i][1],
								'lname' => $csv_array[$i][2],
							);
						} else {
							array_push($personal_error_data, ($i + 1));
							$error_count++;
						}
					}
				}
				$i++;
			}

			fclose($file);
			// $this->db->trans_complete();		// Transaction End	
			if (!empty($personal_data)) {
				$insert_result = $this->Mquery_model_v3->addQuery($tableName = "csv_dummy_test", $personal_data, $return_type = "lastID");
				if ($insert_result) {
					$message = "CSV uploaded Successfully !";
					$validator["status"] = true;
					$validator["messages"] = $message;
					unlink($csv_file_path);
					echo json_encode($validator);
					die();
				} else {
					$message = "Error while uploading CSV";
					$validator["status"] = false;
					$validator["messages"] = $message;
					unlink($csv_file_path);
					echo json_encode($validator);
					die();
				}
			} else {
				$message = "CSV cannot be empty";
				$validator["status"] = false;
				$validator["messages"] = $message;
				unlink($csv_file_path);
				echo json_encode($validator);
				die();
			}
		}
	}

	public function dummy_csv_download()
	{
		$date = date("d-M-Y");
		// $this->load->library("download");
		$filename = "Dummy Excel-" . date('d-m-Y-h-i-s-a', strtotime($date)) . ".csv";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "csv_dummy_test", $colNames =  "csv_dummy_test.csv_id, csv_dummy_test.fname, csv_dummy_test.mname, csv_dummy_test.lname", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];

		// print_r($result);die();

		$dummy_excel = '<table border="1"><thead><tr><th>First Name</th><th>Middle Name</th><th>Last Name</th> </tr></thead><tbody>';
		$i = 1;
		if (!empty($result)) {
			foreach ($result as $row) {
				$dummy_excel .= '<tr><td>' . $row["fname"] . '</td><td>' . $row["mname"] . '</td><td>' . $row["lname"] . '</td></tr>';
				$i++;
			}
		}
		echo $dummy_excel;
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

		$this->data["main_page"] = "master/gst/my_extra";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	function upload_policy_csv()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('test', 'test', 'required');
		$this->form_validation->set_rules('dummy_file', "CSV", 'callback_validate_csv');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"test_err" => form_error("test"),
				"dummy_file_err" => form_error("dummy_file"),
			);
		} else {
			// $this->db->trans_start();	//Start Transaction	
			if (!empty($_FILES["dummy_file"])) {
				$dummy_file_data = $_FILES["dummy_file"]["name"];

				$dummy_file_img = $this->file_lib->file_upload($img_name = "dummy_file", $directory_name = "./assets/my_extra_csv/dummy_csv/", $overwrite = False, $allowed_types = "csv|xls|xlsx", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "Priyanshu_Singh_Dummy-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

				if ($dummy_file_img["error"] != "") {
					$validator["status"] = false;
					$validator["messages"]["dummy_file_err"]  = $dummy_file_img["error"];
					echo json_encode($validator);
					die();
				} elseif ($dummy_file_img["file_name"] != "") {
					$dummy_file_file_name = $dummy_file_img["file_name"];
					$dummy_file_file_size = $dummy_file_img["file_size"];
					$dummy_file_file_type = $dummy_file_img["file_type"];
					$dummy_file_full_path = $dummy_file_img["full_path"];
				}
			}
			// print_r($dummy_file_full_path);die();
			$csv_file_name = $dummy_file_file_name;
			$csv_file_path = $dummy_file_full_path;
			$fp = file($csv_file_path);

			$i = 0;
			$column_heading_flag = TRUE;
			$csv_line = array();
			$csv_array = array();
			$file = fopen($csv_file_path, "r");
			$personal_data = array();
			$csv_line = array();

			$error_count = 0;

			while (!feof($file)) {
				$csv_line = fgetcsv($file);
				$csv_array[$i] = $csv_line;

				if ($i == 0) {
					if (trim(strtolower($csv_line[0])) != strtolower("Year")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[1])) != strtolower("Month")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[2])) != strtolower("Serial No.")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[3])) != strtolower("Company Name")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[4])) != strtolower("Department Name")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[5])) != strtolower("Policy Name")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[6])) != strtolower("Policy Type")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[7])) != strtolower("Agency")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[8])) != strtolower("Sub-Agency")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[9])) != strtolower("Mode Of Premium")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[10])) != strtolower("Date From")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[11])) != strtolower("Date To")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[12])) != strtolower("Date Commenced")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[13])) != strtolower("Group Name")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[14])) != strtolower("Policy Holder Name")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[15])) != strtolower("Reg. Mobile No.")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[16])) != strtolower("Reg. Email Id")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[17])) != strtolower("Policy No.")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[18])) != strtolower("Policy Upload Doc")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[19])) != strtolower("Quotation Date")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[20])) != strtolower("Quotation Upload Doc")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[21])) != strtolower("Quotation Link")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[22])) != strtolower("Sub Policy Name")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[23])) != strtolower("Family Size")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[24])) != strtolower("Addition Of Child")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[25])) != strtolower("Remark")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[26])) != strtolower("Remark Mail Date")) {
						$column_heading_flag = FALSE;
					}
					print_r($csv_line);
					die();
					if ($column_heading_flag == FALSE) {
						fclose($file);
						$message = "The CSV file you are trying to upload is not in correct format, please check the format and try again.";
						// unlink($csv_file_path);
						$validator["status"] = false;
						$validator["messages"] = $message;
						echo json_encode($validator);
						die();
					}
				} else {
					if (!empty($csv_array[$i][0])) {

						if (!empty($csv_array[$i][0]) && !empty($csv_array[$i][1])) {
							$personal_data[] = array(
								'serial_no_year' => $csv_array[$i][0],   // Year
								'serial_no_month' => $csv_array[$i][1],   // Month
								'serial_no' => $csv_array[$i][2],   // Serial No.
								'fk_company_id' => $csv_array[$i][3],   // Company Name
								'fk_department_id' => $csv_array[$i][4],   // Department Name
								'fk_policy_type_id' => $csv_array[$i][5],   // Policy Name
								'policy_type' => $csv_array[$i][6],   // Policy Type
								'fk_agency_id' => $csv_array[$i][7],   // Agency
								'fk_sub_agent_id' => $csv_array[$i][8],   // Sub-Agency
								'mode_of_premimum' => $csv_array[$i][9],   // Mode Of Premium
								'date_from' => $csv_array[$i][10],   // Date From
								'date_to' => $csv_array[$i][11],   // Date To
								'date_commenced' => $csv_array[$i][12],   // Date Commenced
								'fk_client_id' => $csv_array[$i][13],   // Group Name
								'fk_cust_member_id' => $csv_array[$i][14],   // Policy Holder Name
								'reg_mobile' => $csv_array[$i][15],   // Reg. Mobile No.
								'reg_email' => $csv_array[$i][16],   // Reg. Email Id
								'policy_no' => $csv_array[$i][17],   // Policy No.
								'policy_upload' => $csv_array[$i][18],   // Policy Upload Doc
								'quotation_date' => $csv_array[$i][19],   // Quotation Date
								'quotation_upload' => $csv_array[$i][20],   // Quotation Upload Doc
								'quotation_male_link' => $csv_array[$i][21],   // Quotation Link
								'floater_policy_type' => $csv_array[$i][22],   // Sub Policy Name
								'family_size' => $csv_array[$i][23],   // Family Size
								'addition_of_more_child' => $csv_array[$i][24],   // Addition Of Child
								'remarks' => $csv_array[$i][25],   // Remark
								'male_date' => $csv_array[$i][26],   // Remark Mail Date
							);

							$remark_data[] = array(
								'remarks' => $csv_array[$i][25],   // Remark
								'male_date' => $csv_array[$i][26],   // Remark Mail Date
								'fk_policy_id' => $csv_array[$i],   // Policy ID
							);
							$remark_result = $this->Mquery_model_v3->addQuery($tableName = "policy_remark_details_csv_dummy", $remark_data, $return_type = "lastID");
						} else {
							array_push($personal_error_data, ($i + 1));
							$error_count++;
						}
					}
				}
				$i++;
			}

			fclose($file);
			// $this->db->trans_complete();		// Transaction End	
			if (!empty($personal_data)) {
				$insert_result = $this->Mquery_model_v3->addQuery($tableName = "policy_member_csv_dummy", $personal_data, $return_type = "lastID");
				if ($insert_result) {
					$message = "CSV uploaded Successfully !";
					$validator["status"] = true;
					$validator["messages"] = $message;
					unlink($csv_file_path);
					echo json_encode($validator);
					die();
				} else {
					$message = "Error while uploading CSV";
					$validator["status"] = false;
					$validator["messages"] = $message;
					unlink($csv_file_path);
					echo json_encode($validator);
					die();
				}
			} else {
				$message = "CSV cannot be empty";
				$validator["status"] = false;
				$validator["messages"] = $message;
				unlink($csv_file_path);
				echo json_encode($validator);
				die();
			}
		}
	}

	function upload_policy_csv_test()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('test', 'test', 'required');
		$this->form_validation->set_rules('dummy_file', "CSV", 'callback_validate_csv');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"test_err" => form_error("test"),
				"dummy_file_err" => form_error("dummy_file"),
			);
		} else {
			// $this->db->trans_start();	//Start Transaction	
			if (!empty($_FILES["dummy_file"])) {
				$dummy_file_data = $_FILES["dummy_file"]["name"];

				$dummy_file_img = $this->file_lib->file_upload($img_name = "dummy_file", $directory_name = "./assets/my_extra_csv/dummy_csv/", $overwrite = False, $allowed_types = "csv|xls|xlsx", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "Priyanshu_Singh_Dummy-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

				if ($dummy_file_img["error"] != "") {
					$validator["status"] = false;
					$validator["messages"]["dummy_file_err"]  = $dummy_file_img["error"];
					echo json_encode($validator);
					die();
				} elseif ($dummy_file_img["file_name"] != "") {
					$dummy_file_file_name = $dummy_file_img["file_name"];
					$dummy_file_file_size = $dummy_file_img["file_size"];
					$dummy_file_file_type = $dummy_file_img["file_type"];
					$dummy_file_full_path = $dummy_file_img["full_path"];
				}
			}
			// print_r($dummy_file_full_path);die();
			$csv_file_name = $dummy_file_file_name;
			$csv_file_path = $dummy_file_full_path;
			$fp = file($csv_file_path);

			$i = 0;
			$column_heading_flag = TRUE;
			$csv_line = array();
			$csv_array = array();
			$file = fopen($csv_file_path, "r");
			$personal_data = array();
			$csv_line = array();

			$error_count = 0;

			while (!feof($file)) {
				$csv_line = fgetcsv($file);
				$csv_array[$i] = $csv_line;

				if ($i == 0) {
					if (trim(strtolower($csv_line[0])) != strtolower("Year")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[1])) != strtolower("Month")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[2])) != strtolower("Serial No.")) {
						$column_heading_flag = FALSE;
					} elseif (trim(strtolower($csv_line[3])) != strtolower("Company Name")) {
						$column_heading_flag = FALSE;
					}
					// print_r($csv_line);die();
					if ($column_heading_flag == FALSE) {
						fclose($file);
						$message = "The CSV file you are trying to upload is not in correct format, please check the format and try again.";
						// unlink($csv_file_path);
						$validator["status"] = false;
						$validator["messages"] = $message;
						echo json_encode($validator);
						die();
					}
				} else {
					if (!empty($csv_array[$i][0])) {

						if (!empty($csv_array[$i][0]) && !empty($csv_array[$i][1])) {
							$personal_data[] = array(
								'serial_no_year' => $csv_array[$i][0],   // Year
								'serial_no_month' => $csv_array[$i][1],   // Month
								'serial_no' => $csv_array[$i][2],   // Serial No.
								'fk_company_id' => $csv_array[$i][3],   // Company Name
							);
						} else {
							array_push($personal_error_data, ($i + 1));
							$error_count++;
						}
					}
				}
				$i++;
			}

			fclose($file);
			// $this->db->trans_complete();		// Transaction End	
			if (!empty($personal_data)) {
				$insert_result = $this->Mquery_model_v3->addQuery($tableName = "policy_member_csv_dummy", $personal_data, $return_type = "lastID");
				if ($insert_result) {
					$message = "CSV uploaded Successfully !";
					$validator["status"] = true;
					$validator["messages"] = $message;
					unlink($csv_file_path);
					echo json_encode($validator);
					die();
				} else {
					$message = "Error while uploading CSV";
					$validator["status"] = false;
					$validator["messages"] = $message;
					unlink($csv_file_path);
					echo json_encode($validator);
					die();
				}
			} else {
				$message = "CSV cannot be empty";
				$validator["status"] = false;
				$validator["messages"] = $message;
				unlink($csv_file_path);
				echo json_encode($validator);
				die();
			}
		}
	}

	// GST Mater Section End





}
