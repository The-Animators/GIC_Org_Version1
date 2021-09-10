<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

//  Authenticator Section Start
class Authenticator {

	public function check_loggedin()
	{
		$CI = & get_instance();
		
		$staff_id=$CI->session->userdata("@_staff_id");
		$staff_name=$CI->session->userdata("@_staff_name");
		$staff_username=$CI->session->userdata("@_staff_username");
		$staff_email=$CI->session->userdata("@_staff_email");
		$staff_status=$CI->session->userdata("@_staff_status");

		$user_role_id=$CI->session->userdata("@_user_role_id");
		$user_role_title=$CI->session->userdata("@_user_role_title");	
		$user_role_status=$CI->session->userdata("@_user_role_status");

		$logged_in=$CI->session->userdata("@_logged_in");
		
		if($staff_id!="" || $staff_name!="" || $staff_username!=""|| $staff_email!=""|| $staff_status!="" || $user_role_id!="" || $user_role_title!="" || $user_role_status!="" || $logged_in==True  )
			redirect(base_url()."master/insurance_company_details","refresh");			
	}
	
	public function check_session()
	{
		$CI = & get_instance();
		
		$staff_id=$CI->session->userdata("@_staff_id");
		$staff_name=$CI->session->userdata("@_staff_name");
		$staff_username=$CI->session->userdata("@_staff_username");
		$staff_email=$CI->session->userdata("@_staff_email");
		$staff_status=$CI->session->userdata("@_staff_status");

		$user_role_id=$CI->session->userdata("@_user_role_id");
		$user_role_title=$CI->session->userdata("@_user_role_title");	
		$user_role_status=$CI->session->userdata("@_user_role_status");

		$logged_in=$CI->session->userdata("@_logged_in");

		if($staff_id=="" || $staff_name=="" || $staff_username==""|| $staff_email==""|| $staff_status=="" || $user_role_id=="" || $user_role_title=="" || $user_role_status=="" || $logged_in==False)
			redirect("login","refresh");
		else
			return TRUE;
	}

	public function check_task_details()
	{
		
		$CI = & get_instance();
		
		$staff_id=$CI->session->userdata("@_staff_id");
		$user_role_id=$CI->session->userdata("@_user_role_id");

		$staff_arr = array((int)$staff_id);
		$current_date = date("d-m-Y");
		if($user_role_id == 1 || $user_role_id == 2){
			$whereInArray = array();
			$whereArr = array();
		}else{
			$whereInArray["task_work.fk_staff_id"] = $staff_arr;
			$whereArr["task_work.task_view_status"]=1;
			$whereArr["task_work.status!="]="Completed";
			$whereArr["DATE_FORMAT(task_work.end_date,'%d-%m-%Y')<"]=$current_date;
		}

		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, DATE_FORMAT(task_work.start_date,'%d-%m-%Y') as start_date, DATE_FORMAT(task_work.end_date,'%d-%m-%Y') as end_date, task_work.status, task_work.task_status, task_work.del_flag, task_work.task_view_status", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$task_data = $query["userData"];

		if(!empty($task_data)){
			$validator["status"] = false;
			$validator["message"] = "Please Contact Super Admin and Admin For Login Purpose!";
			echo json_encode($validator);
			redirect("login","refresh");
		}

		// echo $CI->db->last_query();
		// print_r($task_data);
		// die();
	}

		
} 	
//  Authenticator Section End


?>