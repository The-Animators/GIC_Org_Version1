<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agency extends Admin_gic_core
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
		// $button_allowed_data=button_allowed();
		$ip_address = $this->input->ip_address();
		//print_r($ip_address);die();
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$this->data["title"] = $title = "Agency";
		$this->staff_name = $this->session->userdata('@_staff_name');
		$this->staff_id = $this->session->userdata('@_staff_id');
		$this->user_role = $this->session->userdata('@_user_role_title');
		$this->user_role_id = $this->session->userdata('@_user_role_id');
	}
	// Agent Section Start
	public function check_agent_code()
	{
		$agent_code = $this->input->post('agent_code');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status, master_agency.del_flag", $whereArr = array("master_agency.code" => $agent_code), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_agent_code', 'This Agency Code is already Exist.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_agent()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('agent_name', 'Agent Name', 'trim|required');
		$this->form_validation->set_rules('agent_code', 'Agency Code', 'trim|required|callback_check_agent_code');
		$this->form_validation->set_rules('username', 'User Id', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('link', ' Portal Link', 'trim');
		$this->form_validation->set_rules('agent_profile', 'Agent Profile', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"agent_name_err" => form_error("agent_name"),
				"agent_code_err" => form_error("agent_code"),
				"username_err" => form_error("username"),
				"password_err" => form_error("password"),
				"link_err" => form_error("link"),
				"agent_profile_err" => form_error("agent_profile"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$agent_name = $this->security->xss_clean($this->input->post('agent_name'));
				$agent_code = $this->security->xss_clean($this->input->post('agent_code'));
				$username = $this->security->xss_clean($this->input->post('username'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$link = $this->security->xss_clean($this->input->post('link'));

				$agent_profile_file_name = "";

				if (!empty($_FILES["agent_profile"])) {
					$agent_profile_data = $_FILES["agent_profile"]["name"];

					$agent_profile_img = $this->file_lib->file_upload($img_name = "agent_profile", $directory_name = "./assets/profile/agent_profile/", $overwrite = False, $allowed_types = "JPEG|Jpeg|jpeg|PNG|JPG|Png|Jpg|jpeg|jpg|png", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $this->staff_name . "-" . $this->user_role . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

					if ($agent_profile_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["agent_profile_err"]  = $agent_profile_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($agent_profile_img["file_name"] != "") {
						$agent_profile_file_name = $agent_profile_img["file_name"];
						$agent_profile_file_size = $agent_profile_img["file_size"];
						$agent_profile_file_type = $agent_profile_img["file_type"];
					}
				}

				$add_arr[] = array(
					'fk_mcompany_id' => $company,
					'name' => $agent_name,
					'code' => $agent_code,
					'username' => $username,
					'password' => $password,
					'link' => $link,
					'fk_staff_id' => $this->staff_id,
					'fk_user_role_id' => $this->user_role_id,
					'agent_profile' => $agent_profile_file_name,
					'create_date' => date("Y-m-d h:i:s"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_agency", $add_arr, $return_type = "lastID");
				$agent_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
			if (!empty($agent_id)) {
				$validator["status"] = true;
				$validator["message"] = "Agent is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_agent()
	{
		$validator = array('status' => false, 'messages' => array());
		$agent_id = $this->input->post("agent_id");

		if (!empty($agent_id)) {
			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_agency.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
			
			$whereArr["master_agency.magency_id"] = $agent_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status, master_agency.del_flag,master_company.company_name", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("master_agency.magency_id"), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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

	public function update_agent()
	{
		$validator = array('status' => false, 'messages' => array());

		$agent_id = $this->security->xss_clean($this->input->post('agent_id'));
		$whereArr["master_agency.magency_id"] = $agent_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id,master_agency.agent_profile, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status, master_agency.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];

		$current_code = $result["code"];
		$updated_code = $this->input->post("code");

		if ($current_code != $updated_code)
			$this->form_validation->set_rules('agent_code', 'Agency Code', 'trim|required|callback_check_agent_code');
		else
			$this->form_validation->set_rules('agent_code', 'Agency Code', 'trim|required');

		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('agent_name', 'Agent Name', 'trim|required');
		$this->form_validation->set_rules('username', 'User Id', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('link', ' Portal Link', 'trim');
		$this->form_validation->set_rules('agent_profile', 'Agent Profile', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"agent_name_err" => form_error("agent_name"),
				"agent_code_err" => form_error("agent_code"),
				"username_err" => form_error("username"),
				"password_err" => form_error("password"),
				"link_err" => form_error("link"),
				"agent_profile_err" => form_error("agent_profile"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$agent_id = $this->security->xss_clean($this->input->post('agent_id'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$agent_name = $this->security->xss_clean($this->input->post('agent_name'));
				$agent_code = $this->security->xss_clean($this->input->post('agent_code'));
				$username = $this->security->xss_clean($this->input->post('username'));
				$password = $this->security->xss_clean($this->input->post('password'));
				$link = $this->security->xss_clean($this->input->post('link'));

				$agent_profile_file_name = "";

				if (!empty($agent_id)) {

					$sub_agent_whereArr["master_agency.magency_id"] = $agent_id;
					$agent_profile_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id,master_agency.agent_profile, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status", $whereArr = $sub_agent_whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$this->data["agent_profile_details"] = $agent_profile_details = $agent_profile_query["userData"];

					$profile_file_name = $agent_profile_details["agent_profile"];

					if (empty($agent_profile_file_name))
						$agent_profile_file_name = $agent_profile_details["agent_profile"];
				}

				$profile_file_name = "";

				if (!empty($_FILES["agent_profile"])) {
					if (!empty($profile_file_name)) {
						$agent_profile_data = $_FILES["agent_profile"]["name"];
						$agent_profile_img = $this->file_lib->file_upload($img_name = "agent_profile", $directory_name = "./assets/profile/agent_profile/", $overwrite = False, $allowed_types = "JPEG|Jpeg|jpeg|PNG|JPG|Png|Jpg|jpeg|jpg|png", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $this->staff_name . "-" . $this->user_role . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");
						if ($agent_profile_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["agent_profile_err"]  = $agent_profile_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($agent_profile_img["file_name"] != "") {
							$agent_profile_file_name = $agent_profile_img["file_name"];
							$agent_profile_file_size = $agent_profile_img["file_size"];
							$agent_profile_file_type = $agent_profile_img["file_type"];
						}
					} elseif (empty($profile_file_name)) {
						$agent_profile_data = $_FILES["agent_profile"]["name"];
						$agent_profile_img = $this->file_lib->file_upload($img_name = "agent_profile", $directory_name = "./assets/profile/agent_profile/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $this->staff_name . "-" . $this->user_role . "-" . uniqid(), $url = "", $user_session_id = "_Policy_No_");

						if ($agent_profile_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["agent_profile_err"]  = $agent_profile_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($agent_profile_img["file_name"] != "") {
							$agent_profile_file_name = $agent_profile_img["file_name"];
							$agent_profile_file_size = $agent_profile_img["file_size"];
							$agent_profile_file_type = $agent_profile_img["file_type"];
						}
					}
				}

				$updateArr[] = array(
					'magency_id' => $agent_id,
					'fk_mcompany_id' => $company,
					'name' => $agent_name,
					'code' => $agent_code,
					'username' => $username,
					'password' => $password,
					'link' => $link,
					'agent_profile' => $agent_profile_file_name,
					'fk_staff_id' => $this->staff_id,
					'fk_user_role_id' => $this->user_role_id,
					'modify_dt' => date("Y-m-d h:i:s"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_agency", $updateArr, $updateKey = "magency_id", $whereArr = array("magency_id", $agent_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if (!empty($agent_id)) {
				$validator["status"] = true;
				$validator["message"] = "Agent is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function download_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Agent Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);
		$this->load->helper('download');

		if (!empty($doc_type)) {
			if ($doc_type == 1)
				$data = file_get_contents("./assets/profile/agent_profile/" . $doc_name);
		}

		force_download($doc_name, $data);
	}

	public function view_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Agent Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$extension = pathinfo("assets/profile/agent_profile/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/profile/agent_profile/" . $doc_name);
			}
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}

	public function delete_doc()
	{
		$this->data["doc_type"] = $doc_type = $this->input->post("doc_type"); //1: Agent Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = $this->input->post("id");
		$this->data["doc_name"] = $doc_name = $this->input->post("doc_name");

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$title = "Profile Photo";
				$agent_profile = "";
				$extension = pathinfo("assets/profile/agent_profile/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/profile/agent_profile/" . $doc_name);
				unlink("./assets/profile/agent_profile/" . $doc_name);
				$updateArr[] = array(
					"magency_id" => $id,
					"agent_profile" => $agent_profile,
				);
				$whereArr["master_agency.magency_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_agency", $updateArr, $updateKey = "magency_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			}
		}

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

	public function remove_agent()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"magency_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				'fk_staff_id' => $this->staff_id,
				'fk_user_role_id' => $this->user_role_id,
			);
			if ($id != "") {
				$whereArr["master_agency.magency_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_agency", $updateArr, $updateKey = "magency_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id,master_agency.agent_profile, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status, master_agency.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Agent Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Agent.";
			}
			echo json_encode($result);
		}
	}

	public function recover_agent()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"magency_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				'fk_staff_id' => $this->staff_id,
				'fk_user_role_id' => $this->user_role_id,
			);
			if ($id != "") {
				$whereArr["master_agency.magency_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_agency", $updateArr, $updateKey = "magency_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id,master_agency.agent_profile, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status, master_agency.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Agent Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover Agent.";
			}
			echo json_encode($result);
		}
	}
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

		$this->data["main_page"] = "master/agency/agent";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_agent_list()
	{
		$filter_agent_name = $this->input->post("filter_agent_name");
		$filter_agent_code = $this->input->post("filter_agent_code");
		$filter_username = $this->input->post("filter_username");
		$filter_password = $this->input->post("filter_password");
		$filter_link = $this->input->post("filter_link");
		$filter_status = $this->input->post("filter_status");
		$filter_company = $this->input->post("filter_company");

		$groupByArr = array(
			"master_agency.magency_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {

			if (!empty($filter_company))
				$whereArr["master_agency.fk_mcompany_id"] = $filter_company;

			if (!empty($filter_agent_name))
				$likeCondtnArr["master_agency.name"] = $filter_agent_name;

			if (!empty($filter_agent_code))
				$likeCondtnArr["master_agency.code"] = $filter_agent_code;

			if (!empty($filter_username))
				$likeCondtnArr["master_agency.link"] = $filter_username;

			if (!empty($filter_link))
				$likeCondtnArr["master_agency.username"] = $filter_link;

			if (!empty($filter_password))
				$likeCondtnArr["master_agency.password"] = $filter_password;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_agency.magency_status"] = $filter_status;
			}

			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_agency.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
			
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id,master_agency.agent_profile, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status, master_agency.del_flag,master_company.company_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array("master_agency.name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_agent_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_agent_data"] = $total_agent_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_agent_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_agent_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_agency.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
			
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id,master_agency.agent_profile, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status, master_agency.del_flag,master_company.company_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("master_agency.name" => "ASC"), $groupByArr = array("master_agency.magency_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_agent_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_agent_data"] = $total_agent_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_agent_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_agent_status()
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
				"magency_id" => $id,
				"magency_status" => $status, //1:Active, 0:In-Active
				'fk_staff_id' => $this->staff_id,
				'fk_user_role_id' => $this->user_role_id,
			);
			if ($id != "") {
				$whereArr["master_agency.magency_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_agency", $updateArr, $updateKey = "magency_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code, master_agency.link, master_agency.username, master_agency.password, master_agency.fk_staff_id, master_agency.fk_user_role_id, master_agency.fk_mcompany_id,master_agency.agent_profile, master_agency.create_date, master_agency.modify_dt, master_agency.magency_status, master_agency.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Agent " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Agent Status.";
			}
			echo json_encode($result);
		}
	}
	//  Agent  Section End





}
