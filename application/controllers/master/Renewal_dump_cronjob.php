<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Renewal_dump_cronjob extends CI_Controller
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

	public function test_insert()
	{
		$data = array(
			'my_name' => "Priyanshu Singh",
			'create_date' => date("Y-m-d h:i:s")
		);
		$this->db->insert('dummy_table',$data);
	}

	public function create()
	{
			
		$whereArr["policy_member_details.renewable_dump_flag"]= 0;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames =  "policy_member_details.policy_id , policy_member_details.renewable_dump_flag, policy_member_details.fk_policy_type_id, policy_member_details.fk_company_id, policy_member_details.fk_department_id, policy_member_details.policy_type", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
		$policy_member_details = $query["userData"];
		$this->data["policy_id"] = $policy_id = $policy_member_details["policy_id"];
		// $this->data["policy_id"] = $policy_id = 1389;
		$this->data["policy_type_id"] = $policy_type_id = $policy_member_details["fk_policy_type_id"];
		$this->data["company_id"] = $company_id = $policy_member_details["fk_company_id"];
		$this->data["department_id"] = $department_id = $policy_member_details["fk_department_id"];
		$this->data["policy_type_cond"] = $policy_type_cond = $policy_member_details["policy_type"];

		// print_r($policy_member_details);
		// echo $this->db->last_query();
		// die();

		// Getting Policy Data Section Start
		if (!empty($policy_id)) {
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
			$joins_main[] = array("tbl" => "policy_remark_details", "condtn" => "policy_member_details.policy_id = policy_remark_details.fk_policy_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames =  "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum , policy_member_details.date_from , policy_member_details.date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no ,policy_member_details.pre_year_policy_no , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company, policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email ,policy_member_details.policy_counter, policy_member_details.policy_member_status , policy_member_details.del_flag as policy_member_del_flag, policy_member_details.create_date as policy_member_create_date, policy_member_details.modify_dt as policy_member_modify_dt,policy_member_details.hypotication_details ,policy_member_details.correspondence_details ,policy_member_details.total_paymentacknowledge_data, policy_member_details.risk_details,policy_member_details.risk_rc_details,policy_member_details.family_size,policy_member_details.tpa_company,master_tpa.tpa_name,policy_member_details.addition_of_more_child, policy_member_details.floater_policy_type, policy_member_details.restore_cover, policy_member_details.maternity_new_born_baby_cover, policy_member_details.daily_cash_allowance_cover, policy_member_details.renewal_flag, policy_member_details.commission_flag, policy_member_details.endorsment_flag, policy_member_details.claims_flag, policy_member_details.renewal_count, policy_member_details.claims_count, policy_member_details.endorsment_count, policy_member_details.commission_count, policy_member_details.next_year_premium_flag, policy_member_details.current_sum_insured, policy_member_details.current_total_premium,  policy_member_details.basic_sum_insured, policy_member_details.basic_gross_premium, policy_member_details.renewal_letter_premium_flag, policy_member_details.renewal_letter_premium_date, policy_member_details.renewable_dump_flag, policy_member_details.riv, policy_member_details.type_of_bussiness, policy_member_details.description_of_stock, policy_member_details.quotation_date, policy_member_details.quotation_upload, policy_member_details.quotation_male_link, policy_member_details.member_name_arr, policy_member_details.fk_staff_id, policy_member_details.fk_user_role_id,master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname ,sookshma_fire_policy.sookshma_fire_policy_id ,sookshma_fire_policy.fk_policy_id ,sookshma_fire_policy.total_sum_assured ,sookshma_fire_policy.fire_rate_per ,sookshma_fire_policy.fire_rate_tot_amount ,sookshma_fire_policy.less_discount_per ,sookshma_fire_policy.less_discount_tot_amount ,sookshma_fire_policy.fire_rate_after_discount ,sookshma_fire_policy.gross_premium ,sookshma_fire_policy.cgst_rate_per ,sookshma_fire_policy.cgst_tot_amount  ,sookshma_fire_policy.sgst_rate_per ,sookshma_fire_policy.sgst_tot_amount ,sookshma_fire_policy.final_payable_premium ,sookshma_fire_policy.sookshma_fire_policy_status ,laghu_fire_policy.laghu_fire_policy_id ,laghu_fire_policy.fk_policy_id as laghu_fk_policy_id,laghu_fire_policy.total_sum_assured as laghu_total_sum_assured,laghu_fire_policy.fire_rate_per as laghu_fire_rate_per,laghu_fire_policy.fire_rate_tot_amount as laghu_fire_rate_tot_amount,laghu_fire_policy.less_discount_per as laghu_less_discount_per,laghu_fire_policy.less_discount_tot_amount as laghu_less_discount_tot_amount,laghu_fire_policy.fire_rate_after_discount as laghu_fire_rate_after_discount,laghu_fire_policy.gross_premium as laghu_gross_premium,laghu_fire_policy.cgst_rate_per as laghu_cgst_rate_per,laghu_fire_policy.cgst_tot_amount as laghu_cgst_tot_amount,laghu_fire_policy.sgst_rate_per as laghu_sgst_rate_per,laghu_fire_policy.sgst_tot_amount as laghu_sgst_tot_amount,laghu_fire_policy.final_payable_premium as laghu_final_payable_premium,laghu_fire_policy.laghu_fire_policy_status ,griharaksha_fire_policy.griharaksha_fire_policy_id ,griharaksha_fire_policy.fk_policy_id as griharaksha_fk_policy_id, griharaksha_fire_policy.total_sum_assured as griharaksha_total_sum_assured ,griharaksha_fire_policy.fire_rate_per as griharaksha_fire_rate_per ,griharaksha_fire_policy.fire_rate_tot_amount as griharaksha_fire_rate_tot_amount ,griharaksha_fire_policy.less_discount_per as griharaksha_less_discount_per,griharaksha_fire_policy.less_discount_tot_amount as griharaksha_less_discount_tot_amount ,griharaksha_fire_policy.fire_rate_after_discount as griharaksha_fire_rate_after_discount ,griharaksha_fire_policy.gross_premium as griharaksha_gross_premium ,griharaksha_fire_policy.cgst_rate_per as griharaksha_cgst_rate_per ,griharaksha_fire_policy.cgst_tot_amount as griharaksha_cgst_tot_amount ,griharaksha_fire_policy.sgst_rate_per as griharaksha_sgst_rate_per ,griharaksha_fire_policy.sgst_tot_amount as griharaksha_sgst_tot_amount ,griharaksha_fire_policy.final_payable_premium as griharaksha_final_payable_premium ,griharaksha_fire_policy.griharaksha_fire_policy_status , burglary_policy.burglary_policy_id , burglary_policy.fk_policy_id as burglary_fk_policy_id , burglary_policy.burglary_total_sum_assured , burglary_policy.burglary_fire_rate_per , burglary_policy.burglary_fire_rate_tot_amount , burglary_policy.burglary_less_discount_per , burglary_policy.burglary_less_discount_tot_amount , burglary_policy.burglary_fire_rate_after_discount , burglary_policy.burglary_gross_premium , burglary_policy.burglary_cgst_rate_per , burglary_policy.burglary_cgst_tot_amount , burglary_policy.burglary_sgst_rate_per , burglary_policy.burglary_sgst_tot_amount , burglary_policy.burglary_final_payable_premium , burglary_policy.burglary_policy_status , burglary_policy.burglary_del_flag ,
			bharat_fire_allied_perils_policy.fire_allied_perils_policy_id , bharat_fire_allied_perils_policy.fk_policy_id as allied_perils_fk_policy_id , bharat_fire_allied_perils_policy.allied_perils_total_sum_assured , bharat_fire_allied_perils_policy.allied_perils_fire_rate_per , bharat_fire_allied_perils_policy.allied_perils_fire_rate_tot_amount , bharat_fire_allied_perils_policy.allied_perils_less_discount_per , bharat_fire_allied_perils_policy.allied_perils_less_discount_tot_amount , bharat_fire_allied_perils_policy.allied_perils_fire_rate_after_discount , bharat_fire_allied_perils_policy.allied_perils_gross_premium , bharat_fire_allied_perils_policy.allied_perils_cgst_rate_per , bharat_fire_allied_perils_policy.allied_perils_cgst_tot_amount , bharat_fire_allied_perils_policy.allied_perils_sgst_rate_per , bharat_fire_allied_perils_policy.allied_perils_sgst_tot_amount , bharat_fire_allied_perils_policy.allied_perils_final_payable_premium , bharat_fire_allied_perils_policy.fire_allied_perils_policy_status , bharat_fire_allied_perils_policy.allied_perils_del_flag, bharat_fire_allied_perils_policy.allied_perils_stfi_rate, bharat_fire_allied_perils_policy.allied_perils_stfi_rate_total, bharat_fire_allied_perils_policy.allied_perils_earthquake_rate, bharat_fire_allied_perils_policy.allied_perils_earthquake_rate_total, bharat_fire_allied_perils_policy.allied_perils_terrorisum_rate, bharat_fire_allied_perils_policy.allied_perils_terrorisum_rate_total, bharat_fire_allied_perils_policy.tot_sum_devid ", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];

			// echo $this->db->last_query();
			// print_r($result);
			// die();

			if(!empty($result)){
				//Plicy Member Details Details Start

				$policy_counter = $result["policy_counter"]; //10
				$serial_no_year = $result["serial_no_year"];
				$serial_no_month = $result["serial_no_month"];
				$serial_no = $result["serial_no"];
				$fk_company_id = $result["fk_company_id"];
				$fk_department_id = $result["fk_department_id"];
				$fk_policy_type_id = $result["fk_policy_type_id"];
				$fk_client_id = $result["fk_client_id"];
				$fk_cust_member_id = $result["fk_cust_member_id"];
				$fk_agency_id = $result["fk_agency_id"];

				$fk_sub_agent_id = $result["fk_sub_agent_id"]; //20
				$policy_type = $result["policy_type"];
				$mode_of_premimum = $result["mode_of_premimum"];
				$date_from = $result["date_from"];
				$date_to = $result["date_to"];
				$payment_date_from = $result["payment_date_from"];
				$payment_date_to = $result["payment_date_to"];
				$policy_no = $result["policy_no"];
				$pre_year_policy_no = $result["pre_year_policy_no"];
				$date_commenced = $result["date_commenced"];

				$policy_upload = $result["policy_upload"]; //30
				$dynamic_path = $result["dynamic_path"];
				$reg_mobile = $result["reg_mobile"];
				$reg_email = $result["reg_email"];
				//Hypotication Details Start
				$risk_details = $result["risk_details"];
				$risk_rc_details = $result["risk_rc_details"];
				$hypotication_details = $result["hypotication_details"];
				$correspondence_details = $result["correspondence_details"];
				$total_paymentacknowledge_data = $result["total_paymentacknowledge_data"];
				//Hypotication Details End
				$family_size = $result["family_size"];

				$tpa_company = $result["tpa_company"]; //40
				$addition_of_more_child = $result["addition_of_more_child"];
				$floater_policy_type = $result["floater_policy_type"];
				$restore_cover = $result["restore_cover"];
				$maternity_new_born_baby_cover = $result["maternity_new_born_baby_cover"];
				$daily_cash_allowance_cover = $result["daily_cash_allowance_cover"];
				$policy_member_status = $result["policy_member_status"];
				$policy_member_del_flag = $result["policy_member_del_flag"];
				$plan_policy_commission = $result["plan_policy_commission"];
				$commission_rece_company = $result["commission_rece_company"];

				$commission_amt_rece_company = $result["commission_amt_rece_company"]; //50
				$renewal_flag = $result["renewal_flag"];
				$commission_flag = $result["commission_flag"];
				$endorsment_flag = $result["endorsment_flag"];
				$claims_flag = $result["claims_flag"];
				$renewal_count = $result["renewal_count"];
				$claims_count = $result["claims_count"];
				$endorsment_count = $result["endorsment_count"];
				$commission_count = $result["commission_count"];
				$next_year_premium_flag = $result["next_year_premium_flag"];

				$current_sum_insured = $result["current_sum_insured"]; //60
				$current_total_premium = $result["current_total_premium"];
				$basic_sum_insured = $result["basic_sum_insured"];
				$basic_gross_premium = $result["basic_gross_premium"];
				$renewal_letter_premium_flag = $result["renewal_letter_premium_flag"];
				$renewal_letter_premium_date = $result["renewal_letter_premium_date"];
				$renewable_dump_flag = $result["renewable_dump_flag"];
				$riv = $result["riv"];
				$type_of_bussiness = $result["type_of_bussiness"];
				$description_of_stock = $result["description_of_stock"];

				$quotation_date = $result["quotation_date"]; //6
				$quotation_upload = $result["quotation_upload"];
				$quotation_male_link = $result["quotation_male_link"];
				$member_name_arr = $result["member_name_arr"];
				$policy_member_create_date = $result["policy_member_create_date"];
				$policy_member_modify_dt = $result["policy_member_modify_dt"];

				$policy_name_txt = $result["policy_type_title"];
				$company_txt = $result["company_name"];
				$fk_staff_id = $result["fk_staff_id"];
				$fk_user_role_id = $result["fk_user_role_id"];
				
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
				//Plicy Member Details Details End

				// HDFC ERGO HEALTH INSURANCE LTD || HDFC Ergo General Insurance Co Ltd Start

				//Super Top Up : Individual Start
				$supertopup_ind_hdfc_ergo_health_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_hdfc_ergo_health_supertopup_ind["hdfc_ergo_health_super_topup_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_hdfc_ergo_health_supertopup_ind["hdfc_ergo_health_super_topup_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_policy", $colNames = "hdfc_ergo_health_super_topup_policy.supertopup_ind_policy_id , hdfc_ergo_health_super_topup_policy.fk_policy_id as hdfc_ergo_health_super_topup_policy_fk_policy_id , hdfc_ergo_health_super_topup_policy.fk_policy_type_id ,  hdfc_ergo_health_super_topup_policy.fk_company_id ,  hdfc_ergo_health_super_topup_policy.fk_department_id , hdfc_ergo_health_super_topup_policy.policy_name_txt , hdfc_ergo_health_super_topup_policy.tot_supertopup_ind_hdfc_json , hdfc_ergo_health_super_topup_policy.years_of_premium , hdfc_ergo_health_super_topup_policy.tot_premium , hdfc_ergo_health_super_topup_policy.load_desc , hdfc_ergo_health_super_topup_policy.load_tot , hdfc_ergo_health_super_topup_policy.less_disc_per , hdfc_ergo_health_super_topup_policy.less_disc_tot , hdfc_ergo_health_super_topup_policy.gross_premium_tot , hdfc_ergo_health_super_topup_policy.gross_premium_tot_new , hdfc_ergo_health_super_topup_policy.medi_cgst_rate , hdfc_ergo_health_super_topup_policy.medi_cgst_tot , hdfc_ergo_health_super_topup_policy.medi_sgst_rate , hdfc_ergo_health_super_topup_policy.medi_sgst_tot, hdfc_ergo_health_super_topup_policy.medi_final_premium, hdfc_ergo_health_super_topup_policy.super_topup_policy_status, hdfc_ergo_health_super_topup_policy.super_topup_policy_del_flag", $whereArr = $whereArr_hdfc_ergo_health_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$supertopup_ind_hdfc_ergo_health_details = $query["userData"];
				}
				//Super Top Up : Individual End

				//Super Top Up : Floater Start
				$supertopup_float_hdfc_ergo_health_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_hdfc_ergo_health_supertopup_float["hdfc_ergo_health_super_topup_floater_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_hdfc_ergo_health_supertopup_float["hdfc_ergo_health_super_topup_floater_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_floater_policy", $colNames = "hdfc_ergo_health_super_topup_floater_policy.supertopup_float_policy_id , hdfc_ergo_health_super_topup_floater_policy.fk_policy_id as hdfc_ergo_health_super_topup_floater_policy_fk_policy_id , hdfc_ergo_health_super_topup_floater_policy.fk_policy_type_id ,  hdfc_ergo_health_super_topup_floater_policy.fk_company_id ,  hdfc_ergo_health_super_topup_floater_policy.fk_department_id , hdfc_ergo_health_super_topup_floater_policy.policy_name_txt , hdfc_ergo_health_super_topup_floater_policy.tot_supertopup_float_hdfc_json , hdfc_ergo_health_super_topup_floater_policy.years_of_premium , hdfc_ergo_health_super_topup_floater_policy.tot_premium , hdfc_ergo_health_super_topup_floater_policy.load_desc , hdfc_ergo_health_super_topup_floater_policy.load_tot , hdfc_ergo_health_super_topup_floater_policy.less_disc_per , hdfc_ergo_health_super_topup_floater_policy.less_disc_tot , hdfc_ergo_health_super_topup_floater_policy.gross_premium_tot , hdfc_ergo_health_super_topup_floater_policy.gross_premium_tot_new , hdfc_ergo_health_super_topup_floater_policy.medi_cgst_rate , hdfc_ergo_health_super_topup_floater_policy.medi_cgst_tot , hdfc_ergo_health_super_topup_floater_policy.medi_sgst_rate , hdfc_ergo_health_super_topup_floater_policy.medi_sgst_tot, hdfc_ergo_health_super_topup_floater_policy.medi_final_premium, hdfc_ergo_health_super_topup_floater_policy.max_age, hdfc_ergo_health_super_topup_floater_policy.super_topup_policy_status, hdfc_ergo_health_super_topup_floater_policy.super_topup_policy_del_flag", $whereArr = $whereArr_hdfc_ergo_health_supertopup_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$supertopup_float_hdfc_ergo_health_details = $query["userData"];
				}
				//Super Top Up : Floater End

				//Common Individual : Individual : Mediclaim Start
				$medi_medi_common_ind_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_common_ind["common_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_common_ind["common_ind_policy.fk_policy_id"] = $policy_id;
					$whereArr_common_ind["common_ind_policy.fk_company_id"] = $company_id;
					$whereArr_common_ind["common_ind_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "common_ind_policy", $colNames = "common_ind_policy.common_ind_policy_id , common_ind_policy.fk_policy_id as common_ind_policy_fk_policy_id , common_ind_policy.fk_policy_type_id , common_ind_policy.policy_name_txt , common_ind_policy.fk_company_id , common_ind_policy.fk_department_id , common_ind_policy.tot_commind_json_data , common_ind_policy.comm_ind_total_amount , common_ind_policy.comm_ind_less_discount_rate , common_ind_policy.comm_ind_less_discount_tot , common_ind_policy.comm_ind_load_desc , common_ind_policy.comm_ind_load_tot , common_ind_policy.comm_ind_gross_premium , common_ind_policy.comm_ind_gross_premium_new , common_ind_policy.comm_ind_cgst_rate , common_ind_policy.comm_ind_cgst_tot , common_ind_policy.comm_ind_sgst_rate , common_ind_policy.comm_ind_sgst_tot , common_ind_policy.comm_ind_final_premium , common_ind_policy.comm_ind_status , common_ind_policy.comm_ind_del_flag", $whereArr = $whereArr_common_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_common_ind_details = $query["userData"];
				}
				//Common Individual : Individual : Mediclaim End

				//Common Floater : Floater : Mediclaim Start
				$medi_common_floater_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_common_float["common_float_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_common_float["common_float_policy.fk_policy_id"] = $policy_id;
					$whereArr_common_float["common_float_policy.fk_company_id"] = $company_id;
					$whereArr_common_float["common_float_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "common_float_policy", $colNames = "common_float_policy.common_float_policy_id , common_float_policy.fk_policy_id as common_float_policy_fk_policy_id , common_float_policy.fk_policy_type_id , common_float_policy.policy_name_txt , common_float_policy.fk_company_id , common_float_policy.fk_department_id , common_float_policy.tot_commfloat_json_data , common_float_policy.comm_float_total_amount , common_float_policy.comm_float_less_discount_rate , common_float_policy.comm_float_less_discount_tot , common_float_policy.comm_float_load_desc , common_float_policy.comm_float_load_tot , common_float_policy.comm_float_gross_premium , common_float_policy.comm_float_gross_premium_new , common_float_policy.comm_float_cgst_rate , common_float_policy.comm_float_cgst_tot , common_float_policy.comm_float_sgst_rate , common_float_policy.comm_float_sgst_tot , common_float_policy.comm_float_final_premium , common_float_policy.comm_float_status , common_float_policy.comm_float_del_flag", $whereArr = $whereArr_common_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_common_floater_details = $query["userData"];
				}
				//Common Floater : Floater : Mediclaim End

				//Optima Restore : Individual : Mediclaim Start
				$medi_ind_hdfc_ergo_health_optima_restore_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_policy", $colNames = "medi_hdfc_ergo_health_insu_policy.medi_hdfc_ergo_health_insu_policy_id , medi_hdfc_ergo_health_insu_policy.fk_policy_id as medi_hdfc_ergo_health_insu_policy_fk_policy_id , medi_hdfc_ergo_health_insu_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_policy.fk_company_id ,medi_hdfc_ergo_health_insu_policy.fk_department_id , medi_hdfc_ergo_health_insu_policy.total_medi_ind_hdfc_json_data , medi_hdfc_ergo_health_insu_policy.years_of_premium , medi_hdfc_ergo_health_insu_policy.region , medi_hdfc_ergo_health_insu_policy.tot_premium , medi_hdfc_ergo_health_insu_policy.protect_ride_prem_tot , medi_hdfc_ergo_health_insu_policy.hospital_daily_cash_prem_tot , medi_hdfc_ergo_health_insu_policy.ipa_rider_prem_tot , medi_hdfc_ergo_health_insu_policy.load_desc , medi_hdfc_ergo_health_insu_policy.load_tot , medi_hdfc_ergo_health_insu_policy.less_disc_per , medi_hdfc_ergo_health_insu_policy.less_disc_tot , medi_hdfc_ergo_health_insu_policy.family_disc_per ,medi_hdfc_ergo_health_insu_policy.family_disc_tot , medi_hdfc_ergo_health_insu_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_policy.medi_final_premium , medi_hdfc_ergo_health_insu_policy.medi_hdfc_ergo_health_insu_policy_status , medi_hdfc_ergo_health_insu_policy.medi_hdfc_ergo_health_insu_policy_del_flag", $whereArr = $whereArr_medi_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_hdfc_ergo_health_optima_restore_details = $query["userData"];
				}
				//Optima Restore : Individual : Mediclaim End

				//Optima Restore : Floater : Mediclaim Start
				$medi_float_hdfc_ergo_health_optima_restore_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_float_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_float_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_float_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_float_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_float_policy", $colNames = "medi_hdfc_ergo_health_insu_float_policy.medi_hdfc_ergo_health_insu_float_policy_id , medi_hdfc_ergo_health_insu_float_policy.fk_policy_id as medi_hdfc_ergo_health_insu_float_policy_fk_policy_id , medi_hdfc_ergo_health_insu_float_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_float_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_float_policy.fk_company_id ,medi_hdfc_ergo_health_insu_float_policy.fk_department_id , medi_hdfc_ergo_health_insu_float_policy.total_medi_float_hdfc_json_data , medi_hdfc_ergo_health_insu_float_policy.years_of_premium , medi_hdfc_ergo_health_insu_float_policy.region , medi_hdfc_ergo_health_insu_float_policy.tot_premium , medi_hdfc_ergo_health_insu_float_policy.hdfc_ergo_health_insu_child_count , medi_hdfc_ergo_health_insu_float_policy.hdfc_ergo_health_insu_child_count_first_premium , medi_hdfc_ergo_health_insu_float_policy.hdfc_ergo_health_insu_child_total_premium , medi_hdfc_ergo_health_insu_float_policy.protect_ride_prem_tot , medi_hdfc_ergo_health_insu_float_policy.hospital_daily_cash_prem_tot , medi_hdfc_ergo_health_insu_float_policy.ipa_rider_prem_tot , medi_hdfc_ergo_health_insu_float_policy.load_desc , medi_hdfc_ergo_health_insu_float_policy.load_tot ,  medi_hdfc_ergo_health_insu_float_policy.less_disc_per ,  medi_hdfc_ergo_health_insu_float_policy.less_disc_tot , medi_hdfc_ergo_health_insu_float_policy.stay_active_benefit ,medi_hdfc_ergo_health_insu_float_policy.stay_active_benefit_prem_tot , medi_hdfc_ergo_health_insu_float_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_float_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_float_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_float_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_float_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_float_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_float_policy.medi_final_premium ,medi_hdfc_ergo_health_insu_float_policy.max_age, medi_hdfc_ergo_health_insu_float_policy.medi_hdfc_ergo_health_insu_float_policy_status , medi_hdfc_ergo_health_insu_float_policy.medi_hdfc_ergo_health_insu_float_policy_del_flag", $whereArr = $whereArr_medi_float_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_hdfc_ergo_health_optima_restore_details = $query["userData"];
				}
				//Optima Restore : Floater : Mediclaim End

				//Energy : Individual : Mediclaim Start
				$medi_ind_hdfc_ergo_health_energy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_energy_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_energy_policy.fk_policy_id"] = $policy_id;
					$whereArr_medi_energy_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_energy_policy.fk_policy_type_id"] = $policy_type_id;

					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_energy_policy", $colNames = "medi_hdfc_ergo_health_insu_energy_policy.medi_hdfc_ergo_health_insu_energy_policy_id , medi_hdfc_ergo_health_insu_energy_policy.fk_policy_id as medi_hdfc_ergo_health_insu_energy_policy_fk_policy_id , medi_hdfc_ergo_health_insu_energy_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_energy_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_energy_policy.fk_company_id ,medi_hdfc_ergo_health_insu_energy_policy.fk_department_id , medi_hdfc_ergo_health_insu_energy_policy.total_energy_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_energy_policy.tot_premium , medi_hdfc_ergo_health_insu_energy_policy.less_disc_per , medi_hdfc_ergo_health_insu_energy_policy.less_disc_tot , medi_hdfc_ergo_health_insu_energy_policy.load_desc , medi_hdfc_ergo_health_insu_energy_policy.load_tot , medi_hdfc_ergo_health_insu_energy_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_energy_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_energy_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_energy_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_energy_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_energy_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_energy_policy.medi_final_premium , medi_hdfc_ergo_health_insu_energy_policy.medi_hdfc_ergo_health_insu_energy_policy_status , medi_hdfc_ergo_health_insu_energy_policy.medi_hdfc_ergo_health_insu_energy_policy_del_flag", $whereArr = $whereArr_medi_energy_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_hdfc_ergo_health_energy_details = $query["userData"];
				}
				//Energy : Individual : Mediclaim End

				//Health Suraksha : Individual : Mediclaim Start
				$medi_ind_hdfc_ergo_health_suraksha_details= array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_suraksha_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_id"] = $policy_id;
					$whereArr_medi_suraksha_ind_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_type_id"] = $policy_type_id;
					
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_policy", $colNames = "medi_hdfc_ergo_health_insu_suraksha_policy.medi_hdfc_ergo_health_insu_suraksha_policy_id , medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_id as medi_hdfc_ergo_health_insu_suraksha_policy_fk_policy_id , medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_suraksha_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_suraksha_policy.fk_company_id ,medi_hdfc_ergo_health_insu_suraksha_policy.fk_department_id , medi_hdfc_ergo_health_insu_suraksha_policy.total_suraksha_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_suraksha_policy.years_of_premium , medi_hdfc_ergo_health_insu_suraksha_policy.region , medi_hdfc_ergo_health_insu_suraksha_policy.tot_premium , medi_hdfc_ergo_health_insu_suraksha_policy.load_desc  , medi_hdfc_ergo_health_insu_suraksha_policy.load_tot  , medi_hdfc_ergo_health_insu_suraksha_policy.less_disc_per , medi_hdfc_ergo_health_insu_suraksha_policy.less_disc_tot , medi_hdfc_ergo_health_insu_suraksha_policy.family_disc_per , medi_hdfc_ergo_health_insu_suraksha_policy.family_disc_tot , medi_hdfc_ergo_health_insu_suraksha_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_suraksha_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_suraksha_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_suraksha_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_suraksha_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_suraksha_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_suraksha_policy.medi_final_premium , medi_hdfc_ergo_health_insu_suraksha_policy.medi_hdfc_ergo_health_insu_suraksha_policy_status , medi_hdfc_ergo_health_insu_suraksha_policy.medi_hdfc_ergo_health_insu_suraksha_policy_del_flag", $whereArr = $whereArr_medi_suraksha_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_hdfc_ergo_health_suraksha_details = $query["userData"];
				}
				//Health Suraksha : Individual : Mediclaim End

				//Health Suraksha : Floater : Mediclaim Start
				$medi_float_hdfc_ergo_health_suraksha_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_float_suraksha_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_float_suraksha_hdfc_ergo_health_insu["medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_floater_policy", $colNames = "medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_hdfc_ergo_health_float_suraksha_policy_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_id as medi_hdfc_ergo_health_insu_suraksha_floater_policy_fk_policy_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_type_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy.policy_name_txt ,medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_company_id ,medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_department_id , medi_hdfc_ergo_health_insu_suraksha_floater_policy.total_suraksha_float_medi_hdfc_json_data , medi_hdfc_ergo_health_insu_suraksha_floater_policy.years_of_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy.region , medi_hdfc_ergo_health_insu_suraksha_floater_policy.tot_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy.hdfc_ergo_health_insu_child_count , medi_hdfc_ergo_health_insu_suraksha_floater_policy.hdfc_ergo_health_insu_child_count_first_premium ,medi_hdfc_ergo_health_insu_suraksha_floater_policy.hdfc_ergo_health_insu_child_total_premium  , medi_hdfc_ergo_health_insu_suraksha_floater_policy.load_desc , medi_hdfc_ergo_health_insu_suraksha_floater_policy.load_tot  , medi_hdfc_ergo_health_insu_suraksha_floater_policy.less_disc_per , medi_hdfc_ergo_health_insu_suraksha_floater_policy.less_disc_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy.gross_premium_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy.gross_premium_tot_new , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_cgst_rate , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_cgst_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_sgst_rate , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_sgst_tot , medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_final_premium , medi_hdfc_ergo_health_insu_suraksha_floater_policy.max_age , medi_hdfc_ergo_health_insu_suraksha_floater_policy.suraksha_floater_policy_status , medi_hdfc_ergo_health_insu_suraksha_floater_policy.suraksha_floater_policy_del_flag", $whereArr = $whereArr_medi_float_suraksha_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_hdfc_ergo_health_suraksha_details = $query["userData"];
				}
				//Health Suraksha : Floater : Mediclaim End

				//Easy Health : Individual : Mediclaim Start
				$medi_ind_hdfc_ergo_health_easy_rate_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_policy", $colNames = "hdfc_ergo_health_easy_rate_card_indi_policy.medi_hdfc_ergo_health_insu_easy_policy_id  , hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_id as hdfc_ergo_health_easy_rate_card_indi_policy_fk_policy_id , hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_type_id , hdfc_ergo_health_easy_rate_card_indi_policy.policy_name_txt ,hdfc_ergo_health_easy_rate_card_indi_policy.fk_company_id ,hdfc_ergo_health_easy_rate_card_indi_policy.fk_department_id , hdfc_ergo_health_easy_rate_card_indi_policy.total_easy_medi_hdfc_json_data , hdfc_ergo_health_easy_rate_card_indi_policy.years_of_premium , hdfc_ergo_health_easy_rate_card_indi_policy.region , hdfc_ergo_health_easy_rate_card_indi_policy.tot_premium , hdfc_ergo_health_easy_rate_card_indi_policy.protect_ride_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy.hospital_daily_cash_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy.ipa_rider_prem_tot , hdfc_ergo_health_easy_rate_card_indi_policy.load_desc , hdfc_ergo_health_easy_rate_card_indi_policy.load_tot , hdfc_ergo_health_easy_rate_card_indi_policy.family_disc_per , hdfc_ergo_health_easy_rate_card_indi_policy.family_disc_tot , hdfc_ergo_health_easy_rate_card_indi_policy.less_disc_per , hdfc_ergo_health_easy_rate_card_indi_policy.tot_basic_prem ,  hdfc_ergo_health_easy_rate_card_indi_policy.less_disc_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy.gross_premium_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy.gross_premium_tot_new ,  hdfc_ergo_health_easy_rate_card_indi_policy.medi_cgst_rate ,  hdfc_ergo_health_easy_rate_card_indi_policy.medi_cgst_tot ,  hdfc_ergo_health_easy_rate_card_indi_policy.medi_sgst_rate ,  hdfc_ergo_health_easy_rate_card_indi_policy.medi_sgst_tot, hdfc_ergo_health_easy_rate_card_indi_policy.medi_final_premium  , hdfc_ergo_health_easy_rate_card_indi_policy.easy_rate_status , hdfc_ergo_health_easy_rate_card_indi_policy.easy_rate_del_flag", $whereArr = $whereArr_medi_easy_rate_ind_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_hdfc_ergo_health_easy_rate_details = $query["userData"];
				}
				//Easy Health : Individual : Mediclaim End

				//Easy Health : Floater : Mediclaim Start
				$medi_float_hdfc_ergo_health_easy_rate_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_easy_rate_float_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_easy_rate_float_hdfc_ergo_health_insu["hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_float_policy", $colNames = "hdfc_ergo_health_easy_rate_card_float_policy.medi_hdfc_ergo_health_insu_easy_float_policy_id  , hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_id as hdfc_ergo_health_easy_rate_card_float_policy_fk_policy_id , hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_type_id , hdfc_ergo_health_easy_rate_card_float_policy.policy_name_txt ,hdfc_ergo_health_easy_rate_card_float_policy.fk_company_id ,hdfc_ergo_health_easy_rate_card_float_policy.fk_department_id , hdfc_ergo_health_easy_rate_card_float_policy.total_easy_float_medi_hdfc_json_data , hdfc_ergo_health_easy_rate_card_float_policy.years_of_premium , hdfc_ergo_health_easy_rate_card_float_policy.region , hdfc_ergo_health_easy_rate_card_float_policy.tot_premium , hdfc_ergo_health_easy_rate_card_float_policy.hdfc_ergo_health_insu_child_count , hdfc_ergo_health_easy_rate_card_float_policy.hdfc_ergo_health_insu_child_count_first_premium , hdfc_ergo_health_easy_rate_card_float_policy.hdfc_ergo_health_insu_child_total_premium , hdfc_ergo_health_easy_rate_card_float_policy.protect_ride_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy.hospital_daily_cash_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy.ipa_rider_prem_tot , hdfc_ergo_health_easy_rate_card_float_policy.load_desc , hdfc_ergo_health_easy_rate_card_float_policy.load_tot , hdfc_ergo_health_easy_rate_card_float_policy.stay_active_benefit , hdfc_ergo_health_easy_rate_card_float_policy.stay_active_benefit_prem , hdfc_ergo_health_easy_rate_card_float_policy.less_disc_per , hdfc_ergo_health_easy_rate_card_float_policy.tot_basic_prem ,  hdfc_ergo_health_easy_rate_card_float_policy.less_disc_tot ,  hdfc_ergo_health_easy_rate_card_float_policy.gross_premium_tot ,  hdfc_ergo_health_easy_rate_card_float_policy.gross_premium_tot_new ,  hdfc_ergo_health_easy_rate_card_float_policy.medi_cgst_rate ,  hdfc_ergo_health_easy_rate_card_float_policy.medi_cgst_tot ,  hdfc_ergo_health_easy_rate_card_float_policy.medi_sgst_rate ,  hdfc_ergo_health_easy_rate_card_float_policy.medi_sgst_tot, hdfc_ergo_health_easy_rate_card_float_policy.medi_final_premium  ,  hdfc_ergo_health_easy_rate_card_float_policy.max_age , hdfc_ergo_health_easy_rate_card_float_policy.easy_rate_status , hdfc_ergo_health_easy_rate_card_float_policy.easy_rate_del_flag", $whereArr = $whereArr_medi_easy_rate_float_hdfc_ergo_health_insu, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_hdfc_ergo_health_easy_rate_details = $query["userData"];
				}
				//Easy Health : Floater : Mediclaim End

				// HDFC ERGO HEALTH INSURANCE LTD || HDFC Ergo General Insurance Co Ltd End


				// The New India Assurance Co Ltd Start

				//New India Mediclaim Policy 2017 : Individual : Mediclaim Start
				$medi_ind_the_new_india_2017_assu_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_ind_the_new_india_2017_assu_policy["the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_ind_the_new_india_2017_assu_policy["the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_policy_2017_ind_assu_policy", $colNames = "the_new_india_medi_policy_2017_ind_assu_policy.medi_insu_new_india_tns_assu_ind_policy_id , the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_id as the_new_india_medi_policy_2017_ind_assu_fk_policy_id , the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_type_id , the_new_india_medi_policy_2017_ind_assu_policy.policy_name_txt ,the_new_india_medi_policy_2017_ind_assu_policy.fk_company_id ,the_new_india_medi_policy_2017_ind_assu_policy.fk_department_id , the_new_india_medi_policy_2017_ind_assu_policy.total_the_new_india_medi_tns_hdfc_json_data , the_new_india_medi_policy_2017_ind_assu_policy.tot_premium , the_new_india_medi_policy_2017_ind_assu_policy.medi_cgst_rate , the_new_india_medi_policy_2017_ind_assu_policy.medi_cgst_tot , the_new_india_medi_policy_2017_ind_assu_policy.medi_sgst_rate , the_new_india_medi_policy_2017_ind_assu_policy.medi_sgst_tot , the_new_india_medi_policy_2017_ind_assu_policy.medi_final_premium , the_new_india_medi_policy_2017_ind_assu_policy.the_new_india_status , the_new_india_medi_policy_2017_ind_assu_policy.the_new_india_del_flag", $whereArr = $whereArr_medi_ind_the_new_india_2017_assu_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_the_new_india_2017_assu_details = $query["userData"];
				}
				//New India Mediclaim Policy 2017 : Individual : Mediclaim End

				//New India Floater Mediclaim : Floater : Mediclaim Start
				$medi_float_the_new_india_assu_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_float_the_new_india_assu_policy["the_new_india_medi_floater_assu_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_float_the_new_india_assu_policy["the_new_india_medi_floater_assu_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_floater_assu_policy", $colNames = "the_new_india_medi_floater_assu_policy.medi_new_india_assu_float_policy_id , the_new_india_medi_floater_assu_policy.fk_policy_id as medi_the_new_india_floater_assu_fk_policy_id , the_new_india_medi_floater_assu_policy.fk_policy_type_id , the_new_india_medi_floater_assu_policy.policy_name_txt ,the_new_india_medi_floater_assu_policy.fk_company_id ,the_new_india_medi_floater_assu_policy.fk_department_id , the_new_india_medi_floater_assu_policy.total_the_new_india_medi_float_json_data , the_new_india_medi_floater_assu_policy.tot_premium , the_new_india_medi_floater_assu_policy.floater_disc_rate , the_new_india_medi_floater_assu_policy.floater_disc_tot , the_new_india_medi_floater_assu_policy.gross_premium_tot , the_new_india_medi_floater_assu_policy.gross_premium_tot_new , the_new_india_medi_floater_assu_policy.medi_cgst_rate , the_new_india_medi_floater_assu_policy.medi_cgst_tot , the_new_india_medi_floater_assu_policy.medi_sgst_rate , the_new_india_medi_floater_assu_policy.medi_sgst_tot , the_new_india_medi_floater_assu_policy.medi_final_premium , the_new_india_medi_floater_assu_policy.the_new_india_status , the_new_india_medi_floater_assu_policy.the_new_india_del_flag", $whereArr = $whereArr_medi_float_the_new_india_assu_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_the_new_india_assu_details = $query["userData"];
				}
				//New India Floater Mediclaim : Floater : Mediclaim End

				//Super Top Up : Individual Start
				$supertopup_ind_the_new_india_assu_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_the_new_india_supertopup_ind_single["the_new_india_supertopup_ind_single_assu_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_the_new_india_supertopup_ind_single["the_new_india_supertopup_ind_single_assu_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_ind_single_assu_policy", $colNames = "the_new_india_supertopup_ind_single_assu_policy.the_new_india_supertopup_assu_ind_single_policy_id , the_new_india_supertopup_ind_single_assu_policy.fk_policy_id as the_new_india_supertopup_ind_single_assu_policy_fk_policy_id , the_new_india_supertopup_ind_single_assu_policy.fk_policy_type_id ,  the_new_india_supertopup_ind_single_assu_policy.fk_company_id ,  the_new_india_supertopup_ind_single_assu_policy.fk_department_id , the_new_india_supertopup_ind_single_assu_policy.policy_name_txt , the_new_india_supertopup_ind_single_assu_policy.total_the_new_india_supertopup_ind_single_json_data ,  the_new_india_supertopup_ind_single_assu_policy.tot_premium , the_new_india_supertopup_ind_single_assu_policy.medi_cgst_rate , the_new_india_supertopup_ind_single_assu_policy.medi_cgst_tot , the_new_india_supertopup_ind_single_assu_policy.medi_sgst_rate , the_new_india_supertopup_ind_single_assu_policy.medi_sgst_tot, the_new_india_supertopup_ind_single_assu_policy.medi_final_premium, the_new_india_supertopup_ind_single_assu_policy.the_new_india_status, the_new_india_supertopup_ind_single_assu_policy.the_new_india_del_flag", $whereArr = $whereArr_the_new_india_supertopup_ind_single, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$supertopup_ind_the_new_india_assu_details = $query["userData"];
				}
				//Super Top Up : Individual End

				//Super Top Up : Floater Start
				$supertopup_float_the_new_india_assu_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_the_new_india_supertopup_ind["the_new_india_supertopup_ind_assu_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_the_new_india_supertopup_ind["the_new_india_supertopup_ind_assu_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_ind_assu_policy", $colNames = "the_new_india_supertopup_ind_assu_policy.the_new_india_supertopup_assu_ind_policy_id , the_new_india_supertopup_ind_assu_policy.fk_policy_id as the_new_india_supertopup_ind_assu_policy_fk_policy_id , the_new_india_supertopup_ind_assu_policy.fk_policy_type_id ,  the_new_india_supertopup_ind_assu_policy.fk_company_id ,  the_new_india_supertopup_ind_assu_policy.fk_department_id , the_new_india_supertopup_ind_assu_policy.policy_name_txt , the_new_india_supertopup_ind_assu_policy.total_the_new_india_supertopup_ind_json_data ,  the_new_india_supertopup_ind_assu_policy.tot_premium , the_new_india_supertopup_ind_assu_policy.medi_cgst_rate , the_new_india_supertopup_ind_assu_policy.medi_cgst_tot , the_new_india_supertopup_ind_assu_policy.medi_sgst_rate , the_new_india_supertopup_ind_assu_policy.medi_sgst_tot, the_new_india_supertopup_ind_assu_policy.medi_final_premium, the_new_india_supertopup_ind_assu_policy.the_new_india_status, the_new_india_supertopup_ind_assu_policy.the_new_india_del_flag", $whereArr = $whereArr_the_new_india_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$supertopup_float_the_new_india_assu_details = $query["userData"];
				}
				//Super Top Up : Floater End

				// The New India Assurance Co Ltd End

				// Max Bupa Health Insurance Co Ltd || Niva Bupa Health Insurance Co Ltd Start

				//Reassure : Individual : Mediclaim Start
				$medi_ind_max_bupa_health_reassure_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_ind_max_bupa_reassure_policy["max_bupa_reassure_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_ind_max_bupa_reassure_policy["max_bupa_reassure_ind_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_ind_policy", $colNames = "max_bupa_reassure_ind_policy.medi_max_bupa_reassure_ind_policy_id  , max_bupa_reassure_ind_policy.fk_policy_id as medi_max_bupa_reassure_ind_policy_fk_policy_id , max_bupa_reassure_ind_policy.fk_policy_type_id , max_bupa_reassure_ind_policy.policy_name_txt ,max_bupa_reassure_ind_policy.fk_company_id ,max_bupa_reassure_ind_policy.fk_department_id , max_bupa_reassure_ind_policy.total_max_bupa_medi_reassure_json_data , max_bupa_reassure_ind_policy.years_of_premium , max_bupa_reassure_ind_policy.region , max_bupa_reassure_ind_policy.first_year_rate , max_bupa_reassure_ind_policy.second_year_rate , max_bupa_reassure_ind_policy.third_year_rate , max_bupa_reassure_ind_policy.first_year_tot , max_bupa_reassure_ind_policy.second_year_tot , max_bupa_reassure_ind_policy.third_year_tot , max_bupa_reassure_ind_policy.tot_term_disc , max_bupa_reassure_ind_policy.tot_premium , max_bupa_reassure_ind_policy.stand_instu_rate , max_bupa_reassure_ind_policy.stand_instu_tot , max_bupa_reassure_ind_policy.doctor_disc_per , max_bupa_reassure_ind_policy.doctor_disc_tot , max_bupa_reassure_ind_policy.family_disc_per , max_bupa_reassure_ind_policy.family_disc_tot , max_bupa_reassure_ind_policy.gross_premium_tot , max_bupa_reassure_ind_policy.gross_premium_tot_new , max_bupa_reassure_ind_policy.medi_cgst_rate , max_bupa_reassure_ind_policy.medi_cgst_tot , max_bupa_reassure_ind_policy.medi_sgst_rate , max_bupa_reassure_ind_policy.medi_sgst_tot , max_bupa_reassure_ind_policy.medi_final_premium , max_bupa_reassure_ind_policy.max_bupa_status , max_bupa_reassure_ind_policy.max_bupa_del_flag	", $whereArr = $whereArr_medi_ind_max_bupa_reassure_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_max_bupa_health_reassure_details = $query["userData"];
				}
				//Reassure : Individual : Mediclaim End

				//Reassure : Floater : Mediclaim Start
				$medi_float_max_bupa_health_reassure_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_float_max_bupa_reassure_policy["max_bupa_reassure_floater_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_float_max_bupa_reassure_policy["max_bupa_reassure_floater_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_floater_policy", $colNames = "max_bupa_reassure_floater_policy.medi_max_bupa_reassure_float_policy_id  , max_bupa_reassure_floater_policy.fk_policy_id as medi_max_bupa_reassure_floater_policy_fk_policy_id , max_bupa_reassure_floater_policy.fk_policy_type_id , max_bupa_reassure_floater_policy.policy_name_txt ,max_bupa_reassure_floater_policy.fk_company_id ,max_bupa_reassure_floater_policy.fk_department_id , max_bupa_reassure_floater_policy.total_max_bupa_medi_float_reassure_json_data , max_bupa_reassure_floater_policy.years_of_premium , max_bupa_reassure_floater_policy.region , max_bupa_reassure_floater_policy.first_year_rate , max_bupa_reassure_floater_policy.second_year_rate , max_bupa_reassure_floater_policy.third_year_rate , max_bupa_reassure_floater_policy.first_year_tot , max_bupa_reassure_floater_policy.second_year_tot , max_bupa_reassure_floater_policy.third_year_tot , max_bupa_reassure_floater_policy.tot_term_disc , max_bupa_reassure_floater_policy.tot_premium , max_bupa_reassure_floater_policy.stand_instu_rate , max_bupa_reassure_floater_policy.stand_instu_tot , max_bupa_reassure_floater_policy.doctor_disc_per , max_bupa_reassure_floater_policy.doctor_disc_tot ,  max_bupa_reassure_floater_policy.gross_premium_tot , max_bupa_reassure_floater_policy.gross_premium_tot_new , max_bupa_reassure_floater_policy.medi_cgst_rate , max_bupa_reassure_floater_policy.medi_cgst_tot , max_bupa_reassure_floater_policy.medi_sgst_rate , max_bupa_reassure_floater_policy.medi_sgst_tot , max_bupa_reassure_floater_policy.medi_final_premium ,max_bupa_reassure_floater_policy.max_age , max_bupa_reassure_floater_policy.max_bupa_status , max_bupa_reassure_floater_policy.max_bupa_del_flag	", $whereArr = $whereArr_medi_float_max_bupa_reassure_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_max_bupa_health_reassure_details = $query["userData"];
				}
				//Reassure : Floater : Mediclaim End

				// Max Bupa Health Insurance Co Ltd || Niva Bupa Health Insurance Co Ltd End

				// Star Health & Allied Insurance Co Ltd Start

				//Red Carpet : Individual : Mediclaim Start
				$medi_ind_star_health_allied_red_carpet_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy.fk_policy_id"] = $policy_id;
					$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy.fk_company_id"] = $company_id;
					$whereArr_medi_star_health_allied_red_carpet_ind_policy["star_health_allied_insu_red_carpet_ind_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_red_carpet_ind_policy", $colNames = "star_health_allied_insu_red_carpet_ind_policy.medi_star_health_ind_policy_id  , star_health_allied_insu_red_carpet_ind_policy.fk_policy_id as star_health_allied_insu_red_carpet_ind_policy_fk_policy_id , star_health_allied_insu_red_carpet_ind_policy.fk_policy_type_id , star_health_allied_insu_red_carpet_ind_policy.policy_name_txt , star_health_allied_insu_red_carpet_ind_policy.fk_company_id , star_health_allied_insu_red_carpet_ind_policy.fk_department_id , star_health_allied_insu_red_carpet_ind_policy.total_star_health_red_carpet_medi_ind_json_data , star_health_allied_insu_red_carpet_ind_policy.years_of_premium , star_health_allied_insu_red_carpet_ind_policy.tot_premium , star_health_allied_insu_red_carpet_ind_policy.medi_cgst_rate , star_health_allied_insu_red_carpet_ind_policy.medi_cgst_tot , star_health_allied_insu_red_carpet_ind_policy.medi_sgst_rate, star_health_allied_insu_red_carpet_ind_policy.medi_sgst_tot, star_health_allied_insu_red_carpet_ind_policy.medi_final_premium, star_health_allied_insu_red_carpet_ind_policy.star_health_status, star_health_allied_insu_red_carpet_ind_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_red_carpet_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_star_health_allied_red_carpet_details = $query["userData"];
				}
				//Red Carpet : Individual : Mediclaim End

				//Red Carpet : Floater : Mediclaim Start
				$medi_float_star_health_allied_red_carpet_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy.fk_policy_id"] = $policy_id;
					$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy.fk_company_id"] = $company_id;
					$whereArr_medi_star_health_allied_red_carpet_float_policy["star_health_allied_insu_red_carpet_float_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_red_carpet_float_policy", $colNames = "star_health_allied_insu_red_carpet_float_policy.medi_star_health_float_policy_id   , star_health_allied_insu_red_carpet_float_policy.fk_policy_id as star_health_allied_insu_red_carpet_float_policy_fk_policy_id , star_health_allied_insu_red_carpet_float_policy.fk_policy_type_id , star_health_allied_insu_red_carpet_float_policy.policy_name_txt , star_health_allied_insu_red_carpet_float_policy.fk_company_id , star_health_allied_insu_red_carpet_float_policy.fk_department_id , star_health_allied_insu_red_carpet_float_policy.total_star_health_red_carpet_medi_float_json_data , star_health_allied_insu_red_carpet_float_policy.years_of_premium , star_health_allied_insu_red_carpet_float_policy.tot_premium , star_health_allied_insu_red_carpet_float_policy.medi_cgst_rate , star_health_allied_insu_red_carpet_float_policy.medi_cgst_tot , star_health_allied_insu_red_carpet_float_policy.medi_sgst_rate, star_health_allied_insu_red_carpet_float_policy.medi_sgst_tot, star_health_allied_insu_red_carpet_float_policy.medi_final_premium, 
					star_health_allied_insu_red_carpet_float_policy.max_age, star_health_allied_insu_red_carpet_float_policy.star_health_status, star_health_allied_insu_red_carpet_float_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_red_carpet_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_star_health_allied_red_carpet_details = $query["userData"];
				}
				//Red Carpet : Floater : Mediclaim End

				//Comprehensive : Individual : Mediclaim Start
				$medi_ind_star_health_allied_comprehensive_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy.fk_policy_id"] = $policy_id;
					$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy.fk_company_id"] = $company_id;
					$whereArr_medi_star_health_allied_comprehensive_ind_policy["star_health_allied_insu_comprehensive_ind_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_comprehensive_ind_policy", $colNames = "star_health_allied_insu_comprehensive_ind_policy.medi_star_health_comp_ind_policy_id  , star_health_allied_insu_comprehensive_ind_policy.fk_policy_id as star_health_allied_insu_comp_float_policy_fk_policy_id , star_health_allied_insu_comprehensive_ind_policy.fk_policy_type_id , star_health_allied_insu_comprehensive_ind_policy.policy_name_txt , star_health_allied_insu_comprehensive_ind_policy.fk_company_id , star_health_allied_insu_comprehensive_ind_policy.fk_department_id , star_health_allied_insu_comprehensive_ind_policy.total_star_health_comprehensive_medi_ind_json_data , star_health_allied_insu_comprehensive_ind_policy.years_of_premium , star_health_allied_insu_comprehensive_ind_policy.tot_premium , star_health_allied_insu_comprehensive_ind_policy.medi_cgst_rate , star_health_allied_insu_comprehensive_ind_policy.medi_cgst_tot , star_health_allied_insu_comprehensive_ind_policy.medi_sgst_rate, star_health_allied_insu_comprehensive_ind_policy.medi_sgst_tot, star_health_allied_insu_comprehensive_ind_policy.medi_final_premium, star_health_allied_insu_comprehensive_ind_policy.star_health_status, star_health_allied_insu_comprehensive_ind_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_comprehensive_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_star_health_allied_comprehensive_details = $query["userData"];
				}
				//Comprehensive : Individual : Mediclaim End

				//Comprehensive : Floater : Mediclaim Start
				$medi_float_star_health_allied_comprehensive_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy.fk_policy_id"] = $policy_id;
					$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy.fk_company_id"] = $company_id;
					$whereArr_medi_star_health_allied_comprehensive_float_policy["star_health_allied_insu_comprehensive_float_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_comprehensive_float_policy", $colNames = "star_health_allied_insu_comprehensive_float_policy.medi_star_health_comp_float_policy_id   , star_health_allied_insu_comprehensive_float_policy.fk_policy_id as star_health_allied_insu_comp_float_policy_fk_policy_id , star_health_allied_insu_comprehensive_float_policy.fk_policy_type_id , star_health_allied_insu_comprehensive_float_policy.policy_name_txt , star_health_allied_insu_comprehensive_float_policy.fk_company_id , star_health_allied_insu_comprehensive_float_policy.fk_department_id , star_health_allied_insu_comprehensive_float_policy.total_star_health_comprehensive_medi_float_json_data , star_health_allied_insu_comprehensive_float_policy.years_of_premium , star_health_allied_insu_comprehensive_float_policy.tot_premium , star_health_allied_insu_comprehensive_float_policy.medi_cgst_rate , star_health_allied_insu_comprehensive_float_policy.medi_cgst_tot , star_health_allied_insu_comprehensive_float_policy.medi_sgst_rate, star_health_allied_insu_comprehensive_float_policy.medi_sgst_tot, star_health_allied_insu_comprehensive_float_policy.medi_final_premium, 
					star_health_allied_insu_comprehensive_float_policy.max_age, star_health_allied_insu_comprehensive_float_policy.star_health_status, star_health_allied_insu_comprehensive_float_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_comprehensive_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_star_health_allied_comprehensive_details = $query["userData"];
				}
				//Comprehensive : Floater : Mediclaim End

				//Super Top Up : Individual Start
				$supertopup_ind_star_health_allied_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy.fk_policy_id"] = $policy_id;
					$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy.fk_company_id"] = $company_id;
					$whereArr_medi_star_health_allied_supertopup_ind_policy["star_health_allied_insu_supertopup_ind_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_supertopup_ind_policy", $colNames = "star_health_allied_insu_supertopup_ind_policy.medi_star_health_super_ind_policy_id  , star_health_allied_insu_supertopup_ind_policy.fk_policy_id as star_health_allied_insu_super_ind_policy_fk_policy_id , star_health_allied_insu_supertopup_ind_policy.fk_policy_type_id , star_health_allied_insu_supertopup_ind_policy.policy_name_txt , star_health_allied_insu_supertopup_ind_policy.fk_company_id , star_health_allied_insu_supertopup_ind_policy.fk_department_id , star_health_allied_insu_supertopup_ind_policy.total_star_health_supertopup_ind_json_data , star_health_allied_insu_supertopup_ind_policy.tot_premium , star_health_allied_insu_supertopup_ind_policy.medi_cgst_rate , star_health_allied_insu_supertopup_ind_policy.medi_cgst_tot , star_health_allied_insu_supertopup_ind_policy.medi_sgst_rate, star_health_allied_insu_supertopup_ind_policy.medi_sgst_tot, star_health_allied_insu_supertopup_ind_policy.medi_final_premium, star_health_allied_insu_supertopup_ind_policy.star_health_status, star_health_allied_insu_supertopup_ind_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_supertopup_ind_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$supertopup_ind_star_health_allied_details = $query["userData"];
				}
				//Super Top Up : Individual End

				//Super Top Up : Floater Start
				$supertopup_float_star_health_allied_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy.fk_policy_id"] = $policy_id;
					$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy.fk_company_id"] = $company_id;
					$whereArr_medi_star_health_allied_supertopup_float_policy["star_health_allied_insu_supertopup_float_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_supertopup_float_policy", $colNames = "star_health_allied_insu_supertopup_float_policy.medi_star_health_super_float_policy_id  , star_health_allied_insu_supertopup_float_policy.fk_policy_id as star_health_allied_insu_super_float_policy_fk_policy_id , star_health_allied_insu_supertopup_float_policy.fk_policy_type_id , star_health_allied_insu_supertopup_float_policy.policy_name_txt , star_health_allied_insu_supertopup_float_policy.fk_company_id , star_health_allied_insu_supertopup_float_policy.fk_department_id , star_health_allied_insu_supertopup_float_policy.total_star_health_supertopup_float_json_data , star_health_allied_insu_supertopup_float_policy.tot_premium , star_health_allied_insu_supertopup_float_policy.medi_cgst_rate , star_health_allied_insu_supertopup_float_policy.medi_cgst_tot , star_health_allied_insu_supertopup_float_policy.medi_sgst_rate, star_health_allied_insu_supertopup_float_policy.medi_sgst_tot, star_health_allied_insu_supertopup_float_policy.medi_final_premium,  star_health_allied_insu_supertopup_float_policy.max_age, star_health_allied_insu_supertopup_float_policy.star_health_status, star_health_allied_insu_supertopup_float_policy.star_health_del_flag", $whereArr = $whereArr_medi_star_health_allied_supertopup_float_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$supertopup_float_star_health_allied_details = $query["userData"];
				}
				//Super Top Up : Floater End

				// Star Health & Allied Insurance Co Ltd End

				// United India Insurance Co Ltd Start

				//Individual Health Insurance Policy : Individual : Mediclaim Start
				$medi_ind_uiic_individual_health_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_mediclaim_policy["mediclaim_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_mediclaim_policy["mediclaim_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "mediclaim_policy", $colNames = "mediclaim_policy.mediclaim_policy_id , mediclaim_policy.fk_policy_id as mediclaim_policy_fk_policy_id , mediclaim_policy.fk_policy_type_id , mediclaim_policy.policy_name_txt , mediclaim_policy.tot_mediclaim_json , mediclaim_policy.medi_total_ncd_amount , mediclaim_policy.medi_total_amount , mediclaim_policy.medi_family_disc_rate , mediclaim_policy.medi_family_disc_tot , mediclaim_policy.medi_premium_after_fd , mediclaim_policy.medi_cgst_rate , mediclaim_policy.medi_cgst_tot , mediclaim_policy.medi_sgst_rate , mediclaim_policy.medi_sgst_tot , mediclaim_policy.medi_final_premium , mediclaim_policy.mediclaim_policy_status , mediclaim_policy.mediclaim_policy_del_flag", $whereArr = $whereArr_mediclaim_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_uiic_individual_health_details = $query["userData"];
				}
				//Individual Health Insurance Policy : Individual : Mediclaim End

				//Family Floater 2014 : Floater : Mediclaim Start
				$medi_float_uiic_family_floater_2014_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_mediclaim_floater_2014_policy["mediclaim_floater_2014_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_mediclaim_floater_2014_policy["mediclaim_floater_2014_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "mediclaim_floater_2014_policy", $colNames = "mediclaim_floater_2014_policy.medi_floater_2014_id , mediclaim_floater_2014_policy.fk_policy_id as medi_floater_2014_policy_fk_policy_id , mediclaim_floater_2014_policy.fk_policy_type_id , mediclaim_floater_2014_policy.policy_name_txt , mediclaim_floater_2014_policy.tot_medi_floater_2014_json , mediclaim_floater_2014_policy.name_insured_sum_insured , mediclaim_floater_2014_policy.name_insured_premium , mediclaim_floater_2014_policy.medi_float_2014_total_premium , mediclaim_floater_2014_policy.medi_float_2014_child_count , mediclaim_floater_2014_policy.medi_float_2014_child_total_premium ,mediclaim_floater_2014_policy.medi_float_2014_child_count_first_premium , mediclaim_floater_2014_policy.medi_float_2014_load_description , mediclaim_floater_2014_policy.medi_float_2014_load_amount , mediclaim_floater_2014_policy.medi_float_2014_load_gross_premium , mediclaim_floater_2014_policy.medi_float_2014_cgst_rate , mediclaim_floater_2014_policy.medi_float_2014_cgst_tot , mediclaim_floater_2014_policy.medi_float_2014_sgst_rate , mediclaim_floater_2014_policy.medi_float_2014_sgst_tot , mediclaim_floater_2014_policy.medi_float_2014_final_premium ,mediclaim_floater_2014_policy.max_age, mediclaim_floater_2014_policy.medi_float_2014_status , mediclaim_floater_2014_policy.medi_float_2014_del_flag", $whereArr = $whereArr_mediclaim_floater_2014_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_uiic_family_floater_2014_details = $query["userData"];
				}
				//Family Floater 2014 : Floater : Mediclaim End

				//Floater 2020(Individual) : Individual : Mediclaim Start
				$medi_ind_uiic_float2020_individual_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_ind2020["medi_ind2020_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_ind2020["medi_ind2020_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_ind2020_policy", $colNames = "medi_ind2020_policy.medi_ind2020_policy_id , medi_ind2020_policy.fk_policy_id as medi_ind2020_policy_fk_policy_id , medi_ind2020_policy.fk_policy_type_id , medi_ind2020_policy.policy_name_txt , medi_ind2020_policy.tot_medi_ind2020_json , medi_ind2020_policy.medi_ind_2020_total_premium , medi_ind2020_policy.medi_ind_2020_family_descount_per , medi_ind2020_policy.medi_ind_2020_family_descount_tot , medi_ind2020_policy.medi_ind_2020_load_description , medi_ind2020_policy.medi_ind_2020_load_amount , medi_ind2020_policy.medi_ind_2020_restore_cover_premium , medi_ind2020_policy.medi_ind_2020_maternity_new_bornbaby , medi_ind2020_policy.medi_ind_2020_daily_cash_allow_hosp , medi_ind2020_policy.medi_ind_2020_load_gross_premium ,medi_ind2020_policy.new_load_gross_premium , medi_ind2020_policy.medi_ind_2020_cgst_rate , medi_ind2020_policy.medi_ind_2020_cgst_tot , medi_ind2020_policy.medi_ind_2020_sgst_rate , medi_ind2020_policy.medi_ind_2020_sgst_tot , medi_ind2020_policy.medi_ind_2020_final_premium , medi_ind2020_policy.medi_ind_2020_status , medi_ind2020_policy.medi_ind_2020_del_flag", $whereArr = $whereArr_medi_ind2020, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_uiic_float2020_individual_details = $query["userData"];
				}
				//Floater 2020(Individual) : Individual : Mediclaim End

				//Family Floater 2020 : Floater : Mediclaim Start
				$medi_float_uiic_family_floater_2020_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_medi_floater_2020_policy["medi_floater_2020_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_medi_floater_2020_policy["medi_floater_2020_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "medi_floater_2020_policy", $colNames = "medi_floater_2020_policy.medi_floater_2020_id , medi_floater_2020_policy.fk_policy_id as medi_floater2020_policy_fk_policy_id , medi_floater_2020_policy.fk_policy_type_id , medi_floater_2020_policy.policy_name_txt , medi_floater_2020_policy.tot_medi_floater_2020_json , medi_floater_2020_policy.name_insured_sum_insured , medi_floater_2020_policy.name_insured_premium , medi_floater_2020_policy.name_insured_ncd , medi_floater_2020_policy.name_insured_premium_after_ncd , medi_floater_2020_policy.medi_float_2020_total_premium , medi_floater_2020_policy.medi_float_2020_child_count , medi_floater_2020_policy.medi_float_2020_child_count_first_premium , medi_floater_2020_policy.medi_float_2020_child_total_premium , medi_floater_2020_policy.medi_float_2020_load_description , medi_floater_2020_policy.medi_float_2020_load_amount , medi_floater_2020_policy.medi_float_2020_restore_cover_premium , medi_floater_2020_policy.medi_float_2020_maternity_new_bornbaby , medi_floater_2020_policy.medi_float_2020_daily_cash_allow_hosp ,medi_floater_2020_policy.medi_float_2020_load_gross_premium, medi_floater_2020_policy.medi_float_2020_cgst_rate , medi_floater_2020_policy.medi_float_2020_cgst_tot , medi_floater_2020_policy.medi_float_2020_sgst_rate , medi_floater_2020_policy.medi_float_2020_sgst_tot , medi_floater_2020_policy.medi_float_2020_final_premium , medi_floater_2020_policy.max_age , medi_floater_2020_policy.medi_float_2020_status , medi_floater_2020_policy.medi_float_2020_del_flag", $whereArr = $whereArr_medi_floater_2020_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_uiic_family_floater_2020_details = $query["userData"];
				}
				//Family Floater 2020 : Floater : Mediclaim End

				//Super Top Up : Individual Start
				$supertopup_ind_uiic_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_supertopup_ind["supertopup_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_supertopup_ind["supertopup_ind_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "supertopup_ind_policy", $colNames = "supertopup_ind_policy.supertopup_ind_policy_id , supertopup_ind_policy.fk_policy_id as supertopup_ind_policy_fk_policy_id , supertopup_ind_policy.fk_policy_type_id , supertopup_ind_policy.policy_name_txt , supertopup_ind_policy.tot_supertopup_ind_json , supertopup_ind_policy.supertopup_ind_total_premium , supertopup_ind_policy.supertopup_ind_load_description , supertopup_ind_policy.supertopup_ind_load_amount , supertopup_ind_policy.supertopup_ind_load_gross_premium , supertopup_ind_policy.supertopup_ind_cgst_rate , supertopup_ind_policy.supertopup_ind_cgst_tot , supertopup_ind_policy.supertopup_ind_sgst_rate , supertopup_ind_policy.supertopup_ind_sgst_tot , supertopup_ind_policy.supertopup_ind_final_premium , supertopup_ind_policy.supertopup_ind_status , supertopup_ind_policy.supertopup_ind_del_flag ", $whereArr = $whereArr_supertopup_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$supertopup_ind_uiic_details = $query["userData"];
				}
				//Super Top Up : Individual End

				//Super Top Up : Floater Start
				$supertopup_float_uiic_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_supertopup_floater["super_top_up_floater_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_supertopup_floater["super_top_up_floater_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "super_top_up_floater_policy", $colNames = "super_top_up_floater_policy.supertopup_floater_policy_id , super_top_up_floater_policy.fk_policy_id as supertopup_floater_policy_fk_policy_id , super_top_up_floater_policy.fk_policy_type_id , super_top_up_floater_policy.policy_name_txt , super_top_up_floater_policy.tot_supertopup_floater_json , super_top_up_floater_policy.name_insured_policy_option , super_top_up_floater_policy.name_insured_deductable_thershold , super_top_up_floater_policy.name_insured_sum_insured , super_top_up_floater_policy.name_insured_premium , super_top_up_floater_policy.supertopup_floater_total_premium , super_top_up_floater_policy.supertopup_floater_load_description , super_top_up_floater_policy.supertopup_floater_load_amount , super_top_up_floater_policy.supertopup_floater_load_gross_premium , super_top_up_floater_policy.supertopup_floater_cgst_rate , super_top_up_floater_policy.supertopup_floater_cgst_tot , super_top_up_floater_policy.supertopup_floater_sgst_rate , super_top_up_floater_policy.supertopup_floater_sgst_tot , super_top_up_floater_policy.supertopup_floater_final_premium ,super_top_up_floater_policy.max_age, super_top_up_floater_policy.supertopup_floater_status , super_top_up_floater_policy.supertopup_floater_final_del_flag", $whereArr = $whereArr_supertopup_floater, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$supertopup_float_uiic_details = $query["userData"];
				}
				//Super Top Up : Floater End

				// United India Insurance Co Ltd End


				// Care Health Insurance Co Ltd Start

				//Care Advantage : Individual : Mediclaim Start
				$medi_ind_care_health_care_adv_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy.fk_policy_id"] = $policy_id;
					$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy.fk_company_id"] = $company_id;
					$whereArr_care_health_care_adv_ind["care_health_care_adv_ind_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_adv_ind_policy", $colNames = "care_health_care_adv_ind_policy.care_adv_ind_id , care_health_care_adv_ind_policy.fk_policy_id as care_health_care_adv_ind_policy_fk_policy_id , care_health_care_adv_ind_policy.fk_policy_type_id , care_health_care_adv_ind_policy.policy_name_txt , care_health_care_adv_ind_policy.fk_company_id , care_health_care_adv_ind_policy.fk_department_id , care_health_care_adv_ind_policy.total_care_adv_ind_json_data , care_health_care_adv_ind_policy.medi_final_premium , care_health_care_adv_ind_policy.care_status , care_health_care_adv_ind_policy.care_del_flag ", $whereArr = $whereArr_care_health_care_adv_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_care_health_care_adv_details = $query["userData"];
				}
				//Care Advantage : Individual : Mediclaim End

				//Care Advantage : Floater : Mediclaim Start
				$medi_float_care_health_care_adv_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy.fk_policy_id"] = $policy_id;
					$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy.fk_company_id"] = $company_id;
					$whereArr_care_health_care_adv_float["care_health_care_adv_float_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_adv_float_policy", $colNames = "care_health_care_adv_float_policy.care_adv_float_id , care_health_care_adv_float_policy.fk_policy_id as care_health_care_adv_float_policy_fk_policy_id , care_health_care_adv_float_policy.fk_policy_type_id , care_health_care_adv_float_policy.policy_name_txt , care_health_care_adv_float_policy.fk_company_id , care_health_care_adv_float_policy.fk_department_id , care_health_care_adv_float_policy.total_care_adv_float_json_data , care_health_care_adv_float_policy.medi_final_premium , care_health_care_adv_float_policy.max_age , care_health_care_adv_float_policy.care_status , care_health_care_adv_float_policy.care_del_flag ", $whereArr = $whereArr_care_health_care_adv_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_care_health_care_adv_details = $query["userData"];
				}
				//Care Advantage : Floater : Mediclaim End

				//Care : Individual : Mediclaim Start
				$medi_ind_care_health_care_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_care_health_care_ind["care_health_care_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_care_health_care_ind["care_health_care_ind_policy.fk_policy_id"] = $policy_id;
					$whereArr_care_health_care_ind["care_health_care_ind_policy.fk_company_id"] = $company_id;
					$whereArr_care_health_care_ind["care_health_care_ind_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_ind_policy", $colNames = "care_health_care_ind_policy.care_ind_id , care_health_care_ind_policy.fk_policy_id as care_health_care_ind_policy_fk_policy_id , care_health_care_ind_policy.fk_policy_type_id , care_health_care_ind_policy.policy_name_txt , care_health_care_ind_policy.fk_company_id , care_health_care_ind_policy.fk_department_id , care_health_care_ind_policy.total_care_ind_json_data , care_health_care_ind_policy.medi_final_premium , care_health_care_ind_policy.care_status , care_health_care_ind_policy.care_del_flag ", $whereArr = $whereArr_care_health_care_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_ind_care_health_care_details = $query["userData"];
				}
				//Care : Individual : Mediclaim End

				//Care : Floater : Mediclaim Start
				$medi_float_care_health_care_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_care_health_care_float["care_health_care_float_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_care_health_care_float["care_health_care_float_policy.fk_policy_id"] = $policy_id;
					$whereArr_care_health_care_float["care_health_care_float_policy.fk_company_id"] = $company_id;
					$whereArr_care_health_care_float["care_health_care_float_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_health_care_float_policy", $colNames = "care_health_care_float_policy.care_float_id , care_health_care_float_policy.fk_policy_id as care_health_care_float_policy_fk_policy_id , care_health_care_float_policy.fk_policy_type_id , care_health_care_float_policy.policy_name_txt , care_health_care_float_policy.fk_company_id , care_health_care_float_policy.fk_department_id , care_health_care_float_policy.total_care_float_json_data , care_health_care_float_policy.medi_final_premium , care_health_care_float_policy.max_age , care_health_care_float_policy.care_status , care_health_care_float_policy.care_del_flag ", $whereArr = $whereArr_care_health_care_float, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$medi_float_care_health_care_details = $query["userData"];
				}
				//Care : Floater : Mediclaim End
				
				// Care Health Insurance Co Ltd End

				// Term Plan Policy Details Start
				$term_plan_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_term_plan["term_plan_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_term_plan["term_plan_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "term_plan_policy", $colNames = "term_plan_policy.term_plan_policy_id , term_plan_policy.fk_policy_id as term_plan_fk_policy_id , term_plan_policy.fk_policy_type_id , term_plan_policy.term_plan_policy , term_plan_policy.term_plan_premium_paying_term , term_plan_policy.term_plan_total_sum_insured , term_plan_policy.term_plan_basic_premium , term_plan_policy.term_plan_add_loading , term_plan_policy.term_plan_loading_description , term_plan_policy.term_plan_premium_after_loading , term_plan_policy.term_plan_cgst , term_plan_policy.term_plan_sgst , term_plan_policy.term_plan_cgst_tot_ammount , term_plan_policy.term_plan_sgst_tot_ammount , term_plan_policy.term_plan_final_paybal_premium , term_plan_policy.term_plan_status", $whereArr = $whereArr_term_plan, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$term_plan_policy_details = $query["userData"];
				}
				// Term Plan Policy Details End

				// Shopkeeper Policy Details Start
				$shopkeeper_policy_detals = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_shopkeeper["shopkeeper_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_shopkeeper["shopkeeper_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "shopkeeper_policy", $colNames = "shopkeeper_policy.shopkeeper_policy_id , shopkeeper_policy.fk_policy_id as shopkeeper_fk_policy_id , shopkeeper_policy.fk_policy_type_id , shopkeeper_policy.shopkeeper_risk_address , shopkeeper_policy.fire_sum_insured_1 , shopkeeper_policy.fire_sum_insured_2 , shopkeeper_policy.fire_sum_insured_3 , shopkeeper_policy.fire_rate_1 , shopkeeper_policy.fire_rate_2 , shopkeeper_policy.fire_rate_3 , shopkeeper_policy.fire_premium_1 , shopkeeper_policy.fire_premium_2 , shopkeeper_policy.fire_premium_3 , shopkeeper_policy.burglary_sum_insured_1 , shopkeeper_policy.burglary_sum_insured_2 , shopkeeper_policy.burglary_sum_insured_3,
	
					shopkeeper_policy.burglary_rate_1 , shopkeeper_policy.burglary_rate_2 , shopkeeper_policy.burglary_rate_3 , shopkeeper_policy.burglary_premium_1 , shopkeeper_policy.burglary_premium_2 , shopkeeper_policy.burglary_premium_3 , shopkeeper_policy.money_insu_sum_insured_1 , shopkeeper_policy.money_insu_sum_insured_2 , shopkeeper_policy.money_insu_sum_insured_3 , shopkeeper_policy.money_insu_rate_1 , shopkeeper_policy.money_insu_rate_2 , shopkeeper_policy.money_insu_rate_3 , shopkeeper_policy.money_insu_premium_1 , shopkeeper_policy.money_insu_premium_2 , shopkeeper_policy.money_insu_premium_3 , shopkeeper_policy.plate_glass_sum_insured,
					shopkeeper_policy.plate_glass_rate_per , shopkeeper_policy.plate_glass_premium , shopkeeper_policy.neon_glow_sum_insured , shopkeeper_policy.neon_glow_rate_per , shopkeeper_policy.neon_glow_premium , shopkeeper_policy.baggage_ins_sum_insured , shopkeeper_policy.baggage_ins_rate_per , shopkeeper_policy.baggage_ins_premium , shopkeeper_policy.personal_accident_json , shopkeeper_policy.personal_accident_sum_insured , shopkeeper_policy.personal_accident_rate_per , shopkeeper_policy.personal_accident_premium , shopkeeper_policy.fidelity_gaur_json , shopkeeper_policy.fidelity_gaur_sum_insured , shopkeeper_policy.fidelity_gaur_rate_per , shopkeeper_policy.fidelity_gaur_premium,
					shopkeeper_policy.pub_libility_sum_insured , shopkeeper_policy.work_men_compens_sum_insured , shopkeeper_policy.pub_libility_rate , shopkeeper_policy.work_men_compens_rate , shopkeeper_policy.pub_libility_premium , shopkeeper_policy.work_men_compens_premium , shopkeeper_policy.bus_inter_sum_insured_1 , shopkeeper_policy.bus_inter_sum_insured_2 , shopkeeper_policy.bus_inter_sum_insured_3 , shopkeeper_policy.bus_inter_rate_1 , shopkeeper_policy.bus_inter_rate_2 , shopkeeper_policy.bus_inter_rate_3 , shopkeeper_policy.bus_inter_premium_1 , shopkeeper_policy.bus_inter_premium_2 , shopkeeper_policy.bus_inter_premium_3 , shopkeeper_policy.shopkeeper_total_sum_assured , shopkeeper_policy.shopkeeper_total_premium,
					shopkeeper_policy.shopkeeper_less_discount_per , shopkeeper_policy.shopkeeper_less_discount_tot , shopkeeper_policy.shopkeeper_fire_rate_after_discount_tot , shopkeeper_policy.shopkeeper_cgst_fire_per , shopkeeper_policy.shopkeeper_cgst_fire_tot , shopkeeper_policy.shopkeeper_sgst_fire_per , shopkeeper_policy.shopkeeper_sgst_fire_tot , shopkeeper_policy.shopkeeper_final_paybal_premium , shopkeeper_policy.shopkeeper_policy_status , shopkeeper_policy.shopkeeper_policy_del_flag ", $whereArr = $whereArr_shopkeeper, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$shopkeeper_policy_detals = $query["userData"];
				}
				// Shopkeeper Policy Details End

				// Jweller Block Policy Details Start
				$jweller_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_jweller["jweller_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_jweller["jweller_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "jweller_policy", $colNames = "jweller_policy.jweller_policy_id , jweller_policy.fk_policy_id as jweller_fk_policy_id , jweller_policy.fk_policy_type_id , jweller_policy.stock_premises_sum_insu_1 , jweller_policy.stock_premises_sum_insu_2 , jweller_policy.stock_premises_sum_insu_3 , jweller_policy.stock_premises_sum_insu_4 , jweller_policy.stock_premises_sum_insu_5 , jweller_policy.stock_premises_sum_insu_6 , jweller_policy.stock_premises_premium_1 , jweller_policy.stock_premises_premium_2 , jweller_policy.stock_custody_sum_insu_1 , jweller_policy.stock_custody_sum_insu_2 , jweller_policy.stock_custody_sum_insu_3 , jweller_policy.stock_custody_sum_insu_4 , jweller_policy.stock_custody_premium_1, jweller_policy.stock_custody_premium_2,
	
					jweller_policy.stock_transit_sum_insu_1 , jweller_policy.stock_transit_sum_insu_2 , jweller_policy.stock_transit_sum_insu_3 , jweller_policy.stock_transit_sum_insu_4 , jweller_policy.stock_transit_premium , jweller_policy.standard_fire_perils_1 , jweller_policy.standard_fire_perils_2 , jweller_policy.standard_fire_perils_3 , jweller_policy.standard_fire_perils_4 , jweller_policy.standard_fire_perils_5 , jweller_policy.standard_fire_perils_6 , jweller_policy.standard_fire_perils_premium_1 , jweller_policy.standard_fire_perils_premium_2 , jweller_policy.standard_fire_perils_premium_3 , jweller_policy.content_burglary_sum_insu , jweller_policy.content_burglary_premium,
					jweller_policy.stock_exhibition_sum_insu , jweller_policy.stock_exhibition_premium , jweller_policy.fidelity_guar_cover_sum_insu_1 , jweller_policy.fidelity_guar_cover_sum_insu_2 , jweller_policy.fidelity_guar_cover_premium_1 , jweller_policy.fidelity_guar_cover_premium_2 , jweller_policy.total_fidelity_guar_cover_json , jweller_policy.plate_glass_sum_insu , jweller_policy.plate_glass_premium , jweller_policy.neon_sign_sum_insu , jweller_policy.neon_sign_premium , jweller_policy.portable_equipmets_sum_insu , jweller_policy.portable_equipmets_premium , jweller_policy.employee_compensation_sum_insu_1 , jweller_policy.employee_compensation_sum_insu_2 , jweller_policy.employee_compensation_premium , jweller_policy.electronic_equipment_sum_insu,
					jweller_policy.electronic_equipment_premium , jweller_policy.public_liability_sum_insu , jweller_policy.public_liability_premium , jweller_policy.money_transit_sum_insu , jweller_policy.money_transit_premium , jweller_policy.machinery_breakdown_sum_insu , jweller_policy.machinery_breakdown_premium ,
					jweller_policy.jweller_total_sum_assured , jweller_policy.jweller_less_discount , jweller_policy.jweller_less_discount_tot , jweller_policy.jweller_after_discount_tot , jweller_policy.jweller_terrorism_per , jweller_policy.jweller_terrorism_per_tot , jweller_policy.jweller_tot_net_premium , jweller_policy.jweller_cgst_per , jweller_policy.jweller_sgst_per , jweller_policy.jweller_cgst_per_tot, jweller_policy.jweller_sgst_per_tot, jweller_policy.jweller_final_payble, jweller_policy.jweller_policy_status , jweller_policy.jweller_del_flag", $whereArr = $whereArr_jweller, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$jweller_policy_details = $query["userData"];
				}
				// Jweller Block Policy Details End

				// Open / Stop / Specific Policy Details Start
				$marine_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
					$whereArr_marine["marine_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_marine["marine_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "marine_policy", $colNames = "marine_policy.marine_policy_id , marine_policy.fk_policy_id as marine_fk_policy_id , marine_policy.fk_policy_type_id , marine_policy.policy_name_txt ,marine_policy. from_destination ,marine_policy. to_destination , marine_policy.coverage_type , marine_policy.marine_description , marine_policy.interest_insured , marine_policy.period_of_insurance , marine_policy.group_name_address , marine_policy.marine_sum_insured ,marine_policy.packing_stand_customary, marine_policy.total_marine_cc_json , marine_policy.business_description , marine_policy.voyage_domestic_purchase , marine_policy.voyage_international_purchase , marine_policy.voyage_domestic_sales , marine_policy.voyage_export_sales , marine_policy.voyage_job_worker , marine_policy.voyage_domestic_fini_good , marine_policy.voyage_export_fini_good , marine_policy.voyage_domestic_purch_return , marine_policy.voyage_export_purch_return , marine_policy.voyage_sales_return , marine_policy.domestic_purch , marine_policy.international_purch , marine_policy.domestic_sale , marine_policy.export_sale , marine_policy.per_bottom_limit , marine_policy.per_location_limit , marine_policy.per_claim_excess , marine_policy.declaration_sale_fig , marine_policy.annual_turn_over , marine_policy.tot_sum_insured , marine_policy.rate_applied , marine_policy.rate_applied_per , marine_policy.rate_applied_hidden , marine_policy.marine_cgst_per , marine_policy.marine_sgst_per , marine_policy.cgst_rate_tot , marine_policy.sgst_rate_tot , marine_policy.marine_final_payble_premium , marine_policy.marine_policy_status , marine_policy.marine_del_flag", $whereArr = $whereArr_marine, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$marine_policy_details = $query["userData"];
				}
				// Open / Stop / Specific Policy Details End

				// GMC Policy Details Start
				$gmc_ind_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_gmc_ind["gmc_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_gmc_ind["gmc_policy.fk_policy_id"] = $policy_id;
					$whereArr_gmc_ind["gmc_policy.fk_company_id"] = $company_id;
					$whereArr_gmc_ind["gmc_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "gmc_policy", $colNames = "gmc_policy.gmc_policy_id , gmc_policy.fk_policy_id as gmc_policy_fk_policy_id , gmc_policy.fk_policy_type_id , gmc_policy.policy_name_txt , gmc_policy.fk_company_id , gmc_policy.fk_department_id , gmc_policy.tot_gmc_json_data , gmc_policy.gmc_family_size , gmc_policy.gmc_tot_sum_insured , gmc_policy.gmc_policy_status , gmc_policy.gmc_policy_del_flag ", $whereArr = $whereArr_gmc_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$gmc_ind_policy_details = $query["userData"];
				}
				// GMC Policy Details End
	
				// GPA Policy Details Start
				$gpa_ind_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_gpa_ind["gpa_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_gpa_ind["gpa_policy.fk_policy_id"] = $policy_id;
					$whereArr_gpa_ind["gpa_policy.fk_company_id"] = $company_id;
					$whereArr_gpa_ind["gpa_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "gpa_policy", $colNames = "gpa_policy.gpa_policy_id , gpa_policy.fk_policy_id as gpa_policy_fk_policy_id , gpa_policy.fk_policy_type_id , gpa_policy.policy_name_txt , gpa_policy.fk_company_id , gpa_policy.fk_department_id , gpa_policy.tot_gpa_json_data , gpa_policy.gpa_family_size , gpa_policy.gpa_tot_sum_insured , gpa_policy.gpa_policy_status , gpa_policy.gpa_policy_del_flag ", $whereArr = $whereArr_gpa_ind, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$gpa_ind_policy_details = $query["userData"];
				}
				// GPA Policy Details End

				// Personal Accident Policy Details Start
				$ind_personal_accident_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_ind_personal_accident["personal_accident_ind_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_ind_personal_accident["personal_accident_ind_policy.fk_policy_id"] = $policy_id;
					$whereArr_ind_personal_accident["personal_accident_ind_policy.fk_company_id"] = $company_id;
					$whereArr_ind_personal_accident["personal_accident_ind_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "personal_accident_ind_policy", $colNames = "personal_accident_ind_policy.paccident_policy_id , personal_accident_ind_policy.fk_policy_id as personal_accident_policy_ind_fk_policy_id , personal_accident_ind_policy.fk_policy_type_id , personal_accident_ind_policy.policy_name_txt , personal_accident_ind_policy.fk_company_id , personal_accident_ind_policy.fk_department_id , personal_accident_ind_policy.total_pa_ind_json_data , personal_accident_ind_policy.tot_premium , personal_accident_ind_policy.less_disc_rate , personal_accident_ind_policy.less_disc_tot , personal_accident_ind_policy.gross_premium , personal_accident_ind_policy.gross_premium_new  , personal_accident_ind_policy.medi_cgst_rate  , personal_accident_ind_policy.medi_cgst_tot  , personal_accident_ind_policy.medi_sgst_rate  , personal_accident_ind_policy.medi_sgst_tot  , personal_accident_ind_policy.medi_final_premium  , personal_accident_ind_policy.personal_accident_status  , personal_accident_ind_policy.personal_accident_del_flag  ", $whereArr = $whereArr_ind_personal_accident, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$ind_personal_accident_policy_details = $query["userData"];
				}
				// Personal Accident Policy Details End

				// Private Car Policy Details Start
				$private_car_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_private_car["motor_private_car_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_private_car["motor_private_car_policy.fk_policy_id"] = $policy_id;
					$whereArr_private_car["motor_private_car_policy.fk_company_id"] = $company_id;
					$whereArr_private_car["motor_private_car_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_private_car_policy", $colNames = "motor_private_car_policy.private_car_policy_id , motor_private_car_policy.fk_policy_id as motor_private_car_policy_fk_policy_id , motor_private_car_policy.fk_policy_type_id , motor_private_car_policy.policy_name_txt , motor_private_car_policy.fk_company_id , motor_private_car_policy.fk_department_id , motor_private_car_policy.vehicle_make_model , motor_private_car_policy.vehicle_reg_no , motor_private_car_policy.insu_declared_val , motor_private_car_policy.non_elect_access_val , motor_private_car_policy.elect_access_val , motor_private_car_policy.lpg_cng_idv_val , motor_private_car_policy.trailer_val , motor_private_car_policy.year_manufact_val , motor_private_car_policy.rta_city_code , motor_private_car_policy.rta_city , motor_private_car_policy.rta_city_cat , motor_private_car_policy.cubic_capacity_val , motor_private_car_policy.calculation_method , motor_private_car_policy.type_of_cover , motor_private_car_policy.prev_policy_expiry_date , motor_private_car_policy.policy_period , motor_private_car_policy.inception_date , motor_private_car_policy.expiry_date , motor_private_car_policy.od_basic_od_tot , motor_private_car_policy.od_special_disc_per , motor_private_car_policy.od_special_disc_tot , motor_private_car_policy.od_special_load_per , motor_private_car_policy.od_special_load_tot , motor_private_car_policy.od_net_basic_od_tot , motor_private_car_policy.od_non_elec_acc_tot , motor_private_car_policy.od_elec_acc_tot , motor_private_car_policy.od_bi_fuel_kit_tot , motor_private_car_policy.od_od_basic_od1_tot , motor_private_car_policy.od_trailer_tot , motor_private_car_policy.od_geographical_area_tot , motor_private_car_policy.od_embassy_load_tot , motor_private_car_policy.od_fibre_glass_tank_tot , motor_private_car_policy.od_driving_tut_tot , motor_private_car_policy.od_rallies_tot , motor_private_car_policy.od_basic_od2_tot , motor_private_car_policy.od_anti_tot , motor_private_car_policy.od_handicap_tot , motor_private_car_policy.od_aai_tot , motor_private_car_policy.od_vintage_tot , motor_private_car_policy.od_own_premises_tot , motor_private_car_policy.od_voluntary_deduc_tot , motor_private_car_policy.od_basic_od3_tot , motor_private_car_policy.od_ncb_per , motor_private_car_policy.od_ncb_tot, motor_private_car_policy.od_tot_anual_od_premium , motor_private_car_policy.od_tot_od_premium_policy_period , motor_private_car_policy.tp_basic_tp_tot , motor_private_car_policy.tp_restr_tppd , motor_private_car_policy.tp_trailer_tot , motor_private_car_policy.tp_bi_fuel_tot , motor_private_car_policy.tp_basic_tp1_tot , motor_private_car_policy.tp_compul_own_driv_tot , motor_private_car_policy.tp_geographical_area_tot , motor_private_car_policy.tp_unnamed_papax_tot , motor_private_car_policy.tp_no_seats_limit_person_tot , motor_private_car_policy.tp_ll_drv_emp_tot , motor_private_car_policy.tp_no_drv_emp_tot , motor_private_car_policy.tp_noof_person_tot , motor_private_car_policy.tp_pa_paid_drv_tot , motor_private_car_policy.tp_ll_defe_tot , motor_private_car_policy.tp_basic_tp2_tot , motor_private_car_policy.tp_tot_anual_tp_premium , motor_private_car_policy.tp_tot_premium_policy_period , motor_private_car_policy.plan_name , motor_private_car_policy.plan_name_tot , motor_private_car_policy.tot_othercover_ind_json , motor_private_car_policy.tot_anual_cover_premium , motor_private_car_policy.tot_cover_premium_period , motor_private_car_policy.tot_premium , motor_private_car_policy.motor_cgst_rate  , motor_private_car_policy.motor_cgst_tot  , motor_private_car_policy.motor_sgst_rate  , motor_private_car_policy.motor_sgst_tot  , motor_private_car_policy.gst_rate , motor_private_car_policy.gst_tot , motor_private_car_policy.tot_payable_premium , motor_private_car_policy.private_car_policy_status , motor_private_car_policy.private_car_policy_del_flag", $whereArr = $whereArr_private_car, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$private_car_policy_details = $query["userData"];
				}
				// Private Car Policy Details End
	
				// 2 Wheeler Policy Details Start
				$two_wheeler_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_2_wheeler["motor_2_wheeler_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_2_wheeler["motor_2_wheeler_policy.fk_policy_id"] = $policy_id;
					$whereArr_2_wheeler["motor_2_wheeler_policy.fk_company_id"] = $company_id;
					$whereArr_2_wheeler["motor_2_wheeler_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_2_wheeler_policy", $colNames = "motor_2_wheeler_policy.2_wheeler_policy_id as two_wheeler_policy_id, motor_2_wheeler_policy.fk_policy_id as two_wheeler_policy_fk_policy_id , motor_2_wheeler_policy.fk_policy_type_id , motor_2_wheeler_policy.policy_name_txt , motor_2_wheeler_policy.fk_company_id , motor_2_wheeler_policy.fk_department_id , motor_2_wheeler_policy.vehicle_make_model , motor_2_wheeler_policy.vehicle_reg_no , motor_2_wheeler_policy.insu_declared_val , motor_2_wheeler_policy.elect_acc_val , motor_2_wheeler_policy.other_elect_acc_val , motor_2_wheeler_policy.policy_period_tenure_years , motor_2_wheeler_policy.previous_policy_expiry_date_tenur , motor_2_wheeler_policy.year_manufact_val , motor_2_wheeler_policy.rta_city_code , motor_2_wheeler_policy.rta_city , motor_2_wheeler_policy.rta_city_cat , motor_2_wheeler_policy.cubic_capacity_val , motor_2_wheeler_policy.type_of_cover , motor_2_wheeler_policy.policy_period , motor_2_wheeler_policy.inception_date , motor_2_wheeler_policy.expiry_date , motor_2_wheeler_policy.od_basic_od_tot , motor_2_wheeler_policy.od_special_disc_per , motor_2_wheeler_policy.od_special_disc_tot , motor_2_wheeler_policy.od_special_load_per , motor_2_wheeler_policy.od_special_load_tot , motor_2_wheeler_policy.od_net_basic_od_tot , motor_2_wheeler_policy.od_elec_acc_tot , motor_2_wheeler_policy.od_other_elec_acc_tot , motor_2_wheeler_policy.od_od_basic_od1_tot , motor_2_wheeler_policy.od_geographical_area_tot , motor_2_wheeler_policy.od_rallies_tot , motor_2_wheeler_policy.od_embassy_load_tot , motor_2_wheeler_policy.od_basic_od2_tot , motor_2_wheeler_policy.od_anti_theft_tot , motor_2_wheeler_policy.od_handicap_tot , motor_2_wheeler_policy.od_aai_tot , motor_2_wheeler_policy.od_side_car_tot , motor_2_wheeler_policy.od_own_premises_tot, motor_2_wheeler_policy.od_voluntary_excess_tot, motor_2_wheeler_policy.od_basic_od3_tot, motor_2_wheeler_policy.od_ncb_per, motor_2_wheeler_policy.od_ncb_tot, motor_2_wheeler_policy.od_tot_od_premium_policy_period , motor_2_wheeler_policy.tp_basic_tp_tot , motor_2_wheeler_policy.tp_restr_tppd_tot , motor_2_wheeler_policy.tp_basic_tp1_tot , motor_2_wheeler_policy.tp_geographical_area_tot , motor_2_wheeler_policy.tp_compul_pa_own_driv_tot , motor_2_wheeler_policy.tp_unnamed_pa_tot , motor_2_wheeler_policy.tp_ll_drv_emp_imt28_tot , motor_2_wheeler_policy.tp_ll_other_emp_tot , motor_2_wheeler_policy.tp_noof_other_emp_tot , motor_2_wheeler_policy.tp_basic_tp2_tot , motor_2_wheeler_policy.tp_tot_premium_policy_period , motor_2_wheeler_policy.plan_name , motor_2_wheeler_policy.plan_name_tot , motor_2_wheeler_policy.tot_othercover_ind_json , motor_2_wheeler_policy.tot_cover_premium_period  , motor_2_wheeler_policy.tot_premium , motor_2_wheeler_policy.motor_cgst_rate  , motor_2_wheeler_policy.motor_cgst_tot  , motor_2_wheeler_policy.motor_sgst_rate  , motor_2_wheeler_policy.motor_sgst_tot , motor_2_wheeler_policy.gst_rate , motor_2_wheeler_policy.gst_tot , motor_2_wheeler_policy.tot_payable_premium , motor_2_wheeler_policy.2_wheeler_policy_status , motor_2_wheeler_policy.2_wheeler_policy_del_flag", $whereArr = $whereArr_2_wheeler, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$two_wheeler_policy_details = $query["userData"];
				}
				// 2 Wheeler Policy Details End
	
				// Commercial Vehicle Policy Details Start
				$motor_commercial_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($company_id) || !empty($department_id)) {
					$whereArr_motor_commercial_policy["motor_commercial_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_motor_commercial_policy["motor_commercial_policy.fk_policy_id"] = $policy_id;
					$whereArr_motor_commercial_policy["motor_commercial_policy.fk_company_id"] = $company_id;
					$whereArr_motor_commercial_policy["motor_commercial_policy.fk_department_id"] = $department_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "motor_commercial_policy", $colNames = "motor_commercial_policy.commercial_policy_id , motor_commercial_policy.fk_policy_id as motor_commercial_policy_fk_policy_id , motor_commercial_policy.fk_policy_type_id , motor_commercial_policy.policy_name_txt , motor_commercial_policy.fk_company_id , motor_commercial_policy.fk_department_id , motor_commercial_policy.vehicle_make_model , motor_commercial_policy.vehicle_reg_no , motor_commercial_policy.insu_declared_val , motor_commercial_policy.elect_acc_val , motor_commercial_policy.lpg_cng_idv_val , motor_commercial_policy.year_manufact_val , motor_commercial_policy.zone_city_code , motor_commercial_policy.zone_city , motor_commercial_policy.zone_city_cat , motor_commercial_policy.gvw_val , motor_commercial_policy.class_val , motor_commercial_policy.type_of_cover , motor_commercial_policy.policy_period , motor_commercial_policy.inception_date , motor_commercial_policy.expiry_date , motor_commercial_policy.od_basic_od_tot , motor_commercial_policy.od_elec_acc_tot , motor_commercial_policy.od_trailer_tot , motor_commercial_policy.od_bi_fuel_kit_tot , motor_commercial_policy.od_od_basic_od1_tot , motor_commercial_policy.od_geog_area_tot , motor_commercial_policy.od_fiber_glass_tank_tot , motor_commercial_policy.od_imt_cover_mud_guard_tot , motor_commercial_policy.od_basic_od2_tot , motor_commercial_policy.od_basic_od3_tot , motor_commercial_policy.od_ncb_per , motor_commercial_policy.od_ncb_tot , motor_commercial_policy.od_tot_anual_od_premium , motor_commercial_policy.od_special_disc_per , motor_commercial_policy.od_special_disc_tot , motor_commercial_policy.od_special_load_per , motor_commercial_policy.od_special_load_tot , motor_commercial_policy.od_tot_od_premium , motor_commercial_policy.tp_basic_tp_tot, motor_commercial_policy.tp_restr_tppd_tot, motor_commercial_policy.tp_trailer_tot, motor_commercial_policy.tp_bi_fuel_kit_tot, motor_commercial_policy.tp_basic_tp1_tot, motor_commercial_policy.tp_geog_area_tot , motor_commercial_policy.tp_compul_pa_own_driv_tot , motor_commercial_policy.tp_pa_paid_driver_tot , motor_commercial_policy.tp_ll_emp_non_fare_tot , motor_commercial_policy.tp_ll_driver_cleaner_tot , motor_commercial_policy.tp_ll_person_operation_tot , motor_commercial_policy.tp_basic_tp2_tot , motor_commercial_policy.tp_tot_premium , motor_commercial_policy.tp_consumables , motor_commercial_policy.tp_zero_depreciation , motor_commercial_policy.tp_road_side_ass , motor_commercial_policy.tp_tot_addon_premium , motor_commercial_policy.tot_owd_premium , motor_commercial_policy.tot_owd_addon_premium , motor_commercial_policy.tot_btp_premium , motor_commercial_policy.tot_other_tp_premium  , motor_commercial_policy.tot_premium , motor_commercial_policy.tot_owd_cgst_rate  , motor_commercial_policy.tot_owd_sgst_rate  , motor_commercial_policy.tot_owd_addon_cgst_rate  , motor_commercial_policy.tot_owd_addon_sgst_rate , motor_commercial_policy.tot_btp_cgst_rate , motor_commercial_policy.tot_btp_sgst_rate , motor_commercial_policy.tot_other_tp_cgst_rate , motor_commercial_policy.tot_other_tp_sgst_rate , motor_commercial_policy.tot_owd_gst , motor_commercial_policy.tot_owd_addon_gst , motor_commercial_policy.tot_btp_gst , motor_commercial_policy.tot_other_tp_gst , motor_commercial_policy.tot_gst_amt , motor_commercial_policy.tot_owd_final , motor_commercial_policy.tot_owd_addon_final , motor_commercial_policy.tot_btp_final , motor_commercial_policy.tot_other_tp_final , motor_commercial_policy.tot_final_premium , motor_commercial_policy.tot_payable_premium , motor_commercial_policy.commercial_policy_status , motor_commercial_policy.commercial_policy_del_flag ", $whereArr = $whereArr_motor_commercial_policy, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$motor_commercial_policy_details = $query["userData"];
				}
				// Commercial Vehicle Policy Details End

				// Other Policy Details Start
				$others_policy_details = array();
				if (!empty($policy_id) || !empty($policy_type_id)) {
	
					$whereArr_others["others_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_others["others_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "others_policy", $colNames = "others_policy.other_policy_id , others_policy.fk_policy_id as other_fk_policy_id , others_policy.fk_policy_type_id , others_policy.other_total_sum_assured , others_policy.other_fire_rate_per , others_policy.other_fire_rate_tot_amount , others_policy.other_less_discount_per , others_policy.other_less_discount_tot_amount , others_policy.other_fire_rate_after_discount , others_policy.other_cgst_rate_per , others_policy.other_cgst_tot_amount , others_policy.other_sgst_rate_per , others_policy.other_sgst_tot_amount , others_policy.other_final_payable_premium , others_policy.others_policy_status , others_policy.other_del_flag", $whereArr = $whereArr_others, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$others_policy_details = $query["userData"];
				}
				// Other Policy Details End

				// Fire RC Details Start
				$fire_rc_policy_list = array();
				if (!empty($policy_id) || !empty($policy_type_id) || !empty($policy_type_cond) == 3) {
	
					$whereArr_fire_rc["fire_rc_policy.fk_policy_type_id"] = $policy_type_id;
					$whereArr_fire_rc["fire_rc_policy.fk_policy_id"] = $policy_id;
					$whereArr_fire_rc["fire_rc_policy.policy_type"] = $result["policy_type"];
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "fire_rc_policy", $colNames = "fire_rc_policy.fire_rc_policy_id , fire_rc_policy.fk_policy_id as fire_rc_fk_policy_id , fire_rc_policy.fk_policy_type_id , fire_rc_policy.policy_type , fire_rc_policy.fire_rc_total_sum_assured , fire_rc_policy.fire_rc_fire_rate_per , fire_rc_policy.fire_rc_fire_rate_tot_amount , fire_rc_policy.fire_rc_less_discount_per , fire_rc_policy.fire_rc_less_discount_tot_amount , fire_rc_policy.fire_rc_rate_after_discount , fire_rc_policy.fire_rc_cgst_rate_per , fire_rc_policy.fire_rc_cgst_tot_amount , fire_rc_policy.fire_rc_sgst_rate_per , fire_rc_policy.fire_rc_sgst_tot_amount , fire_rc_policy.fire_rc_final_payable_premium , fire_rc_policy.fire_rc_policy_status , fire_rc_policy.fire_rc_del_flag , fire_rc_policy.fire_rc_stfi_rate , fire_rc_policy.fire_rc_stfi_rate_total , fire_rc_policy.fire_rc_earthquake_rate , fire_rc_policy.fire_rc_earthquake_rate_total , fire_rc_policy.fire_rc_terrorisum_rate , fire_rc_policy.fire_rc_terrorisum_rate_total , fire_rc_policy.fire_rc_gross_premium", $whereArr = $whereArr_fire_rc, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$fire_rc_policy_list = $query["userData"];
				}
				// Fire RC Details End

				// Fire RC Details Start
				$bharat_fire_allied_perils_policy_details = array();
				if (!empty($policy_id)) {

					$whereArr_bharat_fire_allied_perils["bharat_fire_allied_perils_policy.fk_policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "bharat_fire_allied_perils_policy", $colNames = "bharat_fire_allied_perils_policy.fire_allied_perils_policy_id , bharat_fire_allied_perils_policy.fk_policy_id as allied_perils_fk_policy_id , bharat_fire_allied_perils_policy.allied_perils_total_sum_assured , bharat_fire_allied_perils_policy.allied_perils_fire_rate_per , bharat_fire_allied_perils_policy.allied_perils_fire_rate_tot_amount , bharat_fire_allied_perils_policy.allied_perils_less_discount_per , bharat_fire_allied_perils_policy.allied_perils_less_discount_tot_amount , bharat_fire_allied_perils_policy.allied_perils_fire_rate_after_discount , bharat_fire_allied_perils_policy.allied_perils_gross_premium , bharat_fire_allied_perils_policy.allied_perils_cgst_rate_per , bharat_fire_allied_perils_policy.allied_perils_cgst_tot_amount , bharat_fire_allied_perils_policy.allied_perils_sgst_rate_per , bharat_fire_allied_perils_policy.allied_perils_sgst_tot_amount , bharat_fire_allied_perils_policy.allied_perils_final_payable_premium , bharat_fire_allied_perils_policy.fire_allied_perils_policy_status , bharat_fire_allied_perils_policy.allied_perils_del_flag, bharat_fire_allied_perils_policy.allied_perils_stfi_rate, bharat_fire_allied_perils_policy.allied_perils_stfi_rate_total, bharat_fire_allied_perils_policy.allied_perils_earthquake_rate, bharat_fire_allied_perils_policy.allied_perils_earthquake_rate_total, bharat_fire_allied_perils_policy.allied_perils_terrorisum_rate, bharat_fire_allied_perils_policy.allied_perils_terrorisum_rate_total, bharat_fire_allied_perils_policy.tot_sum_devid", $whereArr = $whereArr_bharat_fire_allied_perils, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$bharat_fire_allied_perils_policy_details = $query["userData"];
				}
				// Fire RC Details End

				$this->db->trans_start();	//Start Transaction
				$add_arr[] = array(
					'policy_id' => $policy_id, //10
					'policy_counter' => $policy_counter,
					'serial_no_year' => $serial_no_year,
					'serial_no_month' => $serial_no_month,
					'serial_no' => $serial_no,
					'fk_company_id' => $fk_company_id,
					'fk_department_id' => $fk_department_id,
					'fk_policy_type_id' => $fk_policy_type_id,
					'fk_client_id' => $fk_client_id,
					'fk_cust_member_id' => $fk_cust_member_id,

					'fk_agency_id' => $fk_agency_id, //20
					'fk_sub_agent_id' => $fk_sub_agent_id,
					'policy_type' => $policy_type,
					'mode_of_premimum' => $mode_of_premimum,
					'date_from' => $date_from,
					'date_to' => $date_to,
					'payment_date_from' => $payment_date_from,
					'payment_date_to' => $payment_date_to,
					'policy_no' => $policy_no,
					'pre_year_policy_no' => $pre_year_policy_no,

					'date_commenced' => $date_commenced, //30
					'policy_upload' => $policy_upload,
					'dynamic_path' => $dynamic_path,
					'reg_mobile' => $reg_mobile,
					'reg_email' => $reg_email,
					'risk_details' => $risk_details,
					'risk_rc_details' => $risk_rc_details,
					'hypotication_details' => $hypotication_details,
					'correspondence_details' => $correspondence_details,
					'total_paymentacknowledge_data' => $total_paymentacknowledge_data,

					'family_size' => $family_size, //40
					'tpa_company' => $tpa_company,
					'addition_of_more_child' => $addition_of_more_child,
					'floater_policy_type' => $floater_policy_type,
					'restore_cover' => $restore_cover,
					'maternity_new_born_baby_cover' => $maternity_new_born_baby_cover,
					'daily_cash_allowance_cover' => $daily_cash_allowance_cover,
					'policy_member_status' => $policy_member_status,
					'del_flag' => $policy_member_del_flag,
					'plan_policy_commission' => $plan_policy_commission,

					'commission_rece_company' => $commission_rece_company, //50
					'commission_amt_rece_company' => $commission_amt_rece_company,
					'renewal_flag' => $renewal_flag,
					'commission_flag' => $commission_flag,
					'endorsment_flag' => $endorsment_flag,
					'claims_flag' => $claims_flag,
					'renewal_count' => $renewal_count,
					'claims_count' => $claims_count,
					'endorsment_count' => $endorsment_count,
					'commission_count' => $commission_count,

					'next_year_premium_flag' => $next_year_premium_flag, //60
					'current_sum_insured' => $current_sum_insured,
					'current_total_premium' => $current_total_premium,
					'basic_sum_insured' => $basic_sum_insured,
					'basic_gross_premium' => $basic_gross_premium,
					'renewal_letter_premium_flag' => $renewal_letter_premium_flag,
					'renewal_letter_premium_date' => date('Y-m-d'),
					'renewable_dump_flag' => $renewable_dump_flag,
					'riv' => $riv,
					'type_of_bussiness' => $type_of_bussiness,

					'description_of_stock' => $description_of_stock, //7
					'quotation_date' => $quotation_date,
					'quotation_upload' => $quotation_upload,
					'quotation_male_link' => $quotation_male_link,
					'member_name_arr' => $member_name_arr,
					'create_date' => $policy_member_create_date,
					'modify_dt' => $policy_member_modify_dt,
					"fk_staff_id" => $fk_staff_id,
					"fk_user_role_id" => $fk_user_role_id,
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "policy_member_details_dump", $add_arr, $return_type = "lastID");
				$dump_policy_id = $query["lastID"];

				if (!empty($dump_policy_id)) {

					$policy_remark_details = array();
					if (!empty($policy_id)) {
						$whereArr_policy_remark["policy_remark_details.fk_policy_id"] = $policy_id;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_remark_details", $colNames = "policy_remark_details.policy_remark_id , policy_remark_details.remarks , policy_remark_details.male_date , policy_remark_details.fk_policy_id , policy_remark_details.remark_status , policy_remark_details.del_flag as remark_del_flag", $whereArr = $whereArr_policy_remark, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
						$policy_remark_details = $query["userData"];
					}
					$result["policy_remark_arr"] = $policy_remark_details;
		
					//Policy Remark Details Start		
					// $policy_remark_id  = $result["policy_remark_id"];
					// $remarks = $result["remarks"];
					// $male_date = $result["male_date"];
					// $remark_status = $result["remark_status"];
					// $remark_del_flag = $result["remark_del_flag"];
					//Policy Remark Details End
		
					if (!empty($policy_remark_details)) {
						$counts = count($policy_remark_details);
						for ($i = 0; $i < $counts; $i++) {
							$add_remarks_arr[$i] = array(
								'remarks' => $policy_remark_details[$i]['remarks'],
								'male_date' => $policy_remark_details[$i]['male_date'],
								'fk_policy_id' => $policy_remark_details[$i]['fk_policy_id'],
								'fk_dump_policy_id' =>  $dump_policy_id,
								'remark_status' => $policy_remark_details[$i]['remark_status'],
								'del_flag' => $policy_remark_details[$i]['remark_del_flag'],
								'create_date' => date("Y-m-d h:i:s"),
								"fk_staff_id" => $fk_staff_id,
								"fk_user_role_id" => $fk_user_role_id,
							);
						}
						$query = $this->Mquery_model_v3->addQuery($tableName = "policy_remark_details_dump", $add_remarks_arr, $return_type = "lastID");
						$policy_remark_id = $query["lastID"];
					}
				}

				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Individual") { // Misslineous : Mediclaim Individual
					if ($policy_type != 3) {
						if ($policy_type_txt == "Individual") {
							if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd")) {
								if ($floater_policy_type == "Optima Restore") {

									if(!empty($medi_ind_hdfc_ergo_health_optima_restore_details)){
										$total_medi_ind_hdfc_json_data = $medi_ind_hdfc_ergo_health_optima_restore_details["total_medi_ind_hdfc_json_data"];
										$years_of_premium = $medi_ind_hdfc_ergo_health_optima_restore_details["years_of_premium"];
										$region = $medi_ind_hdfc_ergo_health_optima_restore_details["region"];
										$tot_premium = $medi_ind_hdfc_ergo_health_optima_restore_details["tot_premium"];
										$protect_ride_prem_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["protect_ride_prem_tot"];
										$hospital_daily_cash_prem_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["hospital_daily_cash_prem_tot"];
										$ipa_rider_prem_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["ipa_rider_prem_tot"];
										$load_desc = $medi_ind_hdfc_ergo_health_optima_restore_details["load_desc"];
										$load_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["load_tot"];
										$less_disc_per = $medi_ind_hdfc_ergo_health_optima_restore_details["less_disc_per"];
										$less_disc_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["less_disc_tot"];
										$family_disc_per = $medi_ind_hdfc_ergo_health_optima_restore_details["family_disc_per"];
										$family_disc_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["family_disc_tot"];
										$gross_premium_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_ind_hdfc_ergo_health_optima_restore_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_ind_hdfc_ergo_health_optima_restore_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_hdfc_ergo_health_optima_restore_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_hdfc_ergo_health_optima_restore_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_hdfc_ergo_health_optima_restore_details["medi_final_premium"];

										$add_medi_hdfc_ergo_health_insu_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_policy_dump", $add_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
										$medi_hdfc_ergo_health_insu_policy_id = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Energy") {
									if(!empty($medi_ind_hdfc_ergo_health_energy_details)){
										$total_energy_medi_hdfc_json_data = $medi_ind_hdfc_ergo_health_energy_details["total_energy_medi_hdfc_json_data"];
										$tot_premium = $medi_ind_hdfc_ergo_health_energy_details["tot_premium"];
										$less_disc_per = $medi_ind_hdfc_ergo_health_energy_details["less_disc_per"];
										$less_disc_tot = $medi_ind_hdfc_ergo_health_energy_details["less_disc_tot"];
										$load_desc = $medi_ind_hdfc_ergo_health_energy_details["load_desc"];
										$load_tot = $medi_ind_hdfc_ergo_health_energy_details["load_tot"];
										$gross_premium_tot = $medi_ind_hdfc_ergo_health_energy_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_ind_hdfc_ergo_health_energy_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_ind_hdfc_ergo_health_energy_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_hdfc_ergo_health_energy_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_hdfc_ergo_health_energy_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_hdfc_ergo_health_energy_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_hdfc_ergo_health_energy_details["medi_final_premium"];

										$add_energy_medi_hdfc_ergo_health_insu_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_energy_policy_dump", $add_energy_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
										$medi_hdfc_ergo_health_insu_energy_policy_id = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Health Suraksha") {
									if(!empty($medi_ind_hdfc_ergo_health_suraksha_details)){
										$total_suraksha_medi_hdfc_json_data = $medi_ind_hdfc_ergo_health_suraksha_details["total_suraksha_medi_hdfc_json_data"];
										$years_of_premium = $medi_ind_hdfc_ergo_health_suraksha_details["years_of_premium"];
										$region = $medi_ind_hdfc_ergo_health_suraksha_details["region"];
										$tot_premium = $medi_ind_hdfc_ergo_health_suraksha_details["tot_premium"];
										$load_desc = $medi_ind_hdfc_ergo_health_suraksha_details["load_desc"];
										$load_tot = $medi_ind_hdfc_ergo_health_suraksha_details["load_tot"];
										$less_disc_per = $medi_ind_hdfc_ergo_health_suraksha_details["less_disc_per"];
										$less_disc_tot = $medi_ind_hdfc_ergo_health_suraksha_details["less_disc_tot"];
										$family_disc_per = $medi_ind_hdfc_ergo_health_suraksha_details["family_disc_per"];
										$family_disc_tot = $medi_ind_hdfc_ergo_health_suraksha_details["family_disc_tot"];
										$gross_premium_tot = $medi_ind_hdfc_ergo_health_suraksha_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_ind_hdfc_ergo_health_suraksha_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_ind_hdfc_ergo_health_suraksha_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_hdfc_ergo_health_suraksha_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_hdfc_ergo_health_suraksha_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_hdfc_ergo_health_suraksha_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_hdfc_ergo_health_suraksha_details["medi_final_premium"];

										$add_suraksha_medi_hdfc_ergo_health_insu_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_policy_dump", $add_suraksha_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
										$medi_hdfc_ergo_health_insu_suraksha_policy_id = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Easy Health") {
									if(!empty($medi_ind_hdfc_ergo_health_easy_rate_details)){
										$total_easy_medi_hdfc_json_data = $medi_ind_hdfc_ergo_health_easy_rate_details["total_easy_medi_hdfc_json_data"];
										$years_of_premium = $medi_ind_hdfc_ergo_health_easy_rate_details["years_of_premium"];
										$region = $medi_ind_hdfc_ergo_health_easy_rate_details["region"];
										$tot_premium = $medi_ind_hdfc_ergo_health_easy_rate_details["tot_premium"];
										$protect_ride_prem_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["protect_ride_prem_tot"];
										$hospital_daily_cash_prem_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["hospital_daily_cash_prem_tot"];
										$ipa_rider_prem_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["ipa_rider_prem_tot"];
										$load_desc = $medi_ind_hdfc_ergo_health_easy_rate_details["load_desc"];
										$load_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["load_tot"];
										$less_disc_per = $medi_ind_hdfc_ergo_health_easy_rate_details["less_disc_per"];
										$tot_basic_prem = $medi_ind_hdfc_ergo_health_easy_rate_details["tot_basic_prem"];
										$less_disc_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["less_disc_tot"];
										$family_disc_per = $medi_ind_hdfc_ergo_health_easy_rate_details["family_disc_per"];
										$family_disc_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["family_disc_tot"];
										$gross_premium_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_ind_hdfc_ergo_health_easy_rate_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_ind_hdfc_ergo_health_easy_rate_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_hdfc_ergo_health_easy_rate_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_hdfc_ergo_health_easy_rate_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_hdfc_ergo_health_easy_rate_details["medi_final_premium"];

										$add_easy_rate_medi_hdfc_ergo_health_insu_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_policy_dump", $add_easy_rate_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
										$medi_hdfc_ergo_health_insu_easy_policy_id  = $query2["lastID"];
									}

								}
							} elseif ($company_txt == "The New India Assurance Co Ltd") {
								if ($floater_policy_type == "New India Mediclaim Policy 2017") {
									if(!empty($medi_ind_the_new_india_2017_assu_details)){
										$total_the_new_india_medi_tns_hdfc_json_data = $medi_ind_the_new_india_2017_assu_details["total_the_new_india_medi_tns_hdfc_json_data"];
										$tot_premium = $medi_ind_the_new_india_2017_assu_details["tot_premium"];
										$medi_cgst_rate = $medi_ind_the_new_india_2017_assu_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_the_new_india_2017_assu_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_the_new_india_2017_assu_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_the_new_india_2017_assu_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_the_new_india_2017_assu_details["medi_final_premium"];

										$add_the_new_india_medi_2017_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_medi_policy_2017_ind_assu_policy_dump", $add_the_new_india_medi_2017_policy_arr, $return_type = "lastID");
										$medi_insu_new_india_tns_assu_ind_policy_id = $query2["lastID"];
									}

								}
							} elseif (($company_txt == "Max Bupa Health Insurance Co Ltd") || ($company_txt == "Niva Bupa Health Insurance Co Ltd")) {
								if ($floater_policy_type == "Reassure") {
									if(!empty($medi_ind_max_bupa_health_reassure_details)){
										$total_max_bupa_medi_reassure_json_data = $medi_ind_max_bupa_health_reassure_details["total_max_bupa_medi_reassure_json_data"];
										$years_of_premium = $medi_ind_max_bupa_health_reassure_details["years_of_premium"];
										$region = $medi_ind_max_bupa_health_reassure_details["region"];
										$first_year_rate = $medi_ind_max_bupa_health_reassure_details["first_year_rate"];
										$second_year_rate = $medi_ind_max_bupa_health_reassure_details["second_year_rate"];
										$third_year_rate = $medi_ind_max_bupa_health_reassure_details["third_year_rate"];
										$first_year_tot = $medi_ind_max_bupa_health_reassure_details["first_year_tot"];
										$second_year_tot = $medi_ind_max_bupa_health_reassure_details["second_year_tot"];
										$third_year_tot = $medi_ind_max_bupa_health_reassure_details["third_year_tot"];
										$tot_term_disc = $medi_ind_max_bupa_health_reassure_details["tot_term_disc"];
										$tot_premium = $medi_ind_max_bupa_health_reassure_details["tot_premium"];
										$stand_instu_rate = $medi_ind_max_bupa_health_reassure_details["stand_instu_rate"];
										$stand_instu_tot = $medi_ind_max_bupa_health_reassure_details["stand_instu_tot"];
										$doctor_disc_per = $medi_ind_max_bupa_health_reassure_details["doctor_disc_per"];
										$doctor_disc_tot = $medi_ind_max_bupa_health_reassure_details["doctor_disc_tot"];
										$family_disc_per = $medi_ind_max_bupa_health_reassure_details["family_disc_per"];
										$family_disc_tot = $medi_ind_max_bupa_health_reassure_details["family_disc_tot"];
										$gross_premium_tot = $medi_ind_max_bupa_health_reassure_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_ind_max_bupa_health_reassure_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_ind_max_bupa_health_reassure_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_max_bupa_health_reassure_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_max_bupa_health_reassure_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_max_bupa_health_reassure_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_max_bupa_health_reassure_details["medi_final_premium"];

										$add_max_bupa_reassure_ind_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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

								}
							} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
								if ($floater_policy_type == "Red Carpet") {

									if(!empty($medi_ind_star_health_allied_red_carpet_details)){
										$total_star_health_red_carpet_medi_ind_json_data = $medi_ind_star_health_allied_red_carpet_details["total_star_health_red_carpet_medi_ind_json_data"];
										$years_of_premium = $medi_ind_star_health_allied_red_carpet_details["years_of_premium"];
										$tot_premium = $medi_ind_star_health_allied_red_carpet_details["tot_premium"];
										$medi_cgst_rate = $medi_ind_star_health_allied_red_carpet_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_star_health_allied_red_carpet_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_star_health_allied_red_carpet_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_star_health_allied_red_carpet_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_star_health_allied_red_carpet_details["medi_final_premium"];

										$add_star_health_red_carpet_ind_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_red_carpet_ind_policy_dump", $add_star_health_red_carpet_ind_policy_arr, $return_type = "lastID");
										$medi_star_health_ind_policy_id   = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Comprehensive"){

									if(!empty($medi_ind_star_health_allied_comprehensive_details)){
										$total_star_health_comprehensive_medi_ind_json_data = $medi_ind_star_health_allied_comprehensive_details["total_star_health_comprehensive_medi_ind_json_data"];
										$years_of_premium = $medi_ind_star_health_allied_comprehensive_details["years_of_premium"];
										$tot_premium = $medi_ind_star_health_allied_comprehensive_details["tot_premium"];
										$medi_cgst_rate = $medi_ind_star_health_allied_comprehensive_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_star_health_allied_comprehensive_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_star_health_allied_comprehensive_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_star_health_allied_comprehensive_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_star_health_allied_comprehensive_details["medi_final_premium"];

										$add_star_health_comprehensive_ind_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_comprehensive_ind_policy_dump", $add_star_health_comprehensive_ind_policy_arr, $return_type = "lastID");
										$medi_star_health_comp_ind_policy_id   = $query2["lastID"];
									}

								}
							} elseif ($company_txt == "United India Insurance Co Ltd") {
								if ($floater_policy_type == "Individual Health Insurance Policy") {

									if(!empty($medi_ind_uiic_individual_health_details)){
										$tot_mediclaim_json = $medi_ind_uiic_individual_health_details["tot_mediclaim_json"];
										$medi_total_ncd_amount = $medi_ind_uiic_individual_health_details["medi_total_ncd_amount"];
										$medi_total_amount = $medi_ind_uiic_individual_health_details["medi_total_amount"];
										$medi_family_disc_rate = $medi_ind_uiic_individual_health_details["medi_family_disc_rate"];
										$medi_family_disc_tot = $medi_ind_uiic_individual_health_details["medi_family_disc_tot"];
										$medi_premium_after_fd = $medi_ind_uiic_individual_health_details["medi_premium_after_fd"];
										$medi_cgst_rate = $medi_ind_uiic_individual_health_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_ind_uiic_individual_health_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_ind_uiic_individual_health_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_ind_uiic_individual_health_details["medi_sgst_tot"];
										$medi_final_premium = $medi_ind_uiic_individual_health_details["medi_final_premium"];

										$add_mediclaim_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'policy_name_txt' => $policy_name_txt,
											'tot_mediclaim_json' => $tot_mediclaim_json,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "mediclaim_policy_dump", $add_mediclaim_policy_arr, $return_type = "lastID");
										$mediclaim_policy_id = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Floater 2020(Individual)") {

									if(!empty($medi_ind_uiic_float2020_individual_details)){
										$tot_medi_ind2020_json = $medi_ind_uiic_float2020_individual_details["tot_medi_ind2020_json"];
										$medi_ind_2020_total_premium = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_total_premium"];
										$medi_ind_2020_family_descount_per = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_family_descount_per"];
										$medi_ind_2020_family_descount_tot = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_family_descount_tot"];
										$medi_ind_2020_load_description = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_load_description"];
										$medi_ind_2020_load_amount = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_load_amount"];
										$medi_ind_2020_restore_cover_premium = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_restore_cover_premium"];
										$medi_ind_2020_maternity_new_bornbaby = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_maternity_new_bornbaby"];
										$medi_ind_2020_daily_cash_allow_hosp = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_daily_cash_allow_hosp"];
										$medi_ind_2020_load_gross_premium = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_load_gross_premium"];
										$new_load_gross_premium = $medi_ind_uiic_float2020_individual_details["new_load_gross_premium"];
										$medi_ind_2020_cgst_rate = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_cgst_rate"];
										$medi_ind_2020_cgst_tot = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_cgst_tot"];
										$medi_ind_2020_sgst_rate = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_sgst_rate"];
										$medi_ind_2020_sgst_tot = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_sgst_tot"];
										$medi_ind_2020_final_premium = $medi_ind_uiic_float2020_individual_details["medi_ind_2020_final_premium"];

										$add_medi_ind2020_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'policy_name_txt' => $policy_name_txt,
											'tot_medi_ind2020_json' => $tot_medi_ind2020_json,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_ind2020_policy_dump", $add_medi_ind2020_policy_arr, $return_type = "lastID");
										$medi_ind2020_policy_id = $query2["lastID"];
									}

								}
							} elseif ($company_txt == "Care Health Insurance Co Ltd") {
								if ($floater_policy_type == "Care Advantage") {

									if(!empty($medi_ind_care_health_care_adv_details)){
										$total_care_adv_ind_json_data = $medi_ind_care_health_care_adv_details["total_care_adv_ind_json_data"];
										$medi_final_premium = $medi_ind_care_health_care_adv_details["medi_final_premium"];

										$add_care_adv_ind_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
											'policy_name_txt' => $policy_name_txt,
											'total_care_adv_ind_json_data' => $total_care_adv_ind_json_data,
											'medi_final_premium' => $medi_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_adv_ind_policy_dump", $add_care_adv_ind_policy_arr, $return_type = "lastID");
										$care_adv_ind_id  = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Care") {

									if(!empty($medi_ind_care_health_care_details)){
										$total_care_ind_json_data = $medi_ind_care_health_care_details["total_care_ind_json_data"];
										$medi_final_premium = $medi_ind_care_health_care_details["medi_final_premium"];

										$add_care_ind_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
											'policy_name_txt' => $policy_name_txt,
											'total_care_ind_json_data' => $total_care_ind_json_data,
											'medi_final_premium' => $medi_final_premium,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_ind_policy_dump", $add_care_ind_policy_arr, $return_type = "lastID");
										$care_ind_id  = $query2["lastID"];
									}

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

									if(!empty($medi_float_hdfc_ergo_health_optima_restore_details)){
										$total_medi_float_hdfc_json_data = $medi_float_hdfc_ergo_health_optima_restore_details["total_medi_float_hdfc_json_data"];
										$years_of_premium = $medi_float_hdfc_ergo_health_optima_restore_details["years_of_premium"];
										$region = $medi_float_hdfc_ergo_health_optima_restore_details["region"];
										$tot_premium = $medi_float_hdfc_ergo_health_optima_restore_details["tot_premium"];
										$hdfc_ergo_health_insu_child_count = $medi_float_hdfc_ergo_health_optima_restore_details["hdfc_ergo_health_insu_child_count"];
										$hdfc_ergo_health_insu_child_count_first_premium = $medi_float_hdfc_ergo_health_optima_restore_details["hdfc_ergo_health_insu_child_count_first_premium"];
										$hdfc_ergo_health_insu_child_total_premium = $medi_float_hdfc_ergo_health_optima_restore_details["hdfc_ergo_health_insu_child_total_premium"];
										$protect_ride_prem_tot = $medi_float_hdfc_ergo_health_optima_restore_details["protect_ride_prem_tot"];
										$hospital_daily_cash_prem_tot = $medi_float_hdfc_ergo_health_optima_restore_details["hospital_daily_cash_prem_tot"];
										$ipa_rider_prem_tot = $medi_float_hdfc_ergo_health_optima_restore_details["ipa_rider_prem_tot"];
										$load_desc = $medi_float_hdfc_ergo_health_optima_restore_details["load_desc"];
										$load_tot = $medi_float_hdfc_ergo_health_optima_restore_details["load_tot"];
										$less_disc_per = $medi_float_hdfc_ergo_health_optima_restore_details["less_disc_per"];
										$less_disc_tot = $medi_float_hdfc_ergo_health_optima_restore_details["less_disc_tot"];
										$stay_active_benefit = $medi_float_hdfc_ergo_health_optima_restore_details["stay_active_benefit"];
										$stay_active_benefit_prem_tot = $medi_float_hdfc_ergo_health_optima_restore_details["stay_active_benefit_prem_tot"];
										$gross_premium_tot = $medi_float_hdfc_ergo_health_optima_restore_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_float_hdfc_ergo_health_optima_restore_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_float_hdfc_ergo_health_optima_restore_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_float_hdfc_ergo_health_optima_restore_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_float_hdfc_ergo_health_optima_restore_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_float_hdfc_ergo_health_optima_restore_details["medi_sgst_tot"];
										$medi_final_premium = $medi_float_hdfc_ergo_health_optima_restore_details["medi_final_premium"];
										$max_age = $medi_float_hdfc_ergo_health_optima_restore_details["max_age"];

										$add_medi_hdfc_ergo_health_insu_float_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_float_policy_dump", $add_medi_hdfc_ergo_health_insu_float_policy_arr, $return_type = "lastID");
										$medi_hdfc_ergo_health_insu_float_policy_id = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Health Suraksha") {

									if(!empty($medi_float_hdfc_ergo_health_suraksha_details)){
										$total_suraksha_float_medi_hdfc_json_data = $medi_float_hdfc_ergo_health_suraksha_details["total_suraksha_float_medi_hdfc_json_data"];
										$years_of_premium = $medi_float_hdfc_ergo_health_suraksha_details["years_of_premium"];
										$region = $medi_float_hdfc_ergo_health_suraksha_details["region"];
										$tot_premium = $medi_float_hdfc_ergo_health_suraksha_details["tot_premium"];
										$hdfc_ergo_health_insu_child_count = $medi_float_hdfc_ergo_health_suraksha_details["hdfc_ergo_health_insu_child_count"];
										$hdfc_ergo_health_insu_child_count_first_premium = $medi_float_hdfc_ergo_health_suraksha_details["hdfc_ergo_health_insu_child_count_first_premium"];
										$hdfc_ergo_health_insu_child_total_premium = $medi_float_hdfc_ergo_health_suraksha_details["hdfc_ergo_health_insu_child_total_premium"];
										$load_desc = $medi_float_hdfc_ergo_health_suraksha_details["load_desc"];
										$load_tot = $medi_float_hdfc_ergo_health_suraksha_details["load_tot"];
										$less_disc_per = $medi_float_hdfc_ergo_health_suraksha_details["less_disc_per"];
										$less_disc_tot = $medi_float_hdfc_ergo_health_suraksha_details["less_disc_tot"];
										$gross_premium_tot = $medi_float_hdfc_ergo_health_suraksha_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_float_hdfc_ergo_health_suraksha_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_float_hdfc_ergo_health_suraksha_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_float_hdfc_ergo_health_suraksha_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_float_hdfc_ergo_health_suraksha_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_float_hdfc_ergo_health_suraksha_details["medi_sgst_tot"];
										$medi_final_premium = $medi_float_hdfc_ergo_health_suraksha_details["medi_final_premium"];
										$max_age = $medi_float_hdfc_ergo_health_suraksha_details["max_age"];

										$add_suraksha_float_medi_hdfc_ergo_health_insu_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_hdfc_ergo_health_insu_suraksha_floater_policy_dump", $add_suraksha_float_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
										$medi_hdfc_ergo_health_float_suraksha_policy_id = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Easy Health") {

									if(!empty($medi_float_hdfc_ergo_health_easy_rate_details)){
										$total_easy_float_medi_hdfc_json_data = $medi_float_hdfc_ergo_health_easy_rate_details["total_easy_float_medi_hdfc_json_data"];
										$years_of_premium = $medi_float_hdfc_ergo_health_easy_rate_details["years_of_premium"];
										$region = $medi_float_hdfc_ergo_health_easy_rate_details["region"];
										$tot_premium = $medi_float_hdfc_ergo_health_easy_rate_details["tot_premium"];
										$hdfc_ergo_health_insu_child_count = $medi_float_hdfc_ergo_health_easy_rate_details["hdfc_ergo_health_insu_child_count"];
										$hdfc_ergo_health_insu_child_count_first_premium = $medi_float_hdfc_ergo_health_easy_rate_details["hdfc_ergo_health_insu_child_count_first_premium"];
										$hdfc_ergo_health_insu_child_total_premium = $medi_float_hdfc_ergo_health_easy_rate_details["hdfc_ergo_health_insu_child_total_premium"];
										$protect_ride_prem_tot = $medi_float_hdfc_ergo_health_easy_rate_details["protect_ride_prem_tot"];
										$hospital_daily_cash_prem_tot = $medi_float_hdfc_ergo_health_easy_rate_details["hospital_daily_cash_prem_tot"];
										$ipa_rider_prem_tot = $medi_float_hdfc_ergo_health_easy_rate_details["ipa_rider_prem_tot"];
										$load_desc = $medi_float_hdfc_ergo_health_easy_rate_details["load_desc"];
										$load_tot = $medi_float_hdfc_ergo_health_easy_rate_details["load_tot"];
										$less_disc_per = $medi_float_hdfc_ergo_health_easy_rate_details["less_disc_per"];
										$tot_basic_prem = $medi_float_hdfc_ergo_health_easy_rate_details["tot_basic_prem"];
										$less_disc_tot = $medi_float_hdfc_ergo_health_easy_rate_details["less_disc_tot"];
										$stay_active_benefit = $medi_float_hdfc_ergo_health_easy_rate_details["stay_active_benefit"];
										$stay_active_benefit_prem = $medi_float_hdfc_ergo_health_easy_rate_details["stay_active_benefit_prem"];
										$gross_premium_tot = $medi_float_hdfc_ergo_health_easy_rate_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_float_hdfc_ergo_health_easy_rate_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_float_hdfc_ergo_health_easy_rate_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_float_hdfc_ergo_health_easy_rate_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_float_hdfc_ergo_health_easy_rate_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_float_hdfc_ergo_health_easy_rate_details["medi_sgst_tot"];
										$medi_final_premium = $medi_float_hdfc_ergo_health_easy_rate_details["medi_final_premium"];
										$max_age = $medi_float_hdfc_ergo_health_easy_rate_details["max_age"];

										$add_float_easy_rate_medi_hdfc_ergo_health_insu_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_easy_rate_card_float_policy_dump", $add_float_easy_rate_medi_hdfc_ergo_health_insu_policy_arr, $return_type = "lastID");
										$medi_hdfc_ergo_health_insu_easy_float_policy_id  = $query2["lastID"];
									}

								}
							} elseif ($company_txt == "The New India Assurance Co Ltd") {
								if ($floater_policy_type == "New India Floater Mediclaim") {

									if(!empty($medi_float_the_new_india_assu_details)){
										$total_the_new_india_medi_float_json_data = $medi_float_the_new_india_assu_details["total_the_new_india_medi_float_json_data"];
										$tot_premium = $medi_float_the_new_india_assu_details["tot_premium"];
										$floater_disc_rate = $medi_float_the_new_india_assu_details["floater_disc_rate"];
										$floater_disc_tot = $medi_float_the_new_india_assu_details["floater_disc_tot"];
										$gross_premium_tot = $medi_float_the_new_india_assu_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_float_the_new_india_assu_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_float_the_new_india_assu_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_float_the_new_india_assu_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_float_the_new_india_assu_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_float_the_new_india_assu_details["medi_sgst_tot"];
										$medi_final_premium = $medi_float_the_new_india_assu_details["medi_final_premium"];

										$add_the_new_india_medi_floater_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_medi_floater_assu_policy_dump", $add_the_new_india_medi_floater_policy_arr, $return_type = "lastID");
										$medi_new_india_assu_float_policy_id = $query2["lastID"];
									}

								}
							} elseif (($company_txt == "Max Bupa Health Insurance Co Ltd") || ($company_txt == "Niva Bupa Health Insurance Co Ltd")) {
								if ($floater_policy_type == "Reassure") {

									if(!empty($medi_float_max_bupa_health_reassure_details)){
										$total_max_bupa_medi_float_reassure_json_data = $medi_float_max_bupa_health_reassure_details["total_max_bupa_medi_float_reassure_json_data"];
										$years_of_premium = $medi_float_max_bupa_health_reassure_details["years_of_premium"];
										$region = $medi_float_max_bupa_health_reassure_details["region"];
										$first_year_rate = $medi_float_max_bupa_health_reassure_details["first_year_rate"];
										$second_year_rate = $medi_float_max_bupa_health_reassure_details["second_year_rate"];
										$third_year_rate = $medi_float_max_bupa_health_reassure_details["third_year_rate"];
										$first_year_tot = $medi_float_max_bupa_health_reassure_details["first_year_tot"];
										$second_year_tot = $medi_float_max_bupa_health_reassure_details["second_year_tot"];
										$third_year_tot = $medi_float_max_bupa_health_reassure_details["third_year_tot"];
										$tot_term_disc = $medi_float_max_bupa_health_reassure_details["tot_term_disc"];
										$tot_premium = $medi_float_max_bupa_health_reassure_details["tot_premium"];
										$stand_instu_rate = $medi_float_max_bupa_health_reassure_details["stand_instu_rate"];
										$stand_instu_tot = $medi_float_max_bupa_health_reassure_details["stand_instu_tot"];
										$doctor_disc_per = $medi_float_max_bupa_health_reassure_details["doctor_disc_per"];
										$doctor_disc_tot = $medi_float_max_bupa_health_reassure_details["doctor_disc_tot"];
										$gross_premium_tot = $medi_float_max_bupa_health_reassure_details["gross_premium_tot"];
										$gross_premium_tot_new = $medi_float_max_bupa_health_reassure_details["gross_premium_tot_new"];
										$medi_cgst_rate = $medi_float_max_bupa_health_reassure_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_float_max_bupa_health_reassure_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_float_max_bupa_health_reassure_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_float_max_bupa_health_reassure_details["medi_sgst_tot"];
										$medi_final_premium = $medi_float_max_bupa_health_reassure_details["medi_final_premium"];
										$max_age = $medi_float_max_bupa_health_reassure_details["max_age"];

										$add_max_bupa_reassure_float_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "max_bupa_reassure_floater_policy_dump", $add_max_bupa_reassure_float_policy_arr, $return_type = "lastID");
										$medi_max_bupa_reassure_float_policy_id  = $query2["lastID"];
									}

								}
							} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd") {
								if ($floater_policy_type == "Red Carpet") {

									if(!empty($medi_float_star_health_allied_red_carpet_details)){
										$total_star_health_red_carpet_medi_float_json_data = $medi_float_star_health_allied_red_carpet_details["total_star_health_red_carpet_medi_float_json_data"];
										$years_of_premium = $medi_float_star_health_allied_red_carpet_details["years_of_premium"];
										$tot_premium = $medi_float_star_health_allied_red_carpet_details["tot_premium"];
										$medi_cgst_rate = $medi_float_star_health_allied_red_carpet_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_float_star_health_allied_red_carpet_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_float_star_health_allied_red_carpet_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_float_star_health_allied_red_carpet_details["medi_sgst_tot"];
										$medi_final_premium = $medi_float_star_health_allied_red_carpet_details["medi_final_premium"];
										$max_age = $medi_float_star_health_allied_red_carpet_details["max_age"];

										$add_star_health_red_carpet_float_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query3 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_red_carpet_float_policy_dump", $add_star_health_red_carpet_float_policy_arr, $return_type = "lastID");
										$medi_star_health_float_policy_id  = $query3["lastID"];
									}

								} elseif ($floater_policy_type == "Comprehensive") {

									if(!empty($medi_float_star_health_allied_comprehensive_details)){
										$total_star_health_comprehensive_medi_float_json_data = $medi_float_star_health_allied_comprehensive_details["total_star_health_comprehensive_medi_float_json_data"];
										$years_of_premium = $medi_float_star_health_allied_comprehensive_details["years_of_premium"];
										$tot_premium = $medi_float_star_health_allied_comprehensive_details["tot_premium"];
										$medi_cgst_rate = $medi_float_star_health_allied_comprehensive_details["medi_cgst_rate"];
										$medi_cgst_tot = $medi_float_star_health_allied_comprehensive_details["medi_cgst_tot"];
										$medi_sgst_rate = $medi_float_star_health_allied_comprehensive_details["medi_sgst_rate"];
										$medi_sgst_tot = $medi_float_star_health_allied_comprehensive_details["medi_sgst_tot"];
										$medi_final_premium = $medi_float_star_health_allied_comprehensive_details["medi_final_premium"];
										$max_age = $medi_float_star_health_allied_comprehensive_details["max_age"];

										$add_star_health_comprehensive_float_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
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
										$query3 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_comprehensive_float_policy_dump", $add_star_health_comprehensive_float_policy_arr, $return_type = "lastID");
										$medi_star_health_comp_float_policy_id  = $query3["lastID"];
									}

								}
							} elseif ($company_txt == "United India Insurance Co Ltd") {
								if ($floater_policy_type == "Family Floater 2014") {

									if(!empty($medi_float_uiic_family_floater_2014_details)){
										$tot_medi_floater_2014_json = $medi_float_uiic_family_floater_2014_details["tot_medi_floater_2014_json"];
										$name_insured_sum_insured = $medi_float_uiic_family_floater_2014_details["name_insured_sum_insured"];
										$name_insured_premium = $medi_float_uiic_family_floater_2014_details["name_insured_premium"];
										$medi_float_2014_total_premium = $medi_float_uiic_family_floater_2014_details["medi_float_2014_total_premium"];
										$medi_float_2014_child_count = $medi_float_uiic_family_floater_2014_details["medi_float_2014_child_count"];
										$medi_float_2014_child_count_first_premium = $medi_float_uiic_family_floater_2014_details["medi_float_2014_child_count_first_premium"];
										$medi_float_2014_child_total_premium = $medi_float_uiic_family_floater_2014_details["medi_float_2014_child_total_premium"];
										$medi_float_2014_load_description = $medi_float_uiic_family_floater_2014_details["medi_float_2014_load_description"];
										$medi_float_2014_load_amount = $medi_float_uiic_family_floater_2014_details["medi_float_2014_load_amount"];
										$medi_float_2014_load_gross_premium = $medi_float_uiic_family_floater_2014_details["medi_float_2014_load_gross_premium"];
										$medi_float_2014_cgst_rate = $medi_float_uiic_family_floater_2014_details["medi_float_2014_cgst_rate"];
										$medi_float_2014_cgst_tot = $medi_float_uiic_family_floater_2014_details["medi_float_2014_cgst_tot"];
										$medi_float_2014_sgst_rate = $medi_float_uiic_family_floater_2014_details["medi_float_2014_sgst_rate"];
										$medi_float_2014_sgst_tot = $medi_float_uiic_family_floater_2014_details["medi_float_2014_sgst_tot"];
										$medi_float_2014_final_premium = $medi_float_uiic_family_floater_2014_details["medi_float_2014_final_premium"];
										$max_age = $medi_float_uiic_family_floater_2014_details["max_age"];

										$add_mediclaim_floater_2014_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'policy_name_txt' => $policy_name_txt,
											'tot_medi_floater_2014_json' => $tot_medi_floater_2014_json,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "mediclaim_floater_2014_policy_dump", $add_mediclaim_floater_2014_policy_arr, $return_type = "lastID");
										$medi_floater_2014_id = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Family Floater 2020") {

									if(!empty($medi_float_uiic_family_floater_2020_details)){
										$tot_medi_floater_2020_json = $medi_float_uiic_family_floater_2020_details["tot_medi_floater_2020_json"];
										$name_insured_sum_insured = $medi_float_uiic_family_floater_2020_details["name_insured_sum_insured"];
										$name_insured_premium = $medi_float_uiic_family_floater_2020_details["name_insured_premium"];
										$name_insured_ncd = $medi_float_uiic_family_floater_2020_details["name_insured_ncd"];
										$name_insured_premium_after_ncd = $medi_float_uiic_family_floater_2020_details["name_insured_premium_after_ncd"];
										$medi_float_2020_total_premium = $medi_float_uiic_family_floater_2020_details["medi_float_2020_total_premium"];
										$medi_float_2020_child_count = $medi_float_uiic_family_floater_2020_details["medi_float_2020_child_count"];
										$medi_float_2020_child_count_first_premium = $medi_float_uiic_family_floater_2020_details["medi_float_2020_child_count_first_premium"];
										$medi_float_2020_child_total_premium = $medi_float_uiic_family_floater_2020_details["medi_float_2020_child_total_premium"];
										$medi_float_2020_load_description = $medi_float_uiic_family_floater_2020_details["medi_float_2020_load_description"];
										$medi_float_2020_load_amount = $medi_float_uiic_family_floater_2020_details["medi_float_2020_load_amount"];
										$medi_float_2020_restore_cover_premium = $medi_float_uiic_family_floater_2020_details["medi_float_2020_restore_cover_premium"];
										$medi_float_2020_maternity_new_bornbaby = $medi_float_uiic_family_floater_2020_details["medi_float_2020_maternity_new_bornbaby"];
										$medi_float_2020_daily_cash_allow_hosp = $medi_float_uiic_family_floater_2020_details["medi_float_2020_daily_cash_allow_hosp"];
										$medi_float_2020_load_gross_premium = $medi_float_uiic_family_floater_2020_details["medi_float_2020_load_gross_premium"];
										$medi_float_2020_cgst_rate = $medi_float_uiic_family_floater_2020_details["medi_float_2020_cgst_rate"];
										$medi_float_2020_cgst_tot = $medi_float_uiic_family_floater_2020_details["medi_float_2020_cgst_tot"];
										$medi_float_2020_sgst_rate = $medi_float_uiic_family_floater_2020_details["medi_float_2020_sgst_rate"];
										$medi_float_2020_sgst_tot = $medi_float_uiic_family_floater_2020_details["medi_float_2020_sgst_tot"];
										$medi_float_2020_final_premium = $medi_float_uiic_family_floater_2020_details["medi_float_2020_final_premium"];
										$max_age = $medi_float_uiic_family_floater_2020_details["max_age"];

										$add_medi_floater_2020_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'policy_name_txt' => $policy_name_txt,
											'tot_medi_floater_2020_json' => $tot_medi_floater_2020_json,
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
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "medi_floater_2020_policy_dump", $add_medi_floater_2020_policy_arr, $return_type = "lastID");
										$medi_floater_2020_id = $query2["lastID"];
									}

								}
							} elseif ($company_txt == "Care Health Insurance Co Ltd") {
								if ($floater_policy_type == "Care Advantage") {

									if(!empty($medi_float_care_health_care_adv_details)){
										$total_care_adv_float_json_data = $medi_float_care_health_care_adv_details["total_care_adv_float_json_data"];
										$medi_final_premium = $medi_float_care_health_care_adv_details["medi_final_premium"];
										$max_age = $medi_float_care_health_care_adv_details["max_age"];

										$add_care_adv_float_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
											'policy_name_txt' => $policy_name_txt,
											'total_care_adv_float_json_data' => $total_care_adv_float_json_data,
											'medi_final_premium' => $medi_final_premium,
											'max_age' => $max_age,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_adv_float_policy_dump", $add_care_adv_float_policy_arr, $return_type = "lastID");
										$care_adv_float_id  = $query2["lastID"];
									}

								} elseif ($floater_policy_type == "Care") {

									if(!empty($medi_float_care_health_care_details)){
										$total_care_float_json_data = $medi_float_care_health_care_details["total_care_float_json_data"];
										$medi_final_premium = $medi_float_care_health_care_details["medi_final_premium"];
										$max_age = $medi_float_care_health_care_details["max_age"];

										$add_care_float_policy_arr[] = array(
											'fk_dump_policy_id' =>  $dump_policy_id,
											'fk_policy_id' => $policy_id,
											'fk_policy_type_id' => $fk_policy_type_id,
											'fk_company_id' => $fk_company_id,
											'fk_department_id' => $fk_department_id,
											'policy_name_txt' => $policy_name_txt,
											'total_care_float_json_data' => $total_care_float_json_data,
											'medi_final_premium' => $medi_final_premium,
											'max_age' => $max_age,
											'create_date' => date("Y-m-d h:i:s")
										);
										$query2 = $this->Mquery_model_v3->addQuery($tableName = "care_health_care_float_policy_dump", $add_care_float_policy_arr, $return_type = "lastID");
										$care_float_id  = $query2["lastID"];
									}

								}
							}
						}
					}
				}

				if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Individual") { // Misslineous : Mediclaim : Common Individual
					if ($policy_type != 3) {

						if(!empty($medi_common_ind_details)){
							$tot_commind_json_data = $medi_common_ind_details["tot_commind_json_data"];
							$comm_ind_total_amount = $medi_common_ind_details["comm_ind_total_amount"];
							$comm_ind_less_discount_rate = $medi_common_ind_details["comm_ind_less_discount_rate"];
							$comm_ind_less_discount_tot = $medi_common_ind_details["comm_ind_less_discount_tot"];
							$comm_ind_load_desc = $medi_common_ind_details["comm_ind_load_desc"];
							$comm_ind_load_tot = $medi_common_ind_details["comm_ind_load_tot"];
							$comm_ind_gross_premium = $medi_common_ind_details["comm_ind_gross_premium"];
							$comm_ind_gross_premium_new = $medi_common_ind_details["comm_ind_gross_premium_new"];
							$comm_ind_cgst_rate = $medi_common_ind_details["comm_ind_cgst_rate"];
							$comm_ind_cgst_tot = $medi_common_ind_details["comm_ind_cgst_tot"];
							$comm_ind_sgst_rate = $medi_common_ind_details["comm_ind_sgst_rate"];
							$comm_ind_sgst_tot = $medi_common_ind_details["comm_ind_sgst_tot"];
							$comm_ind_final_premium = $medi_common_ind_details["comm_ind_final_premium"];

							$add_common_ind_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
								'fk_company_id' => $fk_company_id,
								'fk_department_id' => $fk_department_id,
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
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_ind_policy_dump", $add_common_ind_policy_arr, $return_type = "lastID");
							$common_ind_policy_id = $query2["lastID"];
						}

					}
				}

				if (($policy_name_txt == "Mediclaim" || $policy_name_txt == "Cancer Plan" || $policy_name_txt == "Daily Cash" || $policy_name_txt == "Overseas Mediclaim" || $policy_name_txt == "Student Overseas Mediclaim" || $policy_name_txt == "Employment Overseas Mediclaim" || $policy_name_txt == "Personal Accident") && $policy_type_txt == "Common Floater") { // Misslineous : Mediclaim : Common Floater
					if ($policy_type != 3) {

						if(!empty($medi_common_floater_details)){
							$tot_commfloat_json_data = $medi_common_floater_details["tot_commfloat_json_data"];
							$comm_float_total_amount = $medi_common_floater_details["comm_float_total_amount"];
							$comm_float_less_discount_rate = $medi_common_floater_details["comm_float_less_discount_rate"];
							$comm_float_less_discount_tot = $medi_common_floater_details["comm_float_less_discount_tot"];
							$comm_float_load_desc = $medi_common_floater_details["comm_float_load_desc"];
							$comm_float_load_tot = $medi_common_floater_details["comm_float_load_tot"];
							$comm_float_gross_premium = $medi_common_floater_details["comm_float_gross_premium"];
							$comm_float_gross_premium_new = $medi_common_floater_details["comm_float_gross_premium_new"];
							$comm_float_cgst_rate = $medi_common_floater_details["comm_float_cgst_rate"];
							$comm_float_cgst_tot = $medi_common_floater_details["comm_float_cgst_tot"];
							$comm_float_sgst_rate = $medi_common_floater_details["comm_float_sgst_rate"];
							$comm_float_sgst_tot = $medi_common_floater_details["comm_float_sgst_tot"];
							$comm_float_final_premium = $medi_common_floater_details["comm_float_final_premium"];

							$add_common_float_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
								'fk_company_id' => $fk_company_id,
								'fk_department_id' => $fk_department_id,
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
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_float_policy_dump", $add_common_float_policy_arr, $return_type = "lastID");
							$common_float_policy_id = $query2["lastID"];
						}

					}
				}

				if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual")) { // Misslineous : Super Top Up :floater
					if ($policy_type != 3) {
						if ($policy_type_txt == "Individual" || $policy_type_txt == "Common Individual") {
							if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Individual") {

								if(!empty($supertopup_ind_hdfc_ergo_health_details)){
									$tot_supertopup_ind_hdfc_json = $supertopup_ind_hdfc_ergo_health_details["tot_supertopup_ind_hdfc_json"];
									$years_of_premium = $supertopup_ind_hdfc_ergo_health_details["years_of_premium"];
									$tot_premium = $supertopup_ind_hdfc_ergo_health_details["tot_premium"];
									$load_desc = $supertopup_ind_hdfc_ergo_health_details["load_desc"];
									$load_tot = $supertopup_ind_hdfc_ergo_health_details["load_tot"];
									$less_disc_per = $supertopup_ind_hdfc_ergo_health_details["less_disc_per"];
									$less_disc_tot = $supertopup_ind_hdfc_ergo_health_details["less_disc_tot"];
									$gross_premium_tot = $supertopup_ind_hdfc_ergo_health_details["gross_premium_tot"];
									$gross_premium_tot_new = $supertopup_ind_hdfc_ergo_health_details["gross_premium_tot_new"];
									$medi_cgst_rate = $supertopup_ind_hdfc_ergo_health_details["medi_cgst_rate"];
									$medi_cgst_tot = $supertopup_ind_hdfc_ergo_health_details["medi_cgst_tot"];
									$medi_sgst_rate = $supertopup_ind_hdfc_ergo_health_details["medi_sgst_rate"];
									$medi_sgst_tot = $supertopup_ind_hdfc_ergo_health_details["medi_sgst_tot"];
									$medi_final_premium = $supertopup_ind_hdfc_ergo_health_details["medi_final_premium"];

									$add_hdfc_ergo_supertopup_ind_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'fk_company_id' => $fk_company_id,
										'fk_department_id' => $fk_department_id,
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
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_super_topup_policy_dump", $add_hdfc_ergo_supertopup_ind_policy_arr, $return_type = "lastID");
									$supertopup_ind_policy_id = $query2["lastID"];
								}

							} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Individual") {

								if(!empty($supertopup_ind_the_new_india_assu_details)){
									$total_the_new_india_supertopup_ind_single_json_data = $supertopup_ind_the_new_india_assu_details["total_the_new_india_supertopup_ind_single_json_data"];
									$tot_premium = $supertopup_ind_the_new_india_assu_details["tot_premium"];
									$medi_cgst_rate = $supertopup_ind_the_new_india_assu_details["medi_cgst_rate"];
									$medi_cgst_tot = $supertopup_ind_the_new_india_assu_details["medi_cgst_tot"];
									$medi_sgst_rate = $supertopup_ind_the_new_india_assu_details["medi_sgst_rate"];
									$medi_sgst_tot = $supertopup_ind_the_new_india_assu_details["medi_sgst_tot"];
									$medi_final_premium = $supertopup_ind_the_new_india_assu_details["medi_final_premium"];

									$add_the_new_india_supertopup_ind_single_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'fk_company_id' => $fk_company_id,
										'fk_department_id' => $fk_department_id,
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
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_supertopup_ind_single_assu_policy_dump", $add_the_new_india_supertopup_ind_single_policy_arr, $return_type = "lastID");
									$the_new_india_supertopup_assu_ind_single_policy_id = $query2["lastID"];
								}

							} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Individual") {

								if(!empty($supertopup_ind_star_health_allied_details)){
									$total_star_health_supertopup_ind_json_data = $supertopup_ind_star_health_allied_details["total_star_health_supertopup_ind_json_data"];
									$tot_premium = $supertopup_ind_star_health_allied_details["tot_premium"];
									$medi_cgst_rate = $supertopup_ind_star_health_allied_details["medi_cgst_rate"];
									$medi_cgst_tot = $supertopup_ind_star_health_allied_details["medi_cgst_tot"];
									$medi_sgst_rate = $supertopup_ind_star_health_allied_details["medi_sgst_rate"];
									$medi_sgst_tot = $supertopup_ind_star_health_allied_details["medi_sgst_tot"];
									$medi_final_premium = $supertopup_ind_star_health_allied_details["medi_final_premium"];

									$add_star_health_supertopup_ind_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'fk_company_id' => $fk_company_id,
										'fk_department_id' => $fk_department_id,
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
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_supertopup_ind_policy_dump", $add_star_health_supertopup_ind_policy_arr, $return_type = "lastID");
									$medi_star_health_super_ind_policy_id = $query2["lastID"];
								}

							} else {

								if(!empty($supertopup_ind_uiic_details)){
									$tot_supertopup_ind_json = $supertopup_ind_uiic_details["tot_supertopup_ind_json"];
									$supertopup_ind_total_premium = $supertopup_ind_uiic_details["supertopup_ind_total_premium"];
									$supertopup_ind_load_description = $supertopup_ind_uiic_details["supertopup_ind_load_description"];
									$supertopup_ind_load_amount = $supertopup_ind_uiic_details["supertopup_ind_load_amount"];
									$supertopup_ind_load_gross_premium = $supertopup_ind_uiic_details["supertopup_ind_load_gross_premium"];
									$supertopup_ind_cgst_rate = $supertopup_ind_uiic_details["supertopup_ind_cgst_rate"];
									$supertopup_ind_cgst_tot = $supertopup_ind_uiic_details["supertopup_ind_cgst_tot"];
									$supertopup_ind_sgst_rate = $supertopup_ind_uiic_details["supertopup_ind_sgst_rate"];
									$supertopup_ind_sgst_tot = $supertopup_ind_uiic_details["supertopup_ind_sgst_tot"];
									$supertopup_ind_final_premium = $supertopup_ind_uiic_details["supertopup_ind_final_premium"];

									$add_supertopup_ind_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'policy_name_txt' => $policy_name_txt,
										'tot_supertopup_ind_json' => $tot_supertopup_ind_json,
										'supertopup_ind_total_premium' => $supertopup_ind_total_premium,
										'supertopup_ind_load_description' => $supertopup_ind_load_description,
										'supertopup_ind_load_amount' => $supertopup_ind_load_amount,
										'supertopup_ind_load_gross_premium' => $supertopup_ind_load_gross_premium,
										'supertopup_ind_cgst_rate' => $supertopup_ind_cgst_rate,
										'supertopup_ind_cgst_tot' => $supertopup_ind_cgst_tot,
										'supertopup_ind_sgst_rate' => $supertopup_ind_sgst_rate,
										'supertopup_ind_sgst_tot' => $supertopup_ind_sgst_tot,
										'supertopup_ind_final_premium' => $supertopup_ind_final_premium,
										'create_date' => date("Y-m-d h:i:s")
									);
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "supertopup_ind_policy_dump", $add_supertopup_ind_policy_arr, $return_type = "lastID");
									$supertopup_ind_policy_id = $query2["lastID"];
								}

							}
						}
					}
				}

				if (($policy_name_txt == "Super Top Up" || $policy_name_txt == "Top Up" || $policy_name_txt == "Critical illness") && ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater")) { // Misslineous : Super Top Up :floater
					if ($policy_type != 3) {
						if ($policy_type_txt == "Floater" || $policy_type_txt == "Common Floater") {
							if (($company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || $company_txt == "HDFC Ergo General Insurance Co Ltd") && $policy_type_txt == "Floater") {

								if(!empty($supertopup_float_hdfc_ergo_health_details)){
									$tot_supertopup_float_hdfc_json = $supertopup_float_hdfc_ergo_health_details["tot_supertopup_float_hdfc_json"];
									$years_of_premium = $supertopup_float_hdfc_ergo_health_details["years_of_premium"];
									$tot_premium = $supertopup_float_hdfc_ergo_health_details["tot_premium"];
									$load_desc = $supertopup_float_hdfc_ergo_health_details["load_desc"];
									$load_tot = $supertopup_float_hdfc_ergo_health_details["load_tot"];
									$less_disc_per = $supertopup_float_hdfc_ergo_health_details["less_disc_per"];
									$less_disc_tot = $supertopup_float_hdfc_ergo_health_details["less_disc_tot"];
									$gross_premium_tot = $supertopup_float_hdfc_ergo_health_details["gross_premium_tot"];
									$gross_premium_tot_new = $supertopup_float_hdfc_ergo_health_details["gross_premium_tot_new"];
									$medi_cgst_rate = $supertopup_float_hdfc_ergo_health_details["medi_cgst_rate"];
									$medi_cgst_tot = $supertopup_float_hdfc_ergo_health_details["medi_cgst_tot"];
									$medi_sgst_rate = $supertopup_float_hdfc_ergo_health_details["medi_sgst_rate"];
									$medi_sgst_tot = $supertopup_float_hdfc_ergo_health_details["medi_sgst_tot"];
									$medi_final_premium = $supertopup_float_hdfc_ergo_health_details["medi_final_premium"];
									$max_age = $supertopup_float_hdfc_ergo_health_details["max_age"];

									$add_hdfc_ergo_supertopup_float_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'fk_company_id' => $fk_company_id,
										'fk_department_id' => $fk_department_id,
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
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "hdfc_ergo_health_super_topup_floater_policy_dump", $add_hdfc_ergo_supertopup_float_policy_arr, $return_type = "lastID");
									$supertopup_float_policy_id = $query2["lastID"];
								}

							} elseif ($company_txt == "The New India Assurance Co Ltd" && $policy_type_txt == "Floater") {

								if(!empty($supertopup_float_the_new_india_assu_details)){
									$total_the_new_india_supertopup_ind_json_data = $supertopup_float_the_new_india_assu_details["total_the_new_india_supertopup_ind_json_data"];
									$tot_premium = $supertopup_float_the_new_india_assu_details["tot_premium"];
									$medi_cgst_rate = $supertopup_float_the_new_india_assu_details["medi_cgst_rate"];
									$medi_cgst_tot = $supertopup_float_the_new_india_assu_details["medi_cgst_tot"];
									$medi_sgst_rate = $supertopup_float_the_new_india_assu_details["medi_sgst_rate"];
									$medi_sgst_tot = $supertopup_float_the_new_india_assu_details["medi_sgst_tot"];
									$medi_final_premium = $supertopup_float_the_new_india_assu_details["medi_final_premium"];

									$add_the_new_india_supertopup_ind_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'fk_company_id' => $fk_company_id,
										'fk_department_id' => $fk_department_id,
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
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "the_new_india_supertopup_ind_assu_policy_dump", $add_the_new_india_supertopup_ind_policy_arr, $return_type = "lastID");
									$the_new_india_supertopup_assu_ind_policy_id = $query2["lastID"];
								}

							} elseif ($company_txt == "Star Health & Allied Insurance Co Ltd" && $policy_type_txt == "Floater") {

								if(!empty($supertopup_float_star_health_allied_details)){
									$total_star_health_supertopup_float_json_data = $supertopup_float_star_health_allied_details["total_star_health_supertopup_float_json_data"];
									$tot_premium = $supertopup_float_star_health_allied_details["tot_premium"];
									$medi_cgst_rate = $supertopup_float_star_health_allied_details["medi_cgst_rate"];
									$medi_cgst_tot = $supertopup_float_star_health_allied_details["medi_cgst_tot"];
									$medi_sgst_rate = $supertopup_float_star_health_allied_details["medi_sgst_rate"];
									$medi_sgst_tot = $supertopup_float_star_health_allied_details["medi_sgst_tot"];
									$medi_final_premium = $supertopup_float_star_health_allied_details["medi_final_premium"];
									$max_age = $supertopup_float_star_health_allied_details["max_age"];

									$add_star_health_supertopup_float_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'fk_company_id' => $fk_company_id,
										'fk_department_id' => $fk_department_id,
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

									$query2 = $this->Mquery_model_v3->addQuery($tableName = "star_health_allied_insu_supertopup_float_policy_dump", $add_star_health_supertopup_float_policy_arr, $return_type = "lastID");
									$medi_star_health_super_float_policy_id = $query2["lastID"];
								}

							} else {

								if(!empty($supertopup_float_uiic_details)){
									$tot_supertopup_floater_json = $supertopup_float_uiic_details["tot_supertopup_floater_json"];
									$name_insured_policy_option = $supertopup_float_uiic_details["name_insured_policy_option"];
									$name_insured_deductable_thershold = $supertopup_float_uiic_details["name_insured_deductable_thershold"];
									$name_insured_sum_insured = $supertopup_float_uiic_details["name_insured_sum_insured"];
									$name_insured_premium = $supertopup_float_uiic_details["name_insured_premium"];
									$supertopup_floater_total_premium = $supertopup_float_uiic_details["supertopup_floater_total_premium"];
									$supertopup_floater_load_description = $supertopup_float_uiic_details["supertopup_floater_load_description"];
									$supertopup_floater_load_amount = $supertopup_float_uiic_details["supertopup_floater_load_amount"];
									$supertopup_floater_load_gross_premium = $supertopup_float_uiic_details["supertopup_floater_load_gross_premium"];
									$supertopup_floater_cgst_rate = $supertopup_float_uiic_details["supertopup_floater_cgst_rate"];
									$supertopup_floater_cgst_tot = $supertopup_float_uiic_details["supertopup_floater_cgst_tot"];
									$supertopup_floater_sgst_rate = $supertopup_float_uiic_details["supertopup_floater_sgst_rate"];
									$supertopup_floater_sgst_tot = $supertopup_float_uiic_details["supertopup_floater_sgst_tot"];
									$supertopup_floater_final_premium = $supertopup_float_uiic_details["supertopup_floater_final_premium"];
									$max_age = $supertopup_float_uiic_details["max_age"];

									$add_supertopup_floater_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'policy_name_txt' => $policy_name_txt,
										'tot_supertopup_floater_json' => $tot_supertopup_floater_json,
										'name_insured_policy_option' => $name_insured_policy_option,
										'name_insured_deductable_thershold' => $name_insured_deductable_thershold,
										'name_insured_sum_insured' => $name_insured_sum_insured,
										'name_insured_premium' => $name_insured_premium,
										'supertopup_floater_total_premium' => $supertopup_floater_total_premium,
										'supertopup_floater_load_description' => $supertopup_floater_load_description,
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
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "super_top_up_floater_policy_dump", $add_supertopup_floater_policy_arr, $return_type = "lastID");
									$supertopup_floater_policy_id = $query2["lastID"];
								}

							}
						}
					}
				}

				if ($policy_name_txt == "Bharat Sookshma Udyam") {
					if ($policy_type != 3) {

						//Bharat Sookshma Udyam Details Start
						$total_sum_assured = $result["total_sum_assured"];
						$fire_rate_per = $result["fire_rate_per"];
						$fire_rate_tot_amount = $result["fire_rate_tot_amount"];
						$less_discount_per = $result["less_discount_per"];
						$less_discount_tot_amount = $result["less_discount_tot_amount"];
						$fire_rate_after_discount = $result["fire_rate_after_discount"];
						$gross_premium = $result["gross_premium"];
						$cgst_rate_per = $result["cgst_rate_per"];
						$cgst_tot_amount = $result["cgst_tot_amount"];
						$sgst_rate_per = $result["sgst_rate_per"];
						$sgst_tot_amount = $result["sgst_tot_amount"];
						$final_payable_premium = $result["final_payable_premium"];
						//Bharat Sookshma Udyam Details End

						$add_sookshma_fire_policy_arr[] = array(
							'fk_dump_policy_id' =>  $dump_policy_id,
							'fk_policy_id' => $policy_id,
							'total_sum_assured' => $total_sum_assured,
							'fire_rate_per' => $fire_rate_per,
							'fire_rate_tot_amount' => $fire_rate_tot_amount,
							'less_discount_per' => $less_discount_per,
							'less_discount_tot_amount' => $less_discount_tot_amount,
							'fire_rate_after_discount' => $fire_rate_after_discount,
							'gross_premium' => $gross_premium,
							'cgst_rate_per' => $cgst_rate_per,
							'cgst_tot_amount' => $cgst_tot_amount,
							'sgst_rate_per' => $sgst_rate_per,
							'sgst_tot_amount' => $sgst_tot_amount,
							'final_payable_premium' => $final_payable_premium,
							'create_date' => date("Y-m-d h:i:s")
						);
						$query2 = $this->Mquery_model_v3->addQuery($tableName = "sookshma_fire_policy_dump", $add_sookshma_fire_policy_arr, $return_type = "lastID");
						$sookshma_fire_policy_id = $query2["lastID"];

					}
				} elseif ($policy_name_txt == "Bharat Laghu Udyam") {
					if ($policy_type != 3) {

						//Bharat Laghu Udyam Details Start
						$laghu_total_sum_assured = $result["laghu_total_sum_assured"];
						$laghu_fire_rate_per = $result["laghu_fire_rate_per"];
						$laghu_fire_rate_tot_amount = $result["laghu_fire_rate_tot_amount"];
						$laghu_less_discount_per = $result["laghu_less_discount_per"];
						$laghu_less_discount_tot_amount = $result["laghu_less_discount_tot_amount"];
						$laghu_fire_rate_after_discount = $result["laghu_fire_rate_after_discount"];
						$laghu_gross_premium = $result["laghu_gross_premium"];
						$laghu_cgst_rate_per = $result["laghu_cgst_rate_per"];
						$laghu_cgst_tot_amount = $result["laghu_cgst_tot_amount"];
						$laghu_sgst_rate_per = $result["laghu_sgst_rate_per"];
						$laghu_sgst_tot_amount = $result["laghu_sgst_tot_amount"];
						$laghu_final_payable_premium = $result["laghu_final_payable_premium"];
						//Bharat Laghu Udyam Details End

						$add_laghu_fire_policy_arr[] = array(
							'fk_dump_policy_id' =>  $dump_policy_id,
							'fk_policy_id' => $policy_id,
							'total_sum_assured' => $laghu_total_sum_assured,
							'fire_rate_per' => $laghu_fire_rate_per,
							'fire_rate_tot_amount' => $laghu_fire_rate_tot_amount,
							'less_discount_per' => $laghu_less_discount_per,
							'less_discount_tot_amount' => $laghu_less_discount_tot_amount,
							'fire_rate_after_discount' => $laghu_fire_rate_after_discount,
							'gross_premium' => $laghu_gross_premium,
							'cgst_rate_per' => $laghu_cgst_rate_per,
							'cgst_tot_amount' => $laghu_cgst_tot_amount,
							'sgst_rate_per' => $laghu_sgst_rate_per,
							'sgst_tot_amount' => $laghu_sgst_tot_amount,
							'final_payable_premium' => $laghu_final_payable_premium,
							'create_date' => date("Y-m-d h:i:s")
						);
						$query2 = $this->Mquery_model_v3->addQuery($tableName = "laghu_fire_policy_dump", $add_laghu_fire_policy_arr, $return_type = "lastID");
						$laghu_fire_policy_id = $query2["lastID"];

					}
				} elseif ($policy_name_txt == "Bharat Griha Raksha") {
					if ($policy_type != 3) {

						//Bharat Griha Raksha Details Start
						$griharaksha_total_sum_assured = $result["griharaksha_total_sum_assured"];
						$griharaksha_fire_rate_per = $result["griharaksha_fire_rate_per"];
						$griharaksha_fire_rate_tot_amount = $result["griharaksha_fire_rate_tot_amount"];
						$griharaksha_less_discount_per = $result["griharaksha_less_discount_per"];
						$griharaksha_less_discount_tot_amount = $result["griharaksha_less_discount_tot_amount"];
						$griharaksha_fire_rate_after_discount = $result["griharaksha_fire_rate_after_discount"];
						$griharaksha_gross_premium = $result["griharaksha_gross_premium"];
						$griharaksha_cgst_rate_per = $result["griharaksha_cgst_rate_per"];
						$griharaksha_cgst_tot_amount = $result["griharaksha_cgst_tot_amount"];
						$griharaksha_sgst_rate_per = $result["griharaksha_sgst_rate_per"];
						$griharaksha_sgst_tot_amount = $result["griharaksha_sgst_tot_amount"];
						$griharaksha_final_payable_premium = $result["griharaksha_final_payable_premium"];
						//Bharat Griha Raksha Details End

						$add_griharaksha_fire_policy_arr[] = array(
							'fk_dump_policy_id' =>  $dump_policy_id,
							'fk_policy_id' => $policy_id,
							'total_sum_assured' => $griharaksha_total_sum_assured,
							'fire_rate_per' => $griharaksha_fire_rate_per,
							'fire_rate_tot_amount' => $griharaksha_fire_rate_tot_amount,
							'less_discount_per' => $griharaksha_less_discount_per,
							'less_discount_tot_amount' => $griharaksha_less_discount_tot_amount,
							'fire_rate_after_discount' => $griharaksha_fire_rate_after_discount,
							'gross_premium' => $griharaksha_gross_premium,
							'cgst_rate_per' => $griharaksha_cgst_rate_per,
							'cgst_tot_amount' => $griharaksha_cgst_tot_amount,
							'sgst_rate_per' => $griharaksha_sgst_rate_per,
							'sgst_tot_amount' => $griharaksha_sgst_tot_amount,
							'final_payable_premium' => $griharaksha_final_payable_premium,
							'create_date' => date("Y-m-d h:i:s")
						);
						$query2 = $this->Mquery_model_v3->addQuery($tableName = "griharaksha_fire_policy_dump", $add_griharaksha_fire_policy_arr, $return_type = "lastID");
						$griharaksha_fire_policy_id = $query2["lastID"];

					}
				} elseif ($policy_name_txt == "Standard Fire & Allied Perils") {
					if ($policy_type != 3) {

						if(!empty($bharat_fire_allied_perils_policy_details)){
							//Standard Fire & Allied Perils Details Start
							$allied_perils_total_sum_assured = $bharat_fire_allied_perils_policy_details["allied_perils_total_sum_assured"];
							$allied_perils_fire_rate_per = $bharat_fire_allied_perils_policy_details["allied_perils_fire_rate_per"];
							$allied_perils_fire_rate_tot_amount = $bharat_fire_allied_perils_policy_details["allied_perils_fire_rate_tot_amount"];
							$allied_perils_less_discount_per = $bharat_fire_allied_perils_policy_details["allied_perils_less_discount_per"];
							$allied_perils_less_discount_tot_amount = $bharat_fire_allied_perils_policy_details["allied_perils_less_discount_tot_amount"];
							$allied_perils_fire_rate_after_discount = $bharat_fire_allied_perils_policy_details["allied_perils_fire_rate_after_discount"];
							$allied_perils_gross_premium = $bharat_fire_allied_perils_policy_details["allied_perils_gross_premium"];
							$allied_perils_cgst_rate_per = $bharat_fire_allied_perils_policy_details["allied_perils_cgst_rate_per"];
							$allied_perils_cgst_tot_amount = $bharat_fire_allied_perils_policy_details["allied_perils_cgst_tot_amount"];
							$allied_perils_sgst_rate_per = $bharat_fire_allied_perils_policy_details["allied_perils_sgst_rate_per"];
							$allied_perils_sgst_tot_amount = $bharat_fire_allied_perils_policy_details["allied_perils_sgst_tot_amount"];
							$allied_perils_final_payable_premium = $bharat_fire_allied_perils_policy_details["allied_perils_final_payable_premium"];
							$allied_perils_stfi_rate = $bharat_fire_allied_perils_policy_details["allied_perils_stfi_rate"];
							$allied_perils_stfi_rate_total = $bharat_fire_allied_perils_policy_details["allied_perils_stfi_rate_total"];
							$allied_perils_earthquake_rate = $bharat_fire_allied_perils_policy_details["allied_perils_earthquake_rate"];
							$allied_perils_earthquake_rate_total = $bharat_fire_allied_perils_policy_details["allied_perils_earthquake_rate_total"];
							$allied_perils_terrorisum_rate = $bharat_fire_allied_perils_policy_details["allied_perils_terrorisum_rate"];
							$allied_perils_terrorisum_rate_total = $bharat_fire_allied_perils_policy_details["allied_perils_terrorisum_rate_total"];
							$tot_sum_devid = $bharat_fire_allied_perils_policy_details["tot_sum_devid"];
							//Standard Fire & Allied Perils Details End

							$add_bharat_fire_allied_perils_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'allied_perils_total_sum_assured' => $allied_perils_total_sum_assured,
								'allied_perils_fire_rate_per' => $allied_perils_fire_rate_per,
								'allied_perils_fire_rate_tot_amount' => $allied_perils_fire_rate_tot_amount,
								'allied_perils_less_discount_per' => $allied_perils_less_discount_per,
								'allied_perils_less_discount_tot_amount' => $allied_perils_less_discount_tot_amount,
								'allied_perils_fire_rate_after_discount' => $allied_perils_fire_rate_after_discount,
								'allied_perils_gross_premium' => $allied_perils_gross_premium,
								'allied_perils_cgst_rate_per' => $allied_perils_cgst_rate_per,
								'allied_perils_cgst_tot_amount' => $allied_perils_cgst_tot_amount,
								'allied_perils_sgst_rate_per' => $allied_perils_sgst_rate_per,
								'allied_perils_sgst_tot_amount' => $allied_perils_sgst_tot_amount,
								'allied_perils_final_payable_premium' => $allied_perils_final_payable_premium,
								'allied_perils_stfi_rate' => $allied_perils_stfi_rate,
								'allied_perils_stfi_rate_total' => $allied_perils_stfi_rate_total,
								'allied_perils_earthquake_rate' => $allied_perils_earthquake_rate,
								'allied_perils_earthquake_rate_total' => $allied_perils_earthquake_rate_total,
								'allied_perils_terrorisum_rate' => $allied_perils_terrorisum_rate,
								'allied_perils_terrorisum_rate_total' => $allied_perils_terrorisum_rate_total,
								'tot_sum_devid' => $tot_sum_devid,
								'create_date' => date("Y-m-d h:i:s")
							);
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "bharat_fire_allied_perils_policy_dump", $add_bharat_fire_allied_perils_policy_arr, $return_type = "lastID");
							$fire_allied_perils_policy_id = $query2["lastID"];
						}

					}
				} elseif ($policy_name_txt == "Burglary") {
					if ($policy_type != 3) {

						//Burglary Details Start
						$burglary_total_sum_assured = $result["burglary_total_sum_assured"];
						$burglary_fire_rate_per = $result["burglary_fire_rate_per"];
						$burglary_fire_rate_tot_amount = $result["burglary_fire_rate_tot_amount"];
						$burglary_less_discount_per = $result["burglary_less_discount_per"];
						$burglary_less_discount_tot_amount = $result["burglary_less_discount_tot_amount"];
						$burglary_fire_rate_after_discount = $result["burglary_fire_rate_after_discount"];
						$burglary_gross_premium = $result["burglary_gross_premium"];
						$burglary_cgst_rate_per = $result["burglary_cgst_rate_per"];
						$burglary_cgst_tot_amount = $result["burglary_cgst_tot_amount"];
						$burglary_sgst_rate_per = $result["burglary_sgst_rate_per"];
						$burglary_sgst_tot_amount = $result["burglary_sgst_tot_amount"];
						$burglary_final_payable_premium = $result["burglary_final_payable_premium"];
						//Burglary Details End

						$add_burglary_policy_arr[] = array(
							'fk_dump_policy_id' =>  $dump_policy_id,
							'fk_policy_id' => $policy_id,
							'burglary_total_sum_assured' => $burglary_total_sum_assured,
							'burglary_fire_rate_per' => $burglary_fire_rate_per,
							'burglary_fire_rate_tot_amount' => $burglary_fire_rate_tot_amount,
							'burglary_less_discount_per' => $burglary_less_discount_per,
							'burglary_less_discount_tot_amount' => $burglary_less_discount_tot_amount,
							'burglary_fire_rate_after_discount' => $burglary_fire_rate_after_discount,
							'burglary_gross_premium' => $burglary_gross_premium,
							'burglary_cgst_rate_per' => $burglary_cgst_rate_per,
							'burglary_cgst_tot_amount' => $burglary_cgst_tot_amount,
							'burglary_sgst_rate_per' => $burglary_sgst_rate_per,
							'burglary_sgst_tot_amount' => $burglary_sgst_tot_amount,
							'burglary_final_payable_premium' => $burglary_final_payable_premium,
							'create_date' => date("Y-m-d h:i:s")
						);
						$query2 = $this->Mquery_model_v3->addQuery($tableName = "burglary_policy_dump", $add_burglary_policy_arr, $return_type = "lastID");
						$burglary_policy_id = $query2["lastID"];

					}
				}elseif ($policy_name_txt == "Term Plan") {
					if ($policy_type != 3) {

						if(!empty($term_plan_policy_details)){
							//Life Insurence : Term Plan Details Start
							$term_plan_policy = $term_plan_policy_details["term_plan_policy"];
							$term_plan_premium_paying_term = $term_plan_policy_details["term_plan_premium_paying_term"];
							$term_plan_total_sum_insured = $term_plan_policy_details["term_plan_total_sum_insured"];
							$term_plan_basic_premium = $term_plan_policy_details["term_plan_basic_premium"];
							$term_plan_add_loading = $term_plan_policy_details["term_plan_add_loading"];
							$term_plan_loading_description = $term_plan_policy_details["term_plan_loading_description"];
							$term_plan_premium_after_loading = $term_plan_policy_details["term_plan_premium_after_loading"];
							$term_plan_cgst = $term_plan_policy_details["term_plan_cgst"];
							$term_plan_sgst = $term_plan_policy_details["term_plan_sgst"];
							$term_plan_cgst_tot_ammount = $term_plan_policy_details["term_plan_cgst_tot_ammount"];
							$term_plan_sgst_tot_ammount = $term_plan_policy_details["term_plan_sgst_tot_ammount"];
							$term_plan_final_paybal_premium = $term_plan_policy_details["term_plan_final_paybal_premium"];
							//Life Insurence : Term Plan Details End

							$add_term_plan_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
								'term_plan_policy' => $term_plan_policy,
								'term_plan_premium_paying_term' => $term_plan_premium_paying_term,
								'term_plan_total_sum_insured' => $term_plan_total_sum_insured,
								'term_plan_basic_premium' => $term_plan_basic_premium,
								'term_plan_add_loading' => $term_plan_add_loading,
								'term_plan_loading_description' => $term_plan_loading_description,
								'term_plan_premium_after_loading' => $term_plan_premium_after_loading,
								'term_plan_cgst' => $term_plan_cgst,
								'term_plan_sgst' => $term_plan_sgst,
								'term_plan_cgst_tot_ammount' => $term_plan_cgst_tot_ammount,
								'term_plan_sgst_tot_ammount' => $term_plan_sgst_tot_ammount,
								'term_plan_final_paybal_premium' => $term_plan_final_paybal_premium,
								'create_date' => date("Y-m-d h:i:s")
							);
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "term_plan_policy_dump", $add_term_plan_policy_arr, $return_type = "lastID");
							$burglary_policy_id = $query2["lastID"];
						}

					}
				} elseif ($policy_name_txt == "Shopkeeper") {
					if ($policy_type != 3) {
						if(!empty($shopkeeper_policy_detals)){
							//Shopkeeper:misleneous Details Start
							$shopkeeper_risk_address = $shopkeeper_policy_detals["shopkeeper_risk_address"];
							$fire_sum_insured_1 = $shopkeeper_policy_detals["fire_sum_insured_1"];
							$fire_sum_insured_2 = $shopkeeper_policy_detals["fire_sum_insured_2"];
							$fire_sum_insured_3 = $shopkeeper_policy_detals["fire_sum_insured_3"];
							$fire_rate_1 = $shopkeeper_policy_detals["fire_rate_1"];
							$fire_rate_2 = $shopkeeper_policy_detals["fire_rate_2"];
							$fire_rate_3 = $shopkeeper_policy_detals["fire_rate_3"];
							$fire_premium_1 = $shopkeeper_policy_detals["fire_premium_1"];
							$fire_premium_2 = $shopkeeper_policy_detals["fire_premium_2"];
							$fire_premium_3 = $shopkeeper_policy_detals["fire_premium_3"];

							$burglary_sum_insured_1 = $shopkeeper_policy_detals["burglary_sum_insured_1"];
							$burglary_sum_insured_2 = $shopkeeper_policy_detals["burglary_sum_insured_2"];
							$burglary_sum_insured_3 = $shopkeeper_policy_detals["burglary_sum_insured_3"];
							$burglary_rate_1 = $shopkeeper_policy_detals["burglary_rate_1"];
							$burglary_rate_2 = $shopkeeper_policy_detals["burglary_rate_2"];
							$burglary_rate_3 = $shopkeeper_policy_detals["burglary_rate_3"];
							$burglary_premium_1 = $shopkeeper_policy_detals["burglary_premium_1"];
							$burglary_premium_2 = $shopkeeper_policy_detals["burglary_premium_2"];
							$burglary_premium_3 = $shopkeeper_policy_detals["burglary_premium_3"];

							$money_insu_sum_insured_1 = $shopkeeper_policy_detals["money_insu_sum_insured_1"];
							$money_insu_sum_insured_2 = $shopkeeper_policy_detals["money_insu_sum_insured_2"];
							$money_insu_sum_insured_3 = $shopkeeper_policy_detals["money_insu_sum_insured_3"];
							$money_insu_rate_1 = $shopkeeper_policy_detals["money_insu_rate_1"];
							$money_insu_rate_2 = $shopkeeper_policy_detals["money_insu_rate_2"];
							$money_insu_rate_3 = $shopkeeper_policy_detals["money_insu_rate_3"];
							$money_insu_premium_1 = $shopkeeper_policy_detals["money_insu_premium_1"];
							$money_insu_premium_2 = $shopkeeper_policy_detals["money_insu_premium_2"];
							$money_insu_premium_3 = $shopkeeper_policy_detals["money_insu_premium_3"];

							$plate_glass_sum_insured = $shopkeeper_policy_detals["plate_glass_sum_insured"];
							$plate_glass_rate_per = $shopkeeper_policy_detals["plate_glass_rate_per"];
							$plate_glass_premium = $shopkeeper_policy_detals["plate_glass_premium"];

							$neon_glow_sum_insured = $shopkeeper_policy_detals["neon_glow_sum_insured"];
							$neon_glow_rate_per = $shopkeeper_policy_detals["neon_glow_rate_per"];
							$neon_glow_premium = $shopkeeper_policy_detals["neon_glow_premium"];

							$baggage_ins_sum_insured = $shopkeeper_policy_detals["baggage_ins_sum_insured"];
							$baggage_ins_rate_per = $shopkeeper_policy_detals["baggage_ins_rate_per"];
							$baggage_ins_premium = $shopkeeper_policy_detals["baggage_ins_premium"];

							$personal_accident_json = $shopkeeper_policy_detals["personal_accident_json"];
							$personal_accident_sum_insured = $shopkeeper_policy_detals["personal_accident_sum_insured"];
							$personal_accident_rate_per = $shopkeeper_policy_detals["personal_accident_rate_per"];
							$personal_accident_premium = $shopkeeper_policy_detals["personal_accident_premium"];

							$fidelity_gaur_json = $shopkeeper_policy_detals["fidelity_gaur_json"];
							$fidelity_gaur_sum_insured = $shopkeeper_policy_detals["fidelity_gaur_sum_insured"];
							$fidelity_gaur_rate_per = $shopkeeper_policy_detals["fidelity_gaur_rate_per"];
							$fidelity_gaur_premium = $shopkeeper_policy_detals["fidelity_gaur_premium"];
							
							$pub_libility_sum_insured = $shopkeeper_policy_detals["pub_libility_sum_insured"];
							$work_men_compens_sum_insured = $shopkeeper_policy_detals["work_men_compens_sum_insured"];
							$pub_libility_rate = $shopkeeper_policy_detals["pub_libility_rate"];
							$work_men_compens_rate = $shopkeeper_policy_detals["work_men_compens_rate"];
							$pub_libility_premium = $shopkeeper_policy_detals["pub_libility_premium"];
							$work_men_compens_premium = $shopkeeper_policy_detals["work_men_compens_premium"];

							$bus_inter_sum_insured_1 = $shopkeeper_policy_detals["bus_inter_sum_insured_1"];
							$bus_inter_sum_insured_2 = $shopkeeper_policy_detals["bus_inter_sum_insured_2"];
							$bus_inter_sum_insured_3 = $shopkeeper_policy_detals["bus_inter_sum_insured_3"];
							$bus_inter_rate_1 = $shopkeeper_policy_detals["bus_inter_rate_1"];
							$bus_inter_rate_2 = $shopkeeper_policy_detals["bus_inter_rate_2"];
							$bus_inter_rate_3 = $shopkeeper_policy_detals["bus_inter_rate_3"];
							$bus_inter_premium_1 = $shopkeeper_policy_detals["bus_inter_premium_1"];
							$bus_inter_premium_2 = $shopkeeper_policy_detals["bus_inter_premium_2"];
							$bus_inter_premium_3 = $shopkeeper_policy_detals["bus_inter_premium_3"];

							$shopkeeper_total_sum_assured = $shopkeeper_policy_detals["shopkeeper_total_sum_assured"];
							$shopkeeper_total_premium = $shopkeeper_policy_detals["shopkeeper_total_premium"];
							$shopkeeper_less_discount_per = $shopkeeper_policy_detals["shopkeeper_less_discount_per"];
							$shopkeeper_less_discount_tot = $shopkeeper_policy_detals["shopkeeper_less_discount_tot"];
							$shopkeeper_fire_rate_after_discount_tot = $shopkeeper_policy_detals["shopkeeper_fire_rate_after_discount_tot"];
							$shopkeeper_cgst_fire_per = $shopkeeper_policy_detals["shopkeeper_cgst_fire_per"];
							$shopkeeper_cgst_fire_tot = $shopkeeper_policy_detals["shopkeeper_cgst_fire_tot"];
							$shopkeeper_sgst_fire_per = $shopkeeper_policy_detals["shopkeeper_sgst_fire_per"];
							$shopkeeper_sgst_fire_tot = $shopkeeper_policy_detals["shopkeeper_sgst_fire_tot"];
							$shopkeeper_final_paybal_premium = $shopkeeper_policy_detals["shopkeeper_final_paybal_premium"];
							//Shopkeeper:misleneous Details End

							$add_shopkeeper_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
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
		
								'personal_accident_json' => $personal_accident_json,
								'personal_accident_sum_insured' => $personal_accident_sum_insured,
								'personal_accident_rate_per' => $personal_accident_rate_per,
								'personal_accident_premium' => $personal_accident_premium,
		
								'fidelity_gaur_json' => $fidelity_gaur_json,
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
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "shopkeeper_policy_dump", $add_shopkeeper_policy_arr, $return_type = "lastID");
							$shopkeeper_policy_id = $query2["lastID"];
						}

					}
				} elseif ($policy_name_txt == "Jweller Block") {
					if ($policy_type != 3) {

						if(!empty($jweller_policy_details)){
							//Jweller Block:misleneous Details Start
							$stock_premises_sum_insu_1 = $jweller_policy_details["stock_premises_sum_insu_1"];
							$stock_premises_sum_insu_2 = $jweller_policy_details["stock_premises_sum_insu_2"];
							$stock_premises_sum_insu_3 = $jweller_policy_details["stock_premises_sum_insu_3"];
							$stock_premises_sum_insu_4 = $jweller_policy_details["stock_premises_sum_insu_4"];
							$stock_premises_sum_insu_5 = $jweller_policy_details["stock_premises_sum_insu_5"];
							$stock_premises_sum_insu_6 = $jweller_policy_details["stock_premises_sum_insu_6"];
							$stock_premises_premium_1 = $jweller_policy_details["stock_premises_premium_1"];
							$stock_premises_premium_2 = $jweller_policy_details["stock_premises_premium_2"];

							$stock_custody_sum_insu_1 = $jweller_policy_details["stock_custody_sum_insu_1"];
							$stock_custody_sum_insu_2 = $jweller_policy_details["stock_custody_sum_insu_2"];
							$stock_custody_sum_insu_3 = $jweller_policy_details["stock_custody_sum_insu_3"];
							$stock_custody_sum_insu_4 = $jweller_policy_details["stock_custody_sum_insu_4"];
							$stock_custody_premium_1 = $jweller_policy_details["stock_custody_premium_1"];
							$stock_custody_premium_2 = $jweller_policy_details["stock_custody_premium_2"];

							$stock_transit_sum_insu_1 = $jweller_policy_details["stock_transit_sum_insu_1"];
							$stock_transit_sum_insu_2 = $jweller_policy_details["stock_transit_sum_insu_2"];
							$stock_transit_sum_insu_3 = $jweller_policy_details["stock_transit_sum_insu_3"];
							$stock_transit_sum_insu_4 = $jweller_policy_details["stock_transit_sum_insu_4"];
							$stock_transit_premium = $jweller_policy_details["stock_transit_premium"];

							$standard_fire_perils_1 = $jweller_policy_details["standard_fire_perils_1"];
							$standard_fire_perils_2 = $jweller_policy_details["standard_fire_perils_2"];
							$standard_fire_perils_3 = $jweller_policy_details["standard_fire_perils_3"];
							$standard_fire_perils_4 = $jweller_policy_details["standard_fire_perils_4"];
							$standard_fire_perils_5 = $jweller_policy_details["standard_fire_perils_5"];
							$standard_fire_perils_6 = $jweller_policy_details["standard_fire_perils_6"];
							$standard_fire_perils_premium_1 = $jweller_policy_details["standard_fire_perils_premium_1"];
							$standard_fire_perils_premium_2 = $jweller_policy_details["standard_fire_perils_premium_2"];
							$standard_fire_perils_premium_3 = $jweller_policy_details["standard_fire_perils_premium_3"];

							$content_burglary_sum_insu = $jweller_policy_details["content_burglary_sum_insu"];
							$content_burglary_premium = $jweller_policy_details["content_burglary_premium"];

							$stock_exhibition_sum_insu = $jweller_policy_details["stock_exhibition_sum_insu"];
							$stock_exhibition_premium = $jweller_policy_details["stock_exhibition_premium"];

							$fidelity_guar_cover_sum_insu_1 = $jweller_policy_details["fidelity_guar_cover_sum_insu_1"];
							$fidelity_guar_cover_premium_1 = $jweller_policy_details["fidelity_guar_cover_premium_1"];
							$total_fidelity_guar_cover_json = $jweller_policy_details["total_fidelity_guar_cover_json"];

							$plate_glass_sum_insu = $jweller_policy_details["plate_glass_sum_insu"];
							$plate_glass_premium = $jweller_policy_details["plate_glass_premium"];

							$neon_sign_sum_insu = $jweller_policy_details["neon_sign_sum_insu"];
							$neon_sign_premium = $jweller_policy_details["neon_sign_premium"];

							$portable_equipmets_sum_insu = $jweller_policy_details["portable_equipmets_sum_insu"];
							$portable_equipmets_premium = $jweller_policy_details["portable_equipmets_premium"];

							$employee_compensation_sum_insu_1 = $jweller_policy_details["employee_compensation_sum_insu_1"];
							$employee_compensation_sum_insu_2 = $jweller_policy_details["employee_compensation_sum_insu_2"];
							$employee_compensation_premium = $jweller_policy_details["employee_compensation_premium"];

							$electronic_equipment_sum_insu = $jweller_policy_details["electronic_equipment_sum_insu"];
							$electronic_equipment_premium = $jweller_policy_details["electronic_equipment_premium"];

							$public_liability_sum_insu = $jweller_policy_details["public_liability_sum_insu"];
							$public_liability_premium = $jweller_policy_details["public_liability_premium"];

							$money_transit_sum_insu = $jweller_policy_details["money_transit_sum_insu"];
							$money_transit_premium = $jweller_policy_details["money_transit_premium"];

							$machinery_breakdown_sum_insu = $jweller_policy_details["machinery_breakdown_sum_insu"];
							$machinery_breakdown_premium = $jweller_policy_details["machinery_breakdown_premium"];

							$jweller_less_discount = $jweller_policy_details["jweller_less_discount"];
							$jweller_total_sum_assured = $jweller_policy_details["jweller_total_sum_assured"];
							$jweller_less_discount_tot = $jweller_policy_details["jweller_less_discount_tot"];
							$jweller_after_discount_tot = $jweller_policy_details["jweller_after_discount_tot"];
							$jweller_terrorism_per = $jweller_policy_details["jweller_terrorism_per"];
							$jweller_terrorism_per_tot = $jweller_policy_details["jweller_terrorism_per_tot"];
							$jweller_tot_net_premium = $jweller_policy_details["jweller_tot_net_premium"];
							$jweller_cgst_per = $jweller_policy_details["jweller_cgst_per"];
							$jweller_sgst_per = $jweller_policy_details["jweller_sgst_per"];
							$jweller_cgst_per_tot = $jweller_policy_details["jweller_cgst_per_tot"];
							$jweller_sgst_per_tot = $jweller_policy_details["jweller_sgst_per_tot"];
							$jweller_final_payble = $jweller_policy_details["jweller_final_payble"];
							//Jweller Block:misleneous Details End

							$add_jweller_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
		
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
								'total_fidelity_guar_cover_json' => $total_fidelity_guar_cover_json,
		
								'plate_glass_sum_insu' => $plate_glass_sum_insu,
								'plate_glass_premium' => $plate_glass_premium,
		
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
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "jweller_policy_dump", $add_jweller_policy_arr, $return_type = "lastID");
							$jweller_policy_id = $query2["lastID"];
						}

					}
				} elseif ($policy_name_txt == "Open Policy" || $policy_name_txt == "Stop Policy" || $policy_name_txt == "Specific Policy") { 
					if ($policy_type != 3) {

						if(!empty($marine_policy_details)){
							// Marine : Open Policy/STop Policy/Specific Policy Details Start
							$from_destination = $marine_policy_details["from_destination"];
							$to_destination = $marine_policy_details["to_destination"];
							$coverage_type = $marine_policy_details["coverage_type"];
							$marine_description = $marine_policy_details["marine_description"];
							$interest_insured = $marine_policy_details["interest_insured"];
							$group_name_address = $marine_policy_details["group_name_address"];
							$marine_sum_insured = $marine_policy_details["marine_sum_insured"];
							$packing_stand_customary = $marine_policy_details["packing_stand_customary"];
							$total_marine_cc_json = $marine_policy_details["total_marine_cc_json"];
							$business_description = $marine_policy_details["business_description"];
							$voyage_domestic_purchase = $marine_policy_details["voyage_domestic_purchase"];
							$voyage_international_purchase = $marine_policy_details["voyage_international_purchase"];

							$voyage_domestic_sales = $marine_policy_details["voyage_domestic_sales"];
							$voyage_export_sales = $marine_policy_details["voyage_export_sales"];
							$voyage_job_worker = $marine_policy_details["voyage_job_worker"];
							$voyage_domestic_fini_good = $marine_policy_details["voyage_domestic_fini_good"];
							$voyage_export_fini_good = $marine_policy_details["voyage_export_fini_good"];
							$voyage_domestic_purch_return = $marine_policy_details["voyage_domestic_purch_return"];
							$voyage_export_purch_return = $marine_policy_details["voyage_export_purch_return"];
							$voyage_sales_return = $marine_policy_details["voyage_sales_return"];

							$domestic_purch = $marine_policy_details["domestic_purch"];
							$international_purch = $marine_policy_details["international_purch"];
							$domestic_sale = $marine_policy_details["domestic_sale"];
							$export_sale = $marine_policy_details["export_sale"];
							$per_bottom_limit = $marine_policy_details["per_bottom_limit"];
							$per_location_limit = $marine_policy_details["per_location_limit"];
							$per_claim_excess = $marine_policy_details["per_claim_excess"];
							$declaration_sale_fig = $marine_policy_details["declaration_sale_fig"];

							$annual_turn_over = $marine_policy_details["annual_turn_over"];
							$tot_sum_insured = $marine_policy_details["tot_sum_insured"];
							$rate_applied = $marine_policy_details["rate_applied"];
							$rate_applied_per = $marine_policy_details["rate_applied_per"];
							$rate_applied_hidden = $marine_policy_details["rate_applied_hidden"];
							$marine_cgst_per = $marine_policy_details["marine_cgst_per"];
							$marine_sgst_per = $marine_policy_details["marine_sgst_per"];
							$cgst_rate_tot = $marine_policy_details["cgst_rate_tot"];
							$sgst_rate_tot = $marine_policy_details["sgst_rate_tot"];
							$marine_final_payble_premium = $marine_policy_details["marine_final_payble_premium"];
							// Marine : Open Policy/STop Policy/Specific Policy Details End

							$add_marine_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
								'policy_name_txt' => $policy_name_txt,
		
								'from_destination' => $from_destination,
								'to_destination' => $to_destination,
								'coverage_type' => $coverage_type,
								'marine_description' => $marine_description,
								'interest_insured' => $interest_insured,
								'group_name_address' => $group_name_address,
								'marine_sum_insured' => $marine_sum_insured,
								'packing_stand_customary' => $packing_stand_customary,
								'total_marine_cc_json' => $total_marine_cc_json,
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
		
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "marine_policy_dump", $add_marine_policy_arr, $return_type = "lastID");
							$burglary_policy_id = $query2["lastID"];
						}

					}
				} elseif ($policy_name_txt == "GMC") {
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
						if ($policy_type != 3) {

							if(!empty($gmc_ind_policy_details)){
								// GMC:misleneous Details Start
								$tot_gmc_json_data = $gmc_ind_policy_details["tot_gmc_json_data"];
								$gmc_family_size = $gmc_ind_policy_details["gmc_family_size"];
								$gmc_tot_sum_insured = $gmc_ind_policy_details["gmc_tot_sum_insured"];
								// GMC:misleneous Details End

								$add_gmc_policy_arr[] = array(
									'fk_dump_policy_id' =>  $dump_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $fk_policy_type_id,
									'fk_company_id' => $fk_company_id,
									'fk_department_id' => $fk_department_id,
									'policy_name_txt' => $policy_name_txt,
									'tot_gmc_json_data' => $tot_gmc_json_data,
									'gmc_family_size' => $gmc_family_size,
									'gmc_tot_sum_insured' => $gmc_tot_sum_insured,
									'create_date' => date("Y-m-d h:i:s")
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "gmc_policy_dump", $add_gmc_policy_arr, $return_type = "lastID");
								$gmc_policy_id = $query2["lastID"];
							}

						}
					}
				} elseif ($policy_name_txt == "GPA") { 
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater" || $policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater") {
						if ($policy_type != 3) {

							if(!empty($gpa_ind_policy_details)){
								// GPA:misleneous Details Start
								$tot_gpa_json_data = $gpa_ind_policy_details["tot_gpa_json_data"];
								$gpa_family_size = $gpa_ind_policy_details["gpa_family_size"];
								$gpa_tot_sum_insured = $gpa_ind_policy_details["gpa_tot_sum_insured"];
								// GPA:misleneous Details End

								$add_gmc_policy_arr[] = array(
									'fk_dump_policy_id' =>  $dump_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $fk_policy_type_id,
									'fk_company_id' => $fk_company_id,
									'fk_department_id' => $fk_department_id,
									'policy_name_txt' => $policy_name_txt,
									'tot_gpa_json_data' => $tot_gpa_json_data,
									'gpa_family_size' => $gpa_family_size,
									'gpa_tot_sum_insured' => $gpa_tot_sum_insured,
									'create_date' => date("Y-m-d h:i:s")
								);
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "gpa_policy_dump", $add_gmc_policy_arr, $return_type = "lastID");
								$gpa_policy_id = $query2["lastID"];
							}

						}
					}
				} elseif ($policy_name_txt == "Personal Accident") { 
					if ($policy_type_txt == "Individual" || $policy_type_txt == "Floater") {
						if ($policy_type != 3) {

							if(!empty($ind_personal_accident_policy_details)){
								// Personal Accident:misleneous Details Start
								$total_pa_ind_json_data = $ind_personal_accident_policy_details["total_pa_ind_json_data"];
								$tot_premium = $ind_personal_accident_policy_details["tot_premium"];
								$less_disc_rate = $ind_personal_accident_policy_details["less_disc_rate"];
								$less_disc_tot = $ind_personal_accident_policy_details["less_disc_tot"];
								$gross_premium = $ind_personal_accident_policy_details["gross_premium"];
								$gross_premium_new = $ind_personal_accident_policy_details["gross_premium_new"];
								$medi_cgst_rate = $ind_personal_accident_policy_details["medi_cgst_rate"];
								$medi_cgst_tot = $ind_personal_accident_policy_details["medi_cgst_tot"];
								$medi_sgst_rate = $ind_personal_accident_policy_details["medi_sgst_rate"];
								$medi_sgst_tot = $ind_personal_accident_policy_details["medi_sgst_tot"];
								$medi_final_premium = $ind_personal_accident_policy_details["medi_final_premium"];
								// Personal Accident:misleneous Details End

								$add_personal_accident_ind_policy_arr[] = array(
									'fk_dump_policy_id' =>  $dump_policy_id,
									'fk_policy_id' => $policy_id,
									'fk_policy_type_id' => $fk_policy_type_id,
									'fk_company_id' => $fk_company_id,
									'fk_department_id' => $fk_department_id,
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
								$query2 = $this->Mquery_model_v3->addQuery($tableName = "personal_accident_ind_policy_dump", $add_personal_accident_ind_policy_arr, $return_type = "lastID");
								$paccident_policy_id  = $query2["lastID"];
							}

						}
					} 
					// elseif ($policy_type_txt == "Common Individual") {
					// 	if ($policy_type != 3) {

					// 		//Personal Accident:misleneous: Common Individual Details Start
					// 		$tot_commind_json_data = $result["tot_commind_json_data"];
					// 		$comm_ind_total_amount = $result["comm_ind_total_amount"];
					// 		$comm_ind_less_discount_rate = $result["comm_ind_less_discount_rate"];
					// 		$comm_ind_less_discount_tot = $result["comm_ind_less_discount_tot"];
					// 		$comm_ind_load_desc = $result["comm_ind_load_desc"];
					// 		$comm_ind_load_tot = $result["comm_ind_load_tot"];
					// 		$comm_ind_gross_premium = $result["comm_ind_gross_premium"];
					// 		$comm_ind_gross_premium_new = $result["comm_ind_gross_premium_new"];
					// 		$comm_ind_cgst_rate = $result["comm_ind_cgst_rate"];
					// 		$comm_ind_cgst_tot = $result["comm_ind_cgst_tot"];
					// 		$comm_ind_sgst_rate = $result["comm_ind_sgst_rate"];
					// 		$comm_ind_sgst_tot = $result["comm_ind_sgst_tot"];
					// 		$comm_ind_final_premium = $result["comm_ind_final_premium"];
					// 		//Personal Accident:misleneous: Common Individual Details End

					// 		$add_common_ind_policy_arr[] = array(
					// 			'fk_dump_policy_id' =>  $dump_policy_id,
					// 			'fk_policy_id' => $policy_id,
					// 			'fk_policy_type_id' => $fk_policy_type_id,
					// 			'fk_company_id' => $fk_company_id,
					// 			'fk_department_id' => $fk_department_id,
					// 			'policy_name_txt' => $policy_name_txt,
					// 			'tot_commind_json_data' => $tot_commind_json_data,
					// 			'comm_ind_total_amount' => $comm_ind_total_amount,
					// 			'comm_ind_less_discount_rate' => $comm_ind_less_discount_rate,
					// 			'comm_ind_less_discount_tot' => $comm_ind_less_discount_tot,
					// 			'comm_ind_load_desc' => $comm_ind_load_desc,
					// 			'comm_ind_load_tot' => $comm_ind_load_tot,
					// 			'comm_ind_gross_premium' => $comm_ind_gross_premium,
					// 			'comm_ind_gross_premium_new' => $comm_ind_gross_premium_new,
					// 			'comm_ind_cgst_rate' => $comm_ind_cgst_rate,
					// 			'comm_ind_cgst_tot' => $comm_ind_cgst_tot,
					// 			'comm_ind_sgst_rate' => $comm_ind_sgst_rate,
					// 			'comm_ind_sgst_tot' => $comm_ind_sgst_tot,
					// 			'comm_ind_final_premium' => $comm_ind_final_premium,
					// 			'create_date' => date("Y-m-d h:i:s")
					// 		);
	
					// 		$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_ind_policy", $add_common_ind_policy_arr, $return_type = "lastID");
					// 		$common_ind_policy_id = $query2["lastID"];

					// 	}
					// } elseif ($policy_type_txt == "Common Floater") {
					// 	if ($policy_type != 3) {

					// 		//Personal Accident:misleneous: Common Floater Details Start
					// 		$tot_commfloat_json_data = $result["tot_commfloat_json_data"];
					// 		$comm_float_total_amount = $result["comm_float_total_amount"];
					// 		$comm_float_less_discount_rate = $result["comm_float_less_discount_rate"];
					// 		$comm_float_less_discount_tot = $result["comm_float_less_discount_tot"];
					// 		$comm_float_load_desc = $result["comm_float_load_desc"];
					// 		$comm_float_load_tot = $result["comm_float_load_tot"];
					// 		$comm_float_gross_premium = $result["comm_float_gross_premium"];
					// 		$comm_float_gross_premium_new = $result["comm_float_gross_premium_new"];
					// 		$comm_float_cgst_rate = $result["comm_float_cgst_rate"];
					// 		$comm_float_cgst_tot = $result["comm_float_cgst_tot"];
					// 		$comm_float_sgst_rate = $result["comm_float_sgst_rate"];
					// 		$comm_float_sgst_tot = $result["comm_float_sgst_tot"];
					// 		$comm_float_final_premium = $result["comm_float_final_premium"];
					// 		//Personal Accident:misleneous: Common Floater Details End

					// 		$add_common_float_policy_arr[] = array(
					// 			'fk_dump_policy_id' =>  $dump_policy_id,
					// 			'fk_policy_id' => $policy_id,
					// 			'fk_policy_type_id' => $fk_policy_type_id,
					// 			'fk_company_id' => $fk_company_id,
					// 			'fk_department_id' => $fk_department_id,
					// 			'policy_name_txt' => $policy_name_txt,
					// 			'tot_commfloat_json_data' => $tot_commfloat_json_data,
					// 			'comm_float_total_amount' => $comm_float_total_amount,
					// 			'comm_float_less_discount_rate' => $comm_float_less_discount_rate,
					// 			'comm_float_less_discount_tot' => $comm_float_less_discount_tot,
					// 			'comm_float_load_desc' => $comm_float_load_desc,
					// 			'comm_float_load_tot' => $comm_float_load_tot,
					// 			'comm_float_gross_premium' => $comm_float_gross_premium,
					// 			'comm_float_gross_premium_new' => $comm_float_gross_premium_new,
					// 			'comm_float_cgst_rate' => $comm_float_cgst_rate,
					// 			'comm_float_cgst_tot' => $comm_float_cgst_tot,
					// 			'comm_float_sgst_rate' => $comm_float_sgst_rate,
					// 			'comm_float_sgst_tot' => $comm_float_sgst_tot,
					// 			'comm_float_final_premium' => $comm_float_final_premium,
					// 			'create_date' => date("Y-m-d h:i:s")
					// 		);
	
					// 		$query2 = $this->Mquery_model_v3->addQuery($tableName = "common_float_policy", $add_common_float_policy_arr, $return_type = "lastID");
					// 		$common_float_policy_id = $query2["lastID"];

					// 	}
					// }
				}elseif ($policy_name_txt == "Private Car") { // Private Car: Motor
					if ($policy_type != 3) {

						if(!empty($private_car_policy_details)){
							//Private Car: Motor Details Start
							$vehicle_make_model = $private_car_policy_details["vehicle_make_model"];
							$vehicle_reg_no = $private_car_policy_details["vehicle_reg_no"];
							$insu_declared_val = $private_car_policy_details["insu_declared_val"];
							$non_elect_access_val = $private_car_policy_details["non_elect_access_val"];
							$elect_access_val = $private_car_policy_details["elect_access_val"];
							$lpg_cng_idv_val = $private_car_policy_details["lpg_cng_idv_val"];
							$trailer_val = $private_car_policy_details["trailer_val"];
							$year_manufact_val = $private_car_policy_details["year_manufact_val"];
							$rta_city_code = $private_car_policy_details["rta_city_code"];
							$rta_city = $private_car_policy_details["rta_city"];
							$rta_city_cat = $private_car_policy_details["rta_city_cat"];
							$cubic_capacity_val = $private_car_policy_details["cubic_capacity_val"];
							$calculation_method = $private_car_policy_details["calculation_method"];
							$type_of_cover = $private_car_policy_details["type_of_cover"];
							$prev_policy_expiry_date = $private_car_policy_details["prev_policy_expiry_date"];
							$policy_period = $private_car_policy_details["policy_period"];
							$inception_date = $private_car_policy_details["inception_date"];
							$expiry_date = $private_car_policy_details["expiry_date"];
					
							$od_basic_od_tot = $private_car_policy_details["od_basic_od_tot"];
							$od_special_disc_per = $private_car_policy_details["od_special_disc_per"];
							$od_special_disc_tot = $private_car_policy_details["od_special_disc_tot"];
							$od_special_load_per = $private_car_policy_details["od_special_load_per"];
							$od_special_load_tot = $private_car_policy_details["od_special_load_tot"];
							$od_net_basic_od_tot = $private_car_policy_details["od_net_basic_od_tot"];
							$od_non_elec_acc_tot = $private_car_policy_details["od_non_elec_acc_tot"];
							$od_elec_acc_tot = $private_car_policy_details["od_elec_acc_tot"];
							$od_bi_fuel_kit_tot = $private_car_policy_details["od_bi_fuel_kit_tot"];
							$od_od_basic_od1_tot = $private_car_policy_details["od_od_basic_od1_tot"];
							$od_trailer_tot = $private_car_policy_details["od_trailer_tot"];
							$od_geographical_area_tot = $private_car_policy_details["od_geographical_area_tot"];
							$od_embassy_load_tot = $private_car_policy_details["od_embassy_load_tot"];
							$od_fibre_glass_tank_tot = $private_car_policy_details["od_fibre_glass_tank_tot"];
							$od_driving_tut_tot = $private_car_policy_details["od_driving_tut_tot"];
							$od_rallies_tot = $private_car_policy_details["od_rallies_tot"];
							$od_basic_od2_tot = $private_car_policy_details["od_basic_od2_tot"];
							$od_anti_tot = $private_car_policy_details["od_anti_tot"];
							$od_handicap_tot = $private_car_policy_details["od_handicap_tot"];
							$od_aai_tot = $private_car_policy_details["od_aai_tot"];
							$od_vintage_tot = $private_car_policy_details["od_vintage_tot"];
							$od_own_premises_tot = $private_car_policy_details["od_own_premises_tot"];
							$od_voluntary_deduc_tot = $private_car_policy_details["od_voluntary_deduc_tot"];
							$od_basic_od3_tot = $private_car_policy_details["od_basic_od3_tot"];
							$od_ncb_per = $private_car_policy_details["od_ncb_per"];
							$od_ncb_tot = $private_car_policy_details["od_ncb_tot"];
							$od_tot_anual_od_premium = $private_car_policy_details["od_tot_anual_od_premium"];
							$od_tot_od_premium_policy_period = $private_car_policy_details["od_tot_od_premium_policy_period"];
							
							$tp_basic_tp_tot = $private_car_policy_details["tp_basic_tp_tot"];
							$tp_restr_tppd = $private_car_policy_details["tp_restr_tppd"];
							$tp_trailer_tot = $private_car_policy_details["tp_trailer_tot"];
							$tp_bi_fuel_tot = $private_car_policy_details["tp_bi_fuel_tot"];
							$tp_basic_tp1_tot = $private_car_policy_details["tp_basic_tp1_tot"];
							$tp_compul_own_driv_tot = $private_car_policy_details["tp_compul_own_driv_tot"];
							$tp_geographical_area_tot = $private_car_policy_details["tp_geographical_area_tot"];
							$tp_unnamed_papax_tot = $private_car_policy_details["tp_unnamed_papax_tot"];
							$tp_no_seats_limit_person_tot = $private_car_policy_details["tp_no_seats_limit_person_tot"];
							$tp_ll_drv_emp_tot = $private_car_policy_details["tp_ll_drv_emp_tot"];
							$tp_no_drv_emp_tot = $private_car_policy_details["tp_no_drv_emp_tot"];
							$tp_noof_person_tot = $private_car_policy_details["tp_noof_person_tot"];
							$tp_pa_paid_drv_tot = $private_car_policy_details["tp_pa_paid_drv_tot"];
							$tp_ll_defe_tot = $private_car_policy_details["tp_ll_defe_tot"];
							$tp_basic_tp2_tot = $private_car_policy_details["tp_basic_tp2_tot"];
							$tp_tot_anual_tp_premium = $private_car_policy_details["tp_tot_anual_tp_premium"];
							$tp_tot_premium_policy_period = $private_car_policy_details["tp_tot_premium_policy_period"];
							$plan_name = $private_car_policy_details["plan_name"];
							$plan_name_tot = $private_car_policy_details["plan_name_tot"];
							$tot_othercover_ind_json = $private_car_policy_details["tot_othercover_ind_json"];
							$tot_anual_cover_premium = $private_car_policy_details["tot_anual_cover_premium"];
							$tot_cover_premium_period = $private_car_policy_details["tot_cover_premium_period"];

							$tot_premium = $private_car_policy_details["tot_premium"];
							$motor_cgst_rate = $private_car_policy_details["motor_cgst_rate"];
							$motor_cgst_tot = $private_car_policy_details["motor_cgst_tot"];
							$motor_sgst_rate = $private_car_policy_details["motor_sgst_rate"];
							$motor_sgst_tot = $private_car_policy_details["motor_sgst_tot"];
							$tot_payable_premium = $private_car_policy_details["tot_payable_premium"];
							//Private Car: Motor Details End

							$add_motor_private_car_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
								'fk_company_id' => $fk_company_id,
								'fk_department_id' => $fk_department_id,
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
		
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_private_car_policy_dump", $add_motor_private_car_policy_arr, $return_type = "lastID");
							$private_car_policy_id = $query2["lastID"];
						}

					}
				} elseif ($policy_name_txt == "2 Wheeler") { 
					if ($policy_type != 3) {

						if(!empty($two_wheeler_policy_details)){
							//2 Wheeler: Motor Details Start
							$vehicle_make_model = $two_wheeler_policy_details["vehicle_make_model"];
							$vehicle_reg_no = $two_wheeler_policy_details["vehicle_reg_no"];
							$insu_declared_val = $two_wheeler_policy_details["insu_declared_val"];
							$elect_acc_val = $two_wheeler_policy_details["elect_acc_val"];
							$other_elect_acc_val = $two_wheeler_policy_details["other_elect_acc_val"];
							$policy_period_tenure_years = $two_wheeler_policy_details["policy_period_tenure_years"];
							$previous_policy_expiry_date_tenur = $two_wheeler_policy_details["previous_policy_expiry_date_tenur"];
							$year_manufact_val = $two_wheeler_policy_details["year_manufact_val"];
							$rta_city_code = $two_wheeler_policy_details["rta_city_code"];
							$rta_city = $two_wheeler_policy_details["rta_city"];
							$rta_city_cat = $two_wheeler_policy_details["rta_city_cat"];
							$cubic_capacity_val = $two_wheeler_policy_details["cubic_capacity_val"];
							$type_of_cover = $two_wheeler_policy_details["type_of_cover"];
							$policy_period = $two_wheeler_policy_details["policy_period"];
							$inception_date = $two_wheeler_policy_details["inception_date"];
							$expiry_date = $two_wheeler_policy_details["expiry_date"];

							$od_basic_od_tot = $two_wheeler_policy_details["od_basic_od_tot"];
							$od_special_disc_per = $two_wheeler_policy_details["od_special_disc_per"];
							$od_special_disc_tot = $two_wheeler_policy_details["od_special_disc_tot"];
							$od_special_load_per = $two_wheeler_policy_details["od_special_load_per"];
							$od_special_load_tot = $two_wheeler_policy_details["od_special_load_tot"];
							$od_net_basic_od_tot = $two_wheeler_policy_details["od_net_basic_od_tot"];
							$od_elec_acc_tot = $two_wheeler_policy_details["od_elec_acc_tot"];
							$od_other_elec_acc_tot = $two_wheeler_policy_details["od_other_elec_acc_tot"];
							$od_od_basic_od1_tot = $two_wheeler_policy_details["od_od_basic_od1_tot"];
							$od_geographical_area_tot = $two_wheeler_policy_details["od_geographical_area_tot"];
							$od_rallies_tot = $two_wheeler_policy_details["od_rallies_tot"];
							$od_embassy_load_tot = $two_wheeler_policy_details["od_embassy_load_tot"];
							$od_basic_od2_tot = $two_wheeler_policy_details["od_basic_od2_tot"];
							$od_anti_theft_tot = $two_wheeler_policy_details["od_anti_theft_tot"];
							$od_handicap_tot = $two_wheeler_policy_details["od_handicap_tot"];
							$od_aai_tot = $two_wheeler_policy_details["od_aai_tot"];
							$od_side_car_tot = $two_wheeler_policy_details["od_side_car_tot"];
							$od_own_premises_tot = $two_wheeler_policy_details["od_own_premises_tot"];
							$od_voluntary_excess_tot = $two_wheeler_policy_details["od_voluntary_excess_tot"];
							$od_basic_od3_tot = $two_wheeler_policy_details["od_basic_od3_tot"];
							$od_ncb_per = $two_wheeler_policy_details["od_ncb_per"];
							$od_ncb_tot = $two_wheeler_policy_details["od_ncb_tot"];
							$od_tot_od_premium_policy_period = $two_wheeler_policy_details["od_tot_od_premium_policy_period"];

							$tp_basic_tp_tot = $two_wheeler_policy_details["tp_basic_tp_tot"];
							$tp_restr_tppd_tot = $two_wheeler_policy_details["tp_restr_tppd_tot"];
							$tp_basic_tp1_tot = $two_wheeler_policy_details["tp_basic_tp1_tot"];
							$tp_geographical_area_tot = $two_wheeler_policy_details["tp_geographical_area_tot"];
							$tp_compul_pa_own_driv_tot = $two_wheeler_policy_details["tp_compul_pa_own_driv_tot"];
							$tp_unnamed_pa_tot = $two_wheeler_policy_details["tp_unnamed_pa_tot"];
							$tp_ll_drv_emp_imt28_tot = $two_wheeler_policy_details["tp_ll_drv_emp_imt28_tot"];
							$tp_ll_other_emp_tot = $two_wheeler_policy_details["tp_ll_other_emp_tot"];
							$tp_noof_other_emp_tot = $two_wheeler_policy_details["tp_noof_other_emp_tot"];
							$tp_basic_tp2_tot = $two_wheeler_policy_details["tp_basic_tp2_tot"];
							$tp_tot_premium_policy_period = $two_wheeler_policy_details["tp_tot_premium_policy_period"];
							$plan_name = $two_wheeler_policy_details["plan_name"];
							$plan_name_tot = $two_wheeler_policy_details["plan_name_tot"];
							$tot_othercover_ind_json = $two_wheeler_policy_details["tot_othercover_ind_json"];
							$tot_cover_premium_period = $two_wheeler_policy_details["tot_cover_premium_period"];

							$tot_premium = $two_wheeler_policy_details["tot_premium"];
							$motor_cgst_rate = $two_wheeler_policy_details["motor_cgst_rate"];
							$motor_cgst_tot = $two_wheeler_policy_details["motor_cgst_tot"];
							$motor_sgst_rate = $two_wheeler_policy_details["motor_sgst_rate"];
							$motor_sgst_tot = $two_wheeler_policy_details["motor_sgst_tot"];
							$tot_payable_premium = $two_wheeler_policy_details["tot_payable_premium"];
							//2 Wheeler: Motor Details End

							$add_motor_two_wheeler_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
								'fk_company_id' => $fk_company_id,
								'fk_department_id' => $fk_department_id,
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
		
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_2_wheeler_policy_dump", $add_motor_two_wheeler_policy_arr, $return_type = "lastID");
							$two_wheeler_policy_id = $query2["lastID"];
						}

					}
				} elseif ($policy_name_txt == "Commercial Vehicle") { 
					if ($policy_type != 3) {

						if(!empty($motor_commercial_policy_details)){
							//Commercial Vehicle: Motor Details Start
							$vehicle_make_model = $motor_commercial_policy_details["vehicle_make_model"];
							$vehicle_reg_no = $motor_commercial_policy_details["vehicle_reg_no"];
							$insu_declared_val = $motor_commercial_policy_details["insu_declared_val"];
							$elect_acc_val = $motor_commercial_policy_details["elect_acc_val"];
							$lpg_cng_idv_val = $motor_commercial_policy_details["lpg_cng_idv_val"];
							$year_manufact_val = $motor_commercial_policy_details["year_manufact_val"];
							$zone_city_code = $motor_commercial_policy_details["zone_city_code"];
							$zone_city = $motor_commercial_policy_details["zone_city"];
							$zone_city_cat = $motor_commercial_policy_details["zone_city_cat"];
							$gvw_val = $motor_commercial_policy_details["gvw_val"];
							$class_val = $motor_commercial_policy_details["class_val"];
							$type_of_cover = $motor_commercial_policy_details["type_of_cover"];
							$policy_period = $motor_commercial_policy_details["policy_period"];
							$inception_date = $motor_commercial_policy_details["inception_date"];
							$expiry_date = $motor_commercial_policy_details["expiry_date"];

							$od_basic_od_tot = $motor_commercial_policy_details["od_basic_od_tot"];
							$od_elec_acc_tot = $motor_commercial_policy_details["od_elec_acc_tot"];
							$od_trailer_tot = $motor_commercial_policy_details["od_trailer_tot"];
							$od_bi_fuel_kit_tot = $motor_commercial_policy_details["od_bi_fuel_kit_tot"];
							$od_od_basic_od1_tot = $motor_commercial_policy_details["od_od_basic_od1_tot"];
							$od_geog_area_tot = $motor_commercial_policy_details["od_geog_area_tot"];
							$od_fiber_glass_tank_tot = $motor_commercial_policy_details["od_fiber_glass_tank_tot"];
							$od_imt_cover_mud_guard_tot = $motor_commercial_policy_details["od_imt_cover_mud_guard_tot"];
							$od_basic_od2_tot = $motor_commercial_policy_details["od_basic_od2_tot"];
							$od_basic_od3_tot = $motor_commercial_policy_details["od_basic_od3_tot"];
							$od_ncb_per = $motor_commercial_policy_details["od_ncb_per"];
							$od_ncb_tot = $motor_commercial_policy_details["od_ncb_tot"];
							$od_tot_anual_od_premium = $motor_commercial_policy_details["od_tot_anual_od_premium"];
							$od_special_disc_per = $motor_commercial_policy_details["od_special_disc_per"];
							$od_special_disc_tot = $motor_commercial_policy_details["od_special_disc_tot"];
							$od_special_load_per = $motor_commercial_policy_details["od_special_load_per"];
							$od_special_load_tot = $motor_commercial_policy_details["od_special_load_tot"];
							$od_tot_od_premium = $motor_commercial_policy_details["od_tot_od_premium"];

							$tp_basic_tp_tot = $motor_commercial_policy_details["tp_basic_tp_tot"];
							$tp_restr_tppd_tot = $motor_commercial_policy_details["tp_restr_tppd_tot"];
							$tp_trailer_tot = $motor_commercial_policy_details["tp_trailer_tot"];
							$tp_bi_fuel_kit_tot = $motor_commercial_policy_details["tp_bi_fuel_kit_tot"];
							$tp_basic_tp1_tot = $motor_commercial_policy_details["tp_basic_tp1_tot"];
							$tp_geog_area_tot = $motor_commercial_policy_details["tp_geog_area_tot"];
							$tp_compul_pa_own_driv_tot = $motor_commercial_policy_details["tp_compul_pa_own_driv_tot"];
							$tp_pa_paid_driver_tot = $motor_commercial_policy_details["tp_pa_paid_driver_tot"];
							$tp_ll_emp_non_fare_tot = $motor_commercial_policy_details["tp_ll_emp_non_fare_tot"];
							$tp_ll_driver_cleaner_tot = $motor_commercial_policy_details["tp_ll_driver_cleaner_tot"];
							$tp_ll_person_operation_tot = $motor_commercial_policy_details["tp_ll_person_operation_tot"];
							$tp_basic_tp2_tot = $motor_commercial_policy_details["tp_basic_tp2_tot"];
							$tp_tot_premium = $motor_commercial_policy_details["tp_tot_premium"];
							$tp_consumables = $motor_commercial_policy_details["tp_consumables"];
							$tp_zero_depreciation = $motor_commercial_policy_details["tp_zero_depreciation"];
							$tp_road_side_ass = $motor_commercial_policy_details["tp_road_side_ass"];
							$tp_tot_addon_premium = $motor_commercial_policy_details["tp_tot_addon_premium"];

							$tot_owd_premium = $motor_commercial_policy_details["tot_owd_premium"];
							$tot_owd_addon_premium = $motor_commercial_policy_details["tot_owd_addon_premium"];
							$tot_btp_premium = $motor_commercial_policy_details["tot_btp_premium"];
							$tot_other_tp_premium = $motor_commercial_policy_details["tot_other_tp_premium"];
							$tot_premium = $motor_commercial_policy_details["tot_premium"];
							$tot_owd_cgst_rate = $motor_commercial_policy_details["tot_owd_cgst_rate"];
							$tot_owd_sgst_rate = $motor_commercial_policy_details["tot_owd_sgst_rate"];
							$tot_owd_addon_cgst_rate = $motor_commercial_policy_details["tot_owd_addon_cgst_rate"];
							$tot_owd_addon_sgst_rate = $motor_commercial_policy_details["tot_owd_addon_sgst_rate"];
							$tot_btp_cgst_rate = $motor_commercial_policy_details["tot_btp_cgst_rate"];
							$tot_btp_sgst_rate = $motor_commercial_policy_details["tot_btp_sgst_rate"];
							$tot_other_tp_cgst_rate = $motor_commercial_policy_details["tot_other_tp_cgst_rate"];
							$tot_other_tp_sgst_rate = $motor_commercial_policy_details["tot_other_tp_sgst_rate"];
							$tot_owd_gst = $motor_commercial_policy_details["tot_owd_gst"];
							$tot_owd_addon_gst = $motor_commercial_policy_details["tot_owd_addon_gst"];
							$tot_btp_gst = $motor_commercial_policy_details["tot_btp_gst"];
							$tot_other_tp_gst = $motor_commercial_policy_details["tot_other_tp_gst"];
							$tot_gst_amt = $motor_commercial_policy_details["tot_gst_amt"];
							$tot_owd_final = $motor_commercial_policy_details["tot_owd_final"];
							$tot_owd_addon_final = $motor_commercial_policy_details["tot_owd_addon_final"];
							$tot_btp_final = $motor_commercial_policy_details["tot_btp_final"];
							$tot_other_tp_final = $motor_commercial_policy_details["tot_other_tp_final"];
							$tot_final_premium = $motor_commercial_policy_details["tot_final_premium"];
							$tot_payable_premium = $motor_commercial_policy_details["tot_payable_premium"];
							//Commercial Vehicle: Motor Details End

							$add_motor_commercial_policy_arr[] = array(
								'fk_dump_policy_id' =>  $dump_policy_id,
								'fk_policy_id' => $policy_id,
								'fk_policy_type_id' => $fk_policy_type_id,
								'fk_company_id' => $fk_company_id,
								'fk_department_id' => $fk_department_id,
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
		
							$query2 = $this->Mquery_model_v3->addQuery($tableName = "motor_commercial_policy_dump", $add_motor_commercial_policy_arr, $return_type = "lastID");
							$commercial_policy_id = $query2["lastID"];
						}

					}
				}else {
					if (!empty($policy_name_txt)) {
						if (($policy_name_txt == "Worksmen Compentation") || ($policy_name_txt == "Money In Transit") || ($policy_name_txt == "Plate Glass") || ($policy_name_txt == "House Holder") || ($policy_name_txt == "All Risk") || ($policy_name_txt == "Office Compact") || ($policy_name_txt == "Electronic Equipment") || ($policy_name_txt == "Product Liability") || ($policy_name_txt == "Commercial General Liability") || ($policy_name_txt == "Public Liability") || ($policy_name_txt == "Professional Indemnity") || ($policy_name_txt == "Machinery Breakdown") || ($policy_name_txt == "Contractors All Risk")) {
							if ($policy_type != 3) {

								if(!empty($others_policy_details)){
									//Others Policy Details Start
									$other_total_sum_assured = $others_policy_details["other_total_sum_assured"];
									$other_fire_rate_per = $others_policy_details["other_fire_rate_per"];
									$other_fire_rate_tot_amount = $others_policy_details["other_fire_rate_tot_amount"];
									$other_less_discount_per = $others_policy_details["other_less_discount_per"];
									$other_less_discount_tot_amount = $others_policy_details["other_less_discount_tot_amount"];
									$other_fire_rate_after_discount = $others_policy_details["other_fire_rate_after_discount"];
									$other_cgst_rate_per = $others_policy_details["other_cgst_rate_per"];
									$other_cgst_tot_amount = $others_policy_details["other_cgst_tot_amount"];
									$other_sgst_rate_per = $others_policy_details["other_sgst_rate_per"];
									$other_sgst_tot_amount = $others_policy_details["other_sgst_tot_amount"];
									$other_final_payable_premium = $others_policy_details["other_final_payable_premium"];
									//Others Policy Details End

									$add_burglary_policy_arr[] = array(
										'fk_dump_policy_id' =>  $dump_policy_id,
										'fk_policy_id' => $policy_id,
										'fk_policy_type_id' => $fk_policy_type_id,
										'other_total_sum_assured' => $other_total_sum_assured,
										'other_fire_rate_per' => $other_fire_rate_per,
										'other_fire_rate_tot_amount' => $other_fire_rate_tot_amount,
										'other_less_discount_per' => $other_less_discount_per,
										'other_less_discount_tot_amount' => $other_less_discount_tot_amount,
										'other_fire_rate_after_discount' => $other_fire_rate_after_discount,
										'other_cgst_rate_per' => $other_cgst_rate_per,
										'other_cgst_tot_amount' => $other_cgst_tot_amount,
										'other_sgst_rate_per' => $other_sgst_rate_per,
										'other_sgst_tot_amount' => $other_sgst_tot_amount,
										'other_final_payable_premium' => $other_final_payable_premium,
										'create_date' => date("Y-m-d h:i:s")
									);
									$query2 = $this->Mquery_model_v3->addQuery($tableName = "others_policy_dump", $add_burglary_policy_arr, $return_type = "lastID");
									$burglary_policy_id = $query2["lastID"];
								}

							}
						}
					}
				} 

				if ($policy_type == 3) { // Fire RC

					if(!empty($others_policy_details)){
						//Fire RC Details Start
						$fire_rc_total_sum_assured = $others_policy_details["fire_rc_total_sum_assured"];
						$fire_rc_fire_rate_per = $others_policy_details["fire_rc_fire_rate_per"];
						$fire_rc_fire_rate_tot_amount = $others_policy_details["fire_rc_fire_rate_tot_amount"];
						$fire_rc_less_discount_per = $others_policy_details["fire_rc_less_discount_per"];
						$fire_rc_less_discount_tot_amount = $others_policy_details["fire_rc_less_discount_tot_amount"];
						$fire_rc_rate_after_discount = $others_policy_details["fire_rc_rate_after_discount"];
						$fire_rc_stfi_rate = $others_policy_details["fire_rc_stfi_rate"];
						$fire_rc_stfi_rate_total = $others_policy_details["fire_rc_stfi_rate_total"];
						$fire_rc_earthquake_rate = $others_policy_details["fire_rc_earthquake_rate"];
						$fire_rc_earthquake_rate_total = $others_policy_details["fire_rc_earthquake_rate_total"];
						$fire_rc_terrorisum_rate = $others_policy_details["fire_rc_terrorisum_rate"];
						$fire_rc_terrorisum_rate_total = $others_policy_details["fire_rc_terrorisum_rate_total"];
						$fire_rc_gross_premium = $others_policy_details["fire_rc_gross_premium"];
						$fire_rc_cgst_rate_per = $others_policy_details["fire_rc_cgst_rate_per"];
						$fire_rc_cgst_tot_amount = $others_policy_details["fire_rc_cgst_tot_amount"];
						$fire_rc_sgst_rate_per = $others_policy_details["fire_rc_sgst_rate_per"];
						$fire_rc_sgst_tot_amount = $others_policy_details["fire_rc_sgst_tot_amount"];
						$fire_rc_final_payable_premium = $others_policy_details["fire_rc_final_payable_premium"];
						//Fire RC Details End

						$add_fire_rc_policy_arr[] = array(
							'fk_dump_policy_id' =>  $dump_policy_id,
							'fk_policy_id' => $policy_id,
							'fk_policy_type_id' => $fk_policy_type_id,
							'policy_type' => $policy_type,
							'fire_rc_total_sum_assured' => $fire_rc_total_sum_assured,
							'fire_rc_fire_rate_per' => $fire_rc_fire_rate_per,
							'fire_rc_fire_rate_tot_amount' => $fire_rc_fire_rate_tot_amount,
							'fire_rc_less_discount_per' => $fire_rc_less_discount_per,
							'fire_rc_less_discount_tot_amount' => $fire_rc_less_discount_tot_amount,
							'fire_rc_rate_after_discount' => $fire_rc_rate_after_discount,

							'fire_rc_stfi_rate' => $fire_rc_stfi_rate,
							'fire_rc_stfi_rate_total' => $fire_rc_stfi_rate_total,
							'fire_rc_earthquake_rate' => $fire_rc_earthquake_rate,
							'fire_rc_earthquake_rate_total' => $fire_rc_earthquake_rate_total,
							'fire_rc_terrorisum_rate' => $fire_rc_terrorisum_rate,
							'fire_rc_terrorisum_rate_total' => $fire_rc_terrorisum_rate_total,

							'fire_rc_gross_premium' => $fire_rc_gross_premium,
							'fire_rc_cgst_rate_per' => $fire_rc_cgst_rate_per,
							'fire_rc_cgst_tot_amount' => $fire_rc_cgst_tot_amount,
							'fire_rc_sgst_rate_per' => $fire_rc_sgst_rate_per,
							'fire_rc_sgst_tot_amount' => $fire_rc_sgst_tot_amount,
							'fire_rc_final_payable_premium' => $fire_rc_final_payable_premium,
							'create_date' => date("Y-m-d h:i:s")
						);
						$query2 = $this->Mquery_model_v3->addQuery($tableName = "fire_rc_policy_dump", $add_fire_rc_policy_arr, $return_type = "lastID");
						$fire_rc_policy_id = $query2["lastID"];
					}

				}

				if (!empty($policy_id)) {
					$updateArr[] = array(
						"policy_id" => $policy_id,
						"renewable_dump_flag" => 1, //0:Not Dumped, 1:Dumped
					);
					$whereArr["policy_member_details.policy_id"] = $policy_id;
					$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "policy_member_details", $updateArr, $updateKey = "policy_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
				}

				$this->db->trans_complete();		// Transaction End	
			}else{
				$serial_no_year = "";
				$serial_no_month = "";
				$serial_no = "";
				$fk_company_id = "";
				$fk_department_id = "";
				$fk_policy_type_id = "";
				$fk_client_id = "";
				$fk_cust_member_id = "";
				$fk_agency_id = "";
				$fk_sub_agent_id = "";
				$policy_type = "";
				$mode_of_premimum = "";
				$date_from = "";
				$date_to = "";
				$payment_date_from = "";
				$payment_date_to = "";
				$policy_no = "";
				$date_commenced = "";
				$policy_upload = "";
				$dynamic_path = "";
				$reg_mobile = "";
				$reg_email = "";
				$policy_counter = "";
				$family_size = "";
				$tpa_company = "";
				$addition_of_more_child = "";
				$restore_cover = "";
				$maternity_new_born_baby_cover = "";
				$daily_cash_allowance_cover = "";
				$floater_policy_type = "";
				$plan_policy_commission = "";
				$current_sum_insured = "";
				$current_total_premium = "";
				$member_name_arr = "";
				$riv = "";
				$type_of_bussiness = "";
				$description_of_stock = "";
				$quotation_date = "";
				$quotation_upload = "";
				$quotation_male_link = "";
				$policy_member_create_date = "";
				$policy_member_modify_dt = "";
			}


		}
		// Getting Policy Data Section End

	}



	

// Renewal Section End




}
?>
