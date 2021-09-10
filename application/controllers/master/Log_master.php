<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_master extends Admin_gic_core
{

	function __construct()
	{
		parent::__construct();
		//Templete	
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "summernote", "date_picker");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "summernote", "date_picker");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$all_userdata = $this->session->all_userdata();
		$this->data["title"] = $title = "Login Track";
	}

	// Login Tracker Section Start

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

		$this->data["main_page"] = "master/log_master/log_track";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_login_track()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_staff = $this->input->post("filter_staff");
		$filter_user_role = $this->input->post("filter_user_role");
		$filter_login_type = $this->input->post("filter_login_type");
		$filter_global_type = $this->input->post("filter_global_type");

		$result2 = array();
		$whereArr["DATE_FORMAT(master_login_track.log_date,'%m-%Y')"] = date('m-Y');
		$whereArr["master_login_track.message !="] = "Default Entry";
		// $whereArr["master_login_track.off_day !="] = 1;
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_login_track.log_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(master_login_track.log_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(master_login_track.log_date,'%m')"] = $filter_month;
			}
			if (!empty($filter_staff))
				$whereArr["master_login_track.fk_staff_id"] = $filter_staff;
			if (!empty($filter_user_role))
				$whereArr["master_login_track.fk_user_role_id"] = $filter_user_role;
			if (!empty($filter_login_type)) {
				if ($filter_login_type == 1)
					$filter_login_type = 1; // Login
				else if ($filter_login_type == 2)
					$filter_login_type = 0; // Log Out
				else if ($filter_login_type == 3)
					$filter_login_type = 2; // Login Failed
				$whereArr["master_login_track.log_type"] = $filter_login_type;
			}
			if (!empty($filter_global_type)) {
				if ($filter_global_type == 1)
					$filter_global_type = 1; // Global
				else if ($filter_global_type == 2)
					$filter_global_type = 2; // Local
				$whereArr["master_login_track.type"] = $filter_global_type;
			}

			$validator = array('status' => false, 'messages' => array());
			$joins_main[] = array("tbl" => "staff", "condtn" => "master_login_track.fk_staff_id = staff.staff_id", "type" => "left");
			$joins_main[] = array("tbl" => "user_roles", "condtn" => "master_login_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_login_track", $colNames =  "master_login_track.log_track_id , master_login_track.log_type, master_login_track.log_action_details, master_login_track.fk_staff_id, master_login_track.fk_user_role_id, master_login_track.ip_address, master_login_track.message, master_login_track.pc_ip_address, master_login_track.type, master_login_track.user_name, master_login_track.password, DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y') as log_date, master_login_track.log_time, DATE_FORMAT(master_login_track.create_date,'%d-%m-%Y h:i:s a') as create_date,user_roles.user_role_title,staff.staff_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_login_track_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_login_track_data"] = $total_login_track_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_login_track_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_login_track_List()
	{
		$validator = array('status' => false, 'messages' => array());
		$whereArr["DATE_FORMAT(master_login_track.log_date,'%m-%Y')"] = date('m-Y');
		$whereArr["master_login_track.message !="] = "Default Entry";
		$joins_main[] = array("tbl" => "staff", "condtn" => "master_login_track.fk_staff_id = staff.staff_id", "type" => "left");
		$joins_main[] = array("tbl" => "user_roles", "condtn" => "master_login_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_login_track", $colNames =  "master_login_track.log_track_id , master_login_track.log_type, master_login_track.log_action_details, master_login_track.fk_staff_id, master_login_track.fk_user_role_id, master_login_track.ip_address, master_login_track.message, master_login_track.pc_ip_address, master_login_track.type, master_login_track.user_name, master_login_track.password, DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y') as log_date, master_login_track.log_time, DATE_FORMAT(master_login_track.create_date,'%d-%m-%Y h:i:s a') as create_date,user_roles.user_role_title,staff.staff_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_login_track_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_login_track_data"] = $total_login_track_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_login_track_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function attendence()
	{
		// $current_date = date('Y-m-d');
		// $dayName = date('w', strtotime($current_date));
		// $dayName = date('L');
		// $dayName = date('l');

		// $today_day_name = getDayName($dayName);
		$MAC = exec('getmac');
		$MAC = strtok($MAC, ' ');
		$host_name_local_machine = gethostname();
		// echo $localIP = getHostByName(getHostName());echo $_SERVER['REMOTE_ADDR'];die();
		// $computerId = $_SERVER['HTTP_USER_AGENT'].$_SERVER['LOCAL_ADDR'].$_SERVER['LOCAL_PORT'].$_SERVER['REMOTE_ADDR'];
		//  print_r($current_date);
		//  print_r($dayName);
		//  print_r($MAC);
		//  die();

		$this->data["title"] = $title = "Attendance Track";
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

		$this->data["main_page"] = "master/log_master/attendence_List";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_atendence_track()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_staff = $this->input->post("filter_staff");
		$filter_user_role = $this->input->post("filter_user_role");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_login_track.log_date",
			"master_login_track.fk_staff_id",
		);

		$result2 = array();
		$whereArr["DATE_FORMAT(master_login_track.log_date,'%m-%Y')"] = date('m-Y');
		$whereArr["master_login_track.log_type"] = 1;
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_login_track.log_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_login_track.log_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(master_login_track.log_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(master_login_track.log_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(master_login_track.log_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(master_login_track.log_date,'%d')"] = $filter_day;
			}
			if (!empty($filter_staff))
				$whereArr["master_login_track.fk_staff_id"] = $filter_staff;
			if (!empty($filter_user_role))
				$whereArr["master_login_track.fk_user_role_id"] = $filter_user_role;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 2; // Absent
				else if ($filter_status == 2)
					$filter_status = 1; // Present
				$whereArr["master_login_track.off_day"] = $filter_status;
			}

			// if ($filter_status == 1){
			$validator = array('status' => false, 'messages' => array());
			$joins_main[] = array("tbl" => "staff", "condtn" => "master_login_track.fk_staff_id = staff.staff_id", "type" => "left");
			$joins_main[] = array("tbl" => "user_roles", "condtn" => "master_login_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_login_track", $colNames =  "master_login_track.log_track_id , master_login_track.log_type, master_login_track.log_action_details, master_login_track.fk_staff_id, master_login_track.fk_user_role_id, master_login_track.ip_address, master_login_track.message, master_login_track.pc_ip_address, master_login_track.type, master_login_track.user_name, master_login_track.password, DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y') as log_date, master_login_track.log_time, master_login_track.halfday_fullday, TIME_FORMAT(master_login_track.log_time,'%h:%i:%s') as log_time2, DATE_FORMAT(master_login_track.create_date,'%d-%m-%Y h:i:s a') as create_date,user_roles.user_role_title,staff.staff_name, DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj, staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar ,master_login_track.off_day", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_atendence_track_data = count($result2);
			// }else{
			// 	$result2 = array();
			// }
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_atendence_track_data"] = $total_atendence_track_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_atendence_track_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_attendence_List()
	{
		$validator = array('status' => false, 'messages' => array());

		$groupByArr = array(
			"master_login_track.log_date",
			"master_login_track.fk_staff_id",
		);

		$whereArr["DATE_FORMAT(master_login_track.log_date,'%m-%Y')"] = date('m-Y');
		$whereArr["master_login_track.log_type"] = 1;

		$joins_main[] = array("tbl" => "staff", "condtn" => "master_login_track.fk_staff_id = staff.staff_id", "type" => "left");
		$joins_main[] = array("tbl" => "user_roles", "condtn" => "master_login_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_login_track", $colNames =  "master_login_track.log_track_id , master_login_track.log_type, master_login_track.log_action_details, master_login_track.fk_staff_id, master_login_track.fk_user_role_id, master_login_track.ip_address, master_login_track.message, master_login_track.pc_ip_address, master_login_track.type, master_login_track.user_name, master_login_track.password, DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y') as log_date, master_login_track.log_time, master_login_track.halfday_fullday, TIME_FORMAT(master_login_track.log_time,'%h:%i:%s') as log_time2, DATE_FORMAT(master_login_track.create_date,'%d-%m-%Y h:i:s a') as create_date,user_roles.user_role_title,staff.staff_name, DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj, staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar ,master_login_track.off_day", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_atendence_track_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_atendence_track_data"] = $total_atendence_track_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_atendence_track_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_attendence_holiday()
	{
		$this->data["title"] = $title = "Attendance Track";
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$this->db->trans_start();	//Start Transaction	
			$log_track_id_arr = $this->input->post("log_track_id_arr");
			$halfday_fullday = $this->input->post("halfday_fullday");
			for ($i = 0; $i < count($log_track_id_arr); $i++) {
				$updateArr[$i] = array(
					"log_track_id" => $log_track_id_arr[$i],
					"modify_log_date" => date('Y-m-d'),
					"modify_log_time" => date('h-i-s a'),
					"halfday_fullday" => $halfday_fullday,
				);
				$this->db->where_in("master_login_track.log_track_id", $log_track_id_arr[$i]);
				$this->db->update_batch('master_login_track', $updateArr, 'log_track_id');
			}

			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Error Occured while Update " . $this->data["title"];
			} else {
				$validator["status"] = true;
				$validator["message"] = $this->data["title"] . " Details Updated Successfully.";
			}
			echo json_encode($validator);
		}
	}

	public function update_present_absent()
	{
		$this->data["title"] = $title = "Attendance Track";
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$this->db->trans_start();	//Start Transaction	
			$log_track_id_arr = $this->input->post("log_track_id_arr");
			$off_day = $this->input->post("off_day");

			if ($off_day == 0)
				$off_day_status = 2;
			elseif ($off_day == 1)
				$off_day_status = 1;

			for ($i = 0; $i < count($log_track_id_arr); $i++) {
				$updateArr[$i] = array(
					"log_track_id" => $log_track_id_arr[$i],
					"modify_log_date" => date('Y-m-d'),
					"modify_log_time" => date('h-i-s a'),
					"off_day" => $off_day_status,
				);
				$this->db->where_in("master_login_track.log_track_id", $log_track_id_arr[$i]);
				$this->db->update_batch('master_login_track', $updateArr, 'log_track_id');
			}

			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Error Occured while Update " . $this->data["title"];
			} else {
				$validator["status"] = true;
				$validator["message"] = $this->data["title"] . " Details Updated Successfully.";
			}
			echo json_encode($validator);
		}
	}

	public function get_attendence_current_date_List()
	{
		$validator = array('status' => false, 'messages' => array());

		$groupByArr = array(
			"master_login_track.log_date",
			"master_login_track.fk_staff_id",
		);

		$whereArr["DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y')"] = date('d-m-Y');
		$whereArr["master_login_track.log_type"] = 1;

		$joins_main[] = array("tbl" => "staff", "condtn" => "master_login_track.fk_staff_id = staff.staff_id", "type" => "left");
		$joins_main[] = array("tbl" => "user_roles", "condtn" => "master_login_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_login_track", $colNames =  "master_login_track.log_track_id , master_login_track.log_type, master_login_track.log_action_details, master_login_track.fk_staff_id, master_login_track.fk_user_role_id, master_login_track.ip_address, master_login_track.message, master_login_track.pc_ip_address, master_login_track.type, master_login_track.user_name, master_login_track.password, DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y') as log_date, master_login_track.log_time, master_login_track.halfday_fullday, TIME_FORMAT(master_login_track.log_time,'%h:%i:%s') as log_time2, DATE_FORMAT(master_login_track.create_date,'%d-%m-%Y h:i:s a') as create_date,user_roles.user_role_title,staff.staff_name, DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj, staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar ,master_login_track.off_day", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_atendence_track_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_atendence_track_data"] = $total_atendence_track_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_atendence_track_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function attendence_profile()
	{

		$this->data["title"] = $title = "Staff Attendance Profile";
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

		$this->data["main_page"] = "master/log_master/staff_card_details";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function page_log()
	{
		$this->data["title"] = $title = "Page Log Track";
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

		$this->data["main_page"] = "master/log_master/page_log_track";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_page_log()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_staff = $this->input->post("filter_staff");
		$filter_user_role = $this->input->post("filter_user_role");

		$groupByArr = array(
			// "page_log_track.log_date",
			"page_log_track.page_log_track_id",
		);

		$result2 = array();
		// $whereArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(page_log_track.log_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(page_log_track.log_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(page_log_track.log_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(page_log_track.log_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(page_log_track.log_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(page_log_track.log_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(page_log_track.log_date,'%d')"] = $filter_day;
			}
			if (!empty($filter_staff))
				$whereArr["page_log_track.fk_staff_id"] = $filter_staff;
			if (!empty($filter_user_role))
				$whereArr["page_log_track.fk_user_role_id"] = $filter_user_role;

			$validator = array('status' => false, 'messages' => array());
			$joins_main[] = array("tbl" => "staff", "condtn" => "page_log_track.fk_staff_id = staff.staff_id", "type" => "left");
			$joins_main[] = array("tbl" => "user_roles", "condtn" => "page_log_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "page_log_track", $colNames =  "page_log_track.page_log_track_id , page_log_track.page_log_track_path, page_log_track.page_name, page_log_track.browser_name, page_log_track.fk_user_role_id, page_log_track.fk_staff_id, page_log_track.staff_name, page_log_track.user_role, page_log_track.staff_username, page_log_track.staff_password, page_log_track.route_ip_address, DATE_FORMAT(page_log_track.log_date,'%d-%m-%Y') as log_date, page_log_track.log_time, DATE_FORMAT(page_log_track.create_date,'%d-%m-%Y h:i:s a') as create_date", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_page_login_track_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_page_login_track_data"] = $total_page_login_track_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_page_login_track_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_page_log()
	{
		$validator = array('status' => false, 'messages' => array());

		$groupByArr = array(
			// "page_log_track.log_date",
			"page_log_track.page_log_track_id",
		);

		$joins_main[] = array("tbl" => "staff", "condtn" => "page_log_track.fk_staff_id = staff.staff_id", "type" => "left");
		$joins_main[] = array("tbl" => "user_roles", "condtn" => "page_log_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "page_log_track", $colNames =  "page_log_track.page_log_track_id , page_log_track.page_log_track_path, page_log_track.page_name, page_log_track.browser_name, page_log_track.fk_user_role_id, page_log_track.fk_staff_id, page_log_track.staff_name, page_log_track.user_role, page_log_track.staff_username, page_log_track.staff_password, page_log_track.route_ip_address, DATE_FORMAT(page_log_track.log_date,'%d-%m-%Y') as log_date, page_log_track.log_time, DATE_FORMAT(page_log_track.create_date,'%d-%m-%Y h:i:s a') as create_date", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_page_login_track_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_page_login_track_data"] = $total_page_login_track_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_page_login_track_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function download_track()
	{
		$this->data["title"] = $title = "Download Track";
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

		$this->data["main_page"] = "master/log_master/download_track";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_download_log()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_staff = $this->input->post("filter_staff");
		$filter_user_role = $this->input->post("filter_user_role");
		$filter_module = $this->input->post("filter_module");

		$groupByArr = array(
			"download_track.download_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(download_track.create_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(download_track.create_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(download_track.create_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(download_track.create_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(download_track.create_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(download_track.create_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(download_track.create_date,'%d')"] = $filter_day;
			}
			if (!empty($filter_staff))
				$whereArr["download_track.fk_staff_id"] = $filter_staff;
			if (!empty($filter_user_role))
				$whereArr["download_track.fk_user_role_id"] = $filter_user_role;

			if (!empty($filter_module))
				$likeCondtnArr["download_track.module_name"] = $filter_module;

			$validator = array('status' => false, 'messages' => array());
			$joins_main[] = array("tbl" => "staff", "condtn" => "download_track.fk_staff_id = staff.staff_id", "type" => "left");
			$joins_main[] = array("tbl" => "user_roles", "condtn" => "download_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "download_track", $colNames =  "download_track.download_id , download_track.module_name, download_track.file_name, download_track.folder_name, download_track.fk_user_role_id, download_track.fk_staff_id, download_track.directory_path, staff.staff_name, user_roles.user_role_title, DATE_FORMAT(download_track.create_date,'%d-%m-%Y') as create_date, download_track.create_time", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			// echo $this->db->last_query();die();
			$total_download_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_download_data"] = $total_download_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_download_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_download_log()
	{
		$validator = array('status' => false, 'messages' => array());

		$groupByArr = array(
			"download_track.download_id ",
		);

		$joins_main[] = array("tbl" => "staff", "condtn" => "download_track.fk_staff_id = staff.staff_id", "type" => "left");
		$joins_main[] = array("tbl" => "user_roles", "condtn" => "download_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "download_track", $colNames =  "download_track.download_id , download_track.module_name, download_track.file_name, download_track.folder_name, download_track.fk_user_role_id, download_track.fk_staff_id, download_track.directory_path, staff.staff_name, user_roles.user_role_title, DATE_FORMAT(download_track.create_date,'%d-%m-%Y') as create_date, download_track.create_time", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_download_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_download_data"] = $total_download_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_download_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}


	// Login Tracker Section End


}
