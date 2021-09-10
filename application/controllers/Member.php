<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
		$this->data["title"] = $title = "Member";
		$this->data['method'] = $this->router->fetch_method();
		$this->data['class'] = $this->router->fetch_class();
	}
	// Member Section Start

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

		$this->data["main_page"] = "master/member/member_list";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_member_list()
	{
		$filter_grp_name = $this->input->post("filter_grp_name");
		$filter_name = $this->input->post("filter_name");
		$filter_middle_name = $this->input->post("filter_middle_name");
		$filter_surename = $this->input->post("filter_surename");
		$filter_contact = $this->input->post("filter_contact");
		$filter_email = $this->input->post("filter_email");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"customermem_tbl.id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_grp_name))
				$whereArr["customermem_tbl.customer_id"] = $filter_grp_name;
			if (!empty($filter_name))
				$likeCondtnArr["customermem_tbl.name"] = $filter_name;
			if (!empty($filter_middle_name))
				$likeCondtnArr["customermem_tbl.middle_name"] = $filter_middle_name;
			if (!empty($filter_surename))
				$likeCondtnArr["customermem_tbl.surname"] = $filter_surename;
			if (!empty($filter_contact))
				$likeCondtnArr["customermem_tbl.contact"] = $filter_contact;
			if (!empty($filter_email))
				$likeCondtnArr["customermem_tbl.email"] = $filter_email;
			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["customermem_tbl.status"] = $filter_status;
			}
			$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "customermem_tbl.customer_id = customer_tbl.id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, customermem_tbl.customer_id, customermem_tbl.name, customermem_tbl.middle_name, customermem_tbl.surname, customermem_tbl.contact, customermem_tbl.email, customermem_tbl.username, customermem_tbl.password, customermem_tbl.role_type, customermem_tbl.allow_access_to, customermem_tbl.address, customermem_tbl.relation, customermem_tbl.title, customermem_tbl.gender, customermem_tbl.dob, customermem_tbl.education, customermem_tbl.proffession, customermem_tbl.martial_status, customermem_tbl.dom, customermem_tbl.annual_income, customermem_tbl.status, customermem_tbl.is_delete, customermem_tbl.document, customer_tbl.grpname", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array("customer_tbl.grpname" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$count_member = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["count_member"] = $count_member;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["count_member"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_member_list()
	{
		$today_date = date('Y-m-d');
		$year = date('Y');
		$validator = array('status' => false, 'messages' => array());
		$joins_main[] = array("tbl" => "customer_tbl", "condtn" => "customermem_tbl.customer_id = customer_tbl.id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames = "customermem_tbl.id, customermem_tbl.customer_id, customermem_tbl.name, customermem_tbl.middle_name, customermem_tbl.surname, customermem_tbl.contact, customermem_tbl.email, customermem_tbl.username, customermem_tbl.password, customermem_tbl.role_type, customermem_tbl.allow_access_to, customermem_tbl.address, customermem_tbl.relation, customermem_tbl.title, customermem_tbl.gender, customermem_tbl.dob, customermem_tbl.education, customermem_tbl.proffession, customermem_tbl.martial_status, customermem_tbl.dom, customermem_tbl.annual_income, customermem_tbl.status, customermem_tbl.is_delete, customermem_tbl.document, customer_tbl.grpname", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("customer_tbl.grpname" => "ASC"), $groupByArr = array("customermem_tbl.id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$count_member = count($result2);

		// $age = (date_diff(date_create('11-04-1997'),date_create($today_date))/365); 
		// (DATEDIFF($today_date, STR_TO_DATE(dob, '%Y-%m-%d'))/365) as age 
		// TIMESTAMPDIFF($year,dob,$today_date) AS age
		// $age = date_diff(date_create($dob), date_create($curr_date))->y;
		// print_r($count_member);
		// print_r($age);
		// print_r($result);
		// die("Test");
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["count_member"] = $count_member;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["count_member"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function remove_member()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"id" => $id,
				"is_delete" => 1, //0:Running, 1:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["customermem_tbl.id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "customermem_tbl", $updateArr, $updateKey = "id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =  "customermem_tbl.id, customermem_tbl.customer_id, customermem_tbl.name, customermem_tbl.middle_name, customermem_tbl.surname, customermem_tbl.contact, customermem_tbl.email, customermem_tbl.username, customermem_tbl.password, customermem_tbl.role_type, customermem_tbl.allow_access_to, customermem_tbl.address, customermem_tbl.relation, customermem_tbl.title, customermem_tbl.gender, customermem_tbl.dob, customermem_tbl.education, customermem_tbl.proffession, customermem_tbl.martial_status, customermem_tbl.dom, customermem_tbl.annual_income, customermem_tbl.status, customermem_tbl.is_delete", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $this->data["title"] . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing " . $this->data["title"] . ".";
			}
			echo json_encode($result);
		}
	}

	public function recover_member()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"id" => $id,
				"is_delete" => 0, //0:Running, 1:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["customermem_tbl.id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "customermem_tbl", $updateArr, $updateKey = "id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =  "customermem_tbl.id, customermem_tbl.customer_id, customermem_tbl.name, customermem_tbl.middle_name, customermem_tbl.surname, customermem_tbl.contact, customermem_tbl.email, customermem_tbl.username, customermem_tbl.password, customermem_tbl.role_type, customermem_tbl.allow_access_to, customermem_tbl.address, customermem_tbl.relation, customermem_tbl.title, customermem_tbl.gender, customermem_tbl.dob, customermem_tbl.education, customermem_tbl.proffession, customermem_tbl.martial_status, customermem_tbl.dom, customermem_tbl.annual_income, customermem_tbl.status, customermem_tbl.is_delete", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $this->data["title"] . " Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover " . $this->data["title"] . ".";
			}
			echo json_encode($result);
		}
	}

	public function update_member_status()
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
				"id" => $id,
				"status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["customermem_tbl.id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "customermem_tbl", $updateArr, $updateKey = "id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customermem_tbl", $colNames =  "customermem_tbl.id, customermem_tbl.customer_id, customermem_tbl.name, customermem_tbl.middle_name, customermem_tbl.surname, customermem_tbl.contact, customermem_tbl.email, customermem_tbl.username, customermem_tbl.password, customermem_tbl.role_type, customermem_tbl.allow_access_to, customermem_tbl.address, customermem_tbl.relation, customermem_tbl.title, customermem_tbl.gender, customermem_tbl.dob, customermem_tbl.education, customermem_tbl.proffession, customermem_tbl.martial_status, customermem_tbl.dom, customermem_tbl.annual_income, customermem_tbl.status, customermem_tbl.is_delete", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $this->data["title"] . " " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $this->data["title"] . " Status.";
			}
			echo json_encode($result);
		}
	}

	public function view_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(3); //1: Pan Card , 2:Aadhar Card ,3 : Passport , 4: Gst , 5: Birth Certificate , 5: Photo
		$this->data["member_id"] = $member_id = (int)$this->uri->segment(4);
		$this->data["image"] = $image = $this->uri->segment(5);
		// print_r($doc_type);
		// die("Test");
		if (!empty($image) || !empty($image)) {
			if ($doc_type == 1) {
				$document_file = $image;
				// print_r($document_file);
				// die("Test");
				//pdf|doc|docx|Pdf|jpeg|jpg|png
				$extension = pathinfo("assets/member_doc/pan_image/" . $document_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/member_doc/pan_image/" . $document_file);
			} elseif ($doc_type == 2) {
				$document_file = $image;
				$file = file_get_contents("./assets/member_doc/aadhar_image/" . $document_file);
				$extension = pathinfo("assets/member_doc/aadhar_image/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 3) {
				$document_file = $image;
				$file = file_get_contents("./assets/member_doc/passport_image/" . $document_file);
				$extension = pathinfo("assets/member_doc/passport_image/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 4) {
				$document_file = $image;
				$file = file_get_contents("./assets/member_doc/gst_image/" . $document_file);
				$extension = pathinfo("assets/member_doc/gst_image/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 5) {
				$document_file = $image;
				$file = file_get_contents("./assets/member_doc/birth_certificate/" . $document_file);
				$extension = pathinfo("assets/member_doc/birth_certificate/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 6) {
				$document_file = $image;
				$file = file_get_contents("./assets/member_doc/photo/" . $document_file);
				$extension = pathinfo("assets/member_doc/photo/" . $document_file, PATHINFO_EXTENSION);
			}
			// print_r($extension);
			// die("Test");
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}
	// Member Section End

	public function circular_doc()
	{
		$this->data["title"] = $title = "Circular Document";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => "Circular Document List",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/member/circular_document";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_circular_doc_list()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_company = $this->input->post("filter_company");
		$filter_department = $this->input->post("filter_department");
		$filter_policy_name = $this->input->post("filter_policy_name");
		$filter_remark = $this->input->post("filter_remark");

		$groupByArr = array(
			"master_plans_policy_circular_doc.circular_doc_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%d')"] = $filter_day;
			}
			if (!empty($filter_company))
				$whereArr["master_plans_policy_circular_doc.fk_company_id"] = $filter_company;
			if (!empty($filter_department))
				$whereArr["master_plans_policy_circular_doc.fk_department_id"] = $filter_department;
			if (!empty($filter_policy_name))
				$whereArr["master_plans_policy_circular_doc.fk_policy_type_id"] = $filter_policy_name;
			if (!empty($filter_remark))
				$likeCondtnArr["master_plans_policy_circular_doc.circular_doc_reason"] = $filter_remark;

			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy_circular_doc.fk_company_id = master_company.mcompany_id ", "type" => "left");

			$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy_circular_doc.fk_department_id = master_department.department_id ", "type" => "left");

			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy_circular_doc.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames = "master_plans_policy_circular_doc.circular_doc_id, DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%d-%m-%Y') as circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_reason, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag, master_plans_policy_circular_doc.create_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array("TIMESTAMP(master_plans_policy_circular_doc.circular_doc_date)" => "DESC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$count_doc = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["count_doc"] = $count_doc;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["count_doc"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_circular_doc_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$circular_doc_list = array();
		$count_doc = "";
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_plans_policy_circular_doc.fk_company_id = master_company.mcompany_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_plans_policy_circular_doc.fk_department_id = master_department.department_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_plans_policy_circular_doc.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");

		$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_plans_policy_circular_doc", $colNames = "master_plans_policy_circular_doc.circular_doc_id, DATE_FORMAT(master_plans_policy_circular_doc.circular_doc_date,'%d-%m-%Y') as circular_doc_date, master_plans_policy_circular_doc.circular_doc_name, master_plans_policy_circular_doc.circular_doc_reason, master_plans_policy_circular_doc.circular_doc_status, master_plans_policy_circular_doc.circular_doc_del_flag, master_plans_policy_circular_doc.create_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("TIMESTAMP(master_plans_policy_circular_doc.circular_doc_date)" => "DESC"), $groupByArr = array("master_plans_policy_circular_doc.circular_doc_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$circular_doc_list = $query2["userData"];
		$count_doc = count($circular_doc_list);

		if (!empty($circular_doc_list)) {
			$result["status"] = true;
			$result["userdata"] = $circular_doc_list;
			$result["count_doc"] = $count_doc;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["count_doc"] = "";
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	// Proposal Document Section Start
	public function proposal_doc()
	{
		$this->data["title"] = $title = "Proposal Document";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => "Proposal Document List",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/member/proposal_form";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_proposal_doc_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$proposal_doc_list = array();
		$count_doc = "";
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_proposal_doc.fk_company_id = master_company.mcompany_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_proposal_doc.fk_department_id = master_department.department_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_proposal_doc.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");

		$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_proposal_doc", $colNames = "master_proposal_doc.proposal_doc_id, DATE(master_proposal_doc.proposal_doc_date) as proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_reason, master_proposal_doc.proposal_doc_status, master_proposal_doc.proposal_doc_del_flag, master_proposal_doc.create_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("TIMESTAMP(master_proposal_doc.proposal_doc_date)" => "DESC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$proposal_doc_list = $query2["userData"];
		$count_doc = count($proposal_doc_list);

		if (!empty($proposal_doc_list)) {
			$result["status"] = true;
			$result["userdata"] = $proposal_doc_list;
			$result["count_doc"] = $count_doc;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["count_doc"] = "";
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_proposal_upload()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
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

				$proposal_date = $this->security->xss_clean($this->input->post('proposal_date'));
				$proposal_doc_reason = $this->security->xss_clean($this->input->post('proposal_doc_reason'));
				$company_short_name = "";

				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				if (!empty($_FILES["proposal_upload"])) {
					$proposal_upload_data = $_FILES["proposal_upload"]["name"];
					$proposal_upload_img = $this->file_lib->file_upload($img_name = "proposal_upload", $directory_name = "./assets/plans_policy/proposal_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

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

				if (!empty($proposal_date) && !empty($proposal_upload_file_name)) {
					$add_proposal_doc_arr[] = array(
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
					// print_r($add_proposal_doc_arr);
					// die();
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_proposal_doc", $add_proposal_doc_arr, $return_type = "lastID");
					$proposal_doc_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	
			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "Proposal Documnet is Uploaded Successfully.";
			}
		}

		echo json_encode($validator);
	}

	public function remove_proposal_doc()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"proposal_doc_id" => $id,
				"proposal_doc_del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_proposal_doc.proposal_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_proposal_doc", $updateArr, $updateKey = "proposal_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_proposal_doc", $colNames =  "master_proposal_doc.proposal_doc_id, DATE(master_proposal_doc.proposal_doc_date) as proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_status, master_proposal_doc.proposal_doc_del_flag, master_proposal_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Proposal Documnet Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Proposal Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function recover_proposal_doc()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"proposal_doc_id" => $id,
				"proposal_doc_del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_proposal_doc.proposal_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_proposal_doc", $updateArr, $updateKey = "proposal_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_proposal_doc", $colNames =   "master_proposal_doc.proposal_doc_id, DATE(master_proposal_doc.proposal_doc_date) as proposal_doc_date, master_proposal_doc.proposal_doc_name, master_proposal_doc.proposal_doc_status, master_proposal_doc.proposal_doc_del_flag, master_proposal_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Proposal Documnet Recovered Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recovered Proposal Documnet.";
			}
			echo json_encode($result);
		}
	}
	// Proposal Document Section End

	// Other Document Section Start
	public function other_doc()
	{
		$this->data["title"] = $title = "Other Document";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => "Other Document List",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/member/other_form";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_other_doc_list()
	{
		$filter_year = $this->input->post("filter_year");
		$filter_month = $this->input->post("filter_month");
		$filter_day = $this->input->post("filter_day");
		$filter_company = $this->input->post("filter_company");
		$filter_department = $this->input->post("filter_department");
		$filter_policy_name = $this->input->post("filter_policy_name");
		$filter_remark = $this->input->post("filter_remark");

		$groupByArr = array(
			"master_other_doc.other_doc_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_year) && !empty($filter_month) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(master_other_doc.other_doc_date,'%d-%m-%Y')"] = $filter_day . "-" . $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_year) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_other_doc.other_doc_date,'%m-%Y')"] = $filter_month . "-" . $filter_year;
			} elseif (!empty($filter_day) && !empty($filter_month)) {
				$whereArr["DATE_FORMAT(master_other_doc.other_doc_date,'%d-%m')"] = $filter_day . "-" . $filter_month;
			} elseif (!empty($filter_year) && !empty($filter_day)) {
				$whereArr["DATE_FORMAT(master_other_doc.other_doc_date,'%d-%Y')"] = $filter_day . "-" . $filter_year;
			} else {
				if (!empty($filter_year))
					$whereArr["DATE_FORMAT(master_other_doc.other_doc_date,'%Y')"] = $filter_year;

				if (!empty($filter_month))
					$whereArr["DATE_FORMAT(master_other_doc.other_doc_date,'%m')"] = $filter_month;

				if (!empty($filter_day))
					$whereArr["DATE_FORMAT(master_other_doc.other_doc_date,'%d')"] = $filter_day;
			}
			if (!empty($filter_company))
				$whereArr["master_other_doc.fk_company_id"] = $filter_company;
			if (!empty($filter_department))
				$whereArr["master_other_doc.fk_department_id"] = $filter_department;
			if (!empty($filter_policy_name))
				$whereArr["master_other_doc.fk_policy_type_id"] = $filter_policy_name;
			if (!empty($filter_remark))
				$likeCondtnArr["master_other_doc.other_doc_reason"] = $filter_remark;

			$joins_main[] = array("tbl" => "master_company", "condtn" => "master_other_doc.fk_company_id = master_company.mcompany_id ", "type" => "left");

			$joins_main[] = array("tbl" => "master_department", "condtn" => "master_other_doc.fk_department_id = master_department.department_id ", "type" => "left");

			$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_other_doc.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_other_doc", $colNames = "master_other_doc.other_doc_id, DATE_FORMAT(master_other_doc.other_doc_date,'%d-%m-%Y') as other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, master_other_doc.other_doc_status, master_other_doc.other_doc_del_flag, master_other_doc.create_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array("TIMESTAMP(master_other_doc.other_doc_date)" => "DESC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$count_doc = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["count_doc"] = $count_doc;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["count_doc"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_other_doc_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$other_doc_list = array();
		$count_doc = "";
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_other_doc.fk_company_id = master_company.mcompany_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_other_doc.fk_department_id = master_department.department_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_other_doc.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");

		$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_other_doc", $colNames = "master_other_doc.other_doc_id, DATE_FORMAT(master_other_doc.other_doc_date,'%d-%m-%Y') as other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_reason, master_other_doc.other_doc_status, master_other_doc.other_doc_del_flag, master_other_doc.create_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("TIMESTAMP(master_other_doc.other_doc_date)" => "DESC"), $groupByArr = array("master_other_doc.other_doc_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$other_doc_list = $query2["userData"];
		$count_doc = count($other_doc_list);

		if (!empty($other_doc_list)) {
			$result["status"] = true;
			$result["userdata"] = $other_doc_list;
			$result["count_doc"] = $count_doc;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["count_doc"] = "";
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function remove_other_doc()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"other_doc_id" => $id,
				"other_doc_del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_other_doc.other_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_other_doc", $updateArr, $updateKey = "other_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_other_doc", $colNames =  "master_other_doc.other_doc_id, DATE(master_other_doc.other_doc_date) as other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_status, master_other_doc.other_doc_del_flag, master_other_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Other Documnet Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Other Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function recover_other_doc()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"other_doc_id" => $id,
				"other_doc_del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_other_doc.other_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_other_doc", $updateArr, $updateKey = "other_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_other_doc", $colNames =   "master_other_doc.other_doc_id, DATE(master_other_doc.other_doc_date) as other_doc_date, master_other_doc.other_doc_name, master_other_doc.other_doc_status, master_other_doc.other_doc_del_flag, master_other_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Other Documnet Recovered Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recovered Other Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function update_other_upload()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
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

				$other_date = $this->security->xss_clean($this->input->post('other_date'));
				$other_doc_reason = $this->security->xss_clean($this->input->post('other_doc_reason'));
				$company_short_name = "";

				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				if (!empty($_FILES["other_upload"])) {
					$other_upload_data = $_FILES["other_upload"]["name"];
					$other_upload_img = $this->file_lib->file_upload($img_name = "other_upload", $directory_name = "./assets/plans_policy/other_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

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

				if (!empty($other_date) && !empty($other_upload_file_name)) {
					$add_other_doc_arr[] = array(
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
					// print_r($add_other_doc_arr);
					// die();
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_other_doc", $add_other_doc_arr, $return_type = "lastID");
					$other_doc_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	
			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "Other Documnet is Uploaded Successfully.";
			}
		}

		echo json_encode($validator);
	}
	// Other Document Section End

	// Claim Document Section Start
	public function claim_doc()
	{
		$this->data["title"] = $title = "Claim Document";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => "Claim Document List",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/member/claim_form";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_claim_doc_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$claim_doc_list = array();
		$count_doc = "";
		$joins_main[] = array("tbl" => "master_company", "condtn" => "master_claim_doc.fk_company_id = master_company.mcompany_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_department", "condtn" => "master_claim_doc.fk_department_id = master_department.department_id ", "type" => "left");

		$joins_main[] = array("tbl" => "master_policy_type", "condtn" => "master_claim_doc.fk_policy_type_id = master_policy_type.policy_type_id ", "type" => "left");

		$query2 = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_claim_doc", $colNames = "master_claim_doc.claim_doc_id, DATE(master_claim_doc.claim_doc_date) as claim_doc_date, master_claim_doc.claim_doc_name, master_claim_doc.claim_doc_reason, master_claim_doc.claim_doc_status, master_claim_doc.claim_doc_del_flag, master_claim_doc.create_date, master_company.company_name, master_department.department_name, master_policy_type.policy_type as policy_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("TIMESTAMP(master_claim_doc.claim_doc_date)" => "DESC"), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$claim_doc_list = $query2["userData"];
		$count_doc = count($claim_doc_list);

		if (!empty($claim_doc_list)) {
			$result["status"] = true;
			$result["userdata"] = $claim_doc_list;
			$result["count_doc"] = $count_doc;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["count_doc"] = "";
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_claim_upload()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
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

				$claim_date = $this->security->xss_clean($this->input->post('claim_date'));
				$claim_doc_reason = $this->security->xss_clean($this->input->post('claim_doc_reason'));
				$company_short_name = "";

				if (!empty($company_name_txt)) {
					$whereArr["master_company.company_name"] = $company_name_txt;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_company", $colNames =   "master_company.mcompany_id, master_company.company_name , master_company.short_name as company_short_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");
					$result = $query["userData"];
					$company_short_name = $result["company_short_name"];
				}

				if (!empty($_FILES["claim_upload"])) {
					$claim_upload_data = $_FILES["claim_upload"]["name"];
					$claim_upload_img = $this->file_lib->file_upload($img_name = "claim_upload", $directory_name = "./assets/plans_policy/claim_upload/", $overwrite = False, $allowed_types = "pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $company_short_name . "-" . $department_name_txt . "-" . $policy_name_txt, $url = "", $user_session_id = "_Policy_No_");

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

				if (!empty($claim_date) && !empty($claim_upload_file_name)) {
					$add_claim_doc_arr[] = array(
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
					// print_r($add_claim_doc_arr);
					// die();
					$query = $this->Mquery_model_v3->addQuery($tableName = "master_claim_doc", $add_claim_doc_arr, $return_type = "lastID");
					$claim_doc_id = $query["lastID"];
				}
			}
			$this->db->trans_complete();		// Transaction End	
			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "Claim Documnet is Uploaded Successfully.";
			}
		}

		echo json_encode($validator);
	}

	public function remove_claim_doc()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"claim_doc_id" => $id,
				"claim_doc_del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_claim_doc.claim_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_claim_doc", $updateArr, $updateKey = "claim_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_claim_doc", $colNames =  "master_claim_doc.claim_doc_id, DATE(master_claim_doc.claim_doc_date) as claim_doc_date, master_claim_doc.claim_doc_name, master_claim_doc.claim_doc_status, master_claim_doc.claim_doc_del_flag, master_claim_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Claim Documnet Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Claim Documnet.";
			}
			echo json_encode($result);
		}
	}

	public function recover_claim_doc()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"claim_doc_id" => $id,
				"claim_doc_del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_claim_doc.claim_doc_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_claim_doc", $updateArr, $updateKey = "claim_doc_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_claim_doc", $colNames =   "master_claim_doc.claim_doc_id, DATE(master_claim_doc.claim_doc_date) as claim_doc_date, master_claim_doc.claim_doc_name, master_claim_doc.claim_doc_status, master_claim_doc.claim_doc_del_flag, master_claim_doc.create_date", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Claim Documnet Recovered Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recovered Claim Documnet.";
			}
			echo json_encode($result);
		}
	}
	// Claim Document Section End

	public function download_all_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(3); //1: Policy Wording , 2:Claims Form ,3 : Circular Upload
		$this->data["doc_id"] = $doc_id = (int)$this->uri->segment(4);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(5);

		if (!empty($doc_name) || !empty($doc_name)) {
			if ($doc_type == 1)
				$document_file = $doc_name;
			elseif ($doc_type == 2)
				$document_file = $doc_name;
			elseif ($doc_type == 3)
				$document_file = $doc_name;
		}

		$this->load->helper('download');

		if ($document_file != "") {
			if ($doc_type == 1)
				$data = file_get_contents("./assets/plans_policy/proposal_upload/" . $document_file);
			elseif ($doc_type == 2)
				$data = file_get_contents("./assets/plans_policy/claim_upload/" . $document_file);
			elseif ($doc_type == 3)
				$data = file_get_contents("./assets/plans_policy/other_upload/" . $document_file);
		}

		force_download($document_file, $data);
	}

	public function view_all_doc()
	{
		$this->data["doc_type"] = $doc_type = (int)$this->uri->segment(3); //1: Policy Wording , 2:Claims Form ,3 : Circular Upload
		$this->data["doc_id"] = $doc_id = (int)$this->uri->segment(4);
		$this->data["doc_name"] = $doc_name = $this->uri->segment(5);
		// print_r($doc_name);
		// die("Test");
		if (!empty($doc_name) || !empty($doc_name)) {
			if ($doc_type == 1) {
				$document_file = $doc_name;
				$extension = pathinfo("assets/plans_policy/proposal_upload/" . $document_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./assets/plans_policy/proposal_upload/" . $document_file);
			} elseif ($doc_type == 2) {
				$document_file = $doc_name;
				$file = file_get_contents("./assets/plans_policy/claim_upload/" . $document_file);
				$extension = pathinfo("assets/plans_policy/claim_upload/" . $document_file, PATHINFO_EXTENSION);
			} elseif ($doc_type == 3) {
				$document_file = $doc_name;
				$file = file_get_contents("./assets/plans_policy/other_upload/" . $document_file);
				$extension = pathinfo("assets/plans_policy/other_upload/" . $document_file, PATHINFO_EXTENSION);
			}
			// print_r($doc_name);
			// die("Test");
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}
}
