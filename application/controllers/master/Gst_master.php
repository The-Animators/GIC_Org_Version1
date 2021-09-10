<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gst_master extends Admin_gic_core
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
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "date_picker");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "date_picker");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";

		$this->data["title"] = $title = "GST";
	}
	// GST Mater Section Start
	// public function check_department_name()
	// {
	// 	$department_name = $this->input->post('department_name');
	// 	$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_gst", $colNames = "master_gst.gst_id, master_gst.department_name, master_gst.department_status, master_gst.del_flag", $whereArr = array("master_gst.department_name" => $department_name), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

	// 	$result = $query["userData"];

	// 	if ($result) {
	// 		$this->form_validation->set_message('check_department_name', 'This Department is already Used.');
	// 		return FALSE;
	// 	} else {
	// 		return TRUE;
	// 	}
	// }

	public function add_gst()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('cgst', 'CGST %', 'trim|required');
		$this->form_validation->set_rules('sgst', 'SGST %', 'trim|required');
		$this->form_validation->set_rules('ugst', 'UGST %', 'trim|required');
		$this->form_validation->set_rules('igst', 'IGST %', 'trim|required');
		$this->form_validation->set_rules('gst_fromdate', 'From Date', 'trim|required');
		$this->form_validation->set_rules('gst_todate', 'To Date', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"cgst_err" => form_error("cgst"),
				"sgst_err" => form_error("sgst"),
				"ugst_err" => form_error("ugst"),
				"igst_err" => form_error("igst"),
				"gst_fromdate_err" => form_error("gst_fromdate"),
				"gst_todate_err" => form_error("gst_todate"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$cgst = $this->security->xss_clean($this->input->post('cgst'));
				$sgst = $this->security->xss_clean($this->input->post('sgst'));
				$ugst = $this->security->xss_clean($this->input->post('ugst'));
				$igst = $this->security->xss_clean($this->input->post('igst'));
				$gst_fromdate = $this->security->xss_clean($this->input->post('gst_fromdate'));
				$gst_todate = $this->security->xss_clean($this->input->post('gst_todate'));


				$query_get = $this->db
					->select('gst_todate,gst_id')
					// ->where('gst_id',2)
					->where('gst_status', 1)
					->where('del_flag', 1)
					->order_by("gst_todate", "DESC")
					->limit(1)
					->get('master_gst');
				if ($query_get->num_rows() > 0) {
					$result_data = $query_get->row_array();
					$previous_gst_todate = $result_data["gst_todate"];
					$previous_gst_id = $result_data["gst_id"];
					// return $row;
					// echo $this->db->last_query();
					// print_r($result_data);
					// die();

				}
				// print_r($result_data);
				// 	die();
				if (!empty($previous_gst_todate)) {
					$previous_gst_todate_update = date('Y-m-d', strtotime($gst_fromdate . ' -1 days'));
					if (!empty($previous_gst_id)) {
						$updateArr[] = array(
							'gst_id' => $previous_gst_id,
							'gst_todate' => $previous_gst_todate_update,
							'modify_dt' => date("Y-m-d h:i:s"),
							"fk_staff_id" => $this->session->userdata("@_staff_id"),
							"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
						);
						$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_gst", $updateArr, $updateKey = "gst_id", $whereArr = array("gst_id", $previous_gst_id), $likeCondtnArr = array(), $whereInArray = array());
					}
				}
				// echo $this->db->last_query();
				// print_r($gst_todate);
				// print_r($previous_gst_todate);
				// die();
				// SELECT * FROM Categories ORDER BY CategoryID  DESC LIMIT 1,1

				$add_arr[] = array(
					'cgst' => $cgst,
					'sgst' => $sgst,
					'ugst' => $ugst,
					'igst' => $igst,
					'gst_fromdate' => $gst_fromdate,
					'gst_todate' => $gst_todate,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_gst", $add_arr, $return_type = "lastID");
				$gst_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($gst_id != "") {
				$validator["status"] = true;
				$validator["message"] = $this->data["title"] . " is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_gst()
	{
		$validator = array('status' => false, 'messages' => array());
		$gst_id = $this->input->post("gst_id");

		if ($gst_id != "") {
			$whereArr["master_gst.gst_id"] = $gst_id;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_gst", $colNames = "master_gst.gst_id, master_gst.cgst, master_gst.sgst, master_gst.ugst, master_gst.igst,  master_gst.gst_fromdate, master_gst.gst_todate, master_gst.gst_status, master_gst.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// print_r($gst_id);
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

	public function update_gst()
	{
		$validator = array('status' => false, 'messages' => array());

		$this->form_validation->set_rules('cgst', 'CGST %', 'trim|required');
		$this->form_validation->set_rules('sgst', 'SGST %', 'trim|required');
		$this->form_validation->set_rules('ugst', 'UGST %', 'trim|required');
		$this->form_validation->set_rules('igst', 'IGST %', 'trim|required');
		$this->form_validation->set_rules('gst_fromdate', 'From Date', 'trim|required');
		$this->form_validation->set_rules('gst_todate', 'To Date', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"cgst_err" => form_error("cgst"),
				"sgst_err" => form_error("sgst"),
				"ugst_err" => form_error("ugst"),
				"igst_err" => form_error("igst"),
				"gst_fromdate_err" => form_error("gst_fromdate"),
				"gst_todate_err" => form_error("gst_todate"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {
				$gst_id = $this->security->xss_clean($this->input->post('gst_id'));
				$cgst = $this->security->xss_clean($this->input->post('cgst'));
				$sgst = $this->security->xss_clean($this->input->post('sgst'));
				$ugst = $this->security->xss_clean($this->input->post('ugst'));
				$igst = $this->security->xss_clean($this->input->post('igst'));
				$gst_fromdate = $this->security->xss_clean($this->input->post('gst_fromdate'));
				$gst_todate = $this->security->xss_clean($this->input->post('gst_todate'));

				$updateArr[] = array(
					'gst_id' => $gst_id,
					'cgst' => $cgst,
					'sgst' => $sgst,
					'ugst' => $ugst,
					'igst' => $igst,
					'gst_fromdate' => $gst_fromdate,
					'gst_todate' => $gst_todate,
					'modify_dt' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_gst", $updateArr, $updateKey = "gst_id", $whereArr = array("gst_id", $gst_id), $likeCondtnArr = array(), $whereInArray = array());
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($gst_id != "") {
				$validator["status"] = true;
				$validator["message"] = $this->data["title"] . " is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function remove_gst()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"gst_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_gst.gst_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_gst", $updateArr, $updateKey = "gst_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_gst", $colNames =  "master_gst.gst_id, master_gst.cgst, master_gst.sgst, master_gst.ugst, master_gst.igst,  master_gst.gst_fromdate, master_gst.gst_todate, master_gst.gst_status, master_gst.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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

	public function recover_gst()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"gst_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_gst.gst_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_gst", $updateArr, $updateKey = "gst_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_gst", $colNames =  "master_gst.gst_id, master_gst.cgst, master_gst.sgst, master_gst.ugst, master_gst.igst, master_gst.gst_fromdate, master_gst.gst_todate, master_gst.gst_status, master_gst.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = $this->data["title"] . " Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update " . $this->data["title"] . " Status.";
			}
			echo json_encode($result);
		}
	}

	public function index()
	{
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"] . " Master",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/gst/gst_master";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function filter_gst_list()
	{
		$filter_cgst = $this->input->post("filter_cgst");
		$filter_sgst = $this->input->post("filter_sgst");
		$filter_igst = $this->input->post("filter_igst");
		$filter_ugst = $this->input->post("filter_ugst");
		$filter_from_date = $this->input->post("filter_from_date");
		$filter_to_date = $this->input->post("filter_to_date");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"master_gst.gst_id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_from_date))
				$whereArr["DATE_FORMAT(master_gst.gst_fromdate,'%d-%m-%Y')>="] = date("d-m-Y", strtotime($filter_from_date));
			if (!empty($filter_to_date))
				$whereArr["DATE_FORMAT(master_gst.gst_fromdate,'%d-%m-%Y')<="] = date("d-m-Y", strtotime($filter_to_date));
			if (!empty($filter_cgst))
				$likeCondtnArr["master_gst.cgst"] = $filter_cgst;
			if (!empty($filter_sgst))
				$likeCondtnArr["master_gst.sgst"] = $filter_sgst;
			if (!empty($filter_igst))
				$likeCondtnArr["master_gst.igst"] = $filter_igst;
			if (!empty($filter_ugst))
				$likeCondtnArr["master_gst.ugst"] = $filter_ugst;
			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["master_gst.gst_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_gst", $colNames =  "master_gst.gst_id, master_gst.cgst, master_gst.sgst, master_gst.ugst, master_gst.igst, DATE_FORMAT(master_gst.gst_fromdate,'%d-%m-%Y') as gst_fromdate, DATE_FORMAT(master_gst.gst_todate,'%d-%m-%Y') as gst_todate, master_gst.gst_status, master_gst.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array("master_gst.gst_fromdate" => "ASC"), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_gst_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_gst_data"] = $total_gst_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_gst_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_gst_list()
	{
		$validator = array('status' => false, 'messages' => array());

		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_gst", $colNames =  "master_gst.gst_id, master_gst.cgst, master_gst.sgst, master_gst.ugst, master_gst.igst,  DATE_FORMAT(master_gst.gst_fromdate,'%d-%m-%Y') as gst_fromdate, DATE_FORMAT(master_gst.gst_todate,'%d-%m-%Y') as gst_todate, master_gst.gst_status, master_gst.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array("master_gst.gst_fromdate" => "ASC"), $groupByArr = array("master_gst.gst_id"), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_gst_data = count($result2);
		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_gst_data"] = $total_gst_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_gst_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function update_gst_status()
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
				"gst_id" => $id,
				"gst_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["master_gst.gst_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "master_gst", $updateArr, $updateKey = "gst_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_gst", $colNames =  "master_gst.gst_id, master_gst.cgst, master_gst.sgst, master_gst.ugst, master_gst.igst, master_gst.gst_fromdate, master_gst.gst_todate, master_gst.gst_status, master_gst.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

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

	public function get_gst_datewise_from_policy()
	{
		$validator = array('status' => false, 'messages' => array());
		$date_from = $this->input->post("date_from");
		$date_to = $this->input->post("date_to");
		$result = array();
		if ($date_from != "") {

			// $this->db->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 15 DAY) AND NOW()');
			// select rate_id, max(effect_date) as MaxEffectDate
			// from vat_rates_details
			// where effect_date < now()
			// group by rate_id
			$whereArr["DATE_FORMAT(master_gst.gst_fromdate,'%Y-%m-%d')<="] = $date_from;
			$whereArr["DATE_FORMAT(master_gst.gst_todate,'%Y-%m-%d')>="] = $date_to;
			$whereArr["master_gst.gst_status"] = 1;
			$whereArr["master_gst.del_flag"] = 1;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "master_gst", $colNames = "master_gst.gst_id, master_gst.cgst, master_gst.sgst, master_gst.ugst, master_gst.igst,  max(master_gst.gst_fromdate) as gst_fromdate, master_gst.gst_todate, master_gst.gst_status, master_gst.del_flag", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array("master_gst.gst_id"), $singleRow = True, $colActive = TRUE, $paginationArr = "");

			$result = $query["userData"];
		}
		// echo $this->db->last_query();
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
	// GST Mater Section End





}
