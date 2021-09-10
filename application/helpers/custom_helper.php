<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Convert PHP tags to entities
 *
 * @access	public
 * @param	string
 * @return	string
 */
if (!function_exists("custom_flash_message")) {
	function custom_flash_message($url = "", $err_type = "", $message = "")
	{
		$CI = &get_instance();

		$err_type_txt = "";

		switch ($err_type) {
			case 0: // Error
				$err_type_txt = "errmsg";
				break;
			case 1: // Warning
				$err_type_txt = "warning_msg";
				break;
			case 2:  // Success
				$err_type_txt = "msg";
				break;
			case 3:  // Image Error
				$err_type_txt = "img_error";
				break;
			default:
				$err_type_txt = "error";
		}
		//  print_r($err_type_txt);
		//  print_r($err_type);
		// print_r($message);
		// print_r($url);
		// die("Test");
		$CI->session->set_flashdata($err_type_txt, $message);
		// echo $CI->session->flashdata('msg');
		// die();
		if ($url == "")
			return True;
		else
			redirect($url, "refresh");
	}
}

if (!function_exists('menu_permission')) {
	function menu_permission()
	{
		$CI = &get_instance();
		$staff_id = $CI->session->userdata("@_staff_id");
		$user_role_id = $CI->session->userdata("@_user_role_id");
		$menu_permission = $CI->session->userdata("@_user_role_menu_permission");
		$sub_menu_permission = $CI->session->userdata("@_user_role_sub_menu_permission");
		$role_permission = $CI->session->userdata("@_staff_role_permission");

		if ($user_role_id == 1 || $user_role_id == 2) { // Defualt Menu Show Only Admin And Super Admin
			$whereArr["menu.menu_status"] = 1;
			$whereArr["menu.del_flag"] = 1;
			$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("menu.menu_order" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$menu_list = $query["userData"];
		} else {

			$whereArr["menu.menu_status"] = 1;
			$whereArr["menu.del_flag"] = 1;
			$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order", $whereArr = $whereArr, $whereInArray = array("menu.menu_id" => explode(",", $menu_permission)), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("menu.menu_order" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$menu_list = $query["userData"];
		}
		return $menu_list;
	}
}

if (!function_exists('sub_menu_permission')) {
	function sub_menu_permission($menu_id)
	{
		$sub_menu_list = array();
		if ($menu_id != "") {
			$CI = &get_instance();
			$staff_id = $CI->session->userdata("@_staff_id");
			$user_role_id = $CI->session->userdata("@_user_role_id");
			$menu_permission = $CI->session->userdata("@_user_role_menu_permission");
			$sub_menu_permission = $CI->session->userdata("@_user_role_sub_menu_permission");
			$role_permission = $CI->session->userdata("@_staff_role_permission");

			if ($user_role_id == 1 || $user_role_id == 2) { // Defualt Menu Show Only Admin And Super Admin
				$whereArr["submenu.submenu_status"] = 1;
				$whereArr["submenu.del_flag"] = 1;
				$whereArr["submenu.fk_menu_id"] = $menu_id;
				$joins_main[] = array("tbl" => "menu", "condtn" => "submenu.fk_menu_id = menu.menu_id", "type" => "left");
				$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag, menu.menu_id, menu.menu_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("submenu.submenu_order" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$sub_menu_list = $query["userData"];
			} else {
				$whereArr["submenu.submenu_status"] = 1;
				$whereArr["submenu.del_flag"] = 1;
				$whereArr["submenu.fk_menu_id"] = $menu_id;
				$joins_main[] = array("tbl" => "menu", "condtn" => "submenu.fk_menu_id = menu.menu_id", "type" => "left");
				$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag, menu.menu_id, menu.menu_name", $whereArr = $whereArr, $whereInArray = array("submenu.submenu_id" => explode(",", $sub_menu_permission)), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("submenu.submenu_order" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$sub_menu_list =  $query["userData"];
			}
		}
		return $sub_menu_list;
	}
}

if (!function_exists('child_submenu_permission')) {
	function child_submenu_permission($menu_id, $submenu_id)
	{
		$child_submenu_list = array();
		if ($menu_id != "") {
			$CI = &get_instance();
			$staff_id = $CI->session->userdata("@_staff_id");
			$user_role_id = $CI->session->userdata("@_user_role_id");
			$menu_permission = $CI->session->userdata("@_user_role_menu_permission");
			$sub_menu_permission = $CI->session->userdata("@_user_role_sub_menu_permission");
			$role_permission = $CI->session->userdata("@_staff_role_permission");

			// if ($user_role_id == 1 || $user_role_id == 2) { // Defualt Menu Show Only Admin And Super Admin
			// 	$whereArr["child_submenu.child_submenu_status"] = 1;
			// 	$whereArr["child_submenu.del_flag"] = 1;
			// 	$whereArr["child_submenu.fk_menu_id"] = $menu_id;
			// 	$joins_main[] = array("tbl" => "menu", "condtn" => "child_submenu.fk_menu_id = menu.menu_id", "type" => "left");
			// 	$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_menu_id , child_submenu.del_flag, menu.menu_id, menu.menu_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("child_submenu.child_submenu_order" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			// 	$child_submenu_list = $query["userData"];
			// } else {
			$whereArr["child_submenu.child_submenu_status"] = 1;
			$whereArr["child_submenu.del_flag"] = 1;
			$whereArr["child_submenu.fk_menu_id"] = $menu_id;
			$whereArr["child_submenu.fk_submenu_id"] = $submenu_id;
			$joins_main[] = array("tbl" => "menu", "condtn" => "child_submenu.fk_menu_id = menu.menu_id", "type" => "left");
			$joins_main[] = array("tbl" => "submenu", "condtn" => "child_submenu.fk_submenu_id = submenu.submenu_id", "type" => "left");
			$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_menu_id , child_submenu.del_flag, menu.menu_id, menu.menu_name, submenu.submenu_name", $whereArr = $whereArr, $whereInArray = "", $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("child_submenu.child_submenu_order" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$child_submenu_list =  $query["userData"];
		}
		// }
		return $child_submenu_list;
	}
}

if (!function_exists('task_counter')) {
	function task_counter()
	{
		$CI = &get_instance();
		$staff_id = $CI->session->userdata("@_staff_id");
		$user_role_id = $CI->session->userdata("@_user_role_id");
		$menu_permission = $CI->session->userdata("@_user_role_menu_permission");
		$sub_menu_permission = $CI->session->userdata("@_user_role_sub_menu_permission");
		$role_permission = $CI->session->userdata("@_staff_role_permission");
		$staff_arr = array((int)$staff_id);

		if ($user_role_id == 1 || $user_role_id == 2) {
			$whereInArray = array();
			$whereArr = array();
		} else {
			$whereInArray["task_work.fk_staff_id"] = $staff_arr;
			$whereArr["task_work.task_view_status"] = 1;
		}

		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, DATE_FORMAT(task_work.start_date,'%d-%m-%Y') as start_date, DATE_FORMAT(task_work.end_date,'%d-%m-%Y') as end_date, task_work.status, task_work.task_status, task_work.del_flag, task_work.task_view_status", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$task_data = $query["userData"];
		$task_data_count = count($task_data);

		if (empty($task_data))
			$task_data_count = 0;

		return $task_data_count;
	}
}


if (!function_exists("multidimensional_to_singlearray")) {
	function multidimensional_to_singlearray($array)
	{
		$CI = &get_instance();

		if (!is_array($array)) {
			return FALSE;
		}
		$result = array();
		foreach ($array as $value) {
			if (is_array($value)) {
				$result = array_merge($result, $value);
				// $result = array_merge($result, array_flatten($value));
			} else {
				$result[] = $value;
			}
		}
		return $result;
	}
}

if (!function_exists('getstates')) {
	function getstates()
	{
		$ci = &get_instance();
		$ci->load->database();
		$return = array();
		$query = $ci->db->query("SELECT id, state FROM master_states");
		$query = $query->result_array();
		if (is_array($query) && count($query) > 0) {
			$return[''] = '--Select State--';
			foreach ($query as $row) {
				$return[$row['id']] = $row['state'];
			}
		}
		return $return;
	}
}


if (!function_exists('getRelation')) {
	function getRelation()
	{
		$ci = &get_instance();
		$ci->load->database();
		$return = array();
		$query = $ci->db->query("SELECT id, relation FROM master_relation");
		$query = $query->result_array();
		if (is_array($query) && count($query) > 0) {
			$return[''] = '--Select Relation--';
			foreach ($query as $row) {
				$return[$row['id']] = $row['relation'];
			}
		}
		return $return;
	}
}


if (!function_exists('getDayName')) {
	// $dayName = getDayName(date('w', strtotime('2019-11-14')));

	function getDayName($dayOfWeek)
	{
		switch ($dayOfWeek) {
			case 0:
				return 'Saturday';
			case 1:
				return 'Sunday';
			case 2:
				return 'Monday';
			case 3:
				return 'Tuesday';
			case 4:
				return 'Wednessday';
			case 5:
				return 'Thursday';
			case 6:
				return 'Friday';
			default:
				return '';
		}
	}
}


if (!function_exists('insert_auth_details')) {

	function insert_auth_details($staff_id, $user_role_id, $username, $password, $log_type, $log_action_details, $ip_address, $pc_ip_address, $create_date , $message_txt, $log_date, $log_time, $halfday_fullday, $type, $off_day)
	{
		$ci = &get_instance();
		$insertLogArr[] = array(
			"fk_user_role_id" => $user_role_id,
			"fk_staff_id" => $staff_id,
			"user_name" => $username,
			"password" => $password,
			"log_type" => $log_type,
			"log_action_details" => $log_action_details,
			"ip_address" => $ip_address,
			"pc_ip_address" => $pc_ip_address,
			"create_date" => $create_date,
			"message" => $message_txt,
			"log_date" => $log_date,
			"log_time" => $log_time,
			"halfday_fullday" => $halfday_fullday,
			"type" => $type,
			"off_day" => $off_day,
		);
		$output1 = $ci->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");

		return $output1;
	}
}