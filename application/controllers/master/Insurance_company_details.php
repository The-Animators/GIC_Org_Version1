<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insurance_company_details extends Admin_gic_core
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
		$all = $this->session->all_userdata();
		// print_r($all);
		// die("Test");
	}
	// Company Section Start
	public function check_company_name()
	{
		$company_name = $this->input->post('company_name');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code, master_company.payment_link, master_company.payment_steps,master_company.del_flag", $whereArr = array("master_company.company_name" => $company_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_company_name', 'This Company is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function company()
	{
		$this->data["title"] = $title = "Company";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "master/insurance_company_details",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "Add " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/company/add_comany";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_company()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|callback_check_company_name');
		$this->form_validation->set_rules('short_name', 'Short Name', 'trim');
		$this->form_validation->set_rules('comman_email', 'Common Email', 'trim');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('state', 'State', 'trim');
		$this->form_validation->set_rules('city', 'City', 'trim');
		$this->form_validation->set_rules('pincode', 'Pincode', 'trim');
		$this->form_validation->set_rules('office_contact', 'Office Contact', 'trim');
		$this->form_validation->set_rules('website', 'Website', 'trim');
		$this->form_validation->set_rules('tollfree_1', 'Toll Free No.1', 'trim');
		$this->form_validation->set_rules('tollfree_2', 'Toll Free No.2', 'trim');
		$this->form_validation->set_rules('online_link', 'Link', 'trim');
		$this->form_validation->set_rules('online_steps', 'Payment Steps', 'trim');
		$this->form_validation->set_rules('name_on_cheque', 'Name on Cheque', 'trim');
		$this->form_validation->set_rules('courier_address', 'Courier Address', 'trim');
		$this->form_validation->set_rules('account_holder', 'Account Holder', 'trim');
		$this->form_validation->set_rules('account_no', 'Account Number', 'trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'trim');
		$this->form_validation->set_rules('branch_namw', 'Branch Name', 'trim');
		$this->form_validation->set_rules('ifs_code', 'IFSC Code', 'trim');
		$this->form_validation->set_rules('micr_code', 'MICR Code', 'trim');
		$this->form_validation->set_rules('account_holder_1', 'Account Holder 2', 'trim');
		$this->form_validation->set_rules('account_no_1', 'Account Number 2', 'trim');
		$this->form_validation->set_rules('bank_name_1', 'Bank Name 2', 'trim');
		$this->form_validation->set_rules('branch_namw_1', 'Branch Name 2', 'trim');
		$this->form_validation->set_rules('ifs_code_1', 'IFSC Code 2', 'trim');
		$this->form_validation->set_rules('micr_code_1', 'MICR Code 2', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_name_err" => form_error("company_name"),
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
				"online_link_err" => form_error("online_link"),
				"online_steps_err" => form_error("online_steps"),
				"name_on_cheque_err" => form_error("name_on_cheque"),
				"courier_address_err" => form_error("courier_address"),
				"account_holder_err" => form_error("account_holder"),
				"account_no_err" => form_error("account_no"),
				"bank_name_err" => form_error("bank_name"),
				"branch_namw_err" => form_error("branch_namw"),
				"ifs_code_err" => form_error("ifs_code"),
				"micr_code_err" => form_error("micr_code"),
				"account_holder_1_err" => form_error("account_holder_1"),
				"account_no_1_err" => form_error("account_no_1"),
				"bank_name_1_err" => form_error("bank_name_1"),
				"branch_namw_1_err" => form_error("branch_namw_1"),
				"ifs_code_1_err" => form_error("ifs_code_1"),
				"micr_code_1_err" => form_error("micr_code_1"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company_name = $this->security->xss_clean($this->input->post('company_name'));
				$short_name = $this->security->xss_clean($this->input->post('short_name'));
				// print_r($company_name);
				// print_r($short_name);
				// die("136");

				$comman_email = $this->security->xss_clean($this->input->post('comman_email'));
				$address = $this->security->xss_clean($this->input->post('address'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$pincode = $this->security->xss_clean($this->input->post('pincode'));
				$office_contact = $this->security->xss_clean($this->input->post('office_contact'));
				$website = $this->security->xss_clean($this->input->post('website'));
				$tollfree_1 = $this->security->xss_clean($this->input->post('tollfree_1'));
				$tollfree_2 = $this->security->xss_clean($this->input->post('tollfree_2'));
				$online_link = $this->security->xss_clean($this->input->post('online_link'));
				$online_steps = $this->security->xss_clean($this->input->post('online_steps'));
				$name_on_cheque = $this->security->xss_clean($this->input->post('name_on_cheque'));
				$courier_address = $this->security->xss_clean($this->input->post('courier_address'));
				$account_holder = $this->security->xss_clean($this->input->post('account_holder'));
				$account_no = $this->security->xss_clean($this->input->post('account_no'));
				$bank_name = $this->security->xss_clean($this->input->post('bank_name'));
				$branch_namw = $this->security->xss_clean($this->input->post('branch_namw'));
				$ifs_code = $this->security->xss_clean($this->input->post('ifs_code'));
				$micr_code = $this->security->xss_clean($this->input->post('micr_code'));
				$account_holder_1 = $this->security->xss_clean($this->input->post('account_holder_1'));
				$account_no_1 = $this->security->xss_clean($this->input->post('account_no_1'));
				$bank_name_1 = $this->security->xss_clean($this->input->post('bank_name_1'));
				$branch_namw_1 = $this->security->xss_clean($this->input->post('branch_namw_1'));
				$ifs_code_1 = $this->security->xss_clean($this->input->post('ifs_code_1'));
				$micr_code_1 = $this->security->xss_clean($this->input->post('micr_code_1'));

				$total_employee = $this->security->xss_clean($this->input->post('total_employee'));
				$total_agent = $this->security->xss_clean($this->input->post('total_agent'));
				// print_r($total_employee);
				// print_r($total_agent);
				// die("Test123");

				$create_date = date("Y-m-d h:i:s");
				$add_company_arr[] = array(
					'company_name' => $company_name,
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
					'payment_link' => $online_link,
					'payment_steps' => $online_steps,
					'cheque_name' => $name_on_cheque,
					'courier_address' => $courier_address,
					'account_holder_name' => $account_holder,
					'account_number' => $account_no,
					'bank_name' => $bank_name,
					'branch_name' => $branch_namw,
					'ifsc_code' => $ifs_code,
					'micr_code' => $micr_code,
					'account_holder_name_1' => $account_holder_1,
					'account_number_1' => $account_no_1,
					'bank_name_1' => $bank_name_1,
					'branch_name_1' => $branch_namw_1,
					'ifsc_code_1' => $ifs_code_1,
					'micr_code_1' => $micr_code_1,
					'create_date' => $create_date,
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_company", $add_company_arr, $return_type = "lastID");
				$mcompany_id = $query["lastID"];

				if (!empty($mcompany_id)) {
					if (!empty($total_employee)) {
						$counts = count($total_employee);
						for ($i = 0; $i < $counts; $i++) {
							$add_employee_arr[$i] = array(
								'name' => $total_employee[$i][0],
								'designation' => $total_employee[$i][1],
								'contact1' => $total_employee[$i][2],
								'contact2' => $total_employee[$i][3],
								'email1' => $total_employee[$i][4],
								'fk_mcompany_id' => $mcompany_id,
								'create_date' => $create_date,
								"fk_staff_id" => $this->session->userdata("@_staff_id"),
								"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
							);
						}
					}
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_member", $add_employee_arr, $return_type = "lastID");
					$mmember_id = $query["lastID"];
				}
				if (!empty($mcompany_id)) {
					if (!empty($total_agent)) {
						for ($j = 0; $j < count($total_agent); $j++) {
							$add_agent_arr[$j] = array(
								'name' => $total_agent[$j][0],
								'code' => $total_agent[$j][1],
								'link' => $total_agent[$j][2],
								'username' => $total_agent[$j][3],
								'password' => $total_agent[$j][4],
								'magency_status' => $total_agent[$j][5],
								'fk_mcompany_id' => $mcompany_id,
								'create_date' => $create_date,
								"fk_staff_id" => $this->session->userdata("@_staff_id"),
								"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
							);
						}
					}
					// print_r($add_employee_arr);
					// print_r($add_agent_arr);
					// die("Test 123");
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_agency", $add_agent_arr, $return_type = "lastID");
					$magency_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($magency_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Company Details Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_company()
	{

		$this->data["company_id"] = $company_id = $this->uri->segment(4);
		$this->data["title"] = $title = "Company";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "master/insurance_company_details",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => base_url() . "master/insurance_company_details/view_company/" . $company_id,
			"breadcrumb_active" => false,
		);
		$breadcrumbs[3] = array(
			"breadcrumb_label" => "Edit " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		if ($company_id != "") {
			$whereArr["master_company.mcompany_id"] = $company_id;
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "master_company.mcompany_id = master_agency.fk_mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_member", "condtn" => "master_company.mcompany_id = master_member.fk_mcompany_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.company_status, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.tollfree_no_1, master_company.tollfree_no_2, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code,master_company.account_holder_name_1, master_company.account_number_1 , master_company.bank_name_1, master_company.branch_name_1, master_company.ifsc_code_1, master_company.micr_code_1, master_company.payment_link, master_company.payment_steps,master_company.del_flag as company_del_flag ", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("master_company.mcompany_id"), $singleRow = True, $colActive = TRUE, $paginationArr = "");
			$this->data["company_details"] = $company_details = $query["userData"];

			$whereArr_agency["master_agency.fk_mcompany_id"] = $company_id;
			$whereArr_agency["master_agency.magency_status"] = 1;
			$whereArr_agency["master_agency.del_flag"] = 1;
			$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.code, master_agency.name, master_agency.link, master_agency.username, master_agency.password, master_agency.magency_status", $whereArr = $whereArr_agency, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_agency.name" => "ASC"), $groupByArr = array("master_agency.magency_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
			$this->data["agency_details"] = $agency_details = $query2["userData"];
			// print_r(($agency_details));
			// die();
		}

		$this->data["main_page"] = "master/company/edit_company";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function update_company()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->load->model("Magent");

		$company_id = $this->security->xss_clean($this->input->post('company_id'));
		$check_whereArr["master_company.mcompany_id"] = $company_id;

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code, master_company.payment_link, master_company.payment_steps,master_company.del_flag", $whereArr = $check_whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_company_name = $result["company_name"];
		$updated_company_name = $this->input->post("company_name");
		if ($current_company_name != $updated_company_name)
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|callback_check_company_name');
		else
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');

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
		$this->form_validation->set_rules('online_link', 'Link', 'trim');
		$this->form_validation->set_rules('online_steps', 'Payment Steps', 'trim');
		$this->form_validation->set_rules('name_on_cheque', 'Name on Cheque', 'trim');
		$this->form_validation->set_rules('courier_address', 'Courier Address', 'trim');
		$this->form_validation->set_rules('account_holder', 'Account Holder', 'trim');
		$this->form_validation->set_rules('account_no', 'Account Number', 'trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'trim');
		$this->form_validation->set_rules('branch_namw', 'Branch Name', 'trim');
		$this->form_validation->set_rules('ifs_code', 'IFSC Code', 'trim');
		$this->form_validation->set_rules('micr_code', 'MICR Code', 'trim');
		$this->form_validation->set_rules('account_holder_1', 'Account Holder 2', 'trim');
		$this->form_validation->set_rules('account_no_1', 'Account Number 2', 'trim');
		$this->form_validation->set_rules('bank_name_1', 'Bank Name 2', 'trim');
		$this->form_validation->set_rules('branch_namw_1', 'Branch Name 2', 'trim');
		$this->form_validation->set_rules('ifs_code_1', 'IFSC Code 2', 'trim');
		$this->form_validation->set_rules('micr_code_1', 'MICR Code 2', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_name_err" => form_error("company_name"),
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
				"online_link_err" => form_error("online_link"),
				"online_steps_err" => form_error("online_steps"),
				"name_on_cheque_err" => form_error("name_on_cheque"),
				"courier_address_err" => form_error("courier_address"),
				"account_holder_err" => form_error("account_holder"),
				"account_no_err" => form_error("account_no"),
				"bank_name_err" => form_error("bank_name"),
				"branch_namw_err" => form_error("branch_namw"),
				"ifs_code_err" => form_error("ifs_code"),
				"micr_code_err" => form_error("micr_code"),
				"account_holder_1_err" => form_error("account_holder_1"),
				"account_no_1_err" => form_error("account_no_1"),
				"bank_name_1_err" => form_error("bank_name_1"),
				"branch_namw_1_err" => form_error("branch_namw_1"),
				"ifs_code_1_err" => form_error("ifs_code_1"),
				"micr_code_1_err" => form_error("micr_code_1"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$company_id = $this->security->xss_clean($this->input->post('company_id'));
				$company_name = $this->security->xss_clean($this->input->post('company_name'));
				$short_name = $this->security->xss_clean($this->input->post('short_name'));
				// print_r($company_name);
				// print_r($short_name);
				// die("136");

				$comman_email = $this->security->xss_clean($this->input->post('comman_email'));
				$address = $this->security->xss_clean($this->input->post('address'));
				$state = $this->security->xss_clean($this->input->post('state'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$pincode = $this->security->xss_clean($this->input->post('pincode'));
				$office_contact = $this->security->xss_clean($this->input->post('office_contact'));
				$website = $this->security->xss_clean($this->input->post('website'));
				$tollfree_1 = $this->security->xss_clean($this->input->post('tollfree_1'));
				$tollfree_2 = $this->security->xss_clean($this->input->post('tollfree_2'));
				$online_link = $this->security->xss_clean($this->input->post('online_link'));
				$online_steps = $this->security->xss_clean($this->input->post('online_steps'));
				$name_on_cheque = $this->security->xss_clean($this->input->post('name_on_cheque'));
				$courier_address = $this->security->xss_clean($this->input->post('courier_address'));
				$account_holder = $this->security->xss_clean($this->input->post('account_holder'));
				$account_no = $this->security->xss_clean($this->input->post('account_no'));
				$bank_name = $this->security->xss_clean($this->input->post('bank_name'));
				$branch_namw = $this->security->xss_clean($this->input->post('branch_namw'));
				$ifs_code = $this->security->xss_clean($this->input->post('ifs_code'));
				$micr_code = $this->security->xss_clean($this->input->post('micr_code'));
				$account_holder_1 = $this->security->xss_clean($this->input->post('account_holder_1'));
				$account_no_1 = $this->security->xss_clean($this->input->post('account_no_1'));
				$bank_name_1 = $this->security->xss_clean($this->input->post('bank_name_1'));
				$branch_namw_1 = $this->security->xss_clean($this->input->post('branch_namw_1'));
				$ifs_code_1 = $this->security->xss_clean($this->input->post('ifs_code_1'));
				$micr_code_1 = $this->security->xss_clean($this->input->post('micr_code_1'));

				$total_employee = $this->security->xss_clean($this->input->post('total_employee'));
				$total_agent = $this->security->xss_clean($this->input->post('total_agent'));

				$remove_agent_id = $this->security->xss_clean($this->input->post('remove_agent'));
				$remove_agent_result = $this->Magent->remove_agent($remove_agent_id);

				$remove_employee_id = $this->security->xss_clean($this->input->post('remove_employee'));
				$remove_employee_result = $this->Magent->remove_employee($remove_employee_id);

				$create_date = date("Y-m-d h:i:s");
				$update_company_arr[] = array(
					'mcompany_id' => $company_id,
					'company_name' => $company_name,
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
					'payment_link' => $online_link,
					'payment_steps' => $online_steps,
					'cheque_name' => $name_on_cheque,
					'courier_address' => $courier_address,
					'account_holder_name' => $account_holder,
					'account_number' => $account_no,
					'bank_name' => $bank_name,
					'branch_name' => $branch_namw,
					'ifsc_code' => $ifs_code,
					'micr_code' => $micr_code,
					'account_holder_name_1' => $account_holder_1,
					'account_number_1' => $account_no_1,
					'bank_name_1' => $bank_name_1,
					'branch_name_1' => $branch_namw_1,
					'ifsc_code_1' => $ifs_code_1,
					'micr_code_1' => $micr_code_1,
					'modify_dt' => $create_date,
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query1 = $this->Mquery_model_v3->updateBatchQuery($tableName1 = "master_company", $update_company_arr, $updateKey1 = "mcompany_id", $whereArr1 = array("mcompany_id", $company_id), $likeCondtnArr1 = array(), $whereInArray1 = array());

				$add_agent_arr = array();
				$add_employee_arr = array();
				$new_member_id = "";
				$new_agent_id = "";
				$update_employee_arr = array();

				if (!empty($company_id)) {


					if (!empty($total_employee)) {
						$counts = count($total_employee);
						for ($i = 0; $i < $counts; $i++) {
							// $agency_id = "";
							// if(empty($agency_id)){
							if (!empty($total_employee[$i][6]))
								$agency_id = implode(",", $total_employee[$i][6]);
							else
								$agency_id = "";
							// echo $agency_id;
							// }else{
							// 	$agency_id = $total_employee[$i][6].",";
							// 	echo $agency_id."Multi";
							// }
							// print_r($agency_id);
							// die();
							if (!empty($total_employee[$i][5])) {
								$update_employee_arr[$i] = array(
									'name' => $total_employee[$i][0],
									'designation' => $total_employee[$i][1],
									'contact1' => $total_employee[$i][2],
									'contact2' => $total_employee[$i][3],
									'email1' => $total_employee[$i][4],
									'mmember_id' => $total_employee[$i][5],
									'fk_agency_id' => $agency_id,
									'fk_mcompany_id' => $company_id,
									'modify_dt' => $create_date,
									"fk_staff_id" => $this->session->userdata("@_staff_id"),
									"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
								);
								if ($new_member_id == "")
									$new_member_id = $total_employee[$i][5];
								else
									$new_member_id .= "," . $total_employee[$i][5];
								// $query2 = $this->Mquery_model_v3->updateBatchQuery($tableName2 = "master_member", $update_employee_arr, $updateKey2 = "mmember_id", $whereArr1 = array('mmember_id' => $total_employee[$i][5]), $likeCondtnArr2 = array(), $whereInArray2 = array());
							} elseif (empty($total_employee[$i][5])) {
								$add_employee_arr[$i] = array(
									'name' => $total_employee[$i][0],
									'designation' => $total_employee[$i][1],
									'contact1' => $total_employee[$i][2],
									'contact2' => $total_employee[$i][3],
									'email1' => $total_employee[$i][4],
									'fk_agency_id' => $agency_id,
									'fk_mcompany_id' => $company_id,
									'create_date' => $create_date,
									"fk_staff_id" => $this->session->userdata("@_staff_id"),
									"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
								);
								// $query3 = $this->Mquery_model_v3->addQuery($tableName3 = "master_member", $add_employee_arr, $return_type3 = "lastID");
							}
						}
					}

					// print_r($add_employee_arr);
					// print_r($update_employee_arr);
					// die();
					if (!empty($add_employee_arr))
						$query3 = $this->Mquery_model_v3->addQuery($tableName3 = "master_member", $add_employee_arr, $return_type3 = "lastID");
					// print_r($update_employee_arr);
					// print_r($new_member_id);
					// die("Test");
					// $query2 = $this->Mquery_model_v3->updateBatchQuery($tableName2 = "master_member", $update_employee_arr, $updateKey2 = "mmember_id", $whereArr2 = array(), $likeCondtnArr2 = array(), $whereInArray2 = array('mmember_id' => explode(",", $new_member_id)));
					if (!empty($update_employee_arr))
						$result5 = $this->Magent->update_employee($update_employee_arr, $new_member_id, $company_id);

					$update_agent_arr = array();

					if (!empty($total_agent)) {
						for ($j = 0; $j < count($total_agent); $j++) {
							if (!empty($total_agent[$j][6])) {
								$update_agent_arr[$j] = array(
									'name' => $total_agent[$j][0],
									'code' => $total_agent[$j][1],
									'link' => $total_agent[$j][2],
									'username' => $total_agent[$j][3],
									'password' => $total_agent[$j][4],
									'magency_status' => $total_agent[$j][5],
									'magency_id' => $total_agent[$j][6],
									'fk_mcompany_id' => $company_id,
									'modify_dt' => $create_date,
									"fk_staff_id" => $this->session->userdata("@_staff_id"),
									"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
								);
								if ($new_agent_id == "")
									$new_agent_id = $total_agent[$j][6];
								else
									$new_agent_id .= "," . $total_agent[$j][6];
								// $query4 = $this->Mquery_model_v3->updateBatchQuery($tableName4 = "master_agency", $update_agent_arr, $updateKey4 = "magency_id", $whereArr4 = array('magency_id' => $total_agent[$j][6]), $likeCondtnArr4 = array(), $whereInArray4 = array());
							} elseif (empty($total_agent[$j][6])) {
								$add_agent_arr[$j] = array(
									'name' => $total_agent[$j][0],
									'code' => $total_agent[$j][1],
									'link' => $total_agent[$j][2],
									'username' => $total_agent[$j][3],
									'password' => $total_agent[$j][4],
									'magency_status' => $total_agent[$j][5],
									'fk_mcompany_id' => $company_id,
									'create_date' => $create_date,
									"fk_staff_id" => $this->session->userdata("@_staff_id"),
									"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
								);
								// $query5 = $this->Mquery_model_v3->addQuery($tableName5 = "master_agency", $add_agent_arr, $return_type5 = "lastID");
							}
						}
					}
					if (!empty($add_agent_arr))
						$query5 = $this->Mquery_model_v3->addQuery($tableName5 = "master_agency", $add_agent_arr, $return_type5 = "lastID");

					if (!empty($update_agent_arr))
						$result = $this->Magent->update_agent($update_agent_arr, $new_agent_id, $company_id);
					// $query4 = $this->Mquery_model_v3->updateBatchQuery($tableName4 = "master_agency", $update_agent_arr, $updateKey4 = "magency_id", $whereArr4 = array(), $likeCondtnArr4 = array(), $whereInArray4 = array('magency_id' => explode(",",$new_agent_id)));
				}
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($company_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Company Details is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_company()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"mcompany_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_company.mcompany_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_company", $updateArr, $updateKey = "mcompany_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code, master_company.payment_link, master_company.payment_steps,master_company.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Company Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Remove Company.";
			}
			echo json_encode($result);
		}
	}

	public function recover_company()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"mcompany_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_company.mcompany_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_company", $updateArr, $updateKey = "mcompany_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code, master_company.payment_link, master_company.payment_steps,master_company.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Company Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover Company.";
			}
			echo json_encode($result);
		}
	}

	public function index()
	{
		$this->data["title"] = $title = "Company";
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

		$this->data["main_page"] = "master/company/company_list";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function view_company()
	{
		$this->data["company_id"] = $company_id = $this->uri->segment(4);
		$this->data["title"] = $title = "Company";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "master/insurance_company_details",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/company/view_company";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_agent_name_details()
	{
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$company_id = $this->input->post("company_id");
			$agency_id = explode(",", $this->input->post("agency_id"));
			$whereArr["master_agency.fk_mcompany_id"] = $company_id;
			$whereInArray["master_agency.magency_id"] = $agency_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id , master_agency.code, master_agency.name as agent_name, master_agency.link, master_agency.username, master_agency.password, master_agency.magency_status,master_agency.del_flag as agent_del_flag,master_agency.fk_mcompany_id ", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_agency.magency_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
			$agent = $query["userData"];

			$agent_name = "";
			foreach ($agent as $row) {
				if (empty($agent_name)) {
					$agent_name = $row["agent_name"] . " - ( " . $row["code"] . " )";
				} else {
					$agent_name = $row["agent_name"] . " - ( " . $row["code"] . " )" . ", " . $agent_name;
				}
			}
			// print_r($agent_name);
			// die();
			if (!empty($agent_name)) {
				$result["status"] = true;
				$result["userdata"] = $agent_name;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_agent_details()
	{
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$company_id = $this->input->post("company_id");
			$whereArr["master_agency.fk_mcompany_id"] = $company_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id , master_agency.code, master_agency.name as agent_name, master_agency.link, master_agency.username, master_agency.password, master_agency.magency_status,master_agency.del_flag as agent_del_flag,master_agency.fk_mcompany_id ", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_agency.magency_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
			$agent = $query["userData"];
			if (!empty($agent)) {
				$result["status"] = true;
				$result["userdata"] = $agent;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_employee_details()
	{
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$company_id = $this->input->post("company_id");
			$whereArr["master_member.fk_mcompany_id"] = $company_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_member", $colNames = "master_member.mmember_id , master_member.name as member_name, master_member.contact1, master_member.contact2, master_member.email1, master_member.email2, master_member.designation,master_member.department,master_member.del_flag as member_del_flag,master_member.mmember_status,master_member.fk_mcompany_id,master_member.fk_agency_id", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_member.mmember_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
			$employee = $query["userData"];
			// print_r($company_id);
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

	public function get_company_details()
	{
		$validator = array('status' => false, 'messages' => array());
		if ($this->input->post() != "") {
			$company_id = $this->input->post("company_id");
			$whereArr["master_company.mcompany_id"] = $company_id;
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "master_company.mcompany_id = master_agency.fk_mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_member", "condtn" => "master_company.mcompany_id = master_member.fk_mcompany_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.company_status, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.tollfree_no_1, master_company.tollfree_no_2, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code,master_company.account_holder_name_1, master_company.account_number_1 , master_company.bank_name_1, master_company.branch_name_1, master_company.ifsc_code_1, master_company.micr_code_1, master_company.payment_link, master_company.payment_steps,master_company.del_flag as company_del_flag   , master_agency.magency_id , master_agency.code, master_agency.name as agent_name, master_agency.link, master_agency.username, master_agency.password, master_agency.magency_status,master_agency.del_flag as agent_del_flag   , master_member.mmember_id , master_member.name as member_name, master_member.contact1, master_member.contact2, master_member.email1, master_member.email2, master_member.designation,master_member.department,master_member.del_flag as member_del_flag,master_member.mmember_status", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("master_company.mcompany_id"), $singleRow = True, $colActive = TRUE, $paginationArr = "");
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

	public function filter_company_list()
	{
		$filter_company_name = $this->input->post("filter_company_name");
		$filter_short_name = $this->input->post("filter_short_name");
		$filter_common_email = $this->input->post("filter_common_email");
		$filter_office_contact = $this->input->post("filter_office_contact");
		$filter_website = $this->input->post("filter_website");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_company.mcompany_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_company_name))
				$likeCondtnArr["master_company.company_name"] = $filter_company_name;

			if (!empty($filter_short_name))
				$likeCondtnArr["master_company.short_name"] = $filter_short_name;

			if (!empty($filter_common_email))
				$likeCondtnArr["master_company.common_email"] = $filter_common_email;

			if (!empty($filter_office_contact))
				$likeCondtnArr["master_company.office_contact"] = $filter_office_contact;

			if (!empty($filter_website))
				$likeCondtnArr["master_company.website"] = $filter_website;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_company.company_status"] = $filter_status;
			}

			$joins_main[] = array("tbl" => "master_agency", "condtn" => "master_company.mcompany_id = master_agency.fk_mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_member", "condtn" => "master_company.mcompany_id = master_member.fk_mcompany_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.company_status, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.tollfree_no_1, master_company.tollfree_no_2, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code,master_company.account_holder_name_1, master_company.account_number_1 , master_company.bank_name_1, master_company.branch_name_1, master_company.ifsc_code_1, master_company.micr_code_1, master_company.payment_link, master_company.payment_steps,master_company.del_flag as company_del_flag   , master_agency.magency_id , master_agency.code, master_agency.name as agent_name, master_agency.link, master_agency.username, master_agency.password, master_agency.magency_status,master_agency.del_flag as agent_del_flag   , master_member.mmember_id , master_member.name as member_name, master_member.contact1, master_member.contact2, master_member.email1, master_member.email2, master_member.designation,master_member.department,master_member.del_flag as member_del_flag,master_member.mmember_status", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array("master_company.company_name" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_company_data = count($result2);
			// print_r($filter_menu_name);
			// print_r($likeCondtnArr);
			// print_r($whereArr);
			// echo $this->db->last_query();die();
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_company_data"] = $total_company_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_company_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_company_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$joins_main[] = array("tbl" => "master_agency", "condtn" => "master_company.mcompany_id = master_agency.fk_mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_member", "condtn" => "master_company.mcompany_id = master_member.fk_mcompany_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.company_status, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.tollfree_no_1, master_company.tollfree_no_2, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code,master_company.account_holder_name_1, master_company.account_number_1 , master_company.bank_name_1, master_company.branch_name_1, master_company.ifsc_code_1, master_company.micr_code_1, master_company.payment_link, master_company.payment_steps,master_company.del_flag as company_del_flag   , master_agency.magency_id , master_agency.code, master_agency.name as agent_name, master_agency.link, master_agency.username, master_agency.password, master_agency.magency_status,master_agency.del_flag as agent_del_flag   , master_member.mmember_id , master_member.name as member_name, master_member.contact1, master_member.contact2, master_member.email1, master_member.email2, master_member.designation,master_member.department,master_member.del_flag as member_del_flag,master_member.mmember_status", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("master_company.company_name" => "ASC"), $groupByArr = array("master_company.mcompany_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_company_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_company_data"] = $total_company_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_company_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_company_status()
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
				"mcompany_id" => $id,
				"company_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_company.mcompany_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_company", $updateArr, $updateKey = "mcompany_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.company_status, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code, master_company.payment_link, master_company.payment_steps,master_company.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Company " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Company Status.";
			}
			echo json_encode($result);
		}
	}
	// Company Section End





}
