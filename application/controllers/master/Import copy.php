<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';
require_once APPPATH.'libraries/spout-3.3.0/src/Spout/Autoloader/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
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
		// print_r($all_userdata);die();
		$this->data["title"] = $title = "GST";
	}
	// CSV Mater Section Start

	public function spreadsheet_policy_import()
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
						$client_name = $client_name_result["id"];
				}
				$member_name = $sheetdata[$i][14];

				if (!empty($member_name)) {
					// $member_name_result2 = array();
					// $member_name_result = array();

					$whereArr_member_name2["customermem_tbl.name"] = $member_name;
					$whereArr_member_name2["customermem_tbl.customer_id"] = $client_name;
					$member_name_query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =  "customermem_tbl.id , CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS name , customermem_tbl.email", $whereArr = $whereArr_member_name2, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$member_name_result2 = $member_name_query2["userData"];

					if (!empty($member_name_result2)) {
						$member_name = $member_name_result2["id"];
					} else if (empty($member_name_result2)) {
						$member_name = explode(" ", $member_name);

						$whereArr_member_name["customermem_tbl.name"] = $member_name[0];
						$whereArr_member_name["customermem_tbl.customer_id"] = $client_name;
						$member_name_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =  "customermem_tbl.id , CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS name , customermem_tbl.email", $whereArr = $whereArr_member_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$member_name_result = $member_name_query["userData"];
						if (!empty($member_name_result))
							$member_name = $member_name_result["id"];
						else
							$member_name = 0;
					}
					if (is_string($member_name)) {
						$member_name = 0;
					} else {
						$member_name = $member_name;
					}
					echo $this->db->last_query();
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
				$personal_data[] = array(
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
				);
			}
			print_r($personal_data);
			die();
			if (!empty($personal_data)) {
				$insert_result = $this->Mquery_model_v3->addQuery($tableName = "policy_member_csv_dummy", $personal_data, $return_type = "lastID");
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

	public function policy_import()
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

	function department_exp2()
	{

		$staff_name=str_replace(" ","_",$this->session->userdata('@_staff_name'));
		$user_role_title=str_replace(" ","_",$this->session->userdata('@_user_role_title'));

		$writer = WriterEntityFactory::createCSVWriter();
		//~ echo "testtt2";
		$extension="csv";
		$file_name = $staff_name."_".$user_role_title."_".uniqid().".csv";
		$directory_name = "assets/csvdownloads/".$this->session->userdata('@_staff_name');
		if (!is_dir($directory_name)) {
			mkdir($directory_name, 0777, TRUE);
			chmod($directory_name, 0777);
		}
		$path = realpath(APPPATH."../assets/".$directory_name."/");		
		$directory_path = "assets/".$directory_name."/";
		$file_path = $path."/".$file_name;
		$writer->openToFile($file_path); // write data to a file or to a PHP stream
		
		$serial_num=1;
		$groupByArr = array(
			"master_department.department_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  " master_department.department_name, case master_department.department_status when 1 then 'active' else 'inactive' end department_status", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_department.department_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		
		$header_array=array("SN","Department Name","Status");
		$rowFromValues = WriterEntityFactory::createRowFromArray($header_array);		
		$writer->addRow($rowFromValues);
		
		foreach($result2 as $row)
		{
			$serial_num_array=array("serial_num"=>$serial_num);
			$rowArray=array_merge($serial_num_array,$row);
			$rowArray = array_values($rowArray);
			
			$rowFromValues = WriterEntityFactory::createRowFromArray($rowArray);		
			$writer->addRow($rowFromValues);
			$serial_num++;
		}
		
		$writer->close();
		$custom_filename="Department_".$staff_name."_(".$user_role_title.")_".uniqid();

		$export_data[] = array(
			'create_date' => date('Y-m-d'),   // Remark
			'create_time' => date('H:i:s a'),   // Remark Mail Date
			'file_name' => $custom_filename,   // Policy ID
			'folder_name' => $directory_name,   // Policy ID
			'directory_path' => $directory_path,   // Policy ID
			'fk_staff_id' => $this->session->userdata('@_staff_id'),   // Policy ID
			'fk_user_role_id' => $this->session->userdata('@_user_role_id'),   // Policy ID
		);

		$download_id = $this->Mquery_model_v3->addQuery($tableName = "download_track", $export_data, $return_type = "lastID");
		$this->load->library('Excel_download');
		$this->excel_download->download_file($custom_filename, $extension, $file_path);
	}

	public function department_exp()
	{
		$date = date("d-M-Y");
		$tval = 0;
		$filename = "Department_" . date('M-Y', strtotime($date)) . ".xls";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");

		$groupByArr = array(
			"master_department.department_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_department.department_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];

		// print_r($result2);die();

		$department_exl = '<table border=1><thead><tr><th><center>SN</center></th><th><center>Department Name</center></th><th><center>Status</center></th> </tr></thead><tbody>';
		$i = 1;
		foreach ($result2 as $row) {
			if ($row["department_status"] == 1)
				$department_status = "Active";
			else
				$department_status = "In-Active";
			$department_exl .= '<tr><td><center>' . $i . '</center></td><td><center>' . $row["department_name"] . '</center></td><td><center>' . $department_status . '</center></td></tr>';
			$i++;
		}
		echo $department_exl;
		// $this->load->view('exceldownload');
	}

	public function createExcel()
	{
		$date = date("d-M-Y");
		$fileName = "Department_" . date('M-Y', strtotime($date)) . ".xls";
		// $employeeData = $this->EmployeeModel->employeeList();

		$groupByArr = array(
			"master_department.department_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_id, master_department.department_name, master_department.department_status, master_department.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_department.department_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'SN');
		$sheet->setCellValue('B1', 'Department Name');
		$sheet->setCellValue('C1', 'Status');
		$rows = 2;
		$i = 1;
		foreach ($result2 as $val) {
			if ($val["department_status"] == 1)
				$department_status = "Active";
			else
				$department_status = "In-Active";
			$sheet->setCellValue('A' . $rows, $i);
			$sheet->setCellValue('B' . $rows, $val['department_name']);
			$sheet->setCellValue('C' . $rows, $department_status);
			$rows++;
			$i++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save("upload/" . $fileName);
		header("Content-Type: application/vnd.ms-excel");
		// redirect(base_url() . "/upload/" . $fileName);
	}

	// GST Mater Section End





}
