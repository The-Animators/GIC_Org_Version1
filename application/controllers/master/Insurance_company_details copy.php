<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insurance_company_details extends CI_Controller
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
	// Staff Section Start
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
					'create_date' => $create_date
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
								'create_date' => $create_date
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
								'create_date' => $create_date
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
		}

		$this->data["main_page"] = "master/company/edit_company";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function update_company()
	{
		$validator = array('status' => false, 'messages' => array());
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
				// print_r($total_employee);
				// print_r($total_agent);
				// die("Test123");

				$create_date = date("Y-m-d h:i:s");
				$update_company_arr[] = array(
					'mcompany_id' => $company_id,
					'company_name' => $updated_company_name,
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
					'modify_dt' => $create_date
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_company", $update_company_arr, $updateKey = "mcompany_id", $whereArr = array("mcompany_id", $company_id), $likeCondtnArr = array(), $whereInArray = array());
				$add_agent_arr=array();
				$add_employee_arr=array();

				if (!empty($company_id)) {
					if (!empty($total_employee)) {
						$counts = count($total_employee);
						for ($i = 0; $i < $counts; $i++) {
							if (!empty($total_employee[$i][5])) {
								$update_employee_arr[$i] = array(
									'name' => $total_employee[$i][0],
									'designation' => $total_employee[$i][1],
									'contact1' => $total_employee[$i][2],
									'contact2' => $total_employee[$i][3],
									'email1' => $total_employee[$i][4],
									'mmember_id' => $total_employee[$i][5],
									'fk_mcompany_id' => $company_id,
									'modify_dt' => $create_date
								);
								$query2 = $this->Mquery_model_v3->updateBatchQuery($tableName2 = "master_member", $update_employee_arr, $updateKey2 = "mmember_id", $whereArr2 = array('fk_mcompany_id' => $company_id), $likeCondtnArr2 = array(), $whereInArray2 = array('mmember_id'=> $total_employee[$i][5]));
							} else if (empty($total_employee[$i][5])) {
								$add_employee_arr[$i] = array(
									'name' => $total_employee[$i][0],
									'designation' => $total_employee[$i][1],
									'contact1' => $total_employee[$i][2],
									'contact2' => $total_employee[$i][3],
									'email1' => $total_employee[$i][4],
									'fk_mcompany_id' => $company_id,
									'create_date' => $create_date
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName2 = "master_member", $add_employee_arr, $return_type2 = "lastID");

							}
						}
					}
					
				}
				if (!empty($company_id)) {
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
									'modify_dt' => $create_date
								);
								$query3 = $this->Mquery_model_v3->updateBatchQuery($tableName3 = "master_agency", $update_agent_arr, $updateKey3 = "magency_id", $whereArr3 = array('fk_mcompany_id' => $company_id), $likeCondtnArr3 = array(), $whereInArray3 = array('magency_id'=> $total_agent[$j][6]));
							} else if (empty($total_agent[$j][6])) {
								$add_agent_arr[$i] = array(
									'name' => $total_agent[$j][0],
									'code' => $total_agent[$j][1],
									'link' => $total_agent[$j][2],
									'username' => $total_agent[$j][3],
									'password' => $total_agent[$j][4],
									'magency_status' => $total_agent[$j][5],
									'fk_mcompany_id' => $company_id,
									'create_date' => $create_date
								);
								$query3 = $this->Mquery_model_v3->addQuery($tableName3 = "master_agency", $add_agent_arr, $return_type3 = "lastID");
							}
						}
					}
					// print_r($update_company_arr);
					// print_r($update_employee_arr);
					// print_r($add_employee_arr);
					// print_r($update_agent_arr);
					// print_r($add_agent_arr);
					// die("Test 123");
					
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
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_member", $colNames = "master_member.mmember_id , master_member.name as member_name, master_member.contact1, master_member.contact2, master_member.email1, master_member.email2, master_member.designation,master_member.department,master_member.del_flag as member_del_flag,master_member.mmember_status,master_member.fk_mcompany_id", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_member.mmember_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
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

	public function get_company_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$joins_main[] = array("tbl" => "master_agency", "condtn" => "master_company.mcompany_id = master_agency.fk_mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_member", "condtn" => "master_company.mcompany_id = master_member.fk_mcompany_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name, master_company.company_status, master_company.common_email, master_company.address, master_company.city, master_company.zipcode, master_company.state , master_company.office_contact, master_company.website, master_company.tollfree_no_1, master_company.tollfree_no_2, master_company.cheque_name, master_company.courier_address, master_company.account_holder_name, master_company.account_number , master_company.bank_name, master_company.branch_name, master_company.ifsc_code, master_company.micr_code,master_company.account_holder_name_1, master_company.account_number_1 , master_company.bank_name_1, master_company.branch_name_1, master_company.ifsc_code_1, master_company.micr_code_1, master_company.payment_link, master_company.payment_steps,master_company.del_flag as company_del_flag   , master_agency.magency_id , master_agency.code, master_agency.name as agent_name, master_agency.link, master_agency.username, master_agency.password, master_agency.magency_status,master_agency.del_flag as agent_del_flag   , master_member.mmember_id , master_member.name as member_name, master_member.contact1, master_member.contact2, master_member.email1, master_member.email2, master_member.designation,master_member.department,master_member.del_flag as member_del_flag,master_member.mmember_status", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("master_company.mcompany_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
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
	// Staff Section End





}
