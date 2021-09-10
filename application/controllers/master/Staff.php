<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends Admin_gic_core
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
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "date_picker");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "date_picker");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		// $all = $this->session->all_userdata();
		// $staff_id = $this->session->userdata("@_staff_id");
		// $user_role_id = $this->session->userdata("@_user_role_id");
		// print_r($all);die();
		// "fk_staff_id" => $this->session->userdata("@_staff_id"),
		// "fk_user_role_id" => $this->session->userdata("@_user_role_id"),
	}
	// Staff Section Start

	public function filter_staff()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_staff = $this->input->post("filter_staff");
		$filter_user_role = $this->input->post("filter_user_role");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"staff.staff_id",
		);

		$result2 = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(staff.staff_doj,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(staff.staff_doj,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(staff.staff_doj,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(staff.staff_doj,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(staff.staff_doj,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(staff.staff_doj,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(staff.staff_doj,'%d')"] = $filter_day;
			}
			if (!empty($filter_staff))
				$whereArr["staff.staff_id"] = $filter_staff;
			if (!empty($filter_user_role))
				$whereArr["staff.fk_user_role_id"] = $filter_user_role;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active
				$whereArr["staff.staff_status"] = $filter_status;
			}

			$joins_main[] = array("tbl" => "user_roles", "condtn" => "staff.fk_user_role_id = user_roles.user_role_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag, DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj, staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar , staff.staff_mobile , staff.staff_desc , user_roles.user_role_title", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_staff_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_staff_data"] = $total_staff_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_staff_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function check_staff_name()
	{
		$staff_name = $this->input->post('staff_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag", $whereArr = array("staff.staff_name" => $staff_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_staff_name', 'This Staff is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function staff()
	{
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["menu_list"] = $menu = $query["userData"];

		$whereArr["user_roles.user_role_status"] = 1;
		$whereArr["user_roles.del_flag"] = 1;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["user_roles"] = $user_roles = $query["userData"];

		$this->data["edit_add_flage"] = $edit_add_flage = $this->uri->segment("4");
		$this->data["staff_id"] = $staff_id = $this->uri->segment("5");
		// print_r($staff_id);
		// die("Test58");
		$submenu_permission ="";
		if (!empty($staff_id)) {
			$whereArrstaff["staff.staff_id"] = $staff_id;
			$joins_main[] = array("tbl"=>"user_roles", "condtn"=>"staff.fk_user_role_id = user_roles.user_role_id", "type"=>"left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status,staff.role_permission, staff.del_flag , DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj , staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar , staff.staff_mobile , staff.staff_desc ,user_roles.sub_menu_permission", $whereArr = $whereArrstaff, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$this->data["staff_details"] = $staff_details = $query["userData"];
			// print_r($staff_details);
			// die("Test 69");
			$submenu_permission = $staff_details["sub_menu_permission"];
			$this->data["role_permission"] = json_decode($staff_details["role_permission"]);	
		}

		$whereArr["submenu.del_flag"] = 1;
		$whereArr["submenu.submenu_status"] = 1;
		$joins_main_1[] = array("tbl"=>"menu", "condtn"=>"submenu.fk_menu_id = menu.menu_id", "type"=>"left");	
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag, menu.menu_name", $whereArr = array(), $whereInArray = array("submenu.submenu_id"=>explode(",",$submenu_permission)), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_1, $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["submenu_list"] = $submenu_list = $query["userData"];	
		

		// print_r($this->data["role_permission"]);
		// die();

		$this->data["title"] = $title = "Staff";

		if ($edit_add_flage == 1) : $add = "Add ";
		elseif ($edit_add_flage == 0) : $add = "Edit ";
		endif;
		$this->data["add"] = $add;
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "index",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => $add . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/add_staff";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_staff()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('staff_name', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('staff_mobile', 'Mobile', 'trim');
		$this->form_validation->set_rules('staff_desc', 'Desciption', 'trim');
		$this->form_validation->set_rules('roles', 'User Role', 'trim|required');

		$this->form_validation->set_rules('staff_doj', 'DOJ', 'trim');
		$this->form_validation->set_rules('staff_sallary', 'Sallary', 'trim');
		$this->form_validation->set_rules('staff_profile', 'Profile', 'trim');
		$this->form_validation->set_rules('staff_pan', 'PAN', 'trim');
		$this->form_validation->set_rules('staff_aadhar', 'Aadhar', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"staff_name_err" => form_error("staff_name"),
				"user_name_err" => form_error("user_name"),
				"password_err" => form_error("password"),
				"email_err" => form_error("email"),
				"staff_mobile_err" => form_error("staff_mobile"),
				"staff_desc_err" => form_error("staff_desc"),
				"roles_err" => form_error("roles"),

				"staff_doj_err" => form_error("staff_doj"),
				"staff_sallary_err" => form_error("staff_sallary"),
				"staff_profile_err" => form_error("staff_profile"),
				"staff_pan_err" => form_error("staff_pan"),
				"staff_aadhar_err" => form_error("staff_aadhar"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$staff_name = $this->security->xss_clean($this->input->post('staff_name'));
				$user_name = $this->security->xss_clean($this->input->post('user_name'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$staff_mobile = $this->security->xss_clean($this->input->post('staff_mobile'));
				$staff_desc = $this->security->xss_clean($this->input->post('staff_desc'));
				$roles = $this->security->xss_clean($this->input->post('roles'));
				// $role_permission = json_encode($this->security->xss_clean($this->input->post('role_permission')));
				$role_permission = $this->security->xss_clean($this->input->post('role_permission'));

				$staff_doj = $this->security->xss_clean($this->input->post('staff_doj'));
				$staff_doj = date("Y-m-d", strtotime($staff_doj)); 
				$staff_sallary = $this->security->xss_clean($this->input->post('staff_sallary'));
				// $staff_profile = $this->security->xss_clean($this->input->post('staff_profile'));
				// $staff_pan = $this->security->xss_clean($this->input->post('staff_pan'));
				// $staff_aadhar = $this->security->xss_clean($this->input->post('staff_aadhar'));

				$staff_profile_file_name = "";
				$staff_pan_file_name = "";
				$staff_aadhar_file_name = "";

				if (!empty($_FILES["staff_profile"])) {
					$staff_profile_data = $_FILES["staff_profile"]["name"];

					$staff_profile_img = $this->file_lib->file_upload($img_name = "staff_profile", $directory_name = "./assets/staff/staff_profile/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");

					if ($staff_profile_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["staff_profile_err"]  = $staff_profile_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($staff_profile_img["file_name"] != "") {
						$staff_profile_file_name = $staff_profile_img["file_name"];
						$staff_profile_file_size = $staff_profile_img["file_size"];
						$staff_profile_file_type = $staff_profile_img["file_type"];
					}
				}

				if (!empty($_FILES["staff_pan"])) {
					$staff_pan_data = $_FILES["staff_pan"]["name"];
					$staff_pan_img = $this->file_lib->file_upload($img_name = "staff_pan", $directory_name = "./assets/staff/staff_pan/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");

					if ($staff_pan_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["staff_pan_err"] = $staff_pan_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($staff_pan_img["file_name"] != "") {
						$staff_pan_file_name = $staff_pan_img["file_name"];
						$staff_pan_file_size = $staff_pan_img["file_size"];
						$staff_pan_file_type = $staff_pan_img["file_type"];
					}
				}

				if (!empty($_FILES["staff_aadhar"])) {
					$staff_aadhar_data = $_FILES["staff_aadhar"]["name"];
					$staff_aadhar_img = $this->file_lib->file_upload($img_name = "staff_aadhar", $directory_name = "./assets/staff/staff_aadhar/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");

					if ($staff_aadhar_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["staff_aadhar_err"] = $staff_aadhar_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($staff_aadhar_img["file_name"] != "") {
						$staff_aadhar_file_name = $staff_aadhar_img["file_name"];
						$staff_aadhar_file_size = $staff_aadhar_img["file_size"];
						$staff_aadhar_file_type = $staff_aadhar_img["file_type"];
					}
				}

				$add_arr[] = array(
					'staff_name' => $staff_name,
					'staff_username' => $user_name,
					'staff_password' => $password,
					'staff_email' => $email,
					'staff_mobile' => $staff_mobile,
					'staff_desc' => $staff_desc,
					'fk_user_role_id' => $roles,
					'role_permission' => $role_permission,

					'staff_doj' => $staff_doj,
					'staff_sallary' => $staff_sallary,
					'staff_profile' => $staff_profile_file_name,
					'staff_pan' => $staff_pan_file_name,
					'staff_aadhar' => $staff_aadhar_file_name,
					'create_date' => date("Y-m-d h:i:s")
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "staff", $add_arr, $return_type = "lastID");
				$staff_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($staff_id != "") {
				$validator["status"] = true;
				$validator["message"] = "User Staff is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_staff()
	{
		$validator = array('status' => false, 'messages' => array());
		$staff_id = $this->input->post("staff_id");

		if ($staff_id != "") {
			$joins_main[] = array("tbl" => "user_roles", "condtn" => "staff.fk_user_role_id = user_roles.user_role_id", "type" => "left");
			$whereArr["staff.staff_id"] = $staff_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag, DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj , staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar , staff.staff_mobile , staff.staff_desc , user_roles.user_role_title,staff.role_permission", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// print_r($user_role_id);
		// print_r($result);
		// die("Test 121");
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

	public function get_permission()
	{
		$validator = array('status' => false, 'messages' => array());
		$staff_id = $this->input->post("staff_id");

		if ($staff_id != "") {
			$whereArr["staff.staff_id"] = $staff_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag,staff.role_permission", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
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

	public function update_staff()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('staff_name', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('staff_mobile', 'Mobile', 'trim');
		$this->form_validation->set_rules('staff_desc', 'Desciption', 'trim');
		$this->form_validation->set_rules('roles', 'User Role', 'trim|required');

		$this->form_validation->set_rules('staff_doj', 'DOJ', 'trim');
		$this->form_validation->set_rules('staff_sallary', 'Sallary', 'trim');
		$this->form_validation->set_rules('staff_profile', 'Profile', 'trim');
		$this->form_validation->set_rules('staff_pan', 'PAN', 'trim');
		$this->form_validation->set_rules('staff_aadhar', 'Aadhar', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"staff_name_err" => form_error("staff_name"),
				"user_name_err" => form_error("user_name"),
				"password_err" => form_error("password"),
				"email_err" => form_error("email"),
				"staff_mobile_err" => form_error("staff_mobile"),
				"staff_desc_err" => form_error("staff_desc"),
				"roles_err" => form_error("roles"),

				"staff_doj_err" => form_error("staff_doj"),
				"staff_sallary_err" => form_error("staff_sallary"),
				"staff_profile_err" => form_error("staff_profile"),
				"staff_pan_err" => form_error("staff_pan"),
				"staff_aadhar_err" => form_error("staff_aadhar"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$staff_id = $this->security->xss_clean($this->input->post('staff_id'));
				$staff_name = $this->security->xss_clean($this->input->post('staff_name'));
				$user_name = $this->security->xss_clean($this->input->post('user_name'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$staff_mobile = $this->security->xss_clean($this->input->post('staff_mobile'));
				$staff_desc = $this->security->xss_clean($this->input->post('staff_desc'));
				$roles = $this->security->xss_clean($this->input->post('roles'));
				$role_permission = $this->security->xss_clean($this->input->post('role_permission'));
				
				// print_r($role_permission);die();

				$staff_doj = $this->security->xss_clean($this->input->post('staff_doj'));
				$staff_doj = date("Y-m-d", strtotime($staff_doj)); 
				$staff_sallary = $this->security->xss_clean($this->input->post('staff_sallary'));
				// $staff_profile = $this->security->xss_clean($this->input->post('staff_profile'));
				// $staff_pan = $this->security->xss_clean($this->input->post('staff_pan'));
				// $staff_aadhar = $this->security->xss_clean($this->input->post('staff_aadhar'));

				$staff_profile_file_name = "";
				$staff_pan_file_name = "";
				$staff_aadhar_file_name = "";

				if (!empty($staff_id)) {

					$staff_doc_whereArrstaff["staff.staff_id"] = $staff_id;
					$staff_doc_joins_main[] = array("tbl"=>"user_roles", "condtn"=>"staff.fk_user_role_id = user_roles.user_role_id", "type"=>"left");
					$staff_doc_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status,staff.role_permission, staff.del_flag , DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj , staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar , staff.staff_mobile , staff.staff_desc ,user_roles.sub_menu_permission", $whereArr = $staff_doc_whereArrstaff, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $staff_doc_joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$this->data["staff_doc_details"] = $staff_doc_details = $staff_doc_query["userData"];

					$profile_file_name = $staff_doc_details["staff_profile"];
					$pan_file_name = $staff_doc_details["staff_pan"];
					$aadhar_file_name = $staff_doc_details["staff_aadhar"];

					if (empty($staff_profile_file_name))
						$staff_profile_file_name = $staff_doc_details["staff_profile"];
					if (empty($staff_pan_file_name))
						$staff_pan_file_name = $staff_doc_details["staff_pan"];
					if (empty($staff_aadhar_file_name))
						$staff_aadhar_file_name = $staff_doc_details["staff_aadhar"];
				}

				$profile_file_name = "";
				$pan_file_name = "";
				$aadhar_file_name = "";
				
				if (!empty($_FILES["staff_profile"])) {
					if (!empty($profile_file_name)) {
						$staff_profile_data = $_FILES["staff_profile"]["name"];
						$staff_profile_img = $this->file_lib->file_upload($img_name = "staff_profile", $directory_name = "./assets/staff/staff_profile/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");
						if ($staff_profile_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["staff_profile_err"]  = $staff_profile_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($staff_profile_img["file_name"] != "") {
							$staff_profile_file_name = $staff_profile_img["file_name"];
							$staff_profile_file_size = $staff_profile_img["file_size"];
							$staff_profile_file_type = $staff_profile_img["file_type"];
						}
					} elseif (empty($profile_file_name)) {
						$staff_profile_data = $_FILES["staff_profile"]["name"];
						$staff_profile_img = $this->file_lib->file_upload($img_name = "staff_profile", $directory_name = "./assets/staff/staff_profile/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");

						if ($staff_profile_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["staff_profile_err"]  = $staff_profile_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($staff_profile_img["file_name"] != "") {
							$staff_profile_file_name = $staff_profile_img["file_name"];
							$staff_profile_file_size = $staff_profile_img["file_size"];
							$staff_profile_file_type = $staff_profile_img["file_type"];
						}
					}
				}

				if (!empty($_FILES["staff_pan"])) {
					if (!empty($pan_file_name)) {
						$staff_pan_data = $_FILES["staff_pan"]["name"];
						$staff_pan_img = $this->file_lib->file_upload($img_name = "staff_pan", $directory_name = "./assets/staff/staff_pan/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");
						if ($staff_pan_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["staff_pan_err"]  = $staff_pan_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($staff_pan_img["file_name"] != "") {
							$staff_pan_file_name = $staff_pan_img["file_name"];
							$staff_pan_file_size = $staff_pan_img["file_size"];
							$staff_pan_file_type = $staff_pan_img["file_type"];
						}
					} elseif (empty($pan_file_name)) {
						$staff_pan_data = $_FILES["staff_pan"]["name"];
						$staff_pan_img = $this->file_lib->file_upload($img_name = "staff_pan", $directory_name = "./assets/staff/staff_pan/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");

						if ($staff_pan_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["staff_pan_err"]  = $staff_pan_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($staff_pan_img["file_name"] != "") {
							$staff_pan_file_name = $staff_pan_img["file_name"];
							$staff_pan_file_size = $staff_pan_img["file_size"];
							$staff_pan_file_type = $staff_pan_img["file_type"];
						}
					}
				}
				if (!empty($_FILES["staff_aadhar"])) {
					if (!empty($aadhar_file_name)) {
						$staff_aadhar_data = $_FILES["staff_aadhar"]["name"];
						$staff_aadhar_img = $this->file_lib->file_upload($img_name = "staff_aadhar", $directory_name = "./assets/staff/staff_aadhar/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");
						if ($staff_aadhar_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["staff_aadhar_err"]  = $staff_aadhar_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($staff_aadhar_img["file_name"] != "") {
							$staff_aadhar_file_name = $staff_aadhar_img["file_name"];
							$staff_aadhar_file_size = $staff_aadhar_img["file_size"];
							$staff_aadhar_file_type = $staff_aadhar_img["file_type"];
						}
					} elseif (empty($aadhar_file_name)) {
						$staff_aadhar_data = $_FILES["staff_aadhar"]["name"];
						$staff_aadhar_img = $this->file_lib->file_upload($img_name = "staff_aadhar", $directory_name = "./assets/staff/staff_aadhar/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $staff_name . "-" . $user_name. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");

						if ($staff_aadhar_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["staff_aadhar_err"]  = $staff_aadhar_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($staff_aadhar_img["file_name"] != "") {
							$staff_aadhar_file_name = $staff_aadhar_img["file_name"];
							$staff_aadhar_file_size = $staff_aadhar_img["file_size"];
							$staff_aadhar_file_type = $staff_aadhar_img["file_type"];
						}
					}
				}

				$updateArr[] = array(
					'staff_id' => $staff_id,
					'staff_name' => $staff_name,
					'staff_username' => $user_name,
					'staff_password' => $password,
					'staff_email' => $email,
					'staff_mobile' => $staff_mobile,
					'staff_desc' => $staff_desc,
					'fk_user_role_id' => $roles,
					'role_permission' => $role_permission,

					'staff_doj' => $staff_doj,
					'staff_sallary' => $staff_sallary,
					'staff_profile' => $staff_profile_file_name,
					'staff_pan' => $staff_pan_file_name,
					'staff_aadhar' => $staff_aadhar_file_name,
					'modify_dt' => date("Y-m-d h:i:s")
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "staff", $updateArr, $updateKey = "staff_id", $whereArr = array("staff_id", $staff_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($staff_id != "") {
				$validator["status"] = true;
				$validator["message"] = "User Staff is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_staff()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"staff_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
			);
			if ($id != "") {
				$whereArr["staff.staff_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "staff", $updateArr, $updateKey = "staff_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "User Staff Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Staff Status.";
			}
			echo json_encode($result);
		}
	}

	public function recover_staff()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"staff_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
			);
			if ($id != "") {
				$whereArr["staff.staff_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "staff", $updateArr, $updateKey = "staff_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Staff Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Remove Staff.";
			}
			echo json_encode($result);
		}
	}

	public function index()
	{
		$this->data["title"] = $title = "Staff";
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

		$this->data["main_page"] = "master/staff_list";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_staff_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$groupByArr = array(
			"staff.staff_id",
		);
		$joins_main[] = array("tbl" => "user_roles", "condtn" => "staff.fk_user_role_id = user_roles.user_role_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag, DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj , staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar , staff.staff_mobile , staff.staff_desc , user_roles.user_role_title", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_staff_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_staff_data"] = $total_staff_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_staff_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_staff_status()
	{
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
				"staff_id" => $id,
				"staff_status" => $status, //1:Active, 0:In-Active
			);
			if ($id != "") {
				$whereArr["staff.staff_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "staff", $updateArr, $updateKey = "staff_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Staff " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Staff Status.";
			}
			echo json_encode($result);
		}
	}

	public function role_based_submenu(){
		$validator = array('status' => false, 'messages' => array());
		$roles = $this->input->post("roles");

		if ($roles != "") {
			$whereArr["user_roles.user_role_id"] = $roles;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.sub_menu_permission,user_roles.menu_permission,  user_roles.user_role_status, user_roles.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$user_roles_data = $query["userData"];
			$submenu_permission = $user_roles_data["sub_menu_permission"];
			// print_r($submenu_permission);
			// die("test");
			if($submenu_permission == "")
				$submenu_permission="";
			// 				print_r($submenu_permission);
			// die("test");
			
		}
		if($submenu_permission!=""){
			$whereArr["submenu.del_flag"] = 1;
			$whereArr["submenu.submenu_status"] = 1;
			$joins_main_1[] = array("tbl"=>"menu", "condtn"=>"submenu.fk_menu_id = menu.menu_id", "type"=>"left");	
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name", $whereArr = array(), $whereInArray = array("submenu.submenu_id"=>explode(",",$submenu_permission)), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_1, $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$submenu_list = $query["userData"];	
			// echo $this->db->last_query();
			// print_r($submenu_list);
			// die("Test441");
		}else{
			$submenu_list = array();
		}
		if (!empty($submenu_list)) {
			$validator["status"] = true;
			$validator["userdata"] = $submenu_list;
			$validator["message"] = "";
		} else {
			$validator["status"] = false;
			$validator["userdata"] = array();
			$validator["message"] = "Data Not Found !";
		}

		echo json_encode($validator);
	}

	public function download_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Staff Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);
		$this->load->helper('download');

		// print_r($doc_type);
		// print_r($doc_name);
		// die();

		if (!empty($doc_type)) {
			if ($doc_type == 1)
				$data = file_get_contents("./assets/staff/staff_profile/" . $doc_name);
			elseif ($doc_type == 2) 
				$data = file_get_contents("./assets/staff/staff_pan/" . $doc_name);
			elseif ($doc_type == 3) 
				$data = file_get_contents("./assets/staff/staff_aadhar/" . $doc_name);
			
		}

		force_download($doc_name, $data);
	}

	public function view_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Staff Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$extension = pathinfo("assets/staff/staff_profile/". $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/staff/staff_profile/". $doc_name);
			} elseif ($doc_type == 2) {
				$extension = pathinfo("assets/staff/staff_pan/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/staff/staff_pan/" . $doc_name);
			} elseif ($doc_type == 3) {
				$extension = pathinfo("assets/staff/staff_aadhar/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/staff/staff_aadhar/" . $doc_name);
			}
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}

	public function delete_doc()
	{
		$this->data["doc_type"] = $doc_type = $this->input->post("doc_type"); //1: Staff Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = $this->input->post("id");
		$this->data["doc_name"] = $doc_name = $this->input->post("doc_name");

		// print_r($doc_type);
		// print_r( $id);
		// print_r($doc_name);die();

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$title = "Profile Photo";
				$staff_profile = "";
				$extension = pathinfo("assets/staff/staff_profile/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/staff/staff_profile/" . $doc_name);
				unlink("./assets/staff/staff_profile/" . $doc_name);
				$updateArr[] = array(
					"staff_id" => $id,
					"staff_profile" => $staff_profile, 
				);
				$whereArr["staff.staff_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "staff", $updateArr, $updateKey = "staff_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 2) {
				$title = "PAN Card";
				$staff_pan = "";
				$extension = pathinfo("assets/staff/staff_pan/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/staff/staff_pan/" . $doc_name);
				unlink("./assets/staff/staff_pan/" . $doc_name);
				$updateArr[] = array(
					"staff_id" => $id,
					"staff_pan" => $staff_pan, 
				);
				$whereArr["staff.staff_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "staff", $updateArr, $updateKey = "staff_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 3) {
				$title = "Aadhar Card";
				$staff_aadhar = "";
				$extension = pathinfo("assets/staff/staff_aadhar/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/staff/staff_aadhar/" . $doc_name);
				unlink("./assets/staff/staff_aadhar/" . $doc_name);
				$updateArr[] = array(
					"staff_id" => $id,
					"staff_aadhar" => $staff_aadhar, 
				);
				$whereArr["staff.staff_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "staff", $updateArr, $updateKey = "staff_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			}
		}

		$this->session->set_flashdata("msg", "Document is Deleted successfully.");
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

	public function myprofile(){
		$staff_id = $this->session->userdata["@_staff_id"];
		$this->data["title"] = $title = "My Profile";
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
		$this->data["staff_details"] = $staff_details = array();
		if (!empty($staff_id)) {
			$whereArrstaff["staff.staff_id"] = $staff_id;
			$joins_main[] = array("tbl"=>"user_roles", "condtn"=>"staff.fk_user_role_id = user_roles.user_role_id", "type"=>"left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status,staff.role_permission, staff.del_flag , DATE_FORMAT(staff.staff_doj,'%d-%m-%Y') as staff_doj , staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar , staff.staff_mobile , staff.staff_desc ,user_roles.sub_menu_permission", $whereArr = $whereArrstaff, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$this->data["staff_details"] = $staff_details = $query["userData"];
		}

		$this->data["main_page"] = "master/my_profile/my_profile";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function update_my_auth()
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
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$staff_id = $this->security->xss_clean($this->input->post('staff_id'));
				$user_name = $this->security->xss_clean($this->input->post('user_name'));
				$password = $this->security->xss_clean($this->input->post('password'));

				$updateArr[] = array(
					'staff_id' => $staff_id,
					'staff_username' => $user_name,
					'staff_password' => $password,
					'modify_dt' => date("Y-m-d h:i:s")
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "staff", $updateArr, $updateKey = "staff_id", $whereArr = array("staff_id", $staff_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($staff_id != "") {
				$validator["status"] = true;
				$validator["message"] = "My Authentication Details is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function staff_profile(){

		$this->data["title"] = $title = "Staff Profile";
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

		$this->data["main_page"] = "master/my_profile/staff_card_details";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}
	// Staff Section End 





}
