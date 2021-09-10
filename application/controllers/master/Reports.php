<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends Admin_gic_core
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
	}
	// Reports Section Start

	public function filter_policy()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_company = $this->input->post("filter_company");
		$filter_agency = $this->input->post("filter_agency");
		$filter_policy_holder = $this->input->post("filter_policy_holder");
		$filter_department = $this->input->post("filter_department");
		$filter_policy_name = $this->input->post("filter_policy_name");
		$result = array();

		if (!empty($this->input->post())) {
			//"DATE_FORMAT(column_name,'%Y-%m')
			//DATE_FORMAT("policy_member_details.date_to", "%Y-%m")
			if (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(policy_member_details.date_from,'%Y-%m')"] = $filter_year . "-" . $filter_month;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(policy_member_details.date_from,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(policy_member_details.date_from,'%m')"] = $filter_month;
			}
			if (!empty($filter_company))
				$whereArr["policy_member_details.fk_company_id"] = $filter_company;
			if (!empty($filter_agency))
				$whereArr["policy_member_details.fk_agency_id"] = $filter_agency;
			if (!empty($filter_policy_holder))
				$whereArr["policy_member_details.fk_cust_member_id"] = $filter_policy_holder;
				
			if (!empty($filter_department))
				$whereArr["policy_member_details.fk_department_id"] = $filter_department;
			if (!empty($filter_policy_name))
				$whereArr["policy_member_details.fk_policy_type_id"] = $filter_policy_name;

			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames = "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum , policy_member_details.date_from , policy_member_details.date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.pre_year_policy_no , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag , policy_member_details.basic_sum_insured , policy_member_details.basic_gross_premium , policy_member_details.current_sum_insured , policy_member_details.current_total_premium , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company, policy_member_details.renewal_flag, policy_member_details.commission_flag, policy_member_details.endorsment_flag, policy_member_details.claims_flag , policy_member_details.riv , policy_member_details.type_of_bussiness , policy_member_details.description_of_stock , policy_member_details.quotation_date , policy_member_details.quotation_upload , policy_member_details.quotation_male_link ,policy_member_details.floater_policy_type, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, master_agency.code as master_agency_code, master_agency.name as master_agency_name, master_sub_agent.sub_agent_code, master_sub_agent.sub_agent_name , customer_tbl.grpname", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("policy_member_details.policy_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];

			$total_policy_data = count($result);
			// echo $this->db->last_query();
			// print_r($result);
			// die();
		}

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_policy_data"] = $total_policy_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function policy()
	{
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =   "customer_tbl.id as grp_id, customer_tbl.grpname", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customer_tbl.grpname" => "ASC"), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$this->data["group"] = $group = $query["userData"];

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =   "customermem_tbl.id,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name"=>"ASC"), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$this->data["policy_holder"] = $policy_holder = $query["userData"];
		// print_r($group);
		// die();

		$this->data["title"] = $title = "Policy Reports";
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

		$this->data["main_page"] = "master/reports/policy_report";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function index()
	{
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =   "customer_tbl.id as grp_id, customer_tbl.grpname", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customer_tbl.grpname" => "ASC"), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$this->data["group"] = $group = $query["userData"];
		// print_r($group);
		// die();

		$this->data["title"] = $title = "Group Wise Reports";
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

		$this->data["main_page"] = "master/reports/group_wise";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_group_wise_list()
	{
		$validator = array('status' => false, 'messages' => array());

		$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
		$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
		$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
		$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
		$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
		$whereArr["policy_member_details.policy_member_status"] = 1;
		$whereArr["policy_member_details.del_flag"] = 1;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames = "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum , DATE_FORMAT(policy_member_details.date_from,'%d-%m-%Y') as date_from , DATE_FORMAT(policy_member_details.date_to,'%d-%m-%Y') as date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company , policy_member_details.basic_sum_insured , policy_member_details.basic_gross_premium , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag  ,policy_member_details.floater_policy_type, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname, policy_member_details.member_name_arr", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("policy_member_details.policy_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];

		$member_name_arr = "";
		$i=0;
		foreach($result as $row){
			$member_name_arr = explode(",",$row["member_name_arr"]);
			if(!empty($member_name_arr)){
				$whereInArray_member_name_arr["customermem_tbl.id"] = $member_name_arr;
				$query_member_name_arr = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name_str_arr", $whereArr=array(), $whereInArray = $whereInArray_member_name_arr, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("customermem_tbl.id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
	
				$result_member_name_arr = $query_member_name_arr["userData"];
				$new_result_member_name_arr = array();
				foreach ($result_member_name_arr as $key => $value) { 
					if (is_array($value)) { 
					  $new_result_member_name_arr = array_merge($new_result_member_name_arr, array_values($value)); 
					} 
					else { 
					  $new_result_member_name_arr[$key] = $value; 
					} 
				  } 
				
				  $result[$i]["member_name_str_arr"] = implode(" , ",$new_result_member_name_arr);
				$i++;
			}
		}

		$total_group_wise_data = count($result);

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_group_wise_data"] = $total_group_wise_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function filter_group_wise()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_from_date = $this->input->post("filter_from_date");
		$filter_to_date = $this->input->post("filter_to_date");
		$filter_group = $this->input->post("filter_group");
		$result = array();
		$whereArr["policy_member_details.policy_member_status"] = 1;
		$whereArr["policy_member_details.del_flag"] = 1;
		if (!empty($filter_from_date) || !empty($filter_to_date) || !empty($filter_group)) {
			if (!empty($filter_from_date))
				$whereArr["DATE_FORMAT(policy_member_details.date_from,'%d-%m-%Y')>="] = $filter_from_date;
			if (!empty($filter_to_date))
				$whereArr["DATE_FORMAT(policy_member_details.date_to,'%d-%m-%Y')<="] = $filter_to_date;

			if (!empty($filter_group))
				$whereArr["policy_member_details.fk_client_id"] = $filter_group;

			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames = "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum ,DATE_FORMAT(policy_member_details.date_from,'%d-%m-%Y') as date_from , DATE_FORMAT(policy_member_details.date_to,'%d-%m-%Y') as date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company , policy_member_details.basic_sum_insured , policy_member_details.basic_gross_premium , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag  ,policy_member_details.floater_policy_type, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, customermem_tbl.id, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("policy_member_details.policy_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];

			$total_group_wise_data = count($result);
			// echo $this->db->last_query();
			// print_r($result);
			// die();
		}

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_group_wise_data"] = $total_group_wise_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	function update_policy_commission_data()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->db->trans_start();	//Start Transaction	
		if ($this->input->post() != "") {
			$policy_id = $this->security->xss_clean($this->input->post('policy_id'));
			$commission_rece_company = $this->security->xss_clean($this->input->post('commission_rece_company'));
			$commission_amt_rece_company = $this->security->xss_clean($this->input->post('commission_amt_rece_company'));

			$updateArr = array(
				'policy_id ' => $policy_id,
				'commission_rece_company' => $commission_rece_company,
				'commission_amt_rece_company' => $commission_amt_rece_company,
				'modify_dt' => date("Y-m-d h:i:s"),
			);

			if (!empty($updateArr)) {
				$this->db->where("policy_member_details.policy_id", $policy_id);
				$this->db->update('policy_member_details', $updateArr);
			}
			// print_r($updateArr);
			// die();
			// $query = $this->Mquery_model_v3->updateBatchQuery($tableName = "policy_member_details", $updateArr, $updateKey = "policy_id", $whereArr = array("policy_id" => $policy_id), $likeCondtnArr = array(), $whereInArray = array());
			// echo $this->db->last_query();
			// die();
		}
		$this->db->trans_complete();		// Transaction End	

		if ($this->db->trans_status() === FALSE) {
			$validator["status"] = false;
			$validator["message"] = "Fatal Error: Contact Support:";
		} else {
			$validator["status"] = true;
			$validator["message"] = "Commission is Updated Successfully.";
		}

		echo json_encode($validator);
	}

	public function policy_holder()
	{
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =   "customermem_tbl.id,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name"=>"ASC"), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$this->data["policy_holder"] = $policy_holder = $query["userData"];

		$this->data["title"] = $title = "Policy Holder Wise Reports";
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

		$this->data["main_page"] = "master/reports/policy_holder_wise";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_policy_holder()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_from_date = $this->input->post("filter_from_date");
		$filter_to_date = $this->input->post("filter_to_date");
		$filter_member = $this->input->post("filter_member");
		$result = array();
		$whereArr["policy_member_details.policy_member_status"] = 1;
		$whereArr["policy_member_details.del_flag"] = 1;
		if (!empty($filter_from_date) || !empty($filter_to_date) || !empty($filter_member)) {
			if (!empty($filter_from_date))
				$whereArr["DATE_FORMAT(policy_member_details.date_from,'%d-%m-%Y')>="] = $filter_from_date;
			if (!empty($filter_to_date))
				$whereArr["DATE_FORMAT(policy_member_details.date_to,'%d-%m-%Y')<="] = $filter_to_date;

			if (!empty($filter_member))
				$whereArr["policy_member_details.fk_cust_member_id"] = $filter_member;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames = "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum ,DATE_FORMAT(policy_member_details.date_from,'%d-%m-%Y') as date_from , DATE_FORMAT(policy_member_details.date_to,'%d-%m-%Y') as date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company , policy_member_details.basic_sum_insured , policy_member_details.basic_gross_premium , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag  ,policy_member_details.floater_policy_type, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, customermem_tbl.id, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("policy_member_details.policy_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];

			$total_group_wise_data = count($result);
			// echo $this->db->last_query();
			// print_r($result);
			// die();
		}

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_group_wise_data"] = $total_group_wise_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function member()
	{
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =   "customer_tbl.id as grp_id, customer_tbl.grpname", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customer_tbl.grpname" => "ASC"), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$this->data["group"] = $group = $query["userData"];

		$this->data["title"] = $title = "Member Wise Reports";
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

		$this->data["main_page"] = "master/reports/member_wise";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_member_wise()
	{
		$validator = array('status' => false, 'messages' => array());
		$filter_from_date = $this->input->post("filter_from_date");
		$filter_to_date = $this->input->post("filter_to_date");
		$filter_group = $this->input->post("filter_group");
		$filter_member = $this->input->post("filter_member");
		$result = array();
		$whereArr["policy_member_details.policy_member_status"] = 1;
		$whereArr["policy_member_details.del_flag"] = 1;
		if (!empty($filter_from_date) || !empty($filter_to_date) || !empty($filter_group) || !empty($filter_member)) {
			if (!empty($filter_from_date))
				$whereArr["DATE_FORMAT(policy_member_details.date_from,'%d-%m-%Y')>="] = $filter_from_date;
			if (!empty($filter_to_date))
				$whereArr["DATE_FORMAT(policy_member_details.date_to,'%d-%m-%Y')<="] = $filter_to_date;

			if (!empty($filter_group))
				$whereArr["policy_member_details.fk_client_id"] = $filter_group;

			if (!empty($filter_member))
				$whereArr["policy_member_details.fk_cust_member_id"] = $filter_member;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_department", "condtn" => "policy_member_details.fk_department_id = master_department.department_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.	policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_agency", "condtn" => "policy_member_details.fk_agency_id = master_agency.magency_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_sub_agent", "condtn" => "policy_member_details.fk_sub_agent_id = master_sub_agent.sub_agent_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", $colNames = "policy_member_details.policy_id, policy_member_details.serial_no, policy_member_details.serial_no_year, policy_member_details.serial_no_month, policy_member_details.fk_company_id,policy_member_details.fk_department_id , policy_member_details.fk_policy_type_id , policy_member_details.fk_client_id , policy_member_details.fk_cust_member_id , policy_member_details.fk_agency_id , policy_member_details.fk_sub_agent_id , policy_member_details.policy_type , policy_member_details.mode_of_premimum ,DATE_FORMAT(policy_member_details.date_from,'%d-%m-%Y') as date_from , DATE_FORMAT(policy_member_details.date_to,'%d-%m-%Y') as date_to , policy_member_details.payment_date_from , policy_member_details.payment_date_to , policy_member_details.policy_no , policy_member_details.plan_policy_commission , policy_member_details.commission_rece_company , policy_member_details.commission_amt_rece_company , policy_member_details.basic_sum_insured , policy_member_details.basic_gross_premium , policy_member_details.date_commenced , policy_member_details.policy_upload ,policy_member_details.dynamic_path , policy_member_details.reg_mobile , policy_member_details.reg_email , policy_member_details.policy_member_status , policy_member_details.del_flag  ,policy_member_details.floater_policy_type, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_type_title,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name, customermem_tbl.id, master_agency.code as master_agency_code, master_sub_agent.sub_agent_code, customer_tbl.grpname, policy_member_details.member_name_arr", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("policy_member_details.policy_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];
			
			$member_name_arr = "";
			$i=0;
			foreach($result as $row){
				$member_name_arr = explode(",",$row["member_name_arr"]);
				if(!empty($member_name_arr)){
					$whereInArray_member_name_arr["customermem_tbl.id"] = $member_name_arr;
					$query_member_name_arr = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name_str_arr", $whereArr=array(), $whereInArray = $whereInArray_member_name_arr, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("customermem_tbl.id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		
					$result_member_name_arr = $query_member_name_arr["userData"];
					$new_result_member_name_arr = array();
					foreach ($result_member_name_arr as $key => $value) { 
						if (is_array($value)) { 
						  $new_result_member_name_arr = array_merge($new_result_member_name_arr, array_values($value)); 
						} 
						else { 
						  $new_result_member_name_arr[$key] = $value; 
						} 
					  } 
					
					  $result[$i]["member_name_str_arr"] = implode(" , ",$new_result_member_name_arr);
					$i++;
				}
			}

			$total_group_wise_data = count($result);
			// echo $this->db->last_query();
			// print_r($result);
			// die();
		}

		if (!empty($result)) {
			$result["status"] = true;
			$result["userdata"] = $result;
			$result["total_group_wise_data"] = $total_group_wise_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function download_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Billing Upload , 2:TDS Certificate ,3 : Circular Upload
		$this->data["commission_bill_entry_id"] = $commission_bill_entry_id = (int)$this->uri->segment(5);
		$this->data["file_name"] = $file_name = $this->uri->segment(6);

		if (!empty($file_name) || !empty($doc_type)) {
			if ($doc_type == 1 || $doc_type == 2 || $doc_type == 3)
				$document_file = $file_name;
		}

		$this->load->helper('download');

		if ($document_file != "") {
			if ($doc_type == 1)
				$data = file_get_contents("./commission/bill_upload/" . $document_file);
			elseif ($doc_type == 2)
				$data = file_get_contents("./commission/tds_doc_upload/" . $document_file);
			elseif ($doc_type == 3)
				$data = file_get_contents("./assets/plans_policy/circular_upload/" . $document_file);
		}

		force_download($document_file, $data);
	}

	public function view_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(4); //1: Billing Upload , 2:TDS Certificate ,3 : Circular Upload
		$this->data["commission_bill_entry_id"] = $commission_bill_entry_id = (int)$this->uri->segment(5);
		$this->data["file_name"] = $file_name = $this->uri->segment(6);


		if (!empty($file_name) || !empty($doc_type)) {
			if ($doc_type == 1) {
				$document_file = $file_name;
				$extension = pathinfo("commission/bill_upload/" . $document_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./commission/bill_upload/" . $document_file);
			} elseif ($doc_type == 2) {
				$document_file = $file_name;
				$file = file_get_contents("./commission/tds_doc_upload/" . $document_file);
				$extension = pathinfo("commission/tds_doc_upload/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 3) {
				$document_file = $file_name;
				$file = file_get_contents("./assets/plans_policy/circular_upload/" . $document_file);
				$extension = pathinfo("assets/plans_policy/circular_upload/" . $document_file, PATHINFO_EXTENSION);
			}
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}

	// Reports Section End





}
