<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';
require_once APPPATH . 'libraries/spout-3.3.0/src/Spout/Autoloader/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class Export extends Admin_gic_core
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
		$this->staff_name = str_replace(" ", "_", $this->session->userdata('@_staff_name'));
		$this->staff_id = $this->session->userdata('@_staff_id');
		$this->user_role = str_replace(" ", "_", $this->session->userdata('@_user_role_title'));
		$this->user_role_id = $this->session->userdata('@_user_role_id');
		// print_r($all_userdata);die();
		$this->data["title"] = $title = "Export Section";
	}
	// CSV Mater Section Start

	public function index()
	{
		$this->data["download_arr"] = $download_arr = array(
			"0"=>"company_master",
			"1"=>"roles_master",
			"2"=>"staff_master",
			"3"=>"ip_master",
			"4"=>"task_title_master",
			"5"=>"department_master",
			"6"=>"policy_type_master",
			"7"=>"policy_question_master",
			"8"=>"plan_policy_master",
			"9"=>"view_plan_policy_master",
			"10"=>"document_master",
			"11"=>"sub_policy_master",
			"12"=>"gst_master",
			"13"=>"tpa_master",
			"14"=>"sub_agent_master",
			"15"=>"menu_master",
			"16"=>"sub_menu_master",
			"17"=>"child_sub_menu_master",
		);
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

		$this->data["main_page"] = "master/import/export_section";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	function download()
	{
		$export_btn_txt = $this->uri->segment(4);
		$this->load->helper('download');
		if (!empty($export_btn_txt)) {
			if ($export_btn_txt == "1")  // 1:Policy , 2:Agency
				$document_file = "policy_csv_formate.xls";
			elseif ($export_btn_txt == "2")
				$document_file = "agency_csv_formate.xls";

			$data = file_get_contents("./assets/csv_formate/" . $document_file);
			force_download($document_file, $data);
		}
	}

	function master_insert($module_name,  $custom_filename, $staff_name, $directory_path, $staff_id, $user_role_id){
		$export_data[] = array(
			'module_name' => $module_name,   // Module Name
			'file_name' => $custom_filename,   // File name
			'folder_name' => $staff_name,   // Folder Name
			'directory_path' => $directory_path,   // Directory Path
			'fk_staff_id' => $staff_id,   // Staff ID
			'fk_user_role_id' => $user_role_id,   // User Role ID
			'create_date' => date('Y-m-d'),   // Create Date
			'create_time' => date('h:i:s a'),   // Create Time
		);

		$download_id = $this->Mquery_model_v3->addQuery($tableName = "download_track", $export_data, $return_type = "lastID");
	}

	function company_master()
	{
		$module_name = "Company";
		$staff_name = $this->staff_name;
		$user_role_title = $this->user_role;

		$writer = WriterEntityFactory::createCSVWriter();

		$extension = "csv";
		$file_name = $module_name."_".$staff_name . "_" . $user_role_title . "_" . uniqid() . ".csv";
		$directory_name = "assets/csvdownloads/" . $this->staff_name;
		if (!is_dir($directory_name)) {
			mkdir($directory_name, 0777, TRUE);
			chmod($directory_name, 0777);
		}
		$path = realpath(APPPATH . "../assets/csvdownloads/" . $this->staff_name . "/");
		$directory_path = "assets/csvdownloads/" . $this->staff_name . "/";
		$file_path = $path . "/" . $file_name;
		$writer->openToFile($file_path); // write data to a file or to a PHP stream

		$serial_num = 1;
		$groupByArr = array(
			"master_company.mcompany_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.company_name, master_company.short_name,  master_company.common_email, master_company.address, master_company.state , master_company.city, master_company.zipcode, master_company.office_contact, master_company.website, master_company.tollfree_no_1, master_company.tollfree_no_2,master_company.payment_link, master_company.payment_steps, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code,master_company.account_holder_name_1, master_company.account_number_1 , master_company.bank_name_1, master_company.branch_name_1, master_company.ifsc_code_1, master_company.micr_code_1, case master_company.company_status when 1 then 'Active' else 'In-Active' end company_status ", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_company.company_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];

		$header_array = array("SN", "Company Name", "Short Name", "Common Email", "Address", "State", "City", "Pincode", "Office Contact", "Website", "Toll Free No.1", "Toll Free No.2", "Link", "Payment Steps", "Name on Cheque", "Courier Address", "Account Holder 1", "Account Number 1", "Bank Name 1", "Branch Name 1", "IFSC Code 1", "MICR Code 1", "Account Holder 2", "Account Number 2", "Bank Name 2", "Branch Name 2", "IFSC Code 2", "MICR Code 2", "Status");
		$rowFromValues = WriterEntityFactory::createRowFromArray($header_array);
		$writer->addRow($rowFromValues);

		foreach ($result2 as $row) {
			$serial_num_array = array("serial_num" => $serial_num);
			$rowArray = array_merge($serial_num_array, $row);
			$rowArray = array_values($rowArray);

			$rowFromValues = WriterEntityFactory::createRowFromArray($rowArray);
			$writer->addRow($rowFromValues);
			$serial_num++;
		}

		$writer->close();
		$custom_filename = $module_name."_".$staff_name . "_" . $user_role_title . "_" . uniqid() . ".csv";
		$this->master_insert($module_name,  $custom_filename, $staff_name, $directory_path, $this->staff_id, $this->user_role_id);
		$this->load->library('Excel_download');
		$this->excel_download->download_file($custom_filename, $extension, $file_path);
	}

	function department_master()
	{
		$module_name = "Department";
		$staff_name = $this->staff_name;
		$user_role_title = $this->user_role;

		$writer = WriterEntityFactory::createCSVWriter();

		$extension = "csv";
		$file_name = $module_name."_".$staff_name . "_" . $user_role_title . "_" . uniqid() . ".csv";
		$directory_name = "assets/csvdownloads/" . $this->staff_name;
		if (!is_dir($directory_name)) {
			mkdir($directory_name, 0777, TRUE);
			chmod($directory_name, 0777);
		}
		$path = realpath(APPPATH . "../assets/csvdownloads/" . $this->staff_name . "/");
		$directory_path = "assets/csvdownloads/" . $this->staff_name . "/";
		$file_path = $path . "/" . $file_name;
		$writer->openToFile($file_path); // write data to a file or to a PHP stream

		$serial_num = 1;
		$groupByArr = array(
			"master_department.department_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames =  "master_department.department_name, case master_department.department_status when 1 then 'Active' else 'In-Active' end department_status", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_department.department_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];

		$header_array = array("SN", "Department Name", "Status");
		$rowFromValues = WriterEntityFactory::createRowFromArray($header_array);
		$writer->addRow($rowFromValues);

		foreach ($result2 as $row) {
			$serial_num_array = array("serial_num" => $serial_num);
			$rowArray = array_merge($serial_num_array, $row);
			$rowArray = array_values($rowArray);

			$rowFromValues = WriterEntityFactory::createRowFromArray($rowArray);
			$writer->addRow($rowFromValues);
			$serial_num++;
		}

		$writer->close();
		$custom_filename = $module_name."_".$staff_name . "_" . $user_role_title . "_" . uniqid() . ".csv";
		$this->master_insert($module_name,  $custom_filename, $staff_name, $directory_path, $this->staff_id, $this->user_role_id);
		$this->load->library('Excel_download');
		$this->excel_download->download_file($custom_filename, $extension, $file_path);
	}

	// GST Mater Section End





}
