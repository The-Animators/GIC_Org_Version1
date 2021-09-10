<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Policy_masterquestionans extends Admin_gic_core
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
		// $button_allowed_data=button_allowed();

		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "tagsinput");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "tagsinput");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$this->data["title"] = $title = "Questions & Answer";
	}
	// Questions & Answer Section Start

	public function add_quest_ans()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('section', 'Section', 'trim|required');
		$this->form_validation->set_rules('question', 'Questions', 'trim|required');
		$this->form_validation->set_rules('answer', 'Answer', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"section_err" => form_error("section"),
				"question_err" => form_error("question"),
				"answer_err" => form_error("answer"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$section = $this->security->xss_clean($this->input->post('section'));
				$question = $this->security->xss_clean($this->input->post('question'));
				$answer = $this->security->xss_clean($this->input->post('answer'));

				$add_arr[] = array(
					'fk_policy_question_section_id' => $section,
					'question' => $question,
					'answer' => $answer,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_policy_question_ans", $add_arr, $return_type = "lastID");
				$policy_question_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($policy_question_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Questions & Answer is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_quest_ans()
	{
		$validator = array('status' => false, 'messages' => array());
		$policy_question_id = $this->input->post("policy_question_id");

		if ($policy_question_id != "") {
			$joins_main[] = array("tbl" => "master_policy_question_section", "condtn" => "master_policy_question_ans.fk_policy_question_section_id = master_policy_question_section.policy_question_section_id", "type" => "left");
			$whereArr["master_policy_question_ans.policy_question_id"] = $policy_question_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_ans", $colNames =  "master_policy_question_ans.policy_question_id, master_policy_question_ans.question, master_policy_question_ans.answer, master_policy_question_ans.fk_policy_question_section_id, master_policy_question_ans.quest_ans_status, master_policy_question_ans.del_flag, master_policy_question_section.policy_question_section_name", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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

	public function update_quest_ans()
	{
		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('section', 'Section', 'trim|required');
		$this->form_validation->set_rules('question', 'Questions', 'trim|required');
		$this->form_validation->set_rules('answer', 'Answer', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"section_err" => form_error("section"),
				"question_err" => form_error("question"),
				"answer_err" => form_error("answer"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$policy_question_id = $this->security->xss_clean($this->input->post('policy_question_id'));
				$section = $this->security->xss_clean($this->input->post('section'));
				$question = $this->security->xss_clean($this->input->post('question'));
				$answer = $this->security->xss_clean($this->input->post('answer'));

				$updateArr[] = array(
					'policy_question_id' => $policy_question_id,
					'fk_policy_question_section_id' => $section,
					'question' => $question,
					'answer' => $answer,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_policy_question_ans", $updateArr, $updateKey = "policy_question_id", $whereArr = array("policy_question_id", $policy_question_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($policy_question_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Questions & Answer is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}
	public function delete_quest_ans()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");

			if ($id != "") {
				$query = $this->Mquery_model_v3->deleteQuery($tableName = "master_policy_question_ans", $whereArr = array("master_policy_question_ans.policy_question_id" => $id));

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_ans", $colNames =  "master_policy_question_ans.policy_question_id, master_policy_question_ans.question, master_policy_question_ans.answer, master_policy_question_ans.fk_policy_question_section_id, master_policy_question_ans.quest_ans_status, master_policy_question_ans.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Questions & Answer Deleted Permanently Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Deletinging Permanently Questions & Answer.";
			}
			echo json_encode($result);
		}
	}

	public function remove_quest_ans()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"policy_question_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_policy_question_ans.policy_question_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_policy_question_ans", $updateArr, $updateKey = "policy_question_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_ans", $colNames =  "master_policy_question_ans.policy_question_id, master_policy_question_ans.question, master_policy_question_ans.answer, master_policy_question_ans.fk_policy_question_section_id, master_policy_question_ans.quest_ans_status, master_policy_question_ans.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Questions & Answer Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Questions & Answer.";
			}
			echo json_encode($result);
		}
	}

	public function recover_quest_ans()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"policy_question_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_policy_question_ans.policy_question_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_policy_question_ans", $updateArr, $updateKey = "policy_question_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_ans", $colNames =  "master_policy_question_ans.policy_question_id, master_policy_question_ans.question, master_policy_question_ans.answer, master_policy_question_ans.fk_policy_question_section_id, master_policy_question_ans.quest_ans_status, master_policy_question_ans.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Questions & Answer Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover Questions & Answer.";
			}
			echo json_encode($result);
		}
	}
	public function index()
	{
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_section", $colNames =  "master_policy_question_section.policy_question_section_id, master_policy_question_section.policy_question_section_name, master_policy_question_section.policy_question_section_statsu, master_policy_question_section.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$this->data["section"] = $section = $query["userData"];

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

		$this->data["main_page"] = "master/policy_master_question_ans/master_question_ans";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_quest_ans_list()
	{
		$filter_section = $this->input->post("filter_section");
		$filter_question = $this->input->post("filter_question");
		$filter_ans = $this->input->post("filter_ans");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_policy_question_ans.policy_question_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_section))
				$whereArr["master_policy_question_ans.fk_policy_question_section_id"] = $filter_section;

			if (!empty($filter_question))
				$likeCondtnArr["master_policy_question_ans.question"] = $filter_question;

			if (!empty($filter_ans))
				$likeCondtnArr["master_policy_question_ans.answer"] = $filter_ans;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_policy_question_ans.quest_ans_status"] = $filter_status;
			}
			$joins_main[] = array("tbl" => "master_policy_question_section", "condtn" => "master_policy_question_ans.fk_policy_question_section_id = master_policy_question_section.policy_question_section_id", "type" => "left");
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_ans", $colNames =   "master_policy_question_ans.policy_question_id, master_policy_question_ans.question, master_policy_question_ans.answer, master_policy_question_ans.fk_policy_question_section_id, master_policy_question_ans.quest_ans_status, master_policy_question_ans.del_flag, master_policy_question_section.policy_question_section_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = $joins_main, $orderByArr = array("master_policy_question_section.policy_question_section_name"=>"ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_quest_ans_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_quest_ans_data"] = $total_quest_ans_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_quest_ans_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_quest_ans_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$joins_main[] = array("tbl" => "master_policy_question_section", "condtn" => "master_policy_question_ans.fk_policy_question_section_id = master_policy_question_section.policy_question_section_id", "type" => "left");
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_ans", $colNames =   "master_policy_question_ans.policy_question_id, master_policy_question_ans.question, master_policy_question_ans.answer, master_policy_question_ans.fk_policy_question_section_id, master_policy_question_ans.quest_ans_status, master_policy_question_ans.del_flag, master_policy_question_section.policy_question_section_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = $joins_main, $orderByArr = array("master_policy_question_section.policy_question_section_name"=>"ASC"), $groupByArr = array("master_policy_question_ans.policy_question_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_quest_ans_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_quest_ans_data"] = $total_quest_ans_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_quest_ans_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_quest_ans_status()
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
				"policy_question_id" => $id,
				"quest_ans_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_policy_question_ans.policy_question_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_policy_question_ans", $updateArr, $updateKey = "policy_question_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_ans", $colNames =   "master_policy_question_ans.policy_question_id, master_policy_question_ans.question, master_policy_question_ans.answer, master_policy_question_ans.fk_policy_question_section_id, master_policy_question_ans.quest_ans_status, master_policy_question_ans.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Questions & Answer " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Questions & Answer Status.";
			}
			echo json_encode($result);
		}
	}
	//  Questions & Answer  Section End

	public function add_section()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('section_name', 'Section Name', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"section_name_err" => form_error("section_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$section_name = $this->security->xss_clean($this->input->post('section_name'));

				$add_arr[] = array(
					'policy_question_section_name' => $section_name,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_policy_question_section", $add_arr, $return_type = "lastID");
				$policy_question_section_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($policy_question_section_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Section is Added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function get_section()
	{
		$validator = array('status' => false, 'messages' => array());

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_policy_question_section", $colNames =  "master_policy_question_section.policy_question_section_id, master_policy_question_section.policy_question_section_name, master_policy_question_section.policy_question_section_statsu, master_policy_question_section.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$section = $query["userData"];

		if (!empty($section)) {
			$result["status"] = true;
			$result["userdata"] = $section;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}
}
