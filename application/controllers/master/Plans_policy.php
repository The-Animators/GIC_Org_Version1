<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plans_policy extends Admin_gic_core
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
		$this->data["title"] = $title = "Plans & Policy";
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
	}
	// PLANS & POLICY Section Start
	public function add()
	{
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"],
			"breadcrumb_url" => base_url() . "master/plans_policy",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "Add " . $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/plans_policy/add_plans_policy";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}
	public function edit()
	{
		$this->data["plans_policy_id"] = $plans_policy_id = $this->uri->segment(4);
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"],
			"breadcrumb_url" => base_url() . "master/plans_policy",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "Edit " . $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/plans_policy/add_plans_policy";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_plans_policy_not()
	{
		// die("123");
		$user_role_id = $this->session->userdata("@_user_role_id");
		$user_role_title = $this->session->userdata("@_user_role_title");
		$staff_id = $this->session->userdata("@_staff_id");
		$staff_name = $this->session->userdata("@_staff_name");

		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('policy_wording', 'Policy Wordings', 'trim');
		$this->form_validation->set_rules('document_list', 'Document List', 'trim|required');
		$this->form_validation->set_rules('claims_form', 'Claims Form', 'trim');
		$this->form_validation->set_rules('claims_procedure', 'Policy Wording', 'trim');
		$this->form_validation->set_rules('comission_percentage', 'Comission %', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"policy_wording_err" => form_error("policy_wording"),
				"document_liste_err" => form_error("document_list"),
				"claims_form_err" => form_error("claims_form"),
				"claims_procedure_err" => form_error("claims_procedure"),
				"comission_percentage_err" => form_error("comission_percentage"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));
				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				// print_r($result);
				// print_r($company_short_name);
				// print_r($department_name_txt);
				// print_r($policy_name_txt);
				// die();

				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				// $policy_wording = $this->security->xss_clean($this->input->post('policy_wording'));
				$document_list = $this->security->xss_clean($this->input->post('document_list'));
				// $claims_form = $this->security->xss_clean($this->input->post('claims_form'));
				$claims_procedure = $this->security->xss_clean($this->input->post('claims_procedure'));
				$comission_percentage = $this->security->xss_clean($this->input->post('comission_percentage'));

				// $circular_date = $this->security->xss_clean($this->input->post('circular_date'));
				// $circular_doc_reason = $this->security->xss_clean($this->input->post('circular_doc_reason'));

				$proposal_date = $this->security->xss_clean($this->input->post('proposal_date'));
				// $proposal_doc_reason = $this->security->xss_clean($this->input->post('proposal_doc_reason'));

				$claim_date = $this->security->xss_clean($this->input->post('claim_date'));
				// $claim_doc_reason = $this->security->xss_clean($this->input->post('claim_doc_reason'));

				// $other_date = $this->security->xss_clean($this->input->post('other_date'));
				// $other_doc_reason = $this->security->xss_clean($this->input->post('other_doc_reason'));

				$brochure_date = $this->security->xss_clean($this->input->post('brochure_date'));
				// $brochure_doc_reason = $this->security->xss_clean($this->input->post('brochure_doc_reason'));

				$one_pager_date = $this->security->xss_clean($this->input->post('one_pager_date'));
				// $one_pager_doc_reason = $this->security->xss_clean($this->input->post('one_pager_doc_reason'));

				$policy_wording_file_name = "";
				// $claims_form_file_name = "";
				// $circular_upload_file_name = "";
				$proposal_upload_file_name = "";
				$claim_upload_file_name = "";
				// $other_upload_file_name = "";
				$brochure_upload_file_name = "";
				$one_pager_upload_file_name = "";

				if (!empty($_FILES["policy_wording"])) {
					$policy_wording_data = $_FILES["policy_wording"]["name"];

					$policy_wording_img = $this->file_lib->file_upload($img_name = "policy_wording", $directory_name = "./assets/plans_policy/policy_wording/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

					if ($policy_wording_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["policy_wording_err"]  = $policy_wording_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($policy_wording_img["file_name"] != "") {
						$policy_wording_file_name = $policy_wording_img["file_name"];
						$policy_wording_file_size = $policy_wording_img["file_size"];
						$policy_wording_file_type = $policy_wording_img["file_type"];
					}
				}
				// if (!empty($_FILES["claims_form"])) {
				// 	$claims_form_data = $_FILES["claims_form"]["name"];
				// 	$claims_form_img = $this->file_lib->file_upload($img_name = "claims_form", $directory_name = "./assets/plans_policy/claims_form/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

				// 	if ($claims_form_img["error"] != "") {
				// 		$validator["status"] = false;
				// 		$validator["messages"]["claims_form_err"] = $claims_form_img["error"];
				// 		echo json_encode($validator);
				// 		die();
				// 	} elseif ($claims_form_img["file_name"] != "") {
				// 		$claims_form_file_name = $claims_form_img["file_name"];
				// 		$claims_form_file_size = $claims_form_img["file_size"];
				// 		$claims_form_file_type = $claims_form_img["file_type"];
				// 	}
				// }

				// if (!empty($_FILES["circular_upload"])) {
				// 	$circular_upload_data = $_FILES["circular_upload"]["name"];
				// 	$circular_upload_img = $this->file_lib->file_upload($img_name = "circular_upload", $directory_name = "./assets/plans_policy/circular_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

				// 	if ($circular_upload_img["error"] != "") {
				// 		$validator["status"] = false;
				// 		$validator["messages"]["circular_upload_err"] = $circular_upload_img["error"];
				// 		echo json_encode($validator);
				// 		die();
				// 	} elseif ($circular_upload_img["file_name"] != "") {
				// 		$circular_upload_file_name = $circular_upload_img["file_name"];
				// 		$circular_upload_file_size = $circular_upload_img["file_size"];
				// 		$circular_upload_file_type = $circular_upload_img["file_type"];
				// 	}
				// }

				if (!empty($_FILES["proposal_upload"])) {
					$proposal_upload_data = $_FILES["proposal_upload"]["name"];
					$proposal_upload_img = $this->file_lib->file_upload($img_name = "proposal_upload", $directory_name = "./assets/plans_policy/proposal_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($proposal_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["proposal_upload_err"] = $proposal_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($proposal_upload_img["file_name"] != "") {
						$proposal_upload_file_name = $proposal_upload_img["file_name"];
						$proposal_upload_file_size = $proposal_upload_img["file_size"];
						$proposal_upload_file_type = $proposal_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["claim_upload"])) {
					$claim_upload_data = $_FILES["claim_upload"]["name"];
					$claim_upload_img = $this->file_lib->file_upload($img_name = "claim_upload", $directory_name = "./assets/plans_policy/claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($claim_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["claim_upload_err"] = $claim_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($claim_upload_img["file_name"] != "") {
						$claim_upload_file_name = $claim_upload_img["file_name"];
						$claim_upload_file_size = $claim_upload_img["file_size"];
						$claim_upload_file_type = $claim_upload_img["file_type"];
					}
				}

				// if (!empty($_FILES["other_upload"])) {
				// 	$other_upload_data = $_FILES["other_upload"]["name"];
				// 	$other_upload_img = $this->file_lib->file_upload($img_name = "other_upload", $directory_name = "./assets/plans_policy/other_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

				// 	if ($other_upload_img["error"] != "") {
				// 		$validator["status"] = false;
				// 		$validator["messages"]["other_upload_err"] = $other_upload_img["error"];
				// 		echo json_encode($validator);
				// 		die();
				// 	} elseif ($other_upload_img["file_name"] != "") {
				// 		$other_upload_file_name = $other_upload_img["file_name"];
				// 		$other_upload_file_size = $other_upload_img["file_size"];
				// 		$other_upload_file_type = $other_upload_img["file_type"];
				// 	}
				// }

				if (!empty($_FILES["brochure_upload"])) {
					$brochure_upload_data = $_FILES["brochure_upload"]["name"];
					$brochure_upload_img = $this->file_lib->file_upload($img_name = "brochure_upload", $directory_name = "./assets/plans_policy/brochure_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($brochure_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["brochure_upload_err"] = $brochure_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($brochure_upload_img["file_name"] != "") {
						$brochure_upload_file_name = $brochure_upload_img["file_name"];
						$brochure_upload_file_size = $brochure_upload_img["file_size"];
						$brochure_upload_file_type = $brochure_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["one_pager_upload"])) {
					$one_pager_upload_data = $_FILES["one_pager_upload"]["name"];
					$one_pager_upload_img = $this->file_lib->file_upload($img_name = "one_pager_upload", $directory_name = "./assets/plans_policy/one_pager_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($one_pager_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["one_pager_upload_err"] = $one_pager_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($one_pager_upload_img["file_name"] != "") {
						$one_pager_upload_file_name = $one_pager_upload_img["file_name"];
						$one_pager_upload_file_size = $one_pager_upload_img["file_size"];
						$one_pager_upload_file_type = $one_pager_upload_img["file_type"];
					}
				}
				// print_r($circular_upload_file_name);
				// die();

				$add_arr[] = array(
					'fk_mcompany_id' => $company,
					'fk_department_id' => $department,
					'fk_policy_type_id' => $policy_name,
					'policy_type' => $policy_type,
					'policy_wording' => $policy_wording_file_name,
					'fk_document_id' => $document_list,
					// 'claims_form' => $claims_form_file_name,
					'claims_procedure' => $claims_procedure,
					'comission_percentage' => $comission_percentage,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);

				// print_r($add_arr);
				// die("Test");
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy", $add_arr, $return_type = "lastID");
				$plans_policy_id = $query["lastID"];

				// if (!empty($circular_date) && !empty($circular_upload_file_name)) {
				// 	if (!empty($plans_policy_id)) {
				// 		$add_circular_doc_arr[] = array(
				// 			'fk_plans_policy_id' => $plans_policy_id,
				// 			'fk_company_id' => $company,
				// 			'fk_department_id' => $department,
				// 			'fk_policy_type_id' => $policy_name,
				// 			'fk_document_id' => $document_list,
				// 			'circular_doc_date' => $circular_date . " " . date("h:i:s"),
				// 			'circular_doc_name' => $circular_upload_file_name,
				// 			'circular_doc_reason' => $circular_doc_reason,
				// 			'create_date' => date("Y-m-d h:i:s")
				// 		);
				// 		$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy_circular_doc", $add_circular_doc_arr, $return_type = "lastID");
				// 		$circular_doc_id = $query["lastID"];
				// 	}
				// }

				if (!empty($proposal_date) && !empty($proposal_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_proposal_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'proposal_doc_date' => $proposal_date . " " . date("h:i:s"),
							'proposal_doc_name' => $proposal_upload_file_name,
							// 'proposal_doc_reason' => $proposal_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_proposal_doc", $add_proposal_doc_arr, $return_type = "lastID");
						$proposal_doc_id = $query["lastID"];
					}
				}

				if (!empty($claim_date) && !empty($claim_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_claim_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'claim_doc_date' => $claim_date . " " . date("h:i:s"),
							'claim_doc_name' => $claim_upload_file_name,
							// 'claim_doc_reason' => $claim_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_claim_doc", $add_claim_doc_arr, $return_type = "lastID");
						$claim_doc_id = $query["lastID"];
					}
				}

				// if (!empty($other_date) && !empty($other_upload_file_name)) {
				// 	if (!empty($plans_policy_id)) {
				// 		$add_other_doc_arr[] = array(
				// 			'fk_plans_policy_id' => $plans_policy_id,
				// 			'fk_company_id' => $company,
				// 			'fk_department_id' => $department,
				// 			'fk_policy_type_id' => $policy_name,
				// 			'other_doc_date' => $other_date . " " . date("h:i:s"),
				// 			'other_doc_name' => $other_upload_file_name,
				// 			'other_doc_reason' => $other_doc_reason,
				// 			'create_date' => date("Y-m-d h:i:s")
				// 		);
				// 		$query = $this->Mquery_model_v3->addQuery($tableName = "master_other_doc", $add_other_doc_arr, $return_type = "lastID");
				// 		$other_doc_id = $query["lastID"];
				// 	}
				// }

				if (!empty($brochure_date) && !empty($brochure_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_brochure_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'brochure_date' => $brochure_date . " " . date("h:i:s"),
							'brochure_upload' => $brochure_upload_file_name,
							// 'brochure_doc_reason' => $brochure_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_brochure_doc", $add_brochure_doc_arr, $return_type = "lastID");
						$brochure_doc_id = $query["lastID"];
					}
				}

				if (!empty($one_pager_date) && !empty($one_pager_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_one_pager_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'one_pager_date' => $one_pager_date . " " . date("h:i:s"),
							'one_pager_upload' => $one_pager_upload_file_name,
							// 'one_pager_doc_reason' => $one_pager_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_one_pager_doc", $add_one_pager_doc_arr, $return_type = "lastID");
						$one_pager_doc_id = $query["lastID"];
					}
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($plans_policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Plans & Policy is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function add_plans_policy()
	{
		$user_role_id = $this->session->userdata("@_user_role_id");
		$user_role_title = $this->session->userdata("@_user_role_title");
		$staff_id = $this->session->userdata("@_staff_id");
		$staff_name = $this->session->userdata("@_staff_name");

		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('policy_wording', 'Policy Wordings', 'trim');
		$this->form_validation->set_rules('document_list', 'Document List', 'trim|required');
		$this->form_validation->set_rules('claims_form', 'Claims Form', 'trim');
		$this->form_validation->set_rules('claims_procedure', 'Policy Wording', 'trim');
		$this->form_validation->set_rules('comission_percentage', 'Comission %', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"policy_wording_err" => form_error("policy_wording"),
				"document_liste_err" => form_error("document_list"),
				"claims_form_err" => form_error("claims_form"),
				"claims_procedure_err" => form_error("claims_procedure"),
				"comission_percentage_err" => form_error("comission_percentage"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));
				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}
				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				$document_list = $this->security->xss_clean($this->input->post('document_list'));
				$claims_procedure = $this->security->xss_clean($this->input->post('claims_procedure'));
				$comission_percentage = $this->security->xss_clean($this->input->post('comission_percentage'));

				$proposal_date = $this->security->xss_clean($this->input->post('proposal_date'));
				$claim_date = $this->security->xss_clean($this->input->post('claim_date'));
				$brochure_date = $this->security->xss_clean($this->input->post('brochure_date'));
				$one_pager_date = $this->security->xss_clean($this->input->post('one_pager_date'));

				$policy_wording_file_name = "";
				$proposal_upload_file_name = "";
				$claim_upload_file_name = "";
				$brochure_upload_file_name = "";
				$one_pager_upload_file_name = "";

				if (!empty($_FILES["policy_wording"])) {
					$policy_wording_data = $_FILES["policy_wording"]["name"];

					$policy_wording_img = $this->file_lib->file_upload($img_name = "policy_wording", $directory_name = "./assets/plans_policy/policy_wording/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($policy_wording_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["policy_wording_err"]  = $policy_wording_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($policy_wording_img["file_name"] != "") {
						$policy_wording_file_name = $policy_wording_img["file_name"];
						$policy_wording_file_size = $policy_wording_img["file_size"];
						$policy_wording_file_type = $policy_wording_img["file_type"];
					}
				}

				if (!empty($_FILES["proposal_upload"])) {
					$proposal_upload_data = $_FILES["proposal_upload"]["name"];
					$proposal_upload_img = $this->file_lib->file_upload($img_name = "proposal_upload", $directory_name = "./assets/plans_policy/proposal_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($proposal_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["proposal_upload_err"] = $proposal_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($proposal_upload_img["file_name"] != "") {
						$proposal_upload_file_name = $proposal_upload_img["file_name"];
						$proposal_upload_file_size = $proposal_upload_img["file_size"];
						$proposal_upload_file_type = $proposal_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["claim_upload"])) {
					$claim_upload_data = $_FILES["claim_upload"]["name"];
					$claim_upload_img = $this->file_lib->file_upload($img_name = "claim_upload", $directory_name = "./assets/plans_policy/claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($claim_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["claim_upload_err"] = $claim_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($claim_upload_img["file_name"] != "") {
						$claim_upload_file_name = $claim_upload_img["file_name"];
						$claim_upload_file_size = $claim_upload_img["file_size"];
						$claim_upload_file_type = $claim_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["brochure_upload"])) {
					$brochure_upload_data = $_FILES["brochure_upload"]["name"];
					$brochure_upload_img = $this->file_lib->file_upload($img_name = "brochure_upload", $directory_name = "./assets/plans_policy/brochure_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($brochure_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["brochure_upload_err"] = $brochure_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($brochure_upload_img["file_name"] != "") {
						$brochure_upload_file_name = $brochure_upload_img["file_name"];
						$brochure_upload_file_size = $brochure_upload_img["file_size"];
						$brochure_upload_file_type = $brochure_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["one_pager_upload"])) {
					$one_pager_upload_data = $_FILES["one_pager_upload"]["name"];
					$one_pager_upload_img = $this->file_lib->file_upload($img_name = "one_pager_upload", $directory_name = "./assets/plans_policy/one_pager_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($one_pager_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["one_pager_upload_err"] = $one_pager_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($one_pager_upload_img["file_name"] != "") {
						$one_pager_upload_file_name = $one_pager_upload_img["file_name"];
						$one_pager_upload_file_size = $one_pager_upload_img["file_size"];
						$one_pager_upload_file_type = $one_pager_upload_img["file_type"];
					}
				}

				$add_arr[] = array(
					'fk_mcompany_id' => $company,
					'fk_department_id' => $department,
					'fk_policy_type_id' => $policy_name,
					'policy_type' => $policy_type,
					'policy_wording' => $policy_wording_file_name,
					'fk_document_id' => $document_list,
					'claims_procedure' => $claims_procedure,
					'comission_percentage' => $comission_percentage,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);

				$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy", $add_arr, $return_type = "lastID");
				$plans_policy_id = $query["lastID"];

				if (!empty($proposal_date) && !empty($proposal_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_proposal_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'proposal_doc_date' => $proposal_date . " " . date("h:i:s"),
							'proposal_doc_name' => $proposal_upload_file_name,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_proposal_doc", $add_proposal_doc_arr, $return_type = "lastID");
						$proposal_doc_id = $query["lastID"];
					}
				}

				if (!empty($claim_date) && !empty($claim_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_claim_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'claim_doc_date' => $claim_date . " " . date("h:i:s"),
							'claim_doc_name' => $claim_upload_file_name,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_claim_doc", $add_claim_doc_arr, $return_type = "lastID");
						$claim_doc_id = $query["lastID"];
					}
				}

				if (!empty($brochure_date) && !empty($brochure_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_brochure_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'brochure_date' => $brochure_date . " " . date("h:i:s"),
							'brochure_upload' => $brochure_upload_file_name,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_brochure_doc", $add_brochure_doc_arr, $return_type = "lastID");
						$brochure_doc_id = $query["lastID"];
					}
				}

				if (!empty($one_pager_date) && !empty($one_pager_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_one_pager_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'one_pager_date' => $one_pager_date . " " . date("h:i:s"),
							'one_pager_upload' => $one_pager_upload_file_name,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_one_pager_doc", $add_one_pager_doc_arr, $return_type = "lastID");
						$one_pager_doc_id = $query["lastID"];
					}
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($plans_policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Plans & Policy is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function add_plans_policy_bak_1()
	{
		// die("123");
		$user_role_id = $this->session->userdata("@_user_role_id");
		$user_role_title = $this->session->userdata("@_user_role_title");
		$staff_id = $this->session->userdata("@_staff_id");
		$staff_name = $this->session->userdata("@_staff_name");

		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('policy_wording', 'Policy Wordings', 'trim');
		$this->form_validation->set_rules('document_list', 'Document List', 'trim|required');
		$this->form_validation->set_rules('claims_form', 'Claims Form', 'trim');
		$this->form_validation->set_rules('claims_procedure', 'Policy Wording', 'trim');
		$this->form_validation->set_rules('comission_percentage', 'Comission %', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"policy_wording_err" => form_error("policy_wording"),
				"document_liste_err" => form_error("document_list"),
				"claims_form_err" => form_error("claims_form"),
				"claims_procedure_err" => form_error("claims_procedure"),
				"comission_percentage_err" => form_error("comission_percentage"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));
				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				// print_r($result);
				// print_r($company_short_name);
				// print_r($department_name_txt);
				// print_r($policy_name_txt);
				// die();

				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				// $policy_wording = $this->security->xss_clean($this->input->post('policy_wording'));
				$document_list = $this->security->xss_clean($this->input->post('document_list'));
				// $claims_form = $this->security->xss_clean($this->input->post('claims_form'));
				$claims_procedure = $this->security->xss_clean($this->input->post('claims_procedure'));
				$comission_percentage = $this->security->xss_clean($this->input->post('comission_percentage'));

				$circular_date = $this->security->xss_clean($this->input->post('circular_date'));
				$circular_doc_reason = $this->security->xss_clean($this->input->post('circular_doc_reason'));

				$proposal_date = $this->security->xss_clean($this->input->post('proposal_date'));
				$proposal_doc_reason = $this->security->xss_clean($this->input->post('proposal_doc_reason'));

				$claim_date = $this->security->xss_clean($this->input->post('claim_date'));
				$claim_doc_reason = $this->security->xss_clean($this->input->post('claim_doc_reason'));

				$other_date = $this->security->xss_clean($this->input->post('other_date'));
				$other_doc_reason = $this->security->xss_clean($this->input->post('other_doc_reason'));

				$brochure_date = $this->security->xss_clean($this->input->post('brochure_date'));
				$brochure_doc_reason = $this->security->xss_clean($this->input->post('brochure_doc_reason'));

				$one_pager_date = $this->security->xss_clean($this->input->post('one_pager_date'));
				$one_pager_doc_reason = $this->security->xss_clean($this->input->post('one_pager_doc_reason'));

				$policy_wording_file_name = "";
				$claims_form_file_name = "";
				$circular_upload_file_name = "";
				$proposal_upload_file_name = "";
				$claim_upload_file_name = "";
				$other_upload_file_name = "";
				$brochure_upload_file_name = "";
				$one_pager_upload_file_name = "";

				if (!empty($_FILES["policy_wording"])) {
					$policy_wording_data = $_FILES["policy_wording"]["name"];

					$policy_wording_img = $this->file_lib->file_upload($img_name = "policy_wording", $directory_name = "./assets/plans_policy/policy_wording/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

					if ($policy_wording_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["policy_wording_err"]  = $policy_wording_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($policy_wording_img["file_name"] != "") {
						$policy_wording_file_name = $policy_wording_img["file_name"];
						$policy_wording_file_size = $policy_wording_img["file_size"];
						$policy_wording_file_type = $policy_wording_img["file_type"];
					}
				}
				if (!empty($_FILES["claims_form"])) {
					$claims_form_data = $_FILES["claims_form"]["name"];
					$claims_form_img = $this->file_lib->file_upload($img_name = "claims_form", $directory_name = "./assets/plans_policy/claims_form/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

					if ($claims_form_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["claims_form_err"] = $claims_form_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($claims_form_img["file_name"] != "") {
						$claims_form_file_name = $claims_form_img["file_name"];
						$claims_form_file_size = $claims_form_img["file_size"];
						$claims_form_file_type = $claims_form_img["file_type"];
					}
				}

				if (!empty($_FILES["circular_upload"])) {
					$circular_upload_data = $_FILES["circular_upload"]["name"];
					$circular_upload_img = $this->file_lib->file_upload($img_name = "circular_upload", $directory_name = "./assets/plans_policy/circular_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($circular_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["circular_upload_err"] = $circular_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($circular_upload_img["file_name"] != "") {
						$circular_upload_file_name = $circular_upload_img["file_name"];
						$circular_upload_file_size = $circular_upload_img["file_size"];
						$circular_upload_file_type = $circular_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["proposal_upload"])) {
					$proposal_upload_data = $_FILES["proposal_upload"]["name"];
					$proposal_upload_img = $this->file_lib->file_upload($img_name = "proposal_upload", $directory_name = "./assets/plans_policy/proposal_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($proposal_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["proposal_upload_err"] = $proposal_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($proposal_upload_img["file_name"] != "") {
						$proposal_upload_file_name = $proposal_upload_img["file_name"];
						$proposal_upload_file_size = $proposal_upload_img["file_size"];
						$proposal_upload_file_type = $proposal_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["claim_upload"])) {
					$claim_upload_data = $_FILES["claim_upload"]["name"];
					$claim_upload_img = $this->file_lib->file_upload($img_name = "claim_upload", $directory_name = "./assets/plans_policy/claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($claim_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["claim_upload_err"] = $claim_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($claim_upload_img["file_name"] != "") {
						$claim_upload_file_name = $claim_upload_img["file_name"];
						$claim_upload_file_size = $claim_upload_img["file_size"];
						$claim_upload_file_type = $claim_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["other_upload"])) {
					$other_upload_data = $_FILES["other_upload"]["name"];
					$other_upload_img = $this->file_lib->file_upload($img_name = "other_upload", $directory_name = "./assets/plans_policy/other_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($other_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["other_upload_err"] = $other_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($other_upload_img["file_name"] != "") {
						$other_upload_file_name = $other_upload_img["file_name"];
						$other_upload_file_size = $other_upload_img["file_size"];
						$other_upload_file_type = $other_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["brochure_upload"])) {
					$brochure_upload_data = $_FILES["brochure_upload"]["name"];
					$brochure_upload_img = $this->file_lib->file_upload($img_name = "brochure_upload", $directory_name = "./assets/plans_policy/brochure_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($brochure_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["brochure_upload_err"] = $brochure_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($brochure_upload_img["file_name"] != "") {
						$brochure_upload_file_name = $brochure_upload_img["file_name"];
						$brochure_upload_file_size = $brochure_upload_img["file_size"];
						$brochure_upload_file_type = $brochure_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["one_pager_upload"])) {
					$one_pager_upload_data = $_FILES["one_pager_upload"]["name"];
					$one_pager_upload_img = $this->file_lib->file_upload($img_name = "one_pager_upload", $directory_name = "./assets/plans_policy/one_pager_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($one_pager_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["one_pager_upload_err"] = $one_pager_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($one_pager_upload_img["file_name"] != "") {
						$one_pager_upload_file_name = $one_pager_upload_img["file_name"];
						$one_pager_upload_file_size = $one_pager_upload_img["file_size"];
						$one_pager_upload_file_type = $one_pager_upload_img["file_type"];
					}
				}
				// print_r($circular_upload_file_name);
				// die();

				$add_arr[] = array(
					'fk_mcompany_id' => $company,
					'fk_department_id' => $department,
					'fk_policy_type_id' => $policy_name,
					'policy_type' => $policy_type,
					'policy_wording' => $policy_wording_file_name,
					'fk_document_id' => $document_list,
					'claims_form' => $claims_form_file_name,
					'claims_procedure' => $claims_procedure,
					'comission_percentage' => $comission_percentage,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);

				// print_r($add_arr);
				// die("Test");
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy", $add_arr, $return_type = "lastID");
				$plans_policy_id = $query["lastID"];

				if (!empty($circular_date) && !empty($circular_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_circular_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'fk_document_id' => $document_list,
							'circular_doc_date' => $circular_date . " " . date("h:i:s"),
							'circular_doc_name' => $circular_upload_file_name,
							'circular_doc_reason' => $circular_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy_circular_doc", $add_circular_doc_arr, $return_type = "lastID");
						$circular_doc_id = $query["lastID"];
					}
				}

				if (!empty($proposal_date) && !empty($proposal_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_proposal_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'proposal_doc_date' => $proposal_date . " " . date("h:i:s"),
							'proposal_doc_name' => $proposal_upload_file_name,
							'proposal_doc_reason' => $proposal_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_proposal_doc", $add_proposal_doc_arr, $return_type = "lastID");
						$proposal_doc_id = $query["lastID"];
					}
				}

				if (!empty($claim_date) && !empty($claim_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_claim_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'claim_doc_date' => $claim_date . " " . date("h:i:s"),
							'claim_doc_name' => $claim_upload_file_name,
							'claim_doc_reason' => $claim_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_claim_doc", $add_claim_doc_arr, $return_type = "lastID");
						$claim_doc_id = $query["lastID"];
					}
				}

				if (!empty($other_date) && !empty($other_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_other_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'other_doc_date' => $other_date . " " . date("h:i:s"),
							'other_doc_name' => $other_upload_file_name,
							'other_doc_reason' => $other_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_other_doc", $add_other_doc_arr, $return_type = "lastID");
						$other_doc_id = $query["lastID"];
					}
				}

				if (!empty($brochure_date) && !empty($brochure_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_brochure_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'brochure_date' => $brochure_date . " " . date("h:i:s"),
							'brochure_upload' => $brochure_upload_file_name,
							'brochure_doc_reason' => $brochure_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_brochure_doc", $add_brochure_doc_arr, $return_type = "lastID");
						$brochure_doc_id = $query["lastID"];
					}
				}

				if (!empty($one_pager_date) && !empty($one_pager_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_one_pager_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'one_pager_date' => $one_pager_date . " " . date("h:i:s"),
							'one_pager_upload' => $one_pager_upload_file_name,
							'one_pager_doc_reason' => $one_pager_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_one_pager_doc", $add_one_pager_doc_arr, $return_type = "lastID");
						$one_pager_doc_id = $query["lastID"];
					}
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($plans_policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Plans & Policy is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function delete_plans_policy()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");

			if ($id != "") {
				$query = $this->Mquery_model_v3->deleteQuery($tableName = "master_plans_policy", $whereArr = array("master_plans_policy.plans_policy_id" => $id));

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =  "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Plans & Policy Deleted Permanently Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Deletinging Permanently Plans & Policy.";
			}
			echo json_encode($result);
		}
	}

	public function add_plans_policy_bak()
	{
		// die("123");
		$user_role_id = $this->session->userdata("@_user_role_id");
		$user_role_title = $this->session->userdata("@_user_role_title");
		$staff_id = $this->session->userdata("@_staff_id");
		$staff_name = $this->session->userdata("@_staff_name");

		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('policy_wording', 'Policy Wordings', 'trim');
		$this->form_validation->set_rules('document_list', 'Document List', 'trim|required');
		$this->form_validation->set_rules('claims_form', 'Claims Form', 'trim');
		$this->form_validation->set_rules('claims_procedure', 'Policy Wording', 'trim');
		$this->form_validation->set_rules('comission_percentage', 'Comission %', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"policy_wording_err" => form_error("policy_wording"),
				"document_liste_err" => form_error("document_list"),
				"claims_form_err" => form_error("claims_form"),
				"claims_procedure_err" => form_error("claims_procedure"),
				"comission_percentage_err" => form_error("comission_percentage"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));
				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				// print_r($result);
				// print_r($company_short_name);
				// print_r($department_name_txt);
				// print_r($policy_name_txt);
				// die();

				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				// $policy_wording = $this->security->xss_clean($this->input->post('policy_wording'));
				$document_list = $this->security->xss_clean($this->input->post('document_list'));
				// $claims_form = $this->security->xss_clean($this->input->post('claims_form'));
				$claims_procedure = $this->security->xss_clean($this->input->post('claims_procedure'));
				$comission_percentage = $this->security->xss_clean($this->input->post('comission_percentage'));

				$circular_date = $this->security->xss_clean($this->input->post('circular_date'));
				$circular_doc_reason = $this->security->xss_clean($this->input->post('circular_doc_reason'));

				$policy_wording_file_name = "";
				$claims_form_file_name = "";
				$circular_upload_file_name = "";
				if (!empty($_FILES["policy_wording"])) {
					$policy_wording_data = $_FILES["policy_wording"]["name"];

					$policy_wording_img = $this->file_lib->file_upload($img_name = "policy_wording", $directory_name = "./assets/plans_policy/policy_wording/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

					if ($policy_wording_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["policy_wording_err"]  = $policy_wording_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($policy_wording_img["file_name"] != "") {
						$policy_wording_file_name = $policy_wording_img["file_name"];
						$policy_wording_file_size = $policy_wording_img["file_size"];
						$policy_wording_file_type = $policy_wording_img["file_type"];
					}
				}
				if (!empty($_FILES["claims_form"])) {
					$claims_form_data = $_FILES["claims_form"]["name"];
					$claims_form_img = $this->file_lib->file_upload($img_name = "claims_form", $directory_name = "./assets/plans_policy/claims_form/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

					if ($claims_form_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["claims_form_err"] = $claims_form_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($claims_form_img["file_name"] != "") {
						$claims_form_file_name = $claims_form_img["file_name"];
						$claims_form_file_size = $claims_form_img["file_size"];
						$claims_form_file_type = $claims_form_img["file_type"];
					}
				}

				if (!empty($_FILES["circular_upload"])) {
					$circular_upload_data = $_FILES["circular_upload"]["name"];
					$circular_upload_img = $this->file_lib->file_upload($img_name = "circular_upload", $directory_name = "./assets/plans_policy/circular_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($circular_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["circular_upload_err"] = $circular_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($circular_upload_img["file_name"] != "") {
						$circular_upload_file_name = $circular_upload_img["file_name"];
						$circular_upload_file_size = $circular_upload_img["file_size"];
						$circular_upload_file_type = $circular_upload_img["file_type"];
					}
				}

				// print_r($circular_upload_file_name);
				// die();

				$add_arr[] = array(
					'fk_mcompany_id' => $company,
					'fk_department_id' => $department,
					'fk_policy_type_id' => $policy_name,
					'policy_type' => $policy_type,
					'policy_wording' => $policy_wording_file_name,
					'fk_document_id' => $document_list,
					'claims_form' => $claims_form_file_name,
					'claims_procedure' => $claims_procedure,
					'comission_percentage' => $comission_percentage,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);

				// print_r($add_arr);
				// die("Test");
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy", $add_arr, $return_type = "lastID");
				$plans_policy_id = $query["lastID"];

				if (!empty($circular_date) && !empty($circular_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_circular_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'fk_document_id' => $document_list,
							'circular_doc_date' => $circular_date . " " . date("h:i:s"),
							'circular_doc_name' => $circular_upload_file_name,
							'circular_doc_reason' => $circular_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);

						// print_r($add_circular_doc_arr);
						// die("Test");
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy_circular_doc", $add_circular_doc_arr, $return_type = "lastID");
						$circular_doc_id = $query["lastID"];
					}
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($plans_policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Plans & Policy is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_plans_policy()
	{
		$validator = array('status' => false, 'messages' => array());
		$plans_policy_id = $this->input->post("plans_policy_id");
		// $fk_document_id = explode(",",$this->input->post("fk_document_id"));

		if ($plans_policy_id != "") {

			$joins_main_1[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_plans_policy_circular_doc", "condtn" => "master_plans_policy.plans_policy_id = master_plans_policy_circular_doc.fk_plans_policy_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_proposal_doc", "condtn" => "master_plans_policy.plans_policy_id = master_proposal_doc.fk_plans_policy_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_claim_doc", "condtn" => "master_plans_policy.plans_policy_id = master_claim_doc.fk_plans_policy_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_other_doc", "condtn" => "master_plans_policy.plans_policy_id = master_other_doc.fk_plans_policy_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_brochure_doc", "condtn" => "master_plans_policy.plans_policy_id = master_brochure_doc.fk_plans_policy_id", "type" => "left");
			$joins_main_1[] = array("tbl" => "master_one_pager_doc", "condtn" => "master_plans_policy.plans_policy_id = master_one_pager_doc.fk_plans_policy_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name , master_plans_policy_circular_doc.circular_doc_date,master_plans_policy_circular_doc.circular_doc_name,master_plans_policy_circular_doc.circular_doc_reason, DATE_FORMAT(master_proposal_doc.proposal_doc_date,'%d-%m-%Y') as proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_reason, DATE_FORMAT(master_claim_doc.claim_doc_date,'%d-%m-%Y') as claim_doc_date,  master_claim_doc.claim_doc_name,  master_claim_doc.claim_doc_reason, DATE_FORMAT(master_other_doc.other_doc_date,'%d-%m-%Y') as other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, DATE_FORMAT(master_brochure_doc.brochure_date,'%d-%m-%Y') as brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_reason, master_one_pager_doc.one_pager_upload, DATE_FORMAT(master_one_pager_doc.one_pager_date,'%d-%m-%Y') as one_pager_date, master_one_pager_doc.one_pager_doc_reason", $whereArr = array("master_plans_policy.plans_policy_id" => $plans_policy_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_1, $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];

			// $joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
			// $joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
			// $joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
			// $joins_main[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");
			// $whereArr["master_plans_policy.plans_policy_id"] = $plans_policy_id;
			// $query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
			// $result = $query["userData"];
			$fk_document_id = explode(",", $query["userData"]["fk_document_id"]);
			// echo $this->db->last_query();
			// print_r($plans_policy_id);
			// die();

			if (!empty($fk_document_id)) {
				if ($fk_document_id != "") {
					$whereArr2["master_document.document_status"] = 1;
					$whereArr2["master_document.del_flag"] = 1;
					// $whereArr["master_document.document_id"] = $fk_document_id;
					$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames = "master_document.document_id, master_document.document_name", $whereArr = $whereArr2, $whereInArray = array("master_document.document_id" => $fk_document_id), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_document.document_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
					$document_list = $query2["userData"];
				}
			}

			if (!empty($plans_policy_id)) {
				if ($plans_policy_id != "") {
					// $whereArr3["master_plans_policy_circular_doc.circular_doc_status"] = 1;
					// $whereArr3["master_plans_policy_circular_doc.circular_doc_del_flag"] = 1;
					$whereArr3["master_plans_policy_circular_doc.fk_plans_policy_id"] = $plans_policy_id;
					$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames = "master_plans_policy_circular_doc.circular_doc_id, DATE(master_plans_policy_circular_doc.circular_doc_date) as circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag, master_plans_policy_circular_doc.create_date", $whereArr = $whereArr3, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("TIMESTAMP(master_plans_policy_circular_doc.circular_doc_date)" => "DESC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
					$circular_doc_list = $query2["userData"];
					// echo $this->db->last_query();
					// print_r($circular_doc_list);
					// die();
				}
			}
			$result["circular_doc_list_data_arr"] = $circular_doc_list;
			// print_r($circular_doc_list);
			// die();

			$doc_name = "";
			if (!empty($document_list)) {
				foreach ($document_list as $row) {

					if ($doc_name == "")
						$doc_name = $row["document_name"];
					else
						$doc_name .= ", " . $row["document_name"];
				}
			}
			$query["userData"]["document_name"] = $doc_name;
			// print_r($fk_document_id);
			// print_r($doc_name);
			// die();
			// $whereArr["master_plans_policy.plans_policy_id"] = $plans_policy_id;
			// $query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =  "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			// $result = $query["userData"];
		}
		// print_r($plans_policy_id);
		// print_r($result);
		// die("Test 121");
		if (!empty($result)) {
			$validator["status"] = true;
			// $validator["userdata"] = $query["userData"];
			$validator["userdata"] = $result;
			// $validator["userdata"] = $doc_name;
			$validator["message"] = "";
		} else {
			$validator["status"] = false;
			$validator["userdata"] = array();
			$validator["message"] = "Fatal Error: Contact Support:";
		}

		echo json_encode($validator);
	}

	public function update_plans_policy()
	{
		$user_role_id = $this->session->userdata("@_user_role_id");
		$user_role_title = $this->session->userdata("@_user_role_title");
		$staff_id = $this->session->userdata("@_staff_id");
		$staff_name = $this->session->userdata("@_staff_name");

		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('policy_wording', 'Policy Wordings', 'trim');
		$this->form_validation->set_rules('document_list', 'Document List', 'trim|required');
		$this->form_validation->set_rules('claims_form', 'Claims Form', 'trim');
		$this->form_validation->set_rules('claims_procedure', 'Policy Wording', 'trim');
		$this->form_validation->set_rules('comission_percentage', 'Comission %', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"policy_wording_err" => form_error("policy_wording"),
				"document_liste_err" => form_error("document_list"),
				"claims_form_err" => form_error("claims_form"),
				"claims_procedure_err" => form_error("claims_procedure"),
				"comission_percentage_err" => form_error("comission_percentage"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$policy_file_name = "";
				$policy_wording_file_name = "";
				$claims_file_name = "";
				$claims_form_file_name = "";

				$plans_policy_id = $this->security->xss_clean($this->input->post('plans_policy_id'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));
				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				$document_list = $this->security->xss_clean($this->input->post('document_list'));
				$claims_procedure = $this->security->xss_clean($this->input->post('claims_procedure'));
				$comission_percentage = $this->security->xss_clean($this->input->post('comission_percentage'));

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));

				$proposal_date = $this->security->xss_clean($this->input->post('proposal_date'));
				$claim_date = $this->security->xss_clean($this->input->post('claim_date'));
				$brochure_date = $this->security->xss_clean($this->input->post('brochure_date'));
				$one_pager_date = $this->security->xss_clean($this->input->post('one_pager_date'));

				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr_new["master_company.company_name"] = $company_name_txt;
					$query4 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr_new, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query4["userData"];
					$company_short_name = $result["company_short_name"];
				}

				if ($plans_policy_id != "") {
					$joins_main_1[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_plans_policy_circular_doc", "condtn" => "master_plans_policy.plans_policy_id = master_plans_policy_circular_doc.fk_plans_policy_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_proposal_doc", "condtn" => "master_plans_policy.plans_policy_id = master_proposal_doc.fk_plans_policy_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_claim_doc", "condtn" => "master_plans_policy.plans_policy_id = master_claim_doc.fk_plans_policy_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_other_doc", "condtn" => "master_plans_policy.plans_policy_id = master_other_doc.fk_plans_policy_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_brochure_doc", "condtn" => "master_plans_policy.plans_policy_id = master_brochure_doc.fk_plans_policy_id", "type" => "left");
					$joins_main_1[] = array("tbl" => "master_one_pager_doc", "condtn" => "master_plans_policy.plans_policy_id = master_one_pager_doc.fk_plans_policy_id", "type" => "left");

					$query_1data = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name , master_plans_policy_circular_doc.circular_doc_date,master_plans_policy_circular_doc.circular_doc_name,master_plans_policy_circular_doc.circular_doc_reason, master_proposal_doc.proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_reason, master_claim_doc.claim_doc_date,  master_claim_doc.claim_doc_name,  master_claim_doc.claim_doc_reason, master_other_doc.other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, master_brochure_doc.brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_reason, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_date, master_one_pager_doc.one_pager_doc_reason", $whereArr = array("master_plans_policy.plans_policy_id" => $plans_policy_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_1, $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$this->data["plans_policy_doc_details"] = $plans_policy_doc_details = $query_1data["userData"];


					// $whereArr["master_plans_policy.plans_policy_id"] = $plans_policy_id;
					// $query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =  "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					// $result = $query["userData"];
					$policy_file_name = $plans_policy_doc_details["policy_wording"];
					$claim_file_name = $plans_policy_doc_details["claim_doc_name"];
					$proposal_file_name = $plans_policy_doc_details["proposal_doc_name"];
					$brochure_file_name = $plans_policy_doc_details["brochure_upload"];
					$one_pager_file_name = $plans_policy_doc_details["one_pager_upload"];
					$claims_file_name = $plans_policy_doc_details["claims_form"];

					if (empty($policy_wording_file_name))
						$policy_wording_file_name = $plans_policy_doc_details["policy_wording"];
					if (empty($claims_form_file_name))
						$claims_form_file_name = $plans_policy_doc_details["claims_form"];
					if (empty($proposal_upload_file_name))
						$proposal_upload_file_name = $plans_policy_doc_details["proposal_doc_name"];
					if (empty($claim_upload_file_name))
						$claim_upload_file_name = $plans_policy_doc_details["claim_doc_name"];
					if (empty($brochure_upload_file_name))
						$brochure_upload_file_name = $plans_policy_doc_details["brochure_upload"];
					if (empty($one_pager_upload_file_name))
						$one_pager_upload_file_name = $plans_policy_doc_details["one_pager_upload"];
				}

				if (!empty($_FILES["policy_wording"])) {
					if (!empty($policy_file_name)) {
						$policy_wording_data = $_FILES["policy_wording"]["name"];
						$policy_wording_img = $this->file_lib->file_upload($img_name = "policy_wording", $directory_name = "./assets/plans_policy/policy_wording/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");
						if ($policy_wording_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["policy_wording_err"]  = $policy_wording_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($policy_wording_img["file_name"] != "") {
							$policy_wording_file_name = $policy_wording_img["file_name"];
							$policy_wording_file_size = $policy_wording_img["file_size"];
							$policy_wording_file_type = $policy_wording_img["file_type"];
						}
					} elseif (empty($policy_file_name)) {
						$policy_wording_data = $_FILES["policy_wording"]["name"];
						$policy_wording_img = $this->file_lib->file_upload($img_name = "policy_wording", $directory_name = "./assets/plans_policy/policy_wording/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

						if ($policy_wording_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["policy_wording_err"]  = $policy_wording_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($policy_wording_img["file_name"] != "") {
							$policy_wording_file_name = $policy_wording_img["file_name"];
							$policy_wording_file_size = $policy_wording_img["file_size"];
							$policy_wording_file_type = $policy_wording_img["file_type"];
						}
					}
				}

				$proposal_file_name = "";
				$claim_file_name = "";
				$brochure_file_name = "";
				$one_pager_file_name = "";

				$proposal_upload_file_name = "";
				$claim_upload_file_name = "";
				$brochure_upload_file_name = "";
				$one_pager_upload_file_name = "";

				if (!empty($_FILES["proposal_upload"])) {
					if (!empty($proposal_file_name)) {
						$proposal_upload_data = $_FILES["proposal_upload"]["name"];
						$proposal_upload_img = $this->file_lib->file_upload($img_name = "proposal_upload", $directory_name = "./assets/plans_policy/proposal_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");
						if ($proposal_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["proposal_upload_err"]  = $proposal_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($proposal_upload_img["file_name"] != "") {
							$proposal_upload_file_name = $proposal_upload_img["file_name"];
							$proposal_upload_file_size = $proposal_upload_img["file_size"];
							$proposal_upload_file_type = $proposal_upload_img["file_type"];
						}
					} elseif (empty($proposal_file_name)) {
						$proposal_upload_data = $_FILES["proposal_upload"]["name"];
						$proposal_upload_img = $this->file_lib->file_upload($img_name = "proposal_upload", $directory_name = "./assets/plans_policy/proposal_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

						if ($proposal_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["proposal_upload_err"]  = $proposal_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($proposal_upload_img["file_name"] != "") {
							$proposal_upload_file_name = $proposal_upload_img["file_name"];
							$proposal_upload_file_size = $proposal_upload_img["file_size"];
							$proposal_upload_file_type = $proposal_upload_img["file_type"];
						}
					}
				}

				if (!empty($_FILES["claim_upload"])) {
					if (!empty($claim_file_name)) {
						$claim_upload_data = $_FILES["claim_upload"]["name"];
						$claim_upload_img = $this->file_lib->file_upload($img_name = "claim_upload", $directory_name = "./assets/plans_policy/claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");
						if ($claim_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["claim_upload_err"]  = $claim_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($claim_upload_img["file_name"] != "") {
							$claim_upload_file_name = $claim_upload_img["file_name"];
							$claim_upload_file_size = $claim_upload_img["file_size"];
							$claim_upload_file_type = $claim_upload_img["file_type"];
						}
					} elseif (empty($claim_file_name)) {
						$claim_upload_data = $_FILES["claim_upload"]["name"];
						$claim_upload_img = $this->file_lib->file_upload($img_name = "claim_upload", $directory_name = "./assets/plans_policy/claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

						if ($claim_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["claim_upload_err"]  = $claim_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($claim_upload_img["file_name"] != "") {
							$claim_upload_file_name = $claim_upload_img["file_name"];
							$claim_upload_file_size = $claim_upload_img["file_size"];
							$claim_upload_file_type = $claim_upload_img["file_type"];
						}
					}
				}
				if (!empty($_FILES["brochure_upload"])) {
					if (!empty($brochure_file_name)) {
						$brochure_upload_data = $_FILES["brochure_upload"]["name"];
						$brochure_upload_img = $this->file_lib->file_upload($img_name = "brochure_upload", $directory_name = "./assets/plans_policy/brochure_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");
						if ($brochure_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["brochure_upload_err"]  = $brochure_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($brochure_upload_img["file_name"] != "") {
							$brochure_upload_file_name = $brochure_upload_img["file_name"];
							$brochure_upload_file_size = $brochure_upload_img["file_size"];
							$brochure_upload_file_type = $brochure_upload_img["file_type"];
						}
					} elseif (empty($brochure_file_name)) {
						$brochure_upload_data = $_FILES["brochure_upload"]["name"];
						$brochure_upload_img = $this->file_lib->file_upload($img_name = "brochure_upload", $directory_name = "./assets/plans_policy/brochure_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

						if ($brochure_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["brochure_upload_err"]  = $brochure_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($brochure_upload_img["file_name"] != "") {
							$brochure_upload_file_name = $brochure_upload_img["file_name"];
							$brochure_upload_file_size = $brochure_upload_img["file_size"];
							$brochure_upload_file_type = $brochure_upload_img["file_type"];
						}
					}
				}
				if (!empty($_FILES["one_pager_upload"])) {
					if (!empty($one_pager_file_name)) {
						$one_pager_upload_data = $_FILES["one_pager_upload"]["name"];
						$one_pager_upload_img = $this->file_lib->file_upload($img_name = "one_pager_upload", $directory_name = "./assets/plans_policy/one_pager_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");
						if ($one_pager_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["one_pager_upload_err"]  = $one_pager_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($one_pager_upload_img["file_name"] != "") {
							$one_pager_upload_file_name = $one_pager_upload_img["file_name"];
							$one_pager_upload_file_size = $one_pager_upload_img["file_size"];
							$one_pager_upload_file_type = $one_pager_upload_img["file_type"];
						}
					} elseif (empty($one_pager_file_name)) {
						$one_pager_upload_data = $_FILES["one_pager_upload"]["name"];
						$one_pager_upload_img = $this->file_lib->file_upload($img_name = "one_pager_upload", $directory_name = "./assets/plans_policy/one_pager_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

						if ($one_pager_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["one_pager_upload_err"]  = $one_pager_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($one_pager_upload_img["file_name"] != "") {
							$one_pager_upload_file_name = $one_pager_upload_img["file_name"];
							$one_pager_upload_file_size = $one_pager_upload_img["file_size"];
							$one_pager_upload_file_type = $one_pager_upload_img["file_type"];
						}
					}
				}

				if (!empty($plans_policy_id) && !empty($proposal_date) && !empty($proposal_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$update_proposal_doc_arr = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'proposal_doc_date' => $proposal_date . " " . date("h:i:s"),
							'proposal_doc_name' => $proposal_upload_file_name,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$this->load->model("Mplan_policy");
						if (!empty($update_proposal_doc_arr))
							$result_data = $this->Mplan_policy->update_common_function($update_proposal_doc_arr, $plans_policy_id, $table_name = "master_proposal_doc");
						// $query2 = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_proposal_doc", $update_proposal_doc_arr, $updateKey = "fk_plans_policy_id", $whereArr = array("fk_plans_policy_id", $plans_policy_id), $likeCondtnArr = array(), $whereInArray = array());
					}
				}

				if (!empty($plans_policy_id) && !empty($claim_date) && !empty($claim_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$update_claim_doc_arr = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'claim_doc_date' => $claim_date . " " . date("h:i:s"),
							'claim_doc_name' => $claim_upload_file_name,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$this->load->model("Mplan_policy");
						if (!empty($update_claim_doc_arr))
							$result_data = $this->Mplan_policy->update_common_function($update_claim_doc_arr, $plans_policy_id, $table_name = "master_claim_doc");
						// $query3 = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_claim_doc", $update_claim_doc_arr, $updateKey = "fk_plans_policy_id", $whereArr = array("fk_plans_policy_id", $plans_policy_id), $likeCondtnArr = array(), $whereInArray = array());
					}
				}

				if (!empty($plans_policy_id) && !empty($brochure_date) && !empty($brochure_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$update_brochure_doc_arr = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'brochure_date' => $brochure_date . " " . date("h:i:s"),
							'brochure_upload' => $brochure_upload_file_name,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$this->load->model("Mplan_policy");
						if (!empty($update_brochure_doc_arr))
							$result_data = $this->Mplan_policy->update_common_function($update_brochure_doc_arr, $plans_policy_id, $table_name = "master_brochure_doc");
						// $query4 = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_brochure_doc", $update_brochure_doc_arr, $updateKey = "fk_plans_policy_id", $whereArr = array("fk_plans_policy_id", $plans_policy_id), $likeCondtnArr = array(), $whereInArray = array());
					}
				}

				if (!empty($plans_policy_id) && !empty($one_pager_date) && !empty($one_pager_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$update_one_pager_doc_arr = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'one_pager_date' => $one_pager_date . " " . date("h:i:s"),
							'one_pager_upload' => $one_pager_upload_file_name,
							'modify_dt' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$this->load->model("Mplan_policy");
						if (!empty($update_one_pager_doc_arr))
							$result_data = $this->Mplan_policy->update_common_function($update_one_pager_doc_arr, $plans_policy_id, $table_name = "master_one_pager_doc");
					}
				}

				if (!empty($plans_policy_id)) {
					$updateArr[] = array(
						'plans_policy_id' => $plans_policy_id,
						'fk_mcompany_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'policy_type' => $policy_type,
						'policy_wording' => $policy_wording_file_name,
						'fk_document_id' => $document_list,
						// 'claims_form' => $claims_form_file_name,
						'claims_procedure' => $claims_procedure,
						'comission_percentage' => $comission_percentage,
						'modify_dt' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy", $updateArr, $updateKey = "plans_policy_id", $whereArr = array("plans_policy_id", $plans_policy_id), $likeCondtnArr = array(), $whereInArray = array());
				}
				// print_r($proposal_upload_file_name);
				// print_r($claim_upload_file_name);
				// print_r($brochure_upload_file_name);
				// print_r($one_pager_upload_file_name);
				// die();

				// print_r($update_proposal_doc_arr);
				// print_r($update_claim_doc_arr);
				// print_r($update_brochure_doc_arr);
				// print_r($update_one_pager_doc_arr);
				// die();
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($plans_policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Plans & Policy is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function update_plans_policy_bak()
	{
		$user_role_id = $this->session->userdata("@_user_role_id");
		$user_role_title = $this->session->userdata("@_user_role_title");
		$staff_id = $this->session->userdata("@_staff_id");
		$staff_name = $this->session->userdata("@_staff_name");

		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('policy_wording', 'Policy Wordings', 'trim');
		$this->form_validation->set_rules('document_list', 'Document List', 'trim|required');
		$this->form_validation->set_rules('claims_form', 'Claims Form', 'trim');
		$this->form_validation->set_rules('claims_procedure', 'Policy Wording', 'trim');
		$this->form_validation->set_rules('comission_percentage', 'Comission %', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"policy_wording_err" => form_error("policy_wording"),
				"document_liste_err" => form_error("document_list"),
				"claims_form_err" => form_error("claims_form"),
				"claims_procedure_err" => form_error("claims_procedure"),
				"comission_percentage_err" => form_error("comission_percentage"),
			);
			// die("error");
		} else {
			// die("success");
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$policy_file_name = "";
				$policy_wording_file_name = "";
				$claims_file_name = "";
				$claims_form_file_name = "";

				$plans_policy_id = $this->security->xss_clean($this->input->post('plans_policy_id'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));
				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				// $policy_wording = $this->security->xss_clean($this->input->post('policy_wording'));
				$document_list = $this->security->xss_clean($this->input->post('document_list'));
				// $claims_form = $this->security->xss_clean($this->input->post('claims_form'));
				$claims_procedure = $this->security->xss_clean($this->input->post('claims_procedure'));
				$comission_percentage = $this->security->xss_clean($this->input->post('comission_percentage'));
				// print_r($plans_policy_id);
				// die("Test");

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));
				$circular_date = $this->security->xss_clean($this->input->post('circular_date'));
				$circular_doc_reason = $this->security->xss_clean($this->input->post('circular_doc_reason'));

				$proposal_date = $this->security->xss_clean($this->input->post('proposal_date'));
				$proposal_doc_reason = $this->security->xss_clean($this->input->post('proposal_doc_reason'));

				$claim_date = $this->security->xss_clean($this->input->post('claim_date'));
				$claim_doc_reason = $this->security->xss_clean($this->input->post('claim_doc_reason'));

				$other_date = $this->security->xss_clean($this->input->post('other_date'));
				$other_doc_reason = $this->security->xss_clean($this->input->post('other_doc_reason'));

				$brochure_date = $this->security->xss_clean($this->input->post('brochure_date'));
				$brochure_doc_reason = $this->security->xss_clean($this->input->post('brochure_doc_reason'));

				$one_pager_date = $this->security->xss_clean($this->input->post('one_pager_date'));
				$one_pager_doc_reason = $this->security->xss_clean($this->input->post('one_pager_doc_reason'));

				$company_short_name = "";
				if (!empty($company_name_txt)) {
					$whereArr_new["master_company.company_name"] = $company_name_txt;
					$query4 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr_new, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query4["userData"];
					$company_short_name = $result["company_short_name"];
					// echo $this->db->last_query();
					// print_r($company_short_name);
					// print_r($result);
					// die("Test");
				}

				if ($plans_policy_id != "") {
					$whereArr["master_plans_policy.plans_policy_id"] = $plans_policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =  "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$result = $query["userData"];
					$policy_file_name = $result["policy_wording"];
					$claims_file_name = $result["claims_form"];

					if (empty($policy_wording_file_name))
						$policy_wording_file_name = $result["policy_wording"];
					if (empty($claims_form_file_name))
						$claims_form_file_name = $result["claims_form"];
				}
				// print_r($claims_file_name);
				if (!empty($_FILES["policy_wording"])) {
					if (!empty($policy_file_name)) {
						$policy_wording_data = $_FILES["policy_wording"]["name"];
						$policy_wording_img = $this->file_lib->file_upload($img_name = "policy_wording", $directory_name = "./assets/plans_policy/policy_wording/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

						$path = "./assets/plans_policy/policy_wording/";
						$file_path = $path . "/" . $policy_file_name;

						// unlink($file_path);

						if ($policy_wording_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["policy_wording_err"]  = $policy_wording_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($policy_wording_img["file_name"] != "") {
							$policy_wording_file_name = $policy_wording_img["file_name"];
							$policy_wording_file_size = $policy_wording_img["file_size"];
							$policy_wording_file_type = $policy_wording_img["file_type"];
						}
					} elseif (empty($policy_file_name)) {
						$policy_wording_data = $_FILES["policy_wording"]["name"];
						$policy_wording_img = $this->file_lib->file_upload($img_name = "policy_wording", $directory_name = "./assets/plans_policy/policy_wording/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

						if ($policy_wording_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["policy_wording_err"]  = $policy_wording_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($policy_wording_img["file_name"] != "") {
							$policy_wording_file_name = $policy_wording_img["file_name"];
							$policy_wording_file_size = $policy_wording_img["file_size"];
							$policy_wording_file_type = $policy_wording_img["file_type"];
						}
					}
				}
				if (!empty($_FILES["claims_form"])) {
					if (!empty($claims_file_name)) {
						$claims_form_data = $_FILES["claims_form"]["name"];

						$claims_form_img = $this->file_lib->file_upload($img_name = "claims_form", $directory_name = "./assets/plans_policy/claims_form/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

						$path = "./assets/plans_policy/claims_form/";
						$file_path = $path . "/" . $claims_file_name;

						// unlink($file_path);

						if ($claims_form_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["claims_form_err"] = $claims_form_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($claims_form_img["file_name"] != "") {
							$claims_form_file_name = $claims_form_img["file_name"];
							$claims_form_file_size = $claims_form_img["file_size"];
							$claims_form_file_type = $claims_form_img["file_type"];
						}
					} elseif (empty($claims_file_name)) {
						$claims_form_data = $_FILES["claims_form"]["name"];
						$claims_form_img = $this->file_lib->file_upload($img_name = "claims_form", $directory_name = "./assets/plans_policy/claims_form/", $overwrite = False, $allowed_types = "pdf|doc|docx|Pdf|jpeg|jpg|png", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $company . "_" . $department . "_" . $document_list . "_" . $policy_type . "_" . date("Y-m-d") . "_" . mt_rand(1000, 9999), $url = "", $user_session_id = $user_role_id);

						if ($claims_form_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["claims_form_err"] = $claims_form_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($claims_form_img["file_name"] != "") {
							$claims_form_file_name = $claims_form_img["file_name"];
							$claims_form_file_size = $claims_form_img["file_size"];
							$claims_form_file_type = $claims_form_img["file_type"];
						}
					}
				}

				$circular_upload_file_name = "";
				$proposal_upload_file_name = "";
				$claim_upload_file_name = "";
				$other_upload_file_name = "";
				$brochure_upload_file_name = "";
				$one_pager_upload_file_name = "";
				if (!empty($_FILES["circular_upload"])) {
					$circular_upload_data = $_FILES["circular_upload"]["name"];
					$circular_upload_img = $this->file_lib->file_upload($img_name = "circular_upload", $directory_name = "./assets/plans_policy/circular_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($circular_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["circular_upload_err"] = $circular_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($circular_upload_img["file_name"] != "") {
						$circular_upload_file_name = $circular_upload_img["file_name"];
						$circular_upload_file_size = $circular_upload_img["file_size"];
						$circular_upload_file_type = $circular_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["proposal_upload"])) {
					$proposal_upload_data = $_FILES["proposal_upload"]["name"];
					$proposal_upload_img = $this->file_lib->file_upload($img_name = "proposal_upload", $directory_name = "./assets/plans_policy/proposal_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($proposal_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["proposal_upload_err"] = $proposal_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($proposal_upload_img["file_name"] != "") {
						$proposal_upload_file_name = $proposal_upload_img["file_name"];
						$proposal_upload_file_size = $proposal_upload_img["file_size"];
						$proposal_upload_file_type = $proposal_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["claim_upload"])) {
					$claim_upload_data = $_FILES["claim_upload"]["name"];
					$claim_upload_img = $this->file_lib->file_upload($img_name = "claim_upload", $directory_name = "./assets/plans_policy/claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($claim_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["claim_upload_err"] = $claim_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($claim_upload_img["file_name"] != "") {
						$claim_upload_file_name = $claim_upload_img["file_name"];
						$claim_upload_file_size = $claim_upload_img["file_size"];
						$claim_upload_file_type = $claim_upload_img["file_type"];
					}
				}
				if (!empty($_FILES["other_upload"])) {
					$other_upload_data = $_FILES["other_upload"]["name"];
					$other_upload_img = $this->file_lib->file_upload($img_name = "other_upload", $directory_name = "./assets/plans_policy/other_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($other_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["other_upload_err"] = $other_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($other_upload_img["file_name"] != "") {
						$other_upload_file_name = $other_upload_img["file_name"];
						$other_upload_file_size = $other_upload_img["file_size"];
						$other_upload_file_type = $other_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["brochure_upload"])) {
					$brochure_upload_data = $_FILES["brochure_upload"]["name"];
					$brochure_upload_img = $this->file_lib->file_upload($img_name = "brochure_upload", $directory_name = "./assets/plans_policy/brochure_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($brochure_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["brochure_upload_err"] = $brochure_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($brochure_upload_img["file_name"] != "") {
						$brochure_upload_file_name = $brochure_upload_img["file_name"];
						$brochure_upload_file_size = $brochure_upload_img["file_size"];
						$brochure_upload_file_type = $brochure_upload_img["file_type"];
					}
				}

				if (!empty($_FILES["one_pager_upload"])) {
					$one_pager_upload_data = $_FILES["one_pager_upload"]["name"];
					$one_pager_upload_img = $this->file_lib->file_upload($img_name = "one_pager_upload", $directory_name = "./assets/plans_policy/one_pager_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

					if ($one_pager_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["one_pager_upload_err"] = $one_pager_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($one_pager_upload_img["file_name"] != "") {
						$one_pager_upload_file_name = $one_pager_upload_img["file_name"];
						$one_pager_upload_file_size = $one_pager_upload_img["file_size"];
						$one_pager_upload_file_type = $one_pager_upload_img["file_type"];
					}
				}

				if (!empty($plans_policy_id)) {
					$updateArr[] = array(
						'plans_policy_id' => $plans_policy_id,
						'fk_mcompany_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'policy_type' => $policy_type,
						'policy_wording' => $policy_wording_file_name,
						'fk_document_id' => $document_list,
						'claims_form' => $claims_form_file_name,
						'claims_procedure' => $claims_procedure,
						'comission_percentage' => $comission_percentage,
						'modify_dt' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					// print_r($updateArr);
					// die("Test");
					$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy", $updateArr, $updateKey = "plans_policy_id", $whereArr = array("plans_policy_id", $plans_policy_id), $likeCondtnArr = array(), $whereInArray = array());

					// echo $this->db->last_query();
					// print_r($company_short_name);
					// print_r($result);
					// die("Test");
				}

				if (!empty($plans_policy_id) && !empty($circular_upload_file_name) && !empty($circular_date)) {
					$add_circular_doc_arr[] = array(
						'fk_plans_policy_id' => $plans_policy_id,
						'fk_company_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'fk_document_id' => $document_list,
						'circular_doc_date' => $circular_date . " " . date("h:i:s"),
						'circular_doc_name' => $circular_upload_file_name,
						'circular_doc_reason' => $circular_doc_reason,
						'create_date' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy_circular_doc", $add_circular_doc_arr, $return_type = "lastID");
					$circular_doc_id = $query["lastID"];
				}

				if (!empty($plans_policy_id) && !empty($proposal_date) && !empty($proposal_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_proposal_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'proposal_doc_date' => $proposal_date . " " . date("h:i:s"),
							'proposal_doc_name' => $proposal_upload_file_name,
							'proposal_doc_reason' => $proposal_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_proposal_doc", $add_proposal_doc_arr, $return_type = "lastID");
						$proposal_doc_id = $query["lastID"];
					}
				}

				if (!empty($plans_policy_id) && !empty($claim_date) && !empty($claim_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_claim_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'claim_doc_date' => $claim_date . " " . date("h:i:s"),
							'claim_doc_name' => $claim_upload_file_name,
							'claim_doc_reason' => $claim_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_claim_doc", $add_claim_doc_arr, $return_type = "lastID");
						$claim_doc_id = $query["lastID"];
					}
				}

				if (!empty($plans_policy_id) && !empty($other_date) && !empty($other_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_other_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'other_doc_date' => $other_date . " " . date("h:i:s"),
							'other_doc_name' => $other_upload_file_name,
							'other_doc_reason' => $other_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_other_doc", $add_other_doc_arr, $return_type = "lastID");
						$other_doc_id = $query["lastID"];
					}
				}

				if (!empty($plans_policy_id) && !empty($brochure_date) && !empty($brochure_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_brochure_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'brochure_date' => $brochure_date . " " . date("h:i:s"),
							'brochure_upload' => $brochure_upload_file_name,
							'brochure_doc_reason' => $brochure_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_brochure_doc", $add_brochure_doc_arr, $return_type = "lastID");
						$brochure_doc_id = $query["lastID"];
					}
				}

				if (!empty($plans_policy_id) && !empty($one_pager_date) && !empty($one_pager_upload_file_name)) {
					if (!empty($plans_policy_id)) {
						$add_one_pager_doc_arr[] = array(
							'fk_plans_policy_id' => $plans_policy_id,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'one_pager_date' => $one_pager_date . " " . date("h:i:s"),
							'one_pager_upload' => $one_pager_upload_file_name,
							'one_pager_doc_reason' => $one_pager_doc_reason,
							'create_date' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->addQuery($tableName = "master_one_pager_doc", $add_one_pager_doc_arr, $return_type = "lastID");
						$one_pager_doc_id = $query["lastID"];
					}
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($plans_policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Plans & Policy is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_plans_policy()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"plans_policy_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_plans_policy.plans_policy_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy", $updateArr, $updateKey = "plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =  "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Plans & Policy Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Plans & Policy.";
			}
			echo json_encode($result);
		}
	}

	public function recover_plans_policy()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"plans_policy_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_plans_policy.plans_policy_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy", $updateArr, $updateKey = "plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Plans & Policy Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Remove Plans & Policy.";
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

		$this->data["main_page"] = "master/plans_policy/plans_policy";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function view()
	{
		$this->data["view"] = $view = $this->uri->segment(3);
		$this->data["company_id"] = $company_id = $this->uri->segment(4);
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");
		$whereArr["master_plans_policy.fk_mcompany_id"] = $company_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["result"] = $result = $query["userData"];

		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"],
			"breadcrumb_url" => base_url() . "master/plans_policy",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/plans_policy/view_plans_policy";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_plans_policy_list()
	{
		$filter_company = $this->input->post("filter_company");
		$view = $this->input->post("view");
		$company_id = $this->input->post("company_id");
		if ($view == "view") {
			$groupByArr = array();
			$whereArr = array("master_plans_policy.fk_mcompany_id" => $company_id);
		} else {
			$groupByArr = array("master_plans_policy.fk_mcompany_id");
			$whereArr = array();
		}
		$result2 = array();
		// $whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			// print_r($filter_company);die();
			if (!empty($filter_company))
				$whereArr["master_plans_policy.fk_mcompany_id"] = $filter_company;
			// print_r($whereArr);die();
			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_plans_policy.plans_policy_status"] = $filter_status;
			}

			if ($view != "view") {
				$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "count(master_plans_policy.plans_policy_id) as total_policy,master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id,master_company.company_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("master_plans_policy.fk_mcompany_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$result2 = $query["userData"];
				$total_plans_policy_data = count($result2);
			} else {
				$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");

				$joins_main[] = array("tbl" => "master_plans_policy_circular_doc", "condtn" => "master_plans_policy.plans_policy_id = master_plans_policy_circular_doc.fk_plans_policy_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_proposal_doc", "condtn" => "master_plans_policy.plans_policy_id = master_proposal_doc.fk_plans_policy_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_claim_doc", "condtn" => "master_plans_policy.plans_policy_id = master_claim_doc.fk_plans_policy_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_other_doc", "condtn" => "master_plans_policy.plans_policy_id = master_other_doc.fk_plans_policy_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_brochure_doc", "condtn" => "master_plans_policy.plans_policy_id = master_brochure_doc.fk_plans_policy_id", "type" => "left");
				$joins_main[] = array("tbl" => "master_one_pager_doc", "condtn" => "master_plans_policy.plans_policy_id = master_one_pager_doc.fk_plans_policy_id", "type" => "left");

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name , master_plans_policy_circular_doc.circular_doc_date,master_plans_policy_circular_doc.circular_doc_name,master_plans_policy_circular_doc.circular_doc_reason, master_proposal_doc.proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_reason, master_claim_doc.claim_doc_date,  master_claim_doc.claim_doc_name,  master_claim_doc.claim_doc_reason, master_other_doc.other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, master_brochure_doc.brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_reason, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_date, master_one_pager_doc.one_pager_doc_reason", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$result2 = $query["userData"];
				$total_plans_policy_data = count($result2);
			}
		}
		// echo $this->db->last_query();print_r($whereArr);die();

		$total_policy = "";

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_policy"] = $total_policy;
			$result["total_plans_policy_data"] = $total_plans_policy_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_policy"] = array();
			$result["total_plans_policy_data"] = $total_plans_policy_data;
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_plans_policy_list()
	{
		$view = $this->uri->segment(4);
		$company_id = $this->uri->segment(5);
		if ($view == "view") {
			$groupByArr = array();
			$whereArr = array("master_plans_policy.fk_mcompany_id" => $company_id);
		} else {
			$groupByArr = array("master_plans_policy.fk_mcompany_id");
			$whereArr = array();
		}

		$validator = array('status' => false, 'messages' => array());

		// echo $this->db->last_query();
		// die("Test");
		$total_policy = "";
		if ($view != "view") {
			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "count(master_plans_policy.plans_policy_id) as total_policy,master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id,master_company.company_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("master_plans_policy.fk_mcompany_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_plans_policy_data = count($result2);
			// $total_policy =count($result2);
			// print_r($total_policy);
			// echo $this->db->last_query();
			// die("Test");
		} else {
			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");

			$joins_main[] = array("tbl" => "master_plans_policy_circular_doc", "condtn" => "master_plans_policy.plans_policy_id = master_plans_policy_circular_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_proposal_doc", "condtn" => "master_plans_policy.plans_policy_id = master_proposal_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_claim_doc", "condtn" => "master_plans_policy.plans_policy_id = master_claim_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_other_doc", "condtn" => "master_plans_policy.plans_policy_id = master_other_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_brochure_doc", "condtn" => "master_plans_policy.plans_policy_id = master_brochure_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_one_pager_doc", "condtn" => "master_plans_policy.plans_policy_id = master_one_pager_doc.fk_plans_policy_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name , master_plans_policy_circular_doc.circular_doc_date,master_plans_policy_circular_doc.circular_doc_name,master_plans_policy_circular_doc.circular_doc_reason, master_proposal_doc.proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_reason, master_claim_doc.claim_doc_date,  master_claim_doc.claim_doc_name,  master_claim_doc.claim_doc_reason, master_other_doc.other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, master_brochure_doc.brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_reason, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_date, master_one_pager_doc.one_pager_doc_reason", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_plans_policy_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_policy"] = $total_policy;
			$result["total_plans_policy_data"] = $total_plans_policy_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_policy"] = array();
			$result["total_plans_policy_data"] = $total_plans_policy_data;
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function filter_plans_policy_list_view()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_company = $this->input->post("filter_company");
		$filter_department = $this->input->post("filter_department");
		$filter_policy_name = $this->input->post("filter_policy_name");
		$filter_status = $this->input->post("filter_status");
		$view = $this->input->post("view");
		$company_id = $this->input->post("company_id");

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if ($view == "view") {
				$groupByArr = array(
					"master_plans_policy.plans_policy_id",
					"master_policy_type.policy_type",
				);
				$whereArr = array("master_plans_policy.fk_mcompany_id" => $company_id);
			} else {
				$groupByArr = array("master_plans_policy.fk_mcompany_id");
				$whereArr = array();
			}
			// if (!empty($filter_company))
			// 	$whereArr["master_plans_policy.fk_mcompany_id"] = $filter_company;
			if (!empty($filter_department))
				$whereArr["master_plans_policy.fk_department_id"] = $filter_department;
			if (!empty($filter_policy_name))
				$whereArr["master_plans_policy.fk_policy_type_id"] = $filter_policy_name;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_plans_policy.plans_policy_status"] = $filter_status;
			}

			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_plans_policy_circular_doc", "condtn" => "master_plans_policy.plans_policy_id = master_plans_policy_circular_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_proposal_doc", "condtn" => "master_plans_policy.plans_policy_id = master_proposal_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_claim_doc", "condtn" => "master_plans_policy.plans_policy_id = master_claim_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_other_doc", "condtn" => "master_plans_policy.plans_policy_id = master_other_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_brochure_doc", "condtn" => "master_plans_policy.plans_policy_id = master_brochure_doc.fk_plans_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_one_pager_doc", "condtn" => "master_plans_policy.plans_policy_id = master_one_pager_doc.fk_plans_policy_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name , master_plans_policy_circular_doc.circular_doc_date,master_plans_policy_circular_doc.circular_doc_name,master_plans_policy_circular_doc.circular_doc_reason, master_proposal_doc.proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_reason, master_claim_doc.claim_doc_date,  master_claim_doc.claim_doc_name,  master_claim_doc.claim_doc_reason, master_other_doc.other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, master_brochure_doc.brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_reason, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_date, master_one_pager_doc.one_pager_doc_reason", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_plans_policy_data = count($result2);
		}
		// echo $this->db->last_query();die();
		$total_policy = "";

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_plans_policy_data"] = $total_plans_policy_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_plans_policy_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_plans_policy_list_view()
	{
		$view = $this->uri->segment(4);
		$company_id = $this->uri->segment(5);
		if ($view == "view") {
			$groupByArr = array(
				"master_plans_policy.plans_policy_id",
				"master_policy_type.policy_type",
			);
			$whereArr = array("master_plans_policy.fk_mcompany_id" => $company_id);
		} else {
			$groupByArr = array("master_plans_policy.fk_mcompany_id");
			$whereArr = array();
		}

		$validator = array('status' => false, 'messages' => array());
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_plans_policy_circular_doc", "condtn" => "master_plans_policy.plans_policy_id = master_plans_policy_circular_doc.fk_plans_policy_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_proposal_doc", "condtn" => "master_plans_policy.plans_policy_id = master_proposal_doc.fk_plans_policy_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_claim_doc", "condtn" => "master_plans_policy.plans_policy_id = master_claim_doc.fk_plans_policy_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_other_doc", "condtn" => "master_plans_policy.plans_policy_id = master_other_doc.fk_plans_policy_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_brochure_doc", "condtn" => "master_plans_policy.plans_policy_id = master_brochure_doc.fk_plans_policy_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_one_pager_doc", "condtn" => "master_plans_policy.plans_policy_id = master_one_pager_doc.fk_plans_policy_id", "type" => "left");

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name , master_plans_policy_circular_doc.circular_doc_date,master_plans_policy_circular_doc.circular_doc_name,master_plans_policy_circular_doc.circular_doc_reason, master_proposal_doc.proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_reason, master_claim_doc.claim_doc_date,  master_claim_doc.claim_doc_name,  master_claim_doc.claim_doc_reason, master_other_doc.other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, master_brochure_doc.brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_reason, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_date, master_one_pager_doc.one_pager_doc_reason", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_plans_policy_data = count($result2);

		// print_r($result);
		// die();

		$total_policy = "";


		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_plans_policy_data"] = $total_plans_policy_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_plans_policy_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_plans_policy_status()
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
				"plans_policy_id" => $id,
				"plans_policy_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_plans_policy.plans_policy_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy", $updateArr, $updateKey = "plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =  "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Plans & Policy " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Plans & Policy Status.";
			}
			echo json_encode($result);
		}
	}

	public function department_based_policy()
	{
		if ($this->input->post() != "") {
			$department = $this->input->post("department");
			if ($department != "") {
				$whereArr["master_policy_type.policy_type_status"] = 1;
				$whereArr["master_policy_type.del_flag"] = 1;
				$whereArr["master_policy_type.fk_department_id"] = $department;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_type", $colNames = "master_policy_type.policy_type_id, master_policy_type.policy_type", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_policy_type.policy_type_id" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$policy_type_list = $query["userData"];
			}
			if (!empty($policy_type_list)) {
				$result["status"] = true;
				$result["userdata"] = $policy_type_list;
				$result["message"] = "";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Data Not Found.";
			}
			echo json_encode($result);
		}
	}

	public function download_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Policy Wording , 2:Claims Form ,3 : Circular Upload
		$this->data["plans_policy_id"] = $plans_policy_id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =  "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr = array("master_plans_policy.plans_policy_id" => $plans_policy_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
		$this->data["plans_policy_doc_details"] = $plans_policy_doc_details = $query["userData"];

		$circular_doc_details = "";
		if (!empty($circular_doc_id)) {
			$whereArr3["master_plans_policy_circular_doc.circular_doc_id"] = $circular_doc_id;
			$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames = "master_plans_policy_circular_doc.circular_doc_id, master_plans_policy_circular_doc.circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag", $whereArr = $whereArr3, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_plans_policy_circular_doc.create_date" => "DESC"), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$circular_doc_details = $query2["userData"];
		}

		if (!empty($plans_policy_doc_details) || !empty($circular_doc_details)) {
			if ($doc_type == 1)
				$document_file = $plans_policy_doc_details["policy_wording"];
			elseif ($doc_type == 2)
				$document_file = $plans_policy_doc_details["claims_form"];
			elseif ($doc_type == 3)
				$document_file = $circular_doc_details["circular_doc_name"];
		}


		$this->load->helper('download');

		if ($doc_type != "") {
			if ($doc_type == 1)
				$data = file_get_contents("./assets/plans_policy/policy_wording/" . $document_file);
			elseif ($doc_type == 2)
				$data = file_get_contents("./assets/plans_policy/claims_form/" . $document_file);
			elseif ($doc_type == 3)
				$data = file_get_contents("./assets/plans_policy/claim_upload/" . $doc_name);
			elseif ($doc_type == 4)
				$data = file_get_contents("./assets/plans_policy/proposal_upload/" . $doc_name);
			elseif ($doc_type == 5)
				$data = file_get_contents("./assets/plans_policy/circular_upload/" . $doc_name);
			elseif ($doc_type == 6)
				$data = file_get_contents("./assets/plans_policy/other_upload/" . $doc_name);
			elseif ($doc_type == 7)
				$data = file_get_contents("./assets/plans_policy/brochure_upload/" . $doc_name);
			elseif ($doc_type == 8)
				$data = file_get_contents("./assets/plans_policy/one_pager_upload/" . $doc_name);
		}

		force_download($document_file, $data);
	}

	public function view_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Policy Wording , 2:Claims Form ,3 : Circular Upload
		$this->data["plans_policy_id"] = $plans_policy_id = (int)$this->uri->segment(5);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(6);

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =  "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.plans_policy_status, master_plans_policy.del_flag", $whereArr = array("master_plans_policy.plans_policy_id" => $plans_policy_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
		$this->data["plans_policy_doc_details"] = $plans_policy_doc_details = $query["userData"];

		$circular_doc_details = "";
		if (!empty($circular_doc_id)) {
			$whereArr3["master_plans_policy_circular_doc.circular_doc_id"] = $circular_doc_id;
			$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames = "master_plans_policy_circular_doc.circular_doc_id, master_plans_policy_circular_doc.circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag", $whereArr = $whereArr3, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_plans_policy_circular_doc.create_date" => "DESC"), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$circular_doc_details = $query2["userData"];
		}

		if (!empty($doc_type) || !empty($plans_policy_id)) {
			if ($doc_type == 1) {
				$document_file = $plans_policy_doc_details["policy_wording"];
				// print_r($document_file);
				// die("Test");pdf|doc|docx|Pdf|jpeg|jpg|png
				$extension = pathinfo("assets/plans_policy/policy_wording/" . $document_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/plans_policy/policy_wording/" . $document_file);
			} elseif ($doc_type == 2) {
				$document_file = $plans_policy_doc_details["claims_form"];
				$file = file_get_contents("./assets/plans_policy/claims_form/" . $document_file);
				$extension = pathinfo("assets/plans_policy/claims_form/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 3) {
				$file = file_get_contents("./assets/plans_policy/claim_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/claim_upload/" . $doc_name, PATHINFO_EXTENSION);
			} elseif ($doc_type == 4) {
				$file = file_get_contents("./assets/plans_policy/proposal_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/proposal_upload/" . $doc_name, PATHINFO_EXTENSION);
			} elseif ($doc_type == 5) {
				$file = file_get_contents("./assets/plans_policy/circular_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/circular_upload/" . $doc_name, PATHINFO_EXTENSION);
			} elseif ($doc_type == 6) {
				$file = file_get_contents("./assets/plans_policy/other_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/other_upload/" . $doc_name, PATHINFO_EXTENSION);
			} elseif ($doc_type == 7) {
				$file = file_get_contents("./assets/plans_policy/brochure_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/brochure_upload/" . $doc_name, PATHINFO_EXTENSION);
			} elseif ($doc_type == 8) {
				$file = file_get_contents("./assets/plans_policy/one_pager_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/one_pager_upload/" . $doc_name, PATHINFO_EXTENSION);
			}
			// print_r($extension);
			// die("Test");
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}

	public function delete_doc()
	{
		$doc_type = $this->input->post("doc_type");
		$plans_policy_id = $this->input->post("id");
		$doc_name = $this->input->post("doc_name");
		$joins_main_1[] = array("tbl" => "master_company", "condtn" => "master_plans_policy.fk_mcompany_id = master_company.mcompany_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_department", "condtn" => "master_plans_policy.fk_department_id = master_department.department_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_document", "condtn" => "master_plans_policy.fk_document_id = master_document.document_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_plans_policy_circular_doc", "condtn" => "master_plans_policy.plans_policy_id = master_plans_policy_circular_doc.fk_plans_policy_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_proposal_doc", "condtn" => "master_plans_policy.plans_policy_id = master_proposal_doc.fk_plans_policy_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_claim_doc", "condtn" => "master_plans_policy.plans_policy_id = master_claim_doc.fk_plans_policy_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_other_doc", "condtn" => "master_plans_policy.plans_policy_id = master_other_doc.fk_plans_policy_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_brochure_doc", "condtn" => "master_plans_policy.plans_policy_id = master_brochure_doc.fk_plans_policy_id", "type" => "left");
		$joins_main_1[] = array("tbl" => "master_one_pager_doc", "condtn" => "master_plans_policy.plans_policy_id = master_one_pager_doc.fk_plans_policy_id", "type" => "left");

		$query_1data = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames =   "master_plans_policy.plans_policy_id, master_plans_policy.fk_mcompany_id, master_plans_policy.fk_department_id, master_plans_policy.fk_policy_type_id, master_plans_policy.fk_document_id, master_plans_policy.policy_type, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure, master_plans_policy.comission_percentage, master_plans_policy.plans_policy_status, master_plans_policy.del_flag, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, master_document.document_name , master_plans_policy_circular_doc.circular_doc_date,master_plans_policy_circular_doc.circular_doc_name,master_plans_policy_circular_doc.circular_doc_reason, master_proposal_doc.proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_reason, master_claim_doc.claim_doc_date,  master_claim_doc.claim_doc_name,  master_claim_doc.claim_doc_reason, master_other_doc.other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, master_brochure_doc.brochure_date, master_brochure_doc.brochure_upload, master_brochure_doc.brochure_doc_reason, master_one_pager_doc.one_pager_upload, master_one_pager_doc.one_pager_date, master_one_pager_doc.one_pager_doc_reason", $whereArr = array("master_plans_policy.plans_policy_id" => $plans_policy_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_1, $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
		$this->data["plans_policy_doc_details"] = $plans_policy_doc_details = $query_1data["userData"];

		$claims_form_upload = $plans_policy_doc_details["claims_form"];
		$circular_doc_name_upload = $plans_policy_doc_details["circular_doc_name"];
		$other_doc_name_upload = $plans_policy_doc_details["other_doc_name"];

		$policy_wording_upload = $plans_policy_doc_details["policy_wording"];
		$claim_doc_name_upload = $plans_policy_doc_details["claim_doc_name"];
		$proposal_doc_name_upload = $plans_policy_doc_details["proposal_doc_name"];
		$brochure_upload = $plans_policy_doc_details["brochure_upload"];
		$one_pager_upload = $plans_policy_doc_details["one_pager_upload"];

		if (!empty($doc_type) || !empty($plans_policy_id)) {
			if ($doc_type == 1) {
				$title = "Policy Wordings Document";
				$policy_wording_upload = "";
				$extension = pathinfo("assets/plans_policy/policy_wording/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/plans_policy/policy_wording/" . $doc_name);
				unlink("./assets/plans_policy/policy_wording/" . $doc_name);
				$updateArr[] = array(
					"plans_policy_id" => $plans_policy_id,
					"policy_wording" => $policy_wording_upload, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["master_plans_policy.plans_policy_id"] = $plans_policy_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy", $updateArr, $updateKey = "plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 2) {
				$title = "Claim Form Upload Document";
				$claims_form_upload = "";
				$file = file_get_contents("./assets/plans_policy/claims_form/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/claims_form/" . $doc_name, PATHINFO_EXTENSION);
				unlink("./assets/plans_policy/claims_form/" . $doc_name);
				$updateArr[] = array(
					"plans_policy_id" => $plans_policy_id,
					"claims_form" => $claims_form_upload, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["master_plans_policy.plans_policy_id"] = $plans_policy_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy", $updateArr, $updateKey = "plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 3) {
				$title = "Claim Form Upload Document";
				$claim_doc_name_upload = "";
				$file = file_get_contents("./assets/plans_policy/claim_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/claim_upload/" . $doc_name, PATHINFO_EXTENSION);
				unlink("./assets/plans_policy/claim_upload/" . $doc_name);
				$updateArr[] = array(
					"fk_plans_policy_id" => $plans_policy_id,
					"claim_doc_name" => $claim_doc_name_upload, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["master_claim_doc.fk_plans_policy_id"] = $plans_policy_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_claim_doc", $updateArr, $updateKey = "fk_plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 4) {
				$title = "Proposal Upload Document";
				$proposal_doc_name_upload = "";
				$file = file_get_contents("./assets/plans_policy/proposal_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/proposal_upload/" . $doc_name, PATHINFO_EXTENSION);
				unlink("./assets/plans_policy/proposal_upload/" . $doc_name);
				$updateArr[] = array(
					"fk_plans_policy_id" => $plans_policy_id,
					"proposal_doc_name" => $proposal_doc_name_upload, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["master_proposal_doc.fk_plans_policy_id"] = $plans_policy_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_proposal_doc", $updateArr, $updateKey = "fk_plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 5) {
				$title = "Circular Upload Document";
				$circular_doc_name_upload = "";
				$file = file_get_contents("./assets/plans_policy/circular_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/circular_upload/" . $doc_name, PATHINFO_EXTENSION);
				unlink("./assets/plans_policy/circular_upload/" . $doc_name);
				$updateArr[] = array(
					"fk_plans_policy_id" => $plans_policy_id,
					"circular_doc_name" => $circular_doc_name_upload, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["master_plans_policy_circular_doc.fk_plans_policy_id"] = $plans_policy_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy_circular_doc", $updateArr, $updateKey = "fk_plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 6) {
				$title = "Other Upload Document";
				$other_doc_name = "";
				$file = file_get_contents("./assets/plans_policy/other_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/other_upload/" . $doc_name, PATHINFO_EXTENSION);
				unlink("./assets/plans_policy/other_upload/" . $doc_name);
				$updateArr[] = array(
					"fk_plans_policy_id" => $plans_policy_id,
					"other_doc_name" => $other_doc_name, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["master_other_doc.fk_plans_policy_id"] = $plans_policy_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_other_doc", $updateArr, $updateKey = "fk_plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 7) {
				$title = "Brochure Upload Document";
				$brochure_upload = "";
				$file = file_get_contents("./assets/plans_policy/brochure_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/brochure_upload/" . $doc_name, PATHINFO_EXTENSION);
				unlink("./assets/plans_policy/brochure_upload/" . $doc_name);
				$updateArr[] = array(
					"fk_plans_policy_id" => $plans_policy_id,
					"brochure_upload" => $brochure_upload, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["master_brochure_doc.fk_plans_policy_id"] = $plans_policy_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_brochure_doc", $updateArr, $updateKey = "fk_plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			} elseif ($doc_type == 8) {
				$title = "One Pager Upload Document";
				$one_pager_upload = "";
				$file = file_get_contents("./assets/plans_policy/one_pager_upload/" . $doc_name);
				$extension = pathinfo("assets/plans_policy/one_pager_upload/" . $doc_name, PATHINFO_EXTENSION);
				unlink("./assets/plans_policy/one_pager_upload/" . $doc_name);
				$updateArr[] = array(
					"fk_plans_policy_id" => $plans_policy_id,
					"one_pager_upload" => $one_pager_upload, //1:Running, 0:Deleted
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$whereArr["master_one_pager_doc.fk_plans_policy_id"] = $plans_policy_id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_one_pager_doc", $updateArr, $updateKey = "fk_plans_policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
			}
		}

		$this->session->set_flashdata("msg", $title . " is Deleted successfully.");
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

	public function document_name()
	{
		if ($this->input->post() != "") {
			$fk_document_id = $this->input->post("fk_document_id");

			$fk_document_id = explode(",", $fk_document_id);
			$document_list = [];
			if ($fk_document_id != "") {
				$whereArr["master_document.document_status"] = 1;
				$whereArr["master_document.del_flag"] = 1;
				// $whereArr["master_document.document_id"] = $fk_document_id;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames = "master_document.document_id, master_document.document_name", $whereArr = $whereArr, $whereInArray = array("master_document.document_id" => $fk_document_id), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_document.document_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$document_list = $query["userData"];
			}

			$doc_name = "";
			if (!empty($document_list)) {
				foreach ($document_list as $row) {

					if ($doc_name == "")
						$doc_name = $row["document_name"];
					else
						$doc_name .= ", " . $row["document_name"];
				}
			}
			// print_r($doc_name);
			// print_r($doc_name);
			// die("Test");
			if (!empty($doc_name)) {
				$result["status"] = true;
				$result["document_name"] = $doc_name;
				$result["message"] = "";
			} else {
				$result["status"] = false;
				$result["document_name"] = array();
				$result["message"] = "Data Not Found.";
				die();
			}
			echo json_encode($result);
		}
	}

	public function update_circular_upload()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('document_list', 'Document List', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"document_liste_err" => form_error("document_list"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$plans_policy_id = $this->security->xss_clean($this->input->post('plans_policy_id'));
				// print($plans_policy_id);
				// 	die();
				$company = $this->security->xss_clean($this->input->post('company'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));

				$company_name_txt = $this->security->xss_clean($this->input->post('company_name_txt'));
				$department_name_txt = $this->security->xss_clean($this->input->post('department_name_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));

				$document_list = $this->security->xss_clean($this->input->post('document_list'));
				$circular_date = $this->security->xss_clean($this->input->post('circular_date'));
				$circular_doc_reason = $this->security->xss_clean($this->input->post('circular_doc_reason'));
				$company_short_name = "";

				if (!empty($plans_policy_id)) {
					if (!empty($company_name_txt)) {
						$whereArr["master_company.company_name"] = $company_name_txt;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
						$result = $query["userData"];
						$company_short_name = $result["company_short_name"];
					}

					if (!empty($_FILES["circular_upload"])) {
						$circular_upload_data = $_FILES["circular_upload"]["name"];
						$circular_upload_img = $this->file_lib->file_upload($img_name = "circular_upload", $directory_name = "./assets/plans_policy/circular_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|jpeg|jpg|png|JPEG|PNG|JPG|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

						if ($circular_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["circular_upload_err"] = $circular_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($circular_upload_img["file_name"] != "") {
							$circular_upload_file_name = $circular_upload_img["file_name"];
							$circular_upload_file_size = $circular_upload_img["file_size"];
							$circular_upload_file_type = $circular_upload_img["file_type"];
						}
					}
				}

				if (!empty($plans_policy_id) && !empty($circular_date) && !empty($circular_upload_file_name)) {
					$add_circular_doc_arr[] = array(
						'fk_plans_policy_id' => $plans_policy_id,
						'fk_company_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'fk_document_id' => $document_list,
						'circular_doc_date' => $circular_date . " " . date("h:i:s"),
						'circular_doc_name' => $circular_upload_file_name,
						'circular_doc_reason' => $circular_doc_reason,
						'create_date' => date("Y-m-d h:i:s"),
						"fk_staff_id" => $this->session->userdata("@_staff_id"),
						"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
					);
					// print_r($add_circular_doc_arr);
					// die();
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_plans_policy_circular_doc", $add_circular_doc_arr, $return_type = "lastID");
					$circular_doc_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	
			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "Circular Documnet is Uploaded Successfully.";
			}
		}

		echo json_encode($validator);
	}

	public function view_circular_doc_list()
	{
		$this->data["company_id"] = $company_id = $this->uri->segment(4);
		$this->data["plans_policy_id"] = $plans_policy_id = $this->uri->segment(5);

		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"],
			"breadcrumb_url" => base_url() . "master/plans_policy/view/" . $company_id,
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "Circular Document List",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/plans_policy/circular_details";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_circular_doc_list()
	{
		$plans_policy_id = $this->security->xss_clean($this->input->post('plans_policy_id'));
		$validator = array('status' => false, 'messages' => array());
		$circular_doc_list = array();
		if (!empty($plans_policy_id)) {
			$whereArr3["master_plans_policy_circular_doc.fk_plans_policy_id"] = $plans_policy_id;
			$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames = "master_plans_policy_circular_doc.circular_doc_id, DATE(master_plans_policy_circular_doc.circular_doc_date) as circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_reason, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag, master_plans_policy_circular_doc.create_date", $whereArr = $whereArr3, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("TIMESTAMP(master_plans_policy_circular_doc.circular_doc_date)" => "DESC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$circular_doc_list = $query2["userData"];
		}

		if (!empty($circular_doc_list)) {
			$result["status"] = true;
			$result["userdata"] = $circular_doc_list;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_circular_doc()
	{
		$plans_policy_id = $this->security->xss_clean($this->input->post('plans_policy_id'));
		$validator = array('status' => false, 'messages' => array());
		$circular_doc_list = array();
		if (!empty($plans_policy_id)) {
			$whereArr3["master_plans_policy_circular_doc.fk_plans_policy_id"] = $plans_policy_id;
			$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames = "master_plans_policy_circular_doc.circular_doc_id, DATE(master_plans_policy_circular_doc.circular_doc_date) as circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_reason, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag, master_plans_policy_circular_doc.create_date", $whereArr = $whereArr3, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("TIMESTAMP(master_plans_policy_circular_doc.circular_doc_date)" => "DESC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$circular_doc_list = $query2["userData"];
		}

		if (!empty($circular_doc_list)) {
			$result["status"] = true;
			$result["userdata"] = $circular_doc_list;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}
	public function remove_circular_doc()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"circular_doc_id" => $id,
				"circular_doc_del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_plans_policy_circular_doc.circular_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy_circular_doc", $updateArr, $updateKey = "circular_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames =  "master_plans_policy_circular_doc.circular_doc_id, DATE(master_plans_policy_circular_doc.circular_doc_date) as circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag, master_plans_policy_circular_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Circular Documnet Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Circular Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function recover_circular_doc()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"circular_doc_id" => $id,
				"circular_doc_del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_plans_policy_circular_doc.circular_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_plans_policy_circular_doc", $updateArr, $updateKey = "circular_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames =   "master_plans_policy_circular_doc.circular_doc_id, DATE(master_plans_policy_circular_doc.circular_doc_date) as circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag, master_plans_policy_circular_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Circular Documnet Recovered Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recovered Circular Documnet.";
			}
			echo json_encode($result);
		}
	}
	// PLANS & POLICY Section End

}
