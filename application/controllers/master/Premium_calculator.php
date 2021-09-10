<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Premium_calculator extends Admin_gic_core
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
		$this->data["title"] = $title = "Premium Calculator";
	}
	// Calculator Section Start
	public function load_premium_calculator_view()
	{
		$policy_view = $this->input->post('policy_view');
		$this->data["company_array"] = $company_array = $this->input->post('company_array');
		$this->data["prem_array"] = $prem_array = $this->input->post('prem_array');
		$this->data["member_array"] = $member_array = $this->input->post('member_array');
		$this->data["not_converted_sum_insured"] = $not_converted_sum_insured = $this->input->post('not_converted_sum_insured');
		$this->data["converted_sum_insured"] = $converted_sum_insured = $this->input->post('converted_sum_insured');
		if (!empty($policy_view)) {
			$page = $this->load->view($policy_view, $this->data);
		} else {
			$page = "";
		}
		// print_r($company_array);
		// print_r($page);

		// die();
		if (!empty($page)) {
			$result["userdata"] = $page;
			$result["status"] = true;
		} else {
			$result["userdata"] = array();
			$result["status"] = false;
		}
		echo json_encode($result);
	}

	public function load_premium_view()
	{
		if ($this->input->post() != "") {
			$policy_name_txt = $this->input->post('policy_name_txt');
			$policy_type_txt = $this->input->post('policy_type_txt');
			$floater_policy_type = $this->input->post('floater_policy_type');
			$company = $this->input->post('company');
			// print_r($company);
			// print_r($policy_name_txt);
			// print_r($policy_type_txt);
			// print_r($floater_policy_type);
			// die("test");

			if (!empty($policy_name_txt)) {
				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Individual") {   //Mediclaim && Individual : Misslineoous
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD") {
						if ($floater_policy_type == "Optima Restore") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insurance_ltd_mediclaim_view", true);
						} elseif ($floater_policy_type == "Energy") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/energy_hdfc_ergo_health_insu_ltd_medi_view", true);
						} elseif ($floater_policy_type == "Health Suraksha") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/suraksha_hdfc_ergo_health_insu_ltd_medi_view", true);
						} elseif ($floater_policy_type == "Easy Health") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/medi/easy_health_rate_card_view", true);
						}
						// $page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insurance_ltd_mediclaim_view", true);
					} elseif ($company == "The New India Assurance Co Ltd") {
						if ($floater_policy_type == "New India Mediclaim Policy 2017") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/medi/new_india_medi_policy_2017_ind", true);
						}
					} elseif ($company == "Max Bupa Health Insurance Co Ltd") {
						if ($floater_policy_type == "Reassure") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/max_bupa/medi/max_bupa_reassurance_ind", true);
						}
					} elseif ($company == "Star Health & Allied Insurance Co Ltd") {
						if ($floater_policy_type == "Red Carpet") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/red_carpet_health_insu_ind_policy", true);
						} else if ($floater_policy_type == "Comprehensive") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/comprehensive_health_insu_ind_policy", true);
						}
					} elseif ($company == "United India Insurance Co Ltd") {
						if ($floater_policy_type == "Individual Health Insurance Policy") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/mediclaim_view", true);
						} elseif ($floater_policy_type == "Floater 2020(Individual)") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/mediclaim_individual_2020_view", true);
						} else {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/mediclaim_view", true);
						}
					} elseif ($company == "Care Health Insurance Co Ltd") {
						if ($floater_policy_type == "Care Advantage") {
							$page = $this->load->view("master/premium_calculator/mediclaim/care_health_insurance_co_ltd/medi/care_advantage_ind", true);
						} elseif ($floater_policy_type == "Care") {
							$page = $this->load->view("master/premium_calculator/mediclaim/care_health_insurance_co_ltd/medi/care_ind", true);
						} else {
							$page = "";
						}
					} else {
						$page = "";
					}
				} elseif ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") {    //Mediclaim && Floater 2014 : Misslineoous
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD") {
						if ($floater_policy_type == "Optima Restore") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/floater_hdfc_ergo_health_insurance_ltd_mediclaim_view", true);
						} elseif ($floater_policy_type == "Health Suraksha") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/float_suraksha_hdfc_ergo_health_medi_view", true);
						} elseif ($floater_policy_type == "Easy Health") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/medi/float_easy_health_rate_card_view", true);
						}
					} elseif ($company == "The New India Assurance Co Ltd") {
						if ($floater_policy_type == "New India Floater Mediclaim") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/medi/new_india_medi_float", true);
						}
					} elseif ($company == "Max Bupa Health Insurance Co Ltd") {
						if ($floater_policy_type == "Reassure") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/max_bupa/medi/max_bupa_reassurance_float", true);
						}
					} elseif ($company == "Star Health & Allied Insurance Co Ltd") {
						if ($floater_policy_type == "Red Carpet") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/red_carpet_health_insu_float_policy", true);
						} else if ($floater_policy_type == "Comprehensive") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/comprehensive_health_insu_float_policy", true);
						}
					} elseif ($company == "United India Insurance Co Ltd") {
						if ($floater_policy_type == "Family Floater 2014") {

							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim_floater_2014/mediclaim_floater_2014_view", true);
						} elseif ($floater_policy_type == "Family Floater 2020") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim_floater_2020/mediclaim_floater_2020_view", true);
						} else {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim_floater_2014/mediclaim_floater_2014_view", true);
						}
					} elseif ($company == "Care Health Insurance Co Ltd") {
						if ($floater_policy_type == "Care Advantage") {
							$page = $this->load->view("master/premium_calculator/mediclaim/care_health_insurance_co_ltd/medi/view_care_advantage_ind", true);
						} elseif ($floater_policy_type == "Care") {
							$page = $this->load->view("master/premium_calculator/mediclaim/care_health_insurance_co_ltd/medi/view_care_ind", true);
						} else {
							$page = "";
						}
					} else {
						$page = "";
					}
				} elseif ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Floater") {   //Super Top Up && Floater : Misslineoous
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD") {
						// if ($floater_policy_type == "Optima Restore") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/super_topup_float_view", true);
						// }
					} elseif ($company == "The New India Assurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/super_topup/new_india_super_topup_float", true);
					} elseif ($company == "Star Health & Allied Insurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/super_topup/star_health_supertopup_insu_float_policy", true);
					} elseif ($company == "United India Insurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/super_top_up/super_top_up_floater_view", true);
					} else {
						$page = "";
					}
				} elseif ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Individual") {  //Super Top Up && Individual : Misslineoous
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD") {
						// if ($floater_policy_type == "Optima Restore") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/super_topup_ind_view", true);
						// }
					} elseif ($company == "The New India Assurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/super_topup/new_india_super_topup_ind", true);
					} elseif ($company == "Star Health & Allied Insurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/super_topup/star_health_supertopup_insu_ind_policy", true);
					} elseif ($company == "United India Insurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/super_top_up_individual/super_top_up_individual_view", true);
					} else {
						$page = "";
					}
				} elseif ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Common Floater") {   //Super Top Up && Floater : Misslineoous
					$page = $this->load->view("master/premium_calculator/policy_view/common_views/common_super_top_up_floater_view", true);
				} elseif ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Common Individual") {  //Super Top Up && Individual : Misslineoous
					$page = $this->load->view("master/premium_calculator/policy_view/common_views/common_super_top_up_individual_view", true);
				} elseif (($policy_name_txt == "Mediclaim" ||  $policy_name_txt == "Personal Accident" || $policy_name_txt == "GMC" || $policy_name_txt == "GPA") && ($policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater")) {  // Mediclaim 
					if ($policy_type_txt == "Common Individual")
						$page = $this->load->view("master/premium_calculator/policy_view/common_views/common_ind_view", true);
					elseif ($policy_type_txt == "Common Floater")
						$page = $this->load->view("master/premium_calculator/policy_view/common_views/common_floater_view", true);
					else
						$page = "";
				} else
					$page = "";
			}

			if (!empty($page)) {
				$result["userdata"] = $page;
				$result["status"] = true;
			} else {
				$result["userdata"] = array();
				$result["status"] = false;
			}
			echo json_encode($result);
		}
	}

	public function view_premium_cal()
	{
		if ($this->input->post() != "") {
			$policy_name_txt = $this->input->post('policy_name_txt');
			$policy_type_txt = $this->input->post('policy_type_txt');
			$floater_policy_type = $this->input->post('floater_policy_type');
			$company = $this->input->post('company');
			// print_r($company);
			// print_r($policy_name_txt);
			// print_r($policy_type_txt);
			// print_r($floater_policy_type);
			// die("test");
			if (!empty($policy_name_txt)) {
				if ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Individual") {    //Mediclaim && Individual : Misslineoous
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD") {
						if ($floater_policy_type == "Optima Restore") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/view_hdfc_ergo_health_insurance_ltd_mediclaim", true);
						} elseif ($floater_policy_type == "Energy") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/view_energy_hdfc_ergo_health_insu_ltd_medi", true);
						} elseif ($floater_policy_type == "Health Suraksha") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/view_suraksha_hdfc_ergo_health_insu_ltd_medi", true);
						} elseif ($floater_policy_type == "Easy Health") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/medi/view_easy_health_rate_card", true);
						}
					} elseif ($company == "The New India Assurance Co Ltd") {
						if ($floater_policy_type == "New India Mediclaim Policy 2017") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/medi/view_new_india_medi_policy_2017_ind", true);
						}
					} elseif ($company == "Max Bupa Health Insurance Co Ltd") {
						if ($floater_policy_type == "Reassure") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/max_bupa/medi/view_max_bupa_reassurance_ind", true);
						}
					} elseif ($company == "Star Health & Allied Insurance Co Ltd") {
						if ($floater_policy_type == "Red Carpet") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/view_red_carpet_health_insu_ind_policy", true);
						} elseif ($floater_policy_type == "Comprehensive") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/view_comprehensive_health_insu_ind_policy", true);
						}
					} elseif ($company == "United India Insurance Co Ltd") {
						if ($floater_policy_type == "Individual Health Insurance Policy") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/view_mediclaim", true);
						} elseif ($floater_policy_type == "Floater 2020(Individual)") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/view_mediclaim_individual_2020", true);
						} else {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/view_mediclaim", true);
						}
					} else {
						$page = "";
					}
				} elseif ($policy_name_txt == "Mediclaim" && $policy_type_txt == "Floater") { //Mediclaim && Floater : Misslineoous
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD") {
						if ($floater_policy_type == "Optima Restore") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/view_floater_hdfc_ergo_health_insurance_ltd_mediclaim", true);
						} elseif ($floater_policy_type == "Health Suraksha") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/view_float_suraksha_hdfc_ergo_health_medi", true);
						} elseif ($floater_policy_type == "Easy Health") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/medi/view_float_easy_health_rate_card", true);
						}
					} elseif ($company == "The New India Assurance Co Ltd") {
						if ($floater_policy_type == "New India Floater Mediclaim") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/medi/view_new_india_medi_float", true);
						}
					} elseif ($company == "Max Bupa Health Insurance Co Ltd") {
						if ($floater_policy_type == "Reassure") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/max_bupa/medi/view_max_bupa_reassurance_float", true);
						}
					} elseif ($company == "Star Health & Allied Insurance Co Ltd") {
						if ($floater_policy_type == "Red Carpet") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/view_red_carpet_health_insu_float_policy", true);
						} elseif ($floater_policy_type == "Comprehensive") {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/view_comprehensive_health_insu_float_policy", true);
						}
					} elseif ($company == "United India Insurance Co Ltd") {
						if ($floater_policy_type == "Family Floater 2014") { //Mediclaim && Floater 2014 : Misslineoous
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim_floater_2014/view_mediclaim_floater_2014", true);
						} elseif ($floater_policy_type == "Family Floater 2020") { //Mediclaim && Floater 2020 : Misslineoous
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim_floater_2020/view_mediclaim_floater_2020", true);
						} else {
							$page = $this->load->view("master/premium_calculator/policy_view/mediclaim_floater_2014/view_mediclaim_floater_2014", true);
						}
					} else {
						$page = "";
					}
				} elseif ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Floater") {    		//Super Top Up && Floater : Misslineoous
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/view_super_topup_float", true);
					} elseif ($company == "The New India Assurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/super_topup/view_new_india_super_topup_float", true);
					} elseif ($company == "Star Health & Allied Insurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/super_topup/view_star_health_supertopup_insu_float_policy", true);
					} elseif ($company == "United India Insurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/super_top_up/view_super_top_up_floater", true);
					} else {
						$page = "";
					}
				} elseif ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Individual") {    //Super Top Up && Individual : Misslineoous
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/view_super_topup_ind", true);
					} elseif ($company == "The New India Assurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/super_topup/view_new_india_super_topup_ind", true);
					} elseif ($company == "Star Health & Allied Insurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/super_topup/view_star_health_supertopup_insu_ind_policy", true);
					} elseif ($company == "United India Insurance Co Ltd") {
						$page = $this->load->view("master/premium_calculator/policy_view/super_top_up_individual/view_super_top_up_individual", true);
					} else {
						$page = "";
					}
				} elseif ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Common Floater") {   //Super Top Up && Floater : Misslineoous
					$page = $this->load->view("master/premium_calculator/policy_view/common_views/view_common_super_top_up_floater", true);
				} elseif ($policy_name_txt == "Super Top Up" && $policy_type_txt == "Common Individual") {  //Super Top Up && Individual : Misslineoous
					$page = $this->load->view("master/premium_calculator/policy_view/common_views/view_common_super_top_up_individual", true);
				} elseif (($policy_name_txt == "Mediclaim") && ($policy_type_txt == "Common Individual" || $policy_type_txt == "Common Floater")) {  // Mediclaim 
					if ($policy_type_txt == "Common Individual")
						$page = $this->load->view("master/premium_calculator/policy_view/common_views/view_common_ind", true);
					elseif ($policy_type_txt == "Common Floater")
						$page = $this->load->view("master/premium_calculator/policy_view/common_views/view_common_floater", true);
					else
						$page = "";
				} else
					$page = "";
			}

			if (!empty($page)) {
				$result["userdata"] = $page;
				$result["status"] = true;
			} else {
				$result["userdata"] = array();
				$result["status"] = false;
			}
			echo json_encode($result);
		}
	}

	public function get_family_Size_sum_insure_dropdown()
	{
		$validator = array('status' => false, 'messages' => array());
		$premium_type = "";
		// if ($this->input->post() != "") {
		// $group_name = $this->input->post("group_name");

		// $whereArr["premium_calculator_addon.customer_id"] = $group_name;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_addon", $colNames = "premium_calculator_addon.premium_calculator_addon_id, premium_calculator_addon.type, premium_calculator_addon.json", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$premium_type = $query["userData"];
		// print_r($premium_type);
		// die();

		if (!empty($premium_type)) {
			$result["status"] = true;
			$result["userdata"] = $premium_type;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
		// }
	}

	public function get_filtered_policy()
	{
		$validator = array('status' => false, 'messages' => array());
		$filtered_policy = "";
		if ($this->input->post() != "") {
			$policy_option = $this->input->post("policy_option");
			$type_of_policy = $this->input->post("type_of_policy");

			// if(($type_of_policy != "null") && ($policy_option != "null")){
			// 	$whereArr["premium_calculator_addon.type"] = $policy_option." ".$type_of_policy;
			// 	$likeCondtnArr = array();
			// }else{
			// 	$whereArr = array();

			// 	if($policy_option != "null"){
			// 		$likeCondtnArr["premium_calculator_addon.type"] = $policy_option;
			// 	}elseif($type_of_policy != "null"){
			// 		$likeCondtnArr["premium_calculator_addon.type"] = $type_of_policy;
			// 	}
			// }

			$whereArr["premium_calculator_addon.type"] = $policy_option . " " . $type_of_policy;
			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_addon", $colNames = "premium_calculator_addon.premium_calculator_addon_id, premium_calculator_addon.type, premium_calculator_addon.json", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$filtered_policy = $query["userData"];
			// echo $this->db->last_query();
			// print_r($filtered_policy);
			// die();

			if (!empty($filtered_policy)) {
				$result["status"] = true;
				$result["userdata"] = $filtered_policy;
				$result["message"] = array();
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = array();
			}
			echo json_encode($result);
		}
	}

	public function random_strings($length_of_string = "")
	{
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($str_result), 0, $length_of_string);
		// echo substr(str_shuffle($str_result), 0, $length_of_string);
	}

	public function index()
	{
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"] . " List",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/premium_calculator/calculator";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_cal()
	{
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"] . " List",
			"breadcrumb_url" => base_url() . "master/premium_calculator/index",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "Add " . $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/premium_calculator/add_calculator";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_prem_cal()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('group_type', 'Department', 'trim|required');
		$this->form_validation->set_rules('company', 'Department', 'trim|required');
		$this->form_validation->set_rules('department', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_name', 'Department', 'trim|required');
		$this->form_validation->set_rules('policy_type', 'Department', 'trim|required');
		$this->form_validation->set_rules('mode_of_premimum', 'Department', 'trim|required');
		$this->form_validation->set_rules('group_name', 'Department', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"group_type_err" => form_error("group_type"),
				"company_err" => form_error("company"),
				"department_err" => form_error("department"),
				"policy_name_err" => form_error("policy_name"),
				"policy_type_err" => form_error("policy_type"),
				"mode_of_premimum_err" => form_error("mode_of_premimum"),
				"group_name_err" => form_error("group_name"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			if ($this->input->post() != "") {

				$sequence_no = $this->random_strings(7);
				$department_name = $this->security->xss_clean($this->input->post('department_name'));

				$add_arr[] = array(
					'department_name' => $department_name,
					'create_date' => date("Y-m-d h:i:s"),
					"fk_staff_id" => $this->session->userdata("@_staff_id"),
					"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
				);
				$query = $this->Mquery_model_v3->addQuery($tableName = "master_department", $add_arr, $return_type = "lastID");
				$department_id = $query["lastID"];
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else
				if ($department_id != "") {
				$validator["status"] = true;
				$validator["message"] = "Department is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function save_raw_data_bak()
	{
		// $htmlform = $this->input->post("htmlForm");
		// $textForm = $this->input->post("textForm");

		$company = $this->input->post("company");
		$policy_name = $this->input->post("policy_name");
		$policy_type = $this->input->post("policy_type");
		$not_converted_sum_insured = $this->input->post("not_converted_sum_insured");
		$converted_sum_insured = $this->input->post("converted_sum_insured");
		$policy_view = $this->input->post("policy_view");
		$details = $this->input->post("details");
		$first_json = $this->input->post("first_json");
		$second_json = $this->input->post("second_json");

		$main_array = array(
			"company" => $company,
			"policy_name" => $policy_name,
			"policy_type" => $policy_type,
			"not_converted_sum_insured" => $not_converted_sum_insured,
			"converted_sum_insured" => $converted_sum_insured,
			"policy_view" => $policy_view,
			"details" => $details,
			"first_json" => $first_json,
			"second_json" => $second_json,
			"details" => $details,
			"fk_staff_id" => $this->session->userdata("@_staff_id"),
			"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
		);
		print_r($main_array);
		// print_r($details);
		// print_r($first_json);
		// print_r($second_json);
		die();
	}

	public function save_raw_data()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->db->trans_start();	//Start Transaction	
		if ($this->input->post() != "") {

			$details = $this->input->post("details");
			$company = $this->input->post("company");
			$policy_name = $this->input->post("policy_name");
			$policy_type = $this->input->post("policy_type");
			$not_converted_sum_insured_data = $this->input->post("not_converted_sum_insured_data");
			$converted_sum_insured_data = $this->input->post("converted_sum_insured_data");
			$policy_view = $this->input->post("policy_view");
			$policy_view2 = $this->input->post("policy_view2");
			$company_array = $this->input->post("company_array");
			$prem_array = $this->input->post("prem_array");
			$member_array = $this->input->post("member_array");
			$family_size = $this->input->post("family_size");
			$total_premium = $this->input->post("total_premium");
			$group_id_val = $this->input->post("group_id_val");
			

			if(empty($family_size))
				$family_size = "";
	
			if (!empty($company)) {
				if($policy_type == "Individual") {
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD"){
						if ($policy_name == "Optima Restore"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/view_hdfc_ergo_health_insurance_ltd_mediclaim";
						}elseif ($policy_name == "Energy"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/view_energy_hdfc_ergo_health_insu_ltd_medi";
						}elseif ($policy_name == "Health Suraksha"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/view_suraksha_hdfc_ergo_health_insu_ltd_medi";
						}elseif ($policy_name == "Easy Health"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/medi/view_easy_health_rate_card";
						}
					}elseif ($company == "The New India Assurance Co Ltd"){
						if ($policy_name == "New India Mediclaim Policy 2017"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/medi/view_new_india_medi_policy_2017_ind";
						}
					}elseif ($company == "Max Bupa Health Insurance Co Ltd"){
						if ($policy_name == "Reassure"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/max_bupa/medi/view_max_bupa_reassurance_ind";
						}
					}elseif ($company == "Star Health & Allied Insurance Co Ltd"){
						if ($policy_name == "Red Carpet"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/view_red_carpet_health_insu_ind_policy";
						}elseif ($policy_name == "Comprehensive"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/view_comprehensive_health_insu_ind_policy";
						}
					}elseif ($company == "United India Insurance Co Ltd"){
						if ($policy_name == "Individual Health Insurance Policy"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/view_mediclaim";
						}elseif ($policy_name == "Floater 2020(Individual)"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/view_mediclaim_individual_2020";
						}
					}
				}elseif($policy_type == "Floater") {
					if ($company == "HDFC ERGO HEALTH INSURANCE LTD"){
						if ($policy_name == "Optima Restore"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/view_floater_hdfc_ergo_health_insurance_ltd_mediclaim";
						}elseif ($policy_name == "Health Suraksha"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/view_float_suraksha_hdfc_ergo_health_medi";
						}elseif ($policy_name == "Easy Health"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/medi/view_float_easy_health_rate_card";
						}elseif ($policy_name == "Super Top Up"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/hdfc_ergo_health_insu_ltd_medi/view_super_topup_float";
						}
					}elseif ($company == "The New India Assurance Co Ltd"){
						if ($policy_name == "New India Floater Mediclaim"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/the_new_india_assurance_co_ltd/medi/view_new_india_medi_float";
						}
					}elseif ($company == "Max Bupa Health Insurance Co Ltd"){
						if ($policy_name == "Reassure"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/max_bupa/medi/view_max_bupa_reassurance_float";
						}
					}elseif ($company == "Star Health & Allied Insurance Co Ltd"){
						if ($policy_name == "Red Carpet"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/view_red_carpet_health_insu_float_policy";
						}elseif ($policy_name == "Comprehensive"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim/star_health_allied_insurance_co_ltd/medi/view_comprehensive_health_insu_float_policy";
						}
					}elseif ($company == "United India Insurance Co Ltd"){
						if ($policy_name == "Family Floater 2014"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim_floater_2014/view_mediclaim_floater_2014";
						}elseif ($policy_name == "Family Floater 2020"){
							$policy_view2 = "master/premium_calculator/policy_view/mediclaim_floater_2020/view_mediclaim_floater_2020";
						}
					}
				}
			}

			$add_arr[] = array(
				'data_string' => $details,
				'company_name' => $company,
				'policy_name' => $policy_name,
				'policy_type' => $policy_type,
				'premium_calculator_policy_view' => $policy_view,
				'premium_calculator_policy_view2' => $policy_view2,
				'not_converted_sum_insured' => $not_converted_sum_insured_data,
				'converted_sum_insured' => $converted_sum_insured_data,
				'family_size' => $family_size,
				'total_premium' => $total_premium,
				'company_array' => json_encode($company_array),
				'prem_array' => json_encode($prem_array),
				'member_array' => json_encode($member_array),
				'fk_client_id' => $group_id_val,
				'prem_cal_string_id' => $this->random_strings(7),
				'create_date' => date("Y-m-d h:i:s"),
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			// print_r($add_arr);
			// die();
			$query = $this->Mquery_model_v3->addQuery($tableName = "premium_calculator_data", $add_arr, $return_type = "lastID");
			$premium_calculator_data_id = $query["lastID"];
		}
		$this->db->trans_complete();		// Transaction End	

		if ($this->db->trans_status() === FALSE) {
			$validator["status"] = false;
			$validator["message"] = "Fatal Error: Contact Support:";
		} else
			if ($premium_calculator_data_id != "") {
			$validator["status"] = true;
			$validator["message"] = "Premium Calculator data is added Successfully.";
		}

		echo json_encode($validator);
	}

	public function filter_calculator_datalist()
	{
		$filter_company = $this->input->post("filter_company");
		$filter_policy_name = $this->input->post("filter_policy_name");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"premium_calculator_data.premium_calculator_data_id",
		);

		$result2 = array();
		if (!empty($this->input->post())) {

			if (!empty($filter_company))
				$whereArr["premium_calculator_data.company_name"] = $filter_company;
			if (!empty($filter_policy_name))
				$whereArr["premium_calculator_data.policy_name"] = $filter_policy_name;

			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active
				$whereArr["premium_calculator_data.premium_calculator_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_data", $colNames = "premium_calculator_data.premium_calculator_data_id , premium_calculator_data.company_name, premium_calculator_data.policy_name, premium_calculator_data.policy_type, premium_calculator_data.premium_calculator_policy_view, premium_calculator_data.premium_calculator_policy_view2, premium_calculator_data.not_converted_sum_insured, premium_calculator_data.converted_sum_insured, premium_calculator_data.family_size, premium_calculator_data.total_premium, premium_calculator_data.data_string, premium_calculator_data.prem_array, premium_calculator_data.member_array,premium_calculator_data.prem_cal_string_id, premium_calculator_data.premium_calculator_status, premium_calculator_data.del_flag", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_calculator_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_calculator_data"] = $total_calculator_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_calculator_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function getcalculator_datalist(){
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_data", $colNames = "premium_calculator_data.premium_calculator_data_id , premium_calculator_data.company_name, premium_calculator_data.policy_name, premium_calculator_data.policy_type, premium_calculator_data.premium_calculator_policy_view, premium_calculator_data.premium_calculator_policy_view2, premium_calculator_data.not_converted_sum_insured, premium_calculator_data.converted_sum_insured, premium_calculator_data.family_size, premium_calculator_data.total_premium, premium_calculator_data.data_string, premium_calculator_data.prem_array, premium_calculator_data.member_array,premium_calculator_data.prem_cal_string_id, premium_calculator_data.premium_calculator_status, premium_calculator_data.del_flag", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$result2 = $query["userData"];
		$total_calculator_data = count($result2);

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_calculator_data"] = $total_calculator_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_calculator_data"] = array();
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	function get_singlecalculator_datalist(){
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_data", $colNames = "premium_calculator_data.premium_calculator_data_id , premium_calculator_data.company_name, premium_calculator_data.policy_name, premium_calculator_data.policy_type, premium_calculator_data.premium_calculator_policy_view, premium_calculator_data.premium_calculator_policy_view2, premium_calculator_data.not_converted_sum_insured, premium_calculator_data.converted_sum_insured, premium_calculator_data.family_size, premium_calculator_data.total_premium, premium_calculator_data.data_string, premium_calculator_data.prem_array, premium_calculator_data.member_array, premium_calculator_data.premium_calculator_status, premium_calculator_data.del_flag, premium_calculator_data.fk_client_id,  premium_calculator_data.prem_cal_string_id, premium_calculator_data.client_name", $whereArr = array(), $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = false, $colActive = TRUE, $paginationArr = "");
		$result = $query["userData"];

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

	public function view_cal(){
		$premium_calculator_data_id = $this->uri->segment(4);
		$whereArr["premium_calculator_data.premium_calculator_data_id"] = $premium_calculator_data_id;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_data", $colNames = "premium_calculator_data.premium_calculator_data_id , premium_calculator_data.company_name, premium_calculator_data.policy_name, premium_calculator_data.policy_type, premium_calculator_data.premium_calculator_policy_view, premium_calculator_data.premium_calculator_policy_view2, premium_calculator_data.not_converted_sum_insured, premium_calculator_data.converted_sum_insured, premium_calculator_data.family_size, premium_calculator_data.total_premium, premium_calculator_data.data_string, premium_calculator_data.prem_array, premium_calculator_data.member_array, premium_calculator_data.premium_calculator_status, premium_calculator_data.company_array, premium_calculator_data.del_flag, premium_calculator_data.fk_client_id,premium_calculator_data.prem_cal_string_id, premium_calculator_data.client_name", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = true, $colActive = TRUE, $paginationArr = "");
		$this->data["result"] = $result = $query["userData"];
		$this->data["premium_calculator_data_id"] = $result["premium_calculator_data_id"];
		$this->data["company_name"] = $result["company_name"];
		$this->data["policy_name"] = $result["policy_name"];
		$this->data["policy_type"] = $result["policy_type"];
		$this->data["premium_calculator_policy_view"] = $result["premium_calculator_policy_view"];
		$this->data["premium_calculator_policy_view2"] = $result["premium_calculator_policy_view2"];
		$this->data["not_converted_sum_insured"] = $result["not_converted_sum_insured"];
		$this->data["converted_sum_insured"] = $result["converted_sum_insured"];
		$this->data["family_size"] = $result["family_size"];
		$this->data["total_premium"] = $result["total_premium"];
		$this->data["data_string"] = $result["data_string"];
		$this->data["prem_array"] = $result["prem_array"];
		$this->data["member_array"] = $result["member_array"];
		$this->data["company_array"] = $result["company_array"];
		$this->data["fk_client_id"] = $result["fk_client_id"];
		$this->data["client_name"] = $result["client_name"];

		// print_r($result);
		// die();

		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $this->data["title"] . " List",
			"breadcrumb_url" => base_url() . "master/premium_calculator/index",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $this->data["title"],
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/premium_calculator/view_calulator";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function remove_calculator()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"premium_calculator_data_id" => $id,
				"del_flag" => 0, //1:Running, 0:Deleted
			);
			if ($id != "") {
				$whereArr["premium_calculator_data.premium_calculator_data_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "premium_calculator_data", $updateArr, $updateKey = "premium_calculator_data_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_data", $colNames = "premium_calculator_data.premium_calculator_data_id , premium_calculator_data.company_name, premium_calculator_data.policy_name, premium_calculator_data.policy_type, premium_calculator_data.premium_calculator_policy_view, premium_calculator_data.premium_calculator_policy_view2, premium_calculator_data.not_converted_sum_insured, premium_calculator_data.converted_sum_insured, premium_calculator_data.family_size, premium_calculator_data.total_premium, premium_calculator_data.data_string, premium_calculator_data.prem_array, premium_calculator_data.member_array, premium_calculator_data.premium_calculator_status, premium_calculator_data.del_flag, premium_calculator_data.fk_client_id,  premium_calculator_data.prem_cal_string_id, premium_calculator_data.client_name", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "User Premium Calculator Data Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Remove Premium Calculator Data.";
			}
			echo json_encode($result);
		}
	}

	public function recover_calculator()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"premium_calculator_data_id" => $id,
				"del_flag" => 1, //1:Running, 0:Deleted
			);
			if ($id != "") {
				$whereArr["premium_calculator_data.premium_calculator_data_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "premium_calculator_data", $updateArr, $updateKey = "premium_calculator_data_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_data", $colNames = "premium_calculator_data.premium_calculator_data_id , premium_calculator_data.company_name, premium_calculator_data.policy_name, premium_calculator_data.policy_type, premium_calculator_data.premium_calculator_policy_view, premium_calculator_data.premium_calculator_policy_view2, premium_calculator_data.not_converted_sum_insured, premium_calculator_data.converted_sum_insured, premium_calculator_data.family_size, premium_calculator_data.total_premium, premium_calculator_data.data_string, premium_calculator_data.prem_array, premium_calculator_data.member_array, premium_calculator_data.premium_calculator_status, premium_calculator_data.del_flag, premium_calculator_data.fk_client_id,  premium_calculator_data.prem_cal_string_id, premium_calculator_data.client_name", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Premium Calculator Data Recover Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Recover Premium Calculator Data.";
			}
			echo json_encode($result);
		}
	}

	public function update_calculator_status()
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
				"premium_calculator_data_id" => $id,
				"premium_calculator_status" => $status, //1:Active, 0:In-Active
			);
			if ($id != "") {
				$whereArr["premium_calculator_data.premium_calculator_data_id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "premium_calculator_data", $updateArr, $updateKey = "premium_calculator_data_id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "premium_calculator_data", $colNames = "premium_calculator_data.premium_calculator_data_id , premium_calculator_data.company_name, premium_calculator_data.policy_name, premium_calculator_data.policy_type, premium_calculator_data.premium_calculator_policy_view, premium_calculator_data.premium_calculator_policy_view2, premium_calculator_data.not_converted_sum_insured, premium_calculator_data.converted_sum_insured, premium_calculator_data.family_size, premium_calculator_data.total_premium, premium_calculator_data.data_string, premium_calculator_data.prem_array, premium_calculator_data.member_array, premium_calculator_data.premium_calculator_status, premium_calculator_data.del_flag, premium_calculator_data.fk_client_id,  premium_calculator_data.prem_cal_string_id, premium_calculator_data.client_name", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Premium Calculator Data " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Premium Calculator Data Status.";
			}
			echo json_encode($result);
		}
	}
	// Calculator Section End





}
