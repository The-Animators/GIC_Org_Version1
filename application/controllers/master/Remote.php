<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Remote extends Admin_gic_core
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
		// $this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		// $this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["base_url"] = $this->config->item("base_url");
		// $this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		// $this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		// $this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
	}
	// Remote Section Start
	// Mediclaim FloIndividual 2020 Start
	public function get_individual_2020_chart()
	{
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			$whereArr["individual_sum_insured_uiic.sum_insured"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "individual_sum_insured_uiic", $colNames = "individual_sum_insured_uiic.sum_insured_id ,individual_sum_insured_uiic.$column_value,individual_sum_insured_uiic.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_restore_cover_premium_individual_2020()
	{
		$restore_cover = $this->input->post("restore_cover");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($restore_cover == "Required") {
				// $whereArr["restore_cover_floater_2020_uiic.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "restore_cover_individual_2020_uiic", $colNames = "restore_cover_individual_2020_uiic.$column_value", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_dailycashallowencebb_cover_premium_individual_2020()
	{
		$daily_cash_allowance_cover = $this->input->post("daily_cash_allowance_cover");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($daily_cash_allowance_cover == "Required") {
				$whereArr["daily_cash_allowance_individual_2020_uiic.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "daily_cash_allowance_individual_2020_uiic", $colNames = "daily_cash_allowance_individual_2020_uiic.id, daily_cash_allowance_individual_2020_uiic.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");
			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Mediclaim FloIndividual 2020 End

	// Mediclaim Floater 2014 Start
	public function get_floater_2014_chart()
	{
		$max_age = $this->input->post("max_age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			$whereArr["floater_2014.age"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "floater_2014", $colNames = "floater_2014.floater_id,floater_2014.$column_value,floater_2014.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_floater_2014_chart_for_child()
	{
		$max_age = $this->input->post("max_age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			$whereArr["floater_2014.age"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "floater_2014", $colNames = "floater_2014.floater_id,floater_2014.$column_value,floater_2014.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Mediclaim Floater 2014 End

	// Mediclaim Floater 2020 Start
	public function get_floater_2020_chart()
	{
		$max_age = $this->input->post("max_age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");
		$family_size_txt = $this->input->post("family_size_txt");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($family_size_txt == "2a_0c") {
				$whereArr["2a_uiic.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "2a_uiic", $colNames = "2a_uiic.sum_insured_id,2a_uiic.$column_value,2a_uiic.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size_txt == "2a_1c") {
				$whereArr["2a_1c_uiic.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "2a_1c_uiic", $colNames = "2a_1c_uiic.sum_insured_id,2a_1c_uiic.$column_value,2a_1c_uiic.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size_txt == "2a_2c") {
				$whereArr["2a_2c_uiic.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "2a_2c_uiic", $colNames = "2a_2c_uiic.sum_insured_id,2a_2c_uiic.$column_value,2a_2c_uiic.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size_txt == "1a_1c") {
				$whereArr["1a_1c_uiic.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "1a_1c_uiic", $colNames = "1a_1c_uiic.sum_insured_id,1a_1c_uiic.$column_value,1a_1c_uiic.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size_txt == "1a_2c") {
				$whereArr["1a_2c_uiic.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "1a_2c_uiic", $colNames = "1a_2c_uiic.sum_insured_id,1a_2c_uiic.$column_value,1a_2c_uiic.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size_txt == "2a_3c") {
				$whereArr["2a_3c_uiic.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "2a_3c_uiic", $colNames = "2a_3c_uiic.sum_insured_id,2a_3c_uiic.$column_value,2a_3c_uiic.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}

			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_floater_2020_chart_for_child()
	{
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			// $whereArr["additional_child_floater_2020_uiic.age"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "additional_child_floater_2020_uiic", $colNames = "additional_child_floater_2020_uiic.$column_value", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_restore_cover_premium_floater_2020()
	{
		$restore_cover = $this->input->post("restore_cover");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($restore_cover == "Required") {
				// $whereArr["restore_cover_floater_2020_uiic.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "restore_cover_floater_2020_uiic", $colNames = "restore_cover_floater_2020_uiic.$column_value", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_maternity_cover_premium_floater_2020()
	{
		$maternity_new_born_baby_cover = $this->input->post("maternity_new_born_baby_cover");
		$condition_value = $this->input->post("condition_value");
		$condition_value_2 = $this->input->post("condition_value_2");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($maternity_new_born_baby_cover == "Required") {
				if ($condition_value_2 >= 350000) {
					$whereArr["maternity_floater_2020_uiic.sum_insured"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "maternity_floater_2020_uiic", $colNames = "maternity_floater_2020_uiic.sum_insured_id,maternity_floater_2020_uiic.premium,maternity_floater_2020_uiic.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
					if (!empty($plan_rate_premium))
						$premium_rate = $plan_rate_premium["premium"];
				}
			}
			// 			echo $this->db->last_query();
			// print_r($condition_value_2);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_dailycashallowencebb_cover_premium_floater_2020()
	{
		$daily_cash_allowance_cover = $this->input->post("daily_cash_allowance_cover");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($daily_cash_allowance_cover == "Required") {
				$whereArr["daily_cash_allowance_floater_2020_uiic.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "daily_cash_allowance_floater_2020_uiic", $colNames = "daily_cash_allowance_floater_2020_uiic.id, daily_cash_allowance_floater_2020_uiic.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");
			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Mediclaim Individual 2020 End

	// New India Mediclaim Policy 2017 : Mediclaim : Individual : Missleneous Start company :  The New India Assurance Co Ltd
	public function get_the_new_india_assu_policy_2017_ind_limit_of_cataract_type_prem_bak()
	{
		$condition_value = $this->input->post("condition_value");
		$condition_value2 = $this->input->post("condition_value2");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();

			if ($condition_value2 == "Opted") {
				$whereArr["the_new_india_medi_policy_2017_ind_limitcataract_prem_chart.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_policy_2017_ind_limitcataract_prem_chart", $colNames = "the_new_india_medi_policy_2017_ind_limitcataract_prem_chart.chart_id,the_new_india_medi_policy_2017_ind_limitcataract_prem_chart.sum_insured,the_new_india_medi_policy_2017_ind_limitcataract_prem_chart.premium", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}

			if (!empty($plan_rate_premium)) {
				$result["status"] = true;
				$result["userdata"] = $plan_rate_premium;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_the_new_india_assu_policy_2017_ind_limit_of_cataract_type_prem()
	{
		$condition_value = $this->input->post("condition_value");
		$condition_value2 = $this->input->post("condition_value2");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($condition_value2 == "Opted") {
				$whereArr["the_new_india_medi_policy_2017_ind_limitcataract_prem_chart.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_policy_2017_ind_limitcataract_prem_chart", $colNames = "the_new_india_medi_policy_2017_ind_limitcataract_prem_chart.chart_id,the_new_india_medi_policy_2017_ind_limitcataract_prem_chart.sum_insured,the_new_india_medi_policy_2017_ind_limitcataract_prem_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];

				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}
			// echo $this->db->last_query();
			// print_r($plan_rate_premium);
			// print_r("_".$column_value."_");
			// die();

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_the_new_india_assu_policy_2017_ind_limit_Of_ncd_type_prem()
	{
		$condition_value = $this->input->post("condition_value");
		$column_val = $this->input->post("column_val");
		$ncd_type = $this->input->post("ncd_type");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($ncd_type == "Opted") {
				$whereArr["the_new_india_medi_policy_2017_ind_npd_premium_chart.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_policy_2017_ind_npd_premium_chart", $colNames = "the_new_india_medi_policy_2017_ind_npd_premium_chart.chart_id,the_new_india_medi_policy_2017_ind_npd_premium_chart.sum_insured,the_new_india_medi_policy_2017_ind_npd_premium_chart.$column_val", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_val];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_the_new_india_assu_policy_2017_ind_limit_Of_maternity_type_prem()
	{
		$column_val = $this->input->post("column_val");
		$maternity_type = $this->input->post("maternity_type");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($maternity_type == "Opted") {
				// $whereArr["the_new_india_medi_policy_2017_ind_maternity_prem_chart.sum_insured"] = $column_val;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_policy_2017_ind_maternity_prem_chart", $colNames = "the_new_india_medi_policy_2017_ind_maternity_prem_chart.chart_id,the_new_india_medi_policy_2017_ind_maternity_prem_chart.$column_val", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_val];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_the_new_india_assu_policy_2017_ind_limit_Of_basic_prem()
	{
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if (!empty($condition_value) && !empty($column_value)) {
				$whereArr["the_new_india_medi_policy_2017_ind_premium_chart.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_medi_policy_2017_ind_premium_chart", $colNames = "the_new_india_medi_policy_2017_ind_premium_chart.chart_id,the_new_india_medi_policy_2017_ind_premium_chart.sum_insured,the_new_india_medi_policy_2017_ind_premium_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// New India Mediclaim Policy 2017 : Mediclaim : Individual : Missleneous End company :  The New India Assurance Co Ltd

	// New India Floater Mediclaim Policy : Mediclaim : Floater : Missleneous Start company :  The New India Assurance Co Ltd
	public function get_the_new_india_assu_policy_floater_medi_basic_prem()
	{
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if (!empty($condition_value) && !empty($column_value)) {
				$whereArr["the_new_india_floater_medi_policy_premium_chart.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_floater_medi_policy_premium_chart", $colNames = "the_new_india_floater_medi_policy_premium_chart.chart_id,the_new_india_floater_medi_policy_premium_chart.sum_insured,the_new_india_floater_medi_policy_premium_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// New India Floater Mediclaim Policy : Mediclaim : Floater : Missleneous End company :  The New India Assurance Co Ltd

	//  Super Top Up : Individual : Missleneous Start company :  The New India Assurance Co Ltd
	public function get_the_new_india_assu_policy_super_topup_ind_single_basic_prem()
	{
		$age = $this->input->post("age");
		$name_insured_relation = $this->input->post("name_insured_relation");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($age <= 65) {
				$whereArr["the_new_india_supertopup_policy_ind_single_prem_chart.sum_insured"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_policy_ind_single_prem_chart", $colNames = "the_new_india_supertopup_policy_ind_single_prem_chart.chart_id,the_new_india_supertopup_policy_ind_single_prem_chart.sum_insured,the_new_india_supertopup_policy_ind_single_prem_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}

			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	//  Super Top Up : Individual : Missleneous End company :  The New India Assurance Co Ltd

	//  Super Top Up : Floater : Missleneous Start company :  The New India Assurance Co Ltd
	public function get_the_new_india_assu_policy_super_topup_ind_basic_prem()
	{
		$age = $this->input->post("age");
		$counter = $this->input->post("counter");
		$name_insured_relation = $this->input->post("name_insured_relation");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			if (($counter == "0") && ($name_insured_relation == "Self")) {
				if (!empty($condition_value) && !empty($column_value)) {
					if ($column_value != "0_17") {
						$whereArr["the_new_india_supertopup_policy_ind_primary_member_premium_chart.sum_insured"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_policy_ind_primary_member_premium_chart", $colNames = "the_new_india_supertopup_policy_ind_primary_member_premium_chart.chart_id,the_new_india_supertopup_policy_ind_primary_member_premium_chart.sum_insured,the_new_india_supertopup_policy_ind_primary_member_premium_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				}
			} else {
				if (!empty($condition_value) && !empty($column_value)) {
					if ($column_value != "61_65") {
						$whereArr["the_new_india_supertopup_policy_ind_additional_member_premium.sum_insured"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "the_new_india_supertopup_policy_ind_additional_member_premium", $colNames = "the_new_india_supertopup_policy_ind_additional_member_premium.chart_id,the_new_india_supertopup_policy_ind_additional_member_premium.sum_insured,the_new_india_supertopup_policy_ind_additional_member_premium.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				}
			}

			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	//  Super Top Up : Floater : Missleneous End company :  The New India Assurance Co Ltd

	// Reassure :  Mediclaim Individual : Missleneous Start company :  Max Bupa Health Insurance
	public function get_max_bupa_reassure_ind_basic_prem()
	{
		$region = $this->input->post("region");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");
		// print_r($condition_value);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "Zone 1") {
				$whereInArray["max_bupa_reassure_ind_zone1.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_ind_zone1", $colNames = "max_bupa_reassure_ind_zone1.rate_id,max_bupa_reassure_ind_zone1.age,max_bupa_reassure_ind_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($region == "Zone 2") {
				$whereInArray["max_bupa_reassure_ind_zone2.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_ind_zone2", $colNames = "max_bupa_reassure_ind_zone2.rate_id,max_bupa_reassure_ind_zone2.age,max_bupa_reassure_ind_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}
			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($tot);
			// print_r($plan_rate_premium);
			// die("Test");

			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_max_bupa_reassure_ind_year_wise_term_discount()
	{
		$region = $this->input->post("region");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");
		// print_r($condition_value);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "Zone 1") {
				$whereInArray["max_bupa_reassure_ind_zone1.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_ind_zone1", $colNames = "max_bupa_reassure_ind_zone1.rate_id,max_bupa_reassure_ind_zone1.age,max_bupa_reassure_ind_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($region == "Zone 2") {
				$whereInArray["max_bupa_reassure_ind_zone2.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_ind_zone2", $colNames = "max_bupa_reassure_ind_zone2.rate_id,max_bupa_reassure_ind_zone2.age,max_bupa_reassure_ind_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}
			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($plan_rate_premium);
			// print_r($condition_value);
			// die("Test");

			if (!empty($plan_rate_premium)) {
				$result["status"] = true;
				$result["userdata"] = $plan_rate_premium;
				$result["condition_value"] = $condition_value;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["condition_value"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Reassure :  Mediclaim Individual : Missleneous End company :  Max Bupa Health Insurance

	// Reassure :  Mediclaim Floater : Missleneous Start company :  Max Bupa Health Insurance
	public function get_max_bupa_reassure_float_basic_prem()
	{
		$region = $this->input->post("region");
		$family_size = $this->input->post("sub_policy_family_size");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");
		// print_r($condition_value);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "Zone 1") {
				if ($family_size == "1A + 1C") {
					$whereInArray["max_bupa_reassure_1a_1c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_1c_zone1", $colNames = "max_bupa_reassure_1a_1c_zone1.rate_id,max_bupa_reassure_1a_1c_zone1.age,max_bupa_reassure_1a_1c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 2C") {
					$whereInArray["max_bupa_reassure_1a_2c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_2c_zone1", $colNames = "max_bupa_reassure_1a_2c_zone1.rate_id,max_bupa_reassure_1a_2c_zone1.age,max_bupa_reassure_1a_2c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 3C") {
					$whereInArray["max_bupa_reassure_1a_3c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_3c_zone1", $colNames = "max_bupa_reassure_1a_3c_zone1.rate_id,max_bupa_reassure_1a_3c_zone1.age,max_bupa_reassure_1a_3c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 4C") {
					$whereInArray["max_bupa_reassure_1a_4c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_4c_zone1", $colNames = "max_bupa_reassure_1a_4c_zone1.rate_id,max_bupa_reassure_1a_4c_zone1.age,max_bupa_reassure_1a_4c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 0C") {
					$whereInArray["max_bupa_reassure_2a_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_zone1", $colNames = "max_bupa_reassure_2a_zone1.rate_id,max_bupa_reassure_2a_zone1.age,max_bupa_reassure_2a_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 1C") {
					$whereInArray["max_bupa_reassure_2a_1c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_1c_zone1", $colNames = "max_bupa_reassure_2a_1c_zone1.rate_id,max_bupa_reassure_2a_1c_zone1.age,max_bupa_reassure_2a_1c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 2C") {
					$whereInArray["max_bupa_reassure_2a_2c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_2c_zone1", $colNames = "max_bupa_reassure_2a_2c_zone1.rate_id,max_bupa_reassure_2a_2c_zone1.age,max_bupa_reassure_2a_2c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 3C") {
					$whereInArray["max_bupa_reassure_2a_3c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_3c_zone1", $colNames = "max_bupa_reassure_2a_3c_zone1.rate_id,max_bupa_reassure_2a_3c_zone1.age,max_bupa_reassure_2a_3c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 4C") {
					$whereInArray["max_bupa_reassure_2a_4c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_4c_zone1", $colNames = "max_bupa_reassure_2a_4c_zone1.rate_id,max_bupa_reassure_2a_4c_zone1.age,max_bupa_reassure_2a_4c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			} elseif ($region == "Zone 2") {
				if ($family_size == "1A + 1C") {
					$whereInArray["max_bupa_reassure_1a_1c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_1c_zone2", $colNames = "max_bupa_reassure_1a_1c_zone2.rate_id,max_bupa_reassure_1a_1c_zone2.age,max_bupa_reassure_1a_1c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 2C") {
					$whereInArray["max_bupa_reassure_1a_2c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_2c_zone2", $colNames = "max_bupa_reassure_1a_2c_zone2.rate_id,max_bupa_reassure_1a_2c_zone2.age,max_bupa_reassure_1a_2c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 3C") {
					$whereInArray["max_bupa_reassure_1a_3c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_3c_zone2", $colNames = "max_bupa_reassure_1a_3c_zone2.rate_id,max_bupa_reassure_1a_3c_zone2.age,max_bupa_reassure_1a_3c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 4C") {
					$whereInArray["max_bupa_reassure_1a_4c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_4c_zone2", $colNames = "max_bupa_reassure_1a_4c_zone2.rate_id,max_bupa_reassure_1a_4c_zone2.age,max_bupa_reassure_1a_4c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 0C") {
					$whereInArray["max_bupa_reassure_2a_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_zone2", $colNames = "max_bupa_reassure_2a_zone2.rate_id,max_bupa_reassure_2a_zone2.age,max_bupa_reassure_2a_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 1C") {
					$whereInArray["max_bupa_reassure_2a_1c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_1c_zone2", $colNames = "max_bupa_reassure_2a_1c_zone2.rate_id,max_bupa_reassure_2a_1c_zone2.age,max_bupa_reassure_2a_1c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 2C") {
					$whereInArray["max_bupa_reassure_2a_2c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_2c_zone2", $colNames = "max_bupa_reassure_2a_2c_zone2.rate_id,max_bupa_reassure_2a_2c_zone2.age,max_bupa_reassure_2a_2c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 3C") {
					$whereInArray["max_bupa_reassure_2a_3c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_3c_zone2", $colNames = "max_bupa_reassure_2a_3c_zone2.rate_id,max_bupa_reassure_2a_3c_zone2.age,max_bupa_reassure_2a_3c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 4C") {
					$whereInArray["max_bupa_reassure_2a_4c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_4c_zone2", $colNames = "max_bupa_reassure_2a_4c_zone2.rate_id,max_bupa_reassure_2a_4c_zone2.age,max_bupa_reassure_2a_4c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			}
			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($tot);
			// print_r($plan_rate_premium);
			// die("Test");

			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_max_bupa_reassure_float_year_wise_term_discount()
	{
		$region = $this->input->post("region");
		$family_size = $this->input->post("sub_policy_family_size");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");
		// print_r($condition_value);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "Zone 1") {
				if ($family_size == "1A + 1C") {
					$whereInArray["max_bupa_reassure_1a_1c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_1c_zone1", $colNames = "max_bupa_reassure_1a_1c_zone1.rate_id,max_bupa_reassure_1a_1c_zone1.age,max_bupa_reassure_1a_1c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 2C") {
					$whereInArray["max_bupa_reassure_1a_2c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_2c_zone1", $colNames = "max_bupa_reassure_1a_2c_zone1.rate_id,max_bupa_reassure_1a_2c_zone1.age,max_bupa_reassure_1a_2c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 3C") {
					$whereInArray["max_bupa_reassure_1a_3c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_3c_zone1", $colNames = "max_bupa_reassure_1a_3c_zone1.rate_id,max_bupa_reassure_1a_3c_zone1.age,max_bupa_reassure_1a_3c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 4C") {
					$whereInArray["max_bupa_reassure_1a_4c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_4c_zone1", $colNames = "max_bupa_reassure_1a_4c_zone1.rate_id,max_bupa_reassure_1a_4c_zone1.age,max_bupa_reassure_1a_4c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 0C") {
					$whereInArray["max_bupa_reassure_2a_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_zone1", $colNames = "max_bupa_reassure_2a_zone1.rate_id,max_bupa_reassure_2a_zone1.age,max_bupa_reassure_2a_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 1C") {
					$whereInArray["max_bupa_reassure_2a_1c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_1c_zone1", $colNames = "max_bupa_reassure_2a_1c_zone1.rate_id,max_bupa_reassure_2a_1c_zone1.age,max_bupa_reassure_2a_1c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 2C") {
					$whereInArray["max_bupa_reassure_2a_2c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_2c_zone1", $colNames = "max_bupa_reassure_2a_2c_zone1.rate_id,max_bupa_reassure_2a_2c_zone1.age,max_bupa_reassure_2a_2c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 3C") {
					$whereInArray["max_bupa_reassure_2a_3c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_3c_zone1", $colNames = "max_bupa_reassure_2a_3c_zone1.rate_id,max_bupa_reassure_2a_3c_zone1.age,max_bupa_reassure_2a_3c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 4C") {
					$whereInArray["max_bupa_reassure_2a_4c_zone1.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_4c_zone1", $colNames = "max_bupa_reassure_2a_4c_zone1.rate_id,max_bupa_reassure_2a_4c_zone1.age,max_bupa_reassure_2a_4c_zone1.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			} elseif ($region == "Zone 2") {
				if ($family_size == "1A + 1C") {
					$whereInArray["max_bupa_reassure_1a_1c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_1c_zone2", $colNames = "max_bupa_reassure_1a_1c_zone2.rate_id,max_bupa_reassure_1a_1c_zone2.age,max_bupa_reassure_1a_1c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 2C") {
					$whereInArray["max_bupa_reassure_1a_2c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_2c_zone2", $colNames = "max_bupa_reassure_1a_2c_zone2.rate_id,max_bupa_reassure_1a_2c_zone2.age,max_bupa_reassure_1a_2c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 3C") {
					$whereInArray["max_bupa_reassure_1a_3c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_3c_zone2", $colNames = "max_bupa_reassure_1a_3c_zone2.rate_id,max_bupa_reassure_1a_3c_zone2.age,max_bupa_reassure_1a_3c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 4C") {
					$whereInArray["max_bupa_reassure_1a_4c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_1a_4c_zone2", $colNames = "max_bupa_reassure_1a_4c_zone2.rate_id,max_bupa_reassure_1a_4c_zone2.age,max_bupa_reassure_1a_4c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 0C") {
					$whereInArray["max_bupa_reassure_2a_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_zone2", $colNames = "max_bupa_reassure_2a_zone2.rate_id,max_bupa_reassure_2a_zone2.age,max_bupa_reassure_2a_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 1C") {
					$whereInArray["max_bupa_reassure_2a_1c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_1c_zone2", $colNames = "max_bupa_reassure_2a_1c_zone2.rate_id,max_bupa_reassure_2a_1c_zone2.age,max_bupa_reassure_2a_1c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 2C") {
					$whereInArray["max_bupa_reassure_2a_2c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_2c_zone2", $colNames = "max_bupa_reassure_2a_2c_zone2.rate_id,max_bupa_reassure_2a_2c_zone2.age,max_bupa_reassure_2a_2c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 3C") {
					$whereInArray["max_bupa_reassure_2a_3c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_3c_zone2", $colNames = "max_bupa_reassure_2a_3c_zone2.rate_id,max_bupa_reassure_2a_3c_zone2.age,max_bupa_reassure_2a_3c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 4C") {
					$whereInArray["max_bupa_reassure_2a_4c_zone2.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "max_bupa_reassure_2a_4c_zone2", $colNames = "max_bupa_reassure_2a_4c_zone2.rate_id,max_bupa_reassure_2a_4c_zone2.age,max_bupa_reassure_2a_4c_zone2.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			}
			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($plan_rate_premium);
			// print_r($condition_value);
			// die("Test");

			if (!empty($plan_rate_premium)) {
				$result["status"] = true;
				$result["userdata"] = $plan_rate_premium;
				$result["condition_value"] = $condition_value;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["condition_value"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Reassure :  Mediclaim Floater : Missleneous End company :  Max Bupa Health Insurance

	// Red Carpet  :  Mediclaim Individual : Missleneous End company :  Star Health & Allied Insurance Co Ltd
	public function get_star_health_allied_ind_basic_prem()
	{
		$years_of_premium = $this->input->post("years_of_premium");
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			$whereArr["star_health_allied_insu_ind_prem_chart.sum_insured"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_ind_prem_chart", $colNames = "star_health_allied_insu_ind_prem_chart.rate_id ,star_health_allied_insu_ind_prem_chart.$column_value,star_health_allied_insu_ind_prem_chart.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_star_health_allied_float_basic_prem()
	{
		$years_of_premium = $this->input->post("years_of_premium");
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			$whereArr["star_health_allied_insu_float_2a_prem_chart.sum_insured"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_allied_insu_float_2a_prem_chart", $colNames = "star_health_allied_insu_float_2a_prem_chart.rate_id ,star_health_allied_insu_float_2a_prem_chart.$column_value,star_health_allied_insu_float_2a_prem_chart.sum_insured", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Red Carpet  :  Mediclaim Individual : Missleneous End company :  Star Health & Allied Insurance Co Ltd

	// Comprehensive  :  Mediclaim Individual : Missleneous End company :  Star Health & Allied Insurance Co Ltd
	public function get_star_health_allied_comprehensive_ind_basic_prem()
	{
		$years_of_premium = $this->input->post("years_of_premium");
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($years_of_premium == "1") {
				$whereArr["star_health_comprehensive_1_year_1a.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_1_year_1a", $colNames = "star_health_comprehensive_1_year_1a.rate_id ,star_health_comprehensive_1_year_1a.$column_value,star_health_comprehensive_1_year_1a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($years_of_premium == "2") {
				$whereArr["star_health_comprehensive_2_year_1a.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_2_year_1a", $colNames = "star_health_comprehensive_2_year_1a.rate_id ,star_health_comprehensive_2_year_1a.$column_value,star_health_comprehensive_2_year_1a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($years_of_premium == "3") {
				$whereArr["star_health_comprehensive_3_year_1a.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_3_year_1a", $colNames = "star_health_comprehensive_3_year_1a.rate_id ,star_health_comprehensive_3_year_1a.$column_value,star_health_comprehensive_3_year_1a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_star_health_allied_comprehensive_float_basic_prem()
	{
		$family_size = $this->input->post("sub_policy_family_size");
		$years_of_premium = $this->input->post("years_of_premium");
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($years_of_premium == "1") {
				if ($family_size == "1A + 1C") {
					$whereArr["star_health_comprehensive_1_year_1a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_1_year_1a_1c", $colNames = "star_health_comprehensive_1_year_1a_1c.rate_id ,star_health_comprehensive_1_year_1a_1c.$column_value,star_health_comprehensive_1_year_1a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 2C") {
					$whereArr["star_health_comprehensive_1_year_1a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_1_year_1a_2c", $colNames = "star_health_comprehensive_1_year_1a_2c.rate_id ,star_health_comprehensive_1_year_1a_2c.$column_value,star_health_comprehensive_1_year_1a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 3C") {
					$whereArr["star_health_comprehensive_1_year_1a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_1_year_1a_3c", $colNames = "star_health_comprehensive_1_year_1a_3c.rate_id ,star_health_comprehensive_1_year_1a_3c.$column_value,star_health_comprehensive_1_year_1a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 0C") {
					$whereArr["star_health_comprehensive_1_year_2a.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_1_year_2a", $colNames = "star_health_comprehensive_1_year_2a.rate_id ,star_health_comprehensive_1_year_2a.$column_value,star_health_comprehensive_1_year_2a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 1C") {
					$whereArr["star_health_comprehensive_1_year_2a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_1_year_2a_1c", $colNames = "star_health_comprehensive_1_year_2a_1c.rate_id ,star_health_comprehensive_1_year_2a_1c.$column_value,star_health_comprehensive_1_year_2a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 2C") {
					$whereArr["star_health_comprehensive_1_year_2a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_1_year_2a_2c", $colNames = "star_health_comprehensive_1_year_2a_2c.rate_id ,star_health_comprehensive_1_year_2a_2c.$column_value,star_health_comprehensive_1_year_2a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 3C") {
					$whereArr["star_health_comprehensive_1_year_2a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_1_year_2a_3c", $colNames = "star_health_comprehensive_1_year_2a_3c.rate_id ,star_health_comprehensive_1_year_2a_3c.$column_value,star_health_comprehensive_1_year_2a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			} elseif ($years_of_premium == "2") {
				if ($family_size == "1A + 1C") {
					$whereArr["star_health_comprehensive_2_year_1a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_2_year_1a_1c", $colNames = "star_health_comprehensive_2_year_1a_1c.rate_id ,star_health_comprehensive_2_year_1a_1c.$column_value,star_health_comprehensive_2_year_1a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 2C") {
					$whereArr["star_health_comprehensive_2_year_1a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_2_year_1a_2c", $colNames = "star_health_comprehensive_2_year_1a_2c.rate_id ,star_health_comprehensive_2_year_1a_2c.$column_value,star_health_comprehensive_2_year_1a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 3C") {
					$whereArr["star_health_comprehensive_2_year_1a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_2_year_1a_3c", $colNames = "star_health_comprehensive_2_year_1a_3c.rate_id ,star_health_comprehensive_2_year_1a_3c.$column_value,star_health_comprehensive_2_year_1a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 0C") {
					$whereArr["star_health_comprehensive_2_year_2a.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_2_year_2a", $colNames = "star_health_comprehensive_2_year_2a.rate_id ,star_health_comprehensive_2_year_2a.$column_value,star_health_comprehensive_2_year_2a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 1C") {
					$whereArr["star_health_comprehensive_2_year_2a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_2_year_2a_1c", $colNames = "star_health_comprehensive_2_year_2a_1c.rate_id ,star_health_comprehensive_2_year_2a_1c.$column_value,star_health_comprehensive_2_year_2a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 2C") {
					$whereArr["star_health_comprehensive_2_year_2a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_2_year_2a_2c", $colNames = "star_health_comprehensive_2_year_2a_2c.rate_id ,star_health_comprehensive_2_year_2a_2c.$column_value,star_health_comprehensive_2_year_2a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 3C") {
					$whereArr["star_health_comprehensive_2_year_2a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_2_year_2a_3c", $colNames = "star_health_comprehensive_2_year_2a_3c.rate_id ,star_health_comprehensive_2_year_2a_3c.$column_value,star_health_comprehensive_2_year_2a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			} elseif ($years_of_premium == "3") {
				if ($family_size == "1A + 1C") {
					$whereArr["star_health_comprehensive_3_year_1a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_3_year_1a_1c", $colNames = "star_health_comprehensive_3_year_1a_1c.rate_id ,star_health_comprehensive_3_year_1a_1c.$column_value,star_health_comprehensive_3_year_1a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 2C") {
					$whereArr["star_health_comprehensive_3_year_1a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_3_year_1a_2c", $colNames = "star_health_comprehensive_3_year_1a_2c.rate_id ,star_health_comprehensive_3_year_1a_2c.$column_value,star_health_comprehensive_3_year_1a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "1A + 3C") {
					$whereArr["star_health_comprehensive_3_year_1a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_3_year_1a_3c", $colNames = "star_health_comprehensive_3_year_1a_3c.rate_id ,star_health_comprehensive_3_year_1a_3c.$column_value,star_health_comprehensive_3_year_1a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 0C") {
					$whereArr["star_health_comprehensive_3_year_2a.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_3_year_2a", $colNames = "star_health_comprehensive_3_year_2a.rate_id ,star_health_comprehensive_3_year_2a.$column_value,star_health_comprehensive_3_year_2a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 1C") {
					$whereArr["star_health_comprehensive_3_year_2a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_3_year_2a_1c", $colNames = "star_health_comprehensive_3_year_2a_1c.rate_id ,star_health_comprehensive_3_year_2a_1c.$column_value,star_health_comprehensive_3_year_2a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 2C") {
					$whereArr["star_health_comprehensive_3_year_2a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_3_year_2a_2c", $colNames = "star_health_comprehensive_3_year_2a_2c.rate_id ,star_health_comprehensive_3_year_2a_2c.$column_value,star_health_comprehensive_3_year_2a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($family_size == "2A + 3C") {
					$whereArr["star_health_comprehensive_3_year_2a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_comprehensive_3_year_2a_3c", $colNames = "star_health_comprehensive_3_year_2a_3c.rate_id ,star_health_comprehensive_3_year_2a_3c.$column_value,star_health_comprehensive_3_year_2a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Comprehensive  :  Mediclaim Individual : Missleneous End company :  Star Health & Allied Insurance Co Ltd

	//Super Top Up : Individual : Missleneous End company :  Star Health & Allied Insurance Co Ltd
	public function get_star_health_allied_supertopup_ind_basic_prem()
	{
		$type_of_policy = $this->input->post("type_of_policy");
		$deductible_prem = $this->input->post("deductible_prem");
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($type_of_policy == "Gold Plan") {
				if ($deductible_prem == "300000") {
					$whereArr["star_health_super_top_up_ind_gold_300000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_ind_gold_300000", $colNames = "star_health_super_top_up_ind_gold_300000.rate_id ,star_health_super_top_up_ind_gold_300000.$column_value,star_health_super_top_up_ind_gold_300000.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($deductible_prem == "500000") {
					$whereArr["star_health_super_top_up_ind_gold_500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_ind_gold_500000", $colNames = "star_health_super_top_up_ind_gold_500000.rate_id ,star_health_super_top_up_ind_gold_500000.$column_value,star_health_super_top_up_ind_gold_500000.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($deductible_prem == "1000000") {
					$whereArr["star_health_super_top_up_ind_gold_1000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_ind_gold_1000000", $colNames = "star_health_super_top_up_ind_gold_1000000.rate_id ,star_health_super_top_up_ind_gold_1000000.$column_value,star_health_super_top_up_ind_gold_1000000.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			} elseif ($type_of_policy == "Silver Plan") {
				if ($deductible_prem == "300000") {
					$whereArr["star_health_super_top_up_ind_silver_300000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_ind_silver_300000", $colNames = "star_health_super_top_up_ind_silver_300000.rate_id ,star_health_super_top_up_ind_silver_300000.$column_value,star_health_super_top_up_ind_silver_300000.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($type_of_policy);
			// print_r($deductible_prem);
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	//Super Top Up : Individual : Missleneous End company :  Star Health & Allied Insurance Co Ltd

	//Super Top Up : Floater : Missleneous End company :  Star Health & Allied Insurance Co Ltd
	public function get_star_health_allied_supertopup_float_basic_prem()
	{
		$family_size = $this->input->post("sub_policy_family_size");
		$type_of_policy = $this->input->post("type_of_policy");
		$deductible_prem = $this->input->post("deductible_prem");
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($type_of_policy == "Gold Plan") {
				if ($family_size == "1A + 1C") {
					if ($deductible_prem == "300000") {
						$whereArr["star_health_super_top_up_floater_gold_300000_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_300000_1a_1c", $colNames = "star_health_super_top_up_floater_gold_300000_1a_1c.rate_id ,star_health_super_top_up_floater_gold_300000_1a_1c.$column_value,star_health_super_top_up_floater_gold_300000_1a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "500000") {
						$whereArr["star_health_super_top_up_floater_gold_500000_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_500000_1a_1c", $colNames = "star_health_super_top_up_floater_gold_500000_1a_1c.rate_id ,star_health_super_top_up_floater_gold_500000_1a_1c.$column_value,star_health_super_top_up_floater_gold_500000_1a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "1000000") {
						$whereArr["star_health_super_top_up_floater_gold_1000000_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_1000000_1a_1c", $colNames = "star_health_super_top_up_floater_gold_1000000_1a_1c.rate_id ,star_health_super_top_up_floater_gold_1000000_1a_1c.$column_value,star_health_super_top_up_floater_gold_1000000_1a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				} elseif ($family_size == "1A + 2C") {
					if ($deductible_prem == "300000") {
						$whereArr["star_health_super_top_up_floater_gold_300000_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_300000_1a_2c", $colNames = "star_health_super_top_up_floater_gold_300000_1a_2c.rate_id ,star_health_super_top_up_floater_gold_300000_1a_2c.$column_value,star_health_super_top_up_floater_gold_300000_1a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "500000") {
						$whereArr["star_health_super_top_up_floater_gold_500000_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_500000_1a_2c", $colNames = "star_health_super_top_up_floater_gold_500000_1a_2c.rate_id ,star_health_super_top_up_floater_gold_500000_1a_2c.$column_value,star_health_super_top_up_floater_gold_500000_1a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "1000000") {
						$whereArr["star_health_super_top_up_floater_gold_1000000_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_1000000_1a_2c", $colNames = "star_health_super_top_up_floater_gold_1000000_1a_2c.rate_id ,star_health_super_top_up_floater_gold_1000000_1a_2c.$column_value,star_health_super_top_up_floater_gold_1000000_1a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				} elseif ($family_size == "1A + 3C") {
					if ($deductible_prem == "300000") {
						$whereArr["star_health_super_top_up_floater_gold_300000_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_300000_1a_3c", $colNames = "star_health_super_top_up_floater_gold_300000_1a_3c.rate_id ,star_health_super_top_up_floater_gold_300000_1a_3c.$column_value,star_health_super_top_up_floater_gold_300000_1a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "500000") {
						$whereArr["star_health_super_top_up_floater_gold_500000_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_500000_1a_3c", $colNames = "star_health_super_top_up_floater_gold_500000_1a_3c.rate_id ,star_health_super_top_up_floater_gold_500000_1a_3c.$column_value,star_health_super_top_up_floater_gold_500000_1a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "1000000") {
						$whereArr["star_health_super_top_up_floater_gold_1000000_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_1000000_1a_3c", $colNames = "star_health_super_top_up_floater_gold_1000000_1a_3c.rate_id ,star_health_super_top_up_floater_gold_1000000_1a_3c.$column_value,star_health_super_top_up_floater_gold_1000000_1a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				} elseif ($family_size == "2A + 0C") {
					if ($deductible_prem == "300000") {
						$whereArr["star_health_super_top_up_floater_gold_300000_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_300000_2a", $colNames = "star_health_super_top_up_floater_gold_300000_2a.rate_id ,star_health_super_top_up_floater_gold_300000_2a.$column_value,star_health_super_top_up_floater_gold_300000_2a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "500000") {
						$whereArr["star_health_super_top_up_floater_gold_500000_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_500000_2a", $colNames = "star_health_super_top_up_floater_gold_500000_2a.rate_id ,star_health_super_top_up_floater_gold_500000_2a.$column_value,star_health_super_top_up_floater_gold_500000_2a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "1000000") {
						$whereArr["star_health_super_top_up_floater_gold_1000000_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_1000000_2a", $colNames = "star_health_super_top_up_floater_gold_1000000_2a.rate_id ,star_health_super_top_up_floater_gold_1000000_2a.$column_value,star_health_super_top_up_floater_gold_1000000_2a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				} elseif ($family_size == "2A + 1C") {
					if ($deductible_prem == "300000") {
						$whereArr["star_health_super_top_up_floater_gold_300000_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_300000_2a_1c", $colNames = "star_health_super_top_up_floater_gold_300000_2a_1c.rate_id ,star_health_super_top_up_floater_gold_300000_2a_1c.$column_value,star_health_super_top_up_floater_gold_300000_2a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "500000") {
						$whereArr["star_health_super_top_up_floater_gold_500000_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_500000_2a_1c", $colNames = "star_health_super_top_up_floater_gold_500000_2a_1c.rate_id ,star_health_super_top_up_floater_gold_500000_2a_1c.$column_value,star_health_super_top_up_floater_gold_500000_2a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "1000000") {
						$whereArr["star_health_super_top_up_floater_gold_1000000_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_1000000_2a_1c", $colNames = "star_health_super_top_up_floater_gold_1000000_2a_1c.rate_id ,star_health_super_top_up_floater_gold_1000000_2a_1c.$column_value,star_health_super_top_up_floater_gold_1000000_2a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				} elseif ($family_size == "2A + 2C") {
					if ($deductible_prem == "300000") {
						$whereArr["star_health_super_top_up_floater_gold_300000_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_300000_2a_2c", $colNames = "star_health_super_top_up_floater_gold_300000_2a_2c.rate_id ,star_health_super_top_up_floater_gold_300000_2a_2c.$column_value,star_health_super_top_up_floater_gold_300000_2a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "500000") {
						$whereArr["star_health_super_top_up_floater_gold_500000_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_500000_2a_2c", $colNames = "star_health_super_top_up_floater_gold_500000_2a_2c.rate_id ,star_health_super_top_up_floater_gold_500000_2a_2c.$column_value,star_health_super_top_up_floater_gold_500000_2a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "1000000") {
						$whereArr["star_health_super_top_up_floater_gold_1000000_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_1000000_2a_2c", $colNames = "star_health_super_top_up_floater_gold_1000000_2a_2c.rate_id ,star_health_super_top_up_floater_gold_1000000_2a_2c.$column_value,star_health_super_top_up_floater_gold_1000000_2a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				} elseif ($family_size == "2A + 3C") {
					if ($deductible_prem == "300000") {
						$whereArr["star_health_super_top_up_floater_gold_300000_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_300000_2a_3c", $colNames = "star_health_super_top_up_floater_gold_300000_2a_3c.rate_id ,star_health_super_top_up_floater_gold_300000_2a_3c.$column_value,star_health_super_top_up_floater_gold_300000_2a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "500000") {
						$whereArr["star_health_super_top_up_floater_gold_500000_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_500000_2a_3c", $colNames = "star_health_super_top_up_floater_gold_500000_2a_3c.rate_id ,star_health_super_top_up_floater_gold_500000_2a_3c.$column_value,star_health_super_top_up_floater_gold_500000_2a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					} elseif ($deductible_prem == "1000000") {
						$whereArr["star_health_super_top_up_floater_gold_1000000_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_gold_1000000_2a_3c", $colNames = "star_health_super_top_up_floater_gold_1000000_2a_3c.rate_id ,star_health_super_top_up_floater_gold_1000000_2a_3c.$column_value,star_health_super_top_up_floater_gold_1000000_2a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
						$plan_rate_premium = $query["userData"];
					}
				}
			} elseif ($type_of_policy == "Silver Plan") {
				if ($column_value == "1000000") {
					$whereArr["star_health_super_top_up_floater_silver_1000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "star_health_super_top_up_floater_silver_1000000", $colNames = "star_health_super_top_up_floater_silver_1000000.rate_id ,star_health_super_top_up_floater_silver_1000000.$deductible_prem,star_health_super_top_up_floater_silver_1000000.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			}

			if ($type_of_policy == "Silver Plan") {
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$deductible_prem];
			} else {
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}

			// echo $this->db->last_query();
			// print_r($type_of_policy);
			// print_r($deductible_prem);
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	//Super Top Up : Floater : Missleneous End company :  Star Health & Allied Insurance Co Ltd

	// Care Advantage  :  Mediclaim Individual : Missleneous End company :  Care Health Insurance Co Ltd
	public function get_care_health_care_advantage_ind_basic_prem()
	{
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			$whereArr["care_advantage_ncb_super_individual.age"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_individual", $colNames = "care_advantage_ncb_super_individual.rate_id ,care_advantage_ncb_super_individual.$column_value,care_advantage_ncb_super_individual.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];

			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_care_health_care_advantage_float_basic_prem()
	{
		$family_size = $this->input->post("sub_policy_family_size");
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($family_size == "1A + 1C") {
				$whereArr["care_advantage_ncb_super_1a_1c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_1a_1c", $colNames = "care_advantage_ncb_super_1a_1c.rate_id ,care_advantage_ncb_super_1a_1c.$column_value,care_advantage_ncb_super_1a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "1A + 2C") {
				$whereArr["care_advantage_ncb_super_1a_2c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_1a_2c", $colNames = "care_advantage_ncb_super_1a_2c.rate_id ,care_advantage_ncb_super_1a_2c.$column_value,care_advantage_ncb_super_1a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "1A + 3C") {
				$whereArr["care_advantage_ncb_super_1a_3c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_1a_3c", $colNames = "care_advantage_ncb_super_1a_3c.rate_id ,care_advantage_ncb_super_1a_3c.$column_value,care_advantage_ncb_super_1a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "1A + 4C") {
				$whereArr["care_advantage_ncb_super_1a_4c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_1a_4c", $colNames = "care_advantage_ncb_super_1a_4c.rate_id ,care_advantage_ncb_super_1a_4c.$column_value,care_advantage_ncb_super_1a_4c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 0C") {
				$whereArr["care_advantage_ncb_super_2a.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_2a", $colNames = "care_advantage_ncb_super_2a.rate_id ,care_advantage_ncb_super_2a.$column_value,care_advantage_ncb_super_2a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 1C") {
				$whereArr["care_advantage_ncb_super_2a_1c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_2a_1c", $colNames = "care_advantage_ncb_super_2a_1c.rate_id ,care_advantage_ncb_super_2a_1c.$column_value,care_advantage_ncb_super_2a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 2C") {
				$whereArr["care_advantage_ncb_super_2a_2c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_2a_2c", $colNames = "care_advantage_ncb_super_2a_2c.rate_id ,care_advantage_ncb_super_2a_2c.$column_value,care_advantage_ncb_super_2a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 3C") {
				$whereArr["care_advantage_ncb_super_2a_3c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_2a_3c", $colNames = "care_advantage_ncb_super_2a_3c.rate_id ,care_advantage_ncb_super_2a_3c.$column_value,care_advantage_ncb_super_2a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 4C") {
				$whereArr["care_advantage_ncb_super_2a_4c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_advantage_ncb_super_2a_4c", $colNames = "care_advantage_ncb_super_2a_4c.rate_id ,care_advantage_ncb_super_2a_4c.$column_value,care_advantage_ncb_super_2a_4c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}

			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Care Advantage  :  Mediclaim Individual : Missleneous End company :  Care Health Insurance Co Ltd

	// Care  :  Mediclaim Individual : Missleneous End company :  Care Health Insurance Co Ltd
	public function get_care_health_care_ind_basic_prem()
	{
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			$whereArr["care_ncb_super_individual.age"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_individual", $colNames = "care_ncb_super_individual.rate_id ,care_ncb_super_individual.$column_value,care_ncb_super_individual.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];

			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_care_health_care_float_basic_prem()
	{
		$family_size = $this->input->post("sub_policy_family_size");
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($family_size == "1A + 1C") {
				$whereArr["care_ncb_super_1a_1c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_1a_1c", $colNames = "care_ncb_super_1a_1c.rate_id ,care_ncb_super_1a_1c.$column_value,care_ncb_super_1a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "1A + 2C") {
				$whereArr["care_ncb_super_1a_2c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_1a_2c", $colNames = "care_ncb_super_1a_2c.rate_id ,care_ncb_super_1a_2c.$column_value,care_ncb_super_1a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "1A + 3C") {
				$whereArr["care_ncb_super_1a_3c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_1a_3c", $colNames = "care_ncb_super_1a_3c.rate_id ,care_ncb_super_1a_3c.$column_value,care_ncb_super_1a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "1A + 4C") {
				$whereArr["care_ncb_super_1a_4c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_1a_4c", $colNames = "care_ncb_super_1a_4c.rate_id ,care_ncb_super_1a_4c.$column_value,care_ncb_super_1a_4c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 0C") {
				$whereArr["care_ncb_super_2a.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_2a", $colNames = "care_ncb_super_2a.rate_id ,care_ncb_super_2a.$column_value,care_ncb_super_2a.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 1C") {
				$whereArr["care_ncb_super_2a_1c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_2a_1c", $colNames = "care_ncb_super_2a_1c.rate_id ,care_ncb_super_2a_1c.$column_value,care_ncb_super_2a_1c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 2C") {
				$whereArr["care_ncb_super_2a_2c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_2a_2c", $colNames = "care_ncb_super_2a_2c.rate_id ,care_ncb_super_2a_2c.$column_value,care_ncb_super_2a_2c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 3C") {
				$whereArr["care_ncb_super_2a_3c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_2a_3c", $colNames = "care_ncb_super_2a_3c.rate_id ,care_ncb_super_2a_3c.$column_value,care_ncb_super_2a_3c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($family_size == "2A + 4C") {
				$whereArr["care_ncb_super_2a_4c.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "care_ncb_super_2a_4c", $colNames = "care_ncb_super_2a_4c.rate_id ,care_ncb_super_2a_4c.$column_value,care_ncb_super_2a_4c.age", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}

			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($family_size);
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Care  :  Mediclaim Individual : Missleneous End company :  Care Health Insurance Co Ltd


	// Optima Restore :  Mediclaim Individual : Missleneous Start company :  HDFC ERGO HEALTH INSURANCE LTD
	public function get_hdfc_ergo_health_insurance_basic_premium()
	{
		$region = $this->input->post("region");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");
		// print_r($condition_value);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "National Capital Region and Mumbai Metropolitan Region") {
				// $whereArr["hdfc_ergo_health_optima_restore_individual_mumbai_metro_rate_cha.age"] = $condition_value;
				$whereInArray["hdfc_ergo_health_optima_restore_individual_mumbai_metro_rate_cha.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_individual_mumbai_metro_rate_cha", $colNames = "hdfc_ergo_health_optima_restore_individual_mumbai_metro_rate_cha.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_individual_mumbai_metro_rate_cha.age,hdfc_ergo_health_optima_restore_individual_mumbai_metro_rate_cha.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				// if (!empty($plan_rate_premium))
				// 	$premium_rate = $plan_rate_premium[$column_value];
			} elseif ($region == "Rest of India") {
				// $whereArr["hdfc_ergo_health_optima_restore_individual_rest_of_india_rate_ch.age"] = $condition_value;
				$whereInArray["hdfc_ergo_health_optima_restore_individual_rest_of_india_rate_ch.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_individual_rest_of_india_rate_ch", $colNames = "hdfc_ergo_health_optima_restore_individual_rest_of_india_rate_ch.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_individual_rest_of_india_rate_ch.age,hdfc_ergo_health_optima_restore_individual_rest_of_india_rate_ch.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				// if (!empty($plan_rate_premium))
				// $premium_rate = $plan_rate_premium[$column_value];
			}
			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($tot);
			// print_r($plan_rate_premium);
			// die("Test");

			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_hospital_daily_cash_prem()
	{
		$sum_insured = $this->input->post("sum_insured");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($sum_insured == "1000") {
				$whereArr["hdfc_ergo_health_optima_restore_hospital_1000_rate_chart.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_hospital_1000_rate_chart", $colNames = "hdfc_ergo_health_optima_restore_hospital_1000_rate_chart.hdfc_ergo_id,hdfc_ergo_health_optima_restore_hospital_1000_rate_chart.age,hdfc_ergo_health_optima_restore_hospital_1000_rate_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			} elseif ($sum_insured == "2000") {
				$whereArr["hdfc_ergo_health_optima_restore_hospital_2000_rate_chart.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_hospital_2000_rate_chart", $colNames = "hdfc_ergo_health_optima_restore_hospital_2000_rate_chart.hdfc_ergo_id,hdfc_ergo_health_optima_restore_hospital_2000_rate_chart.age,hdfc_ergo_health_optima_restore_hospital_2000_rate_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			} elseif ($sum_insured == "3000") {
				$whereArr["hdfc_ergo_health_optima_restore_hospital_3000_rate_chart.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_hospital_3000_rate_chart", $colNames = "hdfc_ergo_health_optima_restore_hospital_3000_rate_chart.hdfc_ergo_id,hdfc_ergo_health_optima_restore_hospital_3000_rate_chart.age,hdfc_ergo_health_optima_restore_hospital_3000_rate_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Optima Restore : Mediclaim Individual : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD

	// Optima Restore :  Mediclaim Floater : Missleneous Start company :  HDFC ERGO HEALTH INSURANCE LTD
	public function get_float_hdfc_ergo_health_insurance_basic_premium()
	{
		$region = $this->input->post("region");
		$hdfc_ergo_health_insu_family_size = $this->input->post("sub_policy_family_size");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		// print_r($condition_value);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "National Capital Region and Mumbai Metropolitan Region") {
				if ($hdfc_ergo_health_insu_family_size == "1A + 1C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_1c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_1c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_1c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_1c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "1A + 2C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_2c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_2c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_2c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_2c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "1A + 3C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_3c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_3c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_3c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_3c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "1A + 4C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_4c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_4c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_4c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_4c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_4c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "1A + 5C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_5c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_5c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_5c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_5c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_5c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_1a_5c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 0C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 1C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_1c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_1c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_1c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_1c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 2C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_2c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_2c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_2c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_2c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 3C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_3c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_3c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_3c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_3c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 4C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_4c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_4c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_4c", $colNames = "hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_4c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_4c.age,hdfc_ergo_health_optima_restore_floater_mumbai_metro_2a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				}
				$plan_rate_premium = $query["userData"];
				// if (!empty($plan_rate_premium))
				// 	$premium_rate = $plan_rate_premium[$column_value];
			} elseif ($region == "Rest of India") {
				if ($hdfc_ergo_health_insu_family_size == "1A + 1C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_1c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_1c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_1c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_1c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "1A + 2C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_2c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_2c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_2c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_2c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_2c.$column_value", $whereArr = array(), $whereInArray =  $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "1A + 3C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_3c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_3c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_3c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_3c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_3c.$column_value", $whereArr = array(), $whereInArray =  $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "1A + 4C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_4c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_4c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_4c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_4c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_4c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "1A + 5C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_5c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_5c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_5c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_5c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_5c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_1a_5c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 0C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 1C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_1c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_1c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_1c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_1c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_1c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 2C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_2c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_2c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_2c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_2c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_2c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 3C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_3c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_3c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_3c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_3c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_3c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				} elseif ($hdfc_ergo_health_insu_family_size == "2A + 4C") {
					// $whereArr["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_4c.age"] = $condition_value;
					$whereInArray["hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_4c.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_4c", $colNames = "hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_4c.hdfc_ergo_health_id,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_4c.age,hdfc_ergo_health_optima_restore_floater_rest_of_india_2a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				}
				$plan_rate_premium = $query["userData"];
				// if (!empty($plan_rate_premium))
				// 	$premium_rate = $plan_rate_premium[$column_value];
			}

			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($condition_value);
			// print_r($plan_rate_premium);
			// print_r($tot);
			// print_r($plan_rate_premium);
			// die("Test");

			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_float_hospital_daily_cash_prem()
	{
		$sum_insured = $this->input->post("sum_insured");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($sum_insured == "1000") {
				$whereArr["hdfc_ergo_health_optima_restore_hospital_1000_rate_chart.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_hospital_1000_rate_chart", $colNames = "hdfc_ergo_health_optima_restore_hospital_1000_rate_chart.hdfc_ergo_id,hdfc_ergo_health_optima_restore_hospital_1000_rate_chart.age,hdfc_ergo_health_optima_restore_hospital_1000_rate_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			} elseif ($sum_insured == "2000") {
				$whereArr["hdfc_ergo_health_optima_restore_hospital_2000_rate_chart.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_hospital_2000_rate_chart", $colNames = "hdfc_ergo_health_optima_restore_hospital_2000_rate_chart.hdfc_ergo_id,hdfc_ergo_health_optima_restore_hospital_2000_rate_chart.age,hdfc_ergo_health_optima_restore_hospital_2000_rate_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			} elseif ($sum_insured == "3000") {
				$whereArr["hdfc_ergo_health_optima_restore_hospital_3000_rate_chart.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_hospital_3000_rate_chart", $colNames = "hdfc_ergo_health_optima_restore_hospital_3000_rate_chart.hdfc_ergo_id,hdfc_ergo_health_optima_restore_hospital_3000_rate_chart.age,hdfc_ergo_health_optima_restore_hospital_3000_rate_chart.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_float_hdfc_ergo_health_insurance_chart_for_child()
	{
		$max_age = $this->input->post("max_age");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			// $whereArr["hdfc_ergo_health_optima_restore_hospital_add_child_rate_chart.age"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_optima_restore_hospital_add_child_rate_chart", $colNames = "hdfc_ergo_health_optima_restore_hospital_add_child_rate_chart.add_child_id,hdfc_ergo_health_optima_restore_hospital_add_child_rate_chart.$column_value", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Optima Restore : Mediclaim Floater : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD

	// Energy : Mediclaim Floater : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD
	public function get_hdfc_ergo_health_insu_energy_basic_premium()
	{
		$type_of_policy = $this->input->post("type_of_policy");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($type_of_policy == "Silver No Co-Payment") {
				$whereArr["hdfc_ergo_health_energy_sliver_smart_no_co_payment.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_energy_sliver_smart_no_co_payment", $colNames = "hdfc_ergo_health_energy_sliver_smart_no_co_payment.sliver_smart_id,hdfc_ergo_health_energy_sliver_smart_no_co_payment.age,hdfc_ergo_health_energy_sliver_smart_no_co_payment.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($type_of_policy == "Silver Co-Payment") {
				$whereArr["hdfc_ergo_health_energy_sliver_smart_co_payment.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_energy_sliver_smart_co_payment", $colNames = "hdfc_ergo_health_energy_sliver_smart_co_payment.sliver_smart_id,hdfc_ergo_health_energy_sliver_smart_co_payment.age,hdfc_ergo_health_energy_sliver_smart_co_payment.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($type_of_policy == "Gold No Co-Payment") {
				$whereArr["hdfc_ergo_health_energy_gold_smart_no_co_payment.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_energy_gold_smart_no_co_payment", $colNames = "hdfc_ergo_health_energy_gold_smart_no_co_payment.sliver_smart_id,hdfc_ergo_health_energy_gold_smart_no_co_payment.age,hdfc_ergo_health_energy_gold_smart_no_co_payment.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($type_of_policy == "Gold Co-Payment") {
				$whereArr["hdfc_ergo_health_energy_gold_smart_co_payment.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_energy_gold_smart_co_payment", $colNames = "hdfc_ergo_health_energy_gold_smart_co_payment.sliver_smart_id,hdfc_ergo_health_energy_gold_smart_co_payment.age,hdfc_ergo_health_energy_gold_smart_co_payment.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}

			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Energy : Mediclaim Floater : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD

	// Health Suraksha :  Mediclaim Individual : Missleneous Start company :  HDFC ERGO HEALTH INSURANCE LTD
	public function get_hdfc_ergo_health_suraksha_basic_premium()
	{
		$table_cond = $this->input->post("table_cond");
		$region = $this->input->post("region");
		$type_of_policy = $this->input->post("type_of_policy");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");
		// print_r($condition_value);
		// print_r($table_cond);
		// print_r($type_of_policy);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "Tier 1A (Delhi/NCR)") {
				if ($table_cond == "300000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_1a_300000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1a_300000", $colNames = "health_suraksha_silver_smart_tier_1a_300000.silver_smart_id,health_suraksha_silver_smart_tier_1a_300000.age,health_suraksha_silver_smart_tier_1a_300000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "400000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_1a_400000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1a_400000", $colNames = "health_suraksha_silver_smart_tier_1a_400000.silver_smart_id,health_suraksha_silver_smart_tier_1a_400000.age,health_suraksha_silver_smart_tier_1a_400000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "500000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_1a_500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1a_500000", $colNames = "health_suraksha_silver_smart_tier_1a_500000.silver_smart_id,health_suraksha_silver_smart_tier_1a_500000.age,health_suraksha_silver_smart_tier_1a_500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "750000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_1a_750000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1a_750000", $colNames = "health_suraksha_gold_smart_tier_1a_750000.smart_id,health_suraksha_gold_smart_tier_1a_750000.age,health_suraksha_gold_smart_tier_1a_750000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1000000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_1a_1000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1a_1000000", $colNames = "health_suraksha_gold_smart_tier_1a_1000000.smart_id,health_suraksha_gold_smart_tier_1a_1000000.age,health_suraksha_gold_smart_tier_1a_1000000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1500000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_1a_1500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1a_1500000", $colNames = "health_suraksha_gold_smart_tier_1a_1500000.smart_id,health_suraksha_gold_smart_tier_1a_1500000.age,health_suraksha_gold_smart_tier_1a_1500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2000000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_1a_2000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1a_2000000", $colNames = "health_suraksha_platinum_smart_tier_1a_2000000.smart_id,health_suraksha_platinum_smart_tier_1a_2000000.age,health_suraksha_platinum_smart_tier_1a_2000000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2500000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_1a_2500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1a_2500000", $colNames = "health_suraksha_platinum_smart_tier_1a_2500000.smart_id,health_suraksha_platinum_smart_tier_1a_2500000.age,health_suraksha_platinum_smart_tier_1a_2500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "5000000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_1a_5000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1a_5000000", $colNames = "health_suraksha_platinum_smart_tier_1a_5000000.smart_id,health_suraksha_platinum_smart_tier_1a_5000000.age,health_suraksha_platinum_smart_tier_1a_5000000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "7500000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_1a_7500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1a_7500000", $colNames = "health_suraksha_platinum_smart_tier_1a_7500000.smart_id,health_suraksha_platinum_smart_tier_1a_7500000.age,health_suraksha_platinum_smart_tier_1a_7500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
				// $whereArr["hdfc_ergo_health_optima_restore_individual_mumbai_metro_rate_cha.age"] = $condition_value;

			} elseif ($region == "Tier 1B (Mumbai, Pune, Surat, Varodara, Ahmedabad)") {
				if ($table_cond == "300000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_1b_300000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1b_300000", $colNames = "health_suraksha_silver_smart_tier_1b_300000.silver_smart_id,health_suraksha_silver_smart_tier_1b_300000.age,health_suraksha_silver_smart_tier_1b_300000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "400000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_1b_400000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1b_400000", $colNames = "health_suraksha_silver_smart_tier_1b_400000.silver_smart_id,health_suraksha_silver_smart_tier_1b_400000.age,health_suraksha_silver_smart_tier_1b_400000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "500000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_1b_500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1b_500000", $colNames = "health_suraksha_silver_smart_tier_1b_500000.silver_smart_id,health_suraksha_silver_smart_tier_1b_500000.age,health_suraksha_silver_smart_tier_1b_500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "750000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_1b_750000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1b_750000", $colNames = "health_suraksha_gold_smart_tier_1b_750000.smart_id,health_suraksha_gold_smart_tier_1b_750000.age,health_suraksha_gold_smart_tier_1b_750000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1000000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_1b_1000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1b_1000000", $colNames = "health_suraksha_gold_smart_tier_1b_1000000.smart_id,health_suraksha_gold_smart_tier_1b_1000000.age,health_suraksha_gold_smart_tier_1b_1000000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1500000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_1b_1500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1b_1500000", $colNames = "health_suraksha_gold_smart_tier_1b_1500000.smart_id,health_suraksha_gold_smart_tier_1b_1500000.age,health_suraksha_gold_smart_tier_1b_1500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2000000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_1b_2000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1b_2000000", $colNames = "health_suraksha_platinum_smart_tier_1b_2000000.smart_id,health_suraksha_platinum_smart_tier_1b_2000000.age,health_suraksha_platinum_smart_tier_1b_2000000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2500000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_1b_2500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1b_2500000", $colNames = "health_suraksha_platinum_smart_tier_1b_2500000.smart_id,health_suraksha_platinum_smart_tier_1b_2500000.age,health_suraksha_platinum_smart_tier_1b_2500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "5000000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_1b_5000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1b_5000000", $colNames = "health_suraksha_platinum_smart_tier_1b_5000000.smart_id,health_suraksha_platinum_smart_tier_1b_5000000.age,health_suraksha_platinum_smart_tier_1b_5000000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "7500000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_1b_7500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1b_7500000", $colNames = "health_suraksha_platinum_smart_tier_1b_7500000.smart_id,health_suraksha_platinum_smart_tier_1b_7500000.age,health_suraksha_platinum_smart_tier_1b_7500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			} elseif ($region == "Tier 2 (Rest of India)") {
				if ($table_cond == "300000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_2_300000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_2_300000", $colNames = "health_suraksha_silver_smart_tier_2_300000.silver_smart_id,health_suraksha_silver_smart_tier_2_300000.age,health_suraksha_silver_smart_tier_2_300000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "400000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_2_400000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_2_400000", $colNames = "health_suraksha_silver_smart_tier_2_400000.silver_smart_id,health_suraksha_silver_smart_tier_2_400000.age,health_suraksha_silver_smart_tier_2_400000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "500000" && $type_of_policy == "Silver Smart") {
					$whereInArray["health_suraksha_silver_smart_tier_2_500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_2_500000", $colNames = "health_suraksha_silver_smart_tier_2_500000.silver_smart_id,health_suraksha_silver_smart_tier_2_500000.age,health_suraksha_silver_smart_tier_2_500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "750000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_2_750000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_2_750000", $colNames = "health_suraksha_gold_smart_tier_2_750000.smart_id,health_suraksha_gold_smart_tier_2_750000.age,health_suraksha_gold_smart_tier_2_750000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1000000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_2_1000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_2_1000000", $colNames = "health_suraksha_gold_smart_tier_2_1000000.smart_id,health_suraksha_gold_smart_tier_2_1000000.age,health_suraksha_gold_smart_tier_2_1000000
					.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1500000" && $type_of_policy == "Gold Smart") {
					$whereInArray["health_suraksha_gold_smart_tier_2_1500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_2_1500000", $colNames = "health_suraksha_gold_smart_tier_2_1500000.smart_id,health_suraksha_gold_smart_tier_2_1500000.age,health_suraksha_gold_smart_tier_2_1500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2000000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_2_2000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_2_2000000", $colNames = "health_suraksha_platinum_smart_tier_2_2000000.smart_id,health_suraksha_platinum_smart_tier_2_2000000.age,health_suraksha_platinum_smart_tier_2_2000000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2500000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_2_2500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_2_2500000", $colNames = "health_suraksha_platinum_smart_tier_2_2500000.smart_id,health_suraksha_platinum_smart_tier_2_2500000.age,health_suraksha_platinum_smart_tier_2_2500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "5000000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_2_5000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_2_5000000", $colNames = "health_suraksha_platinum_smart_tier_2_5000000.smart_id,health_suraksha_platinum_smart_tier_2_5000000.age,health_suraksha_platinum_smart_tier_2_5000000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "7500000" && $type_of_policy == "Platinum Smart") {
					$whereInArray["health_suraksha_platinum_smart_tier_2_7500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_2_7500000", $colNames = "health_suraksha_platinum_smart_tier_2_7500000.smart_id,health_suraksha_platinum_smart_tier_2_7500000.age,health_suraksha_platinum_smart_tier_2_7500000.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			}
			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($tot);
			// print_r($plan_rate_premium);
			// die("Test");

			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_hdfc_ergo_health_surksha_hospital_daily_cash_prem()
	{
		$sum_insured = $this->input->post("sum_insured");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($sum_insured == "1000") {
				$whereArr["health_suraksha_hospital_cash_1000.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_hospital_cash_1000", $colNames = "health_suraksha_hospital_cash_1000.cash_id,health_suraksha_hospital_cash_1000.age,health_suraksha_hospital_cash_1000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($sum_insured == "2000") {
				$whereArr["health_suraksha_hospital_cash_2000.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_hospital_cash_2000", $colNames = "health_suraksha_hospital_cash_2000.cash_id,health_suraksha_hospital_cash_2000.age,health_suraksha_hospital_cash_2000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($sum_insured == "3000") {
				$whereArr["health_suraksha_hospital_cash_3000.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_hospital_cash_3000", $colNames = "health_suraksha_hospital_cash_3000.cash_id,health_suraksha_hospital_cash_3000.age,health_suraksha_hospital_cash_3000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($sum_insured == "5000") {
				$whereArr["health_suraksha_hospital_cash_5000.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_hospital_cash_5000", $colNames = "health_suraksha_hospital_cash_5000.cash_id,health_suraksha_hospital_cash_5000.age,health_suraksha_hospital_cash_5000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($sum_insured == "7500") {
				$whereArr["health_suraksha_hospital_cash_7500.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_hospital_cash_7500", $colNames = "health_suraksha_hospital_cash_7500.cash_id,health_suraksha_hospital_cash_7500.age,health_suraksha_hospital_cash_7500.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_float_hdfc_ergo_health_suraksha_chart_for_child()
	{
		$table_cond = $this->input->post("table_cond");
		$region = $this->input->post("region");
		$type_of_policy = $this->input->post("type_of_policy");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "Tier 1A (Delhi/NCR)") {
				if ($table_cond == "300000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_1a_300000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1a_300000", $colNames = "health_suraksha_silver_smart_tier_1a_300000.silver_smart_id,health_suraksha_silver_smart_tier_1a_300000.age,health_suraksha_silver_smart_tier_1a_300000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "400000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_1a_400000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1a_400000", $colNames = "health_suraksha_silver_smart_tier_1a_400000.silver_smart_id,health_suraksha_silver_smart_tier_1a_400000.age,health_suraksha_silver_smart_tier_1a_400000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "500000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_1a_500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1a_500000", $colNames = "health_suraksha_silver_smart_tier_1a_500000.silver_smart_id,health_suraksha_silver_smart_tier_1a_500000.age,health_suraksha_silver_smart_tier_1a_500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "750000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_1a_750000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1a_750000", $colNames = "health_suraksha_gold_smart_tier_1a_750000.smart_id,health_suraksha_gold_smart_tier_1a_750000.age,health_suraksha_gold_smart_tier_1a_750000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1000000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_1a_1000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1a_1000000", $colNames = "health_suraksha_gold_smart_tier_1a_1000000.smart_id,health_suraksha_gold_smart_tier_1a_1000000.age,health_suraksha_gold_smart_tier_1a_1000000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1500000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_1a_1500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1a_1500000", $colNames = "health_suraksha_gold_smart_tier_1a_1500000.smart_id,health_suraksha_gold_smart_tier_1a_1500000.age,health_suraksha_gold_smart_tier_1a_1500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2000000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_1a_2000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1a_2000000", $colNames = "health_suraksha_platinum_smart_tier_1a_2000000.smart_id,health_suraksha_platinum_smart_tier_1a_2000000.age,health_suraksha_platinum_smart_tier_1a_2000000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2500000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_1a_2500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1a_2500000", $colNames = "health_suraksha_platinum_smart_tier_1a_2500000.smart_id,health_suraksha_platinum_smart_tier_1a_2500000.age,health_suraksha_platinum_smart_tier_1a_2500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "5000000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_1a_5000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1a_5000000", $colNames = "health_suraksha_platinum_smart_tier_1a_5000000.smart_id,health_suraksha_platinum_smart_tier_1a_5000000.age,health_suraksha_platinum_smart_tier_1a_5000000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "7500000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_1a_7500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1a_7500000", $colNames = "health_suraksha_platinum_smart_tier_1a_7500000.smart_id,health_suraksha_platinum_smart_tier_1a_7500000.age,health_suraksha_platinum_smart_tier_1a_7500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			} elseif ($region == "Tier 1B (Mumbai, Pune, Surat, Varodara, Ahmedabad)") {
				if ($table_cond == "300000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_1b_300000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1b_300000", $colNames = "health_suraksha_silver_smart_tier_1b_300000.silver_smart_id,health_suraksha_silver_smart_tier_1b_300000.age,health_suraksha_silver_smart_tier_1b_300000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "400000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_1b_400000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1b_400000", $colNames = "health_suraksha_silver_smart_tier_1b_400000.silver_smart_id,health_suraksha_silver_smart_tier_1b_400000.age,health_suraksha_silver_smart_tier_1b_400000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "500000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_1b_500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_1b_500000", $colNames = "health_suraksha_silver_smart_tier_1b_500000.silver_smart_id,health_suraksha_silver_smart_tier_1b_500000.age,health_suraksha_silver_smart_tier_1b_500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "750000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_1b_750000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1b_750000", $colNames = "health_suraksha_gold_smart_tier_1b_750000.smart_id,health_suraksha_gold_smart_tier_1b_750000.age,health_suraksha_gold_smart_tier_1b_750000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1000000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_1b_1000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1b_1000000", $colNames = "health_suraksha_gold_smart_tier_1b_1000000.smart_id,health_suraksha_gold_smart_tier_1b_1000000.age,health_suraksha_gold_smart_tier_1b_1000000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1500000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_1b_1500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_1b_1500000", $colNames = "health_suraksha_gold_smart_tier_1b_1500000.smart_id,health_suraksha_gold_smart_tier_1b_1500000.age,health_suraksha_gold_smart_tier_1b_1500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2000000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_1b_2000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1b_2000000", $colNames = "health_suraksha_platinum_smart_tier_1b_2000000.smart_id,health_suraksha_platinum_smart_tier_1b_2000000.age,health_suraksha_platinum_smart_tier_1b_2000000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2500000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_1b_2500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1b_2500000", $colNames = "health_suraksha_platinum_smart_tier_1b_2500000.smart_id,health_suraksha_platinum_smart_tier_1b_2500000.age,health_suraksha_platinum_smart_tier_1b_2500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "5000000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_1b_5000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1b_5000000", $colNames = "health_suraksha_platinum_smart_tier_1b_5000000.smart_id,health_suraksha_platinum_smart_tier_1b_5000000.age,health_suraksha_platinum_smart_tier_1b_5000000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "7500000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_1b_7500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_1b_7500000", $colNames = "health_suraksha_platinum_smart_tier_1b_7500000.smart_id,health_suraksha_platinum_smart_tier_1b_7500000.age,health_suraksha_platinum_smart_tier_1b_7500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			} elseif ($region == "Tier 2 (Rest of India)") {
				if ($table_cond == "300000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_2_300000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_2_300000", $colNames = "health_suraksha_silver_smart_tier_2_300000.silver_smart_id,health_suraksha_silver_smart_tier_2_300000.age,health_suraksha_silver_smart_tier_2_300000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "400000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_2_400000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_2_400000", $colNames = "health_suraksha_silver_smart_tier_2_400000.silver_smart_id,health_suraksha_silver_smart_tier_2_400000.age,health_suraksha_silver_smart_tier_2_400000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "500000" && $type_of_policy == "Silver Smart") {
					$whereArr["health_suraksha_silver_smart_tier_2_500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_silver_smart_tier_2_500000", $colNames = "health_suraksha_silver_smart_tier_2_500000.silver_smart_id,health_suraksha_silver_smart_tier_2_500000.age,health_suraksha_silver_smart_tier_2_500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "750000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_2_750000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_2_750000", $colNames = "health_suraksha_gold_smart_tier_2_750000.smart_id,health_suraksha_gold_smart_tier_2_750000.age,health_suraksha_gold_smart_tier_2_750000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1000000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_2_1000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_2_1000000", $colNames = "health_suraksha_gold_smart_tier_2_1000000.smart_id,health_suraksha_gold_smart_tier_2_1000000.age,health_suraksha_gold_smart_tier_2_1000000
					.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "1500000" && $type_of_policy == "Gold Smart") {
					$whereArr["health_suraksha_gold_smart_tier_2_1500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_gold_smart_tier_2_1500000", $colNames = "health_suraksha_gold_smart_tier_2_1500000.smart_id,health_suraksha_gold_smart_tier_2_1500000.age,health_suraksha_gold_smart_tier_2_1500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2000000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_2_2000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_2_2000000", $colNames = "health_suraksha_platinum_smart_tier_2_2000000.smart_id,health_suraksha_platinum_smart_tier_2_2000000.age,health_suraksha_platinum_smart_tier_2_2000000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "2500000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_2_2500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_2_2500000", $colNames = "health_suraksha_platinum_smart_tier_2_2500000.smart_id,health_suraksha_platinum_smart_tier_2_2500000.age,health_suraksha_platinum_smart_tier_2_2500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "5000000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_2_5000000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_2_5000000", $colNames = "health_suraksha_platinum_smart_tier_2_5000000.smart_id,health_suraksha_platinum_smart_tier_2_5000000.age,health_suraksha_platinum_smart_tier_2_5000000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($table_cond == "7500000" && $type_of_policy == "Platinum Smart") {
					$whereArr["health_suraksha_platinum_smart_tier_2_7500000.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "health_suraksha_platinum_smart_tier_2_7500000", $colNames = "health_suraksha_platinum_smart_tier_2_7500000.smart_id,health_suraksha_platinum_smart_tier_2_7500000.age,health_suraksha_platinum_smart_tier_2_7500000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = TRUE, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			}
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($premium_rate);
			// print_r($plan_rate_premium);
			// die("Test");
			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Health Suraksha :  Mediclaim Individual : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD

	// Easy Health :  Mediclaim Individual : Missleneous Start company :  HDFC ERGO HEALTH INSURANCE LTD
	public function get_hdfc_ergo_health_insu_easy_rate_card_basic_premium()
	{
		$region = $this->input->post("region");
		$type_of_policy = $this->input->post("type_of_policy");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");
		// print_r($condition_value);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "National Capital Region and Mumbai Metropolitan Region") {
				if ($type_of_policy == "Standard Plan") {
					$whereInArray["hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_standard.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_standard", $colNames = "hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_standard.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_standard.age,hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_standard.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($type_of_policy == "Exclusive Plan") {
					$whereInArray["hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_exclusive.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_exclusive", $colNames = "hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_exclusive.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_exclusive.age,hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_exclusive.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($type_of_policy == "Premium Plan") {
					$whereInArray["hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_premium.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_premium", $colNames = "hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_premium.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_premium.age,hdfc_ergo_health_easy_rate_card_indi_mumbai_metro_premium.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
					// echo $this->db->last_query();
					// print_r($plan_rate_premium);
					// die();
				}
			} elseif ($region == "Rest of India") {
				if ($type_of_policy == "Standard Plan") {
					$whereInArray["hdfc_ergo_health_easy_rate_card_indi_rest_of_india_standard.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_rest_of_india_standard", $colNames = "hdfc_ergo_health_easy_rate_card_indi_rest_of_india_standard.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_rest_of_india_standard.age,hdfc_ergo_health_easy_rate_card_indi_rest_of_india_standard.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($type_of_policy == "Exclusive Plan") {
					$whereInArray["hdfc_ergo_health_easy_rate_card_indi_rest_of_india_exclusive.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_rest_of_india_exclusive", $colNames = "hdfc_ergo_health_easy_rate_card_indi_rest_of_india_exclusive.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_rest_of_india_exclusive.age,hdfc_ergo_health_easy_rate_card_indi_rest_of_india_exclusive.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				} elseif ($type_of_policy == "Premium Plan") {
					$whereInArray["hdfc_ergo_health_easy_rate_card_indi_rest_of_india_premium.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_rest_of_india_premium", $colNames = "hdfc_ergo_health_easy_rate_card_indi_rest_of_india_premium.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_rest_of_india_premium.age,hdfc_ergo_health_easy_rate_card_indi_rest_of_india_premium.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
			}
			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($tot);
			// print_r($plan_rate_premium);
			// die("Test");

			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_hospital_daily_easy_rate_card_cash_prem()
	{
		$sum_insured = $this->input->post("sum_insured");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($sum_insured == "1000") {
				$whereArr["hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_1000.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_1000", $colNames = "hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_1000.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_1000.age,hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_1000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			} elseif ($sum_insured == "2000") {
				$whereArr["hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_2000.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_2000", $colNames = "hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_2000.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_2000.age,hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_2000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			} elseif ($sum_insured == "3000") {
				$whereArr["hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_3000.age"] = $condition_value;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_3000", $colNames = "hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_3000.hdfc_id,hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_3000.age,hdfc_ergo_health_easy_rate_card_indi_hospital_daily_cash_3000.$column_value", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
				if (!empty($plan_rate_premium))
					$premium_rate = $plan_rate_premium[$column_value];
			}

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_easy_rate_card_option_premium()
	{
		$age = $this->input->post("age");
		$protector_rider_type = $this->input->post("protector_rider_type");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			$tot = 0;
			if ($protector_rider_type == "Opted") {
				if (!empty($condition_value) && !empty($column_value)) {
					$whereInArray["hdfc_ergo_health_easy_rate_card_optional_benefit.age"] = $condition_value;
					$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_optional_benefit", $colNames = "hdfc_ergo_health_easy_rate_card_optional_benefit.rate_card_id,hdfc_ergo_health_easy_rate_card_optional_benefit.age,hdfc_ergo_health_easy_rate_card_optional_benefit.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					$plan_rate_premium = $query["userData"];
				}
				// if (!empty($plan_rate_premium))
				// 	$premium_rate = $plan_rate_premium[$column_value];

				$premium_rate = array();

				if (!empty($plan_rate_premium)) {
					for ($i = 0; $i < count($condition_value); $i++) {
						for ($j = 0; $j < count($plan_rate_premium); $j++) {
							$ages = $plan_rate_premium[$j]["age"];
							if ($ages == $condition_value[$i]) {
								$premium_rate = $plan_rate_premium[$j][$column_value];
								$tot = $tot + $premium_rate;
							}
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($plan_rate_premium . "<br/>");
			// print_r($premium_rate . "<br/>");
			// print_r($tot . "<br/>");
			// die();
			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Easy Health :  Mediclaim Individual : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD

	// Easy Health :  Mediclaim Floater : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD
	public function get_float_easy_rate_card_hdfc_ergo_health_insu_basic_premium()
	{
		$region = $this->input->post("region");
		$type_of_policy = $this->input->post("type_of_policy");
		$hdfc_ergo_health_insu_family_size = $this->input->post("sub_policy_family_size");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$column_value = $this->input->post("column_value");

		// print_r($condition_value);
		// die("Test");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($region == "National Capital Region and Mumbai Metropolitan Region") {
				if ($type_of_policy == "Standard Plan") { //rate_id
					if ($hdfc_ergo_health_insu_family_size == "1A + 1C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_1c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_1c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_1c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 2C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_2c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_2c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_2c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 3C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_3c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_3c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_3c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 4C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_4c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_4c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_4c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 5C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_5c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_5c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_5c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_5c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_1a_5c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 0C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 1C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_1c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_1c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_1c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 2C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_2c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_2c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_2c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 3C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_3c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_3c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_3c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 4C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_4c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_4c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_4c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_standard_2a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					}
				} elseif ($type_of_policy == "Exclusive Plan") {
					if ($hdfc_ergo_health_insu_family_size == "1A + 1C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_1c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_1c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_1c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 2C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_2c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_2c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_2c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 3C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_3c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_3c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_3c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 4C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_4c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_4c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_4c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 5C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_5c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_5c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_5c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_5c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_1a_5c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 0C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 1C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_1c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_1c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_1c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 2C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_2c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_2c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_2c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 3C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_3c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_3c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_3c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 4C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_4c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_4c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_4c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_exclusive_2a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					}
				} elseif ($type_of_policy == "Premium Plan") {
					if ($hdfc_ergo_health_insu_family_size == "1A + 1C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_1c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_1c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_1c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 2C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_2c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_2c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_2c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 3C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_3c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_3c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_3c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 4C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_4c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_4c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_4c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 5C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_5c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_5c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_5c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_5c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_1a_5c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 0C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 1C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_1c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_1c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_1c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 2C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_2c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_2c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_2c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 3C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_3c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_3c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_3c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 4C") {
						$whereInArray["hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_4c", $colNames = "hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_4c.rate_id,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_4c.age,hdfc_ergo_health_float_easy_rate_card_mumbai_premium_2a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					}
				}
				$plan_rate_premium = $query["userData"];
			} elseif ($region == "Rest of India") {
				if ($type_of_policy == "Standard Plan") { //rate_id
					if ($hdfc_ergo_health_insu_family_size == "1A + 1C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_1c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_1c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_1c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 2C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_2c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_2c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_2c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 3C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_3c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_3c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_3c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 4C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_4c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_4c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_4c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 5C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_5c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_5c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_5c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_5c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_1a_5c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 0C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 1C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_1c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_1c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_1c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 2C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_2c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_2c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_2c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 3C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_3c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_3c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_3c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 4C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_4c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_4c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_4c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_standard_2a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					}
				} elseif ($type_of_policy == "Exclusive Plan") {
					if ($hdfc_ergo_health_insu_family_size == "1A + 1C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_1c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_1c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_1c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 2C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_2c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_2c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_2c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 3C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_3c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_3c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_3c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 4C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_4c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_4c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_4c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 5C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_5c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_5c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_5c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_5c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_1a_5c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 0C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 1C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_1c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_1c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_1c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 2C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_2c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_2c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_2c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 3C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_3c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_3c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_3c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 4C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_4c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_4c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_4c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_exclusive_2a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					}
				} elseif ($type_of_policy == "Premium Plan") {
					if ($hdfc_ergo_health_insu_family_size == "1A + 1C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_1c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_1c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_1c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 2C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_2c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_2c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_2c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 3C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_3c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_3c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_3c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 4C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_4c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_4c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_4c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "1A + 5C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_5c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_5c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_5c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_5c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_1a_5c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 0C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 1C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_1c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_1c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_1c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_1c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_1c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 2C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_2c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_2c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_2c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_2c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_2c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 3C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_3c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_3c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_3c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_3c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_3c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					} elseif ($hdfc_ergo_health_insu_family_size == "2A + 4C") {
						$whereInArray["hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_4c.age"] = $condition_value;
						$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_4c", $colNames = "hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_4c.rate_id,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_4c.age,hdfc_ergo_health_easy_rate_card_rest_of_india_premium_2a_4c.$column_value", $whereArr = array(), $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
					}
				}
				$plan_rate_premium = $query["userData"];
			}

			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($condition_value);
			// print_r($plan_rate_premium);
			// print_r($tot);
			// print_r($plan_rate_premium);
			// die("Test");

			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_float_easy_rate_card_hdfc_ergo_health_insu_chart_for_child()
	{
		$max_age = $this->input->post("max_age");
		$column_value = $this->input->post("column_value");
		// print_r($max_age );
		// print_r($column_value );
		// die();
		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			// $whereArr["hdfc_ergo_health_easy_rate_card_indi_hospital_additional_child.age"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_easy_rate_card_indi_hospital_additional_child", $colNames = "hdfc_ergo_health_easy_rate_card_indi_hospital_additional_child.$column_value", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];
			// echo $this->db->last_query();
			// print_r($plan_rate_premium );
			// die();

			if (!empty($premium_rate)) {
				$result["status"] = true;
				$result["userdata"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Easy Health :  Mediclaim Floater : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD

	// Energy : Super Top Up Individual : Missleneous Start company :  HDFC ERGO HEALTH INSURANCE LTD
	public function get_hdfc_ergo_health_supertopup_ind_basic_premium()
	{
		$table_cond = $this->input->post("table_cond");
		$age = $this->input->post("age");
		$condition_value = $this->input->post("condition_value");
		$condition_value1 = $this->input->post("condition_value1");
		$column_value = $this->input->post("column_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";

			if ($table_cond == "200000") {
				$whereInArray["hdfc_ergo_health_super_topup_200000.age"] = $condition_value;
				$whereArr["hdfc_ergo_health_super_topup_200000.sum_insured"] = $condition_value1;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_200000", $colNames = "hdfc_ergo_health_super_topup_200000.super_topup_id,hdfc_ergo_health_super_topup_200000.age,hdfc_ergo_health_super_topup_200000.sum_insured,hdfc_ergo_health_super_topup_200000.$column_value", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($table_cond == "300000") {
				$whereInArray["hdfc_ergo_health_super_topup_300000.age"] = $condition_value;
				$whereArr["hdfc_ergo_health_super_topup_300000.sum_insured"] = $condition_value1;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_300000", $colNames = "hdfc_ergo_health_super_topup_300000.super_topup_id,hdfc_ergo_health_super_topup_300000.age,hdfc_ergo_health_super_topup_300000.sum_insured,hdfc_ergo_health_super_topup_300000.$column_value", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($table_cond == "400000") {
				$whereInArray["hdfc_ergo_health_super_topup_400000.age"] = $condition_value;
				$whereArr["hdfc_ergo_health_super_topup_400000.sum_insured"] = $condition_value1;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_400000", $colNames = "hdfc_ergo_health_super_topup_400000.super_topup_id,hdfc_ergo_health_super_topup_400000.age,hdfc_ergo_health_super_topup_400000.sum_insured,hdfc_ergo_health_super_topup_400000.$column_value", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			} elseif ($table_cond == "500000") {
				$whereInArray["hdfc_ergo_health_super_topup_500000.age"] = $condition_value;
				$whereArr["hdfc_ergo_health_super_topup_500000.sum_insured"] = $condition_value1;
				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "hdfc_ergo_health_super_topup_500000", $colNames = "hdfc_ergo_health_super_topup_500000.super_topup_id,hdfc_ergo_health_super_topup_500000.age,hdfc_ergo_health_super_topup_500000.sum_insured,hdfc_ergo_health_super_topup_500000.$column_value", $whereArr = $whereArr, $whereInArray = $whereInArray, $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
				$plan_rate_premium = $query["userData"];
			}

			// if (!empty($plan_rate_premium))
			// 	$premium_rate = $plan_rate_premium[$column_value];

			$premium_rate = array();
			$tot = 0;
			if (!empty($plan_rate_premium)) {
				for ($i = 0; $i < count($condition_value); $i++) {
					for ($j = 0; $j < count($plan_rate_premium); $j++) {
						$ages = $plan_rate_premium[$j]["age"];
						if ($ages == $condition_value[$i]) {
							$premium_rate = $plan_rate_premium[$j][$column_value];
							$tot = $tot + $premium_rate;
						}
					}
				}
			}
			// echo $this->db->last_query();
			// print_r($condition_value);
			// print_r($condition_value1);
			// print_r($table_cond);
			// print_r($tot);
			// die("Test");

			if (!empty($tot)) {
				$result["status"] = true;
				$result["userdata"] = $tot;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Energy : Super Top Up Individual : Missleneous End company :  HDFC ERGO HEALTH INSURANCE LTD


	// Super Top Up Floater Start
	public function get_super_top_up_floater_chart()
	{
		$max_age = $this->input->post("max_age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			$whereArr["super_top_up_floater_chart.options"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "super_top_up_floater_chart", $colNames = "super_top_up_floater_chart.super_top_floater_chart_id,super_top_up_floater_chart.$column_value,super_top_up_floater_chart.sum_insured,super_top_up_floater_chart.treshold", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($plan_rate_premium)) {
				$result["status"] = true;
				$result["userdata"] = $plan_rate_premium;
				$result["plan_rate_premium"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["plan_rate_premium"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function get_supertopup_ind_chart()
	{
		$age = $this->input->post("age");
		$column_value = $this->input->post("column_value");
		$condition_value = $this->input->post("condition_value");

		if (!empty($this->input->post())) {
			$plan_rate_premium = array();
			$premium_rate = "";
			$whereArr["supertopup_ind_chart.options"] = $condition_value;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "supertopup_ind_chart", $colNames = "supertopup_ind_chart.supertopup_ind_chart_id,supertopup_ind_chart.$column_value,supertopup_ind_chart.sum_insured,supertopup_ind_chart.treshold", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
			$plan_rate_premium = $query["userData"];
			if (!empty($plan_rate_premium))
				$premium_rate = $plan_rate_premium[$column_value];

			// echo $this->db->last_query();
			// print_r($column_value);
			// print_r($condition_value);
			// print_r($premium_rate);
			// die("test");

			if (!empty($plan_rate_premium)) {
				$result["status"] = true;
				$result["userdata"] = $plan_rate_premium;
				$result["plan_rate_premium"] = $premium_rate;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["plan_rate_premium"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}
	// Super Top Up Floater End

	// Remote Section End

	public function get_gmc_excel_attach_file_upload()
	{
		$serial_no_year = $this->input->post("serial_no_year");
		$serial_no_month = $this->input->post("serial_no_month");
		$serial_no = $this->input->post("serial_no");

		$gmc_excel_attach_file_name = "";
		$new_file_name = "";
		if (!empty($_FILES["gmc_excel_attach"])) {
			$gmc_excel_attach_data = $_FILES["gmc_excel_attach"]["name"];
			// $count = count($_FILES["gmc_excel_attach"]['name']);
			// print_r($count);
			// die("Hello");
			$gmc_excel_attach_img = $this->ajax_file_upload($img_name = "gmc_excel_attach", $directory_name = "./mediclaim/gmc/", $overwrite = False, $allowed_types = "xlsx|xlsm|xlsb|xltx|xltm|xls|csv", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $url = "", $user_session_id = "_Normal_upload_", $count_type = false);

			if ($gmc_excel_attach_img["error"] != "") {
				$gmc_excel_attach_img["status"] = false;
				$gmc_excel_attach_img["messages"]["gmc_excel_attach_err"]  = $gmc_excel_attach_img["error"];
				echo json_encode($gmc_excel_attach_img);
				die();
			} elseif ($gmc_excel_attach_img["file_name"] != "") {
				$gmc_excel_attach_file_name = $gmc_excel_attach_img["file_name"];
				$gmc_excel_attach_file_size = $gmc_excel_attach_img["file_size"];
				$gmc_excel_attach_file_type = $gmc_excel_attach_img["file_type"];
			}
			if (!empty($gmc_excel_attach_file_name)) {
				if (empty($new_file_name))
					$new_file_name = $gmc_excel_attach_file_name;
				else
					$new_file_name .= "," . $gmc_excel_attach_file_name;
			}
		}
		// print_r($new_file_name);
		// die("Hellow");
		if (!empty($gmc_excel_attach_file_name)) {
			$result["status"] = true;
			$result["userdata"] = $gmc_excel_attach_file_name;
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

	public function get_gmc_attach_quote_file_upload()
	{
		$serial_no_year = $this->input->post("serial_no_year");
		$serial_no_month = $this->input->post("serial_no_month");
		$serial_no = $this->input->post("serial_no");
		$gmc_attach_quote_file_name = "";
		$new_file_name = "";
		if (!empty($_FILES["gmc_attach_quote"])) {
			$gmc_attach_quote_data = $_FILES["gmc_attach_quote"]["name"];
			// $count = count($_FILES["gmc_attach_quote"]['name']);
			// print_r($count);
			// die("Hello");
			$gmc_attach_quote_img = $this->ajax_file_upload($img_name = "gmc_attach_quote", $directory_name = "./mediclaim/gmc/", $overwrite = False, $allowed_types = "xlsx|xlsm|xlsb|xltx|xltm|xls|csv|pdf|Pdf", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $url = "", $user_session_id = "_Normal_upload_", $count_type = false);

			if ($gmc_attach_quote_img["error"] != "") {
				$gmc_excel_attach_img["status"] = false;
				$gmc_excel_attach_img["messages"]["gmc_attach_quote_err"]  = $gmc_attach_quote_img["error"];
				echo json_encode($gmc_excel_attach_img);
				die();
			} elseif ($gmc_attach_quote_img["file_name"] != "") {
				$gmc_attach_quote_file_name = $gmc_attach_quote_img["file_name"];
				$gmc_attach_quote_file_size = $gmc_attach_quote_img["file_size"];
				$gmc_attach_quote_file_type = $gmc_attach_quote_img["file_type"];
			}
			if (!empty($gmc_attach_quote_file_name)) {
				if (empty($new_file_name))
					$new_file_name = $gmc_attach_quote_file_name;
				else
					$new_file_name .= "," . $gmc_attach_quote_file_name;
			}
		}
		// print_r($new_file_name);
		// die("Hellow");
		if (!empty($gmc_attach_quote_file_name)) {
			$result["status"] = true;
			$result["userdata"] = $gmc_attach_quote_file_name;
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

	public function get_gmc_attach_endorsment_copy_file_upload()
	{
		$serial_no_year = $this->input->post("serial_no_year");
		$serial_no_month = $this->input->post("serial_no_month");
		$serial_no = $this->input->post("serial_no");
		$gmc_attach_endorsment_copy_file_name = "";
		$new_file_name = "";
		if (!empty($_FILES["gmc_attach_endorsment_copy"])) {
			$gmc_attach_endorsment_copy_data = $_FILES["gmc_attach_endorsment_copy"]["name"];
			// $count = count($_FILES["gmc_attach_endorsment_copy"]['name']);
			// print_r($count);
			// die("Hello");
			$gmc_attach_endorsment_copy_img = $this->ajax_file_upload($img_name = "gmc_attach_endorsment_copy", $directory_name = "./mediclaim/gmc/", $overwrite = False, $allowed_types = "xlsx|xlsm|xlsb|xltx|xltm|xls|csv|pdf|Pdf", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $url = "", $user_session_id = "_Normal_upload_", $count_type = false);

			if ($gmc_attach_endorsment_copy_img["error"] != "") {
				$gmc_excel_attach_img["status"] = false;
				$gmc_excel_attach_img["messages"]["gmc_attach_endorsment_copy_err"]  = $gmc_attach_endorsment_copy_img["error"];
				echo json_encode($gmc_excel_attach_img);
				die();
			} elseif ($gmc_attach_endorsment_copy_img["file_name"] != "") {
				$gmc_attach_endorsment_copy_file_name = $gmc_attach_endorsment_copy_img["file_name"];
				$gmc_attach_endorsment_copy_file_size = $gmc_attach_endorsment_copy_img["file_size"];
				$gmc_attach_endorsment_copy_file_type = $gmc_attach_endorsment_copy_img["file_type"];
			}
			if (!empty($gmc_attach_endorsment_copy_file_name)) {
				if (empty($new_file_name))
					$new_file_name = $gmc_attach_endorsment_copy_file_name;
				else
					$new_file_name .= "," . $gmc_attach_endorsment_copy_file_name;
			}
		}
		// print_r($new_file_name);
		// die("Hellow");
		if (!empty($gmc_attach_endorsment_copy_file_name)) {
			$result["status"] = true;
			$result["userdata"] = $gmc_attach_endorsment_copy_file_name;
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

	public function get_gpa_excel_attach_file_upload()
	{
		$serial_no_year = $this->input->post("serial_no_year");
		$serial_no_month = $this->input->post("serial_no_month");
		$serial_no = $this->input->post("serial_no");

		$gpa_excel_attach_file_name = "";
		$new_file_name = "";
		if (!empty($_FILES["gpa_excel_attach"])) {
			$gpa_excel_attach_data = $_FILES["gpa_excel_attach"]["name"];
			// $count = count($_FILES["gpa_excel_attach"]['name']);
			// print_r($count);
			// die("Hello");
			$gpa_excel_attach_img = $this->ajax_file_upload($img_name = "gpa_excel_attach", $directory_name = "./mediclaim/gpa/", $overwrite = False, $allowed_types = "xlsx|xlsm|xlsb|xltx|xltm|xls|csv", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $url = "", $user_session_id = "_Normal_upload_", $count_type = false);

			if ($gpa_excel_attach_img["error"] != "") {
				$gpa_excel_attach_img["status"] = false;
				$gpa_excel_attach_img["messages"]["gpa_excel_attach_err"]  = $gpa_excel_attach_img["error"];
				echo json_encode($gpa_excel_attach_img);
				die();
			} elseif ($gpa_excel_attach_img["file_name"] != "") {
				$gpa_excel_attach_file_name = $gpa_excel_attach_img["file_name"];
				$gpa_excel_attach_file_size = $gpa_excel_attach_img["file_size"];
				$gpa_excel_attach_file_type = $gpa_excel_attach_img["file_type"];
			}
			if (!empty($gpa_excel_attach_file_name)) {
				if (empty($new_file_name))
					$new_file_name = $gpa_excel_attach_file_name;
				else
					$new_file_name .= "," . $gpa_excel_attach_file_name;
			}
		}
		// print_r($new_file_name);
		// die("Hellow");
		if (!empty($gpa_excel_attach_file_name)) {
			$result["status"] = true;
			$result["userdata"] = $gpa_excel_attach_file_name;
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

	public function get_gpa_attach_quote_file_upload()
	{
		$serial_no_year = $this->input->post("serial_no_year");
		$serial_no_month = $this->input->post("serial_no_month");
		$serial_no = $this->input->post("serial_no");
		$gpa_attach_quote_file_name = "";
		$new_file_name = "";
		if (!empty($_FILES["gpa_attach_quote"])) {
			$gpa_attach_quote_data = $_FILES["gpa_attach_quote"]["name"];
			// $count = count($_FILES["gpa_attach_quote"]['name']);
			// print_r($count);
			// die("Hello");
			$gpa_attach_quote_img = $this->ajax_file_upload($img_name = "gpa_attach_quote", $directory_name = "./mediclaim/gpa/", $overwrite = False, $allowed_types = "xlsx|xlsm|xlsb|xltx|xltm|xls|csv|pdf|Pdf", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $url = "", $user_session_id = "_Normal_upload_", $count_type = false);

			if ($gpa_attach_quote_img["error"] != "") {
				$gpa_excel_attach_img["status"] = false;
				$gpa_excel_attach_img["messages"]["gpa_attach_quote_err"]  = $gpa_attach_quote_img["error"];
				echo json_encode($gpa_excel_attach_img);
				die();
			} elseif ($gpa_attach_quote_img["file_name"] != "") {
				$gpa_attach_quote_file_name = $gpa_attach_quote_img["file_name"];
				$gpa_attach_quote_file_size = $gpa_attach_quote_img["file_size"];
				$gpa_attach_quote_file_type = $gpa_attach_quote_img["file_type"];
			}
			if (!empty($gpa_attach_quote_file_name)) {
				if (empty($new_file_name))
					$new_file_name = $gpa_attach_quote_file_name;
				else
					$new_file_name .= "," . $gpa_attach_quote_file_name;
			}
		}
		// print_r($new_file_name);
		// die("Hellow");
		if (!empty($gpa_attach_quote_file_name)) {
			$result["status"] = true;
			$result["userdata"] = $gpa_attach_quote_file_name;
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

	public function get_gpa_attach_endorsment_copy_file_upload()
	{
		$serial_no_year = $this->input->post("serial_no_year");
		$serial_no_month = $this->input->post("serial_no_month");
		$serial_no = $this->input->post("serial_no");
		$gpa_attach_endorsment_copy_file_name = "";
		$new_file_name = "";
		if (!empty($_FILES["gpa_attach_endorsment_copy"])) {
			$gpa_attach_endorsment_copy_data = $_FILES["gpa_attach_endorsment_copy"]["name"];
			// $count = count($_FILES["gpa_attach_endorsment_copy"]['name']);
			// print_r($count);
			// die("Hello");
			$gpa_attach_endorsment_copy_img = $this->ajax_file_upload($img_name = "gpa_attach_endorsment_copy", $directory_name = "./mediclaim/gpa/", $overwrite = False, $allowed_types = "xlsx|xlsm|xlsb|xltx|xltm|xls|csv|pdf|Pdf", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $url = "", $user_session_id = "_Normal_upload_", $count_type = false);

			if ($gpa_attach_endorsment_copy_img["error"] != "") {
				$gpa_excel_attach_img["status"] = false;
				$gpa_excel_attach_img["messages"]["gpa_attach_endorsment_copy_err"]  = $gpa_attach_endorsment_copy_img["error"];
				echo json_encode($gpa_excel_attach_img);
				die();
			} elseif ($gpa_attach_endorsment_copy_img["file_name"] != "") {
				$gpa_attach_endorsment_copy_file_name = $gpa_attach_endorsment_copy_img["file_name"];
				$gpa_attach_endorsment_copy_file_size = $gpa_attach_endorsment_copy_img["file_size"];
				$gpa_attach_endorsment_copy_file_type = $gpa_attach_endorsment_copy_img["file_type"];
			}
			if (!empty($gpa_attach_endorsment_copy_file_name)) {
				if (empty($new_file_name))
					$new_file_name = $gpa_attach_endorsment_copy_file_name;
				else
					$new_file_name .= "," . $gpa_attach_endorsment_copy_file_name;
			}
		}
		// print_r($new_file_name);
		// die("Hellow");
		if (!empty($gpa_attach_endorsment_copy_file_name)) {
			$result["status"] = true;
			$result["userdata"] = $gpa_attach_endorsment_copy_file_name;
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

	public function get_paymentacknowledgement_file_upload()
	{
		$serial_no_year = $this->input->post("serial_no_year");
		$serial_no_month = $this->input->post("serial_no_month");
		$serial_no = $this->input->post("serial_no");
		$paymentacknowledgement_file_name = "";
		$new_file_name = "";
		if (!empty($_FILES["payment_acknowledgement_file"])) {
			$payment_acknowledgement_data = $_FILES["payment_acknowledgement_file"]["name"];
			// $count = count($_FILES["payment_acknowledgement"]['name']);
			// print_r($count);
			// die("Hello");
			$payment_acknowledgement_img = $this->ajax_file_upload($img_name = "payment_acknowledgement_file", $directory_name = "./payment_acknowledgement/", $overwrite = False, $allowed_types = "jpg|jpeg|png|JPG|JPEG|Png|pdf|Pdf", $max_size = "1024000", $max_width = "1024", $max_height = "768", $remove_spaces = TRUE, $encrypt_name = False, $string = $serial_no_year . "_" . $serial_no_month . "_" . $serial_no, $url = "", $user_session_id = "_Normal_upload_", $count_type = false);

			if ($payment_acknowledgement_img["error"] != "") {
				$paymentacknowledgement_img["status"] = false;
				$paymentacknowledgement_img["messages"]["payment_acknowledgement_file_err"]  = $payment_acknowledgement_img["error"];
				echo json_encode($paymentacknowledgement_img);
				die();
			} elseif ($payment_acknowledgement_img["file_name"] != "") {
				$paymentacknowledgement_file_name = $payment_acknowledgement_img["file_name"];
				$payment_acknowledgement_file_size = $payment_acknowledgement_img["file_size"];
				$payment_acknowledgement_file_type = $payment_acknowledgement_img["file_type"];
			}
			if (!empty($paymentacknowledgement_file_name)) {
				if (empty($new_file_name))
					$new_file_name = $paymentacknowledgement_file_name;
				else
					$new_file_name .= "," . $paymentacknowledgement_file_name;
			}
		}
		// print_r($new_file_name);
		// die("Hellow");
		if (!empty($paymentacknowledgement_file_name)) {
			$result["status"] = true;
			$result["userdata"] = $paymentacknowledgement_file_name;
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
		$gmc_excel_attach_file = $this->uri->segment(6); //1: GMC , 2:GPA

		$this->load->helper('download');

		if (!empty($gmc_excel_attach_file)) {
			if ($doc_type == 1)
				$data = file_get_contents("./mediclaim/gmc/" . $gmc_excel_attach_file);
			else if ($doc_type == 2)
				$data = file_get_contents("./mediclaim/gpa/" . $gmc_excel_attach_file);
			else if ($doc_type == 3)
				$data = file_get_contents("./payment_acknowledgement/" . $gmc_excel_attach_file);
		}

		force_download($gmc_excel_attach_file, $data);
	}

	public function view_doc()
	{
		$doc_type = (int)$this->uri->segment(4); //1: GMC , 2:GPA, 3:Payment Acknowlegement
		$file_type = (int)$this->uri->segment(5); //1: Gmc Excel Attach , 2: Gmc Attach Quote , 3: Gmc Attach Endorsment Copy
		$gmc_excel_attach_file = $this->uri->segment(6); //1: GMC , 2:GPA

		if (!empty($gmc_excel_attach_file)) {
			if ($doc_type == 1) {
				$extension = pathinfo("mediclaim/gmc/" . $gmc_excel_attach_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./mediclaim/gmc/" . $gmc_excel_attach_file);
			} else if ($doc_type == 2) {
				$extension = pathinfo("mediclaim/gpa/" . $gmc_excel_attach_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./mediclaim/gpa/" . $gmc_excel_attach_file);
			} else if ($doc_type == 3) {
				$extension = pathinfo("payment_acknowledgement/" . $gmc_excel_attach_file, PATHINFO_EXTENSION);
				$file = file_get_contents("./payment_acknowledgement/" . $gmc_excel_attach_file);
			}
			//xlsx|xlsm|xlsb|xltx|xltm|xls|csv
			if ($extension == "jpeg" ||  $extension == "jpg" ||  $extension == "png" ||  $extension == "Png" ||  $extension == "JPEG" ||  $extension == "JPG")
				$this->output->set_content_type(get_mime_by_extension($file))->set_output($file);
			else if ($extension == "xlsx" ||  $extension == "xlsm" ||  $extension == "xlsb" ||  $extension == "xltx" ||  $extension == "xltm" ||  $extension == "xls" ||  $extension == "csv") {
				header('Content-Disposition: attachment; filename="' . $gmc_excel_attach_file . '"');
				$this->output->set_content_type('application/vnd.ms-excel')->set_output($file);
			} else
				$this->output->set_content_type('application/pdf')->set_output($file);
		}
	}
}
