<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tpa extends Admin_gic_core
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
	}
	// TPA Section Start
	public function check_tpa_name()
	{
		$tpa_name = $this->input->post('tpa_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.del_flag as tpa_del_flag ", $whereArr = array("master_tpa.tpa_name" => $tpa_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_tpa_name', 'This TPA is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function tpa()
	{
		$this->data["title"] = $title = "TPA";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "master/tpa",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "Add " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/tpa/add_tpa";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_tpa()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('tpa_name', 'TPA Name', 'trim|required|callback_check_tpa_name');
		$this->form_validation->set_rules('short_name', 'Short Name', 'trim');
		$this->form_validation->set_rules('comman_email', 'Common Email', 'trim');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('state', 'State', 'trim');
		$this->form_validation->set_rules('city', 'city', 'trim');
		$this->form_validation->set_rules('pincode', 'pincode', 'trim');
		$this->form_validation->set_rules('office_contact', 'office_contact', 'trim');
		$this->form_validation->set_rules('website', 'website', 'trim');
		$this->form_validation->set_rules('tollfree_1', 'Toll Free No.1', 'trim');
		$this->form_validation->set_rules('tollfree_2', 'Toll Free No.2', 'trim');
		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"tpa_name_err" => form_error("tpa_name"),
				"short_name_err" => form_error("short_name"),
				"comman_email_err" => form_error("comman_email"),
				"address_err" => form_error("address"),
				"state_err" => form_error("state"),
				"city_err" => form_error("city"),
				"pincode_err" => form_error("pincode"),
				"office_contact_err" => form_error("office_contact"),
				"website_err" => form_error("website"),
				"tollfree_1_err" => form_error("tollfree_1"),
				"tollfree_2_err" => form_error("tollfree_2"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$tpa_name = $this->security->xss_clean($this->input->post('tpa_name'));
				$short_name = $this->security->xss_clean($this->input->post('short_name'));
				$comman_email = $this->security->xss_clean($this->input->post('comman_email'));
				$address = $this->security->xss_clean($this->input->post('address'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$pincode = $this->security->xss_clean($this->input->post('pincode'));
				$office_contact = $this->security->xss_clean($this->input->post('office_contact'));
				$website = $this->security->xss_clean($this->input->post('website'));
				$tollfree_1 = $this->security->xss_clean($this->input->post('tollfree_1'));
				$tollfree_2 = $this->security->xss_clean($this->input->post('tollfree_2'));

				$total_employee = json_decode($this->security->xss_clean($this->input->post('total_employee')));
				// print_r($total_employee);
				// die("Test123");

				$tpa_claim_upload_file_name = "";
				if (!empty($_FILES["tpa_claim_upload"])) {
					$tpa_claim_upload_data = $_FILES["tpa_claim_upload"]["name"];

					$tpa_claim_upload_img = $this->file_lib->file_upload($img_name = "tpa_claim_upload", $directory_name = "./policy_document/tpa_claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  $short_name . "-" . "Tpa_Claim_form", $url = "", $user_session_id = "_Policy_No_");

					if ($tpa_claim_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["tpa_claim_upload_err"]  = $tpa_claim_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($tpa_claim_upload_img["file_name"] != "") {
						$tpa_claim_upload_file_name = $tpa_claim_upload_img["file_name"];
						$tpa_claim_upload_file_size = $tpa_claim_upload_img["file_size"];
						$tpa_claim_upload_file_type = $tpa_claim_upload_img["file_type"];
					}
				}

				$create_date = date("Y-m-d h:i:s");
				$add_tpa_arr[] = array(
					'tpa_name' => $tpa_name,
					'short_name' => $short_name,
					'common_email' => $comman_email,
					'address' => $address,
					'state' => $state,
					'city' => $city,
					'zipcode' => $pincode,
					'office_contact' => $office_contact,
					'website' => $website,
					'tollfree_no_1' => $tollfree_1,
					'tollfree_no_2' => $tollfree_2,
					'tpa_claim_upload' => $tpa_claim_upload_file_name,
					'create_date' => $create_date,
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_tpa", $add_tpa_arr, $return_type = "lastID");
				$mtpa_id = $query["lastID"];

				if (!empty($mtpa_id)) {
					if (!empty($total_employee)) {
						$counts = count($total_employee);
						// $counts = count($total_employee);
						for ($i = 0; $i < $counts; $i++) {
							// $name = $total_employee[$i][0];
							if (!empty($total_employee[$i][0]))
								$name = $total_employee[$i][0];
							else
								$name = "";
							// $designation = $total_employee[$i][1];
							if (!empty($total_employee[$i][1]))
								$designation = $total_employee[$i][1];
							else
								$designation = "";
							// $contact1 = $total_employee[$i][2];
							if (!empty($total_employee[$i][2]))
								$contact1 = $total_employee[$i][2];
							else
								$contact1 = "";
							// $contact2 = $total_employee[$i][3];
							if (!empty($total_employee[$i][3]))
								$contact2 = $total_employee[$i][3];
							else
								$contact2 = "";

							if (!empty($total_employee[$i][4]))
								$email1 = $total_employee[$i][4];
							else
								$email1 = "";
							$add_employee_arr[$i] = array(
								'name' => $name,
								'designation' => $designation,
								'contact1' => $contact1,
								'contact2' => $contact2,
								'email1' => $email1,
								'fk_mtpa_id' => $mtpa_id,
								'create_date' => $create_date,
								"fk_staff_id" => $this->session->userdata("@_staff_id"),
								"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
							);
						}
					}
					// print_r($counts);
					// print_r($total_employee);
					// print_r($add_employee_arr);
					// die();
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_tpa_member", $add_employee_arr, $return_type = "lastID");
					$mtpa_member_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($mtpa_member_id != "") {
				$validator["status"] = true;
				$validator["message"] = "TPA Details Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_tpa()
	{
		$this->data["tpa_id"] = $tpa_id = $this->uri->segment(4);
		$this->data["title"] = $title = "TPA";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "master/tpa",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => base_url() . "master/tpa/view_tpa/" . $tpa_id,
			"breadcrumb_active" => false,
		);
		$breadcrumbs[3] = array(
			"breadcrumb_label" => "Edit " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		if ($tpa_id != "") {
			$whereArr["master_tpa.mtpa_id"] = $tpa_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.tpa_claim_upload, master_tpa.del_flag as tpa_del_flag ", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_tpa.mtpa_id"), $singleRow = True, $colActive = TRUE, $paginationArr = "");
			$this->data["tpa_details"] = $tpa_details = $query["userData"];
		}

		$this->data["main_page"] = "master/tpa/edit_tpa";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function update_tpa()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->load->model("Magent");

		$tpa_id_check = $this->security->xss_clean($this->input->post('tpa_id'));
		$check_whereArr["master_tpa.mtpa_id"] = $tpa_id_check;

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.del_flag as tpa_del_flag ", $whereArr = $check_whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_tpa_name = $result["tpa_name"];
		$updated_tpa_name = $this->input->post("tpa_name");
		if ($current_tpa_name != $updated_tpa_name)
			$this->form_validation->set_rules('tpa_name', 'TPA Name', 'trim|required|callback_check_tpa_name');
		else
			$this->form_validation->set_rules('tpa_name', 'TPA Name', 'trim|required');

		$this->form_validation->set_rules('short_name', 'Short Name', 'trim');
		$this->form_validation->set_rules('comman_email', 'Common Email', 'trim');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('state', 'State', 'trim');
		$this->form_validation->set_rules('city', 'city', 'trim');
		$this->form_validation->set_rules('pincode', 'pincode', 'trim');
		$this->form_validation->set_rules('office_contact', 'office_contact', 'trim');
		$this->form_validation->set_rules('website', 'website', 'trim');
		$this->form_validation->set_rules('tollfree_1', 'Toll Free No.1', 'trim');
		$this->form_validation->set_rules('tollfree_2', 'Toll Free No.2', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"tpa_name_err" => form_error("tpa_name"),
				"short_name_err" => form_error("short_name"),
				"comman_email_err" => form_error("comman_email"),
				"address_err" => form_error("address"),
				"state_err" => form_error("state"),
				"city_err" => form_error("city"),
				"pincode_err" => form_error("pincode"),
				"office_contact_err" => form_error("office_contact"),
				"website_err" => form_error("website"),
				"tollfree_1_err" => form_error("tollfree_1"),
				"tollfree_2_err" => form_error("tollfree_2"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$tpa_id = $this->security->xss_clean($this->input->post('tpa_id'));
				$tpa_name = $this->security->xss_clean($this->input->post('tpa_name'));
				$short_name = $this->security->xss_clean($this->input->post('short_name'));
				$comman_email = $this->security->xss_clean($this->input->post('comman_email'));
				$address = $this->security->xss_clean($this->input->post('address'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$pincode = $this->security->xss_clean($this->input->post('pincode'));
				$office_contact = $this->security->xss_clean($this->input->post('office_contact'));
				$website = $this->security->xss_clean($this->input->post('website'));
				$tollfree_1 = $this->security->xss_clean($this->input->post('tollfree_1'));
				$tollfree_2 = $this->security->xss_clean($this->input->post('tollfree_2'));

				$total_employee = json_decode($this->security->xss_clean($this->input->post('total_employee')));

				$remove_tpaemployee_id = json_decode($this->security->xss_clean($this->input->post('remove_employee')));
				// print_r($remove_tpaemployee_id);
				// die();
				$remove_tpaemployee_result = $this->Magent->remove_tpa_employee($remove_tpaemployee_id);
				// print_r($remove_tpaemployee_result);
				// die();
				$tpa_claim_file_name = "";
				$tpa_claim_upload_file_name = "";

				if ($tpa_id != "") {
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2, master_tpa.tpa_claim_upload,master_tpa.del_flag as tpa_del_flag", $whereArr = array("master_tpa.mtpa_id" => $tpa_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$result_data = $query["userData"];
					$tpa_claim_file_name = $result_data["tpa_claim_upload"];

					if (empty($tpa_claim_upload_file_name))
						$tpa_claim_upload_file_name = $result_data["tpa_claim_upload"];
				}

				if (!empty($_FILES["tpa_claim_upload"])) {
					if (!empty($tpa_claim_file_name)) {
						$tpa_claim_upload_data = $_FILES["tpa_claim_upload"]["name"];

						$tpa_claim_upload_img = $this->file_lib->file_upload($img_name = "tpa_claim_upload", $directory_name = "./policy_document/tpa_claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  $short_name . "-" . "Tpa_Claim_form", $url = "", $user_session_id = "_Policy_No_");
						// unlink($file_path);

						if ($tpa_claim_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["tpa_claim_upload_err"]  = $tpa_claim_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($tpa_claim_upload_img["file_name"] != "") {
							$tpa_claim_upload_file_name = $tpa_claim_upload_img["file_name"];
							$tpa_claim_upload_file_size = $tpa_claim_upload_img["file_size"];
							$tpa_claim_upload_file_type = $tpa_claim_upload_img["file_type"];
						}
					} elseif (empty($tpa_claim_file_name)) {
						$tpa_claim_upload_data = $_FILES["tpa_claim_upload"]["name"];

						$tpa_claim_upload_img = $this->file_lib->file_upload($img_name = "tpa_claim_upload", $directory_name = "./policy_document/tpa_claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  $short_name . "-" . "Tpa_Claim_form", $url = "", $user_session_id = "_Policy_No_");

						if ($tpa_claim_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["tpa_claim_upload_err"]  = $tpa_claim_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($tpa_claim_upload_img["file_name"] != "") {
							$tpa_claim_upload_file_name = $tpa_claim_upload_img["file_name"];
							$tpa_claim_upload_file_size = $tpa_claim_upload_img["file_size"];
							$tpa_claim_upload_file_type = $tpa_claim_upload_img["file_type"];
						}
					}
				}

				$create_date = date("Y-m-d h:i:s");
				$update_tpa_arr[] = array(
					'mtpa_id' => $tpa_id,
					'tpa_name' => $tpa_name,
					'short_name' => $short_name,
					'common_email' => $comman_email,
					'address' => $address,
					'state' => $state,
					'city' => $city,
					'zipcode' => $pincode,
					'office_contact' => $office_contact,
					'website' => $website,
					'tollfree_no_1' => $tollfree_1,
					'tollfree_no_2' => $tollfree_2,
					'tpa_claim_upload' => $tpa_claim_upload_file_name,
					'modify_dt' => $create_date,
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query1 = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_tpa", $update_tpa_arr, $updateKey = "mtpa_id", $whereArr = array("mtpa_id", $tpa_id), $likeCondtnArr = array(), $whereInArray = array());

				$add_employee_arr = array();
				$update_employee_arr = array();
				$new_member_id = "";

				if (!empty($tpa_id)) {
					if (!empty($total_employee)) {
						$counts = count($total_employee);
						for ($i = 0; $i < $counts; $i++) {
							if (!empty($total_employee[$i][5])) {
								$update_employee_arr[] = array(
									'name' => $total_employee[$i][0],
									'designation' => $total_employee[$i][1],
									'contact1' => $total_employee[$i][2],
									'contact2' => $total_employee[$i][3],
									'email1' => $total_employee[$i][4],
									'mtpa_member_id' => $total_employee[$i][5],
									'fk_mtpa_id' => $tpa_id,
									'modify_dt' => $create_date,
									"fk_staff_id" => $this->session->userdata("@_staff_id"),
									"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
								);
								if ($new_member_id == "")
									$new_member_id = $total_employee[$i][5];
								else
									$new_member_id .= "," . $total_employee[$i][5];
								// $query2 = $this->Mquery_model_v3->updateBatchQuery($tableName2 = "master_tpa_member", $update_employee_arr, $updateKey2 = "mtpa_member_id", $whereArr1 = array('mtpa_member_id' => $total_employee[$i][5]), $likeCondtnArr2 = array(), $whereInArray2 = array());
							} elseif (empty($total_employee[$i][5])) {
								$add_employee_arr[] = array(
									'name' => $total_employee[$i][0],
									'designation' => $total_employee[$i][1],
									'contact1' => $total_employee[$i][2],
									'contact2' => $total_employee[$i][3],
									'email1' => $total_employee[$i][4],
									'fk_mtpa_id' => $tpa_id,
									'create_date' => $create_date,
									"fk_staff_id" => $this->session->userdata("@_staff_id"),
									"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
								);
							}
						}
					}
					if (!empty($add_employee_arr))
						$query3 = $this->Mquery_model_v3->addQuery($tableName3 = "master_tpa_member", $add_employee_arr, $return_type3 = "lastID");
					if (!empty($update_employee_arr))
						$query2 = $this->Mquery_model_v3->updateBatchQuery($tableName2 = "master_tpa_member", $update_employee_arr, $updateKey2 = "mtpa_member_id", $whereArr1 = array(), $likeCondtnArr2 = array(), $whereInArray2 = array('mtpa_member_id' => explode(",", $new_member_id)));
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($tpa_id != "") {
				$validator["status"] = true;
				$validator["message"] = "TPA Details is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_tpa()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"mtpa_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_tpa.mtpa_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_tpa", $updateArr, $updateKey = "mtpa_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.del_flag as tpa_del_flag ", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "TPA Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Remove TPA.";
			}
			echo json_encode($result);
		}
	}

	public function recover_tpa()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"mtpa_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_tpa.mtpa_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_tpa", $updateArr, $updateKey = "mtpa_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.del_flag as tpa_del_flag ", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "TPA Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover TPA.";
			}
			echo json_encode($result);
		}
	}

	public function index()
	{
		$this->data["title"] = $title = "TPA";
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

		$this->data["main_page"] = "master/tpa/tpa_list";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function view_tpa()
	{
		$this->data["tpa_id"] = $tpa_id = $this->uri->segment(4);
		$this->data["title"] = $title = "TPA";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "master/tpa",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/tpa/view_tpa";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_employee_details()
	{
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$tpa_id = $this->input->post("tpa_id");
			$whereArr["master_tpa_member.fk_mtpa_id"] = $tpa_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa_member", $colNames = "master_tpa_member.mtpa_member_id , master_tpa_member.name as tpa_member_name, master_tpa_member.contact1, master_tpa_member.contact2, master_tpa_member.email1, master_tpa_member.email2, master_tpa_member.designation,master_tpa_member.department,master_tpa_member.del_flag as member_del_flag,master_tpa_member.mtpa_member_status,master_tpa_member.fk_mtpa_id", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_tpa_member.mtpa_member_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
			$employee = $query["userData"];
			// print_r($tpa_id);
			// print_r($employee);
			// die("Test");
			if (!empty($employee)) {
				$result["status"] = true;
				$result["userdata"] = $employee;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_tpa_details()
	{
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$tpa_id = $this->input->post("tpa_id");
			$whereArr["master_tpa.mtpa_id"] = $tpa_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2, master_tpa.tpa_claim_upload,master_tpa.del_flag as tpa_del_flag ", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_tpa.mtpa_id"), $singleRow = True, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];
			if (!empty($result)) {
				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function filter_tpa_list()
	{
		$filter_tpa_name = $this->input->post("filter_tpa_name");
		$filter_short_name = $this->input->post("filter_short_name");
		$filter_common_email = $this->input->post("filter_common_email");
		$filter_office_contact = $this->input->post("filter_office_contact");
		$filter_website = $this->input->post("filter_website");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_tpa.mtpa_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_tpa_name))
				$likeCondtnArr["master_tpa.tpa_name"] = $filter_tpa_name;

			if (!empty($filter_short_name))
				$likeCondtnArr["master_tpa.short_name"] = $filter_short_name;

			if (!empty($filter_common_email))
				$likeCondtnArr["master_tpa.common_email"] = $filter_common_email;

			if (!empty($filter_office_contact))
				$likeCondtnArr["master_tpa.office_contact"] = $filter_office_contact;

			if (!empty($filter_website))
				$likeCondtnArr["master_tpa.website"] = $filter_website;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_tpa.tpa_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.del_flag as tpa_del_flag ", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("master_tpa.tpa_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_tpa_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_tpa_data"] = $total_tpa_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_tpa_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_tpa_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.del_flag as tpa_del_flag ", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_tpa.tpa_name"=>"ASC"), $groupByArr = array("master_tpa.mtpa_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_tpa_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_tpa_data"] = $total_tpa_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_tpa_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_tpa_status()
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
				"mtpa_id" => $id,
				"tpa_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_tpa.mtpa_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_tpa", $updateArr, $updateKey = "mtpa_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.del_flag as tpa_del_flag ", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "TPA " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update TPA Status.";
			}
			echo json_encode($result);
		}
	}

	public function download_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Policy Wording , 2:Claims Form
		$this->data["tpa_id"] = $tpa_id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames =  "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.tpa_claim_upload, master_tpa.del_flag as tpa_del_flag", $whereArr = array("master_tpa.mtpa_id" => $tpa_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
		$this->data["tpa_doc_details"] = $tpa_doc_details = $query["userData"];

		$this->load->helper('download');

		if ($doc_type != "") {
			if ($doc_type == 1){
				$document_file = $doc_name;
				$data = file_get_contents("./policy_document/tpa_claim_upload/" . $doc_name);
			}

		}

		force_download($document_file, $data);
	}

	public function view_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Policy Wording , 2:Claims Form
		$this->data["tpa_id"] = $tpa_id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		// print_r($doc_type);
		// print_r($tpa_id);
		// print_r($doc_name);
		// die();

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames =  "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.tpa_claim_upload, master_tpa.del_flag as tpa_del_flag", $whereArr = array("master_tpa.mtpa_id" => $tpa_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
		$this->data["tpa_doc_details"] = $tpa_doc_details = $query["userData"];

		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$extension = pathinfo("policy_document/tpa_claim_upload/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./policy_document/tpa_claim_upload/" . $doc_name);
			}
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}

	public function delete_doc()
	{
		$doc_type = $this->input->post("doc_type");
		$tpa_id = $this->input->post("id");
		$doc_name = $this->input->post("doc_name");

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames =  "master_tpa.mtpa_id, master_tpa.tpa_name, master_tpa.short_name, master_tpa.tpa_status, master_tpa.common_email, master_tpa.address, master_tpa.city, master_tpa.zipcode, master_tpa.state , master_tpa.office_contact, master_tpa.website, master_tpa.tollfree_no_1, master_tpa.tollfree_no_2,master_tpa.tpa_claim_upload, master_tpa.del_flag as tpa_del_flag", $whereArr = array("master_tpa.mtpa_id" => $tpa_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
		$this->data["tpa_doc_details"] = $tpa_doc_details = $query["userData"];
		$tpa_claim_upload = $tpa_doc_details["tpa_claim_upload"];
		if (!empty($doc_type)) {
			if ($doc_type == 1) {
				$title = "TPA Claim Form Document";
				$tpa_claim_upload = "";
				$extension = pathinfo("policy_document/tpa_claim_upload/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./policy_document/tpa_claim_upload/" . $doc_name);
				unlink("./policy_document/tpa_claim_upload/". $doc_name);
			}
			$updateArr[] = array(
				"mtpa_id" => $tpa_id,
				"tpa_claim_upload" => $tpa_claim_upload, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			$whereArr["master_tpa.mtpa_id"] = $tpa_id;
			$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_tpa", $updateArr, $updateKey = "mtpa_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
		}

		$this->session->set_flashdata("msg", $title." is Deleted successfully.");
		if ($query["status"] == true) {
			$result["message"] = $title." is Deleted successfully.";
			$result["userdata"] = array();
			$result["status"] = true;
		} else {
			$result["message"] ="";
			$result["userdata"] = array();
			$result["status"] = false;
		}
		echo json_encode($result);
	}
	// TPA Section End





}
