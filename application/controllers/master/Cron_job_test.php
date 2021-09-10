<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cron_job_test extends CI_Controller
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
		$this->data["title"] = $title = "Prospectus / Brochure";
	}
	// Member Section Start

	// Member Section End


	// Prospectus / Brochure Document Section Start
	public function test_insert()
	{
		$data = array(
			'my_name' => "Priyanshu Singh",
			'create_date' => date("Y-m-d h:i:s")
		);
		$this->db->insert('dummy_table',$data);
	}

	public function edit_policy()
	{
		$whereArr["policy_member_details.next_year_premium_flag"]= 0;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames =  "policy_member_details.policy_id , policy_member_details.renewal_flag, policy_member_details.commission_flag, policy_member_details.endorsment_flag, policy_member_details.claims_flag,policy_member_details.next_year_premium_flag,policy_member_details.current_sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
		$policy_member_details = $query["userData"];
		// echo $this->db->last_query();
		// print_r($policy_member_details);
		// die();
		$this->data["policy_id"] = $policy_id = $policy_member_details["policy_id"];
		$this->data["current_sum_insured"] = $current_sum_insured = $policy_member_details["current_sum_insured"];
		// print_r();
		// die($policy_id);1335
		// $this->data["policy_id"] = $policy_id =1354;
		// $this->data["policy_id"] = $policy_id = $this->uri->segment(4);
		$this->data['method'] = $method = $this->router->fetch_method();
		// print_r($method);
		// die();

		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"],
			"breadcrumb_url" => base_url() . "master/policy",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $this->data["title"],
			"breadcrumb_url" => base_url() . "master/policy/view_policy/" . $policy_id,
			"breadcrumb_active" => false,
		);
		$breadcrumbs[3] = array(
			"breadcrumb_label" => "Edit " . $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		if ($policy_id != "") {
			$whereArr["policy_member_details.policy_id"] = $policy_id;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames =  "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum , policy_member_details.date_from , policy_member_details.date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile ,policy_member_details.policy_counter , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag  , master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name , master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$this->data["result"] = $result = $query["userData"];
		}

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_description", $colNames =  "master_policy_description.policy_description_id, master_policy_description.policy_description_name, master_policy_description.policy_description_status, master_policy_description.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["risk_description"] = $risk_description = $query["userData"];

		$this->data["main_page"] = "master/cron_renew/edit_policy";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function editpolicy()
	{
		$policy_id = $this->input->post("policy_id");
		
		//print_r($policy_id);
		//die("Priyanshu Singh");

		if ($policy_id != "") {
			$whereArr["policy_member_details.policy_id"] = $policy_id;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_tpa", "condtn" => "policy_member_details.tpa_company = master_tpa.mtpa_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$joins_main[] = array("tbl" => "sookshma_fire_policy", "condtn" => "policy_member_details.policy_id = sookshma_fire_policy.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "laghu_fire_policy", "condtn" => "policy_member_details.policy_id = laghu_fire_policy.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "griharaksha_fire_policy", "condtn" => "policy_member_details.policy_id = griharaksha_fire_policy.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "bharat_fire_allied_perils_policy", "condtn" => "policy_member_details.policy_id = bharat_fire_allied_perils_policy.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "burglary_policy", "condtn" => "policy_member_details.policy_id = burglary_policy.fk_policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "others_policy", "condtn" => "policy_member_details.policy_id = others_policy.fk_policy_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames =  "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum , policy_member_details.date_from , policy_member_details.date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email ,policy_member_details.policy_counter, policy_member_details.policy_member_status , policy_member_details.del_flag ,policy_member_details.hypotication_details ,policy_member_details.correspondence_details ,policy_member_details.total_paymentacknowledge_data, policy_member_details.risk_details,policy_member_details.risk_rc_details,policy_member_details.family_size,policy_member_details.tpa_company,master_tpa.tpa_name,policy_member_details.addition_of_more_child, policy_member_details.floater_policy_type, policy_member_details.restore_cover, policy_member_details.maternity_new_born_baby_cover, policy_member_details.daily_cash_allowance_cover, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname ,sookshma_fire_policy.sookshma_fire_policy_id ,sookshma_fire_policy.fk_policy_id ,sookshma_fire_policy.total_sum_assured ,sookshma_fire_policy.fire_rate_per ,sookshma_fire_policy.fire_rate_tot_amount ,sookshma_fire_policy.less_discount_per ,sookshma_fire_policy.less_discount_tot_amount ,sookshma_fire_policy.fire_rate_after_discount ,sookshma_fire_policy.gross_premium ,sookshma_fire_policy.cgst_rate_per ,sookshma_fire_policy.cgst_tot_amount  ,sookshma_fire_policy.sgst_rate_per ,sookshma_fire_policy.sgst_tot_amount ,sookshma_fire_policy.final_payable_premium ,sookshma_fire_policy.sookshma_fire_policy_status ,laghu_fire_policy.laghu_fire_policy_id ,laghu_fire_policy.fk_policy_id as laghu_fk_policy_id,laghu_fire_policy.total_sum_assured as laghu_total_sum_assured,laghu_fire_policy.fire_rate_per as laghu_fire_rate_per,laghu_fire_policy.fire_rate_tot_amount as laghu_fire_rate_tot_amount,laghu_fire_policy.less_discount_per as laghu_less_discount_per,laghu_fire_policy.less_discount_tot_amount as laghu_less_discount_tot_amount,laghu_fire_policy.fire_rate_after_discount as laghu_fire_rate_after_discount,laghu_fire_policy.gross_premium as laghu_gross_premium,laghu_fire_policy.cgst_rate_per as laghu_cgst_rate_per,laghu_fire_policy.cgst_tot_amount as laghu_cgst_tot_amount,laghu_fire_policy.sgst_rate_per as laghu_sgst_rate_per,laghu_fire_policy.sgst_tot_amount as laghu_sgst_tot_amount,laghu_fire_policy.final_payable_premium as laghu_final_payable_premium,laghu_fire_policy.laghu_fire_policy_status ,griharaksha_fire_policy.griharaksha_fire_policy_id ,griharaksha_fire_policy.fk_policy_id as griharaksha_fk_policy_id, griharaksha_fire_policy.total_sum_assured as griharaksha_total_sum_assured ,griharaksha_fire_policy.fire_rate_per as griharaksha_fire_rate_per ,griharaksha_fire_policy.fire_rate_tot_amount as griharaksha_fire_rate_tot_amount ,griharaksha_fire_policy.less_discount_per as griharaksha_less_discount_per,griharaksha_fire_policy.less_discount_tot_amount as griharaksha_less_discount_tot_amount ,griharaksha_fire_policy.fire_rate_after_discount as griharaksha_fire_rate_after_discount ,griharaksha_fire_policy.gross_premium as griharaksha_gross_premium ,griharaksha_fire_policy.cgst_rate_per as griharaksha_cgst_rate_per ,griharaksha_fire_policy.cgst_tot_amount as griharaksha_cgst_tot_amount ,griharaksha_fire_policy.sgst_rate_per as griharaksha_sgst_rate_per ,griharaksha_fire_policy.sgst_tot_amount as griharaksha_sgst_tot_amount ,griharaksha_fire_policy.final_payable_premium as griharaksha_final_payable_premium ,griharaksha_fire_policy.griharaksha_fire_policy_status , burglary_policy.burglary_policy_id , burglary_policy.fk_policy_id as burglary_fk_policy_id , burglary_policy.burglary_total_sum_assured , burglary_policy.burglary_fire_rate_per , burglary_policy.burglary_fire_rate_tot_amount , burglary_policy.burglary_less_discount_per , burglary_policy.burglary_less_discount_tot_amount , burglary_policy.burglary_fire_rate_after_discount , burglary_policy.burglary_gross_premium , burglary_policy.burglary_cgst_rate_per , burglary_policy.burglary_cgst_tot_amount , burglary_policy.burglary_sgst_rate_per , burglary_policy.burglary_sgst_tot_amount , burglary_policy.burglary_final_payable_premium , burglary_policy.burglary_policy_status , burglary_policy.burglary_del_flag ,
			bharat_fire_allied_perils_policy.fire_allied_perils_policy_id , bharat_fire_allied_perils_policy.fk_policy_id as allied_perils_fk_policy_id , bharat_fire_allied_perils_policy.allied_perils_total_sum_assured , bharat_fire_allied_perils_policy.allied_perils_fire_rate_per , bharat_fire_allied_perils_policy.allied_perils_fire_rate_tot_amount , bharat_fire_allied_perils_policy.allied_perils_less_discount_per , bharat_fire_allied_perils_policy.allied_perils_less_discount_tot_amount , bharat_fire_allied_perils_policy.allied_perils_fire_rate_after_discount , bharat_fire_allied_perils_policy.allied_perils_gross_premium , bharat_fire_allied_perils_policy.allied_perils_cgst_rate_per , bharat_fire_allied_perils_policy.allied_perils_cgst_tot_amount , bharat_fire_allied_perils_policy.allied_perils_sgst_rate_per , bharat_fire_allied_perils_policy.allied_perils_sgst_tot_amount , bharat_fire_allied_perils_policy.allied_perils_final_payable_premium , bharat_fire_allied_perils_policy.fire_allied_perils_policy_status , bharat_fire_allied_perils_policy.allied_perils_del_flag, bharat_fire_allied_perils_policy.allied_perils_stfi_rate, bharat_fire_allied_perils_policy.allied_perils_stfi_rate_total, bharat_fire_allied_perils_policy.allied_perils_earthquake_rate, bharat_fire_allied_perils_policy.allied_perils_earthquake_rate_total, bharat_fire_allied_perils_policy.allied_perils_terrorisum_rate, bharat_fire_allied_perils_policy.allied_perils_terrorisum_rate_total, bharat_fire_allied_perils_policy.tot_sum_devid ", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];

			$fire_rc_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["policy_type"] == 3) {
				// $joins_main_department[] = array("tbl" => "master_plans_policy", "condtn" => "master_department.department_id = master_plans_policy.fk_department_id", "type" => "left");
				$whereArr_fire_rc["fire_rc_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_fire_rc["fire_rc_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_fire_rc["fire_rc_policy.policy_type"] = $result["policy_type"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "fire_rc_policy", $colNames = "fire_rc_policy.fire_rc_policy_id , fire_rc_policy.fk_policy_id as fire_rc_fk_policy_id , fire_rc_policy.fk_policy_type_id , fire_rc_policy.policy_type , fire_rc_policy.fire_rc_total_sum_assured , fire_rc_policy.fire_rc_fire_rate_per , fire_rc_policy.fire_rc_fire_rate_tot_amount , fire_rc_policy.fire_rc_less_discount_per , fire_rc_policy.fire_rc_less_discount_tot_amount , fire_rc_policy.fire_rc_rate_after_discount , fire_rc_policy.fire_rc_cgst_rate_per , fire_rc_policy.fire_rc_cgst_tot_amount , fire_rc_policy.fire_rc_sgst_rate_per , fire_rc_policy.fire_rc_sgst_tot_amount , fire_rc_policy.fire_rc_final_payable_premium , fire_rc_policy.fire_rc_policy_status , fire_rc_policy.fire_rc_del_flag , fire_rc_policy.fire_rc_stfi_rate , fire_rc_policy.fire_rc_stfi_rate_total , fire_rc_policy.fire_rc_earthquake_rate , fire_rc_policy.fire_rc_earthquake_rate_total , fire_rc_policy.fire_rc_terrorisum_rate , fire_rc_policy.fire_rc_terrorisum_rate_total , fire_rc_policy.fire_rc_gross_premium", $whereArr = $whereArr_fire_rc, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$fire_rc_policy_list = $query["userData"];
			}
			$result["fire_rc_policy_data_arr"] = $fire_rc_policy_list;
			// print_r($result);
			// die("Test");

			$others_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				// $joins_main_department[] = array("tbl" => "master_plans_policy", "condtn" => "master_department.department_id = master_plans_policy.fk_department_id", "type" => "left");
				$whereArr_others["others_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_others["others_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "others_policy", $colNames = "others_policy.other_policy_id , others_policy.fk_policy_id as other_fk_policy_id , others_policy.fk_policy_type_id , others_policy.other_total_sum_assured , others_policy.other_fire_rate_per , others_policy.other_fire_rate_tot_amount , others_policy.other_less_discount_per , others_policy.other_less_discount_tot_amount , others_policy.other_fire_rate_after_discount , others_policy.other_cgst_rate_per , others_policy.other_cgst_tot_amount , others_policy.other_sgst_rate_per , others_policy.other_sgst_tot_amount , others_policy.other_final_payable_premium , others_policy.others_policy_status , others_policy.other_del_flag", $whereArr = $whereArr_others, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$others_policy_list = $query["userData"];
			}
			$result["others_policy_data_arr"] = $others_policy_list;

			$shopkeeper_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_shopkeeper["shopkeeper_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_shopkeeper["shopkeeper_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "shopkeeper_policy", $colNames = "shopkeeper_policy.shopkeeper_policy_id , shopkeeper_policy.fk_policy_id as shopkeeper_fk_policy_id , shopkeeper_policy.fk_policy_type_id , shopkeeper_policy.shopkeeper_risk_address , shopkeeper_policy.fire_sum_insured_1 , shopkeeper_policy.fire_sum_insured_2 , shopkeeper_policy.fire_sum_insured_3 , shopkeeper_policy.fire_rate_1 , shopkeeper_policy.fire_rate_2 , shopkeeper_policy.fire_rate_3 , shopkeeper_policy.fire_premium_1 , shopkeeper_policy.fire_premium_2 , shopkeeper_policy.fire_premium_3 , shopkeeper_policy.burglary_sum_insured_1 , shopkeeper_policy.burglary_sum_insured_2 , shopkeeper_policy.burglary_sum_insured_3,

				shopkeeper_policy.burglary_rate_1 , shopkeeper_policy.burglary_rate_2 , shopkeeper_policy.burglary_rate_3 , shopkeeper_policy.burglary_premium_1 , shopkeeper_policy.burglary_premium_2 , shopkeeper_policy.burglary_premium_3 , shopkeeper_policy.money_insu_sum_insured_1 , shopkeeper_policy.money_insu_sum_insured_2 , shopkeeper_policy.money_insu_sum_insured_3 , shopkeeper_policy.money_insu_rate_1 , shopkeeper_policy.money_insu_rate_2 , shopkeeper_policy.money_insu_rate_3 , shopkeeper_policy.money_insu_premium_1 , shopkeeper_policy.money_insu_premium_2 , shopkeeper_policy.money_insu_premium_3 , shopkeeper_policy.plate_glass_sum_insured,
				shopkeeper_policy.plate_glass_rate_per , shopkeeper_policy.plate_glass_premium , shopkeeper_policy.neon_glow_sum_insured , shopkeeper_policy.neon_glow_rate_per , shopkeeper_policy.neon_glow_premium , shopkeeper_policy.baggage_ins_sum_insured , shopkeeper_policy.baggage_ins_rate_per , shopkeeper_policy.baggage_ins_premium , shopkeeper_policy.personal_accident_json , shopkeeper_policy.personal_accident_sum_insured , shopkeeper_policy.personal_accident_rate_per , shopkeeper_policy.personal_accident_premium , shopkeeper_policy.fidelity_gaur_json , shopkeeper_policy.fidelity_gaur_sum_insured , shopkeeper_policy.fidelity_gaur_rate_per , shopkeeper_policy.fidelity_gaur_premium,
				shopkeeper_policy.pub_libility_sum_insured , shopkeeper_policy.work_men_compens_sum_insured , shopkeeper_policy.pub_libility_rate , shopkeeper_policy.work_men_compens_rate , shopkeeper_policy.pub_libility_premium , shopkeeper_policy.work_men_compens_premium , shopkeeper_policy.bus_inter_sum_insured_1 , shopkeeper_policy.bus_inter_sum_insured_2 , shopkeeper_policy.bus_inter_sum_insured_3 , shopkeeper_policy.bus_inter_rate_1 , shopkeeper_policy.bus_inter_rate_2 , shopkeeper_policy.bus_inter_rate_3 , shopkeeper_policy.bus_inter_premium_1 , shopkeeper_policy.bus_inter_premium_2 , shopkeeper_policy.bus_inter_premium_3 , shopkeeper_policy.shopkeeper_total_sum_assured , shopkeeper_policy.shopkeeper_total_premium,
				shopkeeper_policy.shopkeeper_less_discount_per , shopkeeper_policy.shopkeeper_less_discount_tot , shopkeeper_policy.shopkeeper_fire_rate_after_discount_tot , shopkeeper_policy.shopkeeper_cgst_fire_per , shopkeeper_policy.shopkeeper_cgst_fire_tot , shopkeeper_policy.shopkeeper_sgst_fire_per , shopkeeper_policy.shopkeeper_sgst_fire_tot , shopkeeper_policy.shopkeeper_final_paybal_premium , shopkeeper_policy.shopkeeper_policy_status , shopkeeper_policy.shopkeeper_policy_del_flag ", $whereArr = $whereArr_shopkeeper, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$shopkeeper_policy_list = $query["userData"];
			}
			$result["shopkeeper_policy_data_arr"] = $shopkeeper_policy_list;

			$jweller_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_jweller["jweller_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_jweller["jweller_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "jweller_policy", $colNames = "jweller_policy.jweller_policy_id , jweller_policy.fk_policy_id as jweller_fk_policy_id , jweller_policy.fk_policy_type_id , jweller_policy.stock_premises_sum_insu_1 , jweller_policy.stock_premises_sum_insu_2 , jweller_policy.stock_premises_sum_insu_3 , jweller_policy.stock_premises_sum_insu_4 , jweller_policy.stock_premises_sum_insu_5 , jweller_policy.stock_premises_sum_insu_6 , jweller_policy.stock_premises_premium_1 , jweller_policy.stock_premises_premium_2 , jweller_policy.stock_custody_sum_insu_1 , jweller_policy.stock_custody_sum_insu_2 , jweller_policy.stock_custody_sum_insu_3 , jweller_policy.stock_custody_sum_insu_4 , jweller_policy.stock_custody_premium_1, jweller_policy.stock_custody_premium_2,

				jweller_policy.stock_transit_sum_insu_1 , jweller_policy.stock_transit_sum_insu_2 , jweller_policy.stock_transit_sum_insu_3 , jweller_policy.stock_transit_sum_insu_4 , jweller_policy.stock_transit_premium , jweller_policy.standard_fire_perils_1 , jweller_policy.standard_fire_perils_2 , jweller_policy.standard_fire_perils_3 , jweller_policy.standard_fire_perils_4 , jweller_policy.standard_fire_perils_5 , jweller_policy.standard_fire_perils_6 , jweller_policy.standard_fire_perils_premium_1 , jweller_policy.standard_fire_perils_premium_2 , jweller_policy.standard_fire_perils_premium_3 , jweller_policy.content_burglary_sum_insu , jweller_policy.content_burglary_premium,
				jweller_policy.stock_exhibition_sum_insu , jweller_policy.stock_exhibition_premium , jweller_policy.fidelity_guar_cover_sum_insu_1 , jweller_policy.fidelity_guar_cover_sum_insu_2 , jweller_policy.fidelity_guar_cover_premium_1 , jweller_policy.fidelity_guar_cover_premium_2 , jweller_policy.total_fidelity_guar_cover_json , jweller_policy.plate_glass_sum_insu , jweller_policy.plate_glass_premium , jweller_policy.neon_sign_sum_insu , jweller_policy.neon_sign_premium , jweller_policy.portable_equipmets_sum_insu , jweller_policy.portable_equipmets_premium , jweller_policy.employee_compensation_sum_insu_1 , jweller_policy.employee_compensation_sum_insu_2 , jweller_policy.employee_compensation_premium , jweller_policy.electronic_equipment_sum_insu,
				jweller_policy.electronic_equipment_premium , jweller_policy.public_liability_sum_insu , jweller_policy.public_liability_premium , jweller_policy.money_transit_sum_insu , jweller_policy.money_transit_premium , jweller_policy.machinery_breakdown_sum_insu , jweller_policy.machinery_breakdown_premium ,
				jweller_policy.jweller_total_sum_assured , jweller_policy.jweller_less_discount , jweller_policy.jweller_less_discount_tot , jweller_policy.jweller_after_discount_tot , jweller_policy.jweller_terrorism_per , jweller_policy.jweller_terrorism_per_tot , jweller_policy.jweller_tot_net_premium , jweller_policy.jweller_cgst_per , jweller_policy.jweller_sgst_per , jweller_policy.jweller_cgst_per_tot, jweller_policy.jweller_sgst_per_tot, jweller_policy.jweller_final_payble, jweller_policy.jweller_policy_status , jweller_policy.jweller_del_flag", $whereArr = $whereArr_jweller, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$jweller_policy_list = $query["userData"];
			}
			$result["jweller_policy_data_arr"] = $jweller_policy_list;

			$marine_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_marine["marine_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_marine["marine_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "marine_policy", $colNames = "marine_policy.marine_policy_id , marine_policy.fk_policy_id as marine_fk_policy_id , marine_policy.fk_policy_type_id , marine_policy.policy_name_txt ,marine_policy. from_destination ,marine_policy. to_destination , marine_policy.coverage_type , marine_policy.marine_description , marine_policy.interest_insured , marine_policy.period_of_insurance , marine_policy.group_name_address , marine_policy.marine_sum_insured ,marine_policy.packing_stand_customary, marine_policy.total_marine_cc_json , marine_policy.business_description , marine_policy.voyage_domestic_purchase , marine_policy.voyage_international_purchase , marine_policy.voyage_domestic_sales , marine_policy.voyage_export_sales , marine_policy.voyage_job_worker , marine_policy.voyage_domestic_fini_good , marine_policy.voyage_export_fini_good , marine_policy.voyage_domestic_purch_return , marine_policy.voyage_export_purch_return , marine_policy.voyage_sales_return , marine_policy.domestic_purch , marine_policy.international_purch , marine_policy.domestic_sale , marine_policy.export_sale , marine_policy.per_bottom_limit , marine_policy.per_location_limit , marine_policy.per_claim_excess , marine_policy.declaration_sale_fig , marine_policy.annual_turn_over , marine_policy.tot_sum_insured , marine_policy.rate_applied , marine_policy.rate_applied_per , marine_policy.rate_applied_hidden , marine_policy.marine_cgst_per , marine_policy.marine_sgst_per , marine_policy.cgst_rate_tot , marine_policy.sgst_rate_tot , marine_policy.marine_final_payble_premium , marine_policy.marine_policy_status , marine_policy.marine_del_flag", $whereArr = $whereArr_marine, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$marine_policy_list = $query["userData"];
			}
			$result["marine_policy_data_arr"] = $marine_policy_list;

			$term_plan_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_term_plan["term_plan_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_term_plan["term_plan_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "term_plan_policy", $colNames = "term_plan_policy.term_plan_policy_id , term_plan_policy.fk_policy_id as term_plan_fk_policy_id , term_plan_policy.fk_policy_type_id , term_plan_policy.term_plan_policy , term_plan_policy.term_plan_premium_paying_term , term_plan_policy.term_plan_total_sum_insured , term_plan_policy.term_plan_basic_premium , term_plan_policy.term_plan_add_loading , term_plan_policy.term_plan_loading_description , term_plan_policy.term_plan_premium_after_loading , term_plan_policy.term_plan_cgst , term_plan_policy.term_plan_sgst , term_plan_policy.term_plan_cgst_tot_ammount , term_plan_policy.term_plan_sgst_tot_ammount , term_plan_policy.term_plan_final_paybal_premium , term_plan_policy.term_plan_status", $whereArr = $whereArr_term_plan, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$term_plan_policy_list = $query["userData"];
			}
			$result["term_plan_policy_data_arr"] = $term_plan_policy_list;

			$mediclaim_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_mediclaim_policy["mediclaim_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_mediclaim_policy["mediclaim_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "mediclaim_policy", $colNames = "mediclaim_policy.mediclaim_policy_id , mediclaim_policy.fk_policy_id as mediclaim_policy_fk_policy_id , mediclaim_policy.fk_policy_type_id , mediclaim_policy.policy_name_txt , mediclaim_policy.tot_mediclaim_json , mediclaim_policy.medi_total_ncd_amount , mediclaim_policy.medi_total_amount , mediclaim_policy.medi_family_disc_rate , mediclaim_policy.medi_family_disc_tot , mediclaim_policy.medi_premium_after_fd , mediclaim_policy.medi_cgst_rate , mediclaim_policy.medi_cgst_tot , mediclaim_policy.medi_sgst_rate , mediclaim_policy.medi_sgst_tot , mediclaim_policy.medi_final_premium , mediclaim_policy.mediclaim_policy_status , mediclaim_policy.mediclaim_policy_del_flag", $whereArr = $whereArr_mediclaim_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$mediclaim_policy_list = $query["userData"];
			}
			$result["mediclaim_policy_data_arr"] = $mediclaim_policy_list;

			$medi_ind2020_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_ind2020["medi_ind2020_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_ind2020["medi_ind2020_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_ind2020_policy", $colNames = "medi_ind2020_policy.medi_ind2020_policy_id , medi_ind2020_policy.fk_policy_id as medi_ind2020_policy_fk_policy_id , medi_ind2020_policy.fk_policy_type_id , medi_ind2020_policy.policy_name_txt , medi_ind2020_policy.tot_medi_ind2020_json , medi_ind2020_policy.medi_ind_2020_total_premium , medi_ind2020_policy.medi_ind_2020_family_descount_per , medi_ind2020_policy.medi_ind_2020_family_descount_tot , medi_ind2020_policy.medi_ind_2020_load_description , medi_ind2020_policy.medi_ind_2020_load_amount , medi_ind2020_policy.medi_ind_2020_restore_cover_premium , medi_ind2020_policy.medi_ind_2020_maternity_new_bornbaby , medi_ind2020_policy.medi_ind_2020_daily_cash_allow_hosp , medi_ind2020_policy.medi_ind_2020_load_gross_premium ,medi_ind2020_policy.new_load_gross_premium , medi_ind2020_policy.medi_ind_2020_cgst_rate , medi_ind2020_policy.medi_ind_2020_cgst_tot , medi_ind2020_policy.medi_ind_2020_sgst_rate , medi_ind2020_policy.medi_ind_2020_sgst_tot , medi_ind2020_policy.medi_ind_2020_final_premium , medi_ind2020_policy.medi_ind_2020_status , medi_ind2020_policy.medi_ind_2020_del_flag", $whereArr = $whereArr_medi_ind2020, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_ind2020_list = $query["userData"];
			}
			$result["medi_ind2020_policy_data_arr"] = $medi_ind2020_list;

			$medi_ind_max_bupa_reassure_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_ind_max_bupa_reassure_policy["max_bupa_reassure_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_ind_max_bupa_reassure_policy["max_bupa_reassure_ind_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_ind_policy", $colNames = "max_bupa_reassure_ind_policy.medi_max_bupa_reassure_ind_policy_id  , max_bupa_reassure_ind_policy.fk_policy_id as medi_max_bupa_reassure_ind_policy_fk_policy_id , max_bupa_reassure_ind_policy.fk_policy_type_id , max_bupa_reassure_ind_policy.policy_name_txt ,max_bupa_reassure_ind_policy.fk_company_id ,max_bupa_reassure_ind_policy.fk_department_id , max_bupa_reassure_ind_policy.total_max_bupa_medi_reassure_json_data , max_bupa_reassure_ind_policy.years_of_premium , max_bupa_reassure_ind_policy.region , max_bupa_reassure_ind_policy.first_year_rate , max_bupa_reassure_ind_policy.second_year_rate , max_bupa_reassure_ind_policy.third_year_rate , max_bupa_reassure_ind_policy.first_year_tot , max_bupa_reassure_ind_policy.second_year_tot , max_bupa_reassure_ind_policy.third_year_tot , max_bupa_reassure_ind_policy.tot_term_disc , max_bupa_reassure_ind_policy.tot_premium , max_bupa_reassure_ind_policy.stand_instu_rate , max_bupa_reassure_ind_policy.stand_instu_tot , max_bupa_reassure_ind_policy.doctor_disc_per , max_bupa_reassure_ind_policy.doctor_disc_tot , max_bupa_reassure_ind_policy.family_disc_per , max_bupa_reassure_ind_policy.family_disc_tot , max_bupa_reassure_ind_policy.gross_premium_tot , max_bupa_reassure_ind_policy.gross_premium_tot_new , max_bupa_reassure_ind_policy.medi_cgst_rate , max_bupa_reassure_ind_policy.medi_cgst_tot , max_bupa_reassure_ind_policy.medi_sgst_rate , max_bupa_reassure_ind_policy.medi_sgst_tot , max_bupa_reassure_ind_policy.medi_final_premium , max_bupa_reassure_ind_policy.max_bupa_status , max_bupa_reassure_ind_policy.max_bupa_del_flag	", $whereArr = $whereArr_medi_ind_max_bupa_reassure_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_ind_max_bupa_reassure_policy_list = $query["userData"];
			}
			$result["medi_ind_max_bupa_reassure_policy_data_arr"] = $medi_ind_max_bupa_reassure_policy_list;

			$medi_float_max_bupa_reassure_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_float_max_bupa_reassure_policy["max_bupa_reassure_floater_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_float_max_bupa_reassure_policy["max_bupa_reassure_floater_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_floater_policy", $colNames = "max_bupa_reassure_floater_policy.medi_max_bupa_reassure_float_policy_id  , max_bupa_reassure_floater_policy.fk_policy_id as medi_max_bupa_reassure_floater_policy_fk_policy_id , max_bupa_reassure_floater_policy.fk_policy_type_id , max_bupa_reassure_floater_policy.policy_name_txt ,max_bupa_reassure_floater_policy.fk_company_id ,max_bupa_reassure_floater_policy.fk_department_id , max_bupa_reassure_floater_policy.total_max_bupa_medi_float_reassure_json_data , max_bupa_reassure_floater_policy.years_of_premium , max_bupa_reassure_floater_policy.region , max_bupa_reassure_floater_policy.first_year_rate , max_bupa_reassure_floater_policy.second_year_rate , max_bupa_reassure_floater_policy.third_year_rate , max_bupa_reassure_floater_policy.first_year_tot , max_bupa_reassure_floater_policy.second_year_tot , max_bupa_reassure_floater_policy.third_year_tot , max_bupa_reassure_floater_policy.tot_term_disc , max_bupa_reassure_floater_policy.tot_premium , max_bupa_reassure_floater_policy.stand_instu_rate , max_bupa_reassure_floater_policy.stand_instu_tot , max_bupa_reassure_floater_policy.doctor_disc_per , max_bupa_reassure_floater_policy.doctor_disc_tot ,  max_bupa_reassure_floater_policy.gross_premium_tot , max_bupa_reassure_floater_policy.gross_premium_tot_new , max_bupa_reassure_floater_policy.medi_cgst_rate , max_bupa_reassure_floater_policy.medi_cgst_tot , max_bupa_reassure_floater_policy.medi_sgst_rate , max_bupa_reassure_floater_policy.medi_sgst_tot , max_bupa_reassure_floater_policy.medi_final_premium ,max_bupa_reassure_floater_policy.max_age , max_bupa_reassure_floater_policy.max_bupa_status , max_bupa_reassure_floater_policy.max_bupa_del_flag	", $whereArr = $whereArr_medi_float_max_bupa_reassure_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_float_max_bupa_reassure_policy_list = $query["userData"];
			}
			$result["medi_float_max_bupa_reassure_policy_data_arr"] = $medi_float_max_bupa_reassure_policy_list;

			$medi_star_health_allied_red_carpet_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_red_carpet_ind_policy", $colNames = "star_health_allied_insu_red_carpet_ind_policy.medi_star_health_ind_policy_id  , star_health_allied_insu_red_carpet_ind_policy.fk_policy_id as star_health_allied_insu_red_carpet_ind_policy_fk_policy_id , star_health_allied_insu_red_carpet_ind_policy.fk_policy_type_id , star_health_allied_insu_red_carpet_ind_policy.policy_name_txt , star_health_allied_insu_red_carpet_ind_policy.fk_company_id , star_health_allied_insu_red_carpet_ind_policy.fk_department_id , star_health_allied_insu_red_carpet_ind_policy.total_star_health_red_carpet_medi_ind_json_data , star_health_allied_insu_red_carpet_ind_policy.years_of_premium , star_health_allied_insu_red_carpet_ind_policy.tot_premium , star_health_allied_insu_red_carpet_ind_policy.medi_cgst_rate , star_health_allied_insu_red_carpet_ind_policy.medi_cgst_tot , star_health_allied_insu_red_carpet_ind_policy.medi_sgst_rate, star_health_allied_insu_red_carpet_ind_policy.medi_sgst_tot, star_health_allied_insu_red_carpet_ind_policy.medi_final_premium, star_health_allied_insu_red_carpet_ind_policy.star_health_status, star_health_allied_insu_red_carpet_ind_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_red_carpet_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_red_carpet_ind_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_red_carpet_ind_policy_data_arr"] = $medi_star_health_allied_red_carpet_ind_policy_list;

			$medi_star_health_allied_red_carpet_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_red_carpet_float_policy", $colNames = "star_health_allied_insu_red_carpet_float_policy.medi_star_health_float_policy_id   , star_health_allied_insu_red_carpet_float_policy.fk_policy_id as star_health_allied_insu_red_carpet_float_policy_fk_policy_id , star_health_allied_insu_red_carpet_float_policy.fk_policy_type_id , star_health_allied_insu_red_carpet_float_policy.policy_name_txt , star_health_allied_insu_red_carpet_float_policy.fk_company_id , star_health_allied_insu_red_carpet_float_policy.fk_department_id , star_health_allied_insu_red_carpet_float_policy.total_star_health_red_carpet_medi_float_json_data , star_health_allied_insu_red_carpet_float_policy.years_of_premium , star_health_allied_insu_red_carpet_float_policy.tot_premium , star_health_allied_insu_red_carpet_float_policy.medi_cgst_rate , star_health_allied_insu_red_carpet_float_policy.medi_cgst_tot , star_health_allied_insu_red_carpet_float_policy.medi_sgst_rate, star_health_allied_insu_red_carpet_float_policy.medi_sgst_tot, star_health_allied_insu_red_carpet_float_policy.medi_final_premium, 
				star_health_allied_insu_red_carpet_float_policy.max_age, star_health_allied_insu_red_carpet_float_policy.star_health_status, star_health_allied_insu_red_carpet_float_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_red_carpet_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_red_carpet_float_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_red_carpet_float_policy_data_arr"] = $medi_star_health_allied_red_carpet_float_policy_list;

			$medi_star_health_allied_comprehensive_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_comprehensive_ind_policy", $colNames = "star_health_allied_insu_comprehensive_ind_policy.medi_star_health_comp_ind_policy_id  , star_health_allied_insu_comprehensive_ind_policy.fk_policy_id as star_health_allied_insu_comp_float_policy_fk_policy_id , star_health_allied_insu_comprehensive_ind_policy.fk_policy_type_id , star_health_allied_insu_comprehensive_ind_policy.policy_name_txt , star_health_allied_insu_comprehensive_ind_policy.fk_company_id , star_health_allied_insu_comprehensive_ind_policy.fk_department_id , star_health_allied_insu_comprehensive_ind_policy.total_star_health_comprehensive_medi_ind_json_data , star_health_allied_insu_comprehensive_ind_policy.years_of_premium , star_health_allied_insu_comprehensive_ind_policy.tot_premium , star_health_allied_insu_comprehensive_ind_policy.medi_cgst_rate , star_health_allied_insu_comprehensive_ind_policy.medi_cgst_tot , star_health_allied_insu_comprehensive_ind_policy.medi_sgst_rate, star_health_allied_insu_comprehensive_ind_policy.medi_sgst_tot, star_health_allied_insu_comprehensive_ind_policy.medi_final_premium, star_health_allied_insu_comprehensive_ind_policy.star_health_status, star_health_allied_insu_comprehensive_ind_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_comprehensive_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_comprehensive_ind_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_comprehensive_ind_policy_data_arr"] = $medi_star_health_allied_comprehensive_ind_policy_list;
			// print_r($result["medi_star_health_allied_comprehensive_ind_policy_data_arr"]);
			// die();

			$medi_star_health_allied_comprehensive_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_comprehensive_float_policy", $colNames = "star_health_allied_insu_comprehensive_float_policy.medi_star_health_comp_float_policy_id   , star_health_allied_insu_comprehensive_float_policy.fk_policy_id as star_health_allied_insu_comp_float_policy_fk_policy_id , star_health_allied_insu_comprehensive_float_policy.fk_policy_type_id , star_health_allied_insu_comprehensive_float_policy.policy_name_txt , star_health_allied_insu_comprehensive_float_policy.fk_company_id , star_health_allied_insu_comprehensive_float_policy.fk_department_id , star_health_allied_insu_comprehensive_float_policy.total_star_health_comprehensive_medi_float_json_data , star_health_allied_insu_comprehensive_float_policy.years_of_premium , star_health_allied_insu_comprehensive_float_policy.tot_premium , star_health_allied_insu_comprehensive_float_policy.medi_cgst_rate , star_health_allied_insu_comprehensive_float_policy.medi_cgst_tot , star_health_allied_insu_comprehensive_float_policy.medi_sgst_rate, star_health_allied_insu_comprehensive_float_policy.medi_sgst_tot, star_health_allied_insu_comprehensive_float_policy.medi_final_premium, 
				star_health_allied_insu_comprehensive_float_policy.max_age, star_health_allied_insu_comprehensive_float_policy.star_health_status, star_health_allied_insu_comprehensive_float_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_comprehensive_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_comprehensive_float_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_comprehensive_float_policy_data_arr"] = $medi_star_health_allied_comprehensive_float_policy_list;

			$medi_star_health_allied_supertopup_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_supertopup_ind_policy", $colNames = "star_health_allied_insu_supertopup_ind_policy.medi_star_health_super_ind_policy_id  , star_health_allied_insu_supertopup_ind_policy.fk_policy_id as star_health_allied_insu_super_ind_policy_fk_policy_id , star_health_allied_insu_supertopup_ind_policy.fk_policy_type_id , star_health_allied_insu_supertopup_ind_policy.policy_name_txt , star_health_allied_insu_supertopup_ind_policy.fk_company_id , star_health_allied_insu_supertopup_ind_policy.fk_department_id , star_health_allied_insu_supertopup_ind_policy.total_star_health_supertopup_ind_json_data , star_health_allied_insu_supertopup_ind_policy.tot_premium , star_health_allied_insu_supertopup_ind_policy.medi_cgst_rate , star_health_allied_insu_supertopup_ind_policy.medi_cgst_tot , star_health_allied_insu_supertopup_ind_policy.medi_sgst_rate, star_health_allied_insu_supertopup_ind_policy.medi_sgst_tot, star_health_allied_insu_supertopup_ind_policy.medi_final_premium, star_health_allied_insu_supertopup_ind_policy.star_health_status, star_health_allied_insu_supertopup_ind_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_supertopup_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_supertopup_ind_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_supertopup_ind_policy_data_arr"] = $medi_star_health_allied_supertopup_ind_policy_list;

			$medi_star_health_allied_supertopup_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_supertopup_float_policy", $colNames = "star_health_allied_insu_supertopup_float_policy.medi_star_health_super_float_policy_id  , star_health_allied_insu_supertopup_float_policy.fk_policy_id as star_health_allied_insu_super_float_policy_fk_policy_id , star_health_allied_insu_supertopup_float_policy.fk_policy_type_id , star_health_allied_insu_supertopup_float_policy.policy_name_txt , star_health_allied_insu_supertopup_float_policy.fk_company_id , star_health_allied_insu_supertopup_float_policy.fk_department_id , star_health_allied_insu_supertopup_float_policy.total_star_health_supertopup_float_json_data , star_health_allied_insu_supertopup_float_policy.tot_premium , star_health_allied_insu_supertopup_float_policy.medi_cgst_rate , star_health_allied_insu_supertopup_float_policy.medi_cgst_tot , star_health_allied_insu_supertopup_float_policy.medi_sgst_rate, star_health_allied_insu_supertopup_float_policy.medi_sgst_tot, star_health_allied_insu_supertopup_float_policy.medi_final_premium,  star_health_allied_insu_supertopup_float_policy.max_age, star_health_allied_insu_supertopup_float_policy.star_health_status, star_health_allied_insu_supertopup_float_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_supertopup_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_star_health_allied_supertopup_float_policy_list = $query["userData"];
			}
			$result["medi_star_health_allied_supertopup_float_policy_data_arr"] = $medi_star_health_allied_supertopup_float_policy_list;

			$medi_ind_the_new_india_2017_assu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_ind_the_new_india_2017_assu_policy["the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_ind_the_new_india_2017_assu_policy["the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_policy_2017_ind_assu_policy", $colNames = "the_new_india_medi_policy_2017_ind_assu_policy.medi_insu_new_india_tns_assu_ind_policy_id , the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_id as the_new_india_medi_policy_2017_ind_assu_fk_policy_id , the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_type_id , the_new_india_medi_policy_2017_ind_assu_policy.policy_name_txt ,the_new_india_medi_policy_2017_ind_assu_policy.fk_company_id ,the_new_india_medi_policy_2017_ind_assu_policy.fk_department_id , the_new_india_medi_policy_2017_ind_assu_policy.total_the_new_india_medi_tns_hdfc_json_data , the_new_india_medi_policy_2017_ind_assu_policy.tot_premium , the_new_india_medi_policy_2017_ind_assu_policy.medi_cgst_rate , the_new_india_medi_policy_2017_ind_assu_policy.medi_cgst_tot , the_new_india_medi_policy_2017_ind_assu_policy.medi_sgst_rate , the_new_india_medi_policy_2017_ind_assu_policy.medi_sgst_tot , the_new_india_medi_policy_2017_ind_assu_policy.medi_final_premium , the_new_india_medi_policy_2017_ind_assu_policy.the_new_india_status , the_new_india_medi_policy_2017_ind_assu_policy.the_new_india_del_flag", $whereArr = $whereArr_medi_ind_the_new_india_2017_assu_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_ind_the_new_india_2017_assu_policy_list = $query["userData"];
			}
			$result["medi_ind_the_new_india_2017_assu_policy_data_arr"] = $medi_ind_the_new_india_2017_assu_policy_list;

			$medi_float_the_new_india_assu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_float_the_new_india_assu_policy["the_new_india_medi_floater_assu_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_float_the_new_india_assu_policy["the_new_india_medi_floater_assu_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_floater_assu_policy", $colNames = "the_new_india_medi_floater_assu_policy.medi_new_india_assu_float_policy_id , the_new_india_medi_floater_assu_policy.fk_policy_id as medi_the_new_india_floater_assu_fk_policy_id , the_new_india_medi_floater_assu_policy.fk_policy_type_id , the_new_india_medi_floater_assu_policy.policy_name_txt ,the_new_india_medi_floater_assu_policy.fk_company_id ,the_new_india_medi_floater_assu_policy.fk_department_id , the_new_india_medi_floater_assu_policy.total_the_new_india_medi_float_json_data , the_new_india_medi_floater_assu_policy.tot_premium , the_new_india_medi_floater_assu_policy.floater_disc_rate , the_new_india_medi_floater_assu_policy.floater_disc_tot , the_new_india_medi_floater_assu_policy.gross_premium_tot , the_new_india_medi_floater_assu_policy.gross_premium_tot_new , the_new_india_medi_floater_assu_policy.medi_cgst_rate , the_new_india_medi_floater_assu_policy.medi_cgst_tot , the_new_india_medi_floater_assu_policy.medi_sgst_rate , the_new_india_medi_floater_assu_policy.medi_sgst_tot , the_new_india_medi_floater_assu_policy.medi_final_premium , the_new_india_medi_floater_assu_policy.the_new_india_status , the_new_india_medi_floater_assu_policy.the_new_india_del_flag", $whereArr = $whereArr_medi_float_the_new_india_assu_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_float_the_new_india_assu_policy_list = $query["userData"];
			}
			$result["medi_float_the_new_india_assu_policy_data_arr"] = $medi_float_the_new_india_assu_policy_list;

			$medi_ind_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_policy", $colNames = "medi_hdfc_ergo_health_insu_policy.medi_hdfc_ergo_health_insu_policy_id , medi_hdfc_ergo_health_insu_policy.fk_policy_id as medi_hdfc_ergo_health_insu_policy_fk_policy_id , medi_hdfc_ergo_health_insu_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_policy.fk_company_id ,medi_hdfc_ergo_health_insu_policy.fk_department_id , medi_hdfc_ergo_health_insu_policy.total_medi_ind_hdfc_json_data , medi_hdfc_ergo_health_insu_policy.years_of_premium , medi_hdfc_ergo_health_insu_policy.region , medi_hdfc_ergo_health_insu_policy.tot_premium , medi_hdfc_ergo_health_insu_policy.protect_ride_prem_tot , medi_hdfc_ergo_health_insu_policy.hospital_daily_cash_prem_tot , medi_hdfc_ergo_health_insu_policy.ipa_rider_prem_tot , medi_hdfc_ergo_health_insu_policy.load_desc , medi_hdfc_ergo_health_insu_policy.load_tot , medi_hdfc_ergo_health_insu_policy.less_disc_per , medi_hdfc_ergo_health_insu_policy.less_disc_tot , medi_hdfc_ergo_health_insu_policy.family_disc_per ,medi_hdfc_ergo_health_insu_policy.family_disc_tot , medi_hdfc_ergo_health_insu_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_policy.medi_final_premium , medi_hdfc_ergo_health_insu_policy.medi_hdfc_ergo_health_insu_policy_status , medi_hdfc_ergo_health_insu_policy.medi_hdfc_ergo_health_insu_policy_del_flag", $whereArr = $whereArr_medi_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_ind_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_ind_hdfc_ergo_health_insu_policy_data_arr"] = $medi_ind_hdfc_ergo_health_insu_policy_list;

			$medi_easy_rate_float_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_easy_rate_float_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_easy_rate_float_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_float_policy", $colNames = "hdfc_ergo_health_easy_rate_card_float_policy.medi_hdfc_ergo_health_insu_easy_float_policy_id  , hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_id as hdfc_ergo_health_easy_rate_card_float_policy_fk_policy_id , hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_type_id , hdfc_ergo_health_easy_rate_card_float_policy.policy_name_txt ,hdfc_ergo_health_easy_rate_card_float_policy.fk_company_id ,hdfc_ergo_health_easy_rate_card_float_policy.fk_department_id , hdfc_ergo_health_easy_rate_card_float_policy.total_easy_float_medi_hdfc_json_data , hdfc_ergo_health_easy_rate_card_float_policy.years_of_premium , hdfc_ergo_health_easy_rate_card_float_policy.region , hdfc_ergo_health_easy_rate_card_float_policy.tot_premium , hdfc_ergo_health_easy_rate_card_float_policy.hdfc_ergo_health_insu_child_count , hdfc_ergo_health_easy_rate_card_float_policy.hdfc_ergo_health_insu_child_count_first_premium , hdfc_ergo_health_easy_rate_card_float_policy.hdfc_ergo_health_insu_child_total_premium , hdfc_ergo_health_easy_rate_card_float_policy.protect_ride_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy.hospital_daily_cash_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy.ipa_rider_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy.load_desc , hdfc_ergo_health_easy_rate_card_float_policy.load_tot , hdfc_ergo_health_easy_rate_card_float_policy.stay_active_benefit , hdfc_ergo_health_easy_rate_card_float_policy.stay_active_benefit_prem , hdfc_ergo_health_easy_rate_card_float_policy.less_disc_per , hdfc_ergo_health_easy_rate_card_float_policy.tot_basic_prem ,  hdfc_ergo_health_easy_rate_card_float_policy.less_disc_tot ,  hdfc_ergo_health_easy_rate_card_float_policy.gross_premium_tot ,  hdfc_ergo_health_easy_rate_card_float_policy.gross_premium_tot_new ,  hdfc_ergo_health_easy_rate_card_float_policy.medi_cgst_rate ,  hdfc_ergo_health_easy_rate_card_float_policy.medi_cgst_tot ,  hdfc_ergo_health_easy_rate_card_float_policy.medi_sgst_rate ,  hdfc_ergo_health_easy_rate_card_float_policy.medi_sgst_tot, hdfc_ergo_health_easy_rate_card_float_policy.medi_final_premium  ,  hdfc_ergo_health_easy_rate_card_float_policy.max_age , hdfc_ergo_health_easy_rate_card_float_policy.easy_rate_status , hdfc_ergo_health_easy_rate_card_float_policy.easy_rate_del_flag", $whereArr = $whereArr_medi_easy_rate_float_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_easy_rate_float_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr"] = $medi_easy_rate_float_hdfc_ergo_health_insu_policy_list;

			$medi_easy_rate_ind_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_policy", $colNames = "hdfc_ergo_health_easy_rate_card_indi_policy.medi_hdfc_ergo_health_insu_easy_policy_id  , hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_id as hdfc_ergo_health_easy_rate_card_indi_policy_fk_policy_id , hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_type_id , hdfc_ergo_health_easy_rate_card_indi_policy.policy_name_txt ,hdfc_ergo_health_easy_rate_card_indi_policy.fk_company_id ,hdfc_ergo_health_easy_rate_card_indi_policy.fk_department_id , hdfc_ergo_health_easy_rate_card_indi_policy.total_easy_medi_hdfc_json_data , hdfc_ergo_health_easy_rate_card_indi_policy.years_of_premium , hdfc_ergo_health_easy_rate_card_indi_policy.region , hdfc_ergo_health_easy_rate_card_indi_policy.tot_premium , hdfc_ergo_health_easy_rate_card_indi_policy.protect_ride_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy.hospital_daily_cash_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy.ipa_rider_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy.load_desc , hdfc_ergo_health_easy_rate_card_indi_policy.load_tot , hdfc_ergo_health_easy_rate_card_indi_policy.family_disc_per , hdfc_ergo_health_easy_rate_card_indi_policy.family_disc_tot , hdfc_ergo_health_easy_rate_card_indi_policy.less_disc_per , hdfc_ergo_health_easy_rate_card_indi_policy.tot_basic_prem ,  hdfc_ergo_health_easy_rate_card_indi_policy.less_disc_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy.gross_premium_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy.gross_premium_tot_new ,  hdfc_ergo_health_easy_rate_card_indi_policy.medi_cgst_rate ,  hdfc_ergo_health_easy_rate_card_indi_policy.medi_cgst_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy.medi_sgst_rate ,  hdfc_ergo_health_easy_rate_card_indi_policy.medi_sgst_tot, hdfc_ergo_health_easy_rate_card_indi_policy.medi_final_premium  , hdfc_ergo_health_easy_rate_card_indi_policy.easy_rate_status , hdfc_ergo_health_easy_rate_card_indi_policy.easy_rate_del_flag", $whereArr = $whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_easy_rate_ind_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr"] = $medi_easy_rate_ind_hdfc_ergo_health_insu_policy_list;

			$medi_energy_ind_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_energy_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_energy_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_energy_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_energy_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_energy_policy", $colNames = "medi_hdfc_ergo_health_insu_energy_policy.medi_hdfc_ergo_health_insu_energy_policy_id , medi_hdfc_ergo_health_insu_energy_policy.fk_policy_id as medi_hdfc_ergo_health_insu_energy_policy_fk_policy_id , medi_hdfc_ergo_health_insu_energy_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_energy_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_energy_policy.fk_company_id ,medi_hdfc_ergo_health_insu_energy_policy.fk_department_id , medi_hdfc_ergo_health_insu_energy_policy.total_energy_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_energy_policy.tot_premium , medi_hdfc_ergo_health_insu_energy_policy.less_disc_per , medi_hdfc_ergo_health_insu_energy_policy.less_disc_tot , medi_hdfc_ergo_health_insu_energy_policy.load_desc , medi_hdfc_ergo_health_insu_energy_policy.load_tot , medi_hdfc_ergo_health_insu_energy_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_energy_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_energy_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_energy_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_energy_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_energy_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_energy_policy.medi_final_premium , medi_hdfc_ergo_health_insu_energy_policy.medi_hdfc_ergo_health_insu_energy_policy_status , medi_hdfc_ergo_health_insu_energy_policy.medi_hdfc_ergo_health_insu_energy_policy_del_flag", $whereArr = $whereArr_medi_energy_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_energy_ind_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr"] = $medi_energy_ind_hdfc_ergo_health_insu_policy_list;

			$medi_suraksha_ind_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_suraksha_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_suraksha_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_policy", $colNames = "medi_hdfc_ergo_health_insu_suraksha_policy.medi_hdfc_ergo_health_insu_suraksha_policy_id , medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_id as medi_hdfc_ergo_health_insu_suraksha_policy_fk_policy_id , medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_suraksha_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_suraksha_policy.fk_company_id ,medi_hdfc_ergo_health_insu_suraksha_policy.fk_department_id , medi_hdfc_ergo_health_insu_suraksha_policy.total_suraksha_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_suraksha_policy.years_of_premium , medi_hdfc_ergo_health_insu_suraksha_policy.region , medi_hdfc_ergo_health_insu_suraksha_policy.tot_premium , medi_hdfc_ergo_health_insu_suraksha_policy.load_desc  , medi_hdfc_ergo_health_insu_suraksha_policy.load_tot  , medi_hdfc_ergo_health_insu_suraksha_policy.less_disc_per , medi_hdfc_ergo_health_insu_suraksha_policy.less_disc_tot , medi_hdfc_ergo_health_insu_suraksha_policy.family_disc_per , medi_hdfc_ergo_health_insu_suraksha_policy.family_disc_tot , medi_hdfc_ergo_health_insu_suraksha_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_suraksha_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_suraksha_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_suraksha_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_suraksha_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_suraksha_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_suraksha_policy.medi_final_premium , medi_hdfc_ergo_health_insu_suraksha_policy.medi_hdfc_ergo_health_insu_suraksha_policy_status , medi_hdfc_ergo_health_insu_suraksha_policy.medi_hdfc_ergo_health_insu_suraksha_policy_del_flag", $whereArr = $whereArr_medi_suraksha_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_suraksha_ind_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr"] = $medi_suraksha_ind_hdfc_ergo_health_insu_policy_list;

			$medi_float_suraksha_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_float_suraksha_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_float_suraksha_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_floater_policy", $colNames = "medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_hdfc_ergo_health_float_suraksha_policy_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_id as medi_hdfc_ergo_health_insu_suraksha_floater_policy_fk_policy_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_company_id ,medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_department_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy.total_suraksha_float_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_suraksha_floater_policy.years_of_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy.region , medi_hdfc_ergo_health_insu_suraksha_floater_policy.tot_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy.hdfc_ergo_health_insu_child_count , medi_hdfc_ergo_health_insu_suraksha_floater_policy.hdfc_ergo_health_insu_child_count_first_premium ,medi_hdfc_ergo_health_insu_suraksha_floater_policy.hdfc_ergo_health_insu_child_total_premium  , medi_hdfc_ergo_health_insu_suraksha_floater_policy.load_desc , medi_hdfc_ergo_health_insu_suraksha_floater_policy.load_tot  , medi_hdfc_ergo_health_insu_suraksha_floater_policy.less_disc_per , medi_hdfc_ergo_health_insu_suraksha_floater_policy.less_disc_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_final_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy.max_age , medi_hdfc_ergo_health_insu_suraksha_floater_policy.suraksha_floater_policy_status , medi_hdfc_ergo_health_insu_suraksha_floater_policy.suraksha_floater_policy_del_flag", $whereArr = $whereArr_medi_float_suraksha_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_float_suraksha_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr"] = $medi_float_suraksha_hdfc_ergo_health_insu_policy_list;

			$medi_float_hdfc_ergo_health_insu_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_float_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_float_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_float_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_float_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_float_policy", $colNames = "medi_hdfc_ergo_health_insu_float_policy.medi_hdfc_ergo_health_insu_float_policy_id , medi_hdfc_ergo_health_insu_float_policy.fk_policy_id as medi_hdfc_ergo_health_insu_float_policy_fk_policy_id , medi_hdfc_ergo_health_insu_float_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_float_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_float_policy.fk_company_id ,medi_hdfc_ergo_health_insu_float_policy.fk_department_id , medi_hdfc_ergo_health_insu_float_policy.total_medi_float_hdfc_json_data , medi_hdfc_ergo_health_insu_float_policy.years_of_premium , medi_hdfc_ergo_health_insu_float_policy.region , medi_hdfc_ergo_health_insu_float_policy.tot_premium , medi_hdfc_ergo_health_insu_float_policy.hdfc_ergo_health_insu_child_count , medi_hdfc_ergo_health_insu_float_policy.hdfc_ergo_health_insu_child_count_first_premium , medi_hdfc_ergo_health_insu_float_policy.hdfc_ergo_health_insu_child_total_premium , medi_hdfc_ergo_health_insu_float_policy.protect_ride_prem_tot , medi_hdfc_ergo_health_insu_float_policy.hospital_daily_cash_prem_tot , medi_hdfc_ergo_health_insu_float_policy.ipa_rider_prem_tot , medi_hdfc_ergo_health_insu_float_policy.load_desc , medi_hdfc_ergo_health_insu_float_policy.load_tot ,  medi_hdfc_ergo_health_insu_float_policy.less_disc_per ,  medi_hdfc_ergo_health_insu_float_policy.less_disc_tot , medi_hdfc_ergo_health_insu_float_policy.stay_active_benefit ,medi_hdfc_ergo_health_insu_float_policy.stay_active_benefit_prem_tot , medi_hdfc_ergo_health_insu_float_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_float_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_float_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_float_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_float_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_float_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_float_policy.medi_final_premium ,medi_hdfc_ergo_health_insu_float_policy.max_age, medi_hdfc_ergo_health_insu_float_policy.medi_hdfc_ergo_health_insu_float_policy_status , medi_hdfc_ergo_health_insu_float_policy.medi_hdfc_ergo_health_insu_float_policy_del_flag", $whereArr = $whereArr_medi_float_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_float_hdfc_ergo_health_insu_policy_list = $query["userData"];
			}
			$result["medi_float_hdfc_ergo_health_insu_policy_data_arr"] = $medi_float_hdfc_ergo_health_insu_policy_list;

			$mediclaim_floater_2014_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_mediclaim_floater_2014_policy["mediclaim_floater_2014_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_mediclaim_floater_2014_policy["mediclaim_floater_2014_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "mediclaim_floater_2014_policy", $colNames = "mediclaim_floater_2014_policy.medi_floater_2014_id , mediclaim_floater_2014_policy.fk_policy_id as medi_floater_2014_policy_fk_policy_id , mediclaim_floater_2014_policy.fk_policy_type_id , mediclaim_floater_2014_policy.policy_name_txt , mediclaim_floater_2014_policy.tot_medi_floater_2014_json , mediclaim_floater_2014_policy.name_insured_sum_insured , mediclaim_floater_2014_policy.name_insured_premium , mediclaim_floater_2014_policy.medi_float_2014_total_premium , mediclaim_floater_2014_policy.medi_float_2014_child_count , mediclaim_floater_2014_policy.medi_float_2014_child_total_premium ,mediclaim_floater_2014_policy.medi_float_2014_child_count_first_premium , mediclaim_floater_2014_policy.medi_float_2014_load_description , mediclaim_floater_2014_policy.medi_float_2014_load_amount , mediclaim_floater_2014_policy.medi_float_2014_load_gross_premium , mediclaim_floater_2014_policy.medi_float_2014_cgst_rate , mediclaim_floater_2014_policy.medi_float_2014_cgst_tot , mediclaim_floater_2014_policy.medi_float_2014_sgst_rate , mediclaim_floater_2014_policy.medi_float_2014_sgst_tot , mediclaim_floater_2014_policy.medi_float_2014_final_premium ,mediclaim_floater_2014_policy.max_age, mediclaim_floater_2014_policy.medi_float_2014_status , mediclaim_floater_2014_policy.medi_float_2014_del_flag", $whereArr = $whereArr_mediclaim_floater_2014_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$mediclaim_floater_2014_policy_list = $query["userData"];
			}
			$result["mediclaim_floater2014_data_arr"] = $mediclaim_floater_2014_policy_list;

			$medi_floater_2020_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_medi_floater_2020_policy["medi_floater_2020_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_medi_floater_2020_policy["medi_floater_2020_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_floater_2020_policy", $colNames = "medi_floater_2020_policy.medi_floater_2020_id , medi_floater_2020_policy.fk_policy_id as medi_floater2020_policy_fk_policy_id , medi_floater_2020_policy.fk_policy_type_id , medi_floater_2020_policy.policy_name_txt , medi_floater_2020_policy.tot_medi_floater_2020_json , medi_floater_2020_policy.name_insured_sum_insured , medi_floater_2020_policy.name_insured_premium , medi_floater_2020_policy.name_insured_ncd , medi_floater_2020_policy.name_insured_premium_after_ncd , medi_floater_2020_policy.medi_float_2020_total_premium , medi_floater_2020_policy.medi_float_2020_child_count , medi_floater_2020_policy.medi_float_2020_child_count_first_premium , medi_floater_2020_policy.medi_float_2020_child_total_premium , medi_floater_2020_policy.medi_float_2020_load_description , medi_floater_2020_policy.medi_float_2020_load_amount , medi_floater_2020_policy.medi_float_2020_restore_cover_premium , medi_floater_2020_policy.medi_float_2020_maternity_new_bornbaby , medi_floater_2020_policy.medi_float_2020_daily_cash_allow_hosp ,medi_floater_2020_policy.medi_float_2020_load_gross_premium, medi_floater_2020_policy.medi_float_2020_cgst_rate , medi_floater_2020_policy.medi_float_2020_cgst_tot , medi_floater_2020_policy.medi_float_2020_sgst_rate , medi_floater_2020_policy.medi_float_2020_sgst_tot , medi_floater_2020_policy.medi_float_2020_final_premium , medi_floater_2020_policy.max_age , medi_floater_2020_policy.medi_float_2020_status , medi_floater_2020_policy.medi_float_2020_del_flag", $whereArr = $whereArr_medi_floater_2020_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$medi_floater_2020_policy_list = $query["userData"];
			}
			$result["medi_floater2020_data_arr"] = $medi_floater_2020_policy_list;

			$supertopup_floater_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_supertopup_floater["super_top_up_floater_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_supertopup_floater["super_top_up_floater_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "super_top_up_floater_policy", $colNames = "super_top_up_floater_policy.supertopup_floater_policy_id , super_top_up_floater_policy.fk_policy_id as supertopup_floater_policy_fk_policy_id , super_top_up_floater_policy.fk_policy_type_id , super_top_up_floater_policy.policy_name_txt , super_top_up_floater_policy.tot_supertopup_floater_json , super_top_up_floater_policy.name_insured_policy_option , super_top_up_floater_policy.name_insured_deductable_thershold , super_top_up_floater_policy.name_insured_sum_insured , super_top_up_floater_policy.name_insured_premium , super_top_up_floater_policy.supertopup_floater_total_premium , super_top_up_floater_policy.supertopup_floater_load_description , super_top_up_floater_policy.supertopup_floater_load_amount , super_top_up_floater_policy.supertopup_floater_load_gross_premium , super_top_up_floater_policy.supertopup_floater_cgst_rate , super_top_up_floater_policy.supertopup_floater_cgst_tot , super_top_up_floater_policy.supertopup_floater_sgst_rate , super_top_up_floater_policy.supertopup_floater_sgst_tot , super_top_up_floater_policy.supertopup_floater_final_premium ,super_top_up_floater_policy.max_age, super_top_up_floater_policy.supertopup_floater_status , super_top_up_floater_policy.supertopup_floater_final_del_flag", $whereArr = $whereArr_supertopup_floater, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$supertopup_floater_policy_list = $query["userData"];
			}
			$result["supertopup_floater_data_arr"] = $supertopup_floater_policy_list;

			$supertopup_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_supertopup_ind["supertopup_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_supertopup_ind["supertopup_ind_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "supertopup_ind_policy", $colNames = "supertopup_ind_policy.supertopup_ind_policy_id , supertopup_ind_policy.fk_policy_id as supertopup_ind_policy_fk_policy_id , supertopup_ind_policy.fk_policy_type_id , supertopup_ind_policy.policy_name_txt , supertopup_ind_policy.tot_supertopup_ind_json , supertopup_ind_policy.supertopup_ind_total_premium , supertopup_ind_policy.supertopup_ind_load_description , supertopup_ind_policy.supertopup_ind_load_amount , supertopup_ind_policy.supertopup_ind_load_gross_premium , supertopup_ind_policy.supertopup_ind_cgst_rate , supertopup_ind_policy.supertopup_ind_cgst_tot , supertopup_ind_policy.supertopup_ind_sgst_rate , supertopup_ind_policy.supertopup_ind_sgst_tot , supertopup_ind_policy.supertopup_ind_final_premium , supertopup_ind_policy.supertopup_ind_status , supertopup_ind_policy.supertopup_ind_del_flag ", $whereArr = $whereArr_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$supertopup_ind_policy_list = $query["userData"];
			}
			$result["supertopup_ind_data_arr"] = $supertopup_ind_policy_list;

			$the_new_india_supertopup_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_the_new_india_supertopup_ind["the_new_india_supertopup_ind_assu_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_the_new_india_supertopup_ind["the_new_india_supertopup_ind_assu_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_ind_assu_policy", $colNames = "the_new_india_supertopup_ind_assu_policy.the_new_india_supertopup_assu_ind_policy_id , the_new_india_supertopup_ind_assu_policy.fk_policy_id as the_new_india_supertopup_ind_assu_policy_fk_policy_id , the_new_india_supertopup_ind_assu_policy.fk_policy_type_id ,  the_new_india_supertopup_ind_assu_policy.fk_company_id ,  the_new_india_supertopup_ind_assu_policy.fk_department_id , the_new_india_supertopup_ind_assu_policy.policy_name_txt , the_new_india_supertopup_ind_assu_policy.total_the_new_india_supertopup_ind_json_data ,  the_new_india_supertopup_ind_assu_policy.tot_premium , the_new_india_supertopup_ind_assu_policy.medi_cgst_rate , the_new_india_supertopup_ind_assu_policy.medi_cgst_tot , the_new_india_supertopup_ind_assu_policy.medi_sgst_rate , the_new_india_supertopup_ind_assu_policy.medi_sgst_tot, the_new_india_supertopup_ind_assu_policy.medi_final_premium, the_new_india_supertopup_ind_assu_policy.the_new_india_status, the_new_india_supertopup_ind_assu_policy.the_new_india_del_flag", $whereArr = $whereArr_the_new_india_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$the_new_india_supertopup_ind_policy_list = $query["userData"];
			}
			$result["the_new_india_supertopup_ind_data_arr"] = $the_new_india_supertopup_ind_policy_list;

			$the_new_india_supertopup_ind_single_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_the_new_india_supertopup_ind_single["the_new_india_supertopup_ind_single_assu_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_the_new_india_supertopup_ind_single["the_new_india_supertopup_ind_single_assu_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_ind_single_assu_policy", $colNames = "the_new_india_supertopup_ind_single_assu_policy.the_new_india_supertopup_assu_ind_single_policy_id , the_new_india_supertopup_ind_single_assu_policy.fk_policy_id as the_new_india_supertopup_ind_single_assu_policy_fk_policy_id , the_new_india_supertopup_ind_single_assu_policy.fk_policy_type_id ,  the_new_india_supertopup_ind_single_assu_policy.fk_company_id ,  the_new_india_supertopup_ind_single_assu_policy.fk_department_id , the_new_india_supertopup_ind_single_assu_policy.policy_name_txt , the_new_india_supertopup_ind_single_assu_policy.total_the_new_india_supertopup_ind_single_json_data ,  the_new_india_supertopup_ind_single_assu_policy.tot_premium , the_new_india_supertopup_ind_single_assu_policy.medi_cgst_rate , the_new_india_supertopup_ind_single_assu_policy.medi_cgst_tot , the_new_india_supertopup_ind_single_assu_policy.medi_sgst_rate , the_new_india_supertopup_ind_single_assu_policy.medi_sgst_tot, the_new_india_supertopup_ind_single_assu_policy.medi_final_premium, the_new_india_supertopup_ind_single_assu_policy.the_new_india_status, the_new_india_supertopup_ind_single_assu_policy.the_new_india_del_flag", $whereArr = $whereArr_the_new_india_supertopup_ind_single, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$the_new_india_supertopup_ind_single_policy_list = $query["userData"];
			}
			$result["the_new_india_supertopup_ind_single_data_arr"] = $the_new_india_supertopup_ind_single_policy_list;

			$hdfc_ergo_health_supertopup_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_hdfc_ergo_health_supertopup_ind["hdfc_ergo_health_super_topup_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_hdfc_ergo_health_supertopup_ind["hdfc_ergo_health_super_topup_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_policy", $colNames = "hdfc_ergo_health_super_topup_policy.supertopup_ind_policy_id , hdfc_ergo_health_super_topup_policy.fk_policy_id as hdfc_ergo_health_super_topup_policy_fk_policy_id , hdfc_ergo_health_super_topup_policy.fk_policy_type_id ,  hdfc_ergo_health_super_topup_policy.fk_company_id ,  hdfc_ergo_health_super_topup_policy.fk_department_id , hdfc_ergo_health_super_topup_policy.policy_name_txt , hdfc_ergo_health_super_topup_policy.tot_supertopup_ind_hdfc_json , hdfc_ergo_health_super_topup_policy.years_of_premium , hdfc_ergo_health_super_topup_policy.tot_premium , hdfc_ergo_health_super_topup_policy.load_desc , hdfc_ergo_health_super_topup_policy.load_tot , hdfc_ergo_health_super_topup_policy.less_disc_per , hdfc_ergo_health_super_topup_policy.less_disc_tot , hdfc_ergo_health_super_topup_policy.gross_premium_tot , hdfc_ergo_health_super_topup_policy.gross_premium_tot_new , hdfc_ergo_health_super_topup_policy.medi_cgst_rate , hdfc_ergo_health_super_topup_policy.medi_cgst_tot , hdfc_ergo_health_super_topup_policy.medi_sgst_rate , hdfc_ergo_health_super_topup_policy.medi_sgst_tot, hdfc_ergo_health_super_topup_policy.medi_final_premium, hdfc_ergo_health_super_topup_policy.super_topup_policy_status, hdfc_ergo_health_super_topup_policy.super_topup_policy_del_flag", $whereArr = $whereArr_hdfc_ergo_health_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$hdfc_ergo_health_supertopup_ind_policy_list = $query["userData"];
			}
			$result["hdfc_ergo_health_supertopup_ind_data_arr"] = $hdfc_ergo_health_supertopup_ind_policy_list;

			$hdfc_ergo_health_supertopup_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "") {
				$whereArr_hdfc_ergo_health_supertopup_float["hdfc_ergo_health_super_topup_floater_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_hdfc_ergo_health_supertopup_float["hdfc_ergo_health_super_topup_floater_policy.fk_policy_id"] = $result["policy_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_floater_policy", $colNames = "hdfc_ergo_health_super_topup_floater_policy.supertopup_float_policy_id , hdfc_ergo_health_super_topup_floater_policy.fk_policy_id as hdfc_ergo_health_super_topup_floater_policy_fk_policy_id , hdfc_ergo_health_super_topup_floater_policy.fk_policy_type_id ,  hdfc_ergo_health_super_topup_floater_policy.fk_company_id ,  hdfc_ergo_health_super_topup_floater_policy.fk_department_id , hdfc_ergo_health_super_topup_floater_policy.policy_name_txt , hdfc_ergo_health_super_topup_floater_policy.tot_supertopup_float_hdfc_json , hdfc_ergo_health_super_topup_floater_policy.years_of_premium , hdfc_ergo_health_super_topup_floater_policy.tot_premium , hdfc_ergo_health_super_topup_floater_policy.load_desc , hdfc_ergo_health_super_topup_floater_policy.load_tot , hdfc_ergo_health_super_topup_floater_policy.less_disc_per , hdfc_ergo_health_super_topup_floater_policy.less_disc_tot , hdfc_ergo_health_super_topup_floater_policy.gross_premium_tot , hdfc_ergo_health_super_topup_floater_policy.gross_premium_tot_new , hdfc_ergo_health_super_topup_floater_policy.medi_cgst_rate , hdfc_ergo_health_super_topup_floater_policy.medi_cgst_tot , hdfc_ergo_health_super_topup_floater_policy.medi_sgst_rate , hdfc_ergo_health_super_topup_floater_policy.medi_sgst_tot, hdfc_ergo_health_super_topup_floater_policy.medi_final_premium, hdfc_ergo_health_super_topup_floater_policy.max_age, hdfc_ergo_health_super_topup_floater_policy.super_topup_policy_status, hdfc_ergo_health_super_topup_floater_policy.super_topup_policy_del_flag", $whereArr = $whereArr_hdfc_ergo_health_supertopup_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$hdfc_ergo_health_supertopup_float_policy_list = $query["userData"];
			}
			$result["hdfc_ergo_health_supertopup_float_data_arr"] = $hdfc_ergo_health_supertopup_float_policy_list;

			$care_health_care_adv_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_adv_ind_policy", $colNames = "care_health_care_adv_ind_policy.care_adv_ind_id , care_health_care_adv_ind_policy.fk_policy_id as care_health_care_adv_ind_policy_fk_policy_id , care_health_care_adv_ind_policy.fk_policy_type_id , care_health_care_adv_ind_policy.policy_name_txt , care_health_care_adv_ind_policy.fk_company_id , care_health_care_adv_ind_policy.fk_department_id , care_health_care_adv_ind_policy.total_care_adv_ind_json_data , care_health_care_adv_ind_policy.medi_final_premium , care_health_care_adv_ind_policy.care_status , care_health_care_adv_ind_policy.care_del_flag ", $whereArr = $whereArr_care_health_care_adv_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$care_health_care_adv_ind_policy_list = $query["userData"];
			}
			$result["care_health_care_adv_ind_policy_data_arr"] = $care_health_care_adv_ind_policy_list;

			$care_health_care_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_care_health_care_ind["care_health_care_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_care_health_care_ind["care_health_care_ind_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_care_health_care_ind["care_health_care_ind_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_care_health_care_ind["care_health_care_ind_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_ind_policy", $colNames = "care_health_care_ind_policy.care_ind_id , care_health_care_ind_policy.fk_policy_id as care_health_care_ind_policy_fk_policy_id , care_health_care_ind_policy.fk_policy_type_id , care_health_care_ind_policy.policy_name_txt , care_health_care_ind_policy.fk_company_id , care_health_care_ind_policy.fk_department_id , care_health_care_ind_policy.total_care_ind_json_data , care_health_care_ind_policy.medi_final_premium , care_health_care_ind_policy.care_status , care_health_care_ind_policy.care_del_flag ", $whereArr = $whereArr_care_health_care_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$care_health_care_ind_policy_list = $query["userData"];
			}
			$result["care_health_care_ind_policy_data_arr"] = $care_health_care_ind_policy_list;

			$care_health_care_adv_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_adv_float_policy", $colNames = "care_health_care_adv_float_policy.care_adv_float_id , care_health_care_adv_float_policy.fk_policy_id as care_health_care_adv_float_policy_fk_policy_id , care_health_care_adv_float_policy.fk_policy_type_id , care_health_care_adv_float_policy.policy_name_txt , care_health_care_adv_float_policy.fk_company_id , care_health_care_adv_float_policy.fk_department_id , care_health_care_adv_float_policy.total_care_adv_float_json_data , care_health_care_adv_float_policy.medi_final_premium , care_health_care_adv_float_policy.max_age , care_health_care_adv_float_policy.care_status , care_health_care_adv_float_policy.care_del_flag ", $whereArr = $whereArr_care_health_care_adv_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$care_health_care_adv_float_policy_list = $query["userData"];
			}
			$result["care_health_care_adv_float_policy_data_arr"] = $care_health_care_adv_float_policy_list;

			$care_health_care_float_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_care_health_care_float["care_health_care_float_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_care_health_care_float["care_health_care_float_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_care_health_care_float["care_health_care_float_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_care_health_care_float["care_health_care_float_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_float_policy", $colNames = "care_health_care_float_policy.care_float_id , care_health_care_float_policy.fk_policy_id as care_health_care_float_policy_fk_policy_id , care_health_care_float_policy.fk_policy_type_id , care_health_care_float_policy.policy_name_txt , care_health_care_float_policy.fk_company_id , care_health_care_float_policy.fk_department_id , care_health_care_float_policy.total_care_float_json_data , care_health_care_float_policy.medi_final_premium , care_health_care_float_policy.max_age , care_health_care_float_policy.care_status , care_health_care_float_policy.care_del_flag ", $whereArr = $whereArr_care_health_care_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$care_health_care_float_policy_list = $query["userData"];
			}
			$result["care_health_care_float_policy_data_arr"] = $care_health_care_float_policy_list;


			$gmc_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_gmc_ind["gmc_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_gmc_ind["gmc_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_gmc_ind["gmc_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_gmc_ind["gmc_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "gmc_policy", $colNames = "gmc_policy.gmc_policy_id , gmc_policy.fk_policy_id as gmc_policy_fk_policy_id , gmc_policy.fk_policy_type_id , gmc_policy.policy_name_txt , gmc_policy.fk_company_id , gmc_policy.fk_department_id , gmc_policy.tot_gmc_json_data , gmc_policy.gmc_family_size , gmc_policy.gmc_tot_sum_insured , gmc_policy.gmc_policy_status , gmc_policy.gmc_policy_del_flag ", $whereArr = $whereArr_gmc_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$gmc_ind_policy_list = $query["userData"];
			}
			$result["gmc_ind_data_arr"] = $gmc_ind_policy_list;

			$gpa_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_gpa_ind["gpa_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_gpa_ind["gpa_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_gpa_ind["gpa_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_gpa_ind["gpa_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "gpa_policy", $colNames = "gpa_policy.gpa_policy_id , gpa_policy.fk_policy_id as gpa_policy_fk_policy_id , gpa_policy.fk_policy_type_id , gpa_policy.policy_name_txt , gpa_policy.fk_company_id , gpa_policy.fk_department_id , gpa_policy.tot_gpa_json_data , gpa_policy.gpa_family_size , gpa_policy.gpa_tot_sum_insured , gpa_policy.gpa_policy_status , gpa_policy.gpa_policy_del_flag ", $whereArr = $whereArr_gpa_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$gpa_ind_policy_list = $query["userData"];
			}
			$result["gpa_ind_data_arr"] = $gpa_ind_policy_list;

			$ind_personal_accident_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_ind_personal_accident["personal_accident_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_ind_personal_accident["personal_accident_ind_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_ind_personal_accident["personal_accident_ind_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_ind_personal_accident["personal_accident_ind_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "personal_accident_ind_policy", $colNames = "personal_accident_ind_policy.paccident_policy_id , personal_accident_ind_policy.fk_policy_id as personal_accident_policy_ind_fk_policy_id , personal_accident_ind_policy.fk_policy_type_id , personal_accident_ind_policy.policy_name_txt , personal_accident_ind_policy.fk_company_id , personal_accident_ind_policy.fk_department_id , personal_accident_ind_policy.total_pa_ind_json_data , personal_accident_ind_policy.tot_premium , personal_accident_ind_policy.less_disc_rate , personal_accident_ind_policy.less_disc_tot , personal_accident_ind_policy.gross_premium , personal_accident_ind_policy.gross_premium_new  , personal_accident_ind_policy.medi_cgst_rate  , personal_accident_ind_policy.medi_cgst_tot  , personal_accident_ind_policy.medi_sgst_rate  , personal_accident_ind_policy.medi_sgst_tot  , personal_accident_ind_policy.medi_final_premium  , personal_accident_ind_policy.personal_accident_status  , personal_accident_ind_policy.personal_accident_del_flag  ", $whereArr = $whereArr_ind_personal_accident, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$ind_personal_accident_policy_list = $query["userData"];
			}
			$result["ind_personal_accident_policy_data_arr"] = $ind_personal_accident_policy_list;

			$common_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_common_ind["common_ind_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_common_ind["common_ind_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_common_ind["common_ind_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_common_ind["common_ind_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "common_ind_policy", $colNames = "common_ind_policy.common_ind_policy_id , common_ind_policy.fk_policy_id as common_ind_policy_fk_policy_id , common_ind_policy.fk_policy_type_id , common_ind_policy.policy_name_txt , common_ind_policy.fk_company_id , common_ind_policy.fk_department_id , common_ind_policy.tot_commind_json_data , common_ind_policy.comm_ind_total_amount , common_ind_policy.comm_ind_less_discount_rate , common_ind_policy.comm_ind_less_discount_tot , common_ind_policy.comm_ind_load_desc , common_ind_policy.comm_ind_load_tot , common_ind_policy.comm_ind_gross_premium , common_ind_policy.comm_ind_gross_premium_new , common_ind_policy.comm_ind_cgst_rate , common_ind_policy.comm_ind_cgst_tot , common_ind_policy.comm_ind_sgst_rate , common_ind_policy.comm_ind_sgst_tot , common_ind_policy.comm_ind_final_premium , common_ind_policy.comm_ind_status , common_ind_policy.comm_ind_del_flag", $whereArr = $whereArr_common_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$common_ind_policy_list = $query["userData"];
			}
			$result["common_ind_data_arr"] = $common_ind_policy_list;

			$common_ind_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_common_float["common_float_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_common_float["common_float_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_common_float["common_float_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_common_float["common_float_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "common_float_policy", $colNames = "common_float_policy.common_float_policy_id , common_float_policy.fk_policy_id as common_float_policy_fk_policy_id , common_float_policy.fk_policy_type_id , common_float_policy.policy_name_txt , common_float_policy.fk_company_id , common_float_policy.fk_department_id , common_float_policy.tot_commfloat_json_data , common_float_policy.comm_float_total_amount , common_float_policy.comm_float_less_discount_rate , common_float_policy.comm_float_less_discount_tot , common_float_policy.comm_float_load_desc , common_float_policy.comm_float_load_tot , common_float_policy.comm_float_gross_premium , common_float_policy.comm_float_gross_premium_new , common_float_policy.comm_float_cgst_rate , common_float_policy.comm_float_cgst_tot , common_float_policy.comm_float_sgst_rate , common_float_policy.comm_float_sgst_tot , common_float_policy.comm_float_final_premium , common_float_policy.comm_float_status , common_float_policy.comm_float_del_flag", $whereArr = $whereArr_common_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$common_float_policy_list = $query["userData"];
			}
			$result["common_float_data_arr"] = $common_float_policy_list;

			$private_car_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_private_car["motor_private_car_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_private_car["motor_private_car_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_private_car["motor_private_car_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_private_car["motor_private_car_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_private_car_policy", $colNames = "motor_private_car_policy.private_car_policy_id , motor_private_car_policy.fk_policy_id as motor_private_car_policy_fk_policy_id , motor_private_car_policy.fk_policy_type_id , motor_private_car_policy.policy_name_txt , motor_private_car_policy.fk_company_id , motor_private_car_policy.fk_department_id , motor_private_car_policy.vehicle_make_model , motor_private_car_policy.vehicle_reg_no , motor_private_car_policy.insu_declared_val , motor_private_car_policy.non_elect_access_val , motor_private_car_policy.elect_access_val , motor_private_car_policy.lpg_cng_idv_val , motor_private_car_policy.trailer_val , motor_private_car_policy.year_manufact_val , motor_private_car_policy.rta_city_code , motor_private_car_policy.rta_city , motor_private_car_policy.rta_city_cat , motor_private_car_policy.cubic_capacity_val , motor_private_car_policy.calculation_method , motor_private_car_policy.type_of_cover , motor_private_car_policy.prev_policy_expiry_date , motor_private_car_policy.policy_period , motor_private_car_policy.inception_date , motor_private_car_policy.expiry_date , motor_private_car_policy.od_basic_od_tot , motor_private_car_policy.od_special_disc_per , motor_private_car_policy.od_special_disc_tot , motor_private_car_policy.od_special_load_per , motor_private_car_policy.od_special_load_tot , motor_private_car_policy.od_net_basic_od_tot , motor_private_car_policy.od_non_elec_acc_tot , motor_private_car_policy.od_elec_acc_tot , motor_private_car_policy.od_bi_fuel_kit_tot , motor_private_car_policy.od_od_basic_od1_tot , motor_private_car_policy.od_trailer_tot , motor_private_car_policy.od_geographical_area_tot , motor_private_car_policy.od_embassy_load_tot , motor_private_car_policy.od_fibre_glass_tank_tot , motor_private_car_policy.od_driving_tut_tot , motor_private_car_policy.od_rallies_tot , motor_private_car_policy.od_basic_od2_tot , motor_private_car_policy.od_anti_tot , motor_private_car_policy.od_handicap_tot , motor_private_car_policy.od_aai_tot , motor_private_car_policy.od_vintage_tot , motor_private_car_policy.od_own_premises_tot , motor_private_car_policy.od_voluntary_deduc_tot , motor_private_car_policy.od_basic_od3_tot , motor_private_car_policy.od_ncb_per , motor_private_car_policy.od_ncb_tot, motor_private_car_policy.od_tot_anual_od_premium , motor_private_car_policy.od_tot_od_premium_policy_period , motor_private_car_policy.tp_basic_tp_tot , motor_private_car_policy.tp_restr_tppd , motor_private_car_policy.tp_trailer_tot , motor_private_car_policy.tp_bi_fuel_tot , motor_private_car_policy.tp_basic_tp1_tot , motor_private_car_policy.tp_compul_own_driv_tot , motor_private_car_policy.tp_geographical_area_tot , motor_private_car_policy.tp_unnamed_papax_tot , motor_private_car_policy.tp_no_seats_limit_person_tot , motor_private_car_policy.tp_ll_drv_emp_tot , motor_private_car_policy.tp_no_drv_emp_tot , motor_private_car_policy.tp_noof_person_tot , motor_private_car_policy.tp_pa_paid_drv_tot , motor_private_car_policy.tp_ll_defe_tot , motor_private_car_policy.tp_basic_tp2_tot , motor_private_car_policy.tp_tot_anual_tp_premium , motor_private_car_policy.tp_tot_premium_policy_period , motor_private_car_policy.plan_name , motor_private_car_policy.plan_name_tot , motor_private_car_policy.tot_othercover_ind_json , motor_private_car_policy.tot_anual_cover_premium , motor_private_car_policy.tot_cover_premium_period , motor_private_car_policy.tot_premium , motor_private_car_policy.motor_cgst_rate  , motor_private_car_policy.motor_cgst_tot  , motor_private_car_policy.motor_sgst_rate  , motor_private_car_policy.motor_sgst_tot  , motor_private_car_policy.gst_rate , motor_private_car_policy.gst_tot , motor_private_car_policy.tot_payable_premium , motor_private_car_policy.private_car_policy_status , motor_private_car_policy.private_car_policy_del_flag", $whereArr = $whereArr_private_car, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$private_car_policy_list = $query["userData"];
			}
			$result["private_car_data_arr"] = $private_car_policy_list;

			$two_wheeler_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_2_wheeler["motor_2_wheeler_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_2_wheeler["motor_2_wheeler_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_2_wheeler["motor_2_wheeler_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_2_wheeler["motor_2_wheeler_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_2_wheeler_policy", $colNames = "motor_2_wheeler_policy.2_wheeler_policy_id as two_wheeler_policy_id, motor_2_wheeler_policy.fk_policy_id as two_wheeler_policy_fk_policy_id , motor_2_wheeler_policy.fk_policy_type_id , motor_2_wheeler_policy.policy_name_txt , motor_2_wheeler_policy.fk_company_id , motor_2_wheeler_policy.fk_department_id , motor_2_wheeler_policy.vehicle_make_model , motor_2_wheeler_policy.vehicle_reg_no , motor_2_wheeler_policy.insu_declared_val , motor_2_wheeler_policy.elect_acc_val , motor_2_wheeler_policy.other_elect_acc_val , motor_2_wheeler_policy.policy_period_tenure_years , motor_2_wheeler_policy.previous_policy_expiry_date_tenur , motor_2_wheeler_policy.year_manufact_val , motor_2_wheeler_policy.rta_city_code , motor_2_wheeler_policy.rta_city , motor_2_wheeler_policy.rta_city_cat , motor_2_wheeler_policy.cubic_capacity_val , motor_2_wheeler_policy.type_of_cover , motor_2_wheeler_policy.policy_period , motor_2_wheeler_policy.inception_date , motor_2_wheeler_policy.expiry_date , motor_2_wheeler_policy.od_basic_od_tot , motor_2_wheeler_policy.od_special_disc_per , motor_2_wheeler_policy.od_special_disc_tot , motor_2_wheeler_policy.od_special_load_per , motor_2_wheeler_policy.od_special_load_tot , motor_2_wheeler_policy.od_net_basic_od_tot , motor_2_wheeler_policy.od_elec_acc_tot , motor_2_wheeler_policy.od_other_elec_acc_tot , motor_2_wheeler_policy.od_od_basic_od1_tot , motor_2_wheeler_policy.od_geographical_area_tot , motor_2_wheeler_policy.od_rallies_tot , motor_2_wheeler_policy.od_embassy_load_tot , motor_2_wheeler_policy.od_basic_od2_tot , motor_2_wheeler_policy.od_anti_theft_tot , motor_2_wheeler_policy.od_handicap_tot , motor_2_wheeler_policy.od_aai_tot , motor_2_wheeler_policy.od_side_car_tot , motor_2_wheeler_policy.od_own_premises_tot, motor_2_wheeler_policy.od_voluntary_excess_tot, motor_2_wheeler_policy.od_basic_od3_tot, motor_2_wheeler_policy.od_ncb_per, motor_2_wheeler_policy.od_ncb_tot, motor_2_wheeler_policy.od_tot_od_premium_policy_period , motor_2_wheeler_policy.tp_basic_tp_tot , motor_2_wheeler_policy.tp_restr_tppd_tot , motor_2_wheeler_policy.tp_basic_tp1_tot , motor_2_wheeler_policy.tp_geographical_area_tot , motor_2_wheeler_policy.tp_compul_pa_own_driv_tot , motor_2_wheeler_policy.tp_unnamed_pa_tot , motor_2_wheeler_policy.tp_ll_drv_emp_imt28_tot , motor_2_wheeler_policy.tp_ll_other_emp_tot , motor_2_wheeler_policy.tp_noof_other_emp_tot , motor_2_wheeler_policy.tp_basic_tp2_tot , motor_2_wheeler_policy.tp_tot_premium_policy_period , motor_2_wheeler_policy.plan_name , motor_2_wheeler_policy.plan_name_tot , motor_2_wheeler_policy.tot_othercover_ind_json , motor_2_wheeler_policy.tot_cover_premium_period  , motor_2_wheeler_policy.tot_premium , motor_2_wheeler_policy.motor_cgst_rate  , motor_2_wheeler_policy.motor_cgst_tot  , motor_2_wheeler_policy.motor_sgst_rate  , motor_2_wheeler_policy.motor_sgst_tot , motor_2_wheeler_policy.gst_rate , motor_2_wheeler_policy.gst_tot , motor_2_wheeler_policy.tot_payable_premium , motor_2_wheeler_policy.2_wheeler_policy_status , motor_2_wheeler_policy.2_wheeler_policy_del_flag", $whereArr = $whereArr_2_wheeler, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$two_wheeler_policy_list = $query["userData"];
			}
			$result["motor_2_wheeler_data_arr"] = $two_wheeler_policy_list;

			$motor_commercial_policy_list = array();
			if ($result["policy_id"] != "" || $result["fk_policy_type_id"] != "" || $result["fk_company_id"] || $result["fk_department_id"]) {
				$whereArr_motor_commercial_policy["motor_commercial_policy.fk_policy_type_id"] = $result["fk_policy_type_id"];
				$whereArr_motor_commercial_policy["motor_commercial_policy.fk_policy_id"] = $result["policy_id"];
				$whereArr_motor_commercial_policy["motor_commercial_policy.fk_company_id"] = $result["fk_company_id"];
				$whereArr_motor_commercial_policy["motor_commercial_policy.fk_department_id"] = $result["fk_department_id"];
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_commercial_policy", $colNames = "motor_commercial_policy.commercial_policy_id , motor_commercial_policy.fk_policy_id as motor_commercial_policy_fk_policy_id , motor_commercial_policy.fk_policy_type_id , motor_commercial_policy.policy_name_txt , motor_commercial_policy.fk_company_id , motor_commercial_policy.fk_department_id , motor_commercial_policy.vehicle_make_model , motor_commercial_policy.vehicle_reg_no , motor_commercial_policy.insu_declared_val , motor_commercial_policy.elect_acc_val , motor_commercial_policy.lpg_cng_idv_val , motor_commercial_policy.year_manufact_val , motor_commercial_policy.zone_city_code , motor_commercial_policy.zone_city , motor_commercial_policy.zone_city_cat , motor_commercial_policy.gvw_val , motor_commercial_policy.class_val , motor_commercial_policy.type_of_cover , motor_commercial_policy.policy_period , motor_commercial_policy.inception_date , motor_commercial_policy.expiry_date , motor_commercial_policy.od_basic_od_tot , motor_commercial_policy.od_elec_acc_tot , motor_commercial_policy.od_trailer_tot , motor_commercial_policy.od_bi_fuel_kit_tot , motor_commercial_policy.od_od_basic_od1_tot , motor_commercial_policy.od_geog_area_tot , motor_commercial_policy.od_fiber_glass_tank_tot , motor_commercial_policy.od_imt_cover_mud_guard_tot , motor_commercial_policy.od_basic_od2_tot , motor_commercial_policy.od_basic_od3_tot , motor_commercial_policy.od_ncb_per , motor_commercial_policy.od_ncb_tot , motor_commercial_policy.od_tot_anual_od_premium , motor_commercial_policy.od_special_disc_per , motor_commercial_policy.od_special_disc_tot , motor_commercial_policy.od_special_load_per , motor_commercial_policy.od_special_load_tot , motor_commercial_policy.od_tot_od_premium , motor_commercial_policy.tp_basic_tp_tot, motor_commercial_policy.tp_restr_tppd_tot, motor_commercial_policy.tp_trailer_tot, motor_commercial_policy.tp_bi_fuel_kit_tot, motor_commercial_policy.tp_basic_tp1_tot, motor_commercial_policy.tp_geog_area_tot , motor_commercial_policy.tp_compul_pa_own_driv_tot , motor_commercial_policy.tp_pa_paid_driver_tot , motor_commercial_policy.tp_ll_emp_non_fare_tot , motor_commercial_policy.tp_ll_driver_cleaner_tot , motor_commercial_policy.tp_ll_person_operation_tot , motor_commercial_policy.tp_basic_tp2_tot , motor_commercial_policy.tp_tot_premium , motor_commercial_policy.tp_consumables , motor_commercial_policy.tp_zero_depreciation , motor_commercial_policy.tp_road_side_ass , motor_commercial_policy.tp_tot_addon_premium , motor_commercial_policy.tot_owd_premium , motor_commercial_policy.tot_owd_addon_premium , motor_commercial_policy.tot_btp_premium , motor_commercial_policy.tot_other_tp_premium  , motor_commercial_policy.tot_premium , motor_commercial_policy.tot_owd_cgst_rate  , motor_commercial_policy.tot_owd_sgst_rate  , motor_commercial_policy.tot_owd_addon_cgst_rate  , motor_commercial_policy.tot_owd_addon_sgst_rate , motor_commercial_policy.tot_btp_cgst_rate , motor_commercial_policy.tot_btp_sgst_rate , motor_commercial_policy.tot_other_tp_cgst_rate , motor_commercial_policy.tot_other_tp_sgst_rate , motor_commercial_policy.tot_owd_gst , motor_commercial_policy.tot_owd_addon_gst , motor_commercial_policy.tot_btp_gst , motor_commercial_policy.tot_other_tp_gst , motor_commercial_policy.tot_gst_amt , motor_commercial_policy.tot_owd_final , motor_commercial_policy.tot_owd_addon_final , motor_commercial_policy.tot_btp_final , motor_commercial_policy.tot_other_tp_final , motor_commercial_policy.tot_final_premium , motor_commercial_policy.tot_payable_premium , motor_commercial_policy.commercial_policy_status , motor_commercial_policy.commercial_policy_del_flag ", $whereArr = $whereArr_motor_commercial_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
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
		$whereArr_policy_no_check["policy_member_details.policy_id"] = $policy_id;
		$query_policy_no_check = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames =  "policy_member_details.policy_id, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.serial_no, policy_member_details.policy_no", $whereArr_policy_no_check, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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
		$this->form_validation->set_rules('payment_date_from', 'Payment Date From', 'trim|required');
		$this->form_validation->set_rules('payment_date_to', 'Payment Date To', 'trim|required');
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
				// print_r($this->input->post());
				// die();
				$policy_file_name = "";
				$policy_upload_file_name = "";
				$current_sum_insured = 0;
				$current_total_premium = 0;

				$policy_id = $this->security->xss_clean($this->input->post('policy_id'));
				$company_txt = $this->security->xss_clean($this->input->post('company_txt'));
				$policy_name_txt = $this->security->xss_clean($this->input->post('policy_name_txt'));
				$policy_type = $this->security->xss_clean($this->input->post('policy_type'));
				// $basic_sum_insured = $this->security->xss_clean($this->input->post('basic_sum_insured'));
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

				// if ($policy_name_txt == "Standard Fire & Allied Perils") {
				$stfi_rate_per = $this->security->xss_clean($this->input->post('stfi_rate_per'));
				$stfi_rate_total = $this->security->xss_clean($this->input->post('stfi_rate_total'));
				$earthquake_rate_per = $this->security->xss_clean($this->input->post('earthquake_rate_per'));
				$earthquake_rate_total = $this->security->xss_clean($this->input->post('earthquake_rate_total'));
				$terrorisum_rate_per = $this->security->xss_clean($this->input->post('terrorisum_rate_per'));
				$terrorisum_rate_total = $this->security->xss_clean($this->input->post('terrorisum_rate_total'));
				$tot_sum_devid = $this->security->xss_clean($this->input->post('tot_sum_devid'));
				// }

				if ($policy_name_txt == "Bharat Griha Raksha" || $policy_name_txt == "Bharat Laghu Udyam" || $policy_name_txt == "Bharat Sookshma Udyam" || $policy_name_txt == "Standard Fire & Allied Perils") {
					$current_sum_insured = $total_sum_assured;
					$current_total_premium = $final_paybal_premium;
				}

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

				if (!empty($policy_id)) {
					$updateArr[] = array(
						'policy_id' => $policy_id,
						'basic_sum_insured' => $current_sum_insured,
						'basic_gross_premium' => $current_total_premium,
						'next_year_premium_flag'=>1,
						'modify_dt' => date("Y-m-d h:i:s"),
					);
				}
				// print_r($updateArr);die();
				if (!empty($updateArr))
					$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "policy_member_details", $updateArr, $updateKey = "policy_id", $whereArr = array("policy_id", $policy_id), $likeCondtnArr = array(), $whereInArray = array());

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
}
