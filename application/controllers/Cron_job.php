<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cron_job extends CI_Controller
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
	public function test_insert()
	{
		$data = array(
			'my_name' => "Priyanshu Singh",
			'create_date' => date("Y-m-d h:i:s")
		);
		$this->db->insert('dummy_table', $data);
	}

	public function log_track_bak()
	{
		$current_date = date('Y-m-d');
		$dayName = date('w', strtotime($current_date));
		$today_day_name = getDayName($dayName);

		$groupByArr_log_track = array(
			"master_login_track.log_date",
			"master_login_track.fk_staff_id",
		);
		$whereArr_log_track["master_login_track.log_date"] = date('Y-m-d');
		$whereArr["master_login_track.log_type"] = 1;
		$joins_main_log_track[] = array("tbl" => "staff", "condtn" => "master_login_track.fk_staff_id = staff.staff_id", "type" => "left");
		$joins_main_log_track[] = array("tbl" => "user_roles", "condtn" => "master_login_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_login_track", $colNames =  "master_login_track.log_track_id , master_login_track.log_type, master_login_track.log_action_details, master_login_track.fk_staff_id, master_login_track.fk_user_role_id, master_login_track.ip_address, master_login_track.message, master_login_track.pc_ip_address, master_login_track.type, master_login_track.user_name, master_login_track.password, DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y') as log_date, master_login_track.log_time, TIME_FORMAT(master_login_track.log_time,'%h:%i:%s') as log_time2, DATE_FORMAT(master_login_track.create_date,'%d-%m-%Y h:i:s a') as create_date, master_login_track.halfday_fullday,user_roles.user_role_title,staff.staff_name", $whereArr = $whereArr_log_track, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_log_track, $orderByArr = array(), $groupByArr = $groupByArr_log_track, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$log_track_result = $query["userData"];
		// print_r($log_track_result);
		// die();
		$staff_ids_arra_data = array();
		foreach ($log_track_result as $row1) {
			array_push($staff_ids_arra_data, (int)$row1["fk_staff_id"]);
		}

		$staff_whereArr["staff.staff_status"] = 1;
		$staff_whereArr["staff.del_flag"] = 1;
		$staff_whereArr["user_roles.del_flag"] = 1;
		$staff_whereArr["user_roles.user_role_status"] = 1;
		$staff_whereNotInArray["staff.staff_id"] = $staff_ids_arra_data;
		$staff_joins_main[] = array("tbl" => "user_roles", "condtn" => "staff.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getNotWhereinListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username,staff.staff_password,staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag,staff.role_permission, user_roles.user_role_title, user_roles.menu_permission, user_roles.sub_menu_permission, user_roles.user_role_status", $whereArr = $staff_whereArr, $whereInArray = array(), $whereNotInArray = $staff_whereNotInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main = $staff_joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");

		$staff_result = $query["userData"];

		// $staff_id_arr = array();
		// foreach($staff_result as $row){

		// 	foreach($log_track_result as $row1){

		// 		if((int)$row["staff_id"] == (int)$row1["fk_staff_id"])
		// 		{
		// 			print_r($row["staff_id"]);
		// 			print_r($row1["fk_staff_id"]);
		// 			$staff_id_arr = array($row["staff_id"]);
		// 		}
		// 	}
		// }

		// echo $this->db->last_query();
		print_r($staff_result);
		// print_r($log_track_result);
		// print_r($staff_id_arr);
		die();

		// $data = array(
		// 	'my_name' => "Priyanshu Singh",
		// 	'create_date' => date("Y-m-d h:i:s")
		// );
		// $this->db->insert('dummy_table',$data);
	}

	public function log_track()
	{
		$this->db->trans_start();	//Start Transaction	
		$localIP = getHostByName(getHostName());
		$current_date = date('Y-m-d');
		$fixed_date = date('m-d');
		// $fixed_date = "01-26";
		// $dayName = date('w', strtotime('2021-08-08'));
		$today_day_name = date('l');
		// $today_day_name = getDayName($dayName);
		// print_r($fixed_date);
		// die();

		$groupByArr_log_track = array(
			"master_login_track.log_date",
			"master_login_track.fk_staff_id",
		);
		$whereArr_log_track["master_login_track.log_date"] = date('Y-m-d');
		$whereArr["master_login_track.log_type"] = 1;
		$joins_main_log_track[] = array("tbl" => "staff", "condtn" => "master_login_track.fk_staff_id = staff.staff_id", "type" => "left");
		$joins_main_log_track[] = array("tbl" => "user_roles", "condtn" => "master_login_track.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_login_track", $colNames =  "master_login_track.log_track_id , master_login_track.log_type, master_login_track.log_action_details, master_login_track.fk_staff_id, master_login_track.fk_user_role_id, master_login_track.ip_address, master_login_track.message, master_login_track.pc_ip_address, master_login_track.type, master_login_track.user_name, master_login_track.password, DATE_FORMAT(master_login_track.log_date,'%d-%m-%Y') as log_date, master_login_track.log_time, TIME_FORMAT(master_login_track.log_time,'%h:%i:%s') as log_time2, DATE_FORMAT(master_login_track.create_date,'%d-%m-%Y h:i:s a') as create_date, master_login_track.halfday_fullday,user_roles.user_role_title,staff.staff_name", $whereArr = $whereArr_log_track, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_log_track, $orderByArr = array(), $groupByArr = $groupByArr_log_track, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$log_track_result = $query["userData"];

		$staff_ids_arra_data = array();
		foreach ($log_track_result as $row1) {
			array_push($staff_ids_arra_data, (int)$row1["fk_staff_id"]);
		}

		$staff_whereArr["staff.staff_status"] = 1;
		$staff_whereArr["staff.del_flag"] = 1;
		$staff_whereArr["user_roles.del_flag"] = 1;
		$staff_whereArr["user_roles.user_role_status"] = 1;
		if(!empty($staff_ids_arra_data))
			$staff_whereNotInArray["staff.staff_id"] = $staff_ids_arra_data;
		else
			$staff_whereNotInArray = array();
		$staff_joins_main[] = array("tbl" => "user_roles", "condtn" => "staff.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getNotWhereinListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username,staff.staff_password,staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag,staff.role_permission, user_roles.user_role_title, user_roles.menu_permission, user_roles.sub_menu_permission, user_roles.user_role_status", $whereArr = $staff_whereArr, $whereInArray = array(), $whereNotInArray = $staff_whereNotInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main = $staff_joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");

		$staff_result = $query["userData"];

		if ($fixed_date == "08-15" || $fixed_date == "01-26") {
			$halfday_fullday = 3; // Holiday
			$off_day = 2; // Present
		} else {
			if ($today_day_name == "Sunday") {
				$halfday_fullday = 3; // Holiday
				$off_day = 2; // Present
			} else {
				$halfday_fullday = 0;
				$off_day = 1; // Off Day, Absent
			}
		}

		$insertLogArr = array();
		$i = 1;
		$count = count($staff_result);
		foreach ($staff_result as $row_r) {
			$insertLogArr = array();
			$insertLogArr[$i] = array(
				"fk_user_role_id" => $row_r["fk_user_role_id"],
				"fk_staff_id" => $row_r["staff_id"],
				"log_type" => 1,
				"log_action_details" => "Logged In",
				"create_date" => date("Y-m-d h:i:s"),
				"ip_address" => $_SERVER['REMOTE_ADDR'],
				"pc_ip_address" => $localIP,
				"message" => "Default Entry",
				"log_date" => date("Y-m-d"),
				"log_time" => date("h:i:s a"),
				"user_name" => $row_r["staff_username"],
				"password" => $row_r["staff_password"],
				"off_day" => $off_day,
				"halfday_fullday" => $halfday_fullday, //0:Off 1:Full Day, 2:Half Day, 3:Holiday
			);
			$this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");
		}


		$this->db->trans_complete();		// Transaction End
		if ($this->db->trans_status() === FALSE) {
			echo "Query Success Error";
		} else {
			echo "Query Success Done";
		}
		// print_r($staff_result);
		// die();
	}
}
