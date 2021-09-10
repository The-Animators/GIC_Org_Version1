<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends Admin_gic_core
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
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "switch");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "switch");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
	}
	// Menu Section Start
	public function check_menu_name()
	{
		$menu_name = $this->input->post('menu_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = array("menu.menu_name" => $menu_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_menu_name', 'This Menu is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function check_menu_url()
	{
		$menu_url = $this->input->post('menu_url');

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = array("menu.menu_url" => $menu_url), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_menu_url', 'This Menu Url is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_menu()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('menu_name', 'Menu', 'trim|required|callback_check_menu_name');
		$this->form_validation->set_rules('menu_url', 'Menu Url', 'trim|required');
		// $this->form_validation->set_rules('menu_url', 'Menu Url', 'trim|required|callback_check_menu_url');
		$this->form_validation->set_rules('menu_icon', 'Menu Icon', 'trim|required');
		$this->form_validation->set_rules('menu_order', 'Menu Order', 'trim|required|integer');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"menu_name_err" => form_error("menu_name"),
				"menu_url_err" => form_error("menu_url"),
				"menu_icon_err" => form_error("menu_icon"),
				"menu_order_err" => form_error("menu_order"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$menu_name = $this->security->xss_clean($this->input->post('menu_name'));
				$menu_url = $this->security->xss_clean($this->input->post('menu_url'));
				$menu_icon = $this->security->xss_clean($this->input->post('menu_icon'));
				$menu_order = $this->security->xss_clean($this->input->post('menu_order'));

				$add_arr[] = array(
					'menu_name' => $menu_name,
					'menu_url' => $menu_url,
					'menu_icon' => $menu_icon,
					'menu_order' => $menu_order,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "menu", $add_arr, $return_type = "lastID");
				$menu_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($menu_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Menu is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_menu()
	{
		$validator = array('status' => false, 'messages' => array());
		$menu_id = $this->input->post("menu_id");

		if ($menu_id != "") {
			$whereArr["menu.menu_id"] = $menu_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// print_r($menu_id);
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

	public function update_menu()
	{
		$validator = array('status' => false, 'messages' => array());

		$menu_id = $this->security->xss_clean($this->input->post('menu_id'));
		$whereArr["menu.menu_id"] = $menu_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_menu_name = $result["menu_name"];
		$updated_menu_name = $this->input->post("menu_name");

		$current_menu_url = $result["menu_url"];
		$updated_menu_url = $this->input->post("menu_url");

		if ($current_menu_name != $updated_menu_name)
			$this->form_validation->set_rules('menu_name', 'Menu', 'trim|required|callback_check_menu_name');
		else
			$this->form_validation->set_rules('menu_name', 'Menu', 'trim|required');


		// if ($current_menu_url != $updated_menu_url)
		// 	$this->form_validation->set_rules('menu_url', 'Menu Url', 'trim|required|callback_check_menu_url');
		// else
		// 	$this->form_validation->set_rules('menu_url', 'Menu Url', 'trim|required');
		$this->form_validation->set_rules('menu_url', 'Menu Url', 'trim|required');
		$this->form_validation->set_rules('menu_icon', 'Menu Icon', 'trim|required');
		$this->form_validation->set_rules('menu_order', 'Menu Order', 'trim|required|integer');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"menu_name_err" => form_error("menu_name"),
				"menu_url_err" => form_error("menu_url"),
				"menu_icon_err" => form_error("menu_icon"),
				"menu_order_err" => form_error("menu_order"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$menu_id = $this->security->xss_clean($this->input->post('menu_id'));
				$menu_name = $this->security->xss_clean($this->input->post('menu_name'));
				$menu_url = $this->security->xss_clean($this->input->post('menu_url'));
				$menu_icon = $this->security->xss_clean($this->input->post('menu_icon'));
				$menu_order = $this->security->xss_clean($this->input->post('menu_order'));

				$updateArr[] = array(
					'menu_id' => $menu_id,
					'menu_name' => $menu_name,
					'menu_url' => $menu_url,
					'menu_icon' => $menu_icon,
					'menu_order' => $menu_order,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "menu", $updateArr, $updateKey = "menu_id", $whereArr = array("menu_id", $menu_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($menu_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Menu is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_menu()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"menu_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["menu.menu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "menu", $updateArr, $updateKey = "menu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Menu Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Menu Status.";
			}
			echo json_encode($result);
		}
	}

	public function recover_menu()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"menu_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["menu.menu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "menu", $updateArr, $updateKey = "menu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Menu Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Menu Status.";
			}
			echo json_encode($result);
		}
	}
	public function index()
	{
		$this->data["title"] = $title = "Menu";
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

		$this->data["main_page"] = "menu/menus";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_menu_list()
	{
		$filter_menu_name = $this->input->post("filter_menu_name");
		$filter_menu_url = $this->input->post("filter_menu_url");
		$filter_menu_icon = $this->input->post("filter_menu_icon");
		$filter_menu_order = $this->input->post("filter_menu_order");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"menu.menu_id",
		);

		$result2 = array();
		// $whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_menu_name))
				$likeCondtnArr["menu.menu_name"] = $filter_menu_name;

			if (!empty($filter_menu_url))
				$likeCondtnArr["menu.menu_url"] = $filter_menu_url;

			if (!empty($filter_menu_icon))
				$likeCondtnArr["menu.menu_icon"] = $filter_menu_icon;


			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["menu.menu_status"] = $filter_status;
			} else {
				$whereArr = array();
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("menu.menu_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_menu_data = count($result2);
			// print_r($filter_menu_name);
			// print_r($likeCondtnArr);
			// print_r($whereArr);
			// echo $this->db->last_query();die();
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_menu_data"] = $total_menu_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_menu_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_menu_list()
	{
		$validator = array('status' => false, 'messages' => array());

		$groupByArr = array(
			"menu.menu_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("menu.menu_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_menu_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_menu_data"] = $total_menu_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_menu_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_status()
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
				"menu_id" => $id,
				"menu_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["menu.menu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "menu", $updateArr, $updateKey = "menu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_icon, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Menu " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Menu Status.";
			}
			echo json_encode($result);
		}
	}
	// Menu Section End

	// Sub-Menu Section Start
	public function check_submenu_name()
	{
		$submenu_name = $this->input->post('submenu_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr = array("submenu.submenu_name" => $submenu_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_submenu_name', 'This Sub-Menu is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function check_submenu_url()
	{
		$submenu_url = $this->input->post('submenu_url');

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr = array("submenu.submenu_url" => $submenu_url), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_submenu_url', 'This Sub-Menu Url is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_submenu()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required');
		$this->form_validation->set_rules('submenu_name', 'Sub-Menu Name', 'trim|required|callback_check_submenu_name');
		// $this->form_validation->set_rules('submenu_url', 'Sub-Menu Url', 'trim|required|callback_check_submenu_url');
		$this->form_validation->set_rules('submenu_url', 'Sub-Menu Url', 'trim|required');
		$this->form_validation->set_rules('submenu_order', 'Sub-Menu Order', 'trim|required|integer');


		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"menu_name_err" => form_error("menu_name"),
				"submenu_name_err" => form_error("submenu_name"),
				"submenu_url_err" => form_error("submenu_url"),
				"submenu_order_err" => form_error("submenu_order"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$menu_name = $this->security->xss_clean($this->input->post('menu_name'));
				$submenu_name = $this->security->xss_clean($this->input->post('submenu_name'));
				$submenu_url = $this->security->xss_clean($this->input->post('submenu_url'));
				$submenu_order = $this->security->xss_clean($this->input->post('submenu_order'));

				$add_arr[] = array(
					'fk_menu_id' => $menu_name,
					'submenu_name' => $submenu_name,
					'submenu_url' => $submenu_url,
					'submenu_order' => $submenu_order,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "submenu", $add_arr, $return_type = "lastID");
				$submenu_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($submenu_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Sub-Menu is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_submenu()
	{
		$validator = array('status' => false, 'messages' => array());
		$submenu_id = $this->input->post("submenu_id");

		if ($submenu_id != "") {
			$whereArr["submenu.submenu_id"] = $submenu_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// print_r($submenu_id);
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

	public function update_submenu()
	{
		$validator = array('status' => false, 'messages' => array());

		$submenu_id = $this->security->xss_clean($this->input->post('submenu_id'));
		$whereArr["submenu.submenu_id"] = $submenu_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_submenu_name = $result["submenu_name"];
		$updated_submenu_name = $this->input->post("submenu_name");

		$current_submenu_url = $result["submenu_url"];
		$updated_submenu_url = $this->input->post("submenu_url");

		if ($current_submenu_name != $updated_submenu_name)
			$this->form_validation->set_rules('submenu_name', 'Sub-Menu', 'trim|required|callback_check_submenu_name');
		else
			$this->form_validation->set_rules('submenu_name', 'Sub-Menu', 'trim|required');

		// if ($current_submenu_url != $updated_submenu_url)
		// 	$this->form_validation->set_rules('submenu_url', 'Sub-Menu Url', 'trim|required|callback_check_submenu_url');
		// else
		// 	$this->form_validation->set_rules('submenu_url', 'Sub-Menu Url', 'trim|required');

		$this->form_validation->set_rules('submenu_url', 'Sub-Menu Url', 'trim|required');

		$this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required');
		$this->form_validation->set_rules('submenu_order', 'Sub-Menu Order', 'trim|required|integer');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"menu_name_err" => form_error("menu_name"),
				"submenu_name_err" => form_error("submenu_name"),
				"submenu_url_err" => form_error("submenu_url"),
				"submenu_order_err" => form_error("submenu_order"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$submenu_id = $this->security->xss_clean($this->input->post('submenu_id'));
				$menu_name = $this->security->xss_clean($this->input->post('menu_name'));
				$submenu_name = $this->security->xss_clean($this->input->post('submenu_name'));
				$submenu_url = $this->security->xss_clean($this->input->post('submenu_url'));
				$submenu_order = $this->security->xss_clean($this->input->post('submenu_order'));

				$updateArr[] = array(
					'submenu_id' => $submenu_id,
					'fk_menu_id' => $menu_name,
					'submenu_name' => $submenu_name,
					'submenu_url' => $submenu_url,
					'submenu_order' => $submenu_order,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "submenu", $updateArr, $updateKey = "submenu_id", $whereArr = array("submenu_id", $submenu_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($submenu_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Sub-Menu is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_submenu()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"submenu_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["submenu.submenu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "submenu", $updateArr, $updateKey = "submenu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub-Menu Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Sub-Menu Status.";
			}
			echo json_encode($result);
		}
	}

	public function recover_submenu()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"submenu_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["submenu.submenu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "submenu", $updateArr, $updateKey = "submenu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub-Menu Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Sub-Menu Status.";
			}
			echo json_encode($result);
		}
	}
	public function submenu_list()
	{
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["menu"] = $menu = $query["userData"];

		$this->data["title"] = $title = "Sub-Menu";
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

		$this->data["main_page"] = "menu/submenus";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_submenu_list()
	{
		$filter_menu_name = $this->input->post("filter_menu_name");
		$filter_submenu_name = $this->input->post("filter_submenu_name");
		$filter_submenu_url = $this->input->post("filter_submenu_url");
		$filter_submenu_order = $this->input->post("filter_submenu_order");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"submenu.submenu_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_submenu_name))
				$likeCondtnArr["submenu.submenu_name"] = $filter_submenu_name;

			if (!empty($filter_submenu_url))
				$likeCondtnArr["submenu.submenu_url"] = $filter_submenu_url;

			if (!empty($filter_submenu_order))
				$likeCondtnArr["submenu.submenu_order"] = $filter_submenu_order;

			if (!empty($filter_menu_name))
				$whereArr["submenu.fk_menu_id"] = $filter_menu_name;
			// else
			// 	$whereArr = array();

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["submenu.submenu_status"] = $filter_status;
			}
			//  else {
			// 	$whereArr = array();
			// }

			$joins_main[] = array("tbl" => "menu", "condtn" => "submenu.fk_menu_id = menu.menu_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag, menu.menu_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array("menu.menu_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_submenu_data = count($result2);
			// print_r($filter_menu_name);
			// print_r($likeCondtnArr);
			// print_r($whereArr);
			// echo $this->db->last_query();die();
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_submenu_data"] = $total_submenu_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_submenu_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_submenu_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$groupByArr = array(
			"submenu.submenu_id",
		);
		$joins_main[] = array("tbl" => "menu", "condtn" => "submenu.fk_menu_id = menu.menu_id", "type" => "left");

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag, menu.menu_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("menu.menu_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_submenu_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_submenu_data"] = $total_submenu_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_submenu_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_sub_menu_status()
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
				"submenu_id" => $id,
				"submenu_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["submenu.submenu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "submenu", $updateArr, $updateKey = "submenu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub-Menu " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Sub-Menu Status.";
			}
			echo json_encode($result);
		}
	}
	// Sub-Menu Section End

	// Child Sub-Menu Section Start
	public function check_child_submenu_name()
	{
		$child_submenu_name = $this->input->post('child_submenu_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id , child_submenu.del_flag", $whereArr = array("child_submenu.child_submenu_name" => $child_submenu_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_child_submenu_name', 'This Child Sub-Menu is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function check_child_submenu_url()
	{
		$child_submenu_url = $this->input->post('child_submenu_url');

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id , child_submenu.del_flag", $whereArr = array("child_submenu.child_submenu_url" => $child_submenu_url), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_child_submenu_url', 'This Child Sub-Menu Url is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_child_submenu()
	{
		$this->data["title"] = $title = "Child Sub-Menu";
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required');
		$this->form_validation->set_rules('submenu_name', 'Sub-Menu Name', 'trim|required');
		$this->form_validation->set_rules('child_submenu_name', 'Child Sub-Menu Name', 'trim|required|callback_check_child_submenu_name');
		$this->form_validation->set_rules('child_submenu_url', 'Child Sub-Menu Url', 'trim|required|callback_check_child_submenu_url');
		$this->form_validation->set_rules('child_submenu_order', 'Child Sub-Menu Order', 'trim|required|integer');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"menu_name_err" => form_error("menu_name"),
				"submenu_name_err" => form_error("submenu_name"),
				"child_submenu_name_err" => form_error("child_submenu_name"),
				"child_submenu_url_err" => form_error("child_submenu_url"),
				"child_submenu_order_err" => form_error("child_submenu_order"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$menu_name = $this->security->xss_clean($this->input->post('menu_name'));
				$submenu_name = $this->security->xss_clean($this->input->post('submenu_name'));
				$child_submenu_name = $this->security->xss_clean($this->input->post('child_submenu_name'));
				$child_submenu_url = $this->security->xss_clean($this->input->post('child_submenu_url'));
				$child_submenu_order = $this->security->xss_clean($this->input->post('child_submenu_order'));

				$add_arr[] = array(
					'fk_menu_id' => $menu_name,
					'fk_submenu_id' => $submenu_name,
					'child_submenu_name' => $child_submenu_name,
					'child_submenu_url' => $child_submenu_url,
					'child_submenu_order' => $child_submenu_order,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "child_submenu", $add_arr, $return_type = "lastID");
				$child_submenu_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($child_submenu_id != "") {
				$validator["status"] = true;
				$validator["message"] = $title . " is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_child_submenu()
	{
		$this->data["title"] = $title = "Child Sub-Menu";
		$validator = array('status' => false, 'messages' => array());
		$child_submenu_id = $this->input->post("child_submenu_id");

		if ($child_submenu_id != "") {
			$whereArr["child_submenu.child_submenu_id"] = $child_submenu_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id ,child_submenu.fk_submenu_id , child_submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
			$menu_id = $result["fk_menu_id"];
		}

		if ($menu_id != "") {
			$whereArr2["submenu.fk_menu_id"] = $menu_id;
			$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr2, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("submenu.submenu_name" => "ASC"), $groupByArr = array("submenu.submenu_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");

			$result2 = $query2["userData"];
			$result["sumbmenu_data_arr"] = $result2;
		}
		// print_r($child_submenu_id);
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

	public function update_child_submenu()
	{
		$this->data["title"] = $title = "Child Sub-Menu";
		$validator = array('status' => false, 'messages' => array());

		$child_submenu_id = $this->security->xss_clean($this->input->post('child_submenu_id'));
		$whereArr["child_submenu.child_submenu_id"] = $child_submenu_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id , child_submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_child_submenu_name = $result["child_submenu_name"];
		$updated_child_submenu_name = $this->input->post("child_submenu_name");

		$current_child_submenu_url = $result["child_submenu_url"];
		$updated_child_submenu_url = $this->input->post("child_submenu_url");

		if ($current_child_submenu_name != $updated_child_submenu_name)
			$this->form_validation->set_rules('child_submenu_name', 'Child Sub-Menu', 'trim|required|callback_check_child_submenu_name');
		else
			$this->form_validation->set_rules('child_submenu_name', 'Child Sub-Menu', 'trim|required');


		if ($current_child_submenu_url != $updated_child_submenu_url)
			$this->form_validation->set_rules('child_submenu_url', 'Child Sub-Menu Url', 'trim|required|callback_check_child_submenu_url');
		else
			$this->form_validation->set_rules('child_submenu_url', 'Child Sub-Menu Url', 'trim|required');

		$this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required');
		$this->form_validation->set_rules('submenu_name', 'Sub-Menu Name', 'trim|required');
		$this->form_validation->set_rules('child_submenu_name', 'Child Sub-Menu Name', 'trim|required');
		$this->form_validation->set_rules('child_submenu_order', 'Child Child Sub-Menu Order', 'trim|required|integer');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"menu_name_err" => form_error("menu_name"),
				"submenu_name_err" => form_error("submenu_name"),
				"child_submenu_name_err" => form_error("child_submenu_name"),
				"child_submenu_url_err" => form_error("child_submenu_url"),
				"child_submenu_order_err" => form_error("child_submenu_order"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$child_submenu_id = $this->security->xss_clean($this->input->post('child_submenu_id'));
				$menu_name = $this->security->xss_clean($this->input->post('menu_name'));
				$submenu_name = $this->security->xss_clean($this->input->post('submenu_name'));
				$child_submenu_name = $this->security->xss_clean($this->input->post('child_submenu_name'));
				$child_submenu_url = $this->security->xss_clean($this->input->post('child_submenu_url'));
				$child_submenu_order = $this->security->xss_clean($this->input->post('child_submenu_order'));

				$updateArr[] = array(
					'child_submenu_id' => $child_submenu_id,
					'fk_menu_id' => $menu_name,
					'fk_submenu_id' => $submenu_name,
					'child_submenu_name' => $child_submenu_name,
					'child_submenu_url' => $child_submenu_url,
					'child_submenu_order' => $child_submenu_order,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "child_submenu", $updateArr, $updateKey = "child_submenu_id", $whereArr = array("child_submenu_id", $child_submenu_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($child_submenu_id != "") {
				$validator["status"] = true;
				$validator["message"] = $title . " is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_child_submenu()
	{
		$this->data["title"] = $title = "Child Sub-Menu";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"child_submenu_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["child_submenu.child_submenu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "child_submenu", $updateArr, $updateKey = "child_submenu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id , child_submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing " . $title . ".";
			}
			echo json_encode($result);
		}
	}

	public function recover_child_submenu()
	{
		$this->data["title"] = $title = "Child Sub-Menu";
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"child_submenu_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["child_submenu.child_submenu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "child_submenu", $updateArr, $updateKey = "child_submenu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id , child_submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . " Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recovering " . $title . ".";
			}
			echo json_encode($result);
		}
	}

	public function child_submenu_list()
	{
		$this->data["menu_id"] = $menu_id = $this->uri->segment(4);
		$this->data["submenu_id"] = $submenu_id = $this->uri->segment(5);
		$this->data["title"] = $title = "Child Sub-Menu";

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "menu", $colNames = "menu.menu_id, menu.menu_name, menu.menu_url, menu.menu_order, menu.menu_status, menu.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["menu"] = $menu = $query["userData"];

		$this->data["title"] = $title = "Child Sub-Menu";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => "Menu",
			"breadcrumb_url" => base_url() . "sup_admin/menu",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "Sub-menu",
			"breadcrumb_url" => base_url() . "sup_admin/menu/submenu_list",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[3] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		// print_r($menu_id);
		// print_r($submenu_id);
		// print_r($breadcrumbs);
		// die();

		$this->data["main_page"] = "menu/child_submenus";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_childmenu_list()
	{
		$filter_menu_name = $this->input->post("filter_menu_name");
		$filter_submenu_name = $this->input->post("filter_submenu_name");
		$filter_childmenu_name = $this->input->post("filter_childmenu_name");
		$filter_childmenu_url = $this->input->post("filter_childmenu_url");
		$filter_childmenu_order = $this->input->post("filter_childmenu_order");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"child_submenu.child_submenu_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_childmenu_name))
				$likeCondtnArr["child_submenu.child_submenu_name"] = $filter_childmenu_name;

			if (!empty($filter_childmenu_url))
				$likeCondtnArr["child_submenu.child_submenu_url"] = $filter_childmenu_url;

			if (!empty($filter_childmenu_order))
				$likeCondtnArr["child_submenu.child_submenu_order"] = $filter_childmenu_order;

			if (!empty($filter_menu_name))
				$whereArr["child_submenu.fk_menu_id"] = $filter_menu_name;

			if (!empty($filter_submenu_name))
				$whereArr["child_submenu.fk_submenu_id"] = $filter_submenu_name;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["child_submenu.child_submenu_status"] = $filter_status;
			}

			$joins_main[] = array("tbl" => "menu", "condtn" => "child_submenu.fk_menu_id = menu.menu_id", "type" => "left");
			$joins_main[] = array("tbl" => "submenu", "condtn" => "child_submenu.fk_submenu_id = submenu.submenu_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id , child_submenu.del_flag, menu.menu_name, submenu.submenu_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array("menu.menu_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_childmenu_data = count($result2);
			// print_r($filter_menu_name);
			// print_r($likeCondtnArr);
			// print_r($whereArr);
			// echo $this->db->last_query();die();
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_childmenu_data"] = $total_childmenu_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_childmenu_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_child_submenu_list()
	{
		$this->data["title"] = $title = "Child Sub-Menu";
		$validator = array('status' => false, 'messages' => array());
		$menu_id = $this->input->post("menu_id");
		$submenu_id = $this->input->post("submenu_id");
		// print_r($menu_id."menu_id");print_r($submenu_id."submenu_id");die();
		$whereArr["child_submenu.fk_menu_id"] = $menu_id;
		$whereArr["child_submenu.fk_submenu_id"] = $submenu_id;
		$joins_main[] = array("tbl" => "menu", "condtn" => "child_submenu.fk_menu_id = menu.menu_id", "type" => "left");
		$joins_main[] = array("tbl" => "submenu", "condtn" => "child_submenu.fk_submenu_id = submenu.submenu_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id , child_submenu.del_flag, menu.menu_name, submenu.submenu_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("menu.menu_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_childmenu_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_childmenu_data"] = $total_childmenu_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_childmenu_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_child_submenu_status()
	{
		$this->data["title"] = $title = "Child Sub-Menu";
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
				"child_submenu_id" => $id,
				"child_submenu_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["child_submenu.child_submenu_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "child_submenu", $updateArr, $updateKey = "child_submenu_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "child_submenu", $colNames = "child_submenu.child_submenu_id, child_submenu.child_submenu_name, child_submenu.child_submenu_url, child_submenu.child_submenu_order, child_submenu.child_submenu_status,child_submenu.fk_submenu_id ,child_submenu.fk_menu_id , child_submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $title . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $title . " Status.";
			}
			echo json_encode($result);
		}
	}

	public function get_menu_based_submenu()
	{
		$validator = array('status' => false, 'messages' => array());
		$menu_name = $this->input->post("menu_name");

		if ($menu_name != "") {
			$whereArr["submenu.fk_menu_id"] = $menu_name;
			$whereArr["submenu.submenu_status"] = 1;
			$whereArr["submenu.del_flag"] = 1;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "submenu", $colNames = "submenu.submenu_id, submenu.submenu_name, submenu.submenu_url, submenu.submenu_order, submenu.submenu_status,submenu.fk_menu_id , submenu.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// print_r($submenu_id);
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
	// Child Sub-Menu Section End


}
