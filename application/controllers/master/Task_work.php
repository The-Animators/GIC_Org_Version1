<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_work extends Admin_gic_core
{

	function __construct()
	{
		parent::__construct();
		//Templete	
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "summernote", "date_picker");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "summernote", "date_picker");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$all_userdata = $this->session->all_userdata();
		// print_r($all_userdata);
		// die();
	}

	public function index()
	{
		$this->data["title"] = $title = "My Task";
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

		$this->data["main_page"] = "master/todo_work/my_task";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function assign()
	{
		$this->data["task_id"] = $task_id = $this->uri->segment(4);
		$this->data["title"] = $title = "Assign Task";
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

		$this->data["main_page"] = "master/todo_work/assign_task";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function view_assign()
	{
		$this->data["task_id"] = $task_id = $this->uri->segment(4);
		$this->data["title"] = $title = "View Assign Task";
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

		$this->data["main_page"] = "master/todo_work/view_assign_task";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function assign_task()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules("task_type", "Task Type", "required");
		$this->form_validation->set_rules("task_title", "Task Title", "required");
		$this->form_validation->set_rules("task_desc", "Task Description", "required");
		$this->form_validation->set_rules("staff", "Staff", "required");
		$this->form_validation->set_rules("priority", "Priority", "required");
		$this->form_validation->set_rules("start_date", "Start Date", "required");
		$this->form_validation->set_rules("end_date", "End Date", "required");
		$this->form_validation->set_rules("status", "Status", "required");

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"task_type_err" => form_error("task_type"),
				"task_title_err" => form_error("task_title"),
				"task_desc_err" => form_error("task_desc"),
				"staff_err" => form_error("staff"),
				"priority_err" => form_error("priority"),
				"start_date_err" => form_error("start_date"),
				"end_date_err" => form_error("end_date"),
				"status_err" => form_error("status"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$task_type = $this->security->xss_clean($this->input->post('task_type'));
				$task_title = $this->security->xss_clean($this->input->post('task_title'));
				$sub_title = $this->security->xss_clean($this->input->post('sub_title'));
				$task_desc = $this->security->xss_clean($this->input->post('task_desc'));
				$staff = $this->security->xss_clean($this->input->post('staff'));
				$priority = $this->security->xss_clean($this->input->post('priority'));
				$start_date = date("Y-m-d", strtotime($this->security->xss_clean($this->input->post('start_date'))));
				$end_date = date("Y-m-d", strtotime($this->security->xss_clean($this->input->post('end_date'))));
				$status = $this->security->xss_clean($this->input->post('status'));

				// print_r($staff."staff");
				// print_r($start_date);
				// die();
				$add_arr[] = array(
					'task_type' => $task_type,
					'task_title' => $task_title,
					'sub_title' => $sub_title,
					'task_desc' => $task_desc,
					'fk_staff_id' => $staff,
					'priority' => $priority,
					'start_date' => $start_date,
					'end_date' => $end_date,
					'status' => $status,
					'create_date' => date("Y-m-d h:i:s")
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "task_work", $add_arr, $return_type = "lastID");
				$task_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($task_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Task is Assigned Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_assign_task()
	{
		$validator = array('status' => false, 'messages' => array());
		$task_id = $this->input->post("task_id");

		if (!empty($task_id)) {
			$whereArr["task_work.task_id"] = $task_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, DATE_FORMAT(task_work.start_date,'%d-%m-%Y') as start_date, DATE_FORMAT(task_work.end_date,'%d-%m-%Y') as end_date,task_work.total_task_remark_data, task_work.status, task_work.task_status, task_work.del_flag,task_work.sub_title", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$task_data = $query["userData"];
			$fk_staff_id = "";
			$i = 0;
			$fk_staff_id = explode(",", $task_data["fk_staff_id"]);
			if (!empty($fk_staff_id)) {
				$whereInArray_staff_arr["staff.staff_id"] = $fk_staff_id;
				$query_staff_arr = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_name", $whereArr = array(), $whereInArray = $whereInArray_staff_arr, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("staff.staff_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");

				$result_fk_staff_id = $query_staff_arr["userData"];
				$new_result_fk_staff_id = array();
				foreach ($result_fk_staff_id as $key => $value) {
					if (is_array($value)) {
						$new_result_fk_staff_id = array_merge($new_result_fk_staff_id, array_values($value));
					} else {
						$new_result_fk_staff_id[$key] = $value;
					}
				}

				$task_data["staff_name_str_arr"] = implode(" , ", $new_result_fk_staff_id);
				$i++;
			}
		}
		// print_r($department_id);
		// print_r($result);
		// die("Test 121");
		if (!empty($task_data)) {
			$validator["status"] = true;
			$validator["userdata"] = $task_data;
			$validator["message"] = "";
		} else {
			$validator["status"] = false;
			$validator["userdata"] = array();
			$validator["message"] = "Fatal Error: Contact Support:";
		}

		echo json_encode($validator);
	}

	public function update_assign_task()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules("task_type", "Task Type", "required");
		$this->form_validation->set_rules("task_title", "Task Title", "required");
		$this->form_validation->set_rules("task_desc", "Task Description", "required");
		$this->form_validation->set_rules("staff", "Staff", "required");
		$this->form_validation->set_rules("priority", "Priority", "required");
		$this->form_validation->set_rules("start_date", "Start Date", "required");
		$this->form_validation->set_rules("end_date", "End Date", "required");
		$this->form_validation->set_rules("status", "Status", "required");

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"task_type_err" => form_error("task_type"),
				"task_title_err" => form_error("task_title"),
				"task_desc_err" => form_error("task_desc"),
				"staff_err" => form_error("staff"),
				"priority_err" => form_error("priority"),
				"start_date_err" => form_error("start_date"),
				"end_date_err" => form_error("end_date"),
				"status_err" => form_error("status"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$task_id = $this->security->xss_clean($this->input->post('task_id'));
				$task_type = $this->security->xss_clean($this->input->post('task_type'));
				$task_title = $this->security->xss_clean($this->input->post('task_title'));
				$sub_title = $this->security->xss_clean($this->input->post('sub_title'));
				$task_desc = $this->security->xss_clean($this->input->post('task_desc'));
				$staff = $this->security->xss_clean($this->input->post('staff'));
				$priority = $this->security->xss_clean($this->input->post('priority'));
				$start_date = date("Y-m-d", strtotime($this->security->xss_clean($this->input->post('start_date'))));
				$end_date = date("Y-m-d", strtotime($this->security->xss_clean($this->input->post('end_date'))));
				$status = $this->security->xss_clean($this->input->post('status'));

				$updateArr[] = array(
					'task_id' => $task_id,
					'task_type' => $task_type,
					'task_title' => $task_title,
					'sub_title' => $sub_title,
					'task_desc' => $task_desc,
					'fk_staff_id' => $staff,
					'priority' => $priority,
					'start_date' => $start_date,
					'end_date' => $end_date,
					'status' => $status,
					'modify_dt' => date("Y-m-d h:i:s")
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "task_work", $updateArr, $updateKey = "task_id", $whereArr = array("task_id", $task_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($task_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Task is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function update_task_remark()
	{
		$validator = array('status' => false, 'messages' => array());

		$this->db->trans_start();	//Start Transaction	
		if ($this->input->post() != "") {
			$task_id = $this->security->xss_clean($this->input->post('task_id'));
			$status = $this->security->xss_clean($this->input->post('status'));
			$total_task_remark_data = $this->security->xss_clean($this->input->post('total_task_remark_data'));

			if (empty($total_task_remark_data))
				$total_task_remark_data = [];

			$updateArr[] = array(
				'task_id' => $task_id,
				'total_task_remark_data' => $total_task_remark_data,
				'status' => $status,
				'modify_dt' => date("Y-m-d h:i:s")
			);
			$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "task_work", $updateArr, $updateKey = "task_id", $whereArr = array("task_id", $task_id), $likeCondtnArr = array(), $whereInArray = array());
		}
		$this->db->trans_complete();		// Transaction End	

		if ($this->db->trans_status() === FALSE) {
			$validator["status"] = false;
			$validator["message"] = "Fatal Error: Contact Support:";
		} else
			if ($task_id != "") {
			$validator["status"] = true;
			$validator["message"] = "Task Remark is Added Successfully.";
		}

		echo json_encode($validator);
	}

	public function remove_assign_task()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"task_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
			);
			if ($id != "") {
				$whereArr["task_work.task_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "task_work", $updateArr, $updateKey = "task_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, task_work.start_date, task_work.end_date, task_work.status, task_work.task_status, task_work.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$task_data = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $task_data;
				$result["message"] = "Task Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Task.";
			}
			echo json_encode($result);
		}
	}

	public function recover_assign_task()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"task_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
			);
			if ($id != "") {
				$whereArr["task_work.task_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "task_work", $updateArr, $updateKey = "task_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, task_work.start_date, task_work.end_date, task_work.status, task_work.task_status, task_work.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$task_data = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $task_data;
				$result["message"] = "Task Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Task Status.";
			}
			echo json_encode($result);
		}
	}

	public function filter_assign_task_list()
	{
		$filter_task_type = $this->input->post("filter_task_type");
		$filter_task_title = $this->input->post("filter_task_title");
		$filter_staff = $this->input->post("filter_staff");
		$filter_task_desc = $this->input->post("filter_task_desc");
		$filter_priority = $this->input->post("filter_priority");
		$filter_task_status = $this->input->post("filter_task_status");
		$filter_start_date = $this->input->post("filter_start_date");
		$filter_end_date = $this->input->post("filter_end_date");
		$filter_status = $this->input->post("filter_status");
		// print_r($filter_staff);die();

		$groupByArr = array(
			"task_work.task_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		$whereInArray = array();
		if (!empty($this->input->post())) {

			if (!empty($filter_task_type))
				$whereArr["task_work.task_type"] = $filter_task_type;

			if ($filter_task_type == "System Task") {
				if (!empty($filter_task_title))
					$whereArr["task_work.task_title"] = $filter_task_title;
			} elseif ($filter_task_type == "Manual") {

				if (!empty($filter_task_title))
					$likeCondtnArr["task_work.task_title"] = $filter_task_title;
			}

			if (!empty($filter_staff))
				$whereInArray["task_work.fk_staff_id"] = $filter_staff;

			if (!empty($filter_task_desc))
				$likeCondtnArr["task_work.task_desc"] = $filter_task_desc;
			if (!empty($filter_priority))
				$whereArr["task_work.priority"] = $filter_priority;
			if (!empty($filter_task_status))
				$whereArr["task_work.status"] = $filter_task_status;
			if (!empty($filter_start_date))
				$whereArr["DATE_FORMAT(task_work.start_date,'%d-%m-%Y')>="] = $filter_start_date;
			if (!empty($filter_end_date))
				$whereArr["DATE_FORMAT(task_work.start_date,'%d-%m-%Y')<="] = $filter_end_date;
			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["task_work.task_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, DATE_FORMAT(task_work.start_date,'%d-%m-%Y') as start_date, DATE_FORMAT(task_work.end_date,'%d-%m-%Y') as end_date, task_work.status, task_work.task_status, task_work.del_flag", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("task_work.task_type" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$task_data = $query["userData"];
			// echo $this->db->last_query();
			// die();
			$total_task = count($task_data);
			$fk_staff_id = "";
			$i = 0;
			foreach ($task_data as $row) {
				$fk_staff_id = explode(",", $row["fk_staff_id"]);
				if (!empty($fk_staff_id)) {
					$whereInArray_staff_arr["staff.staff_id"] = $fk_staff_id;
					$query_staff_arr = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_name", $whereArr = array(), $whereInArray = $whereInArray_staff_arr, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("staff.staff_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");

					$result_fk_staff_id = $query_staff_arr["userData"];
					$new_result_fk_staff_id = array();
					foreach ($result_fk_staff_id as $key => $value) {
						if (is_array($value)) {
							$new_result_fk_staff_id = array_merge($new_result_fk_staff_id, array_values($value));
						} else {
							$new_result_fk_staff_id[$key] = $value;
						}
					}

					$task_data[$i]["staff_name_str_arr"] = implode(" , ", $new_result_fk_staff_id);
					$i++;
				}
			}
		}

		if (!empty($task_data)) {
			$result["status"] = true;
			$result["userdata"] = $task_data;
			$result["total_task"] = $total_task;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_task"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_assign_task_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$user_role_id = $this->session->userdata("@_user_role_id");
		$staff_id = $this->session->userdata("@_staff_id");
		$staff_arr = array((int)$staff_id);

		if ($user_role_id == 1 || $user_role_id == 2) {
			$whereInArray = array();
		} else {
			$whereInArray["task_work.fk_staff_id"] = $staff_arr;
		}

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, DATE_FORMAT(task_work.start_date,'%d-%m-%Y') as start_date, DATE_FORMAT(task_work.end_date,'%d-%m-%Y') as end_date, task_work.status, task_work.task_status, task_work.del_flag", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("task_work.task_type" => "ASC"), $groupByArr = array("task_work.task_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$task_data = $query["userData"];

		// echo $this->db->last_query();
		// print_r($task_data);
		// die();

		$fk_staff_id = "";
		$i = 0;
		foreach ($task_data as $row) {
			$fk_staff_id = explode(",", $row["fk_staff_id"]);
			if (!empty($fk_staff_id)) {
				$whereInArray_staff_arr["staff.staff_id"] = $fk_staff_id;
				$query_staff_arr = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_name", $whereArr = array(), $whereInArray = $whereInArray_staff_arr, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("staff.staff_id"), $singleRow = false, $colActive = TRUE, $paginationArr = "");

				$result_fk_staff_id = $query_staff_arr["userData"];
				$new_result_fk_staff_id = array();
				foreach ($result_fk_staff_id as $key => $value) {
					if (is_array($value)) {
						$new_result_fk_staff_id = array_merge($new_result_fk_staff_id, array_values($value));
					} else {
						$new_result_fk_staff_id[$key] = $value;
					}
				}

				$task_data[$i]["staff_name_str_arr"] = implode(" , ", $new_result_fk_staff_id);
				$i++;
			}
		}



		$total_task = count($task_data);
		if (!empty($task_data)) {
			$result["status"] = true;
			$result["userdata"] = $task_data;
			$result["total_task"] = $total_task;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_task"] = 0;
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_assign_task_status()
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
				"task_id" => $id,
				"task_status" => $status, //1:Active, 0:In-Active
			);
			if ($id != "") {
				$whereArr["task_work.task_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "task_work", $updateArr, $updateKey = "task_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, task_work.start_date, task_work.end_date, task_work.status, task_work.task_status, task_work.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$task_data = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $task_data;
				$result["message"] = "Task " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Task Status.";
			}
			echo json_encode($result);
		}
	}

	public function get_task_remark_file_upload()
	{
		$task_remark_txt = $this->input->post("task_remark_txt");
		$task_remark_file_name = "";
		$new_file_name = "";
		if (!empty($_FILES["task_remark_file"])) {
			$task_remark_data = $_FILES["task_remark_file"]["name"];
			// print_r($task_remark_data);
			// die();
			$task_remark_img = $this->ajax_file_upload($img_name = "task_remark_file", $directory_name = "./task/task_attachment", $overwrite = False, $allowed_types = "jpg|jpeg|png|pdf|xls|xlsx|csv|doc|docx", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string = $task_remark_txt, $url = "", $user_session_id = "_Normal_upload_", $count_type = false);

			if ($task_remark_img["error"] != "") {
				$paymentacknowledgement_img["status"] = false;
				$paymentacknowledgement_img["messages"]["task_remark_file_err"]  = $task_remark_img["error"];
				echo json_encode($paymentacknowledgement_img);
				die();
			} elseif ($task_remark_img["file_name"] != "") {
				$task_remark_file_name = $task_remark_img["file_name"];
				$task_remark_file_size = $task_remark_img["file_size"];
				$task_remark_file_type = $task_remark_img["file_type"];
			}
			if (!empty($task_remark_file_name)) {
				if (empty($new_file_name))
					$new_file_name = $task_remark_file_name;
				else
					$new_file_name .= "," . $task_remark_file_name;
			}
		}
		// print_r($task_remark_txt);
		// print_r($task_remark_file_name);die();
		if (!empty($task_remark_file_name)) {
			$result["status"] = true;
			$result["userdata"] = $task_remark_file_name;
			$result["message"] = array();
			$result["messages"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
			$result["messages"] = array();
		}
		echo json_encode($result);
	}

	public function ajax_file_upload($img_name = "", $directory_name = "", $overwrite = "", $allowed_types = "", $max_size = "", $max_width = "", $max_height = "", $remove_spaces = "", $encrypt_name = "", $string = "", $url = "", $user_session_id = "", $count_type = "")
	{
		$directory_name = str_replace(" ", "_", $directory_name);
		if (!is_dir($directory_name)) {
			mkdir($directory_name, 0777, TRUE);
			chmod($directory_name, 0777);
		}
		$upload_path              	= $directory_name;	// Directory Name .
		$config["upload_path"] 		= $upload_path;	 	// Directory Name Where File Store It.
		$config["overwrite"] 		= $overwrite;		// True or False
		$config["allowed_types"] 	= $allowed_types;	// File Type
		$config["max_size"] 		= $max_size;		//File Size in kb
		$config["max_width"] 		= $max_width;	 	// width
		$config["max_height"] 		= $max_height;		// Height
		$config["remove_spaces"] 	= $remove_spaces;	// True or False
		$config["encrypt_name"] 	= $encrypt_name;	// True or False

		$original_file_name = $_FILES[$img_name]["name"];
		$original_file_name_cont = str_replace(" ", "_", $original_file_name);
		$string_name_org = str_replace(" ", "_", $string);
		if ($user_session_id == "_Normal_upload_") {
			$path_parts = pathinfo($original_file_name);
			$dirname = $path_parts['dirname'];
			$basename = $path_parts['basename'];
			$extension = $path_parts['extension'];
			$filename = $path_parts['filename']; // filename is only since PHP 5.2.0
			$original_file_name_cont = str_replace(" ", "_", $filename);
			// $config["file_name"] = $file_name = $string_name_org . "_" . $original_file_name_cont;
			$config["file_name"] = $file_name = str_replace(" ", "_", $original_file_name_cont . "-" . $string_name_org . "-" . date("d_m_Y H_i_s"));
			// print_r($file_name);
			// die();

		} else
			$config["file_name"] = $file_name = $user_session_id . "_" . $string_name_org . "_" . uniqid() . "_v_" . $original_file_name_cont;

		$this->load->library("upload", $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($img_name)) {
			$upload_data = array(
				"error" => $this->upload->display_errors(),
				"file_name" => "",
				"file_type" => "",
				"file_size" => ""
			);

			return $upload_data;
		} else {
			$upload_array = $this->upload->data();
			$upload_data = array(
				"file_name" => $upload_array["file_name"],
				"file_type" => $upload_array["file_ext"],
				"file_size" => $upload_array["file_size"] . "kb",
				"error" => ""
			);
			// print_r($upload_data);
			return $upload_data;
		}
	}

	public function download_doc()
	{
		$doc_type = (int)$this->uri->segment(4); //1: GMC , 2:GPA, 3:Payment Acknowlegement
		$file_type = (int)$this->uri->segment(5); //1: Gmc Excel Attach , 2: Gmc Attach Quote , 3: Gmc Attach Endorsment Copy
		$doc_name = $this->uri->segment(6); //1: GMC , 2:GPA

		$this->load->helper('download');

		if (!empty($doc_name)) {
			if ($doc_type == 1)
				$data = file_get_contents("./task/task_attachment/" . $doc_name);
		}

		force_download($doc_name, $data);
	}

	public function view_doc()
	{
		$doc_type = (int)$this->uri->segment(4); //1: GMC , 2:GPA, 3:Payment Acknowlegement
		$file_type = (int)$this->uri->segment(5); //1: Gmc Excel Attach , 2: Gmc Attach Quote , 3: Gmc Attach Endorsment Copy
		$doc_name = $this->uri->segment(6); //1: GMC , 2:GPA

		if (!empty($doc_name)) {
			if ($doc_type == 1) {
				$extension = pathinfo("task/task_attachment/" . $doc_name, PATHINFO_EXTENSION);
				$file = file_get_contents("./task/task_attachment/" . $doc_name);
			}
			//xlsx|xlsm|xlsb|xltx|xltm|xls|csv
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png" ||  $extension == "Png" ||  $extension == "JPEG" ||  $extension == "JPG")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else if ($extension == "xlsx" ||  $extension == "xlsm" ||  $extension == "xlsb" ||  $extension == "xltx" ||  $extension == "xltm" ||  $extension == "xls" ||  $extension == "csv") {
				header('Content-Disposition: attachment; filename="' . $doc_name . '"');
				$this->output->set_content_type('application/vnd.ms-excel')->set_output($file);
			} else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}

	public function update_task_view_status()
	{
		if ($this->input->post("staff_id") != "") {
			$id = $this->input->post("id");
			$status = $this->input->post("status");

			$updateArr = array(
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"task_view_status" => $status,
			);
			$staff_id = $this->session->userdata("@_staff_id");
			if ($staff_id != "") {
				$staff_arr = array((int)$staff_id);
				$this->db->where_in('fk_staff_id', $staff_arr);
				$this->db->update('task_work', $updateArr);
				// print_r($staff_arr);
				// echo $this->db->last_query();
				// die();
				$whereInArray["task_work.fk_staff_id"] = $staff_arr;

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, task_work.start_date, task_work.end_date, task_work.status, task_work.task_status, task_work.del_flag, task_work.task_view_status", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$task_data = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $task_data;
				// $result["message"] = "Task " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				// $result["message"] = "Error Occured while Update Task Status.";
			}
			echo json_encode($result);
		}
	}


	// Task Title Section Start
	public function check_task_title()
	{
		$task_title = $this->input->post('task_title');
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames = "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag", $whereArr = array("master_task_title.task_title" => $task_title), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		if ($result) {
			$this->form_validation->set_message('check_task_title', 'This Task Title is already Used.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function add_task_title()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('task_title', 'Task Title ', 'trim|required|callback_check_task_title');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"task_title_err" => form_error("task_title"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$task_title = $this->security->xss_clean($this->input->post('task_title'));
				$sub_title_flag = $this->security->xss_clean($this->input->post('sub_title_flag'));
				$sub_title_json = $this->security->xss_clean($this->input->post('sub_title_json'));

				$add_arr[] = array(
					'task_title' => $task_title,
					'sub_title_flag' => $sub_title_flag,
					'sub_title_json' => $sub_title_json,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_task_title", $add_arr, $return_type = "lastID");
				$task_title_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($task_title_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Task Title is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_task_title()
	{
		$validator = array('status' => false, 'messages' => array());
		$task_title_id = $this->input->post("task_title_id");

		if ($task_title_id != "") {
			$whereArr["master_task_title.task_title_id"] = $task_title_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames =  "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag, master_task_title.sub_title_flag, master_task_title.sub_title_json", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// print_r($task_title_id);
		// print_r($result);
		// die("Test 121");
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

	public function update_task_title()
	{
		$validator = array('status' => false, 'messages' => array());

		$task_title_id = $this->security->xss_clean($this->input->post('task_title_id'));
		$whereArr["master_task_title.task_title_id"] = $task_title_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames =  "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

		$result = $query["userData"];

		$current_task_title = $result["task_title"];
		$updated_task_title = $this->input->post("task_title");
		$sub_menu = $this->security->xss_clean($this->input->post('sub_menu'));

		if ($current_task_title != $updated_task_title)
			$this->form_validation->set_rules('task_title', 'Task Title ', 'trim|required|callback_check_task_title');
		else
			$this->form_validation->set_rules('task_title', 'Task Title ', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"task_title_err" => form_error("task_title"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$task_title_id = $this->security->xss_clean($this->input->post('task_title_id'));
				$task_title = $this->security->xss_clean($this->input->post('task_title'));
				$sub_title_flag = $this->security->xss_clean($this->input->post('sub_title_flag'));
				$sub_title_json = $this->security->xss_clean($this->input->post('sub_title_json'));

				$updateArr[] = array(
					'task_title_id' => $task_title_id,
					'task_title' => $task_title,
					'sub_title_flag' => $sub_title_flag,
					'sub_title_json' => $sub_title_json,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_task_title", $updateArr, $updateKey = "task_title_id", $whereArr = array("task_title_id", $task_title_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($task_title_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Task Title is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_task_title()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"task_title_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_task_title.task_title_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_task_title", $updateArr, $updateKey = "task_title_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames =  "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Task Title Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Department.";
			}
			echo json_encode($result);
		}
	}

	public function recover_task_title()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"task_title_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_task_title.task_title_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_task_title", $updateArr, $updateKey = "task_title_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames =  "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Task Title Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Task Title Status.";
			}
			echo json_encode($result);
		}
	}

	public function task_title_list()
	{
		$this->data["title"] = $title = "Task Title";
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

		$this->data["main_page"] = "master/todo_work/task_title";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_task_title_list()
	{
		$filter_task_title = $this->input->post("filter_task_title");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_task_title.task_title_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_task_title))
				$likeCondtnArr["master_task_title.task_title"] = $filter_task_title;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_task_title.task_title_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames =  "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag, master_task_title.sub_title_flag, master_task_title.sub_title_json", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("master_task_title.task_title" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_tasktitle_data = count($result2);
			// print_r($filter_menu_name);
			// print_r($likeCondtnArr);
			// print_r($whereArr);
			// echo $this->db->last_query();die();
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_tasktitle_data"] = $total_tasktitle_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_tasktitle_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_task_title_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$groupByArr = array(
			"master_task_title.task_title_id",
		);
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames =  "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag, master_task_title.sub_title_flag, master_task_title.sub_title_json", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_task_title.task_title" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_tasktitle_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_tasktitle_data"] = $total_tasktitle_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_tasktitle_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_sub_title_list()
	{
		$validator = array('status' => false, 'messages' => array());
		$task_title = $this->input->post("task_title");
		if (!empty($task_title)) {
			$whereArr["master_task_title.task_title"] = $task_title;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames =  "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag, master_task_title.sub_title_flag, master_task_title.sub_title_json", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$result = $query["userData"];
		}
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

	public function update_task_title_status()
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
				"task_title_id" => $id,
				"task_title_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_task_title.task_title_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_task_title", $updateArr, $updateKey = "task_title_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_task_title", $colNames =  "master_task_title.task_title_id, master_task_title.task_title, master_task_title.task_title_status, master_task_title.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Task Title " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Task Title Status.";
			}
			echo json_encode($result);
		}
	}

	public function get_task_count()
	{
		$staff_id = $this->session->userdata("@_staff_id");
		$user_role_id = $this->session->userdata("@_user_role_id");
		$menu_permission = $this->session->userdata("@_user_role_menu_permission");
		$sub_menu_permission = $this->session->userdata("@_user_role_sub_menu_permission");
		$role_permission = $this->session->userdata("@_staff_role_permission");
		$staff_arr = array((int)$staff_id);
		$task_data = array();
		$this->db->trans_start();	//Start Transaction	
		if ($user_role_id != 1 || $user_role_id != 2) {
			if (!empty($staff_arr)) {
				$whereInArray["task_work.fk_staff_id"] = $staff_arr;
				$whereArr["task_work.task_view_status"] = 1;
			}
		} else {
			$whereInArray = array();
			$whereArr = array();
		}

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "task_work", $colNames =  "task_work.task_id, task_work.task_type, task_work.task_title, task_work.task_desc, task_work.fk_staff_id, task_work.priority, DATE_FORMAT(task_work.start_date,'%d-%m-%Y') as start_date, DATE_FORMAT(task_work.end_date,'%d-%m-%Y') as end_date, task_work.status, task_work.task_status, task_work.del_flag, task_work.task_view_status", $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");

		$task_data = $query["userData"];
		$this->db->trans_complete();		// Transaction End	
		// echo $this->db->last_query();
		// print_r($user_role_id);
		// print_r($task_data);
		// die();
		$task_data_count = count($task_data);

		if (empty($task_data))
			$task_data_count = 0;

		if ($this->db->trans_status() === FALSE) {
			$result["status"] = false;
			$result["userdata"] = array();
		} else {
			$result["status"] = true;
			$result["userdata"] = $task_data_count;
		}
		echo json_encode($result);
	}
	// Task Title Section End


}
