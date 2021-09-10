<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Convert PHP tags to entities
 *
 * @access	public
 * @param	string
 * @return	string
 */
if (!function_exists("company_dropdown")) {
	function company_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_company.company_status"] = 1;
		$whereArr["master_company.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames = "master_company.mcompany_id, master_company.company_name, master_company.short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_company.company_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$company_list = $query["userData"];

		return $company_list;
	}
}

if (!function_exists("department_dropdown")) {
	function department_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_department.department_status"] = 1;
		$whereArr["master_department.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_department", $colNames = "master_department.department_id, master_department.department_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_department.department_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$department_list = $query["userData"];

		return $department_list;
	}
}

if (!function_exists("policy_type_dropdown")) {
	function policy_type_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_policy_type.policy_type_status"] = 1;
		$whereArr["master_policy_type.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_type", $colNames = "master_policy_type.policy_type_id, master_policy_type.policy_type", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_policy_type.policy_type_id" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$policy_type_list = $query["userData"];

		return $policy_type_list;
	}
}

if (!function_exists("document_dropdown")) {
	function document_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_document.document_status"] = 1;
		$whereArr["master_document.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_document", $colNames = "master_document.document_id, master_document.document_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_document.document_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$document_list = $query["userData"];

		return $document_list;
	}
}


if (!function_exists("agency_dropdown")) {
	function agency_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_agency.magency_status"] = 1;
		$whereArr["master_agency.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_agency", $colNames = "master_agency.magency_id, master_agency.name, master_agency.code", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_agency.name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$agency_list = $query["userData"];

		return $agency_list;
	}
}

if (!function_exists("subagency_dropdown")) {
	function subagency_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_sub_agent.sub_agent_status"] = 1;
		$whereArr["master_sub_agent.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_sub_agent", $colNames = "master_sub_agent.sub_agent_id, master_sub_agent.sub_agent_name, master_sub_agent.sub_agent_code", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_sub_agent.sub_agent_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$subagency_list = $query["userData"];

		return $subagency_list;
	}
}


if (!function_exists("client_groupname_dropdown")) { //Group Name and Client name
	function client_groupname_dropdown()
	{
		$CI = &get_instance();

		$whereArr["customer_tbl.c_status"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames = "customer_tbl.id, customer_tbl.grpname", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customer_tbl.grpname" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$client_groupname_list = $query["userData"];

		return $client_groupname_list;
	}
}


if (!function_exists("members_dropdown")) {
	function members_dropdown()
	{
		$CI = &get_instance();

		// $whereArr["customermem_tbl.status"] = 1;
		// $query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, customermem_tbl.name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		// $member_list = $query["userData"];

		$whereArr["customermem_tbl.status"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, CONCAT(customermem_tbl.name, ' ', REPLACE(customermem_tbl.middle_name,'null',''),' ',REPLACE(customermem_tbl.surname,'null','')) AS name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("customermem_tbl.name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$member_list = $query["userData"];

		return $member_list;
	}
}

if (!function_exists("relationship_dropdown")) {
	function relationship_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_relation.deleted"] = 0;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_relation", $colNames = "master_relation.id as relation_id, master_relation.relation as relation_title,master_relation.m_type,master_relation.deleted	", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_relation.relation" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$relationship_list = $query["userData"];
		// print_r($relationship_list);
		// die("debug 136");

		return $relationship_list;
	}
}


if (!function_exists("tpa_dropdown")) {
	function tpa_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_tpa.tpa_status"] = 1;
		$whereArr["master_tpa.tpa_status"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_tpa", $colNames = "master_tpa.mtpa_id, master_tpa.tpa_name,master_tpa.short_name,master_tpa.common_email,master_tpa.office_contact,master_tpa.tollfree_no_1,master_tpa.tollfree_no_2,master_tpa.website,master_tpa.ip,master_tpa.address,master_tpa.city,master_tpa.state,master_tpa.zipcode", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_tpa.tpa_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$tpa_list = $query["userData"];
		// print_r($tpa_list);
		// die("debug 136");

		return $tpa_list;
	}
}

if (!function_exists("staff_dropdown")) {
	function staff_dropdown()
	{
		$CI = &get_instance();

		$whereArr["staff.staff_status"] = 1;
		$whereArr["staff.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status,staff.role_permission, staff.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("staff.staff_name" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$staff_list = $query["userData"];
		// print_r($staff_list);
		// die("debug 136");

		return $staff_list;
	}
}

if (!function_exists("userrole_dropdown")) {
	function userrole_dropdown()
	{
		$CI = &get_instance();

		$whereArr["user_roles.user_role_status"] = 1;
		$whereArr["user_roles.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "user_roles", $colNames = "user_roles.user_role_id, user_roles.user_role_title, user_roles.user_role_status, user_roles.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("user_roles.user_role_title" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$user_role_list = $query["userData"];
		// print_r($tpa_list);
		// die("debug 136");

		return $user_role_list;
	}
}

if (!function_exists("task_title_dropdown")) {
	function task_title_dropdown()
	{
		$CI = &get_instance();

		$whereArr["master_task_title.task_title_status"] = 1;
		$whereArr["master_task_title.del_flag"] = 1;
		$query = $CI->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames = "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_task_title.task_title" => "ASC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$tasktitle_list = $query["userData"];
		// print_r($tasktitle_list);
		// die("debug 136");

		return $tasktitle_list;
	}
}