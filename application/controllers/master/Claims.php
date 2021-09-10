<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Claims extends Admin_gic_core
{

    function __construct()
    {
        parent::__construct();
        //Templete	
        $this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "summernote");
        $this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "summernote");
        $this->data["base_url"] = $this->config->item("base_url");
        $this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
        $this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
        $this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";

        $this->data["title"] = $title = "Claims";

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

		$this->data["main_page"] = "master/claims/claims";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}


	public function mediclaims()
	{	

		$this->data["title"] = "Mediclaim";

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

		$this->data["main_page"] = "master/claims/mediclaims";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function claims_questions()
	{	
		$this->data["title"] = $title = "Claims Question";

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

		$this->data["main_page"] = "master/claims/claim_questions_list";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function claim_add()
	{	

		$policy_id = $this->uri->segment(4);

		if(empty($policy_id)){
			redirect("master/claims/");
		}


		if ($policy_id != "") {

			$whereArr["policy_member_details.policy_id"] = $policy_id;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", 
			$colNames =  "policy_member_details.*, master_company.*, customer_tbl.*, customermem_tbl.*", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];

			$member_list = array();
			if ($result["fk_client_id"] != "") {
				$whereArr_data["customermem_tbl.customer_id"] = $result["fk_client_id"];
				$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ', REPLACE(customermem_tbl.surname,'null','')) AS name, customermem_tbl.contact, customermem_tbl.email", $whereArr = $whereArr_data, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$member_list = $query2["userData"];
			}
			$result["member_data_arr"] = $member_list;

			$question_list = array();
			if ($result["fk_client_id"] != "") {
				$query3 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames = "*", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("claim_question.claims_type" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$question_list = $query3["userData"];
			}
			$result["question_list_data_arr"] = $question_list;

		}

		$this->data["result_data"] = $result;

		$this->data["title"] = $title = "Add Claim";
		$this->data["id"] = $policy_id;

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
		$this->data["main_page"] = "master/claims/claim_add";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);

	}


	public function claim_add_step_two()
	{	

		$policy_id = $this->uri->segment(4);
		$id = $this->uri->segment(5);

		if(empty($policy_id)){
			redirect("master/claims/");
		}


		if ($policy_id != "") {

			$whereArr["policy_member_details.policy_id"] = $policy_id;
			$whereArr["claim_main_others.claim_main_id"] = $id;
			$joins_main[] = array("tbl" => "policy_member_details", "condtn" => "claim_main_others.policy_id=policy_member_details.policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id=customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id=master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "claim_question", "condtn" => "claim_main_others.name_of_policy=claim_question.id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_main_others", $colNames =  "*,policy_member_details.policy_id,policy_member_details.fk_company_id,policy_member_details.fk_cust_member_id,claim_question.claims_type,claim_question.format,claim_question.question,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];

			$document_list = array();
			if ($result["policy_id"] != "") {
				$whereArr_data["master_document.document_status"] = 1;
				$whereArr_data["master_document.del_flag"] = 1;
				$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames = "*", $whereArr = $whereArr_data, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_document.document_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$document_list = $query2["userData"];
			}
			$result["document_arr"] = $document_list;

		}

		$this->data["result_data"] = $result;
		$this->data["title"] = $title = "Add Claim (Step Two)";
		$this->data["id"] = $policy_id;
		$this->data["aid"] = $id;

		// print_r($result);
		// die();
		

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
		$this->data["main_page"] = "master/claims/claim_add_step_two";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);

	}


	public function claim_question_add()
	{	
		
		$type = $this->uri->segment(5);
		if(!empty($type)){
			
			$this->data["title"] = $title = "Edit Claims Question";

			$this->data["id"] = $id = $this->uri->segment(4);
			$whereArr["claim_question.id"] = $id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames =  "*", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
			$this->data["result_data"] = $result = $query["userData"];
			// print_r($query["userData"]);
			// die();
			$this->data["title"] = $title = "Edit Claims Question";
		}else{
			$this->data["title"] = $title = "Add Claims Question";
		}
			
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
			$this->data["main_page"] = "master/claims/claims_question_master";
			$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);

	}

	public function mediclaim_step_one()
	{
		
		//$this->data["title"] = $title = "Mediclaim/Super Topup Intimation";

		$policy_id = $this->uri->segment(4);
		$eid = $this->uri->segment(5);
		$view = $this->uri->segment(6);

		if(empty($policy_id)){
			redirect("master/claims/mediclaims");
		}

		if(!empty($view) && $view=='view'){
			$show = true;
		}else{
			$show = false;
		}


		if ($policy_id != "") {

			$whereArr["policy_member_details.policy_id"] = $policy_id;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_tpa", "condtn" => "policy_member_details.tpa_company = master_tpa.mtpa_id", "type" => "left");
			
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", 
			$colNames =  "policy_member_details.*, master_company.*, customer_tbl.*, customermem_tbl.*, master_policy_type.*, master_tpa.*", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
 
			$member_name_arr =$result["member_name_arr"];
			if(!empty($eid)){
				$whereArr401["claim_mediclaim_intimation.mcmdic_id"] = $eid;
				$query401 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_mediclaim_intimation", 
				$colNames =  "claim_mediclaim_intimation.*", $whereArr401, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
	
				$result401 = $query401["userData"];
				$result["cmi_data"] = $result401;
			}
			// print_r(explode(",",$member_name_arr));
			// die();
			$result["member_name_data_arr"] = array();
			if(!empty($member_name_arr)){
				$whereInArray_member_name_arr["customermem_tbl.id"] = explode(",",$member_name_arr);
				$query_member_name_arr = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", 
				$colNames =  "customermem_tbl.*,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ', REPLACE(customermem_tbl.surname,'null','')) AS name", $whereArr=array(), $whereInArray = $whereInArray_member_name_arr, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
	
				$result_member_name_arr= $query_member_name_arr["userData"];
				$result["member_name_data_arr"] = $result_member_name_arr;
				// echo $this->db->last_query();
				// print_r($result_member_name_arr);
				// die();
			}

			// $member_list = array();
			// if ($result["fk_client_id"] != "") {
			// 	$whereArr_data["customermem_tbl.customer_id"] = $result["fk_client_id"];
			// 	$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ', REPLACE(customermem_tbl.surname,'null','')) AS name, customermem_tbl.contact, customermem_tbl.email", $whereArr = $whereArr_data, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			// 	$member_list = $query2["userData"];
			// }
			// $result["member_data_arr"] = $member_list;

			$question_list = array();
			if ($result["fk_client_id"] != "") {
				$query3 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames = "*", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("claim_question.claims_type" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$question_list = $query3["userData"];
			}
			$result["question_list_data_arr"] = $question_list;

			// $msmber_data = array();
			// if ($result["fk_client_id"] != "") {
			// 	$whereArr_data["customermem_tbl.customer_id"] = $result["fk_cust_member_id"];
			// 	$query4 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "*", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.customer_id" => "ASC"), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
			// 	$msmber_data = $query4["userData"];
			// }
			// $result["msmberData"] = $msmber_data;

		}

		$this->data["result_data"] = $result;

		// print_r($result);
		// die();

		$this->data["title"] = $title = "Mediclaim/Super Topup Intimation";
		$this->data["id"] = $policy_id;
		$this->data["eid"] = $eid;
		$this->data["v"] = $show;

		
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
		$this->data["main_page"] = "master/claims/mediclaim_add_step_one";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}


	public function mediclaim_step_two()
	{
		
		//$this->data["title"] = $title = "Mediclaim/Super Topup Intimation";

		$policy_id = $this->uri->segment(4);
		$eid = $this->uri->segment(5);
		$view = $this->uri->segment(6);

		if(empty($policy_id)){
			redirect("master/claims/mediclaims");
		}

		if(!empty($view) && $view=='view'){
			$show = true;
		}else{
			$show = false;
		}


		if ($policy_id != "") {

			$whereArr["policy_member_details.policy_id"] = $policy_id;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "policy_member_details.fk_policy_type_id = master_policy_type.policy_type_id", "type" => "left");
			$joins_main[] = array("tbl" => "master_tpa", "condtn" => "policy_member_details.tpa_company = master_tpa.mtpa_id", "type" => "left");
			
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", 
			$colNames =  "policy_member_details.*, master_company.*, customer_tbl.*, customermem_tbl.*, master_policy_type.*, master_tpa.*", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
 
			$member_name_arr =$result["member_name_arr"];
			if(!empty($eid)){
				$whereArr401["claim_mediclaim_intimation.mcmdic_id"] = $eid;
				$query401 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_mediclaim_intimation", 
				$colNames =  "claim_mediclaim_intimation.*", $whereArr401, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
	
				$result401 = $query401["userData"];
				$result["cmi_data"] = $result401;
			}
			// print_r(explode(",",$member_name_arr));
			// die();
			$result["member_name_data_arr"] = array();
			if(!empty($member_name_arr)){
				$whereInArray_member_name_arr["customermem_tbl.id"] = explode(",",$member_name_arr);
				$query_member_name_arr = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", 
				$colNames =  "customermem_tbl.*,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ', REPLACE(customermem_tbl.surname,'null','')) AS name", $whereArr=array(), $whereInArray = $whereInArray_member_name_arr, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
	
				$result_member_name_arr= $query_member_name_arr["userData"];
				$result["member_name_data_arr"] = $result_member_name_arr;
				// echo $this->db->last_query();
				// print_r($result_member_name_arr);
				// die();
			}

			// $member_list = array();
			// if ($result["fk_client_id"] != "") {
			// 	$whereArr_data["customermem_tbl.customer_id"] = $result["fk_client_id"];
			// 	$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ', REPLACE(customermem_tbl.surname,'null','')) AS name, customermem_tbl.contact, customermem_tbl.email", $whereArr = $whereArr_data, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			// 	$member_list = $query2["userData"];
			// }
			// $result["member_data_arr"] = $member_list;

			$question_list = array();
			if ($result["fk_client_id"] != "") {
				$query3 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames = "*", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("claim_question.claims_type" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$question_list = $query3["userData"];
			}
			$result["question_list_data_arr"] = $question_list;

			// $msmber_data = array();
			// if ($result["fk_client_id"] != "") {
			// 	$whereArr_data["customermem_tbl.customer_id"] = $result["fk_cust_member_id"];
			// 	$query4 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "*", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.customer_id" => "ASC"), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
			// 	$msmber_data = $query4["userData"];
			// }
			// $result["msmberData"] = $msmber_data;

		}

		$this->data["result_data"] = $result;

		// print_r($result);
		// die();

		$this->data["title"] = $title = "Mediclaim/Super Topup Intimation";
		$this->data["id"] = $policy_id;
		$this->data["eid"] = $eid;
		$this->data["v"] = $show;

		
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
		$this->data["main_page"] = "master/claims/mediclaim_add_step_two";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}


	////////////////////////
	// AJAX CALL REQUESTS //
	////////////////////////

	public function getSingleQuestionData()
	{
		$validator = array('status' => false, 'messages' => array());
		$id = $this->input->post("id");
		$whereArr["claim_question.id"] = $id;

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames =  "*", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];
		if (!empty($result)) {
			$result["status"] = true;
			$result["question_data"] = $result;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["question_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	} 

	public function save_questions(){

		$claims_type 	= $this->input->post("claims_type");
		$format 		= $this->input->post("format");
		$navid 			= $this->input->post("navid");
		$id 			= $this->input->post("id");
		// print_r($claims_type);
		// print_r($id);
		// die("Test");
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('claims_type', 'Claims Type', 'trim|required');
		$this->form_validation->set_rules('format', 'format', 'trim|required');
		$this->form_validation->set_rules('navid', 'Questions', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(	
				"claims_type_error" => form_error("claims_type"),
				"format_error" => form_error("format")
			);
		} else {
			$id 			= $this->input->post("id");
			$questions = json_encode($navid);
			$type = "";
			$this->db->trans_start();
			if ($this->input->post() != "") {

				
				if(!empty($id)){
					$add_arr[] = array(
						'claims_type' => $claims_type,
						'format' => $format,
						'question' => $questions,
						'created_date' => date("Y-m-d h:i:s"),
						'mod_date' => date("Y-m-d h:i:s"),
						'id' => $id,
					);
				}else{
					$add_arr[] = array(
						'claims_type' => $claims_type,
						'format' => $format,
						'question' => $questions,
						'created_date' => date("Y-m-d h:i:s"),
						'mod_date' => date("Y-m-d h:i:s"),
					);
				}

				if(!empty($id)){
					$type="Updated";
					$this->Mquery_model_v3->updateBatchQuery($tableName = "claim_question", $add_arr, $updateKey = "id", $whereArr = array("id"=> $id), $likeCondtnArr = array(), $whereInArray = array());
				}else{
					$type="Added";
					$this->Mquery_model_v3->addQuery($tableName = "claim_question", $add_arr, $return_type = "");
				}
			}
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support";
			} else{
				$validator["status"] = true;
				$validator["message"] = "Questions is ".$type." Successfully.";
			}
		}
		echo json_encode($validator);

	}


	public function save_claim_step_one(){


		$id = $this->input->post("id");

		// print_r($claims_type);
		// print_r($id);
		// die("Test");

		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('claiment_name', 'Claiment Name', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Policy Type', 'trim|required');
		$this->form_validation->set_rules('date_of_al', 'Date Of Admission/Loss', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(	
				"claiment_name_error" => form_error("claiment_name"),
				"policy_type_error" => form_error("policy_type"),
				"date_of_al_error" => form_error("date_of_al"),
				"status_error" => form_error("status")
			);
		} else {
			$claiment_name = $this->input->post("claiment_name");
			$policy_id = $this->input->post("policy_id");
			$policy_type = $this->input->post("policy_type");
			$date_of_al = $this->input->post("date_of_al");
			$status = $this->input->post("status");
			$format = htmlentities($this->input->post("format"));
			$answers = $this->input->post("answers");

			$id 			= $this->input->post("id");
			$questions 		= json_encode($answers);

			// print_r($id);
			// die("die");

			$this->db->trans_start();
			if ($this->input->post() != "") {

				
				$add_arr[] = array(
					'policy_id' => $policy_id,
					'id_of_claiment' => $claiment_name,
					'date_loss_addmission' => $date_of_al,
					'letter_format' => $format,
					'intimation_status' => $status,
					'questions_list' => $questions,
					'name_of_policy' => $policy_type,
					'claim_main_id' => $id,
					'actual_claim_status' => $status,
					'doc_requirment_list' => '[]',
					'svyr_details_list' => '[]',
					'qry_letter_list' => '[]',
					'srvey_details_list' => '[]',
					'doc_received_from_client_list' => '[]',
					'qry_letter_reply_list' => '[]',
					'curr_dt' => date("Y-m-d h:i:s"),
					'mod_dt' => date("Y-m-d h:i:s"),
				);

				$this->Mquery_model_v3->addQuery($tableName = "claim_main_others", $add_arr, $return_type = "");
			}
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support";
			} else{
				$validator["status"] = true;
				$validator["message"] = "Claim is Added Successfully.";
			}
		}
		echo json_encode($validator);

	}

	public function save_mediclaim_intimation(){

		// print_r($_POST);
		// die();

		// policy_holder_id: policy_holder_id,
		// claiment_name: claiment_name,
		// policy_no: policy_no,
		// policy_id: policy_id,
		// date_to:date_to,
		// policy_type_id:policy_type_id,
		// date_of_al:date_of_al,
		// tpa:tpa,
		// hospital_name:hospital_name,
		// diagnosis:diagnosis,
		// id:id,

		//$id = $this->input->post("id");

		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('claiment_name', 'Claiment Name', 'trim|required');
		// $this->form_validation->set_rules('hospital_name', 'Name Of Hospital', 'trim|required');
		// $this->form_validation->set_rules('date_of_al', 'Date Of Admission', 'trim|required');
		// $this->form_validation->set_rules('diagnosis', 'Diagnosis', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(	
				"claiment_name_error" => form_error("claiment_name"),
				// "hospital_name_error" => form_error("hospital_name"),
				// "date_of_al_error" => form_error("date_of_al"),
				// "diagnosis_error" => form_error("diagnosis")
			);
		} else {

			$policy_holder_id = $this->input->post("policy_holder_id");
			$claiment_name = $this->input->post("claiment_name");
			$policy_no 	= $this->input->post("policy_no");
			$policy_id = $this->input->post("policy_id");
			$date_to = $this->input->post("date_to");
			$policy_type_id = $this->input->post("policy_type_id");
			$tpa = $this->input->post("tpa");
			$hospital_details = json_encode($this->input->post("hospital_details"));
			// $date_of_al = $this->input->post("date_of_al");
			//$hospital_name = $this->input->post("hospital_name");
			//$diagnosis = $this->input->post("diagnosis");
			$id 			= $this->input->post("id");

			// print_r($claiment_name);
			// die();

			$type = '';

			$this->db->trans_start();
			if ($this->input->post() != "") {
				
				// $add_arr[] = array(
				// 	'cmi_fk_policy_id' => $policy_id,
				// 	'cmi_fk_policy_holder' => $policy_holder_id,
				// 	'cmi_fk_policy_claiment' => $claiment_name,
				// 	'cmi_fk_policy_inc_company' => $policy_id,
				// 	'cmi_fk_policy_type' => $policy_type_id,
				// 	'cmi_fk_policy_number' => $policy_no,
				// 	'cmi_fk_policy_exp_date' => $date_to,
				// 	'cmi_fk_policy_tpa' => $tpa,
				// 	'cmi_hospital_details' => $hospital_details,
				// 	// 'cmi_hospital_name' => $hospital_name,
				// 	// 'cmi_admission_date' => $date_of_al,
				// 	// 'cmi_diagnosis' => $diagnosis,
				// 	'created_date' => date("Y-m-d h:i:s"),
				// 	'mod_date' =>  date("Y-m-d")
				// );

				if(!empty($id)){

					$add_arr[] = array(
						'cmi_fk_policy_id' => $policy_id,
						'cmi_fk_policy_holder' => $policy_holder_id,
						'cmi_fk_policy_claiment' => $claiment_name,
						'cmi_fk_policy_inc_company' => $policy_id,
						'cmi_fk_policy_type' => $policy_type_id,
						'cmi_fk_policy_number' => $policy_no,
						'cmi_fk_policy_exp_date' => $date_to,
						'cmi_fk_policy_tpa' => $tpa,
						'cmi_hospital_details' => $hospital_details,
						// 'cmi_hospital_name' => $hospital_name,
						// 'cmi_admission_date' => $date_of_al,
						// 'cmi_diagnosis' => $diagnosis,
						'created_date' => date("Y-m-d h:i:s"),
						'mod_date' =>  date("Y-m-d"),
						'mcmdic_id' => $id
					);

					$type = 'Updated';
					$this->Mquery_model_v3->updateBatchQuery($tableName = "claim_mediclaim_intimation", $add_arr, $updateKey = "mcmdic_id", $whereArr = array("mcmdic_id"=> $id), $likeCondtnArr = array(), $whereInArray = array());
				}else{

					$add_arr[] = array(
						'cmi_fk_policy_id' => $policy_id,
						'cmi_fk_policy_holder' => $policy_holder_id,
						'cmi_fk_policy_claiment' => $claiment_name,
						'cmi_fk_policy_inc_company' => $policy_id,
						'cmi_fk_policy_type' => $policy_type_id,
						'cmi_fk_policy_number' => $policy_no,
						'cmi_fk_policy_exp_date' => $date_to,
						'cmi_fk_policy_tpa' => $tpa,
						'cmi_hospital_details' => $hospital_details,
						// 'cmi_hospital_name' => $hospital_name,
						// 'cmi_admission_date' => $date_of_al,
						// 'cmi_diagnosis' => $diagnosis,
						'created_date' => date("Y-m-d h:i:s"),
						'mod_date' =>  date("Y-m-d")
					);

					$type = 'Added';
					$this->Mquery_model_v3->addQuery($tableName = "claim_mediclaim_intimation", $add_arr, $return_type = "");
				}

			}
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support";
			} else{
				$validator["status"] = true;
				$validator["message"] = "Mediclaim Inti... is ".$type." Successfully.";
			}
		}
		echo json_encode($validator);

	}


	public function save_claim_step_two(){

		//$id = $this->input->post("id");
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('status', 'Actual Claim Status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(	
				"status" => form_error("status")
			);
		} else {

			$actual_surveyour_details = json_encode($this->input->post("actual_surveyour_details"));
			$actual_survey_details = json_encode($this->input->post("actual_survey_details"));
			$actual_document_required = json_encode($this->input->post("actual_document_required"));
			$actual_document_required_client = json_encode($this->input->post("actual_document_required_client"));
			$actual_query_upload = json_encode($this->input->post("actual_query_upload"));
			$actual_query_letter_reply = json_encode($this->input->post("actual_query_letter_reply"));
			$status = $this->input->post("status");
			$id = $this->input->post("id");

			if($actual_surveyour_details==null || $actual_surveyour_details=='null'){
				$actual_surveyour_details = '[]';
			}

			if($actual_survey_details==null || $actual_survey_details=='null'){
				$actual_survey_details = '[]';
			}

			if($actual_document_required==null || $actual_document_required=='null'){
				$actual_document_required = '[]';
			}

			if($actual_document_required_client==null || $actual_document_required_client=='null'){
				$actual_document_required_client = '[]';
			}

			if($actual_query_upload==null || $actual_query_upload=='null'){
				$actual_query_upload = '[]';
			}

			if($actual_query_letter_reply==null || $actual_query_letter_reply=='null'){
				$actual_query_letter_reply = '[]';
			}

			$this->db->trans_start();
			if ($this->input->post() != "") {
				
				$updateArr[] = array(
					'claim_main_id' => $id,
					'actual_claim_status' => $status,
					'doc_requirment_list' => $actual_document_required,
					'svyr_details_list' => $actual_surveyour_details,
					'qry_letter_list' => $actual_query_upload,
					'srvey_details_list' => $actual_survey_details,
					'doc_received_from_client_list' => $actual_document_required_client,
					'qry_letter_reply_list' => $actual_query_letter_reply
				);

				// $whereArr["claim_main_others.id"] = $id;
				$this->Mquery_model_v3->updateBatchQuery($tableName = "claim_main_others", $updateArr, $updateKey = "claim_main_id", $whereArr=array("claim_main_others.claim_main_id", $id), $likeCondtnArr = array(), $whereInArray = array());

			}
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support";
			} else{
				$validator["status"] = true;
				$validator["message"] = "Claim Step Two Updated Successfully.";
			}
		}
		echo json_encode($validator);

	}

	public function up()
	{	
		$policy_upload_file_name = "";
		if (!empty($_FILES["file"])) {

			$policy_upload_data = $_FILES["file"]["name"];
			$type = $this->input->post("type");

			$policy_upload_img = $this->file_lib->file_upload($img_name = "file", $directory_name = "./claims/".$type."/", $overwrite = False, $allowed_types = "pdf|Pdf", $max_size = "1024000", $max_width = "1024", $max_height = "1024", $remove_spaces = TRUE, $encrypt_name = False, $string ='SurveyDetails', $url = "", $user_session_id = "_Policy_No_");

			if ($policy_upload_img["error"] != "") {
				$validator["status"] = false;
				$validator["messages"]["survey_details_file_err"]  = $policy_upload_img["error"];
				//echo json_encode($validator);
				echo false;
				die();
			} elseif ($policy_upload_img["file_name"] != "") {
				$policy_upload_file_name = $policy_upload_img["file_name"];
				$policy_upload_file_size = $policy_upload_img["file_size"];
				$policy_upload_file_type = $policy_upload_img["file_type"];
			}
		}

		if (!empty($policy_upload_file_name)) {
			$result["status"] = true;
			$result["file_name"] = $policy_upload_file_name;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["file_name"] = array();
			$result["message"] = array();
		}

		echo json_encode($result);

	}

	public function mediclaim_up()
	{	
		$policy_upload_file_name = "";
		if (!empty($_FILES["file"])) {

			$policy_upload_data = $_FILES["file"]["name"];
			$type = $this->input->post("type");

			$policy_upload_img = $this->file_lib->file_upload($img_name = "file", $directory_name = "./claims/".$type."/", $overwrite = False, $allowed_types = "pdf|Pdf", $max_size = "1024000", $max_width = "1024", $max_height = "1024", $remove_spaces = TRUE, $encrypt_name = False, $string ='Mediclaim', $url = "", $user_session_id = "_Policy_No_");

			if ($policy_upload_img["error"] != "") {
				$validator["status"] = false;
				$validator["messages"]["survey_details_file_err"]  = $policy_upload_img["error"];
				//echo json_encode($validator);
				echo false;
				die();
			} elseif ($policy_upload_img["file_name"] != "") {
				$policy_upload_file_name = $policy_upload_img["file_name"];
				$policy_upload_file_size = $policy_upload_img["file_size"];
				$policy_upload_file_type = $policy_upload_img["file_type"];
			}
		}

		if (!empty($policy_upload_file_name)) {
			$result["status"] = true;
			$result["file_name"] = $policy_upload_file_name;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["file_name"] = array();
			$result["message"] = array();
		}

		echo json_encode($result);

	}

	//get_questions_list
	public function filter_questions_list()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_claim_type = $this->input->post("filter_claim_type");

		$groupByArr = array(
			"claim_question.id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(claim_question.created_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(claim_question.created_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(claim_question.created_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(claim_question.created_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(claim_question.created_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(claim_question.created_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(claim_question.created_date,'%d')"] = $filter_day;
			}
			if (!empty($filter_claim_type))
				$likeCondtnArr["claim_question.claims_type"] = $filter_claim_type;

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames =  "claim_question.id , claim_question.claims_type, claim_question.format, claim_question.question, DATE_FORMAT(claim_question.created_date,'%d-%m-%Y') as created_date, claim_question.mod_date, claim_question.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_claim_quest_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["question_data"] = $result2;
			$result["total_claim_quest_data"] = $total_claim_quest_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["question_data"] = array();
			$result["total_claim_quest_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}
	public function get_questions_list()
	{
		$validator = array('status' => false, 'messages' => array());

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames =  "claim_question.id , claim_question.claims_type, claim_question.format, claim_question.question, DATE_FORMAT(claim_question.created_date,'%d-%m-%Y') as created_date, claim_question.mod_date, claim_question.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_claim_quest_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["question_data"] = $result2;
			$result["total_claim_quest_data"] = $total_claim_quest_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["question_data"] = array();
			$result["total_claim_quest_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);

	} 

	//get_claim_list
	public function filter_claims_list()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_company = $this->input->post("filter_company");
		$filter_claiment = $this->input->post("filter_claiment");
		$filter_policy_name = $this->input->post("filter_policy_name");

		$groupByArr = array(
			"claim_main_others.claim_main_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(claim_main_others.date_loss_addmission,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(claim_main_others.date_loss_addmission,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(claim_main_others.date_loss_addmission,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(claim_main_others.date_loss_addmission,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(claim_main_others.date_loss_addmission,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(claim_main_others.date_loss_addmission,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(claim_main_others.date_loss_addmission,'%d')"] = $filter_day;
			}
			if (!empty($filter_company))
				$whereArr["policy_member_details.fk_company_id"] = $filter_company;
			if (!empty($filter_claiment))
				$whereArr["claim_main_others.id_of_claiment"] = $filter_claiment;
			if (!empty($filter_policy_name))
				$whereArr["claim_main_others.name_of_policy"] = $filter_policy_name;

				$joins_main[] = array("tbl" => "policy_member_details", "condtn" => "claim_main_others.policy_id=policy_member_details.policy_id", "type" => "left");
				$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id=customermem_tbl.id", "type" => "left");
				$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id=master_company.mcompany_id", "type" => "left");
				$joins_main[] = array("tbl" => "claim_question", "condtn" => "claim_main_others.name_of_policy=claim_question.id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_main_others", $colNames =  "*,policy_member_details.policy_id,policy_member_details.fk_company_id,policy_member_details.fk_cust_member_id,claim_question.claims_type,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name,DATE_FORMAT(claim_main_others.date_loss_addmission,'%d-%m-%Y') as date_loss_addmission", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_medi_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["question_data"] = $result2;
			$result["total_medi_data"] = $total_medi_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["question_data"] = array();
			$result["total_medi_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_claims_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$joins_main[] = array("tbl" => "policy_member_details", "condtn" => "claim_main_others.policy_id=policy_member_details.policy_id", "type" => "left");
		$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id=customermem_tbl.id", "type" => "left");
		$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id=master_company.mcompany_id", "type" => "left");
		$joins_main[] = array("tbl" => "claim_question", "condtn" => "claim_main_others.name_of_policy=claim_question.id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_main_others", $colNames =  "*,policy_member_details.policy_id,policy_member_details.fk_company_id,policy_member_details.fk_cust_member_id,claim_question.claims_type,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name,DATE_FORMAT(claim_main_others.date_loss_addmission,'%d-%m-%Y') as date_loss_addmission", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("claim_main_others.claim_main_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_claim_data = count($result2);
		// print_r($result);
		// die();
		if (!empty($result2)) {
			$result["status"] = true;
			$result["question_data"] = $result2;
			$result["total_claim_data"] = $total_claim_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["question_data"] = array();
			$result["total_claim_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);

	}



	//get_mediclaim_list

	public function filter_mediclaims_list()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_company = $this->input->post("filter_company");
		$filter_claiment = $this->input->post("filter_claiment");
		$filter_policy_name = $this->input->post("filter_policy_name");
		$filter_remark = $this->input->post("filter_remark");

		$groupByArr = array(
			"claim_mediclaim_intimation.mcmdic_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%d')"] = $filter_day;
			}
			if (!empty($filter_company))
				$whereArr["claim_mediclaim_intimation.cmi_fk_policy_inc_company"] = $filter_company;
			if (!empty($filter_claiment))
				$whereArr["claim_mediclaim_intimation.cmi_fk_policy_claiment"] = $filter_claiment;
			if (!empty($filter_policy_name))
				$whereArr["claim_mediclaim_intimation.cmi_fk_policy_type"] = $filter_policy_name;

			$joins_main[] = array("tbl" => "policy_member_details", "condtn" => "claim_mediclaim_intimation.cmi_fk_policy_id = policy_member_details.policy_id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "claim_mediclaim_intimation.cmi_fk_policy_claiment = customermem_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id=master_company.mcompany_id", "type" => "left");
	
			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "claim_mediclaim_intimation.cmi_fk_policy_type = master_policy_type.policy_type_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_mediclaim_intimation", $colNames =  "*,master_policy_type.*,policy_member_details.policy_id,policy_member_details.fk_company_id,policy_member_details.fk_cust_member_id,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name,claim_mediclaim_intimation.del_flag as cmi_del_flag,claim_mediclaim_intimation.cmi_fk_policy_inc_company,claim_mediclaim_intimation.cmi_fk_policy_claiment,claim_mediclaim_intimation.cmi_fk_policy_holder,claim_mediclaim_intimation.cmi_fk_policy_type,DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%d-%m-%Y') as cmi_admission_date", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_medi_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["question_data"] = $result2;
			$result["total_medi_data"] = $total_medi_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["question_data"] = array();
			$result["total_medi_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_mediclaims_list()
	{

		$validator = array('status' => false, 'messages' => array());
		$joins_main[] = array("tbl" => "policy_member_details", "condtn" => "claim_mediclaim_intimation.cmi_fk_policy_id = policy_member_details.policy_id", "type" => "left");
		$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "claim_mediclaim_intimation.cmi_fk_policy_claiment = customermem_tbl.id", "type" => "left");
		$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id=master_company.mcompany_id", "type" => "left");

		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "claim_mediclaim_intimation.cmi_fk_policy_type = master_policy_type.policy_type_id", "type" => "left");

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_mediclaim_intimation", $colNames =  "*,master_policy_type.*,policy_member_details.policy_id,policy_member_details.fk_company_id,policy_member_details.fk_cust_member_id,CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS member_name,claim_mediclaim_intimation.del_flag as cmi_del_flag,claim_mediclaim_intimation.cmi_fk_policy_inc_company,claim_mediclaim_intimation.cmi_fk_policy_claiment,claim_mediclaim_intimation.cmi_fk_policy_holder,claim_mediclaim_intimation.cmi_fk_policy_type,DATE_FORMAT(claim_mediclaim_intimation.cmi_admission_date,'%d-%m-%Y') as cmi_admission_date", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array("claim_mediclaim_intimation.mcmdic_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_medi_data = count($result2);
		// echo $this->db->last_query();
		// die();

		// print_r($result);total_medi_data
		// die();
		if (!empty($result2)) {
			$result["status"] = true;
			$result["question_data"] = $result2;
			$result["total_medi_data"] = $total_medi_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["question_data"] = array();
			$result["total_medi_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);

	}



	public function remove_question()
	{
		
		if ($this->input->post() != "") {
			$nid = $this->input->post("id");
			//$status = $this->input->post("status");
			$array = explode (":", $nid); 
			$id = $array[0];
			$status = $array[1];

			// print_r($id);
			// print_r($status);
			// die();

			$updateArr[] = array(
				"id" => $id,
				"del_flag" => $status, //1:Running, 0:Deleted
			);
			if ($id != "") {
				$whereArr["claim_question.id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "claim_question", $updateArr, $updateKey = "id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames =  "*", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$result = $query["userData"];

				if($status==1){
					$result["status"] = true;
					$result["userdata"] = $result;
					$result["message"] = "Claim Question Recovered Successfully.";
				}else{
					$result["status"] = true;
					$result["userdata"] = $result;
					$result["message"] = "Claim Question Remove Successfully.";
				}
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Performing Delete/Recover Action.";
			}
			echo json_encode($result);
		}
	}


	public function remove_mediclaim()
	{
		
		if ($this->input->post() != "") {
			$nid = $this->input->post("id");
			//$status = $this->input->post("status");
			$array = explode (":", $nid); 
			$id = $array[0];
			$status = $array[1];

			// print_r($id);
			// print_r($status);
			// die();

			$updateArr[] = array(
				"mcmdic_id" => $id,
				"del_flag" => $status, //1:Running, 0:Deleted
			);
			if ($id != "") {
				$whereArr["claim_mediclaim_intimation.mcmdic_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "claim_mediclaim_intimation", $updateArr, $updateKey = "mcmdic_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_mediclaim_intimation", $colNames =  "*", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
				$result = $query["userData"];

				if($status==1){
					$result["status"] = true;
					$result["userdata"] = $result;
					$result["message"] = "Mediclaim Recovered Successfully.";
				}else{
					$result["status"] = true;
					$result["userdata"] = $result;
					$result["message"] = "Mediclaim Remove Successfully.";
				}
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Performing Delete/Recover Action.";
			}
			echo json_encode($result);
		}
	}


	// load data on add_claim form

	public function loadAddClaimData()
	{
		$validator = array('status' => false, 'messages' => array());
		$policy_id = $this->input->post("policy_id");

		if ($policy_id != "") {

			$whereArr["policy_member_details.policy_id"] = $policy_id;
			$joins_main[] = array("tbl" => "master_company", "condtn" => "policy_member_details.fk_company_id = master_company.mcompany_id", "type" => "left");
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "policy_member_details.fk_client_id = customer_tbl.id", "type" => "left");
			$joins_main[] = array("tbl" => "customermem_tbl", "condtn" => "policy_member_details.fk_cust_member_id = customermem_tbl.id", "type" => "left");
			
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "policy_member_details", 
			$colNames =  "policy_member_details.*, master_company.*, customer_tbl.*, customermem_tbl.*", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];

			$member_list = array();
			if ($result["fk_client_id"] != "") {
				$whereArr_data["customermem_tbl.customer_id"] = $result["fk_client_id"];
				$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ', REPLACE(customermem_tbl.surname,'null','')) AS name, customermem_tbl.contact, customermem_tbl.email", $whereArr = $whereArr_data, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$member_list = $query2["userData"];
			}
			$result["member_data_arr"] = $member_list;

			$question_list = array();
			if ($result["fk_client_id"] != "") {
				$query3 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "claim_question", $colNames = "*", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("claim_question.claims_type" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
				$question_list = $query3["userData"];
			}
			$result["question_list_data_arr"] = $question_list;

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



}
