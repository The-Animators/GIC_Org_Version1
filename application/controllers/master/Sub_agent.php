<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_agent extends Admin_gic_core
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

		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$this->data["title"] = $title = "Sub-Agent";
		$this->staff_name = $this->session->userdata('@_staff_name');
		$this->staff_id = $this->session->userdata('@_staff_id');
		$this->user_role = $this->session->userdata('@_user_role_title');
		$this->user_role_id = $this->session->userdata('@_user_role_id');
	}
	// Sub-Agent Section Start
	public function check_agent_code()
	{
		$sub_agent_code = $this->input->post('sub_agent_code');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames = "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr = array("master_sub_agent.sub_agent_code" => $sub_agent_code), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_agent_code', 'This  Sub-Agent Code is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function get_sub_agent_counter()
	{
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$this->load->model("Mcommon");
			$counter = $this->Mcommon->get_last_counter($table_name = "master_sub_agent", $id = "sub_agent_id", $counter_col_name = "sub_agent_counter");

			// echo $this->db->last_query();
			// print_r($counter);die();

			if (!empty($counter)) {
				$counter_no = $counter["sub_agent_counter"];
			} else
				$counter_no = "";

			if (!empty($counter)) {
				$result["status"] = true;
				$result["userdata"] = $counter;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function add_Sub_agent()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('sub_agent_name', ' Sub-Agent Name', 'trim|required');
		$this->form_validation->set_rules('sub_agent_code', ' Sub-Agent Code', 'trim|required|callback_check_agent_code');
		$this->form_validation->set_rules('mobile_1', ' Mobile 1', 'trim|required');
		$this->form_validation->set_rules('mobile_2', ' Mobile 2', 'trim|required');
		$this->form_validation->set_rules('email', ' Email', 'trim|required');
		$this->form_validation->set_rules('login_our_site', ' Login Our Site', 'trim|required');
		$this->form_validation->set_rules('less_income_tax', ' Less Income Tax', 'trim|required');
		$this->form_validation->set_rules('commission_percentage', 'Commision Percentage', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('sub_agent_profile', 'Sub Agent Profile', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"sub_agent_name_err" => form_error("sub_agent_name"),
				"sub_agent_code_err" => form_error("sub_agent_code"),
				"mobile_1_err" => form_error("mobile_1"),
				"mobile_2_err" => form_error("mobile_2"),
				"email_err" => form_error("email"),
				"login_our_site_err" => form_error("login_our_site"),
				"less_income_tax_err" => form_error("less_income_tax"),
				"commission_percentage_err" => form_error("commission_percentage"),
				"address_err" => form_error("address"),
				"sub_agent_profile_err" => form_error("sub_agent_profile"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$sub_agent_name = $this->security->xss_clean($this->input->post('sub_agent_name'));
				$sub_agent_code = $this->security->xss_clean($this->input->post('sub_agent_code'));
				$mobile_1 = $this->security->xss_clean($this->input->post('mobile_1'));
				$mobile_2 = $this->security->xss_clean($this->input->post('mobile_2'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$login_our_site = $this->security->xss_clean($this->input->post('login_our_site'));
				$less_income_tax = $this->security->xss_clean($this->input->post('less_income_tax'));
				$commission_percentage = $this->security->xss_clean($this->input->post('commission_percentage'));
				$address = $this->security->xss_clean($this->input->post('address'));
				$sub_agent_counter = $this->security->xss_clean($this->input->post('sub_agent_counter'));

				$sub_agent_profile_file_name = "";

				if (!empty($_FILES["sub_agent_profile"])) {
					$sub_agent_profile_data = $_FILES["sub_agent_profile"]["name"];

					$sub_agent_profile_img = $this->file_lib->file_upload($img_name = "sub_agent_profile", $directory_name = "./assets/profile/sub_agent_profile/", $overwrite = False, $allowed_types = "JPEG|Jpeg|jpeg|PNG|JPG|Png|Jpg|jpeg|jpg|png", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $this->staff_name . "-" . $this->user_role. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");

					if ($sub_agent_profile_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["sub_agent_profile_err"]  = $sub_agent_profile_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($sub_agent_profile_img["file_name"] != "") {
						$sub_agent_profile_file_name = $sub_agent_profile_img["file_name"];
						$sub_agent_profile_file_size = $sub_agent_profile_img["file_size"];
						$sub_agent_profile_file_type = $sub_agent_profile_img["file_type"];
					}
				}

				$add_arr[] = array(
					'sub_agent_name' => $sub_agent_name,
					'sub_agent_code' => $sub_agent_code,
					'sub_agent_counter' => $sub_agent_counter,
					'contact_1' => $mobile_1,
					'contact_2' => $mobile_2,
					'email' => $email,
					'login_our_site' => $login_our_site,
					'less_income_tax' => $less_income_tax,
					'commission_percentage' => $commission_percentage,
					'address' => $address,
					'sub_agent_profile' => $sub_agent_profile_file_name,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_sub_agent", $add_arr, $return_type = "lastID");
				$sub_agent_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($sub_agent_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Sub-Agent is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_sub_agent()
	{
		$validator = array('status' => false, 'messages' => array());
		$sub_agent_id = $this->input->post("sub_agent_id");

		if ($sub_agent_id != "") {
			$whereArr["master_sub_agent.sub_agent_id"] = $sub_agent_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =  "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.address, master_sub_agent.sub_agent_profile, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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

	public function update_sub_agent()
	{
		$validator = array('status' => false, 'messages' => array());

		$sub_agent_id = $this->security->xss_clean($this->input->post('sub_agent_id'));
		$whereArr["master_sub_agent.sub_agent_id"] = $sub_agent_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =   "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];

		$current_sub_agent_code = $result["sub_agent_code"];
		$updated_sub_agent_code = $this->input->post("sub_agent_code");

		if ($current_sub_agent_code != $updated_sub_agent_code)
			$this->form_validation->set_rules('sub_agent_code', 'Sub-Agent Code', 'trim|required|callback_check_agent_code');
		else
			$this->form_validation->set_rules('sub_agent_code', 'Sub-Agent Code', 'trim|required');

		$this->form_validation->set_rules('sub_agent_name', ' Sub-Agent Name', 'trim|required');
		$this->form_validation->set_rules('mobile_1', ' Mobile 1', 'trim|required');
		$this->form_validation->set_rules('mobile_2', ' Mobile 2', 'trim|required');
		$this->form_validation->set_rules('email', ' Email', 'trim|required');
		$this->form_validation->set_rules('login_our_site', ' Login Our Site', 'trim|required');
		$this->form_validation->set_rules('less_income_tax', ' Less Income Tax', 'trim|required');
		$this->form_validation->set_rules('commission_percentage', 'Commision Percentage', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('sub_agent_profile', 'Sub Agent Profile', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"sub_agent_name_err" => form_error("sub_agent_name"),
				"sub_agent_code_err" => form_error("sub_agent_code"),
				"mobile_1_err" => form_error("mobile_1"),
				"mobile_2_err" => form_error("mobile_2"),
				"email_err" => form_error("email"),
				"login_our_site_err" => form_error("login_our_site"),
				"less_income_tax_err" => form_error("less_income_tax"),
				"commission_percentage_err" => form_error("commission_percentage"),
				"address_err" => form_error("address"),
				"sub_agent_profile_err" => form_error("sub_agent_profile"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$sub_agent_id = $this->security->xss_clean($this->input->post('sub_agent_id'));
				$sub_agent_name = $this->security->xss_clean($this->input->post('sub_agent_name'));
				$sub_agent_code = $this->security->xss_clean($this->input->post('sub_agent_code'));
				$mobile_1 = $this->security->xss_clean($this->input->post('mobile_1'));
				$mobile_2 = $this->security->xss_clean($this->input->post('mobile_2'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$login_our_site = $this->security->xss_clean($this->input->post('login_our_site'));
				$less_income_tax = $this->security->xss_clean($this->input->post('less_income_tax'));
				$commission_percentage = $this->security->xss_clean($this->input->post('commission_percentage'));
				$address = $this->security->xss_clean($this->input->post('address'));

				$sub_agent_profile_file_name = "";

				if (!empty($sub_agent_id)) {

					$sub_agent_whereArr["master_sub_agent.sub_agent_id"] = $sub_agent_id;
					$sub_agent_profile_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =  "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.address, master_sub_agent.sub_agent_profile, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr = $sub_agent_whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$this->data["sub_agent_profile_details"] = $sub_agent_profile_details = $sub_agent_profile_query["userData"];

					$profile_file_name = $sub_agent_profile_details["sub_agent_profile"];

					if (empty($sub_agent_profile_file_name))
						$sub_agent_profile_file_name = $sub_agent_profile_details["sub_agent_profile"];
				}

				$profile_file_name = "";
				
				if (!empty($_FILES["sub_agent_profile"])) {
					if (!empty($profile_file_name)) {
						$sub_agent_profile_data = $_FILES["sub_agent_profile"]["name"];
						$sub_agent_profile_img = $this->file_lib->file_upload($img_name = "sub_agent_profile", $directory_name = "./assets/profile/sub_agent_profile/", $overwrite = False, $allowed_types = "JPEG|Jpeg|jpeg|PNG|JPG|Png|Jpg|jpeg|jpg|png", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $this->staff_name . "-" . $this->user_role. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");
						if ($sub_agent_profile_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["sub_agent_profile_err"]  = $sub_agent_profile_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($sub_agent_profile_img["file_name"] != "") {
							$sub_agent_profile_file_name = $sub_agent_profile_img["file_name"];
							$sub_agent_profile_file_size = $sub_agent_profile_img["file_size"];
							$sub_agent_profile_file_type = $sub_agent_profile_img["file_type"];
						}
					} elseif (empty($profile_file_name)) {
						$sub_agent_profile_data = $_FILES["sub_agent_profile"]["name"];
						$sub_agent_profile_img = $this->file_lib->file_upload($img_name = "sub_agent_profile", $directory_name = "./assets/profile/sub_agent_profile/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $this->staff_name . "-" . $this->user_role. "-" .uniqid(), $url = "", $user_session_id = "_Policy_No_");

						if ($sub_agent_profile_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["sub_agent_profile_err"]  = $sub_agent_profile_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($sub_agent_profile_img["file_name"] != "") {
							$sub_agent_profile_file_name = $sub_agent_profile_img["file_name"];
							$sub_agent_profile_file_size = $sub_agent_profile_img["file_size"];
							$sub_agent_profile_file_type = $sub_agent_profile_img["file_type"];
						}
					}
				}

				$updateArr[] = array(
					'sub_agent_id' => $sub_agent_id,
					'sub_agent_name' => $sub_agent_name,
					'sub_agent_code' => $sub_agent_code,
					'contact_1' => $mobile_1,
					'contact_2' => $mobile_2,
					'email' => $email,
					'login_our_site' => $login_our_site,
					'less_income_tax' => $less_income_tax,
					'commission_percentage' => $commission_percentage,
					'address' => $address,
					'sub_agent_profile' => $sub_agent_profile_file_name,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_agent", $updateArr, $updateKey = "sub_agent_id", $whereArr = array("sub_agent_id", $sub_agent_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($sub_agent_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Sub-Agent is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function download_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Staff Profile , 2:Pan Card , 3:Aadhar Card
		$this->data["id"] = $id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);
		$this->load->helper('download');

		if (!empty($doc_type)) {
			if ($doc_type == 1)
				$data = file_get_contents("./assets/profile/sub_agent_profile/" . $doc_name);	
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
				$extension = pathinfo("assets/profile/sub_agent_profile/". $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/profile/sub_agent_profile/". $doc_name);
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

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$title = "Profile Photo";
				$sub_agent_profile = "";
				$extension = pathinfo("assets/profile/sub_agent_profile/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/profile/sub_agent_profile/" . $doc_name);
				unlink("./assets/profile/sub_agent_profile/" . $doc_name);
				$updateArr[] = array(
					"sub_agent_id" => $id,
					"sub_agent_profile" => $sub_agent_profile, 
				);
				$whereArr["master_sub_agent.sub_agent_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_agent", $updateArr, $updateKey = "sub_agent_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
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

	public function remove_sub_agent()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"sub_agent_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_sub_agent.sub_agent_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_agent", $updateArr, $updateKey = "sub_agent_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =   "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub-Agent Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Sub-Agent.";
			}
			echo json_encode($result);
		}
	}

	public function recover_sub_agent()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"sub_agent_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_sub_agent.sub_agent_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_agent", $updateArr, $updateKey = "sub_agent_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =   "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub-Agent Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover Sub-Agent.";
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

		$this->data["main_page"] = "master/sub_agent/sub_agent";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_sub_agent_list()
	{
		$filter_sub_agent_name = $this->input->post("filter_sub_agent_name");
		$filter_sub_agent_code = $this->input->post("filter_sub_agent_code");
		$filter_mobile_1 = $this->input->post("filter_mobile_1");
		$filter_mobile_2 = $this->input->post("filter_mobile_2");
		$filter_email = $this->input->post("filter_email");
		$filter_status = $this->input->post("filter_status");
		// $this->load->library("encrypt");
		// print_r($my_arr);
		// $decode_arr = $this->encrypt->base64_url_decode($my_arr);
		// print_r($decode_arr);
		// die();

		// $this->load->library("encrypt");
		// $data_arr = array(
		// 	"filter_sub_agent_name" => $filter_sub_agent_name,
		// 	"filter_sub_agent_code" => $filter_sub_agent_code,
		// );
		// $data_arr2 = json_encode($data_arr);
		// $encode_arr = $this->encrypt->base64_url_encode($data_arr2);
		// $decode_arr = $this->encrypt->base64_url_decode($encode_arr);
		// $decode_arr = json_encode($decode_arr);
		// print_r($encode_arr);print_r($decode_arr);die();

		$groupByArr = array(
			"master_sub_agent.sub_agent_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {

			if (!empty($filter_sub_agent_name))
				$likeCondtnArr["master_sub_agent.sub_agent_name"] = $filter_sub_agent_name;

			if (!empty($filter_sub_agent_code))
				$likeCondtnArr["master_sub_agent.sub_agent_code"] = $filter_sub_agent_code;
			if (!empty($filter_mobile_1))
				$likeCondtnArr["master_sub_agent.contact_1"] = $filter_mobile_1;
			if (!empty($filter_mobile_2))
				$likeCondtnArr["master_sub_agent.contact_2"] = $filter_mobile_2;
			if (!empty($filter_email))
				$likeCondtnArr["master_sub_agent.email"] = $filter_email;
			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_sub_agent.sub_agent_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =   "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("master_sub_agent.sub_agent_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_sub_agent_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_sub_agent_data"] = $total_sub_agent_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_sub_agent_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_sub_agent_list()
	{
		$validator = array('status' => false, 'messages' => array());

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =   "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_sub_agent.sub_agent_name" => "ASC"), $groupByArr = array("master_sub_agent.sub_agent_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_sub_agent_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_sub_agent_data"] = $total_sub_agent_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_sub_agent_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_sub_agent_status()
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
				"sub_agent_id" => $id,
				"sub_agent_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_sub_agent.sub_agent_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_sub_agent", $updateArr, $updateKey = "sub_agent_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames =  "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code, master_sub_agent.contact_1, master_sub_agent.contact_2, master_sub_agent.email, master_sub_agent.login_our_site, master_sub_agent.less_income_tax, master_sub_agent.commission_percentage, master_sub_agent.del_flag, master_sub_agent.sub_agent_status", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Sub-Agent " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Sub-Agent Status.";
			}
			echo json_encode($result);
		}
	}
	//  Sub-Agent  Section End





}
