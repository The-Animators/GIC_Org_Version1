<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <?php
                                if (!empty($breadcrumbs)) {
                                    foreach ($breadcrumbs as $row) {
                                        if ($row["breadcrumb_active"] == true) {
                                            echo "<li class=\"breadcrumb-item active\" >";
                                            echo $row["breadcrumb_label"];
                                            echo "</li>";
                                        } else {
                                            echo "<li class=\"breadcrumb-item\" >";
                                            echo "<a href=\"" . $row["breadcrumb_url"] . "\">";
                                            echo $row["breadcrumb_label"];
                                            echo "</a></li>";
                                        }
                                    }
                                }
                                ?>
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- Form row -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?></h4>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url(); ?>master/premium_calculator/" class='btn btn-secondary waves-effect width-md btn-sm mb-1'>Back</a>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="group_type" class="col-form-label col-md-4 text-right">Type : <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="group_type" id="group_type" class="form-control group_type" onchange="GroupType()">
                                            <option value="null">Select Type</option>
                                            <option value="Group">Group</option>
                                            <option value="Without Group">Without Group</option>
                                        </select>
                                        <span id="policy_type_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="company" class="col-form-label col-md-4 text-right">Company<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="company" id="company" class="form-control" onchange="company_department();DepartmentBasedPolicyName();departmentBased_Policy_option();PolicyType_Risk();Policy_typeName();policyNameBased_Policy_option();">
                                            <option value="null">Select Company</option>
                                            <?php $company = company_dropdown();
                                            if (!empty($company)) : foreach ($company as $row) : ?>
                                                    <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo ucwords($row["company_name"]); ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                        <span id="company_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="department" class="col-form-label col-md-4 text-right">Department<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="department" id="department" class="form-control" onchange="DepartmentBasedPolicyName();departmentBased_Policy_option();PolicyType_Risk();Policy_typeName();policyNameBased_Policy_option();">
                                            <option value="null">Select Department</option>
                                        </select>
                                        <span id="department_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="policy_name" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="policy_name" id="policy_name" class="form-control" onchange="Policy_typeName();PolicyType_Risk();policyNameBased_Policy_option();">
                                            <option value="null">Select Policy Name</option>
                                        </select>
                                        <span id="policy_name_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="policy_type" class="col-form-label col-md-4 text-right">Policy Option<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="policy_type" id="policy_type" class="form-control" onchange="PolicyType_Risk()">
                                            <option value="1">Individual</option>
                                            <option value="2">Floater</option>
                                        </select>
                                        <span id="policy_type_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="mode_of_premimum" class="col-form-label col-md-4 text-right">Mode Of Premium<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="mode_of_premimum" id="mode_of_premimum" class="form-control">
                                            <option value="1">Monthly</option>
                                            <option value="2">Quaterly</option>
                                            <option value="3">Half-Yearly</option>
                                            <option value="4" selected>Yearly</option>
                                            <option value="5">2 Year</option>
                                            <option value="6">3 Year</option>
                                            <option value="7">4 Year</option>
                                            <option value="8">5 Year</option>
                                            <option value="9">6 Year</option>
                                            <option value="10">7 Year</option>
                                            <option value="11">8 Year</option>
                                            <option value="12">9 Year</option>
                                            <option value="13">10 Year</option>
                                        </select>
                                        <span id="mode_of_premimum_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="group_name" class="col-form-label col-md-4 text-right">Group Name<span class="text-danger">*</span></label>
                                    <div class="col-md-8" id="group_name_select_div">
                                        <select name="group_name" id="group_name" class="form-control" onchange="GroupNameBasedMemberName()">
                                            <option value="null">Select Group Name</option>
                                            <?php $client_groupname = client_groupname_dropdown();
                                            if (!empty($client_groupname)) : foreach ($client_groupname as $row6) : ?>
                                                    <option value="<?php echo $row6["id"]; ?>"><?php echo ucwords($row6["grpname"]); ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                        <span id="group_name_err"></span>
                                    </div>
                                    <div class="col-md-8" id="group_name_input_div" style="display:none;">
                                        <input type="text" id="group_name" name="group_name" class="form-control group_name" value="">
                                        <span id="group_name_err"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" id="individual_policy_type_div" style="display:none;">
                                <div class="form-group row">
                                    <label for="individual_policy_type" class="col-form-label col-md-4  text-right">Ind. Policy Type<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="individual_policy_type" id="individual_policy_type" onchange="Individual_policy_type()">
                                            <option value="null">Select policy type</option>
                                            <option value="Floater 2020(Individual)">Floater 2020(Individual)</option>
                                        </select>
                                        <span id="individual_policy_type_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="hdfc_ergo_health_insu_individual_policy_type_div" style="display:none;">
                                <div class="form-group row">
                                    <label for="hdfc_ergo_health_insu_individual_policy_type" class="col-form-label col-md-4  text-right hdfc_type" id="hdfc_type">Ind. Policy Type<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <!-- onchange="hdfc_ergo_Individual_policy_type()" -->
                                        <select class="form-control" name="hdfc_ergo_health_insu_individual_policy_type" id="hdfc_ergo_health_insu_individual_policy_type" onchange="Policy_typeName();family();">
                                            <option value="null">Select policy type</option>
                                            <option value="Optima Restore">Optima Restore</option>
                                            <option value="Energy">Energy</option>
                                            <option value="Health Suraksha">Health Suraksha</option>
                                            <option value="Easy Health">Easy Health</option>
                                        </select>
                                        <span id="individual_policy_type_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="the_new_india_assur_indi_policy_type_div" style="display:none;">
                                <div class="form-group row">
                                    <label for="new_india_assur_indi_policy_type" class="col-form-label col-md-4  text-right hdfc_type" id="hdfc_type">Ind. Policy Type<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <!-- onchange="hdfc_ergo_Individual_policy_type()" -->
                                        <select class="form-control" name="new_india_assur_indi_policy_type" id="new_india_assur_indi_policy_type" onchange="Policy_typeName();family();">
                                            <option value="null">Select policy type</option>
                                            <option value="New India Mediclaim Policy 2017">New India Mediclaim Policy 2017</option>
                                            <option value="New India Floater Mediclaim">New India Floater Mediclaim</option>
                                        </select>
                                        <span id="individual_policy_type_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="max_bupa_health_insu_div" style="display:none;">
                                <div class="form-group row">
                                    <label for="max_bupa_health_insu_type" class="col-form-label col-md-4  text-right hdfc_type" id="hdfc_type">Ind. Policy Type<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <!-- onchange="hdfc_ergo_Individual_policy_type()" -->
                                        <select class="form-control" name="max_bupa_health_insu_type" id="max_bupa_health_insu_type" onchange="Policy_typeName();family();max_bupa_health_insu_medi_reassure_float_family_size();">
                                            <option value="null">Select policy type</option>
                                            <option value="Reassure">Reassure</option>
                                        </select>
                                        <span id="individual_policy_type_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="star_health_allied_insu_div" style="display:none;">
                                <div class="form-group row">
                                    <label for="star_health_allied_insu_type" class="col-form-label col-md-4  text-right hdfc_type" id="hdfc_type">Ind. Policy Type<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <!-- onchange="hdfc_ergo_Individual_policy_type()" -->
                                        <select class="form-control" name="star_health_allied_insu_type" id="star_health_allied_insu_type" onchange="Policy_typeName();family();star_health_allied_insu_red_carpet_float_family_size();">
                                            <option value="null">Select policy type</option>
                                            <option value="Red Carpet">Red Carpet</option>
                                            <option value="Comprehensive">Comprehensive</option>
                                        </select>
                                        <span id="individual_policy_type_err"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-row" id="hdfc_ergo_health_insu_family_size_div" style="display:none;">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="hdfc_ergo_health_insu_family_size" class="col-form-label col-md-4  text-right">Family Size<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="hdfc_ergo_health_insu_family_size" id="hdfc_ergo_health_insu_family_size" onchange="hdfc_ergo_health_insu_family_size();family_Size_Val()">
                                            <option value="null">Select Family Size</option>
                                            <option value="1A + 1C">1A + 1C</option>
                                            <option value="1A + 2C">1A + 2C</option>
                                            <option value="1A + 3C">1A + 3C</option>
                                            <option value="1A + 4C">1A + 4C</option>
                                            <option value="1A + 5C">1A + 5C</option>
                                            <option value="2A + 0C">2A + 0C</option>
                                            <option value="2A + 1C">2A + 1C</option>
                                            <option value="2A + 2C">2A + 2C</option>
                                            <option value="2A + 3C">2A + 3C</option>
                                            <option value="2A + 4C">2A + 4C</option>
                                        </select>
                                        <select class="form-control" name="suraksha_float_hdfc_ergo_health_insu_family_size" id="suraksha_float_hdfc_ergo_health_insu_family_size" onchange="hdfc_ergo_health_insu_family_size();family_Size_Val()" style="display:none">
                                            <option value="null">Select Family Size</option>
                                            <option value="1A + 1C">1A + 1C</option>
                                            <option value="1A + 2C">1A + 2C</option>
                                            <option value="1A + 3C">1A + 3C</option>
                                            <option value="2A + 0C">2A + 0C</option>
                                            <option value="2A + 1C">2A + 1C</option>
                                            <option value="2A + 2C">2A + 2C</option>
                                            <option value="2A + 2P">2A + 2P</option>
                                            <option value="2A + 2P + 2C">2A + 2P + 2C</option>
                                        </select>
                                        <select class="form-control" name="hdfc_ergo_health_insu_supertopup_float_family_size" id="hdfc_ergo_health_insu_supertopup_float_family_size" onchange="hdfc_ergo_health_insu_family_size();family_Size_Val()" style="display:none">
                                            <option value="null">Select Family Size</option>
                                            <option value="1A + 1C">1A + 1C</option>
                                            <option value="1A + 2C">1A + 2C</option>
                                            <option value="1A + 3C">1A + 3C</option>
                                            <option value="2A + 0C">2A + 0C</option>
                                            <option value="2A + 1C">2A + 1C</option>
                                            <option value="2A + 2C">2A + 2C</option>
                                        </select>
                                        <select class="form-control" name="max_bupa_health_insu_medi_reassure_float_family_size" id="max_bupa_health_insu_medi_reassure_float_family_size" onchange="max_bupa_health_insu_medi_reassure_float_family_size(); family_Size_Val()" style="display:none">
                                            <option value="null">Select Family Size</option>
                                            <option value="1A + 1C">1A + 1C</option>
                                            <option value="1A + 2C">1A + 2C</option>
                                            <option value="1A + 3C">1A + 3C</option>
                                            <option value="1A + 3C">1A + 4C</option>
                                            <option value="2A + 0C">2A + 0C</option>
                                            <option value="2A + 1C">2A + 1C</option>
                                            <option value="2A + 2C">2A + 2C</option>
                                            <option value="2A + 2C">2A + 3C</option>
                                            <option value="2A + 2C">2A + 4C</option>
                                        </select>
                                        <select class="form-control" name="star_health_allied_insu_red_carpet_float_family_size" id="star_health_allied_insu_red_carpet_float_family_size" onchange="star_health_allied_insu_red_carpet_float_family_size(); family_Size_Val()" style="display:none">
                                            <option value="null">Select Family Size</option>
                                            <option value="2A + 0C">2A + 0C</option>
                                        </select>
                                        <select class="form-control" name="star_health_allied_insu_comprehensive_float_family_size" id="star_health_allied_insu_comprehensive_float_family_size" onchange="star_health_allied_insu_red_carpet_float_family_size(); family_Size_Val()" style="display:none">
                                            <option value="null">Select Family Size</option>
                                            <option value="1A + 1C">1A + 1C</option>
                                            <option value="1A + 2C">1A + 2C</option>
                                            <option value="1A + 3C">1A + 3C</option>
                                            <option value="2A + 0C">2A + 0C</option>
                                            <option value="2A + 1C">2A + 1C</option>
                                            <option value="2A + 2C">2A + 2C</option>
                                            <option value="2A + 3C">2A + 3C</option>
                                        </select>
                                        <select class="form-control" name="star_health_allied_insu_supertopup_float_family_size" id="star_health_allied_insu_supertopup_float_family_size" onchange="family_Size_Val()" style="display:none">
                                            <option value="null">Select Family Size</option>
                                            <option value="1A + 1C">1A + 1C</option>
                                            <option value="1A + 2C">1A + 2C</option>
                                            <option value="1A + 3C">1A + 3C</option>
                                            <option value="2A + 0C">2A + 0C</option>
                                            <option value="2A + 1C">2A + 1C</option>
                                            <option value="2A + 2C">2A + 2C</option>
                                            <option value="2A + 3C">2A + 3C</option>
                                        </select>
                                        <span id="family_size_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="hdfc_ergo_health_insu_addition_of_more_child_div">
                                <div class="form-group row">
                                    <label for="hdfc_ergo_health_insu_addition_of_more_child" class="col-form-label col-md-4  text-right">Addition Of More Child:<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="hdfc_ergo_health_insu_addition_of_more_child" id="hdfc_ergo_health_insu_addition_of_more_child" onchange="hdfc_ergo_health_insu_family_size();get_premium_Of_Child()">
                                            <option value="null">Select Addition Of More Child</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <span id="addition_of_more_childerr"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row" id="family_size_div" style="display:none;">
                            <div class="col-md-4" id="floater_policy_type_div">
                                <div class="form-group row">
                                    <label for="floater_policy_type" class="col-form-label col-md-4  text-right">Floter Policy Type<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="floater_policy_type" id="floater_policy_type" onchange="Floater_policy_type()">
                                            <option value="Family Floater 2014">Family Floater 2014</option>
                                            <option value="Family Floater 2020">Family Floater 2020</option>
                                        </select>
                                        <span id="floater_policy_type_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="family_size" class="col-form-label col-md-4  text-right">Family Size<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="family_size" id="family_size" onchange="family_Size_Val()">
                                            <option value="null">Select Family Size</option>
                                            <option value="1">2A + 0C</option>
                                            <option value="2">2A + 1C</option>
                                            <option value="3">2A + 2C</option>
                                            <option value="4">1A+ 1C</option>
                                            <option value="5">1A + 2C</option>
                                        </select>
                                        <span id="family_size_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="addition_of_more_child_div">
                                <div class="form-group row">
                                    <label for="addition_of_more_child" class="col-form-label col-md-4  text-right">Addition Of More Child:<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="addition_of_more_child" id="addition_of_more_child" onchange="get_premium_Of_Child()">
                                            <option value="null">Select Addition Of More Child</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <span id="addition_of_more_childerr"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" id="3_cover_div" style="display:none;">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="restore_cover" class="col-form-label col-md-4  text-right">Restore Cover<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="restore_cover" id="restore_cover" onchange="get_Restore_cover_Premium()">
                                            <!-- <option value="null">Select Restore Cover</option> -->

                                            <option value="Not Required">Not Required</option>
                                            <option value="Required">Required</option>
                                        </select>
                                        <span id="restore_cover_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="maternity_new_born_baby_cover" class="col-form-label col-md-4  text-right">Maternity & New Born Baby Cover : <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="maternity_new_born_baby_cover" id="maternity_new_born_baby_cover" onchange="get_Maternity_cover_Premium()">
                                            <!-- <option value="null">Select Maternity</option> -->
                                            <option value="Not Required">Not Required</option>
                                            <option value="Required">Required</option>
                                        </select>
                                        <span id="maternity_new_born_baby_cover_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="daily_cash_allowance_cover" class="col-form-label col-md-4  text-right">Daily Cash Allowance on Hospitalization Cover<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="daily_cash_allowance_cover" id="daily_cash_allowance_cover" onchange="get_DailyCashAllowenceBB_cover_Premium()">
                                            <!-- <option value="null">Select Daily Cash Allowance</option> -->
                                            <option value="Not Required">Not Required</option>
                                            <option value="Required">Required</option>
                                        </select>
                                        <span id="daily_cash_allowance_cover_err"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row" id="gmc_family_size_div" style="display:none;">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="gmc_family_size" class="col-form-label col-md-4  text-right">Family Size<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="gmc_family_size" id="gmc_family_size">
                                            <option value="null">Select Policy Option</option>
                                            <option value="Husband+Wife">Husband+Wife</option>
                                            <option value="Husband+Wife+Childrens">Husband+Wife+Childrens</option>
                                            <option value="Husband+Wife+Childrens+Two Parents">Husband+Wife+Childrens+Two Parents</option>
                                            <option value="Only Employee">Only Employee</option>
                                        </select>
                                        <span id="gmc_family_size_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="gmc_total_sum_insured_div">
                                <div class="form-group row">
                                    <label for="gmc_total_sum_insured" class="col-form-label col-md-4  text-right">Total Sum Insured:<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="gmc_total_sum_insured" id="gmc_total_sum_insured">
                                        <span id="gmc_total_sum_insured_err"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- // Premium Calculator view Start -->
                        <div class="form-row">
                            <div class="col-md-12" id="append_premium_calculator"></div>
                        </div>
                        <!-- // Premium Calculator view End -->
                        <hr>
                        <div class="form-row mt-2">
                            <div class="form-group col-md-4">
                            </div>
                            <div class="form-group col-md-5">
                                <center><button type="submit" id="save_Cal" class="btn btn-primary btn-sm">Save</button></center>
                            </div>
                            <div class="form-group col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo date("Y"); ?> &copy; GIC by <a href="">Animator</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

<script>
    function GroupType() {
        var group_type = $("#group_type").val();
        if (group_type != "null") {
            if (group_type == "Group") {
                $("#group_name_input_div").hide();
                $("#group_name_select_div").show();
            } else if (group_type == "Without Group") {
                $("#group_name_input_div").show();
                $("#group_name_select_div").hide();
            }
        }
    }

    function company_department() {
        var company = $("#company").val();

        var url = "<?php echo $base_url; ?>master/policy/get_companybased_department";

        if (company != "") {
            $.ajax({
                url: url,
                data: {
                    company: company
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#department').html("<option value='null'>Select Department</option>");
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var department_id = val[i]["department_id"];
                            var department_name = val[i]["department_name"].charAt(0).toUpperCase() + val[i]["department_name"].slice(1);
                            if (department_name == "Fire" || department_name == "Marine" || department_name == "Motor" || department_name == "Life Insurance") {
                                continue;
                            }
                            option_val += '<option value="' + department_id + '">' + department_name + '</option>';
                        }
                    } else {
                        $('#department').html("<option value='null'>Select Department</option>");
                    }
                    $('#department').append(option_val);

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function DepartmentBasedPolicyName() {
        var department = $("#department").val();
        var company = $("#company").val();

        var url = "<?php echo $base_url; ?>master/policy/get_departmentBased_policyname";

        if (department != "") {
            $.ajax({
                url: url,
                data: {
                    department: department,
                    company: company,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#policy_name').html("<option value='null'>Select Policy Name</option>");
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var policy_type_id = val[i]["policy_type_id"];
                            var policy_type = val[i]["policy_type"].charAt(0).toUpperCase() + val[i]["policy_type"].slice(1);
                            if (policy_type == "Burglary" || policy_type == "Worksmen Compentation" || policy_type == "Money In Transit" || policy_type == "Plate Glass" || policy_type == "House Holder" || policy_type == "All Risk" || policy_type == "Office Compact" || policy_type == "Electronic Equipment" || policy_type == "Product Liability" || policy_type == "Commercial General Liability" || policy_type == "Public Liability" || policy_type == "Professional Indemnity" || policy_type == "Machinery Breakdown" || policy_type == "Contractors All Risk" || policy_type == "Shopkeeper" || policy_type == "Jweller Block" || policy_type == "Personal Accident" || policy_type == "GMC" || policy_type == "GPA") {
                                continue;
                            }
                            option_val += '<option value="' + policy_type_id + '">' + policy_type + '</option>';
                        }
                    } else {
                        $('#policy_name').html("<option value='null'>Select Policy Name</option>");
                    }
                    $('#policy_name').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }
    var option_val_data = "";

    function GroupNameBasedMemberName() {
        var group_name = $("#group_name").val();
        var group_name_txt = $("#group_name option:selected").text();
        // $("#group_name_company").text(group_name_txt);
        option_val_data = "";
        var url = "<?php echo $base_url; ?>master/policy/get_groupBased_membername";

        if (group_name != "") {
            $.ajax({
                url: url,
                data: {
                    group_name: group_name
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#policy_holder_name').html("<option value='null'>Select Policy Holder Name</option>");
                        $('.member_name').html("<option value='null'>Select Member Name</option>");
                        $('.name_insured_member_name').html("<option value='null'>Select Member Names</option>");
                        $('.nominee_name').html("<option value='null'>Select Nominee Name</option>");
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var member_id = val[i]["id"];
                            var member_name = val[i]["name"].charAt(0).toUpperCase() + val[i]["name"].slice(1);
                            option_val += '<option value="' + member_id + '">' + member_name + '</option>';
                        }
                    } else {
                        $('#policy_holder_name').html("<option value='null'>Select Policy Holder Name</option>");
                        $('.member_name').html("<option value='null'>Select Member Name</option>");
                        $('.name_insured_member_name').html("<option value='null'>Select Member Names</option>");
                        $('.nominee_name').html("<option value='null'>Select Nominee Name</option>");
                    }
                    option_val_data += option_val;
                    // alert(option_val_data);
                    $('#policy_holder_name').append(option_val);
                    $('.member_name').append(option_val);
                    $('.name_insured_member_name').append(option_val);
                    $('.nominee_name').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function departmentBased_Policy_option() {
        var department = $("#department").val();
        var department_txt = $("#department option:selected").text();

        if (department_txt == "Fire") {
            var append = '<option value="3">Residential & Commercial</option>';
            $("#policy_type").append(append);
        } else {
            $("#policy_type option[value='3']").remove();
        }
    }

    PolicyType_Risk();

    function PolicyType_Risk() {
        add_risk = 0;
        counterArray = [];
        mainRiskAddress = [];
        mainRiskAddressDescription = [];
        $("#family_size").val("null");
        $("#addition_of_more_child").val("null");
        $('#floater_policy_type').prop('selectedIndex', 0);
        $('#individual_policy_type').prop('selectedIndex', 0);
        var policy_name_txt = $("#policy_name option:selected").text();
        // alert(policy_name_txt);
        if (policy_name_txt != "" && policy_name_txt != "Select Policy Name")
            Policy_typeName();

        if (policy_name_txt != "" && policy_name_txt != "Select Policy Name") {
            Policy_typeName();
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        }
        var policy_option = $("#policy_type").val(); //1: Individual, 2: Floater,3:Residential & Commercial
        if (policy_option == 1) {
            // alert(policy_option);
            // $("#risk_button_ind").empty();
            $("#append_risk").empty();
            $("#risk_floater").hide();
            $("#risk_individual").show();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
            $("#3_cover_div").hide();

            // alert("Individual");
        } else if (policy_option == 2) {
            $("#append_risk").empty();
            $("#risk_floater").show();
            $("#risk_individual").hide();
            $("#risk_floater_add").show();
            $("#risk_rc").hide();
            $("#3_cover_div").hide();
            // alert("Floater");
        } else if (policy_option == 3) {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").show();
            $("#append_risk").empty();
        }

        var policy_name_txt = $("#policy_name option:selected").text();
        // alert(policy_name_txt);
        if (policy_name_txt == "Term Plan" || policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up" || policy_name_txt == "GMC" || policy_name_txt == "GPA" || policy_name_txt == "Personal Accident" || policy_name_txt == "Private Car" || policy_name_txt == "2 Wheeler" || policy_name_txt == "Commercial Vehicle") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        } else if (policy_name_txt == "Shopkeeper") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        } else if (policy_name_txt == "Jweller Block") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        } else if (policy_name_txt == "Open Policy" || policy_name_txt == "Stop Policy" || policy_name_txt == "Specific Policy") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        }
        if (policy_option == 1)
            $("#3_cover_div").hide();

    }

    function Policy_typeName() {
        var policy_name = $("#policy_name").val();
        var company = $("#company option:selected").text();
        var policy_type_txt = $("#policy_type option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        var floater_policy_type = $("#floater_policy_type").val();
        var individual_policy_type = $("#individual_policy_type").val();
        var hdfc_ergo_health_insu_individual_policy_type = $("#hdfc_ergo_health_insu_individual_policy_type").val();
        var new_india_assur_indi_policy_type = $("#new_india_assur_indi_policy_type").val();
        var max_bupa_health_insu_type = $("#max_bupa_health_insu_type").val();
        var star_health_allied_insu_type = $("#star_health_allied_insu_type").val();

        var hidden = $("#floater_policy_type").is(":visible");
        var hidden2 = $("#individual_policy_type").is(":visible");
        var hidden3 = $("#hdfc_ergo_health_insu_individual_policy_type").is(":visible");
        var hidden4 = $("#new_india_assur_indi_policy_type").is(":visible");
        var hidden5 = $("#max_bupa_health_insu_type").is(":visible");
        var hidden6 = $("#star_health_allied_insu_type").is(":visible");
        var new_policy_type = "";
        if (hidden == true)
            new_policy_type = floater_policy_type;
        else if (hidden2 == true)
            new_policy_type = individual_policy_type;
        else if (hidden3 == true)
            new_policy_type = hdfc_ergo_health_insu_individual_policy_type;
        else if (hidden4 == true)
            new_policy_type = new_india_assur_indi_policy_type;
        else if (hidden5 == true)
            new_policy_type = max_bupa_health_insu_type;
        else if (hidden6 == true)
            new_policy_type = star_health_allied_insu_type;

        //  alert(policy_name_txt)
        if (policy_name_txt == "" || policy_name_txt == "Select Policy Name") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#gmc_family_size_div").hide();
        }

        if ((policy_name_txt == "GMC" || policy_name_txt == "GPA") && (policy_type_txt == "Individual" || policy_type_txt == "Floater")) {
            $("#gmc_family_size_div").show();
        } else {
            $("#gmc_family_size_div").hide();
        }
        // alert(new_policy_type);
        // alert(hidden);
        // alert(hidden2);
        // alert(floater_policy_type);
        // alert(individual_policy_type);

        if (policy_name_txt == "Select Policy Name" || policy_name_txt != "Mediclaim") {
            // alert("End")
            $("#family_size_div").hide();
            $("#hdfc_ergo_health_insu_family_size_div").hide();
            $("#individual_policy_type_div").hide();
            $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
            $("#the_new_india_assur_indi_policy_type_div").hide();
            $("#max_bupa_health_insu_div").hide();
            $("#star_health_allied_insu_div").hide();
            $("#floater_policy_type_div").hide();
        }

        if (policy_name_txt != "Mediclaim" && policy_type_txt == "Individual")
            $("#3_cover_div").hide();
        if (policy_name_txt == "Super Top Up" && (policy_type_txt == "Floater" || policy_type_txt == "Common Floater")) {
            if (company == "HDFC ERGO HEALTH INSURANCE LTD") {
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_supertopup_float_family_size").show();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#family_size_div").hide();
                $("#addition_of_more_child_div").hide();
                $("#floater_policy_type_div").hide();

                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);

            } else if (company == "The New India Assurance Co Ltd") {
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_supertopup_float_family_size").show();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#family_size_div").hide();
                $("#addition_of_more_child_div").hide();
                $("#floater_policy_type_div").hide();

                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);

            } else if (company == "Star Health & Allied Insurance Co Ltd") {

                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_supertopup_float_family_size").hide();
                $("#star_health_allied_insu_supertopup_float_family_size").show();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#family_size_div").hide();
                $("#addition_of_more_child_div").hide();
                $("#floater_policy_type_div").hide();

                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);

            } else {
                // alert("hi")
                $("#family_size_div").show();
                $("#addition_of_more_child_div").hide();
                $("#floater_policy_type_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
            }
        } else {
            $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
            $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
            $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
            $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
            $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
            $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);

            $("#individual_policy_type_div").hide();
            $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
            $("#the_new_india_assur_indi_policy_type_div").hide();
            $("#max_bupa_health_insu_div").hide();
            $("#star_health_allied_insu_div").hide();
            $("#family_size_div").hide();
            $("#hdfc_ergo_health_insu_family_size_div").hide();
        }

        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Individual") {
            if (company == "HDFC ERGO HEALTH INSURANCE LTD") {
                $("#hdfc_type").text("Ind. Policy Type : ");
                $(".hdfc_type").text("Ind. Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").show();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                if (new_policy_type != "Energy") {
                    $("#hdfc_ergo_health_insu_individual_policy_type option[value='Energy']").remove();
                    $("#hdfc_ergo_health_insu_individual_policy_type").append('<option value="Energy">Energy</option>');
                }
            } else if (company == "The New India Assurance Co Ltd") {
                $(".hdfc_type").text("Ind. Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").show();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                if (new_policy_type != "New India Floater Mediclaim" || new_policy_type != "New India Mediclaim Policy 2017") {
                    if (new_policy_type != "New India Floater Mediclaim") {
                        $("#new_india_assur_indi_policy_type option[value='New India Floater Mediclaim']").remove();
                    }
                    if (new_policy_type != "New India Mediclaim Policy 2017") {
                        $("#new_india_assur_indi_policy_type option[value='New India Floater Mediclaim']").remove();
                        $("#new_india_assur_indi_policy_type option[value='New India Mediclaim Policy 2017']").remove();
                        $("#new_india_assur_indi_policy_type").append('<option value="New India Mediclaim Policy 2017">New India Mediclaim Policy 2017');
                    }
                }
            } else if (company == "Max Bupa Health Insurance Co. Ltd.") {
                $(".hdfc_type").text("Ind. Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").show();
                $("#star_health_allied_insu_div").hide();
            } else if (company == "Star Health & Allied Insurance Co Ltd") {
                $(".hdfc_type").text("Ind. Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").show();
            } else {
                // $("#individual_policy_type").val("null");
                $("#individual_policy_type_div").show();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
            }
        } else if (policy_name_txt == "Mediclaim" && policy_type_txt == "Floater") {
            if (company == "HDFC ERGO HEALTH INSURANCE LTD") {
                $("#hdfc_type").text("Floater Policy Type : ");
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").show();
                $("#addition_of_more_child_div").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").show();
                $("#hdfc_ergo_health_insu_individual_policy_type option[value='Energy']").remove();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();

                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);

                if (new_policy_type == "Optima Restore") {
                    $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                    $("#hdfc_ergo_health_insu_family_size").show();
                } else if (new_policy_type == "Health Suraksha") {
                    $("#hdfc_ergo_health_insu_family_size").hide();
                    $("#suraksha_float_hdfc_ergo_health_insu_family_size").show();
                } else if (new_policy_type == "Easy Health") {
                    $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                    $("#hdfc_ergo_health_insu_family_size").show();
                }
            } else if (company == "The New India Assurance Co Ltd") {
                $(".hdfc_type").text("Floater Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").show();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();

                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);

                if (new_policy_type != "New India Floater Mediclaim" || new_policy_type != "New India Mediclaim Policy 2017") {
                    if (new_policy_type != "New India Floater Mediclaim") {
                        $("#new_india_assur_indi_policy_type option[value='New India Mediclaim Policy 2017']").remove();
                        $("#new_india_assur_indi_policy_type option[value='New India Floater Mediclaim']").remove();
                        $("#new_india_assur_indi_policy_type").append('<option value="New India Floater Mediclaim">New India Floater Mediclaim</option>');
                    }
                    if (new_policy_type != "New India Mediclaim Policy 2017") {
                        $("#new_india_assur_indi_policy_type option[value='New India Mediclaim Policy 2017']").remove();
                    }
                }
            } else if (company == "Max Bupa Health Insurance Co. Ltd.") {
                $(".hdfc_type").text("Floater Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").show();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").show();
                $("#star_health_allied_insu_div").hide();

                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
            } else if (company == "Star Health & Allied Insurance Co Ltd") {
                $(".hdfc_type").text("Floater Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").show();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();

                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);

                if (new_policy_type == "Red Carpet") {
                    $("#star_health_allied_insu_red_carpet_float_family_size").show();
                    $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                } else if (new_policy_type == "Comprehensive") {
                    $("#star_health_allied_insu_comprehensive_float_family_size").show();
                    $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                }
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").show();
            } else {
                // $("#floater_policy_type").val("Family Floater 2014");
                $("#family_size_div").show();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#individual_policy_type_div").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                $("#floater_policy_type_div").show();
                $("#addition_of_more_child_div").show();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();

                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
            }
        } else {
            // $("#individual_policy_type_div").hide();
            // $("#family_size_div").hide();
        }
        // if((policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up") && (policy_type_txt == "Individual" || policy_type_txt == "Floater")){
        if ((policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up")) {
            $("#tpa_company_div").show();
        } else {
            $("#tpa_company_div").hide();
        }
        // alert(policy_type_txt);
        if (policy_name_txt == "Term Plan" || policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up" || policy_name_txt == "GMC" || policy_name_txt == "GPA" || policy_name_txt == "Personal Accident" || policy_name_txt == "Private Car" || policy_name_txt == "2 Wheeler" || policy_name_txt == "Commercial Vehicle") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        } else if (policy_name_txt == "Shopkeeper") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        } else if (policy_name_txt == "Jweller Block") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        } else if (policy_name_txt == "Open Policy" || policy_name_txt == "Stop Policy" || policy_name_txt == "Specific Policy") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
        }

        var url = "<?php echo $base_url; ?>master/policy/load_premium_view";
        $("#append_premium_calculator").html("");
        if (policy_name_txt != "" && policy_name_txt != "Select Policy Name") {
            $("#append_premium_calculator").html("");
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'html',
                async: false,
                cache: false,
                data: {
                    policy_name_txt: policy_name_txt,
                    policy_type_txt: policy_type_txt,
                    floater_policy_type: new_policy_type,
                    company: company,
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data == '{"userdata":[],"status":false}') {
                        $("#append_premium_calculator").html("");
                    } else {
                        $("#append_premium_calculator").html(data);
                        $("#cgst_fire_per").val(9);
                        $("#sgst_fire_per").val(9);
                        $("#cgst_term_plan").val(9);
                        $("#sgst_term_plan").val(9);
                        $("#shopkeeper_cgst_fire_per").val(9);
                        $("#shopkeeper_sgst_fire_per").val(9);
                        $("#tot_owd_cgst_rate").val(9);
                        $("#tot_owd_sgst_rate").val(9);
                        $("#tot_owd_addon_cgst_rate").val(9);
                        $("#tot_owd_addon_sgst_rate").val(9);
                        $("#tot_btp_cgst_rate").val(9);
                        $("#tot_btp_sgst_rate").val(9);
                        $("#tot_other_tp_cgst_rate").val(9);
                        $("#tot_other_tp_sgst_rate").val(9);
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function policyNameBased_Policy_option() {
        var policy_name = $("#policy_name").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        if (policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up" || policy_name_txt == "Personal Accident" || policy_name_txt == "GMC" || policy_name_txt == "GPA") {
            $("#policy_type option[value='4']").remove();
            $("#policy_type option[value='5']").remove();
            var append = '<option value="4">Common Individual</option><option value="5">Common Floater</option>';
            $("#policy_type").append(append);
        } else {
            $("#policy_type option[value='4']").remove();
            $("#policy_type option[value='5']").remove();
        }
        Policy_typeName();
    }

    function hdfc_ergo_health_insu_family_size() {
        var hdfc_ergo_health_insu_individual_policy_type = $("#hdfc_ergo_health_insu_individual_policy_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        if (policy_name_txt != "Super Top Up") {
            if (hdfc_ergo_health_insu_individual_policy_type == "null" || hdfc_ergo_health_insu_individual_policy_type == "") {
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
                $('#hdfc_ergo_health_insu_addition_of_more_child').prop('selectedIndex', 0);
                toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");
                return false;
            }
        }
    }

    function max_bupa_health_insu_medi_reassure_float_family_size() {
        var max_bupa_health_insu_type = $("#max_bupa_health_insu_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        if (policy_name_txt != "Super Top Up") {
            if (max_bupa_health_insu_type == "null" || max_bupa_health_insu_type == "") {
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex', 0);
                toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");
                return false;
            }
        }
    }

    function star_health_allied_insu_red_carpet_float_family_size() {
        var star_health_allied_insu_type = $("#star_health_allied_insu_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        if (policy_name_txt != "Super Top Up") {
            if (star_health_allied_insu_type == "null" || star_health_allied_insu_type == "") {
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex', 0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex', 0);
                toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");
                return false;
            }
        }
    }

    function family() {
        $('#suraksha_float_hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
        $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex', 0);
        $('#hdfc_ergo_health_insu_addition_of_more_child').prop('selectedIndex', 0);
    }
    // Policy_typeName();
    var option_policyDescription_data = "";

    function Individual_policy_type() {
        var individual_policy_type = $("#individual_policy_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();
        if (policy_name_txt == "Mediclaim") {
            // alert(individual_policy_type);
            if (individual_policy_type == "null" || individual_policy_type == "null") {
                // alert(individual_policy_type);
                $("#3_cover_div").hide();
                Policy_typeName();
            } else if (individual_policy_type == "Floater 2020(Individual)") {
                // alert(individual_policy_type);
                // $("#3_cover_div").show();
                Policy_typeName();
            }
        }
    }

    function Floater_policy_type() {
        var policy_name_txt = $("#policy_name option:selected").text();
        if (policy_name_txt == "Mediclaim") {
            $("#family_size").val("null");
            $("#addition_of_more_child").val("null");
            var floater_policy_type = $("#floater_policy_type").val();
            var policy_type_txt = $("#policy_type option:selected").text();
            // alert(policy_type_txt);
            if (policy_type_txt == "Individual")
                $("#3_cover_div").hide();

            if (floater_policy_type == "Family Floater 2014" || floater_policy_type == "null") {
                $("#3_cover_div").hide();
                $("#family_size option[value='6']").remove();
                Policy_typeName();
            } else if (floater_policy_type == "Family Floater 2020") {
                $("#3_cover_div").show();
                $("#family_size").append('<option value="6">2A + 3C</option>');
                Policy_typeName();
            }
        }
    }

    $(document).on("click", "#save_Cal", function(e) {
        var baseUrl = '<?php echo base_url(); ?>';
        e.preventDefault();
        // alert(baseUrl);
        var formdata = new FormData($('#formData')[0]);
        $.ajax({
            type: "POST",
            url: baseUrl + 'master/premium_calculator/add_prem_cal',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data["status"] == true) {
                    // alert(data["customer_id"]);
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#group_type").val("");
                    $("#company").val("");
                    $("#department").val("");
                    $("#policy_name").val("");
                    $("#policy_type").val("");
                    $("#mode_of_premimum").val("");
                    $("#group_name").val("");

                    $("#group_type").removeClass("parsley-error");
                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    $("#policy_type").removeClass("parsley-error");
                    $("#mode_of_premimum").removeClass("parsley-error");
                    $("#group_name").removeClass("parsley-error");
                    setTimeout(function() {
                        document.location.href = baseUrl + 'master/premium_calculator/';
                    }, 1000);
                } else {

                    if (data["message"]["group_type_err"] != "") {
                        $("#group_type").addClass("parsley-error");
                        $("#group_type").focus();
                    } else
                        $("#group_type").removeClass("parsley-error");
                    $("#group_type_err").addClass("text-danger").html(data["message"]["group_type_err"]);

                    if (data["message"]["company_err"] != "") {
                        $("#company").addClass("parsley-error");
                        $("#company").focus();
                    } else
                        $("#company").removeClass("parsley-error");
                    $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                    if (data["message"]["department_err"] != "") {
                        $("#department").addClass("parsley-error");
                        $("#department").focus();
                    } else
                        $("#department").removeClass("parsley-error");
                    $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);

                    if (data["message"]["policy_name_err"] != "") {
                        $("#policy_name").addClass("parsley-error");
                        $("#policy_name").focus();
                    } else
                        $("#policy_name").removeClass("parsley-error");
                    $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);

                    if (data["message"]["policy_type_err"] != "") {
                        $("#policy_type").addClass("parsley-error");
                        $("#policy_type").focus();
                    } else
                        $("#policy_type").removeClass("parsley-error");
                    $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);

                    if (data["message"]["mode_of_premimum_err"] != "") {
                        $("#mode_of_premimum").addClass("parsley-error");
                        $("#mode_of_premimum").focus();
                    } else
                        $("#mode_of_premimum").removeClass("parsley-error");
                    $("#mode_of_premimum_err").addClass("text-danger").html(data["message"]["mode_of_premimum_err"]);

                    if (data["message"]["group_name_err"] != "") {
                        $("#group_name").addClass("parsley-error");
                        $("#group_name").focus();
                    } else
                        $("#group_name").removeClass("parsley-error");
                    $("#group_name_err").addClass("text-danger").html(data["message"]["group_name_err"]);
                }
                // if (data.status == true) {
                //     alert('Data Inserted Successfully');
                //     document.location.href = baseUrl + 'Clients/member_details/' + data.id;
                // }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });
</script>
<script>
    // $(document).ready(function() {
    //     var path = window.location.pathname;
    //     var page = path.split("/").pop();
    //     var user_role_id = <?php echo  $this->session->userdata("@_user_role_id"); ?>;
    //     var submenu_permission = "<?php echo $this->session->userdata("@_user_role_sub_menu_permission"); ?>";
    //     var role_permission = '<?php echo $this->session->userdata("@_staff_role_permission"); ?>';
    //     var url = '<?php echo base_url(); ?>login/logout';
    //     if ((user_role_id != 1) && (user_role_id != 2)) {
    //         var id = $("#submenu").data("value");
    //         if (id != "") {
    //             CheckFormAccess(submenu_permission, 6, url);
    //             check(role_permission, 6);
    //         }
    //     }
    // });
</script>