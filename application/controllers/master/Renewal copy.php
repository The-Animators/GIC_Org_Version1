<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Renewal extends Admin_gic_core
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
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "date_picker", "tagsinput");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "date_picker", "tagsinput");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$this->data["title"] = $title = "Renew Policy";
	}
// Renewal Section Start
	public function edit_premium()
	{
		$validator = array('status' => false, 'messages' => array());
		$policy_id = $this->input->post("policy_id");

		if ($policy_id != "") {
			$whereArr["policy_member_details_dump.policy_id "] = $policy_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details_dump", $colNames =  "policy_member_details_dump.policy_id , policy_member_details_dump.basic_sum_insured, policy_member_details_dump.basic_gross_premium, policy_member_details_dump.renewal_letter_premium_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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

	public function update_premium()
	{
		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('basic_sum_insured', 'Total Sum Insured', 'trim|required');
		$this->form_validation->set_rules('basic_gross_premium', 'Total Premium', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"basic_sum_insured_err" => form_error("basic_sum_insured"),
				"basic_gross_premium_err" => form_error("basic_gross_premium"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$policy_id = $this->security->xss_clean($this->input->post('policy_id'));
				$basic_sum_insured = $this->security->xss_clean($this->input->post('basic_sum_insured'));
				$basic_gross_premium = $this->security->xss_clean($this->input->post('basic_gross_premium'));

				$updateArr[] = array(
					'policy_id' => $policy_id,
					'basic_sum_insured' => $basic_sum_insured,
					'basic_gross_premium' => $basic_gross_premium,
					'renewal_letter_premium_flag' => 1,
					'renewal_letter_premium_date' => date("Y-m-d"),
					'modify_dt' => date("Y-m-d h:i:s")
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "policy_member_details_dump", $updateArr, $updateKey = "policy_id", $whereArr = array("policy_id", $policy_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Premium is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function index()
	{
		$this->data["title"] = $title = "Renewal";
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

		$this->data["main_page"] = "master/renewal/renewal";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function index2()
	{
		$this->data["title"] = $title = "Renewal";
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

		$this->data["main_page"] = "master/renewal/renewal_dump";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}





	public function renewpolicy()
	{
		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('serial_no_year', 'Sr No. Year', 'trim|required');
		$this->form_validation->set_rules('serial_no_month', 'Sr No. Month', 'trim|required');
		$this->form_validation->set_rules('serial_no', 'Sr No.', 'trim|required');
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('agency_code', 'Agency Code', 'trim|required');
		$this->form_validation->set_rules('sub_agency_code', 'Sub-Agency Code', 'trim|required');
		$this->form_validation->set_rules('mode_of_premimum', 'Mode Of Premium', 'trim|required');
		$this->form_validation->set_rules('date_from', 'Date From', 'trim|required');
		$this->form_validation->set_rules('date_to', 'Date To', 'trim|required');
		$this->form_validation->set_rules('payment_date_from', 'Payment Date From', 'trim');
		$this->form_validation->set_rules('payment_date_to', 'Payment Date To', 'trim');

		$this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
		$this->form_validation->set_rules('policy_holder_name', 'Policy Holder Name', 'trim|required');
		$this->form_validation->set_rules('date_commenced', 'Date Commenced', 'trim|required');
		$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|callback_check_policy_no_isexist');

		if (!empty($_FILES["policy_upload"])) {
			$policy_upload = $_FILES['policy_upload']['name'];

			if (!empty($policy_upload))
				$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|required|callback_check_policy_no|callback_check_policy_no_isexist');
			else {
				$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|callback_check_policy_no_isexist');
			}
		}

		// if (!empty($this->input->post("policy_no")))
		// 	$this->form_validation->set_rules('policy_upload', 'Policy Upload', 'trim|callback_check_policy_upload');
		// else
		$this->form_validation->set_rules('policy_upload', 'Policy Upload', 'trim');

		$this->form_validation->set_rules('reg_mobile', 'Registered Mobile No.', 'trim|required|min_length[10]|max_length[12]');
		$this->form_validation->set_rules('reg_email', 'Registered Email Id', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"serial_no_year_err" => form_error("serial_no_year"),
				"serial_no_month_err" => form_error("serial_no_month"),
				"serial_no_err" => form_error("serial_no"),
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"agency_code_err" => form_error("agency_code"),
				"sub_agency_code_err" => form_error("sub_agency_code"),
				"mode_of_premimum_err" => form_error("mode_of_premimum"),
				"date_from_err" => form_error("date_from"),
				"date_to_err" => form_error("date_to"),
				"payment_date_from_err" => form_error("payment_date_from"),
				"payment_date_to_err" => form_error("payment_date_to"),
				"policy_no_err" => form_error("policy_no"),
				"group_name_err" => form_error("group_name"),
				"policy_holder_name_err" => form_error("policy_holder_name"),
				"date_commenced_err" => form_error("date_commenced"),
				"policy_upload_err" => form_error("policy_upload"),
				"reg_mobile_err" => form_error("reg_mobile"),
				"reg_email_err" => form_error("reg_email"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction
			if ($this->input->post() != "") {
				$current_sum_insured = 0;
				$current_total_premium = 0;
				$serial_no_year = $this->security->xss_clean($this->input->post('serial_no_year'));
				$serial_no_month = $this->security->xss_clean($this->input->post('serial_no_month'));
				$serial_no = $this->security->xss_clean($this->input->post('serial_no'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$company_txt = $this->security->xss_clean($this->input->post('company_txt'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));
				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				$agency_code = $this->security->xss_clean($this->input->post('agency_code'));
				$sub_agency_code = $this->security->xss_clean($this->input->post('sub_agency_code'));
				$mode_of_premimum = $this->security->xss_clean($this->input->post('mode_of_premimum'));
				$date_from = $this->security->xss_clean($this->input->post('date_from'));
				$policy_id = $this->security->xss_clean($this->input->post('policy_id'));

				$fetch_whereArr["master_plans_policy.fk_mcompany_id"] = $company;
				$fetch_whereArr["master_plans_policy.fk_department_id"] = $department;
				$fetch_whereArr["master_plans_policy.fk_policy_type_id"] = $policy_name;
				$fetch_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames = "master_plans_policy.plans_policy_id , master_plans_policy.comission_percentage", $whereArr = $fetch_whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$fetch_commission_result = $fetch_query["userData"];
				$comission_percentage = $fetch_commission_result["comission_percentage"];

				if (empty($comission_percentage))
					$comission_percentage = 0;

				$fetch_policy_member_details_dump_whereArr["policy_member_details_dump.policy_id"] = $policy_id;
				$fetch_policy_member_details_dump_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details_dump", $colNames = "policy_member_details_dump.policy_id , policy_member_details_dump.renewal_flag, policy_member_details_dump.renewal_count, policy_member_details_dump.commission_flag, policy_member_details_dump.endorsment_flag, policy_member_details_dump.claims_flag, policy_member_details_dump.next_year_premium_flag, policy_member_details_dump.renewal_count, policy_member_details_dump.claims_count, policy_member_details_dump.endorsment_count, policy_member_details_dump.commission_count", $whereArr = $fetch_whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$fetch_policy_member_details_dump_result = $fetch_query["userData"];
				$renewal_count_data = $fetch_policy_member_details_dump_result["renewal_count"];

				$renewal_count = 0;
				if(!empty($renewal_count_data)){
					if($renewal_count_data == 0)
						$renewal_count = 0 + 1;
					else
						$renewal_count = $renewal_count_data + 1;
				}

				$date_to = $this->security->xss_clean($this->input->post('date_to'));
				$payment_date_from = $this->security->xss_clean($this->input->post('payment_date_from'));
				$payment_date_to = $this->security->xss_clean($this->input->post('payment_date_to'));
				$policy_no = $this->security->xss_clean($this->input->post('policy_no'));
				$pre_year_policy_no = $this->security->xss_clean($this->input->post('pre_year_policy_no'));
				$group_name = $this->security->xss_clean($this->input->post('group_name'));
				$policy_holder_name = $this->security->xss_clean($this->input->post('policy_holder_name'));
				$date_commenced = $this->security->xss_clean($this->input->post('date_commenced'));
				$reg_mobile = $this->security->xss_clean($this->input->post('reg_mobile'));
				$reg_email = $this->security->xss_clean($this->input->post('reg_email'));
				$policy_counter_no = $this->security->xss_clean($this->input->post('policy_counter_no'));

				$riv = $this->security->xss_clean($this->input->post('riv'));
				$type_of_bussiness = $this->security->xss_clean($this->input->post('type_of_bussiness'));
				$description_of_stock = $this->security->xss_clean($this->input->post('description_of_stock'));

				$quotation_date = $this->security->xss_clean($this->input->post('quotation_date'));
				$quotation_male_link = $this->security->xss_clean($this->input->post('quotation_male_link'));
				$member_name_arr = $this->security->xss_clean($this->input->post('member_name_arr'));
				$total_basic_sum_insured = $this->security->xss_clean($this->input->post('total_basic_sum_insured'));
				$current_sum_insured = $total_basic_sum_insured;

				$policy_type_txt = "";
				if ($policy_type == 2)
					$policy_type_txt = "Floater";
				elseif ($policy_type == 1)
					$policy_type_txt = "Individual";
				elseif ($policy_type == 3)
					$policy_type_txt = "Residential & Commercial";
				elseif ($policy_type == 4)
					$policy_type_txt = "Common Individual";
				elseif ($policy_type == 5)
					$policy_type_txt = "Common Floater";

				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") {
					$family_size = $this->security->xss_clean($this->input->post('family_size'));
					$addition_of_more_child = $this->security->xss_clean($this->input->post('addition_of_more_child'));
				} else {
					$family_size = "";
					$addition_of_more_child = "";
				}
				$tpa_company = "";
				$restore_cover = "";
				$maternity_new_born_baby_cover = "";
				$daily_cash_allowance_cover = "";
				$floater_policy_type = "";

				// Calculation Section Start

				$total_sum_assured = $this->security->xss_clean($this->input->post('total_sum_assured'));
				$fire_rate_per = $this->security->xss_clean($this->input->post('fire_rate_per'));
				$fire_rate_tot = $this->security->xss_clean($this->input->post('fire_rate_tot'));
				$less_discount_per = $this->security->xss_clean($this->input->post('less_discount_per'));
				$less_discount_tot = $this->security->xss_clean($this->input->post('less_discount_tot'));
				$fire_rate_after_discount_tot = $this->security->xss_clean($this->input->post('fire_rate_after_discount_tot'));
				$gross_premium = $this->security->xss_clean($this->input->post('gross_premium'));
				$cgst_fire_per = $this->security->xss_clean($this->input->post('cgst_fire_per'));
				$cgst_fire_tot = $this->security->xss_clean($this->input->post('cgst_fire_tot'));
				$sgst_fire_per = $this->security->xss_clean($this->input->post('sgst_fire_per'));
				$sgst_fire_tot = $this->security->xss_clean($this->input->post('sgst_fire_tot'));
				$final_paybal_premium = $this->security->xss_clean($this->input->post('final_paybal_premium'));
				if ($policy_name_txt == "Bharat Griha Raksha" || $policy_name_txt == "Bharat Laghu Udyam" || $policy_name_txt == "Bharat Sookshma Udyam" || $policy_name_txt == "Standard Fire & Allied Perils") {
					$current_sum_insured = $total_sum_assured;
					$current_total_premium = $final_paybal_premium;
				}
				// if ($policy_name_txt == "Standard Fire & Allied Perils") {
				$stfi_rate_per = $this->security->xss_clean($this->input->post('stfi_rate_per'));
				$stfi_rate_total = $this->security->xss_clean($this->input->post('stfi_rate_total'));
				$earthquake_rate_per = $this->security->xss_clean($this->input->post('earthquake_rate_per'));
				$earthquake_rate_total = $this->security->xss_clean($this->input->post('earthquake_rate_total'));
				$terrorisum_rate_per = $this->security->xss_clean($this->input->post('terrorisum_rate_per'));
				$terrorisum_rate_total = $this->security->xss_clean($this->input->post('terrorisum_rate_total'));
				$tot_sum_devid = $this->security->xss_clean($this->input->post('tot_sum_devid'));
				// }
				// Calculation Section End


				if ($policy_name_txt == "Term Plan") {
					$policy_term = $this->security->xss_clean($this->input->post('policy_term'));
					$premium_paying_term = $this->security->xss_clean($this->input->post('premium_paying_term'));
					$sum_insured = $this->security->xss_clean($this->input->post('sum_insured'));
					$basic_premium = $this->security->xss_clean($this->input->post('basic_premium'));
					$add_loading = $this->security->xss_clean($this->input->post('add_loading'));
					$loading_description = $this->security->xss_clean($this->input->post('loading_description'));
					$premium_after_loading = $this->security->xss_clean($this->input->post('premium_after_loading'));
					$cgst_term_plan = $this->security->xss_clean($this->input->post('cgst_term_plan'));
					$sgst_term_plan = $this->security->xss_clean($this->input->post('sgst_term_plan'));
					$cgst_term_plan_tot = $this->security->xss_clean($this->input->post('cgst_term_plan_tot'));
					$sgst_term_plan_tot = $this->security->xss_clean($this->input->post('sgst_term_plan_tot'));
					$term_plan_final_paybal_premium = $this->security->xss_clean($this->input->post('term_plan_final_paybal_premium'));
					$current_sum_insured = $sum_insured;
					$current_total_premium = $term_plan_final_paybal_premium;
				}

				if ($policy_name_txt == "Shopkeeper") {
					// Srction 1
					$shopkeeper_risk_address = $this->security->xss_clean($this->input->post('shopkeeper_risk_address'));
					$fire_sum_insured_1 = $this->security->xss_clean($this->input->post('fire_sum_insured_1'));
					$fire_sum_insured_2 = $this->security->xss_clean($this->input->post('fire_sum_insured_2'));
					$fire_sum_insured_3 = $this->security->xss_clean($this->input->post('fire_sum_insured_3'));
					$fire_rate_1 = $this->security->xss_clean($this->input->post('fire_rate_1'));
					$fire_rate_2 = $this->security->xss_clean($this->input->post('fire_rate_2'));
					$fire_rate_3 = $this->security->xss_clean($this->input->post('fire_rate_3'));
					$fire_premium_1 = $this->security->xss_clean($this->input->post('fire_premium_1'));
					$fire_premium_2 = $this->security->xss_clean($this->input->post('fire_premium_2'));
					$fire_premium_3 = $this->security->xss_clean($this->input->post('fire_premium_3'));

					// Section 2
					$burglary_sum_insured_1 = $this->security->xss_clean($this->input->post('burglary_sum_insured_1'));
					$burglary_sum_insured_2 = $this->security->xss_clean($this->input->post('burglary_sum_insured_2'));
					$burglary_sum_insured_3 = $this->security->xss_clean($this->input->post('burglary_sum_insured_3'));
					$burglary_rate_1 = $this->security->xss_clean($this->input->post('burglary_rate_1'));
					$burglary_rate_2 = $this->security->xss_clean($this->input->post('burglary_rate_2'));
					$burglary_rate_3 = $this->security->xss_clean($this->input->post('burglary_rate_3'));
					$burglary_premium_1 = $this->security->xss_clean($this->input->post('burglary_premium_1'));
					$burglary_premium_2 = $this->security->xss_clean($this->input->post('burglary_premium_2'));
					$burglary_premium_3 = $this->security->xss_clean($this->input->post('burglary_premium_3'));

					// Section 3
					$money_insu_sum_insured_1 = $this->security->xss_clean($this->input->post('money_insu_sum_insured_1'));
					$money_insu_sum_insured_2 = $this->security->xss_clean($this->input->post('money_insu_sum_insured_2'));
					$money_insu_sum_insured_3 = $this->security->xss_clean($this->input->post('money_insu_sum_insured_3'));
					$money_insu_rate_1 = $this->security->xss_clean($this->input->post('money_insu_rate_1'));
					$money_insu_rate_2 = $this->security->xss_clean($this->input->post('money_insu_rate_2'));
					$money_insu_rate_3 = $this->security->xss_clean($this->input->post('money_insu_rate_3'));
					$money_insu_premium_1 = $this->security->xss_clean($this->input->post('money_insu_premium_1'));
					$money_insu_premium_2 = $this->security->xss_clean($this->input->post('money_insu_premium_2'));
					$money_insu_premium_3 = $this->security->xss_clean($this->input->post('money_insu_premium_3'));

					// Section 5
					$plate_glass_sum_insured = $this->security->xss_clean($this->input->post('plate_glass_sum_insured'));
					$plate_glass_rate_per = $this->security->xss_clean($this->input->post('plate_glass_rate_per'));
					$plate_glass_premium = $this->security->xss_clean($this->input->post('plate_glass_premium'));

					// Section 6
					$neon_glow_sum_insured = $this->security->xss_clean($this->input->post('neon_glow_sum_insured'));
					$neon_glow_rate_per = $this->security->xss_clean($this->input->post('neon_glow_rate_per'));
					$neon_glow_premium = $this->security->xss_clean($this->input->post('neon_glow_premium'));

					// Section 7
					$baggage_ins_sum_insured = $this->security->xss_clean($this->input->post('baggage_ins_sum_insured'));
					$baggage_ins_rate_per = $this->security->xss_clean($this->input->post('baggage_ins_rate_per'));
					$baggage_ins_premium = $this->security->xss_clean($this->input->post('baggage_ins_premium'));

					// Section 8
					$personal_accident_sum_insured = $this->security->xss_clean($this->input->post('personal_accident_sum_insured'));
					$personal_accident_rate_per = $this->security->xss_clean($this->input->post('personal_accident_rate_per'));
					$personal_accident_premium = $this->security->xss_clean($this->input->post('personal_accident_premium'));
					$total_personal_accident = $this->security->xss_clean($this->input->post('total_personal_accident'));

					// Section 9
					$fidelity_gaur_sum_insured = $this->security->xss_clean($this->input->post('fidelity_gaur_sum_insured'));
					$fidelity_gaur_rate_per = $this->security->xss_clean($this->input->post('fidelity_gaur_rate_per'));
					$fidelity_gaur_premium = $this->security->xss_clean($this->input->post('fidelity_gaur_premium'));
					$total_fidelity_gaur = $this->security->xss_clean($this->input->post('total_fidelity_gaur'));

					// Section 10
					$pub_libility_sum_insured = $this->security->xss_clean($this->input->post('pub_libility_sum_insured'));
					$work_men_compens_sum_insured = $this->security->xss_clean($this->input->post('work_men_compens_sum_insured'));
					$pub_libility_rate = $this->security->xss_clean($this->input->post('pub_libility_rate'));
					$work_men_compens_rate = $this->security->xss_clean($this->input->post('work_men_compens_rate'));
					$pub_libility_premium = $this->security->xss_clean($this->input->post('pub_libility_premium'));
					$work_men_compens_premium = $this->security->xss_clean($this->input->post('work_men_compens_premium'));

					// Section 11
					$bus_inter_sum_insured_1 = $this->security->xss_clean($this->input->post('bus_inter_sum_insured_1'));
					$bus_inter_sum_insured_2 = $this->security->xss_clean($this->input->post('bus_inter_sum_insured_2'));
					$bus_inter_sum_insured_3 = $this->security->xss_clean($this->input->post('bus_inter_sum_insured_3'));
					$bus_inter_rate_1 = $this->security->xss_clean($this->input->post('bus_inter_rate_1'));
					$bus_inter_rate_2 = $this->security->xss_clean($this->input->post('bus_inter_rate_2'));
					$bus_inter_rate_3 = $this->security->xss_clean($this->input->post('bus_inter_rate_3'));
					$bus_inter_premium_1 = $this->security->xss_clean($this->input->post('bus_inter_premium_1'));
					$bus_inter_premium_2 = $this->security->xss_clean($this->input->post('bus_inter_premium_2'));
					$bus_inter_premium_3 = $this->security->xss_clean($this->input->post('bus_inter_premium_3'));

					$shopkeeper_total_sum_assured = $this->security->xss_clean($this->input->post('shopkeeper_total_sum_assured'));
					$shopkeeper_total_premium = $this->security->xss_clean($this->input->post('shopkeeper_total_premium'));
					$shopkeeper_less_discount_per = $this->security->xss_clean($this->input->post('shopkeeper_less_discount_per'));
					$shopkeeper_less_discount_tot = $this->security->xss_clean($this->input->post('shopkeeper_less_discount_tot'));
					$shopkeeper_fire_rate_after_discount_tot = $this->security->xss_clean($this->input->post('shopkeeper_fire_rate_after_discount_tot'));
					$shopkeeper_cgst_fire_per = $this->security->xss_clean($this->input->post('shopkeeper_cgst_fire_per'));
					$shopkeeper_cgst_fire_tot = $this->security->xss_clean($this->input->post('shopkeeper_cgst_fire_tot'));
					$shopkeeper_sgst_fire_per = $this->security->xss_clean($this->input->post('shopkeeper_sgst_fire_per'));
					$shopkeeper_sgst_fire_tot = $this->security->xss_clean($this->input->post('shopkeeper_sgst_fire_tot'));
					$shopkeeper_final_paybal_premium = $this->security->xss_clean($this->input->post('shopkeeper_final_paybal_premium'));

					$current_sum_insured = $shopkeeper_total_sum_assured;
					$current_total_premium = $shopkeeper_final_paybal_premium;
				}

				if ($policy_name_txt == "Jweller Block") {
					// Srction 1
					$stock_premises_sum_insu_1 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_1'));
					$stock_premises_sum_insu_2 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_2'));
					$stock_premises_sum_insu_3 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_3'));
					$stock_premises_sum_insu_4 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_4'));
					$stock_premises_sum_insu_5 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_5'));
					$stock_premises_sum_insu_6 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_6'));
					$stock_premises_premium_1 = $this->security->xss_clean($this->input->post('stock_premises_premium_1'));
					$stock_premises_premium_2 = $this->security->xss_clean($this->input->post('stock_premises_premium_2'));

					// Section 2
					$stock_custody_sum_insu_1 = $this->security->xss_clean($this->input->post('stock_custody_sum_insu_1'));
					$stock_custody_sum_insu_2 = $this->security->xss_clean($this->input->post('stock_custody_sum_insu_2'));
					$stock_custody_sum_insu_3 = $this->security->xss_clean($this->input->post('stock_custody_sum_insu_3'));
					$stock_custody_sum_insu_4 = $this->security->xss_clean($this->input->post('stock_custody_sum_insu_4'));
					$stock_custody_premium_1 = $this->security->xss_clean($this->input->post('stock_custody_premium_1'));
					$stock_custody_premium_2 = $this->security->xss_clean($this->input->post('stock_custody_premium_2'));

					// Section 3
					$stock_transit_sum_insu_1 = $this->security->xss_clean($this->input->post('stock_transit_sum_insu_1'));
					$stock_transit_sum_insu_2 = $this->security->xss_clean($this->input->post('stock_transit_sum_insu_2'));
					$stock_transit_sum_insu_3 = $this->security->xss_clean($this->input->post('stock_transit_sum_insu_3'));
					$stock_transit_sum_insu_4 = $this->security->xss_clean($this->input->post('stock_transit_sum_insu_4'));
					$stock_transit_premium = $this->security->xss_clean($this->input->post('stock_transit_premium'));

					// Section 4A
					$standard_fire_perils_1 = $this->security->xss_clean($this->input->post('standard_fire_perils_1'));
					$standard_fire_perils_2 = $this->security->xss_clean($this->input->post('standard_fire_perils_2'));
					$standard_fire_perils_3 = $this->security->xss_clean($this->input->post('standard_fire_perils_3'));
					$standard_fire_perils_4 = $this->security->xss_clean($this->input->post('standard_fire_perils_4'));
					$standard_fire_perils_5 = $this->security->xss_clean($this->input->post('standard_fire_perils_5'));
					$standard_fire_perils_6 = $this->security->xss_clean($this->input->post('standard_fire_perils_6'));
					$standard_fire_perils_premium_1 = $this->security->xss_clean($this->input->post('standard_fire_perils_premium_1'));
					$standard_fire_perils_premium_2 = $this->security->xss_clean($this->input->post('standard_fire_perils_premium_2'));
					$standard_fire_perils_premium_3 = $this->security->xss_clean($this->input->post('standard_fire_perils_premium_3'));

					// Section 4B
					$content_burglary_sum_insu = $this->security->xss_clean($this->input->post('content_burglary_sum_insu'));
					$content_burglary_premium = $this->security->xss_clean($this->input->post('content_burglary_premium'));

					// Section 5
					$stock_exhibition_sum_insu = $this->security->xss_clean($this->input->post('stock_exhibition_sum_insu'));
					$stock_exhibition_premium = $this->security->xss_clean($this->input->post('stock_exhibition_premium'));

					// Section 6
					$fidelity_guar_cover_sum_insu_1 = $this->security->xss_clean($this->input->post('fidelity_guar_cover_sum_insu_1'));
					$fidelity_guar_cover_premium_1 = $this->security->xss_clean($this->input->post('fidelity_guar_cover_premium_1'));
					$total_fidelity_guar_cover = $this->security->xss_clean($this->input->post('total_fidelity_guar_cover'));

					// Section 7
					$plate_glass_sum_insu = $this->security->xss_clean($this->input->post('plate_glass_sum_insu'));
					$jweller_plate_glass_premium = $this->security->xss_clean($this->input->post('plate_glass_premium'));

					// Section 8
					$neon_sign_sum_insu = $this->security->xss_clean($this->input->post('neon_sign_sum_insu'));
					$neon_sign_premium = $this->security->xss_clean($this->input->post('neon_sign_premium'));

					// Section 9
					$portable_equipmets_sum_insu = $this->security->xss_clean($this->input->post('portable_equipmets_sum_insu'));
					$portable_equipmets_premium = $this->security->xss_clean($this->input->post('portable_equipmets_premium'));

					// Section 10
					$employee_compensation_sum_insu_1 = $this->security->xss_clean($this->input->post('employee_compensation_sum_insu_1'));
					$employee_compensation_sum_insu_2 = $this->security->xss_clean($this->input->post('employee_compensation_sum_insu_2'));
					$employee_compensation_premium = $this->security->xss_clean($this->input->post('employee_compensation_premium'));

					// Section 11
					$electronic_equipment_sum_insu = $this->security->xss_clean($this->input->post('electronic_equipment_sum_insu'));
					$electronic_equipment_premium = $this->security->xss_clean($this->input->post('electronic_equipment_premium'));
					// Section 12
					$public_liability_sum_insu = $this->security->xss_clean($this->input->post('public_liability_sum_insu'));
					$public_liability_premium = $this->security->xss_clean($this->input->post('public_liability_premium'));
					// Section 13
					$money_transit_sum_insu = $this->security->xss_clean($this->input->post('money_transit_sum_insu'));
					$money_transit_premium = $this->security->xss_clean($this->input->post('money_transit_premium'));
					// Section 14
					$machinery_breakdown_sum_insu = $this->security->xss_clean($this->input->post('machinery_breakdown_sum_insu'));
					$machinery_breakdown_premium = $this->security->xss_clean($this->input->post('machinery_breakdown_premium'));

					$jweller_less_discount = $this->security->xss_clean($this->input->post('jweller_less_discount'));
					$jweller_total_sum_assured = $this->security->xss_clean($this->input->post('jweller_total_sum_assured'));
					$jweller_less_discount_tot = $this->security->xss_clean($this->input->post('jweller_less_discount_tot'));
					$jweller_after_discount_tot = $this->security->xss_clean($this->input->post('jweller_after_discount_tot'));
					$jweller_terrorism_per = $this->security->xss_clean($this->input->post('jweller_terrorism_per'));
					$jweller_terrorism_per_tot = $this->security->xss_clean($this->input->post('jweller_terrorism_per_tot'));
					$jweller_tot_net_premium = $this->security->xss_clean($this->input->post('jweller_tot_net_premium'));
					$jweller_cgst_per = $this->security->xss_clean($this->input->post('jweller_cgst_per'));
					$jweller_sgst_per = $this->security->xss_clean($this->input->post('jweller_sgst_per'));
					$jweller_cgst_per_tot = $this->security->xss_clean($this->input->post('jweller_cgst_per_tot'));
					$jweller_sgst_per_tot = $this->security->xss_clean($this->input->post('jweller_sgst_per_tot'));
					$jweller_final_payble = $this->security->xss_clean($this->input->post('jweller_final_payble'));

					$current_sum_insured = $jweller_total_sum_assured;
					$current_total_premium = $jweller_final_payble;
				}

				if ($policy_name_txt == "Open Policy" || $policy_name_txt == "Stop Policy" || $policy_name_txt == "Specific Policy") {
					if ($policy_name_txt == "Open Policy" || $policy_name_txt == "Stop Policy") {
						$from_destination = "";
						$to_destination = "";
						$rate_applied_per = $this->security->xss_clean($this->input->post('rate_applied_per'));
						$rate_applied_hidden = $this->security->xss_clean($this->input->post('rate_applied_hidden'));
					} elseif ($policy_name_txt == "Specific Policy") {
						$from_destination = $this->security->xss_clean($this->input->post('from_destination'));
						$to_destination = $this->security->xss_clean($this->input->post('to_destination'));
						$rate_applied_per = $this->security->xss_clean($this->input->post('rate_applied_per'));
						$rate_applied_hidden = $this->security->xss_clean($this->input->post('rate_applied_hidden'));
					}
					$coverage_type = $this->security->xss_clean($this->input->post('coverage_type'));
					$marine_description = $this->security->xss_clean($this->input->post('marine_description'));
					$interest_insured = $this->security->xss_clean($this->input->post('interest_insured'));
					$group_name_address = $this->security->xss_clean($this->input->post('group_name_address'));
					$marine_sum_insured = $this->security->xss_clean($this->input->post('marine_sum_insured'));
					$packing_stand_customary = $this->security->xss_clean($this->input->post('packing_stand_customary'));
					$total_marine_cc = $this->security->xss_clean($this->input->post('total_marine_cc'));
					$business_description = $this->security->xss_clean($this->input->post('business_description'));
					$voyage_domestic_purchase = $this->security->xss_clean($this->input->post('voyage_domestic_purchase'));
					$voyage_international_purchase = $this->security->xss_clean($this->input->post('voyage_international_purchase'));

					$voyage_domestic_sales = $this->security->xss_clean($this->input->post('voyage_domestic_sales'));
					$voyage_export_sales = $this->security->xss_clean($this->input->post('voyage_export_sales'));
					$voyage_job_worker = $this->security->xss_clean($this->input->post('voyage_job_worker'));
					$voyage_domestic_fini_good = $this->security->xss_clean($this->input->post('voyage_domestic_fini_good'));
					$voyage_export_fini_good = $this->security->xss_clean($this->input->post('voyage_export_fini_good'));
					$voyage_domestic_purch_return = $this->security->xss_clean($this->input->post('voyage_domestic_purch_return'));
					$voyage_export_purch_return = $this->security->xss_clean($this->input->post('voyage_export_purch_return'));
					$voyage_sales_return = $this->security->xss_clean($this->input->post('voyage_sales_return'));

					$domestic_purch = $this->security->xss_clean($this->input->post('domestic_purch'));
					$international_purch = $this->security->xss_clean($this->input->post('international_purch'));
					$domestic_sale = $this->security->xss_clean($this->input->post('domestic_sale'));
					$export_sale = $this->security->xss_clean($this->input->post('export_sale'));
					$per_bottom_limit = $this->security->xss_clean($this->input->post('per_bottom_limit'));
					$per_location_limit = $this->security->xss_clean($this->input->post('per_location_limit'));
					$per_claim_excess = $this->security->xss_clean($this->input->post('per_claim_excess'));
					$declaration_sale_fig = $this->security->xss_clean($this->input->post('declaration_sale_fig'));

					$annual_turn_over = $this->security->xss_clean($this->input->post('annual_turn_over'));
					$tot_sum_insured = $this->security->xss_clean($this->input->post('tot_sum_insured'));
					$rate_applied = $this->security->xss_clean($this->input->post('rate_applied'));
					$marine_cgst_per = $this->security->xss_clean($this->input->post('marine_cgst_per'));
					$marine_sgst_per = $this->security->xss_clean($this->input->post('marine_sgst_per'));
					$cgst_rate_tot = $this->security->xss_clean($this->input->post('cgst_rate_tot'));
					$sgst_rate_tot = $this->security->xss_clean($this->input->post('sgst_rate_tot'));
					$marine_final_payble_premium = $this->security->xss_clean($this->input->post('marine_final_payble_premium'));
					$current_sum_insured = $tot_sum_insured;
					$current_total_premium = $marine_final_payble_premium;
				}

				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Individual") {
					$floater_policy_type = $this->security->xss_clean($this->input->post('floater_policy_type'));
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					if ($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") {
						if ($floater_policy_type == "Optima Restore") {
							$total_medi_ind_hdfc_json_data = $this->security->xss_clean($this->input->post('total_medi_ind_hdfc_json_data'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$protect_ride_prem_tot = $this->security->xss_clean($this->input->post('protect_ride_prem_tot'));
							$hospital_daily_cash_prem_tot = $this->security->xss_clean($this->input->post('hospital_daily_cash_prem_tot'));
							$ipa_rider_prem_tot = $this->security->xss_clean($this->input->post('ipa_rider_prem_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$family_disc_per = $this->security->xss_clean($this->input->post('family_disc_per'));
							$family_disc_tot = $this->security->xss_clean($this->input->post('family_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Energy") {
							$total_energy_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_energy_medi_hdfc_json_data'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Health Suraksha") {
							$total_suraksha_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_suraksha_medi_hdfc_json_data'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$family_disc_per = $this->security->xss_clean($this->input->post('family_disc_per'));
							$family_disc_tot = $this->security->xss_clean($this->input->post('family_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Easy Health") {
							$total_easy_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_easy_medi_hdfc_json_data'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$protect_ride_prem_tot = $this->security->xss_clean($this->input->post('protect_ride_prem_tot'));
							$hospital_daily_cash_prem_tot = $this->security->xss_clean($this->input->post('hospital_daily_cash_prem_tot'));
							$ipa_rider_prem_tot = $this->security->xss_clean($this->input->post('ipa_rider_prem_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$family_disc_per = $this->security->xss_clean($this->input->post('family_disc_per'));
							$family_disc_tot = $this->security->xss_clean($this->input->post('family_disc_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$tot_basic_prem = $this->security->xss_clean($this->input->post('tot_basic_prem'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "The New India Assurance Co Ltd") {
						if ($floater_policy_type == "New India Mediclaim Policy 2017") {
							$total_the_new_india_medi_tns_hdfc_json_data = $this->security->xss_clean($this->input->post('total_the_new_india_medi_tns_hdfc_json_data'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "Max Bupa Health Insurance Co Ltd") {
						if ($floater_policy_type == "Reassure") {
							$total_max_bupa_medi_reassure_json_data = $this->security->xss_clean($this->input->post('total_max_bupa_medi_reassure_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$first_year_rate = $this->security->xss_clean($this->input->post('first_year_rate'));
							$second_year_rate = $this->security->xss_clean($this->input->post('second_year_rate'));
							$third_year_rate = $this->security->xss_clean($this->input->post('third_year_rate'));
							$first_year_tot = $this->security->xss_clean($this->input->post('first_year_tot'));
							$second_year_tot = $this->security->xss_clean($this->input->post('second_year_tot'));
							$third_year_tot = $this->security->xss_clean($this->input->post('third_year_tot'));
							$tot_term_disc = $this->security->xss_clean($this->input->post('tot_term_disc'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$stand_instu_rate = $this->security->xss_clean($this->input->post('stand_instu_rate'));
							$stand_instu_tot = $this->security->xss_clean($this->input->post('stand_instu_tot'));
							$doctor_disc_per = $this->security->xss_clean($this->input->post('doctor_disc_per'));
							$doctor_disc_tot = $this->security->xss_clean($this->input->post('doctor_disc_tot'));
							$family_disc_per = $this->security->xss_clean($this->input->post('family_disc_per'));
							$family_disc_tot = $this->security->xss_clean($this->input->post('family_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));

							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
						if ($floater_policy_type == "Red Carpet") {
							$total_star_health_red_carpet_medi_ind_json_data = $this->security->xss_clean($this->input->post('total_star_health_red_carpet_medi_ind_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						} else if ($floater_policy_type == "Comprehensive") {
							$total_star_health_comprehensive_medi_ind_json_data = $this->security->xss_clean($this->input->post('total_star_health_comprehensive_medi_ind_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "United India Insurance Co Ltd") {
						if ($floater_policy_type == "Individual Health Insurance Policy") {
							$total_mediclaim = $this->security->xss_clean($this->input->post('total_mediclaim'));
							$medi_total_ncd_amount = $this->security->xss_clean($this->input->post('medi_total_ncd_amount'));
							$medi_total_amount = $this->security->xss_clean($this->input->post('medi_total_amount'));
							$medi_family_disc_rate = $this->security->xss_clean($this->input->post('medi_family_disc_rate'));
							$medi_family_disc_tot = $this->security->xss_clean($this->input->post('medi_family_disc_tot'));
							$medi_premium_after_fd = $this->security->xss_clean($this->input->post('medi_premium_after_fd'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Floater 2020(Individual)") {
							$total_mediclaim_indi2020 = $this->security->xss_clean($this->input->post('total_mediclaim_indi2020'));
							$medi_ind_2020_total_premium = $this->security->xss_clean($this->input->post('medi_ind_2020_total_premium'));
							$medi_ind_2020_family_descount_per = $this->security->xss_clean($this->input->post('medi_ind_2020_family_descount_per'));
							$medi_ind_2020_family_descount_tot = $this->security->xss_clean($this->input->post('medi_ind_2020_family_descount_tot'));
							$medi_ind_2020_load_description = $this->security->xss_clean($this->input->post('medi_ind_2020_load_description'));
							$medi_ind_2020_load_amount = $this->security->xss_clean($this->input->post('medi_ind_2020_load_amount'));
							$medi_ind_2020_restore_cover_premium = $this->security->xss_clean($this->input->post('medi_ind_2020_restore_cover_premium'));
							$medi_ind_2020_maternity_new_bornbaby = $this->security->xss_clean($this->input->post('medi_ind_2020_maternity_new_bornbaby'));
							$medi_ind_2020_daily_cash_allow_hosp = $this->security->xss_clean($this->input->post('medi_ind_2020_daily_cash_allow_hosp'));
							$medi_ind_2020_load_gross_premium = $this->security->xss_clean($this->input->post('medi_ind_2020_load_gross_premium'));
							$new_load_gross_premium = $this->security->xss_clean($this->input->post('new_load_gross_premium'));
							$medi_ind_2020_cgst_rate = $this->security->xss_clean($this->input->post('medi_ind_2020_cgst_rate'));
							$medi_ind_2020_cgst_tot = $this->security->xss_clean($this->input->post('medi_ind_2020_cgst_tot'));
							$medi_ind_2020_sgst_rate = $this->security->xss_clean($this->input->post('medi_ind_2020_sgst_rate'));
							$medi_ind_2020_sgst_tot = $this->security->xss_clean($this->input->post('medi_ind_2020_sgst_tot'));
							$medi_ind_2020_final_premium = $this->security->xss_clean($this->input->post('medi_ind_2020_final_premium'));
							$current_total_premium = $medi_ind_2020_final_premium;
						}
					} elseif ($company_txt == "Care Health Insurance Co Ltd") {
						if ($floater_policy_type == "Care Advantage") {
							$total_care_adv_ind_json_data = $this->security->xss_clean($this->input->post('total_care_adv_ind_json_data'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Care") {
							$total_care_ind_json_data = $this->security->xss_clean($this->input->post('total_care_ind_json_data'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						}
					}
				}

				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") {
					$floater_policy_type = $this->security->xss_clean($this->input->post('floater_policy_type'));
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					if ($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") {
						if ($floater_policy_type == "Optima Restore") {
							$total_medi_float_hdfc_json_data = $this->security->xss_clean($this->input->post('total_medi_float_hdfc_json_data'));
							$family_size = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_family_size'));
							$addition_of_more_child = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_addition_of_more_child'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$hdfc_ergo_health_insu_child_count = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count'));
							$hdfc_ergo_health_insu_child_count_first_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count_first_premium'));
							$hdfc_ergo_health_insu_child_total_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_total_premium'));
							$protect_ride_prem_tot = $this->security->xss_clean($this->input->post('protect_ride_prem_tot'));
							$hospital_daily_cash_prem_tot = $this->security->xss_clean($this->input->post('hospital_daily_cash_prem_tot'));
							$ipa_rider_prem_tot = $this->security->xss_clean($this->input->post('ipa_rider_prem_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$stay_active_benefit = $this->security->xss_clean($this->input->post('stay_active_benefit'));
							$stay_active_benefit_prem_tot = $this->security->xss_clean($this->input->post('stay_active_benefit_prem_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));

							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Health Suraksha") {
							$total_suraksha_float_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_suraksha_float_medi_hdfc_json_data'));
							$family_size = $this->security->xss_clean($this->input->post('suraksha_float_hdfc_ergo_health_insu_family_size'));
							$addition_of_more_child = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_addition_of_more_child'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$hdfc_ergo_health_insu_child_count = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count'));
							$hdfc_ergo_health_insu_child_count_first_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count_first_premium'));
							$hdfc_ergo_health_insu_child_total_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_total_premium'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Easy Health") {
							$family_size = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_family_size'));
							$addition_of_more_child = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_addition_of_more_child'));
							$total_easy_float_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_easy_float_medi_hdfc_json_data'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$hdfc_ergo_health_insu_child_count = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count'));
							$hdfc_ergo_health_insu_child_count_first_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count_first_premium'));
							$hdfc_ergo_health_insu_child_total_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_total_premium'));
							$protect_ride_prem_tot = $this->security->xss_clean($this->input->post('protect_ride_prem_tot'));
							$hospital_daily_cash_prem_tot = $this->security->xss_clean($this->input->post('hospital_daily_cash_prem_tot'));
							$ipa_rider_prem_tot = $this->security->xss_clean($this->input->post('ipa_rider_prem_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$stay_active_benefit = $this->security->xss_clean($this->input->post('stay_active_benefit'));
							$stay_active_benefit_prem = $this->security->xss_clean($this->input->post('stay_active_benefit_prem'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$tot_basic_prem = $this->security->xss_clean($this->input->post('tot_basic_prem'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "The New India Assurance Co Ltd") {
						if ($floater_policy_type == "New India Floater Mediclaim") {
							$total_the_new_india_medi_float_json_data = $this->security->xss_clean($this->input->post('total_the_new_india_medi_float_json_data'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$floater_disc_rate = $this->security->xss_clean($this->input->post('floater_disc_rate'));
							$floater_disc_tot = $this->security->xss_clean($this->input->post('floater_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "Max Bupa Health Insurance Co Ltd") {
						if ($floater_policy_type == "Reassure") {
							$family_size = $this->security->xss_clean($this->input->post('max_bupa_health_insu_medi_reassure_float_family_size'));
							$total_max_bupa_medi_float_reassure_json_data = $this->security->xss_clean($this->input->post('total_max_bupa_medi_float_reassure_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$first_year_rate = $this->security->xss_clean($this->input->post('first_year_rate'));
							$second_year_rate = $this->security->xss_clean($this->input->post('second_year_rate'));
							$third_year_rate = $this->security->xss_clean($this->input->post('third_year_rate'));
							$first_year_tot = $this->security->xss_clean($this->input->post('first_year_tot'));
							$second_year_tot = $this->security->xss_clean($this->input->post('second_year_tot'));
							$third_year_tot = $this->security->xss_clean($this->input->post('third_year_tot'));
							$tot_term_disc = $this->security->xss_clean($this->input->post('tot_term_disc'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$stand_instu_rate = $this->security->xss_clean($this->input->post('stand_instu_rate'));
							$stand_instu_tot = $this->security->xss_clean($this->input->post('stand_instu_tot'));
							$doctor_disc_per = $this->security->xss_clean($this->input->post('doctor_disc_per'));
							$doctor_disc_tot = $this->security->xss_clean($this->input->post('doctor_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));

							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
						if ($floater_policy_type == "Red Carpet") {
							$family_size = $this->security->xss_clean($this->input->post('star_health_allied_insu_red_carpet_float_family_size'));
							$total_star_health_red_carpet_medi_float_json_data = $this->security->xss_clean($this->input->post('total_star_health_red_carpet_medi_float_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Comprehensive") {
							$family_size = $this->security->xss_clean($this->input->post('star_health_allied_insu_comprehensive_float_family_size'));
							$total_star_health_comprehensive_medi_float_json_data = $this->security->xss_clean($this->input->post('total_star_health_comprehensive_medi_float_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "United India Insurance Co Ltd") {
						if ($floater_policy_type == "Family Floater 2014") {
							$total_mediclaim_floater2014 = $this->security->xss_clean($this->input->post('total_mediclaim_floater2014'));
							$name_insured_sum_insured = $this->security->xss_clean($this->input->post('name_insured_sum_insured'));
							$name_insured_premium = $this->security->xss_clean($this->input->post('name_insured_premium'));
							$medi_float_2014_total_premium = $this->security->xss_clean($this->input->post('medi_float_2014_total_premium'));
							$medi_float_2014_child_count = $this->security->xss_clean($this->input->post('medi_float_2014_child_count'));
							$medi_float_2014_child_count_first_premium = $this->security->xss_clean($this->input->post('medi_float_2014_child_count_first_premium'));
							$medi_float_2014_child_total_premium = $this->security->xss_clean($this->input->post('medi_float_2014_child_total_premium'));
							$medi_float_2014_load_description = $this->security->xss_clean($this->input->post('medi_float_2014_load_description'));
							$medi_float_2014_load_amount = $this->security->xss_clean($this->input->post('medi_float_2014_load_amount'));
							$medi_float_2014_load_gross_premium = $this->security->xss_clean($this->input->post('medi_float_2014_load_gross_premium'));
							$medi_float_2014_cgst_rate = $this->security->xss_clean($this->input->post('medi_float_2014_cgst_rate'));
							$medi_float_2014_cgst_tot = $this->security->xss_clean($this->input->post('medi_float_2014_cgst_tot'));
							$medi_float_2014_sgst_rate = $this->security->xss_clean($this->input->post('medi_float_2014_sgst_rate'));
							$medi_float_2014_sgst_tot = $this->security->xss_clean($this->input->post('medi_float_2014_sgst_tot'));
							$medi_float_2014_final_premium = $this->security->xss_clean($this->input->post('medi_float_2014_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_float_2014_final_premium;
						} elseif ($floater_policy_type == "Family Floater 2020") {
							$restore_cover = $this->security->xss_clean($this->input->post('restore_cover'));
							$maternity_new_born_baby_cover = $this->security->xss_clean($this->input->post('maternity_new_born_baby_cover'));
							$daily_cash_allowance_cover = $this->security->xss_clean($this->input->post('daily_cash_allowance_cover'));

							$total_mediclaim_floater2020 = $this->security->xss_clean($this->input->post('total_mediclaim_floater2020'));
							$name_insured_sum_insured = $this->security->xss_clean($this->input->post('name_insured_sum_insured'));
							$name_insured_premium = $this->security->xss_clean($this->input->post('name_insured_premium'));
							$name_insured_ncd = $this->security->xss_clean($this->input->post('name_insured_ncd'));
							$name_insured_premium_after_ncd = $this->security->xss_clean($this->input->post('name_insured_premium_after_ncd'));
							$medi_float_2020_total_premium = $this->security->xss_clean($this->input->post('medi_float_2020_total_premium'));
							$medi_float_2020_child_count = $this->security->xss_clean($this->input->post('medi_float_2020_child_count'));
							$medi_float_2020_child_count_first_premium = $this->security->xss_clean($this->input->post('medi_float_2020_child_count_first_premium'));
							$medi_float_2020_child_total_premium = $this->security->xss_clean($this->input->post('medi_float_2020_child_total_premium'));
							$medi_float_2020_load_description = $this->security->xss_clean($this->input->post('medi_float_2020_load_description'));
							$medi_float_2020_load_amount = $this->security->xss_clean($this->input->post('medi_float_2020_load_amount'));
							$medi_float_2020_restore_cover_premium = $this->security->xss_clean($this->input->post('medi_float_2020_restore_cover_premium'));
							$medi_float_2020_maternity_new_bornbaby = $this->security->xss_clean($this->input->post('medi_float_2020_maternity_new_bornbaby'));
							$medi_float_2020_daily_cash_allow_hosp = $this->security->xss_clean($this->input->post('medi_float_2020_daily_cash_allow_hosp'));
							$medi_float_2020_load_gross_premium = $this->security->xss_clean($this->input->post('medi_float_2020_load_gross_premium'));
							$medi_float_2020_cgst_rate = $this->security->xss_clean($this->input->post('medi_float_2020_cgst_rate'));
							$medi_float_2020_cgst_tot = $this->security->xss_clean($this->input->post('medi_float_2020_cgst_tot'));
							$medi_float_2020_sgst_rate = $this->security->xss_clean($this->input->post('medi_float_2020_sgst_rate'));
							$medi_float_2020_sgst_tot = $this->security->xss_clean($this->input->post('medi_float_2020_sgst_tot'));
							$medi_float_2020_final_premium = $this->security->xss_clean($this->input->post('medi_float_2020_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_float_2020_final_premium;
						}
					} elseif ($company_txt == "Care Health Insurance Co Ltd") {
						if ($floater_policy_type == "Care Advantage") {
							$family_size = $this->security->xss_clean($this->input->post('care_health_insu_care_advantage_float_family_size'));
							$total_care_adv_float_json_data = $this->security->xss_clean($this->input->post('total_care_adv_float_json_data'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Care") {
							$family_size = $this->security->xss_clean($this->input->post('care_health_insu_care_advantage_float_family_size'));
							$total_care_float_json_data = $this->security->xss_clean($this->input->post('total_care_float_json_data'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$current_total_premium = $medi_final_premium;
						}
					}
				}

				if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Individual") {
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					$tot_commind_json_data = $this->security->xss_clean($this->input->post('tot_commind_json_data'));
					$comm_ind_total_amount = $this->security->xss_clean($this->input->post('comm_ind_total_amount'));
					$comm_ind_less_discount_rate = $this->security->xss_clean($this->input->post('comm_ind_less_discount_rate'));
					$comm_ind_less_discount_tot = $this->security->xss_clean($this->input->post('comm_ind_less_discount_tot'));
					$comm_ind_load_desc = $this->security->xss_clean($this->input->post('comm_ind_load_desc'));
					$comm_ind_load_tot = $this->security->xss_clean($this->input->post('comm_ind_load_tot'));
					$comm_ind_gross_premium = $this->security->xss_clean($this->input->post('comm_ind_gross_premium'));
					$comm_ind_gross_premium_new = $this->security->xss_clean($this->input->post('comm_ind_gross_premium_new'));
					$comm_ind_cgst_rate = $this->security->xss_clean($this->input->post('comm_ind_cgst_rate'));
					$comm_ind_cgst_tot = $this->security->xss_clean($this->input->post('comm_ind_cgst_tot'));
					$comm_ind_sgst_rate = $this->security->xss_clean($this->input->post('comm_ind_sgst_rate'));
					$comm_ind_sgst_tot = $this->security->xss_clean($this->input->post('comm_ind_sgst_tot'));
					$comm_ind_final_premium = $this->security->xss_clean($this->input->post('comm_ind_final_premium'));

					$current_total_premium = $comm_ind_final_premium;
				}

				if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Floater") {
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					$tot_commfloat_json_data = $this->security->xss_clean($this->input->post('tot_commfloat_json_data'));
					$comm_float_total_amount = $this->security->xss_clean($this->input->post('comm_float_total_amount'));
					$comm_float_less_discount_rate = $this->security->xss_clean($this->input->post('comm_float_less_discount_rate'));
					$comm_float_less_discount_tot = $this->security->xss_clean($this->input->post('comm_float_less_discount_tot'));
					$comm_float_load_desc = $this->security->xss_clean($this->input->post('comm_float_load_desc'));
					$comm_float_load_tot = $this->security->xss_clean($this->input->post('comm_float_load_tot'));
					$comm_float_gross_premium = $this->security->xss_clean($this->input->post('comm_float_gross_premium'));
					$comm_float_gross_premium_new = $this->security->xss_clean($this->input->post('comm_float_gross_premium_new'));
					$comm_float_cgst_rate = $this->security->xss_clean($this->input->post('comm_float_cgst_rate'));
					$comm_float_cgst_tot = $this->security->xss_clean($this->input->post('comm_float_cgst_tot'));
					$comm_float_sgst_rate = $this->security->xss_clean($this->input->post('comm_float_sgst_rate'));
					$comm_float_sgst_tot = $this->security->xss_clean($this->input->post('comm_float_sgst_tot'));
					$comm_float_final_premium = $this->security->xss_clean($this->input->post('comm_float_final_premium'));

					$current_total_premium = $comm_float_final_premium;
				}

				if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater")) {
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Floater") {

						$family_size = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_supertopup_float_family_size'));
						$tot_supertopup_float_hdfc_json = $this->security->xss_clean($this->input->post('tot_supertopup_float_hdfc_json'));
						$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
						$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
						$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
						$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
						$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
						$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$max_age = $this->security->xss_clean($this->input->post('max_age'));

						$current_total_premium = $medi_final_premium;
					} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Floater") {
						$total_the_new_india_supertopup_ind_json_data = $this->security->xss_clean($this->input->post('total_the_new_india_supertopup_ind_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));

						$current_total_premium = $medi_final_premium;
					} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Floater") {
						$family_size = $this->security->xss_clean($this->input->post('star_health_allied_insu_supertopup_float_family_size'));
						$total_star_health_supertopup_float_json_data = $this->security->xss_clean($this->input->post('total_star_health_supertopup_float_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$max_age = $this->security->xss_clean($this->input->post('max_age'));

						$current_total_premium = $medi_final_premium;
					} else {
						$family_size = $this->security->xss_clean($this->input->post('family_size'));

						$tot_supertopup_floater_json = $this->security->xss_clean($this->input->post('tot_supertopup_floater_json'));
						$name_insured_policy_option = $this->security->xss_clean($this->input->post('name_insured_policy_option'));
						$name_insured_deductable_thershold = $this->security->xss_clean($this->input->post('name_insured_deductable_thershold'));
						$name_insured_sum_insured = $this->security->xss_clean($this->input->post('name_insured_sum_insured'));
						$name_insured_premium = $this->security->xss_clean($this->input->post('name_insured_premium'));
						$supertopup_floater_total_premium = $this->security->xss_clean($this->input->post('supertopup_floater_total_premium'));
						$supertopup_floater_description = $this->security->xss_clean($this->input->post('supertopup_floater_description'));
						$supertopup_floater_load_amount = $this->security->xss_clean($this->input->post('supertopup_floater_load_amount'));
						$supertopup_floater_load_gross_premium = $this->security->xss_clean($this->input->post('supertopup_floater_load_gross_premium'));
						$supertopup_floater_cgst_rate = $this->security->xss_clean($this->input->post('supertopup_floater_cgst_rate'));
						$supertopup_floater_cgst_tot = $this->security->xss_clean($this->input->post('supertopup_floater_cgst_tot'));
						$supertopup_floater_sgst_rate = $this->security->xss_clean($this->input->post('supertopup_floater_sgst_rate'));
						$supertopup_floater_sgst_tot = $this->security->xss_clean($this->input->post('supertopup_floater_sgst_tot'));
						$supertopup_floater_final_premium = $this->security->xss_clean($this->input->post('supertopup_floater_final_premium'));
						$max_age = $this->security->xss_clean($this->input->post('max_age'));

						$current_total_premium = $supertopup_floater_final_premium;
					}
				}

				if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual")) {
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Individual") {
						$tot_supertopup_ind_hdfc_json = $this->security->xss_clean($this->input->post('tot_supertopup_ind_hdfc_json'));
						$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
						$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
						$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
						$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
						$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
						$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));

						$current_total_premium = $medi_final_premium;
					} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Individual") {
						$total_the_new_india_supertopup_ind_single_json_data = $this->security->xss_clean($this->input->post('total_the_new_india_supertopup_ind_single_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$current_total_premium = $medi_final_premium;
					} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Individual") {
						$total_star_health_supertopup_ind_json_data = $this->security->xss_clean($this->input->post('total_star_health_supertopup_ind_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$current_total_premium = $medi_final_premium;
					} else {
						$tot_supertopup_ind_json = $this->security->xss_clean($this->input->post('tot_supertopup_ind_json'));
						$supertopup_ind_total_premium = $this->security->xss_clean($this->input->post('supertopup_ind_total_premium'));
						$supertopup_ind_description = $this->security->xss_clean($this->input->post('supertopup_ind_description'));
						$supertopup_ind_load_amount = $this->security->xss_clean($this->input->post('supertopup_ind_load_amount'));
						$supertopup_ind_load_gross_premium = $this->security->xss_clean($this->input->post('supertopup_ind_load_gross_premium'));
						$supertopup_ind_cgst_rate = $this->security->xss_clean($this->input->post('supertopup_ind_cgst_rate'));
						$supertopup_ind_cgst_tot = $this->security->xss_clean($this->input->post('supertopup_ind_cgst_tot'));
						$supertopup_ind_sgst_rate = $this->security->xss_clean($this->input->post('supertopup_ind_sgst_rate'));
						$supertopup_ind_sgst_tot = $this->security->xss_clean($this->input->post('supertopup_ind_sgst_tot'));
						$supertopup_ind_final_premium = $this->security->xss_clean($this->input->post('supertopup_ind_final_premium'));
						$current_total_premium = $supertopup_ind_final_premium;
					}
				}

				if ($policy_name_txt == "GMC") { // GMC:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
						$total_gmc_data = $this->security->xss_clean($this->input->post('total_gmc_data'));
						$gmc_family_size = $this->security->xss_clean($this->input->post('gmc_family_size'));
						$gmc_total_sum_insured = $this->security->xss_clean($this->input->post('gmc_total_sum_insured'));
						$current_sum_insured = 0;
						$current_total_premium = $gmc_total_sum_insured;
					}
				}
				if ($policy_name_txt == "GPA") { // GMC:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {

						$total_gpa_data = $this->security->xss_clean($this->input->post('total_gpa_data'));
						$gpa_family_size = $this->security->xss_clean($this->input->post('gpa_family_size'));
						$gpa_total_sum_insured = $this->security->xss_clean($this->input->post('gpa_total_sum_insured'));
						$current_sum_insured = 0;
						$current_total_premium = $gpa_total_sum_insured;
					}
				}

				if ($policy_name_txt == "Personal Accident") { // GMC:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater") {

						$total_pa_ind_json_data = $this->security->xss_clean($this->input->post('total_pa_ind_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$less_disc_rate = $this->security->xss_clean($this->input->post('less_disc_rate'));
						$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
						$gross_premium = $this->security->xss_clean($this->input->post('gross_premium'));
						$gross_premium_new = $this->security->xss_clean($this->input->post('gross_premium_new'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$current_total_premium = $medi_final_premium;
					} elseif ($policy_type_txt == "Common Individual") {

						$tot_commind_json_data = $this->security->xss_clean($this->input->post('tot_commind_json_data'));
						$comm_ind_total_amount = $this->security->xss_clean($this->input->post('comm_ind_total_amount'));
						$comm_ind_less_discount_rate = $this->security->xss_clean($this->input->post('comm_ind_less_discount_rate'));
						$comm_ind_less_discount_tot = $this->security->xss_clean($this->input->post('comm_ind_less_discount_tot'));
						$comm_ind_load_desc = $this->security->xss_clean($this->input->post('comm_ind_load_desc'));
						$comm_ind_load_tot = $this->security->xss_clean($this->input->post('comm_ind_load_tot'));
						$comm_ind_gross_premium = $this->security->xss_clean($this->input->post('comm_ind_gross_premium'));
						$comm_ind_gross_premium_new = $this->security->xss_clean($this->input->post('comm_ind_gross_premium_new'));
						$comm_ind_cgst_rate = $this->security->xss_clean($this->input->post('comm_ind_cgst_rate'));
						$comm_ind_cgst_tot = $this->security->xss_clean($this->input->post('comm_ind_cgst_tot'));
						$comm_ind_sgst_rate = $this->security->xss_clean($this->input->post('comm_ind_sgst_rate'));
						$comm_ind_sgst_tot = $this->security->xss_clean($this->input->post('comm_ind_sgst_tot'));
						$comm_ind_final_premium = $this->security->xss_clean($this->input->post('comm_ind_final_premium'));
						$current_total_premium = $comm_ind_final_premium;
					} elseif ($policy_type_txt == "Common Floater") {

						$tot_commfloat_json_data = $this->security->xss_clean($this->input->post('tot_commfloat_json_data'));
						$comm_float_total_amount = $this->security->xss_clean($this->input->post('comm_float_total_amount'));
						$comm_float_less_discount_rate = $this->security->xss_clean($this->input->post('comm_float_less_discount_rate'));
						$comm_float_less_discount_tot = $this->security->xss_clean($this->input->post('comm_float_less_discount_tot'));
						$comm_float_load_desc = $this->security->xss_clean($this->input->post('comm_float_load_desc'));
						$comm_float_load_tot = $this->security->xss_clean($this->input->post('comm_float_load_tot'));
						$comm_float_gross_premium = $this->security->xss_clean($this->input->post('comm_float_gross_premium'));
						$comm_float_gross_premium_new = $this->security->xss_clean($this->input->post('comm_float_gross_premium_new'));
						$comm_float_cgst_rate = $this->security->xss_clean($this->input->post('comm_float_cgst_rate'));
						$comm_float_cgst_tot = $this->security->xss_clean($this->input->post('comm_float_cgst_tot'));
						$comm_float_sgst_rate = $this->security->xss_clean($this->input->post('comm_float_sgst_rate'));
						$comm_float_sgst_tot = $this->security->xss_clean($this->input->post('comm_float_sgst_tot'));
						$comm_float_final_premium = $this->security->xss_clean($this->input->post('comm_float_final_premium'));
						$current_total_premium = $comm_float_final_premium;
					}
				}

				if ($policy_name_txt == "Private Car") {

					$vehicle_make_model = $this->security->xss_clean($this->input->post('vehicle_make_model'));
					$vehicle_reg_no = $this->security->xss_clean($this->input->post('vehicle_reg_no'));
					$insu_declared_val = $this->security->xss_clean($this->input->post('insu_declared_val'));
					$non_elect_access_val = $this->security->xss_clean($this->input->post('non_elect_access_val'));
					$elect_access_val = $this->security->xss_clean($this->input->post('elect_access_val'));
					$lpg_cng_idv_val = $this->security->xss_clean($this->input->post('lpg_cng_idv_val'));
					$trailer_val = $this->security->xss_clean($this->input->post('trailer_val'));
					$year_manufact_val = $this->security->xss_clean($this->input->post('year_manufact_val'));
					$rta_city_code = $this->security->xss_clean($this->input->post('rta_city_code'));
					$rta_city = $this->security->xss_clean($this->input->post('rta_city'));
					$rta_city_cat = $this->security->xss_clean($this->input->post('rta_city_cat'));
					$cubic_capacity_val = $this->security->xss_clean($this->input->post('cubic_capacity_val'));
					$calculation_method = $this->security->xss_clean($this->input->post('calculation_method'));
					$type_of_cover = $this->security->xss_clean($this->input->post('type_of_cover'));
					$prev_policy_expiry_date = $this->security->xss_clean($this->input->post('prev_policy_expiry_date'));
					$policy_period = $this->security->xss_clean($this->input->post('policy_period'));
					$inception_date = $this->security->xss_clean($this->input->post('inception_date'));
					$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));

					$od_basic_od_tot = $this->security->xss_clean($this->input->post('od_basic_od_tot'));
					$od_special_disc_per = $this->security->xss_clean($this->input->post('od_special_disc_per'));
					$od_special_disc_tot = $this->security->xss_clean($this->input->post('od_special_disc_tot'));
					$od_special_load_per = $this->security->xss_clean($this->input->post('od_special_load_per'));
					$od_special_load_tot = $this->security->xss_clean($this->input->post('od_special_load_tot'));
					$od_net_basic_od_tot = $this->security->xss_clean($this->input->post('od_net_basic_od_tot'));
					$od_non_elec_acc_tot = $this->security->xss_clean($this->input->post('od_non_elec_acc_tot'));
					$od_elec_acc_tot = $this->security->xss_clean($this->input->post('od_elec_acc_tot'));
					$od_bi_fuel_kit_tot = $this->security->xss_clean($this->input->post('od_bi_fuel_kit_tot'));
					$od_od_basic_od1_tot = $this->security->xss_clean($this->input->post('od_od_basic_od1_tot'));
					$od_trailer_tot = $this->security->xss_clean($this->input->post('od_trailer_tot'));
					$od_geographical_area_tot = $this->security->xss_clean($this->input->post('od_geographical_area_tot'));
					$od_embassy_load_tot = $this->security->xss_clean($this->input->post('od_embassy_load_tot'));
					$od_fibre_glass_tank_tot = $this->security->xss_clean($this->input->post('od_fibre_glass_tank_tot'));
					$od_driving_tut_tot = $this->security->xss_clean($this->input->post('od_driving_tut_tot'));
					$od_rallies_tot = $this->security->xss_clean($this->input->post('od_rallies_tot'));
					$od_basic_od2_tot = $this->security->xss_clean($this->input->post('od_basic_od2_tot'));
					$od_anti_tot = $this->security->xss_clean($this->input->post('od_anti_tot'));
					$od_handicap_tot = $this->security->xss_clean($this->input->post('od_handicap_tot'));
					$od_aai_tot = $this->security->xss_clean($this->input->post('od_aai_tot'));
					$od_vintage_tot = $this->security->xss_clean($this->input->post('od_vintage_tot'));
					$od_own_premises_tot = $this->security->xss_clean($this->input->post('od_own_premises_tot'));
					$od_voluntary_deduc_tot = $this->security->xss_clean($this->input->post('od_voluntary_deduc_tot'));
					$od_basic_od3_tot = $this->security->xss_clean($this->input->post('od_basic_od3_tot'));
					$od_ncb_per = $this->security->xss_clean($this->input->post('od_ncb_per'));
					$od_ncb_tot = $this->security->xss_clean($this->input->post('od_ncb_tot'));
					$od_tot_anual_od_premium = $this->security->xss_clean($this->input->post('od_tot_anual_od_premium'));
					$od_tot_od_premium_policy_period = $this->security->xss_clean($this->input->post('od_tot_od_premium_policy_period'));

					$tp_basic_tp_tot = $this->security->xss_clean($this->input->post('tp_basic_tp_tot'));
					$tp_restr_tppd = $this->security->xss_clean($this->input->post('tp_restr_tppd'));
					$tp_trailer_tot = $this->security->xss_clean($this->input->post('tp_trailer_tot'));
					$tp_bi_fuel_tot = $this->security->xss_clean($this->input->post('tp_bi_fuel_tot'));
					$tp_basic_tp1_tot = $this->security->xss_clean($this->input->post('tp_basic_tp1_tot'));
					$tp_compul_own_driv_tot = $this->security->xss_clean($this->input->post('tp_compul_own_driv_tot'));
					$tp_geographical_area_tot = $this->security->xss_clean($this->input->post('tp_geographical_area_tot'));
					$tp_unnamed_papax_tot = $this->security->xss_clean($this->input->post('tp_unnamed_papax_tot'));
					$tp_no_seats_limit_person_tot = $this->security->xss_clean($this->input->post('tp_no_seats_limit_person_tot'));
					$tp_ll_drv_emp_tot = $this->security->xss_clean($this->input->post('tp_ll_drv_emp_tot'));
					$tp_no_drv_emp_tot = $this->security->xss_clean($this->input->post('tp_no_drv_emp_tot'));
					$tp_ll_defe_tot = $this->security->xss_clean($this->input->post('tp_ll_defe_tot'));
					$tp_noof_person_tot = $this->security->xss_clean($this->input->post('tp_noof_person_tot'));
					$tp_pa_paid_drv_tot = $this->security->xss_clean($this->input->post('tp_pa_paid_drv_tot'));
					$tp_basic_tp2_tot = $this->security->xss_clean($this->input->post('tp_basic_tp2_tot'));
					$tp_tot_anual_tp_premium = $this->security->xss_clean($this->input->post('tp_tot_anual_tp_premium'));
					$tp_tot_premium_policy_period = $this->security->xss_clean($this->input->post('tp_tot_premium_policy_period'));
					$tot_othercover_ind_json = $this->security->xss_clean($this->input->post('tot_othercover_ind_json'));
					$plan_name = $this->security->xss_clean($this->input->post('plan_name'));
					$plan_name_tot = $this->security->xss_clean($this->input->post('plan_name_tot'));
					$tot_anual_cover_premium = $this->security->xss_clean($this->input->post('tot_anual_cover_premium'));
					$tot_cover_premium_period = $this->security->xss_clean($this->input->post('tot_cover_premium_period'));

					$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
					$motor_cgst_rate = $this->security->xss_clean($this->input->post('motor_cgst_rate'));
					$motor_cgst_tot = $this->security->xss_clean($this->input->post('motor_cgst_tot'));
					$motor_sgst_rate = $this->security->xss_clean($this->input->post('motor_sgst_rate'));
					$motor_sgst_tot = $this->security->xss_clean($this->input->post('motor_sgst_tot'));
					$tot_payable_premium = $this->security->xss_clean($this->input->post('tot_payable_premium'));
					$current_sum_insured = 0;
					$current_total_premium = $tot_payable_premium;
				}

				if ($policy_name_txt == "2 Wheeler") {

					$vehicle_make_model = $this->security->xss_clean($this->input->post('vehicle_make_model'));
					$vehicle_reg_no = $this->security->xss_clean($this->input->post('vehicle_reg_no'));
					$insu_declared_val = $this->security->xss_clean($this->input->post('insu_declared_val'));
					$elect_acc_val = $this->security->xss_clean($this->input->post('elect_acc_val'));
					$other_elect_acc_val = $this->security->xss_clean($this->input->post('other_elect_acc_val'));
					$policy_period_tenure_years = $this->security->xss_clean($this->input->post('policy_period_tenure_years'));
					$previous_policy_expiry_date_tenur = $this->security->xss_clean($this->input->post('previous_policy_expiry_date_tenur'));
					$year_manufact_val = $this->security->xss_clean($this->input->post('year_manufact_val'));
					$rta_city_code = $this->security->xss_clean($this->input->post('rta_city_code'));
					$rta_city = $this->security->xss_clean($this->input->post('rta_city'));
					$rta_city_cat = $this->security->xss_clean($this->input->post('rta_city_cat'));
					$cubic_capacity_val = $this->security->xss_clean($this->input->post('cubic_capacity_val'));
					$type_of_cover = $this->security->xss_clean($this->input->post('type_of_cover'));
					$policy_period = $this->security->xss_clean($this->input->post('policy_period'));
					$inception_date = $this->security->xss_clean($this->input->post('inception_date'));
					$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));

					$od_basic_od_tot = $this->security->xss_clean($this->input->post('od_basic_od_tot'));
					$od_special_disc_per = $this->security->xss_clean($this->input->post('od_special_disc_per'));
					$od_special_disc_tot = $this->security->xss_clean($this->input->post('od_special_disc_tot'));
					$od_special_load_per = $this->security->xss_clean($this->input->post('od_special_load_per'));
					$od_special_load_tot = $this->security->xss_clean($this->input->post('od_special_load_tot'));
					$od_net_basic_od_tot = $this->security->xss_clean($this->input->post('od_net_basic_od_tot'));
					$od_elec_acc_tot = $this->security->xss_clean($this->input->post('od_elec_acc_tot'));
					$od_other_elec_acc_tot = $this->security->xss_clean($this->input->post('od_other_elec_acc_tot'));
					$od_od_basic_od1_tot = $this->security->xss_clean($this->input->post('od_od_basic_od1_tot'));
					$od_geographical_area_tot = $this->security->xss_clean($this->input->post('od_geographical_area_tot'));
					$od_rallies_tot = $this->security->xss_clean($this->input->post('od_rallies_tot'));
					$od_embassy_load_tot = $this->security->xss_clean($this->input->post('od_embassy_load_tot'));
					$od_basic_od2_tot = $this->security->xss_clean($this->input->post('od_basic_od2_tot'));
					$od_anti_theft_tot = $this->security->xss_clean($this->input->post('od_anti_theft_tot'));
					$od_handicap_tot = $this->security->xss_clean($this->input->post('od_handicap_tot'));
					$od_aai_tot = $this->security->xss_clean($this->input->post('od_aai_tot'));
					$od_side_car_tot = $this->security->xss_clean($this->input->post('od_side_car_tot'));
					$od_own_premises_tot = $this->security->xss_clean($this->input->post('od_own_premises_tot'));
					$od_voluntary_excess_tot = $this->security->xss_clean($this->input->post('od_voluntary_excess_tot'));
					$od_basic_od3_tot = $this->security->xss_clean($this->input->post('od_basic_od3_tot'));
					$od_ncb_per = $this->security->xss_clean($this->input->post('od_ncb_per'));
					$od_ncb_tot = $this->security->xss_clean($this->input->post('od_ncb_tot'));
					$od_tot_od_premium_policy_period = $this->security->xss_clean($this->input->post('od_tot_od_premium_policy_period'));

					$tp_basic_tp_tot = $this->security->xss_clean($this->input->post('tp_basic_tp_tot'));
					$tp_restr_tppd_tot = $this->security->xss_clean($this->input->post('tp_restr_tppd_tot'));
					$tp_basic_tp1_tot = $this->security->xss_clean($this->input->post('tp_basic_tp1_tot'));
					$tp_geographical_area_tot = $this->security->xss_clean($this->input->post('tp_geographical_area_tot'));
					$tp_compul_pa_own_driv_tot = $this->security->xss_clean($this->input->post('tp_compul_pa_own_driv_tot'));
					$tp_unnamed_pa_tot = $this->security->xss_clean($this->input->post('tp_unnamed_pa_tot'));
					$tp_ll_drv_emp_imt28_tot = $this->security->xss_clean($this->input->post('tp_ll_drv_emp_imt28_tot'));
					$tp_ll_other_emp_tot = $this->security->xss_clean($this->input->post('tp_ll_other_emp_tot'));
					$tp_noof_other_emp_tot = $this->security->xss_clean($this->input->post('tp_noof_other_emp_tot'));
					$tp_basic_tp2_tot = $this->security->xss_clean($this->input->post('tp_basic_tp2_tot'));
					$tp_tot_premium_policy_period = $this->security->xss_clean($this->input->post('tp_tot_premium_policy_period'));
					$tot_othercover_ind_json = $this->security->xss_clean($this->input->post('tot_othercover_ind_json'));
					$plan_name = $this->security->xss_clean($this->input->post('plan_name'));
					$plan_name_tot = $this->security->xss_clean($this->input->post('plan_name_tot'));
					$tot_cover_premium_period = $this->security->xss_clean($this->input->post('tot_cover_premium_period'));

					$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
					$motor_cgst_rate = $this->security->xss_clean($this->input->post('motor_cgst_rate'));
					$motor_cgst_tot = $this->security->xss_clean($this->input->post('motor_cgst_tot'));
					$motor_sgst_rate = $this->security->xss_clean($this->input->post('motor_sgst_rate'));
					$motor_sgst_tot = $this->security->xss_clean($this->input->post('motor_sgst_tot'));
					$tot_payable_premium = $this->security->xss_clean($this->input->post('tot_payable_premium'));
					$current_sum_insured = 0;
					$current_total_premium = $tot_payable_premium;
				}

				if ($policy_name_txt == "Commercial Vehicle") {

					$vehicle_make_model = $this->security->xss_clean($this->input->post('vehicle_make_model'));
					$vehicle_reg_no = $this->security->xss_clean($this->input->post('vehicle_reg_no'));
					$insu_declared_val = $this->security->xss_clean($this->input->post('insu_declared_val'));
					$elect_acc_val = $this->security->xss_clean($this->input->post('elect_acc_val'));
					$lpg_cng_idv_val = $this->security->xss_clean($this->input->post('lpg_cng_idv_val'));
					$year_manufact_val = $this->security->xss_clean($this->input->post('year_manufact_val'));
					$zone_city_code = $this->security->xss_clean($this->input->post('zone_city_code'));
					$zone_city = $this->security->xss_clean($this->input->post('zone_city'));
					$zone_city_cat = $this->security->xss_clean($this->input->post('zone_city_cat'));
					$gvw_val = $this->security->xss_clean($this->input->post('gvw_val'));
					$class_val = $this->security->xss_clean($this->input->post('class_val'));
					$type_of_cover = $this->security->xss_clean($this->input->post('type_of_cover'));
					$policy_period = $this->security->xss_clean($this->input->post('policy_period'));
					$inception_date = $this->security->xss_clean($this->input->post('inception_date'));
					$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));

					$od_basic_od_tot = $this->security->xss_clean($this->input->post('od_basic_od_tot'));
					$od_elec_acc_tot = $this->security->xss_clean($this->input->post('od_elec_acc_tot'));
					$od_trailer_tot = $this->security->xss_clean($this->input->post('od_trailer_tot'));
					$od_bi_fuel_kit_tot = $this->security->xss_clean($this->input->post('od_bi_fuel_kit_tot'));
					$od_od_basic_od1_tot = $this->security->xss_clean($this->input->post('od_od_basic_od1_tot'));
					$od_geog_area_tot = $this->security->xss_clean($this->input->post('od_geog_area_tot'));
					$od_fiber_glass_tank_tot = $this->security->xss_clean($this->input->post('od_fiber_glass_tank_tot'));
					$od_imt_cover_mud_guard_tot = $this->security->xss_clean($this->input->post('od_imt_cover_mud_guard_tot'));
					$od_basic_od2_tot = $this->security->xss_clean($this->input->post('od_basic_od2_tot'));
					$od_basic_od3_tot = $this->security->xss_clean($this->input->post('od_basic_od3_tot'));
					$od_ncb_per = $this->security->xss_clean($this->input->post('od_ncb_per'));
					$od_ncb_tot = $this->security->xss_clean($this->input->post('od_ncb_tot'));
					$od_tot_anual_od_premium = $this->security->xss_clean($this->input->post('od_tot_anual_od_premium'));
					$od_special_disc_per = $this->security->xss_clean($this->input->post('od_special_disc_per'));
					$od_special_disc_tot = $this->security->xss_clean($this->input->post('od_special_disc_tot'));
					$od_special_load_per = $this->security->xss_clean($this->input->post('od_special_load_per'));
					$od_special_load_tot = $this->security->xss_clean($this->input->post('od_special_load_tot'));
					$od_tot_od_premium = $this->security->xss_clean($this->input->post('od_tot_od_premium'));

					$tp_basic_tp_tot = $this->security->xss_clean($this->input->post('tp_basic_tp_tot'));
					$tp_restr_tppd_tot = $this->security->xss_clean($this->input->post('tp_restr_tppd_tot'));
					$tp_trailer_tot = $this->security->xss_clean($this->input->post('tp_trailer_tot'));
					$tp_bi_fuel_kit_tot = $this->security->xss_clean($this->input->post('tp_bi_fuel_kit_tot'));
					$tp_basic_tp1_tot = $this->security->xss_clean($this->input->post('tp_basic_tp1_tot'));
					$tp_geog_area_tot = $this->security->xss_clean($this->input->post('tp_geog_area_tot'));
					$tp_compul_pa_own_driv_tot = $this->security->xss_clean($this->input->post('tp_compul_pa_own_driv_tot'));
					$tp_pa_paid_driver_tot = $this->security->xss_clean($this->input->post('tp_pa_paid_driver_tot'));
					$tp_ll_emp_non_fare_tot = $this->security->xss_clean($this->input->post('tp_ll_emp_non_fare_tot'));
					$tp_ll_driver_cleaner_tot = $this->security->xss_clean($this->input->post('tp_ll_driver_cleaner_tot'));
					$tp_ll_person_operation_tot = $this->security->xss_clean($this->input->post('tp_ll_person_operation_tot'));
					$tp_basic_tp2_tot = $this->security->xss_clean($this->input->post('tp_basic_tp2_tot'));
					$tp_tot_premium = $this->security->xss_clean($this->input->post('tp_tot_premium'));
					$tp_consumables = $this->security->xss_clean($this->input->post('tp_consumables'));
					$tp_zero_depreciation = $this->security->xss_clean($this->input->post('tp_zero_depreciation'));
					$tp_road_side_ass = $this->security->xss_clean($this->input->post('tp_road_side_ass'));
					$tp_tot_addon_premium = $this->security->xss_clean($this->input->post('tp_tot_addon_premium'));

					$tot_owd_premium = $this->security->xss_clean($this->input->post('tot_owd_premium'));
					$tot_owd_addon_premium = $this->security->xss_clean($this->input->post('tot_owd_addon_premium'));
					$tot_btp_premium = $this->security->xss_clean($this->input->post('tot_btp_premium'));
					$tot_other_tp_premium = $this->security->xss_clean($this->input->post('tot_other_tp_premium'));
					$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
					$tot_owd_cgst_rate = $this->security->xss_clean($this->input->post('tot_owd_cgst_rate'));
					$tot_owd_sgst_rate = $this->security->xss_clean($this->input->post('tot_owd_sgst_rate'));
					$tot_owd_addon_cgst_rate = $this->security->xss_clean($this->input->post('tot_owd_addon_cgst_rate'));
					$tot_owd_addon_sgst_rate = $this->security->xss_clean($this->input->post('tot_owd_addon_sgst_rate'));
					$tot_btp_cgst_rate = $this->security->xss_clean($this->input->post('tot_btp_cgst_rate'));
					$tot_btp_sgst_rate = $this->security->xss_clean($this->input->post('tot_btp_sgst_rate'));
					$tot_other_tp_cgst_rate = $this->security->xss_clean($this->input->post('tot_other_tp_cgst_rate'));
					$tot_other_tp_sgst_rate = $this->security->xss_clean($this->input->post('tot_other_tp_sgst_rate'));
					$tot_owd_gst = $this->security->xss_clean($this->input->post('tot_owd_gst'));
					$tot_owd_addon_gst = $this->security->xss_clean($this->input->post('tot_owd_addon_gst'));
					$tot_btp_gst = $this->security->xss_clean($this->input->post('tot_btp_gst'));
					$tot_other_tp_gst = $this->security->xss_clean($this->input->post('tot_other_tp_gst'));
					$tot_gst_amt = $this->security->xss_clean($this->input->post('tot_gst_amt'));
					$tot_owd_final = $this->security->xss_clean($this->input->post('tot_owd_final'));
					$tot_owd_addon_final = $this->security->xss_clean($this->input->post('tot_owd_addon_final'));
					$tot_btp_final = $this->security->xss_clean($this->input->post('tot_btp_final'));
					$tot_other_tp_final = $this->security->xss_clean($this->input->post('tot_other_tp_final'));
					$tot_final_premium = $this->security->xss_clean($this->input->post('tot_final_premium'));
					$tot_payable_premium = $this->security->xss_clean($this->input->post('tot_payable_premium'));
					$current_sum_insured = 0;
					$current_total_premium = $tot_payable_premium;
				}

				$total_remarks = json_decode($this->security->xss_clean($this->input->post('total_remarks')));
				$total_hypotication = $this->security->xss_clean($this->input->post('total_hypotication'));
				$total_correspondence = $this->security->xss_clean($this->input->post('total_correspondence'));
				$total_paymentacknowledge_data = $this->security->xss_clean($this->input->post('total_paymentacknowledge_data'));
				$total_risk = $this->security->xss_clean($this->input->post('total_risk'));
				$total_risk_Rc = $this->security->xss_clean($this->input->post('total_risk_Rc'));

				if ($total_remarks == "undefined")
					$total_remarks = json_encode([]);
				if ($total_hypotication == "undefined")
					$total_hypotication = json_encode([]);
				if ($total_risk == "undefined")
					$total_risk = json_encode([]);
				if ($total_correspondence == "undefined")
					$total_correspondence = json_encode([]);
				if ($total_risk_Rc == "undefined")
					$total_risk_Rc = json_encode([]);
				if ($total_paymentacknowledge_data == "undefined")
					$total_paymentacknowledge_data = json_encode([]);

				$policy_upload_file_name = "";
				if (!empty($_FILES["policy_upload"])) {
					$policy_upload_data = $_FILES["policy_upload"]["name"];

					$policy_upload_img = $this->file_lib->file_upload($img_name = "policy_upload", $directory_name = "./policy_document/" . date("Y") . "/" . date("m") . "/" . $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  $serial_no_year . "_" . $serial_no_month . "_" . $serial_no . "-" . $policy_no, $url = "", $user_session_id = "_Policy_No_");

					if ($policy_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["policy_upload_err"]  = $policy_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($policy_upload_img["file_name"] != "") {
						$policy_upload_file_name = $policy_upload_img["file_name"];
						$policy_upload_file_size = $policy_upload_img["file_size"];
						$policy_upload_file_type = $policy_upload_img["file_type"];
					}
				}

				$quotation_upload_file_name = "";
				if (!empty($_FILES["quotation_upload"])) {
					$quotation_upload_data = $_FILES["quotation_upload"]["name"];

					$quotation_upload_img = $this->file_lib->file_upload($img_name = "quotation_upload", $directory_name = "./policy_document/quotation_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  $serial_no_year . "_" . $serial_no_month . "_" . $serial_no . "-" . "quotation", $url = "", $user_session_id = "_Policy_No_");

					if ($quotation_upload_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["quotation_upload_err"]  = $quotation_upload_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($quotation_upload_img["file_name"] != "") {
						$quotation_upload_file_name = $quotation_upload_img["file_name"];
						$quotation_upload_file_size = $quotation_upload_img["file_size"];
						$quotation_upload_file_type = $quotation_upload_img["file_type"];
					}
				}

				if ($mode_of_premimum > 4) {
					if ($mode_of_premimum == 5)
						$counter = 2;
					elseif ($mode_of_premimum == 6)
						$counter = 3;
					elseif ($mode_of_premimum == 7)
						$counter = 4;
					elseif ($mode_of_premimum == 8)
						$counter = 5;
					elseif ($mode_of_premimum == 9)
						$counter = 6;
					elseif ($mode_of_premimum == 10)
						$counter = 7;
					elseif ($mode_of_premimum == 11)
						$counter = 8;
					elseif ($mode_of_premimum == 12)
						$counter = 9;
					elseif ($mode_of_premimum == 13)
						$counter = 10;

					$new_mode_of_pre = $mode_of_premimum;

					$new_policy_id = "";
					for ($i = 1; $i <= $counter; $i++) {
						$add_arr = array();
						$update_hypotication_arr = array();
						$update_hypotication_arr = array();
						$add_remarks_arr = array();
						$add_medi_hdfc_ergo_health_insu_policy_arr = array();

						if ($i == $counter){
							$next_year_premium_flag = 0;
							$mode_of_premimum = $new_mode_of_pre;
						}else{
							$next_year_premium_flag = 2;
							$mode_of_premimum = 4;
						}
				
						$date_from = explode("-", $date_from);
						if ($i == 1)
							$date_from[0] = $date_from[0];
						else
							$date_from[0] = $date_from[0] + 1;

						$new_date_from_year = $date_from[0];
						$policy_counter = 0;

						$this->load->model("Mcommon");
						$policy_counter_new = $this->Mcommon->get_policy_counter($serial_no_year = $new_date_from_year, $serial_no_month = $date_from[1]);
						
						if (empty($policy_counter_new))
							$policy_counter_data = 0;
						else
							$policy_counter_data = $policy_counter_new["policy_counter"];

						if ($policy_counter_data == 0 || $policy_counter_data == "") {
							$policy_counter = $policy_counter + 1;
						} else {
							$policy_counter_new = $policy_counter_data;
							$policy_counter = $policy_counter_new + 1;
						}
						$policy_counter_length = strlen((string)$policy_counter);
						$policy_counter = $policy_counter;

						if ($policy_counter_length == 1) {
							$serial_no = "000" . $policy_counter;
						} else if ($policy_counter_length == 2) {
							$serial_no = "00" . $policy_counter;
						} else if ($policy_counter_length == 3) {
							$serial_no = "0" . $policy_counter;
						}

						$date_from = $date_from[0] . "-" . $date_from[1] . "-" . $date_from[2];
						$date_to = explode("-", $date_to);
						$date_to[0] = $new_date_from_year + 1;
						$date_to = $date_to[0] . "-" . $date_to[1] . "-" . $date_to[2];

						if ($i > 1) {
							$date_from = date('Y-m-d', strtotime($date_from . ' - 1 days'));
							$date_to = date('Y-m-d', strtotime($date_to . ' - 1 days'));
						}

						$add_arr[$i] = array(
							'serial_no_year' => $serial_no_year,
							'serial_no_month' => $serial_no_month,
							'serial_no' => $serial_no,
							'fk_company_id' => $company,
							'fk_department_id' => $department,
							'fk_policy_type_id' => $policy_name,
							'fk_client_id' => $group_name,
							'fk_cust_member_id' => $policy_holder_name,
							'fk_agency_id' => $agency_code,
							'fk_sub_agent_id' => $sub_agency_code,
							'policy_type' => $policy_type,
							'mode_of_premimum' => $mode_of_premimum,
							'date_from' => $date_from,
							'date_to' => $date_to,
							'payment_date_from' => $payment_date_from,
							'payment_date_to' => $payment_date_to,
							'policy_no' => $policy_no,
							'pre_year_policy_no' => $pre_year_policy_no,
							'date_commenced' => $date_commenced,
							'policy_upload' => $policy_upload_file_name,
							'dynamic_path' => date("Y") . "/" . date("m") . "/" . $serial_no_year . "_" . $serial_no_month . "_" . $serial_no,
							'reg_mobile' => $reg_mobile,
							'reg_email' => $reg_email,
							'policy_counter' => $policy_counter,
							'family_size' => $family_size,
							'tpa_company' => $tpa_company,
							'addition_of_more_child' => $addition_of_more_child,
							'restore_cover' => $restore_cover,
							'maternity_new_born_baby_cover' => $maternity_new_born_baby_cover,
							'daily_cash_allowance_cover' => $daily_cash_allowance_cover,
							'floater_policy_type' => $floater_policy_type,
							'plan_policy_commission' => $comission_percentage,

							'next_year_premium_flag' => $next_year_premium_flag,
							'member_name_arr' => $member_name_arr,
							'current_sum_insured' => $current_sum_insured,
							'current_total_premium' => $current_total_premium,
							'riv' => $riv,
							'type_of_bussiness' => $type_of_bussiness,
							'description_of_stock' => $description_of_stock,
							'quotation_date' => $quotation_date,
							'quotation_upload' => $quotation_upload_file_name,
							'quotation_male_link' => $quotation_male_link,
							'renewal_count' => $renewal_count,
							'create_date' => date("Y-m-d h:i:s")
						);

						$query = $this->Mquery_model_v3->addQuery($tableName = "policy_member_details_dump", $add_arr, $return_type = "lastID");
						$policy_id = $query["lastID"];

						if (!empty($policy_id)) {
							$update_hypotication_arr[] = array(
								'hypotication_details' => $total_hypotication,
								'correspondence_details' => $total_correspondence,
								'total_paymentacknowledge_data' => $total_paymentacknowledge_data,
								'risk_details' => $total_risk,
								'risk_rc_details' => $total_risk_Rc,
								'policy_id' => $policy_id,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							$query1 = $this->Mquery_model_v3->updateBatchQuery($tableName1 = "policy_member_details_dump", $update_hypotication_arr, $updateKey = "policy_id", $whereArr = array("policy_id", $policy_id), $likeCondtnArr = array(), $whereInArray = array());
						}

						if (!empty($policy_id)) {
							if (!empty($total_remarks)) {
								$counts = count($total_remarks);
								for ($i = 0; $i < $counts; $i++) {
									$add_remarks_arr = array();
									$add_remarks_arr[$i] = array(
										'remarks' => $total_remarks[$i][0],
										'male_date' => $total_remarks[$i][1],
										'fk_policy_id' => $policy_id,
										'create_date' => date("Y-m-d h:i:s")
									);
								}
								$query = $this->Mquery_model_v3->addQuery($tableName = "policy_remark_details", $add_remarks_arr, $return_type = "lastID");
								$policy_remark_id = $query["lastID"];
							}
						}
						if (!empty($policy_id)) {
							$add_medi_hdfc_ergo_health_insu_policy_arr = array();
							$add_energy_medi_hdfc_ergo_health_insu_policy_arr = array();
							$add_suraksha_medi_hdfc_ergo_health_insu_policy_arr = array();
							$add_easy_rate_medi_hdfc_ergo_health_insu_policy_arr = array();
							$add_the_new_india_medi_2017_policy_arr = array();
							$add_max_bupa_reassure_ind_policy_arr = array();
							$add_star_health_red_carpet_ind_policy_arr = array();
							$add_star_health_comprehensive_ind_policy_arr = array();
							$add_mediclaim_policy_arr = array();
							$add_medi_ind2020_policy_arr = array();
							$add_care_adv_ind_policy_arr = array();
							$add_care_ind_policy_arr = array();
							$add_medi_hdfc_ergo_health_insu_float_policy_arr = array();
							$add_suraksha_float_medi_hdfc_ergo_health_insu_policy_arr = array();
							$add_float_easy_rate_medi_hdfc_ergo_health_insu_policy_arr = array();
							$add_the_new_india_medi_floater_policy_arr = array();
							$add_max_bupa_reassure_float_policy_arr = array();
							$add_star_health_red_carpet_float_policy_arr = array();
							$add_star_health_comprehensive_float_policy_arr = array();
							$add_mediclaim_floater_2014_policy_arr = array();
							$add_medi_floater_2020_policy_arr = array();
							$add_care_adv_float_policy_arr = array();
							$add_care_float_policy_arr = array();
							$add_common_ind_policy_arr = array();
							$add_common_float_policy_arr = array();
							$add_hdfc_ergo_supertopup_float_policy_arr = array();
							$add_the_new_india_supertopup_ind_policy_arr = array();
							$add_star_health_supertopup_float_policy_arr = array();
							$add_supertopup_floater_policy_arr = array();
							$add_hdfc_ergo_supertopup_ind_policy_arr = array();
							$add_the_new_india_supertopup_ind_single_policy_arr = array();
							$add_star_health_supertopup_ind_policy_arr = array();
							$add_supertopup_ind_policy_arr = array();
							$add_sookshma_fire_policy_dump_arr = array();
							$add_laghu_fire_policy_dump_arr = array();
							$add_griharaksha_fire_policy_dump_arr = array();
							$add_bharat_fire_allied_perils_policy_dump_arr = array();
							$add_burglary_policy_dump_arr = array();
							$add_term_plan_policy_arr = array();
							$add_shopkeeper_policy_arr = array();
							$add_jweller_policy_arr = array();
							$add_marine_policy_arr = array();
							$add_gmc_policy_arr = array();
							$add_gpa_policy_arr = array();
							$add_personal_accident_ind_policy_arr = array();
							$add_motor_private_car_policy_arr = array();
							$add_motor_two_wheeler_policy_arr = array();
							$add_motor_commercial_policy_arr = array();
							$add_other_policy_arr = array();
							$add_fire_rc_policy_dump_arr = array();

							if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Individual") { // Misslineous : Mediclaim Individual
								if ($policy_type != 3) {
									if ($policy_type_txt == "Individual") {
										if ($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") {
											if ($floater_policy_type == "Optima Restore") {
												$add_medi_hdfc_ergo_health_insu_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_medi_ind_hdfc_json_data' => $total_medi_ind_hdfc_json_data,
													'years_of_premium' => $years_of_premium,
													'region' => $region,
													'tot_premium' => $tot_premium,
													'protect_ride_prem_tot' => $protect_ride_prem_tot,
													'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
													'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
													'load_desc' => $load_desc,
													'load_tot' => $load_tot,
													'less_disc_per' => $less_disc_per,
													'less_disc_tot' => $less_disc_tot,
													'family_disc_per' => $family_disc_per,
													'family_disc_tot' => $family_disc_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_policy", $add_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
												$medi_hdfc_ergo_health_insu_policy_id = $query2["lastID"];
											} elseif ($floater_policy_type == "Energy") {
												$add_energy_medi_hdfc_ergo_health_insu_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_energy_medi_hdfc_json_data' => $total_energy_medi_hdfc_json_data,
													'tot_premium' => $tot_premium,
													'less_disc_per' => $less_disc_per,
													'less_disc_tot' => $less_disc_tot,
													'load_desc' => $load_desc,
													'load_tot' => $load_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_energy_policy", $add_energy_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
												$medi_hdfc_ergo_health_insu_energy_policy_id = $query2["lastID"];
											} elseif ($floater_policy_type == "Health Suraksha") {
												$add_suraksha_medi_hdfc_ergo_health_insu_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_suraksha_medi_hdfc_json_data' => $total_suraksha_medi_hdfc_json_data,
													'years_of_premium' => $years_of_premium,
													'region' => $region,
													'tot_premium' => $tot_premium,
													'load_desc' => $load_desc,
													'load_tot' => $load_tot,
													'less_disc_per' => $less_disc_per,
													'less_disc_tot' => $less_disc_tot,
													'family_disc_per' => $family_disc_per,
													'family_disc_tot' => $family_disc_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_policy", $add_suraksha_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
												$medi_hdfc_ergo_health_insu_suraksha_policy_id = $query2["lastID"];
											} elseif ($floater_policy_type == "Easy Health") {
												$add_easy_rate_medi_hdfc_ergo_health_insu_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_easy_medi_hdfc_json_data' => $total_easy_medi_hdfc_json_data,
													'years_of_premium' => $years_of_premium,
													'region' => $region,
													'tot_premium' => $tot_premium,
													'protect_ride_prem_tot' => $protect_ride_prem_tot,
													'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
													'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
													'load_desc' => $load_desc,
													'load_tot' => $load_tot,
													'less_disc_per' => $less_disc_per,
													'tot_basic_prem' => $tot_basic_prem,
													'less_disc_tot' => $less_disc_tot,
													'family_disc_per' => $family_disc_per,
													'family_disc_tot' => $family_disc_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_policy", $add_easy_rate_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
												$medi_hdfc_ergo_health_insu_easy_policy_id  = $query2["lastID"];
											}
										} elseif ($company_txt == "The New India Assurance Co Ltd") {
											if ($floater_policy_type == "New India Mediclaim Policy 2017") {
												$add_the_new_india_medi_2017_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_the_new_india_medi_tns_hdfc_json_data' => $total_the_new_india_medi_tns_hdfc_json_data,
													'tot_premium' => $tot_premium,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_medi_policy_2017_ind_assu_policy", $add_the_new_india_medi_2017_policy_arr, $return_type = "lastID");
												$medi_insu_new_india_tns_assu_ind_policy_id = $query2["lastID"];
											}
										} elseif ($company_txt == "Max Bupa Health Insurance Co Ltd") {
											if ($floater_policy_type == "Reassure") {
												$add_max_bupa_reassure_ind_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_max_bupa_medi_reassure_json_data' => $total_max_bupa_medi_reassure_json_data,

													'years_of_premium' => $years_of_premium,
													'region' => $region,
													'first_year_rate' => $first_year_rate,
													'second_year_rate' => $second_year_rate,
													'third_year_rate' => $third_year_rate,
													'first_year_tot' => $first_year_tot,
													'second_year_tot' => $second_year_tot,
													'third_year_tot' => $third_year_tot,
													'tot_term_disc' => $tot_term_disc,

													'tot_premium' => $tot_premium,
													'stand_instu_rate' => $stand_instu_rate,
													'stand_instu_tot' => $stand_instu_tot,
													'doctor_disc_per' => $doctor_disc_per,
													'doctor_disc_tot' => $doctor_disc_tot,
													'family_disc_per' => $family_disc_per,
													'family_disc_tot' => $family_disc_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,

													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "max_bupa_reassure_ind_policy", $add_max_bupa_reassure_ind_policy_arr, $return_type = "lastID");
												$medi_max_bupa_reassure_ind_policy_id  = $query2["lastID"];
											}
										} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
											if ($floater_policy_type == "Red Carpet") {
												$add_star_health_red_carpet_ind_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_star_health_red_carpet_medi_ind_json_data' => $total_star_health_red_carpet_medi_ind_json_data,

													'years_of_premium' => $years_of_premium,

													'tot_premium' => $tot_premium,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_red_carpet_ind_policy", $add_star_health_red_carpet_ind_policy_arr, $return_type = "lastID");
												$medi_star_health_ind_policy_id   = $query2["lastID"];
											} elseif ($floater_policy_type == "Comprehensive") {
												$add_star_health_comprehensive_ind_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_star_health_comprehensive_medi_ind_json_data' => $total_star_health_comprehensive_medi_ind_json_data,

													'years_of_premium' => $years_of_premium,

													'tot_premium' => $tot_premium,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_comprehensive_ind_policy", $add_star_health_comprehensive_ind_policy_arr, $return_type = "lastID");
												$medi_star_health_comp_ind_policy_id   = $query2["lastID"];
											}
										} elseif ($company_txt == "United India Insurance Co Ltd") {
											if ($floater_policy_type == "Individual Health Insurance Policy") {
												$add_mediclaim_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'policy_name_txt' => $policy_name_txt,
													'tot_mediclaim_json' => $total_mediclaim,
													'medi_total_ncd_amount' => $medi_total_ncd_amount,
													'medi_total_amount' => $medi_total_amount,
													'medi_family_disc_rate' => $medi_family_disc_rate,
													'medi_family_disc_tot' => $medi_family_disc_tot,
													'medi_premium_after_fd' => $medi_premium_after_fd,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "mediclaim_policy", $add_mediclaim_policy_arr, $return_type = "lastID");
												$mediclaim_policy_id = $query2["lastID"];
											} elseif ($floater_policy_type == "Floater 2020(Individual)") {
												$add_medi_ind2020_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'policy_name_txt' => $policy_name_txt,
													'tot_medi_ind2020_json' => $total_mediclaim_indi2020,
													'medi_ind_2020_total_premium' => $medi_ind_2020_total_premium,
													'medi_ind_2020_family_descount_per' => $medi_ind_2020_family_descount_per,
													'medi_ind_2020_family_descount_tot' => $medi_ind_2020_family_descount_tot,
													'medi_ind_2020_load_description' => $medi_ind_2020_load_description,
													'medi_ind_2020_load_amount' => $medi_ind_2020_load_amount,
													'medi_ind_2020_restore_cover_premium' => $medi_ind_2020_restore_cover_premium,
													'medi_ind_2020_maternity_new_bornbaby' => $medi_ind_2020_maternity_new_bornbaby,
													'medi_ind_2020_daily_cash_allow_hosp' => $medi_ind_2020_daily_cash_allow_hosp,
													'medi_ind_2020_load_gross_premium' => $medi_ind_2020_load_gross_premium,
													'new_load_gross_premium' => $new_load_gross_premium,
													'medi_ind_2020_cgst_rate' => $medi_ind_2020_cgst_rate,
													'medi_ind_2020_cgst_tot' => $medi_ind_2020_cgst_tot,
													'medi_ind_2020_sgst_rate' => $medi_ind_2020_sgst_rate,
													'medi_ind_2020_sgst_tot' => $medi_ind_2020_sgst_tot,
													'medi_ind_2020_final_premium' => $medi_ind_2020_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_ind2020_policy", $add_medi_ind2020_policy_arr, $return_type = "lastID");
												$medi_ind2020_policy_id = $query2["lastID"];
											}
										} elseif ($company_txt == "Care Health Insurance Co Ltd") {
											if ($floater_policy_type == "Care Advantage") {
												$add_care_adv_ind_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_care_adv_ind_json_data' => $total_care_adv_ind_json_data,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_adv_ind_policy", $add_care_adv_ind_policy_arr, $return_type = "lastID");
												$care_adv_ind_id  = $query2["lastID"];
											} elseif ($floater_policy_type == "Care") {
												$add_care_ind_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_care_ind_json_data' => $total_care_ind_json_data,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_ind_policy", $add_care_ind_policy_arr, $return_type = "lastID");
												$care_ind_id  = $query2["lastID"];
											}
										}
									}
								}
							}


							if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") { // Misslineous : Mediclaim Floater

								if ($policy_type != 3) {
									if ($policy_type_txt == "Floater") {
										if ($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") {
											if ($floater_policy_type == "Optima Restore") {
												$add_medi_hdfc_ergo_health_insu_float_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_medi_float_hdfc_json_data' => $total_medi_float_hdfc_json_data,
													'years_of_premium' => $years_of_premium,
													'region' => $region,
													'tot_premium' => $tot_premium,
													'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
													'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
													'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
													'protect_ride_prem_tot' => $protect_ride_prem_tot,
													'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
													'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
													'load_desc' => $load_desc,
													'load_tot' => $load_tot,
													'less_disc_per' => $less_disc_per,
													'less_disc_tot' => $less_disc_tot,
													'stay_active_benefit' => $stay_active_benefit,
													'stay_active_benefit_prem_tot' => $stay_active_benefit_prem_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_float_policy", $add_medi_hdfc_ergo_health_insu_float_policy_arr, $return_type = "lastID");
												$medi_hdfc_ergo_health_insu_float_policy_id = $query2["lastID"];
											} elseif ($floater_policy_type == "Health Suraksha") {
												$add_suraksha_float_medi_hdfc_ergo_health_insu_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_suraksha_float_medi_hdfc_json_data' => $total_suraksha_float_medi_hdfc_json_data,
													'years_of_premium' => $years_of_premium,
													'region' => $region,
													'tot_premium' => $tot_premium,
													'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
													'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
													'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
													'load_desc' => $load_desc,
													'load_tot' => $load_tot,
													'less_disc_per' => $less_disc_per,
													'less_disc_tot' => $less_disc_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_floater_policy", $add_suraksha_float_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
												$medi_hdfc_ergo_health_float_suraksha_policy_id = $query2["lastID"];
											} elseif ($floater_policy_type == "Easy Health") {
												$add_float_easy_rate_medi_hdfc_ergo_health_insu_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_easy_float_medi_hdfc_json_data' => $total_easy_float_medi_hdfc_json_data,
													'years_of_premium' => $years_of_premium,
													'region' => $region,
													'tot_premium' => $tot_premium,
													'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
													'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
													'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
													'protect_ride_prem_tot' => $protect_ride_prem_tot,
													'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
													'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
													'load_desc' => $load_desc,
													'load_tot' => $load_tot,
													'less_disc_per' => $less_disc_per,
													'tot_basic_prem' => $tot_basic_prem,
													'less_disc_tot' => $less_disc_tot,
													'stay_active_benefit' => $stay_active_benefit,
													'stay_active_benefit_prem' => $stay_active_benefit_prem,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_easy_rate_card_float_policy", $add_float_easy_rate_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
												$medi_hdfc_ergo_health_insu_easy_float_policy_id  = $query2["lastID"];
											}
										} elseif ($company_txt == "The New India Assurance Co Ltd") {
											if ($floater_policy_type == "New India Floater Mediclaim") {
												$add_the_new_india_medi_floater_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_the_new_india_medi_float_json_data' => $total_the_new_india_medi_float_json_data,
													'tot_premium' => $tot_premium,
													'floater_disc_rate' => $floater_disc_rate,
													'floater_disc_tot' => $floater_disc_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_medi_floater_assu_policy", $add_the_new_india_medi_floater_policy_arr, $return_type = "lastID");
												$medi_new_india_assu_float_policy_id = $query2["lastID"];
											}
										} elseif ($company_txt == "Max Bupa Health Insurance Co Ltd") {
											if ($floater_policy_type == "Reassure") {
												$add_max_bupa_reassure_float_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_max_bupa_medi_float_reassure_json_data' => $total_max_bupa_medi_float_reassure_json_data,

													'years_of_premium' => $years_of_premium,
													'region' => $region,
													'first_year_rate' => $first_year_rate,
													'second_year_rate' => $second_year_rate,
													'third_year_rate' => $third_year_rate,
													'first_year_tot' => $first_year_tot,
													'second_year_tot' => $second_year_tot,
													'third_year_tot' => $third_year_tot,
													'tot_term_disc' => $tot_term_disc,

													'tot_premium' => $tot_premium,
													'stand_instu_rate' => $stand_instu_rate,
													'stand_instu_tot' => $stand_instu_tot,
													'doctor_disc_per' => $doctor_disc_per,
													'doctor_disc_tot' => $doctor_disc_tot,
													'gross_premium_tot' => $gross_premium_tot,
													'gross_premium_tot_new' => $gross_premium_tot_new,

													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "max_bupa_reassure_floater_policy", $add_max_bupa_reassure_float_policy_arr, $return_type = "lastID");
												$medi_max_bupa_reassure_float_policy_id  = $query2["lastID"];
											}
										} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
											if ($floater_policy_type == "Red Carpet") {
												$add_star_health_red_carpet_float_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_star_health_red_carpet_medi_float_json_data' => $total_star_health_red_carpet_medi_float_json_data,

													'years_of_premium' => $years_of_premium,

													'tot_premium' => $tot_premium,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);
												$query3 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_red_carpet_float_policy", $add_star_health_red_carpet_float_policy_arr, $return_type = "lastID");
												$medi_star_health_float_policy_id  = $query3["lastID"];

											} elseif ($floater_policy_type == "Comprehensive") {
												$add_star_health_comprehensive_float_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_star_health_comprehensive_medi_float_json_data' => $total_star_health_comprehensive_medi_float_json_data,

													'years_of_premium' => $years_of_premium,

													'tot_premium' => $tot_premium,
													'medi_cgst_rate' => $medi_cgst_rate,
													'medi_cgst_tot' => $medi_cgst_tot,
													'medi_sgst_rate' => $medi_sgst_rate,
													'medi_sgst_tot' => $medi_sgst_tot,
													'medi_final_premium' => $medi_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);
												$query3 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_comprehensive_float_policy", $add_star_health_comprehensive_float_policy_arr, $return_type = "lastID");
												$medi_star_health_comp_float_policy_id  = $query3["lastID"];
											}
										} elseif ($company_txt == "United India Insurance Co Ltd") {
											if ($floater_policy_type == "Family Floater 2014") {
												$add_mediclaim_floater_2014_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'policy_name_txt' => $policy_name_txt,
													'tot_medi_floater_2014_json' => $total_mediclaim_floater2014,
													'name_insured_sum_insured' => $name_insured_sum_insured,
													'name_insured_premium' => $name_insured_premium,
													'medi_float_2014_total_premium' => $medi_float_2014_total_premium,
													'medi_float_2014_child_count' => $medi_float_2014_child_count,
													'medi_float_2014_child_count_first_premium' => $medi_float_2014_child_count_first_premium,
													'medi_float_2014_child_total_premium' => $medi_float_2014_child_total_premium,
													'medi_float_2014_load_description' => $medi_float_2014_load_description,
													'medi_float_2014_load_amount' => $medi_float_2014_load_amount,
													'medi_float_2014_load_gross_premium' => $medi_float_2014_load_gross_premium,
													'medi_float_2014_cgst_rate' => $medi_float_2014_cgst_rate,
													'medi_float_2014_cgst_tot' => $medi_float_2014_cgst_tot,
													'medi_float_2014_sgst_rate' => $medi_float_2014_sgst_rate,
													'medi_float_2014_sgst_tot' => $medi_float_2014_sgst_tot,
													'medi_float_2014_final_premium' => $medi_float_2014_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);
												$query2 = $this->Mquery_model_v3->addQuery($tableName = "mediclaim_floater_2014_policy", $add_mediclaim_floater_2014_policy_arr, $return_type = "lastID");
												$medi_floater_2014_id = $query2["lastID"];
											} elseif ($floater_policy_type == "Family Floater 2020") {
												$add_medi_floater_2020_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'policy_name_txt' => $policy_name_txt,
													'tot_medi_floater_2020_json' => $total_mediclaim_floater2020,
													'name_insured_sum_insured' => $name_insured_sum_insured,
													'name_insured_premium' => $name_insured_premium,
													'name_insured_ncd' => $name_insured_ncd,
													'name_insured_premium_after_ncd' => $name_insured_premium_after_ncd,
													'medi_float_2020_total_premium' => $medi_float_2020_total_premium,
													'medi_float_2020_child_count' => $medi_float_2020_child_count,
													'medi_float_2020_child_count_first_premium' => $medi_float_2020_child_count_first_premium,
													'medi_float_2020_child_total_premium' => $medi_float_2020_child_total_premium,
													'medi_float_2020_load_description' => $medi_float_2020_load_description,
													'medi_float_2020_load_amount' => $medi_float_2020_load_amount,
													'medi_float_2020_restore_cover_premium' => $medi_float_2020_restore_cover_premium,
													'medi_float_2020_maternity_new_bornbaby' => $medi_float_2020_maternity_new_bornbaby,
													'medi_float_2020_daily_cash_allow_hosp' => $medi_float_2020_daily_cash_allow_hosp,
													'medi_float_2020_load_gross_premium' => $medi_float_2020_load_gross_premium,
													'medi_float_2020_cgst_rate' => $medi_float_2020_cgst_rate,
													'medi_float_2020_cgst_tot' => $medi_float_2020_cgst_tot,
													'medi_float_2020_sgst_rate' => $medi_float_2020_sgst_rate,
													'medi_float_2020_sgst_tot' => $medi_float_2020_sgst_tot,
													'medi_float_2020_final_premium' => $medi_float_2020_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);
												$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_floater_2020_policy", $add_medi_floater_2020_policy_arr, $return_type = "lastID");
												$medi_floater_2020_id = $query2["lastID"];
											}
										} elseif ($company_txt == "Care Health Insurance Co Ltd") {
											if ($floater_policy_type == "Care Advantage") {
												$add_care_adv_float_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_care_adv_float_json_data' => $total_care_adv_float_json_data,
													'medi_final_premium' => $medi_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_adv_float_policy", $add_care_adv_float_policy_arr, $return_type = "lastID");
												$care_adv_float_id  = $query2["lastID"];
											} elseif ($floater_policy_type == "Care") {
												$add_care_float_policy_arr[] = array(
													'fk_policy_id' => $policy_id,
													'fk_policy_type_id' => $policy_name,
													'fk_company_id' => $company,
													'fk_department_id' => $department,
													'policy_name_txt' => $policy_name_txt,
													'total_care_float_json_data' => $total_care_float_json_data,
													'medi_final_premium' => $medi_final_premium,
													'max_age' => $max_age,
													'create_date' => date("Y-m-d h:i:s")
												);

												$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_float_policy", $add_care_float_policy_arr, $return_type = "lastID");
												$care_float_id  = $query2["lastID"];
											}
										}
									}
								}
							}

							if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Individual") { // Misslineous : Mediclaim : Common Individual
								if ($policy_type != 3) {
									$add_common_ind_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'tot_commind_json_data' => $tot_commind_json_data,
										'comm_ind_total_amount' => $comm_ind_total_amount,
										'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
										'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
										'comm_ind_load_desc' => $comm_ind_load_desc,
										'comm_ind_load_tot' => $comm_ind_load_tot,
										'comm_ind_gross_premium' => $comm_ind_gross_premium,
										'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
										'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
										'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
										'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
										'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
										'comm_ind_final_premium' => $comm_ind_final_premium,
										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_ind_policy", $add_common_ind_policy_arr, $return_type = "lastID");
									$common_ind_policy_id = $query2["lastID"];
								}
							}

							if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Floater") { // Misslineous : Mediclaim : Common Floater
								if ($policy_type != 3) {
									$add_common_float_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'tot_commfloat_json_data' => $tot_commfloat_json_data,
										'comm_float_total_amount' => $comm_float_total_amount,
										'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
										'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
										'comm_float_load_desc' => $comm_float_load_desc,
										'comm_float_load_tot' => $comm_float_load_tot,
										'comm_float_gross_premium' => $comm_float_gross_premium,
										'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
										'comm_float_cgst_rate' => $comm_float_cgst_rate,
										'comm_float_cgst_tot' => $comm_float_cgst_tot,
										'comm_float_sgst_rate' => $comm_float_sgst_rate,
										'comm_float_sgst_tot' => $comm_float_sgst_tot,
										'comm_float_final_premium' => $comm_float_final_premium,
										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_float_policy", $add_common_float_policy_arr, $return_type = "lastID");
									$common_float_policy_id = $query2["lastID"];
								}
							}

							if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater")) { // Misslineous : Super Top Up :floater
								if ($policy_type != 3) {
									if ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater") {
										if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Floater") {
											$add_hdfc_ergo_supertopup_float_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'tot_supertopup_float_hdfc_json' => $tot_supertopup_float_hdfc_json,
												'years_of_premium' => $years_of_premium,
												'tot_premium' => $tot_premium,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_super_topup_floater_policy", $add_hdfc_ergo_supertopup_float_policy_arr, $return_type = "lastID");
											$supertopup_float_policy_id = $query2["lastID"];
										} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Floater") {
											$add_the_new_india_supertopup_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_the_new_india_supertopup_ind_json_data' => $total_the_new_india_supertopup_ind_json_data,
												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_supertopup_ind_assu_policy", $add_the_new_india_supertopup_ind_policy_arr, $return_type = "lastID");
											$the_new_india_supertopup_assu_ind_policy_id = $query2["lastID"];
										} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Floater") {
											$add_star_health_supertopup_float_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_supertopup_float_json_data' => $total_star_health_supertopup_float_json_data,
												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_supertopup_float_policy", $add_star_health_supertopup_float_policy_arr, $return_type = "lastID");
											$medi_star_health_super_float_policy_id = $query2["lastID"];
										} else {
											$add_supertopup_floater_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_supertopup_floater_json' => $tot_supertopup_floater_json,
												'name_insured_policy_option' => $name_insured_policy_option,
												'name_insured_deductable_thershold' => $name_insured_deductable_thershold,
												'name_insured_sum_insured' => $name_insured_sum_insured,
												'name_insured_premium' => $name_insured_premium,
												'supertopup_floater_total_premium' => $supertopup_floater_total_premium,
												'supertopup_floater_load_description' => $supertopup_floater_description,
												'supertopup_floater_load_amount' => $supertopup_floater_load_amount,
												'supertopup_floater_load_gross_premium' => $supertopup_floater_load_gross_premium,
												'supertopup_floater_cgst_rate' => $supertopup_floater_cgst_rate,
												'supertopup_floater_cgst_tot' => $supertopup_floater_cgst_tot,
												'supertopup_floater_sgst_rate' => $supertopup_floater_sgst_rate,
												'supertopup_floater_sgst_tot' => $supertopup_floater_sgst_tot,
												'supertopup_floater_final_premium' => $supertopup_floater_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "super_top_up_floater_policy", $add_supertopup_floater_policy_arr, $return_type = "lastID");
											$supertopup_floater_policy_id = $query2["lastID"];
										}
									}
								}
							}

							if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual")) { // Misslineous : Super Top Up :floater
								if ($policy_type != 3) {
									if ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual") {
										if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Individual") {
											$add_hdfc_ergo_supertopup_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'tot_supertopup_ind_hdfc_json' => $tot_supertopup_ind_hdfc_json,
												'years_of_premium' => $years_of_premium,
												'tot_premium' => $tot_premium,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_super_topup_policy", $add_hdfc_ergo_supertopup_ind_policy_arr, $return_type = "lastID");
											$supertopup_ind_policy_id = $query2["lastID"];
										} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Individual") {
											$add_the_new_india_supertopup_ind_single_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_the_new_india_supertopup_ind_single_json_data' => $total_the_new_india_supertopup_ind_single_json_data,
												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_supertopup_ind_single_assu_policy", $add_the_new_india_supertopup_ind_single_policy_arr, $return_type = "lastID");
											$the_new_india_supertopup_assu_ind_single_policy_id = $query2["lastID"];
										} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Individual") {
											$add_star_health_supertopup_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_supertopup_ind_json_data' => $total_star_health_supertopup_ind_json_data,
												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_supertopup_ind_policy", $add_star_health_supertopup_ind_policy_arr, $return_type = "lastID");
											$medi_star_health_super_ind_policy_id = $query2["lastID"];
										} else {
											$add_supertopup_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_supertopup_ind_json' => $tot_supertopup_ind_json,
												'supertopup_ind_total_premium' => $supertopup_ind_total_premium,
												'supertopup_ind_load_description' => $supertopup_ind_description,
												'supertopup_ind_load_amount' => $supertopup_ind_load_amount,
												'supertopup_ind_load_gross_premium' => $supertopup_ind_load_gross_premium,
												'supertopup_ind_cgst_rate' => $supertopup_ind_cgst_rate,
												'supertopup_ind_cgst_tot' => $supertopup_ind_cgst_tot,
												'supertopup_ind_sgst_rate' => $supertopup_ind_sgst_rate,
												'supertopup_ind_sgst_tot' => $supertopup_ind_sgst_tot,
												'supertopup_ind_final_premium' => $supertopup_ind_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "supertopup_ind_policy", $add_supertopup_ind_policy_arr, $return_type = "lastID");
											$supertopup_ind_policy_id = $query2["lastID"];
										}
									}
								}
							}

							if ($policy_name_txt == "Bharat Sookshma Udyam") {
								if ($policy_type != 3) {
									$add_sookshma_fire_policy_dump_arr[] = array(
										'fk_policy_id' => $policy_id,
										'total_sum_assured' => $total_sum_assured,
										'fire_rate_per' => $fire_rate_per,
										'fire_rate_tot_amount' => $fire_rate_tot,
										'less_discount_per' => $less_discount_per,
										'less_discount_tot_amount' => $less_discount_tot,
										'fire_rate_after_discount' => $fire_rate_after_discount_tot,
										'gross_premium' => $gross_premium,
										'cgst_rate_per' => $cgst_fire_per,
										'cgst_tot_amount' => $cgst_fire_tot,
										'sgst_rate_per' => $sgst_fire_per,
										'sgst_tot_amount' => $sgst_fire_tot,
										'final_payable_premium' => $final_paybal_premium,
										'create_date' => date("Y-m-d h:i:s")
									);
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "sookshma_fire_policy_dump", $add_sookshma_fire_policy_dump_arr, $return_type = "lastID");
									$sookshma_fire_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Bharat Laghu Udyam") {
								if ($policy_type != 3) {
									$add_laghu_fire_policy_dump_arr[] = array(
										'fk_policy_id' => $policy_id,
										'total_sum_assured' => $total_sum_assured,
										'fire_rate_per' => $fire_rate_per,
										'fire_rate_tot_amount' => $fire_rate_tot,
										'less_discount_per' => $less_discount_per,
										'less_discount_tot_amount' => $less_discount_tot,
										'fire_rate_after_discount' => $fire_rate_after_discount_tot,
										'gross_premium' => $gross_premium,
										'cgst_rate_per' => $cgst_fire_per,
										'cgst_tot_amount' => $cgst_fire_tot,
										'sgst_rate_per' => $sgst_fire_per,
										'sgst_tot_amount' => $sgst_fire_tot,
										'final_payable_premium' => $final_paybal_premium,
										'create_date' => date("Y-m-d h:i:s")
									);
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "laghu_fire_policy_dump", $add_laghu_fire_policy_dump_arr, $return_type = "lastID");
									$laghu_fire_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Bharat Griha Raksha") {
								if ($policy_type != 3) {
									$add_griharaksha_fire_policy_dump_arr[] = array(
										'fk_policy_id' => $policy_id,
										'total_sum_assured' => $total_sum_assured,
										'fire_rate_per' => $fire_rate_per,
										'fire_rate_tot_amount' => $fire_rate_tot,
										'less_discount_per' => $less_discount_per,
										'less_discount_tot_amount' => $less_discount_tot,
										'fire_rate_after_discount' => $fire_rate_after_discount_tot,
										'gross_premium' => $gross_premium,
										'cgst_rate_per' => $cgst_fire_per,
										'cgst_tot_amount' => $cgst_fire_tot,
										'sgst_rate_per' => $sgst_fire_per,
										'sgst_tot_amount' => $sgst_fire_tot,
										'final_payable_premium' => $final_paybal_premium,
										'create_date' => date("Y-m-d h:i:s")
									);
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "griharaksha_fire_policy_dump", $add_griharaksha_fire_policy_dump_arr, $return_type = "lastID");
									$griharaksha_fire_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Standard Fire & Allied Perils") {
								if ($policy_type != 3) {
									$add_bharat_fire_allied_perils_policy_dump_arr[] = array(
										'fk_policy_id' => $policy_id,
										'allied_perils_total_sum_assured' => $total_sum_assured,
										'allied_perils_fire_rate_per' => $fire_rate_per,
										'allied_perils_fire_rate_tot_amount' => $fire_rate_tot,
										'allied_perils_less_discount_per' => $less_discount_per,
										'allied_perils_less_discount_tot_amount' => $less_discount_tot,
										'allied_perils_fire_rate_after_discount' => $fire_rate_after_discount_tot,

										'allied_perils_stfi_rate' => $stfi_rate_per,
										'allied_perils_stfi_rate_total' => $stfi_rate_total,
										'allied_perils_earthquake_rate' => $earthquake_rate_per,
										'allied_perils_earthquake_rate_total' => $earthquake_rate_total,
										'allied_perils_terrorisum_rate' => $terrorisum_rate_per,
										'allied_perils_terrorisum_rate_total' => $terrorisum_rate_total,
										'tot_sum_devid' => $tot_sum_devid,

										'allied_perils_gross_premium' => $gross_premium,
										'allied_perils_cgst_rate_per' => $cgst_fire_per,
										'allied_perils_cgst_tot_amount' => $cgst_fire_tot,
										'allied_perils_sgst_rate_per' => $sgst_fire_per,
										'allied_perils_sgst_tot_amount' => $sgst_fire_tot,
										'allied_perils_final_payable_premium' => $final_paybal_premium,
										'create_date' => date("Y-m-d h:i:s")
									);
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "bharat_fire_allied_perils_policy_dump", $add_bharat_fire_allied_perils_policy_dump_arr, $return_type = "lastID");
									$fire_allied_perils_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Burglary") {
								if ($policy_type != 3) {
									$add_burglary_policy_dump_arr[] = array(
										'fk_policy_id' => $policy_id,
										'burglary_total_sum_assured' => $total_sum_assured,
										'burglary_fire_rate_per' => $fire_rate_per,
										'burglary_fire_rate_tot_amount' => $fire_rate_tot,
										'burglary_less_discount_per' => $less_discount_per,
										'burglary_less_discount_tot_amount' => $less_discount_tot,
										'burglary_fire_rate_after_discount' => $fire_rate_after_discount_tot,
										'burglary_gross_premium' => $gross_premium,
										'burglary_cgst_rate_per' => $cgst_fire_per,
										'burglary_cgst_tot_amount' => $cgst_fire_tot,
										'burglary_sgst_rate_per' => $sgst_fire_per,
										'burglary_sgst_tot_amount' => $sgst_fire_tot,
										'burglary_final_payable_premium' => $final_paybal_premium,
										'create_date' => date("Y-m-d h:i:s")
									);
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "burglary_policy_dump", $add_burglary_policy_dump_arr, $return_type = "lastID");
									$burglary_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Term Plan") { // Life Insurence : Term Plan
								if ($policy_type != 3) {
									$add_term_plan_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'term_plan_policy' => $policy_term,
										'term_plan_premium_paying_term' => $premium_paying_term,
										'term_plan_total_sum_insured' => $sum_insured,
										'term_plan_basic_premium' => $basic_premium,
										'term_plan_add_loading' => $add_loading,
										'term_plan_loading_description' => $loading_description,
										'term_plan_premium_after_loading' => $premium_after_loading,
										'term_plan_cgst' => $cgst_term_plan,
										'term_plan_sgst' => $sgst_term_plan,
										'term_plan_cgst_tot_ammount' => $cgst_term_plan_tot,
										'term_plan_sgst_tot_ammount' => $sgst_term_plan_tot,
										'term_plan_final_paybal_premium' => $term_plan_final_paybal_premium,
										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "term_plan_policy", $add_term_plan_policy_arr, $return_type = "lastID");
									$burglary_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Shopkeeper") { // Shopkeeper:misleneous
								if ($policy_type != 3) {
									$add_shopkeeper_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'shopkeeper_risk_address' => $shopkeeper_risk_address,
										'fire_sum_insured_1' => $fire_sum_insured_1,
										'fire_sum_insured_2' => $fire_sum_insured_2,
										'fire_sum_insured_3' => $fire_sum_insured_3,
										'fire_rate_1' => $fire_rate_1,
										'fire_rate_2' => $fire_rate_2,
										'fire_rate_3' => $fire_rate_3,
										'fire_premium_1' => $fire_premium_1,
										'fire_premium_2' => $fire_premium_2,
										'fire_premium_3' => $fire_premium_3,

										'burglary_sum_insured_1' => $burglary_sum_insured_1,
										'burglary_sum_insured_2' => $burglary_sum_insured_2,
										'burglary_sum_insured_3' => $burglary_sum_insured_3,
										'burglary_rate_1' => $burglary_rate_1,
										'burglary_rate_2' => $burglary_rate_2,
										'burglary_rate_3' => $burglary_rate_3,
										'burglary_premium_1' => $burglary_premium_1,
										'burglary_premium_2' => $burglary_premium_2,
										'burglary_premium_3' => $burglary_premium_3,

										'money_insu_sum_insured_1' => $money_insu_sum_insured_1,
										'money_insu_sum_insured_2' => $money_insu_sum_insured_2,
										'money_insu_sum_insured_3' => $money_insu_sum_insured_3,
										'money_insu_rate_1' => $money_insu_rate_1,
										'money_insu_rate_2' => $money_insu_rate_2,
										'money_insu_rate_3' => $money_insu_rate_3,
										'money_insu_premium_1' => $money_insu_premium_1,
										'money_insu_premium_2' => $money_insu_premium_2,
										'money_insu_premium_3' => $money_insu_premium_3,

										'plate_glass_sum_insured' => $plate_glass_sum_insured,
										'plate_glass_rate_per' => $plate_glass_rate_per,
										'plate_glass_premium' => $plate_glass_premium,

										'neon_glow_sum_insured' => $neon_glow_sum_insured,
										'neon_glow_rate_per' => $neon_glow_rate_per,
										'neon_glow_premium' => $neon_glow_premium,

										'baggage_ins_sum_insured' => $baggage_ins_sum_insured,
										'baggage_ins_rate_per' => $baggage_ins_rate_per,
										'baggage_ins_premium' => $baggage_ins_premium,

										'personal_accident_json' => $total_personal_accident,
										'personal_accident_sum_insured' => $personal_accident_sum_insured,
										'personal_accident_rate_per' => $personal_accident_rate_per,
										'personal_accident_premium' => $personal_accident_premium,

										'fidelity_gaur_json' => $total_fidelity_gaur,
										'fidelity_gaur_sum_insured' => $fidelity_gaur_sum_insured,
										'fidelity_gaur_rate_per' => $fidelity_gaur_rate_per,
										'fidelity_gaur_premium' => $fidelity_gaur_premium,

										'pub_libility_sum_insured' => $pub_libility_sum_insured,
										'work_men_compens_sum_insured' => $work_men_compens_sum_insured,
										'pub_libility_rate' => $pub_libility_rate,
										'work_men_compens_rate' => $work_men_compens_rate,
										'pub_libility_premium' => $pub_libility_premium,
										'work_men_compens_premium' => $work_men_compens_premium,

										'bus_inter_sum_insured_1' => $bus_inter_sum_insured_1,
										'bus_inter_sum_insured_2' => $bus_inter_sum_insured_2,
										'bus_inter_sum_insured_3' => $bus_inter_sum_insured_3,
										'bus_inter_rate_1' => $bus_inter_rate_1,
										'bus_inter_rate_2' => $bus_inter_rate_2,
										'bus_inter_rate_3' => $bus_inter_rate_3,
										'bus_inter_premium_1' => $bus_inter_premium_1,
										'bus_inter_premium_2' => $bus_inter_premium_2,
										'bus_inter_premium_3' => $bus_inter_premium_3,

										'shopkeeper_total_sum_assured' => $shopkeeper_total_sum_assured,
										'shopkeeper_total_premium' => $shopkeeper_total_premium,
										'shopkeeper_less_discount_per' => $shopkeeper_less_discount_per,
										'shopkeeper_less_discount_tot' => $shopkeeper_less_discount_tot,
										'shopkeeper_fire_rate_after_discount_tot' => $shopkeeper_fire_rate_after_discount_tot,
										'shopkeeper_cgst_fire_per' => $shopkeeper_cgst_fire_per,
										'shopkeeper_cgst_fire_tot' => $shopkeeper_cgst_fire_tot,
										'shopkeeper_sgst_fire_per' => $shopkeeper_sgst_fire_per,
										'shopkeeper_sgst_fire_tot' => $shopkeeper_sgst_fire_tot,
										'shopkeeper_final_paybal_premium' => $shopkeeper_final_paybal_premium,

										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "shopkeeper_policy", $add_shopkeeper_policy_arr, $return_type = "lastID");
									$shopkeeper_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Jweller Block") { // Jweller Block:misleneous
								if ($policy_type != 3) {
									$add_jweller_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,

										'stock_premises_sum_insu_1' => $stock_premises_sum_insu_1,
										'stock_premises_sum_insu_2' => $stock_premises_sum_insu_2,
										'stock_premises_sum_insu_3' => $stock_premises_sum_insu_3,
										'stock_premises_sum_insu_4' => $stock_premises_sum_insu_4,
										'stock_premises_sum_insu_5' => $stock_premises_sum_insu_5,
										'stock_premises_sum_insu_6' => $stock_premises_sum_insu_6,
										'stock_premises_premium_1' => $stock_premises_premium_1,
										'stock_premises_premium_2' => $stock_premises_premium_2,

										'stock_custody_sum_insu_1' => $stock_custody_sum_insu_1,
										'stock_custody_sum_insu_2' => $stock_custody_sum_insu_2,
										'stock_custody_sum_insu_3' => $stock_custody_sum_insu_3,
										'stock_custody_sum_insu_4' => $stock_custody_sum_insu_4,
										'stock_custody_premium_1' => $stock_custody_premium_1,
										'stock_custody_premium_2' => $stock_custody_premium_2,

										'stock_transit_sum_insu_1' => $stock_transit_sum_insu_1,
										'stock_transit_sum_insu_2' => $stock_transit_sum_insu_2,
										'stock_transit_sum_insu_3' => $stock_transit_sum_insu_3,
										'stock_transit_sum_insu_4' => $stock_transit_sum_insu_4,
										'stock_transit_premium' => $stock_transit_premium,

										'standard_fire_perils_1' => $standard_fire_perils_1,
										'standard_fire_perils_2' => $standard_fire_perils_2,
										'standard_fire_perils_3' => $standard_fire_perils_3,
										'standard_fire_perils_4' => $standard_fire_perils_4,
										'standard_fire_perils_5' => $standard_fire_perils_5,
										'standard_fire_perils_6' => $standard_fire_perils_6,
										'standard_fire_perils_premium_1' => $standard_fire_perils_premium_1,
										'standard_fire_perils_premium_2' => $standard_fire_perils_premium_2,
										'standard_fire_perils_premium_3' => $standard_fire_perils_premium_3,

										'content_burglary_sum_insu' => $content_burglary_sum_insu,
										'content_burglary_premium' => $content_burglary_premium,

										'stock_exhibition_sum_insu' => $stock_exhibition_sum_insu,
										'stock_exhibition_premium' => $stock_exhibition_premium,

										'fidelity_guar_cover_sum_insu_1' => $fidelity_guar_cover_sum_insu_1,
										'fidelity_guar_cover_premium_1' => $fidelity_guar_cover_premium_1,
										'total_fidelity_guar_cover_json' => $total_fidelity_guar_cover,

										'plate_glass_sum_insu' => $plate_glass_sum_insu,
										'plate_glass_premium' => $jweller_plate_glass_premium,

										'neon_sign_sum_insu' => $neon_sign_sum_insu,
										'neon_sign_premium' => $neon_sign_premium,

										'portable_equipmets_sum_insu' => $portable_equipmets_sum_insu,
										'portable_equipmets_premium' => $portable_equipmets_premium,

										'employee_compensation_sum_insu_1' => $employee_compensation_sum_insu_1,
										'employee_compensation_sum_insu_2' => $employee_compensation_sum_insu_2,
										'employee_compensation_premium' => $employee_compensation_premium,

										'electronic_equipment_sum_insu' => $electronic_equipment_sum_insu,
										'electronic_equipment_premium' => $electronic_equipment_premium,

										'public_liability_sum_insu' => $public_liability_sum_insu,
										'public_liability_premium' => $public_liability_premium,

										'money_transit_sum_insu' => $money_transit_sum_insu,
										'money_transit_premium' => $money_transit_premium,

										'machinery_breakdown_sum_insu' => $machinery_breakdown_sum_insu,
										'machinery_breakdown_premium' => $machinery_breakdown_premium,

										'jweller_less_discount' => $jweller_less_discount,
										'jweller_total_sum_assured' => $jweller_total_sum_assured,
										'jweller_less_discount_tot' => $jweller_less_discount_tot,
										'jweller_after_discount_tot' => $jweller_after_discount_tot,
										'jweller_terrorism_per' => $jweller_terrorism_per,
										'jweller_terrorism_per_tot' => $jweller_terrorism_per_tot,
										'jweller_tot_net_premium' => $jweller_tot_net_premium,
										'jweller_cgst_per' => $jweller_cgst_per,
										'jweller_sgst_per' => $jweller_sgst_per,
										'jweller_cgst_per_tot' => $jweller_cgst_per_tot,
										'jweller_sgst_per_tot' => $jweller_sgst_per_tot,
										'jweller_final_payble' => $jweller_final_payble,

										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "jweller_policy", $add_jweller_policy_arr, $return_type = "lastID");
									$jweller_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Open Policy" || $policy_name_txt == "Stop Policy" || $policy_name_txt == "Specific Policy") { // Marine : Open Policy/STop Policy
								if ($policy_type != 3) {
									$add_marine_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'policy_name_txt' => $policy_name_txt,

										'from_destination' => $from_destination,
										'to_destination' => $to_destination,
										'coverage_type' => $coverage_type,
										'marine_description' => $marine_description,
										'interest_insured' => $interest_insured,
										'group_name_address' => $group_name_address,
										'marine_sum_insured' => $marine_sum_insured,
										'packing_stand_customary' => $packing_stand_customary,
										'total_marine_cc_json' => $total_marine_cc,
										'business_description' => $business_description,
										'voyage_domestic_purchase' => $voyage_domestic_purchase,
										'voyage_international_purchase' => $voyage_international_purchase,

										'voyage_domestic_sales' => $voyage_domestic_sales,
										'voyage_export_sales' => $voyage_export_sales,
										'voyage_job_worker' => $voyage_job_worker,
										'voyage_domestic_fini_good' => $voyage_domestic_fini_good,
										'voyage_export_fini_good' => $voyage_export_fini_good,
										'voyage_domestic_purch_return' => $voyage_domestic_purch_return,
										'voyage_export_purch_return' => $voyage_export_purch_return,
										'voyage_sales_return' => $voyage_sales_return,

										'domestic_purch' => $domestic_purch,
										'international_purch' => $international_purch,
										'domestic_sale' => $domestic_sale,
										'export_sale' => $export_sale,
										'per_bottom_limit' => $per_bottom_limit,
										'per_location_limit' => $per_location_limit,
										'per_claim_excess' => $per_claim_excess,
										'declaration_sale_fig' => $declaration_sale_fig,

										'annual_turn_over' => $annual_turn_over,
										'tot_sum_insured' => $tot_sum_insured,
										'rate_applied' => $rate_applied,
										'rate_applied_per' => $rate_applied_per,
										'rate_applied_hidden' => $rate_applied_hidden,
										'marine_cgst_per' => $marine_cgst_per,
										'marine_sgst_per' => $marine_sgst_per,
										'cgst_rate_tot' => $cgst_rate_tot,
										'sgst_rate_tot' => $sgst_rate_tot,
										'marine_final_payble_premium' => $marine_final_payble_premium,

										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "marine_policy", $add_marine_policy_arr, $return_type = "lastID");
									$burglary_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "GMC") { // GMC:misleneous
								if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
									if ($policy_type != 3) {
										$add_gmc_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'tot_gmc_json_data' => $total_gmc_data,
											'gmc_family_size' => $gmc_family_size,
											'gmc_tot_sum_insured' => $gmc_total_sum_insured,
											'create_date' => date("Y-m-d h:i:s")
										);

										$query2 = $this->Mquery_model_v3->addQuery($tableName = "gmc_policy", $add_gmc_policy_arr, $return_type = "lastID");
										$gmc_policy_id = $query2["lastID"];
									}
								}
							} elseif ($policy_name_txt == "GPA") { // GPA:misleneous
								if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
									if ($policy_type != 3) {
										$add_gpa_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'tot_gpa_json_data' => $total_gpa_data,
											'gpa_family_size' => $gpa_family_size,
											'gpa_tot_sum_insured' => $gpa_total_sum_insured,
											'create_date' => date("Y-m-d h:i:s")
										);

										$query2 = $this->Mquery_model_v3->addQuery($tableName = "gpa_policy", $add_gpa_policy_arr, $return_type = "lastID");
										$gpa_policy_id = $query2["lastID"];
									}
								}
							} elseif ($policy_name_txt == "Personal Accident") { // Personal Accident:misleneous
								if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater") {
									if ($policy_type != 3) {
										$add_personal_accident_ind_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'total_pa_ind_json_data' => $total_pa_ind_json_data,
											'tot_premium' => $tot_premium,
											'less_disc_rate' => $less_disc_rate,
											'less_disc_tot' => $less_disc_tot,
											'gross_premium' => $gross_premium,
											'gross_premium_new' => $gross_premium_new,
											'medi_cgst_rate' => $medi_cgst_rate,
											'medi_cgst_tot' => $medi_cgst_tot,
											'medi_sgst_rate' => $medi_sgst_rate,
											'medi_sgst_tot' => $medi_sgst_tot,
											'medi_final_premium' => $medi_final_premium,
											'create_date' => date("Y-m-d h:i:s"),
										);

										$query2 = $this->Mquery_model_v3->addQuery($tableName = "personal_accident_ind_policy", $add_personal_accident_ind_policy_arr, $return_type = "lastID");
										$paccident_policy_id  = $query2["lastID"];
									}
								} elseif ($policy_type_txt == "Common Individual") {
									if ($policy_type != 3) {
										$add_common_ind_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'tot_commind_json_data' => $tot_commind_json_data,
											'comm_ind_total_amount' => $comm_ind_total_amount,
											'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
											'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
											'comm_ind_load_desc' => $comm_ind_load_desc,
											'comm_ind_load_tot' => $comm_ind_load_tot,
											'comm_ind_gross_premium' => $comm_ind_gross_premium,
											'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
											'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
											'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
											'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
											'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
											'comm_ind_final_premium' => $comm_ind_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);

										$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_ind_policy", $add_common_ind_policy_arr, $return_type = "lastID");
										$common_ind_policy_id = $query2["lastID"];
									}
								} elseif ($policy_type_txt == "Common Floater") {
									if ($policy_type != 3) {
										$add_common_float_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'tot_commfloat_json_data' => $tot_commfloat_json_data,
											'comm_float_total_amount' => $comm_float_total_amount,
											'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
											'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
											'comm_float_load_desc' => $comm_float_load_desc,
											'comm_float_load_tot' => $comm_float_load_tot,
											'comm_float_gross_premium' => $comm_float_gross_premium,
											'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
											'comm_float_cgst_rate' => $comm_float_cgst_rate,
											'comm_float_cgst_tot' => $comm_float_cgst_tot,
											'comm_float_sgst_rate' => $comm_float_sgst_rate,
											'comm_float_sgst_tot' => $comm_float_sgst_tot,
											'comm_float_final_premium' => $comm_float_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);

										$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_float_policy", $add_common_float_policy_arr, $return_type = "lastID");
										$common_float_policy_id = $query2["lastID"];
									}
								}
							} elseif ($policy_name_txt == "Private Car") { // Private Car: Motor
								if ($policy_type != 3) {
									$add_motor_private_car_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,

										'vehicle_make_model' => $vehicle_make_model,
										'vehicle_reg_no' => $vehicle_reg_no,
										'insu_declared_val' => $insu_declared_val,
										'non_elect_access_val' => $non_elect_access_val,
										'elect_access_val' => $elect_access_val,
										'lpg_cng_idv_val' => $lpg_cng_idv_val,
										'trailer_val' => $trailer_val,
										'year_manufact_val' => $year_manufact_val,
										'rta_city_code' => $rta_city_code,
										'rta_city' => $rta_city,
										'rta_city_cat' => $rta_city_cat,
										'cubic_capacity_val' => $cubic_capacity_val,
										'calculation_method' => $calculation_method,
										'type_of_cover' => $type_of_cover,
										'prev_policy_expiry_date' => $prev_policy_expiry_date,
										'policy_period' => $policy_period,
										'inception_date' => $inception_date,
										'expiry_date' => $expiry_date,

										'od_basic_od_tot' => $od_basic_od_tot,
										'od_special_disc_per' => $od_special_disc_per,
										'od_special_disc_tot' => $od_special_disc_tot,
										'od_special_load_per' => $od_special_load_per,
										'od_special_load_tot' => $od_special_load_tot,
										'od_net_basic_od_tot' => $od_net_basic_od_tot,
										'od_non_elec_acc_tot' => $od_non_elec_acc_tot,
										'od_elec_acc_tot' => $od_elec_acc_tot,
										'od_bi_fuel_kit_tot' => $od_bi_fuel_kit_tot,
										'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
										'od_trailer_tot' => $od_trailer_tot,
										'od_geographical_area_tot' => $od_geographical_area_tot,
										'od_embassy_load_tot' => $od_embassy_load_tot,
										'od_fibre_glass_tank_tot' => $od_fibre_glass_tank_tot,
										'od_driving_tut_tot' => $od_driving_tut_tot,
										'od_rallies_tot' => $od_rallies_tot,
										'od_basic_od2_tot' => $od_basic_od2_tot,
										'od_anti_tot' => $od_anti_tot,
										'od_handicap_tot' => $od_handicap_tot,
										'od_aai_tot' => $od_aai_tot,
										'od_vintage_tot' => $od_vintage_tot,
										'od_own_premises_tot' => $od_own_premises_tot,
										'od_voluntary_deduc_tot' => $od_voluntary_deduc_tot,
										'od_basic_od3_tot' => $od_basic_od3_tot,
										'od_ncb_per' => $od_ncb_per,
										'od_ncb_tot' => $od_ncb_tot,
										'od_tot_anual_od_premium' => $od_tot_anual_od_premium,
										'od_tot_od_premium_policy_period' => $od_tot_od_premium_policy_period,

										'tp_basic_tp_tot' => $tp_basic_tp_tot,
										'tp_restr_tppd' => $tp_restr_tppd,
										'tp_trailer_tot' => $tp_trailer_tot,
										'tp_bi_fuel_tot' => $tp_bi_fuel_tot,
										'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
										'tp_compul_own_driv_tot' => $tp_compul_own_driv_tot,
										'tp_geographical_area_tot' => $tp_geographical_area_tot,
										'tp_unnamed_papax_tot' => $tp_unnamed_papax_tot,
										'tp_no_seats_limit_person_tot' => $tp_no_seats_limit_person_tot,
										'tp_ll_drv_emp_tot' => $tp_ll_drv_emp_tot,
										'tp_no_drv_emp_tot' => $tp_no_drv_emp_tot,
										'tp_noof_person_tot' => $tp_noof_person_tot,
										'tp_pa_paid_drv_tot' => $tp_pa_paid_drv_tot,
										'tp_ll_defe_tot' => $tp_ll_defe_tot,
										'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
										'tp_tot_anual_tp_premium' => $tp_tot_anual_tp_premium,
										'tp_tot_premium_policy_period' => $tp_tot_premium_policy_period,
										'plan_name' => $plan_name,
										'plan_name_tot' => $plan_name_tot,
										'tot_othercover_ind_json' => $tot_othercover_ind_json,
										'tot_anual_cover_premium' => $tot_anual_cover_premium,
										'tot_cover_premium_period' => $tot_cover_premium_period,

										'tot_premium' => $tot_premium,
										'motor_cgst_rate' => $motor_cgst_rate,
										'motor_cgst_tot' => $motor_cgst_tot,
										'motor_sgst_rate' => $motor_sgst_rate,
										'motor_sgst_tot' => $motor_sgst_tot,
										'tot_payable_premium' => $tot_payable_premium,

										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_private_car_policy", $add_motor_private_car_policy_arr, $return_type = "lastID");
									$private_car_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "2 Wheeler") { // 2 Wheeler: Motor
								if ($policy_type != 3) {
									$add_motor_two_wheeler_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,

										'vehicle_make_model' => $vehicle_make_model,
										'vehicle_reg_no' => $vehicle_reg_no,
										'insu_declared_val' => $insu_declared_val,
										'elect_acc_val' => $elect_acc_val,
										'other_elect_acc_val' => $other_elect_acc_val,
										'policy_period_tenure_years' => $policy_period_tenure_years,
										'previous_policy_expiry_date_tenur' => $previous_policy_expiry_date_tenur,
										'year_manufact_val' => $year_manufact_val,
										'rta_city_code' => $rta_city_code,
										'rta_city' => $rta_city,
										'rta_city_cat' => $rta_city_cat,
										'cubic_capacity_val' => $cubic_capacity_val,
										'type_of_cover' => $type_of_cover,
										'policy_period' => $policy_period,
										'inception_date' => $inception_date,
										'expiry_date' => $expiry_date,

										'od_basic_od_tot' => $od_basic_od_tot,
										'od_special_disc_per' => $od_special_disc_per,
										'od_special_disc_tot' => $od_special_disc_tot,
										'od_special_load_per' => $od_special_load_per,
										'od_special_load_tot' => $od_special_load_tot,
										'od_net_basic_od_tot' => $od_net_basic_od_tot,
										'od_elec_acc_tot' => $od_elec_acc_tot,
										'od_other_elec_acc_tot' => $od_other_elec_acc_tot,
										'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
										'od_geographical_area_tot' => $od_geographical_area_tot,
										'od_rallies_tot' => $od_rallies_tot,
										'od_embassy_load_tot' => $od_embassy_load_tot,
										'od_basic_od2_tot' => $od_basic_od2_tot,
										'od_anti_theft_tot' => $od_anti_theft_tot,
										'od_handicap_tot' => $od_handicap_tot,
										'od_aai_tot' => $od_aai_tot,
										'od_side_car_tot' => $od_side_car_tot,
										'od_own_premises_tot' => $od_own_premises_tot,
										'od_voluntary_excess_tot' => $od_voluntary_excess_tot,
										'od_basic_od3_tot' => $od_basic_od3_tot,
										'od_ncb_per' => $od_ncb_per,
										'od_ncb_tot' => $od_ncb_tot,
										'od_tot_od_premium_policy_period' => $od_tot_od_premium_policy_period,

										'tp_basic_tp_tot' => $tp_basic_tp_tot,
										'tp_restr_tppd_tot' => $tp_restr_tppd_tot,
										'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
										'tp_geographical_area_tot' => $tp_geographical_area_tot,
										'tp_compul_pa_own_driv_tot' => $tp_compul_pa_own_driv_tot,
										'tp_unnamed_pa_tot' => $tp_unnamed_pa_tot,
										'tp_ll_drv_emp_imt28_tot' => $tp_ll_drv_emp_imt28_tot,
										'tp_ll_other_emp_tot' => $tp_ll_other_emp_tot,
										'tp_noof_other_emp_tot' => $tp_noof_other_emp_tot,
										'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
										'tp_tot_premium_policy_period' => $tp_tot_premium_policy_period,
										'plan_name' => $plan_name,
										'plan_name_tot' => $plan_name_tot,
										'tot_othercover_ind_json' => $tot_othercover_ind_json,
										'tot_cover_premium_period' => $tot_cover_premium_period,

										'tot_premium' => $tot_premium,
										'motor_cgst_rate' => $motor_cgst_rate,
										'motor_cgst_tot' => $motor_cgst_tot,
										'motor_sgst_rate' => $motor_sgst_rate,
										'motor_sgst_tot' => $motor_sgst_tot,
										'tot_payable_premium' => $tot_payable_premium,

										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_2_wheeler_policy", $add_motor_two_wheeler_policy_arr, $return_type = "lastID");
									$two_wheeler_policy_id = $query2["lastID"];
								}
							} elseif ($policy_name_txt == "Commercial Vehicle") { // Commercial Vehicle: Motor
								if ($policy_type != 3) {
									$add_motor_commercial_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,

										'vehicle_make_model' => $vehicle_make_model,
										'vehicle_reg_no' => $vehicle_reg_no,
										'insu_declared_val' => $insu_declared_val,
										'elect_acc_val' => $elect_acc_val,
										'lpg_cng_idv_val' => $lpg_cng_idv_val,
										'year_manufact_val' => $year_manufact_val,
										'zone_city_code' => $zone_city_code,
										'zone_city' => $zone_city,
										'zone_city_cat' => $zone_city_cat,
										'gvw_val' => $gvw_val,
										'class_val' => $class_val,
										'type_of_cover' => $type_of_cover,
										'policy_period' => $policy_period,
										'inception_date' => $inception_date,
										'expiry_date' => $expiry_date,

										'od_basic_od_tot' => $od_basic_od_tot,
										'od_elec_acc_tot' => $od_elec_acc_tot,
										'od_trailer_tot' => $od_trailer_tot,
										'od_bi_fuel_kit_tot' => $od_bi_fuel_kit_tot,
										'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
										'od_geog_area_tot' => $od_geog_area_tot,
										'od_fiber_glass_tank_tot' => $od_fiber_glass_tank_tot,
										'od_imt_cover_mud_guard_tot' => $od_imt_cover_mud_guard_tot,
										'od_basic_od2_tot' => $od_basic_od2_tot,
										'od_basic_od3_tot' => $od_basic_od3_tot,
										'od_ncb_per' => $od_ncb_per,
										'od_ncb_tot' => $od_ncb_tot,
										'od_tot_anual_od_premium' => $od_tot_anual_od_premium,
										'od_special_disc_per' => $od_special_disc_per,
										'od_special_disc_tot' => $od_special_disc_tot,
										'od_special_load_per' => $od_special_load_per,
										'od_special_load_tot' => $od_special_load_tot,
										'od_tot_od_premium' => $od_tot_od_premium,

										'tp_basic_tp_tot' => $tp_basic_tp_tot,
										'tp_restr_tppd_tot' => $tp_restr_tppd_tot,
										'tp_trailer_tot' => $tp_trailer_tot,
										'tp_bi_fuel_kit_tot' => $tp_bi_fuel_kit_tot,
										'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
										'tp_geog_area_tot' => $tp_geog_area_tot,
										'tp_compul_pa_own_driv_tot' => $tp_compul_pa_own_driv_tot,
										'tp_pa_paid_driver_tot' => $tp_pa_paid_driver_tot,
										'tp_ll_emp_non_fare_tot' => $tp_ll_emp_non_fare_tot,
										'tp_ll_driver_cleaner_tot' => $tp_ll_driver_cleaner_tot,
										'tp_ll_person_operation_tot' => $tp_ll_person_operation_tot,
										'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
										'tp_tot_premium' => $tp_tot_premium,
										'tp_consumables' => $tp_consumables,
										'tp_zero_depreciation' => $tp_zero_depreciation,
										'tp_road_side_ass' => $tp_road_side_ass,
										'tp_tot_addon_premium' => $tp_tot_addon_premium,

										'tot_owd_premium' => $tot_owd_premium,
										'tot_owd_addon_premium' => $tot_owd_addon_premium,
										'tot_btp_premium' => $tot_btp_premium,
										'tot_other_tp_premium' => $tot_other_tp_premium,
										'tot_premium' => $tot_premium,
										'tot_owd_cgst_rate' => $tot_owd_cgst_rate,
										'tot_owd_sgst_rate' => $tot_owd_sgst_rate,
										'tot_owd_addon_cgst_rate' => $tot_owd_addon_cgst_rate,
										'tot_owd_addon_sgst_rate' => $tot_owd_addon_sgst_rate,
										'tot_btp_cgst_rate' => $tot_btp_cgst_rate,
										'tot_btp_sgst_rate' => $tot_btp_sgst_rate,
										'tot_other_tp_cgst_rate' => $tot_other_tp_cgst_rate,
										'tot_other_tp_sgst_rate' => $tot_other_tp_sgst_rate,
										'tot_owd_gst' => $tot_owd_gst,
										'tot_owd_addon_gst' => $tot_owd_addon_gst,
										'tot_btp_gst' => $tot_btp_gst,
										'tot_other_tp_gst' => $tot_other_tp_gst,
										'tot_gst_amt' => $tot_gst_amt,
										'tot_owd_final' => $tot_owd_final,
										'tot_owd_addon_final' => $tot_owd_addon_final,
										'tot_btp_final' => $tot_btp_final,
										'tot_other_tp_final' => $tot_other_tp_final,
										'tot_final_premium' => $tot_final_premium,
										'tot_payable_premium' => $tot_payable_premium,

										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_commercial_policy", $add_motor_commercial_policy_arr, $return_type = "lastID");
									$commercial_policy_id = $query2["lastID"];
								}
							} else {
								if (!empty($policy_name_txt)) {
									if (($policy_name_txt == "Worksmen Compentation") || ($policy_name_txt == "Money In Transit") || ($policy_name_txt == "Plate Glass") || ($policy_name_txt == "House Holder") || ($policy_name_txt == "All Risk") || ($policy_name_txt == "Office Compact") || ($policy_name_txt == "Electronic Equipment") || ($policy_name_txt == "Product Liability") || ($policy_name_txt == "Commercial General Liability") || ($policy_name_txt == "Public Liability") || ($policy_name_txt == "Professional Indemnity") || ($policy_name_txt == "Machinery Breakdown") || ($policy_name_txt == "Contractors All Risk")) {
										if ($policy_type != 3) {
											$add_other_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'other_total_sum_assured' => $total_sum_assured,
												'other_fire_rate_per' => $fire_rate_per,
												'other_fire_rate_tot_amount' => $fire_rate_tot,
												'other_less_discount_per' => $less_discount_per,
												'other_less_discount_tot_amount' => $less_discount_tot,
												'other_fire_rate_after_discount' => $fire_rate_after_discount_tot,
												'other_cgst_rate_per' => $cgst_fire_per,
												'other_cgst_tot_amount' => $cgst_fire_tot,
												'other_sgst_rate_per' => $sgst_fire_per,
												'other_sgst_tot_amount' => $sgst_fire_tot,
												'other_final_payable_premium' => $final_paybal_premium,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "others_policy_dump", $add_other_policy_arr, $return_type = "lastID");
											$burglary_policy_id = $query2["lastID"];
										}
									}
								}
							}

							if ($policy_type == 3) { // Fire RC
								if (!empty($policy_name)) {
									$add_fire_rc_policy_dump_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'policy_type' => $policy_type,
										'fire_rc_total_sum_assured' => $total_sum_assured,
										'fire_rc_fire_rate_per' => $fire_rate_per,
										'fire_rc_fire_rate_tot_amount' => $fire_rate_tot,
										'fire_rc_less_discount_per' => $less_discount_per,
										'fire_rc_less_discount_tot_amount' => $less_discount_tot,
										'fire_rc_rate_after_discount' => $fire_rate_after_discount_tot,

										'fire_rc_stfi_rate' => $stfi_rate_per,
										'fire_rc_stfi_rate_total' => $stfi_rate_total,
										'fire_rc_earthquake_rate' => $earthquake_rate_per,
										'fire_rc_earthquake_rate_total' => $earthquake_rate_total,
										'fire_rc_terrorisum_rate' => $terrorisum_rate_per,
										'fire_rc_terrorisum_rate_total' => $terrorisum_rate_total,

										'fire_rc_gross_premium' => $gross_premium,
										'fire_rc_cgst_rate_per' => $cgst_fire_per,
										'fire_rc_cgst_tot_amount' => $cgst_fire_tot,
										'fire_rc_sgst_rate_per' => $sgst_fire_per,
										'fire_rc_sgst_tot_amount' => $sgst_fire_tot,
										'fire_rc_final_payable_premium' => $final_paybal_premium,
										'create_date' => date("Y-m-d h:i:s")
									);
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "fire_rc_policy_dump", $add_fire_rc_policy_dump_arr, $return_type = "lastID");
									$fire_rc_policy_id = $query2["lastID"];
								}
							}
						}

						if (empty($new_policy_id))
							$new_policy_id = $policy_id;
						else
							$new_policy_id = $new_policy_id . "," . $policy_id;
					}

				} else {
					$add_arr[] = array(
						'serial_no_year' => $serial_no_year,
						'serial_no_month' => $serial_no_month,
						'serial_no' => $serial_no,
						'fk_company_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'fk_client_id' => $group_name,
						'fk_cust_member_id' => $policy_holder_name,
						'fk_agency_id' => $agency_code,
						'fk_sub_agent_id' => $sub_agency_code,
						'policy_type' => $policy_type,
						'mode_of_premimum' => $mode_of_premimum,
						'date_from' => $date_from,
						'date_to' => $date_to,
						'payment_date_from' => $payment_date_from,
						'payment_date_to' => $payment_date_to,
						'policy_no' => $policy_no,
						'pre_year_policy_no' => $pre_year_policy_no,
						'date_commenced' => $date_commenced,
						'policy_upload' => $policy_upload_file_name,
						'dynamic_path' => date("Y") . "/" . date("m") . "/" . $serial_no_year . "_" . $serial_no_month . "_" . $serial_no,
						'reg_mobile' => $reg_mobile,
						'reg_email' => $reg_email,
						'policy_counter' => $policy_counter_no,
						'family_size' => $family_size,
						'tpa_company' => $tpa_company,
						'addition_of_more_child' => $addition_of_more_child,
						'restore_cover' => $restore_cover,
						'maternity_new_born_baby_cover' => $maternity_new_born_baby_cover,
						'daily_cash_allowance_cover' => $daily_cash_allowance_cover,
						'floater_policy_type' => $floater_policy_type,
						'plan_policy_commission' => $comission_percentage,

						'current_sum_insured' => $current_sum_insured,
						'current_total_premium' => $current_total_premium,
						'member_name_arr' => $member_name_arr,
						'riv' => $riv,
						'type_of_bussiness' => $type_of_bussiness,
						'description_of_stock' => $description_of_stock,
						'quotation_date' => $quotation_date,
						'quotation_upload' => $quotation_upload_file_name,
						'quotation_male_link' => $quotation_male_link,
						'renewal_count' => $renewal_count,
						'create_date' => date("Y-m-d h:i:s")
					);
					$query = $this->Mquery_model_v3->addQuery($tableName = "policy_member_details_dump", $add_arr, $return_type = "lastID");
					$policy_id = $query["lastID"];

					if (!empty($policy_id)) {
						$update_hypotication_arr[] = array(
							'hypotication_details' => $total_hypotication,
							'correspondence_details' => $total_correspondence,
							'total_paymentacknowledge_data' => $total_paymentacknowledge_data,
							'risk_details' => $total_risk,
							'risk_rc_details' => $total_risk_Rc,
							'policy_id' => $policy_id,
							'modify_dt' => date("Y-m-d h:i:s")
						);
						$query1 = $this->Mquery_model_v3->updateBatchQuery($tableName1 = "policy_member_details_dump", $update_hypotication_arr, $updateKey = "policy_id", $whereArr = array("policy_id", $policy_id), $likeCondtnArr = array(), $whereInArray = array());
					}

					if (!empty($policy_id)) {
						if (!empty($total_remarks)) {
							$counts = count($total_remarks);
							for ($i = 0; $i < $counts; $i++) {
								$add_remarks_arr[$i] = array(
									'remarks' => $total_remarks[$i][0],
									'male_date' => $total_remarks[$i][1],
									'fk_policy_id' => $policy_id,
									'create_date' => date("Y-m-d h:i:s")
								);
							}
							$query = $this->Mquery_model_v3->addQuery($tableName = "policy_remark_details", $add_remarks_arr, $return_type = "lastID");
							$policy_remark_id = $query["lastID"];
						}
					}
					if (!empty($policy_id)) {

						if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Individual") { // Misslineous : Mediclaim Individual
							if ($policy_type != 3) {
								if ($policy_type_txt == "Individual") {
									if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd")) {
										if ($floater_policy_type == "Optima Restore") {
											$add_medi_hdfc_ergo_health_insu_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_medi_ind_hdfc_json_data' => $total_medi_ind_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'protect_ride_prem_tot' => $protect_ride_prem_tot,
												'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
												'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'family_disc_per' => $family_disc_per,
												'family_disc_tot' => $family_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_policy", $add_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
											$medi_hdfc_ergo_health_insu_policy_id = $query2["lastID"];
										} elseif ($floater_policy_type == "Energy") {
											$add_energy_medi_hdfc_ergo_health_insu_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_energy_medi_hdfc_json_data' => $total_energy_medi_hdfc_json_data,
												'tot_premium' => $tot_premium,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_energy_policy", $add_energy_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
											$medi_hdfc_ergo_health_insu_energy_policy_id = $query2["lastID"];
										} elseif ($floater_policy_type == "Health Suraksha") {
											$add_suraksha_medi_hdfc_ergo_health_insu_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_suraksha_medi_hdfc_json_data' => $total_suraksha_medi_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'family_disc_per' => $family_disc_per,
												'family_disc_tot' => $family_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_policy", $add_suraksha_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
											$medi_hdfc_ergo_health_insu_suraksha_policy_id = $query2["lastID"];
										} elseif ($floater_policy_type == "Easy Health") {
											$add_easy_rate_medi_hdfc_ergo_health_insu_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_easy_medi_hdfc_json_data' => $total_easy_medi_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'protect_ride_prem_tot' => $protect_ride_prem_tot,
												'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
												'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'tot_basic_prem' => $tot_basic_prem,
												'less_disc_tot' => $less_disc_tot,
												'family_disc_per' => $family_disc_per,
												'family_disc_tot' => $family_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_policy", $add_easy_rate_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
											$medi_hdfc_ergo_health_insu_easy_policy_id  = $query2["lastID"];
										}
									} elseif ($company_txt == "The New India Assurance Co Ltd") {
										if ($floater_policy_type == "New India Mediclaim Policy 2017") {
											$add_the_new_india_medi_2017_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_the_new_india_medi_tns_hdfc_json_data' => $total_the_new_india_medi_tns_hdfc_json_data,
												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_medi_policy_2017_ind_assu_policy", $add_the_new_india_medi_2017_policy_arr, $return_type = "lastID");
											$medi_insu_new_india_tns_assu_ind_policy_id = $query2["lastID"];
										}
									} elseif ($company_txt == "Max Bupa Health Insurance Co Ltd") {
										if ($floater_policy_type == "Reassure") {
											$add_max_bupa_reassure_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_max_bupa_medi_reassure_json_data' => $total_max_bupa_medi_reassure_json_data,

												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'first_year_rate' => $first_year_rate,
												'second_year_rate' => $second_year_rate,
												'third_year_rate' => $third_year_rate,
												'first_year_tot' => $first_year_tot,
												'second_year_tot' => $second_year_tot,
												'third_year_tot' => $third_year_tot,
												'tot_term_disc' => $tot_term_disc,

												'tot_premium' => $tot_premium,
												'stand_instu_rate' => $stand_instu_rate,
												'stand_instu_tot' => $stand_instu_tot,
												'doctor_disc_per' => $doctor_disc_per,
												'doctor_disc_tot' => $doctor_disc_tot,
												'family_disc_per' => $family_disc_per,
												'family_disc_tot' => $family_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,

												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "max_bupa_reassure_ind_policy", $add_max_bupa_reassure_ind_policy_arr, $return_type = "lastID");
											$medi_max_bupa_reassure_ind_policy_id  = $query2["lastID"];
										}
									} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
										if ($floater_policy_type == "Red Carpet") {
											$add_star_health_red_carpet_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_red_carpet_medi_ind_json_data' => $total_star_health_red_carpet_medi_ind_json_data,

												'years_of_premium' => $years_of_premium,

												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_red_carpet_ind_policy", $add_star_health_red_carpet_ind_policy_arr, $return_type = "lastID");
											$medi_star_health_ind_policy_id   = $query2["lastID"];
										} elseif ($floater_policy_type == "Comprehensive") {
											$add_star_health_comprehensive_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_comprehensive_medi_ind_json_data' => $total_star_health_comprehensive_medi_ind_json_data,

												'years_of_premium' => $years_of_premium,

												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_comprehensive_ind_policy", $add_star_health_comprehensive_ind_policy_arr, $return_type = "lastID");
											$medi_star_health_comp_ind_policy_id   = $query2["lastID"];
										}
									} elseif ($company_txt == "United India Insurance Co Ltd") {
										if ($floater_policy_type == "Individual Health Insurance Policy") {
											$add_mediclaim_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_mediclaim_json' => $total_mediclaim,
												'medi_total_ncd_amount' => $medi_total_ncd_amount,
												'medi_total_amount' => $medi_total_amount,
												'medi_family_disc_rate' => $medi_family_disc_rate,
												'medi_family_disc_tot' => $medi_family_disc_tot,
												'medi_premium_after_fd' => $medi_premium_after_fd,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "mediclaim_policy", $add_mediclaim_policy_arr, $return_type = "lastID");
											$mediclaim_policy_id = $query2["lastID"];
										} elseif ($floater_policy_type == "Floater 2020(Individual)") {
											$add_medi_ind2020_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_medi_ind2020_json' => $total_mediclaim_indi2020,
												'medi_ind_2020_total_premium' => $medi_ind_2020_total_premium,
												'medi_ind_2020_family_descount_per' => $medi_ind_2020_family_descount_per,
												'medi_ind_2020_family_descount_tot' => $medi_ind_2020_family_descount_tot,
												'medi_ind_2020_load_description' => $medi_ind_2020_load_description,
												'medi_ind_2020_load_amount' => $medi_ind_2020_load_amount,
												'medi_ind_2020_restore_cover_premium' => $medi_ind_2020_restore_cover_premium,
												'medi_ind_2020_maternity_new_bornbaby' => $medi_ind_2020_maternity_new_bornbaby,
												'medi_ind_2020_daily_cash_allow_hosp' => $medi_ind_2020_daily_cash_allow_hosp,
												'medi_ind_2020_load_gross_premium' => $medi_ind_2020_load_gross_premium,
												'new_load_gross_premium' => $new_load_gross_premium,
												'medi_ind_2020_cgst_rate' => $medi_ind_2020_cgst_rate,
												'medi_ind_2020_cgst_tot' => $medi_ind_2020_cgst_tot,
												'medi_ind_2020_sgst_rate' => $medi_ind_2020_sgst_rate,
												'medi_ind_2020_sgst_tot' => $medi_ind_2020_sgst_tot,
												'medi_ind_2020_final_premium' => $medi_ind_2020_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_ind2020_policy", $add_medi_ind2020_policy_arr, $return_type = "lastID");
											$medi_ind2020_policy_id = $query2["lastID"];
										}
									} elseif ($company_txt == "Care Health Insurance Co Ltd") {
										if ($floater_policy_type == "Care Advantage") {
											$add_care_adv_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_care_adv_ind_json_data' => $total_care_adv_ind_json_data,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_adv_ind_policy", $add_care_adv_ind_policy_arr, $return_type = "lastID");
											$care_adv_ind_id  = $query2["lastID"];
										} elseif ($floater_policy_type == "Care") {
											$add_care_ind_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_care_ind_json_data' => $total_care_ind_json_data,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_ind_policy", $add_care_ind_policy_arr, $return_type = "lastID");
											$care_ind_id  = $query2["lastID"];
										}
									}
								}
							}
						}

						if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") { // Misslineous : Mediclaim Floater

							if ($policy_type != 3) {
								if ($policy_type_txt == "Floater") {
									if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd")) {
										if ($floater_policy_type == "Optima Restore") {
											$add_medi_hdfc_ergo_health_insu_float_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_medi_float_hdfc_json_data' => $total_medi_float_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
												'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
												'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
												'protect_ride_prem_tot' => $protect_ride_prem_tot,
												'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
												'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'stay_active_benefit' => $stay_active_benefit,
												'stay_active_benefit_prem_tot' => $stay_active_benefit_prem_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_float_policy", $add_medi_hdfc_ergo_health_insu_float_policy_arr, $return_type = "lastID");
											$medi_hdfc_ergo_health_insu_float_policy_id = $query2["lastID"];
										} elseif ($floater_policy_type == "Health Suraksha") {
											$add_suraksha_float_medi_hdfc_ergo_health_insu_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_suraksha_float_medi_hdfc_json_data' => $total_suraksha_float_medi_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
												'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
												'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_floater_policy", $add_suraksha_float_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
											$medi_hdfc_ergo_health_float_suraksha_policy_id = $query2["lastID"];
										} elseif ($floater_policy_type == "Easy Health") {
											$add_float_easy_rate_medi_hdfc_ergo_health_insu_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_easy_float_medi_hdfc_json_data' => $total_easy_float_medi_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
												'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
												'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
												'protect_ride_prem_tot' => $protect_ride_prem_tot,
												'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
												'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'tot_basic_prem' => $tot_basic_prem,
												'less_disc_tot' => $less_disc_tot,
												'stay_active_benefit' => $stay_active_benefit,
												'stay_active_benefit_prem' => $stay_active_benefit_prem,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_easy_rate_card_float_policy", $add_float_easy_rate_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
											$medi_hdfc_ergo_health_insu_easy_float_policy_id  = $query2["lastID"];
										}
									} elseif ($company_txt == "The New India Assurance Co Ltd") {
										if ($floater_policy_type == "New India Floater Mediclaim") {
											$add_the_new_india_medi_floater_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_the_new_india_medi_float_json_data' => $total_the_new_india_medi_float_json_data,
												'tot_premium' => $tot_premium,
												'floater_disc_rate' => $floater_disc_rate,
												'floater_disc_tot' => $floater_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_medi_floater_assu_policy", $add_the_new_india_medi_floater_policy_arr, $return_type = "lastID");
											$medi_new_india_assu_float_policy_id = $query2["lastID"];
										}
									} elseif ($company_txt == "Max Bupa Health Insurance Co Ltd") {
										if ($floater_policy_type == "Reassure") {
											$add_max_bupa_reassure_float_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_max_bupa_medi_float_reassure_json_data' => $total_max_bupa_medi_float_reassure_json_data,

												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'first_year_rate' => $first_year_rate,
												'second_year_rate' => $second_year_rate,
												'third_year_rate' => $third_year_rate,
												'first_year_tot' => $first_year_tot,
												'second_year_tot' => $second_year_tot,
												'third_year_tot' => $third_year_tot,
												'tot_term_disc' => $tot_term_disc,

												'tot_premium' => $tot_premium,
												'stand_instu_rate' => $stand_instu_rate,
												'stand_instu_tot' => $stand_instu_tot,
												'doctor_disc_per' => $doctor_disc_per,
												'doctor_disc_tot' => $doctor_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,

												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "max_bupa_reassure_floater_policy", $add_max_bupa_reassure_float_policy_arr, $return_type = "lastID");
											$medi_max_bupa_reassure_float_policy_id  = $query2["lastID"];
										}
									} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
										if ($floater_policy_type == "Red Carpet") {
											$add_star_health_red_carpet_float_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_red_carpet_medi_float_json_data' => $total_star_health_red_carpet_medi_float_json_data,

												'years_of_premium' => $years_of_premium,

												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query3 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_red_carpet_float_policy", $add_star_health_red_carpet_float_policy_arr, $return_type = "lastID");
											$medi_star_health_float_policy_id  = $query3["lastID"];

										} elseif ($floater_policy_type == "Comprehensive") {
											$add_star_health_comprehensive_float_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_comprehensive_medi_float_json_data' => $total_star_health_comprehensive_medi_float_json_data,

												'years_of_premium' => $years_of_premium,

												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query3 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_comprehensive_float_policy", $add_star_health_comprehensive_float_policy_arr, $return_type = "lastID");
											$medi_star_health_comp_float_policy_id  = $query3["lastID"];
										}
									} elseif ($company_txt == "United India Insurance Co Ltd") {
										if ($floater_policy_type == "Family Floater 2014") {
											$add_mediclaim_floater_2014_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_medi_floater_2014_json' => $total_mediclaim_floater2014,
												'name_insured_sum_insured' => $name_insured_sum_insured,
												'name_insured_premium' => $name_insured_premium,
												'medi_float_2014_total_premium' => $medi_float_2014_total_premium,
												'medi_float_2014_child_count' => $medi_float_2014_child_count,
												'medi_float_2014_child_count_first_premium' => $medi_float_2014_child_count_first_premium,
												'medi_float_2014_child_total_premium' => $medi_float_2014_child_total_premium,
												'medi_float_2014_load_description' => $medi_float_2014_load_description,
												'medi_float_2014_load_amount' => $medi_float_2014_load_amount,
												'medi_float_2014_load_gross_premium' => $medi_float_2014_load_gross_premium,
												'medi_float_2014_cgst_rate' => $medi_float_2014_cgst_rate,
												'medi_float_2014_cgst_tot' => $medi_float_2014_cgst_tot,
												'medi_float_2014_sgst_rate' => $medi_float_2014_sgst_rate,
												'medi_float_2014_sgst_tot' => $medi_float_2014_sgst_tot,
												'medi_float_2014_final_premium' => $medi_float_2014_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "mediclaim_floater_2014_policy", $add_mediclaim_floater_2014_policy_arr, $return_type = "lastID");
											$medi_floater_2014_id = $query2["lastID"];
										} elseif ($floater_policy_type == "Family Floater 2020") {
											$add_medi_floater_2020_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_medi_floater_2020_json' => $total_mediclaim_floater2020,
												'name_insured_sum_insured' => $name_insured_sum_insured,
												'name_insured_premium' => $name_insured_premium,
												'name_insured_ncd' => $name_insured_ncd,
												'name_insured_premium_after_ncd' => $name_insured_premium_after_ncd,
												'medi_float_2020_total_premium' => $medi_float_2020_total_premium,
												'medi_float_2020_child_count' => $medi_float_2020_child_count,
												'medi_float_2020_child_count_first_premium' => $medi_float_2020_child_count_first_premium,
												'medi_float_2020_child_total_premium' => $medi_float_2020_child_total_premium,
												'medi_float_2020_load_description' => $medi_float_2020_load_description,
												'medi_float_2020_load_amount' => $medi_float_2020_load_amount,
												'medi_float_2020_restore_cover_premium' => $medi_float_2020_restore_cover_premium,
												'medi_float_2020_maternity_new_bornbaby' => $medi_float_2020_maternity_new_bornbaby,
												'medi_float_2020_daily_cash_allow_hosp' => $medi_float_2020_daily_cash_allow_hosp,
												'medi_float_2020_load_gross_premium' => $medi_float_2020_load_gross_premium,
												'medi_float_2020_cgst_rate' => $medi_float_2020_cgst_rate,
												'medi_float_2020_cgst_tot' => $medi_float_2020_cgst_tot,
												'medi_float_2020_sgst_rate' => $medi_float_2020_sgst_rate,
												'medi_float_2020_sgst_tot' => $medi_float_2020_sgst_tot,
												'medi_float_2020_final_premium' => $medi_float_2020_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);
											$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_floater_2020_policy", $add_medi_floater_2020_policy_arr, $return_type = "lastID");
											$medi_floater_2020_id = $query2["lastID"];
										}
									} elseif ($company_txt == "Care Health Insurance Co Ltd") {
										if ($floater_policy_type == "Care Advantage") {
											$add_care_adv_float_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_care_adv_float_json_data' => $total_care_adv_float_json_data,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_adv_float_policy", $add_care_adv_float_policy_arr, $return_type = "lastID");
											$care_adv_float_id  = $query2["lastID"];
										} elseif ($floater_policy_type == "Care") {
											$add_care_float_policy_arr[] = array(
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_care_float_json_data' => $total_care_float_json_data,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'create_date' => date("Y-m-d h:i:s")
											);

											$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_float_policy", $add_care_float_policy_arr, $return_type = "lastID");
											$care_float_id  = $query2["lastID"];
										}
									}
								}
							}
						}

						if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Individual") { // Misslineous : Mediclaim : Common Individual
							if ($policy_type != 3) {
								$add_common_ind_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'tot_commind_json_data' => $tot_commind_json_data,
									'comm_ind_total_amount' => $comm_ind_total_amount,
									'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
									'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
									'comm_ind_load_desc' => $comm_ind_load_desc,
									'comm_ind_load_tot' => $comm_ind_load_tot,
									'comm_ind_gross_premium' => $comm_ind_gross_premium,
									'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
									'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
									'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
									'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
									'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
									'comm_ind_final_premium' => $comm_ind_final_premium,
									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_ind_policy", $add_common_ind_policy_arr, $return_type = "lastID");
								$common_ind_policy_id = $query2["lastID"];
							}
						}

						if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Floater") { // Misslineous : Mediclaim : Common Floater
							if ($policy_type != 3) {
								$add_common_float_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'tot_commfloat_json_data' => $tot_commfloat_json_data,
									'comm_float_total_amount' => $comm_float_total_amount,
									'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
									'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
									'comm_float_load_desc' => $comm_float_load_desc,
									'comm_float_load_tot' => $comm_float_load_tot,
									'comm_float_gross_premium' => $comm_float_gross_premium,
									'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
									'comm_float_cgst_rate' => $comm_float_cgst_rate,
									'comm_float_cgst_tot' => $comm_float_cgst_tot,
									'comm_float_sgst_rate' => $comm_float_sgst_rate,
									'comm_float_sgst_tot' => $comm_float_sgst_tot,
									'comm_float_final_premium' => $comm_float_final_premium,
									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_float_policy", $add_common_float_policy_arr, $return_type = "lastID");
								$common_float_policy_id = $query2["lastID"];
							}
						}

						if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater")) { // Misslineous : Super Top Up :floater
							if ($policy_type != 3) {
								if ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater") {
									if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Floater") {
										$add_hdfc_ergo_supertopup_float_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'tot_supertopup_float_hdfc_json' => $tot_supertopup_float_hdfc_json,
											'years_of_premium' => $years_of_premium,
											'tot_premium' => $tot_premium,
											'load_desc' => $load_desc,
											'load_tot' => $load_tot,
											'less_disc_per' => $less_disc_per,
											'less_disc_tot' => $less_disc_tot,
											'gross_premium_tot' => $gross_premium_tot,
											'gross_premium_tot_new' => $gross_premium_tot_new,
											'medi_cgst_rate' => $medi_cgst_rate,
											'medi_cgst_tot' => $medi_cgst_tot,
											'medi_sgst_rate' => $medi_sgst_rate,
											'medi_sgst_tot' => $medi_sgst_tot,
											'medi_final_premium' => $medi_final_premium,
											'max_age' => $max_age,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_super_topup_floater_policy", $add_hdfc_ergo_supertopup_float_policy_arr, $return_type = "lastID");
										$supertopup_float_policy_id = $query2["lastID"];
									} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Floater") {
										$add_the_new_india_supertopup_ind_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'total_the_new_india_supertopup_ind_json_data' => $total_the_new_india_supertopup_ind_json_data,
											'tot_premium' => $tot_premium,
											'medi_cgst_rate' => $medi_cgst_rate,
											'medi_cgst_tot' => $medi_cgst_tot,
											'medi_sgst_rate' => $medi_sgst_rate,
											'medi_sgst_tot' => $medi_sgst_tot,
											'medi_final_premium' => $medi_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_supertopup_ind_assu_policy", $add_the_new_india_supertopup_ind_policy_arr, $return_type = "lastID");
										$the_new_india_supertopup_assu_ind_policy_id = $query2["lastID"];
									} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Floater") {
										$add_star_health_supertopup_float_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'total_star_health_supertopup_float_json_data' => $total_star_health_supertopup_float_json_data,
											'tot_premium' => $tot_premium,
											'medi_cgst_rate' => $medi_cgst_rate,
											'medi_cgst_tot' => $medi_cgst_tot,
											'medi_sgst_rate' => $medi_sgst_rate,
											'medi_sgst_tot' => $medi_sgst_tot,
											'medi_final_premium' => $medi_final_premium,
											'max_age' => $max_age,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_supertopup_float_policy", $add_star_health_supertopup_float_policy_arr, $return_type = "lastID");
										$medi_star_health_super_float_policy_id = $query2["lastID"];
									} else {
										$add_supertopup_floater_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'policy_name_txt' => $policy_name_txt,
											'tot_supertopup_floater_json' => $tot_supertopup_floater_json,
											'name_insured_policy_option' => $name_insured_policy_option,
											'name_insured_deductable_thershold' => $name_insured_deductable_thershold,
											'name_insured_sum_insured' => $name_insured_sum_insured,
											'name_insured_premium' => $name_insured_premium,
											'supertopup_floater_total_premium' => $supertopup_floater_total_premium,
											'supertopup_floater_load_description' => $supertopup_floater_description,
											'supertopup_floater_load_amount' => $supertopup_floater_load_amount,
											'supertopup_floater_load_gross_premium' => $supertopup_floater_load_gross_premium,
											'supertopup_floater_cgst_rate' => $supertopup_floater_cgst_rate,
											'supertopup_floater_cgst_tot' => $supertopup_floater_cgst_tot,
											'supertopup_floater_sgst_rate' => $supertopup_floater_sgst_rate,
											'supertopup_floater_sgst_tot' => $supertopup_floater_sgst_tot,
											'supertopup_floater_final_premium' => $supertopup_floater_final_premium,
											'max_age' => $max_age,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "super_top_up_floater_policy", $add_supertopup_floater_policy_arr, $return_type = "lastID");
										$supertopup_floater_policy_id = $query2["lastID"];
									}
								}
							}
						}

						if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual")) { // Misslineous : Super Top Up :floater
							if ($policy_type != 3) {
								if ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual") {
									if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Individual") {
										$add_hdfc_ergo_supertopup_ind_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'tot_supertopup_ind_hdfc_json' => $tot_supertopup_ind_hdfc_json,
											'years_of_premium' => $years_of_premium,
											'tot_premium' => $tot_premium,
											'load_desc' => $load_desc,
											'load_tot' => $load_tot,
											'less_disc_per' => $less_disc_per,
											'less_disc_tot' => $less_disc_tot,
											'gross_premium_tot' => $gross_premium_tot,
											'gross_premium_tot_new' => $gross_premium_tot_new,
											'medi_cgst_rate' => $medi_cgst_rate,
											'medi_cgst_tot' => $medi_cgst_tot,
											'medi_sgst_rate' => $medi_sgst_rate,
											'medi_sgst_tot' => $medi_sgst_tot,
											'medi_final_premium' => $medi_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_super_topup_policy", $add_hdfc_ergo_supertopup_ind_policy_arr, $return_type = "lastID");
										$supertopup_ind_policy_id = $query2["lastID"];
									} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Individual") {
										$add_the_new_india_supertopup_ind_single_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'total_the_new_india_supertopup_ind_single_json_data' => $total_the_new_india_supertopup_ind_single_json_data,
											'tot_premium' => $tot_premium,
											'medi_cgst_rate' => $medi_cgst_rate,
											'medi_cgst_tot' => $medi_cgst_tot,
											'medi_sgst_rate' => $medi_sgst_rate,
											'medi_sgst_tot' => $medi_sgst_tot,
											'medi_final_premium' => $medi_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_supertopup_ind_single_assu_policy", $add_the_new_india_supertopup_ind_single_policy_arr, $return_type = "lastID");
										$the_new_india_supertopup_assu_ind_single_policy_id = $query2["lastID"];
									} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Individual") {
										$add_star_health_supertopup_ind_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'fk_company_id' => $company,
											'fk_department_id' => $department,
											'policy_name_txt' => $policy_name_txt,
											'total_star_health_supertopup_ind_json_data' => $total_star_health_supertopup_ind_json_data,
											'tot_premium' => $tot_premium,
											'medi_cgst_rate' => $medi_cgst_rate,
											'medi_cgst_tot' => $medi_cgst_tot,
											'medi_sgst_rate' => $medi_sgst_rate,
											'medi_sgst_tot' => $medi_sgst_tot,
											'medi_final_premium' => $medi_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_supertopup_ind_policy", $add_star_health_supertopup_ind_policy_arr, $return_type = "lastID");
										$medi_star_health_super_ind_policy_id = $query2["lastID"];
									} else {
										$add_supertopup_ind_policy_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'policy_name_txt' => $policy_name_txt,
											'tot_supertopup_ind_json' => $tot_supertopup_ind_json,
											'supertopup_ind_total_premium' => $supertopup_ind_total_premium,
											'supertopup_ind_load_description' => $supertopup_ind_description,
											'supertopup_ind_load_amount' => $supertopup_ind_load_amount,
											'supertopup_ind_load_gross_premium' => $supertopup_ind_load_gross_premium,
											'supertopup_ind_cgst_rate' => $supertopup_ind_cgst_rate,
											'supertopup_ind_cgst_tot' => $supertopup_ind_cgst_tot,
											'supertopup_ind_sgst_rate' => $supertopup_ind_sgst_rate,
											'supertopup_ind_sgst_tot' => $supertopup_ind_sgst_tot,
											'supertopup_ind_final_premium' => $supertopup_ind_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "supertopup_ind_policy", $add_supertopup_ind_policy_arr, $return_type = "lastID");
										$supertopup_ind_policy_id = $query2["lastID"];
									}
								}
							}
						}

						if ($policy_name_txt == "Bharat Sookshma Udyam") {
							if ($policy_type != 3) {
								$add_sookshma_fire_policy_dump_arr[] = array(
									'fk_policy_id' => $policy_id,
									'total_sum_assured' => $total_sum_assured,
									'fire_rate_per' => $fire_rate_per,
									'fire_rate_tot_amount' => $fire_rate_tot,
									'less_discount_per' => $less_discount_per,
									'less_discount_tot_amount' => $less_discount_tot,
									'fire_rate_after_discount' => $fire_rate_after_discount_tot,
									'gross_premium' => $gross_premium,
									'cgst_rate_per' => $cgst_fire_per,
									'cgst_tot_amount' => $cgst_fire_tot,
									'sgst_rate_per' => $sgst_fire_per,
									'sgst_tot_amount' => $sgst_fire_tot,
									'final_payable_premium' => $final_paybal_premium,
									'create_date' => date("Y-m-d h:i:s")
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "sookshma_fire_policy_dump", $add_sookshma_fire_policy_dump_arr, $return_type = "lastID");
								$sookshma_fire_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Bharat Laghu Udyam") {
							if ($policy_type != 3) {
								$add_laghu_fire_policy_dump_arr[] = array(
									'fk_policy_id' => $policy_id,
									'total_sum_assured' => $total_sum_assured,
									'fire_rate_per' => $fire_rate_per,
									'fire_rate_tot_amount' => $fire_rate_tot,
									'less_discount_per' => $less_discount_per,
									'less_discount_tot_amount' => $less_discount_tot,
									'fire_rate_after_discount' => $fire_rate_after_discount_tot,
									'gross_premium' => $gross_premium,
									'cgst_rate_per' => $cgst_fire_per,
									'cgst_tot_amount' => $cgst_fire_tot,
									'sgst_rate_per' => $sgst_fire_per,
									'sgst_tot_amount' => $sgst_fire_tot,
									'final_payable_premium' => $final_paybal_premium,
									'create_date' => date("Y-m-d h:i:s")
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "laghu_fire_policy_dump", $add_laghu_fire_policy_dump_arr, $return_type = "lastID");
								$laghu_fire_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Bharat Griha Raksha") {
							if ($policy_type != 3) {
								$add_griharaksha_fire_policy_dump_arr[] = array(
									'fk_policy_id' => $policy_id,
									'total_sum_assured' => $total_sum_assured,
									'fire_rate_per' => $fire_rate_per,
									'fire_rate_tot_amount' => $fire_rate_tot,
									'less_discount_per' => $less_discount_per,
									'less_discount_tot_amount' => $less_discount_tot,
									'fire_rate_after_discount' => $fire_rate_after_discount_tot,
									'gross_premium' => $gross_premium,
									'cgst_rate_per' => $cgst_fire_per,
									'cgst_tot_amount' => $cgst_fire_tot,
									'sgst_rate_per' => $sgst_fire_per,
									'sgst_tot_amount' => $sgst_fire_tot,
									'final_payable_premium' => $final_paybal_premium,
									'create_date' => date("Y-m-d h:i:s")
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "griharaksha_fire_policy_dump", $add_griharaksha_fire_policy_dump_arr, $return_type = "lastID");
								$griharaksha_fire_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Standard Fire & Allied Perils") {
							if ($policy_type != 3) {
								$add_bharat_fire_allied_perils_policy_dump_arr[] = array(
									'fk_policy_id' => $policy_id,
									'allied_perils_total_sum_assured' => $total_sum_assured,
									'allied_perils_fire_rate_per' => $fire_rate_per,
									'allied_perils_fire_rate_tot_amount' => $fire_rate_tot,
									'allied_perils_less_discount_per' => $less_discount_per,
									'allied_perils_less_discount_tot_amount' => $less_discount_tot,
									'allied_perils_fire_rate_after_discount' => $fire_rate_after_discount_tot,

									'allied_perils_stfi_rate' => $stfi_rate_per,
									'allied_perils_stfi_rate_total' => $stfi_rate_total,
									'allied_perils_earthquake_rate' => $earthquake_rate_per,
									'allied_perils_earthquake_rate_total' => $earthquake_rate_total,
									'allied_perils_terrorisum_rate' => $terrorisum_rate_per,
									'allied_perils_terrorisum_rate_total' => $terrorisum_rate_total,
									'tot_sum_devid' => $tot_sum_devid,

									'allied_perils_gross_premium' => $gross_premium,
									'allied_perils_cgst_rate_per' => $cgst_fire_per,
									'allied_perils_cgst_tot_amount' => $cgst_fire_tot,
									'allied_perils_sgst_rate_per' => $sgst_fire_per,
									'allied_perils_sgst_tot_amount' => $sgst_fire_tot,
									'allied_perils_final_payable_premium' => $final_paybal_premium,
									'create_date' => date("Y-m-d h:i:s")
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "bharat_fire_allied_perils_policy_dump", $add_bharat_fire_allied_perils_policy_dump_arr, $return_type = "lastID");
								$fire_allied_perils_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Burglary") {
							if ($policy_type != 3) {
								$add_burglary_policy_dump_arr[] = array(
									'fk_policy_id' => $policy_id,
									'burglary_total_sum_assured' => $total_sum_assured,
									'burglary_fire_rate_per' => $fire_rate_per,
									'burglary_fire_rate_tot_amount' => $fire_rate_tot,
									'burglary_less_discount_per' => $less_discount_per,
									'burglary_less_discount_tot_amount' => $less_discount_tot,
									'burglary_fire_rate_after_discount' => $fire_rate_after_discount_tot,
									'burglary_gross_premium' => $gross_premium,
									'burglary_cgst_rate_per' => $cgst_fire_per,
									'burglary_cgst_tot_amount' => $cgst_fire_tot,
									'burglary_sgst_rate_per' => $sgst_fire_per,
									'burglary_sgst_tot_amount' => $sgst_fire_tot,
									'burglary_final_payable_premium' => $final_paybal_premium,
									'create_date' => date("Y-m-d h:i:s")
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "burglary_policy_dump", $add_burglary_policy_dump_arr, $return_type = "lastID");
								$burglary_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Term Plan") { // Life Insurence : Term Plan
							if ($policy_type != 3) {
								$add_term_plan_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'term_plan_policy' => $policy_term,
									'term_plan_premium_paying_term' => $premium_paying_term,
									'term_plan_total_sum_insured' => $sum_insured,
									'term_plan_basic_premium' => $basic_premium,
									'term_plan_add_loading' => $add_loading,
									'term_plan_loading_description' => $loading_description,
									'term_plan_premium_after_loading' => $premium_after_loading,
									'term_plan_cgst' => $cgst_term_plan,
									'term_plan_sgst' => $sgst_term_plan,
									'term_plan_cgst_tot_ammount' => $cgst_term_plan_tot,
									'term_plan_sgst_tot_ammount' => $sgst_term_plan_tot,
									'term_plan_final_paybal_premium' => $term_plan_final_paybal_premium,
									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "term_plan_policy", $add_term_plan_policy_arr, $return_type = "lastID");
								$burglary_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Shopkeeper") { // Shopkeeper:misleneous
							if ($policy_type != 3) {
								$add_shopkeeper_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'shopkeeper_risk_address' => $shopkeeper_risk_address,
									'fire_sum_insured_1' => $fire_sum_insured_1,
									'fire_sum_insured_2' => $fire_sum_insured_2,
									'fire_sum_insured_3' => $fire_sum_insured_3,
									'fire_rate_1' => $fire_rate_1,
									'fire_rate_2' => $fire_rate_2,
									'fire_rate_3' => $fire_rate_3,
									'fire_premium_1' => $fire_premium_1,
									'fire_premium_2' => $fire_premium_2,
									'fire_premium_3' => $fire_premium_3,

									'burglary_sum_insured_1' => $burglary_sum_insured_1,
									'burglary_sum_insured_2' => $burglary_sum_insured_2,
									'burglary_sum_insured_3' => $burglary_sum_insured_3,
									'burglary_rate_1' => $burglary_rate_1,
									'burglary_rate_2' => $burglary_rate_2,
									'burglary_rate_3' => $burglary_rate_3,
									'burglary_premium_1' => $burglary_premium_1,
									'burglary_premium_2' => $burglary_premium_2,
									'burglary_premium_3' => $burglary_premium_3,

									'money_insu_sum_insured_1' => $money_insu_sum_insured_1,
									'money_insu_sum_insured_2' => $money_insu_sum_insured_2,
									'money_insu_sum_insured_3' => $money_insu_sum_insured_3,
									'money_insu_rate_1' => $money_insu_rate_1,
									'money_insu_rate_2' => $money_insu_rate_2,
									'money_insu_rate_3' => $money_insu_rate_3,
									'money_insu_premium_1' => $money_insu_premium_1,
									'money_insu_premium_2' => $money_insu_premium_2,
									'money_insu_premium_3' => $money_insu_premium_3,

									'plate_glass_sum_insured' => $plate_glass_sum_insured,
									'plate_glass_rate_per' => $plate_glass_rate_per,
									'plate_glass_premium' => $plate_glass_premium,

									'neon_glow_sum_insured' => $neon_glow_sum_insured,
									'neon_glow_rate_per' => $neon_glow_rate_per,
									'neon_glow_premium' => $neon_glow_premium,

									'baggage_ins_sum_insured' => $baggage_ins_sum_insured,
									'baggage_ins_rate_per' => $baggage_ins_rate_per,
									'baggage_ins_premium' => $baggage_ins_premium,

									'personal_accident_json' => $total_personal_accident,
									'personal_accident_sum_insured' => $personal_accident_sum_insured,
									'personal_accident_rate_per' => $personal_accident_rate_per,
									'personal_accident_premium' => $personal_accident_premium,

									'fidelity_gaur_json' => $total_fidelity_gaur,
									'fidelity_gaur_sum_insured' => $fidelity_gaur_sum_insured,
									'fidelity_gaur_rate_per' => $fidelity_gaur_rate_per,
									'fidelity_gaur_premium' => $fidelity_gaur_premium,

									'pub_libility_sum_insured' => $pub_libility_sum_insured,
									'work_men_compens_sum_insured' => $work_men_compens_sum_insured,
									'pub_libility_rate' => $pub_libility_rate,
									'work_men_compens_rate' => $work_men_compens_rate,
									'pub_libility_premium' => $pub_libility_premium,
									'work_men_compens_premium' => $work_men_compens_premium,

									'bus_inter_sum_insured_1' => $bus_inter_sum_insured_1,
									'bus_inter_sum_insured_2' => $bus_inter_sum_insured_2,
									'bus_inter_sum_insured_3' => $bus_inter_sum_insured_3,
									'bus_inter_rate_1' => $bus_inter_rate_1,
									'bus_inter_rate_2' => $bus_inter_rate_2,
									'bus_inter_rate_3' => $bus_inter_rate_3,
									'bus_inter_premium_1' => $bus_inter_premium_1,
									'bus_inter_premium_2' => $bus_inter_premium_2,
									'bus_inter_premium_3' => $bus_inter_premium_3,

									'shopkeeper_total_sum_assured' => $shopkeeper_total_sum_assured,
									'shopkeeper_total_premium' => $shopkeeper_total_premium,
									'shopkeeper_less_discount_per' => $shopkeeper_less_discount_per,
									'shopkeeper_less_discount_tot' => $shopkeeper_less_discount_tot,
									'shopkeeper_fire_rate_after_discount_tot' => $shopkeeper_fire_rate_after_discount_tot,
									'shopkeeper_cgst_fire_per' => $shopkeeper_cgst_fire_per,
									'shopkeeper_cgst_fire_tot' => $shopkeeper_cgst_fire_tot,
									'shopkeeper_sgst_fire_per' => $shopkeeper_sgst_fire_per,
									'shopkeeper_sgst_fire_tot' => $shopkeeper_sgst_fire_tot,
									'shopkeeper_final_paybal_premium' => $shopkeeper_final_paybal_premium,

									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "shopkeeper_policy", $add_shopkeeper_policy_arr, $return_type = "lastID");
								$shopkeeper_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Jweller Block") { // Jweller Block:misleneous
							if ($policy_type != 3) {
								$add_jweller_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,

									'stock_premises_sum_insu_1' => $stock_premises_sum_insu_1,
									'stock_premises_sum_insu_2' => $stock_premises_sum_insu_2,
									'stock_premises_sum_insu_3' => $stock_premises_sum_insu_3,
									'stock_premises_sum_insu_4' => $stock_premises_sum_insu_4,
									'stock_premises_sum_insu_5' => $stock_premises_sum_insu_5,
									'stock_premises_sum_insu_6' => $stock_premises_sum_insu_6,
									'stock_premises_premium_1' => $stock_premises_premium_1,
									'stock_premises_premium_2' => $stock_premises_premium_2,

									'stock_custody_sum_insu_1' => $stock_custody_sum_insu_1,
									'stock_custody_sum_insu_2' => $stock_custody_sum_insu_2,
									'stock_custody_sum_insu_3' => $stock_custody_sum_insu_3,
									'stock_custody_sum_insu_4' => $stock_custody_sum_insu_4,
									'stock_custody_premium_1' => $stock_custody_premium_1,
									'stock_custody_premium_2' => $stock_custody_premium_2,

									'stock_transit_sum_insu_1' => $stock_transit_sum_insu_1,
									'stock_transit_sum_insu_2' => $stock_transit_sum_insu_2,
									'stock_transit_sum_insu_3' => $stock_transit_sum_insu_3,
									'stock_transit_sum_insu_4' => $stock_transit_sum_insu_4,
									'stock_transit_premium' => $stock_transit_premium,

									'standard_fire_perils_1' => $standard_fire_perils_1,
									'standard_fire_perils_2' => $standard_fire_perils_2,
									'standard_fire_perils_3' => $standard_fire_perils_3,
									'standard_fire_perils_4' => $standard_fire_perils_4,
									'standard_fire_perils_5' => $standard_fire_perils_5,
									'standard_fire_perils_6' => $standard_fire_perils_6,
									'standard_fire_perils_premium_1' => $standard_fire_perils_premium_1,
									'standard_fire_perils_premium_2' => $standard_fire_perils_premium_2,
									'standard_fire_perils_premium_3' => $standard_fire_perils_premium_3,

									'content_burglary_sum_insu' => $content_burglary_sum_insu,
									'content_burglary_premium' => $content_burglary_premium,

									'stock_exhibition_sum_insu' => $stock_exhibition_sum_insu,
									'stock_exhibition_premium' => $stock_exhibition_premium,

									'fidelity_guar_cover_sum_insu_1' => $fidelity_guar_cover_sum_insu_1,
									'fidelity_guar_cover_premium_1' => $fidelity_guar_cover_premium_1,
									'total_fidelity_guar_cover_json' => $total_fidelity_guar_cover,

									'plate_glass_sum_insu' => $plate_glass_sum_insu,
									'plate_glass_premium' => $jweller_plate_glass_premium,

									'neon_sign_sum_insu' => $neon_sign_sum_insu,
									'neon_sign_premium' => $neon_sign_premium,

									'portable_equipmets_sum_insu' => $portable_equipmets_sum_insu,
									'portable_equipmets_premium' => $portable_equipmets_premium,

									'employee_compensation_sum_insu_1' => $employee_compensation_sum_insu_1,
									'employee_compensation_sum_insu_2' => $employee_compensation_sum_insu_2,
									'employee_compensation_premium' => $employee_compensation_premium,

									'electronic_equipment_sum_insu' => $electronic_equipment_sum_insu,
									'electronic_equipment_premium' => $electronic_equipment_premium,

									'public_liability_sum_insu' => $public_liability_sum_insu,
									'public_liability_premium' => $public_liability_premium,

									'money_transit_sum_insu' => $money_transit_sum_insu,
									'money_transit_premium' => $money_transit_premium,

									'machinery_breakdown_sum_insu' => $machinery_breakdown_sum_insu,
									'machinery_breakdown_premium' => $machinery_breakdown_premium,

									'jweller_less_discount' => $jweller_less_discount,
									'jweller_total_sum_assured' => $jweller_total_sum_assured,
									'jweller_less_discount_tot' => $jweller_less_discount_tot,
									'jweller_after_discount_tot' => $jweller_after_discount_tot,
									'jweller_terrorism_per' => $jweller_terrorism_per,
									'jweller_terrorism_per_tot' => $jweller_terrorism_per_tot,
									'jweller_tot_net_premium' => $jweller_tot_net_premium,
									'jweller_cgst_per' => $jweller_cgst_per,
									'jweller_sgst_per' => $jweller_sgst_per,
									'jweller_cgst_per_tot' => $jweller_cgst_per_tot,
									'jweller_sgst_per_tot' => $jweller_sgst_per_tot,
									'jweller_final_payble' => $jweller_final_payble,

									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "jweller_policy", $add_jweller_policy_arr, $return_type = "lastID");
								$jweller_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Open Policy" || $policy_name_txt == "Stop Policy" || $policy_name_txt == "Specific Policy") { // Marine : Open Policy/STop Policy
							if ($policy_type != 3) {
								$add_marine_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'policy_name_txt' => $policy_name_txt,

									'from_destination' => $from_destination,
									'to_destination' => $to_destination,
									'coverage_type' => $coverage_type,
									'marine_description' => $marine_description,
									'interest_insured' => $interest_insured,
									'group_name_address' => $group_name_address,
									'marine_sum_insured' => $marine_sum_insured,
									'packing_stand_customary' => $packing_stand_customary,
									'total_marine_cc_json' => $total_marine_cc,
									'business_description' => $business_description,
									'voyage_domestic_purchase' => $voyage_domestic_purchase,
									'voyage_international_purchase' => $voyage_international_purchase,

									'voyage_domestic_sales' => $voyage_domestic_sales,
									'voyage_export_sales' => $voyage_export_sales,
									'voyage_job_worker' => $voyage_job_worker,
									'voyage_domestic_fini_good' => $voyage_domestic_fini_good,
									'voyage_export_fini_good' => $voyage_export_fini_good,
									'voyage_domestic_purch_return' => $voyage_domestic_purch_return,
									'voyage_export_purch_return' => $voyage_export_purch_return,
									'voyage_sales_return' => $voyage_sales_return,

									'domestic_purch' => $domestic_purch,
									'international_purch' => $international_purch,
									'domestic_sale' => $domestic_sale,
									'export_sale' => $export_sale,
									'per_bottom_limit' => $per_bottom_limit,
									'per_location_limit' => $per_location_limit,
									'per_claim_excess' => $per_claim_excess,
									'declaration_sale_fig' => $declaration_sale_fig,

									'annual_turn_over' => $annual_turn_over,
									'tot_sum_insured' => $tot_sum_insured,
									'rate_applied' => $rate_applied,
									'rate_applied_per' => $rate_applied_per,
									'rate_applied_hidden' => $rate_applied_hidden,
									'marine_cgst_per' => $marine_cgst_per,
									'marine_sgst_per' => $marine_sgst_per,
									'cgst_rate_tot' => $cgst_rate_tot,
									'sgst_rate_tot' => $sgst_rate_tot,
									'marine_final_payble_premium' => $marine_final_payble_premium,

									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "marine_policy", $add_marine_policy_arr, $return_type = "lastID");
								$burglary_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "GMC") { // GMC:misleneous
							if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
								if ($policy_type != 3) {
									$add_gmc_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'tot_gmc_json_data' => $total_gmc_data,
										'gmc_family_size' => $gmc_family_size,
										'gmc_tot_sum_insured' => $gmc_total_sum_insured,
										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "gmc_policy", $add_gmc_policy_arr, $return_type = "lastID");
									$gmc_policy_id = $query2["lastID"];
								}
							}
						} elseif ($policy_name_txt == "GPA") { // GPA:misleneous
							if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
								if ($policy_type != 3) {
									$add_gmc_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'tot_gpa_json_data' => $total_gpa_data,
										'gpa_family_size' => $gpa_family_size,
										'gpa_tot_sum_insured' => $gpa_total_sum_insured,
										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "gpa_policy", $add_gmc_policy_arr, $return_type = "lastID");
									$gpa_policy_id = $query2["lastID"];
								}
							}
						} elseif ($policy_name_txt == "Personal Accident") { // Personal Accident:misleneous
							if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater") {
								if ($policy_type != 3) {
									$add_personal_accident_ind_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'total_pa_ind_json_data' => $total_pa_ind_json_data,
										'tot_premium' => $tot_premium,
										'less_disc_rate' => $less_disc_rate,
										'less_disc_tot' => $less_disc_tot,
										'gross_premium' => $gross_premium,
										'gross_premium_new' => $gross_premium_new,
										'medi_cgst_rate' => $medi_cgst_rate,
										'medi_cgst_tot' => $medi_cgst_tot,
										'medi_sgst_rate' => $medi_sgst_rate,
										'medi_sgst_tot' => $medi_sgst_tot,
										'medi_final_premium' => $medi_final_premium,
										'create_date' => date("Y-m-d h:i:s"),
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "personal_accident_ind_policy", $add_personal_accident_ind_policy_arr, $return_type = "lastID");
									$paccident_policy_id  = $query2["lastID"];
								}
							} elseif ($policy_type_txt == "Common Individual") {
								if ($policy_type != 3) {
									$add_common_ind_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'tot_commind_json_data' => $tot_commind_json_data,
										'comm_ind_total_amount' => $comm_ind_total_amount,
										'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
										'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
										'comm_ind_load_desc' => $comm_ind_load_desc,
										'comm_ind_load_tot' => $comm_ind_load_tot,
										'comm_ind_gross_premium' => $comm_ind_gross_premium,
										'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
										'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
										'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
										'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
										'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
										'comm_ind_final_premium' => $comm_ind_final_premium,
										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_ind_policy", $add_common_ind_policy_arr, $return_type = "lastID");
									$common_ind_policy_id = $query2["lastID"];
								}
							} elseif ($policy_type_txt == "Common Floater") {
								if ($policy_type != 3) {
									$add_common_float_policy_arr[] = array(
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'tot_commfloat_json_data' => $tot_commfloat_json_data,
										'comm_float_total_amount' => $comm_float_total_amount,
										'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
										'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
										'comm_float_load_desc' => $comm_float_load_desc,
										'comm_float_load_tot' => $comm_float_load_tot,
										'comm_float_gross_premium' => $comm_float_gross_premium,
										'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
										'comm_float_cgst_rate' => $comm_float_cgst_rate,
										'comm_float_cgst_tot' => $comm_float_cgst_tot,
										'comm_float_sgst_rate' => $comm_float_sgst_rate,
										'comm_float_sgst_tot' => $comm_float_sgst_tot,
										'comm_float_final_premium' => $comm_float_final_premium,
										'create_date' => date("Y-m-d h:i:s")
									);

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_float_policy", $add_common_float_policy_arr, $return_type = "lastID");
									$common_float_policy_id = $query2["lastID"];
								}
							}
						} elseif ($policy_name_txt == "Private Car") { // Private Car: Motor
							if ($policy_type != 3) {
								$add_motor_private_car_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,

									'vehicle_make_model' => $vehicle_make_model,
									'vehicle_reg_no' => $vehicle_reg_no,
									'insu_declared_val' => $insu_declared_val,
									'non_elect_access_val' => $non_elect_access_val,
									'elect_access_val' => $elect_access_val,
									'lpg_cng_idv_val' => $lpg_cng_idv_val,
									'trailer_val' => $trailer_val,
									'year_manufact_val' => $year_manufact_val,
									'rta_city_code' => $rta_city_code,
									'rta_city' => $rta_city,
									'rta_city_cat' => $rta_city_cat,
									'cubic_capacity_val' => $cubic_capacity_val,
									'calculation_method' => $calculation_method,
									'type_of_cover' => $type_of_cover,
									'prev_policy_expiry_date' => $prev_policy_expiry_date,
									'policy_period' => $policy_period,
									'inception_date' => $inception_date,
									'expiry_date' => $expiry_date,

									'od_basic_od_tot' => $od_basic_od_tot,
									'od_special_disc_per' => $od_special_disc_per,
									'od_special_disc_tot' => $od_special_disc_tot,
									'od_special_load_per' => $od_special_load_per,
									'od_special_load_tot' => $od_special_load_tot,
									'od_net_basic_od_tot' => $od_net_basic_od_tot,
									'od_non_elec_acc_tot' => $od_non_elec_acc_tot,
									'od_elec_acc_tot' => $od_elec_acc_tot,
									'od_bi_fuel_kit_tot' => $od_bi_fuel_kit_tot,
									'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
									'od_trailer_tot' => $od_trailer_tot,
									'od_geographical_area_tot' => $od_geographical_area_tot,
									'od_embassy_load_tot' => $od_embassy_load_tot,
									'od_fibre_glass_tank_tot' => $od_fibre_glass_tank_tot,
									'od_driving_tut_tot' => $od_driving_tut_tot,
									'od_rallies_tot' => $od_rallies_tot,
									'od_basic_od2_tot' => $od_basic_od2_tot,
									'od_anti_tot' => $od_anti_tot,
									'od_handicap_tot' => $od_handicap_tot,
									'od_aai_tot' => $od_aai_tot,
									'od_vintage_tot' => $od_vintage_tot,
									'od_own_premises_tot' => $od_own_premises_tot,
									'od_voluntary_deduc_tot' => $od_voluntary_deduc_tot,
									'od_basic_od3_tot' => $od_basic_od3_tot,
									'od_ncb_per' => $od_ncb_per,
									'od_ncb_tot' => $od_ncb_tot,
									'od_tot_anual_od_premium' => $od_tot_anual_od_premium,
									'od_tot_od_premium_policy_period' => $od_tot_od_premium_policy_period,

									'tp_basic_tp_tot' => $tp_basic_tp_tot,
									'tp_restr_tppd' => $tp_restr_tppd,
									'tp_trailer_tot' => $tp_trailer_tot,
									'tp_bi_fuel_tot' => $tp_bi_fuel_tot,
									'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
									'tp_compul_own_driv_tot' => $tp_compul_own_driv_tot,
									'tp_geographical_area_tot' => $tp_geographical_area_tot,
									'tp_unnamed_papax_tot' => $tp_unnamed_papax_tot,
									'tp_no_seats_limit_person_tot' => $tp_no_seats_limit_person_tot,
									'tp_ll_drv_emp_tot' => $tp_ll_drv_emp_tot,
									'tp_no_drv_emp_tot' => $tp_no_drv_emp_tot,
									'tp_noof_person_tot' => $tp_noof_person_tot,
									'tp_pa_paid_drv_tot' => $tp_pa_paid_drv_tot,
									'tp_ll_defe_tot' => $tp_ll_defe_tot,
									'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
									'tp_tot_anual_tp_premium' => $tp_tot_anual_tp_premium,
									'tp_tot_premium_policy_period' => $tp_tot_premium_policy_period,
									'plan_name' => $plan_name,
									'plan_name_tot' => $plan_name_tot,
									'tot_othercover_ind_json' => $tot_othercover_ind_json,
									'tot_anual_cover_premium' => $tot_anual_cover_premium,
									'tot_cover_premium_period' => $tot_cover_premium_period,

									'tot_premium' => $tot_premium,
									'motor_cgst_rate' => $motor_cgst_rate,
									'motor_cgst_tot' => $motor_cgst_tot,
									'motor_sgst_rate' => $motor_sgst_rate,
									'motor_sgst_tot' => $motor_sgst_tot,
									'tot_payable_premium' => $tot_payable_premium,

									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_private_car_policy", $add_motor_private_car_policy_arr, $return_type = "lastID");
								$private_car_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "2 Wheeler") { // 2 Wheeler: Motor
							if ($policy_type != 3) {
								$add_motor_two_wheeler_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,

									'vehicle_make_model' => $vehicle_make_model,
									'vehicle_reg_no' => $vehicle_reg_no,
									'insu_declared_val' => $insu_declared_val,
									'elect_acc_val' => $elect_acc_val,
									'other_elect_acc_val' => $other_elect_acc_val,
									'policy_period_tenure_years' => $policy_period_tenure_years,
									'previous_policy_expiry_date_tenur' => $previous_policy_expiry_date_tenur,
									'year_manufact_val' => $year_manufact_val,
									'rta_city_code' => $rta_city_code,
									'rta_city' => $rta_city,
									'rta_city_cat' => $rta_city_cat,
									'cubic_capacity_val' => $cubic_capacity_val,
									'type_of_cover' => $type_of_cover,
									'policy_period' => $policy_period,
									'inception_date' => $inception_date,
									'expiry_date' => $expiry_date,

									'od_basic_od_tot' => $od_basic_od_tot,
									'od_special_disc_per' => $od_special_disc_per,
									'od_special_disc_tot' => $od_special_disc_tot,
									'od_special_load_per' => $od_special_load_per,
									'od_special_load_tot' => $od_special_load_tot,
									'od_net_basic_od_tot' => $od_net_basic_od_tot,
									'od_elec_acc_tot' => $od_elec_acc_tot,
									'od_other_elec_acc_tot' => $od_other_elec_acc_tot,
									'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
									'od_geographical_area_tot' => $od_geographical_area_tot,
									'od_rallies_tot' => $od_rallies_tot,
									'od_embassy_load_tot' => $od_embassy_load_tot,
									'od_basic_od2_tot' => $od_basic_od2_tot,
									'od_anti_theft_tot' => $od_anti_theft_tot,
									'od_handicap_tot' => $od_handicap_tot,
									'od_aai_tot' => $od_aai_tot,
									'od_side_car_tot' => $od_side_car_tot,
									'od_own_premises_tot' => $od_own_premises_tot,
									'od_voluntary_excess_tot' => $od_voluntary_excess_tot,
									'od_basic_od3_tot' => $od_basic_od3_tot,
									'od_ncb_per' => $od_ncb_per,
									'od_ncb_tot' => $od_ncb_tot,
									'od_tot_od_premium_policy_period' => $od_tot_od_premium_policy_period,

									'tp_basic_tp_tot' => $tp_basic_tp_tot,
									'tp_restr_tppd_tot' => $tp_restr_tppd_tot,
									'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
									'tp_geographical_area_tot' => $tp_geographical_area_tot,
									'tp_compul_pa_own_driv_tot' => $tp_compul_pa_own_driv_tot,
									'tp_unnamed_pa_tot' => $tp_unnamed_pa_tot,
									'tp_ll_drv_emp_imt28_tot' => $tp_ll_drv_emp_imt28_tot,
									'tp_ll_other_emp_tot' => $tp_ll_other_emp_tot,
									'tp_noof_other_emp_tot' => $tp_noof_other_emp_tot,
									'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
									'tp_tot_premium_policy_period' => $tp_tot_premium_policy_period,
									'plan_name' => $plan_name,
									'plan_name_tot' => $plan_name_tot,
									'tot_othercover_ind_json' => $tot_othercover_ind_json,
									'tot_cover_premium_period' => $tot_cover_premium_period,

									'tot_premium' => $tot_premium,
									'motor_cgst_rate' => $motor_cgst_rate,
									'motor_cgst_tot' => $motor_cgst_tot,
									'motor_sgst_rate' => $motor_sgst_rate,
									'motor_sgst_tot' => $motor_sgst_tot,
									'tot_payable_premium' => $tot_payable_premium,

									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_2_wheeler_policy", $add_motor_two_wheeler_policy_arr, $return_type = "lastID");
								$two_wheeler_policy_id = $query2["lastID"];
							}
						} elseif ($policy_name_txt == "Commercial Vehicle") { // Commercial Vehicle: Motor
							if ($policy_type != 3) {
								$add_motor_commercial_policy_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,

									'vehicle_make_model' => $vehicle_make_model,
									'vehicle_reg_no' => $vehicle_reg_no,
									'insu_declared_val' => $insu_declared_val,
									'elect_acc_val' => $elect_acc_val,
									'lpg_cng_idv_val' => $lpg_cng_idv_val,
									'year_manufact_val' => $year_manufact_val,
									'zone_city_code' => $zone_city_code,
									'zone_city' => $zone_city,
									'zone_city_cat' => $zone_city_cat,
									'gvw_val' => $gvw_val,
									'class_val' => $class_val,
									'type_of_cover' => $type_of_cover,
									'policy_period' => $policy_period,
									'inception_date' => $inception_date,
									'expiry_date' => $expiry_date,

									'od_basic_od_tot' => $od_basic_od_tot,
									'od_elec_acc_tot' => $od_elec_acc_tot,
									'od_trailer_tot' => $od_trailer_tot,
									'od_bi_fuel_kit_tot' => $od_bi_fuel_kit_tot,
									'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
									'od_geog_area_tot' => $od_geog_area_tot,
									'od_fiber_glass_tank_tot' => $od_fiber_glass_tank_tot,
									'od_imt_cover_mud_guard_tot' => $od_imt_cover_mud_guard_tot,
									'od_basic_od2_tot' => $od_basic_od2_tot,
									'od_basic_od3_tot' => $od_basic_od3_tot,
									'od_ncb_per' => $od_ncb_per,
									'od_ncb_tot' => $od_ncb_tot,
									'od_tot_anual_od_premium' => $od_tot_anual_od_premium,
									'od_special_disc_per' => $od_special_disc_per,
									'od_special_disc_tot' => $od_special_disc_tot,
									'od_special_load_per' => $od_special_load_per,
									'od_special_load_tot' => $od_special_load_tot,
									'od_tot_od_premium' => $od_tot_od_premium,

									'tp_basic_tp_tot' => $tp_basic_tp_tot,
									'tp_restr_tppd_tot' => $tp_restr_tppd_tot,
									'tp_trailer_tot' => $tp_trailer_tot,
									'tp_bi_fuel_kit_tot' => $tp_bi_fuel_kit_tot,
									'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
									'tp_geog_area_tot' => $tp_geog_area_tot,
									'tp_compul_pa_own_driv_tot' => $tp_compul_pa_own_driv_tot,
									'tp_pa_paid_driver_tot' => $tp_pa_paid_driver_tot,
									'tp_ll_emp_non_fare_tot' => $tp_ll_emp_non_fare_tot,
									'tp_ll_driver_cleaner_tot' => $tp_ll_driver_cleaner_tot,
									'tp_ll_person_operation_tot' => $tp_ll_person_operation_tot,
									'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
									'tp_tot_premium' => $tp_tot_premium,
									'tp_consumables' => $tp_consumables,
									'tp_zero_depreciation' => $tp_zero_depreciation,
									'tp_road_side_ass' => $tp_road_side_ass,
									'tp_tot_addon_premium' => $tp_tot_addon_premium,

									'tot_owd_premium' => $tot_owd_premium,
									'tot_owd_addon_premium' => $tot_owd_addon_premium,
									'tot_btp_premium' => $tot_btp_premium,
									'tot_other_tp_premium' => $tot_other_tp_premium,
									'tot_premium' => $tot_premium,
									'tot_owd_cgst_rate' => $tot_owd_cgst_rate,
									'tot_owd_sgst_rate' => $tot_owd_sgst_rate,
									'tot_owd_addon_cgst_rate' => $tot_owd_addon_cgst_rate,
									'tot_owd_addon_sgst_rate' => $tot_owd_addon_sgst_rate,
									'tot_btp_cgst_rate' => $tot_btp_cgst_rate,
									'tot_btp_sgst_rate' => $tot_btp_sgst_rate,
									'tot_other_tp_cgst_rate' => $tot_other_tp_cgst_rate,
									'tot_other_tp_sgst_rate' => $tot_other_tp_sgst_rate,
									'tot_owd_gst' => $tot_owd_gst,
									'tot_owd_addon_gst' => $tot_owd_addon_gst,
									'tot_btp_gst' => $tot_btp_gst,
									'tot_other_tp_gst' => $tot_other_tp_gst,
									'tot_gst_amt' => $tot_gst_amt,
									'tot_owd_final' => $tot_owd_final,
									'tot_owd_addon_final' => $tot_owd_addon_final,
									'tot_btp_final' => $tot_btp_final,
									'tot_other_tp_final' => $tot_other_tp_final,
									'tot_final_premium' => $tot_final_premium,
									'tot_payable_premium' => $tot_payable_premium,

									'create_date' => date("Y-m-d h:i:s")
								);

								$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_commercial_policy", $add_motor_commercial_policy_arr, $return_type = "lastID");
								$commercial_policy_id = $query2["lastID"];
							}
						} else {
							if (!empty($policy_name_txt)) {
								if (($policy_name_txt == "Worksmen Compentation") || ($policy_name_txt == "Money In Transit") || ($policy_name_txt == "Plate Glass") || ($policy_name_txt == "House Holder") || ($policy_name_txt == "All Risk") || ($policy_name_txt == "Office Compact") || ($policy_name_txt == "Electronic Equipment") || ($policy_name_txt == "Product Liability") || ($policy_name_txt == "Commercial General Liability") || ($policy_name_txt == "Public Liability") || ($policy_name_txt == "Professional Indemnity") || ($policy_name_txt == "Machinery Breakdown") || ($policy_name_txt == "Contractors All Risk")) {
									if ($policy_type != 3) {
										$add_burglary_policy_dump_arr[] = array(
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $policy_name,
											'other_total_sum_assured' => $total_sum_assured,
											'other_fire_rate_per' => $fire_rate_per,
											'other_fire_rate_tot_amount' => $fire_rate_tot,
											'other_less_discount_per' => $less_discount_per,
											'other_less_discount_tot_amount' => $less_discount_tot,
											'other_fire_rate_after_discount' => $fire_rate_after_discount_tot,
											'other_cgst_rate_per' => $cgst_fire_per,
											'other_cgst_tot_amount' => $cgst_fire_tot,
											'other_sgst_rate_per' => $sgst_fire_per,
											'other_sgst_tot_amount' => $sgst_fire_tot,
											'other_final_payable_premium' => $final_paybal_premium,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "others_policy_dump", $add_burglary_policy_dump_arr, $return_type = "lastID");
										$burglary_policy_id = $query2["lastID"];
									}
								}
							}
						}

						if ($policy_type == 3) { // Fire RC
							if (!empty($policy_name)) {
								$add_fire_rc_policy_dump_arr[] = array(
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'policy_type' => $policy_type,
									'fire_rc_total_sum_assured' => $total_sum_assured,
									'fire_rc_fire_rate_per' => $fire_rate_per,
									'fire_rc_fire_rate_tot_amount' => $fire_rate_tot,
									'fire_rc_less_discount_per' => $less_discount_per,
									'fire_rc_less_discount_tot_amount' => $less_discount_tot,
									'fire_rc_rate_after_discount' => $fire_rate_after_discount_tot,

									'fire_rc_stfi_rate' => $stfi_rate_per,
									'fire_rc_stfi_rate_total' => $stfi_rate_total,
									'fire_rc_earthquake_rate' => $earthquake_rate_per,
									'fire_rc_earthquake_rate_total' => $earthquake_rate_total,
									'fire_rc_terrorisum_rate' => $terrorisum_rate_per,
									'fire_rc_terrorisum_rate_total' => $terrorisum_rate_total,

									'fire_rc_gross_premium' => $gross_premium,
									'fire_rc_cgst_rate_per' => $cgst_fire_per,
									'fire_rc_cgst_tot_amount' => $cgst_fire_tot,
									'fire_rc_sgst_rate_per' => $sgst_fire_per,
									'fire_rc_sgst_tot_amount' => $sgst_fire_tot,
									'fire_rc_final_payable_premium' => $final_paybal_premium,
									'create_date' => date("Y-m-d h:i:s")
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "fire_rc_policy_dump", $add_fire_rc_policy_dump_arr, $return_type = "lastID");
								$fire_rc_policy_id = $query2["lastID"];
							}
						}
					}
				}
			}
			$this->db->trans_complete();		// Transaction End

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = $this->data["title"] . " is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function renew_policy()
	{
		$this->data["policy_id"] = $policy_id = $this->uri->segment(4);
		$this->data['method'] = $method = $this->router->fetch_method();

		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"]." List",
			"breadcrumb_url" => base_url() . "master/renewal/",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "" . $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		if ($policy_id != "") {
			$whereArr["policy_member_details_dump.policy_id"] = $policy_id;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details_dump.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details_dump.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details_dump.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details_dump.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details_dump.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details_dump.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details_dump.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details_dump", $colNames =  "policy_member_details_dump.policy_id, policy_member_details_dump.serial_no, policy_member_details_dump.serial_no_year, policy_member_details_dump.serial_no_month, policy_member_details_dump.fk_company_id,policy_member_details_dump.fk_department_id , policy_member_details_dump.fk_policy_type_id , policy_member_details_dump.fk_client_id , policy_member_details_dump.fk_cust_member_id , policy_member_details_dump.fk_agency_id , policy_member_details_dump.fk_sub_agent_id , policy_member_details_dump.policy_type , policy_member_details_dump.mode_of_premimum , policy_member_details_dump.date_from , policy_member_details_dump.date_to , policy_member_details_dump.payment_date_from , policy_member_details_dump.payment_date_to , policy_member_details_dump.policy_no , policy_member_details_dump.date_commenced , policy_member_details_dump.policy_upload ,policy_member_details_dump.dynamic_path , policy_member_details_dump.reg_mobile ,policy_member_details_dump.policy_counter , policy_member_details_dump.reg_email , policy_member_details_dump.policy_member_status , policy_member_details_dump.del_flag  , master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name , master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$this->data["result"] = $result = $query["userData"];
		}

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =  "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["risk_description"] = $risk_description = $query["userData"];

		$this->data["main_page"] = "master/renewal/renew_policy";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function reminder()
	{
		$this->data["policy_id"] = $policy_id = (int)$this->uri->segment(4);
		$this->data["title"] = $title = "Renewal Reminder Letter";
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

		$this->data["main_page"] = "master/renewal/renewal_reminder_letter";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_renew_policy_letter_details()
	{
		$validator = array('status' => false, 'messages' => array());
		$policy_id = $this->input->post("policy_id");

		if ($policy_id != "") {
			$whereArr["policy_member_details_dump.policy_id"] = $policy_id;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details_dump.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details_dump.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details_dump.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details_dump.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details_dump.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_tpa", "condtn" => "policy_member_details_dump.tpa_company = master_tpa.mtpa_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details_dump.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details_dump.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$joins_main[] = array("tbl" => "sookshma_fire_policy_dump", "condtn" => "policy_member_details_dump.policy_id = sookshma_fire_policy_dump.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "laghu_fire_policy_dump", "condtn" => "policy_member_details_dump.policy_id = laghu_fire_policy_dump.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "griharaksha_fire_policy_dump", "condtn" => "policy_member_details_dump.policy_id = griharaksha_fire_policy_dump.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "bharat_fire_allied_perils_policy_dump", "condtn" => "policy_member_details_dump.policy_id = bharat_fire_allied_perils_policy_dump.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "burglary_policy_dump", "condtn" => "policy_member_details_dump.policy_id = burglary_policy_dump.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "others_policy_dump", "condtn" => "policy_member_details_dump.policy_id = others_policy_dump.fk_policy_id", "type" => "left");


			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details_dump", $colNames =  "policy_member_details_dump.policy_id, policy_member_details_dump.serial_no, policy_member_details_dump.serial_no_year, policy_member_details_dump.serial_no_month, policy_member_details_dump.fk_company_id,policy_member_details_dump.fk_department_id , policy_member_details_dump.fk_policy_type_id , policy_member_details_dump.fk_client_id , policy_member_details_dump.fk_cust_member_id , policy_member_details_dump.fk_agency_id , policy_member_details_dump.fk_sub_agent_id , policy_member_details_dump.policy_type , policy_member_details_dump.mode_of_premimum , policy_member_details_dump.date_from , policy_member_details_dump.date_to , policy_member_details_dump.payment_date_from , policy_member_details_dump.payment_date_to , policy_member_details_dump.policy_no , policy_member_details_dump.date_commenced , policy_member_details_dump.policy_upload ,policy_member_details_dump.dynamic_path , policy_member_details_dump.reg_mobile , policy_member_details_dump.reg_email ,policy_member_details_dump.policy_counter, policy_member_details_dump.policy_member_status , policy_member_details_dump.del_flag ,policy_member_details_dump.hypotication_details ,policy_member_details_dump.correspondence_details ,policy_member_details_dump.total_paymentacknowledge_data, policy_member_details_dump.risk_details,policy_member_details_dump.risk_rc_details,policy_member_details_dump.family_size,policy_member_details_dump.tpa_company,master_tpa.tpa_name,policy_member_details_dump.addition_of_more_child, policy_member_details_dump.floater_policy_type, policy_member_details_dump.restore_cover, policy_member_details_dump.maternity_new_born_baby_cover, policy_member_details_dump.daily_cash_allowance_cover, policy_member_details_dump.plan_policy_commission, policy_member_details_dump.commission_rece_company, policy_member_details_dump.commission_amt_rece_company, policy_member_details_dump.renewal_flag, policy_member_details_dump.commission_flag, policy_member_details_dump.endorsment_flag, policy_member_details_dump.claims_flag, policy_member_details_dump.basic_sum_insured, policy_member_details_dump.basic_gross_premium, policy_member_details_dump.riv, policy_member_details_dump.type_of_bussiness, policy_member_details_dump.description_of_stock, policy_member_details_dump.quotation_date, policy_member_details_dump.quotation_upload, policy_member_details_dump.quotation_male_link ,policy_member_details_dump.renewal_letter_premium_flag,DATE_FORMAT(policy_member_details_dump.renewal_letter_premium_date,'%d-%m-%Y') as renewal_letter_premium_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname ,sookshma_fire_policy_dump.sookshma_fire_policy_id ,sookshma_fire_policy_dump.fk_policy_id ,sookshma_fire_policy_dump.total_sum_assured ,sookshma_fire_policy_dump.fire_rate_per ,sookshma_fire_policy_dump.fire_rate_tot_amount ,sookshma_fire_policy_dump.less_discount_per ,sookshma_fire_policy_dump.less_discount_tot_amount ,sookshma_fire_policy_dump.fire_rate_after_discount ,sookshma_fire_policy_dump.gross_premium ,sookshma_fire_policy_dump.cgst_rate_per ,sookshma_fire_policy_dump.cgst_tot_amount  ,sookshma_fire_policy_dump.sgst_rate_per ,sookshma_fire_policy_dump.sgst_tot_amount ,sookshma_fire_policy_dump.final_payable_premium ,sookshma_fire_policy_dump.sookshma_fire_policy_dump_status ,laghu_fire_policy_dump.laghu_fire_policy_id ,laghu_fire_policy_dump.fk_policy_id as laghu_fk_policy_id,laghu_fire_policy_dump.total_sum_assured as laghu_total_sum_assured,laghu_fire_policy_dump.fire_rate_per as laghu_fire_rate_per,laghu_fire_policy_dump.fire_rate_tot_amount as laghu_fire_rate_tot_amount,laghu_fire_policy_dump.less_discount_per as laghu_less_discount_per,laghu_fire_policy_dump.less_discount_tot_amount as laghu_less_discount_tot_amount,laghu_fire_policy_dump.fire_rate_after_discount as laghu_fire_rate_after_discount,laghu_fire_policy_dump.gross_premium as laghu_gross_premium,laghu_fire_policy_dump.cgst_rate_per as laghu_cgst_rate_per,laghu_fire_policy_dump.cgst_tot_amount as laghu_cgst_tot_amount,laghu_fire_policy_dump.sgst_rate_per as laghu_sgst_rate_per,laghu_fire_policy_dump.sgst_tot_amount as laghu_sgst_tot_amount,laghu_fire_policy_dump.final_payable_premium as laghu_final_payable_premium,laghu_fire_policy_dump.laghu_fire_policy_dump_status ,griharaksha_fire_policy_dump.griharaksha_fire_policy_id ,griharaksha_fire_policy_dump.fk_policy_id as griharaksha_fk_policy_id, griharaksha_fire_policy_dump.total_sum_assured as griharaksha_total_sum_assured ,griharaksha_fire_policy_dump.fire_rate_per as griharaksha_fire_rate_per ,griharaksha_fire_policy_dump.fire_rate_tot_amount as griharaksha_fire_rate_tot_amount ,griharaksha_fire_policy_dump.less_discount_per as griharaksha_less_discount_per,griharaksha_fire_policy_dump.less_discount_tot_amount as griharaksha_less_discount_tot_amount ,griharaksha_fire_policy_dump.fire_rate_after_discount as griharaksha_fire_rate_after_discount ,griharaksha_fire_policy_dump.gross_premium as griharaksha_gross_premium ,griharaksha_fire_policy_dump.cgst_rate_per as griharaksha_cgst_rate_per ,griharaksha_fire_policy_dump.cgst_tot_amount as griharaksha_cgst_tot_amount ,griharaksha_fire_policy_dump.sgst_rate_per as griharaksha_sgst_rate_per ,griharaksha_fire_policy_dump.sgst_tot_amount as griharaksha_sgst_tot_amount ,griharaksha_fire_policy_dump.final_payable_premium as griharaksha_final_payable_premium ,griharaksha_fire_policy_dump.griharaksha_fire_policy_dump_status , burglary_policy_dump.burglary_policy_id , burglary_policy_dump.fk_policy_id as burglary_fk_policy_id , burglary_policy_dump.burglary_total_sum_assured , burglary_policy_dump.burglary_fire_rate_per , burglary_policy_dump.burglary_fire_rate_tot_amount , burglary_policy_dump.burglary_less_discount_per , burglary_policy_dump.burglary_less_discount_tot_amount , burglary_policy_dump.burglary_fire_rate_after_discount , burglary_policy_dump.burglary_gross_premium , burglary_policy_dump.burglary_cgst_rate_per , burglary_policy_dump.burglary_cgst_tot_amount , burglary_policy_dump.burglary_sgst_rate_per , burglary_policy_dump.burglary_sgst_tot_amount , burglary_policy_dump.burglary_final_payable_premium , burglary_policy_dump.burglary_policy_dump_status , burglary_policy_dump.burglary_del_flag ,
			bharat_fire_allied_perils_policy_dump.fire_allied_perils_policy_id , bharat_fire_allied_perils_policy_dump.fk_policy_id as allied_perils_fk_policy_id , bharat_fire_allied_perils_policy_dump.allied_perils_total_sum_assured , bharat_fire_allied_perils_policy_dump.allied_perils_fire_rate_per , bharat_fire_allied_perils_policy_dump.allied_perils_fire_rate_tot_amount , bharat_fire_allied_perils_policy_dump.allied_perils_less_discount_per , bharat_fire_allied_perils_policy_dump.allied_perils_less_discount_tot_amount , bharat_fire_allied_perils_policy_dump.allied_perils_fire_rate_after_discount , bharat_fire_allied_perils_policy_dump.allied_perils_gross_premium , bharat_fire_allied_perils_policy_dump.allied_perils_cgst_rate_per , bharat_fire_allied_perils_policy_dump.allied_perils_cgst_tot_amount , bharat_fire_allied_perils_policy_dump.allied_perils_sgst_rate_per , bharat_fire_allied_perils_policy_dump.allied_perils_sgst_tot_amount , bharat_fire_allied_perils_policy_dump.allied_perils_final_payable_premium , bharat_fire_allied_perils_policy_dump.fire_allied_perils_policy_status , bharat_fire_allied_perils_policy_dump.allied_perils_del_flag, bharat_fire_allied_perils_policy_dump.allied_perils_stfi_rate, bharat_fire_allied_perils_policy_dump.allied_perils_stfi_rate_total, bharat_fire_allied_perils_policy_dump.allied_perils_earthquake_rate, bharat_fire_allied_perils_policy_dump.allied_perils_earthquake_rate_total, bharat_fire_allied_perils_policy_dump.allied_perils_terrorisum_rate, bharat_fire_allied_perils_policy_dump.allied_perils_terrorisum_rate_total, bharat_fire_allied_perils_policy_dump.tot_sum_devid ,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, master_company.courier_address, master_company.payment_steps, master_company.payment_link", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];

			$result["health_claiment_name"] = "";
			if ($result["policy_id"] != "") {
				
				// $joins_main_claiment_name[] = array("tbl" => "claim_mediclaim_intimation", "condtn" => "claim_mediclaim_register.reg_mediclaim_policy_id = claim_mediclaim_intimation.cmi_fk_policy_id", "type" => "left");
				// $joins_main_claiment_name[] = array("tbl" => "policy_member_details_dump", "condtn" => "claim_mediclaim_register.reg_mediclaim_policy_id = policy_member_details_dump.policy_id", "type" => "left");
				// $joins_main_claiment_name[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details_dump.fk_cust_member_id = customermem_tbl.id", "type" => "left");
				// // $whereArr_claiment_name = array();
				// $whereArr_claiment_name["claim_mediclaim_register.reg_mediclaim_policy_id"] = $result["policy_id"];
				// $health_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_mediclaim_register", $colNames = "claim_mediclaim_register.reg_mediclaim_policy_id,policy_member_details_dump.policy_id,customermem_tbl.id , customermem_tbl.idss , customermem_tbl.customer_id ,customermem_tbl.document , CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS claiment_name, claim_mediclaim_register.reg_mediclaim_claim_file_no ", $whereArr = $whereArr_claiment_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_claiment_name, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				// $claiment_name_details = $health_query["userData"];
				// $result["health_claiment_name_array"] = $claiment_name_details;
				// echo $this->db->last_query();
				// print_r($result);
				// die("Test");
			}

			$result["other_claiment_name"] = "";
			if ($result["policy_id"] != "") {
				// $joins_main_other_claiment_name[] = array("tbl" => "policy_member_details_dump", "condtn" => "claim_main_others.policy_id = policy_member_details_dump.policy_id", "type" => "left");
				// $joins_main_other_claiment_name[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details_dump.fk_cust_member_id = customermem_tbl.id", "type" => "left");
				// $whereArr_other_claiment_name["claim_main_others.policy_id"] = $result["policy_id"];
				// $other_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_main_others", $colNames = "policy_member_details_dump.policy_id,customermem_tbl.id , customermem_tbl.idss , customermem_tbl.customer_id , customermem_tbl.document , CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS claiment_name,claim_main_others.claim_others_file_no ,claim_main_others.claim_main_id ", $whereArr = $whereArr_other_claiment_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_other_claiment_name, $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				// $other_claiment_name_details = $other_query["userData"];
				// $result["other_claiment_name_array"] = $other_claiment_name_details;
				// 	echo $this->db->last_query();
				// print_r($result);
				// die("Test");
			}
			
			$fire_rc_policy_dump_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["policy_type"] == 3) {
				// $joins_main_department[] = array("tbl" => "master_plans_policy", "condtn" => "master_department.department_id = master_plans_policy.fk_department_id", "type" => "left");
				$whereArr_fire_rc["fire_rc_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_fire_rc["fire_rc_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_fire_rc["fire_rc_policy_dump.policy_type"] = $result["policy_type"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "fire_rc_policy_dump", $colNames = "fire_rc_policy_dump.fire_rc_policy_id , fire_rc_policy_dump.fk_policy_id as fire_rc_fk_policy_id , fire_rc_policy_dump.fk_policy_type_id , fire_rc_policy_dump.policy_type , fire_rc_policy_dump.fire_rc_total_sum_assured , fire_rc_policy_dump.fire_rc_fire_rate_per , fire_rc_policy_dump.fire_rc_fire_rate_tot_amount , fire_rc_policy_dump.fire_rc_less_discount_per , fire_rc_policy_dump.fire_rc_less_discount_tot_amount , fire_rc_policy_dump.fire_rc_rate_after_discount , fire_rc_policy_dump.fire_rc_cgst_rate_per , fire_rc_policy_dump.fire_rc_cgst_tot_amount , fire_rc_policy_dump.fire_rc_sgst_rate_per , fire_rc_policy_dump.fire_rc_sgst_tot_amount , fire_rc_policy_dump.fire_rc_final_payable_premium , fire_rc_policy_dump.fire_rc_policy_dump_status , fire_rc_policy_dump.fire_rc_del_flag , fire_rc_policy_dump.fire_rc_stfi_rate , fire_rc_policy_dump.fire_rc_stfi_rate_total , fire_rc_policy_dump.fire_rc_earthquake_rate , fire_rc_policy_dump.fire_rc_earthquake_rate_total , fire_rc_policy_dump.fire_rc_terrorisum_rate , fire_rc_policy_dump.fire_rc_terrorisum_rate_total , fire_rc_policy_dump.fire_rc_gross_premium", $whereArr = $whereArr_fire_rc, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$fire_rc_policy_dump_list = $query["userData"];
			}
			$result["fire_rc_policy_dump_data_arr"] = $fire_rc_policy_dump_list;
			// print_r($result);
			// die("Test");

			$others_policy_dump_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				// $joins_main_department[] = array("tbl" => "master_plans_policy", "condtn" => "master_department.department_id = master_plans_policy.fk_department_id", "type" => "left");
				$whereArr_others["others_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_others["others_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "others_policy_dump", $colNames = "others_policy_dump.other_policy_id , others_policy_dump.fk_policy_id as other_fk_policy_id , others_policy_dump.fk_policy_type_id , others_policy_dump.other_total_sum_assured , others_policy_dump.other_fire_rate_per , others_policy_dump.other_fire_rate_tot_amount , others_policy_dump.other_less_discount_per , others_policy_dump.other_less_discount_tot_amount , others_policy_dump.other_fire_rate_after_discount , others_policy_dump.other_cgst_rate_per , others_policy_dump.other_cgst_tot_amount , others_policy_dump.other_sgst_rate_per , others_policy_dump.other_sgst_tot_amount , others_policy_dump.other_final_payable_premium , others_policy_dump.others_policy_dump_status , others_policy_dump.other_del_flag", $whereArr = $whereArr_others, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$others_policy_dump_list = $query["userData"];
			}
			$result["others_policy_dump_data_arr"] = $others_policy_dump_list;

			$shopkeeper_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_shopkeeper["shopkeeper_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_shopkeeper["shopkeeper_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "shopkeeper_policy_dump", $colNames = "shopkeeper_policy_dump.shopkeeper_policy_id , shopkeeper_policy_dump.fk_policy_id as shopkeeper_fk_policy_id , shopkeeper_policy_dump.fk_policy_type_id , shopkeeper_policy_dump.shopkeeper_risk_address , shopkeeper_policy_dump.fire_sum_insured_1 , shopkeeper_policy_dump.fire_sum_insured_2 , shopkeeper_policy_dump.fire_sum_insured_3 , shopkeeper_policy_dump.fire_rate_1 , shopkeeper_policy_dump.fire_rate_2 , shopkeeper_policy_dump.fire_rate_3 , shopkeeper_policy_dump.fire_premium_1 , shopkeeper_policy_dump.fire_premium_2 , shopkeeper_policy_dump.fire_premium_3 , shopkeeper_policy_dump.burglary_sum_insured_1 , shopkeeper_policy_dump.burglary_sum_insured_2 , shopkeeper_policy_dump.burglary_sum_insured_3,

				shopkeeper_policy_dump.burglary_rate_1 , shopkeeper_policy_dump.burglary_rate_2 , shopkeeper_policy_dump.burglary_rate_3 , shopkeeper_policy_dump.burglary_premium_1 , shopkeeper_policy_dump.burglary_premium_2 , shopkeeper_policy_dump.burglary_premium_3 , shopkeeper_policy_dump.money_insu_sum_insured_1 , shopkeeper_policy_dump.money_insu_sum_insured_2 , shopkeeper_policy_dump.money_insu_sum_insured_3 , shopkeeper_policy_dump.money_insu_rate_1 , shopkeeper_policy_dump.money_insu_rate_2 , shopkeeper_policy_dump.money_insu_rate_3 , shopkeeper_policy_dump.money_insu_premium_1 , shopkeeper_policy_dump.money_insu_premium_2 , shopkeeper_policy_dump.money_insu_premium_3 , shopkeeper_policy_dump.plate_glass_sum_insured,
				shopkeeper_policy_dump.plate_glass_rate_per , shopkeeper_policy_dump.plate_glass_premium , shopkeeper_policy_dump.neon_glow_sum_insured , shopkeeper_policy_dump.neon_glow_rate_per , shopkeeper_policy_dump.neon_glow_premium , shopkeeper_policy_dump.baggage_ins_sum_insured , shopkeeper_policy_dump.baggage_ins_rate_per , shopkeeper_policy_dump.baggage_ins_premium , shopkeeper_policy_dump.personal_accident_json , shopkeeper_policy_dump.personal_accident_sum_insured , shopkeeper_policy_dump.personal_accident_rate_per , shopkeeper_policy_dump.personal_accident_premium , shopkeeper_policy_dump.fidelity_gaur_json , shopkeeper_policy_dump.fidelity_gaur_sum_insured , shopkeeper_policy_dump.fidelity_gaur_rate_per , shopkeeper_policy_dump.fidelity_gaur_premium,
				shopkeeper_policy_dump.pub_libility_sum_insured , shopkeeper_policy_dump.work_men_compens_sum_insured , shopkeeper_policy_dump.pub_libility_rate , shopkeeper_policy_dump.work_men_compens_rate , shopkeeper_policy_dump.pub_libility_premium , shopkeeper_policy_dump.work_men_compens_premium , shopkeeper_policy_dump.bus_inter_sum_insured_1 , shopkeeper_policy_dump.bus_inter_sum_insured_2 , shopkeeper_policy_dump.bus_inter_sum_insured_3 , shopkeeper_policy_dump.bus_inter_rate_1 , shopkeeper_policy_dump.bus_inter_rate_2 , shopkeeper_policy_dump.bus_inter_rate_3 , shopkeeper_policy_dump.bus_inter_premium_1 , shopkeeper_policy_dump.bus_inter_premium_2 , shopkeeper_policy_dump.bus_inter_premium_3 , shopkeeper_policy_dump.shopkeeper_total_sum_assured , shopkeeper_policy_dump.shopkeeper_total_premium,
				shopkeeper_policy_dump.shopkeeper_less_discount_per , shopkeeper_policy_dump.shopkeeper_less_discount_tot , shopkeeper_policy_dump.shopkeeper_fire_rate_after_discount_tot , shopkeeper_policy_dump.shopkeeper_cgst_fire_per , shopkeeper_policy_dump.shopkeeper_cgst_fire_tot , shopkeeper_policy_dump.shopkeeper_sgst_fire_per , shopkeeper_policy_dump.shopkeeper_sgst_fire_tot , shopkeeper_policy_dump.shopkeeper_final_paybal_premium , shopkeeper_policy_dump.shopkeeper_policy_status , shopkeeper_policy_dump.shopkeeper_policy_del_flag ", $whereArr = $whereArr_shopkeeper, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$shopkeeper_policy_list = $query["userData"];
			}
			$result["shopkeeper_policy_data_arr"] = $shopkeeper_policy_list;

			$jweller_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_jweller["jweller_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_jweller["jweller_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "jweller_policy_dump", $colNames = "jweller_policy_dump.jweller_policy_id , jweller_policy_dump.fk_policy_id as jweller_fk_policy_id , jweller_policy_dump.fk_policy_type_id , jweller_policy_dump.stock_premises_sum_insu_1 , jweller_policy_dump.stock_premises_sum_insu_2 , jweller_policy_dump.stock_premises_sum_insu_3 , jweller_policy_dump.stock_premises_sum_insu_4 , jweller_policy_dump.stock_premises_sum_insu_5 , jweller_policy_dump.stock_premises_sum_insu_6 , jweller_policy_dump.stock_premises_premium_1 , jweller_policy_dump.stock_premises_premium_2 , jweller_policy_dump.stock_custody_sum_insu_1 , jweller_policy_dump.stock_custody_sum_insu_2 , jweller_policy_dump.stock_custody_sum_insu_3 , jweller_policy_dump.stock_custody_sum_insu_4 , jweller_policy_dump.stock_custody_premium_1, jweller_policy_dump.stock_custody_premium_2,

				jweller_policy_dump.stock_transit_sum_insu_1 , jweller_policy_dump.stock_transit_sum_insu_2 , jweller_policy_dump.stock_transit_sum_insu_3 , jweller_policy_dump.stock_transit_sum_insu_4 , jweller_policy_dump.stock_transit_premium , jweller_policy_dump.standard_fire_perils_1 , jweller_policy_dump.standard_fire_perils_2 , jweller_policy_dump.standard_fire_perils_3 , jweller_policy_dump.standard_fire_perils_4 , jweller_policy_dump.standard_fire_perils_5 , jweller_policy_dump.standard_fire_perils_6 , jweller_policy_dump.standard_fire_perils_premium_1 , jweller_policy_dump.standard_fire_perils_premium_2 , jweller_policy_dump.standard_fire_perils_premium_3 , jweller_policy_dump.content_burglary_sum_insu , jweller_policy_dump.content_burglary_premium,
				jweller_policy_dump.stock_exhibition_sum_insu , jweller_policy_dump.stock_exhibition_premium , jweller_policy_dump.fidelity_guar_cover_sum_insu_1 , jweller_policy_dump.fidelity_guar_cover_sum_insu_2 , jweller_policy_dump.fidelity_guar_cover_premium_1 , jweller_policy_dump.fidelity_guar_cover_premium_2 , jweller_policy_dump.total_fidelity_guar_cover_json , jweller_policy_dump.plate_glass_sum_insu , jweller_policy_dump.plate_glass_premium , jweller_policy_dump.neon_sign_sum_insu , jweller_policy_dump.neon_sign_premium , jweller_policy_dump.portable_equipmets_sum_insu , jweller_policy_dump.portable_equipmets_premium , jweller_policy_dump.employee_compensation_sum_insu_1 , jweller_policy_dump.employee_compensation_sum_insu_2 , jweller_policy_dump.employee_compensation_premium , jweller_policy_dump.electronic_equipment_sum_insu,
				jweller_policy_dump.electronic_equipment_premium , jweller_policy_dump.public_liability_sum_insu , jweller_policy_dump.public_liability_premium , jweller_policy_dump.money_transit_sum_insu , jweller_policy_dump.money_transit_premium , jweller_policy_dump.machinery_breakdown_sum_insu , jweller_policy_dump.machinery_breakdown_premium ,
				jweller_policy_dump.jweller_total_sum_assured , jweller_policy_dump.jweller_less_discount , jweller_policy_dump.jweller_less_discount_tot , jweller_policy_dump.jweller_after_discount_tot , jweller_policy_dump.jweller_terrorism_per , jweller_policy_dump.jweller_terrorism_per_tot , jweller_policy_dump.jweller_tot_net_premium , jweller_policy_dump.jweller_cgst_per , jweller_policy_dump.jweller_sgst_per , jweller_policy_dump.jweller_cgst_per_tot, jweller_policy_dump.jweller_sgst_per_tot, jweller_policy_dump.jweller_final_payble, jweller_policy_dump.jweller_policy_status , jweller_policy_dump.jweller_del_flag", $whereArr = $whereArr_jweller, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$jweller_policy_list = $query["userData"];
			}
			$result["jweller_policy_data_arr"] = $jweller_policy_list;

			$marine_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_marine["marine_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_marine["marine_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "marine_policy_dump", $colNames = "marine_policy_dump.marine_policy_id , marine_policy_dump.fk_policy_id as marine_fk_policy_id , marine_policy_dump.fk_policy_type_id , marine_policy_dump.policy_name_txt ,marine_policy_dump. from_destination ,marine_policy_dump. to_destination , marine_policy_dump.coverage_type , marine_policy_dump.marine_description , marine_policy_dump.interest_insured , marine_policy_dump.period_of_insurance , marine_policy_dump.group_name_address , marine_policy_dump.marine_sum_insured ,marine_policy_dump.packing_stand_customary, marine_policy_dump.total_marine_cc_json , marine_policy_dump.business_description , marine_policy_dump.voyage_domestic_purchase , marine_policy_dump.voyage_international_purchase , marine_policy_dump.voyage_domestic_sales , marine_policy_dump.voyage_export_sales , marine_policy_dump.voyage_job_worker , marine_policy_dump.voyage_domestic_fini_good , marine_policy_dump.voyage_export_fini_good , marine_policy_dump.voyage_domestic_purch_return , marine_policy_dump.voyage_export_purch_return , marine_policy_dump.voyage_sales_return , marine_policy_dump.domestic_purch , marine_policy_dump.international_purch , marine_policy_dump.domestic_sale , marine_policy_dump.export_sale , marine_policy_dump.per_bottom_limit , marine_policy_dump.per_location_limit , marine_policy_dump.per_claim_excess , marine_policy_dump.declaration_sale_fig , marine_policy_dump.annual_turn_over , marine_policy_dump.tot_sum_insured , marine_policy_dump.rate_applied , marine_policy_dump.rate_applied_per , marine_policy_dump.rate_applied_hidden , marine_policy_dump.marine_cgst_per , marine_policy_dump.marine_sgst_per , marine_policy_dump.cgst_rate_tot , marine_policy_dump.sgst_rate_tot , marine_policy_dump.marine_final_payble_premium , marine_policy_dump.marine_policy_status , marine_policy_dump.marine_del_flag", $whereArr = $whereArr_marine, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$marine_policy_list = $query["userData"];
			}
			$result["marine_policy_data_arr"] = $marine_policy_list;

			$term_plan_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_term_plan["term_plan_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_term_plan["term_plan_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "term_plan_policy_dump", $colNames = "term_plan_policy_dump.term_plan_policy_id , term_plan_policy_dump.fk_policy_id as term_plan_fk_policy_id , term_plan_policy_dump.fk_policy_type_id , term_plan_policy_dump.term_plan_policy , term_plan_policy_dump.term_plan_premium_paying_term , term_plan_policy_dump.term_plan_total_sum_insured , term_plan_policy_dump.term_plan_basic_premium , term_plan_policy_dump.term_plan_add_loading , term_plan_policy_dump.term_plan_loading_description , term_plan_policy_dump.term_plan_premium_after_loading , term_plan_policy_dump.term_plan_cgst , term_plan_policy_dump.term_plan_sgst , term_plan_policy_dump.term_plan_cgst_tot_ammount , term_plan_policy_dump.term_plan_sgst_tot_ammount , term_plan_policy_dump.term_plan_final_paybal_premium , term_plan_policy_dump.term_plan_status", $whereArr = $whereArr_term_plan, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$term_plan_policy_list = $query["userData"];
			}
			$result["term_plan_policy_data_arr"] = $term_plan_policy_list;

			$mediclaim_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_mediclaim_policy["mediclaim_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_mediclaim_policy["mediclaim_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "mediclaim_policy_dump", $colNames = "mediclaim_policy_dump.mediclaim_policy_id , mediclaim_policy_dump.fk_policy_id as mediclaim_policy_fk_policy_id , mediclaim_policy_dump.fk_policy_type_id , mediclaim_policy_dump.policy_name_txt , mediclaim_policy_dump.tot_mediclaim_json , mediclaim_policy_dump.medi_total_ncd_amount , mediclaim_policy_dump.medi_total_amount , mediclaim_policy_dump.medi_family_disc_rate , mediclaim_policy_dump.medi_family_disc_tot , mediclaim_policy_dump.medi_premium_after_fd , mediclaim_policy_dump.medi_cgst_rate , mediclaim_policy_dump.medi_cgst_tot , mediclaim_policy_dump.medi_sgst_rate , mediclaim_policy_dump.medi_sgst_tot , mediclaim_policy_dump.medi_final_premium , mediclaim_policy_dump.mediclaim_policy_status , mediclaim_policy_dump.mediclaim_policy_del_flag", $whereArr = $whereArr_mediclaim_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$mediclaim_policy_list = $query["userData"];
			}
			$result["mediclaim_policy_data_arr"] = $mediclaim_policy_list;

			$medi_ind2020_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_ind2020["medi_ind2020_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_ind2020["medi_ind2020_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_ind2020_policy_dump", $colNames = "medi_ind2020_policy_dump.medi_ind2020_policy_id , medi_ind2020_policy_dump.fk_policy_id as medi_ind2020_policy_fk_policy_id , medi_ind2020_policy_dump.fk_policy_type_id , medi_ind2020_policy_dump.policy_name_txt , medi_ind2020_policy_dump.tot_medi_ind2020_json , medi_ind2020_policy_dump.medi_ind_2020_total_premium , medi_ind2020_policy_dump.medi_ind_2020_family_descount_per , medi_ind2020_policy_dump.medi_ind_2020_family_descount_tot , medi_ind2020_policy_dump.medi_ind_2020_load_description , medi_ind2020_policy_dump.medi_ind_2020_load_amount , medi_ind2020_policy_dump.medi_ind_2020_restore_cover_premium , medi_ind2020_policy_dump.medi_ind_2020_maternity_new_bornbaby , medi_ind2020_policy_dump.medi_ind_2020_daily_cash_allow_hosp , medi_ind2020_policy_dump.medi_ind_2020_load_gross_premium ,medi_ind2020_policy_dump.new_load_gross_premium , medi_ind2020_policy_dump.medi_ind_2020_cgst_rate , medi_ind2020_policy_dump.medi_ind_2020_cgst_tot , medi_ind2020_policy_dump.medi_ind_2020_sgst_rate , medi_ind2020_policy_dump.medi_ind_2020_sgst_tot , medi_ind2020_policy_dump.medi_ind_2020_final_premium , medi_ind2020_policy_dump.medi_ind_2020_status , medi_ind2020_policy_dump.medi_ind_2020_del_flag", $whereArr = $whereArr_medi_ind2020, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_ind2020_list = $query["userData"];
			}
			$result["medi_ind2020_policy_data_arr"] = $medi_ind2020_list;

			$medi_ind_max_bupa_reassure_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_ind_max_bupa_reassure_policy["max_bupa_reassure_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_ind_max_bupa_reassure_policy["max_bupa_reassure_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_ind_policy_dump", $colNames = "max_bupa_reassure_ind_policy_dump.medi_max_bupa_reassure_ind_policy_id  , max_bupa_reassure_ind_policy_dump.fk_policy_id as medi_max_bupa_reassure_ind_policy_fk_policy_id , max_bupa_reassure_ind_policy_dump.fk_policy_type_id , max_bupa_reassure_ind_policy_dump.policy_name_txt ,max_bupa_reassure_ind_policy_dump.fk_company_id ,max_bupa_reassure_ind_policy_dump.fk_department_id , max_bupa_reassure_ind_policy_dump.total_max_bupa_medi_reassure_json_data , max_bupa_reassure_ind_policy_dump.years_of_premium , max_bupa_reassure_ind_policy_dump.region , max_bupa_reassure_ind_policy_dump.first_year_rate , max_bupa_reassure_ind_policy_dump.second_year_rate , max_bupa_reassure_ind_policy_dump.third_year_rate , max_bupa_reassure_ind_policy_dump.first_year_tot , max_bupa_reassure_ind_policy_dump.second_year_tot , max_bupa_reassure_ind_policy_dump.third_year_tot , max_bupa_reassure_ind_policy_dump.tot_term_disc , max_bupa_reassure_ind_policy_dump.tot_premium , max_bupa_reassure_ind_policy_dump.stand_instu_rate , max_bupa_reassure_ind_policy_dump.stand_instu_tot , max_bupa_reassure_ind_policy_dump.doctor_disc_per , max_bupa_reassure_ind_policy_dump.doctor_disc_tot , max_bupa_reassure_ind_policy_dump.family_disc_per , max_bupa_reassure_ind_policy_dump.family_disc_tot , max_bupa_reassure_ind_policy_dump.gross_premium_tot , max_bupa_reassure_ind_policy_dump.gross_premium_tot_new , max_bupa_reassure_ind_policy_dump.medi_cgst_rate , max_bupa_reassure_ind_policy_dump.medi_cgst_tot , max_bupa_reassure_ind_policy_dump.medi_sgst_rate , max_bupa_reassure_ind_policy_dump.medi_sgst_tot , max_bupa_reassure_ind_policy_dump.medi_final_premium , max_bupa_reassure_ind_policy_dump.max_bupa_status , max_bupa_reassure_ind_policy_dump.max_bupa_del_flag	", $whereArr = $whereArr_medi_ind_max_bupa_reassure_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_ind_max_bupa_reassure_policy_list = $query["userData"];
			}
			$result["medi_ind_max_bupa_reassure_policy_data_arr"] = $medi_ind_max_bupa_reassure_policy_list;

			$medi_float_max_bupa_reassure_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_float_max_bupa_reassure_policy["max_bupa_reassure_floater_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_float_max_bupa_reassure_policy["max_bupa_reassure_floater_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_floater_policy_dump", $colNames = "max_bupa_reassure_floater_policy_dump.medi_max_bupa_reassure_float_policy_id  , max_bupa_reassure_floater_policy_dump.fk_policy_id as medi_max_bupa_reassure_floater_policy_fk_policy_id , max_bupa_reassure_floater_policy_dump.fk_policy_type_id , max_bupa_reassure_floater_policy_dump.policy_name_txt ,max_bupa_reassure_floater_policy_dump.fk_company_id ,max_bupa_reassure_floater_policy_dump.fk_department_id , max_bupa_reassure_floater_policy_dump.total_max_bupa_medi_float_reassure_json_data , max_bupa_reassure_floater_policy_dump.years_of_premium , max_bupa_reassure_floater_policy_dump.region , max_bupa_reassure_floater_policy_dump.first_year_rate , max_bupa_reassure_floater_policy_dump.second_year_rate , max_bupa_reassure_floater_policy_dump.third_year_rate , max_bupa_reassure_floater_policy_dump.first_year_tot , max_bupa_reassure_floater_policy_dump.second_year_tot , max_bupa_reassure_floater_policy_dump.third_year_tot , max_bupa_reassure_floater_policy_dump.tot_term_disc , max_bupa_reassure_floater_policy_dump.tot_premium , max_bupa_reassure_floater_policy_dump.stand_instu_rate , max_bupa_reassure_floater_policy_dump.stand_instu_tot , max_bupa_reassure_floater_policy_dump.doctor_disc_per , max_bupa_reassure_floater_policy_dump.doctor_disc_tot ,  max_bupa_reassure_floater_policy_dump.gross_premium_tot , max_bupa_reassure_floater_policy_dump.gross_premium_tot_new , max_bupa_reassure_floater_policy_dump.medi_cgst_rate , max_bupa_reassure_floater_policy_dump.medi_cgst_tot , max_bupa_reassure_floater_policy_dump.medi_sgst_rate , max_bupa_reassure_floater_policy_dump.medi_sgst_tot , max_bupa_reassure_floater_policy_dump.medi_final_premium ,max_bupa_reassure_floater_policy_dump.max_age , max_bupa_reassure_floater_policy_dump.max_bupa_status , max_bupa_reassure_floater_policy_dump.max_bupa_del_flag	", $whereArr = $whereArr_medi_float_max_bupa_reassure_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_float_max_bupa_reassure_policy_list = $query["userData"];
			}
			$result["medi_float_max_bupa_reassure_policy_data_arr"] = $medi_float_max_bupa_reassure_policy_list;

			$medi_star_health_allied_red_carpet_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_red_carpet_ind_policy_dump", $colNames = "star_health_allied_insu_red_carpet_ind_policy_dump.medi_star_health_ind_policy_id  , star_health_allied_insu_red_carpet_ind_policy_dump.fk_policy_id as star_health_allied_insu_red_carpet_ind_policy_fk_policy_id , star_health_allied_insu_red_carpet_ind_policy_dump.fk_policy_type_id , star_health_allied_insu_red_carpet_ind_policy_dump.policy_name_txt , star_health_allied_insu_red_carpet_ind_policy_dump.fk_company_id , star_health_allied_insu_red_carpet_ind_policy_dump.fk_department_id , star_health_allied_insu_red_carpet_ind_policy_dump.total_star_health_red_carpet_medi_ind_json_data , star_health_allied_insu_red_carpet_ind_policy_dump.years_of_premium , star_health_allied_insu_red_carpet_ind_policy_dump.tot_premium , star_health_allied_insu_red_carpet_ind_policy_dump.medi_cgst_rate , star_health_allied_insu_red_carpet_ind_policy_dump.medi_cgst_tot , star_health_allied_insu_red_carpet_ind_policy_dump.medi_sgst_rate, star_health_allied_insu_red_carpet_ind_policy_dump.medi_sgst_tot, star_health_allied_insu_red_carpet_ind_policy_dump.medi_final_premium, star_health_allied_insu_red_carpet_ind_policy_dump.star_health_status, star_health_allied_insu_red_carpet_ind_policy_dump.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_red_carpet_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_red_carpet_ind_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_red_carpet_ind_policy_data_arr"] = $medi_star_health_allied_red_carpet_ind_policy_list;

			$medi_star_health_allied_red_carpet_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_red_carpet_float_policy_dump", $colNames = "star_health_allied_insu_red_carpet_float_policy_dump.medi_star_health_float_policy_id   , star_health_allied_insu_red_carpet_float_policy_dump.fk_policy_id as star_health_allied_insu_red_carpet_float_policy_fk_policy_id , star_health_allied_insu_red_carpet_float_policy_dump.fk_policy_type_id , star_health_allied_insu_red_carpet_float_policy_dump.policy_name_txt , star_health_allied_insu_red_carpet_float_policy_dump.fk_company_id , star_health_allied_insu_red_carpet_float_policy_dump.fk_department_id , star_health_allied_insu_red_carpet_float_policy_dump.total_star_health_red_carpet_medi_float_json_data , star_health_allied_insu_red_carpet_float_policy_dump.years_of_premium , star_health_allied_insu_red_carpet_float_policy_dump.tot_premium , star_health_allied_insu_red_carpet_float_policy_dump.medi_cgst_rate , star_health_allied_insu_red_carpet_float_policy_dump.medi_cgst_tot , star_health_allied_insu_red_carpet_float_policy_dump.medi_sgst_rate, star_health_allied_insu_red_carpet_float_policy_dump.medi_sgst_tot, star_health_allied_insu_red_carpet_float_policy_dump.medi_final_premium, 
				star_health_allied_insu_red_carpet_float_policy_dump.max_age, star_health_allied_insu_red_carpet_float_policy_dump.star_health_status, star_health_allied_insu_red_carpet_float_policy_dump.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_red_carpet_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_red_carpet_float_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_red_carpet_float_policy_data_arr"] = $medi_star_health_allied_red_carpet_float_policy_list;

			$medi_star_health_allied_comprehensive_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_comprehensive_ind_policy_dump", $colNames = "star_health_allied_insu_comprehensive_ind_policy_dump.medi_star_health_comp_ind_policy_id  , star_health_allied_insu_comprehensive_ind_policy_dump.fk_policy_id as star_health_allied_insu_comp_float_policy_fk_policy_id , star_health_allied_insu_comprehensive_ind_policy_dump.fk_policy_type_id , star_health_allied_insu_comprehensive_ind_policy_dump.policy_name_txt , star_health_allied_insu_comprehensive_ind_policy_dump.fk_company_id , star_health_allied_insu_comprehensive_ind_policy_dump.fk_department_id , star_health_allied_insu_comprehensive_ind_policy_dump.total_star_health_comprehensive_medi_ind_json_data , star_health_allied_insu_comprehensive_ind_policy_dump.years_of_premium , star_health_allied_insu_comprehensive_ind_policy_dump.tot_premium , star_health_allied_insu_comprehensive_ind_policy_dump.medi_cgst_rate , star_health_allied_insu_comprehensive_ind_policy_dump.medi_cgst_tot , star_health_allied_insu_comprehensive_ind_policy_dump.medi_sgst_rate, star_health_allied_insu_comprehensive_ind_policy_dump.medi_sgst_tot, star_health_allied_insu_comprehensive_ind_policy_dump.medi_final_premium, star_health_allied_insu_comprehensive_ind_policy_dump.star_health_status, star_health_allied_insu_comprehensive_ind_policy_dump.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_comprehensive_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_comprehensive_ind_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_comprehensive_ind_policy_data_arr"] = $medi_star_health_allied_comprehensive_ind_policy_list;
			// print_r($result["medi_star_health_allied_comprehensive_ind_policy_data_arr"]);
			// die();

			$medi_star_health_allied_comprehensive_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_comprehensive_float_policy_dump", $colNames = "star_health_allied_insu_comprehensive_float_policy_dump.medi_star_health_comp_float_policy_id   , star_health_allied_insu_comprehensive_float_policy_dump.fk_policy_id as star_health_allied_insu_comp_float_policy_fk_policy_id , star_health_allied_insu_comprehensive_float_policy_dump.fk_policy_type_id , star_health_allied_insu_comprehensive_float_policy_dump.policy_name_txt , star_health_allied_insu_comprehensive_float_policy_dump.fk_company_id , star_health_allied_insu_comprehensive_float_policy_dump.fk_department_id , star_health_allied_insu_comprehensive_float_policy_dump.total_star_health_comprehensive_medi_float_json_data , star_health_allied_insu_comprehensive_float_policy_dump.years_of_premium , star_health_allied_insu_comprehensive_float_policy_dump.tot_premium , star_health_allied_insu_comprehensive_float_policy_dump.medi_cgst_rate , star_health_allied_insu_comprehensive_float_policy_dump.medi_cgst_tot , star_health_allied_insu_comprehensive_float_policy_dump.medi_sgst_rate, star_health_allied_insu_comprehensive_float_policy_dump.medi_sgst_tot, star_health_allied_insu_comprehensive_float_policy_dump.medi_final_premium, 
				star_health_allied_insu_comprehensive_float_policy_dump.max_age, star_health_allied_insu_comprehensive_float_policy_dump.star_health_status, star_health_allied_insu_comprehensive_float_policy_dump.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_comprehensive_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_comprehensive_float_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_comprehensive_float_policy_data_arr"] = $medi_star_health_allied_comprehensive_float_policy_list;

			$medi_star_health_allied_supertopup_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_supertopup_ind_policy_dump", $colNames = "star_health_allied_insu_supertopup_ind_policy_dump.medi_star_health_super_ind_policy_id  , star_health_allied_insu_supertopup_ind_policy_dump.fk_policy_id as star_health_allied_insu_super_ind_policy_fk_policy_id , star_health_allied_insu_supertopup_ind_policy_dump.fk_policy_type_id , star_health_allied_insu_supertopup_ind_policy_dump.policy_name_txt , star_health_allied_insu_supertopup_ind_policy_dump.fk_company_id , star_health_allied_insu_supertopup_ind_policy_dump.fk_department_id , star_health_allied_insu_supertopup_ind_policy_dump.total_star_health_supertopup_ind_json_data , star_health_allied_insu_supertopup_ind_policy_dump.tot_premium , star_health_allied_insu_supertopup_ind_policy_dump.medi_cgst_rate , star_health_allied_insu_supertopup_ind_policy_dump.medi_cgst_tot , star_health_allied_insu_supertopup_ind_policy_dump.medi_sgst_rate, star_health_allied_insu_supertopup_ind_policy_dump.medi_sgst_tot, star_health_allied_insu_supertopup_ind_policy_dump.medi_final_premium, star_health_allied_insu_supertopup_ind_policy_dump.star_health_status, star_health_allied_insu_supertopup_ind_policy_dump.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_supertopup_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_supertopup_ind_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_supertopup_ind_policy_data_arr"] = $medi_star_health_allied_supertopup_ind_policy_list;

			$medi_star_health_allied_supertopup_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_supertopup_float_policy_dump", $colNames = "star_health_allied_insu_supertopup_float_policy_dump.medi_star_health_super_float_policy_id  , star_health_allied_insu_supertopup_float_policy_dump.fk_policy_id as star_health_allied_insu_super_float_policy_fk_policy_id , star_health_allied_insu_supertopup_float_policy_dump.fk_policy_type_id , star_health_allied_insu_supertopup_float_policy_dump.policy_name_txt , star_health_allied_insu_supertopup_float_policy_dump.fk_company_id , star_health_allied_insu_supertopup_float_policy_dump.fk_department_id , star_health_allied_insu_supertopup_float_policy_dump.total_star_health_supertopup_float_json_data , star_health_allied_insu_supertopup_float_policy_dump.tot_premium , star_health_allied_insu_supertopup_float_policy_dump.medi_cgst_rate , star_health_allied_insu_supertopup_float_policy_dump.medi_cgst_tot , star_health_allied_insu_supertopup_float_policy_dump.medi_sgst_rate, star_health_allied_insu_supertopup_float_policy_dump.medi_sgst_tot, star_health_allied_insu_supertopup_float_policy_dump.medi_final_premium,  star_health_allied_insu_supertopup_float_policy_dump.max_age, star_health_allied_insu_supertopup_float_policy_dump.star_health_status, star_health_allied_insu_supertopup_float_policy_dump.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_supertopup_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_supertopup_float_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_supertopup_float_policy_data_arr"] = $medi_star_health_allied_supertopup_float_policy_list;

			$medi_ind_the_new_india_2017_assu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_ind_the_new_india_2017_assu_policy["the_new_india_medi_policy_2017_ind_assu_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_ind_the_new_india_2017_assu_policy["the_new_india_medi_policy_2017_ind_assu_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_policy_2017_ind_assu_policy_dump", $colNames = "the_new_india_medi_policy_2017_ind_assu_policy_dump.medi_insu_new_india_tns_assu_ind_policy_id , the_new_india_medi_policy_2017_ind_assu_policy_dump.fk_policy_id as the_new_india_medi_policy_2017_ind_assu_fk_policy_id , the_new_india_medi_policy_2017_ind_assu_policy_dump.fk_policy_type_id , the_new_india_medi_policy_2017_ind_assu_policy_dump.policy_name_txt ,the_new_india_medi_policy_2017_ind_assu_policy_dump.fk_company_id ,the_new_india_medi_policy_2017_ind_assu_policy_dump.fk_department_id , the_new_india_medi_policy_2017_ind_assu_policy_dump.total_the_new_india_medi_tns_hdfc_json_data , the_new_india_medi_policy_2017_ind_assu_policy_dump.tot_premium , the_new_india_medi_policy_2017_ind_assu_policy_dump.medi_cgst_rate , the_new_india_medi_policy_2017_ind_assu_policy_dump.medi_cgst_tot , the_new_india_medi_policy_2017_ind_assu_policy_dump.medi_sgst_rate , the_new_india_medi_policy_2017_ind_assu_policy_dump.medi_sgst_tot , the_new_india_medi_policy_2017_ind_assu_policy_dump.medi_final_premium , the_new_india_medi_policy_2017_ind_assu_policy_dump.the_new_india_status , the_new_india_medi_policy_2017_ind_assu_policy_dump.the_new_india_del_flag", $whereArr = $whereArr_medi_ind_the_new_india_2017_assu_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_ind_the_new_india_2017_assu_policy_list = $query["userData"];
			}
			$result["medi_ind_the_new_india_2017_assu_policy_data_arr"] = $medi_ind_the_new_india_2017_assu_policy_list;

			$medi_float_the_new_india_assu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_float_the_new_india_assu_policy["the_new_india_medi_floater_assu_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_float_the_new_india_assu_policy["the_new_india_medi_floater_assu_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_floater_assu_policy_dump", $colNames = "the_new_india_medi_floater_assu_policy_dump.medi_new_india_assu_float_policy_id , the_new_india_medi_floater_assu_policy_dump.fk_policy_id as medi_the_new_india_floater_assu_fk_policy_id , the_new_india_medi_floater_assu_policy_dump.fk_policy_type_id , the_new_india_medi_floater_assu_policy_dump.policy_name_txt ,the_new_india_medi_floater_assu_policy_dump.fk_company_id ,the_new_india_medi_floater_assu_policy_dump.fk_department_id , the_new_india_medi_floater_assu_policy_dump.total_the_new_india_medi_float_json_data , the_new_india_medi_floater_assu_policy_dump.tot_premium , the_new_india_medi_floater_assu_policy_dump.floater_disc_rate , the_new_india_medi_floater_assu_policy_dump.floater_disc_tot , the_new_india_medi_floater_assu_policy_dump.gross_premium_tot , the_new_india_medi_floater_assu_policy_dump.gross_premium_tot_new , the_new_india_medi_floater_assu_policy_dump.medi_cgst_rate , the_new_india_medi_floater_assu_policy_dump.medi_cgst_tot , the_new_india_medi_floater_assu_policy_dump.medi_sgst_rate , the_new_india_medi_floater_assu_policy_dump.medi_sgst_tot , the_new_india_medi_floater_assu_policy_dump.medi_final_premium , the_new_india_medi_floater_assu_policy_dump.the_new_india_status , the_new_india_medi_floater_assu_policy_dump.the_new_india_del_flag", $whereArr = $whereArr_medi_float_the_new_india_assu_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_float_the_new_india_assu_policy_list = $query["userData"];
			}
			$result["medi_float_the_new_india_assu_policy_data_arr"] = $medi_float_the_new_india_assu_policy_list;

			$medi_ind_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_policy_dump", $colNames = "medi_hdfc_ergo_health_insu_policy_dump.medi_hdfc_ergo_health_insu_policy_id , medi_hdfc_ergo_health_insu_policy_dump.fk_policy_id as medi_hdfc_ergo_health_insu_policy_fk_policy_id , medi_hdfc_ergo_health_insu_policy_dump.fk_policy_type_id , medi_hdfc_ergo_health_insu_policy_dump.policy_name_txt ,medi_hdfc_ergo_health_insu_policy_dump.fk_company_id ,medi_hdfc_ergo_health_insu_policy_dump.fk_department_id , medi_hdfc_ergo_health_insu_policy_dump.total_medi_ind_hdfc_json_data , medi_hdfc_ergo_health_insu_policy_dump.years_of_premium , medi_hdfc_ergo_health_insu_policy_dump.region , medi_hdfc_ergo_health_insu_policy_dump.tot_premium , medi_hdfc_ergo_health_insu_policy_dump.protect_ride_prem_tot , medi_hdfc_ergo_health_insu_policy_dump.hospital_daily_cash_prem_tot , medi_hdfc_ergo_health_insu_policy_dump.ipa_rider_prem_tot , medi_hdfc_ergo_health_insu_policy_dump.load_desc , medi_hdfc_ergo_health_insu_policy_dump.load_tot , medi_hdfc_ergo_health_insu_policy_dump.less_disc_per , medi_hdfc_ergo_health_insu_policy_dump.less_disc_tot , medi_hdfc_ergo_health_insu_policy_dump.family_disc_per ,medi_hdfc_ergo_health_insu_policy_dump.family_disc_tot , medi_hdfc_ergo_health_insu_policy_dump.gross_premium_tot , medi_hdfc_ergo_health_insu_policy_dump.gross_premium_tot_new , medi_hdfc_ergo_health_insu_policy_dump.medi_cgst_rate , medi_hdfc_ergo_health_insu_policy_dump.medi_cgst_tot , medi_hdfc_ergo_health_insu_policy_dump.medi_sgst_rate , medi_hdfc_ergo_health_insu_policy_dump.medi_sgst_tot , medi_hdfc_ergo_health_insu_policy_dump.medi_final_premium , medi_hdfc_ergo_health_insu_policy_dump.medi_hdfc_ergo_health_insu_policy_status , medi_hdfc_ergo_health_insu_policy_dump.medi_hdfc_ergo_health_insu_policy_del_flag", $whereArr = $whereArr_medi_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_ind_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_ind_hdfc_ergo_health_insu_policy_data_arr"] = $medi_ind_hdfc_ergo_health_insu_policy_list;

			$medi_easy_rate_float_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_easy_rate_float_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_float_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_easy_rate_float_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_float_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_float_policy_dump", $colNames = "hdfc_ergo_health_easy_rate_card_float_policy_dump.medi_hdfc_ergo_health_insu_easy_float_policy_id  , hdfc_ergo_health_easy_rate_card_float_policy_dump.fk_policy_id as hdfc_ergo_health_easy_rate_card_float_policy_fk_policy_id , hdfc_ergo_health_easy_rate_card_float_policy_dump.fk_policy_type_id , hdfc_ergo_health_easy_rate_card_float_policy_dump.policy_name_txt ,hdfc_ergo_health_easy_rate_card_float_policy_dump.fk_company_id ,hdfc_ergo_health_easy_rate_card_float_policy_dump.fk_department_id , hdfc_ergo_health_easy_rate_card_float_policy_dump.total_easy_float_medi_hdfc_json_data , hdfc_ergo_health_easy_rate_card_float_policy_dump.years_of_premium , hdfc_ergo_health_easy_rate_card_float_policy_dump.region , hdfc_ergo_health_easy_rate_card_float_policy_dump.tot_premium , hdfc_ergo_health_easy_rate_card_float_policy_dump.hdfc_ergo_health_insu_child_count , hdfc_ergo_health_easy_rate_card_float_policy_dump.hdfc_ergo_health_insu_child_count_first_premium , hdfc_ergo_health_easy_rate_card_float_policy_dump.hdfc_ergo_health_insu_child_total_premium , hdfc_ergo_health_easy_rate_card_float_policy_dump.protect_ride_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy_dump.hospital_daily_cash_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy_dump.ipa_rider_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy_dump.load_desc , hdfc_ergo_health_easy_rate_card_float_policy_dump.load_tot , hdfc_ergo_health_easy_rate_card_float_policy_dump.stay_active_benefit , hdfc_ergo_health_easy_rate_card_float_policy_dump.stay_active_benefit_prem , hdfc_ergo_health_easy_rate_card_float_policy_dump.less_disc_per , hdfc_ergo_health_easy_rate_card_float_policy_dump.tot_basic_prem ,  hdfc_ergo_health_easy_rate_card_float_policy_dump.less_disc_tot ,  hdfc_ergo_health_easy_rate_card_float_policy_dump.gross_premium_tot ,  hdfc_ergo_health_easy_rate_card_float_policy_dump.gross_premium_tot_new ,  hdfc_ergo_health_easy_rate_card_float_policy_dump.medi_cgst_rate ,  hdfc_ergo_health_easy_rate_card_float_policy_dump.medi_cgst_tot ,  hdfc_ergo_health_easy_rate_card_float_policy_dump.medi_sgst_rate ,  hdfc_ergo_health_easy_rate_card_float_policy_dump.medi_sgst_tot, hdfc_ergo_health_easy_rate_card_float_policy_dump.medi_final_premium  ,  hdfc_ergo_health_easy_rate_card_float_policy_dump.max_age , hdfc_ergo_health_easy_rate_card_float_policy_dump.easy_rate_status , hdfc_ergo_health_easy_rate_card_float_policy_dump.easy_rate_del_flag", $whereArr = $whereArr_medi_easy_rate_float_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_easy_rate_float_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr"] = $medi_easy_rate_float_hdfc_ergo_health_insu_policy_list;

			$medi_easy_rate_ind_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_indi_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_indi_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_policy_dump", $colNames = "hdfc_ergo_health_easy_rate_card_indi_policy_dump.medi_hdfc_ergo_health_insu_easy_policy_id  , hdfc_ergo_health_easy_rate_card_indi_policy_dump.fk_policy_id as hdfc_ergo_health_easy_rate_card_indi_policy_fk_policy_id , hdfc_ergo_health_easy_rate_card_indi_policy_dump.fk_policy_type_id , hdfc_ergo_health_easy_rate_card_indi_policy_dump.policy_name_txt ,hdfc_ergo_health_easy_rate_card_indi_policy_dump.fk_company_id ,hdfc_ergo_health_easy_rate_card_indi_policy_dump.fk_department_id , hdfc_ergo_health_easy_rate_card_indi_policy_dump.total_easy_medi_hdfc_json_data , hdfc_ergo_health_easy_rate_card_indi_policy_dump.years_of_premium , hdfc_ergo_health_easy_rate_card_indi_policy_dump.region , hdfc_ergo_health_easy_rate_card_indi_policy_dump.tot_premium , hdfc_ergo_health_easy_rate_card_indi_policy_dump.protect_ride_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy_dump.hospital_daily_cash_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy_dump.ipa_rider_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy_dump.load_desc , hdfc_ergo_health_easy_rate_card_indi_policy_dump.load_tot , hdfc_ergo_health_easy_rate_card_indi_policy_dump.family_disc_per , hdfc_ergo_health_easy_rate_card_indi_policy_dump.family_disc_tot , hdfc_ergo_health_easy_rate_card_indi_policy_dump.less_disc_per , hdfc_ergo_health_easy_rate_card_indi_policy_dump.tot_basic_prem ,  hdfc_ergo_health_easy_rate_card_indi_policy_dump.less_disc_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy_dump.gross_premium_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy_dump.gross_premium_tot_new ,  hdfc_ergo_health_easy_rate_card_indi_policy_dump.medi_cgst_rate ,  hdfc_ergo_health_easy_rate_card_indi_policy_dump.medi_cgst_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy_dump.medi_sgst_rate ,  hdfc_ergo_health_easy_rate_card_indi_policy_dump.medi_sgst_tot, hdfc_ergo_health_easy_rate_card_indi_policy_dump.medi_final_premium  , hdfc_ergo_health_easy_rate_card_indi_policy_dump.easy_rate_status , hdfc_ergo_health_easy_rate_card_indi_policy_dump.easy_rate_del_flag", $whereArr = $whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_easy_rate_ind_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr"] = $medi_easy_rate_ind_hdfc_ergo_health_insu_policy_list;

			$medi_energy_ind_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_energy_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_energy_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_energy_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_energy_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_energy_policy_dump", $colNames = "medi_hdfc_ergo_health_insu_energy_policy_dump.medi_hdfc_ergo_health_insu_energy_policy_id , medi_hdfc_ergo_health_insu_energy_policy_dump.fk_policy_id as medi_hdfc_ergo_health_insu_energy_policy_fk_policy_id , medi_hdfc_ergo_health_insu_energy_policy_dump.fk_policy_type_id , medi_hdfc_ergo_health_insu_energy_policy_dump.policy_name_txt ,medi_hdfc_ergo_health_insu_energy_policy_dump.fk_company_id ,medi_hdfc_ergo_health_insu_energy_policy_dump.fk_department_id , medi_hdfc_ergo_health_insu_energy_policy_dump.total_energy_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_energy_policy_dump.tot_premium , medi_hdfc_ergo_health_insu_energy_policy_dump.less_disc_per , medi_hdfc_ergo_health_insu_energy_policy_dump.less_disc_tot , medi_hdfc_ergo_health_insu_energy_policy_dump.load_desc , medi_hdfc_ergo_health_insu_energy_policy_dump.load_tot , medi_hdfc_ergo_health_insu_energy_policy_dump.gross_premium_tot , medi_hdfc_ergo_health_insu_energy_policy_dump.gross_premium_tot_new , medi_hdfc_ergo_health_insu_energy_policy_dump.medi_cgst_rate , medi_hdfc_ergo_health_insu_energy_policy_dump.medi_cgst_tot , medi_hdfc_ergo_health_insu_energy_policy_dump.medi_sgst_rate , medi_hdfc_ergo_health_insu_energy_policy_dump.medi_sgst_tot , medi_hdfc_ergo_health_insu_energy_policy_dump.medi_final_premium , medi_hdfc_ergo_health_insu_energy_policy_dump.medi_hdfc_ergo_health_insu_energy_policy_status , medi_hdfc_ergo_health_insu_energy_policy_dump.medi_hdfc_ergo_health_insu_energy_policy_del_flag", $whereArr = $whereArr_medi_energy_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_energy_ind_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr"] = $medi_energy_ind_hdfc_ergo_health_insu_policy_list;

			$medi_suraksha_ind_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_suraksha_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_suraksha_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_policy_dump", $colNames = "medi_hdfc_ergo_health_insu_suraksha_policy_dump.medi_hdfc_ergo_health_insu_suraksha_policy_id , medi_hdfc_ergo_health_insu_suraksha_policy_dump.fk_policy_id as medi_hdfc_ergo_health_insu_suraksha_policy_fk_policy_id , medi_hdfc_ergo_health_insu_suraksha_policy_dump.fk_policy_type_id , medi_hdfc_ergo_health_insu_suraksha_policy_dump.policy_name_txt ,medi_hdfc_ergo_health_insu_suraksha_policy_dump.fk_company_id ,medi_hdfc_ergo_health_insu_suraksha_policy_dump.fk_department_id , medi_hdfc_ergo_health_insu_suraksha_policy_dump.total_suraksha_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_suraksha_policy_dump.years_of_premium , medi_hdfc_ergo_health_insu_suraksha_policy_dump.region , medi_hdfc_ergo_health_insu_suraksha_policy_dump.tot_premium , medi_hdfc_ergo_health_insu_suraksha_policy_dump.load_desc  , medi_hdfc_ergo_health_insu_suraksha_policy_dump.load_tot  , medi_hdfc_ergo_health_insu_suraksha_policy_dump.less_disc_per , medi_hdfc_ergo_health_insu_suraksha_policy_dump.less_disc_tot , medi_hdfc_ergo_health_insu_suraksha_policy_dump.family_disc_per , medi_hdfc_ergo_health_insu_suraksha_policy_dump.family_disc_tot , medi_hdfc_ergo_health_insu_suraksha_policy_dump.gross_premium_tot , medi_hdfc_ergo_health_insu_suraksha_policy_dump.gross_premium_tot_new , medi_hdfc_ergo_health_insu_suraksha_policy_dump.medi_cgst_rate , medi_hdfc_ergo_health_insu_suraksha_policy_dump.medi_cgst_tot , medi_hdfc_ergo_health_insu_suraksha_policy_dump.medi_sgst_rate , medi_hdfc_ergo_health_insu_suraksha_policy_dump.medi_sgst_tot , medi_hdfc_ergo_health_insu_suraksha_policy_dump.medi_final_premium , medi_hdfc_ergo_health_insu_suraksha_policy_dump.medi_hdfc_ergo_health_insu_suraksha_policy_status , medi_hdfc_ergo_health_insu_suraksha_policy_dump.medi_hdfc_ergo_health_insu_suraksha_policy_del_flag", $whereArr = $whereArr_medi_suraksha_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_suraksha_ind_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr"] = $medi_suraksha_ind_hdfc_ergo_health_insu_policy_list;

			$medi_float_suraksha_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_float_suraksha_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_float_suraksha_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump", $colNames = "medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.medi_hdfc_ergo_health_float_suraksha_policy_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.fk_policy_id as medi_hdfc_ergo_health_insu_suraksha_floater_policy_fk_policy_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.fk_policy_type_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.policy_name_txt ,medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.fk_company_id ,medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.fk_department_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.total_suraksha_float_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.years_of_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.region , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.tot_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.hdfc_ergo_health_insu_child_count , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.hdfc_ergo_health_insu_child_count_first_premium ,medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.hdfc_ergo_health_insu_child_total_premium  , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.load_desc , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.load_tot  , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.less_disc_per , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.less_disc_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.gross_premium_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.gross_premium_tot_new , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.medi_cgst_rate , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.medi_cgst_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.medi_sgst_rate , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.medi_sgst_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.medi_final_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.max_age , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.suraksha_floater_policy_status , medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump.suraksha_floater_policy_del_flag", $whereArr = $whereArr_medi_float_suraksha_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_float_suraksha_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr"] = $medi_float_suraksha_hdfc_ergo_health_insu_policy_list;

			$medi_float_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_float_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_float_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_float_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_float_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_float_policy_dump", $colNames = "medi_hdfc_ergo_health_insu_float_policy_dump.medi_hdfc_ergo_health_insu_float_policy_id , medi_hdfc_ergo_health_insu_float_policy_dump.fk_policy_id as medi_hdfc_ergo_health_insu_float_policy_fk_policy_id , medi_hdfc_ergo_health_insu_float_policy_dump.fk_policy_type_id , medi_hdfc_ergo_health_insu_float_policy_dump.policy_name_txt ,medi_hdfc_ergo_health_insu_float_policy_dump.fk_company_id ,medi_hdfc_ergo_health_insu_float_policy_dump.fk_department_id , medi_hdfc_ergo_health_insu_float_policy_dump.total_medi_float_hdfc_json_data , medi_hdfc_ergo_health_insu_float_policy_dump.years_of_premium , medi_hdfc_ergo_health_insu_float_policy_dump.region , medi_hdfc_ergo_health_insu_float_policy_dump.tot_premium , medi_hdfc_ergo_health_insu_float_policy_dump.hdfc_ergo_health_insu_child_count , medi_hdfc_ergo_health_insu_float_policy_dump.hdfc_ergo_health_insu_child_count_first_premium , medi_hdfc_ergo_health_insu_float_policy_dump.hdfc_ergo_health_insu_child_total_premium , medi_hdfc_ergo_health_insu_float_policy_dump.protect_ride_prem_tot , medi_hdfc_ergo_health_insu_float_policy_dump.hospital_daily_cash_prem_tot , medi_hdfc_ergo_health_insu_float_policy_dump.ipa_rider_prem_tot , medi_hdfc_ergo_health_insu_float_policy_dump.load_desc , medi_hdfc_ergo_health_insu_float_policy_dump.load_tot ,  medi_hdfc_ergo_health_insu_float_policy_dump.less_disc_per ,  medi_hdfc_ergo_health_insu_float_policy_dump.less_disc_tot , medi_hdfc_ergo_health_insu_float_policy_dump.stay_active_benefit ,medi_hdfc_ergo_health_insu_float_policy_dump.stay_active_benefit_prem_tot , medi_hdfc_ergo_health_insu_float_policy_dump.gross_premium_tot , medi_hdfc_ergo_health_insu_float_policy_dump.gross_premium_tot_new , medi_hdfc_ergo_health_insu_float_policy_dump.medi_cgst_rate , medi_hdfc_ergo_health_insu_float_policy_dump.medi_cgst_tot , medi_hdfc_ergo_health_insu_float_policy_dump.medi_sgst_rate , medi_hdfc_ergo_health_insu_float_policy_dump.medi_sgst_tot , medi_hdfc_ergo_health_insu_float_policy_dump.medi_final_premium ,medi_hdfc_ergo_health_insu_float_policy_dump.max_age, medi_hdfc_ergo_health_insu_float_policy_dump.medi_hdfc_ergo_health_insu_float_policy_status , medi_hdfc_ergo_health_insu_float_policy_dump.medi_hdfc_ergo_health_insu_float_policy_del_flag", $whereArr = $whereArr_medi_float_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_float_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_float_hdfc_ergo_health_insu_policy_data_arr"] = $medi_float_hdfc_ergo_health_insu_policy_list;

			$mediclaim_floater_2014_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_mediclaim_floater_2014_policy["mediclaim_floater_2014_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_mediclaim_floater_2014_policy["mediclaim_floater_2014_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "mediclaim_floater_2014_policy_dump", $colNames = "mediclaim_floater_2014_policy_dump.medi_floater_2014_id , mediclaim_floater_2014_policy_dump.fk_policy_id as medi_floater_2014_policy_fk_policy_id , mediclaim_floater_2014_policy_dump.fk_policy_type_id , mediclaim_floater_2014_policy_dump.policy_name_txt , mediclaim_floater_2014_policy_dump.tot_medi_floater_2014_json , mediclaim_floater_2014_policy_dump.name_insured_sum_insured , mediclaim_floater_2014_policy_dump.name_insured_premium , mediclaim_floater_2014_policy_dump.medi_float_2014_total_premium , mediclaim_floater_2014_policy_dump.medi_float_2014_child_count , mediclaim_floater_2014_policy_dump.medi_float_2014_child_total_premium ,mediclaim_floater_2014_policy_dump.medi_float_2014_child_count_first_premium , mediclaim_floater_2014_policy_dump.medi_float_2014_load_description , mediclaim_floater_2014_policy_dump.medi_float_2014_load_amount , mediclaim_floater_2014_policy_dump.medi_float_2014_load_gross_premium , mediclaim_floater_2014_policy_dump.medi_float_2014_cgst_rate , mediclaim_floater_2014_policy_dump.medi_float_2014_cgst_tot , mediclaim_floater_2014_policy_dump.medi_float_2014_sgst_rate , mediclaim_floater_2014_policy_dump.medi_float_2014_sgst_tot , mediclaim_floater_2014_policy_dump.medi_float_2014_final_premium ,mediclaim_floater_2014_policy_dump.max_age, mediclaim_floater_2014_policy_dump.medi_float_2014_status , mediclaim_floater_2014_policy_dump.medi_float_2014_del_flag", $whereArr = $whereArr_mediclaim_floater_2014_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$mediclaim_floater_2014_policy_list = $query["userData"];
			}
			$result["mediclaim_floater2014_data_arr"] = $mediclaim_floater_2014_policy_list;

			$medi_floater_2020_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_floater_2020_policy["medi_floater_2020_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_floater_2020_policy["medi_floater_2020_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_floater_2020_policy_dump", $colNames = "medi_floater_2020_policy_dump.medi_floater_2020_id , medi_floater_2020_policy_dump.fk_policy_id as medi_floater2020_policy_fk_policy_id , medi_floater_2020_policy_dump.fk_policy_type_id , medi_floater_2020_policy_dump.policy_name_txt , medi_floater_2020_policy_dump.tot_medi_floater_2020_json , medi_floater_2020_policy_dump.name_insured_sum_insured , medi_floater_2020_policy_dump.name_insured_premium , medi_floater_2020_policy_dump.name_insured_ncd , medi_floater_2020_policy_dump.name_insured_premium_after_ncd , medi_floater_2020_policy_dump.medi_float_2020_total_premium , medi_floater_2020_policy_dump.medi_float_2020_child_count , medi_floater_2020_policy_dump.medi_float_2020_child_count_first_premium , medi_floater_2020_policy_dump.medi_float_2020_child_total_premium , medi_floater_2020_policy_dump.medi_float_2020_load_description , medi_floater_2020_policy_dump.medi_float_2020_load_amount , medi_floater_2020_policy_dump.medi_float_2020_restore_cover_premium , medi_floater_2020_policy_dump.medi_float_2020_maternity_new_bornbaby , medi_floater_2020_policy_dump.medi_float_2020_daily_cash_allow_hosp ,medi_floater_2020_policy_dump.medi_float_2020_load_gross_premium, medi_floater_2020_policy_dump.medi_float_2020_cgst_rate , medi_floater_2020_policy_dump.medi_float_2020_cgst_tot , medi_floater_2020_policy_dump.medi_float_2020_sgst_rate , medi_floater_2020_policy_dump.medi_float_2020_sgst_tot , medi_floater_2020_policy_dump.medi_float_2020_final_premium , medi_floater_2020_policy_dump.max_age , medi_floater_2020_policy_dump.medi_float_2020_status , medi_floater_2020_policy_dump.medi_float_2020_del_flag", $whereArr = $whereArr_medi_floater_2020_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_floater_2020_policy_list = $query["userData"];
			}
			$result["medi_floater2020_data_arr"] = $medi_floater_2020_policy_list;

			$supertopup_floater_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_supertopup_floater["super_top_up_floater_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_supertopup_floater["super_top_up_floater_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "super_top_up_floater_policy_dump", $colNames = "super_top_up_floater_policy_dump.supertopup_floater_policy_id , super_top_up_floater_policy_dump.fk_policy_id as supertopup_floater_policy_fk_policy_id , super_top_up_floater_policy_dump.fk_policy_type_id , super_top_up_floater_policy_dump.policy_name_txt , super_top_up_floater_policy_dump.tot_supertopup_floater_json , super_top_up_floater_policy_dump.name_insured_policy_option , super_top_up_floater_policy_dump.name_insured_deductable_thershold , super_top_up_floater_policy_dump.name_insured_sum_insured , super_top_up_floater_policy_dump.name_insured_premium , super_top_up_floater_policy_dump.supertopup_floater_total_premium , super_top_up_floater_policy_dump.supertopup_floater_load_description , super_top_up_floater_policy_dump.supertopup_floater_load_amount , super_top_up_floater_policy_dump.supertopup_floater_load_gross_premium , super_top_up_floater_policy_dump.supertopup_floater_cgst_rate , super_top_up_floater_policy_dump.supertopup_floater_cgst_tot , super_top_up_floater_policy_dump.supertopup_floater_sgst_rate , super_top_up_floater_policy_dump.supertopup_floater_sgst_tot , super_top_up_floater_policy_dump.supertopup_floater_final_premium ,super_top_up_floater_policy_dump.max_age, super_top_up_floater_policy_dump.supertopup_floater_status , super_top_up_floater_policy_dump.supertopup_floater_final_del_flag", $whereArr = $whereArr_supertopup_floater, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$supertopup_floater_policy_list = $query["userData"];
			}
			$result["supertopup_floater_data_arr"] = $supertopup_floater_policy_list;

			$supertopup_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_supertopup_ind["supertopup_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_supertopup_ind["supertopup_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "supertopup_ind_policy_dump", $colNames = "supertopup_ind_policy_dump.supertopup_ind_policy_id , supertopup_ind_policy_dump.fk_policy_id as supertopup_ind_policy_fk_policy_id , supertopup_ind_policy_dump.fk_policy_type_id , supertopup_ind_policy_dump.policy_name_txt , supertopup_ind_policy_dump.tot_supertopup_ind_json , supertopup_ind_policy_dump.supertopup_ind_total_premium , supertopup_ind_policy_dump.supertopup_ind_load_description , supertopup_ind_policy_dump.supertopup_ind_load_amount , supertopup_ind_policy_dump.supertopup_ind_load_gross_premium , supertopup_ind_policy_dump.supertopup_ind_cgst_rate , supertopup_ind_policy_dump.supertopup_ind_cgst_tot , supertopup_ind_policy_dump.supertopup_ind_sgst_rate , supertopup_ind_policy_dump.supertopup_ind_sgst_tot , supertopup_ind_policy_dump.supertopup_ind_final_premium , supertopup_ind_policy_dump.supertopup_ind_status , supertopup_ind_policy_dump.supertopup_ind_del_flag ", $whereArr = $whereArr_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$supertopup_ind_policy_list = $query["userData"];
			}
			$result["supertopup_ind_data_arr"] = $supertopup_ind_policy_list;

			$the_new_india_supertopup_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_the_new_india_supertopup_ind["the_new_india_supertopup_ind_assu_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_the_new_india_supertopup_ind["the_new_india_supertopup_ind_assu_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_ind_assu_policy_dump", $colNames = "the_new_india_supertopup_ind_assu_policy_dump.the_new_india_supertopup_assu_ind_policy_id , the_new_india_supertopup_ind_assu_policy_dump.fk_policy_id as the_new_india_supertopup_ind_assu_policy_fk_policy_id , the_new_india_supertopup_ind_assu_policy_dump.fk_policy_type_id ,  the_new_india_supertopup_ind_assu_policy_dump.fk_company_id ,  the_new_india_supertopup_ind_assu_policy_dump.fk_department_id , the_new_india_supertopup_ind_assu_policy_dump.policy_name_txt , the_new_india_supertopup_ind_assu_policy_dump.total_the_new_india_supertopup_ind_json_data ,  the_new_india_supertopup_ind_assu_policy_dump.tot_premium , the_new_india_supertopup_ind_assu_policy_dump.medi_cgst_rate , the_new_india_supertopup_ind_assu_policy_dump.medi_cgst_tot , the_new_india_supertopup_ind_assu_policy_dump.medi_sgst_rate , the_new_india_supertopup_ind_assu_policy_dump.medi_sgst_tot, the_new_india_supertopup_ind_assu_policy_dump.medi_final_premium, the_new_india_supertopup_ind_assu_policy_dump.the_new_india_status, the_new_india_supertopup_ind_assu_policy_dump.the_new_india_del_flag", $whereArr = $whereArr_the_new_india_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$the_new_india_supertopup_ind_policy_list = $query["userData"];
			}
			$result["the_new_india_supertopup_ind_data_arr"] = $the_new_india_supertopup_ind_policy_list;

			$the_new_india_supertopup_ind_single_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_the_new_india_supertopup_ind_single["the_new_india_supertopup_ind_single_assu_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_the_new_india_supertopup_ind_single["the_new_india_supertopup_ind_single_assu_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_ind_single_assu_policy_dump", $colNames = "the_new_india_supertopup_ind_single_assu_policy_dump.the_new_india_supertopup_assu_ind_single_policy_id , the_new_india_supertopup_ind_single_assu_policy_dump.fk_policy_id as the_new_india_supertopup_ind_single_assu_policy_fk_policy_id , the_new_india_supertopup_ind_single_assu_policy_dump.fk_policy_type_id ,  the_new_india_supertopup_ind_single_assu_policy_dump.fk_company_id ,  the_new_india_supertopup_ind_single_assu_policy_dump.fk_department_id , the_new_india_supertopup_ind_single_assu_policy_dump.policy_name_txt , the_new_india_supertopup_ind_single_assu_policy_dump.total_the_new_india_supertopup_ind_single_json_data ,  the_new_india_supertopup_ind_single_assu_policy_dump.tot_premium , the_new_india_supertopup_ind_single_assu_policy_dump.medi_cgst_rate , the_new_india_supertopup_ind_single_assu_policy_dump.medi_cgst_tot , the_new_india_supertopup_ind_single_assu_policy_dump.medi_sgst_rate , the_new_india_supertopup_ind_single_assu_policy_dump.medi_sgst_tot, the_new_india_supertopup_ind_single_assu_policy_dump.medi_final_premium, the_new_india_supertopup_ind_single_assu_policy_dump.the_new_india_status, the_new_india_supertopup_ind_single_assu_policy_dump.the_new_india_del_flag", $whereArr = $whereArr_the_new_india_supertopup_ind_single, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$the_new_india_supertopup_ind_single_policy_list = $query["userData"];
			}
			$result["the_new_india_supertopup_ind_single_data_arr"] = $the_new_india_supertopup_ind_single_policy_list;

			$hdfc_ergo_health_supertopup_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_hdfc_ergo_health_supertopup_ind["hdfc_ergo_health_super_topup_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_hdfc_ergo_health_supertopup_ind["hdfc_ergo_health_super_topup_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_policy_dump", $colNames = "hdfc_ergo_health_super_topup_policy_dump.supertopup_ind_policy_id , hdfc_ergo_health_super_topup_policy_dump.fk_policy_id as hdfc_ergo_health_super_topup_policy_fk_policy_id , hdfc_ergo_health_super_topup_policy_dump.fk_policy_type_id ,  hdfc_ergo_health_super_topup_policy_dump.fk_company_id ,  hdfc_ergo_health_super_topup_policy_dump.fk_department_id , hdfc_ergo_health_super_topup_policy_dump.policy_name_txt , hdfc_ergo_health_super_topup_policy_dump.tot_supertopup_ind_hdfc_json , hdfc_ergo_health_super_topup_policy_dump.years_of_premium , hdfc_ergo_health_super_topup_policy_dump.tot_premium , hdfc_ergo_health_super_topup_policy_dump.load_desc , hdfc_ergo_health_super_topup_policy_dump.load_tot , hdfc_ergo_health_super_topup_policy_dump.less_disc_per , hdfc_ergo_health_super_topup_policy_dump.less_disc_tot , hdfc_ergo_health_super_topup_policy_dump.gross_premium_tot , hdfc_ergo_health_super_topup_policy_dump.gross_premium_tot_new , hdfc_ergo_health_super_topup_policy_dump.medi_cgst_rate , hdfc_ergo_health_super_topup_policy_dump.medi_cgst_tot , hdfc_ergo_health_super_topup_policy_dump.medi_sgst_rate , hdfc_ergo_health_super_topup_policy_dump.medi_sgst_tot, hdfc_ergo_health_super_topup_policy_dump.medi_final_premium, hdfc_ergo_health_super_topup_policy_dump.super_topup_policy_status, hdfc_ergo_health_super_topup_policy_dump.super_topup_policy_del_flag", $whereArr = $whereArr_hdfc_ergo_health_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$hdfc_ergo_health_supertopup_ind_policy_list = $query["userData"];
			}
			$result["hdfc_ergo_health_supertopup_ind_data_arr"] = $hdfc_ergo_health_supertopup_ind_policy_list;

			$hdfc_ergo_health_supertopup_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_hdfc_ergo_health_supertopup_float["hdfc_ergo_health_super_topup_floater_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_hdfc_ergo_health_supertopup_float["hdfc_ergo_health_super_topup_floater_policy_dump.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_floater_policy_dump", $colNames = "hdfc_ergo_health_super_topup_floater_policy_dump.supertopup_float_policy_id , hdfc_ergo_health_super_topup_floater_policy_dump.fk_policy_id as hdfc_ergo_health_super_topup_floater_policy_fk_policy_id , hdfc_ergo_health_super_topup_floater_policy_dump.fk_policy_type_id ,  hdfc_ergo_health_super_topup_floater_policy_dump.fk_company_id ,  hdfc_ergo_health_super_topup_floater_policy_dump.fk_department_id , hdfc_ergo_health_super_topup_floater_policy_dump.policy_name_txt , hdfc_ergo_health_super_topup_floater_policy_dump.tot_supertopup_float_hdfc_json , hdfc_ergo_health_super_topup_floater_policy_dump.years_of_premium , hdfc_ergo_health_super_topup_floater_policy_dump.tot_premium , hdfc_ergo_health_super_topup_floater_policy_dump.load_desc , hdfc_ergo_health_super_topup_floater_policy_dump.load_tot , hdfc_ergo_health_super_topup_floater_policy_dump.less_disc_per , hdfc_ergo_health_super_topup_floater_policy_dump.less_disc_tot , hdfc_ergo_health_super_topup_floater_policy_dump.gross_premium_tot , hdfc_ergo_health_super_topup_floater_policy_dump.gross_premium_tot_new , hdfc_ergo_health_super_topup_floater_policy_dump.medi_cgst_rate , hdfc_ergo_health_super_topup_floater_policy_dump.medi_cgst_tot , hdfc_ergo_health_super_topup_floater_policy_dump.medi_sgst_rate , hdfc_ergo_health_super_topup_floater_policy_dump.medi_sgst_tot, hdfc_ergo_health_super_topup_floater_policy_dump.medi_final_premium, hdfc_ergo_health_super_topup_floater_policy_dump.max_age, hdfc_ergo_health_super_topup_floater_policy_dump.super_topup_policy_status, hdfc_ergo_health_super_topup_floater_policy_dump.super_topup_policy_del_flag", $whereArr = $whereArr_hdfc_ergo_health_supertopup_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$hdfc_ergo_health_supertopup_float_policy_list = $query["userData"];
			}
			$result["hdfc_ergo_health_supertopup_float_data_arr"] = $hdfc_ergo_health_supertopup_float_policy_list;

			$care_health_care_adv_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_adv_ind_policy_dump", $colNames = "care_health_care_adv_ind_policy_dump.care_adv_ind_id , care_health_care_adv_ind_policy_dump.fk_policy_id as care_health_care_adv_ind_policy_fk_policy_id , care_health_care_adv_ind_policy_dump.fk_policy_type_id , care_health_care_adv_ind_policy_dump.policy_name_txt , care_health_care_adv_ind_policy_dump.fk_company_id , care_health_care_adv_ind_policy_dump.fk_department_id , care_health_care_adv_ind_policy_dump.total_care_adv_ind_json_data , care_health_care_adv_ind_policy_dump.medi_final_premium , care_health_care_adv_ind_policy_dump.care_status , care_health_care_adv_ind_policy_dump.care_del_flag ", $whereArr = $whereArr_care_health_care_adv_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$care_health_care_adv_ind_policy_list = $query["userData"];
			}
			$result["care_health_care_adv_ind_policy_data_arr"] = $care_health_care_adv_ind_policy_list;

			$care_health_care_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_care_health_care_ind["care_health_care_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_care_health_care_ind["care_health_care_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_care_health_care_ind["care_health_care_ind_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_care_health_care_ind["care_health_care_ind_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_ind_policy_dump", $colNames = "care_health_care_ind_policy_dump.care_ind_id , care_health_care_ind_policy_dump.fk_policy_id as care_health_care_ind_policy_fk_policy_id , care_health_care_ind_policy_dump.fk_policy_type_id , care_health_care_ind_policy_dump.policy_name_txt , care_health_care_ind_policy_dump.fk_company_id , care_health_care_ind_policy_dump.fk_department_id , care_health_care_ind_policy_dump.total_care_ind_json_data , care_health_care_ind_policy_dump.medi_final_premium , care_health_care_ind_policy_dump.care_status , care_health_care_ind_policy_dump.care_del_flag ", $whereArr = $whereArr_care_health_care_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$care_health_care_ind_policy_list = $query["userData"];
			}
			$result["care_health_care_ind_policy_data_arr"] = $care_health_care_ind_policy_list;

			$care_health_care_adv_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_adv_float_policy_dump", $colNames = "care_health_care_adv_float_policy_dump.care_adv_float_id , care_health_care_adv_float_policy_dump.fk_policy_id as care_health_care_adv_float_policy_fk_policy_id , care_health_care_adv_float_policy_dump.fk_policy_type_id , care_health_care_adv_float_policy_dump.policy_name_txt , care_health_care_adv_float_policy_dump.fk_company_id , care_health_care_adv_float_policy_dump.fk_department_id , care_health_care_adv_float_policy_dump.total_care_adv_float_json_data , care_health_care_adv_float_policy_dump.medi_final_premium , care_health_care_adv_float_policy_dump.max_age , care_health_care_adv_float_policy_dump.care_status , care_health_care_adv_float_policy_dump.care_del_flag ", $whereArr = $whereArr_care_health_care_adv_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$care_health_care_adv_float_policy_list = $query["userData"];
			}
			$result["care_health_care_adv_float_policy_data_arr"] = $care_health_care_adv_float_policy_list;

			$care_health_care_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_care_health_care_float["care_health_care_float_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_care_health_care_float["care_health_care_float_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_care_health_care_float["care_health_care_float_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_care_health_care_float["care_health_care_float_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_float_policy_dump", $colNames = "care_health_care_float_policy_dump.care_float_id , care_health_care_float_policy_dump.fk_policy_id as care_health_care_float_policy_fk_policy_id , care_health_care_float_policy_dump.fk_policy_type_id , care_health_care_float_policy_dump.policy_name_txt , care_health_care_float_policy_dump.fk_company_id , care_health_care_float_policy_dump.fk_department_id , care_health_care_float_policy_dump.total_care_float_json_data , care_health_care_float_policy_dump.medi_final_premium , care_health_care_float_policy_dump.max_age , care_health_care_float_policy_dump.care_status , care_health_care_float_policy_dump.care_del_flag ", $whereArr = $whereArr_care_health_care_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$care_health_care_float_policy_list = $query["userData"];
			}
			$result["care_health_care_float_policy_data_arr"] = $care_health_care_float_policy_list;


			$gmc_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_gmc_ind["gmc_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_gmc_ind["gmc_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_gmc_ind["gmc_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_gmc_ind["gmc_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "gmc_policy_dump", $colNames = "gmc_policy_dump.gmc_policy_id , gmc_policy_dump.fk_policy_id as gmc_policy_fk_policy_id , gmc_policy_dump.fk_policy_type_id , gmc_policy_dump.policy_name_txt , gmc_policy_dump.fk_company_id , gmc_policy_dump.fk_department_id , gmc_policy_dump.tot_gmc_json_data , gmc_policy_dump.gmc_family_size , gmc_policy_dump.gmc_tot_sum_insured , gmc_policy_dump.gmc_policy_status , gmc_policy_dump.gmc_policy_del_flag ", $whereArr = $whereArr_gmc_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$gmc_ind_policy_list = $query["userData"];
			}
			$result["gmc_ind_data_arr"] = $gmc_ind_policy_list;

			$gpa_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_gpa_ind["gpa_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_gpa_ind["gpa_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_gpa_ind["gpa_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_gpa_ind["gpa_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "gpa_policy_dump", $colNames = "gpa_policy_dump.gpa_policy_id , gpa_policy_dump.fk_policy_id as gpa_policy_fk_policy_id , gpa_policy_dump.fk_policy_type_id , gpa_policy_dump.policy_name_txt , gpa_policy_dump.fk_company_id , gpa_policy_dump.fk_department_id , gpa_policy_dump.tot_gpa_json_data , gpa_policy_dump.gpa_family_size , gpa_policy_dump.gpa_tot_sum_insured , gpa_policy_dump.gpa_policy_status , gpa_policy_dump.gpa_policy_del_flag ", $whereArr = $whereArr_gpa_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$gpa_ind_policy_list = $query["userData"];
			}
			$result["gpa_ind_data_arr"] = $gpa_ind_policy_list;

			$ind_personal_accident_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_ind_personal_accident["personal_accident_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_ind_personal_accident["personal_accident_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_ind_personal_accident["personal_accident_ind_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_ind_personal_accident["personal_accident_ind_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "personal_accident_ind_policy_dump", $colNames = "personal_accident_ind_policy_dump.paccident_policy_id , personal_accident_ind_policy_dump.fk_policy_id as personal_accident_policy_ind_fk_policy_id , personal_accident_ind_policy_dump.fk_policy_type_id , personal_accident_ind_policy_dump.policy_name_txt , personal_accident_ind_policy_dump.fk_company_id , personal_accident_ind_policy_dump.fk_department_id , personal_accident_ind_policy_dump.total_pa_ind_json_data , personal_accident_ind_policy_dump.tot_premium , personal_accident_ind_policy_dump.less_disc_rate , personal_accident_ind_policy_dump.less_disc_tot , personal_accident_ind_policy_dump.gross_premium , personal_accident_ind_policy_dump.gross_premium_new  , personal_accident_ind_policy_dump.medi_cgst_rate  , personal_accident_ind_policy_dump.medi_cgst_tot  , personal_accident_ind_policy_dump.medi_sgst_rate  , personal_accident_ind_policy_dump.medi_sgst_tot  , personal_accident_ind_policy_dump.medi_final_premium  , personal_accident_ind_policy_dump.personal_accident_status  , personal_accident_ind_policy_dump.personal_accident_del_flag  ", $whereArr = $whereArr_ind_personal_accident, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$ind_personal_accident_policy_list = $query["userData"];
			}
			$result["ind_personal_accident_policy_data_arr"] = $ind_personal_accident_policy_list;

			$common_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_common_ind["common_ind_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_common_ind["common_ind_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_common_ind["common_ind_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_common_ind["common_ind_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "common_ind_policy_dump", $colNames = "common_ind_policy_dump.common_ind_policy_id , common_ind_policy_dump.fk_policy_id as common_ind_policy_fk_policy_id , common_ind_policy_dump.fk_policy_type_id , common_ind_policy_dump.policy_name_txt , common_ind_policy_dump.fk_company_id , common_ind_policy_dump.fk_department_id , common_ind_policy_dump.tot_commind_json_data , common_ind_policy_dump.comm_ind_total_amount , common_ind_policy_dump.comm_ind_less_discount_rate , common_ind_policy_dump.comm_ind_less_discount_tot , common_ind_policy_dump.comm_ind_load_desc , common_ind_policy_dump.comm_ind_load_tot , common_ind_policy_dump.comm_ind_gross_premium , common_ind_policy_dump.comm_ind_gross_premium_new , common_ind_policy_dump.comm_ind_cgst_rate , common_ind_policy_dump.comm_ind_cgst_tot , common_ind_policy_dump.comm_ind_sgst_rate , common_ind_policy_dump.comm_ind_sgst_tot , common_ind_policy_dump.comm_ind_final_premium , common_ind_policy_dump.comm_ind_status , common_ind_policy_dump.comm_ind_del_flag", $whereArr = $whereArr_common_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$common_ind_policy_list = $query["userData"];
			}
			$result["common_ind_data_arr"] = $common_ind_policy_list;

			$common_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_common_float["common_float_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_common_float["common_float_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_common_float["common_float_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_common_float["common_float_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "common_float_policy_dump", $colNames = "common_float_policy_dump.common_float_policy_id , common_float_policy_dump.fk_policy_id as common_float_policy_fk_policy_id , common_float_policy_dump.fk_policy_type_id , common_float_policy_dump.policy_name_txt , common_float_policy_dump.fk_company_id , common_float_policy_dump.fk_department_id , common_float_policy_dump.tot_commfloat_json_data , common_float_policy_dump.comm_float_total_amount , common_float_policy_dump.comm_float_less_discount_rate , common_float_policy_dump.comm_float_less_discount_tot , common_float_policy_dump.comm_float_load_desc , common_float_policy_dump.comm_float_load_tot , common_float_policy_dump.comm_float_gross_premium , common_float_policy_dump.comm_float_gross_premium_new , common_float_policy_dump.comm_float_cgst_rate , common_float_policy_dump.comm_float_cgst_tot , common_float_policy_dump.comm_float_sgst_rate , common_float_policy_dump.comm_float_sgst_tot , common_float_policy_dump.comm_float_final_premium , common_float_policy_dump.comm_float_status , common_float_policy_dump.comm_float_del_flag", $whereArr = $whereArr_common_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$common_float_policy_list = $query["userData"];
			}
			$result["common_float_data_arr"] = $common_float_policy_list;

			$private_car_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_private_car["motor_private_car_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_private_car["motor_private_car_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_private_car["motor_private_car_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_private_car["motor_private_car_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_private_car_policy_dump", $colNames = "motor_private_car_policy_dump.private_car_policy_id , motor_private_car_policy_dump.fk_policy_id as motor_private_car_policy_fk_policy_id , motor_private_car_policy_dump.fk_policy_type_id , motor_private_car_policy_dump.policy_name_txt , motor_private_car_policy_dump.fk_company_id , motor_private_car_policy_dump.fk_department_id , motor_private_car_policy_dump.vehicle_make_model , motor_private_car_policy_dump.vehicle_reg_no , motor_private_car_policy_dump.insu_declared_val , motor_private_car_policy_dump.non_elect_access_val , motor_private_car_policy_dump.elect_access_val , motor_private_car_policy_dump.lpg_cng_idv_val , motor_private_car_policy_dump.trailer_val , motor_private_car_policy_dump.year_manufact_val , motor_private_car_policy_dump.rta_city_code , motor_private_car_policy_dump.rta_city , motor_private_car_policy_dump.rta_city_cat , motor_private_car_policy_dump.cubic_capacity_val , motor_private_car_policy_dump.calculation_method , motor_private_car_policy_dump.type_of_cover , motor_private_car_policy_dump.prev_policy_expiry_date , motor_private_car_policy_dump.policy_period , motor_private_car_policy_dump.inception_date , motor_private_car_policy_dump.expiry_date , motor_private_car_policy_dump.od_basic_od_tot , motor_private_car_policy_dump.od_special_disc_per , motor_private_car_policy_dump.od_special_disc_tot , motor_private_car_policy_dump.od_special_load_per , motor_private_car_policy_dump.od_special_load_tot , motor_private_car_policy_dump.od_net_basic_od_tot , motor_private_car_policy_dump.od_non_elec_acc_tot , motor_private_car_policy_dump.od_elec_acc_tot , motor_private_car_policy_dump.od_bi_fuel_kit_tot , motor_private_car_policy_dump.od_od_basic_od1_tot , motor_private_car_policy_dump.od_trailer_tot , motor_private_car_policy_dump.od_geographical_area_tot , motor_private_car_policy_dump.od_embassy_load_tot , motor_private_car_policy_dump.od_fibre_glass_tank_tot , motor_private_car_policy_dump.od_driving_tut_tot , motor_private_car_policy_dump.od_rallies_tot , motor_private_car_policy_dump.od_basic_od2_tot , motor_private_car_policy_dump.od_anti_tot , motor_private_car_policy_dump.od_handicap_tot , motor_private_car_policy_dump.od_aai_tot , motor_private_car_policy_dump.od_vintage_tot , motor_private_car_policy_dump.od_own_premises_tot , motor_private_car_policy_dump.od_voluntary_deduc_tot , motor_private_car_policy_dump.od_basic_od3_tot , motor_private_car_policy_dump.od_ncb_per , motor_private_car_policy_dump.od_ncb_tot, motor_private_car_policy_dump.od_tot_anual_od_premium , motor_private_car_policy_dump.od_tot_od_premium_policy_period , motor_private_car_policy_dump.tp_basic_tp_tot , motor_private_car_policy_dump.tp_restr_tppd , motor_private_car_policy_dump.tp_trailer_tot , motor_private_car_policy_dump.tp_bi_fuel_tot , motor_private_car_policy_dump.tp_basic_tp1_tot , motor_private_car_policy_dump.tp_compul_own_driv_tot , motor_private_car_policy_dump.tp_geographical_area_tot , motor_private_car_policy_dump.tp_unnamed_papax_tot , motor_private_car_policy_dump.tp_no_seats_limit_person_tot , motor_private_car_policy_dump.tp_ll_drv_emp_tot , motor_private_car_policy_dump.tp_no_drv_emp_tot , motor_private_car_policy_dump.tp_noof_person_tot , motor_private_car_policy_dump.tp_pa_paid_drv_tot , motor_private_car_policy_dump.tp_ll_defe_tot , motor_private_car_policy_dump.tp_basic_tp2_tot , motor_private_car_policy_dump.tp_tot_anual_tp_premium , motor_private_car_policy_dump.tp_tot_premium_policy_period , motor_private_car_policy_dump.plan_name , motor_private_car_policy_dump.plan_name_tot , motor_private_car_policy_dump.tot_othercover_ind_json , motor_private_car_policy_dump.tot_anual_cover_premium , motor_private_car_policy_dump.tot_cover_premium_period , motor_private_car_policy_dump.tot_premium , motor_private_car_policy_dump.motor_cgst_rate  , motor_private_car_policy_dump.motor_cgst_tot  , motor_private_car_policy_dump.motor_sgst_rate  , motor_private_car_policy_dump.motor_sgst_tot  , motor_private_car_policy_dump.gst_rate , motor_private_car_policy_dump.gst_tot , motor_private_car_policy_dump.tot_payable_premium , motor_private_car_policy_dump.private_car_policy_status , motor_private_car_policy_dump.private_car_policy_del_flag", $whereArr = $whereArr_private_car, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$private_car_policy_list = $query["userData"];
			}
			$result["private_car_data_arr"] = $private_car_policy_list;

			$two_wheeler_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_2_wheeler["motor_2_wheeler_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_2_wheeler["motor_2_wheeler_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_2_wheeler["motor_2_wheeler_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_2_wheeler["motor_2_wheeler_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_2_wheeler_policy_dump", $colNames = "motor_2_wheeler_policy_dump.2_wheeler_policy_id as two_wheeler_policy_id, motor_2_wheeler_policy_dump.fk_policy_id as two_wheeler_policy_fk_policy_id , motor_2_wheeler_policy_dump.fk_policy_type_id , motor_2_wheeler_policy_dump.policy_name_txt , motor_2_wheeler_policy_dump.fk_company_id , motor_2_wheeler_policy_dump.fk_department_id , motor_2_wheeler_policy_dump.vehicle_make_model , motor_2_wheeler_policy_dump.vehicle_reg_no , motor_2_wheeler_policy_dump.insu_declared_val , motor_2_wheeler_policy_dump.elect_acc_val , motor_2_wheeler_policy_dump.other_elect_acc_val , motor_2_wheeler_policy_dump.policy_period_tenure_years , motor_2_wheeler_policy_dump.previous_policy_expiry_date_tenur , motor_2_wheeler_policy_dump.year_manufact_val , motor_2_wheeler_policy_dump.rta_city_code , motor_2_wheeler_policy_dump.rta_city , motor_2_wheeler_policy_dump.rta_city_cat , motor_2_wheeler_policy_dump.cubic_capacity_val , motor_2_wheeler_policy_dump.type_of_cover , motor_2_wheeler_policy_dump.policy_period , motor_2_wheeler_policy_dump.inception_date , motor_2_wheeler_policy_dump.expiry_date , motor_2_wheeler_policy_dump.od_basic_od_tot , motor_2_wheeler_policy_dump.od_special_disc_per , motor_2_wheeler_policy_dump.od_special_disc_tot , motor_2_wheeler_policy_dump.od_special_load_per , motor_2_wheeler_policy_dump.od_special_load_tot , motor_2_wheeler_policy_dump.od_net_basic_od_tot , motor_2_wheeler_policy_dump.od_elec_acc_tot , motor_2_wheeler_policy_dump.od_other_elec_acc_tot , motor_2_wheeler_policy_dump.od_od_basic_od1_tot , motor_2_wheeler_policy_dump.od_geographical_area_tot , motor_2_wheeler_policy_dump.od_rallies_tot , motor_2_wheeler_policy_dump.od_embassy_load_tot , motor_2_wheeler_policy_dump.od_basic_od2_tot , motor_2_wheeler_policy_dump.od_anti_theft_tot , motor_2_wheeler_policy_dump.od_handicap_tot , motor_2_wheeler_policy_dump.od_aai_tot , motor_2_wheeler_policy_dump.od_side_car_tot , motor_2_wheeler_policy_dump.od_own_premises_tot, motor_2_wheeler_policy_dump.od_voluntary_excess_tot, motor_2_wheeler_policy_dump.od_basic_od3_tot, motor_2_wheeler_policy_dump.od_ncb_per, motor_2_wheeler_policy_dump.od_ncb_tot, motor_2_wheeler_policy_dump.od_tot_od_premium_policy_period , motor_2_wheeler_policy_dump.tp_basic_tp_tot , motor_2_wheeler_policy_dump.tp_restr_tppd_tot , motor_2_wheeler_policy_dump.tp_basic_tp1_tot , motor_2_wheeler_policy_dump.tp_geographical_area_tot , motor_2_wheeler_policy_dump.tp_compul_pa_own_driv_tot , motor_2_wheeler_policy_dump.tp_unnamed_pa_tot , motor_2_wheeler_policy_dump.tp_ll_drv_emp_imt28_tot , motor_2_wheeler_policy_dump.tp_ll_other_emp_tot , motor_2_wheeler_policy_dump.tp_noof_other_emp_tot , motor_2_wheeler_policy_dump.tp_basic_tp2_tot , motor_2_wheeler_policy_dump.tp_tot_premium_policy_period , motor_2_wheeler_policy_dump.plan_name , motor_2_wheeler_policy_dump.plan_name_tot , motor_2_wheeler_policy_dump.tot_othercover_ind_json , motor_2_wheeler_policy_dump.tot_cover_premium_period  , motor_2_wheeler_policy_dump.tot_premium , motor_2_wheeler_policy_dump.motor_cgst_rate  , motor_2_wheeler_policy_dump.motor_cgst_tot  , motor_2_wheeler_policy_dump.motor_sgst_rate  , motor_2_wheeler_policy_dump.motor_sgst_tot , motor_2_wheeler_policy_dump.gst_rate , motor_2_wheeler_policy_dump.gst_tot , motor_2_wheeler_policy_dump.tot_payable_premium , motor_2_wheeler_policy_dump.2_wheeler_policy_status , motor_2_wheeler_policy_dump.2_wheeler_policy_del_flag", $whereArr = $whereArr_2_wheeler, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$two_wheeler_policy_list = $query["userData"];
			}
			$result["motor_2_wheeler_data_arr"] = $two_wheeler_policy_list;

			$motor_commercial_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_motor_commercial_policy["motor_commercial_policy_dump.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_motor_commercial_policy["motor_commercial_policy_dump.fk_policy_id"] = $result["policy_id"];
				$whereArr_motor_commercial_policy["motor_commercial_policy_dump.fk_company_id"] = $result["fk_company_id"];
				$whereArr_motor_commercial_policy["motor_commercial_policy_dump.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_commercial_policy_dump", $colNames = "motor_commercial_policy_dump.commercial_policy_id , motor_commercial_policy_dump.fk_policy_id as motor_commercial_policy_fk_policy_id , motor_commercial_policy_dump.fk_policy_type_id , motor_commercial_policy_dump.policy_name_txt , motor_commercial_policy_dump.fk_company_id , motor_commercial_policy_dump.fk_department_id , motor_commercial_policy_dump.vehicle_make_model , motor_commercial_policy_dump.vehicle_reg_no , motor_commercial_policy_dump.insu_declared_val , motor_commercial_policy_dump.elect_acc_val , motor_commercial_policy_dump.lpg_cng_idv_val , motor_commercial_policy_dump.year_manufact_val , motor_commercial_policy_dump.zone_city_code , motor_commercial_policy_dump.zone_city , motor_commercial_policy_dump.zone_city_cat , motor_commercial_policy_dump.gvw_val , motor_commercial_policy_dump.class_val , motor_commercial_policy_dump.type_of_cover , motor_commercial_policy_dump.policy_period , motor_commercial_policy_dump.inception_date , motor_commercial_policy_dump.expiry_date , motor_commercial_policy_dump.od_basic_od_tot , motor_commercial_policy_dump.od_elec_acc_tot , motor_commercial_policy_dump.od_trailer_tot , motor_commercial_policy_dump.od_bi_fuel_kit_tot , motor_commercial_policy_dump.od_od_basic_od1_tot , motor_commercial_policy_dump.od_geog_area_tot , motor_commercial_policy_dump.od_fiber_glass_tank_tot , motor_commercial_policy_dump.od_imt_cover_mud_guard_tot , motor_commercial_policy_dump.od_basic_od2_tot , motor_commercial_policy_dump.od_basic_od3_tot , motor_commercial_policy_dump.od_ncb_per , motor_commercial_policy_dump.od_ncb_tot , motor_commercial_policy_dump.od_tot_anual_od_premium , motor_commercial_policy_dump.od_special_disc_per , motor_commercial_policy_dump.od_special_disc_tot , motor_commercial_policy_dump.od_special_load_per , motor_commercial_policy_dump.od_special_load_tot , motor_commercial_policy_dump.od_tot_od_premium , motor_commercial_policy_dump.tp_basic_tp_tot, motor_commercial_policy_dump.tp_restr_tppd_tot, motor_commercial_policy_dump.tp_trailer_tot, motor_commercial_policy_dump.tp_bi_fuel_kit_tot, motor_commercial_policy_dump.tp_basic_tp1_tot, motor_commercial_policy_dump.tp_geog_area_tot , motor_commercial_policy_dump.tp_compul_pa_own_driv_tot , motor_commercial_policy_dump.tp_pa_paid_driver_tot , motor_commercial_policy_dump.tp_ll_emp_non_fare_tot , motor_commercial_policy_dump.tp_ll_driver_cleaner_tot , motor_commercial_policy_dump.tp_ll_person_operation_tot , motor_commercial_policy_dump.tp_basic_tp2_tot , motor_commercial_policy_dump.tp_tot_premium , motor_commercial_policy_dump.tp_consumables , motor_commercial_policy_dump.tp_zero_depreciation , motor_commercial_policy_dump.tp_road_side_ass , motor_commercial_policy_dump.tp_tot_addon_premium , motor_commercial_policy_dump.tot_owd_premium , motor_commercial_policy_dump.tot_owd_addon_premium , motor_commercial_policy_dump.tot_btp_premium , motor_commercial_policy_dump.tot_other_tp_premium  , motor_commercial_policy_dump.tot_premium , motor_commercial_policy_dump.tot_owd_cgst_rate  , motor_commercial_policy_dump.tot_owd_sgst_rate  , motor_commercial_policy_dump.tot_owd_addon_cgst_rate  , motor_commercial_policy_dump.tot_owd_addon_sgst_rate , motor_commercial_policy_dump.tot_btp_cgst_rate , motor_commercial_policy_dump.tot_btp_sgst_rate , motor_commercial_policy_dump.tot_other_tp_cgst_rate , motor_commercial_policy_dump.tot_other_tp_sgst_rate , motor_commercial_policy_dump.tot_owd_gst , motor_commercial_policy_dump.tot_owd_addon_gst , motor_commercial_policy_dump.tot_btp_gst , motor_commercial_policy_dump.tot_other_tp_gst , motor_commercial_policy_dump.tot_gst_amt , motor_commercial_policy_dump.tot_owd_final , motor_commercial_policy_dump.tot_owd_addon_final , motor_commercial_policy_dump.tot_btp_final , motor_commercial_policy_dump.tot_other_tp_final , motor_commercial_policy_dump.tot_final_premium , motor_commercial_policy_dump.tot_payable_premium , motor_commercial_policy_dump.commercial_policy_status , motor_commercial_policy_dump.commercial_policy_del_flag ", $whereArr = $whereArr_motor_commercial_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$motor_commercial_policy_list = $query["userData"];
			}
			$result["motor_commercial_policy_data_arr"] = $motor_commercial_policy_list;

			// print_r(($result));
			// die();
			$member_list = array();
			if ($result["fk_client_id"] != "") {
				$whereArr_data["customermem_tbl.customer_id"] = $result["fk_client_id"];
				$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS name, customermem_tbl.contact, customermem_tbl.email", $whereArr = $whereArr_data, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$member_list = $query2["userData"];
			}
			$result["member_data_arr"] = $member_list;

			$department_list = array();
			if ($result["fk_company_id"] != "") {
				$joins_main_department[] = array("tbl" => "master_plans_policy", "condtn" => "master_department.department_id = master_plans_policy.fk_department_id", "type" => "left");
				$whereArr_department["master_plans_policy.fk_mcompany_id"] = $result["fk_company_id"];
				$whereArr_department["master_department.department_status"] = 1;
				$whereArr_department["master_department.del_flag"] = 1;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames = "master_department.department_id, master_department.department_name", $whereArr = $whereArr_department, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_department, $orderByArr = array("master_department.department_name" => "ASC"), $groupByArr = array("master_department.department_name"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$department_list = $query["userData"];
			}
			$result["department_data_arr"] = $department_list;

			$policy_name_list = array();
			if ($result["fk_company_id"] != "") {
				$joins_main_policy_name[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
				$whereArr_policy_name["master_policy_type.policy_type_status"] = 1;
				$whereArr_policy_name["master_policy_type.del_flag"] = 1;
				$whereArr_policy_name["master_plans_policy.plans_policy_status"] = 1;
				$whereArr_policy_name["master_plans_policy.del_flag"] = 1;
				$whereArr_policy_name["master_plans_policy.fk_mcompany_id"] = $result["fk_company_id"];
				$whereArr_policy_name["master_plans_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames = "master_policy_type.policy_type_id, master_policy_type.policy_type , master_plans_policy.fk_mcompany_id , master_plans_policy.fk_department_id , master_plans_policy.fk_policy_type_id , master_plans_policy.fk_document_id , master_plans_policy.policy_type as policy_type_tit_ind_float, master_plans_policy.policy_wording, master_plans_policy.claims_form, master_plans_policy.claims_procedure", $whereArr = $whereArr_policy_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_policy_name, $orderByArr = array("master_policy_type.policy_type_id" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$policy_name_list = $query["userData"];

				// $joins_main_policy_name[] = array("tbl" => "master_plans_policy", "condtn" => "master_policy_type.fk_department_id = master_plans_policy.fk_department_id", "type" => "left");
				// $whereArr_policy_name["master_plans_policy.fk_mcompany_id"] = $result["fk_company_id"];
				// $whereArr_policy_name["master_plans_policy.fk_department_id"] = $result["fk_department_id"];
				// $whereArr_policy_name["master_policy_type.policy_type_status"] = 1;
				// $whereArr_policy_name["master_policy_type.del_flag"] = 1;
				// $query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_type", $colNames = "master_policy_type.policy_type_id, master_policy_type.policy_type", $whereArr = $whereArr_policy_name, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main_policy_name, $orderByArr = array(), $groupByArr = array("master_policy_type.policy_type"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				// $policy_name_list = $query["userData"];
			}
			$result["policy_name_data_arr"] = $policy_name_list;

			// print_r($policy_name_list);
			// die();

			$agency_list = array();
			if ($result["fk_company_id"] != "") {
				$whereArr_agency["master_agency.fk_mcompany_id"] = $result["fk_company_id"];
				$whereArr_agency["master_agency.magency_status"] = 1;
				$whereArr_agency["master_agency.del_flag"] = 1;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.code, master_agency.name, master_agency.username, master_agency.password, master_agency.link", $whereArr = $whereArr_agency, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_agency.code"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$agency_list = $query["userData"];
			}
			$result["agency_data_arr"] = $agency_list;
			// 	print_r($result);
			// die("Test");
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

	public function updatepolicy()
	{
		$validator = array('status' => false, 'messages' => array());

		$policy_id = $this->security->xss_clean($this->input->post('policy_id'));
		$whereArr_policy_no_check["policy_member_details_dump.policy_id"] = $policy_id;
		$query_policy_no_check = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details_dump", $colNames =  "policy_member_details_dump.policy_id, policy_member_details_dump.serial_no_year, policy_member_details_dump.serial_no_month, policy_member_details_dump.serial_no, policy_member_details_dump.policy_no", $whereArr_policy_no_check, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result_policy_no_check = $query_policy_no_check["userData"];

		$current_policy_no = $result_policy_no_check["policy_no"];
		$updated_policy_no = $this->input->post("policy_no");

		$this->form_validation->set_rules('serial_no_year', 'Sr No. Year', 'trim|required');
		$this->form_validation->set_rules('serial_no_month', 'Sr No. Month', 'trim|required');
		$this->form_validation->set_rules('serial_no', 'Sr No.', 'trim|required');
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('agency_code', 'Agency Code', 'trim|required');
		$this->form_validation->set_rules('sub_agency_code', 'Sub-Agency Code', 'trim|required');
		$this->form_validation->set_rules('mode_of_premimum', 'Mode Of Premium', 'trim|required');
		$this->form_validation->set_rules('date_from', 'Date From', 'trim|required');
		$this->form_validation->set_rules('date_to', 'Date To', 'trim|required');
		$this->form_validation->set_rules('payment_date_from', 'Payment Date From', 'trim');
		$this->form_validation->set_rules('payment_date_to', 'Payment Date To', 'trim');
		// $this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|required');
		$this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
		$this->form_validation->set_rules('policy_holder_name', 'Policy Holder Name', 'trim|required');
		$this->form_validation->set_rules('date_commenced', 'Date Commenced', 'trim|required');
		$this->form_validation->set_rules('policy_upload', 'Policy Upload', 'trim');
		$this->form_validation->set_rules('reg_mobile', 'Registered Mobile No.', 'trim|required|min_length[10]|max_length[12]');
		$this->form_validation->set_rules('reg_email', 'Registered Email Id', 'trim|required|valid_email');
		if ($current_policy_no != $updated_policy_no)
			$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|callback_check_policy_no_isexist');
		else
			$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim');

		if (!empty($_FILES["policy_upload"])) {
			$policy_upload = $_FILES['policy_upload']['name'];

			if (!empty($policy_upload)) {
				if ($current_policy_no != $updated_policy_no)
					$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|required|callback_check_policy_no|callback_check_policy_no_isexist');
				else
					$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|required|callback_check_policy_no');
			} else {
				if ($current_policy_no != $updated_policy_no)
					$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|callback_check_policy_no_isexist');
				else
					$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim');
			}
		}
		if (!empty($this->input->post("policy_upload_hidden"))) {
			if (!empty($this->input->post("policy_upload_hidden"))) {
				if ($current_policy_no != $updated_policy_no)
					$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|required|callback_check_policy_no|callback_check_policy_no_isexist');
				else
					$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|required|callback_check_policy_no');
			} else {
				if ($current_policy_no != $updated_policy_no)
					$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim|callback_check_policy_no_isexist');
				else
					$this->form_validation->set_rules('policy_no', 'Policy No.', 'trim');
			}
		}

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"serial_no_year_err" => form_error("serial_no_year"),
				"serial_no_month_err" => form_error("serial_no_month"),
				"serial_no_err" => form_error("serial_no"),
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"agency_code_err" => form_error("agency_code"),
				"sub_agency_code_err" => form_error("sub_agency_code"),
				"mode_of_premimum_err" => form_error("mode_of_premimum"),
				"date_from_err" => form_error("date_from"),
				"date_to_err" => form_error("date_to"),
				"payment_date_from_err" => form_error("payment_date_from"),
				"payment_date_to_err" => form_error("payment_date_to"),
				"policy_no_err" => form_error("policy_no"),
				"group_name_err" => form_error("group_name"),
				"policy_holder_name_err" => form_error("policy_holder_name"),
				"date_commenced_err" => form_error("date_commenced"),
				"policy_upload_err" => form_error("policy_upload"),
				"reg_mobile_err" => form_error("reg_mobile"),
				"reg_email_err" => form_error("reg_email"),
			);
		} else {
			// die();
			$this->db->trans_start();	//Start Transaction
			if ($this->input->post() != "") {
				$policy_file_name = "";
				$policy_upload_file_name = "";
				$current_sum_insured = 0;
				$current_total_premium = 0;

				$policy_id = $this->security->xss_clean($this->input->post('policy_id'));
				$serial_no_year = $this->security->xss_clean($this->input->post('serial_no_year'));
				$serial_no_month = $this->security->xss_clean($this->input->post('serial_no_month'));
				$serial_no = $this->security->xss_clean($this->input->post('serial_no'));
				$company = $this->security->xss_clean($this->input->post('company'));
				$company_txt = $this->security->xss_clean($this->input->post('company_txt'));
				$department = $this->security->xss_clean($this->input->post('department'));
				$policy_name = $this->security->xss_clean($this->input->post('policy_name'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));
				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				$agency_code = $this->security->xss_clean($this->input->post('agency_code'));
				$sub_agency_code = $this->security->xss_clean($this->input->post('sub_agency_code'));
				$mode_of_premimum = $this->security->xss_clean($this->input->post('mode_of_premimum'));
				$date_from = $this->security->xss_clean($this->input->post('date_from'));

				$date_to = $this->security->xss_clean($this->input->post('date_to'));
				$payment_date_from = $this->security->xss_clean($this->input->post('payment_date_from'));
				$payment_date_to = $this->security->xss_clean($this->input->post('payment_date_to'));
				$policy_no = $this->security->xss_clean($this->input->post('policy_no'));
				$pre_year_policy_no = $this->security->xss_clean($this->input->post('pre_year_policy_no'));
				$group_name = $this->security->xss_clean($this->input->post('group_name'));
				$policy_holder_name = $this->security->xss_clean($this->input->post('policy_holder_name'));
				$date_commenced = $this->security->xss_clean($this->input->post('date_commenced'));
				// $policy_upload = $this->security->xss_clean($this->input->post('policy_upload'));
				$reg_mobile = $this->security->xss_clean($this->input->post('reg_mobile'));
				$reg_email = $this->security->xss_clean($this->input->post('reg_email'));
				$policy_counter_no = $this->security->xss_clean($this->input->post('policy_counter_no'));

				$riv = $this->security->xss_clean($this->input->post('riv'));
				$type_of_bussiness = $this->security->xss_clean($this->input->post('type_of_bussiness'));
				$description_of_stock = $this->security->xss_clean($this->input->post('description_of_stock'));
				$quotation_date = $this->security->xss_clean($this->input->post('quotation_date'));
				$quotation_male_link = $this->security->xss_clean($this->input->post('quotation_male_link'));
				$member_name_arr = $this->security->xss_clean($this->input->post('member_name_arr'));
				$total_basic_sum_insured = $this->security->xss_clean($this->input->post('total_basic_sum_insured'));
				$current_sum_insured = $total_basic_sum_insured;

				$policy_type_txt = "";
				if ($policy_type == 2)
					$policy_type_txt = "Floater";
				elseif ($policy_type == 1)
					$policy_type_txt = "Individual";
				elseif ($policy_type == 3)
					$policy_type_txt = "Residential & Commercial";
				elseif ($policy_type == 4)
					$policy_type_txt = "Common Individual";
				elseif ($policy_type == 5)
					$policy_type_txt = "Common Floater";

				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") {
					$family_size = $this->security->xss_clean($this->input->post('family_size'));
					$addition_of_more_child = $this->security->xss_clean($this->input->post('addition_of_more_child'));
				} else {
					$family_size = "";
					$addition_of_more_child = "";
				}
				$tpa_company = "";
				$restore_cover = "";
				$maternity_new_born_baby_cover = "";
				$daily_cash_allowance_cover = "";
				$floater_policy_type = "";
				// Calculation Section Start

				$total_sum_assured = $this->security->xss_clean($this->input->post('total_sum_assured'));
				$fire_rate_per = $this->security->xss_clean($this->input->post('fire_rate_per'));
				$fire_rate_tot = $this->security->xss_clean($this->input->post('fire_rate_tot'));
				$less_discount_per = $this->security->xss_clean($this->input->post('less_discount_per'));
				$less_discount_tot = $this->security->xss_clean($this->input->post('less_discount_tot'));
				$fire_rate_after_discount_tot = $this->security->xss_clean($this->input->post('fire_rate_after_discount_tot'));
				$gross_premium = $this->security->xss_clean($this->input->post('gross_premium'));
				$cgst_fire_per = $this->security->xss_clean($this->input->post('cgst_fire_per'));
				$cgst_fire_tot = $this->security->xss_clean($this->input->post('cgst_fire_tot'));
				$sgst_fire_per = $this->security->xss_clean($this->input->post('sgst_fire_per'));
				$sgst_fire_tot = $this->security->xss_clean($this->input->post('sgst_fire_tot'));
				$final_paybal_premium = $this->security->xss_clean($this->input->post('final_paybal_premium'));
				$sookshma_fire_policy_id = $this->security->xss_clean($this->input->post('sookshma_fire_policy_id'));
				$laghu_fire_policy_id = $this->security->xss_clean($this->input->post('laghu_fire_policy_id'));
				$griharaksha_fire_policy_id = $this->security->xss_clean($this->input->post('griharaksha_fire_policy_id'));
				$burglary_policy_id = $this->security->xss_clean($this->input->post('burglary_policy_id'));
				$fire_allied_perils_policy_id = $this->security->xss_clean($this->input->post('fire_allied_perils_policy_id'));
				$other_policy_id = $this->security->xss_clean($this->input->post('other_policy_id'));
				$fire_rc_policy_id = $this->security->xss_clean($this->input->post('fire_rc_policy_id'));

				if ($policy_name_txt == "Bharat Griha Raksha" || $policy_name_txt == "Bharat Laghu Udyam" || $policy_name_txt == "Bharat Sookshma Udyam" || $policy_name_txt == "Standard Fire & Allied Perils") {
					$current_sum_insured = $total_sum_assured;
					$current_total_premium = $final_paybal_premium;
				}

				// $fetch_whereArr["master_plans_policy.fk_mcompany_id"] = $company;
				// $fetch_whereArr["master_plans_policy.fk_department_id"] = $department;
				// $fetch_whereArr["master_plans_policy.fk_policy_type_id"] = $policy_name;
				// $fetch_query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy", $colNames = "master_plans_policy.plans_policy_id , master_plans_policy.comission_percentage", $whereArr = $fetch_whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				// $fetch_commission_result = $fetch_query["userData"];
				// $comission_percentage = $fetch_commission_result["comission_percentage"];

				// if (empty($comission_percentage))
				// 	$comission_percentage = 0;

				// if ($policy_name_txt == "Standard Fire & Allied Perils") {
				$stfi_rate_per = $this->security->xss_clean($this->input->post('stfi_rate_per'));
				$stfi_rate_total = $this->security->xss_clean($this->input->post('stfi_rate_total'));
				$earthquake_rate_per = $this->security->xss_clean($this->input->post('earthquake_rate_per'));
				$earthquake_rate_total = $this->security->xss_clean($this->input->post('earthquake_rate_total'));
				$terrorisum_rate_per = $this->security->xss_clean($this->input->post('terrorisum_rate_per'));
				$terrorisum_rate_total = $this->security->xss_clean($this->input->post('terrorisum_rate_total'));
				$tot_sum_devid = $this->security->xss_clean($this->input->post('tot_sum_devid'));
				// }

				if ($policy_name_txt == "Term Plan") {
					$policy_term = $this->security->xss_clean($this->input->post('policy_term'));
					$premium_paying_term = $this->security->xss_clean($this->input->post('premium_paying_term'));
					$sum_insured = $this->security->xss_clean($this->input->post('sum_insured'));
					$basic_premium = $this->security->xss_clean($this->input->post('basic_premium'));
					$add_loading = $this->security->xss_clean($this->input->post('add_loading'));
					$loading_description = $this->security->xss_clean($this->input->post('loading_description'));
					$premium_after_loading = $this->security->xss_clean($this->input->post('premium_after_loading'));
					$cgst_term_plan = $this->security->xss_clean($this->input->post('cgst_term_plan'));
					$sgst_term_plan = $this->security->xss_clean($this->input->post('sgst_term_plan'));
					$cgst_term_plan_tot = $this->security->xss_clean($this->input->post('cgst_term_plan_tot'));
					$sgst_term_plan_tot = $this->security->xss_clean($this->input->post('sgst_term_plan_tot'));
					$term_plan_final_paybal_premium = $this->security->xss_clean($this->input->post('term_plan_final_paybal_premium'));
					$term_plan_policy_id = $this->security->xss_clean($this->input->post('term_plan_policy_id'));
					$current_sum_insured = $sum_insured;
					$current_total_premium = $term_plan_final_paybal_premium;
				}

				if ($policy_name_txt == "Shopkeeper") {
					// Srction 1
					$shopkeeper_risk_address = $this->security->xss_clean($this->input->post('shopkeeper_risk_address'));
					$fire_sum_insured_1 = $this->security->xss_clean($this->input->post('fire_sum_insured_1'));
					$fire_sum_insured_2 = $this->security->xss_clean($this->input->post('fire_sum_insured_2'));
					$fire_sum_insured_3 = $this->security->xss_clean($this->input->post('fire_sum_insured_3'));
					$fire_rate_1 = $this->security->xss_clean($this->input->post('fire_rate_1'));
					$fire_rate_2 = $this->security->xss_clean($this->input->post('fire_rate_2'));
					$fire_rate_3 = $this->security->xss_clean($this->input->post('fire_rate_3'));
					$fire_premium_1 = $this->security->xss_clean($this->input->post('fire_premium_1'));
					$fire_premium_2 = $this->security->xss_clean($this->input->post('fire_premium_2'));
					$fire_premium_3 = $this->security->xss_clean($this->input->post('fire_premium_3'));

					// Section 2
					$burglary_sum_insured_1 = $this->security->xss_clean($this->input->post('burglary_sum_insured_1'));
					$burglary_sum_insured_2 = $this->security->xss_clean($this->input->post('burglary_sum_insured_2'));
					$burglary_sum_insured_3 = $this->security->xss_clean($this->input->post('burglary_sum_insured_3'));
					$burglary_rate_1 = $this->security->xss_clean($this->input->post('burglary_rate_1'));
					$burglary_rate_2 = $this->security->xss_clean($this->input->post('burglary_rate_2'));
					$burglary_rate_3 = $this->security->xss_clean($this->input->post('burglary_rate_3'));
					$burglary_premium_1 = $this->security->xss_clean($this->input->post('burglary_premium_1'));
					$burglary_premium_2 = $this->security->xss_clean($this->input->post('burglary_premium_2'));
					$burglary_premium_3 = $this->security->xss_clean($this->input->post('burglary_premium_3'));

					// Section 3
					$money_insu_sum_insured_1 = $this->security->xss_clean($this->input->post('money_insu_sum_insured_1'));
					$money_insu_sum_insured_2 = $this->security->xss_clean($this->input->post('money_insu_sum_insured_2'));
					$money_insu_sum_insured_3 = $this->security->xss_clean($this->input->post('money_insu_sum_insured_3'));
					$money_insu_rate_1 = $this->security->xss_clean($this->input->post('money_insu_rate_1'));
					$money_insu_rate_2 = $this->security->xss_clean($this->input->post('money_insu_rate_2'));
					$money_insu_rate_3 = $this->security->xss_clean($this->input->post('money_insu_rate_3'));
					$money_insu_premium_1 = $this->security->xss_clean($this->input->post('money_insu_premium_1'));
					$money_insu_premium_2 = $this->security->xss_clean($this->input->post('money_insu_premium_2'));
					$money_insu_premium_3 = $this->security->xss_clean($this->input->post('money_insu_premium_3'));

					// Section 5
					$plate_glass_sum_insured = $this->security->xss_clean($this->input->post('plate_glass_sum_insured'));
					$plate_glass_rate_per = $this->security->xss_clean($this->input->post('plate_glass_rate_per'));
					$plate_glass_premium = $this->security->xss_clean($this->input->post('plate_glass_premium'));

					// Section 6
					$neon_glow_sum_insured = $this->security->xss_clean($this->input->post('neon_glow_sum_insured'));
					$neon_glow_rate_per = $this->security->xss_clean($this->input->post('neon_glow_rate_per'));
					$neon_glow_premium = $this->security->xss_clean($this->input->post('neon_glow_premium'));

					// Section 7
					$baggage_ins_sum_insured = $this->security->xss_clean($this->input->post('baggage_ins_sum_insured'));
					$baggage_ins_rate_per = $this->security->xss_clean($this->input->post('baggage_ins_rate_per'));
					$baggage_ins_premium = $this->security->xss_clean($this->input->post('baggage_ins_premium'));

					// Section 8
					$personal_accident_sum_insured = $this->security->xss_clean($this->input->post('personal_accident_sum_insured'));
					$personal_accident_rate_per = $this->security->xss_clean($this->input->post('personal_accident_rate_per'));
					$personal_accident_premium = $this->security->xss_clean($this->input->post('personal_accident_premium'));
					$total_personal_accident = $this->security->xss_clean($this->input->post('total_personal_accident'));

					// Section 9
					$fidelity_gaur_sum_insured = $this->security->xss_clean($this->input->post('fidelity_gaur_sum_insured'));
					$fidelity_gaur_rate_per = $this->security->xss_clean($this->input->post('fidelity_gaur_rate_per'));
					$fidelity_gaur_premium = $this->security->xss_clean($this->input->post('fidelity_gaur_premium'));
					$total_fidelity_gaur = $this->security->xss_clean($this->input->post('total_fidelity_gaur'));

					// Section 10
					$pub_libility_sum_insured = $this->security->xss_clean($this->input->post('pub_libility_sum_insured'));
					$work_men_compens_sum_insured = $this->security->xss_clean($this->input->post('work_men_compens_sum_insured'));
					$pub_libility_rate = $this->security->xss_clean($this->input->post('pub_libility_rate'));
					$work_men_compens_rate = $this->security->xss_clean($this->input->post('work_men_compens_rate'));
					$pub_libility_premium = $this->security->xss_clean($this->input->post('pub_libility_premium'));
					$work_men_compens_premium = $this->security->xss_clean($this->input->post('work_men_compens_premium'));

					// Section 11
					$bus_inter_sum_insured_1 = $this->security->xss_clean($this->input->post('bus_inter_sum_insured_1'));
					$bus_inter_sum_insured_2 = $this->security->xss_clean($this->input->post('bus_inter_sum_insured_2'));
					$bus_inter_sum_insured_3 = $this->security->xss_clean($this->input->post('bus_inter_sum_insured_3'));
					$bus_inter_rate_1 = $this->security->xss_clean($this->input->post('bus_inter_rate_1'));
					$bus_inter_rate_2 = $this->security->xss_clean($this->input->post('bus_inter_rate_2'));
					$bus_inter_rate_3 = $this->security->xss_clean($this->input->post('bus_inter_rate_3'));
					$bus_inter_premium_1 = $this->security->xss_clean($this->input->post('bus_inter_premium_1'));
					$bus_inter_premium_2 = $this->security->xss_clean($this->input->post('bus_inter_premium_2'));
					$bus_inter_premium_3 = $this->security->xss_clean($this->input->post('bus_inter_premium_3'));

					$shopkeeper_total_sum_assured = $this->security->xss_clean($this->input->post('shopkeeper_total_sum_assured'));
					$shopkeeper_total_premium = $this->security->xss_clean($this->input->post('shopkeeper_total_premium'));
					$shopkeeper_less_discount_per = $this->security->xss_clean($this->input->post('shopkeeper_less_discount_per'));
					$shopkeeper_less_discount_tot = $this->security->xss_clean($this->input->post('shopkeeper_less_discount_tot'));
					$shopkeeper_fire_rate_after_discount_tot = $this->security->xss_clean($this->input->post('shopkeeper_fire_rate_after_discount_tot'));
					$shopkeeper_cgst_fire_per = $this->security->xss_clean($this->input->post('shopkeeper_cgst_fire_per'));
					$shopkeeper_cgst_fire_tot = $this->security->xss_clean($this->input->post('shopkeeper_cgst_fire_tot'));
					$shopkeeper_sgst_fire_per = $this->security->xss_clean($this->input->post('shopkeeper_sgst_fire_per'));
					$shopkeeper_sgst_fire_tot = $this->security->xss_clean($this->input->post('shopkeeper_sgst_fire_tot'));
					$shopkeeper_final_paybal_premium = $this->security->xss_clean($this->input->post('shopkeeper_final_paybal_premium'));
					$shopkeeper_policy_id = $this->security->xss_clean($this->input->post('shopkeeper_policy_id'));

					$current_sum_insured = $shopkeeper_total_sum_assured;
					$current_total_premium = $shopkeeper_final_paybal_premium;
				}

				if ($policy_name_txt == "Jweller Block") {
					// Srction 1
					$stock_premises_sum_insu_1 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_1'));
					$stock_premises_sum_insu_2 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_2'));
					$stock_premises_sum_insu_3 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_3'));
					$stock_premises_sum_insu_4 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_4'));
					$stock_premises_sum_insu_5 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_5'));
					$stock_premises_sum_insu_6 = $this->security->xss_clean($this->input->post('stock_premises_sum_insu_6'));
					$stock_premises_premium_1 = $this->security->xss_clean($this->input->post('stock_premises_premium_1'));
					$stock_premises_premium_2 = $this->security->xss_clean($this->input->post('stock_premises_premium_2'));

					// Section 2
					$stock_custody_sum_insu_1 = $this->security->xss_clean($this->input->post('stock_custody_sum_insu_1'));
					$stock_custody_sum_insu_2 = $this->security->xss_clean($this->input->post('stock_custody_sum_insu_2'));
					$stock_custody_sum_insu_3 = $this->security->xss_clean($this->input->post('stock_custody_sum_insu_3'));
					$stock_custody_sum_insu_4 = $this->security->xss_clean($this->input->post('stock_custody_sum_insu_4'));
					$stock_custody_premium_1 = $this->security->xss_clean($this->input->post('stock_custody_premium_1'));
					$stock_custody_premium_2 = $this->security->xss_clean($this->input->post('stock_custody_premium_2'));

					// Section 3
					$stock_transit_sum_insu_1 = $this->security->xss_clean($this->input->post('stock_transit_sum_insu_1'));
					$stock_transit_sum_insu_2 = $this->security->xss_clean($this->input->post('stock_transit_sum_insu_2'));
					$stock_transit_sum_insu_3 = $this->security->xss_clean($this->input->post('stock_transit_sum_insu_3'));
					$stock_transit_sum_insu_4 = $this->security->xss_clean($this->input->post('stock_transit_sum_insu_4'));
					$stock_transit_premium = $this->security->xss_clean($this->input->post('stock_transit_premium'));

					// Section 4A
					$standard_fire_perils_1 = $this->security->xss_clean($this->input->post('standard_fire_perils_1'));
					$standard_fire_perils_2 = $this->security->xss_clean($this->input->post('standard_fire_perils_2'));
					$standard_fire_perils_3 = $this->security->xss_clean($this->input->post('standard_fire_perils_3'));
					$standard_fire_perils_4 = $this->security->xss_clean($this->input->post('standard_fire_perils_4'));
					$standard_fire_perils_5 = $this->security->xss_clean($this->input->post('standard_fire_perils_5'));
					$standard_fire_perils_6 = $this->security->xss_clean($this->input->post('standard_fire_perils_6'));
					$standard_fire_perils_premium_1 = $this->security->xss_clean($this->input->post('standard_fire_perils_premium_1'));
					$standard_fire_perils_premium_2 = $this->security->xss_clean($this->input->post('standard_fire_perils_premium_2'));
					$standard_fire_perils_premium_3 = $this->security->xss_clean($this->input->post('standard_fire_perils_premium_3'));

					// Section 4B
					$content_burglary_sum_insu = $this->security->xss_clean($this->input->post('content_burglary_sum_insu'));
					$content_burglary_premium = $this->security->xss_clean($this->input->post('content_burglary_premium'));

					// Section 5
					$stock_exhibition_sum_insu = $this->security->xss_clean($this->input->post('stock_exhibition_sum_insu'));
					$stock_exhibition_premium = $this->security->xss_clean($this->input->post('stock_exhibition_premium'));

					// Section 6
					$fidelity_guar_cover_sum_insu_1 = $this->security->xss_clean($this->input->post('fidelity_guar_cover_sum_insu_1'));
					// $fidelity_guar_cover_sum_insu_2 = $this->security->xss_clean($this->input->post('fidelity_guar_cover_sum_insu_2'));
					$fidelity_guar_cover_premium_1 = $this->security->xss_clean($this->input->post('fidelity_guar_cover_premium_1'));
					// $fidelity_guar_cover_premium_2 = $this->security->xss_clean($this->input->post('fidelity_guar_cover_premium_2'));
					$total_fidelity_guar_cover = $this->security->xss_clean($this->input->post('total_fidelity_guar_cover'));

					// Section 7
					$plate_glass_sum_insu = $this->security->xss_clean($this->input->post('plate_glass_sum_insu'));
					$jweller_plate_glass_premium = $this->security->xss_clean($this->input->post('plate_glass_premium'));

					// Section 8
					$neon_sign_sum_insu = $this->security->xss_clean($this->input->post('neon_sign_sum_insu'));
					$neon_sign_premium = $this->security->xss_clean($this->input->post('neon_sign_premium'));

					// Section 9
					$portable_equipmets_sum_insu = $this->security->xss_clean($this->input->post('portable_equipmets_sum_insu'));
					$portable_equipmets_premium = $this->security->xss_clean($this->input->post('portable_equipmets_premium'));

					// Section 10
					$employee_compensation_sum_insu_1 = $this->security->xss_clean($this->input->post('employee_compensation_sum_insu_1'));
					$employee_compensation_sum_insu_2 = $this->security->xss_clean($this->input->post('employee_compensation_sum_insu_2'));
					$employee_compensation_premium = $this->security->xss_clean($this->input->post('employee_compensation_premium'));

					// Section 11
					$electronic_equipment_sum_insu = $this->security->xss_clean($this->input->post('electronic_equipment_sum_insu'));
					$electronic_equipment_premium = $this->security->xss_clean($this->input->post('electronic_equipment_premium'));
					// Section 12
					$public_liability_sum_insu = $this->security->xss_clean($this->input->post('public_liability_sum_insu'));
					$public_liability_premium = $this->security->xss_clean($this->input->post('public_liability_premium'));
					// Section 13
					$money_transit_sum_insu = $this->security->xss_clean($this->input->post('money_transit_sum_insu'));
					$money_transit_premium = $this->security->xss_clean($this->input->post('money_transit_premium'));
					// Section 14
					$machinery_breakdown_sum_insu = $this->security->xss_clean($this->input->post('machinery_breakdown_sum_insu'));
					$machinery_breakdown_premium = $this->security->xss_clean($this->input->post('machinery_breakdown_premium'));

					$jweller_less_discount = $this->security->xss_clean($this->input->post('jweller_less_discount'));
					$jweller_total_sum_assured = $this->security->xss_clean($this->input->post('jweller_total_sum_assured'));
					$jweller_less_discount_tot = $this->security->xss_clean($this->input->post('jweller_less_discount_tot'));
					$jweller_after_discount_tot = $this->security->xss_clean($this->input->post('jweller_after_discount_tot'));
					$jweller_terrorism_per = $this->security->xss_clean($this->input->post('jweller_terrorism_per'));
					$jweller_terrorism_per_tot = $this->security->xss_clean($this->input->post('jweller_terrorism_per_tot'));
					$jweller_tot_net_premium = $this->security->xss_clean($this->input->post('jweller_tot_net_premium'));
					$jweller_cgst_per = $this->security->xss_clean($this->input->post('jweller_cgst_per'));
					$jweller_sgst_per = $this->security->xss_clean($this->input->post('jweller_sgst_per'));
					$jweller_cgst_per_tot = $this->security->xss_clean($this->input->post('jweller_cgst_per_tot'));
					$jweller_sgst_per_tot = $this->security->xss_clean($this->input->post('jweller_sgst_per_tot'));
					$jweller_final_payble = $this->security->xss_clean($this->input->post('jweller_final_payble'));
					$jweller_policy_id = $this->security->xss_clean($this->input->post('jweller_policy_id'));

					$current_sum_insured = $jweller_total_sum_assured;
					$current_total_premium = $jweller_final_payble;
				}

				if ($policy_name_txt == "Open Policy" || $policy_name_txt == "Stop Policy" || $policy_name_txt == "Specific Policy") {
					if ($policy_name_txt == "Open Policy" || $policy_name_txt == "Stop Policy") {
						$from_destination = "";
						$to_destination = "";
						// $rate_applied_per = "";
						// $rate_applied_hidden = "";
						$rate_applied_per = $this->security->xss_clean($this->input->post('rate_applied_per'));
						$rate_applied_hidden = $this->security->xss_clean($this->input->post('rate_applied_hidden'));
					} elseif ($policy_name_txt == "Specific Policy") {
						$from_destination = $this->security->xss_clean($this->input->post('from_destination'));
						$to_destination = $this->security->xss_clean($this->input->post('to_destination'));
						$rate_applied_per = $this->security->xss_clean($this->input->post('rate_applied_per'));
						$rate_applied_hidden = $this->security->xss_clean($this->input->post('rate_applied_hidden'));
					}
					$coverage_type = $this->security->xss_clean($this->input->post('coverage_type'));
					$marine_description = $this->security->xss_clean($this->input->post('marine_description'));
					$interest_insured = $this->security->xss_clean($this->input->post('interest_insured'));
					$group_name_address = $this->security->xss_clean($this->input->post('group_name_address'));
					$marine_sum_insured = $this->security->xss_clean($this->input->post('marine_sum_insured'));
					$packing_stand_customary = $this->security->xss_clean($this->input->post('packing_stand_customary'));
					$total_marine_cc = $this->security->xss_clean($this->input->post('total_marine_cc'));
					$business_description = $this->security->xss_clean($this->input->post('business_description'));
					$voyage_domestic_purchase = $this->security->xss_clean($this->input->post('voyage_domestic_purchase'));
					$voyage_international_purchase = $this->security->xss_clean($this->input->post('voyage_international_purchase'));

					$voyage_domestic_sales = $this->security->xss_clean($this->input->post('voyage_domestic_sales'));
					$voyage_export_sales = $this->security->xss_clean($this->input->post('voyage_export_sales'));
					$voyage_job_worker = $this->security->xss_clean($this->input->post('voyage_job_worker'));
					$voyage_domestic_fini_good = $this->security->xss_clean($this->input->post('voyage_domestic_fini_good'));
					$voyage_export_fini_good = $this->security->xss_clean($this->input->post('voyage_export_fini_good'));
					$voyage_domestic_purch_return = $this->security->xss_clean($this->input->post('voyage_domestic_purch_return'));
					$voyage_export_purch_return = $this->security->xss_clean($this->input->post('voyage_export_purch_return'));
					$voyage_sales_return = $this->security->xss_clean($this->input->post('voyage_sales_return'));

					$domestic_purch = $this->security->xss_clean($this->input->post('domestic_purch'));
					$international_purch = $this->security->xss_clean($this->input->post('international_purch'));
					$domestic_sale = $this->security->xss_clean($this->input->post('domestic_sale'));
					$export_sale = $this->security->xss_clean($this->input->post('export_sale'));
					$per_bottom_limit = $this->security->xss_clean($this->input->post('per_bottom_limit'));
					$per_location_limit = $this->security->xss_clean($this->input->post('per_location_limit'));
					$per_claim_excess = $this->security->xss_clean($this->input->post('per_claim_excess'));
					$declaration_sale_fig = $this->security->xss_clean($this->input->post('declaration_sale_fig'));

					$annual_turn_over = $this->security->xss_clean($this->input->post('annual_turn_over'));
					$tot_sum_insured = $this->security->xss_clean($this->input->post('tot_sum_insured'));
					$rate_applied = $this->security->xss_clean($this->input->post('rate_applied'));
					$marine_cgst_per = $this->security->xss_clean($this->input->post('marine_cgst_per'));
					$marine_sgst_per = $this->security->xss_clean($this->input->post('marine_sgst_per'));
					$cgst_rate_tot = $this->security->xss_clean($this->input->post('cgst_rate_tot'));
					$sgst_rate_tot = $this->security->xss_clean($this->input->post('sgst_rate_tot'));
					$marine_final_payble_premium = $this->security->xss_clean($this->input->post('marine_final_payble_premium'));
					$marine_policy_id = $this->security->xss_clean($this->input->post('marine_policy_id'));
					$current_sum_insured = $tot_sum_insured;
					$current_total_premium = $marine_final_payble_premium;
				}

				// if ($policy_type_txt != "Floater") {
				// 	if ($policy_name_txt == "Mediclaim") {
				// 		$total_mediclaim = $this->security->xss_clean($this->input->post('total_mediclaim'));
				// 		$medi_total_ncd_amount = $this->security->xss_clean($this->input->post('medi_total_ncd_amount'));
				// 		$medi_total_amount = $this->security->xss_clean($this->input->post('medi_total_amount'));
				// 		$medi_family_disc_rate = $this->security->xss_clean($this->input->post('medi_family_disc_rate'));
				// 		$medi_family_disc_tot = $this->security->xss_clean($this->input->post('medi_family_disc_tot'));
				// 		$medi_premium_after_fd = $this->security->xss_clean($this->input->post('medi_premium_after_fd'));
				// 		$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
				// 		$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
				// 		$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
				// 		$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
				// 		$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
				// 		$mediclaim_policy_id = $this->security->xss_clean($this->input->post('mediclaim_policy_id'));
				// 	}
				// }
				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Individual") {
					$floater_policy_type = $this->security->xss_clean($this->input->post('floater_policy_type'));
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					if ($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") {
						if ($floater_policy_type == "Optima Restore") {
							$total_medi_ind_hdfc_json_data = $this->security->xss_clean($this->input->post('total_medi_ind_hdfc_json_data'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$protect_ride_prem_tot = $this->security->xss_clean($this->input->post('protect_ride_prem_tot'));
							$hospital_daily_cash_prem_tot = $this->security->xss_clean($this->input->post('hospital_daily_cash_prem_tot'));
							$ipa_rider_prem_tot = $this->security->xss_clean($this->input->post('ipa_rider_prem_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$family_disc_per = $this->security->xss_clean($this->input->post('family_disc_per'));
							$family_disc_tot = $this->security->xss_clean($this->input->post('family_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_hdfc_ergo_health_insu_policy_id = $this->security->xss_clean($this->input->post('medi_hdfc_ergo_health_insu_policy_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Energy") {
							$total_energy_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_energy_medi_hdfc_json_data'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_hdfc_ergo_health_insu_energy_policy_id = $this->security->xss_clean($this->input->post('medi_hdfc_ergo_health_insu_energy_policy_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Health Suraksha") {
							$total_suraksha_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_suraksha_medi_hdfc_json_data'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$family_disc_per = $this->security->xss_clean($this->input->post('family_disc_per'));
							$family_disc_tot = $this->security->xss_clean($this->input->post('family_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_hdfc_ergo_health_insu_suraksha_policy_id = $this->security->xss_clean($this->input->post('medi_hdfc_ergo_health_insu_suraksha_policy_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Easy Health") {
							$total_easy_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_easy_medi_hdfc_json_data'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$protect_ride_prem_tot = $this->security->xss_clean($this->input->post('protect_ride_prem_tot'));
							$hospital_daily_cash_prem_tot = $this->security->xss_clean($this->input->post('hospital_daily_cash_prem_tot'));
							$ipa_rider_prem_tot = $this->security->xss_clean($this->input->post('ipa_rider_prem_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$family_disc_per = $this->security->xss_clean($this->input->post('family_disc_per'));
							$family_disc_tot = $this->security->xss_clean($this->input->post('family_disc_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$tot_basic_prem = $this->security->xss_clean($this->input->post('tot_basic_prem'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_hdfc_ergo_health_insu_easy_policy_id = $this->security->xss_clean($this->input->post('medi_hdfc_ergo_health_insu_easy_policy_id'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "The New India Assurance Co Ltd") {
						// print_r($floater_policy_type);
						// die();
						if ($floater_policy_type == "New India Mediclaim Policy 2017") {
							$total_the_new_india_medi_tns_hdfc_json_data = $this->security->xss_clean($this->input->post('total_the_new_india_medi_tns_hdfc_json_data'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_insu_new_india_tns_assu_ind_policy_id = $this->security->xss_clean($this->input->post('medi_insu_new_india_tns_assu_ind_policy_id'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif (($company_txt == "Max Bupa Health Insurance Co Ltd") || ($company_txt == "Niva Bupa Health Insurance Co Ltd")) {
						if ($floater_policy_type == "Reassure") {
							$total_max_bupa_medi_reassure_json_data = $this->security->xss_clean($this->input->post('total_max_bupa_medi_reassure_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$first_year_rate = $this->security->xss_clean($this->input->post('first_year_rate'));
							$second_year_rate = $this->security->xss_clean($this->input->post('second_year_rate'));
							$third_year_rate = $this->security->xss_clean($this->input->post('third_year_rate'));
							$first_year_tot = $this->security->xss_clean($this->input->post('first_year_tot'));
							$second_year_tot = $this->security->xss_clean($this->input->post('second_year_tot'));
							$third_year_tot = $this->security->xss_clean($this->input->post('third_year_tot'));
							$tot_term_disc = $this->security->xss_clean($this->input->post('tot_term_disc'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$stand_instu_rate = $this->security->xss_clean($this->input->post('stand_instu_rate'));
							$stand_instu_tot = $this->security->xss_clean($this->input->post('stand_instu_tot'));
							$doctor_disc_per = $this->security->xss_clean($this->input->post('doctor_disc_per'));
							$doctor_disc_tot = $this->security->xss_clean($this->input->post('doctor_disc_tot'));
							$family_disc_per = $this->security->xss_clean($this->input->post('family_disc_per'));
							$family_disc_tot = $this->security->xss_clean($this->input->post('family_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));

							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_max_bupa_reassure_ind_policy_id = $this->security->xss_clean($this->input->post('medi_max_bupa_reassure_ind_policy_id'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
						if ($floater_policy_type == "Red Carpet") {
							$total_star_health_red_carpet_medi_ind_json_data = $this->security->xss_clean($this->input->post('total_star_health_red_carpet_medi_ind_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_star_health_ind_policy_id = $this->security->xss_clean($this->input->post('medi_star_health_ind_policy_id'));
							$current_total_premium = $medi_final_premium;
							// print_r($floater_policy_type);
							// die();
						} else if ($floater_policy_type == "Comprehensive") {
							$total_star_health_comprehensive_medi_ind_json_data = $this->security->xss_clean($this->input->post('total_star_health_comprehensive_medi_ind_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_star_health_comp_ind_policy_id = $this->security->xss_clean($this->input->post('medi_star_health_comp_ind_policy_id'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "United India Insurance Co Ltd") {

						// print_r($floater_policy_type);
						// die("Test");
						if ($floater_policy_type == "Individual Health Insurance Policy") {
							$total_mediclaim = $this->security->xss_clean($this->input->post('total_mediclaim'));
							$medi_total_ncd_amount = $this->security->xss_clean($this->input->post('medi_total_ncd_amount'));
							$medi_total_amount = $this->security->xss_clean($this->input->post('medi_total_amount'));
							$medi_family_disc_rate = $this->security->xss_clean($this->input->post('medi_family_disc_rate'));
							$medi_family_disc_tot = $this->security->xss_clean($this->input->post('medi_family_disc_tot'));
							$medi_premium_after_fd = $this->security->xss_clean($this->input->post('medi_premium_after_fd'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$mediclaim_policy_id = $this->security->xss_clean($this->input->post('mediclaim_policy_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Floater 2020(Individual)") {
							// $restore_cover = $this->security->xss_clean($this->input->post('restore_cover'));
							// $maternity_new_born_baby_cover = $this->security->xss_clean($this->input->post('maternity_new_born_baby_cover'));
							// $daily_cash_allowance_cover = $this->security->xss_clean($this->input->post('daily_cash_allowance_cover'));

							$total_mediclaim_indi2020 = $this->security->xss_clean($this->input->post('total_mediclaim_indi2020'));
							$medi_ind_2020_total_premium = $this->security->xss_clean($this->input->post('medi_ind_2020_total_premium'));
							$medi_ind_2020_family_descount_per = $this->security->xss_clean($this->input->post('medi_ind_2020_family_descount_per'));
							$medi_ind_2020_family_descount_tot = $this->security->xss_clean($this->input->post('medi_ind_2020_family_descount_tot'));
							$medi_ind_2020_load_description = $this->security->xss_clean($this->input->post('medi_ind_2020_load_description'));
							$medi_ind_2020_load_amount = $this->security->xss_clean($this->input->post('medi_ind_2020_load_amount'));
							$medi_ind_2020_restore_cover_premium = $this->security->xss_clean($this->input->post('medi_ind_2020_restore_cover_premium'));
							$medi_ind_2020_maternity_new_bornbaby = $this->security->xss_clean($this->input->post('medi_ind_2020_maternity_new_bornbaby'));
							$medi_ind_2020_daily_cash_allow_hosp = $this->security->xss_clean($this->input->post('medi_ind_2020_daily_cash_allow_hosp'));
							$medi_ind_2020_load_gross_premium = $this->security->xss_clean($this->input->post('medi_ind_2020_load_gross_premium'));
							$new_load_gross_premium = $this->security->xss_clean($this->input->post('new_load_gross_premium'));
							$medi_ind_2020_cgst_rate = $this->security->xss_clean($this->input->post('medi_ind_2020_cgst_rate'));
							$medi_ind_2020_cgst_tot = $this->security->xss_clean($this->input->post('medi_ind_2020_cgst_tot'));
							$medi_ind_2020_sgst_rate = $this->security->xss_clean($this->input->post('medi_ind_2020_sgst_rate'));
							$medi_ind_2020_sgst_tot = $this->security->xss_clean($this->input->post('medi_ind_2020_sgst_tot'));
							$medi_ind_2020_final_premium = $this->security->xss_clean($this->input->post('medi_ind_2020_final_premium'));
							$medi_ind2020_policy_id = $this->security->xss_clean($this->input->post('medi_ind2020_policy_id'));
							$current_total_premium = $medi_ind_2020_final_premium;
						}
					} elseif ($company_txt == "Care Health Insurance Co Ltd") {
						if ($floater_policy_type == "Care Advantage") {
							$total_care_adv_ind_json_data = $this->security->xss_clean($this->input->post('total_care_adv_ind_json_data'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$care_adv_ind_id = $this->security->xss_clean($this->input->post('care_adv_ind_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Care") {
							$total_care_ind_json_data = $this->security->xss_clean($this->input->post('total_care_ind_json_data'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$care_ind_id = $this->security->xss_clean($this->input->post('care_ind_id'));
							$current_total_premium = $medi_final_premium;
						}
					}
				}

				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") {
					$floater_policy_type = $this->security->xss_clean($this->input->post('floater_policy_type'));
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					if ($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") {
						if ($floater_policy_type == "Optima Restore") {
							$total_medi_float_hdfc_json_data = $this->security->xss_clean($this->input->post('total_medi_float_hdfc_json_data'));
							$family_size = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_family_size'));
							$addition_of_more_child = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_addition_of_more_child'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$hdfc_ergo_health_insu_child_count = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count'));
							$hdfc_ergo_health_insu_child_count_first_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count_first_premium'));
							$hdfc_ergo_health_insu_child_total_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_total_premium'));
							$protect_ride_prem_tot = $this->security->xss_clean($this->input->post('protect_ride_prem_tot'));
							$hospital_daily_cash_prem_tot = $this->security->xss_clean($this->input->post('hospital_daily_cash_prem_tot'));
							$ipa_rider_prem_tot = $this->security->xss_clean($this->input->post('ipa_rider_prem_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$stay_active_benefit = $this->security->xss_clean($this->input->post('stay_active_benefit'));
							$stay_active_benefit_prem_tot = $this->security->xss_clean($this->input->post('stay_active_benefit_prem_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$medi_hdfc_ergo_health_insu_float_policy_id = $this->security->xss_clean($this->input->post('medi_hdfc_ergo_health_insu_float_policy_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Health Suraksha") {
							$total_suraksha_float_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_suraksha_float_medi_hdfc_json_data'));
							$family_size = $this->security->xss_clean($this->input->post('suraksha_float_hdfc_ergo_health_insu_family_size'));
							$addition_of_more_child = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_addition_of_more_child'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$hdfc_ergo_health_insu_child_count = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count'));
							$hdfc_ergo_health_insu_child_count_first_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count_first_premium'));
							$hdfc_ergo_health_insu_child_total_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_total_premium'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$medi_hdfc_ergo_health_float_suraksha_policy_id = $this->security->xss_clean($this->input->post('medi_hdfc_ergo_health_float_suraksha_policy_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Easy Health") {
							$family_size = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_family_size'));
							$addition_of_more_child = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_addition_of_more_child'));
							$total_easy_float_medi_hdfc_json_data = $this->security->xss_clean($this->input->post('total_easy_float_medi_hdfc_json_data'));
							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$hdfc_ergo_health_insu_child_count = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count'));
							$hdfc_ergo_health_insu_child_count_first_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_count_first_premium'));
							$hdfc_ergo_health_insu_child_total_premium = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_child_total_premium'));
							$protect_ride_prem_tot = $this->security->xss_clean($this->input->post('protect_ride_prem_tot'));
							$hospital_daily_cash_prem_tot = $this->security->xss_clean($this->input->post('hospital_daily_cash_prem_tot'));
							$ipa_rider_prem_tot = $this->security->xss_clean($this->input->post('ipa_rider_prem_tot'));
							$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
							$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
							$stay_active_benefit = $this->security->xss_clean($this->input->post('stay_active_benefit'));
							$stay_active_benefit_prem = $this->security->xss_clean($this->input->post('stay_active_benefit_prem'));
							$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
							$tot_basic_prem = $this->security->xss_clean($this->input->post('tot_basic_prem'));
							$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$medi_hdfc_ergo_health_insu_easy_float_policy_id = $this->security->xss_clean($this->input->post('medi_hdfc_ergo_health_insu_easy_float_policy_id'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "The New India Assurance Co Ltd") {
						if ($floater_policy_type == "New India Floater Mediclaim") {
							$total_the_new_india_medi_float_json_data = $this->security->xss_clean($this->input->post('total_the_new_india_medi_float_json_data'));
							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$floater_disc_rate = $this->security->xss_clean($this->input->post('floater_disc_rate'));
							$floater_disc_tot = $this->security->xss_clean($this->input->post('floater_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$medi_new_india_assu_float_policy_id = $this->security->xss_clean($this->input->post('medi_new_india_assu_float_policy_id'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif (($company_txt == "Max Bupa Health Insurance Co Ltd") || ($company_txt == "Niva Bupa Health Insurance Co Ltd")) {

						if ($floater_policy_type == "Reassure") {
							$family_size = $this->security->xss_clean($this->input->post('max_bupa_health_insu_medi_reassure_float_family_size'));
							$total_max_bupa_medi_float_reassure_json_data = $this->security->xss_clean($this->input->post('total_max_bupa_medi_float_reassure_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
							$region = $this->security->xss_clean($this->input->post('region'));
							$first_year_rate = $this->security->xss_clean($this->input->post('first_year_rate'));
							$second_year_rate = $this->security->xss_clean($this->input->post('second_year_rate'));
							$third_year_rate = $this->security->xss_clean($this->input->post('third_year_rate'));
							$first_year_tot = $this->security->xss_clean($this->input->post('first_year_tot'));
							$second_year_tot = $this->security->xss_clean($this->input->post('second_year_tot'));
							$third_year_tot = $this->security->xss_clean($this->input->post('third_year_tot'));
							$tot_term_disc = $this->security->xss_clean($this->input->post('tot_term_disc'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$stand_instu_rate = $this->security->xss_clean($this->input->post('stand_instu_rate'));
							$stand_instu_tot = $this->security->xss_clean($this->input->post('stand_instu_tot'));
							$doctor_disc_per = $this->security->xss_clean($this->input->post('doctor_disc_per'));
							$doctor_disc_tot = $this->security->xss_clean($this->input->post('doctor_disc_tot'));
							$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
							$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));

							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$medi_max_bupa_reassure_float_policy_id = $this->security->xss_clean($this->input->post('medi_max_bupa_reassure_float_policy_id'));
							$current_total_premium = $medi_final_premium;
							// print_r($floater_policy_type);
							// print_r($medi_max_bupa_reassure_float_policy_id);
							// die();
						}
					} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
						if ($floater_policy_type == "Red Carpet") {
							$family_size = $this->security->xss_clean($this->input->post('star_health_allied_insu_red_carpet_float_family_size'));
							$total_star_health_red_carpet_medi_float_json_data = $this->security->xss_clean($this->input->post('total_star_health_red_carpet_medi_float_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$medi_star_health_float_policy_id = $this->security->xss_clean($this->input->post('medi_star_health_float_policy_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Comprehensive") {
							$family_size = $this->security->xss_clean($this->input->post('star_health_allied_insu_comprehensive_float_family_size'));
							$total_star_health_comprehensive_medi_float_json_data = $this->security->xss_clean($this->input->post('total_star_health_comprehensive_medi_float_json_data'));

							$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));

							$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
							$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
							$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
							$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
							$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$medi_star_health_comp_float_policy_id = $this->security->xss_clean($this->input->post('medi_star_health_comp_float_policy_id'));
							$current_total_premium = $medi_final_premium;
						}
					} elseif ($company_txt == "United India Insurance Co Ltd") {
						if ($floater_policy_type == "Family Floater 2014") {
							$total_mediclaim_floater2014 = $this->security->xss_clean($this->input->post('total_mediclaim_floater2014'));
							$name_insured_sum_insured = $this->security->xss_clean($this->input->post('name_insured_sum_insured'));
							$name_insured_premium = $this->security->xss_clean($this->input->post('name_insured_premium'));
							$medi_float_2014_total_premium = $this->security->xss_clean($this->input->post('medi_float_2014_total_premium'));
							$medi_float_2014_child_count = $this->security->xss_clean($this->input->post('medi_float_2014_child_count'));
							$medi_float_2014_child_count_first_premium = $this->security->xss_clean($this->input->post('medi_float_2014_child_count_first_premium'));
							$medi_float_2014_child_total_premium = $this->security->xss_clean($this->input->post('medi_float_2014_child_total_premium'));
							$medi_float_2014_load_description = $this->security->xss_clean($this->input->post('medi_float_2014_load_description'));
							$medi_float_2014_load_amount = $this->security->xss_clean($this->input->post('medi_float_2014_load_amount'));
							$medi_float_2014_load_gross_premium = $this->security->xss_clean($this->input->post('medi_float_2014_load_gross_premium'));
							$medi_float_2014_cgst_rate = $this->security->xss_clean($this->input->post('medi_float_2014_cgst_rate'));
							$medi_float_2014_cgst_tot = $this->security->xss_clean($this->input->post('medi_float_2014_cgst_tot'));
							$medi_float_2014_sgst_rate = $this->security->xss_clean($this->input->post('medi_float_2014_sgst_rate'));
							$medi_float_2014_sgst_tot = $this->security->xss_clean($this->input->post('medi_float_2014_sgst_tot'));
							$medi_float_2014_final_premium = $this->security->xss_clean($this->input->post('medi_float_2014_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$medi_floater_2014_id = $this->security->xss_clean($this->input->post('medi_floater_2014_id'));
							$current_total_premium = $medi_float_2014_final_premium;
						} elseif ($floater_policy_type == "Family Floater 2020") {
							$restore_cover = $this->security->xss_clean($this->input->post('restore_cover'));
							$maternity_new_born_baby_cover = $this->security->xss_clean($this->input->post('maternity_new_born_baby_cover'));
							$daily_cash_allowance_cover = $this->security->xss_clean($this->input->post('daily_cash_allowance_cover'));

							$total_mediclaim_floater2020 = $this->security->xss_clean($this->input->post('total_mediclaim_floater2020'));
							$name_insured_sum_insured = $this->security->xss_clean($this->input->post('name_insured_sum_insured'));
							$name_insured_premium = $this->security->xss_clean($this->input->post('name_insured_premium'));
							$name_insured_ncd = $this->security->xss_clean($this->input->post('name_insured_ncd'));
							$name_insured_premium_after_ncd = $this->security->xss_clean($this->input->post('name_insured_premium_after_ncd'));
							$medi_float_2020_total_premium = $this->security->xss_clean($this->input->post('medi_float_2020_total_premium'));
							$medi_float_2020_child_count = $this->security->xss_clean($this->input->post('medi_float_2020_child_count'));
							$medi_float_2020_child_count_first_premium = $this->security->xss_clean($this->input->post('medi_float_2020_child_count_first_premium'));
							$medi_float_2020_child_total_premium = $this->security->xss_clean($this->input->post('medi_float_2020_child_total_premium'));
							$medi_float_2020_load_description = $this->security->xss_clean($this->input->post('medi_float_2020_load_description'));
							$medi_float_2020_load_amount = $this->security->xss_clean($this->input->post('medi_float_2020_load_amount'));
							$medi_float_2020_restore_cover_premium = $this->security->xss_clean($this->input->post('medi_float_2020_restore_cover_premium'));
							$medi_float_2020_maternity_new_bornbaby = $this->security->xss_clean($this->input->post('medi_float_2020_maternity_new_bornbaby'));
							$medi_float_2020_daily_cash_allow_hosp = $this->security->xss_clean($this->input->post('medi_float_2020_daily_cash_allow_hosp'));
							$medi_float_2020_load_gross_premium = $this->security->xss_clean($this->input->post('medi_float_2020_load_gross_premium'));
							$medi_float_2020_cgst_rate = $this->security->xss_clean($this->input->post('medi_float_2020_cgst_rate'));
							$medi_float_2020_cgst_tot = $this->security->xss_clean($this->input->post('medi_float_2020_cgst_tot'));
							$medi_float_2020_sgst_rate = $this->security->xss_clean($this->input->post('medi_float_2020_sgst_rate'));
							$medi_float_2020_sgst_tot = $this->security->xss_clean($this->input->post('medi_float_2020_sgst_tot'));
							$medi_float_2020_final_premium = $this->security->xss_clean($this->input->post('medi_float_2020_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$medi_floater_2020_id = $this->security->xss_clean($this->input->post('medi_floater_2020_id'));
							$current_total_premium = $medi_float_2020_final_premium;
						}
					} elseif ($company_txt == "Care Health Insurance Co Ltd") {
						if ($floater_policy_type == "Care Advantage") {
							$family_size = $this->security->xss_clean($this->input->post('care_health_insu_care_advantage_float_family_size'));
							$total_care_adv_float_json_data = $this->security->xss_clean($this->input->post('total_care_adv_float_json_data'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$care_adv_float_id = $this->security->xss_clean($this->input->post('care_adv_float_id'));
							$current_total_premium = $medi_final_premium;
						} elseif ($floater_policy_type == "Care") {
							$family_size = $this->security->xss_clean($this->input->post('care_health_insu_care_advantage_float_family_size'));
							$total_care_float_json_data = $this->security->xss_clean($this->input->post('total_care_float_json_data'));
							$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
							$max_age = $this->security->xss_clean($this->input->post('max_age'));
							$care_float_id = $this->security->xss_clean($this->input->post('care_float_id'));
							$current_total_premium = $medi_final_premium;
						}
					}
					// print_r($medi_floater_2014_id);
					// die("di");
				}

				if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater")) {
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Floater") {

						$family_size = $this->security->xss_clean($this->input->post('hdfc_ergo_health_insu_supertopup_float_family_size'));
						$tot_supertopup_float_hdfc_json = $this->security->xss_clean($this->input->post('tot_supertopup_float_hdfc_json'));
						$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
						$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
						$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
						$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
						$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
						$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$max_age = $this->security->xss_clean($this->input->post('max_age'));
						$supertopup_float_policy_id = $this->security->xss_clean($this->input->post('supertopup_float_policy_id'));
						$current_total_premium = $medi_final_premium;
					} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Floater") {
						$total_the_new_india_supertopup_ind_json_data = $this->security->xss_clean($this->input->post('total_the_new_india_supertopup_ind_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$the_new_india_supertopup_assu_ind_policy_id = $this->security->xss_clean($this->input->post('the_new_india_supertopup_assu_ind_policy_id'));
						$current_total_premium = $medi_final_premium;
					} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Floater") {
						$family_size = $this->security->xss_clean($this->input->post('star_health_allied_insu_supertopup_float_family_size'));
						$total_star_health_supertopup_float_json_data = $this->security->xss_clean($this->input->post('total_star_health_supertopup_float_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$max_age = $this->security->xss_clean($this->input->post('max_age'));
						$medi_star_health_super_float_policy_id = $this->security->xss_clean($this->input->post('medi_star_health_super_float_policy_id'));
						$current_total_premium = $medi_final_premium;
					} else {
						$family_size = $this->security->xss_clean($this->input->post('family_size'));

						$tot_supertopup_floater_json = $this->security->xss_clean($this->input->post('tot_supertopup_floater_json'));
						$name_insured_policy_option = $this->security->xss_clean($this->input->post('name_insured_policy_option'));
						$name_insured_deductable_thershold = $this->security->xss_clean($this->input->post('name_insured_deductable_thershold'));
						$name_insured_sum_insured = $this->security->xss_clean($this->input->post('name_insured_sum_insured'));
						$name_insured_premium = $this->security->xss_clean($this->input->post('name_insured_premium'));
						$supertopup_floater_total_premium = $this->security->xss_clean($this->input->post('supertopup_floater_total_premium'));
						$supertopup_floater_description = $this->security->xss_clean($this->input->post('supertopup_floater_description'));
						$supertopup_floater_load_amount = $this->security->xss_clean($this->input->post('supertopup_floater_load_amount'));
						$supertopup_floater_load_gross_premium = $this->security->xss_clean($this->input->post('supertopup_floater_load_gross_premium'));
						$supertopup_floater_cgst_rate = $this->security->xss_clean($this->input->post('supertopup_floater_cgst_rate'));
						$supertopup_floater_cgst_tot = $this->security->xss_clean($this->input->post('supertopup_floater_cgst_tot'));
						$supertopup_floater_sgst_rate = $this->security->xss_clean($this->input->post('supertopup_floater_sgst_rate'));
						$supertopup_floater_sgst_tot = $this->security->xss_clean($this->input->post('supertopup_floater_sgst_tot'));
						$supertopup_floater_final_premium = $this->security->xss_clean($this->input->post('supertopup_floater_final_premium'));
						$max_age = $this->security->xss_clean($this->input->post('max_age'));
						$supertopup_floater_policy_id = $this->security->xss_clean($this->input->post('supertopup_floater_policy_id'));
						$current_total_premium = $supertopup_floater_final_premium;
					}
				}
				if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual")) {
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Individual") {
						$tot_supertopup_ind_hdfc_json = $this->security->xss_clean($this->input->post('tot_supertopup_ind_hdfc_json'));
						$years_of_premium = $this->security->xss_clean($this->input->post('years_of_premium'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$load_desc = $this->security->xss_clean($this->input->post('load_desc'));
						$load_tot = $this->security->xss_clean($this->input->post('load_tot'));
						$less_disc_per = $this->security->xss_clean($this->input->post('less_disc_per'));
						$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
						$gross_premium_tot = $this->security->xss_clean($this->input->post('gross_premium_tot'));
						$gross_premium_tot_new = $this->security->xss_clean($this->input->post('gross_premium_tot_new'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$supertopup_ind_policy_id = $this->security->xss_clean($this->input->post('supertopup_ind_policy_id'));
						$current_total_premium = $medi_final_premium;
					} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Individual") {
						$total_the_new_india_supertopup_ind_single_json_data = $this->security->xss_clean($this->input->post('total_the_new_india_supertopup_ind_single_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$the_new_india_supertopup_assu_ind_single_policy_id = $this->security->xss_clean($this->input->post('the_new_india_supertopup_assu_ind_single_policy_id'));
						$current_total_premium = $medi_final_premium;
					} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Individual") {
						$total_star_health_supertopup_ind_json_data = $this->security->xss_clean($this->input->post('total_star_health_supertopup_ind_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$medi_star_health_super_ind_policy_id = $this->security->xss_clean($this->input->post('medi_star_health_super_ind_policy_id'));
						$current_total_premium = $medi_final_premium;
					} else {
						$tot_supertopup_ind_json = $this->security->xss_clean($this->input->post('tot_supertopup_ind_json'));
						$supertopup_ind_total_premium = $this->security->xss_clean($this->input->post('supertopup_ind_total_premium'));
						$supertopup_ind_description = $this->security->xss_clean($this->input->post('supertopup_ind_description'));
						$supertopup_ind_load_amount = $this->security->xss_clean($this->input->post('supertopup_ind_load_amount'));
						$supertopup_ind_load_gross_premium = $this->security->xss_clean($this->input->post('supertopup_ind_load_gross_premium'));
						$supertopup_ind_cgst_rate = $this->security->xss_clean($this->input->post('supertopup_ind_cgst_rate'));
						$supertopup_ind_cgst_tot = $this->security->xss_clean($this->input->post('supertopup_ind_cgst_tot'));
						$supertopup_ind_sgst_rate = $this->security->xss_clean($this->input->post('supertopup_ind_sgst_rate'));
						$supertopup_ind_sgst_tot = $this->security->xss_clean($this->input->post('supertopup_ind_sgst_tot'));
						$supertopup_ind_final_premium = $this->security->xss_clean($this->input->post('supertopup_ind_final_premium'));
						$supertopup_ind_policy_id = $this->security->xss_clean($this->input->post('supertopup_ind_policy_id'));
						$current_total_premium = $supertopup_ind_final_premium;
					}
				}

				// if ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Common Individual") {
				// 	$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
				// 	$tot_commind_json_data = $this->security->xss_clean($this->input->post('tot_commind_json_data'));
				// 	$comm_ind_total_amount = $this->security->xss_clean($this->input->post('comm_ind_total_amount'));
				// 	$comm_ind_less_discount_rate = $this->security->xss_clean($this->input->post('comm_ind_less_discount_rate'));
				// 	$comm_ind_less_discount_tot = $this->security->xss_clean($this->input->post('comm_ind_less_discount_tot'));
				// 	$comm_ind_load_desc = $this->security->xss_clean($this->input->post('comm_ind_load_desc'));
				// 	$comm_ind_load_tot = $this->security->xss_clean($this->input->post('comm_ind_load_tot'));
				// 	$comm_ind_gross_premium = $this->security->xss_clean($this->input->post('comm_ind_gross_premium'));
				// 	$comm_ind_gross_premium_new = $this->security->xss_clean($this->input->post('comm_ind_gross_premium_new'));
				// 	$comm_ind_cgst_rate = $this->security->xss_clean($this->input->post('comm_ind_cgst_rate'));
				// 	$comm_ind_cgst_tot = $this->security->xss_clean($this->input->post('comm_ind_cgst_tot'));
				// 	$comm_ind_sgst_rate = $this->security->xss_clean($this->input->post('comm_ind_sgst_rate'));
				// 	$comm_ind_sgst_tot = $this->security->xss_clean($this->input->post('comm_ind_sgst_tot'));
				// 	$comm_ind_final_premium = $this->security->xss_clean($this->input->post('comm_ind_final_premium'));
				// 	$common_ind_policy_id = $this->security->xss_clean($this->input->post('common_ind_policy_id'));
				// }
				// if ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Common Floater") {
				// 	$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
				// 	$tot_commfloat_json_data = $this->security->xss_clean($this->input->post('tot_commfloat_json_data'));
				// 	$comm_float_total_amount = $this->security->xss_clean($this->input->post('comm_float_total_amount'));
				// 	$comm_float_less_discount_rate = $this->security->xss_clean($this->input->post('comm_float_less_discount_rate'));
				// 	$comm_float_less_discount_tot = $this->security->xss_clean($this->input->post('comm_float_less_discount_tot'));
				// 	$comm_float_load_desc = $this->security->xss_clean($this->input->post('comm_float_load_desc'));
				// 	$comm_float_load_tot = $this->security->xss_clean($this->input->post('comm_float_load_tot'));
				// 	$comm_float_gross_premium = $this->security->xss_clean($this->input->post('comm_float_gross_premium'));
				// 	$comm_float_gross_premium_new = $this->security->xss_clean($this->input->post('comm_float_gross_premium_new'));
				// 	$comm_float_cgst_rate = $this->security->xss_clean($this->input->post('comm_float_cgst_rate'));
				// 	$comm_float_cgst_tot = $this->security->xss_clean($this->input->post('comm_float_cgst_tot'));
				// 	$comm_float_sgst_rate = $this->security->xss_clean($this->input->post('comm_float_sgst_rate'));
				// 	$comm_float_sgst_tot = $this->security->xss_clean($this->input->post('comm_float_sgst_tot'));
				// 	$comm_float_final_premium = $this->security->xss_clean($this->input->post('comm_float_final_premium'));
				// 	$common_float_policy_id = $this->security->xss_clean($this->input->post('common_float_policy_id'));
				// }

				if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Individual") {
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					$tot_commind_json_data = $this->security->xss_clean($this->input->post('tot_commind_json_data'));
					$comm_ind_total_amount = $this->security->xss_clean($this->input->post('comm_ind_total_amount'));
					$comm_ind_less_discount_rate = $this->security->xss_clean($this->input->post('comm_ind_less_discount_rate'));
					$comm_ind_less_discount_tot = $this->security->xss_clean($this->input->post('comm_ind_less_discount_tot'));
					$comm_ind_load_desc = $this->security->xss_clean($this->input->post('comm_ind_load_desc'));
					$comm_ind_load_tot = $this->security->xss_clean($this->input->post('comm_ind_load_tot'));
					$comm_ind_gross_premium = $this->security->xss_clean($this->input->post('comm_ind_gross_premium'));
					$comm_ind_gross_premium_new = $this->security->xss_clean($this->input->post('comm_ind_gross_premium_new'));
					$comm_ind_cgst_rate = $this->security->xss_clean($this->input->post('comm_ind_cgst_rate'));
					$comm_ind_cgst_tot = $this->security->xss_clean($this->input->post('comm_ind_cgst_tot'));
					$comm_ind_sgst_rate = $this->security->xss_clean($this->input->post('comm_ind_sgst_rate'));
					$comm_ind_sgst_tot = $this->security->xss_clean($this->input->post('comm_ind_sgst_tot'));
					$comm_ind_final_premium = $this->security->xss_clean($this->input->post('comm_ind_final_premium'));
					$common_ind_policy_id = $this->security->xss_clean($this->input->post('common_ind_policy_id'));
					$current_total_premium = $comm_ind_final_premium;
				}
				if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Floater") {
					$tpa_company = $this->security->xss_clean($this->input->post('tpa_company'));
					$tot_commfloat_json_data = $this->security->xss_clean($this->input->post('tot_commfloat_json_data'));
					$comm_float_total_amount = $this->security->xss_clean($this->input->post('comm_float_total_amount'));
					$comm_float_less_discount_rate = $this->security->xss_clean($this->input->post('comm_float_less_discount_rate'));
					$comm_float_less_discount_tot = $this->security->xss_clean($this->input->post('comm_float_less_discount_tot'));
					$comm_float_load_desc = $this->security->xss_clean($this->input->post('comm_float_load_desc'));
					$comm_float_load_tot = $this->security->xss_clean($this->input->post('comm_float_load_tot'));
					$comm_float_gross_premium = $this->security->xss_clean($this->input->post('comm_float_gross_premium'));
					$comm_float_gross_premium_new = $this->security->xss_clean($this->input->post('comm_float_gross_premium_new'));
					$comm_float_cgst_rate = $this->security->xss_clean($this->input->post('comm_float_cgst_rate'));
					$comm_float_cgst_tot = $this->security->xss_clean($this->input->post('comm_float_cgst_tot'));
					$comm_float_sgst_rate = $this->security->xss_clean($this->input->post('comm_float_sgst_rate'));
					$comm_float_sgst_tot = $this->security->xss_clean($this->input->post('comm_float_sgst_tot'));
					$comm_float_final_premium = $this->security->xss_clean($this->input->post('comm_float_final_premium'));
					$common_float_policy_id = $this->security->xss_clean($this->input->post('common_float_policy_id'));
					$current_total_premium = $comm_float_final_premium;
				}

				if ($policy_name_txt == "GMC") { // GMC:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
						$total_gmc_data = $this->security->xss_clean($this->input->post('total_gmc_data'));
						$gmc_family_size = $this->security->xss_clean($this->input->post('gmc_family_size'));
						$gmc_total_sum_insured = $this->security->xss_clean($this->input->post('gmc_total_sum_insured'));
						$gmc_policy_id = $this->security->xss_clean($this->input->post('gmc_policy_id'));
						$current_sum_insured = 0;
						$current_total_premium = $gmc_total_sum_insured;
					}
					// elseif ($policy_type_txt == "Common Individual") {

					// 	$tot_commind_json_data = $this->security->xss_clean($this->input->post('tot_commind_json_data'));
					// 	$comm_ind_total_amount = $this->security->xss_clean($this->input->post('comm_ind_total_amount'));
					// 	$comm_ind_less_discount_rate = $this->security->xss_clean($this->input->post('comm_ind_less_discount_rate'));
					// 	$comm_ind_less_discount_tot = $this->security->xss_clean($this->input->post('comm_ind_less_discount_tot'));
					// 	$comm_ind_load_desc = $this->security->xss_clean($this->input->post('comm_ind_load_desc'));
					// 	$comm_ind_load_tot = $this->security->xss_clean($this->input->post('comm_ind_load_tot'));
					// 	$comm_ind_gross_premium = $this->security->xss_clean($this->input->post('comm_ind_gross_premium'));
					// 	$comm_ind_gross_premium_new = $this->security->xss_clean($this->input->post('comm_ind_gross_premium_new'));
					// 	$comm_ind_cgst_rate = $this->security->xss_clean($this->input->post('comm_ind_cgst_rate'));
					// 	$comm_ind_cgst_tot = $this->security->xss_clean($this->input->post('comm_ind_cgst_tot'));
					// 	$comm_ind_sgst_rate = $this->security->xss_clean($this->input->post('comm_ind_sgst_rate'));
					// 	$comm_ind_sgst_tot = $this->security->xss_clean($this->input->post('comm_ind_sgst_tot'));
					// 	$comm_ind_final_premium = $this->security->xss_clean($this->input->post('comm_ind_final_premium'));
					// 	$common_ind_policy_id = $this->security->xss_clean($this->input->post('common_ind_policy_id'));
					// } elseif ($policy_type_txt == "Common Floater") {

					// 	$tot_commfloat_json_data = $this->security->xss_clean($this->input->post('tot_commfloat_json_data'));
					// 	$comm_float_total_amount = $this->security->xss_clean($this->input->post('comm_float_total_amount'));
					// 	$comm_float_less_discount_rate = $this->security->xss_clean($this->input->post('comm_float_less_discount_rate'));
					// 	$comm_float_less_discount_tot = $this->security->xss_clean($this->input->post('comm_float_less_discount_tot'));
					// 	$comm_float_load_desc = $this->security->xss_clean($this->input->post('comm_float_load_desc'));
					// 	$comm_float_load_tot = $this->security->xss_clean($this->input->post('comm_float_load_tot'));
					// 	$comm_float_gross_premium = $this->security->xss_clean($this->input->post('comm_float_gross_premium'));
					// 	$comm_float_gross_premium_new = $this->security->xss_clean($this->input->post('comm_float_gross_premium_new'));
					// 	$comm_float_cgst_rate = $this->security->xss_clean($this->input->post('comm_float_cgst_rate'));
					// 	$comm_float_cgst_tot = $this->security->xss_clean($this->input->post('comm_float_cgst_tot'));
					// 	$comm_float_sgst_rate = $this->security->xss_clean($this->input->post('comm_float_sgst_rate'));
					// 	$comm_float_sgst_tot = $this->security->xss_clean($this->input->post('comm_float_sgst_tot'));
					// 	$comm_float_final_premium = $this->security->xss_clean($this->input->post('comm_float_final_premium'));
					// 	$common_float_policy_id = $this->security->xss_clean($this->input->post('common_float_policy_id'));
					// }
				}
				if ($policy_name_txt == "GPA") { // GMC:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
						$total_gpa_data = $this->security->xss_clean($this->input->post('total_gpa_data'));
						$gpa_family_size = $this->security->xss_clean($this->input->post('gpa_family_size'));
						$gpa_total_sum_insured = $this->security->xss_clean($this->input->post('gpa_total_sum_insured'));
						$gpa_policy_id = $this->security->xss_clean($this->input->post('gpa_policy_id'));
						$current_sum_insured = 0;
						$current_total_premium = $gpa_total_sum_insured;
					}
					// elseif ($policy_type_txt == "Common Individual") {

					// 	$tot_commind_json_data = $this->security->xss_clean($this->input->post('tot_commind_json_data'));
					// 	$comm_ind_total_amount = $this->security->xss_clean($this->input->post('comm_ind_total_amount'));
					// 	$comm_ind_less_discount_rate = $this->security->xss_clean($this->input->post('comm_ind_less_discount_rate'));
					// 	$comm_ind_less_discount_tot = $this->security->xss_clean($this->input->post('comm_ind_less_discount_tot'));
					// 	$comm_ind_load_desc = $this->security->xss_clean($this->input->post('comm_ind_load_desc'));
					// 	$comm_ind_load_tot = $this->security->xss_clean($this->input->post('comm_ind_load_tot'));
					// 	$comm_ind_gross_premium = $this->security->xss_clean($this->input->post('comm_ind_gross_premium'));
					// 	$comm_ind_gross_premium_new = $this->security->xss_clean($this->input->post('comm_ind_gross_premium_new'));
					// 	$comm_ind_cgst_rate = $this->security->xss_clean($this->input->post('comm_ind_cgst_rate'));
					// 	$comm_ind_cgst_tot = $this->security->xss_clean($this->input->post('comm_ind_cgst_tot'));
					// 	$comm_ind_sgst_rate = $this->security->xss_clean($this->input->post('comm_ind_sgst_rate'));
					// 	$comm_ind_sgst_tot = $this->security->xss_clean($this->input->post('comm_ind_sgst_tot'));
					// 	$comm_ind_final_premium = $this->security->xss_clean($this->input->post('comm_ind_final_premium'));
					// 	$common_ind_policy_id = $this->security->xss_clean($this->input->post('common_ind_policy_id'));
					// } elseif ($policy_type_txt == "Common Floater") {

					// 	$tot_commfloat_json_data = $this->security->xss_clean($this->input->post('tot_commfloat_json_data'));
					// 	$comm_float_total_amount = $this->security->xss_clean($this->input->post('comm_float_total_amount'));
					// 	$comm_float_less_discount_rate = $this->security->xss_clean($this->input->post('comm_float_less_discount_rate'));
					// 	$comm_float_less_discount_tot = $this->security->xss_clean($this->input->post('comm_float_less_discount_tot'));
					// 	$comm_float_load_desc = $this->security->xss_clean($this->input->post('comm_float_load_desc'));
					// 	$comm_float_load_tot = $this->security->xss_clean($this->input->post('comm_float_load_tot'));
					// 	$comm_float_gross_premium = $this->security->xss_clean($this->input->post('comm_float_gross_premium'));
					// 	$comm_float_gross_premium_new = $this->security->xss_clean($this->input->post('comm_float_gross_premium_new'));
					// 	$comm_float_cgst_rate = $this->security->xss_clean($this->input->post('comm_float_cgst_rate'));
					// 	$comm_float_cgst_tot = $this->security->xss_clean($this->input->post('comm_float_cgst_tot'));
					// 	$comm_float_sgst_rate = $this->security->xss_clean($this->input->post('comm_float_sgst_rate'));
					// 	$comm_float_sgst_tot = $this->security->xss_clean($this->input->post('comm_float_sgst_tot'));
					// 	$comm_float_final_premium = $this->security->xss_clean($this->input->post('comm_float_final_premium'));
					// 	$common_float_policy_id = $this->security->xss_clean($this->input->post('common_float_policy_id'));
					// }
				}

				if ($policy_name_txt == "Personal Accident") { // Personal Accident:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater") {

						$total_pa_ind_json_data = $this->security->xss_clean($this->input->post('total_pa_ind_json_data'));
						$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
						$less_disc_rate = $this->security->xss_clean($this->input->post('less_disc_rate'));
						$less_disc_tot = $this->security->xss_clean($this->input->post('less_disc_tot'));
						$gross_premium = $this->security->xss_clean($this->input->post('gross_premium'));
						$gross_premium_new = $this->security->xss_clean($this->input->post('gross_premium_new'));
						$medi_cgst_rate = $this->security->xss_clean($this->input->post('medi_cgst_rate'));
						$medi_cgst_tot = $this->security->xss_clean($this->input->post('medi_cgst_tot'));
						$medi_sgst_rate = $this->security->xss_clean($this->input->post('medi_sgst_rate'));
						$medi_sgst_tot = $this->security->xss_clean($this->input->post('medi_sgst_tot'));
						$medi_final_premium = $this->security->xss_clean($this->input->post('medi_final_premium'));
						$paccident_policy_id = $this->security->xss_clean($this->input->post('paccident_policy_id'));
						$current_total_premium = $medi_final_premium;
					} elseif ($policy_type_txt == "Common Individual") {

						$tot_commind_json_data = $this->security->xss_clean($this->input->post('tot_commind_json_data'));
						$comm_ind_total_amount = $this->security->xss_clean($this->input->post('comm_ind_total_amount'));
						$comm_ind_less_discount_rate = $this->security->xss_clean($this->input->post('comm_ind_less_discount_rate'));
						$comm_ind_less_discount_tot = $this->security->xss_clean($this->input->post('comm_ind_less_discount_tot'));
						$comm_ind_load_desc = $this->security->xss_clean($this->input->post('comm_ind_load_desc'));
						$comm_ind_load_tot = $this->security->xss_clean($this->input->post('comm_ind_load_tot'));
						$comm_ind_gross_premium = $this->security->xss_clean($this->input->post('comm_ind_gross_premium'));
						$comm_ind_gross_premium_new = $this->security->xss_clean($this->input->post('comm_ind_gross_premium_new'));
						$comm_ind_cgst_rate = $this->security->xss_clean($this->input->post('comm_ind_cgst_rate'));
						$comm_ind_cgst_tot = $this->security->xss_clean($this->input->post('comm_ind_cgst_tot'));
						$comm_ind_sgst_rate = $this->security->xss_clean($this->input->post('comm_ind_sgst_rate'));
						$comm_ind_sgst_tot = $this->security->xss_clean($this->input->post('comm_ind_sgst_tot'));
						$comm_ind_final_premium = $this->security->xss_clean($this->input->post('comm_ind_final_premium'));
						$common_ind_policy_id = $this->security->xss_clean($this->input->post('common_ind_policy_id'));
						$current_total_premium = $comm_ind_final_premium;
					} elseif ($policy_type_txt == "Common Floater") {

						$tot_commfloat_json_data = $this->security->xss_clean($this->input->post('tot_commfloat_json_data'));
						$comm_float_total_amount = $this->security->xss_clean($this->input->post('comm_float_total_amount'));
						$comm_float_less_discount_rate = $this->security->xss_clean($this->input->post('comm_float_less_discount_rate'));
						$comm_float_less_discount_tot = $this->security->xss_clean($this->input->post('comm_float_less_discount_tot'));
						$comm_float_load_desc = $this->security->xss_clean($this->input->post('comm_float_load_desc'));
						$comm_float_load_tot = $this->security->xss_clean($this->input->post('comm_float_load_tot'));
						$comm_float_gross_premium = $this->security->xss_clean($this->input->post('comm_float_gross_premium'));
						$comm_float_gross_premium_new = $this->security->xss_clean($this->input->post('comm_float_gross_premium_new'));
						$comm_float_cgst_rate = $this->security->xss_clean($this->input->post('comm_float_cgst_rate'));
						$comm_float_cgst_tot = $this->security->xss_clean($this->input->post('comm_float_cgst_tot'));
						$comm_float_sgst_rate = $this->security->xss_clean($this->input->post('comm_float_sgst_rate'));
						$comm_float_sgst_tot = $this->security->xss_clean($this->input->post('comm_float_sgst_tot'));
						$comm_float_final_premium = $this->security->xss_clean($this->input->post('comm_float_final_premium'));
						$common_float_policy_id = $this->security->xss_clean($this->input->post('common_float_policy_id'));
						$current_total_premium = $comm_float_final_premium;
					}
				}

				if ($policy_name_txt == "Private Car") {

					$vehicle_make_model = $this->security->xss_clean($this->input->post('vehicle_make_model'));
					$vehicle_reg_no = $this->security->xss_clean($this->input->post('vehicle_reg_no'));
					$insu_declared_val = $this->security->xss_clean($this->input->post('insu_declared_val'));
					$non_elect_access_val = $this->security->xss_clean($this->input->post('non_elect_access_val'));
					$elect_access_val = $this->security->xss_clean($this->input->post('elect_access_val'));
					$lpg_cng_idv_val = $this->security->xss_clean($this->input->post('lpg_cng_idv_val'));
					$trailer_val = $this->security->xss_clean($this->input->post('trailer_val'));
					$year_manufact_val = $this->security->xss_clean($this->input->post('year_manufact_val'));
					$rta_city_code = $this->security->xss_clean($this->input->post('rta_city_code'));
					$rta_city = $this->security->xss_clean($this->input->post('rta_city'));
					$rta_city_cat = $this->security->xss_clean($this->input->post('rta_city_cat'));
					$cubic_capacity_val = $this->security->xss_clean($this->input->post('cubic_capacity_val'));
					$calculation_method = $this->security->xss_clean($this->input->post('calculation_method'));
					$type_of_cover = $this->security->xss_clean($this->input->post('type_of_cover'));
					$prev_policy_expiry_date = $this->security->xss_clean($this->input->post('prev_policy_expiry_date'));
					$policy_period = $this->security->xss_clean($this->input->post('policy_period'));
					$inception_date = $this->security->xss_clean($this->input->post('inception_date'));
					$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));

					$od_basic_od_tot = $this->security->xss_clean($this->input->post('od_basic_od_tot'));
					$od_special_disc_per = $this->security->xss_clean($this->input->post('od_special_disc_per'));
					$od_special_disc_tot = $this->security->xss_clean($this->input->post('od_special_disc_tot'));
					$od_special_load_per = $this->security->xss_clean($this->input->post('od_special_load_per'));
					$od_special_load_tot = $this->security->xss_clean($this->input->post('od_special_load_tot'));
					// $od_special_disc_tot = $this->security->xss_clean($this->input->post('od_special_disc_tot'));
					// $od_special_load_tot = $this->security->xss_clean($this->input->post('od_special_load_tot'));
					$od_net_basic_od_tot = $this->security->xss_clean($this->input->post('od_net_basic_od_tot'));
					$od_non_elec_acc_tot = $this->security->xss_clean($this->input->post('od_non_elec_acc_tot'));
					$od_elec_acc_tot = $this->security->xss_clean($this->input->post('od_elec_acc_tot'));
					$od_bi_fuel_kit_tot = $this->security->xss_clean($this->input->post('od_bi_fuel_kit_tot'));
					$od_od_basic_od1_tot = $this->security->xss_clean($this->input->post('od_od_basic_od1_tot'));
					$od_trailer_tot = $this->security->xss_clean($this->input->post('od_trailer_tot'));
					$od_geographical_area_tot = $this->security->xss_clean($this->input->post('od_geographical_area_tot'));
					$od_embassy_load_tot = $this->security->xss_clean($this->input->post('od_embassy_load_tot'));
					$od_fibre_glass_tank_tot = $this->security->xss_clean($this->input->post('od_fibre_glass_tank_tot'));
					$od_driving_tut_tot = $this->security->xss_clean($this->input->post('od_driving_tut_tot'));
					$od_rallies_tot = $this->security->xss_clean($this->input->post('od_rallies_tot'));
					$od_basic_od2_tot = $this->security->xss_clean($this->input->post('od_basic_od2_tot'));
					$od_anti_tot = $this->security->xss_clean($this->input->post('od_anti_tot'));
					$od_handicap_tot = $this->security->xss_clean($this->input->post('od_handicap_tot'));
					$od_aai_tot = $this->security->xss_clean($this->input->post('od_aai_tot'));
					$od_vintage_tot = $this->security->xss_clean($this->input->post('od_vintage_tot'));
					$od_own_premises_tot = $this->security->xss_clean($this->input->post('od_own_premises_tot'));
					$od_voluntary_deduc_tot = $this->security->xss_clean($this->input->post('od_voluntary_deduc_tot'));
					$od_basic_od3_tot = $this->security->xss_clean($this->input->post('od_basic_od3_tot'));
					$od_ncb_per = $this->security->xss_clean($this->input->post('od_ncb_per'));
					$od_ncb_tot = $this->security->xss_clean($this->input->post('od_ncb_tot'));
					$od_tot_anual_od_premium = $this->security->xss_clean($this->input->post('od_tot_anual_od_premium'));
					$od_tot_od_premium_policy_period = $this->security->xss_clean($this->input->post('od_tot_od_premium_policy_period'));

					$tp_basic_tp_tot = $this->security->xss_clean($this->input->post('tp_basic_tp_tot'));
					$tp_restr_tppd = $this->security->xss_clean($this->input->post('tp_restr_tppd'));
					$tp_trailer_tot = $this->security->xss_clean($this->input->post('tp_trailer_tot'));
					$tp_bi_fuel_tot = $this->security->xss_clean($this->input->post('tp_bi_fuel_tot'));
					$tp_basic_tp1_tot = $this->security->xss_clean($this->input->post('tp_basic_tp1_tot'));
					$tp_compul_own_driv_tot = $this->security->xss_clean($this->input->post('tp_compul_own_driv_tot'));
					$tp_geographical_area_tot = $this->security->xss_clean($this->input->post('tp_geographical_area_tot'));
					$tp_unnamed_papax_tot = $this->security->xss_clean($this->input->post('tp_unnamed_papax_tot'));
					$tp_no_seats_limit_person_tot = $this->security->xss_clean($this->input->post('tp_no_seats_limit_person_tot'));
					$tp_ll_drv_emp_tot = $this->security->xss_clean($this->input->post('tp_ll_drv_emp_tot'));
					$tp_no_drv_emp_tot = $this->security->xss_clean($this->input->post('tp_no_drv_emp_tot'));
					$tp_ll_defe_tot = $this->security->xss_clean($this->input->post('tp_ll_defe_tot'));
					$tp_noof_person_tot = $this->security->xss_clean($this->input->post('tp_noof_person_tot'));
					$tp_pa_paid_drv_tot = $this->security->xss_clean($this->input->post('tp_pa_paid_drv_tot'));
					// $tp_blank_tot = $this->security->xss_clean($this->input->post('tp_blank_tot'));
					$tp_basic_tp2_tot = $this->security->xss_clean($this->input->post('tp_basic_tp2_tot'));
					$tp_tot_anual_tp_premium = $this->security->xss_clean($this->input->post('tp_tot_anual_tp_premium'));
					$tp_tot_premium_policy_period = $this->security->xss_clean($this->input->post('tp_tot_premium_policy_period'));
					$tot_othercover_ind_json = $this->security->xss_clean($this->input->post('tot_othercover_ind_json'));
					$plan_name = $this->security->xss_clean($this->input->post('plan_name'));
					$plan_name_tot = $this->security->xss_clean($this->input->post('plan_name_tot'));
					$tot_anual_cover_premium = $this->security->xss_clean($this->input->post('tot_anual_cover_premium'));
					$tot_cover_premium_period = $this->security->xss_clean($this->input->post('tot_cover_premium_period'));

					$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
					$motor_cgst_rate = $this->security->xss_clean($this->input->post('motor_cgst_rate'));
					$motor_cgst_tot = $this->security->xss_clean($this->input->post('motor_cgst_tot'));
					$motor_sgst_rate = $this->security->xss_clean($this->input->post('motor_sgst_rate'));
					$motor_sgst_tot = $this->security->xss_clean($this->input->post('motor_sgst_tot'));
					// $gst_rate = $this->security->xss_clean($this->input->post('gst_rate'));
					// $gst_tot = $this->security->xss_clean($this->input->post('gst_tot'));
					$tot_payable_premium = $this->security->xss_clean($this->input->post('tot_payable_premium'));
					$private_car_policy_id = $this->security->xss_clean($this->input->post('private_car_policy_id'));
					$current_sum_insured = 0;
					$current_total_premium = $tot_payable_premium;
				}

				if ($policy_name_txt == "2 Wheeler") {

					$vehicle_make_model = $this->security->xss_clean($this->input->post('vehicle_make_model'));
					$vehicle_reg_no = $this->security->xss_clean($this->input->post('vehicle_reg_no'));
					$insu_declared_val = $this->security->xss_clean($this->input->post('insu_declared_val'));
					$elect_acc_val = $this->security->xss_clean($this->input->post('elect_acc_val'));
					$other_elect_acc_val = $this->security->xss_clean($this->input->post('other_elect_acc_val'));
					$policy_period_tenure_years = $this->security->xss_clean($this->input->post('policy_period_tenure_years'));
					$previous_policy_expiry_date_tenur = $this->security->xss_clean($this->input->post('previous_policy_expiry_date_tenur'));
					$year_manufact_val = $this->security->xss_clean($this->input->post('year_manufact_val'));
					$rta_city_code = $this->security->xss_clean($this->input->post('rta_city_code'));
					$rta_city = $this->security->xss_clean($this->input->post('rta_city'));
					$rta_city_cat = $this->security->xss_clean($this->input->post('rta_city_cat'));
					$cubic_capacity_val = $this->security->xss_clean($this->input->post('cubic_capacity_val'));
					$type_of_cover = $this->security->xss_clean($this->input->post('type_of_cover'));
					$policy_period = $this->security->xss_clean($this->input->post('policy_period'));
					$inception_date = $this->security->xss_clean($this->input->post('inception_date'));
					$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));

					$od_basic_od_tot = $this->security->xss_clean($this->input->post('od_basic_od_tot'));
					$od_special_disc_per = $this->security->xss_clean($this->input->post('od_special_disc_per'));
					$od_special_disc_tot = $this->security->xss_clean($this->input->post('od_special_disc_tot'));
					$od_special_load_per = $this->security->xss_clean($this->input->post('od_special_load_per'));
					$od_special_load_tot = $this->security->xss_clean($this->input->post('od_special_load_tot'));
					// $od_special_disc_tot = $this->security->xss_clean($this->input->post('od_special_disc_tot'));
					// $od_special_load_tot = $this->security->xss_clean($this->input->post('od_special_load_tot'));
					$od_net_basic_od_tot = $this->security->xss_clean($this->input->post('od_net_basic_od_tot'));
					$od_elec_acc_tot = $this->security->xss_clean($this->input->post('od_elec_acc_tot'));
					$od_other_elec_acc_tot = $this->security->xss_clean($this->input->post('od_other_elec_acc_tot'));
					$od_od_basic_od1_tot = $this->security->xss_clean($this->input->post('od_od_basic_od1_tot'));
					$od_geographical_area_tot = $this->security->xss_clean($this->input->post('od_geographical_area_tot'));
					$od_rallies_tot = $this->security->xss_clean($this->input->post('od_rallies_tot'));
					$od_embassy_load_tot = $this->security->xss_clean($this->input->post('od_embassy_load_tot'));
					$od_basic_od2_tot = $this->security->xss_clean($this->input->post('od_basic_od2_tot'));
					$od_anti_theft_tot = $this->security->xss_clean($this->input->post('od_anti_theft_tot'));
					$od_handicap_tot = $this->security->xss_clean($this->input->post('od_handicap_tot'));
					$od_aai_tot = $this->security->xss_clean($this->input->post('od_aai_tot'));
					$od_side_car_tot = $this->security->xss_clean($this->input->post('od_side_car_tot'));
					$od_own_premises_tot = $this->security->xss_clean($this->input->post('od_own_premises_tot'));
					$od_voluntary_excess_tot = $this->security->xss_clean($this->input->post('od_voluntary_excess_tot'));
					$od_basic_od3_tot = $this->security->xss_clean($this->input->post('od_basic_od3_tot'));
					$od_ncb_per = $this->security->xss_clean($this->input->post('od_ncb_per'));
					$od_ncb_tot = $this->security->xss_clean($this->input->post('od_ncb_tot'));
					$od_tot_od_premium_policy_period = $this->security->xss_clean($this->input->post('od_tot_od_premium_policy_period'));

					$tp_basic_tp_tot = $this->security->xss_clean($this->input->post('tp_basic_tp_tot'));
					$tp_restr_tppd_tot = $this->security->xss_clean($this->input->post('tp_restr_tppd_tot'));
					$tp_basic_tp1_tot = $this->security->xss_clean($this->input->post('tp_basic_tp1_tot'));
					$tp_geographical_area_tot = $this->security->xss_clean($this->input->post('tp_geographical_area_tot'));
					$tp_compul_pa_own_driv_tot = $this->security->xss_clean($this->input->post('tp_compul_pa_own_driv_tot'));
					$tp_unnamed_pa_tot = $this->security->xss_clean($this->input->post('tp_unnamed_pa_tot'));
					$tp_ll_drv_emp_imt28_tot = $this->security->xss_clean($this->input->post('tp_ll_drv_emp_imt28_tot'));
					$tp_ll_other_emp_tot = $this->security->xss_clean($this->input->post('tp_ll_other_emp_tot'));
					$tp_noof_other_emp_tot = $this->security->xss_clean($this->input->post('tp_noof_other_emp_tot'));
					$tp_basic_tp2_tot = $this->security->xss_clean($this->input->post('tp_basic_tp2_tot'));
					$tp_tot_premium_policy_period = $this->security->xss_clean($this->input->post('tp_tot_premium_policy_period'));
					$tot_othercover_ind_json = $this->security->xss_clean($this->input->post('tot_othercover_ind_json'));
					$plan_name = $this->security->xss_clean($this->input->post('plan_name'));
					$plan_name_tot = $this->security->xss_clean($this->input->post('plan_name_tot'));
					$tot_cover_premium_period = $this->security->xss_clean($this->input->post('tot_cover_premium_period'));

					$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
					$motor_cgst_rate = $this->security->xss_clean($this->input->post('motor_cgst_rate'));
					$motor_cgst_tot = $this->security->xss_clean($this->input->post('motor_cgst_tot'));
					$motor_sgst_rate = $this->security->xss_clean($this->input->post('motor_sgst_rate'));
					$motor_sgst_tot = $this->security->xss_clean($this->input->post('motor_sgst_tot'));
					// $gst_rate = $this->security->xss_clean($this->input->post('gst_rate'));
					// $gst_tot = $this->security->xss_clean($this->input->post('gst_tot'));
					$tot_payable_premium = $this->security->xss_clean($this->input->post('tot_payable_premium'));
					$two_wheeler_policy_id = $this->security->xss_clean($this->input->post('two_wheeler_policy_id'));
					$current_sum_insured = 0;
					$current_total_premium = $tot_payable_premium;
				}

				if ($policy_name_txt == "Commercial Vehicle") {

					$vehicle_make_model = $this->security->xss_clean($this->input->post('vehicle_make_model'));
					$vehicle_reg_no = $this->security->xss_clean($this->input->post('vehicle_reg_no'));
					$insu_declared_val = $this->security->xss_clean($this->input->post('insu_declared_val'));
					$elect_acc_val = $this->security->xss_clean($this->input->post('elect_acc_val'));
					$lpg_cng_idv_val = $this->security->xss_clean($this->input->post('lpg_cng_idv_val'));
					$year_manufact_val = $this->security->xss_clean($this->input->post('year_manufact_val'));
					$zone_city_code = $this->security->xss_clean($this->input->post('zone_city_code'));
					$zone_city = $this->security->xss_clean($this->input->post('zone_city'));
					$zone_city_cat = $this->security->xss_clean($this->input->post('zone_city_cat'));
					$gvw_val = $this->security->xss_clean($this->input->post('gvw_val'));
					$class_val = $this->security->xss_clean($this->input->post('class_val'));
					$type_of_cover = $this->security->xss_clean($this->input->post('type_of_cover'));
					$policy_period = $this->security->xss_clean($this->input->post('policy_period'));
					$inception_date = $this->security->xss_clean($this->input->post('inception_date'));
					$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));

					$od_basic_od_tot = $this->security->xss_clean($this->input->post('od_basic_od_tot'));
					$od_elec_acc_tot = $this->security->xss_clean($this->input->post('od_elec_acc_tot'));
					$od_trailer_tot = $this->security->xss_clean($this->input->post('od_trailer_tot'));
					$od_bi_fuel_kit_tot = $this->security->xss_clean($this->input->post('od_bi_fuel_kit_tot'));
					$od_od_basic_od1_tot = $this->security->xss_clean($this->input->post('od_od_basic_od1_tot'));
					$od_geog_area_tot = $this->security->xss_clean($this->input->post('od_geog_area_tot'));
					$od_fiber_glass_tank_tot = $this->security->xss_clean($this->input->post('od_fiber_glass_tank_tot'));
					$od_imt_cover_mud_guard_tot = $this->security->xss_clean($this->input->post('od_imt_cover_mud_guard_tot'));
					$od_basic_od2_tot = $this->security->xss_clean($this->input->post('od_basic_od2_tot'));
					$od_basic_od3_tot = $this->security->xss_clean($this->input->post('od_basic_od3_tot'));
					$od_ncb_per = $this->security->xss_clean($this->input->post('od_ncb_per'));
					$od_ncb_tot = $this->security->xss_clean($this->input->post('od_ncb_tot'));
					$od_tot_anual_od_premium = $this->security->xss_clean($this->input->post('od_tot_anual_od_premium'));
					$od_special_disc_per = $this->security->xss_clean($this->input->post('od_special_disc_per'));
					$od_special_disc_tot = $this->security->xss_clean($this->input->post('od_special_disc_tot'));
					$od_special_load_per = $this->security->xss_clean($this->input->post('od_special_load_per'));
					$od_special_load_tot = $this->security->xss_clean($this->input->post('od_special_load_tot'));
					$od_tot_od_premium = $this->security->xss_clean($this->input->post('od_tot_od_premium'));

					$tp_basic_tp_tot = $this->security->xss_clean($this->input->post('tp_basic_tp_tot'));
					$tp_restr_tppd_tot = $this->security->xss_clean($this->input->post('tp_restr_tppd_tot'));
					$tp_trailer_tot = $this->security->xss_clean($this->input->post('tp_trailer_tot'));
					$tp_bi_fuel_kit_tot = $this->security->xss_clean($this->input->post('tp_bi_fuel_kit_tot'));
					$tp_basic_tp1_tot = $this->security->xss_clean($this->input->post('tp_basic_tp1_tot'));
					$tp_geog_area_tot = $this->security->xss_clean($this->input->post('tp_geog_area_tot'));
					$tp_compul_pa_own_driv_tot = $this->security->xss_clean($this->input->post('tp_compul_pa_own_driv_tot'));
					$tp_pa_paid_driver_tot = $this->security->xss_clean($this->input->post('tp_pa_paid_driver_tot'));
					$tp_ll_emp_non_fare_tot = $this->security->xss_clean($this->input->post('tp_ll_emp_non_fare_tot'));
					$tp_ll_driver_cleaner_tot = $this->security->xss_clean($this->input->post('tp_ll_driver_cleaner_tot'));
					$tp_ll_person_operation_tot = $this->security->xss_clean($this->input->post('tp_ll_person_operation_tot'));
					$tp_basic_tp2_tot = $this->security->xss_clean($this->input->post('tp_basic_tp2_tot'));
					$tp_tot_premium = $this->security->xss_clean($this->input->post('tp_tot_premium'));
					$tp_consumables = $this->security->xss_clean($this->input->post('tp_consumables'));
					$tp_zero_depreciation = $this->security->xss_clean($this->input->post('tp_zero_depreciation'));
					$tp_road_side_ass = $this->security->xss_clean($this->input->post('tp_road_side_ass'));
					$tp_tot_addon_premium = $this->security->xss_clean($this->input->post('tp_tot_addon_premium'));

					$tot_owd_premium = $this->security->xss_clean($this->input->post('tot_owd_premium'));
					$tot_owd_addon_premium = $this->security->xss_clean($this->input->post('tot_owd_addon_premium'));
					$tot_btp_premium = $this->security->xss_clean($this->input->post('tot_btp_premium'));
					$tot_other_tp_premium = $this->security->xss_clean($this->input->post('tot_other_tp_premium'));
					$tot_premium = $this->security->xss_clean($this->input->post('tot_premium'));
					$tot_owd_cgst_rate = $this->security->xss_clean($this->input->post('tot_owd_cgst_rate'));
					$tot_owd_sgst_rate = $this->security->xss_clean($this->input->post('tot_owd_sgst_rate'));
					$tot_owd_addon_cgst_rate = $this->security->xss_clean($this->input->post('tot_owd_addon_cgst_rate'));
					$tot_owd_addon_sgst_rate = $this->security->xss_clean($this->input->post('tot_owd_addon_sgst_rate'));
					$tot_btp_cgst_rate = $this->security->xss_clean($this->input->post('tot_btp_cgst_rate'));
					$tot_btp_sgst_rate = $this->security->xss_clean($this->input->post('tot_btp_sgst_rate'));
					$tot_other_tp_cgst_rate = $this->security->xss_clean($this->input->post('tot_other_tp_cgst_rate'));
					$tot_other_tp_sgst_rate = $this->security->xss_clean($this->input->post('tot_other_tp_sgst_rate'));
					$tot_owd_gst = $this->security->xss_clean($this->input->post('tot_owd_gst'));
					$tot_owd_addon_gst = $this->security->xss_clean($this->input->post('tot_owd_addon_gst'));
					$tot_btp_gst = $this->security->xss_clean($this->input->post('tot_btp_gst'));
					$tot_other_tp_gst = $this->security->xss_clean($this->input->post('tot_other_tp_gst'));
					$tot_gst_amt = $this->security->xss_clean($this->input->post('tot_gst_amt'));
					$tot_owd_final = $this->security->xss_clean($this->input->post('tot_owd_final'));
					$tot_owd_addon_final = $this->security->xss_clean($this->input->post('tot_owd_addon_final'));
					$tot_btp_final = $this->security->xss_clean($this->input->post('tot_btp_final'));
					$tot_other_tp_final = $this->security->xss_clean($this->input->post('tot_other_tp_final'));
					$tot_final_premium = $this->security->xss_clean($this->input->post('tot_final_premium'));
					$tot_payable_premium = $this->security->xss_clean($this->input->post('tot_payable_premium'));
					$commercial_policy_id = $this->security->xss_clean($this->input->post('commercial_policy_id'));
					$current_sum_insured = 0;
					$current_total_premium = $tot_payable_premium;
				}
				// Calculation Section End

				$this->load->model("Magent");
				$total_remarks = json_decode($this->security->xss_clean($this->input->post('total_remarks')));
				$total_hypotication = $this->security->xss_clean($this->input->post('total_hypotication'));
				$total_correspondence = $this->security->xss_clean($this->input->post('total_correspondence'));
				$total_paymentacknowledge_data = $this->security->xss_clean($this->input->post('total_paymentacknowledge_data'));
				$total_risk = $this->security->xss_clean($this->input->post('total_risk'));
				$total_risk_Rc = $this->security->xss_clean($this->input->post('total_risk_Rc'));

				if ($total_remarks == "undefined")
					$total_remarks = json_encode([]);
				if ($total_hypotication == "undefined")
					$total_hypotication = json_encode([]);
				if ($total_risk == "undefined")
					$total_risk = json_encode([]);
				if ($total_correspondence == "undefined")
					$total_correspondence = json_encode([]);
				if ($total_risk_Rc == "undefined")
					$total_risk_Rc = json_encode([]);
				if ($total_paymentacknowledge_data == "undefined")
					$total_paymentacknowledge_data = json_encode([]);

				$remove_policy_remark_id = json_decode($this->security->xss_clean($this->input->post('remove_remark')));
				$remove_remark_result = $this->Magent->remove_remark($remove_policy_remark_id);

				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Individual") {
					if (!empty($policy_type_txt)) {
						if ($policy_type != 3) {
							if ($policy_type_txt == "Individual") {

								if ($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") {
									if ($floater_policy_type == "Optima Restore") {
										if (!empty($medi_hdfc_ergo_health_insu_policy_id)) {
											$update_medi_hdfc_ergo_health_insu_policy_arr = array(
												'medi_hdfc_ergo_health_insu_policy_id' => $medi_hdfc_ergo_health_insu_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_medi_ind_hdfc_json_data' => $total_medi_ind_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'protect_ride_prem_tot' => $protect_ride_prem_tot,
												'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
												'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'family_disc_per' => $family_disc_per,
												'family_disc_tot' => $family_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_medi_hdfc_ergo_health_insu_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_medi_hdfc_ergo_health_insu_policy_arr))
												$result_data = $this->Mpolicy->update_medi_hdfc_ergo_health_insu_policy($update_medi_hdfc_ergo_health_insu_policy_arr, $medi_hdfc_ergo_health_insu_policy_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Energy") {
										if (!empty($medi_hdfc_ergo_health_insu_energy_policy_id)) {
											$update_energy_medi_hdfc_ergo_health_insu_policy_arr = array(
												'medi_hdfc_ergo_health_insu_energy_policy_id' => $medi_hdfc_ergo_health_insu_energy_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_energy_medi_hdfc_json_data' => $total_energy_medi_hdfc_json_data,
												'tot_premium' => $tot_premium,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_energy_medi_hdfc_ergo_health_insu_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_energy_medi_hdfc_ergo_health_insu_policy_arr))
												$result_data = $this->Mpolicy->update_energy_medi_hdfc_ergo_health_insu_policy($update_energy_medi_hdfc_ergo_health_insu_policy_arr, $medi_hdfc_ergo_health_insu_energy_policy_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Health Suraksha") {
										if (!empty($medi_hdfc_ergo_health_insu_suraksha_policy_id)) {
											$update_suraksha_medi_hdfc_ergo_health_insu_policy_arr = array(
												'medi_hdfc_ergo_health_insu_suraksha_policy_id' => $medi_hdfc_ergo_health_insu_suraksha_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_suraksha_medi_hdfc_json_data' => $total_suraksha_medi_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'family_disc_per' => $family_disc_per,
												'family_disc_tot' => $family_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_suraksha_medi_hdfc_ergo_health_insu_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_suraksha_medi_hdfc_ergo_health_insu_policy_arr))
												$result_data = $this->Mpolicy->update_suraksha_medi_hdfc_ergo_health_insu_policy($update_suraksha_medi_hdfc_ergo_health_insu_policy_arr, $medi_hdfc_ergo_health_insu_suraksha_policy_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Easy Health") {
										if (!empty($medi_hdfc_ergo_health_insu_easy_policy_id)) {
											$update_easy_rate_medi_hdfc_ergo_health_insu_policy_arr = array(
												'medi_hdfc_ergo_health_insu_easy_policy_id' => $medi_hdfc_ergo_health_insu_easy_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_easy_medi_hdfc_json_data' => $total_easy_medi_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'protect_ride_prem_tot' => $protect_ride_prem_tot,
												'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
												'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'tot_basic_prem' => $tot_basic_prem,
												'less_disc_tot' => $less_disc_tot,
												'family_disc_per' => $family_disc_per,
												'family_disc_tot' => $family_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_easy_rate_medi_hdfc_ergo_health_insu_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_easy_rate_medi_hdfc_ergo_health_insu_policy_arr))
												$result_data = $this->Mpolicy->update_easy_rate_medi_hdfc_ergo_health_insu_policy($update_easy_rate_medi_hdfc_ergo_health_insu_policy_arr, $medi_hdfc_ergo_health_insu_easy_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif ($company_txt == "The New India Assurance Co Ltd") {
									if ($floater_policy_type == "New India Mediclaim Policy 2017") {
										if (!empty($medi_insu_new_india_tns_assu_ind_policy_id)) {
											$update_ind_the_new_india_medi_2017_assu_policy_arr = array(
												'medi_insu_new_india_tns_assu_ind_policy_id' => $medi_insu_new_india_tns_assu_ind_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_the_new_india_medi_tns_hdfc_json_data' => $total_the_new_india_medi_tns_hdfc_json_data,
												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_ind_the_new_india_medi_2017_assu_policy_arr))
												$result_data = $this->Mpolicy->update_ind_the_new_india_medi_2017_assu_policy($update_ind_the_new_india_medi_2017_assu_policy_arr, $medi_insu_new_india_tns_assu_ind_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif (($company_txt == "Max Bupa Health Insurance Co Ltd") || ($company_txt == "Niva Bupa Health Insurance Co Ltd")) {
									if ($floater_policy_type == "Reassure") {
										if (!empty($medi_max_bupa_reassure_ind_policy_id)) {
											$update_max_bupa_reassure_ind_policy_arr = array(
												'medi_max_bupa_reassure_ind_policy_id' => $medi_max_bupa_reassure_ind_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_max_bupa_medi_reassure_json_data' => $total_max_bupa_medi_reassure_json_data,

												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'first_year_rate' => $first_year_rate,
												'second_year_rate' => $second_year_rate,
												'third_year_rate' => $third_year_rate,
												'first_year_tot' => $first_year_tot,
												'second_year_tot' => $second_year_tot,
												'third_year_tot' => $third_year_tot,
												'tot_term_disc' => $tot_term_disc,

												'tot_premium' => $tot_premium,
												'stand_instu_rate' => $stand_instu_rate,
												'stand_instu_tot' => $stand_instu_tot,
												'doctor_disc_per' => $doctor_disc_per,
												'doctor_disc_tot' => $doctor_disc_tot,
												'family_disc_per' => $family_disc_per,
												'family_disc_tot' => $family_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,

												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,

												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_max_bupa_reassure_ind_policy_arr))
												$result_data = $this->Mpolicy->update_max_bupa_reassure_ind_policy($update_max_bupa_reassure_ind_policy_arr, $medi_max_bupa_reassure_ind_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
									if ($floater_policy_type == "Red Carpet") {
										// print_r($medi_star_health_ind_policy_id);
										// die();
										if (!empty($medi_star_health_ind_policy_id)) {
											$update_star_health_red_carpet_ind_policy_arr = array(
												'medi_star_health_ind_policy_id' => $medi_star_health_ind_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_red_carpet_medi_ind_json_data' => $total_star_health_red_carpet_medi_ind_json_data,

												'years_of_premium' => $years_of_premium,

												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,

												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_star_health_red_carpet_ind_policy_arr))
												$result_data = $this->Mpolicy->update_star_health_red_carpet_ind_policy($update_star_health_red_carpet_ind_policy_arr, $medi_star_health_ind_policy_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Comprehensive") {
										// print_r($medi_star_health_comp_ind_policy_id);
										// die();
										if (!empty($medi_star_health_comp_ind_policy_id)) {
											$update_star_health_comprehensive_ind_policy_arr = array(
												'medi_star_health_comp_ind_policy_id' => $medi_star_health_comp_ind_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_comprehensive_medi_ind_json_data' => $total_star_health_comprehensive_medi_ind_json_data,

												'years_of_premium' => $years_of_premium,

												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,

												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_star_health_comprehensive_ind_policy_arr))
												$result_data = $this->Mpolicy->update_star_health_comprehensive_ind_policy($update_star_health_comprehensive_ind_policy_arr, $medi_star_health_comp_ind_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif ($company_txt == "United India Insurance Co Ltd") {
									if ($floater_policy_type == "Individual Health Insurance Policy") {
										if (!empty($mediclaim_policy_id)) {
											$update_mediclaim_policy_arr = array(
												'mediclaim_policy_id' => $mediclaim_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_mediclaim_json' => $total_mediclaim,
												'medi_total_ncd_amount' => $medi_total_ncd_amount,
												'medi_total_amount' => $medi_total_amount,
												'medi_family_disc_rate' => $medi_family_disc_rate,
												'medi_family_disc_tot' => $medi_family_disc_tot,
												'medi_premium_after_fd' => $medi_premium_after_fd,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_mediclaim_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_mediclaim_policy_arr))
												$result_data = $this->Mpolicy->update_mediclaim_policy($update_mediclaim_policy_arr, $mediclaim_policy_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Floater 2020(Individual)") {
										if (!empty($medi_ind2020_policy_id)) {
											$update_medi_ind2020_policy_arr = array(
												'medi_ind2020_policy_id' => $medi_ind2020_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_medi_ind2020_json' => $total_mediclaim_indi2020,
												'medi_ind_2020_total_premium' => $medi_ind_2020_total_premium,
												'medi_ind_2020_family_descount_per' => $medi_ind_2020_family_descount_per,
												'medi_ind_2020_family_descount_tot' => $medi_ind_2020_family_descount_tot,
												'medi_ind_2020_load_description' => $medi_ind_2020_load_description,
												'medi_ind_2020_load_amount' => $medi_ind_2020_load_amount,
												'medi_ind_2020_restore_cover_premium' => $medi_ind_2020_restore_cover_premium,
												'medi_ind_2020_maternity_new_bornbaby' => $medi_ind_2020_maternity_new_bornbaby,
												'medi_ind_2020_daily_cash_allow_hosp' => $medi_ind_2020_daily_cash_allow_hosp,
												'medi_ind_2020_load_gross_premium' => $medi_ind_2020_load_gross_premium,
												'new_load_gross_premium' => $new_load_gross_premium,
												'medi_ind_2020_cgst_rate' => $medi_ind_2020_cgst_rate,
												'medi_ind_2020_cgst_tot' => $medi_ind_2020_cgst_tot,
												'medi_ind_2020_sgst_rate' => $medi_ind_2020_sgst_rate,
												'medi_ind_2020_sgst_tot' => $medi_ind_2020_sgst_tot,
												'medi_ind_2020_final_premium' => $medi_ind_2020_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_medi_ind2020_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_medi_ind2020_policy_arr))
												$result_data = $this->Mpolicy->update_medi_ind2020_policy($update_medi_ind2020_policy_arr, $medi_ind2020_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif ($company_txt == "Care Health Insurance Co Ltd") {
									if ($floater_policy_type == "Care Advantage") {
										if (!empty($care_adv_ind_id)) {
											$update_care_adv_ind_policy_arr = array(
												'care_adv_ind_id' => $care_adv_ind_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_care_adv_ind_json_data' => $total_care_adv_ind_json_data,
												'medi_final_premium' => $medi_final_premium,

												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_care_adv_ind_policy_arr))
												$result_data = $this->Mpolicy->update_care_adv_ind_policy($update_care_adv_ind_policy_arr, $care_adv_ind_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Care") {
										if (!empty($care_ind_id)) {
											$update_care_ind_policy_arr = array(
												'care_ind_id' => $care_ind_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_care_ind_json_data' => $total_care_ind_json_data,
												'medi_final_premium' => $medi_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_care_ind_policy_arr))
												$result_data = $this->Mpolicy->update_care_ind_policy($update_care_ind_policy_arr, $care_ind_id, $policy_id, $policy_name);
										}
									}
								}
							}
						}
					}
				}
				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") {
					// print_r($medi_floater_2014_id);
					// die();
					if (!empty($policy_type_txt)) {
						if ($policy_type != 3) {
							if ($policy_type_txt == "Floater") {
								if ($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") {
									if ($floater_policy_type == "Optima Restore") {
										if (!empty($medi_hdfc_ergo_health_insu_float_policy_id)) {
											$update_medi_hdfc_ergo_health_insu_float_policy_arr = array(
												'medi_hdfc_ergo_health_insu_float_policy_id' => $medi_hdfc_ergo_health_insu_float_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_medi_float_hdfc_json_data' => $total_medi_float_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
												'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
												'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
												'protect_ride_prem_tot' => $protect_ride_prem_tot,
												'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
												'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'stay_active_benefit' => $stay_active_benefit,
												'stay_active_benefit_prem_tot' => $stay_active_benefit_prem_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_medi_hdfc_ergo_health_insu_float_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_medi_hdfc_ergo_health_insu_float_policy_arr))
												$result_data = $this->Mpolicy->update_medi_hdfc_ergo_health_insu_float_policy($update_medi_hdfc_ergo_health_insu_float_policy_arr, $medi_hdfc_ergo_health_insu_float_policy_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Health Suraksha") {
										if (!empty($medi_hdfc_ergo_health_float_suraksha_policy_id)) {
											$update_medi_hdfc_ergo_health_insu_suraksha_float_policy_arr = array(
												'medi_hdfc_ergo_health_float_suraksha_policy_id' => $medi_hdfc_ergo_health_float_suraksha_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_suraksha_float_medi_hdfc_json_data' => $total_suraksha_float_medi_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
												'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
												'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'less_disc_tot' => $less_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_medi_hdfc_ergo_health_insu_suraksha_float_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_medi_hdfc_ergo_health_insu_suraksha_float_policy_arr))
												$result_data = $this->Mpolicy->update_medi_hdfc_ergo_health_insu_suraksha_float_policy($update_medi_hdfc_ergo_health_insu_suraksha_float_policy_arr, $medi_hdfc_ergo_health_float_suraksha_policy_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Easy Health") {
										if (!empty($medi_hdfc_ergo_health_insu_easy_float_policy_id)) {
											$update_medi_hdfc_ergo_health_insu_easy_rate_float_policy_arr = array(
												'medi_hdfc_ergo_health_insu_easy_float_policy_id' => $medi_hdfc_ergo_health_insu_easy_float_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_easy_float_medi_hdfc_json_data' => $total_easy_float_medi_hdfc_json_data,
												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'tot_premium' => $tot_premium,
												'hdfc_ergo_health_insu_child_count' => $hdfc_ergo_health_insu_child_count,
												'hdfc_ergo_health_insu_child_count_first_premium' => $hdfc_ergo_health_insu_child_count_first_premium,
												'hdfc_ergo_health_insu_child_total_premium' => $hdfc_ergo_health_insu_child_total_premium,
												'protect_ride_prem_tot' => $protect_ride_prem_tot,
												'hospital_daily_cash_prem_tot' => $hospital_daily_cash_prem_tot,
												'ipa_rider_prem_tot' => $ipa_rider_prem_tot,
												'load_desc' => $load_desc,
												'load_tot' => $load_tot,
												'less_disc_per' => $less_disc_per,
												'tot_basic_prem' => $tot_basic_prem,
												'less_disc_tot' => $less_disc_tot,
												'stay_active_benefit' => $stay_active_benefit,
												'stay_active_benefit_prem' => $stay_active_benefit_prem,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_medi_hdfc_ergo_health_insu_easy_rate_float_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_medi_hdfc_ergo_health_insu_easy_rate_float_policy_arr))
												$result_data = $this->Mpolicy->update_medi_hdfc_ergo_health_insu_easy_rate_float_policy($update_medi_hdfc_ergo_health_insu_easy_rate_float_policy_arr, $medi_hdfc_ergo_health_insu_easy_float_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif ($company_txt == "The New India Assurance Co Ltd") {
									if ($floater_policy_type == "New India Floater Mediclaim") {
										if (!empty($medi_new_india_assu_float_policy_id)) {
											$update_floater_the_new_india_medi_assu_policy_arr = array(
												'medi_new_india_assu_float_policy_id' => $medi_new_india_assu_float_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_the_new_india_medi_float_json_data' => $total_the_new_india_medi_float_json_data,
												'tot_premium' => $tot_premium,
												'floater_disc_rate' => $floater_disc_rate,
												'floater_disc_tot' => $floater_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_floater_the_new_india_medi_assu_policy_arr))
												$result_data = $this->Mpolicy->update_floater_the_new_india_medi_assu_policy($update_floater_the_new_india_medi_assu_policy_arr, $medi_new_india_assu_float_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif (($company_txt == "Max Bupa Health Insurance Co Ltd") || ($company_txt == "Niva Bupa Health Insurance Co Ltd")) {
									if ($floater_policy_type == "Reassure") {
										if (!empty($medi_max_bupa_reassure_float_policy_id)) {
											$update_max_bupa_reassure_float_policy_arr = array(
												'medi_max_bupa_reassure_float_policy_id' => $medi_max_bupa_reassure_float_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_max_bupa_medi_float_reassure_json_data' => $total_max_bupa_medi_float_reassure_json_data,

												'years_of_premium' => $years_of_premium,
												'region' => $region,
												'first_year_rate' => $first_year_rate,
												'second_year_rate' => $second_year_rate,
												'third_year_rate' => $third_year_rate,
												'first_year_tot' => $first_year_tot,
												'second_year_tot' => $second_year_tot,
												'third_year_tot' => $third_year_tot,
												'tot_term_disc' => $tot_term_disc,

												'tot_premium' => $tot_premium,
												'stand_instu_rate' => $stand_instu_rate,
												'stand_instu_tot' => $stand_instu_tot,
												'doctor_disc_per' => $doctor_disc_per,
												'doctor_disc_tot' => $doctor_disc_tot,
												'gross_premium_tot' => $gross_premium_tot,
												'gross_premium_tot_new' => $gross_premium_tot_new,

												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,

												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_max_bupa_reassure_float_policy_arr))
												$result_data = $this->Mpolicy->update_max_bupa_reassure_float_policy($update_max_bupa_reassure_float_policy_arr, $medi_max_bupa_reassure_float_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
									if ($floater_policy_type == "Red Carpet") {
										if (!empty($medi_star_health_float_policy_id)) {
											$update_star_health_red_carpet_float_policy_arr = array(
												'medi_star_health_float_policy_id' => $medi_star_health_float_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_red_carpet_medi_float_json_data' => $total_star_health_red_carpet_medi_float_json_data,

												'years_of_premium' => $years_of_premium,

												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,

												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_star_health_red_carpet_float_policy_arr))
												$result_data = $this->Mpolicy->update_star_health_red_carpet_float_policy($update_star_health_red_carpet_float_policy_arr, $medi_star_health_float_policy_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Comprehensive") {
										if (!empty($medi_star_health_comp_float_policy_id)) {
											$update_star_health_comprehensive_float_policy_arr = array(
												'medi_star_health_comp_float_policy_id' => $medi_star_health_comp_float_policy_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_star_health_comprehensive_medi_float_json_data' => $total_star_health_comprehensive_medi_float_json_data,

												'years_of_premium' => $years_of_premium,

												'tot_premium' => $tot_premium,
												'medi_cgst_rate' => $medi_cgst_rate,
												'medi_cgst_tot' => $medi_cgst_tot,
												'medi_sgst_rate' => $medi_sgst_rate,
												'medi_sgst_tot' => $medi_sgst_tot,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,

												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_star_health_comprehensive_float_policy_arr))
												$result_data = $this->Mpolicy->update_star_health_comprehensive_float_policy($update_star_health_comprehensive_float_policy_arr, $medi_star_health_comp_float_policy_id, $policy_id, $policy_name);
										}
									}
								} elseif ($company_txt == "United India Insurance Co Ltd") {
									if ($floater_policy_type == "Family Floater 2014") {
										if (!empty($medi_floater_2014_id)) {
											$update_mediclaim_floater_2014_policy_arr = array(
												'medi_floater_2014_id' => $medi_floater_2014_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_medi_floater_2014_json' => $total_mediclaim_floater2014,
												'name_insured_sum_insured' => $name_insured_sum_insured,
												'name_insured_premium' => $name_insured_premium,
												'medi_float_2014_total_premium' => $medi_float_2014_total_premium,
												'medi_float_2014_child_count' => $medi_float_2014_child_count,
												'medi_float_2014_child_count_first_premium' => $medi_float_2014_child_count_first_premium,
												'medi_float_2014_child_total_premium' => $medi_float_2014_child_total_premium,
												'medi_float_2014_load_description' => $medi_float_2014_load_description,
												'medi_float_2014_load_amount' => $medi_float_2014_load_amount,
												'medi_float_2014_load_gross_premium' => $medi_float_2014_load_gross_premium,
												'medi_float_2014_cgst_rate' => $medi_float_2014_cgst_rate,
												'medi_float_2014_cgst_tot' => $medi_float_2014_cgst_tot,
												'medi_float_2014_sgst_rate' => $medi_float_2014_sgst_rate,
												'medi_float_2014_sgst_tot' => $medi_float_2014_sgst_tot,
												'medi_float_2014_final_premium' => $medi_float_2014_final_premium,
												'max_age' => $max_age,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_mediclaim_floater_2014_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_mediclaim_floater_2014_policy_arr))
												$result_data = $this->Mpolicy->update_mediclaim_floater_2014_policy($update_mediclaim_floater_2014_policy_arr, $medi_floater_2014_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Family Floater 2020") {
										// print_r($floater_policy_type);
										// die();
										if (!empty($medi_floater_2020_id)) {
											$update_medi_floater_2020_policy_arr = array(
												'medi_floater_2020_id' => $medi_floater_2020_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'policy_name_txt' => $policy_name_txt,
												'tot_medi_floater_2020_json' => $total_mediclaim_floater2020,
												'name_insured_sum_insured' => $name_insured_sum_insured,
												'name_insured_premium' => $name_insured_premium,
												'name_insured_ncd' => $name_insured_ncd,
												'name_insured_premium_after_ncd' => $name_insured_premium_after_ncd,
												'medi_float_2020_total_premium' => $medi_float_2020_total_premium,
												'medi_float_2020_child_count' => $medi_float_2020_child_count,
												'medi_float_2020_child_count_first_premium' => $medi_float_2020_child_count_first_premium,
												'medi_float_2020_child_total_premium' => $medi_float_2020_child_total_premium,
												'medi_float_2020_load_description' => $medi_float_2020_load_description,
												'medi_float_2020_load_amount' => $medi_float_2020_load_amount,
												'medi_float_2020_restore_cover_premium' => $medi_float_2020_restore_cover_premium,
												'medi_float_2020_maternity_new_bornbaby' => $medi_float_2020_maternity_new_bornbaby,
												'medi_float_2020_daily_cash_allow_hosp' => $medi_float_2020_daily_cash_allow_hosp,
												'medi_float_2020_load_gross_premium' => $medi_float_2020_load_gross_premium,
												'medi_float_2020_cgst_rate' => $medi_float_2020_cgst_rate,
												'medi_float_2020_cgst_tot' => $medi_float_2020_cgst_tot,
												'medi_float_2020_sgst_rate' => $medi_float_2020_sgst_rate,
												'medi_float_2020_sgst_tot' => $medi_float_2020_sgst_tot,
												'medi_float_2020_final_premium' => $medi_float_2020_final_premium,
												'max_age' => $max_age,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											// print_r($update_medi_floater_2020_policy_arr);
											// die();
											$this->load->model("Mpolicy");
											if (!empty($update_medi_floater_2020_policy_arr))
												$result_data = $this->Mpolicy->update_medi_floater_2020_policy($update_medi_floater_2020_policy_arr, $medi_floater_2020_id, $policy_id, $policy_name);
										}
									}
								} elseif ($company_txt == "Care Health Insurance Co Ltd") {
									if ($floater_policy_type == "Care Advantage") {
										if (!empty($care_adv_float_id)) {
											$update_care_adv_float_policy_arr = array(
												'care_adv_float_id' => $care_adv_float_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_care_adv_float_json_data' => $total_care_adv_float_json_data,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_care_adv_float_policy_arr))
												$result_data = $this->Mpolicy->update_care_adv_float_policy($update_care_adv_float_policy_arr, $care_adv_float_id, $policy_id, $policy_name);
										}
									} elseif ($floater_policy_type == "Care") {
										if (!empty($care_float_id)) {
											$update_care_float_policy_arr = array(
												'care_float_id' => $care_float_id,
												'fk_policy_id' => $policy_id,
												'fk_policy_type_id' => $policy_name,
												'fk_company_id' => $company,
												'fk_department_id' => $department,
												'policy_name_txt' => $policy_name_txt,
												'total_care_float_json_data' => $total_care_float_json_data,
												'medi_final_premium' => $medi_final_premium,
												'max_age' => $max_age,
												'modify_dt' => date("Y-m-d h:i:s")
											);
											$this->load->model("Mpolicy");
											if (!empty($update_care_float_policy_arr))
												$result_data = $this->Mpolicy->update_care_float_policy($update_care_float_policy_arr, $care_float_id, $policy_id, $policy_name);
										}
									}
								}
							}
						}
					}
				}

				if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Individual") {
					// print_r($common_ind_policy_id);
					// die();
					if (!empty($common_ind_policy_id)) {
						if ($policy_type != 3) {
							if ($policy_type_txt == "Common Individual") {
								$update_common_ind_policy_arr = array(
									'common_ind_policy_id' => $common_ind_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'tot_commind_json_data' => $tot_commind_json_data,
									'comm_ind_total_amount' => $comm_ind_total_amount,
									'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
									'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
									'comm_ind_load_desc' => $comm_ind_load_desc,
									'comm_ind_load_tot' => $comm_ind_load_tot,
									'comm_ind_gross_premium' => $comm_ind_gross_premium,
									'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
									'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
									'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
									'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
									'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
									'comm_ind_final_premium' => $comm_ind_final_premium,
									'modify_dt' => date("Y-m-d h:i:s")
								);
								$this->load->model("Mpolicy");
								if (!empty($update_common_ind_policy_arr))
									$result_data = $this->Mpolicy->update_common_ind_policy($update_common_ind_policy_arr, $common_ind_policy_id, $policy_id, $policy_name);
							}
						}
					}
				}

				if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Floater") {
					// print_r($common_float_policy_id);
					// die();
					if (!empty($common_float_policy_id)) {
						if ($policy_type != 3) {
							if ($policy_type_txt == "Common Floater") {
								$update_common_float_policy_arr = array(
									'common_float_policy_id' => $common_float_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'tot_commfloat_json_data' => $tot_commfloat_json_data,
									'comm_float_total_amount' => $comm_float_total_amount,
									'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
									'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
									'comm_float_load_desc' => $comm_float_load_desc,
									'comm_float_load_tot' => $comm_float_load_tot,
									'comm_float_gross_premium' => $comm_float_gross_premium,
									'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
									'comm_float_cgst_rate' => $comm_float_cgst_rate,
									'comm_float_cgst_tot' => $comm_float_cgst_tot,
									'comm_float_sgst_rate' => $comm_float_sgst_rate,
									'comm_float_sgst_tot' => $comm_float_sgst_tot,
									'comm_float_final_premium' => $comm_float_final_premium,
									'modify_dt' => date("Y-m-d h:i:s")
								);

								$this->load->model("Mpolicy");
								if (!empty($update_common_float_policy_arr))
									$result_data = $this->Mpolicy->update_common_float_policy($update_common_float_policy_arr, $common_float_policy_id, $policy_id, $policy_name);
							}
						}
					}
				}

				if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater")) {
					// print_r($supertopup_floater_policy_id);
					// die();

					if ($policy_type != 3) {
						if ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater") {
							if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Floater") {
								if (!empty($supertopup_float_policy_id)) {
									$update_hdfc_ergo_supertopup_floater_policy_arr = array(
										'supertopup_float_policy_id' => $supertopup_float_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'tot_supertopup_float_hdfc_json' => $tot_supertopup_float_hdfc_json,
										'years_of_premium' => $years_of_premium,
										'tot_premium' => $tot_premium,
										'load_desc' => $load_desc,
										'load_tot' => $load_tot,
										'less_disc_per' => $less_disc_per,
										'less_disc_tot' => $less_disc_tot,
										'gross_premium_tot' => $gross_premium_tot,
										'gross_premium_tot_new' => $gross_premium_tot_new,
										'medi_cgst_rate' => $medi_cgst_rate,
										'medi_cgst_tot' => $medi_cgst_tot,
										'medi_sgst_rate' => $medi_sgst_rate,
										'medi_sgst_tot' => $medi_sgst_tot,
										'medi_final_premium' => $medi_final_premium,
										'max_age' => $max_age,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									$this->load->model("Mpolicy");
									if (!empty($update_hdfc_ergo_supertopup_floater_policy_arr))
										$result_data = $this->Mpolicy->update_hdfc_ergo_supertopup_floater_policy($update_hdfc_ergo_supertopup_floater_policy_arr, $supertopup_float_policy_id, $policy_id, $policy_name);
								}
							} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Floater") {
								if (!empty($the_new_india_supertopup_assu_ind_policy_id)) {
									$update_the_new_india_supertopup_ind_policy_arr = array(
										'the_new_india_supertopup_assu_ind_policy_id' => $the_new_india_supertopup_assu_ind_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'total_the_new_india_supertopup_ind_json_data' => $total_the_new_india_supertopup_ind_json_data,
										'tot_premium' => $tot_premium,
										'medi_cgst_rate' => $medi_cgst_rate,
										'medi_cgst_tot' => $medi_cgst_tot,
										'medi_sgst_rate' => $medi_sgst_rate,
										'medi_sgst_tot' => $medi_sgst_tot,
										'medi_final_premium' => $medi_final_premium,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									$this->load->model("Mpolicy");
									if (!empty($update_the_new_india_supertopup_ind_policy_arr))
										$result_data = $this->Mpolicy->update_the_new_india_supertopup_ind_policy($update_the_new_india_supertopup_ind_policy_arr, $the_new_india_supertopup_assu_ind_policy_id, $policy_id, $policy_name);
								}
							} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Floater") {
								if (!empty($medi_star_health_super_float_policy_id)) {
									$update_star_health_supertopup_float_policy_arr = array(
										'medi_star_health_super_float_policy_id' => $medi_star_health_super_float_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'total_star_health_supertopup_float_json_data' => $total_star_health_supertopup_float_json_data,
										'tot_premium' => $tot_premium,
										'medi_cgst_rate' => $medi_cgst_rate,
										'medi_cgst_tot' => $medi_cgst_tot,
										'medi_sgst_rate' => $medi_sgst_rate,
										'medi_sgst_tot' => $medi_sgst_tot,
										'medi_final_premium' => $medi_final_premium,
										'max_age' => $max_age,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									$this->load->model("Mpolicy");
									if (!empty($update_star_health_supertopup_float_policy_arr))
										$result_data = $this->Mpolicy->update_star_health_supertopup_float_policy($update_star_health_supertopup_float_policy_arr, $medi_star_health_super_float_policy_id, $policy_id, $policy_name);
								}
							} else {
								if (!empty($supertopup_floater_policy_id)) {
									$update_supertopup_floater_policy_arr = array(
										'supertopup_floater_policy_id' => $supertopup_floater_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'policy_name_txt' => $policy_name_txt,
										'tot_supertopup_floater_json' => $tot_supertopup_floater_json,
										'name_insured_policy_option' => $name_insured_policy_option,
										'name_insured_deductable_thershold' => $name_insured_deductable_thershold,
										'name_insured_sum_insured' => $name_insured_sum_insured,
										'name_insured_premium' => $name_insured_premium,
										'supertopup_floater_total_premium' => $supertopup_floater_total_premium,
										'supertopup_floater_load_description' => $supertopup_floater_description,
										'supertopup_floater_load_amount' => $supertopup_floater_load_amount,
										'supertopup_floater_load_gross_premium' => $supertopup_floater_load_gross_premium,
										'supertopup_floater_cgst_rate' => $supertopup_floater_cgst_rate,
										'supertopup_floater_cgst_tot' => $supertopup_floater_cgst_tot,
										'supertopup_floater_sgst_rate' => $supertopup_floater_sgst_rate,
										'supertopup_floater_sgst_tot' => $supertopup_floater_sgst_tot,
										'supertopup_floater_final_premium' => $supertopup_floater_final_premium,
										'max_age' => $max_age,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									// print_r($update_supertopup_floater_policy_arr);
									// die();
									$this->load->model("Mpolicy");
									if (!empty($update_supertopup_floater_policy_arr))
										$result_data = $this->Mpolicy->update_supertopup_floater_policy($update_supertopup_floater_policy_arr, $supertopup_floater_policy_id, $policy_id, $policy_name);
								}
							}
						}
					}
				}

				if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual")) {
					// print_r($supertopup_ind_policy_id);
					// die();supertopup_ind_policy_id
					if ($policy_type != 3) {
						if ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual") {
							if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Individual") {
								if (!empty($supertopup_ind_policy_id)) {
									$update_hdfc_ergo_supertopup_ind_policy_arr = array(
										'supertopup_ind_policy_id' => $supertopup_ind_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'tot_supertopup_ind_hdfc_json' => $tot_supertopup_ind_hdfc_json,
										'years_of_premium' => $years_of_premium,
										'tot_premium' => $tot_premium,
										'load_desc' => $load_desc,
										'load_tot' => $load_tot,
										'less_disc_per' => $less_disc_per,
										'less_disc_tot' => $less_disc_tot,
										'gross_premium_tot' => $gross_premium_tot,
										'gross_premium_tot_new' => $gross_premium_tot_new,
										'medi_cgst_rate' => $medi_cgst_rate,
										'medi_cgst_tot' => $medi_cgst_tot,
										'medi_sgst_rate' => $medi_sgst_rate,
										'medi_sgst_tot' => $medi_sgst_tot,
										'medi_final_premium' => $medi_final_premium,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									$this->load->model("Mpolicy");
									if (!empty($update_hdfc_ergo_supertopup_ind_policy_arr))
										$result_data = $this->Mpolicy->update_hdfc_ergo_supertopup_ind_policy($update_hdfc_ergo_supertopup_ind_policy_arr, $supertopup_ind_policy_id, $policy_id, $policy_name);
								}
							} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Individual") {
								if (!empty($the_new_india_supertopup_assu_ind_single_policy_id)) {
									$update_the_new_india_supertopup_ind_single_policy_arr = array(
										'the_new_india_supertopup_assu_ind_single_policy_id' => $the_new_india_supertopup_assu_ind_single_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'total_the_new_india_supertopup_ind_single_json_data' => $total_the_new_india_supertopup_ind_single_json_data,
										'tot_premium' => $tot_premium,
										'medi_cgst_rate' => $medi_cgst_rate,
										'medi_cgst_tot' => $medi_cgst_tot,
										'medi_sgst_rate' => $medi_sgst_rate,
										'medi_sgst_tot' => $medi_sgst_tot,
										'medi_final_premium' => $medi_final_premium,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									$this->load->model("Mpolicy");
									if (!empty($update_the_new_india_supertopup_ind_single_policy_arr))
										$result_data = $this->Mpolicy->update_the_new_india_supertopup_ind_single_policy($update_the_new_india_supertopup_ind_single_policy_arr, $the_new_india_supertopup_assu_ind_single_policy_id, $policy_id, $policy_name);
								}
							} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Individual") {
								if (!empty($medi_star_health_super_ind_policy_id)) {
									$update_star_health_supertopup_ind_policy_arr = array(
										'medi_star_health_super_ind_policy_id' => $medi_star_health_super_ind_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'fk_company_id' => $company,
										'fk_department_id' => $department,
										'policy_name_txt' => $policy_name_txt,
										'total_star_health_supertopup_ind_json_data' => $total_star_health_supertopup_ind_json_data,
										'tot_premium' => $tot_premium,
										'medi_cgst_rate' => $medi_cgst_rate,
										'medi_cgst_tot' => $medi_cgst_tot,
										'medi_sgst_rate' => $medi_sgst_rate,
										'medi_sgst_tot' => $medi_sgst_tot,
										'medi_final_premium' => $medi_final_premium,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									$this->load->model("Mpolicy");
									if (!empty($update_star_health_supertopup_ind_policy_arr))
										$result_data = $this->Mpolicy->update_star_health_supertopup_ind_policy($update_star_health_supertopup_ind_policy_arr, $medi_star_health_super_ind_policy_id, $policy_id, $policy_name);
								}
							} else {
								// print_r($supertopup_ind_policy_id);
								// die();
								if (!empty($supertopup_ind_policy_id)) {
									$update_supertopup_ind_policy_arr = array(
										'supertopup_ind_policy_id' => $supertopup_ind_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'policy_name_txt' => $policy_name_txt,
										'tot_supertopup_ind_json' => $tot_supertopup_ind_json,
										'supertopup_ind_total_premium' => $supertopup_ind_total_premium,
										'supertopup_ind_load_description' => $supertopup_ind_description,
										'supertopup_ind_load_amount' => $supertopup_ind_load_amount,
										'supertopup_ind_load_gross_premium' => $supertopup_ind_load_gross_premium,
										'supertopup_ind_cgst_rate' => $supertopup_ind_cgst_rate,
										'supertopup_ind_cgst_tot' => $supertopup_ind_cgst_tot,
										'supertopup_ind_sgst_rate' => $supertopup_ind_sgst_rate,
										'supertopup_ind_sgst_tot' => $supertopup_ind_sgst_tot,
										'supertopup_ind_final_premium' => $supertopup_ind_final_premium,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									// print_r($update_supertopup_ind_policy_arr);
									// die();
									$this->load->model("Mpolicy");
									if (!empty($update_supertopup_ind_policy_arr))
										$result_data = $this->Mpolicy->update_supertopup_ind_policy($update_supertopup_ind_policy_arr, $supertopup_ind_policy_id, $policy_id, $policy_name);
								}
							}
						}
					}
				}

				// if ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Common Individual") {
				// 	// print_r($common_ind_policy_id);
				// 	// die();
				// 	if (!empty($common_ind_policy_id)) {
				// 		if ($policy_type != 3) {
				// 			if ($policy_type_txt == "Common Individual") {
				// 				$update_common_ind_policy_arr = array(
				// 					'common_ind_policy_id' => $common_ind_policy_id,
				// 					'fk_policy_id' => $policy_id,
				// 					'fk_policy_type_id' => $policy_name,
				// 					'fk_company_id' => $company,
				// 					'fk_department_id' => $department,
				// 					'policy_name_txt' => $policy_name_txt,
				// 					'tot_commind_json_data' => $tot_commind_json_data,
				// 					'comm_ind_total_amount' => $comm_ind_total_amount,
				// 					'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
				// 					'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
				// 					'comm_ind_load_desc' => $comm_ind_load_desc,
				// 					'comm_ind_load_tot' => $comm_ind_load_tot,
				// 					'comm_ind_gross_premium' => $comm_ind_gross_premium,
				// 					'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
				// 					'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
				// 					'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
				// 					'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
				// 					'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
				// 					'comm_ind_final_premium' => $comm_ind_final_premium,
				// 					'modify_dt' => date("Y-m-d h:i:s")
				// 				);
				// 				$this->load->model("Mpolicy");
				// 				if (!empty($update_common_ind_policy_arr))
				// 					$result_data = $this->Mpolicy->update_common_ind_policy($update_common_ind_policy_arr, $common_ind_policy_id, $policy_id, $policy_name);
				// 			}
				// 		}
				// 	}
				// }

				// if ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Common Floater") {
				// 	// print_r($common_float_policy_id);
				// 	// die();
				// 	if (!empty($common_float_policy_id)) {
				// 		if ($policy_type != 3) {
				// 			if ($policy_type_txt == "Common Floater") {
				// 				$update_common_float_policy_arr = array(
				// 					'common_float_policy_id' => $common_float_policy_id,
				// 					'fk_policy_id' => $policy_id,
				// 					'fk_policy_type_id' => $policy_name,
				// 					'fk_company_id' => $company,
				// 					'fk_department_id' => $department,
				// 					'policy_name_txt' => $policy_name_txt,
				// 					'tot_commfloat_json_data' => $tot_commfloat_json_data,
				// 					'comm_float_total_amount' => $comm_float_total_amount,
				// 					'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
				// 					'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
				// 					'comm_float_load_desc' => $comm_float_load_desc,
				// 					'comm_float_load_tot' => $comm_float_load_tot,
				// 					'comm_float_gross_premium' => $comm_float_gross_premium,
				// 					'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
				// 					'comm_float_cgst_rate' => $comm_float_cgst_rate,
				// 					'comm_float_cgst_tot' => $comm_float_cgst_tot,
				// 					'comm_float_sgst_rate' => $comm_float_sgst_rate,
				// 					'comm_float_sgst_tot' => $comm_float_sgst_tot,
				// 					'comm_float_final_premium' => $comm_float_final_premium,
				// 					'modify_dt' => date("Y-m-d h:i:s")
				// 				);

				// 				$this->load->model("Mpolicy");
				// 				if (!empty($update_common_float_policy_arr))
				// 					$result_data = $this->Mpolicy->update_common_float_policy($update_common_float_policy_arr, $common_float_policy_id, $policy_id, $policy_name);
				// 			}
				// 		}
				// 	}
				// }

				if ($policy_name_txt == "Bharat Sookshma Udyam") {
					if (!empty($sookshma_fire_policy_id)) {
						if ($policy_type != 3) {
							$update_sookshma_arr = array(
								'sookshma_fire_policy_id' => $sookshma_fire_policy_id,
								'total_sum_assured' => $total_sum_assured,
								'fire_rate_per' => $fire_rate_per,
								'fire_rate_tot_amount' => $fire_rate_tot,
								'less_discount_per' => $less_discount_per,
								'less_discount_tot_amount' => $less_discount_tot,
								'fire_rate_after_discount' => $fire_rate_after_discount_tot,
								'gross_premium' => $gross_premium,
								'cgst_rate_per' => $cgst_fire_per,
								'cgst_tot_amount' => $cgst_fire_tot,
								'sgst_rate_per' => $sgst_fire_per,
								'sgst_tot_amount' => $sgst_fire_tot,
								'final_payable_premium' => $final_paybal_premium,
								'fk_policy_id' => $policy_id,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							$this->load->model("Mpolicy");
							if (!empty($update_sookshma_arr))
								$result_data = $this->Mpolicy->update_sookshma_policy($update_sookshma_arr, $sookshma_fire_policy_id, $policy_id);
						}
					}
				} elseif ($policy_name_txt == "Bharat Laghu Udyam") {
					if (!empty($laghu_fire_policy_id)) {
						if ($policy_type != 3) {
							$update_laghu_fire_arr = array(
								'laghu_fire_policy_id' => $laghu_fire_policy_id,
								'total_sum_assured' => $total_sum_assured,
								'fire_rate_per' => $fire_rate_per,
								'fire_rate_tot_amount' => $fire_rate_tot,
								'less_discount_per' => $less_discount_per,
								'less_discount_tot_amount' => $less_discount_tot,
								'fire_rate_after_discount' => $fire_rate_after_discount_tot,
								'gross_premium' => $gross_premium,
								'cgst_rate_per' => $cgst_fire_per,
								'cgst_tot_amount' => $cgst_fire_tot,
								'sgst_rate_per' => $sgst_fire_per,
								'sgst_tot_amount' => $sgst_fire_tot,
								'final_payable_premium' => $final_paybal_premium,
								'fk_policy_id' => $policy_id,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							$this->load->model("Mpolicy");
							if (!empty($update_laghu_fire_arr))
								$result_data = $this->Mpolicy->update_laghu_fire_policy($update_laghu_fire_arr, $laghu_fire_policy_id, $policy_id);
						}
					}
				} elseif ($policy_name_txt == "Bharat Griha Raksha") {
					if (!empty($griharaksha_fire_policy_id)) {
						if ($policy_type != 3) {
							$update_griharaksha_arr = array(
								'griharaksha_fire_policy_id' => $griharaksha_fire_policy_id,
								'total_sum_assured' => $total_sum_assured,
								'fire_rate_per' => $fire_rate_per,
								'fire_rate_tot_amount' => $fire_rate_tot,
								'less_discount_per' => $less_discount_per,
								'less_discount_tot_amount' => $less_discount_tot,
								'fire_rate_after_discount' => $fire_rate_after_discount_tot,
								'gross_premium' => $gross_premium,
								'cgst_rate_per' => $cgst_fire_per,
								'cgst_tot_amount' => $cgst_fire_tot,
								'sgst_rate_per' => $sgst_fire_per,
								'sgst_tot_amount' => $sgst_fire_tot,
								'final_payable_premium' => $final_paybal_premium,
								'fk_policy_id' => $policy_id,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							$this->load->model("Mpolicy");
							if (!empty($update_griharaksha_arr))
								$result_data = $this->Mpolicy->update_griharaksha_policy($update_griharaksha_arr, $griharaksha_fire_policy_id, $policy_id);
						}
					}
				} elseif ($policy_name_txt == "Standard Fire & Allied Perils") {
					if (!empty($fire_allied_perils_policy_id)) {
						if ($policy_type != 3) {
							$update_fire_allied_perils_policy_arr = array(
								'fire_allied_perils_policy_id' => $fire_allied_perils_policy_id,
								'fk_policy_id' => $policy_id,
								'allied_perils_total_sum_assured' => $total_sum_assured,
								'allied_perils_fire_rate_per' => $fire_rate_per,
								'allied_perils_fire_rate_tot_amount' => $fire_rate_tot,
								'allied_perils_less_discount_per' => $less_discount_per,
								'allied_perils_less_discount_tot_amount' => $less_discount_tot,
								'allied_perils_fire_rate_after_discount' => $fire_rate_after_discount_tot,

								'allied_perils_stfi_rate' => $stfi_rate_per,
								'allied_perils_stfi_rate_total' => $stfi_rate_total,
								'allied_perils_earthquake_rate' => $earthquake_rate_per,
								'allied_perils_earthquake_rate_total' => $earthquake_rate_total,
								'allied_perils_terrorisum_rate' => $terrorisum_rate_per,
								'allied_perils_terrorisum_rate_total' => $terrorisum_rate_total,
								'tot_sum_devid' => $tot_sum_devid,

								'allied_perils_gross_premium' => $gross_premium,
								'allied_perils_cgst_rate_per' => $cgst_fire_per,
								'allied_perils_cgst_tot_amount' => $cgst_fire_tot,
								'allied_perils_sgst_rate_per' => $sgst_fire_per,
								'allied_perils_sgst_tot_amount' => $sgst_fire_tot,
								'allied_perils_final_payable_premium' => $final_paybal_premium,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							$this->load->model("Mpolicy");
							if (!empty($update_fire_allied_perils_policy_arr))
								$result_data = $this->Mpolicy->update_fire_allied_perils_policy($update_fire_allied_perils_policy_arr, $fire_allied_perils_policy_id, $policy_id);
						}
					}
				} elseif ($policy_name_txt == "Burglary") {
					if (!empty($burglary_policy_id)) {
						if ($policy_type != 3) {
							$update_burglary_arr = array(
								'burglary_policy_id' => $burglary_policy_id,
								'burglary_total_sum_assured' => $total_sum_assured,
								'burglary_fire_rate_per' => $fire_rate_per,
								'burglary_fire_rate_tot_amount' => $fire_rate_tot,
								'burglary_less_discount_per' => $less_discount_per,
								'burglary_less_discount_tot_amount' => $less_discount_tot,
								'burglary_fire_rate_after_discount' => $fire_rate_after_discount_tot,
								'burglary_gross_premium' => $gross_premium,
								'burglary_cgst_rate_per' => $cgst_fire_per,
								'burglary_cgst_tot_amount' => $cgst_fire_tot,
								'burglary_sgst_rate_per' => $sgst_fire_per,
								'burglary_sgst_tot_amount' => $sgst_fire_tot,
								'burglary_final_payable_premium' => $final_paybal_premium,
								'fk_policy_id' => $policy_id,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							$this->load->model("Mpolicy");
							if (!empty($update_burglary_arr))
								$result_data = $this->Mpolicy->update_burglary_policy($update_burglary_arr, $burglary_policy_id, $policy_id);
						}
					}
				} elseif ($policy_name_txt == "Term Plan") {
					if (!empty($term_plan_policy_id)) {
						if ($policy_type != 3) {
							$update_term_plan_policy_arr = array(
								'term_plan_policy_id' => $term_plan_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $policy_name,
								'term_plan_policy' => $policy_term,
								'term_plan_premium_paying_term' => $premium_paying_term,
								'term_plan_total_sum_insured' => $sum_insured,
								'term_plan_basic_premium' => $basic_premium,
								'term_plan_add_loading' => $add_loading,
								'term_plan_loading_description' => $loading_description,
								'term_plan_premium_after_loading' => $premium_after_loading,
								'term_plan_cgst' => $cgst_term_plan,
								'term_plan_sgst' => $sgst_term_plan,
								'term_plan_cgst_tot_ammount' => $cgst_term_plan_tot,
								'term_plan_sgst_tot_ammount' => $sgst_term_plan_tot,
								'term_plan_final_paybal_premium' => $term_plan_final_paybal_premium,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							// print_r($update_term_plan_policy_arr);
							// die();
							$this->load->model("Mpolicy");
							if (!empty($update_term_plan_policy_arr))
								$result_data = $this->Mpolicy->update_term_plan_policy($update_term_plan_policy_arr, $term_plan_policy_id, $policy_id, $policy_name);
						}
					}
				} elseif ($policy_name_txt == "Shopkeeper") {
					if (!empty($shopkeeper_policy_id)) {
						if ($policy_type != 3) {
							$update_shopkeeper_policy_arr = array(
								'shopkeeper_policy_id' => $shopkeeper_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $policy_name,
								'shopkeeper_risk_address' => $shopkeeper_risk_address,
								'fire_sum_insured_1' => $fire_sum_insured_1,
								'fire_sum_insured_2' => $fire_sum_insured_2,
								'fire_sum_insured_3' => $fire_sum_insured_3,
								'fire_rate_1' => $fire_rate_1,
								'fire_rate_2' => $fire_rate_2,
								'fire_rate_3' => $fire_rate_3,
								'fire_premium_1' => $fire_premium_1,
								'fire_premium_2' => $fire_premium_2,
								'fire_premium_3' => $fire_premium_3,

								'burglary_sum_insured_1' => $burglary_sum_insured_1,
								'burglary_sum_insured_2' => $burglary_sum_insured_2,
								'burglary_sum_insured_3' => $burglary_sum_insured_3,
								'burglary_rate_1' => $burglary_rate_1,
								'burglary_rate_2' => $burglary_rate_2,
								'burglary_rate_3' => $burglary_rate_3,
								'burglary_premium_1' => $burglary_premium_1,
								'burglary_premium_2' => $burglary_premium_2,
								'burglary_premium_3' => $burglary_premium_3,

								'money_insu_sum_insured_1' => $money_insu_sum_insured_1,
								'money_insu_sum_insured_2' => $money_insu_sum_insured_2,
								'money_insu_sum_insured_3' => $money_insu_sum_insured_3,
								'money_insu_rate_1' => $money_insu_rate_1,
								'money_insu_rate_2' => $money_insu_rate_2,
								'money_insu_rate_3' => $money_insu_rate_3,
								'money_insu_premium_1' => $money_insu_premium_1,
								'money_insu_premium_2' => $money_insu_premium_2,
								'money_insu_premium_3' => $money_insu_premium_3,

								'plate_glass_sum_insured' => $plate_glass_sum_insured,
								'plate_glass_rate_per' => $plate_glass_rate_per,
								'plate_glass_premium' => $plate_glass_premium,

								'neon_glow_sum_insured' => $neon_glow_sum_insured,
								'neon_glow_rate_per' => $neon_glow_rate_per,
								'neon_glow_premium' => $neon_glow_premium,

								'baggage_ins_sum_insured' => $baggage_ins_sum_insured,
								'baggage_ins_rate_per' => $baggage_ins_rate_per,
								'baggage_ins_premium' => $baggage_ins_premium,

								'personal_accident_json' => $total_personal_accident,
								'personal_accident_sum_insured' => $personal_accident_sum_insured,
								'personal_accident_rate_per' => $personal_accident_rate_per,
								'personal_accident_premium' => $personal_accident_premium,

								'fidelity_gaur_json' => $total_fidelity_gaur,
								'fidelity_gaur_sum_insured' => $fidelity_gaur_sum_insured,
								'fidelity_gaur_rate_per' => $fidelity_gaur_rate_per,
								'fidelity_gaur_premium' => $fidelity_gaur_premium,

								'pub_libility_sum_insured' => $pub_libility_sum_insured,
								'work_men_compens_sum_insured' => $work_men_compens_sum_insured,
								'pub_libility_rate' => $pub_libility_rate,
								'work_men_compens_rate' => $work_men_compens_rate,
								'pub_libility_premium' => $pub_libility_premium,
								'work_men_compens_premium' => $work_men_compens_premium,

								'bus_inter_sum_insured_1' => $bus_inter_sum_insured_1,
								'bus_inter_sum_insured_2' => $bus_inter_sum_insured_2,
								'bus_inter_sum_insured_3' => $bus_inter_sum_insured_3,
								'bus_inter_rate_1' => $bus_inter_rate_1,
								'bus_inter_rate_2' => $bus_inter_rate_2,
								'bus_inter_rate_3' => $bus_inter_rate_3,
								'bus_inter_premium_1' => $bus_inter_premium_1,
								'bus_inter_premium_2' => $bus_inter_premium_2,
								'bus_inter_premium_3' => $bus_inter_premium_3,

								'shopkeeper_total_sum_assured' => $shopkeeper_total_sum_assured,
								'shopkeeper_total_premium' => $shopkeeper_total_premium,
								'shopkeeper_less_discount_per' => $shopkeeper_less_discount_per,
								'shopkeeper_less_discount_tot' => $shopkeeper_less_discount_tot,
								'shopkeeper_fire_rate_after_discount_tot' => $shopkeeper_fire_rate_after_discount_tot,
								'shopkeeper_cgst_fire_per' => $shopkeeper_cgst_fire_per,
								'shopkeeper_cgst_fire_tot' => $shopkeeper_cgst_fire_tot,
								'shopkeeper_sgst_fire_per' => $shopkeeper_sgst_fire_per,
								'shopkeeper_sgst_fire_tot' => $shopkeeper_sgst_fire_tot,
								'shopkeeper_final_paybal_premium' => $shopkeeper_final_paybal_premium,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							// print_r($update_shopkeeper_policy_arr);
							// die();
							$this->load->model("Mpolicy");
							if (!empty($update_shopkeeper_policy_arr))
								$result_data = $this->Mpolicy->update_shopkeeper_policy($update_shopkeeper_policy_arr, $shopkeeper_policy_id, $policy_id, $policy_name);
						}
					}
				} elseif ($policy_name_txt == "Jweller Block") {
					if (!empty($jweller_policy_id)) {
						if ($policy_type != 3) {
							$update_jweller_policy_arr = array(
								'jweller_policy_id' => $jweller_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $policy_name,

								'stock_premises_sum_insu_1' => $stock_premises_sum_insu_1,
								'stock_premises_sum_insu_2' => $stock_premises_sum_insu_2,
								'stock_premises_sum_insu_3' => $stock_premises_sum_insu_3,
								'stock_premises_sum_insu_4' => $stock_premises_sum_insu_4,
								'stock_premises_sum_insu_5' => $stock_premises_sum_insu_5,
								'stock_premises_sum_insu_6' => $stock_premises_sum_insu_6,
								'stock_premises_premium_1' => $stock_premises_premium_1,
								'stock_premises_premium_2' => $stock_premises_premium_2,

								'stock_custody_sum_insu_1' => $stock_custody_sum_insu_1,
								'stock_custody_sum_insu_2' => $stock_custody_sum_insu_2,
								'stock_custody_sum_insu_3' => $stock_custody_sum_insu_3,
								'stock_custody_sum_insu_4' => $stock_custody_sum_insu_4,
								'stock_custody_premium_1' => $stock_custody_premium_1,
								'stock_custody_premium_2' => $stock_custody_premium_2,

								'stock_transit_sum_insu_1' => $stock_transit_sum_insu_1,
								'stock_transit_sum_insu_2' => $stock_transit_sum_insu_2,
								'stock_transit_sum_insu_3' => $stock_transit_sum_insu_3,
								'stock_transit_sum_insu_4' => $stock_transit_sum_insu_4,
								'stock_transit_premium' => $stock_transit_premium,

								'standard_fire_perils_1' => $standard_fire_perils_1,
								'standard_fire_perils_2' => $standard_fire_perils_2,
								'standard_fire_perils_3' => $standard_fire_perils_3,
								'standard_fire_perils_4' => $standard_fire_perils_4,
								'standard_fire_perils_5' => $standard_fire_perils_5,
								'standard_fire_perils_6' => $standard_fire_perils_6,
								'standard_fire_perils_premium_1' => $standard_fire_perils_premium_1,
								'standard_fire_perils_premium_2' => $standard_fire_perils_premium_2,
								'standard_fire_perils_premium_3' => $standard_fire_perils_premium_3,

								'content_burglary_sum_insu' => $content_burglary_sum_insu,
								'content_burglary_premium' => $content_burglary_premium,

								'stock_exhibition_sum_insu' => $stock_exhibition_sum_insu,
								'stock_exhibition_premium' => $stock_exhibition_premium,

								'fidelity_guar_cover_sum_insu_1' => $fidelity_guar_cover_sum_insu_1,
								// 'fidelity_guar_cover_sum_insu_2' => $fidelity_guar_cover_sum_insu_2,
								'fidelity_guar_cover_premium_1' => $fidelity_guar_cover_premium_1,
								// 'fidelity_guar_cover_premium_2' => $fidelity_guar_cover_premium_2,
								'total_fidelity_guar_cover_json' => $total_fidelity_guar_cover,

								'plate_glass_sum_insu' => $plate_glass_sum_insu,
								'plate_glass_premium' => $jweller_plate_glass_premium,

								'neon_sign_sum_insu' => $neon_sign_sum_insu,
								'neon_sign_premium' => $neon_sign_premium,

								'portable_equipmets_sum_insu' => $portable_equipmets_sum_insu,
								'portable_equipmets_premium' => $portable_equipmets_premium,

								'employee_compensation_sum_insu_1' => $employee_compensation_sum_insu_1,
								'employee_compensation_sum_insu_2' => $employee_compensation_sum_insu_2,
								'employee_compensation_premium' => $employee_compensation_premium,

								'electronic_equipment_sum_insu' => $electronic_equipment_sum_insu,
								'electronic_equipment_premium' => $electronic_equipment_premium,

								'public_liability_sum_insu' => $public_liability_sum_insu,
								'public_liability_premium' => $public_liability_premium,

								'money_transit_sum_insu' => $money_transit_sum_insu,
								'money_transit_premium' => $money_transit_premium,

								'machinery_breakdown_sum_insu' => $machinery_breakdown_sum_insu,
								'machinery_breakdown_premium' => $machinery_breakdown_premium,

								'jweller_less_discount' => $jweller_less_discount,
								'jweller_total_sum_assured' => $jweller_total_sum_assured,
								'jweller_less_discount_tot' => $jweller_less_discount_tot,
								'jweller_after_discount_tot' => $jweller_after_discount_tot,
								'jweller_terrorism_per' => $jweller_terrorism_per,
								'jweller_terrorism_per_tot' => $jweller_terrorism_per_tot,
								'jweller_tot_net_premium' => $jweller_tot_net_premium,
								'jweller_cgst_per' => $jweller_cgst_per,
								'jweller_sgst_per' => $jweller_sgst_per,
								'jweller_cgst_per_tot' => $jweller_cgst_per_tot,
								'jweller_sgst_per_tot' => $jweller_sgst_per_tot,
								'jweller_final_payble' => $jweller_final_payble,

								'modify_dt' => date("Y-m-d h:i:s")
							);
							// print_r($update_jweller_policy_arr);
							// die();
							$this->load->model("Mpolicy");
							if (!empty($update_jweller_policy_arr))
								$result_data = $this->Mpolicy->update_jweller_policy($update_jweller_policy_arr, $jweller_policy_id, $policy_id, $policy_name);
						}
					}
				} elseif ($policy_name_txt == "Open Policy" || $policy_name_txt == "Stop Policy" || $policy_name_txt == "Specific Policy") { // Marine : Open Policy/STop Policy
					// die();
					if (!empty($marine_policy_id)) {
						// die();
						if ($policy_type != 3) {
							$update_marine_policy_arr = array(
								'marine_policy_id' => $marine_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $policy_name,
								'policy_name_txt' => $policy_name_txt,

								'from_destination' => $from_destination,
								'to_destination' => $to_destination,
								'coverage_type' => $coverage_type,
								'marine_description' => $marine_description,
								'interest_insured' => $interest_insured,
								'group_name_address' => $group_name_address,
								'marine_sum_insured' => $marine_sum_insured,
								'packing_stand_customary' => $packing_stand_customary,
								'total_marine_cc_json' => $total_marine_cc,
								'business_description' => $business_description,
								'voyage_domestic_purchase' => $voyage_domestic_purchase,
								'voyage_international_purchase' => $voyage_international_purchase,

								'voyage_domestic_sales' => $voyage_domestic_sales,
								'voyage_export_sales' => $voyage_export_sales,
								'voyage_job_worker' => $voyage_job_worker,
								'voyage_domestic_fini_good' => $voyage_domestic_fini_good,
								'voyage_export_fini_good' => $voyage_export_fini_good,
								'voyage_domestic_purch_return' => $voyage_domestic_purch_return,
								'voyage_export_purch_return' => $voyage_export_purch_return,
								'voyage_sales_return' => $voyage_sales_return,

								'domestic_purch' => $domestic_purch,
								'international_purch' => $international_purch,
								'domestic_sale' => $domestic_sale,
								'export_sale' => $export_sale,
								'per_bottom_limit' => $per_bottom_limit,
								'per_location_limit' => $per_location_limit,
								'per_claim_excess' => $per_claim_excess,
								'declaration_sale_fig' => $declaration_sale_fig,

								'annual_turn_over' => $annual_turn_over,
								'tot_sum_insured' => $tot_sum_insured,
								'rate_applied' => $rate_applied,
								'rate_applied_per' => $rate_applied_per,
								'rate_applied_hidden' => $rate_applied_hidden,
								'marine_cgst_per' => $marine_cgst_per,
								'marine_sgst_per' => $marine_sgst_per,
								'cgst_rate_tot' => $cgst_rate_tot,
								'sgst_rate_tot' => $sgst_rate_tot,
								'marine_final_payble_premium' => $marine_final_payble_premium,

								'modify_dt' => date("Y-m-d h:i:s")
							);
							// print_r($update_marine_policy_arr);
							// die();
							$this->load->model("Mpolicy");
							if (!empty($update_marine_policy_arr))
								$result_data = $this->Mpolicy->update_marine_policy($update_marine_policy_arr, $marine_policy_id, $policy_id, $policy_name);
						}
					}
				} elseif ($policy_name_txt == "GMC") { // GMC:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
						if (!empty($gmc_policy_id)) {
							if ($policy_type != 3) {
								$update_gmc_policy_arr = array(
									'gmc_policy_id' => $gmc_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'tot_gmc_json_data' => $total_gmc_data,
									'gmc_family_size' => $gmc_family_size,
									'gmc_tot_sum_insured' => $gmc_total_sum_insured,
									'modify_dt' => date("Y-m-d h:i:s")
								);

								$this->load->model("Mpolicy");
								if (!empty($update_gmc_policy_arr))
									$result_data = $this->Mpolicy->update_gmc_policy($update_gmc_policy_arr, $gmc_policy_id, $policy_id, $policy_name);
							}
						}
					}
					// elseif ($policy_type_txt == "Common Individual") {
					// 	if ($policy_type != 3) {
					// 		if (!empty($common_ind_policy_id)) {
					// 			$update_common_ind_policy_arr = array(
					// 				'common_ind_policy_id' => $common_ind_policy_id,
					// 				'fk_policy_id' => $policy_id,
					// 				'fk_policy_type_id' => $policy_name,
					// 				'fk_company_id' => $company,
					// 				'fk_department_id' => $department,
					// 				'policy_name_txt' => $policy_name_txt,
					// 				'tot_commind_json_data' => $tot_commind_json_data,
					// 				'comm_ind_total_amount' => $comm_ind_total_amount,
					// 				'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
					// 				'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
					// 				'comm_ind_load_desc' => $comm_ind_load_desc,
					// 				'comm_ind_load_tot' => $comm_ind_load_tot,
					// 				'comm_ind_gross_premium' => $comm_ind_gross_premium,
					// 				'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
					// 				'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
					// 				'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
					// 				'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
					// 				'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
					// 				'comm_ind_final_premium' => $comm_ind_final_premium,
					// 				'modify_dt' => date("Y-m-d h:i:s")
					// 			);
					// 			$this->load->model("Mpolicy");
					// 			if (!empty($update_common_ind_policy_arr))
					// 				$result_data = $this->Mpolicy->update_common_ind_policy($update_common_ind_policy_arr, $common_ind_policy_id, $policy_id, $policy_name);
					// 		}
					// 	}
					// } elseif ($policy_type_txt == "Common Floater") {
					// 	if ($policy_type != 3) {
					// 		if (!empty($common_float_policy_id)) {
					// 			$update_common_float_policy_arr = array(
					// 				'common_float_policy_id' => $common_float_policy_id,
					// 				'fk_policy_id' => $policy_id,
					// 				'fk_policy_type_id' => $policy_name,
					// 				'fk_company_id' => $company,
					// 				'fk_department_id' => $department,
					// 				'policy_name_txt' => $policy_name_txt,
					// 				'tot_commfloat_json_data' => $tot_commfloat_json_data,
					// 				'comm_float_total_amount' => $comm_float_total_amount,
					// 				'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
					// 				'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
					// 				'comm_float_load_desc' => $comm_float_load_desc,
					// 				'comm_float_load_tot' => $comm_float_load_tot,
					// 				'comm_float_gross_premium' => $comm_float_gross_premium,
					// 				'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
					// 				'comm_float_cgst_rate' => $comm_float_cgst_rate,
					// 				'comm_float_cgst_tot' => $comm_float_cgst_tot,
					// 				'comm_float_sgst_rate' => $comm_float_sgst_rate,
					// 				'comm_float_sgst_tot' => $comm_float_sgst_tot,
					// 				'comm_float_final_premium' => $comm_float_final_premium,
					// 				'modify_dt' => date("Y-m-d h:i:s")
					// 			);

					// 			$this->load->model("Mpolicy");
					// 			if (!empty($update_common_float_policy_arr))
					// 				$result_data = $this->Mpolicy->update_common_float_policy($update_common_float_policy_arr, $common_float_policy_id, $policy_id, $policy_name);
					// 		}
					// 	}
					// }
				} elseif ($policy_name_txt == "GPA") { // GPA:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
						if (!empty($gpa_policy_id)) {
							if ($policy_type != 3) {
								$update_gpa_policy_arr = array(
									'gpa_policy_id' => $gpa_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'tot_gpa_json_data' => $total_gpa_data,
									'gpa_family_size' => $gpa_family_size,
									'gpa_tot_sum_insured' => $gpa_total_sum_insured,
									'modify_dt' => date("Y-m-d h:i:s")
								);

								$this->load->model("Mpolicy");
								if (!empty($update_gpa_policy_arr))
									$result_data = $this->Mpolicy->update_gpa_policy($update_gpa_policy_arr, $gpa_policy_id, $policy_id, $policy_name);
							}
						}
					}
					// elseif ($policy_type_txt == "Common Individual") {
					// 	if ($policy_type != 3) {
					// 		if (!empty($common_ind_policy_id)) {
					// 			$update_common_ind_policy_arr = array(
					// 				'common_ind_policy_id' => $common_ind_policy_id,
					// 				'fk_policy_id' => $policy_id,
					// 				'fk_policy_type_id' => $policy_name,
					// 				'fk_company_id' => $company,
					// 				'fk_department_id' => $department,
					// 				'policy_name_txt' => $policy_name_txt,
					// 				'tot_commind_json_data' => $tot_commind_json_data,
					// 				'comm_ind_total_amount' => $comm_ind_total_amount,
					// 				'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
					// 				'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
					// 				'comm_ind_load_desc' => $comm_ind_load_desc,
					// 				'comm_ind_load_tot' => $comm_ind_load_tot,
					// 				'comm_ind_gross_premium' => $comm_ind_gross_premium,
					// 				'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
					// 				'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
					// 				'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
					// 				'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
					// 				'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
					// 				'comm_ind_final_premium' => $comm_ind_final_premium,
					// 				'modify_dt' => date("Y-m-d h:i:s")
					// 			);
					// 			$this->load->model("Mpolicy");
					// 			if (!empty($update_common_ind_policy_arr))
					// 				$result_data = $this->Mpolicy->update_common_ind_policy($update_common_ind_policy_arr, $common_ind_policy_id, $policy_id, $policy_name);
					// 		}
					// 	}
					// } elseif ($policy_type_txt == "Common Floater") {
					// 	if ($policy_type != 3) {
					// 		if (!empty($common_float_policy_id)) {
					// 			$update_common_float_policy_arr = array(
					// 				'common_float_policy_id' => $common_float_policy_id,
					// 				'fk_policy_id' => $policy_id,
					// 				'fk_policy_type_id' => $policy_name,
					// 				'fk_company_id' => $company,
					// 				'fk_department_id' => $department,
					// 				'policy_name_txt' => $policy_name_txt,
					// 				'tot_commfloat_json_data' => $tot_commfloat_json_data,
					// 				'comm_float_total_amount' => $comm_float_total_amount,
					// 				'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
					// 				'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
					// 				'comm_float_load_desc' => $comm_float_load_desc,
					// 				'comm_float_load_tot' => $comm_float_load_tot,
					// 				'comm_float_gross_premium' => $comm_float_gross_premium,
					// 				'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
					// 				'comm_float_cgst_rate' => $comm_float_cgst_rate,
					// 				'comm_float_cgst_tot' => $comm_float_cgst_tot,
					// 				'comm_float_sgst_rate' => $comm_float_sgst_rate,
					// 				'comm_float_sgst_tot' => $comm_float_sgst_tot,
					// 				'comm_float_final_premium' => $comm_float_final_premium,
					// 				'modify_dt' => date("Y-m-d h:i:s")
					// 			);

					// 			$this->load->model("Mpolicy");
					// 			if (!empty($update_common_float_policy_arr))
					// 				$result_data = $this->Mpolicy->update_common_float_policy($update_common_float_policy_arr, $common_float_policy_id, $policy_id, $policy_name);
					// 		}
					// 	}
					// }
				} elseif ($policy_name_txt == "Personal Accident") { // Personal Accident:misleneous
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater") {
						if (!empty($paccident_policy_id)) {
							if ($policy_type != 3) {
								$update_personal_accident_ind_policy_arr = array(
									'paccident_policy_id' => $paccident_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'total_pa_ind_json_data' => $total_pa_ind_json_data,
									'tot_premium' => $tot_premium,
									'less_disc_rate' => $less_disc_rate,
									'less_disc_tot' => $less_disc_tot,
									'gross_premium' => $gross_premium,
									'gross_premium_new' => $gross_premium_new,
									'medi_cgst_rate' => $medi_cgst_rate,
									'medi_cgst_tot' => $medi_cgst_tot,
									'medi_sgst_rate' => $medi_sgst_rate,
									'medi_sgst_tot' => $medi_sgst_tot,
									'medi_final_premium' => $medi_final_premium,
									'modify_dt' => date("Y-m-d h:i:s")
								);

								$this->load->model("Mpolicy");
								if (!empty($update_personal_accident_ind_policy_arr))
									$result_data = $this->Mpolicy->update_personal_accident_ind_policy($update_personal_accident_ind_policy_arr, $paccident_policy_id, $policy_id, $policy_name);
							}
						}
					} elseif ($policy_type_txt == "Common Individual") {
						if ($policy_type != 3) {
							if (!empty($common_ind_policy_id)) {
								$update_common_ind_policy_arr = array(
									'common_ind_policy_id' => $common_ind_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'tot_commind_json_data' => $tot_commind_json_data,
									'comm_ind_total_amount' => $comm_ind_total_amount,
									'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
									'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
									'comm_ind_load_desc' => $comm_ind_load_desc,
									'comm_ind_load_tot' => $comm_ind_load_tot,
									'comm_ind_gross_premium' => $comm_ind_gross_premium,
									'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
									'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
									'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
									'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
									'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
									'comm_ind_final_premium' => $comm_ind_final_premium,
									'modify_dt' => date("Y-m-d h:i:s")
								);
								$this->load->model("Mpolicy");
								if (!empty($update_common_ind_policy_arr))
									$result_data = $this->Mpolicy->update_common_ind_policy($update_common_ind_policy_arr, $common_ind_policy_id, $policy_id, $policy_name);
							}
						}
					} elseif ($policy_type_txt == "Common Floater") {
						if ($policy_type != 3) {
							if (!empty($common_float_policy_id)) {
								$update_common_float_policy_arr = array(
									'common_float_policy_id' => $common_float_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $policy_name,
									'fk_company_id' => $company,
									'fk_department_id' => $department,
									'policy_name_txt' => $policy_name_txt,
									'tot_commfloat_json_data' => $tot_commfloat_json_data,
									'comm_float_total_amount' => $comm_float_total_amount,
									'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
									'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
									'comm_float_load_desc' => $comm_float_load_desc,
									'comm_float_load_tot' => $comm_float_load_tot,
									'comm_float_gross_premium' => $comm_float_gross_premium,
									'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
									'comm_float_cgst_rate' => $comm_float_cgst_rate,
									'comm_float_cgst_tot' => $comm_float_cgst_tot,
									'comm_float_sgst_rate' => $comm_float_sgst_rate,
									'comm_float_sgst_tot' => $comm_float_sgst_tot,
									'comm_float_final_premium' => $comm_float_final_premium,
									'modify_dt' => date("Y-m-d h:i:s")
								);

								$this->load->model("Mpolicy");
								if (!empty($update_common_float_policy_arr))
									$result_data = $this->Mpolicy->update_common_float_policy($update_common_float_policy_arr, $common_float_policy_id, $policy_id, $policy_name);
							}
						}
					}
				} elseif ($policy_name_txt == "Private Car") { // Private Car :: Motor
					if (!empty($private_car_policy_id)) {
						if ($policy_type != 3) {
							$update_motor_private_car_policy_arr = array(
								'private_car_policy_id' => $private_car_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $policy_name,
								'fk_company_id' => $company,
								'fk_department_id' => $department,
								'policy_name_txt' => $policy_name_txt,

								'vehicle_make_model' => $vehicle_make_model,
								'vehicle_reg_no' => $vehicle_reg_no,
								'insu_declared_val' => $insu_declared_val,
								'non_elect_access_val' => $non_elect_access_val,
								'elect_access_val' => $elect_access_val,
								'lpg_cng_idv_val' => $lpg_cng_idv_val,
								'trailer_val' => $trailer_val,
								'year_manufact_val' => $year_manufact_val,
								'rta_city_code' => $rta_city_code,
								'rta_city' => $rta_city,
								'rta_city_cat' => $rta_city_cat,
								'cubic_capacity_val' => $cubic_capacity_val,
								'calculation_method' => $calculation_method,
								'type_of_cover' => $type_of_cover,
								'prev_policy_expiry_date' => $prev_policy_expiry_date,
								'policy_period' => $policy_period,
								'inception_date' => $inception_date,
								'expiry_date' => $expiry_date,

								'od_basic_od_tot' => $od_basic_od_tot,
								'od_special_disc_per' => $od_special_disc_per,
								'od_special_disc_tot' => $od_special_disc_tot,
								'od_special_load_per' => $od_special_load_per,
								'od_special_load_tot' => $od_special_load_tot,
								'od_net_basic_od_tot' => $od_net_basic_od_tot,
								'od_non_elec_acc_tot' => $od_non_elec_acc_tot,
								'od_elec_acc_tot' => $od_elec_acc_tot,
								'od_bi_fuel_kit_tot' => $od_bi_fuel_kit_tot,
								'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
								'od_trailer_tot' => $od_trailer_tot,
								'od_geographical_area_tot' => $od_geographical_area_tot,
								'od_embassy_load_tot' => $od_embassy_load_tot,
								'od_fibre_glass_tank_tot' => $od_fibre_glass_tank_tot,
								'od_driving_tut_tot' => $od_driving_tut_tot,
								'od_rallies_tot' => $od_rallies_tot,
								'od_basic_od2_tot' => $od_basic_od2_tot,
								'od_anti_tot' => $od_anti_tot,
								'od_handicap_tot' => $od_handicap_tot,
								'od_aai_tot' => $od_aai_tot,
								'od_vintage_tot' => $od_vintage_tot,
								'od_own_premises_tot' => $od_own_premises_tot,
								'od_voluntary_deduc_tot' => $od_voluntary_deduc_tot,
								'od_basic_od3_tot' => $od_basic_od3_tot,
								'od_ncb_per' => $od_ncb_per,
								'od_ncb_tot' => $od_ncb_tot,
								'od_tot_anual_od_premium' => $od_tot_anual_od_premium,
								'od_tot_od_premium_policy_period' => $od_tot_od_premium_policy_period,

								'tp_basic_tp_tot' => $tp_basic_tp_tot,
								'tp_restr_tppd' => $tp_restr_tppd,
								'tp_trailer_tot' => $tp_trailer_tot,
								'tp_bi_fuel_tot' => $tp_bi_fuel_tot,
								'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
								'tp_compul_own_driv_tot' => $tp_compul_own_driv_tot,
								'tp_geographical_area_tot' => $tp_geographical_area_tot,
								'tp_unnamed_papax_tot' => $tp_unnamed_papax_tot,
								'tp_no_seats_limit_person_tot' => $tp_no_seats_limit_person_tot,
								'tp_ll_drv_emp_tot' => $tp_ll_drv_emp_tot,
								'tp_no_drv_emp_tot' => $tp_no_drv_emp_tot,
								'tp_noof_person_tot' => $tp_noof_person_tot,
								'tp_pa_paid_drv_tot' => $tp_pa_paid_drv_tot,
								'tp_ll_defe_tot' => $tp_ll_defe_tot,
								'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
								'tp_tot_anual_tp_premium' => $tp_tot_anual_tp_premium,
								'tp_tot_premium_policy_period' => $tp_tot_premium_policy_period,
								'plan_name' => $plan_name,
								'plan_name_tot' => $plan_name_tot,
								'tot_othercover_ind_json' => $tot_othercover_ind_json,
								'tot_anual_cover_premium' => $tot_anual_cover_premium,
								'tot_cover_premium_period' => $tot_cover_premium_period,

								'tot_premium' => $tot_premium,
								'motor_cgst_rate' => $motor_cgst_rate,
								'motor_cgst_tot' => $motor_cgst_tot,
								'motor_sgst_rate' => $motor_sgst_rate,
								'motor_sgst_tot' => $motor_sgst_tot,
								// 'gst_rate' => $gst_rate,
								// 'gst_tot' => $gst_tot,
								'tot_payable_premium' => $tot_payable_premium,

								'modify_dt' => date("Y-m-d h:i:s")
							);
							// print_r($update_motor_private_car_policy_arr);
							// die();
							$this->load->model("Mpolicy");
							if (!empty($update_motor_private_car_policy_arr))
								$result_data = $this->Mpolicy->update_motor_private_car_policy($update_motor_private_car_policy_arr, $private_car_policy_id, $policy_id, $policy_name);
						}
					}
				} elseif ($policy_name_txt == "2 Wheeler") { // 2 Wheeler :: Motor
					if (!empty($two_wheeler_policy_id)) {
						if ($policy_type != 3) {
							$update_motor_two_wheeler_policy_arr = array(
								'2_wheeler_policy_id' => $two_wheeler_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $policy_name,
								'fk_company_id' => $company,
								'fk_department_id' => $department,
								'policy_name_txt' => $policy_name_txt,

								'vehicle_make_model' => $vehicle_make_model,
								'vehicle_reg_no' => $vehicle_reg_no,
								'insu_declared_val' => $insu_declared_val,
								'elect_acc_val' => $elect_acc_val,
								'other_elect_acc_val' => $other_elect_acc_val,
								'policy_period_tenure_years' => $policy_period_tenure_years,
								'previous_policy_expiry_date_tenur' => $previous_policy_expiry_date_tenur,
								'year_manufact_val' => $year_manufact_val,
								'rta_city_code' => $rta_city_code,
								'rta_city' => $rta_city,
								'rta_city_cat' => $rta_city_cat,
								'cubic_capacity_val' => $cubic_capacity_val,
								'type_of_cover' => $type_of_cover,
								'policy_period' => $policy_period,
								'inception_date' => $inception_date,
								'expiry_date' => $expiry_date,

								'od_basic_od_tot' => $od_basic_od_tot,
								'od_special_disc_per' => $od_special_disc_per,
								'od_special_disc_tot' => $od_special_disc_tot,
								'od_special_load_per' => $od_special_load_per,
								'od_special_load_tot' => $od_special_load_tot,
								'od_net_basic_od_tot' => $od_net_basic_od_tot,
								'od_elec_acc_tot' => $od_elec_acc_tot,
								'od_other_elec_acc_tot' => $od_other_elec_acc_tot,
								'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
								'od_geographical_area_tot' => $od_geographical_area_tot,
								'od_rallies_tot' => $od_rallies_tot,
								'od_embassy_load_tot' => $od_embassy_load_tot,
								'od_basic_od2_tot' => $od_basic_od2_tot,
								'od_anti_theft_tot' => $od_anti_theft_tot,
								'od_handicap_tot' => $od_handicap_tot,
								'od_aai_tot' => $od_aai_tot,
								'od_side_car_tot' => $od_side_car_tot,
								'od_own_premises_tot' => $od_own_premises_tot,
								'od_voluntary_excess_tot' => $od_voluntary_excess_tot,
								'od_basic_od3_tot' => $od_basic_od3_tot,
								'od_ncb_per' => $od_ncb_per,
								'od_ncb_tot' => $od_ncb_tot,
								'od_tot_od_premium_policy_period' => $od_tot_od_premium_policy_period,

								'tp_basic_tp_tot' => $tp_basic_tp_tot,
								'tp_restr_tppd_tot' => $tp_restr_tppd_tot,
								'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
								'tp_geographical_area_tot' => $tp_geographical_area_tot,
								'tp_compul_pa_own_driv_tot' => $tp_compul_pa_own_driv_tot,
								'tp_unnamed_pa_tot' => $tp_unnamed_pa_tot,
								'tp_ll_drv_emp_imt28_tot' => $tp_ll_drv_emp_imt28_tot,
								'tp_ll_other_emp_tot' => $tp_ll_other_emp_tot,
								'tp_noof_other_emp_tot' => $tp_noof_other_emp_tot,
								'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
								'tp_tot_premium_policy_period' => $tp_tot_premium_policy_period,
								'plan_name' => $plan_name,
								'plan_name_tot' => $plan_name_tot,
								'tot_othercover_ind_json' => $tot_othercover_ind_json,
								'tot_cover_premium_period' => $tot_cover_premium_period,

								'tot_premium' => $tot_premium,
								'motor_cgst_rate' => $motor_cgst_rate,
								'motor_cgst_tot' => $motor_cgst_tot,
								'motor_sgst_rate' => $motor_sgst_rate,
								'motor_sgst_tot' => $motor_sgst_tot,

								// 'gst_rate' => $gst_rate,
								// 'gst_tot' => $gst_tot,
								'tot_payable_premium' => $tot_payable_premium,

								'modify_dt' => date("Y-m-d h:i:s")
							);
							// print_r($update_motor_two_wheeler_policy_arr);
							// die();
							$this->load->model("Mpolicy");
							if (!empty($update_motor_two_wheeler_policy_arr))
								$result_data = $this->Mpolicy->update_motor_two_wheeler_policy($update_motor_two_wheeler_policy_arr, $two_wheeler_policy_id, $policy_id, $policy_name);
						}
					}
				} elseif ($policy_name_txt == "Commercial Vehicle") { // Commercial Vehicle :: Motor
					// print_r($commercial_policy_id);
					// die();
					if (!empty($commercial_policy_id)) {
						if ($policy_type != 3) {
							$update_motor_commercial_policy_arr = array(
								'commercial_policy_id' => $commercial_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $policy_name,
								'fk_company_id' => $company,
								'fk_department_id' => $department,
								'policy_name_txt' => $policy_name_txt,

								'vehicle_make_model' => $vehicle_make_model,
								'vehicle_reg_no' => $vehicle_reg_no,
								'insu_declared_val' => $insu_declared_val,
								'elect_acc_val' => $elect_acc_val,
								'lpg_cng_idv_val' => $lpg_cng_idv_val,
								'year_manufact_val' => $year_manufact_val,
								'zone_city_code' => $zone_city_code,
								'zone_city' => $zone_city,
								'zone_city_cat' => $zone_city_cat,
								'gvw_val' => $gvw_val,
								'class_val' => $class_val,
								'type_of_cover' => $type_of_cover,
								'policy_period' => $policy_period,
								'inception_date' => $inception_date,
								'expiry_date' => $expiry_date,

								'od_basic_od_tot' => $od_basic_od_tot,
								'od_elec_acc_tot' => $od_elec_acc_tot,
								'od_trailer_tot' => $od_trailer_tot,
								'od_bi_fuel_kit_tot' => $od_bi_fuel_kit_tot,
								'od_od_basic_od1_tot' => $od_od_basic_od1_tot,
								'od_geog_area_tot' => $od_geog_area_tot,
								'od_fiber_glass_tank_tot' => $od_fiber_glass_tank_tot,
								'od_imt_cover_mud_guard_tot' => $od_imt_cover_mud_guard_tot,
								'od_basic_od2_tot' => $od_basic_od2_tot,
								'od_basic_od3_tot' => $od_basic_od3_tot,
								'od_ncb_per' => $od_ncb_per,
								'od_ncb_tot' => $od_ncb_tot,
								'od_tot_anual_od_premium' => $od_tot_anual_od_premium,
								'od_special_disc_per' => $od_special_disc_per,
								'od_special_disc_tot' => $od_special_disc_tot,
								'od_special_load_per' => $od_special_load_per,
								'od_special_load_tot' => $od_special_load_tot,
								'od_tot_od_premium' => $od_tot_od_premium,

								'tp_basic_tp_tot' => $tp_basic_tp_tot,
								'tp_restr_tppd_tot' => $tp_restr_tppd_tot,
								'tp_trailer_tot' => $tp_trailer_tot,
								'tp_bi_fuel_kit_tot' => $tp_bi_fuel_kit_tot,
								'tp_basic_tp1_tot' => $tp_basic_tp1_tot,
								'tp_geog_area_tot' => $tp_geog_area_tot,
								'tp_compul_pa_own_driv_tot' => $tp_compul_pa_own_driv_tot,
								'tp_pa_paid_driver_tot' => $tp_pa_paid_driver_tot,
								'tp_ll_emp_non_fare_tot' => $tp_ll_emp_non_fare_tot,
								'tp_ll_driver_cleaner_tot' => $tp_ll_driver_cleaner_tot,
								'tp_ll_person_operation_tot' => $tp_ll_person_operation_tot,
								'tp_basic_tp2_tot' => $tp_basic_tp2_tot,
								'tp_tot_premium' => $tp_tot_premium,
								'tp_consumables' => $tp_consumables,
								'tp_zero_depreciation' => $tp_zero_depreciation,
								'tp_road_side_ass' => $tp_road_side_ass,
								'tp_tot_addon_premium' => $tp_tot_addon_premium,

								'tot_owd_premium' => $tot_owd_premium,
								'tot_owd_addon_premium' => $tot_owd_addon_premium,
								'tot_btp_premium' => $tot_btp_premium,
								'tot_other_tp_premium' => $tot_other_tp_premium,
								'tot_premium' => $tot_premium,
								'tot_owd_cgst_rate' => $tot_owd_cgst_rate,
								'tot_owd_sgst_rate' => $tot_owd_sgst_rate,
								'tot_owd_addon_cgst_rate' => $tot_owd_addon_cgst_rate,
								'tot_owd_addon_sgst_rate' => $tot_owd_addon_sgst_rate,
								'tot_btp_cgst_rate' => $tot_btp_cgst_rate,
								'tot_btp_sgst_rate' => $tot_btp_sgst_rate,
								'tot_other_tp_cgst_rate' => $tot_other_tp_cgst_rate,
								'tot_other_tp_sgst_rate' => $tot_other_tp_sgst_rate,
								'tot_owd_gst' => $tot_owd_gst,
								'tot_owd_addon_gst' => $tot_owd_addon_gst,
								'tot_btp_gst' => $tot_btp_gst,
								'tot_other_tp_gst' => $tot_other_tp_gst,
								'tot_gst_amt' => $tot_gst_amt,
								'tot_owd_final' => $tot_owd_final,
								'tot_owd_addon_final' => $tot_owd_addon_final,
								'tot_btp_final' => $tot_btp_final,
								'tot_other_tp_final' => $tot_other_tp_final,
								'tot_final_premium' => $tot_final_premium,
								'tot_payable_premium' => $tot_payable_premium,

								'modify_dt' => date("Y-m-d h:i:s")
							);
							// print_r($update_motor_commercial_policy_arr);
							// die();
							$this->load->model("Mpolicy");
							if (!empty($update_motor_commercial_policy_arr))
								$result_data = $this->Mpolicy->update_motor_commercial_policy($update_motor_commercial_policy_arr, $commercial_policy_id, $policy_id, $policy_name);
						}
					}
				} else {
					if (!empty($policy_name_txt)) {
						if (($policy_name_txt == "Worksmen Compentation") || ($policy_name_txt == "Money In Transit") || ($policy_name_txt == "Plate Glass") || ($policy_name_txt == "House Holder") || ($policy_name_txt == "All Risk") || ($policy_name_txt == "Office Compact") || ($policy_name_txt == "Electronic Equipment") || ($policy_name_txt == "Product Liability") || ($policy_name_txt == "Commercial General Liability") || ($policy_name_txt == "Public Liability") || ($policy_name_txt == "Professional Indemnity") || ($policy_name_txt == "Machinery Breakdown") || ($policy_name_txt == "Contractors All Risk")) {
							if (!empty($other_policy_id)) {
								if ($policy_type != 3) {
									$update_others_arr = array(
										'other_policy_id' => $other_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $policy_name,
										'other_total_sum_assured' => $total_sum_assured,
										'other_fire_rate_per' => $fire_rate_per,
										'other_fire_rate_tot_amount' => $fire_rate_tot,
										'other_less_discount_per' => $less_discount_per,
										'other_less_discount_tot_amount' => $less_discount_tot,
										'other_fire_rate_after_discount' => $fire_rate_after_discount_tot,
										'other_cgst_rate_per' => $cgst_fire_per,
										'other_cgst_tot_amount' => $cgst_fire_tot,
										'other_sgst_rate_per' => $sgst_fire_per,
										'other_sgst_tot_amount' => $sgst_fire_tot,
										'other_final_payable_premium' => $final_paybal_premium,
										'modify_dt' => date("Y-m-d h:i:s")
									);
									$this->load->model("Mpolicy");
									if (!empty($update_others_arr))
										$result_data = $this->Mpolicy->update_others_policy($update_others_arr, $other_policy_id, $policy_id, $policy_name);
								}
							}
						}
					}
				}

				if (!empty($fire_rc_policy_id)) {
					if ($policy_type == 3) { // Fire RC
						if (!empty($policy_name)) {
							$update_fire_rc_policy_arr = array(
								'fire_rc_policy_id' => $fire_rc_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $policy_name,
								'policy_type' => $policy_type,
								'fire_rc_total_sum_assured' => $total_sum_assured,
								'fire_rc_fire_rate_per' => $fire_rate_per,
								'fire_rc_fire_rate_tot_amount' => $fire_rate_tot,
								'fire_rc_less_discount_per' => $less_discount_per,
								'fire_rc_less_discount_tot_amount' => $less_discount_tot,
								'fire_rc_rate_after_discount' => $fire_rate_after_discount_tot,

								'fire_rc_stfi_rate' => $stfi_rate_per,
								'fire_rc_stfi_rate_total' => $stfi_rate_total,
								'fire_rc_earthquake_rate' => $earthquake_rate_per,
								'fire_rc_earthquake_rate_total' => $earthquake_rate_total,
								'fire_rc_terrorisum_rate' => $terrorisum_rate_per,
								'fire_rc_terrorisum_rate_total' => $terrorisum_rate_total,

								'fire_rc_gross_premium' => $gross_premium,
								'fire_rc_cgst_rate_per' => $cgst_fire_per,
								'fire_rc_cgst_tot_amount' => $cgst_fire_tot,
								'fire_rc_sgst_rate_per' => $sgst_fire_per,
								'fire_rc_sgst_tot_amount' => $sgst_fire_tot,
								'fire_rc_final_payable_premium' => $final_paybal_premium,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							$this->load->model("Mpolicy");
							if (!empty($update_fire_rc_policy_arr))
								$result_data = $this->Mpolicy->update_fire_rc_policy($update_fire_rc_policy_arr, $fire_rc_policy_id, $policy_id, $policy_name, $policy_type);
						}
					}
				}

				$quotation_file_name = "";
				$quotation_upload_file_name = "";

				if ($policy_id != "") {
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details_dump", $colNames = "policy_member_details_dump.policy_id, policy_member_details_dump.serial_no, policy_member_details_dump.fk_company_id,policy_member_details_dump.fk_department_id , policy_member_details_dump.fk_policy_type_id , policy_member_details_dump.fk_client_id , policy_member_details_dump.fk_cust_member_id , policy_member_details_dump.fk_agency_id , policy_member_details_dump.fk_sub_agent_id , policy_member_details_dump.policy_type , policy_member_details_dump.mode_of_premimum , policy_member_details_dump.date_from , policy_member_details_dump.date_to , policy_member_details_dump.payment_date_from , policy_member_details_dump.payment_date_to , policy_member_details_dump.policy_no , policy_member_details_dump.date_commenced , policy_member_details_dump.policy_upload , policy_member_details_dump.quotation_upload ,policy_member_details_dump.dynamic_path , policy_member_details_dump.reg_mobile , policy_member_details_dump.reg_email , policy_member_details_dump.policy_member_status , policy_member_details_dump.del_flag", $whereArr = array("policy_member_details_dump.policy_id" => $policy_id), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

					$result_data = $query["userData"];
					$policy_file_name = $result_data["policy_upload"];
					$quotation_file_name = $result_data["quotation_upload"];

					if (empty($policy_upload_file_name))
						$policy_upload_file_name = $result_data["policy_upload"];

					if (empty($quotation_upload_file_name))
						$quotation_upload_file_name = $result_data["quotation_upload"];

					$dynamic_path = $result_data["dynamic_path"];
				}

				if (!empty($_FILES["policy_upload"])) {
					if (!empty($policy_file_name)) {
						$policy_upload_data = $_FILES["policy_upload"]["name"];

						$policy_upload_img = $this->file_lib->file_upload($img_name = "policy_upload", $directory_name =  "./policy_document/" . date("Y") . "/" . date("m") . "/" . $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no . "-" . $policy_no, $url = "", $user_session_id = "_Policy_No_");

						$path = "./assets/policy/policy_basic_details/";
						$file_path = $path . $dynamic_path . "/" . $policy_file_name;
						// unlink($file_path);

						if ($policy_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["policy_upload_err"]  = $policy_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($policy_upload_img["file_name"] != "") {
							$policy_upload_file_name = $policy_upload_img["file_name"];
							$policy_upload_file_size = $policy_upload_img["file_size"];
							$policy_upload_file_type = $policy_upload_img["file_type"];
						}
					} elseif (empty($policy_file_name)) {
						$policy_upload_data = $_FILES["policy_upload"]["name"];

						$policy_upload_img = $this->file_lib->file_upload($img_name = "policy_upload", $directory_name =  "./policy_document/" . date("Y") . "/" . date("m") . "/" . $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no . "-" . $policy_no, $url = "", $user_session_id = "_Policy_No_");

						if ($policy_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["policy_upload_err"]  = $policy_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($policy_upload_img["file_name"] != "") {
							$policy_upload_file_name = $policy_upload_img["file_name"];
							$policy_upload_file_size = $policy_upload_img["file_size"];
							$policy_upload_file_type = $policy_upload_img["file_type"];
						}
					}
				}

				if (!empty($_FILES["quotation_upload"])) {
					if (!empty($quotation_file_name)) {
						$quotation_upload_data = $_FILES["quotation_upload"]["name"];

						$quotation_upload_img = $this->file_lib->file_upload($img_name = "quotation_upload", $directory_name = "./policy_document/quotation_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  $serial_no_year . "_" . $serial_no_month . "_" . $serial_no . "-" . "quotation", $url = "", $user_session_id = "_Policy_No_");

						$path = "./assets/policy/policy_basic_details/";
						$file_path = $path . $dynamic_path . "/" . $quotation_file_name;
						// unlink($file_path);

						if ($quotation_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["quotation_upload_err"]  = $quotation_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($quotation_upload_img["file_name"] != "") {
							$quotation_upload_file_name = $quotation_upload_img["file_name"];
							$quotation_upload_file_size = $quotation_upload_img["file_size"];
							$quotation_upload_file_type = $quotation_upload_img["file_type"];
						}
					} elseif (empty($quotation_file_name)) {
						$quotation_upload_data = $_FILES["quotation_upload"]["name"];

						$quotation_upload_img = $this->file_lib->file_upload($img_name = "quotation_upload", $directory_name = "./policy_document/quotation_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|doc|docx|csv|xls|jpg|jpeg|png|jpe", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  $serial_no_year . "_" . $serial_no_month . "_" . $serial_no . "-" . "quotation", $url = "", $user_session_id = "_Policy_No_");

						if ($quotation_upload_img["error"] != "") {
							$validator["status"] = false;
							$validator["messages"]["quotation_upload_err"]  = $quotation_upload_img["error"];
							echo json_encode($validator);
							die();
						} elseif ($quotation_upload_img["file_name"] != "") {
							$quotation_upload_file_name = $quotation_upload_img["file_name"];
							$quotation_upload_file_size = $quotation_upload_img["file_size"];
							$quotation_upload_file_type = $quotation_upload_img["file_type"];
						}
					}
				}

				if (!empty($policy_id)) {
					$updateArr[] = array(
						'policy_id' => $policy_id,
						'serial_no_year' => $serial_no_year,
						'serial_no_month' => $serial_no_month,
						'serial_no' => $serial_no,
						'fk_company_id' => $company,
						'fk_department_id' => $department,
						'fk_policy_type_id' => $policy_name,
						'fk_client_id' => $group_name,
						'fk_cust_member_id' => $policy_holder_name,
						'fk_agency_id' => $agency_code,
						'fk_sub_agent_id' => $sub_agency_code,
						'policy_type' => $policy_type,
						'mode_of_premimum' => $mode_of_premimum,
						'date_from' => $date_from,
						'date_to' => $date_to,
						'payment_date_from' => $payment_date_from,
						'payment_date_to' => $payment_date_to,
						'policy_no' => $policy_no,
                        'pre_year_policy_no' => $pre_year_policy_no,
						'date_commenced' => $date_commenced,
						'hypotication_details' => $total_hypotication,
						'correspondence_details' => $total_correspondence,
						'total_paymentacknowledge_data' => $total_paymentacknowledge_data,
						'risk_rc_details' => $total_risk_Rc,
						'risk_details' => $total_risk,
						'policy_upload' => $policy_upload_file_name,
						'dynamic_path' => date("Y") . "/" . date("m") . "/" . $serial_no_year . "_" . $serial_no_month . "_" . $serial_no,
                        'reg_mobile' => $reg_mobile,
						'reg_email' => $reg_email,
						'policy_counter' => $policy_counter_no,
						'family_size' => $family_size,
						'tpa_company' => $tpa_company,
						'addition_of_more_child' => $addition_of_more_child,
						'restore_cover' => $restore_cover,
						'maternity_new_born_baby_cover' => $maternity_new_born_baby_cover,
						'daily_cash_allowance_cover' => $daily_cash_allowance_cover,
						'floater_policy_type' => $floater_policy_type,
						// 'plan_policy_commission' => $comission_percentage,

						'current_sum_insured' => $current_sum_insured,
						'current_total_premium' => $current_total_premium,
						'member_name_arr' => $member_name_arr,
						'riv' => $riv,
						'type_of_bussiness' => $type_of_bussiness,
						'description_of_stock' => $description_of_stock,
						'quotation_date' => $quotation_date,
						'quotation_upload' => $quotation_upload_file_name,
						'quotation_male_link' => $quotation_male_link,
						'modify_dt' => date("Y-m-d h:i:s")
					);
				}
				// print_r($updateArr);
				// die("Test");
				if (!empty($updateArr))
					$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "policy_member_details_dump", $updateArr, $updateKey = "policy_id", $whereArr = array("policy_id", $policy_id), $likeCondtnArr = array(), $whereInArray = array());

				$update_remarks_arr = array();
				$add_remarks_arr = array();
				$new_policy_remark_id = "";

				if (!empty($total_remarks)) {
					for ($j = 0; $j < count($total_remarks); $j++) {
						if (!empty($total_remarks[$j][2])) {
							$update_remarks_arr[$j] = array(
								'remarks' => $total_remarks[$j][0],
								'male_date' => $total_remarks[$j][1],
								'policy_remark_id' => $total_remarks[$j][2],
								'fk_policy_id' => $policy_id,
								'modify_dt' => date("Y-m-d h:i:s")
							);
							if ($new_policy_remark_id == "")
								$new_policy_remark_id = $total_remarks[$j][2];
							else
								$new_policy_remark_id .= "," . $total_remarks[$j][2];
						} elseif (empty($total_remarks[$j][6])) {
							$add_remarks_arr[$j] = array(
								'remarks' => $total_remarks[$j][0],
								'male_date' => $total_remarks[$j][1],
								'fk_policy_id' => $policy_id,
								'create_date' => date("Y-m-d h:i:s")
							);
						}
					}
				}
				if (!empty($add_remarks_arr))
					$query5 = $this->Mquery_model_v3->addQuery($tableName5 = "policy_remark_details_dump", $add_remarks_arr, $return_type5 = "lastID");

				if (!empty($update_remarks_arr))
					$result = $this->Magent->update_remarks($update_remarks_arr, $new_policy_remark_id, $policy_id);
			}
			$this->db->trans_complete();		// Transaction End

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($policy_id != "") {
				$validator["status"] = true;
				$validator["message"] = $this->data["title"] . " is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	

// Renewal Section End




}
