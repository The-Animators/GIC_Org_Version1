<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends Admin_gic_core
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
	// Role Section Start
	public function check_role_name()
	{
		$user_role = $this->input->post('user_role');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr = array("user_roles.user_role_title" => $user_role), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_role_name', 'This Role is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_role()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('user_role', 'User Role', 'trim|required|callback_check_role_name');
		$menu = $this->security->xss_clean($this->input->post('menu'));
		if ($menu == "")
			$this->form_validation->set_rules('menu', 'Menu', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"user_role_err" => form_error("user_role"),
				"menu_err" => form_error("menu"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$user_role = $this->security->xss_clean($this->input->post('user_role'));
				$menu = implode(",", $this->security->xss_clean($this->input->post('menu')));
				$tot_submenu_id =  $this->security->xss_clean($this->input->post('tot_submenu_id'));
				if ($tot_submenu_id != "") {
					$submenu_id = multidimensional_to_singlearray($tot_submenu_id);
					$submenu_id = implode(",", $submenu_id);
				} else {
					$submenu_id = "";
				}
				// print_r($menu);
				// die("Test");
				$add_arr[] = array(
					'user_role_title' => $user_role,
					'menu_permission' => $menu,
					'sub_menu_permission' => $submenu_id,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "user_roles", $add_arr, $return_type = "lastID");
				$user_role_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($user_role_id != "") {
				$validator["status"] = true;
				$validator["message"] = "User Role is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_role()
	{
		$validator = array('status' => false, 'messages' => array());
		$user_role_id = $this->input->post("user_role_id");

		if ($user_role_id != "") {
			$whereArr["user_roles.user_role_id"] = $user_role_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.sub_menu_permission,user_roles.menu_permission,  user_roles.user_role_status, user_roles.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];

			$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name", $whereArr = array(), $whereInArray = array("menu.menu_id" => explode(",", $result["menu_permission"])), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");

			$result2 = $query2["userData"];
			$menu_names = "";
			foreach ($result2 as $row) {
				if ($menu_names == "")
					$menu_names = $row["menu_name"];
				else
					$menu_names .= "," . $row["menu_name"];
			}
			// $menu_names = implode(",",$result2["menu_name"]);
			$result["menu_name"] = $menu_names;
			// echo $this->db->last_query();
			// print_r($result["menu_permission"]);
			// print_r($result);
			// die("Test");
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

	public function update_role()
	{
		$validator = array('status' => false, 'messages' => array());

		$user_role_id = $this->security->xss_clean($this->input->post('user_role_id'));
		$whereArr["user_roles.user_role_id"] = $user_role_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_user_role = $result["user_role_title"];
		$updated_user_role = $this->input->post("user_role");
		$menu = $this->security->xss_clean($this->input->post('menu'));

		if ($current_user_role != $updated_user_role)
			$this->form_validation->set_rules('user_role', 'User Role', 'trim|required|callback_check_role_name');
		else
			$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');
		if ($menu == "")
			$this->form_validation->set_rules('menu', 'Menu', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"user_role_err" => form_error("user_role"),
				"menu_err" => form_error("menu"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$user_role_id = $this->security->xss_clean($this->input->post('user_role_id'));
				$user_role = $this->security->xss_clean($this->input->post('user_role'));
				$menu = implode(",", $this->security->xss_clean($this->input->post('menu')));
				$tot_submenu_id =  $this->security->xss_clean($this->input->post('tot_submenu_id'));

				if ($tot_submenu_id != "") {
					$submenu_id = multidimensional_to_singlearray($tot_submenu_id);
					$submenu_id = implode(",", $submenu_id);
				} else {
					$submenu_id = "";
				}
				// print_r($menu);
				// print_r($submenu_id);
				// die("Test");
				$updateArr[] = array(
					'user_role_id' => $user_role_id,
					'user_role_title' => $user_role,
					'menu_permission' => $menu,
					'sub_menu_permission' => $submenu_id,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "user_roles", $updateArr, $updateKey = "user_role_id", $whereArr = array("user_role_id", $user_role_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($user_role_id != "") {
				$validator["status"] = true;
				$validator["message"] = "User Role is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_role()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"user_role_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
			);
			if ($id != "") {
				$whereArr["user_roles.user_role_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "user_roles", $updateArr, $updateKey = "user_role_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "User Role Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update User Role Status.";
			}
			echo json_encode($result);
		}
	}

	public function recover_role()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"user_role_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
			);
			if ($id != "") {
				$whereArr["user_roles.user_role_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "user_roles", $updateArr, $updateKey = "user_role_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "User Role Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update User Role Status.";
			}
			echo json_encode($result);
		}
	}
	public function index()
	{
		$MenuwhereArr["menu.del_flag"] = 1;
		$MenuwhereArr["menu.menu_status"] = 1;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = $MenuwhereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["menu_list"] = $menu_list = $query["userData"];

		$whereArr["submenu.del_flag"] = 1;
		$whereArr["submenu.submenu_status"] = 1;
		$joins_main[] = array("tbl" => "menu", "condtn" => "submenu.fk_menu_id = menu.menu_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag, menu.menu_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["submenu_list"] = $submenu_list = $query["userData"];

		$this->data["title"] = $title = "User Role";
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

		$this->data["main_page"] = "section/user_roles";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function menu_base_submenu()
	{
		if ($this->input->post() != "") {
			$menu_id = $this->input->post("menu_id");
			$menu_id = explode(",", $menu_id);

			$whereArr["submenu.del_flag"] = 1;
			$whereArr["submenu.submenu_status"] = 1;
			$whereInArray["submenu.fk_menu_id"] = $menu_id;
			$joins_main[] = array("tbl" => "menu", "condtn" => "submenu.fk_menu_id = menu.menu_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag, menu.menu_name", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$submenu_list = $query["userData"];
			// echo $this->db->last_query();
			// print_r($submenu_list);
			// die("test");

			if (!empty($submenu_list)) {
				$result["status"] = true;
				$result["userdata"] = $submenu_list;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function filter_userrole()
	{
		$filter_user_role = $this->input->post("filter_user_role");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"user_roles.user_role_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_user_role))
				$likeCondtnArr["user_roles.user_role_title"] = $filter_user_role;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["user_roles.user_role_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("user_roles.user_role_title" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_userrole_data = count($result2);
			// print_r($filter_menu_name);
			// print_r($likeCondtnArr);
			// print_r($whereArr);
			// echo $this->db->last_query();die();
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_userrole_data"] = $total_userrole_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_userrole_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_role_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$groupByArr = array(
			"user_roles.user_role_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("user_roles.user_role_title" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_userrole_data = count($result2);

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_userrole_data"] = $total_userrole_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_userrole_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_role_status()
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
				"user_role_id" => $id,
				"user_role_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
			);
			if ($id != "") {
				$whereArr["user_roles.user_role_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "user_roles", $updateArr, $updateKey = "user_role_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "User Role " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update User Role Status.";
			}
			echo json_encode($result);
		}
	}
	// Role Section End





}
