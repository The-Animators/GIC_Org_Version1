
<?php
class Mpolicy extends CI_Model
{

	function update_sookshma_policy($update_sookshma_arr, $sookshma_fire_policy_id, $policy_id)
	{
		$this->db->where("sookshma_fire_policy.sookshma_fire_policy_id", $sookshma_fire_policy_id);
		$this->db->where("sookshma_fire_policy.fk_policy_id", $policy_id);
		$this->db->update('sookshma_fire_policy', $update_sookshma_arr);
		return true;
	}

	function update_laghu_fire_policy($update_laghu_fire_arr, $laghu_fire_policy_id, $policy_id)
	{
		$this->db->where("laghu_fire_policy.laghu_fire_policy_id", $laghu_fire_policy_id);
		$this->db->where("laghu_fire_policy.fk_policy_id", $policy_id);
		$this->db->update('laghu_fire_policy', $update_laghu_fire_arr);
		return true;
	}

	function update_griharaksha_policy($update_griharaksha_arr, $griharaksha_fire_policy_id, $policy_id)
	{
		$this->db->where("griharaksha_fire_policy.griharaksha_fire_policy_id", $griharaksha_fire_policy_id);
		$this->db->where("griharaksha_fire_policy.fk_policy_id", $policy_id);
		$this->db->update('griharaksha_fire_policy', $update_griharaksha_arr);
		return true;
	}

	function update_fire_allied_perils_policy($update_fire_allied_perils_policy_arr, $fire_allied_perils_policy_id, $policy_id)
	{
		$this->db->where("bharat_fire_allied_perils_policy.fire_allied_perils_policy_id", $fire_allied_perils_policy_id);
		$this->db->where("bharat_fire_allied_perils_policy.fk_policy_id", $policy_id);
		$this->db->update('bharat_fire_allied_perils_policy', $update_fire_allied_perils_policy_arr);
		return true;
	}

	function update_burglary_policy($update_burglary_arr, $burglary_policy_id, $policy_id)
	{
		$this->db->where("burglary_policy.burglary_policy_id", $burglary_policy_id);
		$this->db->where("burglary_policy.fk_policy_id", $policy_id);
		$this->db->update('burglary_policy', $update_burglary_arr);
		return true;
	}

	function update_others_policy($update_others_arr, $other_policy_id, $policy_id, $policy_name)
	{
		// print_r($update_others_arr);
		//  die();
		$this->db->where("others_policy.other_policy_id", $other_policy_id);
		$this->db->where("others_policy.fk_policy_id", $policy_id);
		$this->db->where("others_policy.fk_policy_type_id", $policy_name);
		$this->db->update('others_policy', $update_others_arr);
		return true;
	}

	function update_fire_rc_policy($update_fire_rc_policy_arr, $fire_rc_policy_id, $policy_id, $policy_name, $policy_type)
	{    //3:Residential & Commercial Section
		// print_r($update_fire_rc_policy_arr);
		// die();
		$this->db->where("fire_rc_policy.fire_rc_policy_id", $fire_rc_policy_id);
		$this->db->where("fire_rc_policy.fk_policy_id", $policy_id);
		$this->db->where("fire_rc_policy.fk_policy_type_id", $policy_name);
		$this->db->where("fire_rc_policy.policy_type", $policy_type);  //1: Individual, 2: Floater,3:Residential & Commercial
		$this->db->update('fire_rc_policy', $update_fire_rc_policy_arr);
		// echo $this->db->last_query();
		// die();
		return true;
	}

	function update_term_plan_policy($update_term_plan_policy_arr, $term_plan_policy_id, $policy_id, $policy_name)
	{ //Term Plan :Life Insurence
		// print_r($update_others_arr);
		//  die();
		if (!empty($term_plan_policy_id)) {
			$this->db->where("term_plan_policy.term_plan_policy_id", $term_plan_policy_id);
			$this->db->where("term_plan_policy.fk_policy_id", $policy_id);
			$this->db->where("term_plan_policy.fk_policy_type_id", $policy_name);
			$this->db->update('term_plan_policy', $update_term_plan_policy_arr);
		}
		// echo $this->db->last_query();
		// die();
		return true;
	}
	
	function update_shopkeeper_policy($update_shopkeeper_policy_arr, $shopkeeper_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Shopkeeper
		if (!empty($shopkeeper_policy_id)) {
			$this->db->where("shopkeeper_policy.shopkeeper_policy_id", $shopkeeper_policy_id);
			$this->db->where("shopkeeper_policy.fk_policy_id", $policy_id);
			$this->db->where("shopkeeper_policy.fk_policy_type_id", $policy_name);
			$this->db->update('shopkeeper_policy', $update_shopkeeper_policy_arr);
		}
		return true;
	}

	function update_jweller_policy($update_jweller_policy_arr, $jweller_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Jweller Block
		// print_r($update_jweller_policy_arr);
		//  die();
		if (!empty($jweller_policy_id)) {
			$this->db->where("jweller_policy.jweller_policy_id", $jweller_policy_id);
			$this->db->where("jweller_policy.fk_policy_id", $policy_id);
			$this->db->where("jweller_policy.fk_policy_type_id", $policy_name);
			$this->db->update('jweller_policy', $update_jweller_policy_arr);
		}
		return true;
	}

	function update_marine_policy($update_marine_policy_arr, $marine_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Jweller Block
		// 		print_r($update_marine_policy_arr);
		//  die();
		if (!empty($marine_policy_id)) {
			$this->db->where("marine_policy.marine_policy_id", $marine_policy_id);
			$this->db->where("marine_policy.fk_policy_id", $policy_id);
			$this->db->where("marine_policy.fk_policy_type_id", $policy_name);
			$this->db->update('marine_policy', $update_marine_policy_arr);
		}
		return true;
	}

	function update_mediclaim_policy($update_mediclaim_policy_arr, $mediclaim_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Mediclaim Individual 2014

		if (!empty($mediclaim_policy_id)) {
			$this->db->where("mediclaim_policy.mediclaim_policy_id", $mediclaim_policy_id);
			$this->db->where("mediclaim_policy.fk_policy_id", $policy_id);
			$this->db->where("mediclaim_policy.fk_policy_type_id", $policy_name);
			$this->db->update('mediclaim_policy', $update_mediclaim_policy_arr);
		}
		return true;
	}

	function update_medi_ind2020_policy($update_medi_ind2020_policy_arr, $medi_ind2020_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Mediclaim Individual 2020
		// print_r($update_medi_ind2020_policy_arr);die();
		if (!empty($medi_ind2020_policy_id)) {
			$this->db->where("medi_ind2020_policy.medi_ind2020_policy_id", $medi_ind2020_policy_id);
			$this->db->where("medi_ind2020_policy.fk_policy_id", $policy_id);
			$this->db->where("medi_ind2020_policy.fk_policy_type_id", $policy_name);
			$this->db->update('medi_ind2020_policy', $update_medi_ind2020_policy_arr);
		}
		return true;
	}

	function update_mediclaim_floater_2014_policy($update_mediclaim_floater_2014_policy_arr, $medi_floater_2014_id, $policy_id, $policy_name)
	{ //Mislenious :Mediclaim Floater 2014

		if (!empty($medi_floater_2014_id)) {
			$this->db->where("mediclaim_floater_2014_policy.medi_floater_2014_id", $medi_floater_2014_id);
			$this->db->where("mediclaim_floater_2014_policy.fk_policy_id", $policy_id);
			$this->db->where("mediclaim_floater_2014_policy.fk_policy_type_id", $policy_name);
			$this->db->update('mediclaim_floater_2014_policy', $update_mediclaim_floater_2014_policy_arr);
		}
		return true;
	}

	function update_medi_floater_2020_policy($update_medi_floater_2020_policy_arr, $medi_floater_2020_id, $policy_id, $policy_name)
	{ //Mislenious :Mediclaim Floater 2020

		if (!empty($medi_floater_2020_id)) {
			$this->db->where("medi_floater_2020_policy.medi_floater_2020_id", $medi_floater_2020_id);
			$this->db->where("medi_floater_2020_policy.fk_policy_id", $policy_id);
			$this->db->where("medi_floater_2020_policy.fk_policy_type_id", $policy_name);
			$this->db->update('medi_floater_2020_policy', $update_medi_floater_2020_policy_arr);
		}
		return true;
	}

	function update_medi_hdfc_ergo_health_insu_policy($update_medi_hdfc_ergo_health_insu_policy_arr, $medi_hdfc_ergo_health_insu_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : Optima Restore

		if (!empty($medi_hdfc_ergo_health_insu_policy_id)) {
			$this->db->where("medi_hdfc_ergo_health_insu_policy.medi_hdfc_ergo_health_insu_policy_id", $medi_hdfc_ergo_health_insu_policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_policy.fk_policy_id", $policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_policy.fk_policy_type_id", $policy_name);
			$this->db->update('medi_hdfc_ergo_health_insu_policy', $update_medi_hdfc_ergo_health_insu_policy_arr);
		}
		return true;
	}

	function update_energy_medi_hdfc_ergo_health_insu_policy($update_energy_medi_hdfc_ergo_health_insu_policy_arr, $medi_hdfc_ergo_health_insu_energy_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : Energy

		if (!empty($medi_hdfc_ergo_health_insu_energy_policy_id)) {
			$this->db->where("medi_hdfc_ergo_health_insu_energy_policy.medi_hdfc_ergo_health_insu_energy_policy_id", $medi_hdfc_ergo_health_insu_energy_policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_energy_policy.fk_policy_id", $policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_energy_policy.fk_policy_type_id", $policy_name);
			$this->db->update('medi_hdfc_ergo_health_insu_energy_policy', $update_energy_medi_hdfc_ergo_health_insu_policy_arr);
		}
		return true;
	}

	function update_easy_rate_medi_hdfc_ergo_health_insu_policy($update_easy_rate_medi_hdfc_ergo_health_insu_policy_arr, $medi_hdfc_ergo_health_insu_easy_policy_id, $policy_id, $policy_name)
	{//Mislenious : Mediclaim : Individual : Easy rate Card
		if (!empty($medi_hdfc_ergo_health_insu_easy_policy_id)) {
			$this->db->where("hdfc_ergo_health_easy_rate_card_indi_policy.medi_hdfc_ergo_health_insu_easy_policy_id", $medi_hdfc_ergo_health_insu_easy_policy_id);
			$this->db->where("hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_id", $policy_id);
			$this->db->where("hdfc_ergo_health_easy_rate_card_indi_policy.fk_policy_type_id", $policy_name);
			$this->db->update('hdfc_ergo_health_easy_rate_card_indi_policy', $update_easy_rate_medi_hdfc_ergo_health_insu_policy_arr);
		}
		return true;
	}

	function update_medi_hdfc_ergo_health_insu_easy_rate_float_policy($update_medi_hdfc_ergo_health_insu_easy_rate_float_policy_arr, $medi_hdfc_ergo_health_insu_easy_float_policy_id, $policy_id, $policy_name)
	{//Mislenious : Mediclaim : Floater : Easy rate Card
		if (!empty($medi_hdfc_ergo_health_insu_easy_float_policy_id)) {
			$this->db->where("hdfc_ergo_health_easy_rate_card_float_policy.medi_hdfc_ergo_health_insu_easy_float_policy_id", $medi_hdfc_ergo_health_insu_easy_float_policy_id);
			$this->db->where("hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_id", $policy_id);
			$this->db->where("hdfc_ergo_health_easy_rate_card_float_policy.fk_policy_type_id", $policy_name);
			$this->db->update('hdfc_ergo_health_easy_rate_card_float_policy', $update_medi_hdfc_ergo_health_insu_easy_rate_float_policy_arr);
		}
		return true;
	}

	function update_suraksha_medi_hdfc_ergo_health_insu_policy($update_suraksha_medi_hdfc_ergo_health_insu_policy_arr, $medi_hdfc_ergo_health_insu_suraksha_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : Health Suraksha
		if (!empty($medi_hdfc_ergo_health_insu_suraksha_policy_id)) {
			$this->db->where("medi_hdfc_ergo_health_insu_suraksha_policy.medi_hdfc_ergo_health_insu_suraksha_policy_id", $medi_hdfc_ergo_health_insu_suraksha_policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_id", $policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_suraksha_policy.fk_policy_type_id", $policy_name);
			$this->db->update('medi_hdfc_ergo_health_insu_suraksha_policy', $update_suraksha_medi_hdfc_ergo_health_insu_policy_arr);
		}
		return true;
	}

	function update_medi_hdfc_ergo_health_insu_suraksha_float_policy($update_medi_hdfc_ergo_health_insu_suraksha_float_policy_arr, $medi_hdfc_ergo_health_float_suraksha_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Floater : Health Suraksha
		if (!empty($medi_hdfc_ergo_health_float_suraksha_policy_id)) {
			$this->db->where("medi_hdfc_ergo_health_insu_suraksha_floater_policy.medi_hdfc_ergo_health_float_suraksha_policy_id", $medi_hdfc_ergo_health_float_suraksha_policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_id", $policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_suraksha_floater_policy.fk_policy_type_id", $policy_name);
			$this->db->update('medi_hdfc_ergo_health_insu_suraksha_floater_policy', $update_medi_hdfc_ergo_health_insu_suraksha_float_policy_arr);
		}
		return true;
	}

	function update_medi_hdfc_ergo_health_insu_float_policy($update_medi_hdfc_ergo_health_insu_float_policy_arr, $medi_hdfc_ergo_health_insu_float_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Floater : Optima Restore

		if (!empty($medi_hdfc_ergo_health_insu_float_policy_id)) {
			$this->db->where("medi_hdfc_ergo_health_insu_float_policy.medi_hdfc_ergo_health_insu_float_policy_id", $medi_hdfc_ergo_health_insu_float_policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_float_policy.fk_policy_id", $policy_id);
			$this->db->where("medi_hdfc_ergo_health_insu_float_policy.fk_policy_type_id", $policy_name);
			$this->db->update('medi_hdfc_ergo_health_insu_float_policy', $update_medi_hdfc_ergo_health_insu_float_policy_arr);
		}
		return true;
	}

	function update_ind_the_new_india_medi_2017_assu_policy($update_ind_the_new_india_medi_2017_assu_policy_arr, $medi_insu_new_india_tns_assu_ind_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : New India Mediclaim Policy 2017 : The New India Assurance Co Ltd

		if (!empty($medi_insu_new_india_tns_assu_ind_policy_id)) {
			$this->db->where("the_new_india_medi_policy_2017_ind_assu_policy.medi_insu_new_india_tns_assu_ind_policy_id", $medi_insu_new_india_tns_assu_ind_policy_id);
			$this->db->where("the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_id", $policy_id);
			$this->db->where("the_new_india_medi_policy_2017_ind_assu_policy.fk_policy_type_id", $policy_name);
			$this->db->update('the_new_india_medi_policy_2017_ind_assu_policy', $update_ind_the_new_india_medi_2017_assu_policy_arr);
		}
		return true;
	}

	function update_floater_the_new_india_medi_assu_policy($update_floater_the_new_india_medi_assu_policy_arr, $medi_new_india_assu_float_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Floater : New India Floater Mediclaim : The New India Assurance Co Ltd

		if (!empty($medi_new_india_assu_float_policy_id)) {
			$this->db->where("the_new_india_medi_floater_assu_policy.medi_new_india_assu_float_policy_id", $medi_new_india_assu_float_policy_id);
			$this->db->where("the_new_india_medi_floater_assu_policy.fk_policy_id", $policy_id);
			$this->db->where("the_new_india_medi_floater_assu_policy.fk_policy_type_id", $policy_name);
			$this->db->update('the_new_india_medi_floater_assu_policy', $update_floater_the_new_india_medi_assu_policy_arr);
		}
		return true;
	}

	function update_max_bupa_reassure_ind_policy($update_max_bupa_reassure_ind_policy_arr, $medi_max_bupa_reassure_ind_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : Reassure : Max Bupa Health Insurance Co. Ltd.

		if (!empty($medi_max_bupa_reassure_ind_policy_id)) {
			$this->db->where("max_bupa_reassure_ind_policy.medi_max_bupa_reassure_ind_policy_id", $medi_max_bupa_reassure_ind_policy_id);
			$this->db->where("max_bupa_reassure_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("max_bupa_reassure_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('max_bupa_reassure_ind_policy', $update_max_bupa_reassure_ind_policy_arr);
		}
		return true;
	}

	function update_max_bupa_reassure_float_policy($update_max_bupa_reassure_float_policy_arr, $medi_max_bupa_reassure_float_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Floater : Reassure : Max Bupa Health Insurance Co. Ltd.

		if (!empty($medi_max_bupa_reassure_float_policy_id)) {
			$this->db->where("max_bupa_reassure_floater_policy.medi_max_bupa_reassure_float_policy_id", $medi_max_bupa_reassure_float_policy_id);
			$this->db->where("max_bupa_reassure_floater_policy.fk_policy_id", $policy_id);
			$this->db->where("max_bupa_reassure_floater_policy.fk_policy_type_id", $policy_name);
			$this->db->update('max_bupa_reassure_floater_policy', $update_max_bupa_reassure_float_policy_arr);
		}
		return true;
	}

	function update_star_health_red_carpet_ind_policy($update_star_health_red_carpet_ind_policy_arr, $medi_star_health_ind_policy_id , $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : Red Carpet : Star Health & Allied Insurance Co Ltd

		if (!empty($medi_star_health_ind_policy_id)) {
			$this->db->where("star_health_allied_insu_red_carpet_ind_policy.medi_star_health_ind_policy_id ", $medi_star_health_ind_policy_id );
			$this->db->where("star_health_allied_insu_red_carpet_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("star_health_allied_insu_red_carpet_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('star_health_allied_insu_red_carpet_ind_policy', $update_star_health_red_carpet_ind_policy_arr);
		}
		return true;
	}

	function update_star_health_red_carpet_float_policy($update_star_health_red_carpet_float_policy_arr, $medi_star_health_float_policy_id , $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Floater : Red Carpet : Star Health & Allied Insurance Co Ltd

		if (!empty($medi_star_health_float_policy_id )) {
			$this->db->where("star_health_allied_insu_red_carpet_float_policy.medi_star_health_float_policy_id ", $medi_star_health_float_policy_id );
			$this->db->where("star_health_allied_insu_red_carpet_float_policy.fk_policy_id", $policy_id);
			$this->db->where("star_health_allied_insu_red_carpet_float_policy.fk_policy_type_id", $policy_name);
			$this->db->update('star_health_allied_insu_red_carpet_float_policy', $update_star_health_red_carpet_float_policy_arr);
		}
		return true;
	}

	function update_star_health_comprehensive_ind_policy($update_star_health_comprehensive_ind_policy_arr, $medi_star_health_comp_ind_policy_id , $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : Comprehensive : Star Health & Allied Insurance Co Ltd

		if (!empty($medi_star_health_comp_ind_policy_id )) {
			$this->db->where("star_health_allied_insu_comprehensive_ind_policy.medi_star_health_comp_ind_policy_id ", $medi_star_health_comp_ind_policy_id );
			$this->db->where("star_health_allied_insu_comprehensive_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("star_health_allied_insu_comprehensive_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('star_health_allied_insu_comprehensive_ind_policy', $update_star_health_comprehensive_ind_policy_arr);
		}
		return true;
	}

	function update_star_health_comprehensive_float_policy($update_star_health_comprehensive_float_policy_arr, $medi_star_health_comp_float_policy_id , $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Floater : Comprehensive : Star Health & Allied Insurance Co Ltd

		if (!empty($medi_star_health_comp_float_policy_id )) {
			$this->db->where("star_health_allied_insu_comprehensive_float_policy.medi_star_health_comp_float_policy_id ", $medi_star_health_comp_float_policy_id );
			$this->db->where("star_health_allied_insu_comprehensive_float_policy.fk_policy_id", $policy_id);
			$this->db->where("star_health_allied_insu_comprehensive_float_policy.fk_policy_type_id", $policy_name);
			$this->db->update('star_health_allied_insu_comprehensive_float_policy', $update_star_health_comprehensive_float_policy_arr);
		}
		return true;
	}

	function update_star_health_supertopup_ind_policy($update_star_health_supertopup_ind_policy_arr, $medi_star_health_super_ind_policy_id , $policy_id, $policy_name)
	{ //Mislenious : Super Top Up : Individual  : Star Health & Allied Insurance Co Ltd

		if (!empty($medi_star_health_super_ind_policy_id )) {
			$this->db->where("star_health_allied_insu_supertopup_ind_policy.medi_star_health_super_ind_policy_id ", $medi_star_health_super_ind_policy_id );
			$this->db->where("star_health_allied_insu_supertopup_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("star_health_allied_insu_supertopup_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('star_health_allied_insu_supertopup_ind_policy', $update_star_health_supertopup_ind_policy_arr);
		}
		return true;
	}

	function update_star_health_supertopup_float_policy($update_star_health_supertopup_float_policy_arr, $medi_star_health_super_float_policy_id , $policy_id, $policy_name)
	{ //Mislenious : Super Top Up : Floater  : Star Health & Allied Insurance Co Ltd

		if (!empty($medi_star_health_super_float_policy_id )) {
			$this->db->where("star_health_allied_insu_supertopup_float_policy.medi_star_health_super_float_policy_id ", $medi_star_health_super_float_policy_id );
			$this->db->where("star_health_allied_insu_supertopup_float_policy.fk_policy_id", $policy_id);
			$this->db->where("star_health_allied_insu_supertopup_float_policy.fk_policy_type_id", $policy_name);
			$this->db->update('star_health_allied_insu_supertopup_float_policy', $update_star_health_supertopup_float_policy_arr);
		}
		return true;
	}

	function update_care_adv_ind_policy($update_care_adv_ind_policy_arr, $care_adv_ind_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : Care Advantage : Care Health Insurance Co. Ltd.

		if (!empty($care_adv_ind_id)) {
			$this->db->where("care_health_care_adv_ind_policy.care_adv_ind_id ", $care_adv_ind_id);
			$this->db->where("care_health_care_adv_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("care_health_care_adv_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('care_health_care_adv_ind_policy', $update_care_adv_ind_policy_arr);
		}
		return true;
	}

	function update_care_ind_policy($update_care_ind_policy_arr, $care_ind_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Individual : Care : Care Health Insurance Co. Ltd.

		if (!empty($care_ind_id)) {
			$this->db->where("care_health_care_ind_policy.care_ind_id ", $care_ind_id);
			$this->db->where("care_health_care_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("care_health_care_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('care_health_care_ind_policy', $update_care_ind_policy_arr);
		}
		return true;
	}

	function update_care_adv_float_policy($update_care_adv_float_policy_arr, $care_adv_float_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Floater : Care Advantage : Care Health Insurance Co. Ltd.

		if (!empty($care_adv_float_id)) {
			$this->db->where("care_health_care_adv_float_policy.care_adv_float_id ", $care_adv_float_id);
			$this->db->where("care_health_care_adv_float_policy.fk_policy_id", $policy_id);
			$this->db->where("care_health_care_adv_float_policy.fk_policy_type_id", $policy_name);
			$this->db->update('care_health_care_adv_float_policy', $update_care_adv_float_policy_arr);
		}
		return true;
	}

	function update_care_float_policy($update_care_float_policy_arr, $care_float_id, $policy_id, $policy_name)
	{ //Mislenious : Mediclaim : Floater : Care : Care Health Insurance Co. Ltd.

		if (!empty($care_float_id)) {
			$this->db->where("care_health_care_float_policy.care_float_id ", $care_float_id);
			$this->db->where("care_health_care_float_policy.fk_policy_id", $policy_id);
			$this->db->where("care_health_care_float_policy.fk_policy_type_id", $policy_name);
			$this->db->update('care_health_care_float_policy', $update_care_float_policy_arr);
		}
		return true;
	}

	function update_the_new_india_supertopup_ind_policy($update_the_new_india_supertopup_ind_policy_arr, $the_new_india_supertopup_assu_ind_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Super Top Up : Floater :  The New India Assurance Co Ltd

		if (!empty($the_new_india_supertopup_assu_ind_policy_id)) {
			$this->db->where("the_new_india_supertopup_ind_assu_policy.the_new_india_supertopup_assu_ind_policy_id", $the_new_india_supertopup_assu_ind_policy_id);
			$this->db->where("the_new_india_supertopup_ind_assu_policy.fk_policy_id", $policy_id);
			$this->db->where("the_new_india_supertopup_ind_assu_policy.fk_policy_type_id", $policy_name);
			$this->db->update('the_new_india_supertopup_ind_assu_policy', $update_the_new_india_supertopup_ind_policy_arr);
		}
		return true;
	}

	function update_the_new_india_supertopup_ind_single_policy($update_the_new_india_supertopup_ind_single_policy_arr, $the_new_india_supertopup_assu_ind_single_policy_id, $policy_id, $policy_name)
	{ //Mislenious : Super Top Up : Individual :  The New India Assurance Co Ltd

		if (!empty($the_new_india_supertopup_assu_ind_single_policy_id)) {
			$this->db->where("the_new_india_supertopup_ind_single_assu_policy.the_new_india_supertopup_assu_ind_single_policy_id", $the_new_india_supertopup_assu_ind_single_policy_id);
			$this->db->where("the_new_india_supertopup_ind_single_assu_policy.fk_policy_id", $policy_id);
			$this->db->where("the_new_india_supertopup_ind_single_assu_policy.fk_policy_type_id", $policy_name);
			$this->db->update('the_new_india_supertopup_ind_single_assu_policy', $update_the_new_india_supertopup_ind_single_policy_arr);
		}
		return true;
	}

	function update_supertopup_floater_policy($update_supertopup_floater_policy_arr, $supertopup_floater_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Super Top Up Floater 

		if (!empty($supertopup_floater_policy_id)) {
			$this->db->where("super_top_up_floater_policy.supertopup_floater_policy_id", $supertopup_floater_policy_id);
			$this->db->where("super_top_up_floater_policy.fk_policy_id", $policy_id);
			$this->db->where("super_top_up_floater_policy.fk_policy_type_id", $policy_name);
			$this->db->update('super_top_up_floater_policy', $update_supertopup_floater_policy_arr);
		}
		return true;
	}

	function update_hdfc_ergo_supertopup_ind_policy($update_hdfc_ergo_supertopup_ind_policy_arr, $supertopup_ind_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Super Top Up : Individual :Company= HDFC ERGO HEALTH INSURANCE 

		if (!empty($supertopup_ind_policy_id)) {
			$this->db->where("hdfc_ergo_health_super_topup_policy.supertopup_ind_policy_id", $supertopup_ind_policy_id);
			$this->db->where("hdfc_ergo_health_super_topup_policy.fk_policy_id", $policy_id);
			$this->db->where("hdfc_ergo_health_super_topup_policy.fk_policy_type_id", $policy_name);
			$this->db->update('hdfc_ergo_health_super_topup_policy', $update_hdfc_ergo_supertopup_ind_policy_arr);
		}
		return true;
	}

	function update_hdfc_ergo_supertopup_floater_policy($update_hdfc_ergo_supertopup_floater_policy_arr, $supertopup_float_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Super Top Up : Floater :Company= HDFC ERGO HEALTH INSURANCE 

		if (!empty($supertopup_float_policy_id)) {
			$this->db->where("hdfc_ergo_health_super_topup_floater_policy.supertopup_float_policy_id", $supertopup_float_policy_id);
			$this->db->where("hdfc_ergo_health_super_topup_floater_policy.fk_policy_id", $policy_id);
			$this->db->where("hdfc_ergo_health_super_topup_floater_policy.fk_policy_type_id", $policy_name);
			$this->db->update('hdfc_ergo_health_super_topup_floater_policy', $update_hdfc_ergo_supertopup_floater_policy_arr);
		}
		return true;
	}
	
	function update_supertopup_ind_policy($update_supertopup_ind_policy_arr, $supertopup_ind_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Super Top Up Individual 

		if (!empty($supertopup_ind_policy_id)) {
			$this->db->where("supertopup_ind_policy.supertopup_ind_policy_id", $supertopup_ind_policy_id);
			$this->db->where("supertopup_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("supertopup_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('supertopup_ind_policy', $update_supertopup_ind_policy_arr);
		}
		return true;
	}

	function update_gmc_policy($update_gmc_policy_arr, $gmc_policy_id, $policy_id, $policy_name)
	{ //Mislenious :GMC Individual 

		if (!empty($gmc_policy_id)) {
			$this->db->where("gmc_policy.gmc_policy_id", $gmc_policy_id);
			$this->db->where("gmc_policy.fk_policy_id", $policy_id);
			$this->db->where("gmc_policy.fk_policy_type_id", $policy_name);
			$this->db->update('gmc_policy', $update_gmc_policy_arr);
		}
		return true;
	}

	function update_gpa_policy($update_gpa_policy_arr, $gpa_policy_id, $policy_id, $policy_name)
	{ //Mislenious :GPA Individual 

		if (!empty($gpa_policy_id)) {
			$this->db->where("gpa_policy.gpa_policy_id", $gpa_policy_id);
			$this->db->where("gpa_policy.fk_policy_id", $policy_id);
			$this->db->where("gpa_policy.fk_policy_type_id", $policy_name);
			$this->db->update('gpa_policy', $update_gpa_policy_arr);
		}
		return true;
	}

	function update_personal_accident_ind_policy($update_personal_accident_ind_policy_arr, $paccident_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Personal Accident Individual 

		if (!empty($paccident_policy_id)) {
			$this->db->where("personal_accident_ind_policy.paccident_policy_id", $paccident_policy_id);
			$this->db->where("personal_accident_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("personal_accident_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('personal_accident_ind_policy', $update_personal_accident_ind_policy_arr);
		}
		return true;
	}

	function update_common_ind_policy($update_common_ind_policy_arr, $common_ind_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Common Individual 

		if (!empty($common_ind_policy_id)) {
			$this->db->where("common_ind_policy.common_ind_policy_id", $common_ind_policy_id);
			$this->db->where("common_ind_policy.fk_policy_id", $policy_id);
			$this->db->where("common_ind_policy.fk_policy_type_id", $policy_name);
			$this->db->update('common_ind_policy', $update_common_ind_policy_arr);
		}
		return true;
	}

	function update_common_float_policy($update_common_float_policy_arr, $common_float_policy_id, $policy_id, $policy_name)
	{ //Mislenious :Common Floater 

		if (!empty($common_float_policy_id)) {
			$this->db->where("common_float_policy.common_float_policy_id", $common_float_policy_id);
			$this->db->where("common_float_policy.fk_policy_id", $policy_id);
			$this->db->where("common_float_policy.fk_policy_type_id", $policy_name);
			$this->db->update('common_float_policy', $update_common_float_policy_arr);
		}
		return true;
	}
	
	function update_motor_private_car_policy($update_motor_private_car_policy_arr, $private_car_policy_id, $policy_id, $policy_name)
	{ //Motor :Private Car

		if (!empty($private_car_policy_id)) {
			$this->db->where("motor_private_car_policy.private_car_policy_id", $private_car_policy_id);
			$this->db->where("motor_private_car_policy.fk_policy_id", $policy_id);
			$this->db->where("motor_private_car_policy.fk_policy_type_id", $policy_name);
			$this->db->update('motor_private_car_policy', $update_motor_private_car_policy_arr);
		}
		return true;
	}
		
	function update_motor_two_wheeler_policy($update_motor_two_wheeler_policy_arr, $two_wheeler_policy_id, $policy_id, $policy_name)
	{ //Motor :2 Wheeler

		if (!empty($two_wheeler_policy_id)) {
			$this->db->where("motor_2_wheeler_policy.2_wheeler_policy_id", $two_wheeler_policy_id);
			$this->db->where("motor_2_wheeler_policy.fk_policy_id", $policy_id);
			$this->db->where("motor_2_wheeler_policy.fk_policy_type_id", $policy_name);
			$this->db->update('motor_2_wheeler_policy', $update_motor_two_wheeler_policy_arr);
		}
		return true;
	}
		
	function update_motor_commercial_policy($update_motor_commercial_policy_arr, $commercial_policy_id, $policy_id, $policy_name)
	{ //Motor : Commercial Vehicle

		if (!empty($commercial_policy_id)) {
			$this->db->where("motor_commercial_policy.commercial_policy_id", $commercial_policy_id);
			$this->db->where("motor_commercial_policy.fk_policy_id", $policy_id);
			$this->db->where("motor_commercial_policy.fk_policy_type_id", $policy_name);
			$this->db->update('motor_commercial_policy', $update_motor_commercial_policy_arr);
		}
		return true;
	}

}
?>
