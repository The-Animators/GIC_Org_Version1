<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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

	public function index()
	{
		$this->authenticator->check_loggedin(); // If User ID, Email is Present Then it goes To Dashboard page

		$this->data["login_page"] = "auth/login";
		$this->load->view($this->config->item("template_folder") . "layout/login_layout", $this->data);
	}

	public function auth()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"user_name_err" => form_error("user_name"),
				"password_err" => form_error("password"),
			);
		} else {
			$localIP = getHostByName(getHostName());
			// $this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$username = $this->security->xss_clean($this->input->post('user_name'));
				$password = $this->security->xss_clean($this->input->post('password'));

				if ($username == "" || $password == "") {
					$validator["status"] = false;
					$validator["task_title"] = "";
					$validator["messages"] = "Either the username, Password does not match or User is not active. For further assistance contact support.";
					echo json_encode($validator);
					die();
				} else {
					$check_role = trim(substr($username, -2));

					if($check_role == '_2'){
						$whereArr2["customermem_tbl.status"] = 1;
						$whereArr2["customermem_tbl.is_delete"] = 0;
						$whereArr2["customermem_tbl.username"] = $username;
						$whereArr2["customermem_tbl.password"] = $password;
	
						$joins_main[] = array("tbl" => "user_roles", "condtn" => "customermem_tbl.role_type = user_roles.user_role_id", "type" => "left");
	
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id,customermem_tbl.customer_id, customermem_tbl.name, customermem_tbl.username,customermem_tbl.status, customermem_tbl.is_delete, user_roles.user_role_title, user_roles.menu_permission, user_roles.sub_menu_permission, user_roles.user_role_status", $whereArr2, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
	
						$result = $query["userData"];
					}
					else{
						$whereArr["staff.staff_status"] = 1;
						$whereArr["staff.del_flag"] = 1;
						$whereArr["user_roles.del_flag"] = 1;
						$whereArr["user_roles.user_role_status"] = 1;
						$whereArr["staff.staff_username"] = $username;
						$whereArr["staff.staff_password"] = $password;
						$joins_main[] = array("tbl" => "user_roles", "condtn" => "staff.fk_user_role_id = user_roles.user_role_id", "type" => "left");
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username,staff.staff_password,staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag,staff.role_permission, user_roles.user_role_title, user_roles.menu_permission, user_roles.sub_menu_permission, user_roles.user_role_status", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

						$result = $query["userData"];
					}
				}

				// print_r($result);
				// die();

				
				if (empty($result)) {
					$message = "User Name & Password doesn't Matches.";
					$insertLogArr[] = array(
						"user_name" => $username,
						"password" => $password,
						"log_date" => date("Y-m-d"),
						"log_time" => date("h:i:s a"),
						"log_type" => 2,
						"log_action_details" => "Login Failed",
						"create_date" => date("Y-m-d h:i:s"),
						"ip_address" => $_SERVER['REMOTE_ADDR'],
						"pc_ip_address" => $localIP,
						"message" => $message,
						"halfday_fullday" =>0,
					);
					$output1 = $this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");
					$validator["status"] = false;
					$validator["task_title"] = "";
					$validator["messages"] = $message;
					echo json_encode($validator);
					die();
				} else {
					if($check_role == '_2'){
						$userdata = $result;
						// Member Details Start
						$member_id = $userdata['id'];
						$client_id = $userdata['customer_id'];
						$client_name = $userdata['name'];
						$client_username = $userdata['username'];
						// $client_email = $userdata['status'];
						$client_status = $userdata['status'];
						$del_flag = $userdata['is_delete'];
						// $role_permission = $userdata['role_permission'];
						// member Details End

						// User Role Details Start
						// $user_role_id = $userdata['fk_user_role_id'];
						$user_role_title = $userdata['user_role_title'];
						$user_role_status = $userdata['user_role_status'];
						$menu_permission = $userdata['menu_permission'];
						$sub_menu_permission = $userdata['sub_menu_permission'];
						// User Role Details End

						// client Session Part Start
						$this->session->set_userdata("@_member_id", $member_id);
						$this->session->set_userdata("@_client_id", $client_id);
						$this->session->set_userdata("@_client_name", $client_name);
						$this->session->set_userdata("@_client_username", $client_username);
						// $this->session->set_userdata("@_client_email", $client_email);
						$this->session->set_userdata("@_client_status", $client_status);
						$this->session->set_userdata("@_client_del_flag", $del_flag);
						// $this->session->set_userdata("@_client_role_permission", $role_permission);
						// Staff Session Part End

						// User Role Session Part Start
						// $this->session->set_userdata("@_user_role_id", $user_role_id);
						$this->session->set_userdata("@_user_role_title", $user_role_title);
						$this->session->set_userdata("@_user_role_status", $user_role_status);
						$this->session->set_userdata("@_user_role_menu_permission", $menu_permission);
						$this->session->set_userdata("@_user_role_sub_menu_permission", $sub_menu_permission);
						// User Role Session Part End

						$this->session->set_userdata("@_logged_in", TRUE);

					}
					else{
						$userdata = $result;
						// Staff Details Start
						$staff_id = $userdata['staff_id'];
						$staff_name = $userdata['staff_name'];
						$staff_username = $userdata['staff_username'];
						$staff_email = $userdata['staff_email'];
						$staff_status = $userdata['staff_status'];
						$staff_password = $userdata['staff_password'];
						$del_flag = $userdata['del_flag'];
						$role_permission = $userdata['role_permission'];
						// Staff Details End
	
						// User Role Details Start
						$user_role_id = $userdata['fk_user_role_id'];
						$user_role_title = $userdata['user_role_title'];
						$user_role_status = $userdata['user_role_status'];
						$menu_permission = $userdata['menu_permission'];
						$sub_menu_permission = $userdata['sub_menu_permission'];
						// User Role Details End

						if(!empty($staff_id )){
							$staff_arr = array((int)$staff_id);
							$current_date = date("Y-m-d");
							if($user_role_id == 1 || $user_role_id == 2){
								$whereInArray_task = array();
								$whereArr_task = array();
							}else{
								$whereInArray_task["task_work.fk_staff_id"] = $staff_arr;
								$whereArr_task["task_work.status!="]="Completed";
								$whereArr_task["DATE_FORMAT(task_work.end_date,'%Y-%m-%d')<"]=$current_date;
							}
							$task_data = array();
							if($user_role_id == 1 || $user_role_id == 2){
								$task_data = array();
							}else{
								$query_task = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, DATE_FORMAT(task_work.start_date,'%d-%m-%Y') as start_date, DATE_FORMAT(task_work.end_date,'%d-%m-%Y') as end_date, task_work.status, task_work.task_status, task_work.del_flag, task_work.task_view_status", $whereArr = $whereArr_task, $whereInArray = $whereInArray_task, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
								$task_data = $query_task["userData"];
								// echo $this->db->last_query();
								// print_r($task_data);
								// die();
							}
							
					
							if(!empty($task_data)){
								$new_task_title = "";
								foreach($task_data as $task_row){
									$task_title = $task_row["task_title"];
									if(empty($new_task_title))
										$new_task_title = $task_title;
									else
										$new_task_title = $new_task_title." , ".$task_title;
									// print_r($new_task_title);
									// die();
								}
								
								if($user_role_id != 1 || $user_role_id != 2){
									$message = "Dear ".$staff_name." Your Account is Suspend Because of your Task is not Completed Please Contact Super Admin and Admin For Login Purpose!";
									$insertLogArr[] = array(
										"fk_user_role_id" => $result["fk_user_role_id"],
										"fk_staff_id" => $staff_id,
										"user_name" => $username,
										"password" => $password,
										"log_type" => 2,
										"log_action_details" => "Login Failed",
										"create_date" => date("Y-m-d h:i:s"),
										"ip_address" => $_SERVER['REMOTE_ADDR'],
										"pc_ip_address" => $localIP,
										"message" => $message,
										"log_date" => date("Y-m-d"),
										"log_time" => date("h:i:s a"),
										"halfday_fullday" =>0,
									);
									$output1 = $this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");
									$validator["status"] = false;
									$validator["task_title"] = $new_task_title;
									$validator["messages"] = $message;
									echo json_encode($validator);
									die();
								}
							}
						}						
	
						// Staff Session Part Start
						$this->session->set_userdata("@_staff_id", $staff_id);
						$this->session->set_userdata("@_staff_name", $staff_name);
						$this->session->set_userdata("@_staff_username", $staff_username);
						$this->session->set_userdata("@_staff_email", $staff_email);
						$this->session->set_userdata("@_staff_status", $staff_status);
						$this->session->set_userdata("@_staff_password", $staff_password);
						$this->session->set_userdata("@_staff_del_flag", $del_flag);
						$this->session->set_userdata("@_staff_role_permission", $role_permission);
						// Staff Session Part End
	
						// User Role Session Part Start
						$this->session->set_userdata("@_user_role_id", $user_role_id);
						$this->session->set_userdata("@_user_role_title", $user_role_title);
						$this->session->set_userdata("@_user_role_status", $user_role_status);
						$this->session->set_userdata("@_user_role_menu_permission", $menu_permission);
						$this->session->set_userdata("@_user_role_sub_menu_permission", $sub_menu_permission);
						// User Role Session Part End
	
						$this->session->set_userdata("@_logged_in", TRUE);

					}
					
				}


				if($check_role == '_2'){

					if ($result["status"] == 1) {
						$message="You are Now Logged in Successfully.";
						$insertLogArr[] = array(
							// "fk_user_role_id" => $result["fk_user_role_id"],
							"member_id" => $result["id"],
							"log_type" => 1,
							"log_action_details" => "Logged In",
							"create_date" => date("Y-m-d h:i:s"),
							"ip_address" => $_SERVER['REMOTE_ADDR'],
							"pc_ip_address" => $localIP,
							"message" => $message,
							"log_date" => date("Y-m-d"),
							"log_time" => date("h:i:s a"),
							"user_name" => $username,
							"password" => $password,
							"halfday_fullday" =>0,
						);

						$output1 = $this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");
					} else {
						$message="Something Went Wronge.";
						$insertLogArr[] = array(
							// "fk_user_role_id" => $result["fk_user_role_id"],
							"member_id" => $result["id"],
							"log_type" => 2,
							"log_action_details" => "Login Failed",
							"create_date" => date("Y-m-d h:i:s"),
							"ip_address" => $_SERVER['REMOTE_ADDR'],
							"pc_ip_address" => $localIP,
							"message" => $message,
							"user_name" => $username,
							"password" => $password,
							"log_date" => date("Y-m-d"),
							"log_time" => date("h:i:s a"),
							"halfday_fullday" =>0,
						);
						$output1 = $this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");

						$this->session->sess_destroy();
						if ($output1["status"] == FALSE) {
							$validator["status"] = false;
							$validator["messages"] = $message;
							echo json_encode($validator);
							die();
						}
					}
				}else{
					if ($result["staff_status"] == 1) {
						$message="You are Now Logged in Successfully.";
						// print_r($localIP);die();
						$insertLogArr[] = array(
							"fk_user_role_id" => $result["fk_user_role_id"],
							"fk_staff_id" => $result["staff_id"],
							"log_type" => 1,
							"log_action_details" => "Logged In",
							"create_date" => date("Y-m-d h:i:s"),
							"ip_address" => $_SERVER['REMOTE_ADDR'],
							"pc_ip_address" => $localIP,
							"message" => $message,
							"log_date" => date("Y-m-d"),
							"log_time" => date("h:i:s a"),
							"user_name" => $username,
							"password" => $password,
							"halfday_fullday" =>1,
							"off_day" =>2,
						);

						// print_r($insertLogArr);
						// die();
	
						$output1 = $this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");
					} else {
						$message="Something Went Wronge.";
						$insertLogArr[] = array(
							"fk_user_role_id" => $result["fk_user_role_id"],
							"fk_staff_id" => $result["user_id"],
							"log_type" => 2,
							"log_action_details" => "Login Failed",
							"create_date" => date("Y-m-d h:i:s"),
							"ip_address" => $_SERVER['REMOTE_ADDR'],
							"pc_ip_address" => $localIP,
							"message" => $message,
							"user_name" => $username,
							"password" => $password,
							"log_date" => date("Y-m-d"),
							"log_time" => date("h:i:s a"),
							"halfday_fullday" =>0,
						);
						$output1 = $this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");
	
						$this->session->sess_destroy();
						if ($output1["status"] == FALSE) {
							$validator["status"] = false;
							$validator["messages"] = $message;
							echo json_encode($validator);
							die();
						}
					}
				}
			}
			// $this->db->trans_complete();		// Transaction End	

			if ($output1["status"] === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				if($check_role == '_2'){
					$validator["status"] = true;
					$validator["role"] = $check_role;
					$validator["client_id"] = $client_id;
					$validator["message"] = "You are Now Logged in Successfully.";
				}
				else{
					$validator["status"] = true;
					$validator["role"] = '';
					$validator["message"] = "You are Now Logged in Successfully.";
				}
				
			}
		}
		echo json_encode($validator);
	}

	function clear_cache()
	{
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}

	public function logout()
	{
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$validator = array('status' => false, 'messages' => array());
		$localIP = getHostByName(getHostName());
			$this->db->trans_start();	//Start Transaction	


			$insertLogArr[] = array(
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"log_type" => 0,
				"log_action_details" => "Logged Out",
				"create_date" => date("Y-m-d h:i:s"),
				"ip_address" => $_SERVER['REMOTE_ADDR'],
				"pc_ip_address" => $localIP,
				"user_name" => $this->session->userdata("@_staff_username"),
				"password" => $this->session->userdata("@_staff_password"),
				"log_date" => date("Y-m-d"),
				"log_time" => date("h:i:s a"),
				"halfday_fullday" =>0,
			);
			$output1 = $this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");

			if ($output1["status"] == FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Something Went Wronge.";
			}

			// client Session Part Start
			$this->session->unset_userdata("@_client_id");
			$this->session->unset_userdata("@_member_id");
			$this->session->unset_userdata("@_client_name");
			$this->session->unset_userdata("@_client_username");
			$this->session->unset_userdata("@_client_status");
			$this->session->unset_userdata("@_client_del_flag");
			// Staff Session Part End

			// Staff Session Part Start
			$this->session->unset_userdata("@_staff_id");
			$this->session->unset_userdata("@_staff_name");
			$this->session->unset_userdata("@_staff_username");
			$this->session->unset_userdata("@_staff_email");
			$this->session->unset_userdata("@_staff_status");
			$this->session->unset_userdata("@_staff_del_flag");
			$this->session->unset_userdata("@_staff_role_permission");
			// Staff Session Part End

			// User Role Session Part Start
			$this->session->unset_userdata("@_user_role_id");
			$this->session->unset_userdata("@_user_role_title");
			$this->session->unset_userdata("@_user_role_status");
			$this->session->unset_userdata("@_user_role_menu_permission");
			$this->session->unset_userdata("@_user_role_sub_menu_permission");
			// User Role Session Part End

			$this->session->unset_userdata("@_logged_in");

			$this->session->sess_destroy();
			$this->clear_cache();

			$this->db->trans_complete();		// Transaction End

			if ($this->db->trans_status() === FALSE) {
				custom_flash_message($url="login",$err_type="2",$message="You are Now Log Out Successfully.");
			} else {
				custom_flash_message($url="login",$err_type="2",$message="You are Now Log Out Successfully.");
			}

	
	}

	public function logout_json()
	{
		$validator = array('status' => false, 'messages' => array());
		$localIP = getHostByName(getHostName());
		if ($this->input->post() != "") {
			$this->db->trans_start();	//Start Transaction	

			$staff_id  = $this->input->post("staff_id");
			$user_role_id  = $this->input->post("user_role_id");

			$insertLogArr[] = array(
				"fk_user_role_id" => $staff_id,
				"fk_staff_id" => $user_role_id,
				"log_type" => 0,
				"log_action_details" => "Logged Out",
				"create_date" => date("Y-m-d h:i:s"),
				"ip_address" => $_SERVER['REMOTE_ADDR'],
				"pc_ip_address" => $localIP,
				// "user_name" => $username,
				// "password" => $password,
				"log_date" => date("Y-m-d"),
				"log_time" => date("h:i:s a"),
				"halfday_fullday"=>0,
			);
			$output1 = $this->Mquery_model_v3->addQuery($tableName = "master_login_track", $insertLogArr, $return_type = "lastID");

			if ($output1["status"] == FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Something Went Wronge.";
			}

			// Staff Session Part Start
			$this->session->unset_userdata("@_staff_id");
			$this->session->unset_userdata("@_staff_name");
			$this->session->unset_userdata("@_staff_username");
			$this->session->unset_userdata("@_staff_email");
			$this->session->unset_userdata("@_staff_status");
			$this->session->unset_userdata("@_staff_del_flag");
			$this->session->unset_userdata("@_staff_role_permission");
			// Staff Session Part End

			// User Role Session Part Start
			$this->session->unset_userdata("@_user_role_id");
			$this->session->unset_userdata("@_user_role_title");
			$this->session->unset_userdata("@_user_role_status");
			$this->session->unset_userdata("@_user_role_menu_permission");
			$this->session->unset_userdata("@_user_role_sub_menu_permission");
			// User Role Session Part End

			$this->session->unset_userdata("@_logged_in");

			$this->session->sess_destroy();
			$this->clear_cache();

			$this->db->trans_complete();		// Transaction End

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "You are Now Log Out Successfully.";
			}
		}
		echo json_encode($validator);
	}
}
