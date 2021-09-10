          
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


            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Description Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="description_name" class="col-form-label col-md-4 text-right">Description Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="description_name" id="description_name" value="" placeholder="Enter Description Name" class="form-control">
                                                    <span id="description_name_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="submit_description" onclick="DescriptionSave()" class="btn btn-primary btn-sm">Save</button>
                                            </center>
                                        </div>
                                        <div class="form-group col-md-4"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form row -->
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo "Edit " . $title; ?></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url() . "master/policy"; ?>" class='btn btn-secondary waves-effect width-md btn-sm'>Back</a>
                            </div>

                        </div>

                        <p class="sub-header">

                        </p>

                        <div class="row">
                            <div class="col-md-12">

                                <u> <strong>Basic <?php echo $title; ?> Details</strong></u>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="serial_no_date_month" class="col-form-label col-md-4 text-right">Year/Month<span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <select class="form-control" id="serial_no_year" name="serial_no_year" onchange="getPolicyCounter()">
                                                    <option value="null">Select Year</option>
                                                    <?php
                                                    $currently_selected = date('Y');
                                                    $earliest_year = 1910;
                                                    $latest_year = date('Y', strtotime('+50 years'));
                                                    foreach (range($latest_year, $earliest_year) as $i) :
                                                    ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="serial_no_year_err"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="serial_no_month" name="serial_no_month" onchange="getPolicyCounter()">
                                                    <option value="null">Select Month</option>
                                                    <?php $month = date('m'); ?>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                                <span id="serial_no_month_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="serial_no" class="col-form-label col-md-4 text-right">Sr No.<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="serial_no" id="serial_no" value="" placeholder="Enter Sr No." class="form-control">
                                                <span id="serial_no_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="company" class="col-form-label col-md-4 text-right">Company<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="company" id="company" class="form-control" onchange="company_department();company_agency();DepartmentBasedPolicyName();departmentBased_Policy_option();PolicyType_Risk();Policy_typeName();policyNameBased_Policy_option();">
                                                    <option value="null">Select Company</option>
                                                    <?php $company = company_dropdown();
                                                    if (!empty($company)) : foreach ($company as $row) :  ?>
                                                            <option value="<?php echo $row["mcompany_id"]; ?>" ><?php echo ucwords($row["company_name"]); ?></option>
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
                                                    <option value="3">Residential & Commercial</option>
                                                    <option value="4">Common Individual</option>
                                                    <option value="5">Common Floater</option>
                                                </select>
                                                <span id="policy_type_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="agency_code" class="col-form-label col-md-4 text-right">Agency Code<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="agency_code" id="agency_code" class="form-control">
                                                    <option value="null">Select Agency Code</option>
                                                </select>
                                                <span id="agency_code_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sub_agency_code" class="col-form-label col-md-4 text-right">Sub-Agency Code<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="sub_agency_code" id="sub_agency_code" class="form-control">
                                                    <option value="0">Nil</option>
                                                    <?php $subagency = subagency_dropdown();
                                                    if (!empty($subagency)) : foreach ($subagency as $row5) : ?>
                                                            <option value="<?php echo $row5["sub_agent_id"]; ?>" ><?php echo ucwords($row5["sub_agent_code"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                                <span id="sub_agency_code_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="mode_of_premimum" class="col-form-label col-md-4 text-right">Mode Of Premium<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="mode_of_premimum" id="mode_of_premimum" class="form-control" onchange="Todate_Basedon_Modeofpremium()">
                                                    <option value="1">Monthly</option>
                                                    <option value="2">Quaterly</option>
                                                    <option value="3">Half-Yearly</option>
                                                    <option value="4">Yearly</option>
                                                    <option value="5" >2 Year</option>
                                                    <option value="6" >3 Year</option>
                                                    <option value="7" >4 Year</option>
                                                    <option value="8" >5 Year</option>
                                                    <option value="9" >6 Year</option>
                                                    <option value="10" >7 Year</option>
                                                    <option value="11" >8 Year</option>
                                                    <option value="12" >9 Year</option>
                                                    <option value="13" >10 Year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="date_from" class="col-form-label col-md-4 text-right">Date From<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="date_from" id="date_from" value="" placeholder="Enter Date From" class="form-control" onchange="payment_fromdate()">
                                                <span id="date_from_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="date_to" class="col-form-label col-md-4 text-right">Date To<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="date_to" id="date_to" value="" placeholder="Enter Date To" class="form-control" onchange="payment_Todate()">
                                                <span id="date_to_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="payment_date_from" class="col-form-label col-md-4 text-right">Payment Date From<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="payment_date_from" id="payment_date_from" value="" placeholder="Enter Payment Date From" class="form-control">
                                                <span id="payment_date_from_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="payment_date_to" class="col-form-label col-md-4 text-right">Payment Date To<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="payment_date_to" id="payment_date_to" value="" placeholder="Enter Payment Date To" class="form-control">
                                                <span id="payment_date_to_err"></span>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="group_name" class="col-form-label col-md-4 text-right">Group Name<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="group_name" id="group_name" class="form-control" onchange="GroupNameBasedMemberName();group_name_company()">
                                                    <option value="null">Select Group Name</option>
                                                    <?php $client_groupname = client_groupname_dropdown();
                                                    if (!empty($client_groupname)) : foreach ($client_groupname as $row6) : ?>
                                                            <option value="<?php echo $row6["id"]; ?>" ><?php echo ucwords($row6["grpname"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                                <span id="group_name_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="policy_holder_name" class="col-form-label col-md-4 text-right">Policy Holder Name<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="policy_holder_name" id="policy_holder_name" class="form-control" onchange="policy_holder_name()">
                                                    <option value="null">Select Policy Holder Name</option>
                                                </select>
                                                <span id="policy_holder_name_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="date_commenced" class="col-form-label col-md-4 text-right">Date Commenced<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="date_commenced" id="date_commenced" value="" placeholder="Enter Date Commenced" class="form-control">
                                                <span id="date_commenced_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="reg_mobile" class="col-form-label col-md-4  text-right">Reg. Mobile No.<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="reg_mobile" id="reg_mobile" value="" placeholder="Enter Registered Mobile No." class="form-control" maxlength="12" minlength="10">
                                                <span id="reg_mobile_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="reg_email" class="col-form-label col-md-4  text-right">Reg. Email Id<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="email" name="reg_email" id="reg_email" value="" placeholder="Enter Registered Email Id" class="form-control">
                                                <input type="hidden" class="form-control" name="policy_counter_no" id="policy_counter_no" value="">
                                                <input type="hidden" class="form-control" name="policy_id" id="policy_id" value="">
                                                <span id="reg_email_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 card card-body ">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="policy_no" class="col-form-label col-md-4 text-right">Policy No.<span class="text-danger">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="policy_no" id="policy_no" value="" placeholder="Enter Policy No." class="form-control">
                                                        <span id="policy_no_err"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="policy_upload" class="col-form-label col-md-4  text-right">Policy Upload<span class="text-danger">*</span></label>
                                                    <div class="col-md-5">
                                                        <input type="file" name="policy_upload" id="policy_upload" value="" placeholder="Enter Policy Upload" class="form-control" onchange='check_file_upload(id="policy_upload")'>
                                                        <span id="policy_upload_err"></span>
                                                        <input type="hidden" name="policy_upload_hidden" id="policy_upload_hidden" value="">
                                                    </div>
                                                    <div class="col-md-3" id="upload_details"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="quotation_date" class="col-form-label col-md-4 text-right">Quotation Date</label>
                                            <div class="col-md-8">
                                                <input type="date" name="quotation_date" id="quotation_date" value="" placeholder="Enter Quotation Date" class="form-control">
                                                <span id="quotation_date_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="quotation_upload" class="col-form-label col-md-4 text-right">Quotation Upload</label>
                                            <div class="col-md-8">
                                                <input type="file" name="quotation_upload" id="quotation_upload" value="" placeholder="Enter Quotation Upload" class="form-control" onchange='check_file_upload(id="quotation_upload")'>
                                                <input type="hidden" name="quotation_upload_hidden" id="quotation_upload_hidden" value="">
                                                <span id="quotation_upload_details"></span>
                                                <span id="quotation_upload_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="quotation_male_link" class="col-form-label col-md-4 text-right">Quotation Link</label>
                                            <div class="col-md-8">
                                                <input type="text" name="quotation_male_link" id="quotation_male_link" value="" placeholder="Enter Quotation Link" class="form-control">
                                                <span id="quotation_male_link_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="tpa_company_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="tpa_company" class="col-form-label col-md-4  text-right">TPA<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="tpa_company" id="tpa_company" >
                                                    <option value="null">Select TPA</option>
                                                    <?php $tpa_company = tpa_dropdown(); if(!empty($tpa_company)): foreach($tpa_company as $tpa_row): ?>
                                                    <option value="<?php echo $tpa_row["mtpa_id"]; ?>"><?php echo $tpa_row["tpa_name"]; ?></option>
                                                    <?php endforeach; endif; ?>
                                                </select>
                                                <span id="tpa_company_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="riv_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="riv" class="col-form-label col-md-4 text-right">RIV</label>
                                            <div class="col-md-8">
                                                <input type="text" name="riv" id="riv" value="" placeholder="Enter RIV" class="form-control">
                                                <span id="riv_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="type_of_bussiness_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="type_of_bussiness" class="col-form-label col-md-4 text-right">Type Of Bussiness</label>
                                            <div class="col-md-8">
                                                <input type="text" name="type_of_bussiness" id="type_of_bussiness" value="" placeholder="Enter Type Of Bussiness" class="form-control">
                                                <span id="type_of_bussiness_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="desc_of_stock_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="description_of_stock" class="col-form-label col-md-4 text-right">Description Of Stock</label>
                                            <div class="col-md-8">
                                                <input type="text" name="description_of_stock" id="description_of_stock" value="" placeholder="Enter Description Of Stock" class="form-control">
                                                <span id="description_of_stock_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="individual_policy_type_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="individual_policy_type" class="col-form-label col-md-4  text-right">Ind. Policy Type<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="individual_policy_type" id="individual_policy_type" onchange="Individual_policy_type()">
                                                    <option value="Individual Health Insurance Policy">Individual Health Insurance Policy</option>
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
                                                <select class="form-control" name="star_health_allied_insu_type" id="star_health_allied_insu_type" onchange="Policy_typeName();family();">
                                                    <option value="null">Select policy type</option>
                                                    <option value="Red Carpet">Red Carpet</option>
                                                    <option value="Comprehensive">Comprehensive</option>
                                                </select>
                                                <span id="individual_policy_type_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" id="care_health_insu_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="care_health_insu_type" class="col-form-label col-md-4  text-right hdfc_type" id="hdfc_type">Ind. Policy Type<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="care_health_insu_type" id="care_health_insu_type" onchange="Policy_typeName();family();care_health_insu_care_advantage_float_family_size();">
                                                    <option value="null">Select policy type</option>
                                                    <option value="Care Advantage">Care Advantage</option>
                                                    <option value="Care">Care</option>
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

                                                <select class="form-control" name="suraksha_float_hdfc_ergo_health_insu_family_size" id="suraksha_float_hdfc_ergo_health_insu_family_size" onchange="hdfc_ergo_health_insu_family_size();family_Size_Val()"  style="display:none">
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

                                                <select class="form-control" name="max_bupa_health_insu_medi_reassure_float_family_size" id="max_bupa_health_insu_medi_reassure_float_family_size" onchange="max_bupa_health_insu_medi_reassure_float_family_size();family_Size_Val()" style="display:none">
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
                                                <select class="form-control" name="care_health_insu_care_advantage_float_family_size" id="care_health_insu_care_advantage_float_family_size" onchange="care_health_insu_care_advantage_float_family_size();family_Size_Val()" style="display:none">
                                                    <option value="null">Select Family Size</option>
                                                    <option value="1A + 1C">1A + 1C</option>
                                                    <option value="1A + 2C">1A + 2C</option> 
                                                    <option value="1A + 3C">1A + 3C</option>
                                                    <option value="1A + 4C">1A + 4C</option>
                                                    <option value="2A + 0C">2A + 0C</option>
                                                    <option value="2A + 1C">2A + 1C</option>
                                                    <option value="2A + 2C">2A + 2C</option>
                                                    <option value="2A + 3C">2A + 3C</option>
                                                    <option value="2A + 4C">2A + 4C</option>
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
                                                <option value="null">Select Policy Option</option>
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
                                                <option value="null">Select Policy Option</option>
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
                                            <select class="form-control" name="gmc_family_size" id="gmc_family_size" >
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


                            <!-- // Risk RC Details Section Start -->
                            <hr>
                            <div class="form-row" id="risk_rc">
                                <div class="col-md-6">
                                    <u><strong>Risk Details</strong></u>
                                </div>
                                <div class="col-md-6 text-right" id="risk_button_rc">
                                    <button class="btn btn-primary btn-sm addRisc_R_C" id="addRisc_R_C" onclick="addRisc_R_C()">Add Risk Address</button>
                                </div>
                            </div>
                            <!-- // Risk RC Details Section End -->

                            <!-- // Risk Individual Details Section Start -->
                            <hr>
                            <div class="form-row" id="risk_individual">
                                <div class="col-md-6">
                                    <u><strong>Risk Details</strong></u>
                                </div>
                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddRisk" id="AddRisk" onClick="AddRisk()" disabled>Add Risk Address</button>
                                    <input class='btn btn-facebook btn-sm' id='add_description' value=' Add Description' type='button' disabled>
                                </div>
                            </div>

                            <!-- <div class=" " id="append_risk">

                            </div> -->
                            <!-- // Risk Individual Details Section End -->

                            <!-- // Risk floater Details Section Start -->
                            <!-- <hr> -->
                            <div class="form-row" id="risk_floater">
                                <div class="col-md-6">
                                    <u><strong>Risk Details</strong></u>
                                </div>
                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddRiskFloater" id="AddRiskFloater" onClick="AddRiskFloater()">Add Risk Address</button>

                                </div>
                            </div>

                            <div class=" " id="append_risk">

                            </div>

                            <div class="form-row mt-2" id="risk_floater_add">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddRiskDetails_floater" id="AddRiskDetails_floater" onClick=AddRiskDetails_floater(0)>Add Risk</button>
                                    <input class='btn btn-facebook btn-sm' id='add_description_floater' value='Add Description' type='button'>
                                </div>
                                <div class="col-md-12">
                                    <table class="col-md-12">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Sum Assured</th>
                                                <th></th>
                                        </thead>
                                        <tbody id="description_data">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- // Risk floater Details Section End -->
                            <hr>
                            <div class="form-row">
                                <div class="col-md-12" id="append_premium_calculator"></div>
                            </div>

                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <u><strong>Remarks Details</strong></u>
                                </div>
                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddRemark" id="AddRemark" onClick="AddRemark(0)">Add Remark</button></div>
                            </div>

                            <hr class="mt-2">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                        <thead>
                                            <tr style="padding:10px;">
                                                <th style="border: 1px solid #dddddd;padding:10px;">
                                                    <center>Remarks</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Mail Date</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="append_remark">

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <hr>
                            <span style="display:none;" id="hypotication_details_global" >
                            <div class="form-row">
                                <div class="col-md-6">
                                    <u><strong>Hypotication Details</strong></u>
                                </div>
                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddHypotication" id="AddHypotication" onClick="AddHypotication(0)">Add Hypotication</button></div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                        <thead>
                                            <tr style="padding:10px;">
                                                <th style="border: 1px solid #dddddd;padding:10px;">
                                                    <center>Bank Name</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Branch Name</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="append_hypotication">

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <hr>
                            </span>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <u><strong>Correspondence Details</strong></u>
                                </div>
                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddCorrespondence" id="AddCorrespondence" onClick="AddCorrespondence(0)">Add Correspondence</button></div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                        <thead>
                                            <tr style="padding:10px;">
                                                <th style="border: 1px solid #dddddd;padding:10px;">
                                                    <center>Member Names</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Correspondence Email Id</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Whatsapp</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Telegram/Signal</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Cc</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Bcc</center>
                                                </th>
                                                <th style="border: 1px solid #dddddd;">
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="append_correspondence">

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <!-- //  Payment Acknowledgement Details Section Start -->
                            <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <u><strong>Payment Acknowledgement Details</strong></u>
                                    </div>
                                    <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm  Add_PaymentAcknowledgement" id="Add_PaymentAcknowledgement" onClick="AddPaymentAcknowledgement(0)">Add Payment Acknowledgement</button></div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                            <thead>
                                                <tr style="padding:10px;">
                                                    <th style="border: 1px solid #dddddd;padding:10px;">
                                                        <center>Payment Mode</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Payment Acknowledgement File (Only pdf and Image file Allowed)</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Action</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="append_payment_acknowlege">
                                                
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- // Payment Acknowledgement Details Section End -->
                            <hr>


                            <div class="form-row mt-2">
                                <div class="form-group col-md-4">
                                </div>
                                <div class="form-group col-md-5">
                                    <center>
                                        <input type="hidden" name="fire_rc_policy_id" id="fire_rc_policy_id" value="">
                                        <button id="update" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>

                                    </center>
                                </div>
                                <div class="form-group col-md-4"></div>
                            </div>

                        </div>
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
                    <input type="hidden" name="function_name" id="function_name" value="<?php echo $method; ?>">
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

    function showRIV_FIRESHOPKEEPER(){
        var company_txt = $("#company option:selected").text();
        var department_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        if(policy_name_txt == "Bharat Sookshma Udyam" || policy_name_txt == "Bharat Laghu Udyam" || policy_name_txt == "Bharat Griha Raksha" || policy_name_txt == "Standard Fire & Allied Perils" || policy_name_txt == "Shopkeeper"){
            $("#riv_div").show();
        }else{
            $("#riv_div").hide();
        }
    }

    function show_Type_ofBuss_StockDesc_FIRESHOPKEEPER(){
        var company_txt = $("#company option:selected").text();
        var department_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        if(policy_name_txt == "Bharat Sookshma Udyam" || policy_name_txt == "Bharat Laghu Udyam" || policy_name_txt == "Bharat Griha Raksha" || policy_name_txt == "Standard Fire & Allied Perils" || policy_name_txt == "Shopkeeper" || policy_name_txt == "Burglary" || policy_name_txt == "Money In Transit"){
            $("#type_of_bussiness_div").show();
            $("#desc_of_stock_div").show();
        }else{
            $("#type_of_bussiness_div").hide();
            $("#desc_of_stock_div").hide();
        }
    }

    function hdfc_ergo_health_insu_family_size(){
        var hdfc_ergo_health_insu_individual_policy_type = $("#hdfc_ergo_health_insu_individual_policy_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();
        
        if(policy_name_txt != "Super Top Up"){
            if(hdfc_ergo_health_insu_individual_policy_type =="null" || hdfc_ergo_health_insu_individual_policy_type == ""){
                $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                $('#hdfc_ergo_health_insu_addition_of_more_child').prop('selectedIndex',0);
                toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");
                return false;
            }
        }
    }

    function max_bupa_health_insu_medi_reassure_float_family_size(){
        var max_bupa_health_insu_type = $("#max_bupa_health_insu_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        if(policy_name_txt != "Super Top Up"){
            if(max_bupa_health_insu_type =="null" || max_bupa_health_insu_type == ""){
                $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");
                return false;
            }
        }
    }
    function star_health_allied_insu_red_carpet_float_family_size(){
        var star_health_allied_insu_type = $("#star_health_allied_insu_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        if(policy_name_txt != "Super Top Up"){
            if(star_health_allied_insu_type =="null" || star_health_allied_insu_type == ""){
                $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");
                return false;
            }
        } 
    }

    function care_health_insu_care_advantage_float_family_size(){
        var care_health_insu_type = $("#care_health_insu_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        if(policy_name_txt != "Super Top Up"){
            if(care_health_insu_type =="null" || care_health_insu_type == ""){
                $('#care_health_insu_care_advantage_float_family_size').prop('selectedIndex',0);
                $('#care_health_insu_care_float_family_size').prop('selectedIndex',0);
                toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");
                return false;
            }
        }  
    }

    function family(){
        $('#suraksha_float_hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
        $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
        $('#hdfc_ergo_health_insu_addition_of_more_child').prop('selectedIndex',0);
    }

    var add_paymentacknowledge_counter =0;
    var main_paymentacknowledge = [];
    var actual_data_Paymentacknowledge = [];

    function Individual_policy_type() {
        var individual_policy_type = $("#individual_policy_type").val();
        var policy_name_txt = $("#policy_name option:selected").text();
        if (policy_name_txt == "Mediclaim") {
            // alert(individual_policy_type);
            if (individual_policy_type == "Individual Health Insurance Policy") {
                // alert(individual_policy_type);
                // $("#3_cover_div").hide();
                Policy_typeName();
            } else if (individual_policy_type == "Floater 2020(Individual)") {
                // alert(individual_policy_type);
                // $("#3_cover_div").show();
                Policy_typeName();
            }
        }
    }

    function Floater_policy_type(floater_policy_type_txt){
        var policy_name_txt = $("#policy_name option:selected").text();
        if (policy_name_txt == "Mediclaim") {
            $("#family_size").val("null");
            $("#addition_of_more_child").val("null");
            // if(floater_policy_type_txt !=""){
            //     var floater_policy_type =floater_policy_type_txt;
            // }else{
                // alert(floater_policy_type);
                var floater_policy_type = $("#floater_policy_type").val();
            // }
            // alert(floater_policy_type);
            var policy_type_txt = $("#policy_type option:selected").text();
            // alert(policy_type_txt);
            if(policy_type_txt == "Individual")
                $("#3_cover_div").hide();
            if(floater_policy_type == "Family Floater 2014" || floater_policy_type == "null"){
                $("#3_cover_div").hide();
                $("#family_size option[value='6']").remove();
                Policy_typeName();
            }else if(floater_policy_type == "Family Floater 2020"){
                $("#3_cover_div").show();
                // $("#restore_cover").val("Not Required");
                $("#family_size").append('<option value="6">2A + 3C</option>');
                Policy_typeName();
            }
        }
    }

    function departmentBased_Policy_option() {
        var department = $("#department").val();
        var department_txt = $("#department option:selected").text();
        // alert(department_txt);
        var policy_type = $("#policy_type option:selected").text();
        // alert(policy_type);
        if (department_txt == "Fire") {
            if(policy_type != "Residential & Commercial"){
                // $('select.product-custom-option option:contains(Residential & Commercial)').remove();

                $("#policy_type option[value='3']").remove();
                var append = '<option value="3">Residential & Commercial</option>';
            }else
            var append = "";

            $("#policy_type").append(append);
        } else {
            $("#policy_type option[value='3']").remove();
        }
    }

    function policyNameBased_Policy_option(policy_name_txt_val,policy_type_new) {
        $('select[id^="policy_type"] option[value="' + policy_type + '"]').attr("selected", "selected");
        var policy_name = $("#policy_name").val();
        var policy_name_txt = $("#policy_name option:selected").text();
        if(policy_type_new == 4)
            policy_type_new = "Common Individual";
        else if(policy_type_new == 5)
            policy_type_new = "Common Floater";

        if(policy_type_new != "" || policy_type_new !="null")
            var policy_type = policy_type_new;
        else
            var policy_type = $("#policy_type option:selected").text();
        var append ="";
        // alert(policy_name_txt);
        if (policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness" || policy_name_txt == "Personal Accident" || policy_name_txt == "GMC" || policy_name_txt == "GPA"){
            if(policy_type == "Common Individual" && policy_type != "Common Floater"){
                
                $("#policy_type option[value='4']").remove();
                    append += '<option value="4">Common Individual</option>';
            }else if(policy_type == "Common Floater" && policy_type != "Common Individual"){
                $("#policy_type option[value='5']").remove();
                    append += '<option value="5">Common Floater</option>';
            }else if(policy_type == "Common Floater" && policy_type == "Common Individual"){
                $("#policy_type option[value='4']").remove();
                $("#policy_type option[value='5']").remove();
                append = '<option value="4">Common Individual</option><option value="5">Common Floater</option>';
            }else if(policy_type != "Common Floater" && policy_type != "Common Individual"){
                $("#policy_type option[value='4']").remove();
                $("#policy_type option[value='5']").remove();
                append = '<option value="4">Common Individual</option><option value="5">Common Floater</option>';
            }
            $("#policy_type").append(append);
        } else {
            $("#policy_type option[value='4']").remove();
            $("#policy_type option[value='5']").remove();
        }
        
        Policy_typeName();
    }
    var option_policyDescription_data = "";

    function Policy_typeName() {

        var policy_name = $("#policy_name").val();
        var company = $("#company option:selected").text();
        // if(policy_type_txt != "")
        //     var policy_type_txt = policy_type_txt;
        // else
            var policy_type_txt = $("#policy_type option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        var floater_policy_type = $("#floater_policy_type").val();
        var individual_policy_type = $("#individual_policy_type").val();
        var hdfc_ergo_health_insu_individual_policy_type = $("#hdfc_ergo_health_insu_individual_policy_type").val();
        var new_india_assur_indi_policy_type = $("#new_india_assur_indi_policy_type").val();
        var max_bupa_health_insu_type = $("#max_bupa_health_insu_type").val();
        var star_health_allied_insu_type = $("#star_health_allied_insu_type").val();
        var care_health_insu_type = $("#care_health_insu_type").val();
        // alert(care_health_insu_type);
        var hidden = $("#floater_policy_type").is(":visible");
        var hidden2 = $("#individual_policy_type").is(":visible");
        var hidden3 = $("#hdfc_ergo_health_insu_individual_policy_type").is(":visible");
        var hidden4 = $("#new_india_assur_indi_policy_type").is(":visible");
        var hidden5 = $("#max_bupa_health_insu_type").is(":visible");
        var hidden6 = $("#star_health_allied_insu_type").is(":visible");
        var hidden7 = $("#care_health_insu_type").is(":visible");
        var new_policy_type = "";
        // alert(hidden7);
        // alert(hidden2);
        if(hidden == true)
            new_policy_type = floater_policy_type;
        else if(hidden2 == true)
            new_policy_type = individual_policy_type;
        else if(hidden3 == true)
            new_policy_type = hdfc_ergo_health_insu_individual_policy_type;
        else if (hidden4 == true)
            new_policy_type = new_india_assur_indi_policy_type;
        else if (hidden5 == true)
            new_policy_type = max_bupa_health_insu_type;
        else if (hidden6 == true)
            new_policy_type = star_health_allied_insu_type;
        else if (hidden7 == true)
            new_policy_type = care_health_insu_type;

        // alert(new_policy_type);

            if (policy_name_txt == "" || policy_name_txt == "Select Policy Name") {
                $("#risk_individual").hide();
                $("#risk_floater").hide();
                $("#risk_floater_add").hide();
                $("#gmc_family_size_div").hide();
            }

            if((policy_name_txt == "GMC" || policy_name_txt == "GPA") && (policy_type_txt == "Individual" || policy_type_txt == "Floater")){
                $("#gmc_family_size_div").show();
            }else{
                $("#gmc_family_size_div").hide();
            }
        // alert(new_policy_type);

        if(policy_name_txt =="Select Policy Name" || policy_name_txt !="Mediclaim"){
            // alert("End")
            $("#family_size_div").hide();
            $("#hdfc_ergo_health_insu_family_size_div").hide();
            $("#hdfc_ergo_health_insu_family_size").hide();
            $("#individual_policy_type_div").hide();
            $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
            $("#the_new_india_assur_indi_policy_type_div").hide();
            $("#max_bupa_health_insu_div").hide();
            $("#star_health_allied_insu_div").hide();
            $("#care_health_insu_div").hide();
            $("#floater_policy_type_div").hide();
        }

        if (policy_name_txt == "Bharat Sookshma Udyam" || policy_name_txt == "Bharat Laghu Udyam" || policy_name_txt == "Bharat Griha Raksha" || policy_name_txt == "Standard Fire & Allied Perils" || policy_name_txt == "Burglary" || policy_name_txt == "Shopkeeper" || policy_name_txt == "Contractors All Risk"){
            $("#hypotication_details_global").show();
        }else{
            $("#hypotication_details_global").hide();
        }

        if (policy_name_txt != "Mediclaim" && policy_type_txt == "Individual")
            $("#3_cover_div").hide();
        if ((policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness") &&  (policy_type_txt == "Floater" || policy_type_txt == "Common Floater")) {
            if (company == "HDFC ERGO HEALTH INSURANCE LTD" || company == "HDFC Ergo General Insurance Co Ltd") {
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_supertopup_float_family_size").show();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $('#care_health_insu_care_advantage_float_family_size').hide();
                $('#care_health_insu_care_float_family_size').hide();
                $("#family_size_div").hide();
                $("#addition_of_more_child_div").hide();
                $("#floater_policy_type_div").hide();

                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                
            }else if (company == "The New India Assurance Co Ltd") {
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_supertopup_float_family_size").show();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $('#care_health_insu_care_advantage_float_family_size').hide();
                $('#care_health_insu_care_float_family_size').hide();
                $("#family_size_div").hide();
                $("#addition_of_more_child_div").hide();
                $("#floater_policy_type_div").hide();

                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                
            }else if (company == "Star Health & Allied Insurance Co Ltd") {
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_supertopup_float_family_size").hide();
                $("#star_health_allied_insu_supertopup_float_family_size").show();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $('#care_health_insu_care_advantage_float_family_size').hide();
                $('#care_health_insu_care_float_family_size').hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#family_size_div").hide();
                $("#addition_of_more_child_div").hide();
                $("#floater_policy_type_div").hide();

                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                
            }else {
                $("#family_size_div").show();
                $("#addition_of_more_child_div").hide();
                $("#floater_policy_type_div").hide();
                $("#3_cover_div").hide();
            }
        }else{
            $("#individual_policy_type_div").hide();
            $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
            $("#the_new_india_assur_indi_policy_type_div").hide();
            $("#max_bupa_health_insu_div").hide();
            $("#star_health_allied_insu_div").hide();
            $("#care_health_insu_div").hide();
            $("#hdfc_ergo_health_insu_family_size_div").hide();
            $("#hdfc_ergo_health_insu_family_size").hide();
            $("#family_size_div").hide();
        }

        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Individual") {
            if (company == "HDFC ERGO HEALTH INSURANCE LTD" || company == "HDFC Ergo General Insurance Co Ltd") {
                $("#hdfc_type").text("Ind. Policy Type : ");
                $(".hdfc_type").text("Ind. Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").show();
                if(new_policy_type != "Energy"){
                    $("#hdfc_ergo_health_insu_individual_policy_type option[value='Energy']").remove();
                    $("#hdfc_ergo_health_insu_individual_policy_type").append('<option value="Energy">Energy</option>');
                }
            }else if (company == "The New India Assurance Co Ltd") {
                $(".hdfc_type").text("Ind. Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").show();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").hide();
                if(new_policy_type != "New India Floater Mediclaim" || new_policy_type != "New India Mediclaim Policy 2017"){
                    if(new_policy_type != "New India Floater Mediclaim"){
                        $("#new_india_assur_indi_policy_type option[value='New India Floater Mediclaim']").remove();
                    }
                    if(new_policy_type != "New India Mediclaim Policy 2017"){
                        $("#new_india_assur_indi_policy_type option[value='New India Floater Mediclaim']").remove();
                        $("#new_india_assur_indi_policy_type option[value='New India Mediclaim Policy 2017']").remove();
                        $("#new_india_assur_indi_policy_type").append('<option value="New India Mediclaim Policy 2017">New India Mediclaim Policy 2017');
                    }
                }
            }else if (company == "Max Bupa Health Insurance Co Ltd") {
                $(".hdfc_type").text("Ind. Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").show();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").hide();
            }else if (company == "Star Health & Allied Insurance Co Ltd") {
                $(".hdfc_type").text("Ind. Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").show();
                $("#care_health_insu_div").hide();
            } else if (company == "United India Insurance Co Ltd") {
                // $("#individual_policy_type").val("null");
                $("#individual_policy_type_div").show();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").hide();
            } else if (company == "Care Health Insurance Co Ltd") {
                // $("#individual_policy_type").val("null");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").show();
            }
        } else if (policy_name_txt == "Mediclaim" && policy_type_txt == "Floater") {
            if (company == "HDFC ERGO HEALTH INSURANCE LTD" || company == "HDFC Ergo General Insurance Co Ltd") {
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_addition_of_more_child').prop('selectedIndex',0);
                $("#hdfc_type").text("Floater Policy Type : ");
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_family_size").show();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").show();
                $("#addition_of_more_child_div").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").show();
                $("#hdfc_ergo_health_insu_individual_policy_type option[value='Energy']").remove();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").hide();

                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $('#care_health_insu_care_advantage_float_family_size').hide();
                $('#care_health_insu_care_float_family_size').hide();
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);

                if(new_policy_type=="Optima Restore"){
                    $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                    $("#hdfc_ergo_health_insu_family_size").show();
                }else if(new_policy_type=="Health Suraksha"){
                    $("#hdfc_ergo_health_insu_family_size").hide();
                    $("#suraksha_float_hdfc_ergo_health_insu_family_size").show();
                }else if(new_policy_type=="Easy Health"){
                    $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                    $("#hdfc_ergo_health_insu_family_size").show();
                }else{
                    // $("#hdfc_ergo_health_insu_family_size").hide();
                    $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                    $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                    $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                    $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                    $("#star_health_allied_insu_supertopup_float_family_size").hide();
                    $('#care_health_insu_care_advantage_float_family_size').hide();
                    $('#care_health_insu_care_float_family_size').hide();
                }
            }else if (company == "The New India Assurance Co Ltd") {
                $(".hdfc_type").text("Floater Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#the_new_india_assur_indi_policy_type_div").show();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $('#care_health_insu_care_advantage_float_family_size').hide();
                $('#care_health_insu_care_float_family_size').hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").hide();

                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);

                if(new_policy_type != "New India Floater Mediclaim" || new_policy_type != "New India Mediclaim Policy 2017"){
                    if(new_policy_type != "New India Floater Mediclaim"){
                        $("#new_india_assur_indi_policy_type option[value='New India Mediclaim Policy 2017']").remove();
                        $("#new_india_assur_indi_policy_type option[value='New India Floater Mediclaim']").remove();
                        $("#new_india_assur_indi_policy_type").append('<option value="New India Floater Mediclaim">New India Floater Mediclaim');
                    }
                    if(new_policy_type != "New India Mediclaim Policy 2017"){
                        $("#new_india_assur_indi_policy_type option[value='New India Mediclaim Policy 2017']").remove();
                    }
                }
            }else if (company == "Max Bupa Health Insurance Co Ltd") {
                $(".hdfc_type").text("Floater Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").show();
                $("#suraksha_float_hdfc_ergo_health_insu_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $('#care_health_insu_care_advantage_float_family_size').hide();
                $('#care_health_insu_care_float_family_size').hide();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").show();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").hide();

                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
            }else if (company == "Star Health & Allied Insurance Co Ltd") {
                $(".hdfc_type").text("Floater Policy Type : ");
                $("#individual_policy_type_div").hide();
                $("#family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").show();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();

                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                if(new_policy_type == "Red Carpet"){
                    $("#star_health_allied_insu_red_carpet_float_family_size").show();
                    $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                    $("#star_health_allied_insu_supertopup_float_family_size").hide();
                }else if(new_policy_type == "Comprehensive"){
                    $("#star_health_allied_insu_comprehensive_float_family_size").show();
                    $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                    $("#star_health_allied_insu_supertopup_float_family_size").hide();
                }else{
                    $("#hdfc_ergo_health_insu_family_size").hide();
                    $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                    // $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                    $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                    $("#star_health_allied_insu_supertopup_float_family_size").hide();
                }
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").show();
                $("#care_health_insu_div").hide();

            } else if (company == "United India Insurance Co Ltd"){
                // $("#floater_policy_type").val("Family Floater 2014");
                $(".hdfc_type").text("Floater Policy Type : ");
                $("#family_size_div").show();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                $('#care_health_insu_care_advantage_float_family_size').hide();
                $('#care_health_insu_care_float_family_size').hide();
                $("#hdfc_ergo_health_insu_family_size_div").hide();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#individual_policy_type_div").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").hide();
                $("#floater_policy_type_div").show();
                $("#addition_of_more_child_div").show();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();

                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
                // $('#hdfc_ergo_health_insu_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_supertopup_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_red_carpet_float_family_size').prop('selectedIndex',0);
                // $('#star_health_allied_insu_comprehensive_float_family_size').prop('selectedIndex',0);
                // $('#max_bupa_health_insu_medi_reassure_float_family_size').prop('selectedIndex',0);
            }else if (company == "Care Health Insurance Co Ltd"){
                // $("#floater_policy_type").val("Family Floater 2014");
                $(".hdfc_type").text("Floater Policy Type : ");
                $("#family_size_div").hide();
                $("#max_bupa_health_insu_medi_reassure_float_family_size").hide();
                $("#star_health_allied_insu_red_carpet_float_family_size").hide();
                $("#star_health_allied_insu_comprehensive_float_family_size").hide();
                $("#star_health_allied_insu_supertopup_float_family_size").hide();
                // if(new_policy_type == "Care Advantage" || new_policy_type == "Care")
                    $('#care_health_insu_care_advantage_float_family_size').show();
                $('#care_health_insu_care_float_family_size').hide();
                $("#hdfc_ergo_health_insu_family_size_div").show();
                $("#hdfc_ergo_health_insu_family_size").hide();
                $("#individual_policy_type_div").hide();
                $("#hdfc_ergo_health_insu_individual_policy_type_div").hide();
                $("#the_new_india_assur_indi_policy_type_div").hide();
                $("#max_bupa_health_insu_div").hide();
                $("#star_health_allied_insu_div").hide();
                $("#care_health_insu_div").show();
                $("#floater_policy_type_div").hide();
                $("#addition_of_more_child_div").hide();
                $("#hdfc_ergo_health_insu_addition_of_more_child_div").hide();
            }
        }else{
            $("#hdfc_ergo_health_insu_family_size").hide();
            // $("#individual_policy_type_div").hide();
            // $("#family_size_div").hide();
        }
        // alert(policy_name_txt);
        // if((policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up") && (policy_type_txt == "Individual" || policy_type_txt == "Floater")){
        if((policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up")){
            $("#tpa_company_div").show();
        }else{
            $("#tpa_company_div").hide();
        }
        // alert(policy_name_txt);
        if (policy_name_txt == "Term Plan" || policy_name_txt == "Mediclaim" ||  policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness"|| policy_name_txt == "GMC" || policy_name_txt == "GPA" ||  policy_name_txt == "Personal Accident" || policy_name_txt == "Private Car" || policy_name_txt == "2 Wheeler" || policy_name_txt == "Commercial Vehicle" || policy_name_txt == "Cancer Plan" || policy_name_txt == "Daily Cash" || policy_name_txt == "Overseas Mediclaim" || policy_name_txt == "Student Overseas Mediclaim" || policy_name_txt == "Employment Overseas Mediclaim") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
        } else if (policy_name_txt == "Shopkeeper") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
        } else if (policy_name_txt == "Jweller Block") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
        } else if (policy_name_txt == "Open Policy" || policy_name_txt == "Stop Policy" || policy_name_txt == "Specific Policy") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
        }
        // alert(policy_type_txt);
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
                    floater_policy_type:new_policy_type,
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
                        document.getElementById("AddRisk").disabled = false;
                        document.getElementById("add_description").disabled = false;
                        document.getElementById("AddRiskFloater").disabled = false;
                        document.getElementById("AddRiskDetails_floater").disabled = false;
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function PolicyType_Risk(type) {
        add_risk = 0;
        // if (type != "")
        //     var policy_option = type; //1: Individual, 2: Floater,3:Residential & Commercial
        // else
            var policy_option = $("#policy_type").val(); //1: Individual, 2: Floater,3:Residential & Commercial

            var policy_name_txt = $("#policy_name option:selected").text();
            // alert(policy_option);
        if(policy_name_txt !="" && policy_name_txt !="Select Policy Name")
        $("#family_size").val("null");
        $("#addition_of_more_child").val("null");
        $('#floater_policy_type').prop('selectedIndex',0);
        $('#individual_policy_type').prop('selectedIndex',0);
            Policy_typeName();
        // alert(policy_option+"h");
        if (policy_option == 1) {
            $("#append_risk").empty();
            $("#risk_floater").hide();
            $("#risk_individual").show();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();

            // alert("Individual");
        } else if (policy_option == 2) {
            $("#append_risk").empty();
            $("#risk_floater").show();
            $("#risk_individual").hide();
            $("#risk_floater_add").show();
            $("#risk_rc").hide();
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
        if (policy_name_txt == "Term Plan" || policy_name_txt == "Mediclaim" ||  policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness"|| policy_name_txt == "GMC" || policy_name_txt == "GPA" ||  policy_name_txt == "Personal Accident" || policy_name_txt == "Private Car" || policy_name_txt == "2 Wheeler" || policy_name_txt == "Commercial Vehicle") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
        } else if (policy_name_txt == "Shopkeeper") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
        } else if (policy_name_txt == "Jweller Block") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
        } else if (policy_name_txt == "Open Policy" || policy_name_txt == "Stop Policy" || policy_name_txt == "Specific Policy") {
            $("#risk_individual").hide();
            $("#risk_floater").hide();
            $("#risk_floater_add").hide();
            $("#risk_rc").hide();
        }

        if(policy_option == 1)
            $("#3_cover_div").hide();

    }

    var add_remark = 0;
    var add_hypotication = 0;
    var add_correspondence = 0;
    var add_risk_floater = 0;
    var counterArray = [];
    var mainRiskAddress = [];
    var mainRiskAddressDescription = [];
    var add_risk_desc = 0;

    function removeRisk_R_C(add_risk_RC) {
        removeRiskIDS = add_risk_RC.replace('"', '');
        var removeRiskIDS_new = removeRiskIDS.split("_");
        var ids = parseInt(removeRiskIDS_new[1]);
        var index = mainRiskRCDescription.indexOf(removeRiskIDS);
        $("#remove_risk_r_c_" + add_risk_RC).closest("tr").remove();
        mainRiskRCDescription.splice(index, 1);
        // mainRiskRCDescription.splice(ids, 1);
        total_sumAssured();
    }
    var mainRiskRC = [];
    var mainRiskRCDescription = [];

    function removeRisk_RC(add_risk_RC) {
        $("#div_" + add_risk_RC).remove();
        mainRiskRC.splice(mainRiskRC.indexOf(add_risk_RC), 1);

        if (mainRiskRC.length == 0) {
            add_risk_RC = 0;
            counterArray = [];
            mainRiskRC = [];
            mainRiskRCDescription = [];
            $("#addRisc_R_C").attr("onClick", "addRisc_R_C(" + add_risk_RC + ")");
        }
        total_sumAssured();
    }
    var count_rc = 0;

    function addRiskDesc_R_C(removeRiskIDS) {
        mainRiskRC = mainRiskRC;
        removeRiskIDS = removeRiskIDS.replace('"', '');
        var removeRiskIDS_new = removeRiskIDS.split("_");
        var tr_rc_description = "";
        count_rc = parseInt(removeRiskIDS_new[1]) + 1;

        removeRiskID = removeRiskIDS_new[0] + '_' + count_rc;
        mainRiskRCDescription.push(removeRiskID);
        $("#addRiskDesc_R_C_" + removeRiskIDS).attr("onClick", "addRiskDesc_R_C('" + removeRiskID + "')");
        $("#addRiskDesc_R_C_" + removeRiskIDS).attr("id", "addRiskDesc_R_C_" + removeRiskID);

        tr_rc_description += '<tr><td><input type="text" class="form-control description" id="description_' + removeRiskID + '" name="description[]" value=""></td><td><input type="number" class="form-control nos" id="nos_' + removeRiskID + '" name="nos[]" onkeyup=Get_total_sum_assured("' + removeRiskID + '") ></td><td><input type="number" class="form-control value" id="value_' + removeRiskID + '" name="value[]" onkeyup=Get_total_sum_assured("' + removeRiskID + '") ></td><td><input type="number" class="form-control sum_assured" id="sum_assured_' + removeRiskID + '" name="sum_assured[]" ></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_r_c_' + removeRiskID + '" onClick=removeRisk_R_C("' + removeRiskID + '") ></td></tr>';
        $("#append_rcDescription_" + removeRiskIDS_new[0]).append(tr_rc_description);
        total_sumAssured()
    }

    var actual_data_risk_RC = [];
    var actual_data_risk_desc_RC = [];

    function Get_total_sum_assured(removeRiskID) {
        var nos = $("#nos_" + removeRiskID).val();
        var value = $("#value_" + removeRiskID).val();
        nos = parseInt(nos);
        value = parseInt(value);
        if (isNaN(nos))
            nos = 0;
        else
            nos = nos;
        if (isNaN(value))
            value = 0;
        else
            value = value;

        var tot = parseInt(nos) * parseInt(value);
        // alert(tot)
        $("#sum_assured_" + removeRiskID).val(tot);
        total_sumAssured();
    }

    function total_sumAssured() {
        var tot_sum = 0;
        $.each(mainRiskRC, function(key, value) {
            $.each(mainRiskRCDescription, function(key_1, val_1) {
                var ids = val_1.split("_");
                if (value == ids[0]) {
                    // alert(removeRiskID);

                    var sum_assured = $("#sum_assured_" + val_1).val();
                    // alert(sum_assured);
                    sum_assured = parseInt(sum_assured);
                    if (isNaN(sum_assured))
                        sum_assured = 0;
                    else
                        sum_assured = sum_assured;

                    tot_sum = tot_sum + sum_assured;
                }
            });
        });

        $("#total_sum_assured").val(tot_sum);
        gst_apply();
        get_total_fire();
        get_total_discount();
        // alert(tot_sum);
    }

    function totalRisk_Rc() {
        actual_data_risk_RC = [];

        $.each(mainRiskRC, function(key, value) {
            var risk_address = $('#risk_address_' + value).val();
            var actual_data_risk_desc_RC = [];
            $.each(mainRiskRCDescription, function(key_1, val_1) {
                var ids = val_1.split("_");
                var val = val_1;
                var arra = val;
                if (value == ids[0]) {
                    var description = $('#description_' + val_1).val();
                    var nos = $("#nos_" + val_1).val();
                    var values_data = $('#value_' + val_1).val();
                    var sum_assured = $('#sum_assured_' + val_1).val();
                    actual_data_risk_desc_RC.push([val_1, description, nos, values_data, sum_assured]);
                }
            });
            actual_data_risk_RC.push([value, risk_address, actual_data_risk_desc_RC]);
        });
        // alert(actual_data_risk_RC)

        return actual_data_risk_RC;
    }
    var add_risk_RC = 0;

    function addRisc_R_C(add_risk_RC) {
        add_risk_2 = add_risk_RC + "_0";
        if (counterArray.length == 0) {
            add_risk_RC = 0;
            add_risk_2 = add_risk_RC + "_0";
        }
        var counter = 0;
        var tr_rc_description = "";
        var removeRiskIDS = "";
        var i = 0;
        add_risk_RC = parseInt(add_risk_RC);
        if (isNaN(add_risk_RC))
                add_risk_RC = 0;
            else
                add_risk_RC = add_risk_RC;
        // alert(add_risk_RC);

        var description_Array = ['On Plinth & Foundation', 'On Building – ', 'On Garages', 'On Lifts with its accesorries & wiring ', 'On Pump Room ', 'On Pumps & Other Accessories', 'On Pipes and Plum,bing work', 'On Electric Meter Room', 'On Electric Fittings, Wiring & Accessories', 'On Compound Wall with Iron Fencing ', 'On Gates', 'On Pavments', 'On Watchman Cabin', 'On Society Office Room + Office Equipments & FFFF', 'On Overhead Water Tanks', 'On Underground Water Tanks', 'On Borewells including their pumps Sets', 'On Water Pumps', 'On External and Interior Paint and Plaster of Bldg', 'On Club House Building including shade and interior work and fixtures', 'On Health Club Equipments', 'On Roof Top Solar panel', 'On CCTV System including Switches, Cameras, DVR, Cables etc', 'On Ommission to Insure', 'Additions, escalations , alterations , Extensions during the year', 'On Shops', 'Debris Removal', 'Architect Fees'];
        for (i; i <= 27; i++) {
            // mainRiskRCDescription.push([i]);
            removeRiskIDS = add_risk_RC + '_' + i;
            mainRiskRCDescription.push(removeRiskIDS);
            tr_rc_description += '<tr><td><input type="text" class="form-control" id="description_' + add_risk_RC + '_' + i + '" name="description[]" value="' + description_Array[i] + '"></td><td><input type="number" class="form-control" id="nos_' + add_risk_RC + '_' + i + '" name="nos[]"  onkeyup=Get_total_sum_assured("' + removeRiskIDS + '")></td><td><input type="number" class="form-control" id="value_' + add_risk_RC + '_' + i + '" name="value[]"  onkeyup=Get_total_sum_assured("' + removeRiskIDS + '")></td><td><input type="number" class="form-control" id="sum_assured_' + add_risk_RC + '_' + i + '" name="sum_assured[]" ></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_r_c_' + add_risk_RC + '_' + i + '" onClick=removeRisk_R_C("' + removeRiskIDS + '") ></td></tr>';
        }


        var tr_table = ' <div id="div_' + add_risk_RC + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (add_risk_RC + 1) + '</label> <div class="col-md-9"> <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + add_risk_RC + '" value="" placeholder="Risk Address ' + (add_risk_RC + 1) + '"></div><div class="col-md-1"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + add_risk_RC + '" onClick="removeRisk_RC(' + add_risk_RC + ')" > </div> </div></div><div   class="col-md-12"> <div  id="r_c_append_' + add_risk_RC + '" ><table  class="table mb-0 table-bordered" id="append_rcDescription_' + add_risk_RC + '"><tr><td>Description</td><td>Nos.</td><td>Value</td><td>Sum Insured</td><td>Action</td></tr>' + tr_rc_description + '</table><button class="btn btn-primary btn-sm dripicons-plus  mt-2" id="addRiskDesc_R_C_' + removeRiskIDS + '" onClick=addRiskDesc_R_C("' + removeRiskIDS + '") ></div></div></div></div>';
        $("#append_risk").append(tr_table);
        counterArray[add_risk_RC] = 0;
        mainRiskRC.push(add_risk_RC);
        var newArray = [0];
        // mainRiskRCDescription.push([add_risk_RC, newArray]);
        add_risk_RC = add_risk_RC + 1;
        $("#addRisc_R_C").attr("onClick", "addRisc_R_C(" + add_risk_RC + ")");
    }

    function removeRiskFloater(add_risk_floater) {
        $("#div_" + add_risk_floater).remove();
        // mainRiskAddress.splice(mainRiskAddress.indexOf(add_risk_floater), 1);
        get_total_sum_Assured();
    }

    function AddRiskFloater() {
        // alert(add_risk_floater);
        $("#AddRiskFloater").attr("onClick", "AddRiskFloater(" + add_risk_floater + ")");
        var tr_table = ' <div id="div_' + add_risk_floater + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (add_risk_floater + 1) + '</label> <div class="col-md-8"> <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + add_risk_floater + '" value="" placeholder="Risk Address ' + (add_risk_floater + 1) + '"></div><div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + add_risk_floater + '" onClick="removeRiskFloater(' + add_risk_floater + ')" > </div> </div></div></div>';
        $("#append_risk").append(tr_table);
        add_risk_floater = add_risk_floater + 1;
        get_total_sum_Assured();
    }
    // var AddRiskDetails_floater = 0;
    function removeRiskDetails_Floater(add_risk_desc) {
        // alert(add_risk_desc);
        $("#remove_risk_details_floater_" + add_risk_desc).closest("tr").remove();
        get_total_sum_Assured();
    }

    function AddRiskDetails_floater() {
        if (option_policyDescription_data == "") {
            var option_riskval = '<?php if (!empty($risk_description)) : foreach ($risk_description as $row) : ?><option value="<?php echo  $row["policy_description_id"]; ?>"><?php echo  ucwords($row["policy_description_name"]); ?></option><?php endforeach;
                                                                                                                                                                                                                                        endif; ?>';
        } else {
            var option_riskval = option_policyDescription_data;
        }
        // alert(add_risk_desc);
        $("#AddRiskDetails_floater").attr("onClick", "AddRiskDetails_floater(" + add_risk_desc + ")");
        var tr_table = ' <tr><td><select class="form-control risk_description" id="risk_description_' + add_risk_desc + '" name="risk_description[]"> <option value="null" >Select Description</option>' + option_riskval + '</select></td><td><input class="form-control risk_sum_assured" type="number" name="risk_sum_assured[]" id="risk_sum_assured_' + add_risk_desc + '" value="" placeholder="Risk Sum Assured" onkeyup="get_total_sum_Assured()"></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_floater_' + add_risk_desc + '" onClick=removeRiskDetails_Floater("' + add_risk_desc + '") ></td></tr>';
        $("#description_data").append(tr_table);
        add_risk_desc = add_risk_desc + 1;
    }

    function removeRisk(add_risk) {
        $("#div_" + add_risk).remove();
        mainRiskAddress.splice(mainRiskAddress.indexOf(add_risk), 1);
        if (mainRiskAddress.length == 0) {
            add_risk = 0;
            counterArray = [];
            mainRiskAddress = [];
            mainRiskAddressDescription = [];
            $("#AddRisk").attr("onClick", "AddRisk(" + add_risk + ")");
        }
        get_total_sum_Assured();
    }
    var add_risk = 0;
    var edit_risk;

    function AddRisk() {
        if (option_policyDescription_data == "") {
            var option_riskval = '<?php if (!empty($risk_description)) : foreach ($risk_description as $row) : ?><option value="<?php echo  $row["policy_description_id"]; ?>"><?php echo  ucwords($row["policy_description_name"]); ?></option><?php endforeach;
                                                                                                                                                                                                                                        endif; ?>';
        } else {
            var option_riskval = option_policyDescription_data;
        }

        add_risk_2 = add_risk + "_0";
        if (counterArray.length == 0) {
            add_risk = 0;
            add_risk_2 = add_risk + "_0";
        }
        var counter = 0;
        // alert(add_risk);

        $("#AddRisk").attr("onClick", "AddRisk(" + add_risk + ")");
        var tr_table = ' <div id="div_' + add_risk + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (add_risk + 1) + '</label> <div class="col-md-8"> <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + add_risk + '" value="" placeholder="Risk Address ' + (add_risk + 1) + '"></div><div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + add_risk + '" onClick="removeRisk(' + add_risk + ')" > </div> </div></div><div class="col-md-12"><button class="btn btn-primary btn-sm AddRiskDetails" id="AddRiskDetails" onClick=AddRiskDetails("' + add_risk_2 + '")>Add Risk</button> </div><div  id="details_append_' + add_risk + '"  class="col-md-12 form-group row" ><div id="description_' + add_risk + '_0" class="col-md-12 form-group row description"><div class="col-md-5"><div class="form-group row"> <label for="risk_description" class="col-form-label col-md-5 text-right">Description</label> <div class="col-md-7"><select class="form-control risk_description" id="risk_description_' + add_risk_2 + '" name="risk_description[]"> <option value="null" >Select Description</option>' + option_riskval + '</select></div> </div> </div> <div class="col-md-5"><div class="form-group row"> <label for="risk_sum_assured" class="col-form-label col-md-4 text-right">Sum Assured</label> <div class="col-md-8"><input class="form-control risk_sum_assured" type="number" name="risk_sum_assured[]" id="risk_sum_assured_' + add_risk_2 + '" value="" placeholder="Risk Sum Assured" onkeyup="get_total_sum_Assured()"></div> </div> </div> <div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_' + add_risk_2 + '" onClick="removeRiskDetails("' + add_risk_2 + '")" disabled></div> </div> </div></div>  </div></div>';
        $("#append_risk").append(tr_table);
        counterArray[add_risk] = 0;
        mainRiskAddress.push(add_risk);
        var newArray = [0];
        mainRiskAddressDescription.push([add_risk, newArray]);
        add_risk = add_risk + 1;
        get_total_sum_Assured();
    }

    function removeRiskDetails(add_risk_details) {
        $("#description_" + add_risk_details).remove();
        var splited_val = add_risk_details.split("_");
        var newArray = [];
        $.each(mainRiskAddressDescription, function(key, val) {
            var position0 = val[0];
            if (splited_val[0] == position0) {
                newArray = val[1];
                var indexValue = newArray.indexOf(parseInt(splited_val[1]));
                newArray.splice(indexValue, 1);
                mainRiskAddressDescription[key][1] = newArray;
                //mainRiskAddressDescription[key][1]=newArray;
            }
        });
        get_total_sum_Assured();
    }

    function AddRiskDetails(add_risk_details) {
        if (option_policyDescription_data == "") {
            var option_riskval = '<?php if (!empty($risk_description)) : foreach ($risk_description as $row) : ?><option value="<?php echo  $row["policy_description_id"]; ?>"><?php echo  ucwords($row["policy_description_name"]); ?></option><?php endforeach;
                                                                                                                                                                                                                                        endif; ?>';
        } else {
            var option_riskval = option_policyDescription_data;
        }
        // alert(add_risk_details);
        var counter = add_risk_details.split("_");
        var actual_counters = counterArray[counter[0]];
        var details = ++actual_counters;
        var tot_counter = counter[0] + "_" + details;

        // alert(tot_counter);
        // alert(details);
        var tr_table = '<div class="col-md-12 form-group row description"  id="description_' + tot_counter + '"><div class="col-md-5"><div class="form-group row"> <label for="risk_description" class="col-form-label col-md-5 text-right">Description</label> <div class="col-md-7"><select class="form-control risk_description" id="risk_description_' + tot_counter + '" name="risk_description[]"> <option value="null" >Select Description</option>' + option_riskval + '</select></div> </div> </div> <div class="col-md-5"><div class="form-group row"> <label for="risk_sum_assured" class="col-form-label col-md-4 text-right">Sum Assured</label> <div class="col-md-8"><input class="form-control risk_sum_assured" type="number" name="risk_sum_assured[]" id="risk_sum_assured_' + tot_counter + '" value="" placeholder="Risk Sum Assured" onkeyup="get_total_sum_Assured()"></div> </div> </div> <div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_' + tot_counter + '" onClick=removeRiskDetails("' + tot_counter + '") > </div></div></div>';
        $("#details_append_" + counter[0]).append(tr_table);
        counterArray[counter[0]] = actual_counters;
        var newArray = [];
        $.each(mainRiskAddressDescription, function(key, val) {
            var position0 = val[0];
            if (counter[0] == position0) {
                newArray = val[1];
                newArray.push(actual_counters);
                mainRiskAddressDescription[key][1] = newArray;
            }
        });
        get_total_sum_Assured();

    }

    var actual_data_risk = [];

    function TotalRisk() {
        actual_data_risk = [];

        $.each(mainRiskAddress, function(key, value) {
            var risk_address = $('#risk_address_' + value).val();
            var actual_data_risk_details = [];
            $.each(mainRiskAddressDescription, function(key_1, val_1) {
                var val = val_1[1];
                if (value == key_1) {
                    $.each(val, function(key_2, val_2) {
                        var index = key_1 + '_' + val_2;
                        var risk_description = $('#risk_description_' + key_1 + '_' + val_2).val();
                        var risk_description_txt = $("#risk_description_" + key_1 + '_' + val_2 + " option:selected").text();
                        var risk_sum_assured = $('#risk_sum_assured_' + key_1 + '_' + val_2).val();
                        actual_data_risk_details.push([index, risk_description, risk_sum_assured, risk_description_txt]);
                    });
                }

            });
            actual_data_risk.push([value, risk_address, actual_data_risk_details]);
        });
        // return false;
        return actual_data_risk;
    }
    var actual_data_risk_details = [];
    var final_floater_risk_details = [];

    function TotalRiskFloater() {
        final_floater_risk_details = [];
        actual_data_risk = [];
        $('.risk_address').each(function(index, value) {
            var risk_address = value.value;
            actual_data_risk.push([index, risk_address]);
        });
        if (actual_data_risk == "") {
            toaster(message_type = "Error", message_txt = "Please Enter First Risk Address.", message_icone = "error");
            return false;
        }
        actual_data_risk_details = [];
        $("tr:has(.risk_description)").each(function(index_1, value_1) {
            var risk_description = $(".risk_description", this).val();
            var risk_description_txt = $(".risk_description option:selected", this).text();
            var risk_sum_assured = $(".risk_sum_assured", this).val();
            actual_data_risk_details.push([risk_description, risk_sum_assured, risk_description_txt]);
            if (risk_description == 'null' || risk_description == '')
                actual_data_risk_details.splice(index_1, 1);
        });
        final_floater_risk_details.push([actual_data_risk, actual_data_risk_details]);
        // alert(final_floater_risk_details);
        return final_floater_risk_details;
    }

    getRemarkDetails(<?php echo $policy_id; ?>);

    function getRemarkDetails(policy_id) {

        $("#append_remark").empty();
        var url = "<?php echo $base_url; ?>master/policy/get_remarks_details";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    'policy_id': policy_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#append_remark").empty();
                    var remark_tr = '';

                    if (data["status"] == true) {
                        var remark = data["userdata"];
                        var add_remark = "";
                        var length = remark.length;
                        $.each(remark, function(key, val) {
                            add_remark = key;
                            var policy_remark_id = remark[key].policy_remark_id;
                            var remarks = remark[key].remarks;
                            var male_date = remark[key].male_date;
                            var remark_status = remark[key].remark_status;
                            var fk_policy_id = remark[key].fk_policy_id;
                            remark_tr += ' <tr><td style="border: 1px solid #dddddd;padding:10px;"><textarea rows="2" name="remarks[]" id="remarks_' + add_remark + '" value="" placeholder="Enter Remarks" class="form-control remarks">' + remarks + '</textarea></td><td style="border: 1px solid #dddddd;"><input type="date" name="male_date[]" id="male_date_' + add_remark + '" value="' + male_date + '" placeholder="Enter Mail Date" class="form-control male_date"></td> <td style="border: 1px solid #dddddd;"><input type="hidden" name="policy_remark_id[]" id="policy_remark_id_' + add_remark + '" value="' + policy_remark_id + '"  class="policy_remark_id"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_remark_' + add_remark + '" onClick="removeRemark(' + add_remark + ')" data-value="' + policy_remark_id + '" data-id="' + policy_remark_id + '"></button></td> </tr>';
                        });
                        $("#append_remark").append(remark_tr);
                        $("#AddRemark").attr("onClick", "AddRemark(" + (length - 1) + ")");
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }
    var deleteRemarkID_data = [];

    function removeRemark(add_remark) {
        var add_remark_val = $("#remove_remark_" + add_remark).data("value");
        deleteRemarkID(add_remark_val)
        $("#remove_remark_" + add_remark).closest("tr").remove();
    }

    function deleteRemarkID(add_remark_val) {
        deleteRemarkID_data.push([add_remark_val]);
        return deleteRemarkID_data;
    }

    function AddRemark(add_remark) {
        add_remark = add_remark + 1;

        $("#AddRemark").attr("onClick", "AddRemark(" + add_remark + ")");
        var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><textarea rows="2" name="remarks[]" id="remarks_' + add_remark + '" value="" placeholder="Enter Remarks" class="form-control remarks"></textarea></td> <td style = "border: 1px solid #dddddd;" > <input type = "date" name = "male_date[]" id = "male_date_' + add_remark + '"   value = "" placeholder = "Enter Mail Date" class = "form-control male_date" > </td> <td style = "border: 1px solid #dddddd;" > <button class = "btn btn-primary btn-sm dripicons-cross"  id = "remove_remark_' + add_remark + '" onClick = "removeRemark(' + add_remark + ')" > </button></td > < /tr>';
        $("#append_remark").append(tr_table);
    }

    function removeHypotication(add_hypotication) {
        $("#remove_hypotication_" + add_hypotication).closest("tr").remove();
    }

    function AddHypotication(add_hypotication) {
        add_hypotication = add_hypotication + 1;
        $("#AddHypotication").attr("onClick", "AddHypotication(" + add_hypotication + ")");
        var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="bank_name[]" id="bank_name_' + add_hypotication + '" value="" placeholder="Enter Bank Name" class="form-control bank_name"></td> <td style = "border: 1px solid #dddddd;" > <input type = "text" name = "branch_name[]" id = "branch_name_' + add_hypotication + '"   value = "" placeholder = "Enter Branch Name" class = "form-control branch_name" > </td> <td style = "border: 1px solid #dddddd;" > <button class = "btn btn-primary btn-sm dripicons-cross"  id = "remove_hypotication_' + add_hypotication + '" onClick = "removeHypotication(' + add_hypotication + ')" > </button></td > < /tr>';
        $("#append_hypotication").append(tr_table);
    }

    function removeCorrespondence(add_correspondence) {
        $("#remove_correspondence_" + add_correspondence).closest("tr").remove();
    }

    var option_data = "";
    var option_val_data = "";

    function AddCorrespondence(add_correspondence) {

        add_correspondence = add_correspondence + 1;
        // alert(option_val_data);
        $("#AddCorrespondence").attr("onClick", "AddCorrespondence(" + add_correspondence + ")");
        var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><select name="member_name[]" id="member_name_' + add_correspondence + '" class="form-control member_name" onchange="MemberNameBaseddetails(' + add_correspondence + ')"><option value="null">Select Member Names</option>' + option_val_data + ' </select><input type="hidden" name="member_name_txt[]" class="member_name_txt" id="member_name_txt_' + add_correspondence + '" value="" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_email[]" id="correspondence_email_' + add_correspondence + '" value="" placeholder="Enter Email Id" class="form-control correspondence_email"></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_whatsapp[]" id="correspondence_whatsapp_' + add_correspondence + '" value="" placeholder="Enter Whatsapp" class="form-control correspondence_whatsapp"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_telegram[]" id="correspondence_telegram_' + add_correspondence + '" value="" placeholder="Enter Telegram/Signal" class="form-control correspondence_telegram"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_cc[]" id="correspondence_cc_' + add_correspondence + '" value="" data-role="tagsinput" placeholder="Enter  CC" class="correspondence_cc form-control" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_bcc[]" id="correspondence_bcc_' + add_correspondence + '" value="" data-role="tagsinput" placeholder="Enter  Bcc" class="correspondence_bcc form-control" ></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_correspondence_' + add_correspondence + '" onClick="removeCorrespondence(' + add_correspondence + ')" ></button></center></td> < /tr>';
        $("#append_correspondence").append(tr_table);
        $('.correspondence_cc').tagsinput('refresh');
        $('.correspondence_bcc').tagsinput('refresh');
    }

    var actual_data_remarks = [];
    var actual_data_hypotication = [];
    var actual_data_correspondence = [];

    function TotalRemarks() {
        actual_data_remarks = [];
        $("tr:has(.remarks)").each(function(index, value) {
            var remarks = $(".remarks", this).val();
            var male_date = $(".male_date", this).val();
            var policy_remark_id = $(".policy_remark_id", this).val();
            actual_data_remarks.push([remarks, male_date, policy_remark_id]);
            if (remarks === 'null' || remarks === '')
                actual_data_remarks.splice(remarks, 1);
        });
        return actual_data_remarks;
    }

    function TotalHypotication() {
        actual_data_hypotication = [];
        $("tr:has(.bank_name)").each(function(index, value) {
            var bank_name = $(".bank_name", this).val();
            var branch_name = $(".branch_name", this).val();
            actual_data_hypotication.push([bank_name, branch_name]);
        });
        return actual_data_hypotication;
    }

    function TotalCorrespondence() {
        actual_data_correspondence = [];
        $("tr:has(.member_name)").each(function(index, value) {
            var member_name = $(".member_name", this).val();
            var member_name_txt = $(".member_name_txt", this).val();
            var correspondence_email = $(".correspondence_email", this).val();
            var correspondence_whatsapp = $(".correspondence_whatsapp", this).val();
            var correspondence_telegram = $(".correspondence_telegram", this).val();
            var correspondence_cc = $(".correspondence_cc", this).val();
            var correspondence_bcc = $(".correspondence_bcc", this).val();
            actual_data_correspondence.push([member_name, member_name_txt, correspondence_email, correspondence_whatsapp, correspondence_telegram, correspondence_cc, correspondence_bcc]);
        });
        return actual_data_correspondence;
    }

    function getPolicyCounter() {
        var serial_no_year = $("#serial_no_year").val();
        var serial_no_month = $("#serial_no_month").val();
        var url = "<?php echo $base_url; ?>master/policy/get_policy_counter";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    serial_no_year: serial_no_year,
                    serial_no_month: serial_no_month
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var data_details = data["userdata"];
                    var policy_counter = 0;
                    if (data_details == 0 || data_details == "") {
                        policy_counter = policy_counter + 1;
                    } else {
                        var policy_counter_new = data_details.policy_counter;
                        policy_counter = parseInt(policy_counter_new) + 1;
                    }
                    var actual_policy_counter = parseInt(policy_counter);

                    if (!isNaN(actual_policy_counter))
                        actual_policy_counter = actual_policy_counter;
                    else
                        actual_policy_counter = 0;
                    $('#policy_counter_no').val(actual_policy_counter);
                    if (actual_policy_counter.toString().length == 1) {
                        actual_policy_counter = "000" + actual_policy_counter;
                    } else if (actual_policy_counter.toString().length == 2) {
                        actual_policy_counter = "00" + actual_policy_counter;
                    } else if (actual_policy_counter.toString().length == 3) {
                        actual_policy_counter = "0" + actual_policy_counter;
                    }

                    $('#serial_no').val(actual_policy_counter);

                    if (actual_policy_counter != "")
                        document.getElementById("serial_no").disabled = true;

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    $(function() {
        $("#date_from").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayHighlight': true
        });
        $("#date_to").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayHighlight': true
        });
        $("#payment_date_from").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayHighlight': true
        });
        $("#payment_date_to").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayHighlight': true
        });
        $("#date_commenced").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayHighlight': true
        });
    });

    function addMonths(date, months) {
        var d = date.getDate();
        date.setMonth(date.getMonth() + +months);
        if (date.getDate() != d) {
            date.setDate(0);
        }
        // alert(date);
        return date;
    }

    function sub_day(date, days) {
        var d = date.getDate();
        date.setDate(date.getDate() - days); // minus the date
        return date;
    }

    function Todate_Basedon_Modeofpremium() {
        var months = "";
        var mode_of_premimum = $("#mode_of_premimum").val();
        var date_from = $("#date_from").val();
        if (mode_of_premimum != "") {
            if (mode_of_premimum == 1) //1: Monthly
                months = 1;
            else if (mode_of_premimum == 2) //2: Quaterly
                months = 3;
            else if (mode_of_premimum == 3) //3: Half-Yearly
                months = 6;
            else if (mode_of_premimum == 4) //4: Yearly
                months = 12;
            else if (mode_of_premimum == 5) //5: 2:Yearly
                months = 24;
            else if (mode_of_premimum == 6) //6: 3:Yearly
                months = 36;
            else if (mode_of_premimum == 7) //7: 4:Yearly
                months = 48;
            else if (mode_of_premimum == 8) //8: 5:Yearly
                months = 60;
            else if (mode_of_premimum == 9) //9: 6:Yearly
                months = 72;
            else if (mode_of_premimum == 10) //10: 7:Yearly
                months = 84;
            else if (mode_of_premimum == 11) //11: 8:Yearly
                months = 96;
            else if (mode_of_premimum == 12) //12: 9:Yearly
                months = 108;
            else if (mode_of_premimum == 13) //13: 10:Yearly
                months = 120;
        }
        // addMonths(date, months);
        var to_date = addMonths(new Date(), months).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the different locale
        // alert(to_date);
        to_date = new Date(to_date);
        var minus_day = to_date.setDate(to_date.getDate() - 1);
        var minus_day_date = new Date(minus_day).toLocaleDateString('en-CA');
        // alert(minus_day_date);
        $("#date_to").val(minus_day_date);

        if (date_from != "") {
            // $('#date_commenced').val(date_from);
            // $('#date_commenced').attr("disabled",true);
            payment_fromdate();
            payment_Fromedate_based_Todate(date_from, minus_day_date);
        }
        var org_date_to = $("#date_to").val();
        // payment_Todate(minus_day_date);
        payment_Todate(org_date_to);
    }

    function payment_Fromedate_based_Todate(date_from, to_date) {
        // $('#date_commenced').val(date_from);
        // $('#date_commenced').attr("disabled",true);
        // alert(date_from);
        // alert(to_date);
        $("#date_to").val("");
        if (date_from != "" || to_date != "") {
            var date = new Date(date_from),
                date_from_yr = date.getFullYear(),
                date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);

            var date2 = new Date(to_date),
                date_to_yr = date2.getFullYear(),
                date_to_month = ("0" + (date2.getMonth() + 1)).slice(-2);

            // alert(date2);
            // alert(date_to_yr);
            // alert(date_to_month);

            var mode_of_premimum = $("#mode_of_premimum").val();
            if (mode_of_premimum != "") {
                if (mode_of_premimum == 1) //1: Monthly
                    months = 1;
                else if (mode_of_premimum == 2) //2: Quaterly
                    months = 3;
                else if (mode_of_premimum == 3) //3: Half-Yearly
                    months = 6;
                else if (mode_of_premimum == 4) //4: Yearly
                    months = 12;
                else if (mode_of_premimum == 5) //5: 2:Yearly
                    months = 24;
                else if (mode_of_premimum == 6) //6: 3:Yearly
                    months = 36;
                else if (mode_of_premimum == 7) //7: 4:Yearly
                    months = 48;
                else if (mode_of_premimum == 8) //8: 5:Yearly
                    months = 60;
                else if (mode_of_premimum == 9) //9: 6:Yearly
                    months = 72;
                else if (mode_of_premimum == 10) //10: 7:Yearly
                    months = 84;
                else if (mode_of_premimum == 11) //11: 8:Yearly
                    months = 96;
                else if (mode_of_premimum == 12) //12: 9:Yearly
                    months = 108;
                else if (mode_of_premimum == 13) //13: 10:Yearly
                    months = 120;
            }

            var to_date = addMonths(new Date(date_from), months).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the different locale
            var toDate = sub_day(new Date(to_date), 1).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the
            $("#date_to").val(toDate);

        }
    }

    function payment_fromdate() {
        var date_from = $("#date_from").val();
        var date_to = $("#date_to").val();

        if (date_from != "") {
            // $('#date_commenced').val(date_from);
            // $('#date_commenced').attr("disabled",true);
            var date = new Date(date_from),
                date_from_yr = date.getFullYear(),
                date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);

            var mode_of_premimum = $("#mode_of_premimum").val();
            if (mode_of_premimum != "") {
                if (mode_of_premimum == 1) { //1: Monthly
                    months = 1;
                    date_from_yr = date.getFullYear();
                    date_from_month = parseInt(("0" + (date.getMonth() + 1)).slice(-2)) + parseInt(1);
                } else if (mode_of_premimum == 2) { //2: Quaterly
                    months = 3;
                    date_from_yr = date.getFullYear();
                    date_from_month = parseInt(("0" + (date.getMonth() + 1)).slice(-2)) + parseInt(3);
                } else if (mode_of_premimum == 3) { //3: Half-Yearly
                    months = 6;
                    date_from_yr = date.getFullYear();
                    date_from_month = parseInt(("0" + (date.getMonth() + 1)).slice(-2)) + parseInt(6);
                } else if (mode_of_premimum == 4) { //4: Yearly
                    months = 12;
                    date_from_yr = date.getFullYear() + 1;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 5) { //5: 2Yearly
                    months = 24;
                    date_from_yr = date.getFullYear() + 2;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 6) { //6: 3Yearly
                    months = 36;
                    date_from_yr = date.getFullYear() + 3;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 7) { //7: 4Yearly
                    months = 48;
                    date_from_yr = date.getFullYear() + 4;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 8) { //8: 5Yearly
                    months = 60;
                    date_from_yr = date.getFullYear() + 5;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 9) { //9: 6Yearly
                    months = 72;
                    date_from_yr = date.getFullYear() + 6;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 10) { //10: 7Yearly
                    months = 84;
                    date_from_yr = date.getFullYear() + 7;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 11) { //11: 8Yearly
                    months = 96;
                    date_from_yr = date.getFullYear() + 8;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 12) { //12: 9Yearly
                    months = 108;
                    date_from_yr = date.getFullYear() + 9;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                } else if (mode_of_premimum == 13) { //13: 10:Yearly
                    months = 120;
                    date_from_yr = date.getFullYear() + 10;
                    date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
                }
            }
            if (date_from_month > 12) {
                date_from_month = date_from_month - 12;
                if (date_from_month < 10) {
                    date_from_month = "0" + date_from_month;
                }
                date_from_yr = date_from_yr + 1;
            }
            // alert(date_from_month);
            // alert(date_from_yr);
            var date2 = new Date(date_to),
                date_to_yr = date2.getFullYear(),
                date_to_month = ("0" + (date2.getMonth() + 1)).slice(-2);


            var payment_date_from = sub_day(new Date(date_from), 5).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the different locale;
            $("#payment_date_from").val(payment_date_from);

            var org_dateto_day = sub_day(new Date(date_from), 1).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the
            // alert(org_dateto_day);
            var org = new Date(org_dateto_day),
                org_date_to_yr = org.getFullYear(),
                org_date_to_month = ("0" + (org.getMonth() + 1)).slice(-2);

            org_date_to_day = org.getDate();
            if (org_date_to_day < 10) {
                org_date_to_day = "0" + org_date_to_day;
            }
            newDate = date_from_yr + '-' + date_from_month + '-' + org_date_to_day;

            // alert(org_date_to_day);
            $("#date_to").val(newDate);
            // $("#date_to").val(org_dateto_day);
            // alert(org_dateto_day);
            var img_newDate = new Date(newDate);
            var lastDay = new Date(img_newDate.getFullYear(), img_newDate.getMonth() + 1, 0).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the ;
            var policy_name_txt = $("#policy_name option:selected").text();
            // alert(lastDay);
            if (policy_name_txt == "Specific Policy") {
                $("#period_of_insurance").text(date_from + " To " + lastDay);
            } else {
                $("#period_of_insurance").text(date_from + " To " + newDate);
            }
            // $("#period_of_insurance").text(date_from + " To " + lastDay);
            // alert(newDate);
            payment_Todate(newDate);
        }
    }

    function payment_Todate(toDate) {
        if (toDate != "") {
            // alert(toDate);
            if (toDate != "") {
                var payment_date_to = sub_day(new Date(toDate), 5).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the different locale;
                $("#payment_date_to").val(payment_date_to);
            }
        } else {
            var date_to = $("#date_to").val();
            // alert(date_to);

            if (date_to != "") {
                var payment_date_to = sub_day(new Date(date_to), 5).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the different locale;
                $("#payment_date_to").val(payment_date_to);
            }
        }

    }

    function Todate_Basedon_Modeofpremium_bak() {
        var mode_of_premimum = $("#mode_of_premimum").val();
        // var date_to = $("#date_to").val();
        var date_from = $("#date_from").val();

        var url = "<?php echo $base_url; ?>master/policy/get_mode_of_premimum_based_todate";

        if (date_to != "") {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                data: {
                    // date_to: date_to,
                    mode_of_premimum: mode_of_premimum,
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        if (date_from != "") {
                            var date_to = $("#date_to").val();
                            var date_time = Date.parse(date_from) / 1000;
                            var date = new Date(date_from);
                            var formate = new Date(date_from).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the different locale
                            // alert(formate);
                            var minus_day = date.setDate(date.getDate() - 1);
                            var minus_day_date = new Date(minus_day).toLocaleDateString('en-CA');
                            var day = new Date(minus_day_date),
                                year = day.getFullYear(),
                                months = ("0" + (day.getMonth() + 1)).slice(-2);
                            getDate = day.getDate();
                            // alert(getDate);
                            var todate = "";
                            var date_to_form = new Date(date_to),
                                year = date_to_form.getFullYear(),
                                months = ("0" + (date_to_form.getMonth() + 1)).slice(-2);


                            var org_date_backend = new Date(data["userdata"]),
                                org_year = org_date_backend.getFullYear(),
                                org_months = ("0" + (org_date_backend.getMonth() + 1)).slice(-2);
                            // alert(data["userdata"]);
                            var date_to_new = org_year + '-' + org_months + '-' + getDate;
                            // alert(date_to_new);
                            $("#date_to").val(date_to_new);
                            // $("#date_to").val(data["userdata"]);
                            // payment_Fromedate_based_Todate(date_from, todate = data["userdata"]);
                        } else {
                            $("#date_to").val(data["userdata"]);
                        }
                        // $("#date_to").val(data["userdata"]);
                        payment_Todate();
                    }
                },
                error: function(xhr, status) {
                    ~alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function payment_Fromedate_based_Todate_bak(date_from, todate) {
        var url = "<?php echo $base_url; ?>master/policy/payment_Fromedate_based_Todate";
        var date = new Date(todate),
            yr = date.getFullYear(),
            month = ("0" + (date.getMonth() + 1)).slice(-2);
        // month = date.getMonth() + 1;
        if (date_from != "") {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                data: {
                    date_from: date_from
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        newDate = yr + '-' + month + '-' + data["userdata"];
                        // var d = new Date(newDate);
                        // alert(d);
                        $("#date_to").val(newDate);
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function payment_fromdate_bak() {
        var date_from = $("#date_from").val();
        var date_from = $("#date_from").val();
        var date_to = $("#date_to").val();
        var date = new Date(date_to),
            yr = date.getFullYear(),
            month = ("0" + (date.getMonth() + 1)).slice(-2);
        // month = date.getMonth() + 1;

        // $("#date_commenced").val(date_from);
        $('#date_commenced').datepicker('setEndDate', date_from);

        var url = "<?php echo $base_url; ?>master/policy/get_payment_fromdate";

        if (date_from != "") {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                data: {
                    date_from: date_from
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        // alert(data["userdata"]);
                        // $("#payment_date_from").val(data["userdata"]);
                        $("#payment_date_from").val(data["userdata"]);
                        newDate = yr + '-' + month + '-' + data["to_date"];
                        // alert(newDate);
                        $("#period_of_insurance").text(date_from + " To " + newDate);
                        $("#date_to").val(newDate);
                    }
                },
                error: function(xhr, status) {
                    ~alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function payment_Todate_bak() {
        var date_to = $("#date_to").val();
        var url = "<?php echo $base_url; ?>master/policy/get_payment_todate";
        if (date_to != "") {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                data: {
                    date_to: date_to
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        // alert(data["userdata"]);
                        $("#payment_date_to").val(data["userdata"]);
                    }
                },
                error: function(xhr, status) {
                    ~alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    var option_depart_data = "";

    function company_department(option_department_val) {
        var company = $("#company").val();
        if (option_department_val != undefined) {
            //var option_val_data = "";
            $.each(option_department_val, function(key, val) {
                var department_id = option_department_val[key].department_id;
                var department_name = (option_department_val[key].department_name).charAt(0).toUpperCase() + (option_department_val[key].department_name).slice(1);
                option_depart_data += '<option value="' + department_id + '">' + department_name + '</option>';
            });
            $('#department').append(option_depart_data);
        } else {
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
    }

    function company_agency(option_agency_val) {
        var company = $("#company").val();
        if (option_agency_val != undefined) {
            var option_agency_data = "";
            $.each(option_agency_val, function(key, val) {
                var magency_id = option_agency_val[key].magency_id;
                var code = (option_agency_val[key].code).charAt(0).toUpperCase() + (option_agency_val[key].code).slice(1);
                option_agency_data += '<option value="' + magency_id + '">' + code + '</option>';
            });
            $('#agency_code').append(option_agency_data);
        } else {
            var url = "<?php echo $base_url; ?>master/policy/get_companybased_agency";

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
                            $('#agency_code').html("<option value='null'>Select Agency Code</option>");
                            var option_val = "";
                            for (var i = 0; i < val.length; i++) {
                                var magency_id = val[i]["magency_id"];
                                var code = val[i]["code"];
                                option_val += '<option value="' + magency_id + '">' + code + '</option>';
                            }
                        } else {
                            $('#agency_code').html("<option value='null'>Select Agency Code</option>");
                        }
                        $('#agency_code').append(option_val);
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {

                    }
                });
            }
        }
    }

    function OnDelete_Doc(policy_details) {
        var policy_details = policy_details.split(",");
        var policy_id = policy_details[0];
        var doc_type = policy_details[1];
        var doc_name = policy_details[2];
        var url = policy_details[3];
        // alert(policy_id);
        // alert(doc_type);
        // alert(doc_name);
        // alert(url);
        if(doc_type==1)
            var title = "Policy Upload Document";
        else if(doc_type==2)
            var title = "Quotation Upload Document";
        document_confirmation_alert(id = policy_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    getPOLICYDetails();

    function getPOLICYDetails() {
        var policy_id = "<?php echo $policy_id; ?>";
        // alert(mpolicy_id);
        var url = "<?php echo $base_url; ?>master/policy/editpolicy";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    'policy_id': policy_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    if (data["status"] == true) {
                        policy_id = parseInt(data["userdata"].policy_id);
                        if (data["userdata"].serial_no != "")
                            document.getElementById("serial_no").disabled = true;

                        var option_data_val = data["userdata"].member_data_arr;
                        GroupNameBasedMemberName(option_data_val);

                        var option_department_val = data["userdata"].department_data_arr;
                        company_department(option_department_val);

                        var option_policy_name_val = data["userdata"].policy_name_data_arr;
                        DepartmentBasedPolicyName(option_policy_name_val);

                        var option_agency_val = data["userdata"].agency_data_arr;
                        company_agency(option_agency_val);

                        // alert(data["userdata"].policy_type);

                        $("#serial_no").val(data["userdata"].serial_no);
                        // $("#company").val(data["userdata"].company_name);
                        // $("#department").val(data["userdata"].department_name);
                        // $("#policy_name").val(data["userdata"].policy_type_title);
                        $('select[id^="company"] option[value="' + data["userdata"].fk_company_id + '"]').attr("selected", "selected");
                        $('select[id^="department"] option[value="' + data["userdata"].fk_department_id + '"]').attr("selected", "selected");
                        $('select[id^="policy_name"] option[value="' + data["userdata"].fk_policy_type_id + '"]').attr("selected", "selected");
                        departmentBased_Policy_option();
                        // policyNameBased_Policy_option(data["userdata"].policy_type_title,policy_type_new=data["userdata"].policy_type);
                        // alert(data["userdata"].policy_type);
                        $('select[id^="policy_type"] option[value="' + data["userdata"].policy_type + '"]').attr("selected", "selected");
                        $('select[id^="agency_code"] option[value="' + data["userdata"].fk_agency_id + '"]').attr("selected", "selected");
                        $('select[id^="sub_agency_code"] option[value="' + data["userdata"].fk_sub_agent_id + '"]').attr("selected", "selected");
                        $('select[id^="group_name"] option[value="' + data["userdata"].fk_client_id + '"]').attr("selected", "selected");
                        $('select[id^="policy_holder_name"] option[value="' + data["userdata"].fk_cust_member_id + '"]').attr("selected", "selected");
                        $('select[id^="mode_of_premimum"] option[value="' + data["userdata"].mode_of_premimum + '"]').attr("selected", "selected");
                        $('select[id^="serial_no_year"] option[value="' + data["userdata"].serial_no_year + '"]').attr("selected", "selected");
                        $('select[id^="serial_no_month"] option[value="' + data["userdata"].serial_no_month + '"]').attr("selected", "selected");
                        $('select[id^="tpa_company"] option[value="' + data["userdata"].tpa_company + '"]').attr("selected", "selected");
                        // company_department();
                        // company_agency();
                        // DepartmentBasedPolicyName();
                        // alert(data["userdata"].policy_type);
                        // $("#policy_type").val(data["userdata"].policy_type);
                        Policy_typeName();
                        PolicyType_Risk(data["userdata"].policy_type);

                        // departmentBased_Policy_option();
                        // GroupNameBasedMemberName();
                        // alert(data["userdata"].fk_cust_member_id)
                        // if(data["userdata"].policy_type == 1)
                        //     var policy_type_tit = "Individual";
                        // else
                        //     var policy_type_tit = "Floater";
                        // $("#policy_type").val(policy_type_tit);

                        // $("#agency_code").val(data["userdata"].master_agency_code);
                        // $("#sub_agency_code").val(data["userdata"].sub_agent_code);
                        // $("#mode_of_premimum").val(data["userdata"].mode_of_premimum);
                        $("#date_from").val(data["userdata"].date_from);
                        var date_form = data["userdata"].date_from;
                        var date_to = data["userdata"].date_to;
                        $("#date_to").val(data["userdata"].date_to);
                        $("#payment_date_from").val(data["userdata"].payment_date_from);
                        $("#payment_date_to").val(data["userdata"].payment_date_to);
                        $("#policy_no").val(data["userdata"].policy_no);
                        var company_txt = $("#company option:selected").text();
                        // alert(company_txt);

                        if(data["userdata"].policy_type == 1){
                            if((company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#hdfc_ergo_health_insu_individual_policy_type_div").show();
                                // $("#hdfc_ergo_health_insu_individual_policy_type").val(floater_policy_type);
                                $('select[id^="hdfc_ergo_health_insu_individual_policy_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                            }else if(company_txt == "The New India Assurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#the_new_india_assur_indi_policy_type_div").show();
                                // $("#hdfc_ergo_health_insu_individual_policy_type").val(floater_policy_type);
                                $('select[id^="new_india_assur_indi_policy_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                            }else if(company_txt == "Max Bupa Health Insurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#max_bupa_health_insu_div").show();
                                // alert(data["userdata"].floater_policy_type)
                                $('select[id^="max_bupa_health_insu_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                            }else if(company_txt == "Star Health & Allied Insurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#star_health_allied_insu_div").show();
                                // alert(data["userdata"].floater_policy_type)
                                $('select[id^="star_health_allied_insu_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                            }else if(company_txt == "Care Health Insurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#care_health_insu_div").show();
                                // alert(data["userdata"].floater_policy_type)
                                $('select[id^="care_health_insu_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                            }
                        }
                        // alert(data["userdata"].policy_type);
                        if(data["userdata"].policy_type == 2){
                            if((company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#hdfc_ergo_health_insu_individual_policy_type").val(data["userdata"].floater_policy_type);
                                $("#hdfc_ergo_health_insu_family_size").val(data["userdata"].family_size);
                                $("#suraksha_float_hdfc_ergo_health_insu_family_size").val(data["userdata"].family_size);
                                $("#hdfc_ergo_health_insu_supertopup_float_family_size").val(data["userdata"].family_size);
                                $("#hdfc_ergo_health_insu_addition_of_more_child").val(data["userdata"].addition_of_more_child);
                            }else if(company_txt == "The New India Assurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#the_new_india_assur_indi_policy_type_div").show();
                                $('select[id^="new_india_assur_indi_policy_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                            }else if(company_txt == "Max Bupa Health Insurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#max_bupa_health_insu_div").show();
                                $('select[id^="max_bupa_health_insu_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                                $("#max_bupa_health_insu_medi_reassure_float_family_size").val(data["userdata"].family_size);
                            }else if(company_txt == "Star Health & Allied Insurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#star_health_allied_insu_div").show();
                                $('select[id^="star_health_allied_insu_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                                $("#star_health_allied_insu_red_carpet_float_family_size").val(data["userdata"].family_size);
                                $("#star_health_allied_insu_comprehensive_float_family_size").val(data["userdata"].family_size);
                                $("#star_health_allied_insu_supertopup_float_family_size").val(data["userdata"].family_size);
                            }else if(company_txt == "Care Health Insurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#care_health_insu_div").show();
                                $('select[id^="care_health_insu_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                                $("#care_health_insu_type").val(data["userdata"].floater_policy_type);
                                $("#care_health_insu_care_advantage_float_family_size").val(data["userdata"].family_size);
                                $("#care_health_insu_care_float_family_size").val(data["userdata"].family_size);
                            }else if (company_txt == "United India Insurance Co Ltd" && data["userdata"].policy_type_title == "Mediclaim"){
                                $("#floater_policy_type").val(data["userdata"].floater_policy_type);
                                $("#restore_cover").val(data["userdata"].restore_cover);
                                $("#maternity_new_born_baby_cover").val(data["userdata"].maternity_new_born_baby_cover);
                                $("#daily_cash_allowance_cover").val(data["userdata"].daily_cash_allowance_cover);
                                Floater_policy_type(data["userdata"].floater_policy_type);
                            }
                        }else if(data["userdata"].policy_type == 1){
                            // alert(data["userdata"].floater_policy_type);
                            // $("#individual_policy_type").val(data["userdata"].floater_policy_type);
                            $('select[id^="individual_policy_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                            Individual_policy_type();
                        }else if(data["userdata"].policy_type == 4){
                            // alert(data["userdata"].policy_type);
                            $('select[id^="policy_type"] option[value="' + data["userdata"].policy_type + '"]').attr("selected", "selected");
                        }

                        // if ((data["userdata"].policy_type_title == "Mediclaim" || data["userdata"].policy_type_title == "Personal Accident" || data["userdata"].policy_type_title == "GMC" || data["userdata"].policy_type_title == "GPA")){
                        if ((data["userdata"].policy_type_title == "Mediclaim" || data["userdata"].policy_type_title == "Personal Accident" || data["userdata"].policy_type_title == "Cancer Plan" || data["userdata"].policy_type_title == "Daily Cash" || data["userdata"].policy_type_title == "Overseas Mediclaim" || data["userdata"].policy_type_title == "Student Overseas Mediclaim" || data["userdata"].policy_type_title == "Employment Overseas Mediclaim")){
                            // alert(data["userdata"].policy_type);(data["userdata"].policy_type_title == "Mediclaim" || data["userdata"].policy_type_title == "Personal Accident" || data["userdata"].policy_type_title == "Cancer Plan" || data["userdata"].policy_type_title == "Daily Cash" || data["userdata"].policy_type_title == "Overseas Mediclaim" || data["userdata"].policy_type_title == "Student Overseas Mediclaim" || data["userdata"].policy_type_title == "Employment Overseas Mediclaim")
                            // alert(data["userdata"].policy_type);
                            if(data["userdata"].policy_type == 4 || data["userdata"].policy_type == 5){
                                // policyNameBased_Policy_option(data["userdata"].policy_type_title,policy_type_new=data["userdata"].policy_type);
                            }else{
                                policyNameBased_Policy_option(data["userdata"].policy_type_title,policy_type_new=data["userdata"].policy_type);
                            }
                            
                        }

                        if(data["userdata"].policy_type == 4 || data["userdata"].policy_type == 5 || data["userdata"].policy_type == 3){
                            // alert(data["userdata"].policy_type);
                            $('select[id^="policy_type"] option[value="' + data["userdata"].policy_type + '"]').attr("selected", "selected");
                        }
                        // $("#group_name").val(data["userdata"].grpname);
                        // $("#policy_holder_name").val(data["userdata"].member_name);

                        $("#date_commenced").val(data["userdata"].date_commenced);
                        $('#date_commenced').attr("disabled",true);
                        $("#policy_upload_hidden").val(data["userdata"].policy_upload);
                        
                        if (data["userdata"].policy_upload == "") {
                            var view_policy_upload = "";
                            var download_policy_upload = "";
                            var delete_policy_upload = "";
                        } else if (data["userdata"].policy_upload != "") {
                            // var policy_doc_delete = OnDelete_Doc(data["userdata"].policy_id+","+1+","+data["userdata"].policy_upload+","+'<?php echo base_url(); ?>master/policy/delete_doc/'+","+"Policy Upload Document");
                            var view_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/1/" + data["userdata"].policy_id + "'  class='text-info'  target='_blank'><b>View</b></a>";
                            var download_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/1/" + data["userdata"].policy_id + "'  class='text-success'><b>Download</b></a>";
                            var delete_policy_upload = "<a onclick=OnDelete_Doc('"+data["userdata"].policy_id+','+1+','+data["userdata"].policy_upload+','+'<?php echo base_url(); ?>master/policy/delete_doc'+"') href='#'  class='text-danger'><b>Remove</b></a>";
                        }
                        // <?php //echo base_url(); ?>master/policy/download_doc/1/" + data["userdata"].policy_id + "/
                        $("#upload_details").html(view_policy_upload + "  " + download_policy_upload + "  " + delete_policy_upload);
                        // alert(data["userdata"].quotation_upload);
                        $("#quotation_upload_hidden").val(data["userdata"].quotation_upload);
                        $("#quotation_date").val(data["userdata"].quotation_date);
                        $("#quotation_male_link").val(data["userdata"].quotation_male_link);
                        if (data["userdata"].quotation_upload == "" || data["userdata"].quotation_upload == null || data["userdata"].quotation_upload == undefined) {
                            var view_quotation_upload = "";
                            var download_quotation_upload = "";
                            var delete_quotation_upload = "";
                        } else if (data["userdata"].quotation_upload != "") {
                            var view_quotation_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/2/" + data["userdata"].policy_id +"/"+data["userdata"].quotation_upload+ "'  class='text-info'  target='_blank'><b>View</b></a>";
                            var download_quotation_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/2/" + data["userdata"].policy_id +"/"+data["userdata"].quotation_upload+ "'  class='text-success'><b>Download</b></a>";
                            var delete_quotation_upload = "<a onclick=OnDelete_Doc('"+data["userdata"].policy_id+','+2+','+data["userdata"].quotation_upload+','+'<?php echo base_url(); ?>master/policy/delete_doc'+"') href='#' class='text-danger'><b>Remove</b></a>";
                        }
                        $("#quotation_upload_details").html(view_quotation_upload + "  " + download_quotation_upload + "  " + delete_quotation_upload);

                        $("#reg_mobile").val(data["userdata"].reg_mobile);
                        $("#reg_email").val(data["userdata"].reg_email);
                        $("#policy_id").val(data["userdata"].policy_id);
                        $("#policy_counter_no").val(data["userdata"].policy_counter);

                        $("#riv").val(data["userdata"].riv);
                        $("#type_of_bussiness").val(data["userdata"].type_of_bussiness);
                        $("#description_of_stock").val(data["userdata"].description_of_stock);

                        if(data["userdata"].policy_type ==2 && data["userdata"].policy_type_title=="Mediclaim"){
                            $("#family_size").val(data["userdata"].family_size);
                            $("#addition_of_more_child").val(data["userdata"].addition_of_more_child);
                        }

                        var del_flag = data["userdata"].del_flag;
                        var policy_member_status = data["userdata"].policy_member_status;
                        var hypotication_details = JSON.parse(data["userdata"].hypotication_details);
                        var correspondence_details = JSON.parse(data["userdata"].correspondence_details);
                        var hypotication_tr = "";
                        var correspondence_tr = "";
                        var add_correspondence = "";
                        var length = hypotication_details.length;
                        var correspondence_details_length = correspondence_details.length;
                        $.each(hypotication_details, function(key, val) {
                            add_hypotication = key;
                            var bank_name = hypotication_details[key][0];
                            var branch_name = hypotication_details[key][1];
                            hypotication_tr += ' <tr><td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="bank_name[]" id="bank_name_' + add_hypotication + '" value="' + bank_name + '" placeholder="Enter Bank Name" class="form-control bank_name"></td> <td style = "border: 1px solid #dddddd;"> <input type = "text"  name = "branch_name[]" id = "branch_name_' + add_hypotication + '" value = "' + branch_name + '" placeholder = "Enter Branch Name" class = "form-control branch_name"> </td> <td style = "border: 1px solid #dddddd;" > <button class = "btn btn-primary btn-sm dripicons-cross" id ="remove_hypotication_' + add_hypotication + '" onClick = "removeHypotication(' + add_hypotication + ')"  > </button></td > < /tr>';
                        });
                        $("#append_hypotication").append(hypotication_tr);

                        $("#AddHypotication").attr("onClick", "AddHypotication(" + (length - 1) + ")");
                        var member_name = "";
                        $.each(correspondence_details, function(key1, val1) {
                            add_correspondence = key1;
                            member_name = correspondence_details[key1][0];
                            var member_name_txt = correspondence_details[key1][1];
                            var correspondence_email = correspondence_details[key1][2];
                            var correspondence_whatsapp = correspondence_details[key1][3];
                            var correspondence_telegram = correspondence_details[key1][4];
                            var correspondence_cc = correspondence_details[key1][5];
                            var correspondence_bcc = correspondence_details[key1][6];
                            // <php //$members = members_dropdown(); if (!empty($members)) : foreach ($members as $row8) : ?><option value="<php //echo $row8['id']; ?>" ><php //echo $row8['name']; ></option><php //endforeach; endif; >

                            correspondence_tr += '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><select name="member_name[]" id="member_name_' + add_correspondence + '" class="form-control member_name" onchange="MemberNameBaseddetails(' + add_correspondence + ')"><option value="null">Select Member Names</option>' + option_val_data + '</select><input type="hidden" name="member_name_txt[]" class="member_name_txt" id="member_name_txt_' + add_correspondence + '" value="' + member_name_txt + '" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_email[]" id="correspondence_email_' + add_correspondence + '" value="' + correspondence_email + '" placeholder="Enter Email Id" class="form-control correspondence_email"></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_whatsapp[]" id="correspondence_whatsapp_' + add_correspondence + '" value="' + correspondence_whatsapp + '" placeholder="Enter Whatsapp" class="form-control correspondence_whatsapp"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_telegram[]" id="correspondence_telegram_' + add_correspondence + '" value="' + correspondence_telegram + '" placeholder="Enter Telegram/Signal" class="form-control correspondence_telegram"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_cc[]" id="correspondence_cc_' + add_correspondence + '" value="' + correspondence_cc + '" data-role="tagsinput" placeholder="Enter  CC" class="correspondence_cc form-control" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_bcc[]" id="correspondence_bcc_' + add_correspondence + '" value="' + correspondence_bcc + '" data-role="tagsinput" placeholder="Enter  Bcc" class="correspondence_bcc form-control" ></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_correspondence_' + add_correspondence + '" onClick="removeCorrespondence(' + add_correspondence + ')" ></button></center></td> < /tr>';
                        });
                        $("#append_correspondence").append(correspondence_tr);
                        $("#AddCorrespondence").attr("onClick", "AddCorrespondence(" + (correspondence_details_length - 1) + ")");
                        $.each(correspondence_details, function(key1, val1) {
                            add_correspondence = key1;
                            member_name = correspondence_details[key1][0];
                            $('#member_name_' + add_correspondence).val(member_name);
                        });
                        // alert(data["userdata"].risk_details);
                        // if (data["userdata"].risk_details == undefined || data["userdata"].risk_details == null)
                        //     var risk_details = "";
                        // else if (data["userdata"].risk_details != undefined)
                        //     var risk_details = JSON.parse(data["userdata"].risk_details);

                        if (data["userdata"].risk_details == null)
                            var risk_details = [];
                        else
                            var risk_details = JSON.parse(data["userdata"].risk_details);
                        edit_Risk_details(risk_details, type = data["userdata"].policy_type);
                        
                        if (data["userdata"].total_paymentacknowledge_data == null)
                            var total_paymentacknowledge_data = [];
                        else
                            var total_paymentacknowledge_data = JSON.parse(data["userdata"].total_paymentacknowledge_data);
                        edit_Payment_Acknowledge_details(total_paymentacknowledge_data);
                        showRIV_FIRESHOPKEEPER();
                        show_Type_ofBuss_StockDesc_FIRESHOPKEEPER();
                        // policyNameBased_Policy_option();
                        // $('select[id^="policy_type"] option[value="' + data["userdata"].policy_type + '"]').attr("selected", "selected");
                        // alert(risk_details);
                        // alert(risk_details_length);
                        // alert(data["userdata"].policy_type);
                        if (data["userdata"].policy_type_title == "Bharat Sookshma Udyam") {
                            if (data["userdata"].policy_type != 3) {
                                var sookshma_fire_policy_id = data["userdata"].sookshma_fire_policy_id;
                                var total_sum_assured = data["userdata"].total_sum_assured;
                                var fire_rate_per = data["userdata"].fire_rate_per;
                                var fire_rate_tot_amount = data["userdata"].fire_rate_tot_amount;
                                var less_discount_per = data["userdata"].less_discount_per;
                                var less_discount_tot_amount = data["userdata"].less_discount_tot_amount;
                                var fire_rate_after_discount = data["userdata"].fire_rate_after_discount;
                                var gross_premium = data["userdata"].gross_premium;
                                var cgst_rate_per = data["userdata"].cgst_rate_per;
                                var cgst_tot_amount = data["userdata"].cgst_tot_amount;
                                var sgst_rate_per = data["userdata"].sgst_rate_per;
                                var sgst_tot_amount = data["userdata"].sgst_tot_amount;
                                var final_payable_premium = data["userdata"].final_payable_premium;
                                var sookshma_fire_policy_status = data["userdata"].sookshma_fire_policy_status;
                                $("#total_sum_assured").val(total_sum_assured);
                                $("#fire_rate_per").val(fire_rate_per);
                                $("#fire_rate_tot").val(fire_rate_tot_amount);
                                $("#less_discount_per").val(less_discount_per);
                                $("#less_discount_tot").val(less_discount_tot_amount);
                                $("#fire_rate_after_discount_tot").val(fire_rate_after_discount);
                                $("#gross_premium").val(gross_premium);
                                $("#cgst_fire_per").val(cgst_rate_per);
                                $("#cgst_fire_tot").val(cgst_tot_amount);
                                $("#sgst_fire_per").val(sgst_rate_per);
                                $("#sgst_fire_tot").val(sgst_tot_amount);
                                $("#final_paybal_premium").val(final_payable_premium);
                                $("#sookshma_fire_policy_id").val(sookshma_fire_policy_id);
                            }
                        } else if (data["userdata"].policy_type_title == "Bharat Laghu Udyam") {
                            if (data["userdata"].policy_type != 3) {
                                var laghu_fire_policy_id = data["userdata"].laghu_fire_policy_id;
                                var laghu_total_sum_assured = data["userdata"].laghu_total_sum_assured;
                                var laghu_fire_rate_per = data["userdata"].laghu_fire_rate_per;
                                var laghu_fire_rate_tot_amount = data["userdata"].laghu_fire_rate_tot_amount;
                                var laghu_less_discount_per = data["userdata"].laghu_less_discount_per;
                                var laghu_less_discount_tot_amount = data["userdata"].laghu_less_discount_tot_amount;
                                var laghu_fire_rate_after_discount = data["userdata"].laghu_fire_rate_after_discount;
                                var laghu_gross_premium = data["userdata"].laghu_gross_premium;
                                var laghu_cgst_rate_per = data["userdata"].laghu_cgst_rate_per;
                                var laghu_cgst_tot_amount = data["userdata"].laghu_cgst_tot_amount;
                                var laghu_sgst_rate_per = data["userdata"].laghu_sgst_rate_per;
                                var laghu_sgst_tot_amount = data["userdata"].laghu_sgst_tot_amount;
                                var laghu_final_payable_premium = data["userdata"].laghu_final_payable_premium;
                                var laghu_fire_policy_status = data["userdata"].laghu_fire_policy_status;
                                $("#total_sum_assured").val(laghu_total_sum_assured);
                                $("#fire_rate_per").val(laghu_fire_rate_per);
                                $("#fire_rate_tot").val(laghu_fire_rate_tot_amount);
                                $("#less_discount_per").val(laghu_less_discount_per);
                                $("#less_discount_tot").val(laghu_less_discount_tot_amount);
                                $("#fire_rate_after_discount_tot").val(laghu_fire_rate_after_discount);
                                $("#gross_premium").val(laghu_gross_premium);
                                $("#cgst_fire_per").val(laghu_cgst_rate_per);
                                $("#cgst_fire_tot").val(laghu_cgst_tot_amount);
                                $("#sgst_fire_per").val(laghu_sgst_rate_per);
                                $("#sgst_fire_tot").val(laghu_sgst_tot_amount);
                                $("#final_paybal_premium").val(laghu_final_payable_premium);
                                $("#laghu_fire_policy_id").val(laghu_fire_policy_id);
                            }
                        } else if (data["userdata"].policy_type_title == "Bharat Griha Raksha") {
                            if (data["userdata"].policy_type != 3) {
                                var griharaksha_fire_policy_id = data["userdata"].griharaksha_fire_policy_id;
                                var griharaksha_total_sum_assured = data["userdata"].griharaksha_total_sum_assured;
                                var griharaksha_fire_rate_per = data["userdata"].griharaksha_fire_rate_per;
                                var griharaksha_fire_rate_tot_amount = data["userdata"].griharaksha_fire_rate_tot_amount;
                                var griharaksha_less_discount_per = data["userdata"].griharaksha_less_discount_per;
                                var griharaksha_less_discount_tot_amount = data["userdata"].griharaksha_less_discount_tot_amount;
                                var griharaksha_fire_rate_after_discount = data["userdata"].griharaksha_fire_rate_after_discount;
                                var griharaksha_gross_premium = data["userdata"].griharaksha_gross_premium;
                                var griharaksha_cgst_rate_per = data["userdata"].griharaksha_cgst_rate_per;
                                var griharaksha_cgst_tot_amount = data["userdata"].griharaksha_cgst_tot_amount;
                                var griharaksha_sgst_rate_per = data["userdata"].griharaksha_sgst_rate_per;
                                var griharaksha_sgst_tot_amount = data["userdata"].griharaksha_sgst_tot_amount;
                                var griharaksha_final_payable_premium = data["userdata"].griharaksha_final_payable_premium;
                                var griharaksha_fire_policy_status = data["userdata"].griharaksha_fire_policy_status;
                                $("#total_sum_assured").val(griharaksha_total_sum_assured);
                                $("#fire_rate_per").val(griharaksha_fire_rate_per);
                                $("#fire_rate_tot").val(griharaksha_fire_rate_tot_amount);
                                $("#less_discount_per").val(griharaksha_less_discount_per);
                                $("#less_discount_tot").val(griharaksha_less_discount_tot_amount);
                                $("#fire_rate_after_discount_tot").val(griharaksha_fire_rate_after_discount);
                                $("#gross_premium").val(griharaksha_gross_premium);
                                $("#cgst_fire_per").val(griharaksha_cgst_rate_per);
                                $("#cgst_fire_tot").val(griharaksha_cgst_tot_amount);
                                $("#sgst_fire_per").val(griharaksha_sgst_rate_per);
                                $("#sgst_fire_tot").val(griharaksha_sgst_tot_amount);
                                $("#final_paybal_premium").val(griharaksha_final_payable_premium);
                                $("#griharaksha_fire_policy_id").val(griharaksha_fire_policy_id);
                            }
                        } else if (data["userdata"].policy_type_title == "Standard Fire & Allied Perils") {
                            if (data["userdata"].policy_type != 3) {
                                var fire_allied_perils_policy_id = data["userdata"].fire_allied_perils_policy_id;
                                var allied_perils_total_sum_assured = data["userdata"].allied_perils_total_sum_assured;
                                var allied_perils_fire_rate_per = data["userdata"].allied_perils_fire_rate_per;
                                var allied_perils_fire_rate_tot_amount = data["userdata"].allied_perils_fire_rate_tot_amount;
                                var allied_perils_less_discount_per = data["userdata"].allied_perils_less_discount_per;
                                var allied_perils_less_discount_tot_amount = data["userdata"].allied_perils_less_discount_tot_amount;
                                var allied_perils_fire_rate_after_discount = data["userdata"].allied_perils_fire_rate_after_discount;

                                var allied_perils_stfi_rate = data["userdata"].allied_perils_stfi_rate;
                                var allied_perils_stfi_rate_total = data["userdata"].allied_perils_stfi_rate_total;
                                var allied_perils_earthquake_rate = data["userdata"].allied_perils_earthquake_rate;
                                var allied_perils_earthquake_rate_total = data["userdata"].allied_perils_earthquake_rate_total;
                                var allied_perils_terrorisum_rate = data["userdata"].allied_perils_terrorisum_rate;
                                var allied_perils_terrorisum_rate_total = data["userdata"].allied_perils_terrorisum_rate_total;
                                var tot_sum_devid = data["userdata"].tot_sum_devid;

                                var allied_perils_gross_premium = data["userdata"].allied_perils_gross_premium;
                                var allied_perils_cgst_rate_per = data["userdata"].allied_perils_cgst_rate_per;
                                var allied_perils_cgst_tot_amount = data["userdata"].allied_perils_cgst_tot_amount;
                                var allied_perils_sgst_rate_per = data["userdata"].allied_perils_sgst_rate_per;
                                var allied_perils_sgst_tot_amount = data["userdata"].allied_perils_sgst_tot_amount;
                                var allied_perils_final_payable_premium = data["userdata"].allied_perils_final_payable_premium;
                                var fire_allied_perils_policy_status = data["userdata"].fire_allied_perils_policy_status;
                                $("#total_sum_assured").val(allied_perils_total_sum_assured);
                                $("#fire_rate_per").val(allied_perils_fire_rate_per);
                                $("#fire_rate_tot").val(allied_perils_fire_rate_tot_amount);
                                $("#less_discount_per").val(allied_perils_less_discount_per);
                                $("#less_discount_tot").val(allied_perils_less_discount_tot_amount);
                                $("#fire_rate_after_discount_tot").val(allied_perils_fire_rate_after_discount);

                                $("#stfi_rate_per").val(allied_perils_stfi_rate);
                                $("#stfi_rate_total").val(allied_perils_stfi_rate_total);
                                $("#earthquake_rate_per").val(allied_perils_earthquake_rate);
                                $("#earthquake_rate_total").val(allied_perils_earthquake_rate_total);
                                $("#terrorisum_rate_per").val(allied_perils_terrorisum_rate);
                                $("#terrorisum_rate_total").val(allied_perils_terrorisum_rate_total);
                                $("#tot_sum_devid").val(tot_sum_devid);

                                $("#gross_premium").val(allied_perils_gross_premium);
                                $("#cgst_fire_per").val(allied_perils_cgst_rate_per);
                                $("#cgst_fire_tot").val(allied_perils_cgst_tot_amount);
                                $("#sgst_fire_per").val(allied_perils_sgst_rate_per);
                                $("#sgst_fire_tot").val(allied_perils_sgst_tot_amount);
                                $("#final_paybal_premium").val(allied_perils_final_payable_premium);
                                $("#fire_allied_perils_policy_id").val(fire_allied_perils_policy_id);
                            }
                        } else if (data["userdata"].policy_type_title == "Burglary") {
                            if (data["userdata"].policy_type != 3) {
                                var burglary_policy_id = data["userdata"].burglary_policy_id;
                                var burglary_total_sum_assured = data["userdata"].burglary_total_sum_assured;
                                var burglary_fire_rate_per = data["userdata"].burglary_fire_rate_per;
                                var burglary_fire_rate_tot_amount = data["userdata"].burglary_fire_rate_tot_amount;
                                var burglary_less_discount_per = data["userdata"].burglary_less_discount_per;
                                var burglary_less_discount_tot_amount = data["userdata"].burglary_less_discount_tot_amount;
                                var burglary_fire_rate_after_discount = data["userdata"].burglary_fire_rate_after_discount;
                                var burglary_gross_premium = data["userdata"].burglary_gross_premium;
                                var burglary_cgst_rate_per = data["userdata"].burglary_cgst_rate_per;
                                var burglary_cgst_tot_amount = data["userdata"].burglary_cgst_tot_amount;
                                var burglary_sgst_rate_per = data["userdata"].burglary_sgst_rate_per;
                                var burglary_sgst_tot_amount = data["userdata"].burglary_sgst_tot_amount;
                                var burglary_final_payable_premium = data["userdata"].burglary_final_payable_premium;
                                var burglary_policy_status = data["userdata"].burglary_policy_status;
                                $("#total_sum_assured").val(burglary_total_sum_assured);
                                $("#fire_rate_per").val(burglary_fire_rate_per);
                                $("#fire_rate_tot").val(burglary_fire_rate_tot_amount);
                                $("#less_discount_per").val(burglary_less_discount_per);
                                $("#less_discount_tot").val(burglary_less_discount_tot_amount);
                                $("#fire_rate_after_discount_tot").val(burglary_fire_rate_after_discount);
                                $("#gross_premium").val(burglary_gross_premium);
                                $("#cgst_fire_per").val(burglary_cgst_rate_per);
                                $("#cgst_fire_tot").val(burglary_cgst_tot_amount);
                                $("#sgst_fire_per").val(burglary_sgst_rate_per);
                                $("#sgst_fire_tot").val(burglary_sgst_tot_amount);
                                $("#final_paybal_premium").val(burglary_final_payable_premium);
                                $("#burglary_policy_id").val(burglary_policy_id);
                            }
                        } else if (data["userdata"].policy_type_title == "Term Plan") {
                            if (data["userdata"].policy_type != 3) {
                                var term_plan_policy_data_arr = data["userdata"].term_plan_policy_data_arr;

                                $.each(term_plan_policy_data_arr, function(key_other, val_other) {
                                    var term_plan_policy_id = term_plan_policy_data_arr.term_plan_policy_id;
                                    var term_plan_fk_policy_id = term_plan_policy_data_arr.term_plan_fk_policy_id;
                                    var fk_policy_type_id = term_plan_policy_data_arr.fk_policy_type_id;
                                    var term_plan_policy = term_plan_policy_data_arr.term_plan_policy;
                                    var term_plan_premium_paying_term = term_plan_policy_data_arr.term_plan_premium_paying_term;
                                    var term_plan_total_sum_insured = term_plan_policy_data_arr.term_plan_total_sum_insured;
                                    var term_plan_basic_premium = term_plan_policy_data_arr.term_plan_basic_premium;
                                    var term_plan_add_loading = term_plan_policy_data_arr.term_plan_add_loading;
                                    var term_plan_loading_description = term_plan_policy_data_arr.term_plan_loading_description;
                                    var term_plan_premium_after_loading = term_plan_policy_data_arr.term_plan_premium_after_loading;
                                    var term_plan_cgst = term_plan_policy_data_arr.term_plan_cgst;
                                    var term_plan_sgst = term_plan_policy_data_arr.term_plan_sgst;
                                    var term_plan_cgst_tot_ammount = term_plan_policy_data_arr.term_plan_cgst_tot_ammount;
                                    var term_plan_sgst_tot_ammount = term_plan_policy_data_arr.term_plan_sgst_tot_ammount;
                                    var term_plan_final_paybal_premium = term_plan_policy_data_arr.term_plan_final_paybal_premium;
                                    var term_plan_status = term_plan_policy_data_arr.term_plan_status;
                                    // alert(term_plan_final_paybal_premium);
                                    $("#policy_term").val(term_plan_policy);
                                    $("#premium_paying_term").val(term_plan_premium_paying_term);
                                    $("#sum_insured").val(term_plan_total_sum_insured);
                                    $("#basic_premium").val(term_plan_basic_premium);
                                    $("#add_loading").val(term_plan_add_loading);
                                    $("#loading_description").val(term_plan_loading_description);
                                    $("#premium_after_loading").val(term_plan_premium_after_loading);
                                    $("#cgst_term_plan").val(term_plan_cgst);
                                    $("#sgst_term_plan").val(term_plan_sgst);
                                    $("#cgst_term_plan_tot").val(term_plan_cgst_tot_ammount);
                                    $("#sgst_term_plan_tot").val(term_plan_sgst_tot_ammount);
                                    $("#term_plan_final_paybal_premium").val(term_plan_final_paybal_premium);
                                    $("#term_plan_policy_id").val(term_plan_policy_id);
                                });
                            }
                        } else if (data["userdata"].policy_type_title == "Shopkeeper") {
                            if (data["userdata"].policy_type != 3) {
                                var shopkeeper_policy_data_arr = data["userdata"].shopkeeper_policy_data_arr;

                                edit_shopkeeper(shopkeeper_policy_data_arr);
                            }
                        } else if (data["userdata"].policy_type_title == "Jweller Block") {
                            if (data["userdata"].policy_type != 3) {
                                var jweller_policy_data_arr = data["userdata"].jweller_policy_data_arr;

                                edit_jweller_block(jweller_policy_data_arr);
                            }
                        } else if (data["userdata"].policy_type_title == "Open Policy" || data["userdata"].policy_type_title == "Stop Policy" || data["userdata"].policy_type_title == "Specific Policy") {
                            if (data["userdata"].policy_type != 3) {
                                var marine_policy_data_arr = data["userdata"].marine_policy_data_arr;
                                if (data["userdata"].policy_type_title == "Open Policy") {
                                    $("#policy_title").text("");
                                    $("#policy_title").text("Open Marine Policy Insured :");
                                } else if (data["userdata"].policy_type_title == "Stop Policy") {
                                    $("#policy_title").text("");
                                    $("#policy_title").text("Stop Marine Policy Insured :");
                                }
                                // var group_name_txt = $("#group_name option:selected").text();
                                // alert(group_name_txt);
                                // $("#group_name_company").text(group_name_txt);
                                var policy_holder_name = $("#policy_holder_name option:selected").text();
                                $("#group_name_company").text(policy_holder_name);
                                if (data["userdata"].policy_type_title == "Specific Policy") {
                                    // alert(date_form);
                                    var img_newDate = new Date(date_form);
                                    var lastDay = new Date(img_newDate.getFullYear(), img_newDate.getMonth() + 1, 0).toLocaleDateString('en-CA'); // 2020-08-19
                                    $("#period_of_insurance").text(date_form + " To " + lastDay);
                                } else {
                                    $("#period_of_insurance").text(date_form + " To " + date_to);
                                }
                                // $("#period_of_insurance").text(date_form + " To " + date_to);
                                edit_marine_policy(marine_policy_data_arr);
                            }
                        } else if (data["userdata"].policy_type_title == "GMC") {
                            if (data["userdata"].policy_type != 3) {
                                if(data["userdata"].policy_type ==1 || data["userdata"].policy_type ==2 || data["userdata"].policy_type==4 || data["userdata"].policy_type==5){
                                    var gmc_ind_data_arr = data["userdata"].gmc_ind_data_arr;
                                    edit_GMC(gmc_ind_data_arr);
                                }
                            }
                        } else if (data["userdata"].policy_type_title == "GPA") {
                            if (data["userdata"].policy_type != 3) {
                                if(data["userdata"].policy_type ==1 || data["userdata"].policy_type ==2 || data["userdata"].policy_type==4 || data["userdata"].policy_type==5){
                                    var gpa_ind_data_arr = data["userdata"].gpa_ind_data_arr;
                                    edit_GPA(gpa_ind_data_arr);
                                }
                            }
                        } else if (data["userdata"].policy_type_title == "Private Car") {
                            if (data["userdata"].policy_type != 3) {
                                if(data["userdata"].policy_type ==1 || data["userdata"].policy_type ==2){
                                    var private_car_data_arr = data["userdata"].private_car_data_arr;
                                    edit_motor_private_car(private_car_data_arr);
                                }
                            }
                        } else if (data["userdata"].policy_type_title == "2 Wheeler") {
                            if (data["userdata"].policy_type != 3) {
                                if(data["userdata"].policy_type ==1 || data["userdata"].policy_type ==2){
                                    var motor_2_wheeler_data_arr = data["userdata"].motor_2_wheeler_data_arr;
                                    edit_motor_2_wheeler(motor_2_wheeler_data_arr);
                                }
                            }
                        } else if (data["userdata"].policy_type_title == "Commercial Vehicle") {
                            if (data["userdata"].policy_type != 3) {
                                if(data["userdata"].policy_type ==1 || data["userdata"].policy_type ==2){
                                    var motor_commercial_policy_data_arr = data["userdata"].motor_commercial_policy_data_arr;
                                    edit_motor_commercial_policy(motor_commercial_policy_data_arr);
                                }
                            }
                        }else { // Other Policy
                            if ((data["userdata"].policy_type_title == "Worksmen Compentation") || (data["userdata"].policy_type_title == "Money In Transit") || (data["userdata"].policy_type_title == "Plate Glass") || (data["userdata"].policy_type_title == "House Holder") || (data["userdata"].policy_type_title == "All Risk") || (data["userdata"].policy_type_title == "Office Compact") || (data["userdata"].policy_type_title == "Electronic Equipment") || (data["userdata"].policy_type_title == "Product Liability") || (data["userdata"].policy_type_title == "Commercial General Liability") || (data["userdata"].policy_type_title == "Public Liability") || (data["userdata"].policy_type_title == "Professional Indemnity") || (data["userdata"].policy_type_title == "Machinery Breakdown") || (data["userdata"].policy_type_title == "Contractors All Risk")) {
                                if (data["userdata"].policy_type != 3) {
                                    var others_policy_data_arr = data["userdata"].others_policy_data_arr;

                                    $.each(others_policy_data_arr, function(key_other, val_other) {
                                        var other_policy_id = others_policy_data_arr.other_policy_id;
                                        var other_fk_policy_id = others_policy_data_arr.other_fk_policy_id;
                                        var fk_policy_type_id = others_policy_data_arr.fk_policy_type_id;
                                        var other_total_sum_assured = others_policy_data_arr.other_total_sum_assured;
                                        var other_fire_rate_per = others_policy_data_arr.other_fire_rate_per;
                                        var other_fire_rate_tot_amount = others_policy_data_arr.other_fire_rate_tot_amount;
                                        var other_less_discount_per = others_policy_data_arr.other_less_discount_per;
                                        var other_less_discount_tot_amount = others_policy_data_arr.other_less_discount_tot_amount;
                                        var other_fire_rate_after_discount = others_policy_data_arr.other_fire_rate_after_discount;
                                        var other_cgst_rate_per = others_policy_data_arr.other_cgst_rate_per;
                                        var other_cgst_tot_amount = others_policy_data_arr.other_cgst_tot_amount;
                                        var other_sgst_rate_per = others_policy_data_arr.other_sgst_rate_per;
                                        var other_sgst_tot_amount = others_policy_data_arr.other_sgst_tot_amount;
                                        var other_final_payable_premium = others_policy_data_arr.other_final_payable_premium;
                                        var others_policy_status = others_policy_data_arr.others_policy_status;
                                        // alert(other_final_payable_premium);
                                        $("#total_sum_assured").val(other_total_sum_assured);
                                        $("#fire_rate_per").val(other_fire_rate_per);
                                        $("#fire_rate_tot").val(other_fire_rate_tot_amount);
                                        $("#less_discount_per").val(other_less_discount_per);
                                        $("#less_discount_tot").val(other_less_discount_tot_amount);
                                        $("#fire_rate_after_discount_tot").val(other_fire_rate_after_discount);
                                        $("#cgst_fire_per").val(other_cgst_rate_per);
                                        $("#cgst_fire_tot").val(other_cgst_tot_amount);
                                        $("#sgst_fire_per").val(other_sgst_rate_per);
                                        $("#sgst_fire_tot").val(other_sgst_tot_amount);
                                        $("#final_paybal_premium").val(other_final_payable_premium);
                                        $("#other_policy_id").val(other_policy_id);
                                    });
                                }
                            }
                        }

                        //(data["userdata"].policy_type_title == "Mediclaim" || data["userdata"].policy_type_title == "Personal Accident" || data["userdata"].policy_type_title == "GMC" || data["userdata"].policy_type_title == "GPA")(policy_name_txt == "Mediclaim" || policy_name_txt == "Cancer Plan" || policy_name_txt == "Daily Cash" || policy_name_txt == "Overseas Mediclaim" || policy_name_txt == "Student Overseas Mediclaim" || policy_name_txt == "Employment Overseas Mediclaim" || policy_name_txt == "Personal Accident")
                        if ((data["userdata"].policy_type_title == "Mediclaim" || data["userdata"].policy_type_title == "Personal Accident" || data["userdata"].policy_type_title == "Cancer Plan" || data["userdata"].policy_type_title == "Daily Cash" || data["userdata"].policy_type_title == "Overseas Mediclaim" || data["userdata"].policy_type_title == "Student Overseas Mediclaim" || data["userdata"].policy_type_title == "Employment Overseas Mediclaim") && (data["userdata"].policy_type==4 || data["userdata"].policy_type==5)) {
                            if(data["userdata"].policy_type==4){ //Common Individual
                                var common_ind_data_arr = data["userdata"].common_ind_data_arr;
                                edit_Common_Individual(common_ind_data_arr);
                            }else if(data["userdata"].policy_type == 5){ //Common Floater
                                var common_float_data_arr = data["userdata"].common_float_data_arr;
                                edit_Common_Floater(common_float_data_arr);
                            }

                        }

                        if(data["userdata"].policy_type ==2 && data["userdata"].policy_type_title=="Mediclaim"){
                            if (data["userdata"].policy_type != 3) {
                                if (company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Optima Restore") {
                                        var medi_float_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_float_hdfc_ergo_health_insu_policy_data_arr;
                                            edit_medi_float_HDFC_ERGO_HEALTH_INSURANCE_LTD_Optima_restore_policy(medi_float_hdfc_ergo_health_insu_policy_data_arr);
                                    }else if (data["userdata"].floater_policy_type == "Health Suraksha") {
                                        var medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr;
                                            edit_medi_float_Suraksha_policy_HDFC_ERGO_HEALTH_INSURANCE_LTD(medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr);
                                    }else if (data["userdata"].floater_policy_type == "Easy Health") {
                                        var easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr = data["userdata"].easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr;
                                        edit_medi_float_HDFC_ERGO_HEALTH_INSURANCE_LTD_easy_rate_card_policy(easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr);
                                    }                                            
                                }else if(company_txt == "The New India Assurance Co Ltd"){
                                    if (data["userdata"].floater_policy_type == "New India Floater Mediclaim") {
                                        var medi_float_the_new_india_assu_policy_data_arr = data["userdata"].medi_float_the_new_india_assu_policy_data_arr;
                                        edit_medi_floater_the_new_india_assu_policy(medi_float_the_new_india_assu_policy_data_arr);
                                    }
                                }else if(company_txt == "Max Bupa Health Insurance Co Ltd"){
                                    if (data["userdata"].floater_policy_type == "Reassure") {
                                        var medi_float_max_bupa_reassure_policy_data_arr = data["userdata"].medi_float_max_bupa_reassure_policy_data_arr;
                                        edit_medi_float_max_bupa_reassure_policy(medi_float_max_bupa_reassure_policy_data_arr);
                                    }
                                }else if(company_txt == "Star Health & Allied Insurance Co Ltd"){
                                    if (data["userdata"].floater_policy_type == "Red Carpet") {
                                        var medi_star_health_allied_red_carpet_float_policy_data_arr = data["userdata"].medi_star_health_allied_red_carpet_float_policy_data_arr;
                                        edit_medi_float_star_health_red_arpet_policy(medi_star_health_allied_red_carpet_float_policy_data_arr);
                                    }else if (data["userdata"].floater_policy_type == "Comprehensive") {
                                        var medi_star_health_allied_comprehensive_float_policy_data_arr = data["userdata"].medi_star_health_allied_comprehensive_float_policy_data_arr;
                                        edit_medi_float_star_health_Comprehensive_policy(medi_star_health_allied_comprehensive_float_policy_data_arr);
                                    }
                                }else if (company_txt == "United India Insurance Co Ltd"){
                                    // alert("hi")
                                    // alert(data["userdata"].floater_policy_type+"new");
                                    if(data["userdata"].floater_policy_type=="Family Floater 2014"){
                                        family_Size_Val(data["userdata"].family_size);
                                        var mediclaim_floater2014_data_arr = data["userdata"].mediclaim_floater2014_data_arr;
                                        edit_mediclaim_floater2014_policy(mediclaim_floater2014_data_arr);
                                    }else if(data["userdata"].floater_policy_type=="Family Floater 2020"){
                                        // alert(data["userdata"].floater_policy_type+"new");
                                        family_Size_Val(data["userdata"].family_size);
                                        var medi_floater2020_data_arr = data["userdata"].medi_floater2020_data_arr;
                                        edit_medi_floater2020_policy(medi_floater2020_data_arr);
                                    }
                                }else if(company_txt == "Care Health Insurance Co Ltd"){
                                    if(data["userdata"].floater_policy_type=="Care Advantage"){
                                        // alert("Hi");
                                        var care_health_care_adv_float_policy_data_arr = data["userdata"].care_health_care_adv_float_policy_data_arr;
                                        edit_medi_care_health_care_adv_float_policy(care_health_care_adv_float_policy_data_arr);
                                    }else if(data["userdata"].floater_policy_type=="Care"){
                                        var care_health_care_float_policy_data_arr = data["userdata"].care_health_care_float_policy_data_arr;
                                        edit_medi_care_health_care_float_policy(care_health_care_float_policy_data_arr);
                                    }
                                }
                            }
                        }

                        if (data["userdata"].policy_type ==1 && data["userdata"].policy_type_title == "Mediclaim") {
                            if (data["userdata"].policy_type != 3) {
                                if (company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Optima Restore") {
                                        // $("#hdfc_ergo_health_insu_individual_policy_type_div").show();
                                        // $("#hdfc_ergo_health_insu_individual_policy_type").val(floater_policy_type);
                                        // $('select[id^="hdfc_ergo_health_insu_individual_policy_type"] option[value="' + data["userdata"].floater_policy_type + '"]').attr("selected", "selected");
                                        var medi_ind_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_ind_hdfc_ergo_health_insu_policy_data_arr;
                                        edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Optima_restore_policy(medi_ind_hdfc_ergo_health_insu_policy_data_arr);
                                    }else if (data["userdata"].floater_policy_type == "Energy") {
                                        var medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr;
                                        edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Energy_policy(medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr);
                                    }else if (data["userdata"].floater_policy_type == "Health Suraksha"){
                                        var medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr;
                                        edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Surksha_policy(medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr);                                                    
                                    }else if (data["userdata"].floater_policy_type == "Easy Health"){
                                        var easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr = data["userdata"].easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr;
                                        edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_easy_rate_card_policy(easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr);
                                    }
                                }else if(company_txt == "The New India Assurance Co Ltd"){
                                    if (data["userdata"].floater_policy_type == "New India Mediclaim Policy 2017") {
                                        var medi_ind_the_new_india_2017_assu_policy_data_arr = data["userdata"].medi_ind_the_new_india_2017_assu_policy_data_arr;
                                        edit_medi_ind_the_new_india_assu_2017_policy(medi_ind_the_new_india_2017_assu_policy_data_arr);
                                    }
                                }else if(company_txt == "Max Bupa Health Insurance Co Ltd"){
                                    if (data["userdata"].floater_policy_type == "Reassure") {
                                        var medi_ind_max_bupa_reassure_policy_data_arr = data["userdata"].medi_ind_max_bupa_reassure_policy_data_arr;
                                        edit_medi_ind_max_bupa_reassure_policy(medi_ind_max_bupa_reassure_policy_data_arr);
                                    }
                                }else if(company_txt == "Star Health & Allied Insurance Co Ltd"){
                                    if (data["userdata"].floater_policy_type == "Red Carpet") {
                                        var medi_star_health_allied_red_carpet_ind_policy_data_arr = data["userdata"].medi_star_health_allied_red_carpet_ind_policy_data_arr;
                                        edit_medi_ind_star_health_red_arpet_policy(medi_star_health_allied_red_carpet_ind_policy_data_arr);
                                    }else if (data["userdata"].floater_policy_type == "Comprehensive") {
                                        var medi_star_health_allied_comprehensive_ind_policy_data_arr = data["userdata"].medi_star_health_allied_comprehensive_ind_policy_data_arr;
                                        edit_medi_ind_star_health_Comprehensive_policy(medi_star_health_allied_comprehensive_ind_policy_data_arr);
                                    }
                                }else if (company_txt == "United India Insurance Co Ltd"){
                                    if(data["userdata"].floater_policy_type=="Individual Health Insurance Policy"){
                                        // alert("hi")
                                        var mediclaim_policy_data_arr = data["userdata"].mediclaim_policy_data_arr;
                                        edit_mediclaim_policy(mediclaim_policy_data_arr);
                                    }else if(data["userdata"].floater_policy_type=="Floater 2020(Individual)"){
                                        // alert(data["userdata"].floater_policy_type+"new");
                                        var medi_ind2020_policy_data_arr = data["userdata"].medi_ind2020_policy_data_arr;
                                        edit_medi_ind2020_policy(medi_ind2020_policy_data_arr);
                                    }
                                }else if(company_txt == "Care Health Insurance Co Ltd"){
                                    if(data["userdata"].floater_policy_type=="Care Advantage"){
                                        // alert("Hi");
                                        var care_health_care_adv_ind_policy_data_arr = data["userdata"].care_health_care_adv_ind_policy_data_arr;
                                        edit_medi_ind_care_health_care_adv_ind_policy(care_health_care_adv_ind_policy_data_arr);
                                    }else if(data["userdata"].floater_policy_type=="Care"){
                                        var care_health_care_ind_policy_data_arr = data["userdata"].care_health_care_ind_policy_data_arr;
                                        edit_medi_ind_care_health_care_ind_policy(care_health_care_ind_policy_data_arr);
                                    }
                                }
                            }
                        }

                        if((data["userdata"].policy_type ==2 || data["userdata"].policy_type ==5) && (data["userdata"].policy_type_title=="Super Top Up" || data["userdata"].policy_type_title=="Top Up" || data["userdata"].policy_type_title=="Critical illness")){
                            // alert("Hi");
                            if (data["userdata"].policy_type != 3) {
                                // alert("hi")
                                if (company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") {
                                    $("#hdfc_ergo_health_insu_supertopup_float_family_size").val(data["userdata"].family_size);
                                    var hdfc_ergo_health_supertopup_float_data_arr = data["userdata"].hdfc_ergo_health_supertopup_float_data_arr;
                                    edit_hdfc_ergo_health_supertopup_Float_policy(hdfc_ergo_health_supertopup_float_data_arr,data["userdata"].policy_type);
                                }else if (company_txt == "The New India Assurance Co Ltd") {
                                    var the_new_india_supertopup_ind_data_arr = data["userdata"].the_new_india_supertopup_ind_data_arr;
                                    edit_the_new_india_assu_supertopup_Float_policy(the_new_india_supertopup_ind_data_arr,data["userdata"].policy_type);
                                }else if (company_txt == "Star Health & Allied Insurance Co Ltd") {
                                    family_Size_Val(data["userdata"].family_size);
                                    $("#star_health_allied_insu_supertopup_float_family_size").val(data["userdata"].family_size);
                                    var medi_star_health_allied_supertopup_float_policy_data_arr = data["userdata"].medi_star_health_allied_supertopup_float_policy_data_arr;
                                    edit_medi_float_star_health_Supertopup_policy(medi_star_health_allied_supertopup_float_policy_data_arr);
                                }else{
                                    family_Size_Val(data["userdata"].family_size);
                                    $("#family_size").val(data["userdata"].family_size);
                                    var supertopup_floater_data_arr = data["userdata"].supertopup_floater_data_arr;
                                    edit_supertopup_floater_policy(supertopup_floater_data_arr,data["userdata"].policy_type);
                                }
                            }
                        }

                        if((data["userdata"].policy_type == 1 || data["userdata"].policy_type == 4) && (data["userdata"].policy_type_title=="Super Top Up" || data["userdata"].policy_type_title=="Top Up" || data["userdata"].policy_type_title=="Critical illness")){
                            if (data["userdata"].policy_type != 3) {
                                if (company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") {
                                    var hdfc_ergo_health_supertopup_ind_data_arr = data["userdata"].hdfc_ergo_health_supertopup_ind_data_arr;
                                    edit_hdfc_ergo_health_supertopup_Ind_policy(hdfc_ergo_health_supertopup_ind_data_arr,data["userdata"].policy_type);
                                }else if (company_txt == "The New India Assurance Co Ltd") {
                                    var the_new_india_supertopup_ind_single_data_arr = data["userdata"].the_new_india_supertopup_ind_single_data_arr;
                                    edit_the_new_india_assu_supertopup_INDIVIDUAL_policy(the_new_india_supertopup_ind_single_data_arr,data["userdata"].policy_type);
                                }else if (company_txt == "Star Health & Allied Insurance Co Ltd") {
                                    var medi_star_health_allied_supertopup_ind_policy_data_arr = data["userdata"].medi_star_health_allied_supertopup_ind_policy_data_arr;
                                    edit_medi_ind_star_health_Supertopup_policy(medi_star_health_allied_supertopup_ind_policy_data_arr);
                                }else{
                                    // alert("Hi");
                                    var supertopup_ind_data_arr = data["userdata"].supertopup_ind_data_arr;
                                    console.log(supertopup_ind_data_arr);
                                    edit_supertopup_Individual_policy(supertopup_ind_data_arr,data["userdata"].policy_type);
                                }
                            }
                        }

                        if((data["userdata"].policy_type == 1 || data["userdata"].policy_type == 2) && data["userdata"].policy_type_title=="Personal Accident"){
                            var ind_personal_accident_policy_data_arr = data["userdata"].ind_personal_accident_policy_data_arr;
                            if (company_txt == "United India Insurance Co Ltd")
                                edit_Personal_Accident(ind_personal_accident_policy_data_arr);
                            else
                                edit_single_table_Personal_Accident(ind_personal_accident_policy_data_arr);
                        }

                        if (data["userdata"].risk_rc_details == null)
                            var risk_rc_details = [];
                        else
                            var risk_rc_details = JSON.parse(data["userdata"].risk_rc_details);
                        // alert(risk_rc_details);
                        var fire_rc_policy_data_arr = data["userdata"].fire_rc_policy_data_arr;
                        var policy_type_option = data["userdata"].policy_type;
                        edit_FIre_RC_Details(risk_rc_details, fire_rc_policy_data_arr, policy_type_option);

                        if (!isNaN(policy_id)) {
                            if (policy_member_status == 1) {
                                var status = "Active";
                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                            } else {
                                var status = "In-Active";
                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                            }

                            var edit_btn = " <a id='edit' href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-sm mr-1 edit' id='edit'>Edit Policy</a><button id='delete' onclick='OnDelete(" + policy_id + ")' class='btn btn-primary btn-sm mr-1 delete'>Delete <?php echo $title; ?></button><button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-primary btn-sm mr-1' style='display:none;'>Recover <?php echo $title; ?></button>";
                            var status_btn = "<button class='" + status_btn_txt + "  mr-1' id='status_btn_" + policy_id + "' value='' type='button' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' >" + status + "</button>";
                            var back_btn = '<a href="<?php echo base_url() . "master/policy"; ?>" class="btn btn-secondary waves-effect width-md btn-sm">Back</a>';
                            $("#btnails").append(edit_btn + status_btn + back_btn);

                            if (del_flag == 0) {
                                $("#recover").show();
                                $("#delete").hide();
                            } else {
                                $("#delete").show();
                                $("#recover").hide();
                            }

                        }
                        // add_risk = edit_risk;
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function edit_medi_care_health_care_adv_float_policy(care_health_care_adv_float_policy_data_arr){
        var total_care_adv_float_json_data = "";
        $("#first_table_tbody").empty();
        $.each(care_health_care_adv_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var care_adv_float_id  = care_health_care_adv_float_policy_data_arr.care_adv_float_id ;
            var care_health_care_adv_float_policy_fk_policy_id = care_health_care_adv_float_policy_data_arr.care_health_care_adv_float_policy_fk_policy_id;
            var fk_policy_type_id = care_health_care_adv_float_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = care_health_care_adv_float_policy_data_arr.policy_name_txt;
            var fk_company_id = care_health_care_adv_float_policy_data_arr.fk_company_id;
            var fk_department_id = care_health_care_adv_float_policy_data_arr.fk_department_id;

            total_care_adv_float_json_data = JSON.parse(care_health_care_adv_float_policy_data_arr.total_care_adv_float_json_data);

            var medi_final_premium = care_health_care_adv_float_policy_data_arr.medi_final_premium;
            var max_age = care_health_care_adv_float_policy_data_arr.max_age;
            var star_health_status = care_health_care_adv_float_policy_data_arr.star_health_status;
            var star_health_del_flag = care_health_care_adv_float_policy_data_arr.star_health_del_flag;

            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
            $("#care_adv_float_id ").val(care_adv_float_id );
        });
        var medi_care_health_tr = "";
        var add_care_adv_counter = "";
        var index = "";
        var Family_size_count = total_care_adv_float_json_data.length;

        $.each(total_care_adv_float_json_data, function(key, val) {
            add_care_adv_counter = key;
            // main_Care_Advantage.push(add_care_adv_counter);
            index = total_care_adv_float_json_data[key][0];
            var name_insured_member_name = total_care_adv_float_json_data[key][1];
            var name_insured_member_name_txt = total_care_adv_float_json_data[key][2];
            var name_insured_dob = total_care_adv_float_json_data[key][3];
            var name_insured_age = total_care_adv_float_json_data[key][4];
            var name_insured_relation = total_care_adv_float_json_data[key][5];
            var name_insured_relation_txt = total_care_adv_float_json_data[key][6];
            var nominee_name = total_care_adv_float_json_data[0][7];
            var nominee_name_txt = total_care_adv_float_json_data[0][8];
            var nominee_relation = total_care_adv_float_json_data[0][9];
            var nominee_relation_txt = total_care_adv_float_json_data[0][10];
            var name_insured_sum_insured = total_care_adv_float_json_data[0][11];
            var basic_premium = total_care_adv_float_json_data[0][12];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            medi_care_health_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_care_adv_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_care_adv_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_care_adv_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_care_adv_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_care_adv_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td>';

            if(add_care_adv_counter == 0){
                medi_care_health_tr += ' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value="'+basic_premium+'"></td></tr>';
            }

        });
        $("#first_table_tbody").append(medi_care_health_tr);

        $.each(total_care_adv_float_json_data, function(key, val) {
            add_care_adv_counter = key;
            index = total_care_adv_float_json_data[key][0];
            var name_insured_member_name = total_care_adv_float_json_data[key][1];
            var name_insured_relation = total_care_adv_float_json_data[key][5];
            var nominee_name = total_care_adv_float_json_data[0][7];
            var nominee_relation = total_care_adv_float_json_data[0][9];
            var name_insured_sum_insured = total_care_adv_float_json_data[0][11];
            $("#name_insured_member_name_"+add_care_adv_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_care_adv_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#name_insured_sum_insured").val(name_insured_sum_insured); 
            get_age_Comparision();                
        }); 
    }

    function edit_medi_care_health_care_float_policy(care_health_care_float_policy_data_arr){
        var total_care_float_json_data = "";
        $("#first_table_tbody").empty();
        $.each(care_health_care_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var care_float_id  = care_health_care_float_policy_data_arr.care_float_id ;
            var care_health_care_float_policy_fk_policy_id = care_health_care_float_policy_data_arr.care_health_care_float_policy_fk_policy_id;
            var fk_policy_type_id = care_health_care_float_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = care_health_care_float_policy_data_arr.policy_name_txt;
            var fk_company_id = care_health_care_float_policy_data_arr.fk_company_id;
            var fk_department_id = care_health_care_float_policy_data_arr.fk_department_id;

            total_care_float_json_data = JSON.parse(care_health_care_float_policy_data_arr.total_care_float_json_data);

            var medi_final_premium = care_health_care_float_policy_data_arr.medi_final_premium;
            var max_age = care_health_care_float_policy_data_arr.max_age;
            var star_health_status = care_health_care_float_policy_data_arr.star_health_status;
            var star_health_del_flag = care_health_care_float_policy_data_arr.star_health_del_flag;

            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
            $("#care_float_id ").val(care_float_id );
        });
        var medi_care_health_tr = "";
        var add_care_adv_counter = "";
        var index = "";
        var Family_size_count = total_care_float_json_data.length;

        $.each(total_care_float_json_data, function(key, val) {
            add_care_adv_counter = key;
            // main_Care_Advantage.push(add_care_adv_counter);
            index = total_care_float_json_data[key][0];
            var name_insured_member_name = total_care_float_json_data[key][1];
            var name_insured_member_name_txt = total_care_float_json_data[key][2];
            var name_insured_dob = total_care_float_json_data[key][3];
            var name_insured_age = total_care_float_json_data[key][4];
            var name_insured_relation = total_care_float_json_data[key][5];
            var name_insured_relation_txt = total_care_float_json_data[key][6];
            var nominee_name = total_care_float_json_data[0][7];
            var nominee_name_txt = total_care_float_json_data[0][8];
            var nominee_relation = total_care_float_json_data[0][9];
            var nominee_relation_txt = total_care_float_json_data[0][10];
            var name_insured_sum_insured = total_care_float_json_data[0][11];
            var basic_premium = total_care_float_json_data[0][12];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);
            
            medi_care_health_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_care_adv_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_care_adv_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_care_adv_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_care_adv_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_care_adv_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td>';

            if(add_care_adv_counter == 0){
                medi_care_health_tr += ' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value="'+basic_premium+'"></td></tr>';
            }

        });
        $("#first_table_tbody").append(medi_care_health_tr);

        $.each(total_care_float_json_data, function(key, val) {
            add_care_adv_counter = key;
            index = total_care_float_json_data[key][0];
            var name_insured_member_name = total_care_float_json_data[key][1];
            var name_insured_relation = total_care_float_json_data[key][5];
            var nominee_name = total_care_float_json_data[0][7];
            var nominee_relation = total_care_float_json_data[0][9];
            var name_insured_sum_insured = total_care_float_json_data[0][11];
            $("#name_insured_member_name_"+add_care_adv_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_care_adv_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#name_insured_sum_insured").val(name_insured_sum_insured); 
            get_age_Comparision();                  
        }); 
    }

    function edit_medi_ind_care_health_care_adv_ind_policy(care_health_care_adv_ind_policy_data_arr){
        var total_care_adv_ind_json_data = "";
        $("#first_table_tbody").empty();
        $.each(care_health_care_adv_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var care_adv_ind_id  = care_health_care_adv_ind_policy_data_arr.care_adv_ind_id ;
            var care_health_care_adv_ind_policy_fk_policy_id = care_health_care_adv_ind_policy_data_arr.care_health_care_adv_ind_policy_fk_policy_id;
            var fk_policy_type_id = care_health_care_adv_ind_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = care_health_care_adv_ind_policy_data_arr.policy_name_txt;
            var fk_company_id = care_health_care_adv_ind_policy_data_arr.fk_company_id;
            var fk_department_id = care_health_care_adv_ind_policy_data_arr.fk_department_id;

            total_care_adv_ind_json_data = JSON.parse(care_health_care_adv_ind_policy_data_arr.total_care_adv_ind_json_data);

            var medi_final_premium = care_health_care_adv_ind_policy_data_arr.medi_final_premium;
            var star_health_status = care_health_care_adv_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = care_health_care_adv_ind_policy_data_arr.star_health_del_flag;

            $("#medi_final_premium").val(medi_final_premium);
            $("#care_adv_ind_id ").val(care_adv_ind_id );
        });
        var medi_care_health_tr = "";
        var add_care_adv_counter = "";
        var index = "";
        var care_health_care_adv_medi_length = total_care_adv_ind_json_data.length;

        $.each(total_care_adv_ind_json_data, function(key, val) {
            add_care_adv_counter = key;
            main_Care_Advantage.push(add_care_adv_counter);
            index = total_care_adv_ind_json_data[key][0];
            var name_insured_member_name = total_care_adv_ind_json_data[key][1];
            var name_insured_member_name_txt = total_care_adv_ind_json_data[key][2];
            var name_insured_dob = total_care_adv_ind_json_data[key][3];
            var name_insured_age = total_care_adv_ind_json_data[key][4];
            var name_insured_relation = total_care_adv_ind_json_data[key][5];
            var name_insured_relation_txt = total_care_adv_ind_json_data[key][6];
            var nominee_name = total_care_adv_ind_json_data[key][7];
            var nominee_name_txt = total_care_adv_ind_json_data[key][8];
            var nominee_relation = total_care_adv_ind_json_data[key][9];
            var nominee_relation_txt = total_care_adv_ind_json_data[key][10];
            var name_insured_sum_insured = total_care_adv_ind_json_data[key][11];
            var basic_premium = total_care_adv_ind_json_data[key][12];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            medi_care_health_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_Care_Advantage_' + add_care_adv_counter + '" onClick=removeCareAdvantage(' + add_care_adv_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_care_adv_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_care_adv_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_care_adv_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_care_adv_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_care_adv_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_care_adv_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_care_adv_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_care_adv_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_care_adv_counter + ')"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_care_adv_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td> </tr>';

        });
        $("#Add_Care_Advantage").attr("onClick", "AddCareAdvantage(" + (care_health_care_adv_medi_length) + ")");
        $("#first_table_tbody").append(medi_care_health_tr);

        $.each(total_care_adv_ind_json_data, function(key, val) {
            add_care_adv_counter = key;
            index = total_care_adv_ind_json_data[key][0];
            var name_insured_member_name = total_care_adv_ind_json_data[key][1];
            var name_insured_relation = total_care_adv_ind_json_data[key][5];
            var nominee_name = total_care_adv_ind_json_data[key][7];
            var nominee_relation = total_care_adv_ind_json_data[key][9];
            var name_insured_sum_insured = total_care_adv_ind_json_data[key][11];
            $("#name_insured_member_name_"+add_care_adv_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_care_adv_counter).val(name_insured_relation);
            $("#nominee_name_"+add_care_adv_counter).val(nominee_name);
            $("#nominee_relation_"+add_care_adv_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_care_adv_counter).val(name_insured_sum_insured);
            get_basic_premium(add_care_adv_counter);                 
        }); 
    }

    function edit_medi_ind_care_health_care_ind_policy(care_health_care_ind_policy_data_arr){
        var total_care_ind_json_data = "";
        $("#first_table_tbody").empty();
        $.each(care_health_care_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var care_ind_id  = care_health_care_ind_policy_data_arr.care_ind_id ;
            var care_health_care_ind_policy_fk_policy_id = care_health_care_ind_policy_data_arr.care_health_care_ind_policy_fk_policy_id;
            var fk_policy_type_id = care_health_care_ind_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = care_health_care_ind_policy_data_arr.policy_name_txt;
            var fk_company_id = care_health_care_ind_policy_data_arr.fk_company_id;
            var fk_department_id = care_health_care_ind_policy_data_arr.fk_department_id;

            total_care_ind_json_data = JSON.parse(care_health_care_ind_policy_data_arr.total_care_ind_json_data);

            var medi_final_premium = care_health_care_ind_policy_data_arr.medi_final_premium;
            var star_health_status = care_health_care_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = care_health_care_ind_policy_data_arr.star_health_del_flag;

            $("#medi_final_premium").val(medi_final_premium);
            $("#care_ind_id ").val(care_ind_id );
        });
        var medi_care_health_tr = "";
        var add_care_counter = "";
        var index = "";
        var care_health_care_medi_length = total_care_ind_json_data.length;

        $.each(total_care_ind_json_data, function(key, val) {
            add_care_counter = key;
            main_Care.push(add_care_counter);
            index = total_care_ind_json_data[key][0];
            var name_insured_member_name = total_care_ind_json_data[key][1];
            var name_insured_member_name_txt = total_care_ind_json_data[key][2];
            var name_insured_dob = total_care_ind_json_data[key][3];
            var name_insured_age = total_care_ind_json_data[key][4];
            var name_insured_relation = total_care_ind_json_data[key][5];
            var name_insured_relation_txt = total_care_ind_json_data[key][6];
            var nominee_name = total_care_ind_json_data[key][7];
            var nominee_name_txt = total_care_ind_json_data[key][8];
            var nominee_relation = total_care_ind_json_data[key][9];
            var nominee_relation_txt = total_care_ind_json_data[key][10];
            var name_insured_sum_insured = total_care_ind_json_data[key][11];
            var basic_premium = total_care_ind_json_data[key][12];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            medi_care_health_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_Care_Advantage_' + add_care_counter + '" onClick=removeCareAdvantage(' + add_care_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_care_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_care_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_care_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_care_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_care_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_care_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_care_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_care_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_care_counter + ')"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_care_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td> </tr>';

        });
        $("#Add_Care").attr("onClick", "AddCare(" + (care_health_care_medi_length) + ")");
        $("#first_table_tbody").append(medi_care_health_tr);

        $.each(total_care_ind_json_data, function(key, val) {
            add_care_counter = key;
            index = total_care_ind_json_data[key][0];
            var name_insured_member_name = total_care_ind_json_data[key][1];
            var name_insured_relation = total_care_ind_json_data[key][5];
            var nominee_name = total_care_ind_json_data[key][7];
            var nominee_relation = total_care_ind_json_data[key][9];
            var name_insured_sum_insured = total_care_ind_json_data[key][11];
            $("#name_insured_member_name_"+add_care_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_care_counter).val(name_insured_relation);
            $("#nominee_name_"+add_care_counter).val(nominee_name);
            $("#nominee_relation_"+add_care_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_care_counter).val(name_insured_sum_insured);    
            get_basic_premium(add_care_counter);             
        }); 
    }

    function edit_medi_ind_star_health_Supertopup_policy(medi_star_health_allied_supertopup_ind_policy_data_arr){
        var total_star_health_supertopup_ind_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_star_health_allied_supertopup_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_super_ind_policy_id  = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_star_health_super_ind_policy_id ;
            var star_health_allied_insu_super_ind_policy_fk_policy_id = medi_star_health_allied_supertopup_ind_policy_data_arr.star_health_allied_insu_super_ind_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_supertopup_ind_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_star_health_allied_supertopup_ind_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_star_health_allied_supertopup_ind_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_supertopup_ind_policy_data_arr.fk_department_id;

            total_star_health_supertopup_ind_json_data = JSON.parse(medi_star_health_allied_supertopup_ind_policy_data_arr.total_star_health_supertopup_ind_json_data);

            var tot_premium = medi_star_health_allied_supertopup_ind_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_final_premium;
            var star_health_status = medi_star_health_allied_supertopup_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_supertopup_ind_policy_data_arr.star_health_del_flag;

            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#medi_star_health_super_ind_policy_id ").val(medi_star_health_super_ind_policy_id );
        });
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var star_health_supertopup_medi_length = total_star_health_supertopup_ind_json_data.length;

        $.each(total_star_health_supertopup_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            main_SuperTopUp_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_supertopup_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_supertopup_ind_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_supertopup_ind_json_data[key][2];
            var name_insured_dob = total_star_health_supertopup_ind_json_data[key][3];
            var name_insured_age = total_star_health_supertopup_ind_json_data[key][4];
            var name_insured_relation = total_star_health_supertopup_ind_json_data[key][5];
            var name_insured_relation_txt = total_star_health_supertopup_ind_json_data[key][6];
            var nominee_name = total_star_health_supertopup_ind_json_data[key][7];
            var nominee_name_txt = total_star_health_supertopup_ind_json_data[key][8];
            var nominee_relation = total_star_health_supertopup_ind_json_data[key][9];
            var nominee_relation_txt = total_star_health_supertopup_ind_json_data[key][10];
            var type_of_policy = total_star_health_supertopup_ind_json_data[key][11];
            var deductible_prem = total_star_health_supertopup_ind_json_data[key][12];
            var name_insured_sum_insured = total_star_health_supertopup_ind_json_data[key][13];
            var basic_premium = total_star_health_supertopup_ind_json_data[key][14];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            medi_star_health_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_SuperTopUp_starHealth_' + add_medi_starHealth_counter + '" onClick=removeSuperTopUpstarHealth(' + add_medi_starHealth_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_starHealth_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_starHealth_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_starHealth_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_starHealth_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_starHealth_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_starHealth_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_starHealth_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%"><select style="width:105px;" id="type_of_policy_' + add_medi_starHealth_counter + '" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_deductible_premium(' + add_medi_starHealth_counter + ')"><option value="null">Select Type Of Policy</option><option value="Gold Plan">Gold Plan</option><option value="Silver Plan">Silver Plan</option></select></td><td width="12%"><select style="width:105px;" id="deductible_prem_' + add_medi_starHealth_counter + '" name="deductible_prem[]" class="form-control deductible_prem" onchange="get_sum_insured_dropdown(' + add_medi_starHealth_counter + ')"><option value="null">Select Deductible</option></select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_starHealth_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_starHealth_counter + ')"><option value="null">Select Sum Insured</option></select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_starHealth_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td></tr>';

        });
        $("#Add_SuperTopUp_starHealth").attr("onClick", "AddSuperTopUpstarHealth(" + (star_health_supertopup_medi_length) + ")");
        $("#first_table_tbody").append(medi_star_health_tr);

        $.each(total_star_health_supertopup_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            index = total_star_health_supertopup_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_supertopup_ind_json_data[key][1];
            var name_insured_relation = total_star_health_supertopup_ind_json_data[key][5];
            var nominee_name = total_star_health_supertopup_ind_json_data[key][7];
            var nominee_relation = total_star_health_supertopup_ind_json_data[key][9];
            var type_of_policy = total_star_health_supertopup_ind_json_data[key][11];
            var deductible_prem = total_star_health_supertopup_ind_json_data[key][12];
            var name_insured_sum_insured = total_star_health_supertopup_ind_json_data[key][13];
            $("#name_insured_member_name_"+add_medi_starHealth_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_starHealth_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_starHealth_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_starHealth_counter).val(nominee_relation);
            $("#type_of_policy_"+add_medi_starHealth_counter).val(type_of_policy);
            $("#deductible_prem_"+add_medi_starHealth_counter).val(deductible_prem);
            $("#name_insured_sum_insured_"+add_medi_starHealth_counter).val(name_insured_sum_insured);  
            get_deductible_premium(add_medi_starHealth_counter);
            get_sum_insured_dropdown(add_medi_starHealth_counter)                   
        });       
        $.each(total_star_health_supertopup_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            var type_of_policy = total_star_health_supertopup_ind_json_data[key][11];
            var deductible_prem = total_star_health_supertopup_ind_json_data[key][12];
            var name_insured_sum_insured = total_star_health_supertopup_ind_json_data[key][13];

            $("#type_of_policy_"+add_medi_starHealth_counter).val(type_of_policy);
            $("#deductible_prem_"+add_medi_starHealth_counter).val(deductible_prem);
            $("#name_insured_sum_insured_"+add_medi_starHealth_counter).val(name_insured_sum_insured);    
            get_sum_insured_dropdown(add_medi_starHealth_counter)                   
        });      
        $.each(total_star_health_supertopup_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            var type_of_policy = total_star_health_supertopup_ind_json_data[key][11];
            var deductible_prem = total_star_health_supertopup_ind_json_data[key][12];
            var name_insured_sum_insured = total_star_health_supertopup_ind_json_data[key][13];

            $("#type_of_policy_"+add_medi_starHealth_counter).val(type_of_policy);
            $("#deductible_prem_"+add_medi_starHealth_counter).val(deductible_prem);
            $("#name_insured_sum_insured_"+add_medi_starHealth_counter).val(name_insured_sum_insured);    
            get_basic_premium(add_medi_starHealth_counter);
        });  
    }

    function edit_medi_float_star_health_Supertopup_policy(medi_star_health_allied_supertopup_float_policy_data_arr){
        var total_star_health_supertopup_float_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_star_health_allied_supertopup_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_super_float_policy_id  = medi_star_health_allied_supertopup_float_policy_data_arr.medi_star_health_super_float_policy_id ;
            var star_health_allied_insu_super_float_policy_fk_policy_id = medi_star_health_allied_supertopup_float_policy_data_arr.star_health_allied_insu_super_float_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_supertopup_float_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_star_health_allied_supertopup_float_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_star_health_allied_supertopup_float_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_supertopup_float_policy_data_arr.fk_department_id;

            total_star_health_supertopup_float_json_data = JSON.parse(medi_star_health_allied_supertopup_float_policy_data_arr.total_star_health_supertopup_float_json_data);

            var tot_premium = medi_star_health_allied_supertopup_float_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_supertopup_float_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_supertopup_float_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_supertopup_float_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_supertopup_float_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_supertopup_float_policy_data_arr.medi_final_premium;
            var max_age = medi_star_health_allied_supertopup_float_policy_data_arr.max_age;
            var star_health_status = medi_star_health_allied_supertopup_float_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_supertopup_float_policy_data_arr.star_health_del_flag;

            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
            $("#medi_star_health_super_float_policy_id").val(medi_star_health_super_float_policy_id);
        });
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var Family_size_count = total_star_health_supertopup_float_json_data.length;

        $.each(total_star_health_supertopup_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            main_SuperTopUp_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_supertopup_float_json_data[key][0];
            var name_insured_member_name = total_star_health_supertopup_float_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_supertopup_float_json_data[key][2];
            var name_insured_dob = total_star_health_supertopup_float_json_data[key][3];
            var name_insured_age = total_star_health_supertopup_float_json_data[key][4];
            var name_insured_relation = total_star_health_supertopup_float_json_data[key][5];
            var name_insured_relation_txt = total_star_health_supertopup_float_json_data[key][6];
            var nominee_name = total_star_health_supertopup_float_json_data[0][7];
            var nominee_name_txt = total_star_health_supertopup_float_json_data[0][8];
            var nominee_relation = total_star_health_supertopup_float_json_data[0][9];
            var nominee_relation_txt = total_star_health_supertopup_float_json_data[0][10];
            var type_of_policy = total_star_health_supertopup_float_json_data[0][11];
            var deductible_prem = total_star_health_supertopup_float_json_data[0][12];
            var name_insured_sum_insured = total_star_health_supertopup_float_json_data[0][13];
            var basic_premium = total_star_health_supertopup_float_json_data[0][14];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            medi_star_health_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_starHealth_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_starHealth_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_starHealth_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_starHealth_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_starHealth_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td>';

            if(add_medi_starHealth_counter == 0){
                medi_star_health_tr += ' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="type_of_policy" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_deductible_premium()"><option value="null">Select Type Of Policy</option><option value="Gold Plan">Gold Plan</option><option value="Silver Plan">Silver Plan</option></select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="deductible_prem" name="deductible_prem[]" class="form-control deductible_prem" onchange="get_sum_insured_dropdown()"><option value="null">Select Deductible</option></select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option></select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value="'+basic_premium+'"></td></tr>';
            }
        });
        $("#first_table_tbody").append(medi_star_health_tr);

        $.each(total_star_health_supertopup_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            index = total_star_health_supertopup_float_json_data[key][0];
            var name_insured_member_name = total_star_health_supertopup_float_json_data[key][1];
            var name_insured_relation = total_star_health_supertopup_float_json_data[key][5];
            var nominee_name = total_star_health_supertopup_float_json_data[0][7];
            var nominee_relation = total_star_health_supertopup_float_json_data[0][9];
            var type_of_policy = total_star_health_supertopup_float_json_data[0][11];
            // var deductible_prem = total_star_health_supertopup_float_json_data[0][12];
            // var name_insured_sum_insured = total_star_health_supertopup_float_json_data[0][13];
            $("#name_insured_member_name_"+add_medi_starHealth_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_starHealth_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#type_of_policy").val(type_of_policy);
            // $("#deductible_prem").val(deductible_prem);
            // $("#name_insured_sum_insured").val(name_insured_sum_insured);
            get_deductible_premium();
            get_sum_insured_dropdown();    
        });  
        $.each(total_star_health_supertopup_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            var deductible_prem = total_star_health_supertopup_float_json_data[0][12];
            var name_insured_sum_insured = total_star_health_supertopup_float_json_data[0][13];
            $("#deductible_prem").val(deductible_prem);
            // $("#name_insured_sum_insured").val(name_insured_sum_insured);
            get_sum_insured_dropdown();  
        });   
        $.each(total_star_health_supertopup_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            var name_insured_sum_insured = total_star_health_supertopup_float_json_data[0][13];
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            // alert(name_insured_sum_insured)
            get_age_Comparision();
        });     
        
    }

    function edit_medi_ind_star_health_Comprehensive_policy(medi_star_health_allied_comprehensive_ind_policy_data_arr){
        var total_star_health_comprehensive_medi_ind_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_star_health_allied_comprehensive_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_comp_ind_policy_id  = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_star_health_comp_ind_policy_id ;
            var star_health_allied_insu_comp_ind_policy_fk_policy_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.star_health_allied_insu_comp_ind_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_star_health_allied_comprehensive_ind_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.fk_department_id;

            total_star_health_comprehensive_medi_ind_json_data = JSON.parse(medi_star_health_allied_comprehensive_ind_policy_data_arr.total_star_health_comprehensive_medi_ind_json_data);

            var years_of_premium = medi_star_health_allied_comprehensive_ind_policy_data_arr.years_of_premium;
            var tot_premium = medi_star_health_allied_comprehensive_ind_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_final_premium;
            var star_health_status = medi_star_health_allied_comprehensive_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_comprehensive_ind_policy_data_arr.star_health_del_flag;

            $("#years_of_premium").val(years_of_premium);
            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#medi_star_health_comp_ind_policy_id ").val(medi_star_health_comp_ind_policy_id );
        });
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var star_health_red_carpet_medi_length = total_star_health_comprehensive_medi_ind_json_data.length;

        $.each(total_star_health_comprehensive_medi_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            main_Mediclaim_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_comprehensive_medi_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_comprehensive_medi_ind_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_comprehensive_medi_ind_json_data[key][2];
            var name_insured_dob = total_star_health_comprehensive_medi_ind_json_data[key][3];
            var name_insured_age = total_star_health_comprehensive_medi_ind_json_data[key][4];
            var name_insured_relation = total_star_health_comprehensive_medi_ind_json_data[key][5];
            var name_insured_relation_txt = total_star_health_comprehensive_medi_ind_json_data[key][6];
            var nominee_name = total_star_health_comprehensive_medi_ind_json_data[key][7];
            var nominee_name_txt = total_star_health_comprehensive_medi_ind_json_data[key][8];
            var nominee_relation = total_star_health_comprehensive_medi_ind_json_data[key][9];
            var nominee_relation_txt = total_star_health_comprehensive_medi_ind_json_data[key][10];
            var name_insured_sum_insured = total_star_health_comprehensive_medi_ind_json_data[key][11];
            var basic_premium = total_star_health_comprehensive_medi_ind_json_data[key][12];
            // alert(name_insured_age);
            name_insured_age = parseInt(name_insured_age)+parseInt(1);
            // alert(name_insured_age);
            // alert(basic_premium);
            medi_star_health_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_starHealth_' + add_medi_starHealth_counter + '" onClick=removeMediclaimstarHealth(' + add_medi_starHealth_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_starHealth_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_starHealth_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_starHealth_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_starHealth_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_starHealth_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_starHealth_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_starHealth_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_starHealth_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_starHealth_counter + ')"><option value="null">Select Sum Insured</option>' + sum_insured_dropdown_val + '</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_starHealth_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td></tr>';

        });
        $("#Add_Mediclaim_starHealth").attr("onClick", "AddMediclaimstarHealth(" + (star_health_red_carpet_medi_length) + ")");
        $("#first_table_tbody").append(medi_star_health_tr);

        $.each(total_star_health_comprehensive_medi_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            index = total_star_health_comprehensive_medi_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_comprehensive_medi_ind_json_data[key][1];
            var name_insured_relation = total_star_health_comprehensive_medi_ind_json_data[key][5];
            var nominee_name = total_star_health_comprehensive_medi_ind_json_data[key][7];
            var nominee_relation = total_star_health_comprehensive_medi_ind_json_data[key][9];
            var name_insured_sum_insured = total_star_health_comprehensive_medi_ind_json_data[key][11];
            $("#name_insured_member_name_"+add_medi_starHealth_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_starHealth_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_starHealth_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_starHealth_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_medi_starHealth_counter).val(name_insured_sum_insured);
            get_basic_premium(add_medi_starHealth_counter);
        });         
    }

    $(document).ready(function(){
        setTimeout( function(){ 
        // Do something after 1 second 
        $("#update").click();
    }  , 20000 );

    });

    function edit_medi_float_star_health_Comprehensive_policy(medi_star_health_allied_comprehensive_float_policy_data_arr){
        var total_star_health_comprehensive_medi_float_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_star_health_allied_comprehensive_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_comp_float_policy_id  = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_star_health_comp_float_policy_id ;
            var star_health_allied_insu_comp_float_policy_fk_policy_id = medi_star_health_allied_comprehensive_float_policy_data_arr.star_health_allied_insu_comp_float_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_comprehensive_float_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_star_health_allied_comprehensive_float_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_star_health_allied_comprehensive_float_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_comprehensive_float_policy_data_arr.fk_department_id;

            total_star_health_comprehensive_medi_float_json_data = JSON.parse(medi_star_health_allied_comprehensive_float_policy_data_arr.total_star_health_comprehensive_medi_float_json_data);

            var years_of_premium = medi_star_health_allied_comprehensive_float_policy_data_arr.years_of_premium;
            var tot_premium = medi_star_health_allied_comprehensive_float_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_final_premium;
            var max_age = medi_star_health_allied_comprehensive_float_policy_data_arr.max_age;
            var star_health_status = medi_star_health_allied_comprehensive_float_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_comprehensive_float_policy_data_arr.star_health_del_flag;

            $("#years_of_premium").val(years_of_premium);
            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
            $("#medi_star_health_comp_float_policy_id").val(medi_star_health_comp_float_policy_id);
        });
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var Family_size_count = total_star_health_comprehensive_medi_float_json_data.length;

        $.each(total_star_health_comprehensive_medi_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            main_Mediclaim_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_comprehensive_medi_float_json_data[key][0];
            var name_insured_member_name = total_star_health_comprehensive_medi_float_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_comprehensive_medi_float_json_data[key][2];
            var name_insured_dob = total_star_health_comprehensive_medi_float_json_data[key][3];
            var name_insured_age = total_star_health_comprehensive_medi_float_json_data[key][4];
            var name_insured_relation = total_star_health_comprehensive_medi_float_json_data[key][5];
            var name_insured_relation_txt = total_star_health_comprehensive_medi_float_json_data[key][6];
            var nominee_name = total_star_health_comprehensive_medi_float_json_data[0][7];
            var nominee_name_txt = total_star_health_comprehensive_medi_float_json_data[0][8];
            var nominee_relation = total_star_health_comprehensive_medi_float_json_data[0][9];
            var nominee_relation_txt = total_star_health_comprehensive_medi_float_json_data[0][10];
            var name_insured_sum_insured = total_star_health_comprehensive_medi_float_json_data[0][11];
            var basic_premium = total_star_health_comprehensive_medi_float_json_data[0][12];
            name_insured_age = parseInt(name_insured_age)+parseInt(1);
            medi_star_health_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_starHealth_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_starHealth_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_starHealth_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_starHealth_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_starHealth_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td>';

                if(add_medi_starHealth_counter == 0){
                    medi_star_health_tr += ' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option>' + sum_insured_dropdown_val + '</select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value="'+basic_premium+'"></td></tr>';
                }
        });
        $("#first_table_tbody").append(medi_star_health_tr);

        $.each(total_star_health_comprehensive_medi_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            index = total_star_health_comprehensive_medi_float_json_data[key][0];
            var name_insured_member_name = total_star_health_comprehensive_medi_float_json_data[key][1];
            var name_insured_relation = total_star_health_comprehensive_medi_float_json_data[key][5];
            var nominee_name = total_star_health_comprehensive_medi_float_json_data[0][7];
            var nominee_relation = total_star_health_comprehensive_medi_float_json_data[0][9];
            var name_insured_sum_insured = total_star_health_comprehensive_medi_float_json_data[0][11];

            var name_insured_age = total_star_health_comprehensive_medi_float_json_data[key][4];
            $("#name_insured_member_name_"+add_medi_starHealth_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_starHealth_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#name_insured_sum_insured").val(name_insured_sum_insured);

            
            // alert(name_insured_age);
            get_age_Comparision();
            
        });         
    }

    function edit_medi_ind_star_health_red_arpet_policy(medi_star_health_allied_red_carpet_ind_policy_data_arr){
        var total_star_health_red_carpet_medi_ind_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_star_health_allied_red_carpet_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_ind_policy_id  = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_star_health_ind_policy_id ;
            var star_health_allied_insu_red_carpet_ind_policy_fk_policy_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.star_health_allied_insu_red_carpet_ind_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_star_health_allied_red_carpet_ind_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.fk_department_id;

            total_star_health_red_carpet_medi_ind_json_data = JSON.parse(medi_star_health_allied_red_carpet_ind_policy_data_arr.total_star_health_red_carpet_medi_ind_json_data);

            var years_of_premium = medi_star_health_allied_red_carpet_ind_policy_data_arr.years_of_premium;
            var tot_premium = medi_star_health_allied_red_carpet_ind_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_final_premium;
            var star_health_status = medi_star_health_allied_red_carpet_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_red_carpet_ind_policy_data_arr.star_health_del_flag;

            $("#years_of_premium").val(years_of_premium);
            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#medi_star_health_ind_policy_id ").val(medi_star_health_ind_policy_id );
        });
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var star_health_red_carpet_medi_length = total_star_health_red_carpet_medi_ind_json_data.length;

        $.each(total_star_health_red_carpet_medi_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            main_Mediclaim_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_red_carpet_medi_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_red_carpet_medi_ind_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_red_carpet_medi_ind_json_data[key][2];
            var name_insured_dob = total_star_health_red_carpet_medi_ind_json_data[key][3];
            var name_insured_age = total_star_health_red_carpet_medi_ind_json_data[key][4];
            var name_insured_relation = total_star_health_red_carpet_medi_ind_json_data[key][5];
            var name_insured_relation_txt = total_star_health_red_carpet_medi_ind_json_data[key][6];
            var nominee_name = total_star_health_red_carpet_medi_ind_json_data[key][7];
            var nominee_name_txt = total_star_health_red_carpet_medi_ind_json_data[key][8];
            var nominee_relation = total_star_health_red_carpet_medi_ind_json_data[key][9];
            var nominee_relation_txt = total_star_health_red_carpet_medi_ind_json_data[key][10];
            var name_insured_sum_insured = total_star_health_red_carpet_medi_ind_json_data[key][11];
            var basic_premium = total_star_health_red_carpet_medi_ind_json_data[key][12];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);
            // alert(name_insured_member_name);
            medi_star_health_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_starHealth_' + add_medi_starHealth_counter + '" onClick=removeMediclaimstarHealth(' + add_medi_starHealth_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_starHealth_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_starHealth_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_starHealth_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_starHealth_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_starHealth_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_starHealth_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_starHealth_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_starHealth_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_starHealth_counter + ')"><option value="null">Select Sum Insured</option>' + sum_insured_dropdown_val + '</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_starHealth_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td></tr>';

        });
        $("#Add_Mediclaim_starHealth").attr("onClick", "AddMediclaimstarHealth(" + (star_health_red_carpet_medi_length) + ")");
        $("#first_table_tbody").append(medi_star_health_tr);

        $.each(total_star_health_red_carpet_medi_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            index = total_star_health_red_carpet_medi_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_red_carpet_medi_ind_json_data[key][1];
            var name_insured_relation = total_star_health_red_carpet_medi_ind_json_data[key][5];
            var nominee_name = total_star_health_red_carpet_medi_ind_json_data[key][7];
            var nominee_relation = total_star_health_red_carpet_medi_ind_json_data[key][9];
            var name_insured_sum_insured = total_star_health_red_carpet_medi_ind_json_data[key][11];
            // alert(name_insured_member_name);
            
            $("#name_insured_member_name_"+add_medi_starHealth_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_starHealth_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_starHealth_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_starHealth_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_medi_starHealth_counter).val(name_insured_sum_insured);
            get_basic_premium(add_medi_starHealth_counter);
        });         
    }

    function edit_medi_float_star_health_red_arpet_policy(medi_star_health_allied_red_carpet_float_policy_data_arr){
        var total_star_health_red_carpet_medi_float_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_star_health_allied_red_carpet_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_float_policy_id  = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_star_health_float_policy_id ;
            var star_health_allied_insu_red_carpet_float_policy_fk_policy_id = medi_star_health_allied_red_carpet_float_policy_data_arr.star_health_allied_insu_red_carpet_float_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_red_carpet_float_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_star_health_allied_red_carpet_float_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_star_health_allied_red_carpet_float_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_red_carpet_float_policy_data_arr.fk_department_id;

            total_star_health_red_carpet_medi_float_json_data = JSON.parse(medi_star_health_allied_red_carpet_float_policy_data_arr.total_star_health_red_carpet_medi_float_json_data);

            var years_of_premium = medi_star_health_allied_red_carpet_float_policy_data_arr.years_of_premium;
            var tot_premium = medi_star_health_allied_red_carpet_float_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_final_premium;
            var max_age = medi_star_health_allied_red_carpet_float_policy_data_arr.max_age;
            var star_health_status = medi_star_health_allied_red_carpet_float_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_red_carpet_float_policy_data_arr.star_health_del_flag;

            $("#years_of_premium").val(years_of_premium);
            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
            $("#medi_star_health_float_policy_id").val(medi_star_health_float_policy_id);
        });
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var Family_size_count = total_star_health_red_carpet_medi_float_json_data.length;

        $.each(total_star_health_red_carpet_medi_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            main_Mediclaim_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_red_carpet_medi_float_json_data[key][0];
            var name_insured_member_name = total_star_health_red_carpet_medi_float_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_red_carpet_medi_float_json_data[key][2];
            var name_insured_dob = total_star_health_red_carpet_medi_float_json_data[key][3];
            var name_insured_age = total_star_health_red_carpet_medi_float_json_data[key][4];
            var name_insured_relation = total_star_health_red_carpet_medi_float_json_data[key][5];
            var name_insured_relation_txt = total_star_health_red_carpet_medi_float_json_data[key][6];
            var nominee_name = total_star_health_red_carpet_medi_float_json_data[0][7];
            var nominee_name_txt = total_star_health_red_carpet_medi_float_json_data[0][8];
            var nominee_relation = total_star_health_red_carpet_medi_float_json_data[0][9];
            var nominee_relation_txt = total_star_health_red_carpet_medi_float_json_data[0][10];
            var name_insured_sum_insured = total_star_health_red_carpet_medi_float_json_data[0][11];
            var basic_premium = total_star_health_red_carpet_medi_float_json_data[0][12];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            medi_star_health_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_starHealth_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_starHealth_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_starHealth_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_starHealth_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_starHealth_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td>';

                if(add_medi_starHealth_counter == 0){
                    medi_star_health_tr += ' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option>' + sum_insured_dropdown_val + '</select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value="'+basic_premium+'"></td></tr>';
                }
        });
        $("#first_table_tbody").append(medi_star_health_tr);

        $.each(total_star_health_red_carpet_medi_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            index = total_star_health_red_carpet_medi_float_json_data[key][0];
            var name_insured_member_name = total_star_health_red_carpet_medi_float_json_data[key][1];
            var name_insured_relation = total_star_health_red_carpet_medi_float_json_data[key][5];
            var nominee_name = total_star_health_red_carpet_medi_float_json_data[0][7];
            var nominee_relation = total_star_health_red_carpet_medi_float_json_data[0][9];
            var name_insured_sum_insured = total_star_health_red_carpet_medi_float_json_data[0][11];
            $("#name_insured_member_name_"+add_medi_starHealth_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_starHealth_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            get_age_Comparision();
            
        });         
    }

    function edit_medi_ind_max_bupa_reassure_policy(medi_ind_max_bupa_reassure_policy_data_arr){
        var total_max_bupa_medi_reassure_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_ind_max_bupa_reassure_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_max_bupa_reassure_ind_policy_id = medi_ind_max_bupa_reassure_policy_data_arr.medi_max_bupa_reassure_ind_policy_id;
            var medi_max_bupa_reassure_ind_policy_fk_policy_id = medi_ind_max_bupa_reassure_policy_data_arr.medi_max_bupa_reassure_ind_policy_fk_policy_id;
            var fk_policy_type_id = medi_ind_max_bupa_reassure_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_ind_max_bupa_reassure_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_ind_max_bupa_reassure_policy_data_arr.fk_company_id;
            var fk_department_id = medi_ind_max_bupa_reassure_policy_data_arr.fk_department_id;

            total_max_bupa_medi_reassure_json_data = JSON.parse(medi_ind_max_bupa_reassure_policy_data_arr.total_max_bupa_medi_reassure_json_data);

            var years_of_premium = medi_ind_max_bupa_reassure_policy_data_arr.years_of_premium;
            var region = medi_ind_max_bupa_reassure_policy_data_arr.region;
            var first_year_rate = medi_ind_max_bupa_reassure_policy_data_arr.first_year_rate;
            var second_year_rate = medi_ind_max_bupa_reassure_policy_data_arr.second_year_rate;
            var third_year_rate = medi_ind_max_bupa_reassure_policy_data_arr.third_year_rate;
            var first_year_tot = medi_ind_max_bupa_reassure_policy_data_arr.first_year_tot;
            var second_year_tot = medi_ind_max_bupa_reassure_policy_data_arr.second_year_tot;
            var third_year_tot = medi_ind_max_bupa_reassure_policy_data_arr.third_year_tot;
            var tot_term_disc = medi_ind_max_bupa_reassure_policy_data_arr.tot_term_disc;

            $("#years_of_premium").val(years_of_premium);
            $("#region").val(region);
            $("#first_year_rate").val(first_year_rate);
            $("#second_year_rate").val(second_year_rate);
            $("#third_year_rate").val(third_year_rate);
            $("#first_year_tot").val(first_year_tot);
            $("#second_year_tot").val(second_year_tot);
            $("#third_year_tot").val(third_year_tot);
            $("#tot_term_disc").val(tot_term_disc);

            var tot_premium = medi_ind_max_bupa_reassure_policy_data_arr.tot_premium;
            var stand_instu_rate = medi_ind_max_bupa_reassure_policy_data_arr.stand_instu_rate;
            var stand_instu_tot = medi_ind_max_bupa_reassure_policy_data_arr.stand_instu_tot;
            var doctor_disc_per = medi_ind_max_bupa_reassure_policy_data_arr.doctor_disc_per;
            var doctor_disc_tot = medi_ind_max_bupa_reassure_policy_data_arr.doctor_disc_tot;
            var family_disc_per = medi_ind_max_bupa_reassure_policy_data_arr.family_disc_per;
            var family_disc_tot = medi_ind_max_bupa_reassure_policy_data_arr.family_disc_tot;
            var gross_premium_tot = medi_ind_max_bupa_reassure_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_ind_max_bupa_reassure_policy_data_arr.gross_premium_tot_new;

            $("#tot_premium").val(tot_premium);
            $("#stand_instu_rate").val(stand_instu_rate);
            $("#stand_instu_tot").val(stand_instu_tot);
            $("#doctor_disc_per").val(doctor_disc_per);
            $("#doctor_disc_tot").val(doctor_disc_tot);
            $("#family_disc_per").val(family_disc_per);
            $("#family_disc_tot").val(family_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);

            var medi_cgst_rate = medi_ind_max_bupa_reassure_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_ind_max_bupa_reassure_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_ind_max_bupa_reassure_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_ind_max_bupa_reassure_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_ind_max_bupa_reassure_policy_data_arr.medi_final_premium;
            var max_bupa_status = medi_ind_max_bupa_reassure_policy_data_arr.max_bupa_status;
            var max_bupa_del_flag = medi_ind_max_bupa_reassure_policy_data_arr.max_bupa_del_flag;
            // alert(medi_final_premium);

            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#medi_max_bupa_reassure_ind_policy_id").val(medi_max_bupa_reassure_ind_policy_id);
        });
        var medi_max_bupa_tr = "";
        var add_medi_maxBupa_counter = "";
        var index = "";
        var max_bupa_medi_length = total_max_bupa_medi_reassure_json_data.length;
        // var main_Mediclaim_maxBupa = [];

        $.each(total_max_bupa_medi_reassure_json_data, function(key, val) {
            // alert(sum_insured_dropdown_val);
            add_medi_maxBupa_counter = key;
            main_Mediclaim_maxBupa.push(add_medi_maxBupa_counter);
            index = total_max_bupa_medi_reassure_json_data[key][0];
            var name_insured_member_name = total_max_bupa_medi_reassure_json_data[key][1];
            var name_insured_member_name_txt = total_max_bupa_medi_reassure_json_data[key][2];
            var name_insured_dob = total_max_bupa_medi_reassure_json_data[key][3];
            var name_insured_age = total_max_bupa_medi_reassure_json_data[key][4];
            var name_insured_relation = total_max_bupa_medi_reassure_json_data[key][5];
            var name_insured_relation_txt = total_max_bupa_medi_reassure_json_data[key][6];
            var nominee_name = total_max_bupa_medi_reassure_json_data[key][7];
            var nominee_name_txt = total_max_bupa_medi_reassure_json_data[key][8];
            var nominee_relation = total_max_bupa_medi_reassure_json_data[key][9];
            var nominee_relation_txt = total_max_bupa_medi_reassure_json_data[key][10];
            var name_insured_sum_insured = total_max_bupa_medi_reassure_json_data[key][11];
            var basic_premium = total_max_bupa_medi_reassure_json_data[key][12];
            var pab_type = total_max_bupa_medi_reassure_json_data[key][13];
            var pab_prem = total_max_bupa_medi_reassure_json_data[key][14];
            var hospital_cash_type = total_max_bupa_medi_reassure_json_data[key][15];
            var hospital_cash_prem = total_max_bupa_medi_reassure_json_data[key][16];
            var safeguard_benefi_type = total_max_bupa_medi_reassure_json_data[key][17];
            var safeguard_benefi_prem = total_max_bupa_medi_reassure_json_data[key][18];
            var tot_prem = total_max_bupa_medi_reassure_json_data[key][19];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            medi_max_bupa_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_maxBupa_' + add_medi_maxBupa_counter + '" onClick=removeMediclaimmaxBupa(' + add_medi_maxBupa_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_maxBupa_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_maxBupa_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_maxBupa_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_maxBupa_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_maxBupa_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_maxBupa_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_maxBupa_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_maxBupa_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_maxBupa_counter + ')"><option value="null">Select Sum Insured</option>' + sum_insured_dropdown_val + '</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_maxBupa_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td><td><select style="width:110px;" id="pab_type_' + add_medi_maxBupa_counter + '" name="pab_type[]" class="form-control pab_type"  onchange="get_pab_type_premium(' + add_medi_maxBupa_counter + ')"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="pab_prem[]" id="pab_prem_' + add_medi_maxBupa_counter + '" class="form-control mt-1 pab_prem" value="'+pab_prem+'"></td><td><select style="width:110px;" name="hospital_cash_type[]" id="hospital_cash_type_' + add_medi_maxBupa_counter + '" class="form-control hospital_cash_type" onchange="get_hospital_cash_type_prem(' + add_medi_maxBupa_counter + ')" ><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option></select><input type="text" name="hospital_cash_prem[]" id="hospital_cash_prem_' + add_medi_maxBupa_counter + '" class="form-control mt-1 hospital_cash_prem" value="'+hospital_cash_prem+'"></td><td><select style="width:110px;" name="safeguard_benefi_type[]" id="safeguard_benefi_type_' + add_medi_maxBupa_counter + '" class="form-control safeguard_benefi_type" onchange="get_safeguard_benefi_type_prem(' + add_medi_maxBupa_counter + ')" ><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option></select><input style="width:100px;" type="text" name="safeguard_benefi_prem[]" id="safeguard_benefi_prem_' + add_medi_maxBupa_counter + '" value="'+safeguard_benefi_prem+'" class="form-control mt-1 safeguard_benefi_prem" > </td><td width="8%"><input style="width:100px;" type="text" name="tot_prem[]" id="tot_prem_' + add_medi_maxBupa_counter + '" value="'+tot_prem+'" class="form-control tot_prem" ></td> </tr>';

        });
        $("#Add_Mediclaim_maxBupa").attr("onClick", "AddMediclaimmaxBupa(" + (max_bupa_medi_length) + ")");
        $("#first_table_tbody").append(medi_max_bupa_tr);

        $.each(total_max_bupa_medi_reassure_json_data, function(key, val) {
            add_medi_maxBupa_counter = key;
            // main_Mediclaim_maxBupa.push(add_medi_maxBupa_counter);
            index = total_max_bupa_medi_reassure_json_data[key][0];
            var name_insured_member_name = total_max_bupa_medi_reassure_json_data[key][1];
            var name_insured_relation = total_max_bupa_medi_reassure_json_data[key][5];
            var nominee_name = total_max_bupa_medi_reassure_json_data[key][7];
            var nominee_relation = total_max_bupa_medi_reassure_json_data[key][9];
            var name_insured_sum_insured = total_max_bupa_medi_reassure_json_data[key][11];
            var pab_type = total_max_bupa_medi_reassure_json_data[key][13];
            var hospital_cash_type = total_max_bupa_medi_reassure_json_data[key][15];
            var safeguard_benefi_type = total_max_bupa_medi_reassure_json_data[key][17];

            $("#name_insured_member_name_"+add_medi_maxBupa_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_maxBupa_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_maxBupa_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_maxBupa_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_medi_maxBupa_counter).val(name_insured_sum_insured);
            $("#pab_type_"+add_medi_maxBupa_counter).val(pab_type);
            $("#hospital_cash_type_"+add_medi_maxBupa_counter).val(hospital_cash_type);
            $("#safeguard_benefi_type_"+add_medi_maxBupa_counter).val(safeguard_benefi_type);
            // get_basic_premium(add_medi_maxBupa_counter);
        });   
        Term_Discount_table();
        $.each(total_max_bupa_medi_reassure_json_data, function(key, val) {
            add_medi_maxBupa_counter = key;
            get_basic_premium(add_medi_maxBupa_counter);
        });  
    }

    function edit_medi_float_max_bupa_reassure_policy(medi_float_max_bupa_reassure_policy_data_arr){
        var total_max_bupa_medi_float_reassure_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_float_max_bupa_reassure_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_max_bupa_reassure_float_policy_id = medi_float_max_bupa_reassure_policy_data_arr.medi_max_bupa_reassure_float_policy_id;
            var medi_max_bupa_reassure_floater_policy_fk_policy_id = medi_float_max_bupa_reassure_policy_data_arr.medi_max_bupa_reassure_floater_policy_fk_policy_id;
            var fk_policy_type_id = medi_float_max_bupa_reassure_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_float_max_bupa_reassure_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_float_max_bupa_reassure_policy_data_arr.fk_company_id;
            var fk_department_id = medi_float_max_bupa_reassure_policy_data_arr.fk_department_id;

            total_max_bupa_medi_float_reassure_json_data = JSON.parse(medi_float_max_bupa_reassure_policy_data_arr.total_max_bupa_medi_float_reassure_json_data);

            var years_of_premium = medi_float_max_bupa_reassure_policy_data_arr.years_of_premium;
            var region = medi_float_max_bupa_reassure_policy_data_arr.region;
            var first_year_rate = medi_float_max_bupa_reassure_policy_data_arr.first_year_rate;
            var second_year_rate = medi_float_max_bupa_reassure_policy_data_arr.second_year_rate;
            var third_year_rate = medi_float_max_bupa_reassure_policy_data_arr.third_year_rate;
            var first_year_tot = medi_float_max_bupa_reassure_policy_data_arr.first_year_tot;
            var second_year_tot = medi_float_max_bupa_reassure_policy_data_arr.second_year_tot;
            var third_year_tot = medi_float_max_bupa_reassure_policy_data_arr.third_year_tot;
            var tot_term_disc = medi_float_max_bupa_reassure_policy_data_arr.tot_term_disc;

            $("#years_of_premium").val(years_of_premium);
            $("#region").val(region);
            $("#first_year_rate").val(first_year_rate);
            $("#second_year_rate").val(second_year_rate);
            $("#third_year_rate").val(third_year_rate);
            $("#first_year_tot").val(first_year_tot);
            $("#second_year_tot").val(second_year_tot);
            $("#third_year_tot").val(third_year_tot);
            $("#tot_term_disc").val(tot_term_disc);

            var tot_premium = medi_float_max_bupa_reassure_policy_data_arr.tot_premium;
            var stand_instu_rate = medi_float_max_bupa_reassure_policy_data_arr.stand_instu_rate;
            var stand_instu_tot = medi_float_max_bupa_reassure_policy_data_arr.stand_instu_tot;
            var doctor_disc_per = medi_float_max_bupa_reassure_policy_data_arr.doctor_disc_per;
            var doctor_disc_tot = medi_float_max_bupa_reassure_policy_data_arr.doctor_disc_tot;
            var gross_premium_tot = medi_float_max_bupa_reassure_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_float_max_bupa_reassure_policy_data_arr.gross_premium_tot_new;

            $("#tot_premium").val(tot_premium);
            $("#stand_instu_rate").val(stand_instu_rate);
            $("#stand_instu_tot").val(stand_instu_tot);
            $("#doctor_disc_per").val(doctor_disc_per);
            $("#doctor_disc_tot").val(doctor_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);

            var medi_cgst_rate = medi_float_max_bupa_reassure_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_float_max_bupa_reassure_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_float_max_bupa_reassure_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_float_max_bupa_reassure_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_float_max_bupa_reassure_policy_data_arr.medi_final_premium;
            var max_age = medi_float_max_bupa_reassure_policy_data_arr.max_age;
            var max_bupa_status = medi_float_max_bupa_reassure_policy_data_arr.max_bupa_status;
            var max_bupa_del_flag = medi_float_max_bupa_reassure_policy_data_arr.max_bupa_del_flag;
            // alert(medi_final_premium);

            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
            $("#medi_max_bupa_reassure_float_policy_id").val(medi_max_bupa_reassure_float_policy_id);
        });
        var medi_max_bupa_tr = "";
        var add_medi_maxBupa_counter = "";
        var index = "";
        var Family_size_count = total_max_bupa_medi_float_reassure_json_data.length;
        // var main_Mediclaim_maxBupa = [];

        $.each(total_max_bupa_medi_float_reassure_json_data, function(key, val) {
            // alert(sum_insured_dropdown_val);
            add_medi_maxBupa_counter = key;
            // main_Mediclaim_maxBupa.push(add_medi_maxBupa_counter);
            index = total_max_bupa_medi_float_reassure_json_data[key][0];
            var name_insured_member_name = total_max_bupa_medi_float_reassure_json_data[key][1];
            var name_insured_member_name_txt = total_max_bupa_medi_float_reassure_json_data[key][2];
            var name_insured_dob = total_max_bupa_medi_float_reassure_json_data[key][3];
            var name_insured_age = total_max_bupa_medi_float_reassure_json_data[key][4];
            var name_insured_relation = total_max_bupa_medi_float_reassure_json_data[key][5];
            var name_insured_relation_txt = total_max_bupa_medi_float_reassure_json_data[key][6];
            var nominee_name = total_max_bupa_medi_float_reassure_json_data[0][7];
            var nominee_name_txt = total_max_bupa_medi_float_reassure_json_data[0][8];
            var nominee_relation = total_max_bupa_medi_float_reassure_json_data[0][9];
            var nominee_relation_txt = total_max_bupa_medi_float_reassure_json_data[0][10];
            var name_insured_sum_insured = total_max_bupa_medi_float_reassure_json_data[0][11];
            var basic_premium = total_max_bupa_medi_float_reassure_json_data[0][12];
            var pab_type = total_max_bupa_medi_float_reassure_json_data[0][13];
            var pab_prem = total_max_bupa_medi_float_reassure_json_data[0][14];
            var hospital_cash_type = total_max_bupa_medi_float_reassure_json_data[0][15];
            var hospital_cash_prem = total_max_bupa_medi_float_reassure_json_data[0][16];
            var safeguard_benefi_type = total_max_bupa_medi_float_reassure_json_data[0][17];
            var safeguard_benefi_prem = total_max_bupa_medi_float_reassure_json_data[0][18];
            var tot_prem = total_max_bupa_medi_float_reassure_json_data[0][19];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            medi_max_bupa_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_maxBupa_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_maxBupa_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_maxBupa_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_maxBupa_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_maxBupa_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td>';

            if(add_medi_maxBupa_counter == 0){
                medi_max_bupa_tr +='<td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option>' + sum_insured_dropdown_val + '</select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value="'+basic_premium+'"></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" id="pab_type" name="pab_type[]" class="form-control pab_type"  onchange="get_pab_type_premium()"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="pab_prem[]" id="pab_prem" class="form-control mt-1 pab_prem" value="'+pab_prem+'"></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" name="hospital_cash_type[]" id="hospital_cash_type" class="form-control hospital_cash_type" onchange="get_hospital_cash_type_prem()" ><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option></select><input type="text" name="hospital_cash_prem[]" id="hospital_cash_prem" class="form-control mt-1 hospital_cash_prem" value="'+hospital_cash_prem+'"></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" name="safeguard_benefi_type[]" id="safeguard_benefi_type" class="form-control safeguard_benefi_type" onchange="get_safeguard_benefi_type_prem()" ><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option></select><input style="width:100px;" type="text" name="safeguard_benefi_prem[]" id="safeguard_benefi_prem" value="'+safeguard_benefi_prem+'" class="form-control mt-1 safeguard_benefi_prem" > </td><td width="8%" rowspan="'+Family_size_count+'"><input style="width:100px;" type="text" name="tot_prem[]" id="tot_prem" value="'+tot_prem+'" class="form-control tot_prem" ></td> </tr>';
            }
        });
        $("#first_table_tbody").append(medi_max_bupa_tr);

        $.each(total_max_bupa_medi_float_reassure_json_data, function(key, val) {
            add_medi_maxBupa_counter = key;
            // main_Mediclaim_maxBupa.push(add_medi_maxBupa_counter);
            index = total_max_bupa_medi_float_reassure_json_data[key][0];
            var name_insured_member_name = total_max_bupa_medi_float_reassure_json_data[key][1];
            var name_insured_relation = total_max_bupa_medi_float_reassure_json_data[key][5];
            var nominee_name = total_max_bupa_medi_float_reassure_json_data[0][7];
            var nominee_relation = total_max_bupa_medi_float_reassure_json_data[0][9];
            var name_insured_sum_insured = total_max_bupa_medi_float_reassure_json_data[0][11];
            var pab_type = total_max_bupa_medi_float_reassure_json_data[0][13];
            var hospital_cash_type = total_max_bupa_medi_float_reassure_json_data[0][15];
            var safeguard_benefi_type = total_max_bupa_medi_float_reassure_json_data[0][17];

            // alert(nominee_name);

            $("#name_insured_member_name_"+add_medi_maxBupa_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_maxBupa_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            $("#pab_type").val(pab_type);
            $("#hospital_cash_type").val(hospital_cash_type);
            $("#safeguard_benefi_type").val(safeguard_benefi_type);
            
        });   
        Term_Discount_table();
        $.each(total_max_bupa_medi_float_reassure_json_data, function(key, val) {
            add_medi_maxBupa_counter = key;
            get_age_Comparision();
        });
    }

    function edit_Personal_Accident(ind_personal_accident_policy_data_arr){
        var total_pa_ind_json_data ="";
        $("#first_table_tbody").empty();
        $.each(ind_personal_accident_policy_data_arr, function(key_other, val_other) {
            var paccident_policy_id = ind_personal_accident_policy_data_arr.paccident_policy_id;
            var personal_accident_policy_ind_fk_policy_id = ind_personal_accident_policy_data_arr.personal_accident_policy_ind_fk_policy_id;
            var fk_policy_type_id = ind_personal_accident_policy_data_arr.fk_policy_type_id
            var fk_company_id = ind_personal_accident_policy_data_arr.fk_company_id;
            var fk_department_id = ind_personal_accident_policy_data_arr.fk_department_id;
            var policy_name_txt = ind_personal_accident_policy_data_arr.policy_name_txt;
            total_pa_ind_json_data = JSON.parse(ind_personal_accident_policy_data_arr.total_pa_ind_json_data);

            var tot_premium = ind_personal_accident_policy_data_arr.tot_premium;
            var less_disc_rate = ind_personal_accident_policy_data_arr.less_disc_rate;
            var less_disc_tot = ind_personal_accident_policy_data_arr.less_disc_tot;
            var gross_premium = ind_personal_accident_policy_data_arr.gross_premium;
            var gross_premium_new = ind_personal_accident_policy_data_arr.gross_premium_new;
            var medi_cgst_rate = ind_personal_accident_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = ind_personal_accident_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = ind_personal_accident_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = ind_personal_accident_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = ind_personal_accident_policy_data_arr.medi_final_premium;

            var personal_accident_status = ind_personal_accident_policy_data_arr.personal_accident_status;
            var personal_accident_del_flag = ind_personal_accident_policy_data_arr.personal_accident_del_flag;

            $("#tot_premium").val(tot_premium);
            $("#less_disc_rate").val(less_disc_rate);
            $("#less_disc_tot").val(less_disc_tot);
            $("#gross_premium").val(gross_premium);
            $("#gross_premium_new").val(gross_premium_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#paccident_policy_id").val(paccident_policy_id);
        });
        var tr_table = "";
        var add_pa_counter = "";
        var index = "";
        var Personal_accident_length = total_pa_ind_json_data.length;
        $.each(total_pa_ind_json_data, function(key, val) {
            add_pa_counter = key;
            main_Personal_accident.push(add_pa_counter);
            index = total_pa_ind_json_data[key][0];
            var name_insured_member_name = total_pa_ind_json_data[key][1];
            var name_insured_member_name_txt = total_pa_ind_json_data[key][2];
            var name_insured_dob = total_pa_ind_json_data[key][3];
            var name_insured_age = total_pa_ind_json_data[key][4];
            var name_insured_relation = total_pa_ind_json_data[key][5];
            var name_insured_relation_txt = total_pa_ind_json_data[key][6];
            var nominee_name = total_pa_ind_json_data[key][7];
            var nominee_name_txt = total_pa_ind_json_data[key][8];
            var nominee_relation = total_pa_ind_json_data[key][9];
            var nominee_relation_txt = total_pa_ind_json_data[key][10];
            var name_insured_sum_insured_1 = total_pa_ind_json_data[key][11];
            var name_insured_sum_insured_2 = total_pa_ind_json_data[key][12];
            var name_insured_sum_insured_3 = total_pa_ind_json_data[key][13];
            var name_insured_sum_insured_4 = total_pa_ind_json_data[key][14];
            var sum_insured = total_pa_ind_json_data[key][15];
            var risk_group_1 = total_pa_ind_json_data[key][16];
            var risk_group_2 = total_pa_ind_json_data[key][17];
            var risk_group_3 = total_pa_ind_json_data[key][18];
            var risk_group_4 = total_pa_ind_json_data[key][19];
            var name_insured_premium_1 = total_pa_ind_json_data[key][20];
            var name_insured_premium_2 = total_pa_ind_json_data[key][21];
            var name_insured_premium_3 = total_pa_ind_json_data[key][22];
            var name_insured_premium_4 = total_pa_ind_json_data[key][23];
            var premium = total_pa_ind_json_data[key][24];

            tr_table += '<tr><td width="2%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_personal_accident_'+add_pa_counter+'" onClick=removePersonal_accident('+add_pa_counter+') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_pa_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_pa_counter+')"><option value="null">Select Member Names</option>' + option_val_data + '</select></td><td width="8%"><input style="width:100px;" type="text" id="name_insured_dob_'+add_pa_counter+'" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td width="5%"><input style="width:55px;" type="text" id="name_insured_age_'+add_pa_counter+'" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td> <td><select style="width:120px;" id="name_insured_relation_' + add_pa_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_pa_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_pa_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td> <td width="20%">Table 1:<br/><select style="width:110px;" id="name_insured_sum_insured_'+add_pa_counter+'_1" name="name_insured_sum_insured_1[]" class="form-control name_insured_sum_insured_1" onchange="get_premium('+add_pa_counter+',1)"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select><br/>Table 2:<br/><select style="width:110px;" id="name_insured_sum_insured_'+add_pa_counter+'_2" name="name_insured_sum_insured_2[]" class="form-control name_insured_sum_insured_2 mt-1" onchange="get_premium('+add_pa_counter+',2)"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select><br/>Table 3:<br/><select style="width:110px;" id="name_insured_sum_insured_'+add_pa_counter+'_3" name="name_insured_sum_insured_3[]" class="form-control name_insured_sum_insured_3 mt-1" onchange="get_premium('+add_pa_counter+',3)"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select><br/>Table 4:<br/><select style="width:110px;" id="name_insured_sum_insured_'+add_pa_counter+'_4" name="name_insured_sum_insured_4[]" class="form-control name_insured_sum_insured_4 mt-1" onchange="get_premium('+add_pa_counter+',4)"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select><br/>Sum Insured:<br/><input style="width:110px;" type="text" id="sum_insured_'+add_pa_counter+'" name="sum_insured[]" class="form-control sum_insured mt-1" value="'+sum_insured+'"></div></td> <td width="20%">Table 1:<br/><select style="width:110px;" id="risk_group_'+add_pa_counter+'_1" name="risk_group_1[]" class="form-control risk_group_1" onchange="get_premium('+add_pa_counter+',1)"><option value="null">Select Risk Group</option><option value="Risk Group 1">Risk Group 1</option><option value="Risk Group 2">Risk Group 2</option><option value="Risk Group 3">Risk Group 3</option></select><br/>Table 2:<br/><select style="width:110px;" id="risk_group_'+add_pa_counter+'_2" name="risk_group_2[]" class="form-control risk_group_2 mt-1" onchange="get_premium('+add_pa_counter+',2)"><option value="null">Select Risk Group</option><option value="Risk Group 1">Risk Group 1</option><option value="Risk Group 2">Risk Group 2</option><option value="Risk Group 3">Risk Group 3</option></select><br/>Table 3:<br/><select style="width:110px;" id="risk_group_'+add_pa_counter+'_3" name="risk_group_3[]" class="form-control risk_group_3 mt-1" onchange="get_premium('+add_pa_counter+',3)"><option value="null">Select Risk Group</option><option value="Risk Group 1">Risk Group 1</option><option value="Risk Group 2">Risk Group 2</option><option value="Risk Group 3">Risk Group 3</option></select><br/>Table 4:<br/><select style="width:110px;" id="risk_group_'+add_pa_counter+'_4" name="risk_group_4[]" class="form-control risk_group_4 mt-1" onchange="get_premium('+add_pa_counter+',4)"><option value="null">Select Risk Group</option><option value="Risk Group 1">Risk Group 1</option><option value="Risk Group 2">Risk Group 2</option><option value="Risk Group 3">Risk Group 3</option></select></td>  <td width="20%">Table 1:<br/><input style="width:110px;" type="text"  id="name_insured_premium_'+add_pa_counter+'_1" name="name_insured_premium_1[]" class="form-control name_insured_premium_1" value="'+name_insured_premium_1+'"><br/>Table 2:<br/><input style="width:110px;" type="text"  id="name_insured_premium_'+add_pa_counter+'_2" name="name_insured_premium_2[]" class="form-control name_insured_premium_2 mt-1"  value="'+name_insured_premium_2+'"><br/>Table 3:<br/><input style="width:110px;" type="text"  id="name_insured_premium_'+add_pa_counter+'_3" name="name_insured_premium_3[]" class="form-control name_insured_premium_3 mt-1"  value="'+name_insured_premium_3+'"><br/>Table 4:<br/><input style="width:110px;" type="text"  id="name_insured_premium_'+add_pa_counter+'_4" name="name_insured_premium_4[]" class="form-control name_insured_premium_4 mt-1"  value="'+name_insured_premium_4+'"><br/>Premium:<br/><input style="width:110px;" type="text" id="premium_'+add_pa_counter+'" name="premium[]" class="form-control premium mt-1" value="'+premium+'" ></td></tr>';
        });
        $("#Add_Personal_accident").attr("onClick", "AddPersonal_accident(" + Personal_accident_length + ")");
        $("#first_table_tbody").append(tr_table);

        $.each(total_pa_ind_json_data, function(key, val) {
            add_pa_counter = key;
            main_Personal_accident.push(add_pa_counter);
            index = total_pa_ind_json_data[key][0];
            var name_insured_member_name = total_pa_ind_json_data[key][1];
            var name_insured_relation = total_pa_ind_json_data[key][5];
            var nominee_name = total_pa_ind_json_data[key][7];
            var nominee_relation = total_pa_ind_json_data[key][9];
            var name_insured_sum_insured_1 = total_pa_ind_json_data[key][11];
            var name_insured_sum_insured_2 = total_pa_ind_json_data[key][12];
            var name_insured_sum_insured_3 = total_pa_ind_json_data[key][13];
            var name_insured_sum_insured_4 = total_pa_ind_json_data[key][14];
            var risk_group_1 = total_pa_ind_json_data[key][16];
            var risk_group_2 = total_pa_ind_json_data[key][17];
            var risk_group_3 = total_pa_ind_json_data[key][18];
            var risk_group_4 = total_pa_ind_json_data[key][19];

            $("#name_insured_member_name_"+add_pa_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_pa_counter).val(name_insured_relation);
            $("#nominee_name_"+add_pa_counter).val(nominee_name);
            $("#nominee_relation_"+add_pa_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_pa_counter+"_1").val(name_insured_sum_insured_1);
            $("#name_insured_sum_insured_"+add_pa_counter+"_2").val(name_insured_sum_insured_2);
            $("#name_insured_sum_insured_"+add_pa_counter+"_3").val(name_insured_sum_insured_3);
            $("#name_insured_sum_insured_"+add_pa_counter+"_4").val(name_insured_sum_insured_4);
            $("#risk_group_"+add_pa_counter+"_1").val(risk_group_1);
            $("#risk_group_"+add_pa_counter+"_2").val(risk_group_2);
            $("#risk_group_"+add_pa_counter+"_3").val(risk_group_3);
            $("#risk_group_"+add_pa_counter+"_4").val(risk_group_4);

            // alert(name_insured_sum_insured_4);
            name_insured_sum_insured_4 = name_insured_sum_insured_INTVAl(name_insured_sum_insured_4);
            if(name_insured_sum_insured_4 >= "500000"){
                // alert(name_insured_sum_insured_4);
                $("#risk_group_"+add_pa_counter+"_4").attr("disabled",true);
                $("#name_insured_premium_"+add_pa_counter+"_4").val("");
            }else{
                $("#risk_group_"+add_pa_counter+"_4").attr("disabled",false);
            }
        
        });
    }   

    function edit_single_table_Personal_Accident(ind_personal_accident_policy_data_arr){
        var total_pa_ind_json_data ="";
        $("#first_table_tbody").empty();
        $.each(ind_personal_accident_policy_data_arr, function(key_other, val_other) {
            var paccident_policy_id = ind_personal_accident_policy_data_arr.paccident_policy_id;
            var personal_accident_policy_ind_fk_policy_id = ind_personal_accident_policy_data_arr.personal_accident_policy_ind_fk_policy_id;
            var fk_policy_type_id = ind_personal_accident_policy_data_arr.fk_policy_type_id
            var fk_company_id = ind_personal_accident_policy_data_arr.fk_company_id;
            var fk_department_id = ind_personal_accident_policy_data_arr.fk_department_id;
            var policy_name_txt = ind_personal_accident_policy_data_arr.policy_name_txt;
            total_pa_ind_json_data = JSON.parse(ind_personal_accident_policy_data_arr.total_pa_ind_json_data);

            var tot_premium = ind_personal_accident_policy_data_arr.tot_premium;
            var less_disc_rate = ind_personal_accident_policy_data_arr.less_disc_rate;
            var less_disc_tot = ind_personal_accident_policy_data_arr.less_disc_tot;
            var gross_premium = ind_personal_accident_policy_data_arr.gross_premium;
            var gross_premium_new = ind_personal_accident_policy_data_arr.gross_premium_new;
            var medi_cgst_rate = ind_personal_accident_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = ind_personal_accident_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = ind_personal_accident_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = ind_personal_accident_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = ind_personal_accident_policy_data_arr.medi_final_premium;

            var personal_accident_status = ind_personal_accident_policy_data_arr.personal_accident_status;
            var personal_accident_del_flag = ind_personal_accident_policy_data_arr.personal_accident_del_flag;

            $("#tot_premium").val(tot_premium);
            $("#less_disc_rate").val(less_disc_rate);
            $("#less_disc_tot").val(less_disc_tot);
            $("#gross_premium").val(gross_premium);
            $("#gross_premium_new").val(gross_premium_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#paccident_policy_id").val(paccident_policy_id);
        });
        var tr_table = "";
        var add_pa_counter = "";
        var index = "";
        var Personal_accident_length = total_pa_ind_json_data.length;
        $.each(total_pa_ind_json_data, function(key, val) {
            add_pa_counter = key;
            main_Personal_accident.push(add_pa_counter);
            index = total_pa_ind_json_data[key][0];
            var name_insured_member_name = total_pa_ind_json_data[key][1];
            var name_insured_member_name_txt = total_pa_ind_json_data[key][2];
            var name_insured_dob = total_pa_ind_json_data[key][3];
            var name_insured_age = total_pa_ind_json_data[key][4];
            var name_insured_relation = total_pa_ind_json_data[key][5];
            var name_insured_relation_txt = total_pa_ind_json_data[key][6];
            var nominee_name = total_pa_ind_json_data[key][7];
            var nominee_name_txt = total_pa_ind_json_data[key][8];
            var nominee_relation = total_pa_ind_json_data[key][9];
            var nominee_relation_txt = total_pa_ind_json_data[key][10];
            var name_insured_sum_insured_1 = total_pa_ind_json_data[key][11];
            var risk_group_1 = total_pa_ind_json_data[key][12];
            var name_insured_premium_1 = total_pa_ind_json_data[key][13];
            // var name_insured_premium_2 = total_pa_ind_json_data[key][14];

            // alert(name_insured_premium_2);

            tr_table += '<tr><td width="2%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_personal_accident_'+add_pa_counter+'" onClick=removePersonal_accident('+add_pa_counter+') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_pa_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_pa_counter+')"><option value="null">Select Member Names</option>' + option_val_data + '</select></td><td width="8%"><input style="width:100px;" type="text" id="name_insured_dob_'+add_pa_counter+'" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td width="5%"><input style="width:55px;" type="text" id="name_insured_age_'+add_pa_counter+'" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td> <td><select style="width:120px;" id="name_insured_relation_' + add_pa_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_pa_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_pa_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td> <td width="20%">Table 1:<br/><select style="width:110px;" id="name_insured_sum_insured_'+add_pa_counter+'_1" name="name_insured_sum_insured_1[]" class="form-control name_insured_sum_insured_1" onchange="get_premium('+add_pa_counter+',1)"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></div></td> <td width="20%">Table 1:<br/><select style="width:110px;" id="risk_group_'+add_pa_counter+'_1" name="risk_group_1[]" class="form-control risk_group_1" onchange="get_premium('+add_pa_counter+',1)"><option value="null">Select Risk Group</option><option value="Risk Group 1">Risk Group 1</option><option value="Risk Group 2">Risk Group 2</option><option value="Risk Group 3">Risk Group 3</option></select><br/></td>  <td width="20%">Table 1:<br/><input style="width:110px;" type="text"  id="name_insured_premium_'+add_pa_counter+'_1" name="name_insured_premium_1[]" class="form-control name_insured_premium_1" onkeyup="premium_tot_Cal('+add_pa_counter+')" value="'+name_insured_premium_1+'"></td></tr>';
        });
        $("#Add_Personal_accident").attr("onClick", "AddPersonal_accident(" + Personal_accident_length + ")");
        $("#first_table_tbody").append(tr_table);

        $.each(total_pa_ind_json_data, function(key, val) {
            add_pa_counter = key;
            main_Personal_accident.push(add_pa_counter);
            index = total_pa_ind_json_data[key][0];
            var name_insured_member_name = total_pa_ind_json_data[key][1];
            var name_insured_relation = total_pa_ind_json_data[key][5];
            var nominee_name = total_pa_ind_json_data[key][7];
            var nominee_relation = total_pa_ind_json_data[key][9];
            var name_insured_sum_insured_1 = total_pa_ind_json_data[key][11];
            var risk_group_1 = total_pa_ind_json_data[key][12];
            var name_insured_premium_1 = total_pa_ind_json_data[key][13];

            $("#name_insured_member_name_"+add_pa_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_pa_counter).val(name_insured_relation);
            $("#nominee_name_"+add_pa_counter).val(nominee_name);
            $("#nominee_relation_"+add_pa_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_pa_counter+"_1").val(name_insured_sum_insured_1);
            $("#risk_group_"+add_pa_counter+"_1").val(risk_group_1);
        });
    }   
    
    function name_insured_sum_insured_INTVAl(name_insured_sum_insured){
        var sum_insured = "";
        if (name_insured_sum_insured == "1,00,000")
            var sum_insured = "100000";
        else if (name_insured_sum_insured == "1,25,000")
            var sum_insured = "125000";
        else if (name_insured_sum_insured == "1,50,000")
            var sum_insured = "150000";
        else if (name_insured_sum_insured == "1,75,000")
            var sum_insured = "175000";
        else if (name_insured_sum_insured == "2,00,000")
            var sum_insured = "200000";
        else if (name_insured_sum_insured == "2,25,000")
            var sum_insured = "225000";
        else if (name_insured_sum_insured == "2,50,000")
            var sum_insured = "250000";
        else if (name_insured_sum_insured == "2,75,000")
            var sum_insured = "275000";
        else if (name_insured_sum_insured == "3,00,000")
            var sum_insured = "300000";
        else if (name_insured_sum_insured == "3,25,000")
            var sum_insured = "325000";
        else if (name_insured_sum_insured == "3,50,000")
            var sum_insured = "350000";
        else if (name_insured_sum_insured == "3,75,000")
            var sum_insured = "375000";
        else if (name_insured_sum_insured == "4,00,000")
            var sum_insured = "400000";
        else if (name_insured_sum_insured == "4,25,000")
            var sum_insured = "425000";
        else if (name_insured_sum_insured == "4,50,000")
            var sum_insured = "450000";
        else if (name_insured_sum_insured == "4,75,000")
            var sum_insured = "475000";
        else if (name_insured_sum_insured == "5,00,000")
            var sum_insured = "500000";
        else if (name_insured_sum_insured == "5,25,000")
            var sum_insured = "525000";
        else if (name_insured_sum_insured == "5,50,000")
            var sum_insured = "550000";
        else if (name_insured_sum_insured == "5,75,000")
            var sum_insured = "575000";
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured = "600000";
        else if (name_insured_sum_insured == "6,25,000")
            var sum_insured = "625000";
        else if (name_insured_sum_insured == "6,50,000")
            var sum_insured = "650000";
        else if (name_insured_sum_insured == "6,75,000")
            var sum_insured = "675000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured = "700000";
        else if (name_insured_sum_insured == "7,25,000")
            var sum_insured = "725000";
        else if (name_insured_sum_insured == "7,50,000")
            var sum_insured = "750000";
        else if (name_insured_sum_insured == "7,75,000")
            var sum_insured = "775000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured = "800000";
        else if (name_insured_sum_insured == "8,25,000")
            var sum_insured = "825000";
        else if (name_insured_sum_insured == "8,50,000")
            var sum_insured = "850000";
        else if (name_insured_sum_insured == "8,75,000")
            var sum_insured = "875000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured = "900000";
        else if (name_insured_sum_insured == "9,25,000")
            var sum_insured = "925000";
        else if (name_insured_sum_insured == "9,50,000")
            var sum_insured = "950000";
        else if (name_insured_sum_insured == "9,75,000")
            var sum_insured = "975000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured = "1000000";
        else if (name_insured_sum_insured == "12,00,000")
            var sum_insured = "1200000";
        else if (name_insured_sum_insured == "11,00,000")
            var sum_insured = "1100000";
        else if (name_insured_sum_insured == "13,00,000")
            var sum_insured = "1300000";
        else if (name_insured_sum_insured == "14,00,000")
            var sum_insured = "1400000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured = "1500000";
        else if (name_insured_sum_insured == "16,00,000")
            var sum_insured = "1600000";
        else if (name_insured_sum_insured == "17,00,000")
            var sum_insured = "1700000";
        else if (name_insured_sum_insured == "18,00,000")
            var sum_insured = "1800000";
        else if (name_insured_sum_insured == "19,00,000")
            var sum_insured = "1900000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured = "2000000";
        else if (name_insured_sum_insured == "21,00,000")
            var sum_insured = "2100000";
        else if (name_insured_sum_insured == "22,00,000")
            var sum_insured = "2200000";
        else if (name_insured_sum_insured == "23,00,000")
            var sum_insured = "2300000";
        else if (name_insured_sum_insured == "24,00,000")
            var sum_insured = "2400000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured = "2500000";
        else if (name_insured_sum_insured == "26,00,000")
            var sum_insured = "2600000";
        else if (name_insured_sum_insured == "27,00,000")
            var sum_insured = "2700000";
        else if (name_insured_sum_insured == "28,00,000")
            var sum_insured = "2800000";
        else if (name_insured_sum_insured == "29,00,000")
            var sum_insured = "2900000";
        else if (name_insured_sum_insured == "30,00,000")
            var sum_insured = "3000000";
        else if (name_insured_sum_insured == "31,00,000")
            var sum_insured = "3100000";
        else if (name_insured_sum_insured == "32,00,000")
            var sum_insured = "3200000";
        else if (name_insured_sum_insured == "33,00,000")
            var sum_insured = "3300000";
        else if (name_insured_sum_insured == "34,00,000")
            var sum_insured = "3400000";
        else if (name_insured_sum_insured == "35,00,000")
            var sum_insured = "3500000";
        else if (name_insured_sum_insured == "40,00,000")
            var sum_insured = "4000000";
        else if (name_insured_sum_insured == "45,00,000")
            var sum_insured = "4500000";
        else if (name_insured_sum_insured == "50,00,000")
            var sum_insured = "5000000";
        else if (name_insured_sum_insured == "55,00,000")
            var sum_insured = "5500000";
        else if (name_insured_sum_insured == "60,00,000")
            var sum_insured = "6000000";
        else if (name_insured_sum_insured == "65,00,000")
            var sum_insured = "6500000";
        else if (name_insured_sum_insured == "75,00,000")
            var sum_insured = "7500000";
        else if (name_insured_sum_insured == "1,00,00,000")
            var sum_insured = "10000000";

        sum_insured = parseInt(sum_insured);

        if (isNaN(sum_insured))
            sum_insured = 0;
        else
            sum_insured = sum_insured;

        return sum_insured;
    }         

    function edit_motor_2_wheeler(motor_2_wheeler_data_arr){
        var tot_othercover_ind_json ="";
        $.each(motor_2_wheeler_data_arr, function(key_gmc, val_gmc) {
            var two_wheeler_policy_id = motor_2_wheeler_data_arr.two_wheeler_policy_id;
            two_wheeler_policy_fk_policy_id = motor_2_wheeler_data_arr.two_wheeler_policy_fk_policy_id;
            fk_policy_type_id = motor_2_wheeler_data_arr.fk_policy_type_id;
            fk_company_id = motor_2_wheeler_data_arr.fk_company_id;
            fk_department_id = motor_2_wheeler_data_arr.fk_department_id;
            var policy_name_txt = motor_2_wheeler_data_arr.policy_name_txt;

            var vehicle_make_model = motor_2_wheeler_data_arr.vehicle_make_model;
            var vehicle_reg_no = motor_2_wheeler_data_arr.vehicle_reg_no;
            var insu_declared_val = motor_2_wheeler_data_arr.insu_declared_val;
            var elect_acc_val = motor_2_wheeler_data_arr.elect_acc_val;
            var other_elect_acc_val = motor_2_wheeler_data_arr.other_elect_acc_val;
            var policy_period_tenure_years = motor_2_wheeler_data_arr.policy_period_tenure_years;
            var previous_policy_expiry_date_tenur = motor_2_wheeler_data_arr.previous_policy_expiry_date_tenur;
            var year_manufact_val = motor_2_wheeler_data_arr.year_manufact_val;
            var rta_city_code = motor_2_wheeler_data_arr.rta_city_code;
            var rta_city = motor_2_wheeler_data_arr.rta_city;
            var rta_city_cat = motor_2_wheeler_data_arr.rta_city_cat;
            var cubic_capacity_val = motor_2_wheeler_data_arr.cubic_capacity_val;
            var type_of_cover = motor_2_wheeler_data_arr.type_of_cover;
            var policy_period = motor_2_wheeler_data_arr.policy_period;
            var inception_date = motor_2_wheeler_data_arr.inception_date;
            var expiry_date = motor_2_wheeler_data_arr.expiry_date;

            $("#vehicle_make_model").val(vehicle_make_model);
            $("#vehicle_reg_no").val(vehicle_reg_no);
            $("#insu_declared_val").val(insu_declared_val);
            $("#elect_acc_val").val(elect_acc_val);
            $("#other_elect_acc_val").val(other_elect_acc_val);
            $("#policy_period_tenure_years").val(policy_period_tenure_years);
            $("#previous_policy_expiry_date_tenur").val(previous_policy_expiry_date_tenur);
            $("#year_manufact_val").val(year_manufact_val);
            $("#rta_city_code").val(rta_city_code);
            $("#rta_city").val(rta_city);
            $("#rta_city_cat").val(rta_city_cat);
            $("#cubic_capacity_val").val(cubic_capacity_val);
            $("#type_of_cover").val(type_of_cover);
            $("#policy_period").val(policy_period);
            $("#inception_date").val(inception_date);
            $("#expiry_date").val(expiry_date);

            var od_basic_od_tot = motor_2_wheeler_data_arr.od_basic_od_tot;
            var od_special_disc_per = motor_2_wheeler_data_arr.od_special_disc_per;
            var od_special_disc_tot = motor_2_wheeler_data_arr.od_special_disc_tot;
            var od_special_load_per = motor_2_wheeler_data_arr.od_special_load_per;
            var od_special_load_tot = motor_2_wheeler_data_arr.od_special_load_tot;
            // var od_special_disc_tot = motor_2_wheeler_data_arr.od_special_disc_tot;
            // var od_special_load_tot = motor_2_wheeler_data_arr.od_special_load_tot;
            var od_net_basic_od_tot = motor_2_wheeler_data_arr.od_net_basic_od_tot;
            var od_elec_acc_tot = motor_2_wheeler_data_arr.od_elec_acc_tot;
            var od_other_elec_acc_tot = motor_2_wheeler_data_arr.od_other_elec_acc_tot;
            var od_od_basic_od1_tot = motor_2_wheeler_data_arr.od_od_basic_od1_tot;
            var od_geographical_area_tot = motor_2_wheeler_data_arr.od_geographical_area_tot;
            var od_rallies_tot = motor_2_wheeler_data_arr.od_rallies_tot;
            var od_embassy_load_tot = motor_2_wheeler_data_arr.od_embassy_load_tot;
            var od_basic_od2_tot = motor_2_wheeler_data_arr.od_basic_od2_tot;
            var od_anti_theft_tot = motor_2_wheeler_data_arr.od_anti_theft_tot;
            var od_handicap_tot = motor_2_wheeler_data_arr.od_handicap_tot;
            var od_aai_tot = motor_2_wheeler_data_arr.od_aai_tot;
            var od_side_car_tot = motor_2_wheeler_data_arr.od_side_car_tot;
            var od_own_premises_tot = motor_2_wheeler_data_arr.od_own_premises_tot;
            var od_voluntary_excess_tot = motor_2_wheeler_data_arr.od_voluntary_excess_tot;
            var od_basic_od3_tot = motor_2_wheeler_data_arr.od_basic_od3_tot;
            var od_ncb_per = motor_2_wheeler_data_arr.od_ncb_per;
            var od_ncb_tot = motor_2_wheeler_data_arr.od_ncb_tot;
            var od_tot_od_premium_policy_period = motor_2_wheeler_data_arr.od_tot_od_premium_policy_period;

            $("#od_basic_od_tot").val(od_basic_od_tot);
            $("#od_special_disc_per").val(od_special_disc_per);
            $("#od_special_disc_tot").val(od_special_disc_tot);
            $("#od_special_load_per").val(od_special_load_per);
            $("#od_special_load_tot").val(od_special_load_tot);
            $("#od_net_basic_od_tot").val(od_net_basic_od_tot);
            $("#od_elec_acc_tot	").val(od_elec_acc_tot);
            $("#od_other_elec_acc_tot").val(od_other_elec_acc_tot);
            $("#od_od_basic_od1_tot").val(od_od_basic_od1_tot);
            $("#od_geographical_area_tot").val(od_geographical_area_tot);
            $("#od_rallies_tot").val(od_rallies_tot);
            $("#od_embassy_load_tot").val(od_embassy_load_tot);
            $("#od_basic_od2_tot").val(od_basic_od2_tot);
            $("#od_anti_theft_tot").val(od_anti_theft_tot);
            $("#od_handicap_tot").val(od_handicap_tot);
            $("#od_aai_tot").val(od_aai_tot);
            $("#od_side_car_tot").val(od_side_car_tot);
            $("#od_own_premises_tot").val(od_own_premises_tot);
            $("#od_voluntary_excess_tot").val(od_voluntary_excess_tot);
            $("#od_basic_od3_tot").val(od_basic_od3_tot);
            $("#od_ncb_per").val(od_ncb_per);
            $("#od_ncb_tot").val(od_ncb_tot);
            $("#od_tot_od_premium_policy_period").val(od_tot_od_premium_policy_period);

            var tp_basic_tp_tot = motor_2_wheeler_data_arr.tp_basic_tp_tot;
            var tp_restr_tppd_tot = motor_2_wheeler_data_arr.tp_restr_tppd_tot;
            var tp_basic_tp1_tot = motor_2_wheeler_data_arr.tp_basic_tp1_tot;
            var tp_geographical_area_tot = motor_2_wheeler_data_arr.tp_geographical_area_tot;
            var tp_compul_pa_own_driv_tot = motor_2_wheeler_data_arr.tp_compul_pa_own_driv_tot;
            var tp_unnamed_pa_tot = motor_2_wheeler_data_arr.tp_unnamed_pa_tot;
            var tp_ll_drv_emp_imt28_tot = motor_2_wheeler_data_arr.tp_ll_drv_emp_imt28_tot;
            var tp_ll_other_emp_tot = motor_2_wheeler_data_arr.tp_ll_other_emp_tot;
            var tp_noof_other_emp_tot = motor_2_wheeler_data_arr.tp_noof_other_emp_tot;
            var tp_basic_tp2_tot = motor_2_wheeler_data_arr.tp_basic_tp2_tot;
            var tp_tot_premium_policy_period = motor_2_wheeler_data_arr.tp_tot_premium_policy_period;
            tot_othercover_ind_json = JSON.parse(motor_2_wheeler_data_arr.tot_othercover_ind_json);
            var plan_name = motor_2_wheeler_data_arr.plan_name;
            var plan_name_tot = motor_2_wheeler_data_arr.plan_name_tot;
            var tot_cover_premium_period = motor_2_wheeler_data_arr.tot_cover_premium_period;

            $("#tp_basic_tp_tot").val(tp_basic_tp_tot);
            $("#tp_restr_tppd_tot").val(tp_restr_tppd_tot);
            $("#tp_basic_tp1_tot").val(tp_basic_tp1_tot);
            $("#tp_geographical_area_tot").val(tp_geographical_area_tot);
            $("#tp_compul_pa_own_driv_tot").val(tp_compul_pa_own_driv_tot);
            $("#tp_unnamed_pa_tot").val(tp_unnamed_pa_tot);
            $("#tp_ll_drv_emp_imt28_tot").val(tp_ll_drv_emp_imt28_tot);
            $("#tp_ll_other_emp_tot").val(tp_ll_other_emp_tot);
            $("#tp_noof_other_emp_tot").val(tp_noof_other_emp_tot);
            $("#tp_basic_tp2_tot").val(tp_basic_tp2_tot);
            $("#tp_tot_premium_policy_period").val(tp_tot_premium_policy_period);
            $("#plan_name").val(plan_name);
            $("#plan_name_tot").val(plan_name_tot);
            $("#tot_cover_premium_period").val(tot_cover_premium_period);

            var tot_premium = motor_2_wheeler_data_arr.tot_premium;
            var motor_cgst_rate = motor_2_wheeler_data_arr.motor_cgst_rate;
            var motor_cgst_tot = motor_2_wheeler_data_arr.motor_cgst_tot;
            var motor_sgst_rate = motor_2_wheeler_data_arr.motor_sgst_rate;
            var motor_sgst_tot = motor_2_wheeler_data_arr.motor_sgst_tot;
            // var gst_rate = motor_2_wheeler_data_arr.gst_rate;
            // var gst_tot = motor_2_wheeler_data_arr.gst_tot;
            var tot_payable_premium = motor_2_wheeler_data_arr.tot_payable_premium;

            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(motor_cgst_rate);
            $("#motor_cgst_tot").val(motor_cgst_tot);
            $("#sgst_fire_per").val(motor_sgst_rate);
            $("#motor_sgst_tot").val(motor_sgst_tot);
            // $("#gst_rate").val(gst_rate);
            // $("#gst_tot").val(gst_tot);
            
            $("#tot_payable_premium").val(tot_payable_premium);
            $("#two_wheeler_policy_id").val(two_wheeler_policy_id);
        });
        var tr_table ="";
        $.each(tot_othercover_ind_json, function(key, val) {
            add_othercover_counter = key;
            index = tot_othercover_ind_json[key][0];
            var other_cover_name=tot_othercover_ind_json[key][1];
            var other_cover_rate=tot_othercover_ind_json[key][2];
            var other_cover_tot=tot_othercover_ind_json[key][3];
            main_Other_Cover.push(add_othercover_counter);
            // alert(other_cover_tot);
                tr_table += '<tr> <td><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_othercover_' + add_othercover_counter + '" onClick="removeOtherCover(' + add_othercover_counter + ')" ></button></center></td><td width="43%"><input type="text" name="other_cover_name[]"  id="other_cover_name_' + add_othercover_counter + '" class="form-control other_cover_name" value="'+other_cover_name+'"></td> <td><input type="text" name="other_cover_rate[]"  id="other_cover_rat_' + add_othercover_counter + '" class="form-control other_cover_rate" value="'+other_cover_rate+'"></td> <td><input type="text" name="other_cover_tot[]"  id="other_cover_tot_' + add_othercover_counter + '" class="form-control other_cover_tot" onkeyup="Tp_OtherCover_Cal()" value="'+other_cover_tot+'"></td> </tr> ';
        });
        $("#first_table_tbody").append(tr_table);
            othercover_length = tot_othercover_ind_json.length;
        $("#Add_other_cover").attr("onClick", "Add_OtherCover(" + othercover_length + ")");
    }

    function edit_motor_private_car(private_car_data_arr){
        var tot_othercover_ind_json = "";
        $.each(private_car_data_arr, function(key_gmc, val_gmc) {
            private_car_policy_id = private_car_data_arr.private_car_policy_id;
            motor_private_car_policy_fk_policy_id = private_car_data_arr.motor_private_car_policy_fk_policy_id;
            fk_policy_type_id = private_car_data_arr.fk_policy_type_id;
            fk_company_id = private_car_data_arr.fk_company_id;
            fk_department_id = private_car_data_arr.fk_department_id;
            var policy_name_txt = private_car_data_arr.policy_name_txt;

            var vehicle_make_model = private_car_data_arr.vehicle_make_model;
            var vehicle_reg_no = private_car_data_arr.vehicle_reg_no;
            var insu_declared_val = private_car_data_arr.insu_declared_val;
            var non_elect_access_val = private_car_data_arr.non_elect_access_val;
            var elect_access_val = private_car_data_arr.elect_access_val;
            var lpg_cng_idv_val = private_car_data_arr.lpg_cng_idv_val;
            var trailer_val = private_car_data_arr.trailer_val;
            var year_manufact_val = private_car_data_arr.year_manufact_val;
            var rta_city_code = private_car_data_arr.rta_city_code;
            var rta_city = private_car_data_arr.rta_city;
            var rta_city_cat = private_car_data_arr.rta_city_cat;
            var cubic_capacity_val = private_car_data_arr.cubic_capacity_val;
            var calculation_method = private_car_data_arr.calculation_method;
            var type_of_cover = private_car_data_arr.type_of_cover;
            var prev_policy_expiry_date = private_car_data_arr.prev_policy_expiry_date;
            var policy_period = private_car_data_arr.policy_period;
            var inception_date = private_car_data_arr.inception_date;
            var expiry_date = private_car_data_arr.expiry_date;

            var od_basic_od_tot = private_car_data_arr.od_basic_od_tot;
            var od_special_disc_per = private_car_data_arr.od_special_disc_per;
            var od_special_disc_tot = private_car_data_arr.od_special_disc_tot;
            var od_special_load_per = private_car_data_arr.od_special_load_per;
            var od_special_load_tot = private_car_data_arr.od_special_load_tot;
            var od_net_basic_od_tot = private_car_data_arr.od_net_basic_od_tot;
            var od_non_elec_acc_tot = private_car_data_arr.od_non_elec_acc_tot;
            var od_elec_acc_tot = private_car_data_arr.od_elec_acc_tot;
            var od_bi_fuel_kit_tot = private_car_data_arr.od_bi_fuel_kit_tot;
            var od_od_basic_od1_tot = private_car_data_arr.od_od_basic_od1_tot;
            var od_trailer_tot = private_car_data_arr.od_trailer_tot;
            var od_geographical_area_tot = private_car_data_arr.od_geographical_area_tot;
            var od_embassy_load_tot = private_car_data_arr.od_embassy_load_tot;
            var od_fibre_glass_tank_tot = private_car_data_arr.od_fibre_glass_tank_tot;
            var od_driving_tut_tot = private_car_data_arr.od_driving_tut_tot;
            var od_rallies_tot = private_car_data_arr.od_rallies_tot;
            var od_basic_od2_tot = private_car_data_arr.od_basic_od2_tot;
            var od_anti_tot = private_car_data_arr.od_anti_tot;
            var od_handicap_tot = private_car_data_arr.od_handicap_tot;
            var od_aai_tot = private_car_data_arr.od_aai_tot;
            var od_vintage_tot = private_car_data_arr.od_vintage_tot;
            var od_own_premises_tot = private_car_data_arr.od_own_premises_tot;
            var od_voluntary_deduc_tot = private_car_data_arr.od_voluntary_deduc_tot;
            var od_basic_od3_tot = private_car_data_arr.od_basic_od3_tot;
            var od_ncb_per = private_car_data_arr.od_ncb_per;
            var od_ncb_tot = private_car_data_arr.od_ncb_tot;
            var od_tot_anual_od_premium = private_car_data_arr.od_tot_anual_od_premium;
            var od_tot_od_premium_policy_period = private_car_data_arr.od_tot_od_premium_policy_period;

            var tp_basic_tp_tot = private_car_data_arr.tp_basic_tp_tot;
            var tp_restr_tppd = private_car_data_arr.tp_restr_tppd;
            var tp_trailer_tot = private_car_data_arr.tp_trailer_tot;
            var tp_bi_fuel_tot = private_car_data_arr.tp_bi_fuel_tot;
            var tp_basic_tp1_tot = private_car_data_arr.tp_basic_tp1_tot;
            var tp_compul_own_driv_tot = private_car_data_arr.tp_compul_own_driv_tot;
            var tp_geographical_area_tot = private_car_data_arr.tp_geographical_area_tot;
            var tp_unnamed_papax_tot = private_car_data_arr.tp_unnamed_papax_tot;
            var tp_no_seats_limit_person_tot = private_car_data_arr.tp_no_seats_limit_person_tot;
            var tp_ll_drv_emp_tot = private_car_data_arr.tp_ll_drv_emp_tot;
            var tp_no_drv_emp_tot = private_car_data_arr.tp_no_drv_emp_tot;
            var tp_ll_defe_tot = private_car_data_arr.tp_ll_defe_tot;
            var tp_noof_person_tot = private_car_data_arr.tp_noof_person_tot;
            var tp_pa_paid_drv_tot = private_car_data_arr.tp_pa_paid_drv_tot;
            // var tp_blank_tot = private_car_data_arr.tp_blank_tot;
            var tp_basic_tp2_tot = private_car_data_arr.tp_basic_tp2_tot;
            var tp_tot_anual_tp_premium = private_car_data_arr.tp_tot_anual_tp_premium;
            var tp_tot_premium_policy_period = private_car_data_arr.tp_tot_premium_policy_period;
            tot_othercover_ind_json = JSON.parse(private_car_data_arr.tot_othercover_ind_json);
            var plan_name = private_car_data_arr.plan_name;
            var plan_name_tot = private_car_data_arr.plan_name_tot;
            var tot_anual_cover_premium = private_car_data_arr.tot_anual_cover_premium;
            var tot_cover_premium_period = private_car_data_arr.tot_cover_premium_period;

            var tot_premium = private_car_data_arr.tot_premium;
            var motor_cgst_rate = private_car_data_arr.motor_cgst_rate;
            var motor_cgst_tot = private_car_data_arr.motor_cgst_tot;
            var motor_sgst_rate = private_car_data_arr.motor_sgst_rate;
            var motor_sgst_tot = private_car_data_arr.motor_sgst_tot;
            // var gst_rate = private_car_data_arr.gst_rate;
            // var gst_tot = private_car_data_arr.gst_tot;
            var tot_payable_premium = private_car_data_arr.tot_payable_premium;

            $("#vehicle_make_model").val(vehicle_make_model);
            $("#vehicle_reg_no").val(vehicle_reg_no);
            $("#insu_declared_val").val(insu_declared_val);
            $("#non_elect_access_val").val(non_elect_access_val);
            $("#elect_access_val").val(elect_access_val);
            $("#lpg_cng_idv_val").val(lpg_cng_idv_val);
            $("#trailer_val").val(trailer_val);
            $("#year_manufact_val").val(year_manufact_val);
            $("#rta_city_code").val(rta_city_code);
            $("#rta_city").val(rta_city);
            $("#rta_city_cat").val(rta_city_cat);
            $("#cubic_capacity_val").val(cubic_capacity_val);
            $("#calculation_method").val(calculation_method);
            $("#type_of_cover").val(type_of_cover);
            $("#prev_policy_expiry_date").val(prev_policy_expiry_date);
            $("#policy_period").val(policy_period);
            $("#inception_date").val(inception_date);
            $("#expiry_date").val(expiry_date);

            $("#od_basic_od_tot").val(od_basic_od_tot);
            $("#od_special_disc_per").val(od_special_disc_per);
            $("#od_special_disc_tot").val(od_special_disc_tot);
            $("#od_special_load_per").val(od_special_load_per);
            $("#od_special_load_tot").val(od_special_load_tot);
            $("#od_net_basic_od_tot").val(od_net_basic_od_tot);
            $("#od_non_elec_acc_tot").val(od_non_elec_acc_tot);
            $("#od_elec_acc_tot").val(od_elec_acc_tot);
            $("#od_bi_fuel_kit_tot").val(od_bi_fuel_kit_tot);
            $("#od_od_basic_od1_tot").val(od_od_basic_od1_tot);
            $("#od_trailer_tot").val(od_trailer_tot);
            $("#od_geographical_area_tot").val(od_geographical_area_tot);
            $("#od_embassy_load_tot").val(od_embassy_load_tot);
            $("#od_fibre_glass_tank_tot").val(od_fibre_glass_tank_tot);
            $("#od_driving_tut_tot").val(od_driving_tut_tot);
            $("#od_rallies_tot").val(od_rallies_tot);
            $("#od_basic_od2_tot").val(od_basic_od2_tot);
            $("#od_anti_tot").val(od_anti_tot);
            $("#od_handicap_tot").val(od_handicap_tot);
            $("#od_aai_tot").val(od_aai_tot);
            $("#od_vintage_tot").val(od_vintage_tot);
            $("#od_own_premises_tot").val(od_own_premises_tot);
            $("#od_voluntary_deduc_tot").val(od_voluntary_deduc_tot);
            $("#od_basic_od3_tot").val(od_basic_od3_tot);
            $("#od_ncb_per").val(od_ncb_per);
            $("#od_ncb_tot").val(od_ncb_tot);
            $("#od_tot_anual_od_premium").val(od_tot_anual_od_premium);
            $("#od_tot_od_premium_policy_period").val(od_tot_od_premium_policy_period);

            $("#tp_basic_tp_tot").val(tp_basic_tp_tot);
            $("#tp_restr_tppd").val(tp_restr_tppd);
            $("#tp_trailer_tot").val(tp_trailer_tot);
            $("#tp_bi_fuel_tot").val(tp_bi_fuel_tot);
            $("#tp_basic_tp1_tot").val(tp_basic_tp1_tot);
            $("#tp_compul_own_driv_tot").val(tp_compul_own_driv_tot);
            $("#tp_geographical_area_tot").val(tp_geographical_area_tot);
            $("#tp_unnamed_papax_tot").val(tp_unnamed_papax_tot);
            $("#tp_no_seats_limit_person_tot").val(tp_no_seats_limit_person_tot);
            $("#tp_ll_drv_emp_tot").val(tp_ll_drv_emp_tot);
            $("#tp_no_drv_emp_tot").val(tp_no_drv_emp_tot);
            $("#tp_ll_defe_tot").val(tp_ll_defe_tot);
            $("#tp_noof_person_tot").val(tp_noof_person_tot);
            $("#tp_pa_paid_drv_tot").val(tp_pa_paid_drv_tot);
            $("#tp_basic_tp2_tot").val(tp_basic_tp2_tot);
            $("#tp_tot_anual_tp_premium").val(tp_tot_anual_tp_premium);
            $("#tp_tot_premium_policy_period").val(tp_tot_premium_policy_period);
            $("#plan_name").val(plan_name);
            $("#plan_name_tot").val(plan_name_tot);
            $("#tot_anual_cover_premium").val(tot_anual_cover_premium);
            $("#tot_cover_premium_period").val(tot_cover_premium_period);

            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(motor_cgst_rate);
            $("#motor_cgst_tot").val(motor_cgst_tot);
            $("#sgst_fire_per").val(motor_sgst_rate);
            $("#motor_sgst_tot").val(motor_sgst_tot);
            // $("#gst_rate").val(gst_rate);
            // $("#gst_tot").val(gst_tot);
            $("#tot_payable_premium").val(tot_payable_premium);
            $("#private_car_policy_id").val(private_car_policy_id);

        });
        var tr_table ="";
        $.each(tot_othercover_ind_json, function(key, val) {
            add_othercover_counter = key;
            index = tot_othercover_ind_json[key][0];
            var other_cover_name=tot_othercover_ind_json[key][1];
            var other_cover_rate=tot_othercover_ind_json[key][2];
            var other_cover_tot=tot_othercover_ind_json[key][3];
            main_Other_Cover.push(add_othercover_counter);
            // alert(other_cover_tot);
                tr_table += '<tr> <td><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_othercover_' + add_othercover_counter + '" onClick="removeOtherCover(' + add_othercover_counter + ')" ></button></center></td><td width="43%"><input type="text" name="other_cover_name[]"  id="other_cover_name_' + add_othercover_counter + '" class="form-control other_cover_name" value="'+other_cover_name+'"></td> <td><input type="text" name="other_cover_rate[]"  id="other_cover_rat_' + add_othercover_counter + '" class="form-control other_cover_rate" value="'+other_cover_rate+'"></td> <td><input type="text" name="other_cover_tot[]"  id="other_cover_tot_' + add_othercover_counter + '" class="form-control other_cover_tot" onkeyup="Tp_OtherCover_Cal()" value="'+other_cover_tot+'"></td> </tr> ';
        });
        $("#first_table_tbody").append(tr_table);
            othercover_length = tot_othercover_ind_json.length;
        $("#Add_other_cover").attr("onClick", "Add_OtherCover(" + othercover_length + ")");
    }

    function edit_motor_commercial_policy(motor_commercial_policy_data_arr){
        $.each(motor_commercial_policy_data_arr, function(key, val) {
            commercial_policy_id = motor_commercial_policy_data_arr.commercial_policy_id;
            motor_commercial_policy_fk_policy_id = motor_commercial_policy_data_arr.motor_commercial_policy_fk_policy_id;
            fk_policy_type_id = motor_commercial_policy_data_arr.fk_policy_type_id;
            fk_company_id = motor_commercial_policy_data_arr.fk_company_id;
            fk_department_id = motor_commercial_policy_data_arr.fk_department_id;
            var policy_name_txt = motor_commercial_policy_data_arr.policy_name_txt;
            var commercial_policy_status = motor_commercial_policy_data_arr.commercial_policy_status;
            var commercial_policy_del_flag = motor_commercial_policy_data_arr.commercial_policy_del_flag;

            var vehicle_make_model = motor_commercial_policy_data_arr.vehicle_make_model;
            var vehicle_reg_no = motor_commercial_policy_data_arr.vehicle_reg_no;
            var insu_declared_val = motor_commercial_policy_data_arr.insu_declared_val;
            var elect_acc_val = motor_commercial_policy_data_arr.elect_acc_val;
            var lpg_cng_idv_val = motor_commercial_policy_data_arr.lpg_cng_idv_val;
            var year_manufact_val = motor_commercial_policy_data_arr.year_manufact_val;
            var zone_city_code = motor_commercial_policy_data_arr.zone_city_code;
            var zone_city = motor_commercial_policy_data_arr.zone_city;
            var zone_city_cat = motor_commercial_policy_data_arr.zone_city_cat;
            var gvw_val = motor_commercial_policy_data_arr.gvw_val;
            var class_val = motor_commercial_policy_data_arr.class_val;
            var type_of_cover = motor_commercial_policy_data_arr.type_of_cover;
            var policy_period = motor_commercial_policy_data_arr.policy_period;
            var inception_date = motor_commercial_policy_data_arr.inception_date;
            var expiry_date = motor_commercial_policy_data_arr.expiry_date;

            $("#vehicle_make_model").val(vehicle_make_model);
            $("#vehicle_reg_no").val(vehicle_reg_no);
            $("#insu_declared_val").val(insu_declared_val);
            $("#elect_acc_val").val(elect_acc_val);
            $("#lpg_cng_idv_val").val(lpg_cng_idv_val);
            $("#year_manufact_val").val(year_manufact_val);
            $("#zone_city_code").val(zone_city_code);
            $("#zone_city").val(zone_city);
            $("#zone_city_cat").val(zone_city_cat);
            $("#gvw_val").val(gvw_val);
            $("#class_val").val(class_val);
            $("#type_of_cover").val(type_of_cover);
            $("#policy_period").val(policy_period);
            $("#inception_date").val(inception_date);
            $("#expiry_date").val(expiry_date);

            var od_basic_od_tot = motor_commercial_policy_data_arr.od_basic_od_tot;
            var od_elec_acc_tot = motor_commercial_policy_data_arr.od_elec_acc_tot;
            var od_trailer_tot = motor_commercial_policy_data_arr.od_trailer_tot;
            var od_bi_fuel_kit_tot = motor_commercial_policy_data_arr.od_bi_fuel_kit_tot;
            var od_od_basic_od1_tot = motor_commercial_policy_data_arr.od_od_basic_od1_tot;
            var od_geog_area_tot = motor_commercial_policy_data_arr.od_geog_area_tot;
            var od_fiber_glass_tank_tot = motor_commercial_policy_data_arr.od_fiber_glass_tank_tot;
            var od_imt_cover_mud_guard_tot = motor_commercial_policy_data_arr.od_imt_cover_mud_guard_tot;
            var od_basic_od2_tot = motor_commercial_policy_data_arr.od_basic_od2_tot;
            var od_basic_od3_tot = motor_commercial_policy_data_arr.od_basic_od3_tot;
            var od_ncb_per = motor_commercial_policy_data_arr.od_ncb_per;
            var od_ncb_tot = motor_commercial_policy_data_arr.od_ncb_tot;
            var od_tot_anual_od_premium = motor_commercial_policy_data_arr.od_tot_anual_od_premium;
            var od_special_disc_per = motor_commercial_policy_data_arr.od_special_disc_per;
            var od_special_disc_tot = motor_commercial_policy_data_arr.od_special_disc_tot;
            var od_special_load_per = motor_commercial_policy_data_arr.od_special_load_per;
            var od_special_load_tot = motor_commercial_policy_data_arr.od_special_load_tot;
            var od_tot_od_premium = motor_commercial_policy_data_arr.od_tot_od_premium;

            $("#od_basic_od_tot").val(od_basic_od_tot);
            $("#od_elec_acc_tot").val(od_elec_acc_tot);
            $("#od_trailer_tot").val(od_trailer_tot);
            $("#od_bi_fuel_kit_tot").val(od_bi_fuel_kit_tot);
            $("#od_od_basic_od1_tot").val(od_od_basic_od1_tot);
            $("#od_geog_area_tot").val(od_geog_area_tot);
            $("#od_fiber_glass_tank_tot").val(od_fiber_glass_tank_tot);
            $("#od_imt_cover_mud_guard_tot").val(od_imt_cover_mud_guard_tot);
            $("#od_basic_od2_tot").val(od_basic_od2_tot);
            $("#od_basic_od3_tot").val(od_basic_od3_tot);
            $("#od_ncb_per").val(od_ncb_per);
            $("#od_ncb_tot").val(od_ncb_tot);
            $("#od_tot_anual_od_premium").val(od_tot_anual_od_premium);
            $("#od_special_disc_per").val(od_special_disc_per);
            $("#od_special_disc_tot").val(od_special_disc_tot);
            $("#od_special_load_per").val(od_special_load_per);
            $("#od_special_load_tot").val(od_special_load_tot);
            $("#od_tot_od_premium").val(od_tot_od_premium);

            var tp_basic_tp_tot = motor_commercial_policy_data_arr.tp_basic_tp_tot;
            var tp_restr_tppd_tot = motor_commercial_policy_data_arr.tp_restr_tppd_tot;
            var tp_trailer_tot = motor_commercial_policy_data_arr.tp_trailer_tot;
            var tp_bi_fuel_kit_tot = motor_commercial_policy_data_arr.tp_bi_fuel_kit_tot;
            var tp_basic_tp1_tot = motor_commercial_policy_data_arr.tp_basic_tp1_tot;
            var tp_geog_area_tot = motor_commercial_policy_data_arr.tp_geog_area_tot;
            var tp_compul_pa_own_driv_tot = motor_commercial_policy_data_arr.tp_compul_pa_own_driv_tot;
            var tp_pa_paid_driver_tot = motor_commercial_policy_data_arr.tp_pa_paid_driver_tot;
            var tp_ll_emp_non_fare_tot = motor_commercial_policy_data_arr.tp_ll_emp_non_fare_tot;
            var tp_ll_driver_cleaner_tot = motor_commercial_policy_data_arr.tp_ll_driver_cleaner_tot;
            var tp_ll_person_operation_tot = motor_commercial_policy_data_arr.tp_ll_person_operation_tot;
            var tp_basic_tp2_tot = motor_commercial_policy_data_arr.tp_basic_tp2_tot;
            var tp_tot_premium = motor_commercial_policy_data_arr.tp_tot_premium;
            var tp_consumables = motor_commercial_policy_data_arr.tp_consumables;
            var tp_zero_depreciation = motor_commercial_policy_data_arr.tp_zero_depreciation;
            var tp_road_side_ass = motor_commercial_policy_data_arr.tp_road_side_ass;
            var tp_tot_addon_premium = motor_commercial_policy_data_arr.tp_tot_addon_premium;

            $("#tp_basic_tp_tot").val(tp_basic_tp_tot);
            $("#tp_restr_tppd_tot").val(tp_restr_tppd_tot);
            $("#tp_trailer_tot").val(tp_trailer_tot);
            $("#tp_bi_fuel_kit_tot").val(tp_bi_fuel_kit_tot);
            $("#tp_basic_tp1_tot").val(tp_basic_tp1_tot);
            $("#tp_geog_area_tot").val(tp_geog_area_tot);
            $("#tp_compul_pa_own_driv_tot").val(tp_compul_pa_own_driv_tot);
            $("#tp_pa_paid_driver_tot").val(tp_pa_paid_driver_tot);
            $("#tp_ll_emp_non_fare_tot").val(tp_ll_emp_non_fare_tot);
            $("#tp_ll_driver_cleaner_tot").val(tp_ll_driver_cleaner_tot);
            $("#tp_ll_person_operation_tot").val(tp_ll_person_operation_tot);
            $("#tp_basic_tp2_tot").val(tp_basic_tp2_tot);
            $("#tp_tot_premium").val(tp_tot_premium);
            $("#tp_consumables").val(tp_consumables);
            $("#tp_zero_depreciation").val(tp_zero_depreciation);
            $("#tp_road_side_ass").val(tp_road_side_ass);
            $("#tp_tot_addon_premium").val(tp_tot_addon_premium);

            var tot_owd_premium = motor_commercial_policy_data_arr.tot_owd_premium;
            var tot_owd_addon_premium = motor_commercial_policy_data_arr.tot_owd_addon_premium;
            var tot_btp_premium = motor_commercial_policy_data_arr.tot_btp_premium;
            var tot_other_tp_premium = motor_commercial_policy_data_arr.tot_other_tp_premium;
            var tot_premium = motor_commercial_policy_data_arr.tot_premium;
            var tot_owd_cgst_rate = motor_commercial_policy_data_arr.tot_owd_cgst_rate;
            var tot_owd_sgst_rate = motor_commercial_policy_data_arr.tot_owd_sgst_rate;
            var tot_owd_addon_cgst_rate = motor_commercial_policy_data_arr.tot_owd_addon_cgst_rate;
            var tot_owd_addon_sgst_rate = motor_commercial_policy_data_arr.tot_owd_addon_sgst_rate;
            var tot_btp_cgst_rate = motor_commercial_policy_data_arr.tot_btp_cgst_rate;
            var tot_btp_sgst_rate = motor_commercial_policy_data_arr.tot_btp_sgst_rate;
            var tot_other_tp_cgst_rate = motor_commercial_policy_data_arr.tot_other_tp_cgst_rate;
            var tot_other_tp_sgst_rate = motor_commercial_policy_data_arr.tot_other_tp_sgst_rate;
            var tot_owd_gst = motor_commercial_policy_data_arr.tot_owd_gst;
            var tot_owd_addon_gst = motor_commercial_policy_data_arr.tot_owd_addon_gst;
            var tot_btp_gst = motor_commercial_policy_data_arr.tot_btp_gst;
            var tot_other_tp_gst = motor_commercial_policy_data_arr.tot_other_tp_gst;
            var tot_gst_amt = motor_commercial_policy_data_arr.tot_gst_amt;
            var tot_owd_final = motor_commercial_policy_data_arr.tot_owd_final;
            var tot_owd_addon_final = motor_commercial_policy_data_arr.tot_owd_addon_final;
            var tot_btp_final = motor_commercial_policy_data_arr.tot_btp_final;
            var tot_other_tp_final = motor_commercial_policy_data_arr.tot_other_tp_final;
            var tot_final_premium = motor_commercial_policy_data_arr.tot_final_premium;
            var tot_payable_premium = motor_commercial_policy_data_arr.tot_payable_premium;

            $("#tot_owd_premium").val(tot_owd_premium);
            $("#tot_owd_addon_premium").val(tot_owd_addon_premium);
            $("#tot_btp_premium").val(tot_btp_premium);
            $("#tot_other_tp_premium").val(tot_other_tp_premium);
            $("#tot_premium").val(tot_premium);
            $("#tot_owd_cgst_rate").val(tot_owd_cgst_rate);
            $("#tot_owd_sgst_rate").val(tot_owd_sgst_rate);
            $("#tot_owd_addon_cgst_rate").val(tot_owd_addon_cgst_rate);
            $("#tot_owd_addon_sgst_rate").val(tot_owd_addon_sgst_rate);
            $("#tot_btp_cgst_rate").val(tot_btp_cgst_rate);
            $("#tot_btp_sgst_rate").val(tot_btp_sgst_rate);
            $("#tot_other_tp_cgst_rate").val(tot_other_tp_cgst_rate);
            $("#tot_other_tp_sgst_rate").val(tot_other_tp_sgst_rate);
            $("#tot_owd_gst").val(tot_owd_gst);
            $("#tot_owd_addon_gst").val(tot_owd_addon_gst);
            $("#tot_btp_gst").val(tot_btp_gst);
            $("#tot_other_tp_gst").val(tot_other_tp_gst);
            $("#tot_gst_amt").val(tot_gst_amt);
            $("#tot_owd_final").val(tot_owd_final);
            $("#tot_owd_addon_final").val(tot_owd_addon_final);
            $("#tot_btp_final").val(tot_btp_final);
            $("#tot_other_tp_final").val(tot_other_tp_final);
            $("#tot_final_premium").val(tot_final_premium);
            $("#tot_payable_premium").val(tot_payable_premium);

            $("#commercial_policy_id").val(commercial_policy_id);

        });
    }

    function edit_Common_Individual(common_ind_data_arr){
        var tot_commind_json_data = "";
        var common_ind_policy_id = "";
        var common_ind_policy_fk_policy_id = "";
        var fk_policy_type_id = "";
        var fk_company_id = "";
        var fk_department_id = "";
        $("#first_table_tbody").empty();
        $.each(common_ind_data_arr, function(key_gmc, val_gmc) {
            common_ind_policy_id = common_ind_data_arr.common_ind_policy_id;
            common_ind_policy_fk_policy_id = common_ind_data_arr.common_ind_policy_fk_policy_id;
            fk_policy_type_id = common_ind_data_arr.fk_policy_type_id;
            fk_company_id = common_ind_data_arr.fk_company_id;
            fk_department_id = common_ind_data_arr.fk_department_id;
            var policy_name_txt = common_ind_data_arr.policy_name_txt;
            tot_commind_json_data = JSON.parse(common_ind_data_arr.tot_commind_json_data);
            var comm_ind_total_amount = common_ind_data_arr.comm_ind_total_amount;
            var comm_ind_less_discount_rate = common_ind_data_arr.comm_ind_less_discount_rate
            var comm_ind_less_discount_tot = common_ind_data_arr.comm_ind_less_discount_tot
            var comm_ind_load_desc = common_ind_data_arr.comm_ind_load_desc
            var comm_ind_load_tot = common_ind_data_arr.comm_ind_load_tot
            var comm_ind_gross_premium = common_ind_data_arr.comm_ind_gross_premium
            var comm_ind_gross_premium_new = common_ind_data_arr.comm_ind_gross_premium_new
            var comm_ind_cgst_rate = common_ind_data_arr.comm_ind_cgst_rate
            var comm_ind_cgst_tot = common_ind_data_arr.comm_ind_cgst_tot
            var comm_ind_sgst_rate = common_ind_data_arr.comm_ind_sgst_rate
            var comm_ind_sgst_tot = common_ind_data_arr.comm_ind_sgst_tot
            var comm_ind_final_premium = common_ind_data_arr.comm_ind_final_premium
            var comm_ind_status = common_ind_data_arr.comm_ind_status
            var comm_ind_del_flag = common_ind_data_arr.comm_ind_del_flag;

            $("#comm_ind_total_amount").val(comm_ind_total_amount);
            $("#comm_ind_less_discount_rate").val(comm_ind_less_discount_rate);
            $("#comm_ind_less_discount_tot").val(comm_ind_less_discount_tot);
            $("#comm_ind_load_desc").val(comm_ind_load_desc);
            $("#comm_ind_load_tot").val(comm_ind_load_tot);
            $("#comm_ind_gross_premium").val(comm_ind_gross_premium);
            $("#comm_ind_gross_premium_new").val(comm_ind_gross_premium_new);
            $("#cgst_fire_per").val(comm_ind_cgst_rate);
            $("#comm_ind_cgst_tot").val(comm_ind_cgst_tot);
            $("#sgst_fire_per").val(comm_ind_sgst_rate);
            $("#comm_ind_sgst_tot").val(comm_ind_sgst_tot);
            $("#comm_ind_final_premium").val(comm_ind_final_premium);
            $("#common_ind_policy_id").val(common_ind_policy_id);
        });
        var commonind_tr = "";
        var add_commonind_counter = "";
        var index = "";
        var commonind_length = tot_commind_json_data.length;
        var last_counter = commonind_length-1;
        $.each(tot_commind_json_data, function(key, val) {
            add_commonind_counter = key;
            index = tot_commind_json_data[key][0];
            name_insured_member_name = tot_commind_json_data[key][1];
            name_insured_member_name_txt = tot_commind_json_data[key][2];
            name_insured_dob = tot_commind_json_data[key][3];
            name_insured_age = tot_commind_json_data[key][4];
            name_insured_relation = tot_commind_json_data[key][5];
            name_insured_relation_txt = tot_commind_json_data[key][6];
            past_history = tot_commind_json_data[key][7];
            type_of_policy = tot_commind_json_data[key][8];
            policy_option = tot_commind_json_data[key][9];
            nominee_name = tot_commind_json_data[key][10];
            nominee_name_txt = tot_commind_json_data[key][11];
            nominee_relation = tot_commind_json_data[key][12];
            nominee_relation_txt = tot_commind_json_data[key][13];
            name_insured_sum_insured = tot_commind_json_data[key][14];
            name_insured_premium = tot_commind_json_data[key][15];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);
            // alert(name_insured_premium);
            main_CommonInd.push(add_commonind_counter);
            commonind_tr += '<tr> <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_common_ind_'+add_commonind_counter+'" onClick=remove_Common_Ind('+add_commonind_counter+') ></td> <td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_commonind_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_commonind_counter+')"><option value="null">Select Member Names</option>'+option_val_data+'  </select></td> <td><input style="width:100px;" type="text" id="name_insured_dob_'+add_commonind_counter+'" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td>   <td><input style="width:55px;" type="text" id="name_insured_age_'+add_commonind_counter+'" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td>  <td><select style="width:120px;" id="name_insured_relation_'+add_commonind_counter+'" name="name_insured_relation[]" class="form-control name_insured_relation">  <option value="null">Select Relation</option>   <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>   <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option>  <?php endforeach;  endif; ?>   </select></td> <td><textarea style="width:180px;" id="past_history_'+add_commonind_counter+'" name="past_history[]" class="form-control past_history" rows="3">'+past_history+'</textarea> </td> <td><input style="width:100px;" type="text" id="type_of_policy_'+add_commonind_counter+'" name="type_of_policy[]" value="'+type_of_policy+'" class="form-control type_of_policy" > </td>  <td id="policy_option_div"><select style="width:100px;" class="form-control policy_option" name="policy_option[]" id="policy_option_'+add_commonind_counter+'" disabled>   <option value="Floater" >Floater</option> <option value="Individual" selected>Individual</option>     </select></td>  <td width="12%" id="nominee_name_div"><select style="width:280px;" id="nominee_name_'+add_commonind_counter+'" name="nominee_name[]" class="form-control nominee_name">  <option value="null">Select Nominee Name</option> '+option_val_data+' </select></td> <td id="nominee_relation_div"><select style="width:120px;" id="nominee_relation_'+add_commonind_counter+'" name="nominee_relation[]" class="form-control nominee_relation">  <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="8%" id="name_insured_sum_insured_div"><input style="width:110px;" type="text" name="name_insured_sum_insured[]" id="name_insured_sum_insured_'+add_commonind_counter+'" value="'+name_insured_sum_insured+'" class="form-control name_insured_sum_insured"  ></td><td width="8%" id="name_insured_premium_div"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_'+add_commonind_counter+'" value="'+name_insured_premium+'" class="form-control name_insured_premium"  onkeyup="Total_Premium_Cal('+add_commonind_counter+')" ></td></tr>';

        });
        $("#Add_Common_Ind").attr("onClick", "AddCommonInd(" + (parseInt(commonind_length)) + ")");
        $("#first_table_tbody").append(commonind_tr);

        $.each(tot_commind_json_data, function(key, val) {
            add_commonind_counter = key;
            index = tot_commind_json_data[key][0];
            name_insured_member_name = tot_commind_json_data[key][1];
            name_insured_relation = tot_commind_json_data[key][5];
            policy_option = tot_commind_json_data[key][9];
            nominee_name = tot_commind_json_data[key][10];
            nominee_relation = tot_commind_json_data[key][12];
            $("#name_insured_member_name_"+add_commonind_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_commonind_counter).val(name_insured_relation);
            $("#policy_option_"+add_commonind_counter).val(policy_option);
            $("#nominee_name_"+add_commonind_counter).val(nominee_name);
            $("#nominee_relation_"+add_commonind_counter).val(nominee_relation);
        });
    }

    function edit_Common_Floater(common_float_data_arr){
        var tot_commfloat_json_data = "";
        var common_float_policy_id = "";
        var common_float_policy_fk_policy_id = "";
        var fk_policy_type_id = "";
        var fk_company_id = "";
        var fk_department_id = "";
        $("#first_table_tbody").empty();
        $.each(common_float_data_arr, function(key_gmc, val_gmc) {
            common_float_policy_id = common_float_data_arr.common_float_policy_id;
            common_float_policy_fk_policy_id = common_float_data_arr.common_float_policy_fk_policy_id;
            fk_policy_type_id = common_float_data_arr.fk_policy_type_id;
            fk_company_id = common_float_data_arr.fk_company_id;
            fk_department_id = common_float_data_arr.fk_department_id;
            var policy_name_txt = common_float_data_arr.policy_name_txt;
            tot_commfloat_json_data = JSON.parse(common_float_data_arr.tot_commfloat_json_data);
            var comm_float_total_amount = common_float_data_arr.comm_float_total_amount;
            var comm_float_less_discount_rate = common_float_data_arr.comm_float_less_discount_rate;
            var comm_float_less_discount_tot = common_float_data_arr.comm_float_less_discount_tot;
            var comm_float_load_desc = common_float_data_arr.comm_float_load_desc;
            var comm_float_load_tot = common_float_data_arr.comm_float_load_tot;
            var comm_float_gross_premium = common_float_data_arr.comm_float_gross_premium;
            var comm_float_gross_premium_new = common_float_data_arr.comm_float_gross_premium_new;
            var comm_float_cgst_rate = common_float_data_arr.comm_float_cgst_rate;
            var comm_float_cgst_tot = common_float_data_arr.comm_float_cgst_tot;
            var comm_float_sgst_rate = common_float_data_arr.comm_float_sgst_rate;
            var comm_float_sgst_tot = common_float_data_arr.comm_float_sgst_tot;
            var comm_float_final_premium = common_float_data_arr.comm_float_final_premium;
            var comm_float_status = common_float_data_arr.comm_float_status;
            var comm_float_del_flag = common_float_data_arr.comm_float_del_flag;

            $("#comm_float_total_amount").val(comm_float_total_amount);
            $("#comm_float_less_discount_rate").val(comm_float_less_discount_rate);
            $("#comm_float_less_discount_tot").val(comm_float_less_discount_tot);
            $("#comm_float_load_desc").val(comm_float_load_desc);
            $("#comm_float_load_tot").val(comm_float_load_tot);
            $("#comm_float_gross_premium").val(comm_float_gross_premium);
            $("#comm_float_gross_premium_new").val(comm_float_gross_premium_new);
            $("#cgst_fire_per").val(comm_float_cgst_rate);
            $("#comm_float_cgst_tot").val(comm_float_cgst_tot);
            $("#sgst_fire_per").val(comm_float_sgst_rate);
            $("#comm_float_sgst_tot").val(comm_float_sgst_tot);
            $("#comm_float_final_premium").val(comm_float_final_premium);
            $("#common_float_policy_id").val(common_float_policy_id);
        });
        var commonfloat_tr = "";
        var add_commonfloat_counter = "";
        var index = "";
        var commonfloat_length = tot_commfloat_json_data.length;
        var last_counter = commonfloat_length-1;
        $.each(tot_commfloat_json_data, function(key, val) {
            add_commonfloat_counter = key;
            index = tot_commfloat_json_data[key][0];
            name_insured_member_name = tot_commfloat_json_data[key][1];
            name_insured_member_name_txt = tot_commfloat_json_data[key][2];
            name_insured_dob = tot_commfloat_json_data[key][3];
            name_insured_age = tot_commfloat_json_data[key][4];
            name_insured_relation = tot_commfloat_json_data[key][5];
            name_insured_relation_txt = tot_commfloat_json_data[key][6];
            past_history = tot_commfloat_json_data[key][7];
            type_of_policy = tot_commfloat_json_data[key][8];
            policy_option = tot_commfloat_json_data[key][9];
            family_size = tot_commfloat_json_data[0][10];
            nominee_name = tot_commfloat_json_data[0][11];
            nominee_name_txt = tot_commfloat_json_data[0][12];
            nominee_relation = tot_commfloat_json_data[0][13];
            nominee_relation_txt = tot_commfloat_json_data[0][14];
            name_insured_sum_insured = tot_commfloat_json_data[0][15];
            name_insured_premium = tot_commfloat_json_data[0][16];
            // alert(name_insured_premium);
            main_CommonInd.push(add_commonfloat_counter);
            commonfloat_tr += '<tr><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_commonfloater_'+add_commonfloat_counter+'" onClick=remove_Common_Floater('+add_commonfloat_counter+') ></td> <td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_commonfloat_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_commonfloat_counter+')"> <option value="null">Select Member Names</option>'+option_val_data+'</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_'+add_commonfloat_counter+'" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td><td><input style="width:55px;" type="text" id="name_insured_age_'+add_commonfloat_counter+'" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td> <td><select style="width:120px;" id="name_insured_relation_'+add_commonfloat_counter+'" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>    <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option>  <?php endforeach;  endif; ?>  </select></td> <td><textarea style="width:180px;" id="past_history_'+add_commonfloat_counter+'" name="past_history[]" class="form-control past_history" rows="3">'+past_history+'</textarea> </td><td><input style="width:100px;" type="text" id="type_of_policy_'+add_commonfloat_counter+'" name="type_of_policy[]" class="form-control type_of_policy" value="'+type_of_policy+'" > </td><td><select style="width:100px;" class="form-control policy_option" name="policy_option[]" id="policy_option_'+add_commonfloat_counter+'" disabled><option value="Floater" selected >Floater</option><option value="Individual">Individual</option>  </select></td>';

            if (add_commonfloat_counter == 0) {
                commonfloat_tr += '<td id="family_size_div_txt" rowspan="'+commonfloat_length+'"><input style="width:100px;" type="text" id="family_size" name="family_size[]" class="form-control family_size" value="'+family_size+'" > </td> <td width="12%" id="nominee_name_div" rowspan="'+commonfloat_length+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"><option value="null">Select Nominee Name</option>'+option_val_data+' </select></td> <td id="nominee_relation_div"  rowspan="'+commonfloat_length+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"><option value="null">Select Nominee Relation</option><?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>   <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;  endif; ?> </select></td> <td width="8%" id="name_insured_sum_insured_div" rowspan="'+commonfloat_length+'"><input style="width:110px;" type="text" name="name_insured_sum_insured[]" id="name_insured_sum_insured" value="'+name_insured_sum_insured+'" class="form-control name_insured_sum_insured"></td><td width="8%" id="name_insured_premium_div" rowspan="'+commonfloat_length+'"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="'+name_insured_premium+'" class="form-control name_insured_premium"  onkeyup="Total_Premium_Cal(0)"></td></tr>';
            }

        });
        $("#Add_Common_Floater").attr("onClick", "AddCommonFloater(" + (parseInt(commonfloat_length)) + ")");
        $("#first_table_tbody").append(commonfloat_tr);

        $.each(tot_commfloat_json_data, function(key, val) {
            add_commonfloat_counter = key;
            index = tot_commfloat_json_data[key][0];
            name_insured_member_name = tot_commfloat_json_data[key][1];
            name_insured_relation = tot_commfloat_json_data[key][5];
            type_of_policy = tot_commfloat_json_data[key][8];
            policy_option = tot_commfloat_json_data[key][9];
            family_size = tot_commfloat_json_data[0][10];
            nominee_name = tot_commfloat_json_data[0][11];
            nominee_name_txt = tot_commfloat_json_data[0][12];
            nominee_relation = tot_commfloat_json_data[0][13];
            nominee_relation_txt = tot_commfloat_json_data[0][14];
            // alert(nominee_name);
            // $("#type_of_policy_"+add_commonfloat_counter).val(type_of_policy);
            $("#name_insured_member_name_"+add_commonfloat_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_commonfloat_counter).val(name_insured_relation);
            $("#policy_option").val(policy_option);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
        });  
    }

    function edit_GMC(gmc_ind_data_arr){
        var tot_gmc_json_data = "";
        var gmc_policy_id = "";
        var gmc_policy_fk_policy_id = "";
        var fk_policy_type_id = "";
        var fk_company_id = "";
        var fk_department_id = "";
        $("#first_table_tbody").empty();
        $.each(gmc_ind_data_arr, function(key_gmc, val_gmc) {
                gmc_policy_id = gmc_ind_data_arr.gmc_policy_id;
                gmc_policy_fk_policy_id = gmc_ind_data_arr.gmc_policy_fk_policy_id;
                fk_policy_type_id = gmc_ind_data_arr.fk_policy_type_id;
                fk_company_id = gmc_ind_data_arr.fk_company_id;
                fk_department_id = gmc_ind_data_arr.fk_department_id;
            var policy_name_txt = gmc_ind_data_arr.policy_name_txt;
            tot_gmc_json_data = JSON.parse(gmc_ind_data_arr.tot_gmc_json_data);
            var gmc_family_size = gmc_ind_data_arr.gmc_family_size;
            var gmc_tot_sum_insured = gmc_ind_data_arr.gmc_tot_sum_insured;
            $("#gmc_family_size").val(gmc_family_size);
            $("#gmc_total_sum_insured").val(gmc_tot_sum_insured);
            $("#gmc_policy_id").val(gmc_policy_id);
        });
        var gmc_tr = "";
        var add_gmc_counter = "";
        var index = "";
        var gmc_length = tot_gmc_json_data.length;
        var last_counter = gmc_length-1;
        $.each(tot_gmc_json_data, function(key, val) {
            add_gmc_counter = key;
            index = tot_gmc_json_data[key][0];
            gmc_client_email = tot_gmc_json_data[key][1];
            gmc_date = tot_gmc_json_data[key][2];
            gmc_excel_attach_file = tot_gmc_json_data[key][3];
            gmc_company_email = tot_gmc_json_data[key][4];
            gmc_attach_quote_file = tot_gmc_json_data[key][5];
            gmc_attach_endorsment_copy_file = tot_gmc_json_data[key][6];
            gmc_gross_premium = tot_gmc_json_data[key][7];
            gmc_cgst = tot_gmc_json_data[key][8];
            gmc_sgst = tot_gmc_json_data[key][9];
            gmc_final_premium = tot_gmc_json_data[key][10];
            main_GMC.push(add_gmc_counter);
            gmc_tr += '<tr><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_gmc_'+add_gmc_counter+'" onClick=removeGMC('+add_gmc_counter+') ></td><td width="12%"><textarea style="width:100px;" name="gmc_client_email[]" id="gmc_client_email_'+add_gmc_counter+'" class="form-control gmc_client_email" rows="3">'+gmc_client_email+'</textarea></td> <td><input style="width:140px;" type="date" name="gmc_date[]"  id="gmc_date_'+add_gmc_counter+'"value="'+gmc_date+'" class="form-control gmc_date"></td><td><input style="width:200px;" type="file" name="gmc_excel_attach[]" id="gmc_excel_attach_'+add_gmc_counter+'" value="" class="form-control gmc_excel_attach" ><span id="gmc_excel_details_'+add_gmc_counter+'"></span><span id="gmc_excel_attach_err_'+add_gmc_counter+'"></span><input type="hidden" name="gmc_excel_attach_hidden" id="gmc_excel_attach_hidden_'+add_gmc_counter+'" value="'+gmc_excel_attach_file+'"></td> <td><textarea style="width:100px;" name="gmc_company_email[]" id="gmc_company_email_'+add_gmc_counter+'" class="form-control gmc_company_email" rows="3">'+gmc_company_email+'</textarea></td><td><input style="width:200px;" type="file" name="gmc_attach_quote" id="gmc_attach_quote_'+add_gmc_counter+'" class="form-control gmc_attach_quote" ><span id="gmc_quote_details_'+add_gmc_counter+'" > </span><input type="hidden" name="gmc_attach_quote_hidden" id="gmc_attach_quote_hidden_'+add_gmc_counter+'" value="'+gmc_attach_quote_file+'"><span id="gmc_attach_quote_err_'+add_gmc_counter+'"></span></td><td><input style="width:200px;" type="file" name="gmc_attach_endorsment_copy" id="gmc_attach_endorsment_copy_'+add_gmc_counter+'" class="form-control gmc_attach_endorsment_copy" ><span id="gmc_endorsment_copy_details_'+add_gmc_counter+'" > </span><input type="hidden" name="gmc_attach_endorsment_copy_hidden" id="gmc_attach_endorsment_copy_hidden_'+add_gmc_counter+'" value="'+gmc_attach_endorsment_copy_file+'"><span id="gmc_attach_endorsment_copy_err_'+add_gmc_counter+'"></span></td>  <td><input style="width:100px;" type="text" name="gmc_gross_premium" id="gmc_gross_premium_'+add_gmc_counter+'" class="form-control gmc_gross_premium" value="'+gmc_gross_premium+'"></td>  <td><input style="width:100px;" type="text" name="gmc_cgst" id="gmc_cgst_'+add_gmc_counter+'" class="form-control gmc_cgst" value="'+gmc_cgst+'"></td> <td><input style="width:100px;" type="text" name="gmc_sgst" id="gmc_sgst_'+add_gmc_counter+'" class="form-control gmc_sgst" value="'+gmc_sgst+'"></td>  <td><input style="width:100px;" type="text" name="gmc_final_premium" id="gmc_final_premium_'+add_gmc_counter+'" class="form-control gmc_final_premium" value="'+gmc_final_premium+'"></td>   </tr>';

        });
        $("#Add_GMC").attr("onClick", "AddGMC(" + (parseInt(gmc_length)-1) + ")");
        $("#first_table_tbody").append(gmc_tr);

        $.each(tot_gmc_json_data, function(key, val) {
            add_gmc_counter = key;
            gmc_excel_attach_file = tot_gmc_json_data[key][3];
            gmc_attach_quote_file = tot_gmc_json_data[key][5];
            gmc_attach_endorsment_copy_file = tot_gmc_json_data[key][6];
            // alert(gmc_excel_attach_file);
            if (gmc_excel_attach_file == "" || gmc_excel_attach_file == null) {
                // alert("hi")
                var view_gmc_excel_attach = "";
                var download_gmc_excel_attach = "";
            } else if (gmc_excel_attach_file != "") {
                var view_gmc_excel_attach = "<span >"+gmc_excel_attach_file+"</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/1/"+ gmc_excel_attach_file +"'  class='text-info'><b>View</b></a>";
                var download_gmc_excel_attach = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/1/"+ gmc_excel_attach_file+"'  class='text-success'><b>Download</b></a>";
            }
            if (gmc_attach_quote_file == "" || gmc_attach_quote_file == null) {
                var view_gmc_attach_quote = "";
                var download_gmc_attach_quote = "";
            } else if (gmc_attach_quote_file != "") {
                var view_gmc_attach_quote = "<span >"+gmc_attach_quote_file+"</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/2/"+ gmc_attach_quote_file +"'  class='text-info'><b>View</b></a>";
                var download_gmc_attach_quote = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/2/"+ gmc_attach_quote_file+"'  class='text-success'><b>Download</b></a>";
            }
            if (gmc_attach_endorsment_copy_file == "" || gmc_attach_endorsment_copy_file == null) {
                var view_gmc_attach_endorsment_copy = "";
                var download_gmc_attach_endorsment_copy = "";
            } else if (gmc_attach_endorsment_copy_file != "") {
                var view_gmc_attach_endorsment_copy = "<span >"+gmc_attach_endorsment_copy_file+"</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/3/"+ gmc_attach_endorsment_copy_file +"'  class='text-info'><b>View</b></a>";
                var download_gmc_attach_endorsment_copy = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/3/"+ gmc_attach_endorsment_copy_file+"'  class='text-success'><b>Download</b></a>";
            }
            $("#last_date").val(gmc_date);
            $("#gmc_excel_details_"+add_gmc_counter).html(view_gmc_excel_attach + "  " + download_gmc_excel_attach);
            $("#gmc_quote_details_"+add_gmc_counter).html(view_gmc_attach_quote + "  " + download_gmc_attach_quote);
            $("#gmc_endorsment_copy_details_"+add_gmc_counter).html(view_gmc_attach_endorsment_copy + "  " + download_gmc_attach_endorsment_copy);
            var last_date=$("#last_date").val();
            $(".gmc_date").attr("min", last_date);
        });
    }

    function edit_GPA(gpa_ind_data_arr){
        var tot_gpa_json_data = "";
        var gpa_policy_id = "";
        var gpa_policy_fk_policy_id = "";
        var fk_policy_type_id = "";
        var fk_company_id = "";
        var fk_department_id = "";
        $("#first_table_tbody").empty();
        $.each(gpa_ind_data_arr, function(key_gpa, val_gpa) {
                gpa_policy_id = gpa_ind_data_arr.gpa_policy_id;
                gpa_policy_fk_policy_id = gpa_ind_data_arr.gpa_policy_fk_policy_id;
                fk_policy_type_id = gpa_ind_data_arr.fk_policy_type_id;
                fk_company_id = gpa_ind_data_arr.fk_company_id;
                fk_department_id = gpa_ind_data_arr.fk_department_id;
            var policy_name_txt = gpa_ind_data_arr.policy_name_txt;
            tot_gpa_json_data = JSON.parse(gpa_ind_data_arr.tot_gpa_json_data);
            var gpa_family_size = gpa_ind_data_arr.gpa_family_size;
            var gpa_tot_sum_insured = gpa_ind_data_arr.gpa_tot_sum_insured;
            $("#gmc_family_size").val(gpa_family_size);
            $("#gmc_total_sum_insured").val(gpa_tot_sum_insured);
            $("#gpa_policy_id").val(gpa_policy_id);
        });
        var gpa_tr = "";
        var add_gpa_counter = "";
        var index = "";
        var gpa_length = tot_gpa_json_data.length;
        var last_counter = gpa_length-1;
        $.each(tot_gpa_json_data, function(key, val) {
            add_gpa_counter = key;
            index = tot_gpa_json_data[key][0];
            gpa_client_email = tot_gpa_json_data[key][1];
            gpa_date = tot_gpa_json_data[key][2];
            gpa_excel_attach_file = tot_gpa_json_data[key][3];
            gpa_company_email = tot_gpa_json_data[key][4];
            gpa_attach_quote_file = tot_gpa_json_data[key][5];
            gpa_attach_endorsment_copy_file = tot_gpa_json_data[key][6];
            gpa_gross_premium = tot_gpa_json_data[key][7];
            gpa_cgst = tot_gpa_json_data[key][8];
            gpa_sgst = tot_gpa_json_data[key][9];
            gpa_final_premium = tot_gpa_json_data[key][10];
            main_GPA.push(add_gpa_counter);
            gpa_tr += '<tr><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_gpa_'+add_gpa_counter+'" onClick=removeGPA('+add_gpa_counter+') ></td><td width="12%"><textarea style="width:100px;" name="gpa_client_email[]" id="gpa_client_email_'+add_gpa_counter+'" class="form-control gpa_client_email" rows="3">'+gpa_client_email+'</textarea></td> <td><input style="width:140px;" type="date" name="gpa_date[]"  id="gpa_date_'+add_gpa_counter+'"value="'+gpa_date+'" class="form-control gpa_date"></td><td><input style="width:200px;" type="file" name="gpa_excel_attach[]" id="gpa_excel_attach_'+add_gpa_counter+'" value="" class="form-control gpa_excel_attach" ><span id="gpa_excel_details_'+add_gpa_counter+'"></span><span id="gpa_excel_attach_err_'+add_gpa_counter+'"></span><input type="hidden" name="gpa_excel_attach_hidden" id="gpa_excel_attach_hidden_'+add_gpa_counter+'" value="'+gpa_excel_attach_file+'"></td> <td><textarea style="width:100px;" name="gpa_company_email[]" id="gpa_company_email_'+add_gpa_counter+'" class="form-control gpa_company_email" rows="3">'+gpa_company_email+'</textarea></td><td><input style="width:200px;" type="file" name="gpa_attach_quote" id="gpa_attach_quote_'+add_gpa_counter+'" class="form-control gpa_attach_quote" ><span id="gpa_quote_details_'+add_gpa_counter+'" > </span><input type="hidden" name="gpa_attach_quote_hidden" id="gpa_attach_quote_hidden_'+add_gpa_counter+'" value="'+gpa_attach_quote_file+'"><span id="gpa_attach_quote_err_'+add_gpa_counter+'"></span></td><td><input style="width:200px;" type="file" name="gpa_attach_endorsment_copy" id="gpa_attach_endorsment_copy_'+add_gpa_counter+'" class="form-control gpa_attach_endorsment_copy" ><span id="gpa_endorsment_copy_details_'+add_gpa_counter+'" > </span><input type="hidden" name="gpa_attach_endorsment_copy_hidden" id="gpa_attach_endorsment_copy_hidden_'+add_gpa_counter+'" value="'+gpa_attach_endorsment_copy_file+'"><span id="gpa_attach_endorsment_copy_err_'+add_gpa_counter+'"></span></td>  <td><input style="width:100px;" type="text" name="gpa_gross_premium" id="gpa_gross_premium_'+add_gpa_counter+'" class="form-control gpa_gross_premium" value="'+gpa_gross_premium+'"></td>  <td><input style="width:100px;" type="text" name="gpa_cgst" id="gpa_cgst_'+add_gpa_counter+'" class="form-control gpa_cgst" value="'+gpa_cgst+'"></td> <td><input style="width:100px;" type="text" name="gpa_sgst" id="gpa_sgst_'+add_gpa_counter+'" class="form-control gpa_sgst" value="'+gpa_sgst+'"></td>  <td><input style="width:100px;" type="text" name="gpa_final_premium" id="gpa_final_premium_'+add_gpa_counter+'" class="form-control gpa_final_premium" value="'+gpa_final_premium+'"></td>   </tr>';

        });
        $("#Add_GPA").attr("onClick", "AddGPA(" + (parseInt(gpa_length)-1) + ")");
        $("#first_table_tbody").append(gpa_tr);

        $.each(tot_gpa_json_data, function(key, val) {
            add_gpa_counter = key;
            gpa_excel_attach_file = tot_gpa_json_data[key][3];
            gpa_attach_quote_file = tot_gpa_json_data[key][5];
            gpa_attach_endorsment_copy_file = tot_gpa_json_data[key][6];
            // alert(gpa_excel_attach_file);
            if (gpa_excel_attach_file == "" || gpa_excel_attach_file == null) {
                // alert("hi")
                var view_gpa_excel_attach = "";
                var download_gpa_excel_attach = "";
            } else if (gpa_excel_attach_file != "") {
                var view_gpa_excel_attach = "<span >"+gpa_excel_attach_file+"</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/2/1/"+ gpa_excel_attach_file +"'  class='text-info'><b>View</b></a>";
                var download_gpa_excel_attach = "<a href='<?php echo base_url(); ?>master/remote/download_doc/2/1/"+ gpa_excel_attach_file+"'  class='text-success'><b>Download</b></a>";
            }
            if (gpa_attach_quote_file == "" || gpa_attach_quote_file == null) {
                var view_gpa_attach_quote = "";
                var download_gpa_attach_quote = "";
            } else if (gpa_attach_quote_file != "") {
                var view_gpa_attach_quote = "<span >"+gpa_attach_quote_file+"</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/2/2/"+ gpa_attach_quote_file +"'  class='text-info'><b>View</b></a>";
                var download_gpa_attach_quote = "<a href='<?php echo base_url(); ?>master/remote/download_doc/2/2/"+ gpa_attach_quote_file+"'  class='text-success'><b>Download</b></a>";
            }
            if (gpa_attach_endorsment_copy_file == "" || gpa_attach_endorsment_copy_file == null) {
                var view_gpa_attach_endorsment_copy = "";
                var download_gpa_attach_endorsment_copy = "";
            } else if (gpa_attach_endorsment_copy_file != "") {
                var view_gpa_attach_endorsment_copy = "<span >"+gpa_attach_endorsment_copy_file+"</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/2/3/"+ gpa_attach_endorsment_copy_file +"'  class='text-info'><b>View</b></a>";
                var download_gpa_attach_endorsment_copy = "<a href='<?php echo base_url(); ?>master/remote/download_doc/2/3/"+ gpa_attach_endorsment_copy_file+"'  class='text-success'><b>Download</b></a>";
            }
            $("#last_date").val(gpa_date);
            $("#gpa_excel_details_"+add_gpa_counter).html(view_gpa_excel_attach + "  " + download_gpa_excel_attach);
            $("#gpa_quote_details_"+add_gpa_counter).html(view_gpa_attach_quote + "  " + download_gpa_attach_quote);
            $("#gpa_endorsment_copy_details_"+add_gpa_counter).html(view_gpa_attach_endorsment_copy + "  " + download_gpa_attach_endorsment_copy);
            var last_date=$("#last_date").val();
            $(".gpa_date").attr("min", last_date);
        });
    }

    function edit_hdfc_ergo_health_supertopup_Float_policy(hdfc_ergo_health_supertopup_float_data_arr,policy_type){
        var tot_supertopup_float_hdfc_json = "";
        $("#first_table_tbody").empty();
        $.each(hdfc_ergo_health_supertopup_float_data_arr, function(key_other, val_other) {
            var supertopup_float_policy_id = hdfc_ergo_health_supertopup_float_data_arr.supertopup_float_policy_id;
            var hdfc_ergo_health_super_topup_floater_policy_fk_policy_id = hdfc_ergo_health_supertopup_float_data_arr.hdfc_ergo_health_super_topup_floater_policy_fk_policy_id;
            var fk_policy_type_id = hdfc_ergo_health_supertopup_float_data_arr.fk_policy_type_id;
            var fk_company_id = hdfc_ergo_health_supertopup_float_data_arr.fk_company_id;
            var fk_department_id = hdfc_ergo_health_supertopup_float_data_arr.fk_department_id;
            var policy_name_txt = hdfc_ergo_health_supertopup_float_data_arr.policy_name_txt;
            tot_supertopup_float_hdfc_json = JSON.parse(hdfc_ergo_health_supertopup_float_data_arr.tot_supertopup_float_hdfc_json);

            var years_of_premium = hdfc_ergo_health_supertopup_float_data_arr.years_of_premium;
            var tot_premium = hdfc_ergo_health_supertopup_float_data_arr.tot_premium;
            var load_desc = hdfc_ergo_health_supertopup_float_data_arr.load_desc;
            var load_tot = hdfc_ergo_health_supertopup_float_data_arr.load_tot;
            var less_disc_per = hdfc_ergo_health_supertopup_float_data_arr.less_disc_per;
            var less_disc_tot = hdfc_ergo_health_supertopup_float_data_arr.less_disc_tot;
            var gross_premium_tot = hdfc_ergo_health_supertopup_float_data_arr.gross_premium_tot;
            var gross_premium_tot_new = hdfc_ergo_health_supertopup_float_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = hdfc_ergo_health_supertopup_float_data_arr.medi_cgst_rate;
            var medi_cgst_tot = hdfc_ergo_health_supertopup_float_data_arr.medi_cgst_tot;
            var medi_sgst_rate = hdfc_ergo_health_supertopup_float_data_arr.medi_sgst_rate;
            var medi_sgst_tot = hdfc_ergo_health_supertopup_float_data_arr.medi_sgst_tot;
            var medi_final_premium = hdfc_ergo_health_supertopup_float_data_arr.medi_final_premium;
            var max_age = hdfc_ergo_health_supertopup_float_data_arr.max_age;
            var super_topup_policy_status = hdfc_ergo_health_supertopup_float_data_arr.super_topup_policy_status;
            var super_topup_policy_del_flag = hdfc_ergo_health_supertopup_float_data_arr.super_topup_policy_del_flag;
            // alert(supertopup_float_policy_id);

            $("#years_of_premium").val(years_of_premium);
            $("#tot_premium").val(tot_premium);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#less_disc_per").val(less_disc_per);
            $("#less_disc_tot").val(less_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
            $("#supertopup_float_policy_id").val(supertopup_float_policy_id);
        });
        var supertopup_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var Family_size_count = tot_supertopup_float_hdfc_json.length;
        $.each(tot_supertopup_float_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            main_supertopup_Medi_HDFC.push(add_medi_hdfc_counter);
            index = tot_supertopup_float_hdfc_json[key][0];
            var name_insured_member_name = tot_supertopup_float_hdfc_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_float_hdfc_json[key][2];
            var name_insured_dob = tot_supertopup_float_hdfc_json[key][3];
            var name_insured_age = tot_supertopup_float_hdfc_json[key][4];
            var name_insured_relation = tot_supertopup_float_hdfc_json[key][5];
            var name_insured_relation_txt = tot_supertopup_float_hdfc_json[key][6];
            var nominee_name = tot_supertopup_float_hdfc_json[0][7];
            var nominee_name_txt = tot_supertopup_float_hdfc_json[0][8];
            var nominee_relation = tot_supertopup_float_hdfc_json[0][9];
            var nominee_relation_txt = tot_supertopup_float_hdfc_json[0][10];
            var deductable = tot_supertopup_float_hdfc_json[0][11];
            var name_insured_sum_insured = tot_supertopup_float_hdfc_json[0][12];
            var basic_premium = tot_supertopup_float_hdfc_json[0][13];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            supertopup_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td>';

            if(add_medi_hdfc_counter == 0){
                supertopup_tr+='<td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;  endif; ?> </select></td> <td width="12%" rowspan="'+Family_size_count+'"><select style="width:180px;" id="deductable" name="deductable[]" class="form-control deductable" onchange="get_sum_insured_dropdown(' + add_medi_hdfc_counter + ');get_basic_premium(' + add_medi_hdfc_counter + ');"> <option value="null">Select Deductable</option><option value="2,00,000">2,00,000</option><option value="3,00,000">3,00,000</option><option value="4,00,000">4,00,000</option><option value="5,00,000">5,00,000</option></select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:180px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option></select></td><td width="8%" rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium" value="'+basic_premium+'" class="form-control basic_premium" ></td> </tr>';
            }
        });
        $("#first_table_tbody").append(supertopup_tr);

        $.each(tot_supertopup_float_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            index = tot_supertopup_float_hdfc_json[key][0];
            var name_insured_member_name = tot_supertopup_float_hdfc_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_float_hdfc_json[key][2];
            var name_insured_dob = tot_supertopup_float_hdfc_json[key][3];
            var name_insured_age = tot_supertopup_float_hdfc_json[key][4];
            var name_insured_relation = tot_supertopup_float_hdfc_json[key][5];
            var name_insured_relation_txt = tot_supertopup_float_hdfc_json[key][6];
            var nominee_name = tot_supertopup_float_hdfc_json[0][7];
            var nominee_name_txt = tot_supertopup_float_hdfc_json[0][8];
            var nominee_relation = tot_supertopup_float_hdfc_json[0][9];
            var nominee_relation_txt = tot_supertopup_float_hdfc_json[0][10];
            var deductable = tot_supertopup_float_hdfc_json[0][11];
            var name_insured_sum_insured = tot_supertopup_float_hdfc_json[0][12];
            var basic_premium = tot_supertopup_float_hdfc_json[0][13];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#deductable").val(deductable);
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
        });
        $.each(tot_supertopup_float_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            get_sum_insured_dropdown(add_medi_hdfc_counter);
        });
        $.each(tot_supertopup_float_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            var name_insured_sum_insured = tot_supertopup_float_hdfc_json[0][12];
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            get_age_Comparision();
        });
    }

    function edit_the_new_india_assu_supertopup_Float_policy(the_new_india_supertopup_ind_data_arr,policy_type){
        var total_the_new_india_supertopup_ind_json_data = "";
        $("#first_table_tbody").empty();
        $.each(the_new_india_supertopup_ind_data_arr, function(key_other, val_other) {
            var the_new_india_supertopup_assu_ind_policy_id = the_new_india_supertopup_ind_data_arr.the_new_india_supertopup_assu_ind_policy_id;
            var the_new_india_supertopup_ind_assu_policy_fk_policy_id = the_new_india_supertopup_ind_data_arr.the_new_india_supertopup_ind_assu_policy_fk_policy_id;
            var fk_policy_type_id = the_new_india_supertopup_ind_data_arr.fk_policy_type_id;
            var fk_company_id = the_new_india_supertopup_ind_data_arr.fk_company_id;
            var fk_department_id = the_new_india_supertopup_ind_data_arr.fk_department_id;
            var policy_name_txt = the_new_india_supertopup_ind_data_arr.policy_name_txt;
            total_the_new_india_supertopup_ind_json_data = JSON.parse(the_new_india_supertopup_ind_data_arr.total_the_new_india_supertopup_ind_json_data);

            var tot_premium = the_new_india_supertopup_ind_data_arr.tot_premium;
            var medi_cgst_rate = the_new_india_supertopup_ind_data_arr.medi_cgst_rate;
            var medi_cgst_tot = the_new_india_supertopup_ind_data_arr.medi_cgst_tot;
            var medi_sgst_rate = the_new_india_supertopup_ind_data_arr.medi_sgst_rate;
            var medi_sgst_tot = the_new_india_supertopup_ind_data_arr.medi_sgst_tot;
            var medi_final_premium = the_new_india_supertopup_ind_data_arr.medi_final_premium;
            var the_new_india_status = the_new_india_supertopup_ind_data_arr.the_new_india_status;
            var the_new_india_del_flag = the_new_india_supertopup_ind_data_arr.the_new_india_del_flag;
            // alert(supertopup_ind_policy_id);

            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#the_new_india_supertopup_assu_ind_policy_id").val(the_new_india_supertopup_assu_ind_policy_id);
        });
        var supertopup_tr = "";
        var add_newindia_supertop_counter = "";
        var index = "";
        var supertopup_length = total_the_new_india_supertopup_ind_json_data.length;
        $.each(total_the_new_india_supertopup_ind_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            main_NewIndia_supertopup.push(add_newindia_supertop_counter);
            index = total_the_new_india_supertopup_ind_json_data[key][0];
            var name_insured_member_name = total_the_new_india_supertopup_ind_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_supertopup_ind_json_data[key][2];
            var name_insured_dob = total_the_new_india_supertopup_ind_json_data[key][3];
            var name_insured_age = total_the_new_india_supertopup_ind_json_data[key][4];
            var name_insured_relation = total_the_new_india_supertopup_ind_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_supertopup_ind_json_data[key][6];
            var nominee_name = total_the_new_india_supertopup_ind_json_data[key][7];
            var nominee_name_txt = total_the_new_india_supertopup_ind_json_data[key][8];
            var nominee_relation = total_the_new_india_supertopup_ind_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_supertopup_ind_json_data[key][10];
            var threshold = total_the_new_india_supertopup_ind_json_data[key][11];
            var name_insured_sum_insured = total_the_new_india_supertopup_ind_json_data[key][12];
            var basic_premium = total_the_new_india_supertopup_ind_json_data[key][13];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            supertopup_tr+='<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_NewIndia_supertopup_' + add_newindia_supertop_counter + '" onClick=removeNewIndia_supertopup(' + add_newindia_supertop_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_newindia_supertop_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_newindia_supertop_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_newindia_supertop_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_newindia_supertop_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_newindia_supertop_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation" onchange="check_age_relation('+add_newindia_supertop_counter+')"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_newindia_supertop_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_newindia_supertop_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="threshold_' + add_newindia_supertop_counter + '" name="threshold[]" class="form-control threshold" onchange="get_sum_insured_dropdown(' + add_newindia_supertop_counter + ')"><option value="null">Select Threshold</option><option value="5,00,000">5,00,000</option><option value="8,00,000">8,00,000</option></select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_newindia_supertop_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_newindia_supertop_counter + ')"><option value="null">Select Sum Insured</option></select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_newindia_supertop_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td> </tr>';
        });
        $("#Add_NewIndia_supertopup").attr("onClick", "AddNewIndia_supertopup(" + parseInt(supertopup_length) + ")");
        $("#first_table_tbody").append(supertopup_tr);

        $.each(total_the_new_india_supertopup_ind_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            index = total_the_new_india_supertopup_ind_json_data[key][0];
            var name_insured_member_name = total_the_new_india_supertopup_ind_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_supertopup_ind_json_data[key][2];
            var name_insured_dob = total_the_new_india_supertopup_ind_json_data[key][3];
            var name_insured_age = total_the_new_india_supertopup_ind_json_data[key][4];
            var name_insured_relation = total_the_new_india_supertopup_ind_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_supertopup_ind_json_data[key][6];
            var nominee_name = total_the_new_india_supertopup_ind_json_data[key][7];
            var nominee_name_txt = total_the_new_india_supertopup_ind_json_data[key][8];
            var nominee_relation = total_the_new_india_supertopup_ind_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_supertopup_ind_json_data[key][10];
            var threshold = total_the_new_india_supertopup_ind_json_data[key][11];
            var name_insured_sum_insured = total_the_new_india_supertopup_ind_json_data[key][12];
            var basic_premium = total_the_new_india_supertopup_ind_json_data[key][13];

            $("#name_insured_member_name_"+add_newindia_supertop_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_newindia_supertop_counter).val(name_insured_relation);
            $("#nominee_name_"+add_newindia_supertop_counter).val(nominee_name);
            $("#nominee_relation_"+add_newindia_supertop_counter).val(nominee_relation);
            $("#threshold_"+add_newindia_supertop_counter).val(threshold);
            $("#name_insured_sum_insured_"+add_newindia_supertop_counter).val(name_insured_sum_insured);
        });
        $.each(total_the_new_india_supertopup_ind_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            get_sum_insured_dropdown(add_newindia_supertop_counter);
        });
        $.each(total_the_new_india_supertopup_ind_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            var name_insured_sum_insured = total_the_new_india_supertopup_ind_json_data[key][12];
            $("#name_insured_sum_insured_"+add_newindia_supertop_counter).val(name_insured_sum_insured);
            get_basic_premium(add_newindia_supertop_counter);
        });
    }

    function edit_the_new_india_assu_supertopup_INDIVIDUAL_policy(the_new_india_supertopup_ind_single_data_arr,policy_type){
        var total_the_new_india_supertopup_ind_single_json_data = "";
        $("#first_table_tbody").empty();
        $.each(the_new_india_supertopup_ind_single_data_arr, function(key_other, val_other) {
            var the_new_india_supertopup_assu_ind_single_policy_id = the_new_india_supertopup_ind_single_data_arr.the_new_india_supertopup_assu_ind_single_policy_id;
            var the_new_india_supertopup_ind_single_assu_policy_fk_policy_id = the_new_india_supertopup_ind_single_data_arr.the_new_india_supertopup_ind_single_assu_policy_fk_policy_id;
            var fk_policy_type_id = the_new_india_supertopup_ind_single_data_arr.fk_policy_type_id;
            var fk_company_id = the_new_india_supertopup_ind_single_data_arr.fk_company_id;
            var fk_department_id = the_new_india_supertopup_ind_single_data_arr.fk_department_id;
            var policy_name_txt = the_new_india_supertopup_ind_single_data_arr.policy_name_txt;
            total_the_new_india_supertopup_ind_single_json_data = JSON.parse(the_new_india_supertopup_ind_single_data_arr.total_the_new_india_supertopup_ind_single_json_data);

            var tot_premium = the_new_india_supertopup_ind_single_data_arr.tot_premium;
            var medi_cgst_rate = the_new_india_supertopup_ind_single_data_arr.medi_cgst_rate;
            var medi_cgst_tot = the_new_india_supertopup_ind_single_data_arr.medi_cgst_tot;
            var medi_sgst_rate = the_new_india_supertopup_ind_single_data_arr.medi_sgst_rate;
            var medi_sgst_tot = the_new_india_supertopup_ind_single_data_arr.medi_sgst_tot;
            var medi_final_premium = the_new_india_supertopup_ind_single_data_arr.medi_final_premium;
            var the_new_india_status = the_new_india_supertopup_ind_single_data_arr.the_new_india_status;
            var the_new_india_del_flag = the_new_india_supertopup_ind_single_data_arr.the_new_india_del_flag;
            // alert(supertopup_ind_policy_id);

            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#the_new_india_supertopup_assu_ind_single_policy_id").val(the_new_india_supertopup_assu_ind_single_policy_id);
        });
        var supertopup_tr = "";
        var add_newindia_supertop_counter = "";
        var index = "";
        var supertopup_length = total_the_new_india_supertopup_ind_single_json_data.length;
        $.each(total_the_new_india_supertopup_ind_single_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            main_NewIndia_supertopup.push(add_newindia_supertop_counter);
            index = total_the_new_india_supertopup_ind_single_json_data[key][0];
            var name_insured_member_name = total_the_new_india_supertopup_ind_single_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_supertopup_ind_single_json_data[key][2];
            var name_insured_dob = total_the_new_india_supertopup_ind_single_json_data[key][3];
            var name_insured_age = total_the_new_india_supertopup_ind_single_json_data[key][4];
            var name_insured_relation = total_the_new_india_supertopup_ind_single_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_supertopup_ind_single_json_data[key][6];
            var nominee_name = total_the_new_india_supertopup_ind_single_json_data[key][7];
            var nominee_name_txt = total_the_new_india_supertopup_ind_single_json_data[key][8];
            var nominee_relation = total_the_new_india_supertopup_ind_single_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_supertopup_ind_single_json_data[key][10];
            var threshold = total_the_new_india_supertopup_ind_single_json_data[key][11];
            var name_insured_sum_insured = total_the_new_india_supertopup_ind_single_json_data[key][12];
            var basic_premium = total_the_new_india_supertopup_ind_single_json_data[key][13];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            supertopup_tr+='<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_NewIndia_supertopup_' + add_newindia_supertop_counter + '" onClick=removeNewIndia_supertopup(' + add_newindia_supertop_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_newindia_supertop_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_newindia_supertop_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_newindia_supertop_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_newindia_supertop_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_newindia_supertop_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation" onchange="check_age_relation('+add_newindia_supertop_counter+')"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_newindia_supertop_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_newindia_supertop_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="threshold_' + add_newindia_supertop_counter + '" name="threshold[]" class="form-control threshold" onchange="get_sum_insured_dropdown(' + add_newindia_supertop_counter + ')"><option value="null">Select Threshold</option><option value="5,00,000">5,00,000</option><option value="8,00,000">8,00,000</option></select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_newindia_supertop_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_newindia_supertop_counter + ')"><option value="null">Select Sum Insured</option></select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_newindia_supertop_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td> </tr>';
        });
        $("#Add_NewIndia_supertopup").attr("onClick", "AddNewIndia_supertopup(" + parseInt(supertopup_length) + ")");
        $("#first_table_tbody").append(supertopup_tr);

        $.each(total_the_new_india_supertopup_ind_single_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            index = total_the_new_india_supertopup_ind_single_json_data[key][0];
            var name_insured_member_name = total_the_new_india_supertopup_ind_single_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_supertopup_ind_single_json_data[key][2];
            var name_insured_dob = total_the_new_india_supertopup_ind_single_json_data[key][3];
            var name_insured_age = total_the_new_india_supertopup_ind_single_json_data[key][4];
            var name_insured_relation = total_the_new_india_supertopup_ind_single_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_supertopup_ind_single_json_data[key][6];
            var nominee_name = total_the_new_india_supertopup_ind_single_json_data[key][7];
            var nominee_name_txt = total_the_new_india_supertopup_ind_single_json_data[key][8];
            var nominee_relation = total_the_new_india_supertopup_ind_single_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_supertopup_ind_single_json_data[key][10];
            var threshold = total_the_new_india_supertopup_ind_single_json_data[key][11];
            var name_insured_sum_insured = total_the_new_india_supertopup_ind_single_json_data[key][12];
            var basic_premium = total_the_new_india_supertopup_ind_single_json_data[key][13];

            $("#name_insured_member_name_"+add_newindia_supertop_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_newindia_supertop_counter).val(name_insured_relation);
            $("#nominee_name_"+add_newindia_supertop_counter).val(nominee_name);
            $("#nominee_relation_"+add_newindia_supertop_counter).val(nominee_relation);
            $("#threshold_"+add_newindia_supertop_counter).val(threshold);
            $("#name_insured_sum_insured_"+add_newindia_supertop_counter).val(name_insured_sum_insured);
        });
        $.each(total_the_new_india_supertopup_ind_single_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            get_sum_insured_dropdown(add_newindia_supertop_counter);
        });
        $.each(total_the_new_india_supertopup_ind_single_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            var name_insured_sum_insured = total_the_new_india_supertopup_ind_single_json_data[key][12];
            $("#name_insured_sum_insured_"+add_newindia_supertop_counter).val(name_insured_sum_insured);
            get_basic_premium(add_newindia_supertop_counter);
        });
    }

    function edit_hdfc_ergo_health_supertopup_Ind_policy(hdfc_ergo_health_supertopup_ind_data_arr,policy_type){
        var tot_supertopup_ind_hdfc_json = "";
        $("#first_table_tbody").empty();
        $.each(hdfc_ergo_health_supertopup_ind_data_arr, function(key_other, val_other) {
            var supertopup_ind_policy_id = hdfc_ergo_health_supertopup_ind_data_arr.supertopup_ind_policy_id;
            var hdfc_ergo_health_super_topup_policy_fk_policy_id = hdfc_ergo_health_supertopup_ind_data_arr.hdfc_ergo_health_super_topup_policy_fk_policy_id;
            var fk_policy_type_id = hdfc_ergo_health_supertopup_ind_data_arr.fk_policy_type_id;
            var fk_company_id = hdfc_ergo_health_supertopup_ind_data_arr.fk_company_id;
            var fk_department_id = hdfc_ergo_health_supertopup_ind_data_arr.fk_department_id;
            var policy_name_txt = hdfc_ergo_health_supertopup_ind_data_arr.policy_name_txt;
            tot_supertopup_ind_hdfc_json = JSON.parse(hdfc_ergo_health_supertopup_ind_data_arr.tot_supertopup_ind_hdfc_json);

            var years_of_premium = hdfc_ergo_health_supertopup_ind_data_arr.years_of_premium;
            var tot_premium = hdfc_ergo_health_supertopup_ind_data_arr.tot_premium;
            var load_desc = hdfc_ergo_health_supertopup_ind_data_arr.load_desc;
            var load_tot = hdfc_ergo_health_supertopup_ind_data_arr.load_tot;
            var less_disc_per = hdfc_ergo_health_supertopup_ind_data_arr.less_disc_per;
            var less_disc_tot = hdfc_ergo_health_supertopup_ind_data_arr.less_disc_tot;
            var gross_premium_tot = hdfc_ergo_health_supertopup_ind_data_arr.gross_premium_tot;
            var gross_premium_tot_new = hdfc_ergo_health_supertopup_ind_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = hdfc_ergo_health_supertopup_ind_data_arr.medi_cgst_rate;
            var medi_cgst_tot = hdfc_ergo_health_supertopup_ind_data_arr.medi_cgst_tot;
            var medi_sgst_rate = hdfc_ergo_health_supertopup_ind_data_arr.medi_sgst_rate;
            var medi_sgst_tot = hdfc_ergo_health_supertopup_ind_data_arr.medi_sgst_tot;
            var medi_final_premium = hdfc_ergo_health_supertopup_ind_data_arr.medi_final_premium;
            var super_topup_policy_status = hdfc_ergo_health_supertopup_ind_data_arr.super_topup_policy_status;
            var super_topup_policy_del_flag = hdfc_ergo_health_supertopup_ind_data_arr.super_topup_policy_del_flag;
            // alert(supertopup_ind_policy_id);

            $("#years_of_premium").val(years_of_premium);
            $("#tot_premium").val(tot_premium);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#less_disc_per").val(less_disc_per);
            $("#less_disc_tot").val(less_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#supertopup_ind_policy_id").val(supertopup_ind_policy_id);
        });
        var supertopup_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var supertopup_length = tot_supertopup_ind_hdfc_json.length;
        $.each(tot_supertopup_ind_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            main_supertopup_Medi_HDFC.push(add_medi_hdfc_counter);
            index = tot_supertopup_ind_hdfc_json[key][0];
            var name_insured_member_name = tot_supertopup_ind_hdfc_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_ind_hdfc_json[key][2];
            var name_insured_dob = tot_supertopup_ind_hdfc_json[key][3];
            var name_insured_age = tot_supertopup_ind_hdfc_json[key][4];
            var name_insured_relation = tot_supertopup_ind_hdfc_json[key][5];
            var name_insured_relation_txt = tot_supertopup_ind_hdfc_json[key][6];
            var nominee_name = tot_supertopup_ind_hdfc_json[key][7];
            var nominee_name_txt = tot_supertopup_ind_hdfc_json[key][8];
            var nominee_relation = tot_supertopup_ind_hdfc_json[key][9];
            var nominee_relation_txt = tot_supertopup_ind_hdfc_json[key][10];
            var deductable = tot_supertopup_ind_hdfc_json[key][11];
            var name_insured_sum_insured = tot_supertopup_ind_hdfc_json[key][12];
            var basic_premium = tot_supertopup_ind_hdfc_json[key][13];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            supertopup_tr+='<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_supertopup_medi_HDFC_' + add_medi_hdfc_counter + '" onClick=removeSupertopupMediHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:180px;" id="deductable_' + add_medi_hdfc_counter + '" name="deductable[]" class="form-control deductable" onchange="get_sum_insured_dropdown(' + add_medi_hdfc_counter + ');get_basic_premium(' + add_medi_hdfc_counter + ');"> <option value="null">Select Deductable</option><option value="2,00,000">2,00,000</option><option value="3,00,000">3,00,000</option><option value="4,00,000">4,00,000</option><option value="5,00,000">5,00,000</option></select></td><td width="12%"><select style="width:180px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option></select></td><td width="8%"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '" value="'+basic_premium+'" class="form-control basic_premium" ></td></tr>';
        });
        $("#Add_supertopup_medi_HDFC").attr("onClick", "AddSuperTopUpMediHDFC(" + parseInt(supertopup_length) + ")");
        $("#first_table_tbody").append(supertopup_tr);

        $.each(tot_supertopup_ind_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            index = tot_supertopup_ind_hdfc_json[key][0];
            var name_insured_member_name = tot_supertopup_ind_hdfc_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_ind_hdfc_json[key][2];
            var name_insured_dob = tot_supertopup_ind_hdfc_json[key][3];
            var name_insured_age = tot_supertopup_ind_hdfc_json[key][4];
            var name_insured_relation = tot_supertopup_ind_hdfc_json[key][5];
            var name_insured_relation_txt = tot_supertopup_ind_hdfc_json[key][6];
            var nominee_name = tot_supertopup_ind_hdfc_json[key][7];
            var nominee_name_txt = tot_supertopup_ind_hdfc_json[key][8];
            var nominee_relation = tot_supertopup_ind_hdfc_json[key][9];
            var nominee_relation_txt = tot_supertopup_ind_hdfc_json[key][10];
            var deductable = tot_supertopup_ind_hdfc_json[key][11];
            var name_insured_sum_insured = tot_supertopup_ind_hdfc_json[key][12];
            var basic_premium = tot_supertopup_ind_hdfc_json[key][13];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_hdfc_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_hdfc_counter).val(nominee_relation);
            $("#deductable_"+add_medi_hdfc_counter).val(deductable);
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
        });
        $.each(tot_supertopup_ind_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            get_sum_insured_dropdown(add_medi_hdfc_counter);
        });
        $.each(tot_supertopup_ind_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            var name_insured_sum_insured = tot_supertopup_ind_hdfc_json[key][12];
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            get_basic_premium(add_medi_hdfc_counter);
        });
    }

    function edit_supertopup_Individual_policy(supertopup_ind_data_arr,policy_type){
        var tot_supertopup_ind_json = "";
        $("#first_table_tbody").empty();
        $.each(supertopup_ind_data_arr, function(key_other, val_other) {
            var supertopup_ind_policy_id = supertopup_ind_data_arr.supertopup_ind_policy_id;
            var supertopup_ind_policy_fk_policy_id = supertopup_ind_data_arr.supertopup_ind_policy_fk_policy_id;
            var fk_policy_type_id = supertopup_ind_data_arr.fk_policy_type_id;
            var policy_name_txt = supertopup_ind_data_arr.policy_name_txt;
            tot_supertopup_ind_json = JSON.parse(supertopup_ind_data_arr.tot_supertopup_ind_json);

            var supertopup_ind_total_premium = supertopup_ind_data_arr.supertopup_ind_total_premium;
            var supertopup_ind_load_description = supertopup_ind_data_arr.supertopup_ind_load_description;
            var supertopup_ind_load_amount = supertopup_ind_data_arr.supertopup_ind_load_amount;
            var supertopup_ind_load_gross_premium = supertopup_ind_data_arr.supertopup_ind_load_gross_premium;
            var supertopup_ind_cgst_rate = supertopup_ind_data_arr.supertopup_ind_cgst_rate;
            var supertopup_ind_cgst_tot = supertopup_ind_data_arr.supertopup_ind_cgst_tot;
            var supertopup_ind_sgst_rate = supertopup_ind_data_arr.supertopup_ind_sgst_rate;
            var supertopup_ind_sgst_tot = supertopup_ind_data_arr.supertopup_ind_sgst_tot;
            var supertopup_ind_final_premium = supertopup_ind_data_arr.supertopup_ind_final_premium;
            var supertopup_ind_status = supertopup_ind_data_arr.supertopup_ind_status;
            var supertopup_ind_del_flag = supertopup_ind_data_arr.supertopup_ind_del_flag;
            // alert(supertopup_ind_policy_id);

            $("#supertopup_ind_total_premium").val(supertopup_ind_total_premium);
            $("#supertopup_ind_description").val(supertopup_ind_load_description);
            $("#supertopup_ind_load_amount").val(supertopup_ind_load_amount);
            $("#supertopup_ind_load_gross_premium").val(supertopup_ind_load_gross_premium);
            $("#cgst_fire_per").val(supertopup_ind_cgst_rate);
            $("#supertopup_ind_cgst_tot").val(supertopup_ind_cgst_tot);
            $("#sgst_fire_per").val(supertopup_ind_sgst_rate);
            $("#supertopup_ind_sgst_tot").val(supertopup_ind_sgst_tot);
            $("#supertopup_ind_final_premium").val(supertopup_ind_final_premium);
            $("#supertopup_ind_policy_id").val(supertopup_ind_policy_id);
        });
        var supertopup_tr = "";
        var add_supertopup_counter = "";
        var index = "";
        var supertopup_length = tot_supertopup_ind_json.length;
        // var last_counter = supertopup_length-1;
        // alert(last_counter);
        $.each(tot_supertopup_ind_json, function(key, val) {
            add_supertopup_counter = key;
            main_SuperTopUp_Ind.push(add_supertopup_counter);
            index = tot_supertopup_ind_json[key][0];
            var name_insured_member_name = tot_supertopup_ind_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_ind_json[key][2];
            var name_insured_dob = tot_supertopup_ind_json[key][3];
            var name_insured_age = tot_supertopup_ind_json[key][4];
            var name_insured_relation = tot_supertopup_ind_json[key][5];
            var name_insured_relation_txt = tot_supertopup_ind_json[key][6];
            var past_history = tot_supertopup_ind_json[key][7];
            var name_insured_policy_type = tot_supertopup_ind_json[key][8];
            var name_insured_policy_option = tot_supertopup_ind_json[key][9];
            var name_insured_deductable_thershold = tot_supertopup_ind_json[key][10];
            var name_insured_sum_insured = tot_supertopup_ind_json[key][11];
            var name_insured_premium = tot_supertopup_ind_json[key][12];
            var nominee_name = tot_supertopup_ind_json[key][13];
            var nominee_relation = tot_supertopup_ind_json[key][14];

            // alert(name_insured_policy_type);
            // alert(name_insured_policy_option);
            // alert(name_insured_deductable_thershold);
            // alert(name_insured_sum_insured);
            if(policy_type==1){
                name_insured_age = parseInt(name_insured_age)+parseInt(1);
            }

            if(policy_type==4){
                    supertopup_tr += '<tr> <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_SuperTop_ind_'+add_supertopup_counter+'" onClick=remove_SuperTop_Individual('+add_supertopup_counter+')></td><td width="20%"><select style="width:280px;" id="name_insured_member_name_'+add_supertopup_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_supertopup_counter+')"><option value="null">Select Member Names</option>'+option_val_data+'</select></td> <td width="10%"><input style="width:100px;" type="text" id="name_insured_dob_'+add_supertopup_counter+'" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_'+add_supertopup_counter+'" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td> <td><select style="width:120px;" id="name_insured_relation_'+add_supertopup_counter+'" name="name_insured_relation[]" class="form-control name_insured_relation"> <option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?></select></td><td width="12%"><select style="width:280px;" id="nominee_name_'+add_supertopup_counter+'" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>'+option_val_data+' </select></td>  <td><select style="width:120px;" id="nominee_relation_'+add_supertopup_counter+'" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td><textarea style="width:120px;" id="past_history_'+add_supertopup_counter+'" name="past_history[]" class="form-control past_history">'+past_history+'</textarea></td>  <td><select style="width:120px;" id="name_insured_policy_type_'+add_supertopup_counter+'" name="name_insured_policy_type[]" class="form-control name_insured_policy_type">  <option value="Individual">Individual</option> </select></td> <td width="12%"><input style="width:110px;" type="text" name="name_insured_policy_option[]" id="name_insured_policy_option_'+add_supertopup_counter+'" value="'+name_insured_policy_option+'" class="form-control name_insured_policy_option" ></td><td width="8%"><input type="text" style="width:105px;" id="name_insured_deductable_thershold_'+add_supertopup_counter+'" name="name_insured_deductable_thershold[]" class="form-control name_insured_deductable_thershold" value="'+name_insured_deductable_thershold+'"></td><td width="8%"><input type="text" style="width:105px;" id="name_insured_sum_insured_'+add_supertopup_counter+'" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" value="'+name_insured_sum_insured+'"></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_'+add_supertopup_counter+'" onkeyup="name_insured_premium_Cal()" value="'+name_insured_premium+'" class="form-control name_insured_premium" ></td></tr>';
                        // alert('<input type="text" style="width:105px;" id="name_insured_sum_insured_'+add_supertopup_counter+'" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" value="'+name_insured_sum_insured+'">');

            //    var name_insured_policy_option=' <input type="text" name="name_insured_policy_option[]" id="name_insured_policy_option_'+add_supertopup_counter+'" value="'+name_insured_policy_option+'" class="form-control name_insured_policy_option" >';
            }else if(policy_type==1){
                    supertopup_tr += '<tr> <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_SuperTop_ind_'+add_supertopup_counter+'" onClick=remove_SuperTop_Individual('+add_supertopup_counter+')></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_supertopup_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_supertopup_counter+')"><option value="null">Select Member Names</option>'+option_val_data+'</select></td> <td><input style="width:100px;" type="text" id="name_insured_dob_'+add_supertopup_counter+'" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_'+add_supertopup_counter+'" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td> <td><select style="width:120px;" id="name_insured_relation_'+add_supertopup_counter+'" name="name_insured_relation[]" class="form-control name_insured_relation"> <option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?></select></td><td width="12%"><select style="width:280px;" id="nominee_name_'+add_supertopup_counter+'" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>'+option_val_data+' </select></td>  <td><select style="width:120px;" id="nominee_relation_'+add_supertopup_counter+'" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td><textarea style="width:120px;" id="past_history_'+add_supertopup_counter+'" name="past_history[]" class="form-control past_history">'+past_history+'</textarea></td>  <td><select style="width:120px;" id="name_insured_policy_type_'+add_supertopup_counter+'" name="name_insured_policy_type[]" class="form-control name_insured_policy_type">  <option value="Individual">Individual</option> </select></td> <td width="12%"><select style="width:110px;" id="name_insured_policy_option_'+add_supertopup_counter+'" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" onchange="get_premium_thresold_sum_insured_basedOn_Age_Policy_Option('+add_supertopup_counter+')"><option value="null">Select Policy Option</option>' + option_policy_dropdown_val + '</select></td><td width="8%"><input type="text" style="width:105px;" id="name_insured_deductable_thershold_'+add_supertopup_counter+'" name="name_insured_deductable_thershold[]" class="form-control name_insured_deductable_thershold" value="'+name_insured_deductable_thershold+'"></td><td width="8%"><input type="text" style="width:105px;" id="name_insured_sum_insured_'+add_supertopup_counter+'" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" value="'+name_insured_sum_insured+'"></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_'+add_supertopup_counter+'" value="'+name_insured_premium+'" class="form-control name_insured_premium"></td></tr>';

                // var name_insured_policy_option='<select style="width:110px;" id="name_insured_policy_option_'+add_supertopup_counter+'" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" onchange="get_premium_thresold_sum_insured_basedOn_Age_Policy_Option()"><option value="null">Select Policy Option</option>' + option_policy_dropdown_val + '</select> ';
            }

            
        });
        $("#Add_SuperTop_ind").attr("onClick", "Add_SuperTop_Individual(" + (supertopup_length) + ")");
        $("#first_table_tbody").append(supertopup_tr);

        $.each(tot_supertopup_ind_json, function(key, val) {
            add_medi_counter = key;
            index = tot_supertopup_ind_json[key][0];
            var name_insured_member_name = tot_supertopup_ind_json[key][1];
            var name_insured_relation = tot_supertopup_ind_json[key][5];
            var name_insured_policy_type = tot_supertopup_ind_json[key][8];
            var name_insured_policy_option = tot_supertopup_ind_json[key][9];
            var nominee_name = tot_supertopup_ind_json[key][13];
            var nominee_relation = tot_supertopup_ind_json[key][14];

            $("#name_insured_member_name_"+add_medi_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_counter).val(name_insured_relation);
            $("#name_insured_policy_type_"+add_medi_counter).val(name_insured_policy_type);
            $("#name_insured_policy_option_"+add_medi_counter).val(name_insured_policy_option);
            $("#nominee_name_"+add_medi_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_counter).val(nominee_relation);
            if(policy_type==1){
             get_premium_thresold_sum_insured_basedOn_Age_Policy_Option(add_medi_counter);
            }
        });

    }

    function edit_supertopup_floater_policy(supertopup_floater_data_arr,policy_type){
        // alert(policy_type);
        var tot_supertopup_floater_json = "";
        var name_insured_policy_option = "";
        var name_insured_deductable_thershold = "";
        var name_insured_sum_insured = "";
        var name_insured_premium = "";
        $("#first_table_tbody").empty();
        $.each(supertopup_floater_data_arr, function(key_other, val_other) {
            var supertopup_floater_policy_id = supertopup_floater_data_arr.supertopup_floater_policy_id;
            var supertopup_floater_policy_fk_policy_id = supertopup_floater_data_arr.supertopup_floater_policy_fk_policy_id;
            var fk_policy_type_id = supertopup_floater_data_arr.fk_policy_type_id;
            var policy_name_txt = supertopup_floater_data_arr.policy_name_txt;
            // alert(policy_name_txt);
            // var tot_supertopup_floater_json = supertopup_floater_data_arr.tot_supertopup_floater_json;
            tot_supertopup_floater_json = JSON.parse(supertopup_floater_data_arr.tot_supertopup_floater_json);

            name_insured_policy_option = supertopup_floater_data_arr.name_insured_policy_option;
            name_insured_deductable_thershold = supertopup_floater_data_arr.name_insured_deductable_thershold;
            name_insured_sum_insured = supertopup_floater_data_arr.name_insured_sum_insured;
            name_insured_premium = supertopup_floater_data_arr.name_insured_premium;

            var supertopup_floater_total_premium = supertopup_floater_data_arr.supertopup_floater_total_premium;
            var supertopup_floater_load_description = supertopup_floater_data_arr.supertopup_floater_load_description;
            var supertopup_floater_load_amount = supertopup_floater_data_arr.supertopup_floater_load_amount;
            var supertopup_floater_load_gross_premium = supertopup_floater_data_arr.supertopup_floater_load_gross_premium;
            var supertopup_floater_cgst_rate = supertopup_floater_data_arr.supertopup_floater_cgst_rate;
            var supertopup_floater_cgst_tot = supertopup_floater_data_arr.supertopup_floater_cgst_tot;
            var supertopup_floater_sgst_rate = supertopup_floater_data_arr.supertopup_floater_sgst_rate;
            var supertopup_floater_sgst_tot = supertopup_floater_data_arr.supertopup_floater_sgst_tot;
            var supertopup_floater_final_premium = supertopup_floater_data_arr.supertopup_floater_final_premium;
            var max_age = supertopup_floater_data_arr.max_age;
            var supertopup_floater_status = supertopup_floater_data_arr.supertopup_floater_status;
            var supertopup_floater_final_del_flag = supertopup_floater_data_arr.supertopup_floater_final_del_flag;
            // alert(supertopup_floater_policy_id);

            $("#supertopup_floater_total_premium").val(supertopup_floater_total_premium);
            $("#supertopup_floater_description").val(supertopup_floater_load_description);
            $("#supertopup_floater_load_amount").val(supertopup_floater_load_amount);
            $("#supertopup_floater_load_gross_premium").val(supertopup_floater_load_gross_premium);
            $("#cgst_fire_per").val(supertopup_floater_cgst_rate);
            $("#supertopup_floater_cgst_tot").val(supertopup_floater_cgst_tot);
            $("#sgst_fire_per").val(supertopup_floater_sgst_rate);
            $("#supertopup_floater_sgst_tot").val(supertopup_floater_sgst_tot);
            $("#supertopup_floater_final_premium").val(supertopup_floater_final_premium);
            $("#max_age").val(max_age);
            $("#supertopup_floater_policy_id").val(supertopup_floater_policy_id);
        });

        var mediclaim_tr = "";
        var add_medi_counter = "";
        var index = "";
        var Family_size_count = tot_supertopup_floater_json.length;
        // alert(mediclaim_length);
        $.each(tot_supertopup_floater_json, function(key, val) {
            add_medi_counter = key;
            index = tot_supertopup_floater_json[key][0];
            var name_insured_member_name = tot_supertopup_floater_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_floater_json[key][2];
            var name_insured_dob = tot_supertopup_floater_json[key][3];
            var name_insured_age = tot_supertopup_floater_json[key][4];
            var name_insured_relation = tot_supertopup_floater_json[key][5];
            var name_insured_relation_txt = tot_supertopup_floater_json[key][6];
            var past_history = tot_supertopup_floater_json[key][7];
            var name_insured_policy_type = tot_supertopup_floater_json[key][8];
            var name_insured_policy_option = tot_supertopup_floater_json[key][9];
            var name_insured_deductable_thershold = tot_supertopup_floater_json[key][10];
            var name_insured_sum_insured = tot_supertopup_floater_json[key][11];
            var name_insured_premium = tot_supertopup_floater_json[key][12];
            var nominee_name = tot_supertopup_floater_json[0][13];
            var nominee_relation = tot_supertopup_floater_json[0][14];

            if(policy_type==2){
                name_insured_age = parseInt(name_insured_age)+parseInt(1);
            }
            // if(nominee_name != null)
            // nominee_name = nominee_name;
            // alert(nominee_name);
            // alert(nominee_relation);

            if(policy_type==5){
                mediclaim_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;   endif; ?> </select></td>   <td><textarea  style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_' + add_medi_counter + '">'+past_history+'</textarea></td> <td><select style="width:120px;" id="name_insured_policy_type_' + add_medi_counter + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" >  <option value="Floater">Floater</option> </select></td>';

                if (add_medi_counter == 0) {
                    mediclaim_tr += '<td width="12%" rowspan="' + Family_size_count + '" align="center"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option> '+option_val_data+'</select></td>  <td rowspan="' + Family_size_count + '" align="center"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td rowspan="' + Family_size_count + '" align="center"><input style="width:110px;" type="text" name="name_insured_policy_option[]" id="name_insured_policy_option" value="'+name_insured_policy_option+'" class="form-control name_insured_policy_option" ></td><td width="12%" rowspan="' + Family_size_count + '" align="center"><input type="text" style="width:105px;" id="name_insured_deductable_thershold" name="name_insured_deductable_thershold[]" class="form-control name_insured_deductable_thershold" value="'+name_insured_deductable_thershold+'"></td><td width="12%" rowspan="' + Family_size_count + '" align="center"><input type="text" style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" value="'+name_insured_sum_insured+'"></td><td width="8%" rowspan="' + Family_size_count + '"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium"  class="form-control name_insured_premium" onkeyup="name_Insured_Premium_Tot()" value="'+name_insured_premium+'"></td></tr>';
                }
            //    var name_insured_policy_option=' <input type="text" name="name_insured_policy_option[]" id="name_insured_policy_option" value="'+name_insured_policy_option+'" class="form-control name_insured_policy_option" >';
            // alert(5);
            }else if(policy_type==2){
                // alert(2);
                mediclaim_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;   endif; ?> </select></td><td><textarea  style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_' + add_medi_counter + '">'+past_history+'</textarea></td> <td><select style="width:120px;" id="name_insured_policy_type_' + add_medi_counter + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="Name_insuredPolicy_type(' + add_medi_counter + ')">  <option value="Floater">Floater</option> </select></td>';

                if (add_medi_counter == 0) {
                    mediclaim_tr += '<td width="12%" rowspan="' + Family_size_count + '" align="center"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option> '+option_val_data+'</select></td>  <td rowspan="' + Family_size_count + '" align="center"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td rowspan="' + Family_size_count + '" align="center"><select style="width:110px;" id="name_insured_policy_option" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" onchange="get_premium_thresold_sum_insured_basedOn_Age_Policy_Option()"><option value="null">Select Policy Option</option>' + option_policy_dropdown_val + '</select> </td><td width="12%" rowspan="' + Family_size_count + '" align="center"><input type="text" style="width:105px;" id="name_insured_deductable_thershold" name="name_insured_deductable_thershold[]" class="form-control name_insured_deductable_thershold" value="'+name_insured_deductable_thershold+'"></td><td width="12%" rowspan="' + Family_size_count + '" align="center"><input type="text" style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" value="'+name_insured_sum_insured+'"></td><td width="8%" rowspan="' + Family_size_count + '"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="'+name_insured_premium+'" class="form-control name_insured_premium"></td></tr>';
            }
                // var name_insured_policy_option='<select style="width:110px;" id="name_insured_policy_option" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" onchange="get_premium_thresold_sum_insured_basedOn_Age_Policy_Option()"><option value="null">Select Policy Option</option>' + option_policy_dropdown_val + '</select> ';
            }


            // alert(mediclaim_tr);
        });
        $("#first_table_tbody").append(mediclaim_tr);

        $.each(tot_supertopup_floater_json, function(key, val) {
            add_medi_counter = key;
            index = tot_supertopup_floater_json[key][0];
            var name_insured_member_name = tot_supertopup_floater_json[key][1];
            var name_insured_relation = tot_supertopup_floater_json[key][5];
            var name_insured_policy_type = tot_supertopup_floater_json[key][8];
            var nominee_name = tot_supertopup_floater_json[0][13];
            var nominee_relation = tot_supertopup_floater_json[0][14];

            $("#name_insured_member_name_"+add_medi_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_counter).val(name_insured_relation);
            $("#name_insured_policy_type_"+add_medi_counter).val(name_insured_policy_type);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
        });
        $("#name_insured_policy_option").val(name_insured_policy_option);
        $("#name_insured_deductable_thershold").val(name_insured_deductable_thershold);
        $("#name_insured_sum_insured").val(name_insured_sum_insured);
        $("#name_insured_premium").val(name_insured_premium);
        if(policy_type==2){
            get_age_Comparision();
        }
    }

    function edit_medi_floater2020_policy(medi_floater2020_data_arr){
        var tot_medi_floater_2020_json = "";
        var name_insured_sum_insured = "";
        var name_insured_premium = "";
        var name_insured_ncd = "";
        var name_insured_premium_after_ncd = "";
        $("#first_table_tbody").empty();
        $.each(medi_floater2020_data_arr, function(key_other, val_other) {
            var medi_floater_2020_id = medi_floater2020_data_arr.medi_floater_2020_id;
            var medi_floater2020_policy_fk_policy_id = medi_floater2020_data_arr.medi_floater2020_policy_fk_policy_id;
            var fk_policy_type_id = medi_floater2020_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_floater2020_data_arr.policy_name_txt;
            // alert(policy_name_txt);
            // var tot_medi_floater_2020_json = medi_floater2020_data_arr.tot_medi_floater_2020_json;
            tot_medi_floater_2020_json = JSON.parse(medi_floater2020_data_arr.tot_medi_floater_2020_json);

            name_insured_sum_insured = medi_floater2020_data_arr.name_insured_sum_insured;
            name_insured_premium = medi_floater2020_data_arr.name_insured_premium;
            name_insured_ncd = medi_floater2020_data_arr.name_insured_ncd;
            name_insured_premium_after_ncd = medi_floater2020_data_arr.name_insured_premium_after_ncd;

            var medi_float_2020_total_premium = medi_floater2020_data_arr.medi_float_2020_total_premium;
            var medi_float_2020_child_count = medi_floater2020_data_arr.medi_float_2020_child_count;
            var medi_float_2020_child_count_first_premium = medi_floater2020_data_arr.medi_float_2020_child_count_first_premium;
            var medi_float_2020_child_total_premium = medi_floater2020_data_arr.medi_float_2020_child_total_premium;
            var medi_float_2020_load_description = medi_floater2020_data_arr.medi_float_2020_load_description;
            var medi_float_2020_load_amount = medi_floater2020_data_arr.medi_float_2020_load_amount;
            var medi_float_2020_restore_cover_premium = medi_floater2020_data_arr.medi_float_2020_restore_cover_premium;
            var medi_float_2020_maternity_new_bornbaby = medi_floater2020_data_arr.medi_float_2020_maternity_new_bornbaby;
            var medi_float_2020_daily_cash_allow_hosp = medi_floater2020_data_arr.medi_float_2020_daily_cash_allow_hosp;
            var medi_float_2020_load_gross_premium = medi_floater2020_data_arr.medi_float_2020_load_gross_premium;
            var medi_float_2020_cgst_rate = medi_floater2020_data_arr.medi_float_2020_cgst_rate;
            var medi_float_2020_cgst_tot = medi_floater2020_data_arr.medi_float_2020_cgst_tot;
            var medi_float_2020_sgst_rate = medi_floater2020_data_arr.medi_float_2020_sgst_rate;
            var medi_float_2020_sgst_tot = medi_floater2020_data_arr.medi_float_2020_sgst_tot;
            var medi_float_2020_final_premium = medi_floater2020_data_arr.medi_float_2020_final_premium;
            var max_age = medi_floater2020_data_arr.max_age;
            var medi_float_2020_status = medi_floater2020_data_arr.medi_float_2020_status;
            var medi_float_2020_del_flag = medi_floater2020_data_arr.medi_float_2020_del_flag;
            // alert(medi_float_2014_final_premium);

            $("#medi_float_2020_total_premium").val(medi_float_2020_total_premium);
            $("#medi_float_2020_child_count").val(medi_float_2020_child_count);
            $("#medi_float_2020_child_count_first_premium").val(medi_float_2020_child_count_first_premium);
            $("#medi_float_2020_child_total_premium").val(medi_float_2020_child_total_premium);
            $("#medi_float_2020_load_description").val(medi_float_2020_load_description);
            $("#medi_float_2020_load_amount").val(medi_float_2020_load_amount);
            $("#medi_float_2020_restore_cover_premium").val(medi_float_2020_restore_cover_premium);
            $("#medi_float_2020_maternity_new_bornbaby").val(medi_float_2020_maternity_new_bornbaby);
            $("#medi_float_2020_daily_cash_allow_hosp").val(medi_float_2020_daily_cash_allow_hosp);
            $("#medi_float_2020_load_gross_premium").val(medi_float_2020_load_gross_premium);
            $("#cgst_fire_per").val(medi_float_2020_cgst_rate);
            $("#medi_float_2020_cgst_tot").val(medi_float_2020_cgst_tot);
            $("#sgst_fire_per").val(medi_float_2020_sgst_rate);
            $("#medi_float_2020_sgst_tot").val(medi_float_2020_sgst_tot);
            $("#medi_float_2020_final_premium").val(medi_float_2020_final_premium);
            $("#max_age").val(max_age);
            $("#medi_floater_2020_id").val(medi_floater_2020_id);
        });

        var mediclaim_tr = "";
        var add_medi_counter = "";
        var index = "";
        var medi_floater2020_length = tot_medi_floater_2020_json.length;
        // alert(mediclaim_length);
        $.each(tot_medi_floater_2020_json, function(key, val) {
            add_medi_counter = key;
            index = tot_medi_floater_2020_json[key][0];
            var name_insured_member_name = tot_medi_floater_2020_json[key][1];
            var name_insured_member_name_txt = tot_medi_floater_2020_json[key][2];
            var name_insured_dob = tot_medi_floater_2020_json[key][3];
            var name_insured_age = tot_medi_floater_2020_json[key][4];
            var name_insured_relation = tot_medi_floater_2020_json[key][5];
            var name_insured_relation_txt = tot_medi_floater_2020_json[key][6];
            var past_history = tot_medi_floater_2020_json[key][7];
            var name_insured_policy_type = tot_medi_floater_2020_json[key][8];
            var name_insured_policy_option = tot_medi_floater_2020_json[key][9];
            var name_insured_sum_insured = tot_medi_floater_2020_json[key][10];
            var name_insured_premium = tot_medi_floater_2020_json[key][11];
            var name_insured_ncd = tot_medi_floater_2020_json[key][12];
            var name_insured_premium_after_ncd = tot_medi_floater_2020_json[key][13];
            var nominee_name = tot_medi_floater_2020_json[0][14];
            var nominee_relation = tot_medi_floater_2020_json[0][15];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            mediclaim_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;     endif; ?> </select></td><td><textarea  style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_' + add_medi_counter + '">'+past_history+'</textarea></td> <td><select style="width:120px;" id="name_insured_policy_type_' + add_medi_counter + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="Name_insuredPolicy_type(' + add_medi_counter + ')">  <option value="Family Floater 2020">Family Floater 2020 </option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_' + add_medi_counter + '" name="name_insured_policy_option[]" class="form-control name_insured_policy_option"><option value="Individual">Individual</option> <option value="Floater" selected>Floater</option> </select></td>';

            if (add_medi_counter == 0) {
                mediclaim_tr += '<td width="12%" rowspan="' + medi_floater2020_length + '" align="center"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option> '+option_val_data+'</select></td>  <td rowspan="' + medi_floater2020_length + '" align="center"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="' + medi_floater2020_length + '" align="center"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType()"><option value="null">Select Sum Insured</option> ' + floater2020_dropdown_val + '   </select></td><td width="8%" rowspan="' + medi_floater2020_length + '"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="'+name_insured_premium+'" class="form-control name_insured_premium"></td><td width="8%" rowspan="' + medi_floater2020_length + '"><input style="width:110px;" type="text" name="name_insured_ncd[]" id="name_insured_ncd" class="form-control name_insured_ncd" onkeyup="name_insured_ncd_Cal()" value="'+name_insured_ncd+'"></td><td width="8%" rowspan="' + medi_floater2020_length + '"><input style="width:110px;" type="text" name="name_insured_premium_after_ncd[]" id="name_insured_premium_after_ncd" value="'+name_insured_premium_after_ncd+'" class="form-control name_insured_premium_after_ncd"></td></tr>';
            }

        });
        $("#first_table_tbody").append(mediclaim_tr);

        $.each(tot_medi_floater_2020_json, function(key, val) {
            add_medi_counter = key;
            index = tot_medi_floater_2020_json[key][0];
            var name_insured_member_name = tot_medi_floater_2020_json[key][1];
            var name_insured_relation = tot_medi_floater_2020_json[key][5];
            var name_insured_policy_type = tot_medi_floater_2020_json[key][8];
            var name_insured_policy_option = tot_medi_floater_2020_json[key][9];
            // var name_insured_sum_insured = tot_medi_floater_2020_json[key][10];
            var nominee_name = tot_medi_floater_2020_json[0][14];
            var nominee_relation = tot_medi_floater_2020_json[0][15];

            $("#name_insured_member_name_"+add_medi_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_counter).val(name_insured_relation);
            $("#name_insured_policy_type_"+add_medi_counter).val(name_insured_policy_type);
            $("#name_insured_policy_option_"+add_medi_counter).val(name_insured_policy_option);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            // $("#name_insured_sum_insured_"+add_medi_counter).val(name_insured_sum_insured);
        });
        for (var add_medi_counter = 0; add_medi_counter < medi_floater2020_length; add_medi_counter++) {
            var policy_type = $("#name_insured_policy_type_" + add_medi_counter).val();
            if (policy_type == "Family Floater 2020") {
                document.getElementById("name_insured_policy_option_" + add_medi_counter).disabled = true;
            } else {
                // document.getElementById("name_insured_policy_option_"+add_medi_counter).disabled = false;
            }
        }
        $("#name_insured_sum_insured").val(name_insured_sum_insured);
        $("#name_insured_premium").val(name_insured_premium);
        $("#name_insured_ncd").val(name_insured_ncd);
        $("#name_insured_premium_after_ncd").val(name_insured_premium_after_ncd);
        get_age_Comparision();
    }

    function edit_mediclaim_floater2014_policy(mediclaim_floater2014_data_arr){
        var tot_medi_floater_2014_json = "";
        var name_insured_sum_insured = "";
        var name_insured_premium = "";
        $("#first_table_tbody").empty();
        $.each(mediclaim_floater2014_data_arr, function(key_other, val_other) {
            var medi_floater_2014_id = mediclaim_floater2014_data_arr.medi_floater_2014_id;
            var medi_floater_2014_policy_fk_policy_id = mediclaim_floater2014_data_arr.medi_floater_2014_policy_fk_policy_id;
            var fk_policy_type_id = mediclaim_floater2014_data_arr.fk_policy_type_id;
            var policy_name_txt = mediclaim_floater2014_data_arr.policy_name_txt;
            // alert(policy_name_txt);
            // var tot_medi_floater_2014_json = mediclaim_floater2014_data_arr.tot_medi_floater_2014_json;
            tot_medi_floater_2014_json = JSON.parse(mediclaim_floater2014_data_arr.tot_medi_floater_2014_json);

            name_insured_sum_insured = mediclaim_floater2014_data_arr.name_insured_sum_insured;
            name_insured_premium = mediclaim_floater2014_data_arr.name_insured_premium;

            var medi_float_2014_total_premium = mediclaim_floater2014_data_arr.medi_float_2014_total_premium;
            var medi_float_2014_child_count = mediclaim_floater2014_data_arr.medi_float_2014_child_count;
            var medi_float_2014_child_count_first_premium = mediclaim_floater2014_data_arr.medi_float_2014_child_count_first_premium;
            var medi_float_2014_child_total_premium = mediclaim_floater2014_data_arr.medi_float_2014_child_total_premium;
            var medi_float_2014_load_description = mediclaim_floater2014_data_arr.medi_float_2014_load_description;
            var medi_float_2014_load_amount = mediclaim_floater2014_data_arr.medi_float_2014_load_amount;
            var medi_float_2014_load_gross_premium = mediclaim_floater2014_data_arr.medi_float_2014_load_gross_premium;
            var medi_float_2014_cgst_rate = mediclaim_floater2014_data_arr.medi_float_2014_cgst_rate;
            var medi_float_2014_cgst_tot = mediclaim_floater2014_data_arr.medi_float_2014_cgst_tot;
            var medi_float_2014_sgst_rate = mediclaim_floater2014_data_arr.medi_float_2014_sgst_rate;
            var medi_float_2014_sgst_tot = mediclaim_floater2014_data_arr.medi_float_2014_sgst_tot;
            var medi_float_2014_final_premium = mediclaim_floater2014_data_arr.medi_float_2014_final_premium;
            var max_age = mediclaim_floater2014_data_arr.max_age;
            var medi_float_2014_status = mediclaim_floater2014_data_arr.medi_float_2014_status;
            var medi_float_2014_del_flag = mediclaim_floater2014_data_arr.medi_float_2014_del_flag;
            // alert(medi_float_2014_final_premium);

            $("#medi_float_2014_total_premium").val(medi_float_2014_total_premium);
            $("#medi_float_2014_child_count").val(medi_float_2014_child_count);
            $("#medi_float_2014_child_count_first_premium").val(medi_float_2014_child_count_first_premium);
            $("#medi_float_2014_child_total_premium").val(medi_float_2014_child_total_premium);
            $("#medi_float_2014_load_description").val(medi_float_2014_load_description);
            $("#medi_float_2014_load_amount").val(medi_float_2014_load_amount);
            $("#medi_float_2014_load_gross_premium").val(medi_float_2014_load_gross_premium);
            $("#cgst_fire_per").val(medi_float_2014_cgst_rate);
            $("#medi_float_2014_cgst_tot").val(medi_float_2014_cgst_tot);
            $("#sgst_fire_per").val(medi_float_2014_sgst_rate);
            $("#medi_float_2014_sgst_tot").val(medi_float_2014_sgst_tot);
            $("#medi_float_2014_final_premium").val(medi_float_2014_final_premium);
            $("#max_age").val(max_age);
            $("#medi_floater_2014_id").val(medi_floater_2014_id);
        });

        var mediclaim_tr = "";
        var add_medi_counter = "";
        var index = "";
        var mediclaim_length = tot_medi_floater_2014_json.length;
        // alert(mediclaim_length);
        $.each(tot_medi_floater_2014_json, function(key, val) {
            add_medi_counter = key;
            index = tot_medi_floater_2014_json[key][0];
            var name_insured_member_name = tot_medi_floater_2014_json[key][1];
            var name_insured_member_name_txt = tot_medi_floater_2014_json[key][2];
            var name_insured_dob = tot_medi_floater_2014_json[key][3];
            var name_insured_age = tot_medi_floater_2014_json[key][4];
            var name_insured_relation = tot_medi_floater_2014_json[key][5];
            var name_insured_relation_txt = tot_medi_floater_2014_json[key][6];
            var past_history = tot_medi_floater_2014_json[key][7];
            var name_insured_policy_type = tot_medi_floater_2014_json[key][8];
            var name_insured_policy_option = tot_medi_floater_2014_json[key][9];
            var name_insured_sum_insured = tot_medi_floater_2014_json[key][10];
            var name_insured_premium = tot_medi_floater_2014_json[key][11];
            var nominee_name = tot_medi_floater_2014_json[0][12];
            var nominee_relation = tot_medi_floater_2014_json[0][13];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            mediclaim_tr += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td><td><textarea  style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_' + add_medi_counter + '">'+past_history+'</textarea></td> <td><select style="width:120px;" id="name_insured_policy_type_' + add_medi_counter + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="Name_insuredPolicy_type(' + add_medi_counter + ')">  <option value="Family Floater 2014">Family Floater 2014 </option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_' + add_medi_counter + '" name="name_insured_policy_option[]" class="form-control name_insured_policy_option"><option value="Individual">Individual</option> <option value="Floater" selected>Floater</option> </select></td>';

            if (add_medi_counter == 0) {
                mediclaim_tr += '<td width="12%" rowspan="' + mediclaim_length + '" align="center"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option> '+option_val_data+'</select></td>  <td rowspan="' + mediclaim_length + '" align="center"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="' + mediclaim_length + '" align="center"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType()"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td width="8%" rowspan="' + mediclaim_length + '"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="" class="form-control name_insured_premium"></td></tr>';
            }

        });
        $("#first_table_tbody").append(mediclaim_tr);

        $.each(tot_medi_floater_2014_json, function(key, val) {
            add_medi_counter = key;
            index = tot_medi_floater_2014_json[key][0];
            var name_insured_member_name = tot_medi_floater_2014_json[key][1];
            var name_insured_relation = tot_medi_floater_2014_json[key][5];
            var name_insured_policy_type = tot_medi_floater_2014_json[key][8];
            var name_insured_policy_option = tot_medi_floater_2014_json[key][9];
            var name_insured_sum_insured = tot_medi_floater_2014_json[key][10];
            var name_insured_premium = tot_medi_floater_2014_json[key][11];
            var nominee_name = tot_medi_floater_2014_json[0][12];
            var nominee_relation = tot_medi_floater_2014_json[0][13];

            $("#name_insured_member_name_"+add_medi_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_counter).val(name_insured_relation);
            $("#name_insured_policy_type_"+add_medi_counter).val(name_insured_policy_type);
            $("#name_insured_policy_option_"+add_medi_counter).val(name_insured_policy_option);
            $("#name_insured_sum_insured_"+add_medi_counter).val(name_insured_sum_insured);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            get_age_Comparision();
        });
        for (var add_medi_counter = 0; add_medi_counter < mediclaim_length; add_medi_counter++) {
            var policy_type = $("#name_insured_policy_type_" + add_medi_counter).val();
            if (policy_type == "Family Floater 2014") {
                document.getElementById("name_insured_policy_option_" + add_medi_counter).disabled = true;
            } else {
                // document.getElementById("name_insured_policy_option_"+add_medi_counter).disabled = false;
            }
        }
        $("#name_insured_sum_insured").val(name_insured_sum_insured);
        $("#name_insured_premium").val(name_insured_premium);
        get_premiumBasedon_age_sumInsured_PolicyType();
    }

    function edit_medi_ind2020_policy(medi_ind2020_policy_data_arr){
        var tot_medi_ind2020_json = "";
        $("#first_table_tbody").empty();
        $.each(medi_ind2020_policy_data_arr, function(key_other, val_other) {
            var medi_ind2020_policy_id = medi_ind2020_policy_data_arr.medi_ind2020_policy_id;
            var medi_ind2020_policy_fk_policy_id = medi_ind2020_policy_data_arr.medi_ind2020_policy_fk_policy_id;
            var fk_policy_type_id = medi_ind2020_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_ind2020_policy_data_arr.policy_name_txt;

            // var tot_medi_ind2020_json = medi_ind2020_policy_data_arr.tot_medi_ind2020_json;
            tot_medi_ind2020_json = JSON.parse(medi_ind2020_policy_data_arr.tot_medi_ind2020_json);
            var medi_ind_2020_total_premium = medi_ind2020_policy_data_arr.medi_ind_2020_total_premium;
            var medi_ind_2020_family_descount_per = medi_ind2020_policy_data_arr.medi_ind_2020_family_descount_per;
            var medi_ind_2020_family_descount_tot = medi_ind2020_policy_data_arr.medi_ind_2020_family_descount_tot;
            var medi_ind_2020_load_description = medi_ind2020_policy_data_arr.medi_ind_2020_load_description;
            var medi_ind_2020_load_amount = medi_ind2020_policy_data_arr.medi_ind_2020_load_amount;
            var medi_ind_2020_restore_cover_premium = medi_ind2020_policy_data_arr.medi_ind_2020_restore_cover_premium;
            var medi_ind_2020_maternity_new_bornbaby = medi_ind2020_policy_data_arr.medi_ind_2020_maternity_new_bornbaby;
            var medi_ind_2020_daily_cash_allow_hosp = medi_ind2020_policy_data_arr.medi_ind_2020_daily_cash_allow_hosp;
            var medi_ind_2020_load_gross_premium = medi_ind2020_policy_data_arr.medi_ind_2020_load_gross_premium;
            var new_load_gross_premium = medi_ind2020_policy_data_arr.new_load_gross_premium;
            var medi_ind_2020_cgst_rate = medi_ind2020_policy_data_arr.medi_ind_2020_cgst_rate;
            var medi_ind_2020_cgst_tot = medi_ind2020_policy_data_arr.medi_ind_2020_cgst_tot;
            var medi_ind_2020_sgst_rate = medi_ind2020_policy_data_arr.medi_ind_2020_sgst_rate;
            var medi_ind_2020_sgst_tot = medi_ind2020_policy_data_arr.medi_ind_2020_sgst_tot;
            var medi_ind_2020_final_premium = medi_ind2020_policy_data_arr.medi_ind_2020_final_premium;
            var medi_ind_2020_status = medi_ind2020_policy_data_arr.medi_ind_2020_status;
            var medi_ind_2020_del_flag = medi_ind2020_policy_data_arr.medi_ind_2020_del_flag;
            // alert(medi_final_premium);
            $("#medi_ind_2020_total_premium").val(medi_ind_2020_total_premium);
            $("#medi_ind_2020_family_descount_per").val(medi_ind_2020_family_descount_per);
            $("#medi_ind_2020_family_descount_tot").val(medi_ind_2020_family_descount_tot);
            $("#medi_ind_2020_load_description").val(medi_ind_2020_load_description);
            $("#medi_ind_2020_load_amount").val(medi_ind_2020_load_amount);
            $("#medi_ind_2020_restore_cover_premium").val(medi_ind_2020_restore_cover_premium);
            $("#medi_ind_2020_maternity_new_bornbaby").val(medi_ind_2020_maternity_new_bornbaby);
            $("#medi_ind_2020_daily_cash_allow_hosp").val(medi_ind_2020_daily_cash_allow_hosp);
            $("#medi_ind_2020_load_gross_premium").val(medi_ind_2020_load_gross_premium);
            $("#new_load_gross_premium").val(new_load_gross_premium);
            $("#cgst_fire_per").val(medi_ind_2020_cgst_rate);
            $("#medi_ind_2020_cgst_tot").val(medi_ind_2020_cgst_tot);
            $("#sgst_fire_per").val(medi_ind_2020_sgst_rate);
            $("#medi_ind_2020_sgst_tot").val(medi_ind_2020_sgst_tot);
            $("#medi_ind_2020_final_premium").val(medi_ind_2020_final_premium);
            $("#medi_ind2020_policy_id").val(medi_ind2020_policy_id);
        });
        var mediclaim_tr = "";
        var add_medi_counter2020 = "";
        var index = "";
        var mediclaim_length = tot_medi_ind2020_json.length;
        var main_Mediclaim2020 = [];

        $.each(tot_medi_ind2020_json, function(key, val) {
            add_medi_counter2020 = key;
            main_Mediclaim2020.push(add_medi_counter2020);
            index = tot_medi_ind2020_json[key][0];
            var name_insured_member_name = tot_medi_ind2020_json[key][1];
            var name_insured_member_name_txt = tot_medi_ind2020_json[key][2];
            var name_insured_dob = tot_medi_ind2020_json[key][3];
            var name_insured_age = tot_medi_ind2020_json[key][4];
            var name_insured_relation = tot_medi_ind2020_json[key][5];
            var name_insured_relation_txt = tot_medi_ind2020_json[key][6];
            var past_history = tot_medi_ind2020_json[key][7];
            var name_insured_policy_type = tot_medi_ind2020_json[key][8];
            var name_insured_policy_option = tot_medi_ind2020_json[key][9];
            var name_insured_sum_insured = tot_medi_ind2020_json[key][10];
            var name_insured_premium = tot_medi_ind2020_json[key][11];
            var name_insured_ncd = tot_medi_ind2020_json[key][12];
            var name_insured_premium_after_ncd = tot_medi_ind2020_json[key][13];
            var restore_cover = tot_medi_ind2020_json[key][14];
            var restore_cover_premium = tot_medi_ind2020_json[key][15];
            var maternity_new_born_baby_cover = tot_medi_ind2020_json[key][16];
            var maternity_new_born_baby_cover_premium = tot_medi_ind2020_json[key][17];
            var daily_cash_allowance_cover = tot_medi_ind2020_json[key][18];
            var daily_cash_allowance_cover_premium = tot_medi_ind2020_json[key][19];
            var final_combine_cover_with_afterncd_premium = tot_medi_ind2020_json[key][20];

            var nominee_name = tot_medi_ind2020_json[key][21];
            var nominee_relation = tot_medi_ind2020_json[key][22];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            mediclaim_tr += '<tr><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim2020_' + add_medi_counter2020 + '" onClick=removeMediclaim2020(' + add_medi_counter2020 + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_counter2020 + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_counter2020 + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_counter2020 + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_counter2020 + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_counter2020 + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:280px;" id="nominee_name_'+add_medi_counter2020+'" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>'+option_val_data+' </select></td>  <td><select style="width:120px;" id="nominee_relation_'+add_medi_counter2020+'" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td><textarea  style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_' + add_medi_counter2020 + '">'+past_history+'</textarea></td> <td><select style="width:120px;" id="name_insured_policy_type_' + add_medi_counter2020 + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="Name_insuredPolicy_type(' + add_medi_counter2020 + ')">  <option value="Floater 2020(Individual)">Floater 2020(Individual) </option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_' + add_medi_counter2020 + '" name="name_insured_policy_option[]" class="form-control name_insured_policy_option"><option value="Individual" selected>Individual</option> <option value="Floater" >Floater</option> </select></td><td width="12%" align="center"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_counter2020 + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType(' + add_medi_counter2020 + ')"><option value="null">Select Sum Insured</option> ' + indi2020_dropdown_val + '   </select></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_' + add_medi_counter2020 + '" value="'+name_insured_premium+'" class="form-control name_insured_premium"></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_ncd[]" id="name_insured_ncd_' + add_medi_counter2020 + '" class="form-control name_insured_ncd" onkeyup="name_insured_ncd_Cal(' + add_medi_counter2020 + ')" value="'+name_insured_ncd+'"></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium_after_ncd[]" id="name_insured_premium_after_ncd_' + add_medi_counter2020 + '" value="'+name_insured_premium_after_ncd+'" class="form-control name_insured_premium_after_ncd"></td>                <td><select style="width:110px;" class="form-control restore_cover" name="restore_cover" id="restore_cover_' + add_medi_counter2020 + '" onchange="get_Restore_cover_Premium(' + add_medi_counter2020 + ')"><option value="Not Required">Not Required</option> <option value="Required">Required</option> </select></td> <td><input style="width:110px;" type="text" name="restore_cover_premium[]" id="restore_cover_premium_' + add_medi_counter2020 + '" class="form-control restore_cover_premium" value="'+restore_cover_premium+'"></td> <td><select style="width:110px;" class="form-control maternity_new_born_baby_cover" name="maternity_new_born_baby_cover" id="maternity_new_born_baby_cover_' + add_medi_counter2020 + '" onchange="get_Maternity_cover_Premium(' + add_medi_counter2020 + ')"><option value="Not Required">Not Required</option> <option value="Required">Required</option>  </select></td> <td><input style="width:110px;" type="text" name="maternity_new_born_baby_cover_premium[]" id="maternity_new_born_baby_cover_premium_' + add_medi_counter2020 + '" class="form-control maternity_new_born_baby_cover_premium" value="'+maternity_new_born_baby_cover_premium+'"></td> <td><select style="width:110px;" class="form-control daily_cash_allowance_cover" name="daily_cash_allowance_cover" id="daily_cash_allowance_cover_' + add_medi_counter2020 + '" onchange="get_DailyCashAllowenceBB_cover_Premium(' + add_medi_counter2020 + ')"><option value="Not Required">Not Required</option> <option value="Required">Required</option>    </select></td> <td><input style="width:110px;" type="text" name="daily_cash_allowance_cover_premium[]" id="daily_cash_allowance_cover_premium_' + add_medi_counter2020 + '" class="form-control daily_cash_allowance_cover_premium" value="'+daily_cash_allowance_cover_premium+'"></td><td><input style="width:110px;" type="text" name="final_combine_cover_with_afterncd_premium[]" id="final_combine_cover_with_afterncd_premium_' + add_medi_counter2020 + '" class="form-control final_combine_cover_with_afterncd_premium" value="'+final_combine_cover_with_afterncd_premium+'"></td></tr>';

        });
        $("#Add_Mediclaim_2020").attr("onClick", "AddMediclaim2020(" + (mediclaim_length) + ")");
        $("#first_table_tbody").append(mediclaim_tr);

        $.each(tot_medi_ind2020_json, function(key, val) {
            add_medi_counter2020 = key;
            main_Mediclaim2020.push(add_medi_counter2020);
            index = tot_medi_ind2020_json[key][0];
            var name_insured_member_name = tot_medi_ind2020_json[key][1];
            var name_insured_relation = tot_medi_ind2020_json[key][5];
            var name_insured_policy_type = tot_medi_ind2020_json[key][8];
            var name_insured_policy_option = tot_medi_ind2020_json[key][9];
            var name_insured_sum_insured = tot_medi_ind2020_json[key][10];
            var restore_cover = tot_medi_ind2020_json[key][14];
            var maternity_new_born_baby_cover = tot_medi_ind2020_json[key][16];
            var daily_cash_allowance_cover = tot_medi_ind2020_json[key][18];
            var nominee_name = tot_medi_ind2020_json[key][21];
            var nominee_relation = tot_medi_ind2020_json[key][22];

            // if (dm_yes_no == "Yes") {
            //     $("#dm_percentage_"+add_medi_counter).show();
            // } else if (dm_yes_no == "No") {
            //     $("#dm_percentage_"+add_medi_counter).hide();
            //     $("#dm_percentage_"+add_medi_counter).val(0);
            // }

            // if (htn_yes_no == "Yes") {
            //     $("#htn_percentage_"+add_medi_counter).show();
            // } else if (htn_yes_no == "No") {
            //     $("#htn_percentage_"+add_medi_counter).hide();
            //     $("#htn_percentage_"+add_medi_counter).val(0);
            // }

            $("#name_insured_member_name_"+add_medi_counter2020).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_counter2020).val(name_insured_relation);
            $("#name_insured_policy_type_"+add_medi_counter2020).val(name_insured_policy_type);
            $("#name_insured_policy_option_"+add_medi_counter2020).val(name_insured_policy_option);
            $("#name_insured_sum_insured_"+add_medi_counter2020).val(name_insured_sum_insured);
            $("#restore_cover_"+add_medi_counter2020).val(restore_cover);
            $("#maternity_new_born_baby_cover_"+add_medi_counter2020).val(maternity_new_born_baby_cover);
            $("#daily_cash_allowance_cover_"+add_medi_counter2020).val(daily_cash_allowance_cover);

            $("#nominee_name_"+add_medi_counter2020).val(nominee_name);
            $("#nominee_relation_"+add_medi_counter2020).val(nominee_relation);

            get_premiumBasedon_age_sumInsured_PolicyType(add_medi_counter2020);
        });
    }

    function edit_medi_floater_the_new_india_assu_policy(medi_float_the_new_india_assu_policy_data_arr){
        var total_the_new_india_medi_float_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_float_the_new_india_assu_policy_data_arr, function(key_other, val_other) {
            var medi_new_india_assu_float_policy_id = medi_float_the_new_india_assu_policy_data_arr.medi_new_india_assu_float_policy_id;
            var medi_the_new_india_floater_assu_fk_policy_id = medi_float_the_new_india_assu_policy_data_arr.medi_the_new_india_floater_assu_fk_policy_id;
            var fk_policy_type_id = medi_float_the_new_india_assu_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_float_the_new_india_assu_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_float_the_new_india_assu_policy_data_arr.fk_company_id;
            var fk_department_id = medi_float_the_new_india_assu_policy_data_arr.fk_department_id;

            total_the_new_india_medi_float_json_data = JSON.parse(medi_float_the_new_india_assu_policy_data_arr.total_the_new_india_medi_float_json_data);

            var tot_premium = medi_float_the_new_india_assu_policy_data_arr.tot_premium;
            var floater_disc_rate = medi_float_the_new_india_assu_policy_data_arr.floater_disc_rate;
            var floater_disc_tot = medi_float_the_new_india_assu_policy_data_arr.floater_disc_tot;
            var gross_premium_tot = medi_float_the_new_india_assu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_float_the_new_india_assu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_float_the_new_india_assu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_float_the_new_india_assu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_float_the_new_india_assu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_float_the_new_india_assu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_float_the_new_india_assu_policy_data_arr.medi_final_premium;

            var the_new_india_status = medi_float_the_new_india_assu_policy_data_arr.the_new_india_status;
            var the_new_india_del_flag = medi_float_the_new_india_assu_policy_data_arr.the_new_india_del_flag;
            // alert(medi_final_premium);
            $("#tot_premium").val(tot_premium);
            $("#floater_disc_rate").val(floater_disc_rate);
            $("#floater_disc_tot").val(floater_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#medi_new_india_assu_float_policy_id").val(medi_new_india_assu_float_policy_id);
        });
        var mediclaim_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var mediclaim_length = total_the_new_india_medi_float_json_data.length;
        var main_Mediclaim_HDFC = [];

        $.each(total_the_new_india_medi_float_json_data, function(key, val) {
            // alert(sum_insured_dropdown_val);
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_the_new_india_medi_float_json_data[key][0];
            var name_insured_member_name = total_the_new_india_medi_float_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_medi_float_json_data[key][2];
            var name_insured_dob = total_the_new_india_medi_float_json_data[key][3];
            var name_insured_age = total_the_new_india_medi_float_json_data[key][4];
            var name_insured_relation = total_the_new_india_medi_float_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_medi_float_json_data[key][6];
            var nominee_name = total_the_new_india_medi_float_json_data[key][7];
            var nominee_name_txt = total_the_new_india_medi_float_json_data[key][8];
            var nominee_relation = total_the_new_india_medi_float_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_medi_float_json_data[key][10];
            var name_insured_sum_insured = total_the_new_india_medi_float_json_data[key][11];
            var basic_premium = total_the_new_india_medi_float_json_data[key][12];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            mediclaim_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_HDFC_' + add_medi_hdfc_counter + '" onClick=removeMediclaimHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td> </tr>';

        });
        $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + (mediclaim_length) + ")");
        $("#first_table_tbody").append(mediclaim_tr);

        $.each(total_the_new_india_medi_float_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_the_new_india_medi_float_json_data[key][0];
            var name_insured_member_name = total_the_new_india_medi_float_json_data[key][1];
            var name_insured_relation = total_the_new_india_medi_float_json_data[key][5];
            var nominee_name = total_the_new_india_medi_float_json_data[key][7];
            var nominee_relation = total_the_new_india_medi_float_json_data[key][9];
            var name_insured_sum_insured = total_the_new_india_medi_float_json_data[key][11];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_hdfc_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_hdfc_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            get_basic_premium(add_medi_hdfc_counter);
        });  
        
    }

    function edit_medi_ind_the_new_india_assu_2017_policy(medi_ind_the_new_india_2017_assu_policy_data_arr){
        var total_the_new_india_medi_tns_hdfc_json_data = "";
        $("#first_table_tbody").empty();
        $.each(medi_ind_the_new_india_2017_assu_policy_data_arr, function(key_other, val_other) {
            var medi_insu_new_india_tns_assu_ind_policy_id = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_insu_new_india_tns_assu_ind_policy_id;
            var the_new_india_medi_policy_2017_ind_assu_fk_policy_id = medi_ind_the_new_india_2017_assu_policy_data_arr.the_new_india_medi_policy_2017_ind_assu_fk_policy_id;
            var fk_policy_type_id = medi_ind_the_new_india_2017_assu_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_ind_the_new_india_2017_assu_policy_data_arr.policy_name_txt;
            var fk_company_id = medi_ind_the_new_india_2017_assu_policy_data_arr.fk_company_id;
            var fk_department_id = medi_ind_the_new_india_2017_assu_policy_data_arr.fk_department_id;

            total_the_new_india_medi_tns_hdfc_json_data = JSON.parse(medi_ind_the_new_india_2017_assu_policy_data_arr.total_the_new_india_medi_tns_hdfc_json_data);

            var tot_premium = medi_ind_the_new_india_2017_assu_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_final_premium;
            var the_new_india_status = medi_ind_the_new_india_2017_assu_policy_data_arr.the_new_india_status;
            var the_new_india_del_flag = medi_ind_the_new_india_2017_assu_policy_data_arr.the_new_india_del_flag;
            // alert(medi_final_premium);
            $("#tot_premium").val(tot_premium);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#medi_insu_new_india_tns_assu_ind_policy_id").val(medi_insu_new_india_tns_assu_ind_policy_id);
        });
        var mediclaim_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var mediclaim_length = total_the_new_india_medi_tns_hdfc_json_data.length;
        var main_Mediclaim_HDFC = [];

        $.each(total_the_new_india_medi_tns_hdfc_json_data, function(key, val) {
            // alert(sum_insured_dropdown_val);
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_the_new_india_medi_tns_hdfc_json_data[key][0];
            var name_insured_member_name = total_the_new_india_medi_tns_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_medi_tns_hdfc_json_data[key][2];
            var name_insured_dob = total_the_new_india_medi_tns_hdfc_json_data[key][3];
            var name_insured_age = total_the_new_india_medi_tns_hdfc_json_data[key][4];
            var name_insured_relation = total_the_new_india_medi_tns_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_medi_tns_hdfc_json_data[key][6];
            var nominee_name = total_the_new_india_medi_tns_hdfc_json_data[key][7];
            var nominee_name_txt = total_the_new_india_medi_tns_hdfc_json_data[key][8];
            var nominee_relation = total_the_new_india_medi_tns_hdfc_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_medi_tns_hdfc_json_data[key][10];
            var name_insured_sum_insured = total_the_new_india_medi_tns_hdfc_json_data[key][11];
            var basic_premium = total_the_new_india_medi_tns_hdfc_json_data[key][12];
            var ncd_type = total_the_new_india_medi_tns_hdfc_json_data[key][13];
            var ncd_prem = total_the_new_india_medi_tns_hdfc_json_data[key][14];
            var maternity_type = total_the_new_india_medi_tns_hdfc_json_data[key][15];
            var maternity_prem = total_the_new_india_medi_tns_hdfc_json_data[key][16];
            var limit_of_cataract_type = total_the_new_india_medi_tns_hdfc_json_data[key][17];
            var limit_of_cataract_prem = total_the_new_india_medi_tns_hdfc_json_data[key][18];
            var tot_prem = total_the_new_india_medi_tns_hdfc_json_data[key][19];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            mediclaim_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_HDFC_' + add_medi_hdfc_counter + '" onClick=removeMediclaimHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '"  class="form-control basic_premium" value="'+basic_premium+'"></td><td><select style="width:110px;" id="ncd_type_' + add_medi_hdfc_counter + '" name="ncd_type[]" class="form-control ncd_type"  onchange="get_ncd_type_premium(' + add_medi_hdfc_counter + ')"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="ncd_prem[]" id="ncd_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 ncd_prem" value="'+ncd_prem+'"></td><td><select style="width:110px;" name="maternity_type[]" id="maternity_type_' + add_medi_hdfc_counter + '" class="form-control maternity_type" onchange="get_maternity_type_prem(' + add_medi_hdfc_counter + ')"  title="This Option is Available for 5,00,000 to 7,00,000" disabled><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option></select><input type="text" name="maternity_prem[]" id="maternity_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 maternity_prem" value="'+maternity_prem+'"></td><td><select style="width:110px;" name="limit_of_cataract_type[]" id="limit_of_cataract_type_' + add_medi_hdfc_counter + '" class="form-control limit_of_cataract_type" onchange="get_limit_of_cataract_type_prem(' + add_medi_hdfc_counter + ')" title="This Option is Available only 8,00,000 and more than 8,00,000" disabled><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option></select><input style="width:100px;" type="text" name="limit_of_cataract_prem[]" id="limit_of_cataract_prem_' + add_medi_hdfc_counter + '" value="'+limit_of_cataract_prem+'" class="form-control mt-1 limit_of_cataract_prem" > </td><td width="8%"><input style="width:100px;" type="text" name="tot_prem[]" id="tot_prem_' + add_medi_hdfc_counter + '" value="'+tot_prem+'" class="form-control tot_prem" ></td> </tr>';
                // <select style="width:110px;" name="limit_of_cataract_prem[]" id="limit_of_cataract_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 limit_of_cataract_prem" onchange="Tot_premium_after_discount('+add_medi_hdfc_counter+')"><option value="null">Select Limit Of Cataract Premium</option></select>

        });
        $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + (mediclaim_length) + ")");
        $("#first_table_tbody").append(mediclaim_tr);

        $.each(total_the_new_india_medi_tns_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_the_new_india_medi_tns_hdfc_json_data[key][0];
            var name_insured_member_name = total_the_new_india_medi_tns_hdfc_json_data[key][1];
            var name_insured_relation = total_the_new_india_medi_tns_hdfc_json_data[key][5];
            var nominee_name = total_the_new_india_medi_tns_hdfc_json_data[key][7];
            var nominee_relation = total_the_new_india_medi_tns_hdfc_json_data[key][9];
            var name_insured_sum_insured = total_the_new_india_medi_tns_hdfc_json_data[key][11];
            var ncd_type = total_the_new_india_medi_tns_hdfc_json_data[key][13];
            var maternity_type = total_the_new_india_medi_tns_hdfc_json_data[key][15];
            var limit_of_cataract_type = total_the_new_india_medi_tns_hdfc_json_data[key][17];
            var limit_of_cataract_prem = total_the_new_india_medi_tns_hdfc_json_data[key][18];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_hdfc_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_hdfc_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            $("#ncd_type_"+add_medi_hdfc_counter).val(ncd_type);
            $("#maternity_type_"+add_medi_hdfc_counter).val(maternity_type);
            $("#limit_of_cataract_type_"+add_medi_hdfc_counter).val(limit_of_cataract_type);
            // $("#limit_of_cataract_prem_"+add_medi_hdfc_counter).val(limit_of_cataract_prem);
            name_insured_sum_insured = sum_insured_int_Converter_data(name_insured_sum_insured);
            // alert(name_insured_sum_insured);
            if(limit_of_cataract_type == "Opted"){
                $("#limit_of_cataract_type_"+add_medi_hdfc_counter).attr("disabled",false);
            }
            if(maternity_type == "Opted"){
                $("#maternity_type_"+add_medi_hdfc_counter).attr("disabled",false);
            }

            if(name_insured_sum_insured >= "500000"){
            $("#maternity_type_"+add_medi_hdfc_counter).attr("disabled",false);
            }
            else{
                $("#maternity_type_"+add_medi_hdfc_counter).attr("disabled",true);
                $("#maternity_type_"+add_medi_hdfc_counter).val("Not Opted");
                $("#maternity_prem_"+add_medi_hdfc_counter).val("");
            }

            if(name_insured_sum_insured >= "800000"){
                $("#limit_of_cataract_type_"+add_medi_hdfc_counter).attr("disabled",false);
            }else{
                $("#limit_of_cataract_type_"+add_medi_hdfc_counter).attr("disabled",true);
                $("#limit_of_cataract_type_"+add_medi_hdfc_counter).val("Not Opted");
                // $("#limit_of_cataract_type_"+add_medi_hdfc_counter).val("Not Opted");
                $('#limit_of_cataract_prem_' + add_medi_hdfc_counter).html("<option value='null'>Select Limit Of Cataract Premium</option>");
            }
            // get_limit_of_cataract_type_prem(add_medi_hdfc_counter);
            // alert(limit_of_cataract_type);
            // alert(limit_of_cataract_prem);
            get_basic_premium(add_medi_hdfc_counter)
        });  
        // $.each(total_the_new_india_medi_tns_hdfc_json_data, function(key, val) {
        //     add_medi_hdfc_counter = key;
        //     get_limit_of_cataract_type_prem(add_medi_hdfc_counter);
        // });
        // $.each(total_the_new_india_medi_tns_hdfc_json_data, function(key, val) {
        //     add_medi_hdfc_counter = key;
        //     var limit_of_cataract_prem = total_the_new_india_medi_tns_hdfc_json_data[key][18];
        //     $("#limit_of_cataract_prem_"+add_medi_hdfc_counter).val(limit_of_cataract_prem);
        //     Tot_premium_after_discount(add_medi_hdfc_counter);
        // }); 
            
    }

    function edit_medi_float_HDFC_ERGO_HEALTH_INSURANCE_LTD_easy_rate_card_policy(easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr){
        var total_easy_float_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $.each(easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_easy_float_policy_id = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_hdfc_ergo_health_insu_easy_float_policy_id;
            var hdfc_ergo_health_easy_rate_card_float_policy_fk_policy_id = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hdfc_ergo_health_easy_rate_card_float_policy_fk_policy_id;
            var fk_policy_type_id = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.fk_policy_type_id;
            var policy_name_txt = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.policy_name_txt;
            
            total_easy_float_medi_hdfc_json_data = JSON.parse(easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.total_easy_float_medi_hdfc_json_data);
            var years_of_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.years_of_premium;
            var region = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.region;
            var tot_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.tot_premium;
            var hdfc_ergo_health_insu_child_count = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hdfc_ergo_health_insu_child_count;
            var hdfc_ergo_health_insu_child_count_first_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hdfc_ergo_health_insu_child_count_first_premium;
            var hdfc_ergo_health_insu_child_total_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hdfc_ergo_health_insu_child_total_premium;
            var protect_ride_prem_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.protect_ride_prem_tot;
            var hospital_daily_cash_prem_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hospital_daily_cash_prem_tot;
            var ipa_rider_prem_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.ipa_rider_prem_tot;
            var load_desc = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.load_desc;
            var load_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.load_tot;
            var less_disc_per = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.less_disc_per;
            var tot_basic_prem = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.tot_basic_prem;
            var less_disc_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.less_disc_tot;
            var stay_active_benefit = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.stay_active_benefit;
            var stay_active_benefit_prem = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.stay_active_benefit_prem;
            var gross_premium_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.gross_premium_tot;
            var gross_premium_tot_new = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.gross_premium_tot_new;
            var medi_cgst_rate = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_cgst_rate;
            var medi_cgst_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_cgst_tot;
            var medi_sgst_rate = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_sgst_rate;
            var medi_sgst_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_sgst_tot;
            var medi_final_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_final_premium;
            var max_age = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.max_age;

            var easy_rate_status = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.easy_rate_status;
            var easy_rate_del_flag = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.easy_rate_del_flag;

            $("#medi_hdfc_ergo_health_insu_easy_float_policy_id").val(medi_hdfc_ergo_health_insu_easy_float_policy_id);
            $("#years_of_premium").val(years_of_premium);
            $("#region").val(region);
            $("#tot_premium").val(tot_premium);
            $("#hdfc_ergo_health_insu_child_count").val(hdfc_ergo_health_insu_child_count);
            $("#hdfc_ergo_health_insu_child_count_first_premium").val(hdfc_ergo_health_insu_child_count_first_premium);
            $("#hdfc_ergo_health_insu_child_total_premium").val(hdfc_ergo_health_insu_child_total_premium);
            $("#protect_ride_prem_tot").val(protect_ride_prem_tot);
            $("#hospital_daily_cash_prem_tot").val(hospital_daily_cash_prem_tot);
            $("#ipa_rider_prem_tot").val(ipa_rider_prem_tot);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#less_disc_per").val(less_disc_per);
            $("#tot_basic_prem").val(tot_basic_prem);
            $("#less_disc_tot").val(less_disc_tot);
            $("#stay_active_benefit").val(stay_active_benefit);
            $("#stay_active_benefit_prem").val(stay_active_benefit_prem);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
        });
        var table_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var Family_size_count = total_easy_float_medi_hdfc_json_data.length;
        // alert(mediclaim_length);
        $.each(total_easy_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_easy_float_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_easy_float_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_easy_float_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_easy_float_medi_hdfc_json_data[key][3];
            var name_insured_age = total_easy_float_medi_hdfc_json_data[key][4];
            var past_history = total_easy_float_medi_hdfc_json_data[key][5];
            var name_insured_relation = total_easy_float_medi_hdfc_json_data[key][6];
            var name_insured_relation_txt = total_easy_float_medi_hdfc_json_data[key][7];
            var nominee_name = total_easy_float_medi_hdfc_json_data[0][8];
            var nominee_name_txt = total_easy_float_medi_hdfc_json_data[0][9];
            var nominee_relation = total_easy_float_medi_hdfc_json_data[0][10];
            var nominee_relation_txt = total_easy_float_medi_hdfc_json_data[0][11];
            var type_of_policy = total_easy_float_medi_hdfc_json_data[0][12];
            var name_insured_sum_insured = total_easy_float_medi_hdfc_json_data[0][13];
            var ncb_per = total_easy_float_medi_hdfc_json_data[0][14];
            var protector_rider_type = total_easy_float_medi_hdfc_json_data[0][15];
            var protector_rider_prem = total_easy_float_medi_hdfc_json_data[0][16];
            var hospital_daily_cash_per_day = total_easy_float_medi_hdfc_json_data[0][17];
            var hospital_daily_cash_prem = total_easy_float_medi_hdfc_json_data[0][18];
            var ipa_rider_sum_insured = total_easy_float_medi_hdfc_json_data[0][19];
            var ipa_rider_prem = total_easy_float_medi_hdfc_json_data[0][20];
            var basic_premium = total_easy_float_medi_hdfc_json_data[0][21];
            var optional_premium = total_easy_float_medi_hdfc_json_data[0][22];
            var premium_after_discount = total_easy_float_medi_hdfc_json_data[0][23];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><textarea style="width:100px;" rows="3" name="past_history[]"  id="past_history_' + add_medi_hdfc_counter + '" class="form-control past_history">'+past_history+'</textarea></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td>';

            if(add_medi_hdfc_counter == 0){
                tr_table+='<td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="type_of_policy" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_sum_insured_dropdown();get_basic_premium()"> <option value="null">Select Type Of Policy</option><option value="Standard Plan">Standard Plan</option><option value="Exclusive Plan">Exclusive Plan</option><option value="Premium Plan">Premium Plan</option></select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium();Tot_premium_after_discount();"><option value="null">Select Sum Insured</option></select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="ncb_per[]" id="ncb_per"  class="form-control ncb_per" value="'+ncb_per+'"></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" id="protector_rider_type" name="protector_rider_type[]" class="form-control protector_rider_type"  onchange="Tot_protector_rider_type_premium();Tot_premium_after_discount();"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="protector_rider_prem[]" id="protector_rider_prem" class="form-control mt-1 protector_rider_prem" value="'+protector_rider_prem+'"></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" name="hospital_daily_cash_per_day[]" id="hospital_daily_cash_per_day" class="form-control hospital_daily_cash_per_day" onchange="get_hospital_daily_cash_prem()"><option value="null">Select Hospital Daily Cash</option><option value="1000">1000</option><option value="2000">2000</option><option value="3000">3000</option></select><input type="text" name="hospital_daily_cash_prem[]" id="hospital_daily_cash_prem" class="form-control mt-1 hospital_daily_cash_prem" value="'+hospital_daily_cash_prem+'"></td><td width="8%" rowspan="'+Family_size_count+'"><input style="width:110px;" type="text" name="ipa_rider_sum_insured[]" id="ipa_rider_sum_insured" value="'+ipa_rider_sum_insured+'" class="form-control ipa_rider_sum_insured" onkeyup="Tot_ipa_rider_premium()"><input type="text" name="ipa_rider_prem[]" id="ipa_rider_prem" class="form-control mt-1 ipa_rider_prem" value="'+ipa_rider_prem+'"></td><td width="8%" rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium" value="'+basic_premium+'" class="form-control basic_premium" ></td><td width="8%" rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="optional_premium[]" id="optional_premium" value="'+optional_premium+'" class="form-control optional_premium" ></td><td width="8%" rowspan="'+Family_size_count+'"><input style="width:100px;" type="text" name="premium_after_discount[]" id="premium_after_discount" value="'+premium_after_discount+'" class="form-control premium_after_discount" ></td> </tr>';
            }

        });
        $("#first_table_tbody").append(tr_table);

        $.each(total_easy_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_easy_float_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_easy_float_medi_hdfc_json_data[key][1];
            var name_insured_relation = total_easy_float_medi_hdfc_json_data[key][6];
            var nominee_name = total_easy_float_medi_hdfc_json_data[0][8];
            var nominee_relation = total_easy_float_medi_hdfc_json_data[0][10];
            var type_of_policy = total_easy_float_medi_hdfc_json_data[0][12];
            var name_insured_sum_insured = total_easy_float_medi_hdfc_json_data[0][13];
            var protector_rider_type = total_easy_float_medi_hdfc_json_data[0][15];
            var hospital_daily_cash_per_day = total_easy_float_medi_hdfc_json_data[0][17];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#type_of_policy").val(type_of_policy);
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            $("#protector_rider_type").val(protector_rider_type);
            $("#hospital_daily_cash_per_day").val(hospital_daily_cash_per_day);
        });
        $.each(total_easy_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            get_sum_insured_dropdown();
        });
        $.each(total_easy_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            var name_insured_sum_insured = total_easy_float_medi_hdfc_json_data[0][13];
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            get_age_Comparision();
        });
    }

    function edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_easy_rate_card_policy(easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr){
        var total_easy_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $.each(easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_easy_policy_id = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_hdfc_ergo_health_insu_easy_policy_id;
            var hdfc_ergo_health_easy_rate_card_indi_policy_fk_policy_id = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.hdfc_ergo_health_easy_rate_card_indi_policy_fk_policy_id;
            var fk_policy_type_id = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.fk_policy_type_id;
            var policy_name_txt = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.policy_name_txt;
            
            total_easy_medi_hdfc_json_data = JSON.parse(easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.total_easy_medi_hdfc_json_data);
            var years_of_premium = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.years_of_premium;
            var region = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.region;
            var tot_premium = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.tot_premium;
            var protect_ride_prem_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.protect_ride_prem_tot;
            var hospital_daily_cash_prem_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.hospital_daily_cash_prem_tot;
            var ipa_rider_prem_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.ipa_rider_prem_tot;
            var load_desc = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.load_desc;
            var load_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.load_tot;
            var less_disc_per = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.less_disc_per;
            var tot_basic_prem = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.tot_basic_prem;
            var less_disc_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.less_disc_tot;
            var family_disc_per = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.family_disc_per;
            var family_disc_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.family_disc_tot;
            var gross_premium_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.gross_premium_tot;
            var gross_premium_tot_new = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.gross_premium_tot_new;
            var medi_cgst_rate = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_cgst_rate;
            var medi_cgst_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_cgst_tot;
            var medi_sgst_rate = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_sgst_rate;
            var medi_sgst_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_sgst_tot;
            var medi_final_premium = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_final_premium;

            var easy_rate_status = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.easy_rate_status;
            var easy_rate_del_flag = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.easy_rate_del_flag;

            $("#medi_hdfc_ergo_health_insu_easy_policy_id").val(medi_hdfc_ergo_health_insu_easy_policy_id);
            $("#years_of_premium").val(years_of_premium);
            $("#region").val(region);
            $("#tot_premium").val(tot_premium);
            $("#protect_ride_prem_tot").val(protect_ride_prem_tot);
            $("#hospital_daily_cash_prem_tot").val(hospital_daily_cash_prem_tot);
            $("#ipa_rider_prem_tot").val(ipa_rider_prem_tot);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#less_disc_per").val(less_disc_per);
            $("#tot_basic_prem").val(tot_basic_prem);
            $("#less_disc_tot").val(less_disc_tot);
            $("#family_disc_per").val(family_disc_per);
            $("#family_disc_tot").val(family_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
        });
        var add_medi_hdfc_counter = "";
        var index = "";
        var medi_ind_hdfc_length = total_easy_medi_hdfc_json_data.length;
        $.each(total_easy_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_easy_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_easy_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_easy_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_easy_medi_hdfc_json_data[key][3];
            var name_insured_age = total_easy_medi_hdfc_json_data[key][4];
            var past_history = total_easy_medi_hdfc_json_data[key][5];
            var name_insured_relation = total_easy_medi_hdfc_json_data[key][6];
            var name_insured_relation_txt = total_easy_medi_hdfc_json_data[key][7];
            var nominee_name = total_easy_medi_hdfc_json_data[key][8];
            var nominee_name_txt = total_easy_medi_hdfc_json_data[key][9];
            var nominee_relation = total_easy_medi_hdfc_json_data[key][10];
            var nominee_relation_txt = total_easy_medi_hdfc_json_data[key][11];
            var type_of_policy = total_easy_medi_hdfc_json_data[key][12];
            var name_insured_sum_insured = total_easy_medi_hdfc_json_data[key][13];
            var ncb_per = total_easy_medi_hdfc_json_data[key][14];
            var protector_rider_type = total_easy_medi_hdfc_json_data[key][15];
            var protector_rider_prem = total_easy_medi_hdfc_json_data[key][16];
            var hospital_daily_cash_per_day = total_easy_medi_hdfc_json_data[key][17];
            var hospital_daily_cash_prem = total_easy_medi_hdfc_json_data[key][18];
            var ipa_rider_sum_insured = total_easy_medi_hdfc_json_data[key][19];
            var ipa_rider_prem = total_easy_medi_hdfc_json_data[key][20];
            var basic_premium = total_easy_medi_hdfc_json_data[key][21];
            var stay_active_benefit = total_easy_medi_hdfc_json_data[key][22];
            var stay_active_benefit_prem = total_easy_medi_hdfc_json_data[key][23];
            var premium_after_discount = total_easy_medi_hdfc_json_data[key][24];
            var optional_premium = total_easy_medi_hdfc_json_data[key][25];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            tr_table += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_HDFC_' + add_medi_hdfc_counter + '" onClick=removeMediclaimHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><textarea style="width:100px;" rows="3" name="past_history[]"  id="past_history_' + add_medi_hdfc_counter + '" class="form-control past_history">'+past_history+'</textarea></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:280px;" id="type_of_policy_' + add_medi_hdfc_counter + '" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_sum_insured_dropdown(' + add_medi_hdfc_counter + ');get_basic_premium(' + add_medi_hdfc_counter + ')"> <option value="null">Select Type Of Policy</option><option value="Standard Plan">Standard Plan</option><option value="Exclusive Plan">Exclusive Plan</option><option value="Premium Plan">Premium Plan</option></select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option></select></td><td> <input style="width:100px;" type="text" name="ncb_per[]" id="ncb_per_' + add_medi_hdfc_counter + '"  class="form-control ncb_per" value="'+ncb_per+'"></td><td><select style="width:110px;" id="protector_rider_type_' + add_medi_hdfc_counter + '" name="protector_rider_type[]" class="form-control protector_rider_type"  onchange="Tot_protector_rider_type_premium(' + add_medi_hdfc_counter + ')"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="protector_rider_prem[]" id="protector_rider_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 protector_rider_prem" value="'+protector_rider_prem+'"></td><td><select style="width:110px;" name="hospital_daily_cash_per_day[]" id="hospital_daily_cash_per_day_' + add_medi_hdfc_counter + '" class="form-control hospital_daily_cash_per_day" onchange="get_hospital_daily_cash_prem(' + add_medi_hdfc_counter + ')"><option value="null">Select Hospital Daily Cash</option><option value="1000">1000</option><option value="2000">2000</option><option value="3000">3000</option></select><input type="text" name="hospital_daily_cash_prem[]" id="hospital_daily_cash_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 hospital_daily_cash_prem" value="'+hospital_daily_cash_prem+'"></td><td width="8%"><input style="width:110px;" type="text" name="ipa_rider_sum_insured[]" id="ipa_rider_sum_insured_' + add_medi_hdfc_counter + '" value="'+ipa_rider_sum_insured+'" class="form-control ipa_rider_sum_insured" onkeyup="Tot_ipa_rider_premium(' + add_medi_hdfc_counter + ')"><input type="text" name="ipa_rider_prem[]" id="ipa_rider_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 ipa_rider_prem" value="'+ipa_rider_prem+'"></td><td width="8%"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '" value="'+basic_premium+'" class="form-control basic_premium" ></td><td width="8%"> <input style="width:100px;" type="text" name="optional_premium[]" id="optional_premium_' + add_medi_hdfc_counter + '" value="'+optional_premium+'" class="form-control optional_premium" ></td> <td width="8%"><input style="width:110px;" type="text" name="stay_active_benefit[]" id="stay_active_benefit_' + add_medi_hdfc_counter + '" value="'+stay_active_benefit+'" class="form-control stay_active_benefit" onkeyup="Tot_stay_active_benefit_premium(' + add_medi_hdfc_counter + ')"><input style="width:110px;" type="text" name="stay_active_benefit_prem[]" id="stay_active_benefit_prem_' + add_medi_hdfc_counter + '" value="'+stay_active_benefit_prem+'" class="form-control mt-1 stay_active_benefit_prem"></td><td width="8%"><input style="width:100px;" type="text" name="premium_after_discount[]" id="premium_after_discount_' + add_medi_hdfc_counter + '" value="'+premium_after_discount+'" class="form-control premium_after_discount" ></td> </tr>';
            // alert(tr_table);
        });
        $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + medi_ind_hdfc_length + ")");
        $("#first_table_tbody").append(tr_table);
        $.each(total_easy_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_easy_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_easy_medi_hdfc_json_data[key][1];
            var name_insured_relation = total_easy_medi_hdfc_json_data[key][6];
            var nominee_name = total_easy_medi_hdfc_json_data[key][8];
            var nominee_relation = total_easy_medi_hdfc_json_data[key][10];
            var type_of_policy = total_easy_medi_hdfc_json_data[key][12];
            var name_insured_sum_insured = total_easy_medi_hdfc_json_data[key][13];
            var protector_rider_type = total_easy_medi_hdfc_json_data[key][15];
            var hospital_daily_cash_per_day = total_easy_medi_hdfc_json_data[key][17];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_hdfc_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_hdfc_counter).val(nominee_relation);
            $("#type_of_policy_"+add_medi_hdfc_counter).val(type_of_policy);
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            $("#protector_rider_type_"+add_medi_hdfc_counter).val(protector_rider_type);
            $("#hospital_daily_cash_per_day_"+add_medi_hdfc_counter).val(hospital_daily_cash_per_day);
        });
        $.each(total_easy_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            get_sum_insured_dropdown(add_medi_hdfc_counter);
        });
        $.each(total_easy_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            var name_insured_sum_insured = total_easy_medi_hdfc_json_data[key][13];
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            get_basic_premium(add_medi_hdfc_counter);
        });
    }

    function edit_medi_float_Suraksha_policy_HDFC_ERGO_HEALTH_INSURANCE_LTD(medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr){
        var total_suraksha_float_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $.each(medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_float_suraksha_policy_id = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_float_suraksha_policy_id;
            var medi_hdfc_ergo_health_insu_suraksha_floater_policy_fk_policy_id = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_floater_policy_fk_policy_id;
            var fk_policy_type_id = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.policy_name_txt;
            total_suraksha_float_medi_hdfc_json_data = JSON.parse(medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.total_suraksha_float_medi_hdfc_json_data);
            var years_of_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.years_of_premium;
            var region = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.region;
            var tot_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var hdfc_ergo_health_insu_child_count = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_count;
            var hdfc_ergo_health_insu_child_count_first_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_count_first_premium;
            var hdfc_ergo_health_insu_child_total_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_total_premium;
            var load_desc = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var less_disc_per = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var gross_premium_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var max_age = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.max_age;
            var suraksha_floater_policy_status = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.suraksha_floater_policy_status;
            var suraksha_floater_policy_del_flag = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.suraksha_floater_policy_del_flag;

            $("#medi_hdfc_ergo_health_float_suraksha_policy_id").val(medi_hdfc_ergo_health_float_suraksha_policy_id);
            $("#years_of_premium").val(years_of_premium);
            $("#region").val(region);
            $("#tot_premium").val(tot_premium);
            $("#hdfc_ergo_health_insu_child_count").val(hdfc_ergo_health_insu_child_count);
            $("#hdfc_ergo_health_insu_child_count_first_premium").val(hdfc_ergo_health_insu_child_count_first_premium);
            $("#hdfc_ergo_health_insu_child_total_premium").val(hdfc_ergo_health_insu_child_total_premium);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#less_disc_per").val(less_disc_per);
            $("#less_disc_tot").val(less_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
        });
        var table_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var Family_size_count = total_suraksha_float_medi_hdfc_json_data.length;
        // alert(mediclaim_length);
        $.each(total_suraksha_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_suraksha_float_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_suraksha_float_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_suraksha_float_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_suraksha_float_medi_hdfc_json_data[key][3];
            var name_insured_age = total_suraksha_float_medi_hdfc_json_data[key][4];
            var name_insured_relation = total_suraksha_float_medi_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_suraksha_float_medi_hdfc_json_data[key][6];
            var nominee_name = total_suraksha_float_medi_hdfc_json_data[0][7];
            var nominee_name_txt = total_suraksha_float_medi_hdfc_json_data[0][8];
            var nominee_relation = total_suraksha_float_medi_hdfc_json_data[0][9];
            var nominee_relation_txt = total_suraksha_float_medi_hdfc_json_data[0][10];
            var type_of_policy = total_suraksha_float_medi_hdfc_json_data[0][11];
            var name_insured_sum_insured = total_suraksha_float_medi_hdfc_json_data[0][12];
            var ncb_per = total_suraksha_float_medi_hdfc_json_data[0][13];
            var basic_premium = total_suraksha_float_medi_hdfc_json_data[0][14];
            var hospital_daliy_cash = total_suraksha_float_medi_hdfc_json_data[0][15];
            var hospital_daliy_cash_pre = total_suraksha_float_medi_hdfc_json_data[0][16];
            var tot_pre = total_suraksha_float_medi_hdfc_json_data[0][17];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td>';

            if(add_medi_hdfc_counter == 0){
                tr_table+=' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;  endif; ?> </select></td> <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="type_of_policy" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_sum_insured_dropdown(' + add_medi_hdfc_counter + ');get_basic_premium(' + add_medi_hdfc_counter + ');"> <option value="null">Select Type Of Policy</option><option value="Silver Smart">Silver Smart</option><option value="Gold Smart">Gold Smart</option><option value="Platinum Smart">Platinum Smart</option></select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:130px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option></select></td><td width="8%" rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="ncb_per[]" id="ncb_per" value="'+ncb_per+'" class="form-control ncb_per" ></td><td width="8%" rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium" value="'+basic_premium+'" class="form-control basic_premium" ></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:180px;" id="hospital_daliy_cash" name="hospital_daliy_cash[]" class="form-control hospital_daliy_cash" onchange="get_hospital_daily_cash_premium(' + add_medi_hdfc_counter + ')"> <option value="null">Select Hospital Daliy Cash</option><option value="1000">1000</option><option value="2000">2000</option><option value="3000">3000</option><option value="5000">5000</option><option value="7500">7500</option></select><input style="width:120px;" type="text" name="hospital_daliy_cash_pre[]" id="hospital_daliy_cash_pre" value="'+hospital_daliy_cash_pre+'" class="form-control mt-1 hospital_daliy_cash_pre" ></td><td width="8%" rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="tot_pre[]" id="tot_pre" value="'+tot_pre+'" class="form-control tot_pre" ></td>  </tr>';
            }

        });
        $("#first_table_tbody").append(tr_table);

        $.each(total_suraksha_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_suraksha_float_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_suraksha_float_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_suraksha_float_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_suraksha_float_medi_hdfc_json_data[key][3];
            var name_insured_age = total_suraksha_float_medi_hdfc_json_data[key][4];
            var name_insured_relation = total_suraksha_float_medi_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_suraksha_float_medi_hdfc_json_data[key][6];
            var nominee_name = total_suraksha_float_medi_hdfc_json_data[0][7];
            var nominee_name_txt = total_suraksha_float_medi_hdfc_json_data[0][8];
            var nominee_relation = total_suraksha_float_medi_hdfc_json_data[0][9];
            var nominee_relation_txt = total_suraksha_float_medi_hdfc_json_data[0][10];
            var type_of_policy = total_suraksha_float_medi_hdfc_json_data[0][11];
            var name_insured_sum_insured = total_suraksha_float_medi_hdfc_json_data[0][12];
            var ncb_per = total_suraksha_float_medi_hdfc_json_data[0][13];
            var basic_premium = total_suraksha_float_medi_hdfc_json_data[0][14];
            var hospital_daliy_cash = total_suraksha_float_medi_hdfc_json_data[0][15];
            var hospital_daliy_cash_pre = total_suraksha_float_medi_hdfc_json_data[0][16];
            var tot_pre = total_suraksha_float_medi_hdfc_json_data[0][17];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#type_of_policy").val(type_of_policy);
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            $("#hospital_daliy_cash").val(hospital_daliy_cash);
        });
        $.each(total_suraksha_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            get_sum_insured_dropdown(add_medi_hdfc_counter);
        });
        $.each(total_suraksha_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            var name_insured_sum_insured = total_suraksha_float_medi_hdfc_json_data[0][12];
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            get_age_Comparision();
        });
    }

    function edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Surksha_policy(medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr){
        var total_suraksha_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $.each(medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_suraksha_policy_id = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_policy_id;
            var medi_hdfc_ergo_health_insu_suraksha_policy_fk_policy_id = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_policy_fk_policy_id;
            var fk_policy_type_id = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.policy_name_txt;
            total_suraksha_medi_hdfc_json_data = JSON.parse(medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.total_suraksha_medi_hdfc_json_data);

            var years_of_premium = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.years_of_premium;
            var region = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.region;
            var tot_premium = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var load_desc = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var less_disc_per = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var family_disc_per = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.family_disc_per;
            var family_disc_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.family_disc_tot;
            var gross_premium_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var medi_hdfc_ergo_health_insu_suraksha_policy_status = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_policy_status;
            var medi_hdfc_ergo_health_insu_suraksha_policy_del_flag = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_policy_del_flag;

            $("#medi_hdfc_ergo_health_insu_suraksha_policy_id").val(medi_hdfc_ergo_health_insu_suraksha_policy_id);
            $("#years_of_premium").val(years_of_premium);
            $("#region").val(region);
            $("#tot_premium").val(tot_premium);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#less_disc_per").val(less_disc_per);
            $("#less_disc_tot").val(less_disc_tot);
            $("#family_disc_per").val(family_disc_per);
            $("#family_disc_tot").val(family_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
        });
        var add_medi_hdfc_counter = "";
        var index = "";
        var medi_ind_hdfc_length = total_suraksha_medi_hdfc_json_data.length;
        $.each(total_suraksha_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            main_suraksha_Medi_HDFC.push(add_medi_hdfc_counter);
            index = total_suraksha_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_suraksha_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_suraksha_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_suraksha_medi_hdfc_json_data[key][3];
            var name_insured_age = total_suraksha_medi_hdfc_json_data[key][4];
            var name_insured_relation = total_suraksha_medi_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_suraksha_medi_hdfc_json_data[key][6];
            var nominee_name = total_suraksha_medi_hdfc_json_data[key][7];
            var nominee_name_txt = total_suraksha_medi_hdfc_json_data[key][8];
            var nominee_relation = total_suraksha_medi_hdfc_json_data[key][9];
            var nominee_relation_txt = total_suraksha_medi_hdfc_json_data[key][10];
            var type_of_policy = total_suraksha_medi_hdfc_json_data[key][11];
            var name_insured_sum_insured = total_suraksha_medi_hdfc_json_data[key][12];
            var ncb_per = total_suraksha_medi_hdfc_json_data[key][13];
            var basic_premium = total_suraksha_medi_hdfc_json_data[key][14];
            var hospital_daliy_cash = total_suraksha_medi_hdfc_json_data[key][15];
            var hospital_daliy_cash_pre = total_suraksha_medi_hdfc_json_data[key][16];
            var tot_pre = total_suraksha_medi_hdfc_json_data[key][17];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            tr_table += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_suraksha_medi_HDFC_' + add_medi_hdfc_counter + '" onClick=removesurakshaMediHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="type_of_policy_' + add_medi_hdfc_counter + '" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_sum_insured_dropdown(' + add_medi_hdfc_counter + ');get_basic_premium(' + add_medi_hdfc_counter + ');"> <option value="null">Select Type Of Policy</option><option value="Silver Smart">Silver Smart</option><option value="Gold Smart">Gold Smart</option><option value="Platinum Smart">Platinum Smart</option></select></td><td width="12%"><select style="width:130px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option></select></td><td width="8%"> <input style="width:100px;" type="text" name="ncb_per[]" id="ncb_per_' + add_medi_hdfc_counter + '" value="'+ncb_per+'" class="form-control ncb_per" ></td><td width="8%"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '" value="'+basic_premium+'" class="form-control basic_premium" ></td><td width="12%"><select style="width:180px;" id="hospital_daliy_cash_' + add_medi_hdfc_counter + '" name="hospital_daliy_cash[]" class="form-control hospital_daliy_cash" onchange="get_hospital_daily_cash_premium(' + add_medi_hdfc_counter + ')"> <option value="null">Select Hospital Daliy Cash</option><option value="1000">1000</option><option value="2000">2000</option><option value="3000">3000</option><option value="5000">5000</option><option value="7500">7500</option></select><input style="width:120px;" type="text" name="hospital_daliy_cash_pre[]" id="hospital_daliy_cash_pre_' + add_medi_hdfc_counter + '" value="'+hospital_daliy_cash_pre+'" class="form-control mt-1 hospital_daliy_cash_pre" ></td><td width="8%"> <input style="width:100px;" type="text" name="tot_pre[]" id="tot_pre_' + add_medi_hdfc_counter + '" value="'+tot_pre+'" class="form-control tot_pre" ></td>  </tr>';
                
            // alert(tr_table);
        });
        $("#Add_suraksha_Medi_HDFC").attr("onClick", "AddsurkashaMediHDFC(" + medi_ind_hdfc_length + ")");
        $("#first_table_tbody").append(tr_table);
        $.each(total_suraksha_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            var name_insured_member_name = total_suraksha_medi_hdfc_json_data[key][1];
            var name_insured_relation = total_suraksha_medi_hdfc_json_data[key][5];
            var nominee_name = total_suraksha_medi_hdfc_json_data[key][7];
            var nominee_relation = total_suraksha_medi_hdfc_json_data[key][9];
            var type_of_policy = total_suraksha_medi_hdfc_json_data[key][11];
            var name_insured_sum_insured = total_suraksha_medi_hdfc_json_data[key][12];
            var hospital_daliy_cash = total_suraksha_medi_hdfc_json_data[key][15];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_hdfc_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_hdfc_counter).val(nominee_relation);
            $("#type_of_policy_"+add_medi_hdfc_counter).val(type_of_policy);
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            $("#hospital_daliy_cash_"+add_medi_hdfc_counter).val(hospital_daliy_cash);
        });
        $.each(total_suraksha_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            get_sum_insured_dropdown(add_medi_hdfc_counter);
        });
        $.each(total_suraksha_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            var name_insured_sum_insured = total_suraksha_medi_hdfc_json_data[key][12];
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            get_basic_premium(add_medi_hdfc_counter);
        });
    }

    function edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Energy_policy(medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr){
        var total_energy_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $.each(medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_energy_policy_id = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_energy_policy_id;
            var medi_hdfc_ergo_health_insu_energy_policy_fk_policy_id = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_energy_policy_fk_policy_id;
            var fk_policy_type_id = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.policy_name_txt;
            total_energy_medi_hdfc_json_data = JSON.parse(medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.total_energy_medi_hdfc_json_data);

            var tot_premium = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var less_disc_per = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var load_desc = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var gross_premium_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var medi_hdfc_ergo_health_insu_energy_policy_status = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_energy_policy_status;
            var medi_hdfc_ergo_health_insu_energy_policy_del_flag = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_energy_policy_del_flag;

            $("#medi_hdfc_ergo_health_insu_energy_policy_id").val(medi_hdfc_ergo_health_insu_energy_policy_id);
            $("#tot_premium").val(tot_premium);
            $("#less_disc_per").val(less_disc_per);
            $("#less_disc_tot").val(less_disc_tot);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
        });
        var add_medi_hdfc_counter = "";
        var index = "";
        var medi_ind_hdfc_length = total_energy_medi_hdfc_json_data.length;
        $.each(total_energy_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            main_Energy_Medi_HDFC.push(add_medi_hdfc_counter);
            index = total_energy_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_energy_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_energy_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_energy_medi_hdfc_json_data[key][3];
            var name_insured_age = total_energy_medi_hdfc_json_data[key][4];
            var name_insured_relation = total_energy_medi_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_energy_medi_hdfc_json_data[key][6];
            var nominee_name = total_energy_medi_hdfc_json_data[key][7];
            var nominee_name_txt = total_energy_medi_hdfc_json_data[key][8];
            var nominee_relation = total_energy_medi_hdfc_json_data[key][9];
            var nominee_relation_txt = total_energy_medi_hdfc_json_data[key][10];
            var type_of_policy = total_energy_medi_hdfc_json_data[key][11];
            var name_insured_sum_insured = total_energy_medi_hdfc_json_data[key][12];
            var basic_premium = total_energy_medi_hdfc_json_data[key][13];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            tr_table += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_energy_medi_HDFC_' + add_medi_hdfc_counter + '" onClick=removeEnergyMediHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="type_of_policy_' + add_medi_hdfc_counter + '" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"> <option value="null">Select Type Of Policy</option><option value="Silver No Co-Payment">Silver No Co-Payment</option><option value="Silver Co-Payment">Silver Co-Payment</option><option value="Gold No Co-Payment">Gold No Co-Payment</option><option value="Gold Co-Payment">Gold Co-Payment</option></select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td width="8%"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '" value="'+basic_premium+'" class="form-control basic_premium" ></td>  </tr>';
            // alert(tr_table);
        });
        $("#Add_Energy_Medi_HDFC").attr("onClick", "AddEnergyMediHDFC(" + medi_ind_hdfc_length + ")");
        $("#first_table_tbody").append(tr_table);
        $.each(total_energy_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            var name_insured_member_name = total_energy_medi_hdfc_json_data[key][1];
            var name_insured_relation = total_energy_medi_hdfc_json_data[key][5];
            var nominee_name = total_energy_medi_hdfc_json_data[key][7];
            var nominee_relation = total_energy_medi_hdfc_json_data[key][9];
            var type_of_policy = total_energy_medi_hdfc_json_data[key][11];
            var name_insured_sum_insured = total_energy_medi_hdfc_json_data[key][12];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_hdfc_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_hdfc_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            $("#type_of_policy_"+add_medi_hdfc_counter).val(type_of_policy);
            get_basic_premium(add_medi_hdfc_counter);
        });
    }

    function edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Optima_restore_policy(medi_ind_hdfc_ergo_health_insu_policy_data_arr){
        var total_medi_ind_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $.each(medi_ind_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_policy_id = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_policy_id;
            var medi_hdfc_ergo_health_insu_policy_fk_policy_id = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_policy_fk_policy_id;
            var fk_policy_type_id = medi_ind_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_ind_hdfc_ergo_health_insu_policy_data_arr.policy_name_txt;
            total_medi_ind_hdfc_json_data = JSON.parse(medi_ind_hdfc_ergo_health_insu_policy_data_arr.total_medi_ind_hdfc_json_data);
            var years_of_premium = medi_ind_hdfc_ergo_health_insu_policy_data_arr.years_of_premium;
            var region = medi_ind_hdfc_ergo_health_insu_policy_data_arr.region;
            var tot_premium = medi_ind_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var protect_ride_prem_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.protect_ride_prem_tot;
            var hospital_daily_cash_prem_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.hospital_daily_cash_prem_tot;
            var ipa_rider_prem_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.ipa_rider_prem_tot;
            var load_desc = medi_ind_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var less_disc_per = medi_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var family_disc_per = medi_ind_hdfc_ergo_health_insu_policy_data_arr.family_disc_per;
            var family_disc_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.family_disc_tot;
            var gross_premium_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var medi_hdfc_ergo_health_insu_policy_status = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_policy_status;
            var medi_hdfc_ergo_health_insu_policy_del_flag = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_policy_del_flag;

            $("#medi_hdfc_ergo_health_insu_policy_id").val(medi_hdfc_ergo_health_insu_policy_id);
            $("#years_of_premium").val(years_of_premium);
            $("#region").val(region);
            $("#tot_premium").val(tot_premium);
            $("#protect_ride_prem_tot").val(protect_ride_prem_tot);
            $("#hospital_daily_cash_prem_tot").val(hospital_daily_cash_prem_tot);
            $("#ipa_rider_prem_tot").val(ipa_rider_prem_tot);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#less_disc_per").val(less_disc_per);
            $("#less_disc_tot").val(less_disc_tot);
            $("#family_disc_per").val(family_disc_per);
            $("#family_disc_tot").val(family_disc_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
        });
        var add_medi_hdfc_counter = "";
        var index = "";
        var medi_ind_hdfc_length = total_medi_ind_hdfc_json_data.length;
        $.each(total_medi_ind_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_medi_ind_hdfc_json_data[key][0];
            var name_insured_member_name = total_medi_ind_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_medi_ind_hdfc_json_data[key][2];
            var name_insured_dob = total_medi_ind_hdfc_json_data[key][3];
            var name_insured_age = total_medi_ind_hdfc_json_data[key][4];
            var past_history = total_medi_ind_hdfc_json_data[key][5];
            var name_insured_relation = total_medi_ind_hdfc_json_data[key][6];
            var name_insured_relation_txt = total_medi_ind_hdfc_json_data[key][7];
            var nominee_name = total_medi_ind_hdfc_json_data[key][8];
            var nominee_name_txt = total_medi_ind_hdfc_json_data[key][9];
            var nominee_relation = total_medi_ind_hdfc_json_data[key][10];
            var nominee_relation_txt = total_medi_ind_hdfc_json_data[key][11];
            var name_insured_sum_insured = total_medi_ind_hdfc_json_data[key][12];
            var ncb_per = total_medi_ind_hdfc_json_data[key][13];
            var protector_rider_type = total_medi_ind_hdfc_json_data[key][14];
            var protector_rider_prem = total_medi_ind_hdfc_json_data[key][15];
            var hospital_daily_cash_per_day = total_medi_ind_hdfc_json_data[key][16];
            var hospital_daily_cash_prem = total_medi_ind_hdfc_json_data[key][17];
            var ipa_rider_sum_insured = total_medi_ind_hdfc_json_data[key][18];
            var ipa_rider_prem = total_medi_ind_hdfc_json_data[key][19];
            var basic_premium = total_medi_ind_hdfc_json_data[key][20];
            var stay_active_benefit = total_medi_ind_hdfc_json_data[key][21];
            var stay_active_benefit_prem = total_medi_ind_hdfc_json_data[key][22];
            var premium_after_discount = total_medi_ind_hdfc_json_data[key][23];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            tr_table += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_HDFC_' + add_medi_hdfc_counter + '" onClick=removeMediclaimHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><textarea style="width:100px;" rows="3" name="past_history[]"  id="past_history_' + add_medi_hdfc_counter + '" class="form-control past_history">'+past_history+'</textarea></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td> <input style="width:100px;" type="text" name="ncb_per[]" id="ncb_per_' + add_medi_hdfc_counter + '"  class="form-control ncb_per" value="'+ncb_per+'"></td><td><select style="width:110px;" id="protector_rider_type_' + add_medi_hdfc_counter + '" name="protector_rider_type[]" class="form-control protector_rider_type"  onchange="Tot_protector_rider_type_premium(' + add_medi_hdfc_counter + ')"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="protector_rider_prem[]" id="protector_rider_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 protector_rider_prem" value="'+protector_rider_prem+'"></td><td><select style="width:110px;" name="hospital_daily_cash_per_day[]" id="hospital_daily_cash_per_day_' + add_medi_hdfc_counter + '" class="form-control hospital_daily_cash_per_day" onchange="get_hospital_daily_cash_prem(' + add_medi_hdfc_counter + ')"><option value="null">Select Hospital Daily Cash</option><option value="1000">1000</option><option value="2000">2000</option><option value="3000">3000</option></select><input type="text" name="hospital_daily_cash_prem[]" id="hospital_daily_cash_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 hospital_daily_cash_prem" value="'+hospital_daily_cash_prem+'"></td><td width="8%"><input style="width:110px;" type="text" name="ipa_rider_sum_insured[]" id="ipa_rider_sum_insured_' + add_medi_hdfc_counter + '" value="'+ipa_rider_sum_insured+'" class="form-control ipa_rider_sum_insured" onkeyup="Tot_ipa_rider_premium(' + add_medi_hdfc_counter + ')"><input type="text" name="ipa_rider_prem[]" id="ipa_rider_prem_' + add_medi_hdfc_counter + '" class="form-control mt-1 ipa_rider_prem" value="'+ipa_rider_prem+'"></td><td width="8%"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '" value="'+basic_premium+'" class="form-control basic_premium" ></td> <td width="8%"><input style="width:110px;" type="text" name="stay_active_benefit[]" id="stay_active_benefit_' + add_medi_hdfc_counter + '" value="'+stay_active_benefit+'" class="form-control stay_active_benefit" onkeyup="Tot_stay_active_benefit_premium(' + add_medi_hdfc_counter + ')"><input style="width:110px;" type="text" name="stay_active_benefit_prem[]" id="stay_active_benefit_prem_' + add_medi_hdfc_counter + '" value="'+stay_active_benefit_prem+'" class="form-control mt-1 stay_active_benefit_prem"></td><td width="8%"><input style="width:100px;" type="text" name="premium_after_discount[]" id="premium_after_discount_' + add_medi_hdfc_counter + '" value="'+premium_after_discount+'" class="form-control premium_after_discount" ></td> </tr>';
            // alert(tr_table);
        });
        $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + medi_ind_hdfc_length + ")");
        $("#first_table_tbody").append(tr_table);
        $.each(total_medi_ind_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_medi_ind_hdfc_json_data[key][0];
            var name_insured_member_name = total_medi_ind_hdfc_json_data[key][1];
            var name_insured_relation = total_medi_ind_hdfc_json_data[key][6];
            var nominee_name = total_medi_ind_hdfc_json_data[key][8];
            var nominee_relation = total_medi_ind_hdfc_json_data[key][10];
            var name_insured_sum_insured = total_medi_ind_hdfc_json_data[key][12];
            var protector_rider_type = total_medi_ind_hdfc_json_data[key][14];
            var hospital_daily_cash_per_day = total_medi_ind_hdfc_json_data[key][16];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name_"+add_medi_hdfc_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_hdfc_counter).val(nominee_relation);
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).val(name_insured_sum_insured);
            $("#protector_rider_type_"+add_medi_hdfc_counter).val(protector_rider_type);
            $("#hospital_daily_cash_per_day_"+add_medi_hdfc_counter).val(hospital_daily_cash_per_day);
            get_basic_premium(add_medi_hdfc_counter);
        });
    }

    function edit_medi_float_HDFC_ERGO_HEALTH_INSURANCE_LTD_Optima_restore_policy(medi_float_hdfc_ergo_health_insu_policy_data_arr){
        var total_medi_float_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $.each(medi_float_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_float_policy_id = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_float_policy_id;
            var medi_hdfc_ergo_health_insu_float_policy_fk_policy_id = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_float_policy_fk_policy_id;
            var fk_policy_type_id = medi_float_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = medi_float_hdfc_ergo_health_insu_policy_data_arr.policy_name_txt;
            total_medi_float_hdfc_json_data = JSON.parse(medi_float_hdfc_ergo_health_insu_policy_data_arr.total_medi_float_hdfc_json_data);
            var years_of_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.years_of_premium;
            var region = medi_float_hdfc_ergo_health_insu_policy_data_arr.region;
            var tot_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var hdfc_ergo_health_insu_child_count = medi_float_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_count;
            var hdfc_ergo_health_insu_child_count_first_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_count_first_premium;
            var hdfc_ergo_health_insu_child_total_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_total_premium;
            var protect_ride_prem_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.protect_ride_prem_tot;
            var hospital_daily_cash_prem_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.hospital_daily_cash_prem_tot;
            var ipa_rider_prem_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.ipa_rider_prem_tot;
            var load_desc = medi_float_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var less_disc_per = medi_float_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var stay_active_benefit = medi_float_hdfc_ergo_health_insu_policy_data_arr.stay_active_benefit;
            var stay_active_benefit_prem_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.stay_active_benefit_prem_tot;
            var gross_premium_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_float_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var max_age = medi_float_hdfc_ergo_health_insu_policy_data_arr.max_age;
            var medi_hdfc_ergo_health_insu_float_policy_status = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_float_policy_status;
            var medi_hdfc_ergo_health_insu_float_policy_del_flag = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_float_policy_del_flag;

            $("#medi_hdfc_ergo_health_insu_float_policy_id").val(medi_hdfc_ergo_health_insu_float_policy_id);
            $("#years_of_premium").val(years_of_premium);
            $("#region").val(region);
            $("#tot_premium").val(tot_premium);
            $("#hdfc_ergo_health_insu_child_count").val(hdfc_ergo_health_insu_child_count);
            $("#hdfc_ergo_health_insu_child_count_first_premium").val(hdfc_ergo_health_insu_child_count_first_premium);
            $("#hdfc_ergo_health_insu_child_total_premium").val(hdfc_ergo_health_insu_child_total_premium);
            $("#protect_ride_prem_tot").val(protect_ride_prem_tot);
            $("#hospital_daily_cash_prem_tot").val(hospital_daily_cash_prem_tot);
            $("#ipa_rider_prem_tot").val(ipa_rider_prem_tot);
            $("#load_desc").val(load_desc);
            $("#load_tot").val(load_tot);
            $("#less_disc_per").val(less_disc_per);
            $("#less_disc_tot").val(less_disc_tot);
            $("#stay_active_benefit").val(stay_active_benefit);
            $("#stay_active_benefit_prem_tot").val(stay_active_benefit_prem_tot);
            $("#gross_premium_tot").val(gross_premium_tot);
            $("#gross_premium_tot_new").val(gross_premium_tot_new);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#max_age").val(max_age);
        });
        var table_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var Family_size_count = total_medi_float_hdfc_json_data.length;
        // alert(mediclaim_length);
        $.each(total_medi_float_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_medi_float_hdfc_json_data[key][0];
            var name_insured_member_name = total_medi_float_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_medi_float_hdfc_json_data[key][2];
            var name_insured_dob = total_medi_float_hdfc_json_data[key][3];
            var name_insured_age = total_medi_float_hdfc_json_data[key][4];
            var past_history = total_medi_float_hdfc_json_data[key][5];
            var name_insured_relation = total_medi_float_hdfc_json_data[key][6];
            var name_insured_relation_txt = total_medi_float_hdfc_json_data[key][7];
            var nominee_name = total_medi_float_hdfc_json_data[0][8];
            var nominee_name_txt = total_medi_float_hdfc_json_data[0][9];
            var nominee_relation = total_medi_float_hdfc_json_data[0][10];
            var nominee_relation_txt = total_medi_float_hdfc_json_data[0][11];
            var name_insured_sum_insured = total_medi_float_hdfc_json_data[0][12];
            var ncb_per = total_medi_float_hdfc_json_data[0][13];
            var protector_rider_type = total_medi_float_hdfc_json_data[0][14];
            var protector_rider_prem = total_medi_float_hdfc_json_data[0][15];
            var hospital_daily_cash_per_day = total_medi_float_hdfc_json_data[0][16];
            var hospital_daily_cash_prem = total_medi_float_hdfc_json_data[0][17];
            var ipa_rider_sum_insured = total_medi_float_hdfc_json_data[0][18];
            var ipa_rider_prem = total_medi_float_hdfc_json_data[0][19];
            var basic_premium = total_medi_float_hdfc_json_data[0][20];

            name_insured_age = parseInt(name_insured_age)+parseInt(1);

            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><textarea style="width:100px;" rows="3" name="past_history[]"  id="past_history_' + add_medi_hdfc_counter + '" class="form-control past_history">'+past_history+'</textarea></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td>';

            if(add_medi_hdfc_counter == 0){
                tr_table+=' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="ncb_per[]" id="ncb_per"  class="form-control ncb_per" value="'+ncb_per+'"></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" id="protector_rider_type" name="protector_rider_type[]" class="form-control protector_rider_type"  onchange="Tot_protector_rider_type_premium()"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="protector_rider_prem[]" id="protector_rider_prem" class="form-control mt-1 protector_rider_prem" value="'+protector_rider_prem+'"></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" name="hospital_daily_cash_per_day[]" id="hospital_daily_cash_per_day" class="form-control hospital_daily_cash_per_day" onchange="get_hospital_daily_cash_prem()"><option value="null">Select Hospital Daily Cash</option><option value="1000">1000</option><option value="2000">2000</option><option value="3000">3000</option></select><input type="text" name="hospital_daily_cash_prem[]" id="hospital_daily_cash_prem" class="form-control mt-1 hospital_daily_cash_prem" value="'+hospital_daily_cash_prem+'"></td><td width="8%" rowspan="'+Family_size_count+'"><input style="width:110px;" type="text" name="ipa_rider_sum_insured[]" id="ipa_rider_sum_insured" value="'+ipa_rider_sum_insured+'" class="form-control ipa_rider_sum_insured" onkeyup="Tot_ipa_rider_premium()"><input type="text" name="ipa_rider_prem[]" id="ipa_rider_prem" class="form-control mt-1 ipa_rider_prem" value="'+ipa_rider_prem+'"></td><td width="8%" rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium" value="'+basic_premium+'" class="form-control basic_premium" ></td> </tr>';
            }

        });
        $("#first_table_tbody").append(tr_table);

        $.each(total_medi_float_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_medi_float_hdfc_json_data[key][0];
            var name_insured_member_name = total_medi_float_hdfc_json_data[key][1];
            var name_insured_relation = total_medi_float_hdfc_json_data[key][6];
            var nominee_name = total_medi_float_hdfc_json_data[0][8];
            var nominee_relation = total_medi_float_hdfc_json_data[0][10];
            var name_insured_sum_insured = total_medi_float_hdfc_json_data[0][12];
            var protector_rider_type = total_medi_float_hdfc_json_data[0][14];
            var hospital_daily_cash_per_day = total_medi_float_hdfc_json_data[0][16];

            $("#name_insured_member_name_"+add_medi_hdfc_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_hdfc_counter).val(name_insured_relation);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
            $("#name_insured_sum_insured").val(name_insured_sum_insured);
            $("#protector_rider_type").val(protector_rider_type);
            $("#hospital_daily_cash_per_day").val(hospital_daily_cash_per_day);
            get_age_Comparision();
        });
    }

    function edit_mediclaim_policy(mediclaim_policy_data_arr) {
        var tot_mediclaim_json = "";
        $("#first_table_tbody").empty();
        $.each(mediclaim_policy_data_arr, function(key_other, val_other) {
            var mediclaim_policy_id = mediclaim_policy_data_arr.mediclaim_policy_id;
            var mediclaim_policy_fk_policy_id = mediclaim_policy_data_arr.mediclaim_policy_fk_policy_id;
            var fk_policy_type_id = mediclaim_policy_data_arr.fk_policy_type_id;
            var policy_name_txt = mediclaim_policy_data_arr.policy_name_txt;

            // var tot_mediclaim_json = mediclaim_policy_data_arr.tot_mediclaim_json;
            tot_mediclaim_json = JSON.parse(mediclaim_policy_data_arr.tot_mediclaim_json);
            var medi_total_ncd_amount = mediclaim_policy_data_arr.medi_total_ncd_amount;
            var medi_total_amount = mediclaim_policy_data_arr.medi_total_amount;
            var medi_family_disc_rate = mediclaim_policy_data_arr.medi_family_disc_rate;
            var medi_family_disc_tot = mediclaim_policy_data_arr.medi_family_disc_tot;
            var medi_premium_after_fd = mediclaim_policy_data_arr.medi_premium_after_fd;
            var medi_cgst_rate = mediclaim_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = mediclaim_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = mediclaim_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = mediclaim_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = mediclaim_policy_data_arr.medi_final_premium;
            var mediclaim_policy_status = mediclaim_policy_data_arr.mediclaim_policy_status;
            var mediclaim_policy_del_flag = mediclaim_policy_data_arr.mediclaim_policy_del_flag;
            // alert(medi_final_premium);
            $("#medi_total_ncd_amount").val(medi_total_ncd_amount);
            $("#medi_total_amount").val(medi_total_amount);
            $("#medi_family_disc_rate").val(medi_family_disc_rate);
            $("#medi_family_disc_tot").val(medi_family_disc_tot);
            $("#medi_premium_after_fd").val(medi_premium_after_fd);
            $("#cgst_fire_per").val(medi_cgst_rate);
            $("#medi_cgst_tot").val(medi_cgst_tot);
            $("#sgst_fire_per").val(medi_sgst_rate);
            $("#medi_sgst_tot").val(medi_sgst_tot);
            $("#medi_final_premium").val(medi_final_premium);
            $("#mediclaim_policy_id").val(mediclaim_policy_id);
        });
        var mediclaim_tr = "";
        var add_medi_counter = "";
        var index = "";
        var mediclaim_length = tot_mediclaim_json.length;
        // alert(mediclaim_length);
        $.each(tot_mediclaim_json, function(key, val) {
            add_medi_counter = key;
            main_Mediclaim.push(add_medi_counter);
            index = tot_mediclaim_json[key][0];
            var name_insured_member_name = tot_mediclaim_json[key][1];
            var name_insured_member_name_txt = tot_mediclaim_json[key][2];
            var name_insured_dob = tot_mediclaim_json[key][3];
            var name_insured_age = tot_mediclaim_json[key][4];
            var name_insured_relation = tot_mediclaim_json[key][5];
            var name_insured_relation_txt = tot_mediclaim_json[key][6];
            var name_insured_policy_type = tot_mediclaim_json[key][7];
            var name_insured_policy_option = tot_mediclaim_json[key][8];
            var name_insured_sum_insured = tot_mediclaim_json[key][9];
            var name_insured_premium = tot_mediclaim_json[key][10];
            var dm_yes_no = tot_mediclaim_json[key][11];
            var dm_percentage = tot_mediclaim_json[key][12];
            var dm_loading = tot_mediclaim_json[key][13];
            var htn_yes_no = tot_mediclaim_json[key][14];
            var htn_percentage = tot_mediclaim_json[key][15];
            var htn_loading = tot_mediclaim_json[key][16];
            var premium_after_loading = tot_mediclaim_json[key][17];
            var ncd_percentage = tot_mediclaim_json[key][18];
            var ncd_amount = tot_mediclaim_json[key][19];
            var premium_after_ncd_amount = tot_mediclaim_json[key][20];
            var nominee_name = tot_mediclaim_json[key][21];
            var nominee_relation = tot_mediclaim_json[key][22];
            name_insured_age = parseInt(name_insured_age)+parseInt(1);
            // alert(name_insured_age);
            // alert(name_insured_policy_type);
            // if (name_insured_age > 61) {
            //     var name_insured_policy_type = "Sr. Citizen";
            // } else if (name_insured_age > 36) {
            //     var name_insured_policy_type = "Gold";
            // } else if (name_insured_age <= 36) {
            //     var name_insured_policy_type = "Platinum";
            // }
            // alert(name_insured_policy_type);
            // get_premiumBasedon_age_sumInsured_PolicyType(add_medi_counter);

            mediclaim_tr += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_'+add_medi_counter+'" onClick=removeMediclaim('+add_medi_counter+') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_medi_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_medi_counter+')"> <option value="null">Select Member Names</option>'+option_val_data+'</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_'+add_medi_counter+'" name="name_insured_dob[]" value="'+name_insured_dob+'" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_'+add_medi_counter+'" name="name_insured_age[]" value="'+name_insured_age+'" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_'+add_medi_counter+'" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_'+add_medi_counter+'" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>'+option_val_data+' </select></td>  <td><select style="width:120px;" id="nominee_relation_'+add_medi_counter+'" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td><select style="width:120px;" id="name_insured_policy_type_'+add_medi_counter+'" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="remove_sumInsured_basedon_policyType('+add_medi_counter+')">  <option value="null">Select Policy Type</option> <option value="Platinum">Platinum</option> <option value="Gold">Gold</option><option value="Sr. Citizen">Sr. Citizen</option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_'+add_medi_counter+'" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" disabled><option value="Individual">Individual</option> <option value="Floater">Floater</option> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_'+add_medi_counter+'" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="premium_basedon_Type('+add_medi_counter+')"><option value="null">Select Sum Insured</option> '+sum_insured_dropdown_val+'   </select></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_'+add_medi_counter+'" value="'+name_insured_premium+'" class="form-control name_insured_premium"></td><td width="8%"> <div class="row"><div class="col-md-12"><select style="width:90px;" id="dm_yes_no_'+add_medi_counter+'" name="dm_yes_no[]" class="form-control dm_yes_no" onchange="dm_yes_no('+add_medi_counter+')"> <option value="No">No</option><option value="Yes">Yes</option>   </select></div><div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="dm_percentage[]" id="dm_percentage_'+add_medi_counter+'" value="'+dm_percentage+'" class="form-control dm_percentage" onkeyup="dm_loading_Cal('+add_medi_counter+')"></div>  </div>  </td> <td width="8%"><input style="width:110px;" type="text" name="dm_loading[]" id="dm_loading_'+add_medi_counter+'" value="'+dm_loading+'" class="form-control dm_loading"></td><td width="8%"><div class="row"> <div class="col-md-12"><select style="width:90px;" id="htn_yes_no_'+add_medi_counter+'" name="htn_yes_no[]" class="form-control htn_yes_no" onchange="htn_yes_no('+add_medi_counter+')"><option value="No">No</option><option value="Yes">Yes</option> </select></div> <div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="htn_percentage[]" id="htn_percentage_'+add_medi_counter+'" value="'+htn_percentage+'" class="form-control htn_percentage" onkeyup="htn_loading_Cal('+add_medi_counter+')"></div>  </div> </td> <td><input style="width:110px;" type="text" name="htn_loading[]" id="htn_loading_'+add_medi_counter+'" value="'+htn_loading+'" class="form-control htn_loading"></td> <td><input style="width:110px;" type="text" name="premium_after_loading[]" id="premium_after_loading_'+add_medi_counter+'" value="'+premium_after_loading+'" class="form-control premium_after_loading"></td> <td width="9%"> <select style="width:90px;" id="ncd_percentage_'+add_medi_counter+'" name="ncd_percentage[]" class="form-control ncd_percentage" onchange="ncd_amount_Cal('+add_medi_counter+')"> <option value="5">5%</option> <option value="10">10%</option><option value="15">15%</option> <option value="20">20%</option><option value="25">25%</option> </select>  </td><td><input style="width:110px;" type="text" name="ncd_amount[]" id="ncd_amount_'+add_medi_counter+'" value="'+ncd_amount+'" class="form-control ncd_amount"></td><td><input style="width:110px;" type="text" name="premium_after_ncd_amount[]" id="premium_after_ncd_amount_'+add_medi_counter+'" value="'+premium_after_ncd_amount+'" class="form-control premium_after_ncd_amount"></td></tr>';

        });
        // alert(mediclaim_tr);
        $("#Add_Mediclaim").attr("onClick", "AddMediclaim(" + (mediclaim_length) + ")");
        $("#first_table_tbody").append(mediclaim_tr);

        $.each(tot_mediclaim_json, function(key, val) {
            add_medi_counter = key;
            main_Mediclaim.push(add_medi_counter);
            index = tot_mediclaim_json[key][0];
            var name_insured_member_name = tot_mediclaim_json[key][1];
            var name_insured_relation = tot_mediclaim_json[key][5];
            var name_insured_policy_type = tot_mediclaim_json[key][7];
            var name_insured_policy_option = tot_mediclaim_json[key][8];
            var name_insured_sum_insured = tot_mediclaim_json[key][9];
            var dm_yes_no = tot_mediclaim_json[key][11];
            var htn_yes_no = tot_mediclaim_json[key][14];
            var ncd_percentage = tot_mediclaim_json[key][18];
            var nominee_name = tot_mediclaim_json[key][21];
            var nominee_relation = tot_mediclaim_json[key][22];
            var name_insured_age = tot_mediclaim_json[key][4];
            name_insured_age = parseInt(name_insured_age)+parseInt(1);
            // alert(name_insured_age);
            // alert(name_insured_policy_type);
            if(name_insured_policy_type == "Gold"){
                var name_insured_policy_type = tot_mediclaim_json[key][7];
            }else{
            if (name_insured_age <= 60) {
                var name_insured_policy_type = "Platinum";
            }else{
                var name_insured_policy_type = "Gold";
            } 
        }
            // alert(name_insured_policy_type);
            if (dm_yes_no == "Yes") {
                $("#dm_percentage_"+add_medi_counter).show();
            } else if (dm_yes_no == "No") {
                $("#dm_percentage_"+add_medi_counter).hide();
                $("#dm_percentage_"+add_medi_counter).val(0);
            }

            if (htn_yes_no == "Yes") {
                $("#htn_percentage_"+add_medi_counter).show();
            } else if (htn_yes_no == "No") {
                $("#htn_percentage_"+add_medi_counter).hide();
                $("#htn_percentage_"+add_medi_counter).val(0);
            }

            $("#name_insured_member_name_"+add_medi_counter).val(name_insured_member_name);
            $("#name_insured_relation_"+add_medi_counter).val(name_insured_relation);
            $("#name_insured_policy_type_"+add_medi_counter).val(name_insured_policy_type);
            $("#name_insured_policy_option_"+add_medi_counter).val(name_insured_policy_option);
            $("#name_insured_sum_insured_"+add_medi_counter).val(name_insured_sum_insured);
            $("#dm_yes_no_"+add_medi_counter).val(dm_yes_no);
            $("#htn_yes_no_"+add_medi_counter).val(htn_yes_no);
            $("#ncd_percentage_"+add_medi_counter).val(ncd_percentage);
            $("#nominee_name_"+add_medi_counter).val(nominee_name);
            $("#nominee_relation_"+add_medi_counter).val(nominee_relation);
            // alert(name_insured_age);
            // alert(name_insured_policy_type);
            name_insured_age = parseInt(name_insured_age)+parseInt(1);
          
            get_premiumBasedon_age_sumInsured_PolicyType(add_medi_counter);
            
        });
    }

    function edit_marine_policy(marine_policy_data_arr) {
        var total_marine_cc_json_data = "";
        $("#append_marine_cc").empty();
        $.each(marine_policy_data_arr, function(key_other, val_other) {
            var marine_policy_id = marine_policy_data_arr.marine_policy_id;
            var marine_fk_policy_id = marine_policy_data_arr.marine_fk_policy_id;
            var fk_policy_type_id = marine_policy_data_arr.fk_policy_type_id;

            var policy_name_txt = marine_policy_data_arr.policy_name_txt;
            var from_destination = marine_policy_data_arr.from_destination;
            var to_destination = marine_policy_data_arr.to_destination;
            var coverage_type = marine_policy_data_arr.coverage_type;
            var marine_description = marine_policy_data_arr.marine_description;
            var interest_insured = marine_policy_data_arr.interest_insured;
            var period_of_insurance = marine_policy_data_arr.period_of_insurance;
            var group_name_address = marine_policy_data_arr.group_name_address;
            var marine_sum_insured = marine_policy_data_arr.marine_sum_insured;
            var packing_stand_customary = marine_policy_data_arr.packing_stand_customary;
            total_marine_cc_json_data = JSON.parse(marine_policy_data_arr.total_marine_cc_json);
            var business_description = marine_policy_data_arr.business_description;
            $("#from_destination").val(from_destination);
            $("#to_destination").val(to_destination);
            $("#coverage_type").val(coverage_type);
            $("#marine_description").val(marine_description);
            $("#interest_insured").val(interest_insured);
            $("#marine_sum_insured").val(marine_sum_insured);
            $("#packing_stand_customary").val(packing_stand_customary);
            $("#group_name_address").val(group_name_address);
            $("#business_description").val(business_description);

            var voyage_domestic_purchase = marine_policy_data_arr.voyage_domestic_purchase;
            var voyage_international_purchase = marine_policy_data_arr.voyage_international_purchase;
            var voyage_domestic_sales = marine_policy_data_arr.voyage_domestic_sales;
            var voyage_export_sales = marine_policy_data_arr.voyage_export_sales;
            var voyage_job_worker = marine_policy_data_arr.voyage_job_worker;
            var voyage_domestic_fini_good = marine_policy_data_arr.voyage_domestic_fini_good;
            var voyage_export_fini_good = marine_policy_data_arr.voyage_export_fini_good;
            var voyage_domestic_purch_return = marine_policy_data_arr.voyage_domestic_purch_return;

            $("#voyage_domestic_purchase").val(voyage_domestic_purchase);
            $("#voyage_international_purchase").val(voyage_international_purchase);
            $("#voyage_domestic_sales").val(voyage_domestic_sales);
            $("#voyage_export_sales").val(voyage_export_sales);
            $("#voyage_job_worker").val(voyage_job_worker);
            $("#voyage_domestic_fini_good").val(voyage_domestic_fini_good);
            $("#voyage_export_fini_good").val(voyage_export_fini_good);
            $("#voyage_domestic_purch_return").val(voyage_domestic_purch_return);

            var voyage_export_purch_return = marine_policy_data_arr.voyage_export_purch_return;
            var voyage_sales_return = marine_policy_data_arr.voyage_sales_return;
            var domestic_purch = marine_policy_data_arr.domestic_purch;
            var international_purch = marine_policy_data_arr.international_purch;
            var domestic_sale = marine_policy_data_arr.domestic_sale;
            var export_sale = marine_policy_data_arr.export_sale;
            var per_bottom_limit = marine_policy_data_arr.per_bottom_limit;
            var per_location_limit = marine_policy_data_arr.per_location_limit;

            $("#voyage_export_purch_return").val(voyage_export_purch_return);
            $("#voyage_sales_return").val(voyage_sales_return);
            $("#domestic_purch").val(domestic_purch);
            $("#international_purch").val(international_purch);
            $("#domestic_sale").val(domestic_sale);
            $("#export_sale").val(export_sale);
            $("#per_bottom_limit").val(per_bottom_limit);
            $("#per_location_limit").val(per_location_limit);

            var per_claim_excess = marine_policy_data_arr.per_claim_excess;
            var declaration_sale_fig = marine_policy_data_arr.declaration_sale_fig;
            var annual_turn_over = marine_policy_data_arr.annual_turn_over;
            var tot_sum_insured = marine_policy_data_arr.tot_sum_insured;
            var rate_applied = marine_policy_data_arr.rate_applied;
            var rate_applied_per = marine_policy_data_arr.rate_applied_per;
            var rate_applied_hidden = marine_policy_data_arr.rate_applied_hidden;
            var marine_cgst_per = marine_policy_data_arr.marine_cgst_per;
            var marine_sgst_per = marine_policy_data_arr.marine_sgst_per;
            var cgst_rate_tot = marine_policy_data_arr.cgst_rate_tot;
            var sgst_rate_tot = marine_policy_data_arr.sgst_rate_tot;
            var marine_final_payble_premium = marine_policy_data_arr.marine_final_payble_premium;

            $("#per_claim_excess").val(per_claim_excess);
            $("#declaration_sale_fig").val(declaration_sale_fig);
            $("#annual_turn_over").val(annual_turn_over);
            $("#tot_sum_insured").val(tot_sum_insured);
            $("#rate_applied").val(rate_applied);
            $("#rate_applied_per").val(rate_applied_per);
            $("#rate_applied_hidden").val(rate_applied_hidden);
            $("#cgst_fire_per").val(marine_cgst_per);
            $("#sgst_fire_per").val(marine_sgst_per);
            $("#cgst_rate_tot").val(cgst_rate_tot);
            $("#sgst_rate_tot").val(sgst_rate_tot);
            $("#marine_final_payble_premium").val(marine_final_payble_premium);
            $("#marine_policy_id").val(marine_policy_id);

            var marine_policy_status = marine_policy_data_arr.marine_policy_status;
            var marine_del_flag = marine_policy_data_arr.marine_del_flag;
        });
        var marine_cc_tr = "";
        var add_marine_cc = "";
        var index = "";
        var marine_cc_length = total_marine_cc_json_data.length;
        if (marine_cc_length > 0) {
            document.getElementById("addMarine_conveyance_coverage").disabled = true;
        } else {
            document.getElementById("addMarine_conveyance_coverage").disabled = false;
        }
        // alert(marine_cc_length);
        // alert(total_marine_cc_json_data);
        $.each(total_marine_cc_json_data, function(key, val) {
            add_marine_cc = key;
            main_Marine.push(add_marine_cc);
            index = total_marine_cc_json_data[key][0];
            // alert(index);
            var marine_cc_name = total_marine_cc_json_data[key][1];

            marine_cc_tr += '<tr><td><input type="text" class="form-control marine_cc" id="marine_cc_' + index + '" name="marine_cc[]" value="' + marine_cc_name + '"></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_marine_cc_' + index + '" onClick=removeMarine_cc("' + index + '") ></td></tr>';
        });
        // alert(marine_cc_tr);
        $("#addsingle_marine_"+index).attr("onClick", "addsingle_Marine('" + (marine_cc_length) + "')");
        $("#append_marine_cc").append(marine_cc_tr);
        var plus_btn = '<button class="btn btn-primary btn-sm dripicons-plus  mt-2" id="addsingle_marine_' + index + '" onClick=addsingle_Marine("' + index + '") >';
        $("#plus_btn").append(plus_btn);
    }

    function edit_jweller_block(jweller_policy_data_arr) {
        var total_fidelity_guar_cover_json = "";
        $("#append_fidelity_guar_cover").empty();
        $.each(jweller_policy_data_arr, function(key_other, val_other) {
            var jweller_policy_id = jweller_policy_data_arr.jweller_policy_id;
            var jweller_fk_policy_id = jweller_policy_data_arr.jweller_fk_policy_id;
            var fk_policy_type_id = jweller_policy_data_arr.fk_policy_type_id;

            //Section 1
            var stock_premises_sum_insu_1 = jweller_policy_data_arr.stock_premises_sum_insu_1;
            var stock_premises_sum_insu_2 = jweller_policy_data_arr.stock_premises_sum_insu_2;
            var stock_premises_sum_insu_3 = jweller_policy_data_arr.stock_premises_sum_insu_3;
            var stock_premises_sum_insu_4 = jweller_policy_data_arr.stock_premises_sum_insu_4;
            var stock_premises_sum_insu_5 = jweller_policy_data_arr.stock_premises_sum_insu_5;
            var stock_premises_sum_insu_6 = jweller_policy_data_arr.stock_premises_sum_insu_6;
            var stock_premises_premium_1 = jweller_policy_data_arr.stock_premises_premium_1;
            var stock_premises_premium_2 = jweller_policy_data_arr.stock_premises_premium_2;

            $("#stock_premises_sum_insu_1").val(stock_premises_sum_insu_1);
            $("#stock_premises_sum_insu_2").val(stock_premises_sum_insu_2);
            $("#stock_premises_sum_insu_3").val(stock_premises_sum_insu_3);
            $("#stock_premises_sum_insu_4").val(stock_premises_sum_insu_4);
            $("#stock_premises_sum_insu_5").val(stock_premises_sum_insu_5);
            $("#stock_premises_sum_insu_6").val(stock_premises_sum_insu_6);
            $("#stock_premises_premium_1").val(stock_premises_premium_1);
            $("#stock_premises_premium_2").val(stock_premises_premium_2);

            //Section 2
            var stock_custody_sum_insu_1 = jweller_policy_data_arr.stock_custody_sum_insu_1;
            var stock_custody_sum_insu_2 = jweller_policy_data_arr.stock_custody_sum_insu_2;
            var stock_custody_sum_insu_3 = jweller_policy_data_arr.stock_custody_sum_insu_3;
            var stock_custody_sum_insu_4 = jweller_policy_data_arr.stock_custody_sum_insu_4;
            var stock_custody_premium_1 = jweller_policy_data_arr.stock_custody_premium_1;
            var stock_custody_premium_2 = jweller_policy_data_arr.stock_custody_premium_2;

            $("#stock_custody_sum_insu_1").val(stock_custody_sum_insu_1);
            $("#stock_custody_sum_insu_2").val(stock_custody_sum_insu_2);
            $("#stock_custody_sum_insu_3").val(stock_custody_sum_insu_3);
            $("#stock_custody_sum_insu_4").val(stock_custody_sum_insu_4);
            $("#stock_custody_premium_1").val(stock_custody_premium_1);
            $("#stock_custody_premium_2").val(stock_custody_premium_2);

            //Section 3
            var stock_transit_sum_insu_1 = jweller_policy_data_arr.stock_transit_sum_insu_1;
            var stock_transit_sum_insu_2 = jweller_policy_data_arr.stock_transit_sum_insu_2;
            var stock_transit_sum_insu_3 = jweller_policy_data_arr.stock_transit_sum_insu_3;
            var stock_transit_sum_insu_4 = jweller_policy_data_arr.stock_transit_sum_insu_4;
            var stock_transit_premium = jweller_policy_data_arr.stock_transit_premium;

            $("#stock_transit_sum_insu_1").val(stock_transit_sum_insu_1);
            $("#stock_transit_sum_insu_2").val(stock_transit_sum_insu_2);
            $("#stock_transit_sum_insu_3").val(stock_transit_sum_insu_3);
            $("#stock_transit_sum_insu_4").val(stock_transit_sum_insu_4);
            $("#stock_transit_premium").val(stock_transit_premium);

            //Section 4A
            var standard_fire_perils_1 = jweller_policy_data_arr.standard_fire_perils_1;
            var standard_fire_perils_2 = jweller_policy_data_arr.standard_fire_perils_2;
            var standard_fire_perils_3 = jweller_policy_data_arr.standard_fire_perils_3;
            var standard_fire_perils_4 = jweller_policy_data_arr.standard_fire_perils_4;
            var standard_fire_perils_5 = jweller_policy_data_arr.standard_fire_perils_5;
            var standard_fire_perils_6 = jweller_policy_data_arr.standard_fire_perils_6;
            var standard_fire_perils_premium_1 = jweller_policy_data_arr.standard_fire_perils_premium_1;
            var standard_fire_perils_premium_2 = jweller_policy_data_arr.standard_fire_perils_premium_2;
            var standard_fire_perils_premium_3 = jweller_policy_data_arr.standard_fire_perils_premium_3;

            $("#standard_fire_perils_1").val(standard_fire_perils_1);
            $("#standard_fire_perils_2").val(standard_fire_perils_2);
            $("#standard_fire_perils_3").val(standard_fire_perils_3);
            $("#standard_fire_perils_4").val(standard_fire_perils_4);
            $("#standard_fire_perils_5").val(standard_fire_perils_5);
            $("#standard_fire_perils_6").val(standard_fire_perils_6);
            $("#standard_fire_perils_premium_1").val(standard_fire_perils_premium_1);
            $("#standard_fire_perils_premium_2").val(standard_fire_perils_premium_2);
            $("#standard_fire_perils_premium_3").val(standard_fire_perils_premium_3);

            //Section 4B
            var content_burglary_sum_insu = jweller_policy_data_arr.content_burglary_sum_insu;
            var content_burglary_premium = jweller_policy_data_arr.content_burglary_premium;

            $("#content_burglary_sum_insu").val(content_burglary_sum_insu);
            $("#content_burglary_premium").val(content_burglary_premium);

            //Section 5
            var stock_exhibition_sum_insu = jweller_policy_data_arr.stock_exhibition_sum_insu;
            var stock_exhibition_premium = jweller_policy_data_arr.stock_exhibition_premium;

            $("#stock_exhibition_sum_insu").val(stock_exhibition_sum_insu);
            $("#stock_exhibition_premium").val(stock_exhibition_premium);

            //Section 6
            var fidelity_guar_cover_sum_insu_1 = jweller_policy_data_arr.fidelity_guar_cover_sum_insu_1;
            var fidelity_guar_cover_sum_insu_2 = jweller_policy_data_arr.fidelity_guar_cover_sum_insu_2;
            var fidelity_guar_cover_premium_1 = jweller_policy_data_arr.fidelity_guar_cover_premium_1;
            var fidelity_guar_cover_premium_2 = jweller_policy_data_arr.fidelity_guar_cover_premium_2;
            total_fidelity_guar_cover_json = JSON.parse(jweller_policy_data_arr.total_fidelity_guar_cover_json);

            $("#fidelity_guar_cover_sum_insu_1").val(fidelity_guar_cover_sum_insu_1);
            $("#fidelity_guar_cover_sum_insu_2").val(fidelity_guar_cover_sum_insu_2);
            $("#fidelity_guar_cover_premium_1").val(fidelity_guar_cover_premium_1);
            $("#fidelity_guar_cover_premium_2").val(fidelity_guar_cover_premium_2);

            //Section 7
            var plate_glass_sum_insu = jweller_policy_data_arr.plate_glass_sum_insu;
            var plate_glass_premium = jweller_policy_data_arr.plate_glass_premium;

            $("#plate_glass_sum_insu").val(plate_glass_sum_insu);
            $("#plate_glass_premium").val(plate_glass_premium);

            //Section 8
            var neon_sign_sum_insu = jweller_policy_data_arr.neon_sign_sum_insu;
            var neon_sign_premium = jweller_policy_data_arr.neon_sign_premium;

            $("#neon_sign_sum_insu").val(neon_sign_sum_insu);
            $("#neon_sign_premium").val(neon_sign_premium);

            //Section 9
            var portable_equipmets_sum_insu = jweller_policy_data_arr.portable_equipmets_sum_insu;
            var portable_equipmets_premium = jweller_policy_data_arr.portable_equipmets_premium;

            $("#portable_equipmets_sum_insu").val(portable_equipmets_sum_insu);
            $("#portable_equipmets_premium").val(portable_equipmets_premium);

            //Section 10
            var employee_compensation_sum_insu_1 = jweller_policy_data_arr.employee_compensation_sum_insu_1;
            var employee_compensation_sum_insu_2 = jweller_policy_data_arr.employee_compensation_sum_insu_2;
            var employee_compensation_premium = jweller_policy_data_arr.employee_compensation_premium;

            $("#employee_compensation_sum_insu_1").val(employee_compensation_sum_insu_1);
            $("#employee_compensation_sum_insu_2").val(employee_compensation_sum_insu_2);
            $("#employee_compensation_premium").val(employee_compensation_premium);

            //Section 11
            var electronic_equipment_sum_insu = jweller_policy_data_arr.electronic_equipment_sum_insu;
            var electronic_equipment_premium = jweller_policy_data_arr.electronic_equipment_premium;

            $("#electronic_equipment_sum_insu").val(electronic_equipment_sum_insu);
            $("#electronic_equipment_premium").val(electronic_equipment_premium);

            //Section 12
            var public_liability_sum_insu = jweller_policy_data_arr.public_liability_sum_insu;
            var public_liability_premium = jweller_policy_data_arr.public_liability_premium;

            $("#public_liability_sum_insu").val(public_liability_sum_insu);
            $("#public_liability_premium").val(public_liability_premium);

            //Section 13
            var money_transit_sum_insu = jweller_policy_data_arr.money_transit_sum_insu;
            var money_transit_premium = jweller_policy_data_arr.money_transit_premium;

            $("#money_transit_sum_insu").val(money_transit_sum_insu);
            $("#money_transit_premium").val(money_transit_premium);

            //Section 14
            var machinery_breakdown_sum_insu = jweller_policy_data_arr.machinery_breakdown_sum_insu;
            var machinery_breakdown_premium = jweller_policy_data_arr.machinery_breakdown_premium;

            $("#machinery_breakdown_sum_insu").val(machinery_breakdown_sum_insu);
            $("#machinery_breakdown_premium").val(machinery_breakdown_premium);

            //Calculation
            var jweller_less_discount = jweller_policy_data_arr.jweller_less_discount;
            var jweller_total_sum_assured = jweller_policy_data_arr.jweller_total_sum_assured;
            var jweller_less_discount_tot = jweller_policy_data_arr.jweller_less_discount_tot;
            var jweller_after_discount_tot = jweller_policy_data_arr.jweller_after_discount_tot;
            var jweller_terrorism_per = jweller_policy_data_arr.jweller_terrorism_per;
            var jweller_terrorism_per_tot = jweller_policy_data_arr.jweller_terrorism_per_tot;
            var jweller_tot_net_premium = jweller_policy_data_arr.jweller_tot_net_premium;
            var jweller_cgst_per = jweller_policy_data_arr.jweller_cgst_per;
            var jweller_sgst_per = jweller_policy_data_arr.jweller_sgst_per;
            var jweller_cgst_per_tot = jweller_policy_data_arr.jweller_cgst_per_tot;
            var jweller_sgst_per_tot = jweller_policy_data_arr.jweller_sgst_per_tot;
            var jweller_final_payble = jweller_policy_data_arr.jweller_final_payble;

            // alert(other_final_payable_premium);
            $("#jweller_less_discount").val(jweller_less_discount);
            $("#jweller_total_sum_assured").val(jweller_total_sum_assured);
            $("#jweller_less_discount_tot").val(jweller_less_discount_tot);
            $("#jweller_after_discount_tot").val(jweller_after_discount_tot);
            $("#jweller_terrorism_per").val(jweller_terrorism_per);
            $("#jweller_terrorism_per_tot").val(jweller_terrorism_per_tot);
            $("#jweller_tot_net_premium").val(jweller_tot_net_premium);
            $("#cgst_fire_per").val(jweller_cgst_per);
            $("#sgst_fire_per").val(jweller_sgst_per);
            $("#jweller_cgst_per_tot").val(jweller_cgst_per_tot);
            $("#jweller_sgst_per_tot").val(jweller_sgst_per_tot);
            $("#jweller_final_payble").val(jweller_final_payble);
            $("#jweller_policy_id").val(jweller_policy_id);
        });
        var fidelity_guar_cover_length = total_fidelity_guar_cover_json.length;
        var fidelity_guar_cover_tr = "";
        var add_fidelity_gaur = "";
        // alert(personal_accident_length);
        $.each(total_fidelity_guar_cover_json, function(key, val) {
            add_fidelity_gaur = key;
            var index = total_fidelity_guar_cover_json[key][0];
            var fidelity_guar_cover_name = total_fidelity_guar_cover_json[key][1];
            var fidelity_guar_cover_dob = total_fidelity_guar_cover_json[key][2];
            var fidelity_guar_cover_designation = total_fidelity_guar_cover_json[key][3];
            var fidelity_guar_cover_single_sum = total_fidelity_guar_cover_json[key][4];
            fidelity_guar_cover_tr += '<tr><td><input type="text" name="fidelity_guar_cover_name[]" id="fidelity_guar_cover_name_' + add_fidelity_gaur + '" value="' + fidelity_guar_cover_name + '" class="form-control fidelity_guar_cover_name"></td><td><input type="date" name="fidelity_guar_cover_dob[]" id="fidelity_guar_cover_dob_' + add_fidelity_gaur + '" value="' + fidelity_guar_cover_dob + '" class="form-control fidelity_guar_cover_dob"></td><td><input type="text" name="fidelity_guar_cover_designation[]" id="fidelity_guar_cover_designation_' + add_fidelity_gaur + '" value="' + fidelity_guar_cover_designation + '" class="form-control fidelity_guar_cover_designation"></td><td><input type="number" name="fidelity_guar_cover_single_sum[]" id="fidelity_guar_cover_single_sum_' + add_fidelity_gaur + '" value="' + fidelity_guar_cover_single_sum + '" class="form-control fidelity_guar_cover_single_sum" onkeyup="section_fidelity_guar_cover_sum()"></td><td><button class="btn btn-facebook btn-sm dripicons-cross" id="remove_fidelity_guar_cover_' + add_fidelity_gaur + '" onClick="remove_Fidelity_Guarantee_Cover(' + add_fidelity_gaur + ')" ></td> </tr>';
        });
        $("#append_fidelity_guar_cover").append(fidelity_guar_cover_tr);

        $("#add_fidelity_guar_cover").attr("onClick", "add_Fidelity_Guarantee_Cover(" + (fidelity_guar_cover_length - 1) + ")");
    }

    function edit_shopkeeper(shopkeeper_policy_data_arr) {
        var personal_accident_json = "";
        var fidelity_gaur_json = "";
        $("#append_personal_acc").empty();
        $("#append_fidelity_gaur").empty();
        $.each(shopkeeper_policy_data_arr, function(key_shop, val_shop) {
            var shopkeeper_policy_id = shopkeeper_policy_data_arr.shopkeeper_policy_id;
            var shopkeeper_fk_policy_id = shopkeeper_policy_data_arr.shopkeeper_fk_policy_id;
            var fk_policy_type_id = shopkeeper_policy_data_arr.fk_policy_type_id;
            // Section 1
            var shopkeeper_risk_address = shopkeeper_policy_data_arr.shopkeeper_risk_address;
            var fire_sum_insured_1 = shopkeeper_policy_data_arr.fire_sum_insured_1;
            var fire_sum_insured_2 = shopkeeper_policy_data_arr.fire_sum_insured_2;
            var fire_sum_insured_3 = shopkeeper_policy_data_arr.fire_sum_insured_3;
            var fire_rate_1 = shopkeeper_policy_data_arr.fire_rate_1;
            var fire_rate_2 = shopkeeper_policy_data_arr.fire_rate_2;
            var fire_rate_3 = shopkeeper_policy_data_arr.fire_rate_3;
            var fire_premium_1 = shopkeeper_policy_data_arr.fire_premium_1;
            var fire_premium_2 = shopkeeper_policy_data_arr.fire_premium_2;
            var fire_premium_3 = shopkeeper_policy_data_arr.fire_premium_3;

            $("#shopkeeper_risk_address").val(shopkeeper_risk_address);
            $("#fire_sum_insured_1").val(fire_sum_insured_1);
            $("#fire_sum_insured_2").val(fire_sum_insured_2);
            $("#fire_sum_insured_3").val(fire_sum_insured_3);
            $("#fire_rate_1").val(fire_rate_1);
            $("#fire_rate_2").val(fire_rate_2);
            $("#fire_rate_3").val(fire_rate_3);
            $("#fire_premium_1").val(fire_premium_1);
            $("#fire_premium_2").val(fire_premium_2);
            $("#fire_premium_3").val(fire_premium_3);

            // Section 2
            var burglary_sum_insured_1 = shopkeeper_policy_data_arr.burglary_sum_insured_1;
            var burglary_sum_insured_2 = shopkeeper_policy_data_arr.burglary_sum_insured_2;
            var burglary_sum_insured_3 = shopkeeper_policy_data_arr.burglary_sum_insured_3;
            var burglary_rate_1 = shopkeeper_policy_data_arr.burglary_rate_1;
            var burglary_rate_2 = shopkeeper_policy_data_arr.burglary_rate_2;
            var burglary_rate_3 = shopkeeper_policy_data_arr.burglary_rate_3;
            var burglary_premium_1 = shopkeeper_policy_data_arr.burglary_premium_1;
            var burglary_premium_2 = shopkeeper_policy_data_arr.burglary_premium_2;
            var burglary_premium_3 = shopkeeper_policy_data_arr.burglary_premium_3;

            $("#burglary_sum_insured_1").val(burglary_sum_insured_1);
            $("#burglary_sum_insured_2").val(burglary_sum_insured_2);
            $("#burglary_sum_insured_3").val(burglary_sum_insured_3);
            $("#burglary_rate_1").val(burglary_rate_1);
            $("#burglary_rate_2").val(burglary_rate_2);
            $("#burglary_rate_3").val(burglary_rate_3);
            $("#burglary_premium_1").val(burglary_premium_1);
            $("#burglary_premium_2").val(burglary_premium_2);
            $("#burglary_premium_3").val(burglary_premium_3);

            // Section 3
            var money_insu_sum_insured_1 = shopkeeper_policy_data_arr.money_insu_sum_insured_1;
            var money_insu_sum_insured_2 = shopkeeper_policy_data_arr.money_insu_sum_insured_2;
            var money_insu_sum_insured_3 = shopkeeper_policy_data_arr.money_insu_sum_insured_3;
            var money_insu_rate_1 = shopkeeper_policy_data_arr.money_insu_rate_1;
            var money_insu_rate_2 = shopkeeper_policy_data_arr.money_insu_rate_2;
            var money_insu_rate_3 = shopkeeper_policy_data_arr.money_insu_rate_3;
            var money_insu_premium_1 = shopkeeper_policy_data_arr.money_insu_premium_1;
            var money_insu_premium_2 = shopkeeper_policy_data_arr.money_insu_premium_2;
            var money_insu_premium_3 = shopkeeper_policy_data_arr.money_insu_premium_3;

            $("#money_insu_sum_insured_1").val(money_insu_sum_insured_1);
            $("#money_insu_sum_insured_2").val(money_insu_sum_insured_2);
            $("#money_insu_sum_insured_3").val(money_insu_sum_insured_3);
            $("#money_insu_rate_1").val(money_insu_rate_1);
            $("#money_insu_rate_2").val(money_insu_rate_2);
            $("#money_insu_rate_3").val(money_insu_rate_3);
            $("#money_insu_premium_1").val(money_insu_premium_1);
            $("#money_insu_premium_2").val(money_insu_premium_2);
            $("#money_insu_premium_3").val(money_insu_premium_3);

            // Section 5
            var plate_glass_sum_insured = shopkeeper_policy_data_arr.plate_glass_sum_insured;
            var plate_glass_rate_per = shopkeeper_policy_data_arr.plate_glass_rate_per;
            var plate_glass_premium = shopkeeper_policy_data_arr.plate_glass_premium;

            $("#plate_glass_sum_insured").val(plate_glass_sum_insured);
            $("#plate_glass_rate_per").val(plate_glass_rate_per);
            $("#plate_glass_premium").val(plate_glass_premium);
            // Section 6
            var neon_glow_sum_insured = shopkeeper_policy_data_arr.neon_glow_sum_insured;
            var neon_glow_rate_per = shopkeeper_policy_data_arr.neon_glow_rate_per;
            var neon_glow_premium = shopkeeper_policy_data_arr.neon_glow_premium;

            $("#neon_glow_sum_insured").val(neon_glow_sum_insured);
            $("#neon_glow_rate_per").val(neon_glow_rate_per);
            $("#neon_glow_premium").val(neon_glow_premium);
            // Section 7
            var baggage_ins_sum_insured = shopkeeper_policy_data_arr.baggage_ins_sum_insured;
            var baggage_ins_rate_per = shopkeeper_policy_data_arr.baggage_ins_rate_per;
            var baggage_ins_premium = shopkeeper_policy_data_arr.baggage_ins_premium;

            $("#baggage_ins_sum_insured").val(baggage_ins_sum_insured);
            $("#baggage_ins_rate_per").val(baggage_ins_rate_per);
            $("#baggage_ins_premium").val(baggage_ins_premium);
            // Section 8
            personal_accident_json = JSON.parse(shopkeeper_policy_data_arr.personal_accident_json);
            var personal_accident_sum_insured = shopkeeper_policy_data_arr.personal_accident_sum_insured;
            var personal_accident_rate_per = shopkeeper_policy_data_arr.personal_accident_rate_per;
            var personal_accident_premium = shopkeeper_policy_data_arr.personal_accident_premium;

            $("#personal_accident_sum_insured").val(personal_accident_sum_insured);
            $("#personal_accident_rate_per").val(personal_accident_rate_per);
            $("#personal_accident_premium").val(personal_accident_premium);
            // Section 9
            fidelity_gaur_json = JSON.parse(shopkeeper_policy_data_arr.fidelity_gaur_json);
            var fidelity_gaur_sum_insured = shopkeeper_policy_data_arr.fidelity_gaur_sum_insured;
            var fidelity_gaur_rate_per = shopkeeper_policy_data_arr.fidelity_gaur_rate_per;
            var fidelity_gaur_premium = shopkeeper_policy_data_arr.fidelity_gaur_premium;

            $("#fidelity_gaur_sum_insured").val(fidelity_gaur_sum_insured);
            $("#fidelity_gaur_rate_per").val(fidelity_gaur_rate_per);
            $("#fidelity_gaur_premium").val(fidelity_gaur_premium);
            // Section 10
            var pub_libility_sum_insured = shopkeeper_policy_data_arr.pub_libility_sum_insured;
            var work_men_compens_sum_insured = shopkeeper_policy_data_arr.work_men_compens_sum_insured;
            var pub_libility_rate = shopkeeper_policy_data_arr.pub_libility_rate;
            var work_men_compens_rate = shopkeeper_policy_data_arr.work_men_compens_rate;
            var pub_libility_premium = shopkeeper_policy_data_arr.pub_libility_premium;
            var work_men_compens_premium = shopkeeper_policy_data_arr.work_men_compens_premium;

            $("#pub_libility_sum_insured").val(pub_libility_sum_insured);
            $("#work_men_compens_sum_insured").val(work_men_compens_sum_insured);
            $("#pub_libility_rate").val(pub_libility_rate);
            $("#work_men_compens_rate").val(work_men_compens_rate);
            $("#pub_libility_premium").val(pub_libility_premium);
            $("#work_men_compens_premium").val(work_men_compens_premium);

            // Section 11
            var bus_inter_sum_insured_1 = shopkeeper_policy_data_arr.bus_inter_sum_insured_1;
            var bus_inter_sum_insured_2 = shopkeeper_policy_data_arr.bus_inter_sum_insured_2;
            var bus_inter_sum_insured_3 = shopkeeper_policy_data_arr.bus_inter_sum_insured_3;
            var bus_inter_rate_1 = shopkeeper_policy_data_arr.bus_inter_rate_1;
            var bus_inter_rate_2 = shopkeeper_policy_data_arr.bus_inter_rate_2;
            var bus_inter_rate_3 = shopkeeper_policy_data_arr.bus_inter_rate_3;
            var bus_inter_premium_1 = shopkeeper_policy_data_arr.bus_inter_premium_1;
            var bus_inter_premium_2 = shopkeeper_policy_data_arr.bus_inter_premium_2;
            var bus_inter_premium_3 = shopkeeper_policy_data_arr.bus_inter_premium_3;

            $("#bus_inter_sum_insured_1").val(bus_inter_sum_insured_1);
            $("#bus_inter_sum_insured_2").val(bus_inter_sum_insured_2);
            $("#bus_inter_sum_insured_3").val(bus_inter_sum_insured_3);
            $("#bus_inter_rate_1").val(bus_inter_rate_1);
            $("#bus_inter_rate_2").val(bus_inter_rate_2);
            $("#bus_inter_rate_3").val(bus_inter_rate_3);
            $("#bus_inter_premium_1").val(bus_inter_premium_1);
            $("#bus_inter_premium_2").val(bus_inter_premium_2);
            $("#bus_inter_premium_3").val(bus_inter_premium_3);

            var shopkeeper_total_sum_assured = shopkeeper_policy_data_arr.shopkeeper_total_sum_assured;
            var shopkeeper_total_premium = shopkeeper_policy_data_arr.shopkeeper_total_premium;
            var shopkeeper_less_discount_per = shopkeeper_policy_data_arr.shopkeeper_less_discount_per;
            var shopkeeper_less_discount_tot = shopkeeper_policy_data_arr.shopkeeper_less_discount_tot;
            var shopkeeper_fire_rate_after_discount_tot = shopkeeper_policy_data_arr.shopkeeper_fire_rate_after_discount_tot;
            var shopkeeper_cgst_fire_per = shopkeeper_policy_data_arr.shopkeeper_cgst_fire_per;
            var shopkeeper_cgst_fire_tot = shopkeeper_policy_data_arr.shopkeeper_cgst_fire_tot;
            var shopkeeper_sgst_fire_per = shopkeeper_policy_data_arr.shopkeeper_sgst_fire_per;
            var shopkeeper_sgst_fire_tot = shopkeeper_policy_data_arr.shopkeeper_sgst_fire_tot;
            var shopkeeper_final_paybal_premium = shopkeeper_policy_data_arr.shopkeeper_final_paybal_premium;
            var shopkeeper_policy_status = shopkeeper_policy_data_arr.shopkeeper_policy_status;
            var shopkeeper_policy_del_flag = shopkeeper_policy_data_arr.shopkeeper_policy_del_flag;

            // alert(term_plan_final_paybal_premium);
            $("#shopkeeper_total_sum_assured").val(shopkeeper_total_sum_assured);
            $("#shopkeeper_total_premium").val(shopkeeper_total_premium);
            $("#shopkeeper_less_discount_per").val(shopkeeper_less_discount_per);
            $("#shopkeeper_less_discount_tot").val(shopkeeper_less_discount_tot);
            $("#shopkeeper_fire_rate_after_discount_tot").val(shopkeeper_fire_rate_after_discount_tot);
            $("#shopkeeper_cgst_fire_per").val(shopkeeper_cgst_fire_per);
            $("#shopkeeper_cgst_fire_tot").val(shopkeeper_cgst_fire_tot);
            $("#shopkeeper_sgst_fire_per").val(shopkeeper_sgst_fire_per);
            $("#shopkeeper_sgst_fire_tot").val(shopkeeper_sgst_fire_tot);
            $("#shopkeeper_final_paybal_premium").val(shopkeeper_final_paybal_premium);
            $("#shopkeeper_policy_id").val(shopkeeper_policy_id);
        });
        var personal_accident_length = personal_accident_json.length;
        var personal_accident_tr = "";
        var add_personal_acc = "";
        // alert(personal_accident_length);
        $.each(personal_accident_json, function(key, val) {
            add_personal_acc = key;
            var index = personal_accident_json[key][0];
            var personal_accident_name = personal_accident_json[key][1];
            var personal_accident_dob = personal_accident_json[key][2];
            var personal_accident_designation = personal_accident_json[key][3];
            var personal_accident_single_sum = personal_accident_json[key][4];
            personal_accident_tr += '<tr><td><input type="text" name="personal_accident_name[]" id="personal_accident_name_' + add_personal_acc + '" value="' + personal_accident_name + '" class="form-control personal_accident_name"></td><td><input type="date" name="personal_accident_dob[]" id="personal_accident_dob_' + add_personal_acc + '" value="' + personal_accident_dob + '" class="form-control personal_accident_dob"></td><td><input type="text" name="personal_accident_designation[]" id="personal_accident_designation_' + add_personal_acc + '" value="' + personal_accident_designation + '" class="form-control personal_accident_designation"></td><td><input type="number" name="personal_accident_single_sum[]" id="personal_accident_single_sum_' + add_personal_acc + '" value="' + personal_accident_single_sum + '" class="form-control personal_accident_single_sum" onkeyup="section_personal_accident_sum()"></td><td><button class="btn btn-facebook btn-sm dripicons-cross" id="remove_personal_acc_' + add_personal_acc + '" onClick="remove_personal_acc(' + add_personal_acc + ')" ></td> </tr>';
        });
        $("#append_personal_acc").append(personal_accident_tr);

        $("#add_personal_acc").attr("onClick", "add_personal_Acc(" + (personal_accident_length - 1) + ")");
        var fidelity_gaur_length = fidelity_gaur_json.length;
        var fidelity_gaur_tr = "";
        var add_fidelity_gaur = "";
        $.each(fidelity_gaur_json, function(key, val) {
            add_fidelity_gaur = key;
            var index = fidelity_gaur_json[key][0];
            var fidelity_gaur_name = fidelity_gaur_json[key][1];
            var fidelity_gaur_dob = fidelity_gaur_json[key][2];
            var fidelity_gaur_designation = fidelity_gaur_json[key][3];
            var fidelity_gaur_single_sum = fidelity_gaur_json[key][4];
            fidelity_gaur_tr += '<tr><td><input type="text" name="fidelity_gaur_name[]" id="fidelity_gaur_name_' + add_fidelity_gaur + '" value="' + fidelity_gaur_name + '" class="form-control fidelity_gaur_name"></td><td><input type="date" name="fidelity_gaur_dob[]" id="fidelity_gaur_dob_' + add_fidelity_gaur + '" value="' + fidelity_gaur_dob + '" class="form-control fidelity_gaur_dob"></td><td><input type="text" name="fidelity_gaur_designation[]" id="fidelity_gaur_designation_' + add_fidelity_gaur + '" value="' + fidelity_gaur_designation + '" class="form-control fidelity_gaur_designation"></td><td><input type="number" name="fidelity_gaur_single_sum[]" id="fidelity_gaur_single_sum_' + add_fidelity_gaur + '" value="' + fidelity_gaur_single_sum + '" class="form-control fidelity_gaur_single_sum" onkeyup="section_fidelity_gaur_sum()"></td><td><button class="btn btn-facebook btn-sm dripicons-cross" id="remove_fidelity_gaur_' + add_fidelity_gaur + '" onClick="remove_fidelity_gaur(' + add_fidelity_gaur + ')" ></td> </tr>';
        });
        $("#append_fidelity_gaur").append(fidelity_gaur_tr);

        $("#add_fidelity_gaur").attr("onClick", "add_fidelity_Gaur(" + (fidelity_gaur_length - 1) + ")");

    }

    function edit_FIre_RC_Details(risk_rc_details, fire_rc_policy_data_arr, policy_type_option) {
        var tr_rc_description = "";
        var risk_rc_details_length = risk_rc_details.length;

        if (policy_type_option == 3) { // 1:Individual , 2:Floater ,3:Residential & Commercial Section
            var tr_rc_description = "";
            var tr_table = "";
            var risk_key = "";
            counterArray = [];
            var edit_risk = 0;
            var risk_discr_arr_data = "";
            mainRiskRC = [];
            mainRiskRCDescription = [];
            $.each(risk_rc_details, function(key1, val1) {
                var tr_table = "";
                add_risk_RC = key1;
                var descCounter = 0;
                edit_risk++;
                counterArray[add_risk_RC] = descCounter;
                mainRiskRC.push(add_risk_RC);

                var risk_add_key = risk_rc_details[key1][0];
                var risk_add_name = risk_rc_details[key1][1];
                var risk_discr_arr = JSON.stringify(risk_rc_details[key1][2]);
                risk_discr_arr_data = JSON.parse(risk_discr_arr);
                $.each(risk_discr_arr_data, function(key2, val2) {
                    risk_key = key1 + "_" + key2;
                    var risk_discr_key = risk_discr_arr_data[key2][0].split("_");
                    var risk_discr_name = risk_discr_arr_data[key2][1];
                    var risk_discr_nos = risk_discr_arr_data[key2][2];
                    var risk_discr_value = risk_discr_arr_data[key2][3];
                    var risk_discr_sum_insured = risk_discr_arr_data[key2][4];

                    if (parseInt(risk_discr_key[0]) == val1[0]) {
                        // mainRiskRCDescription.push([i]);
                        removeRiskIDS = risk_key;
                        mainRiskRCDescription.push(removeRiskIDS);
                        tr_rc_description += '<tr><td><input type="text" class="form-control" id="description_' + risk_key + '" name="description[]" value="' + risk_discr_name + '"></td><td><input type="number" class="form-control" id="nos_' + risk_key + '" name="nos[]"  onkeyup=Get_total_sum_assured("' + removeRiskIDS + '")  value="' + risk_discr_nos + '"></td><td><input type="number" class="form-control" id="value_' + risk_key + '" name="value[]"  onkeyup=Get_total_sum_assured("' + removeRiskIDS + '")  value="' + risk_discr_value + '"></td><td><input type="number" class="form-control" id="sum_assured_' + risk_key + '" name="sum_assured[]" value="' + risk_discr_sum_insured + '" ></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_r_c_' + risk_key + '" onClick=removeRisk_R_C("' + removeRiskIDS + '") ></td></tr>';
                    }

                });
                // alert(risk_rc_details_length);
                $("#addRisc_R_C").attr("onClick", "addRisc_R_C('" + (risk_rc_details_length) + "')");
                var tr_table = ' <div id="div_' + add_risk_RC + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (add_risk_RC + 1) + '</label> <div class="col-md-9"> <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + add_risk_RC + '" value="' + risk_add_name + '" placeholder="Risk Address ' + (add_risk_RC + 1) + '"></div><div class="col-md-1"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + add_risk_RC + '" onClick="removeRisk_RC(' + add_risk_RC + ')" > </div> </div></div><div class="col-md-12"> <div  id="r_c_append_' + add_risk_RC + '"   ><table  class="table mb-0 table-bordered" id="append_rcDescription_' + add_risk_RC + '"><tr><td width="55%">Description</td><td>Nos.</td><td>Value</td><td>Sum Insured</td><td>Action</td></tr>' + tr_rc_description + '</table><button class="btn btn-primary btn-sm dripicons-plus  mt-2" id="addRiskDesc_R_C_' + removeRiskIDS + '" onClick=addRiskDesc_R_C("' + removeRiskIDS + '") ></div></div></div></div>';
                $("#append_risk").append(tr_table);
            });


        }

        if (policy_type_option == 3) { //3:Residential & Commercial Section
            if (fire_rc_policy_data_arr.length != 0 || fire_rc_policy_data_arr.length != "") {
                $.each(fire_rc_policy_data_arr, function(key_other, val_other) {
                    var fire_rc_policy_id = fire_rc_policy_data_arr.fire_rc_policy_id;
                    var fire_rc_fk_policy_id = fire_rc_policy_data_arr.fire_rc_fk_policy_id;
                    var fk_policy_type_id = fire_rc_policy_data_arr.fk_policy_type_id;
                    var fire_rc_total_sum_assured = fire_rc_policy_data_arr.fire_rc_total_sum_assured;
                    var fire_rc_fire_rate_per = fire_rc_policy_data_arr.fire_rc_fire_rate_per;
                    var fire_rc_fire_rate_tot_amount = fire_rc_policy_data_arr.fire_rc_fire_rate_tot_amount;
                    var fire_rc_less_discount_per = fire_rc_policy_data_arr.fire_rc_less_discount_per;
                    var fire_rc_less_discount_tot_amount = fire_rc_policy_data_arr.fire_rc_less_discount_tot_amount;
                    var fire_rc_rate_after_discount = fire_rc_policy_data_arr.fire_rc_rate_after_discount;
                    var fire_rc_gross_premium = fire_rc_policy_data_arr.fire_rc_gross_premium;

                    var fire_rc_stfi_rate = fire_rc_policy_data_arr.fire_rc_stfi_rate;
                    var fire_rc_stfi_rate_total = fire_rc_policy_data_arr.fire_rc_stfi_rate_total;
                    var fire_rc_earthquake_rate = fire_rc_policy_data_arr.fire_rc_earthquake_rate;
                    var fire_rc_earthquake_rate_total = fire_rc_policy_data_arr.fire_rc_earthquake_rate_total;
                    var fire_rc_terrorisum_rate = fire_rc_policy_data_arr.fire_rc_terrorisum_rate;
                    var fire_rc_terrorisum_rate_total = fire_rc_policy_data_arr.fire_rc_terrorisum_rate_total;

                    var fire_rc_cgst_rate_per = fire_rc_policy_data_arr.fire_rc_cgst_rate_per;
                    var fire_rc_cgst_tot_amount = fire_rc_policy_data_arr.fire_rc_cgst_tot_amount;
                    var fire_rc_sgst_rate_per = fire_rc_policy_data_arr.fire_rc_sgst_rate_per;
                    var fire_rc_sgst_tot_amount = fire_rc_policy_data_arr.fire_rc_sgst_tot_amount;
                    var fire_rc_final_payable_premium = fire_rc_policy_data_arr.fire_rc_final_payable_premium;
                    var fire_rc_policy_status = fire_rc_policy_data_arr.fire_rc_policy_status;
                    // alert(fire_rc_final_payable_premium);
                    $("#total_sum_assured").val(fire_rc_total_sum_assured);
                    $("#fire_rate_per").val(fire_rc_fire_rate_per);
                    $("#fire_rate_tot").val(fire_rc_fire_rate_tot_amount);
                    $("#less_discount_per").val(fire_rc_less_discount_per);
                    $("#less_discount_tot").val(fire_rc_less_discount_tot_amount);
                    $("#fire_rate_after_discount_tot").val(fire_rc_rate_after_discount);
                    $("#gross_premium").val(fire_rc_gross_premium);

                    $("#stfi_rate_per").val(fire_rc_stfi_rate);
                    $("#stfi_rate_total").val(fire_rc_stfi_rate_total);
                    $("#earthquake_rate_per").val(fire_rc_earthquake_rate);
                    $("#earthquake_rate_total").val(fire_rc_earthquake_rate_total);
                    $("#terrorisum_rate_per").val(fire_rc_terrorisum_rate);
                    $("#terrorisum_rate_total").val(fire_rc_terrorisum_rate_total);

                    $("#cgst_fire_per").val(fire_rc_cgst_rate_per);
                    $("#cgst_fire_tot").val(fire_rc_cgst_tot_amount);
                    $("#sgst_fire_per").val(fire_rc_sgst_rate_per);
                    $("#sgst_fire_tot").val(fire_rc_sgst_tot_amount);
                    $("#final_paybal_premium").val(fire_rc_final_payable_premium);
                    $("#fire_rc_policy_id").val(fire_rc_policy_id);
                });
            }
        }
    }

    function edit_Risk_details(risk_details, type) {
        if (option_policyDescription_data == "") {
            var option_riskval = '<?php if (!empty($risk_description)) : foreach ($risk_description as $row) : ?><option value="<?php echo  $row["policy_description_id"]; ?>"><?php echo  ucwords($row["policy_description_name"]); ?></option><?php endforeach;
                                                                                                                                                                                                                                        endif; ?>';
        } else {
            var option_riskval = option_policyDescription_data;
        }
        var risk_details_tr = "";
        var risk_details_length = risk_details.length;

        if (type == 1) { // 1:Individual , 2:Floater
            var risk_details_tr = "";
            var tr_table = "";
            var risk_key = "";
            counterArray = [];
            var edit_risk = 0;
            var risk_discr_arr_data = "";
            mainRiskAddress = [];
            mainRiskAddressDescription = [];
            $.each(risk_details, function(key1, val1) {
                var tr_table = "";
                add_risk_key = key1;
                var descCounter = 0;
                edit_risk++;
                counterArray[add_risk_key] = descCounter;
                mainRiskAddress.push(add_risk_key);

                var risk_add_key = risk_details[key1][0];
                var risk_add_name = risk_details[key1][1];
                var risk_discr_arr = JSON.stringify(risk_details[key1][2]);
                risk_discr_arr_data = JSON.parse(risk_discr_arr);
                $.each(risk_discr_arr_data, function(key2, val2) {
                    risk_key = key1 + "_" + key2;
                    var risk_discr_key = risk_discr_arr_data[key2][0].split("_");
                    var risk_discr_name = risk_discr_arr_data[key2][1];
                    var risk_discr_sum_insured = risk_discr_arr_data[key2][2];

                    if (parseInt(risk_discr_key[0]) == val1[0]) {

                        counterArray[add_risk_key] = descCounter;
                        var newArray = [];
                        if (descCounter > 0) {
                            for (var i = 0; i <= descCounter; i++) {
                                newArray.push(i);
                            }
                        } else newArray.push(0);

                        mainRiskAddressDescription[add_risk_key] = [add_risk_key, newArray];
                        descCounter++;

                        tr_table += '<div class="col-md-12 form-group row description"  id="description_' + risk_key + '"> <div class="col-md-5"><div class="form-group row"> <label for="risk_description" class="col-form-label col-md-5 text-right">Description</label>   <div class="col-md-7"><select class="form-control risk_description" id="risk_description_' + risk_key + '" name="risk_description[]"> <option value="null" >Select Description</option>' + option_riskval + '</select></div>  </div> </div><div class="col-md-5"><div class="form-group row"> <label for="risk_sum_assured" class="col-form-label col-md-4 text-right">Sum Assured</label> <div class="col-md-8"><input class="form-control risk_sum_assured" type="number" name="risk_sum_assured[]" id="risk_sum_assured_' + risk_key + '" value="' + risk_discr_sum_insured + '" placeholder="Risk Sum Assured"  onkeyup="get_total_sum_Assured()"></div></div></div><div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_' + risk_key + '" onClick=removeRiskDetails("' + risk_key + '") > </div></div>';
                    }

                });
                $("#details_append_" + risk_key).append(tr_table);
                risk_details_tr += ' <div id="div_' + add_risk_key + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (add_risk_key + 1) + '</label> <div class="col-md-8"> <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + add_risk_key + '" value="' + risk_add_name + '" placeholder="Risk Address ' + (add_risk_key + 1) + '"></div><div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + add_risk_key + '" onClick="removeRisk(' + add_risk_key + ')" > </div> </div><div class="col-md-12"><button class="btn btn-primary btn-sm AddRiskDetails" id="AddRiskDetails" onClick=AddRiskDetails("' + add_risk_key + '_0")>Add Risk</button> </div>' + tr_table + '<div  id="details_append_' + add_risk_key + '"  class="col-md-12 form-group row" ></div>  </div></div></div>';
                add_risk = parseInt(risk_details_length);
                $("#AddRisk").attr("onClick", "AddRisk()");
            });
            $("#append_risk").append(risk_details_tr);
            $.each(risk_details, function(key1, val1) {
                var risk_discr_arr = JSON.stringify(risk_details[key1][2]);
                risk_discr_arr_data = JSON.parse(risk_discr_arr);
                $.each(risk_discr_arr_data, function(key2, val2) {
                    var key = key1 + "_" + key2;
                    var index = risk_discr_arr_data[key2][0];
                    var risk_discr_name = risk_discr_arr_data[key2][1];
                    $('#risk_description_' + key).val(risk_discr_name);

                });
            });
        } else if (type == 2) {
            var tr_table = "";
            var tr_risk_table = "";

            $.each(risk_details, function(key1, val1) {
                var risk_add_key = JSON.stringify(risk_details[key1][0]);
                var risk_add_key2 = JSON.parse(risk_add_key);
                var risk_add_name = JSON.stringify(risk_details[key1][1]);
                var risk_add_name2 = JSON.parse(risk_add_name);
                var risk_add_key2_length = risk_add_key2.length;
                $.each(risk_add_key2, function(key_1, val_1) {
                    var risk_add = risk_add_key2[key_1][1];

                    tr_risk_table += ' <div id="div_' + key_1 + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (key_1 + 1) + '</label> <div class="col-md-8">  <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + key_1 + '" value="' + risk_add + '" placeholder="Risk Address ' + (key_1 + 1) + '"></div><div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + key_1 + '" onClick="removeRiskFloater(' + key_1 + ')" > </div> </div></div></div></div>';
                });
                var risk_add_name2_length = risk_add_name2.length;

                $.each(risk_add_name2, function(key2, val2) {
                    var risk_desc = risk_add_name2[key2][0];
                    var risk_sum_insured = risk_add_name2[key2][1];
                    // alert(key2);
                    tr_table += ' <tr><td><select class="form-control risk_description" id="risk_description_' + key2 + '" name="risk_description[]"> <option value="null" >Select Description</option>' + option_riskval + '</select></td><td><input class="form-control risk_sum_assured" type="number" name="risk_sum_assured[]" id="risk_sum_assured_' + key2 + '" value="' + risk_sum_insured + '" placeholder="Risk Sum Assured"  onkeyup="get_total_sum_Assured()"></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_floater_' + key2 + '" onClick=removeRiskDetails_Floater("' + key2 + '") ></td></tr>';
                });
                add_risk_desc = parseInt(risk_add_name2_length);
                $("#AddRiskDetails_floater").attr("onClick", "AddRiskDetails_floater()");
                $("#description_data").append(tr_table);
                $.each(risk_add_name2, function(key3, val3) {
                    var risk_desc = risk_add_name2[key3][0];
                    $('#risk_description_' + key3).val(risk_desc);
                });

                add_risk_floater = parseInt(risk_add_key2_length);
                $("#AddRiskFloater").attr("onClick", "AddRiskFloater()");
            });
            $("#append_risk").append(tr_risk_table);
        }

    }

    function edit_Payment_Acknowledge_details(total_paymentacknowledge_data){
        paymentacknowledge_length = total_paymentacknowledge_data.length;
        var tr_table = "";
        $.each(total_paymentacknowledge_data, function(key1, val1) {
                
            add_paymentacknowledge_counter = key1;
            // alert(add_paymentacknowledge_counter);
            main_paymentacknowledge.push(add_paymentacknowledge_counter);

            var index = total_paymentacknowledge_data[key1][0];
            var payment_mode = total_paymentacknowledge_data[key1][1];
            var payment_acknowledgement_file = total_paymentacknowledge_data[key1][2];
            tr_table += '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><select name="payment_mode[]" id="payment_mode_'+add_paymentacknowledge_counter+'" class="form-control payment_mode"><option value="null">Select Payment Mode</option><option value="Cheque">Cheque</option><option value="Online Payment Link">Online Payment Link</option><option value="NEFT / IMPS / RTGS">NEFT / IMPS / RTGS</option></select></td><td style="border: 1px solid #dddddd;"><input type="file" name="payment_acknowledgement_file[]" id="payment_acknowledgement_file_'+add_paymentacknowledge_counter+'" class="form-control payment_acknowledgement_file"><span id="payment_acknowledgement_file_err_'+add_paymentacknowledge_counter+'"></span><input type="hidden" id="payment_acknowledgement_file_hidden_'+add_paymentacknowledge_counter+'" name="payment_acknowledgement_file_hidden" class="payment_acknowledgement_file_hidden" value="'+payment_acknowledgement_file+'"><span id="payment_acknowledgement_details_'+add_paymentacknowledge_counter+'"></span></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-sm dripicons-cross" id="payment_acknowledgement_'+add_paymentacknowledge_counter+'" onClick="RemovePaymentAcknowledgement('+add_paymentacknowledge_counter+')" ></button></center></td></tr>'; 
            // alert(tr_table);
        });
        // alert(paymentacknowledge_length);
        // paymentacknowledge_length = parseInt(paymentacknowledge_length)+1;
        $("#Add_PaymentAcknowledgement").attr("onClick", "AddPaymentAcknowledgement(" + (paymentacknowledge_length) + ")");
        $("#append_payment_acknowlege").append(tr_table);
        $.each(total_paymentacknowledge_data, function(key1, val1) {
            add_paymentacknowledge_counter = key1;
            var index = total_paymentacknowledge_data[key1][0];
            var payment_mode = total_paymentacknowledge_data[key1][1];
            var payment_acknowledgement_file = total_paymentacknowledge_data[key1][2];
            if (payment_acknowledgement_file == "" || payment_acknowledgement_file == null) {
                // alert("hi")
                var view_payment_acknowledgement = "";
                var download_payment_acknowledgement = "";
            } else if (payment_acknowledgement_file != "") {
                var view_payment_acknowledgement = "<span >"+payment_acknowledgement_file+"</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/3/1/"+ payment_acknowledgement_file +"'  class='text-info'><b>View</b></a>";
                var download_payment_acknowledgement = "<a href='<?php echo base_url(); ?>master/remote/download_doc/3/1/"+ payment_acknowledgement_file+"'  class='text-success'><b>Download</b></a>";
            }
            $("#payment_acknowledgement_details_"+add_paymentacknowledge_counter).html(view_payment_acknowledgement + "  " + download_payment_acknowledgement);
            $('#payment_mode_' + add_paymentacknowledge_counter).val(payment_mode);
        });
    }

    function DepartmentBasedPolicyName(option_policy_name_val) {
        var company = $("#company").val();
        var department = $("#department").val();
        if (option_policy_name_val != undefined) {
            var option_policy_name_data = "";
            $.each(option_policy_name_val, function(key, val) {
                var policy_type_id = option_policy_name_val[key].policy_type_id;
                var policy_type = (option_policy_name_val[key].policy_type).charAt(0).toUpperCase() + (option_policy_name_val[key].policy_type).slice(1);
                option_policy_name_data += '<option value="' + policy_type_id + '">' + policy_type + '</option>';
            });
            $('#policy_name').append(option_policy_name_data);
        } else {
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
    }

    // GroupNameBasedMemberName();
    function group_name_company() {
        var group_name_txt = $("#group_name option:selected").text();
        $("#group_name_company").text(group_name_txt);
    }

    function GroupNameBasedMemberName(option_data_val) {

        var group_name = $("#group_name").val();
        // alert(option_data_val);
        if (option_data_val != undefined) {
            //var option_val_data = "";
            $.each(option_data_val, function(key, val) {
                var member_id = option_data_val[key].id;
                var member_name = option_data_val[key].name.charAt(0).toUpperCase() + option_data_val[key].name.slice(1);
                option_val_data += '<option value="' + member_id + '">' + member_name + '</option>';
            })
            // for (var i = 0; i < option_data_val.length; i++) {
            //     var member_id = option_data_val[i]["id"];
            //     var member_name = option_data_val[i]["name"].charAt(0).toUpperCase() + option_data_val[i]["name"].slice(1);
            //     option_val_data += '<option value="' + member_id + '">' + member_name + '</option>';
            // }
            // if (option_data == "undefined")
            // option_data ="";
            // alert(option_val_data);
            $('.member_name').append(option_val_data);
            $('#policy_holder_name').append(option_val_data);
            $('.name_insured_member_name').append(option_val_data);
        } else {

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
                            $('.name_insured_member_name').html("<option value='null'>Select Member Name</option>");
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
                            $('.name_insured_member_name').html("<option value='null'>Select Member Name</option>");
                            $('.nominee_name').html("<option value='null'>Select Nominee Name</option>");
                        }
                        option_val_data="";
                        option_val_data +=option_val;
                        //  option_data += option_val;
                        //  alert(option_data);
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
    }

    function policy_holder_name() {
        var policy_holder_name = $("#policy_holder_name option:selected").text();
        if (policy_holder_name == "Select Policy Holder Name")
            policy_holder_name = "";
        $("#group_name_company").text(policy_holder_name);

    }

    function MemberNameBaseddetails(add_correspondence) {
        var member_name = $("#member_name_" + add_correspondence).val();
        var member_name_txt = $("#member_name_" + add_correspondence + " option:selected").text();
        // alert(member_name_txt);
        $("#member_name_txt_" + add_correspondence).val(member_name_txt);
        // alert(add_correspondence);
        // alert(member_name);

        var url = "<?php echo $base_url; ?>master/policy/get_membernameBased_details";

        if (member_name != "") {
            $.ajax({
                url: url,
                data: {
                    member_name: member_name
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {

                    if (data["status"] == true) {
                        $('#correspondence_whatsapp_' + add_correspondence).val();
                        $('#correspondence_email_' + add_correspondence).val();
                        var contact = data["userdata"].contact;
                        var email = data["userdata"].email;
                        $('#correspondence_whatsapp_' + add_correspondence).val(contact);
                        $('#correspondence_email_' + add_correspondence).val(email);
                    } else {
                        $('#correspondence_whatsapp_' + add_correspondence).val();
                        $('#correspondence_email_' + add_correspondence).val();
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }
 
    function clearError() {
        $("#serial_no").removeClass("parsley-error");
        $("#serial_no_err").removeClass("text-danger").text("");
        $("#short_name").removeClass("parsley-error");
        $("#short_name_err").removeClass("text-danger").text("");
        $("#comman_email").removeClass("parsley-error");
        $("#comman_email_err").removeClass("text-danger").text("");
        $("#address").removeClass("parsley-error");
        $("#address_err").removeClass("text-danger").text("");
        $("#state").removeClass("parsley-error");
        $("#state_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#staff_id").text("");
        $("#serial_no").val("");
        $("#short_name").val("");
        $("#comman_email").val("");
        $("#address").val("");
        $("#state").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function check_file_upload(id) {
        if ($.inArray($('#'+id).val().split('.').pop().toLowerCase(), ['png', 'jpg', 'jpeg', 'pdf','jpe','doc','docx','csv','xls']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            $('#'+id).addClass("parsley-error");
            $('#'+id+"_err").addClass("text-danger").html("Please Select Only Valid Document Like PDF,Image,Excel or Doc File Only.");
            toaster(message_type = "Error", message_txt = "Please Select Only Valid Document Like PDF,Image,Excel or Doc File Only.", message_icone = "error");
            return false;
        }else{
            $('#'+id).removeClass("parsley-error");
            $('#'+id+"_err").removeClass("text-danger").html("");
        }
    }

    function sum_insured_int_Converter_data(name_insured_sum_insured) {
        var sum_insured = "";
        if (name_insured_sum_insured == "1,00,000")
            var sum_insured = "100000";
        else if (name_insured_sum_insured == "1,25,000")
            var sum_insured = "125000";
        else if (name_insured_sum_insured == "1,50,000")
            var sum_insured = "150000";
        else if (name_insured_sum_insured == "1,75,000")
            var sum_insured = "175000";
        else if (name_insured_sum_insured == "2,00,000")
            var sum_insured = "200000";
        else if (name_insured_sum_insured == "2,25,000")
            var sum_insured = "225000";
        else if (name_insured_sum_insured == "2,50,000")
            var sum_insured = "250000";
        else if (name_insured_sum_insured == "2,75,000")
            var sum_insured = "275000";
        else if (name_insured_sum_insured == "3,00,000")
            var sum_insured = "300000";
        else if (name_insured_sum_insured == "3,25,000")
            var sum_insured = "325000";
        else if (name_insured_sum_insured == "3,50,000")
            var sum_insured = "350000";
        else if (name_insured_sum_insured == "3,75,000")
            var sum_insured = "375000";
        else if (name_insured_sum_insured == "4,00,000")
            var sum_insured = "400000";
        else if (name_insured_sum_insured == "4,25,000")
            var sum_insured = "425000";
        else if (name_insured_sum_insured == "4,50,000")
            var sum_insured = "450000";
        else if (name_insured_sum_insured == "4,75,000")
            var sum_insured = "475000";
        else if (name_insured_sum_insured == "5,00,000")
            var sum_insured = "500000";
        else if (name_insured_sum_insured == "5,25,000")
            var sum_insured = "525000";
        else if (name_insured_sum_insured == "5,50,000")
            var sum_insured = "550000";
        else if (name_insured_sum_insured == "5,75,000")
            var sum_insured = "575000";
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured = "600000";
        else if (name_insured_sum_insured == "6,25,000")
            var sum_insured = "625000";
        else if (name_insured_sum_insured == "6,50,000")
            var sum_insured = "650000";
        else if (name_insured_sum_insured == "6,75,000")
            var sum_insured = "675000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured = "700000";
        else if (name_insured_sum_insured == "7,25,000")
            var sum_insured = "725000";
        else if (name_insured_sum_insured == "7,50,000")
            var sum_insured = "750000";
        else if (name_insured_sum_insured == "7,75,000")
            var sum_insured = "775000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured = "800000";
        else if (name_insured_sum_insured == "8,25,000")
            var sum_insured = "825000";
        else if (name_insured_sum_insured == "8,50,000")
            var sum_insured = "850000";
        else if (name_insured_sum_insured == "8,75,000")
            var sum_insured = "875000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured = "900000";
        else if (name_insured_sum_insured == "9,25,000")
            var sum_insured = "925000";
        else if (name_insured_sum_insured == "9,50,000")
            var sum_insured = "950000";
        else if (name_insured_sum_insured == "9,75,000")
            var sum_insured = "975000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured = "1000000";
        else if (name_insured_sum_insured == "10,50,000")
            var sum_insured = "1050000";
        else if (name_insured_sum_insured == "12,00,000")
            var sum_insured = "1200000";
        else if (name_insured_sum_insured == "12,50,000")
            var sum_insured = "1250000";
        else if (name_insured_sum_insured == "11,00,000")
            var sum_insured = "1100000";
        else if (name_insured_sum_insured == "11,50,000")
            var sum_insured = "1150000";
        else if (name_insured_sum_insured == "13,00,000")
            var sum_insured = "1300000";
        else if (name_insured_sum_insured == "13,50,000")
            var sum_insured = "1350000";
        else if (name_insured_sum_insured == "14,00,000")
            var sum_insured = "1400000";
        else if (name_insured_sum_insured == "14,50,000")
            var sum_insured = "1450000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured = "1500000";
        else if (name_insured_sum_insured == "15,50,000")
            var sum_insured = "1550000";
        else if (name_insured_sum_insured == "16,00,000")
            var sum_insured = "1600000";
        else if (name_insured_sum_insured == "16,50,000")
            var sum_insured = "1650000";
        else if (name_insured_sum_insured == "17,00,000")
            var sum_insured = "1700000";
        else if (name_insured_sum_insured == "17,50,000")
            var sum_insured = "1750000";
        else if (name_insured_sum_insured == "18,00,000")
            var sum_insured = "1800000";
        else if (name_insured_sum_insured == "18,50,000")
            var sum_insured = "1850000";
        else if (name_insured_sum_insured == "19,00,000")
            var sum_insured = "1900000";
        else if (name_insured_sum_insured == "19,50,000")
            var sum_insured = "1950000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured = "2000000";
        else if (name_insured_sum_insured == "20,50,000")
            var sum_insured = "2050000";
        else if (name_insured_sum_insured == "21,00,000")
            var sum_insured = "2100000";
        else if (name_insured_sum_insured == "22,00,000")
            var sum_insured = "2200000";
        else if (name_insured_sum_insured == "23,00,000")
            var sum_insured = "2300000";
        else if (name_insured_sum_insured == "24,00,000")
            var sum_insured = "2400000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured = "2500000";
        else if (name_insured_sum_insured == "26,00,000")
            var sum_insured = "2600000";
        else if (name_insured_sum_insured == "27,00,000")
            var sum_insured = "2700000";
        else if (name_insured_sum_insured == "28,00,000")
            var sum_insured = "2800000";
        else if (name_insured_sum_insured == "29,00,000")
            var sum_insured = "2900000";
        else if (name_insured_sum_insured == "30,00,000")
            var sum_insured = "3000000";
        else if (name_insured_sum_insured == "31,00,000")
            var sum_insured = "3100000";
        else if (name_insured_sum_insured == "32,00,000")
            var sum_insured = "3200000";
        else if (name_insured_sum_insured == "33,00,000")
            var sum_insured = "3300000";
        else if (name_insured_sum_insured == "34,00,000")
            var sum_insured = "3400000";
        else if (name_insured_sum_insured == "35,00,000")
            var sum_insured = "3500000";
        else if (name_insured_sum_insured == "40,00,000")
            var sum_insured = "4000000";
        else if (name_insured_sum_insured == "45,00,000")
            var sum_insured = "4500000";
        else if (name_insured_sum_insured == "50,00,000")
            var sum_insured = "5000000";
        else if (name_insured_sum_insured == "55,00,000")
            var sum_insured = "5500000";
        else if (name_insured_sum_insured == "60,00,000")
            var sum_insured = "6000000";
        else if (name_insured_sum_insured == "65,00,000")
            var sum_insured = "6500000";
        else if (name_insured_sum_insured == "75,00,000")
            var sum_insured = "7500000";
        else if (name_insured_sum_insured == "1,00,00,000")
            var sum_insured = "10000000";

        sum_insured = parseInt(sum_insured);

        if (isNaN(sum_insured))
            sum_insured = 0;
        else
            sum_insured = sum_insured;

        return sum_insured;
    }

    function get_tot_memberNamewise_total_sumassured(){
        actual_data_memberNamewise_total_sumassured = 0;
        var inputs = $(".name_insured_sum_insured");
        var actual_data_memberNamewise_total_sumassured = 0;
        for (var i = 0; i < inputs.length; i++) {
            // alert();
            var number = $(inputs[i]).val();
            if(number.includes(","))
                var name_insured_sum_insured = sum_insured_int_Converter_data($(inputs[i]).val());
            else
                var name_insured_sum_insured = $(inputs[i]).val();
            // alert(name_insured_sum_insured);
            name_insured_sum_insured = parseInt(name_insured_sum_insured);
            if (isNaN(name_insured_sum_insured))
                name_insured_sum_insured = 0;
            else
                name_insured_sum_insured = name_insured_sum_insured;

            actual_data_memberNamewise_total_sumassured = actual_data_memberNamewise_total_sumassured + name_insured_sum_insured;

            if (isNaN(actual_data_memberNamewise_total_sumassured))
                actual_data_memberNamewise_total_sumassured = 0;
            else
                actual_data_memberNamewise_total_sumassured = actual_data_memberNamewise_total_sumassured;
            
        }
        return actual_data_memberNamewise_total_sumassured;
    }

    $("#update").click(function() {
        // var basic_sum_insured = '<?php //echo $current_sum_insured; ?>';
        var total_basic_sum_insured = get_tot_memberNamewise_total_sumassured();
        // alert(total_basic_sum_insured);
        // return false;
        var TotalRisk_Rc = JSON.stringify(totalRisk_Rc());
        var policy_name_txt = $("#policy_name option:selected").text();
        // get_total_sum_Assured();
        var policy_type = $("#policy_type").val();
        if (policy_type == 1) // 1:Individual , 2:Floater
            var totalRisk = JSON.stringify(TotalRisk());
        else  if (policy_type == 2 && policy_name_txt !="Mediclaim")  ///if (policy_type == 2)
            var totalRisk = JSON.stringify(TotalRiskFloater());
        else if (policy_type == 3)
            var totalRisk = JSON.stringify(TotalRisk());

        var remove_remark = JSON.stringify(deleteRemarkID());
        var totalRemarks = JSON.stringify(TotalRemarks());
        var totalCorrespondence = JSON.stringify(TotalCorrespondence());
        var totalHypotication = TotalHypotication();
        totalHypotication = JSON.stringify(totalHypotication);
        
        var total_Paymentacknowledge = Total_Paymentacknowledge();
        total_Paymentacknowledge = total_Paymentacknowledge.split("&%$#&")
        var total_Paymentacknowledge_data = total_Paymentacknowledge[0];
        // alert(total_Paymentacknowledge_data);
        // alert(total_Paymentacknowledge[1]);
        // return false;
        if(total_Paymentacknowledge[1] == "true")
            return false;

        var policy_id = $("#policy_id").val();
        var serial_no_year = $("#serial_no_year").val();
        var serial_no_month = $("#serial_no_month").val();
        var serial_no = $("#serial_no").val();
        var company = $("#company").val();
        var company_txt = $("#company option:selected").text();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        // var policy_type = $("#policy_type").val();
        var agency_code = $("#agency_code").val();
        var sub_agency_code = $("#sub_agency_code").val();
        var mode_of_premimum = $("#mode_of_premimum").val();
        var date_from = $("#date_from").val();
        var date_to = $("#date_to").val();
        var payment_date_from = $("#payment_date_from").val();
        var payment_date_to = $("#payment_date_to").val();
        var policy_no = $("#policy_no").val();
        var group_name = $("#group_name").val();
        var policy_holder_name = $("#policy_holder_name").val();
        var policy_holder_txt = $("#policy_holder_name option:selected").text();
        if (policy_holder_txt == "") {
            toaster(message_type = "Error", message_txt = "The Policy Holder Name field is required.", message_icone = "error");
            return false;
        }
        var date_commenced = $("#date_commenced").val();
        // var policy_upload = $("#policy_upload").val();
        var policy_upload = $('#policy_upload').prop('files')[0];
        check_file_upload(id="policy_upload");
        var policy_upload_hidden = $('#policy_upload_hidden').val();
        // alert(policy_upload_hidden);
        var reg_mobile = $("#reg_mobile").val();
        var reg_email = $("#reg_email").val();
        var policy_counter_no = $('#policy_counter_no').val();

        var riv = $("#riv").val();
        var type_of_bussiness = $("#type_of_bussiness").val();
        var description_of_stock = $("#description_of_stock").val();

        var quotation_date = $("#quotation_date").val();
        var quotation_upload = $('#quotation_upload').prop('files')[0];
        check_file_upload(id="quotation_upload");
        var quotation_male_link = $("#quotation_male_link").val();

        // if (policy_type == 2)
        //     var policy_type_txt = "Floater";
        // else if (policy_type == 1)
        //     var policy_type_txt = "Individual";
        if (policy_type == 2)
            var policy_type_txt = "Floater";
        else if (policy_type == 1)
            var policy_type_txt = "Individual";
        else if (policy_type == 3)
            var policy_type_txt = "Residential & Commercial";
        else if (policy_type == 4)
            var policy_type_txt = "Common Individual";
        else if (policy_type == 5)
            var policy_type_txt = "Common Floater";

        var hidden = $("#floater_policy_type").is(":visible");
        var hidden2 = $("#individual_policy_type").is(":visible");
        var hidden3 = $("#hdfc_ergo_health_insu_individual_policy_type").is(":visible");
        var hidden4 = $("#new_india_assur_indi_policy_type").is(":visible");
        var hidden5 = $("#max_bupa_health_insu_type").is(":visible");
        var hidden6 = $("#star_health_allied_insu_type").is(":visible");
        var hidden7 = $("#care_health_insu_type").is(":visible");

        var floater_policy_type = "";
        if (hidden == true)
            floater_policy_type = $("#floater_policy_type").val();
        else if (hidden2 == true)
            floater_policy_type = $("#individual_policy_type").val();
        else if (hidden3 == true)
            floater_policy_type = $("#hdfc_ergo_health_insu_individual_policy_type").val();
        else if (hidden4 == true)
            floater_policy_type = $("#new_india_assur_indi_policy_type").val();
        else if (hidden5 == true)
            floater_policy_type = $("#max_bupa_health_insu_type").val();
        else if (hidden6 == true)
            floater_policy_type = $("#star_health_allied_insu_type").val();
        else if (hidden7 == true)
            floater_policy_type = $("#care_health_insu_type").val();
        // alert(floater_policy_type);
        // return false;
        // if (policy_type == 2)
        //     var floater_policy_type = $("#floater_policy_type").val();
        // else if (policy_type == 1)
        //     var floater_policy_type =  $("#individual_policy_type").val();

        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Floater"){
            var family_size = $("#family_size").val();
            var addition_of_more_child = $('#addition_of_more_child').val();
        }
        // alert(policy_type);
        // if (policy_upload_hidden == "") {
        //     if (policy_no != "") {
        //         // alert("The Policy Upload field is required.");
        //         if (policy_upload == undefined) {
        //             toaster(message_type = "Error", message_txt = "The Policy Upload field is required.", message_icone = "error");
        //             $("#policy_upload_err").removeClass("text-danger");
        //             $("#policy_upload_err").addClass("text-danger").html("The Policy Upload field is required.");
        //             return false;
        //         }
        //     } else
        //         $("#policy_upload_err").removeClass("text-danger").text("");
        // }

        // Calculation Section Start
        var total_sum_assured = $("#total_sum_assured").val();
        var fire_rate_per = $("#fire_rate_per").val();
        var fire_rate_tot = $('#fire_rate_tot').val();
        var less_discount_per = $("#less_discount_per").val();
        var less_discount_tot = $("#less_discount_tot").val();
        var fire_rate_after_discount_tot = $('#fire_rate_after_discount_tot').val();

        // if (policy_name_txt == "Standard Fire & Allied Perils") {
        var stfi_rate_per = $("#stfi_rate_per").val();
        var stfi_rate_total = $("#stfi_rate_total").val();
        var earthquake_rate_per = $("#earthquake_rate_per").val();
        var earthquake_rate_total = $("#earthquake_rate_total").val();
        var terrorisum_rate_per = $("#terrorisum_rate_per").val();
        var terrorisum_rate_total = $("#terrorisum_rate_total").val();
        var tot_sum_devid = $("#tot_sum_devid").val();
        // }
        var gross_premium = $("#gross_premium").val();
        var cgst_fire_per = $("#cgst_fire_per").val();
        var cgst_fire_tot = $('#cgst_fire_tot').val();
        var sgst_fire_per = $("#sgst_fire_per").val();
        var sgst_fire_tot = $("#sgst_fire_tot").val();
        var final_paybal_premium = $('#final_paybal_premium').val();

        // alert(total_sum_assured);

        // Calculation Section End

        if (serial_no_year == "null")
            serial_no_year = "";

        if (serial_no_month == "null")
            serial_no_month = "";

        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        if (agency_code == "null")
            agency_code = "";

        if (sub_agency_code == "null")
            sub_agency_code = "";

        if (group_name == "null")
            group_name = "";

        if (policy_holder_name == "null")
            policy_holder_name = "";

        var form_data = new FormData();

        if (policy_name_txt == "Bharat Sookshma Udyam") {
            var sookshma_fire_policy_id = $('#sookshma_fire_policy_id').val();
            form_data.append('sookshma_fire_policy_id', sookshma_fire_policy_id);
        } else if (policy_name_txt == "Bharat Laghu Udyam") {
            var laghu_fire_policy_id = $('#laghu_fire_policy_id').val();
            form_data.append('laghu_fire_policy_id', laghu_fire_policy_id);
        } else if (policy_name_txt == "Bharat Griha Raksha") {
            var griharaksha_fire_policy_id = $('#griharaksha_fire_policy_id').val();
            form_data.append('griharaksha_fire_policy_id', griharaksha_fire_policy_id);
        } else if (policy_name_txt == "Standard Fire & Allied Perils") {
            var fire_allied_perils_policy_id = $('#fire_allied_perils_policy_id').val();
            form_data.append('fire_allied_perils_policy_id', fire_allied_perils_policy_id);
        } else if (policy_name_txt == "Burglary") {
            var burglary_policy_id = $('#burglary_policy_id').val();
            form_data.append('burglary_policy_id', burglary_policy_id);
        } else if (policy_name_txt == "Term Plan") {
            var term_plan_policy_id = $("#term_plan_policy_id").val();
            form_data.append('term_plan_policy_id', term_plan_policy_id);
        } else if (policy_name_txt == "Shopkeeper") {
            var shopkeeper_policy_id = $("#shopkeeper_policy_id").val();
            form_data.append('shopkeeper_policy_id', shopkeeper_policy_id);
        } else if (policy_name_txt == "Jweller Block") {
            var jweller_policy_id = $("#jweller_policy_id").val();
            form_data.append('jweller_policy_id', jweller_policy_id);
        } else if (policy_name_txt == "Open Policy" || policy_name_txt == "Stop Policy" || policy_name_txt == "Specific Policy") {
            var marine_policy_id = $("#marine_policy_id").val();
            form_data.append('marine_policy_id', marine_policy_id);
        }else {
            if (policy_name_txt != "") {
                var other_policy_id = $('#other_policy_id').val();
                form_data.append('other_policy_id', other_policy_id);
            }
        }
        // if (policy_name_txt == "Mediclaim" && policy_type_txt != "Floater"){
        //     var mediclaim_policy_id = $("#mediclaim_policy_id").val();
        //     form_data.append('mediclaim_policy_id', mediclaim_policy_id);
        // }
        if (policy_type == 3) {
            var fire_rc_policy_id = $('#fire_rc_policy_id').val();
            form_data.append('fire_rc_policy_id', fire_rc_policy_id);
        }

        form_data.append('policy_id', policy_id);
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);
        form_data.append('company', company);
        form_data.append('company_txt', company_txt);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);
        form_data.append('policy_name_txt', policy_name_txt);
        form_data.append('policy_type', policy_type);
        form_data.append('agency_code', agency_code);
        form_data.append('sub_agency_code', sub_agency_code);
        form_data.append('mode_of_premimum', mode_of_premimum);
        form_data.append('total_basic_sum_insured', total_basic_sum_insured);

        form_data.append('date_from', date_from);
        form_data.append('date_to', date_to);
        form_data.append('payment_date_from', payment_date_from);
        form_data.append('payment_date_to', payment_date_to);
        form_data.append('policy_no', policy_no);
        form_data.append('group_name', group_name);
        form_data.append('policy_holder_name', policy_holder_name);
        form_data.append('date_commenced', date_commenced);
        form_data.append('policy_upload', policy_upload);
        form_data.append('policy_upload_hidden', policy_upload_hidden);
        form_data.append('reg_mobile', reg_mobile);
        form_data.append('reg_email', reg_email);
        form_data.append('policy_counter_no', policy_counter_no);

        form_data.append('riv', riv);
        form_data.append('type_of_bussiness', type_of_bussiness);
        form_data.append('description_of_stock', description_of_stock);
        form_data.append('quotation_date', quotation_date);
        form_data.append('quotation_upload', quotation_upload);
        form_data.append('quotation_male_link', quotation_male_link);

        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Floater"){
            form_data.append('family_size', family_size);
            form_data.append('addition_of_more_child', addition_of_more_child);
        }

        form_data.append('total_remarks', totalRemarks);
        form_data.append('remove_remark', remove_remark);
        form_data.append('total_hypotication', totalHypotication);
        form_data.append('total_correspondence', totalCorrespondence);
        form_data.append('total_paymentacknowledge_data', total_Paymentacknowledge_data);
        form_data.append('total_risk', totalRisk);
        form_data.append('total_risk_Rc', TotalRisk_Rc);

        // Calculation Section Start
        form_data.append('total_sum_assured', total_sum_assured);
        form_data.append('fire_rate_per', fire_rate_per);
        form_data.append('fire_rate_tot', fire_rate_tot);
        form_data.append('less_discount_per', less_discount_per);
        form_data.append('less_discount_tot', less_discount_tot);
        form_data.append('fire_rate_after_discount_tot', fire_rate_after_discount_tot);
        // if (policy_name_txt == "Standard Fire & Allied Perils") {
        form_data.append('stfi_rate_per', stfi_rate_per);
        form_data.append('stfi_rate_total', stfi_rate_total);
        form_data.append('earthquake_rate_per', earthquake_rate_per);
        form_data.append('earthquake_rate_total', earthquake_rate_total);
        form_data.append('terrorisum_rate_per', terrorisum_rate_per);
        form_data.append('terrorisum_rate_total', terrorisum_rate_total);
        form_data.append('tot_sum_devid', tot_sum_devid);
        // }
        form_data.append('gross_premium', gross_premium);
        form_data.append('cgst_fire_per', cgst_fire_per);
        form_data.append('cgst_fire_tot', cgst_fire_tot);
        form_data.append('sgst_fire_per', sgst_fire_per);
        form_data.append('sgst_fire_tot', sgst_fire_tot);
        form_data.append('final_paybal_premium', final_paybal_premium);

        if (policy_name_txt == "Term Plan") {
            var policy_term = $("#policy_term").val();
            var premium_paying_term = $("#premium_paying_term").val();
            var sum_insured = $("#sum_insured").val();
            var basic_premium = $("#basic_premium").val();
            var add_loading = $("#add_loading").val();
            var loading_description = $("#loading_description").val();
            var premium_after_loading = $("#premium_after_loading").val();
            var cgst_term_plan = $("#cgst_term_plan").val();
            var cgst_term_plan_tot = $("#cgst_term_plan_tot").val();
            var sgst_term_plan = $("#sgst_term_plan").val();
            var sgst_term_plan_tot = $("#sgst_term_plan_tot").val();
            var term_plan_final_paybal_premium = $("#term_plan_final_paybal_premium").val();

            form_data.append('policy_term', policy_term);
            form_data.append('premium_paying_term', premium_paying_term);
            form_data.append('sum_insured', sum_insured);
            form_data.append('basic_premium', basic_premium);
            form_data.append('add_loading', add_loading);
            form_data.append('loading_description', loading_description);
            form_data.append('premium_after_loading', premium_after_loading);
            form_data.append('cgst_term_plan', cgst_term_plan);
            form_data.append('sgst_term_plan', sgst_term_plan);
            form_data.append('cgst_term_plan_tot', cgst_term_plan_tot);
            form_data.append('sgst_term_plan_tot', sgst_term_plan_tot);
            form_data.append('term_plan_final_paybal_premium', term_plan_final_paybal_premium);
        }

        if (policy_name_txt == "Shopkeeper") {
            // Section 1
            var shopkeeper_risk_address = $("#shopkeeper_risk_address").val();
            var fire_sum_insured_1 = $("#fire_sum_insured_1").val();
            var fire_sum_insured_2 = $("#fire_sum_insured_2").val();
            var fire_sum_insured_3 = $("#fire_sum_insured_3").val();
            var fire_rate_1 = $("#fire_rate_1").val();
            var fire_rate_2 = $("#fire_rate_2").val();
            var fire_rate_3 = $("#fire_rate_3").val();
            var fire_premium_1 = $("#fire_premium_1").val();
            var fire_premium_2 = $("#fire_premium_2").val();
            var fire_premium_3 = $("#fire_premium_3").val();

            form_data.append('shopkeeper_risk_address', shopkeeper_risk_address);
            form_data.append('fire_sum_insured_1', fire_sum_insured_1);
            form_data.append('fire_sum_insured_2', fire_sum_insured_2);
            form_data.append('fire_sum_insured_3', fire_sum_insured_3);
            form_data.append('fire_rate_1', fire_rate_1);
            form_data.append('fire_rate_2', fire_rate_2);
            form_data.append('fire_rate_3', fire_rate_3);
            form_data.append('fire_premium_1', fire_premium_1);
            form_data.append('fire_premium_2', fire_premium_2);
            form_data.append('fire_premium_3', fire_premium_3);

            // Section 2
            var burglary_sum_insured_1 = $("#burglary_sum_insured_1").val();
            var burglary_sum_insured_2 = $("#burglary_sum_insured_2").val();
            var burglary_sum_insured_3 = $("#burglary_sum_insured_3").val();
            var burglary_rate_1 = $("#burglary_rate_1").val();
            var burglary_rate_2 = $("#burglary_rate_2").val();
            var burglary_rate_3 = $("#burglary_rate_3").val();
            var burglary_premium_1 = $("#burglary_premium_1").val();
            var burglary_premium_2 = $("#burglary_premium_2").val();
            var burglary_premium_3 = $("#burglary_premium_3").val();

            form_data.append('burglary_sum_insured_1', burglary_sum_insured_1);
            form_data.append('burglary_sum_insured_2', burglary_sum_insured_2);
            form_data.append('burglary_sum_insured_3', burglary_sum_insured_3);
            form_data.append('burglary_rate_1', burglary_rate_1);
            form_data.append('burglary_rate_2', burglary_rate_2);
            form_data.append('burglary_rate_3', burglary_rate_3);
            form_data.append('burglary_premium_1', burglary_premium_1);
            form_data.append('burglary_premium_2', burglary_premium_2);
            form_data.append('burglary_premium_3', burglary_premium_3);

            // Section 3
            var money_insu_sum_insured_1 = $("#money_insu_sum_insured_1").val();
            var money_insu_sum_insured_2 = $("#money_insu_sum_insured_2").val();
            var money_insu_sum_insured_3 = $("#money_insu_sum_insured_3").val();
            var money_insu_rate_1 = $("#money_insu_rate_1").val();
            var money_insu_rate_2 = $("#money_insu_rate_2").val();
            var money_insu_rate_3 = $("#money_insu_rate_3").val();
            var money_insu_premium_1 = $("#money_insu_premium_1").val();
            var money_insu_premium_2 = $("#money_insu_premium_2").val();
            var money_insu_premium_3 = $("#money_insu_premium_3").val();

            form_data.append('money_insu_sum_insured_1', money_insu_sum_insured_1);
            form_data.append('money_insu_sum_insured_2', money_insu_sum_insured_2);
            form_data.append('money_insu_sum_insured_3', money_insu_sum_insured_3);
            form_data.append('money_insu_rate_1', money_insu_rate_1);
            form_data.append('money_insu_rate_2', money_insu_rate_2);
            form_data.append('money_insu_rate_3', money_insu_rate_3);
            form_data.append('money_insu_premium_1', money_insu_premium_1);
            form_data.append('money_insu_premium_2', money_insu_premium_2);
            form_data.append('money_insu_premium_3', money_insu_premium_3);

            // Section 5
            var plate_glass_sum_insured = $("#plate_glass_sum_insured").val();
            var plate_glass_rate_per = $("#plate_glass_rate_per").val();
            var plate_glass_premium = $("#plate_glass_premium").val();

            form_data.append('plate_glass_sum_insured', plate_glass_sum_insured);
            form_data.append('plate_glass_rate_per', plate_glass_rate_per);
            form_data.append('plate_glass_premium', plate_glass_premium);

            // Section 6
            var neon_glow_sum_insured = $("#neon_glow_sum_insured").val();
            var neon_glow_rate_per = $("#neon_glow_rate_per").val();
            var neon_glow_premium = $("#neon_glow_premium").val();

            form_data.append('neon_glow_sum_insured', neon_glow_sum_insured);
            form_data.append('neon_glow_rate_per', neon_glow_rate_per);
            form_data.append('neon_glow_premium', neon_glow_premium);

            // Section 7
            var baggage_ins_sum_insured = $("#baggage_ins_sum_insured").val();
            var baggage_ins_rate_per = $("#baggage_ins_rate_per").val();
            var baggage_ins_premium = $("#baggage_ins_premium").val();

            form_data.append('baggage_ins_sum_insured', baggage_ins_sum_insured);
            form_data.append('baggage_ins_rate_per', baggage_ins_rate_per);
            form_data.append('baggage_ins_premium', baggage_ins_premium);

            // Section 8
            var personal_accident_sum_insured = $("#personal_accident_sum_insured").val();
            var personal_accident_rate_per = $("#personal_accident_rate_per").val();
            var personal_accident_premium = $("#personal_accident_premium").val();
            var total_personal_accident = JSON.stringify(Totalpersonal_accident());

            form_data.append('personal_accident_sum_insured', personal_accident_sum_insured);
            form_data.append('personal_accident_rate_per', personal_accident_rate_per);
            form_data.append('personal_accident_premium', personal_accident_premium);
            form_data.append('total_personal_accident', total_personal_accident);

            // Section 9
            var fidelity_gaur_sum_insured = $("#fidelity_gaur_sum_insured").val();
            var fidelity_gaur_rate_per = $("#fidelity_gaur_rate_per").val();
            var fidelity_gaur_premium = $("#fidelity_gaur_premium").val();
            var total_fidelity_gaur = JSON.stringify(Totalfidelity_gaur());

            form_data.append('fidelity_gaur_sum_insured', fidelity_gaur_sum_insured);
            form_data.append('fidelity_gaur_rate_per', fidelity_gaur_rate_per);
            form_data.append('fidelity_gaur_premium', fidelity_gaur_premium);
            form_data.append('total_fidelity_gaur', total_fidelity_gaur);

            // Section 10
            var pub_libility_sum_insured = $("#pub_libility_sum_insured").val();
            var work_men_compens_sum_insured = $("#work_men_compens_sum_insured").val();
            var pub_libility_rate = $("#pub_libility_rate").val();
            var work_men_compens_rate = $("#work_men_compens_rate").val();
            var pub_libility_premium = $("#pub_libility_premium").val();
            var work_men_compens_premium = $("#work_men_compens_premium").val();

            form_data.append('pub_libility_sum_insured', pub_libility_sum_insured);
            form_data.append('work_men_compens_sum_insured', work_men_compens_sum_insured);
            form_data.append('pub_libility_rate', pub_libility_rate);
            form_data.append('work_men_compens_rate', work_men_compens_rate);
            form_data.append('pub_libility_premium', pub_libility_premium);
            form_data.append('work_men_compens_premium', work_men_compens_premium);

            // Section 11
            var bus_inter_sum_insured_1 = $("#bus_inter_sum_insured_1").val();
            var bus_inter_sum_insured_2 = $("#bus_inter_sum_insured_2").val();
            var bus_inter_sum_insured_3 = $("#bus_inter_sum_insured_3").val();
            var bus_inter_rate_1 = $("#bus_inter_rate_1").val();
            var bus_inter_rate_2 = $("#bus_inter_rate_2").val();
            var bus_inter_rate_3 = $("#bus_inter_rate_3").val();
            var bus_inter_premium_1 = $("#bus_inter_premium_1").val();
            var bus_inter_premium_2 = $("#bus_inter_premium_2").val();
            var bus_inter_premium_3 = $("#bus_inter_premium_3").val();

            form_data.append('bus_inter_sum_insured_1', bus_inter_sum_insured_1);
            form_data.append('bus_inter_sum_insured_2', bus_inter_sum_insured_2);
            form_data.append('bus_inter_sum_insured_3', bus_inter_sum_insured_3);
            form_data.append('bus_inter_rate_1', bus_inter_rate_1);
            form_data.append('bus_inter_rate_2', bus_inter_rate_2);
            form_data.append('bus_inter_rate_3', bus_inter_rate_3);
            form_data.append('bus_inter_premium_1', bus_inter_premium_1);
            form_data.append('bus_inter_premium_2', bus_inter_premium_2);
            form_data.append('bus_inter_premium_3', bus_inter_premium_3);

            var shopkeeper_total_sum_assured = $("#shopkeeper_total_sum_assured").val();
            var shopkeeper_total_premium = $("#shopkeeper_total_premium").val();
            var shopkeeper_less_discount_per = $("#shopkeeper_less_discount_per").val();
            var shopkeeper_less_discount_tot = $("#shopkeeper_less_discount_tot").val();
            var shopkeeper_fire_rate_after_discount_tot = $("#shopkeeper_fire_rate_after_discount_tot").val();
            var shopkeeper_cgst_fire_per = $("#shopkeeper_cgst_fire_per").val();
            var shopkeeper_cgst_fire_tot = $("#shopkeeper_cgst_fire_tot").val();
            var shopkeeper_sgst_fire_per = $("#shopkeeper_sgst_fire_per").val();
            var shopkeeper_sgst_fire_tot = $("#shopkeeper_sgst_fire_tot").val();
            var shopkeeper_final_paybal_premium = $("#shopkeeper_final_paybal_premium").val();

            form_data.append('shopkeeper_total_sum_assured', shopkeeper_total_sum_assured);
            form_data.append('shopkeeper_total_premium', shopkeeper_total_premium);
            form_data.append('shopkeeper_less_discount_per', shopkeeper_less_discount_per);
            form_data.append('shopkeeper_less_discount_tot', shopkeeper_less_discount_tot);
            form_data.append('shopkeeper_fire_rate_after_discount_tot', shopkeeper_fire_rate_after_discount_tot);
            form_data.append('shopkeeper_cgst_fire_per', shopkeeper_cgst_fire_per);
            form_data.append('shopkeeper_cgst_fire_tot', shopkeeper_cgst_fire_tot);
            form_data.append('shopkeeper_sgst_fire_per', shopkeeper_sgst_fire_per);
            form_data.append('shopkeeper_sgst_fire_tot', shopkeeper_sgst_fire_tot);
            form_data.append('shopkeeper_final_paybal_premium', shopkeeper_final_paybal_premium);
        }

        if (policy_name_txt == "Jweller Block") {
            // Section 1
            var stock_premises_sum_insu_1 = $("#stock_premises_sum_insu_1").val();
            var stock_premises_sum_insu_2 = $("#stock_premises_sum_insu_2").val();
            var stock_premises_sum_insu_3 = $("#stock_premises_sum_insu_3").val();
            var stock_premises_sum_insu_4 = $("#stock_premises_sum_insu_4").val();
            var stock_premises_sum_insu_5 = $("#stock_premises_sum_insu_5").val();
            var stock_premises_sum_insu_6 = $("#stock_premises_sum_insu_6").val();
            var stock_premises_premium_1 = $("#stock_premises_premium_1").val();
            var stock_premises_premium_2 = $("#stock_premises_premium_2").val();

            form_data.append('stock_premises_sum_insu_1', stock_premises_sum_insu_1);
            form_data.append('stock_premises_sum_insu_2', stock_premises_sum_insu_2);
            form_data.append('stock_premises_sum_insu_3', stock_premises_sum_insu_3);
            form_data.append('stock_premises_sum_insu_4', stock_premises_sum_insu_4);
            form_data.append('stock_premises_sum_insu_5', stock_premises_sum_insu_5);
            form_data.append('stock_premises_sum_insu_6', stock_premises_sum_insu_6);
            form_data.append('stock_premises_premium_1', stock_premises_premium_1);
            form_data.append('stock_premises_premium_2', stock_premises_premium_2);

            // Section 2
            var stock_custody_sum_insu_1 = $("#stock_custody_sum_insu_1").val();
            var stock_custody_sum_insu_2 = $("#stock_custody_sum_insu_2").val();
            var stock_custody_sum_insu_3 = $("#stock_custody_sum_insu_3").val();
            var stock_custody_sum_insu_4 = $("#stock_custody_sum_insu_4").val();
            var stock_custody_premium_1 = $("#stock_custody_premium_1").val();
            var stock_custody_premium_2 = $("#stock_custody_premium_2").val();

            form_data.append('stock_custody_sum_insu_1', stock_custody_sum_insu_1);
            form_data.append('stock_custody_sum_insu_2', stock_custody_sum_insu_2);
            form_data.append('stock_custody_sum_insu_3', stock_custody_sum_insu_3);
            form_data.append('stock_custody_sum_insu_4', stock_custody_sum_insu_4);
            form_data.append('stock_custody_premium_1', stock_custody_premium_1);
            form_data.append('stock_custody_premium_2', stock_custody_premium_2);

            // Section 3
            var stock_transit_sum_insu_1 = $("#stock_transit_sum_insu_1").val();
            var stock_transit_sum_insu_2 = $("#stock_transit_sum_insu_2").val();
            var stock_transit_sum_insu_3 = $("#stock_transit_sum_insu_3").val();
            var stock_transit_sum_insu_4 = $("#stock_transit_sum_insu_4").val();
            var stock_transit_premium = $("#stock_transit_premium").val();

            form_data.append('stock_transit_sum_insu_1', stock_transit_sum_insu_1);
            form_data.append('stock_transit_sum_insu_2', stock_transit_sum_insu_2);
            form_data.append('stock_transit_sum_insu_3', stock_transit_sum_insu_3);
            form_data.append('stock_transit_sum_insu_4', stock_transit_sum_insu_4);
            form_data.append('stock_transit_premium', stock_transit_premium);

            // Section 4A
            var standard_fire_perils_1 = $("#standard_fire_perils_1").val();
            var standard_fire_perils_2 = $("#standard_fire_perils_2").val();
            var standard_fire_perils_3 = $("#standard_fire_perils_3").val();
            var standard_fire_perils_4 = $("#standard_fire_perils_4").val();
            var standard_fire_perils_5 = $("#standard_fire_perils_5").val();
            var standard_fire_perils_6 = $("#standard_fire_perils_6").val();
            var standard_fire_perils_premium_1 = $("#standard_fire_perils_premium_1").val();
            var standard_fire_perils_premium_2 = $("#standard_fire_perils_premium_2").val();
            var standard_fire_perils_premium_3 = $("#standard_fire_perils_premium_3").val();

            form_data.append('standard_fire_perils_1', standard_fire_perils_1);
            form_data.append('standard_fire_perils_2', standard_fire_perils_2);
            form_data.append('standard_fire_perils_3', standard_fire_perils_3);
            form_data.append('standard_fire_perils_4', standard_fire_perils_4);
            form_data.append('standard_fire_perils_5', standard_fire_perils_5);
            form_data.append('standard_fire_perils_6', standard_fire_perils_6);
            form_data.append('standard_fire_perils_premium_1', standard_fire_perils_premium_1);
            form_data.append('standard_fire_perils_premium_2', standard_fire_perils_premium_2);
            form_data.append('standard_fire_perils_premium_3', standard_fire_perils_premium_3);

            // Section 4B
            var content_burglary_sum_insu = $("#content_burglary_sum_insu").val();
            var content_burglary_premium = $("#content_burglary_premium").val();

            form_data.append('content_burglary_sum_insu', content_burglary_sum_insu);
            form_data.append('content_burglary_premium', content_burglary_premium);

            // Section 5
            var stock_exhibition_sum_insu = $("#stock_exhibition_sum_insu").val();
            var stock_exhibition_premium = $("#stock_exhibition_premium").val();

            form_data.append('stock_exhibition_sum_insu', stock_exhibition_sum_insu);
            form_data.append('stock_exhibition_premium', stock_exhibition_premium);

            // Section 6
            var fidelity_guar_cover_sum_insu_1 = $("#fidelity_guar_cover_sum_insu_1").val();
            // var fidelity_guar_cover_sum_insu_2 = $("#fidelity_guar_cover_sum_insu_2").val();
            var fidelity_guar_cover_premium_1 = $("#fidelity_guar_cover_premium_1").val();
            // var fidelity_guar_cover_premium_2 = $("#fidelity_guar_cover_premium_2").val();
            var total_fidelity_guar_cover = JSON.stringify(Totalfidelity_gaur());

            form_data.append('fidelity_guar_cover_sum_insu_1', fidelity_guar_cover_sum_insu_1);
            // form_data.append('fidelity_guar_cover_sum_insu_2', fidelity_guar_cover_sum_insu_2);
            form_data.append('fidelity_guar_cover_premium_1', fidelity_guar_cover_premium_1);
            // form_data.append('fidelity_guar_cover_premium_2', fidelity_guar_cover_premium_2);
            form_data.append('total_fidelity_guar_cover', total_fidelity_guar_cover);

            // Section 7
            var plate_glass_sum_insu = $("#plate_glass_sum_insu").val();
            var plate_glass_premium = $("#plate_glass_premium").val();

            form_data.append('plate_glass_sum_insu', plate_glass_sum_insu);
            form_data.append('plate_glass_premium', plate_glass_premium);

            // Section 8
            var neon_sign_sum_insu = $("#neon_sign_sum_insu").val();
            var neon_sign_premium = $("#neon_sign_premium").val();

            form_data.append('neon_sign_sum_insu', neon_sign_sum_insu);
            form_data.append('neon_sign_premium', neon_sign_premium);

            // Section 9
            var portable_equipmets_sum_insu = $("#portable_equipmets_sum_insu").val();
            var portable_equipmets_premium = $("#portable_equipmets_premium").val();

            form_data.append('portable_equipmets_sum_insu', portable_equipmets_sum_insu);
            form_data.append('portable_equipmets_premium', portable_equipmets_premium);

            // Section 10
            var employee_compensation_sum_insu_1 = $("#employee_compensation_sum_insu_1").val();
            var employee_compensation_sum_insu_2 = $("#employee_compensation_sum_insu_2").val();
            var employee_compensation_premium = $("#employee_compensation_premium").val();

            form_data.append('employee_compensation_sum_insu_1', employee_compensation_sum_insu_1);
            form_data.append('employee_compensation_sum_insu_2', employee_compensation_sum_insu_2);
            form_data.append('employee_compensation_premium', employee_compensation_premium);

            // Section 11
            var electronic_equipment_sum_insu = $("#electronic_equipment_sum_insu").val();
            var electronic_equipment_premium = $("#electronic_equipment_premium").val();

            form_data.append('electronic_equipment_sum_insu', electronic_equipment_sum_insu);
            form_data.append('electronic_equipment_premium', electronic_equipment_premium);

            // Section 12
            var public_liability_sum_insu = $("#public_liability_sum_insu").val();
            var public_liability_premium = $("#public_liability_premium").val();

            form_data.append('public_liability_sum_insu', public_liability_sum_insu);
            form_data.append('public_liability_premium', public_liability_premium);

            // Section 13
            var money_transit_sum_insu = $("#money_transit_sum_insu").val();
            var money_transit_premium = $("#money_transit_premium").val();

            form_data.append('money_transit_sum_insu', money_transit_sum_insu);
            form_data.append('money_transit_premium', money_transit_premium);

            // Section 14
            var machinery_breakdown_sum_insu = $("#machinery_breakdown_sum_insu").val();
            var machinery_breakdown_premium = $("#machinery_breakdown_premium").val();

            form_data.append('machinery_breakdown_sum_insu', machinery_breakdown_sum_insu);
            form_data.append('machinery_breakdown_premium', machinery_breakdown_premium);

            var jweller_less_discount = $("#jweller_less_discount").val();
            var jweller_total_sum_assured = $("#jweller_total_sum_assured").val();
            var jweller_less_discount_tot = $("#jweller_less_discount_tot").val();
            var jweller_after_discount_tot = $("#jweller_after_discount_tot").val();
            var jweller_terrorism_per = $("#jweller_terrorism_per").val();
            var jweller_terrorism_per_tot = $("#jweller_terrorism_per_tot").val();
            var jweller_tot_net_premium = $("#jweller_tot_net_premium").val();
            var cgst_fire_per = $("#cgst_fire_per").val();
            var sgst_fire_per = $("#sgst_fire_per").val();
            var jweller_cgst_per_tot = $("#jweller_cgst_per_tot").val();
            var jweller_sgst_per_tot = $("#jweller_sgst_per_tot").val();
            var jweller_final_payble = $("#jweller_final_payble").val();

            form_data.append('jweller_less_discount', jweller_less_discount);
            form_data.append('jweller_total_sum_assured', jweller_total_sum_assured);
            form_data.append('jweller_less_discount_tot', jweller_less_discount_tot);
            form_data.append('jweller_after_discount_tot', jweller_after_discount_tot);
            form_data.append('jweller_terrorism_per', jweller_terrorism_per);
            form_data.append('jweller_terrorism_per_tot', jweller_terrorism_per_tot);
            form_data.append('jweller_tot_net_premium', jweller_tot_net_premium);
            form_data.append('jweller_cgst_per', cgst_fire_per);
            form_data.append('jweller_sgst_per', sgst_fire_per);
            form_data.append('jweller_cgst_per_tot', jweller_cgst_per_tot);
            form_data.append('jweller_sgst_per_tot', jweller_sgst_per_tot);
            form_data.append('jweller_final_payble', jweller_final_payble);
        }

        if (policy_name_txt == "Open Policy" || policy_name_txt == "Stop Policy") {
            // Section 1
            var coverage_type = $("#coverage_type").val();
            var marine_description = $("#marine_description").val();
            var interest_insured = $("#interest_insured").val();
            var group_name_address = $("#group_name_address").val();
            var marine_sum_insured = $("#marine_sum_insured").val();
            var packing_stand_customary = $("#packing_stand_customary").val();
            var total_marine_cc = JSON.stringify(Total_Marine_con_c());
            var business_description = $("#business_description").val();
            var voyage_domestic_purchase = $("#voyage_domestic_purchase").val();
            var voyage_international_purchase = $("#voyage_international_purchase").val();

            var voyage_domestic_sales = $("#voyage_domestic_sales").val();
            var voyage_export_sales = $("#voyage_export_sales").val();
            var voyage_job_worker = $("#voyage_job_worker").val();
            var voyage_domestic_fini_good = $("#voyage_domestic_fini_good").val();
            var voyage_export_fini_good = $("#voyage_export_fini_good").val();
            var voyage_domestic_purch_return = $("#voyage_domestic_purch_return").val();
            var voyage_export_purch_return = $("#voyage_export_purch_return").val();
            var voyage_sales_return = $("#voyage_sales_return").val();

            var domestic_purch = $("#domestic_purch").val();
            var international_purch = $("#international_purch").val();
            var domestic_sale = $("#domestic_sale").val();
            var export_sale = $("#export_sale").val();
            var per_bottom_limit = $("#per_bottom_limit").val();
            var per_location_limit = $("#per_location_limit").val();
            var per_claim_excess = $("#per_claim_excess").val();
            var declaration_sale_fig = $("#declaration_sale_fig").val();

            var annual_turn_over = $("#annual_turn_over").val();
            var tot_sum_insured = $("#tot_sum_insured").val();
            var rate_applied = $("#rate_applied").val();
            var rate_applied_per = $("#rate_applied_per").val();
            var rate_applied_hidden = $("#rate_applied_hidden").val();
            var cgst_fire_per = $("#cgst_fire_per").val();
            var cgst_rate_tot = $("#cgst_rate_tot").val();
            var sgst_fire_per = $("#sgst_fire_per").val();
            var sgst_rate_tot = $("#sgst_rate_tot").val();
            var marine_final_payble_premium = $("#marine_final_payble_premium").val();

            form_data.append('coverage_type', coverage_type);
            form_data.append('marine_description', marine_description);
            form_data.append('interest_insured', interest_insured);
            form_data.append('group_name_address', group_name_address);
            form_data.append('marine_sum_insured', marine_sum_insured);
            form_data.append('packing_stand_customary', packing_stand_customary);
            form_data.append('total_marine_cc', total_marine_cc);
            form_data.append('business_description', business_description);
            form_data.append('voyage_domestic_purchase', voyage_domestic_purchase);
            form_data.append('voyage_international_purchase', voyage_international_purchase);

            form_data.append('voyage_domestic_sales', voyage_domestic_sales);
            form_data.append('voyage_export_sales', voyage_export_sales);
            form_data.append('voyage_job_worker', voyage_job_worker);
            form_data.append('voyage_domestic_fini_good', voyage_domestic_fini_good);
            form_data.append('voyage_export_fini_good', voyage_export_fini_good);
            form_data.append('voyage_domestic_purch_return', voyage_domestic_purch_return);
            form_data.append('voyage_export_purch_return', voyage_export_purch_return);
            form_data.append('voyage_sales_return', voyage_sales_return);

            form_data.append('domestic_purch', domestic_purch);
            form_data.append('international_purch', international_purch);
            form_data.append('domestic_sale', domestic_sale);
            form_data.append('export_sale', export_sale);
            form_data.append('per_bottom_limit', per_bottom_limit);
            form_data.append('per_location_limit', per_location_limit);
            form_data.append('per_claim_excess', per_claim_excess);
            form_data.append('declaration_sale_fig', declaration_sale_fig);

            form_data.append('annual_turn_over', annual_turn_over);
            form_data.append('tot_sum_insured', tot_sum_insured);
            form_data.append('rate_applied', rate_applied);
            form_data.append('rate_applied_per', rate_applied_per);
            form_data.append('rate_applied_hidden', rate_applied_hidden);
            form_data.append('marine_cgst_per', cgst_fire_per);
            form_data.append('marine_sgst_per', sgst_fire_per);
            form_data.append('cgst_rate_tot', cgst_rate_tot);
            form_data.append('sgst_rate_tot', sgst_rate_tot);
            form_data.append('marine_final_payble_premium', marine_final_payble_premium);
        }

        if (policy_name_txt == "Specific Policy") { //Specific Policy : Marine
            // Section 1
            var from_destination = $("#from_destination").val();
            var to_destination = $("#to_destination").val();
            var coverage_type = $("#coverage_type").val();
            var marine_description = $("#marine_description").val();
            var interest_insured = $("#interest_insured").val();
            var group_name_address = $("#group_name_address").val();
            var marine_sum_insured = $("#marine_sum_insured").val();
            var packing_stand_customary = $("#packing_stand_customary").val();
            var total_marine_cc = JSON.stringify(Total_Marine_con_c());
            var business_description = $("#business_description").val();
            var voyage_domestic_purchase = $("#voyage_domestic_purchase").val();
            var voyage_international_purchase = $("#voyage_international_purchase").val();

            var voyage_domestic_sales = $("#voyage_domestic_sales").val();
            var voyage_export_sales = $("#voyage_export_sales").val();
            var voyage_job_worker = $("#voyage_job_worker").val();
            var voyage_domestic_fini_good = $("#voyage_domestic_fini_good").val();
            var voyage_export_fini_good = $("#voyage_export_fini_good").val();
            var voyage_domestic_purch_return = $("#voyage_domestic_purch_return").val();
            var voyage_export_purch_return = $("#voyage_export_purch_return").val();
            var voyage_sales_return = $("#voyage_sales_return").val();

            var domestic_purch = $("#domestic_purch").val();
            var international_purch = $("#international_purch").val();
            var domestic_sale = $("#domestic_sale").val();
            var export_sale = $("#export_sale").val();
            var per_bottom_limit = $("#per_bottom_limit").val();
            var per_location_limit = $("#per_location_limit").val();
            var per_claim_excess = $("#per_claim_excess").val();
            var declaration_sale_fig = $("#declaration_sale_fig").val();

            var annual_turn_over = $("#annual_turn_over").val();
            var tot_sum_insured = $("#tot_sum_insured").val();
            var rate_applied = $("#rate_applied").val();
            var rate_applied_per = $("#rate_applied_per").val();
            var rate_applied_hidden = $("#rate_applied_hidden").val();
            var cgst_fire_per = $("#cgst_fire_per").val();
            var cgst_rate_tot = $("#cgst_rate_tot").val();
            var sgst_fire_per = $("#sgst_fire_per").val();
            var sgst_rate_tot = $("#sgst_rate_tot").val();
            var marine_final_payble_premium = $("#marine_final_payble_premium").val();

            form_data.append('from_destination', from_destination);
            form_data.append('to_destination', to_destination);
            form_data.append('coverage_type', coverage_type);
            form_data.append('marine_description', marine_description);
            form_data.append('interest_insured', interest_insured);
            form_data.append('group_name_address', group_name_address);
            form_data.append('marine_sum_insured', marine_sum_insured);
            form_data.append('packing_stand_customary', packing_stand_customary);
            form_data.append('total_marine_cc', total_marine_cc);
            form_data.append('business_description', business_description);
            form_data.append('voyage_domestic_purchase', voyage_domestic_purchase);
            form_data.append('voyage_international_purchase', voyage_international_purchase);

            form_data.append('voyage_domestic_sales', voyage_domestic_sales);
            form_data.append('voyage_export_sales', voyage_export_sales);
            form_data.append('voyage_job_worker', voyage_job_worker);
            form_data.append('voyage_domestic_fini_good', voyage_domestic_fini_good);
            form_data.append('voyage_export_fini_good', voyage_export_fini_good);
            form_data.append('voyage_domestic_purch_return', voyage_domestic_purch_return);
            form_data.append('voyage_export_purch_return', voyage_export_purch_return);
            form_data.append('voyage_sales_return', voyage_sales_return);

            form_data.append('domestic_purch', domestic_purch);
            form_data.append('international_purch', international_purch);
            form_data.append('domestic_sale', domestic_sale);
            form_data.append('export_sale', export_sale);
            form_data.append('per_bottom_limit', per_bottom_limit);
            form_data.append('per_location_limit', per_location_limit);
            form_data.append('per_claim_excess', per_claim_excess);
            form_data.append('declaration_sale_fig', declaration_sale_fig);

            form_data.append('annual_turn_over', annual_turn_over);
            form_data.append('tot_sum_insured', tot_sum_insured);
            form_data.append('rate_applied', rate_applied);
            form_data.append('rate_applied_per', rate_applied_per);
            form_data.append('rate_applied_hidden', rate_applied_hidden);
            form_data.append('marine_cgst_per', cgst_fire_per);
            form_data.append('marine_sgst_per', sgst_fire_per);
            form_data.append('cgst_rate_tot', cgst_rate_tot);
            form_data.append('sgst_rate_tot', sgst_rate_tot);
            form_data.append('marine_final_payble_premium', marine_final_payble_premium);
        }

        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Individual") {
            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);
            // alert(company_txt);
            // return false;
            if(company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd"){
                if (floater_policy_type == "Optima Restore") {
                    form_data.append('floater_policy_type', floater_policy_type);

                    var total_medi_ind_hdfc_json_data = JSON.stringify(Total_MediclaimHDFC());
                    var years_of_premium = $("#years_of_premium").val();
                    var region = $("#region").val();
                    var tot_premium = $("#tot_premium").val();
                    var protect_ride_prem_tot = $("#protect_ride_prem_tot").val();
                    var hospital_daily_cash_prem_tot = $("#hospital_daily_cash_prem_tot").val();
                    var ipa_rider_prem_tot = $("#ipa_rider_prem_tot").val();
                    var load_desc = $("#load_desc").val();
                    var load_tot = $("#load_tot").val();
                    var less_disc_per = $("#less_disc_per").val();
                    var less_disc_tot = $("#less_disc_tot").val();
                    var family_disc_per = $("#family_disc_per").val();
                    var family_disc_tot = $("#family_disc_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_hdfc_ergo_health_insu_policy_id = $("#medi_hdfc_ergo_health_insu_policy_id").val();

                    form_data.append('medi_hdfc_ergo_health_insu_policy_id', medi_hdfc_ergo_health_insu_policy_id);
                    form_data.append('total_medi_ind_hdfc_json_data', total_medi_ind_hdfc_json_data);
                    form_data.append('years_of_premium', years_of_premium);
                    form_data.append('region', region);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('protect_ride_prem_tot', protect_ride_prem_tot);
                    form_data.append('hospital_daily_cash_prem_tot', hospital_daily_cash_prem_tot);
                    form_data.append('ipa_rider_prem_tot', ipa_rider_prem_tot);
                    form_data.append('load_desc', load_desc);
                    form_data.append('load_tot', load_tot);
                    form_data.append('less_disc_per', less_disc_per);
                    form_data.append('less_disc_tot', less_disc_tot);
                    form_data.append('family_disc_per', family_disc_per);
                    form_data.append('family_disc_tot', family_disc_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }else if (floater_policy_type == "Energy") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_energy_medi_hdfc_json_data = JSON.stringify(Total_Energy_Medi_HDFC());
                    var tot_premium = $("#tot_premium").val();
                    var less_disc_per = $("#less_disc_per").val();
                    var less_disc_tot = $("#less_disc_tot").val();
                    var load_desc = $("#load_desc").val();
                    var load_tot = $("#load_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_hdfc_ergo_health_insu_energy_policy_id = $("#medi_hdfc_ergo_health_insu_energy_policy_id").val();

                    form_data.append('medi_hdfc_ergo_health_insu_energy_policy_id', medi_hdfc_ergo_health_insu_energy_policy_id);
                    form_data.append('total_energy_medi_hdfc_json_data', total_energy_medi_hdfc_json_data);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('less_disc_per', less_disc_per);
                    form_data.append('less_disc_tot', less_disc_tot);
                    form_data.append('load_desc', load_desc);
                    form_data.append('load_tot', load_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }else if (floater_policy_type == "Health Suraksha"){
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_suraksha_medi_hdfc_json_data = JSON.stringify(Total_Suraksh_Medi_HDFC());
                    var years_of_premium = $("#years_of_premium").val();
                    var region = $("#region").val();
                    var tot_premium = $("#tot_premium").val();
                    var load_desc = $("#load_desc").val();
                    var load_tot = $("#load_tot").val();
                    var less_disc_per = $("#less_disc_per").val();
                    var less_disc_tot = $("#less_disc_tot").val();
                    var family_disc_per = $("#family_disc_per").val();
                    var family_disc_tot = $("#family_disc_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_hdfc_ergo_health_insu_suraksha_policy_id = $("#medi_hdfc_ergo_health_insu_suraksha_policy_id").val();

                    form_data.append('medi_hdfc_ergo_health_insu_suraksha_policy_id', medi_hdfc_ergo_health_insu_suraksha_policy_id);
                    form_data.append('total_suraksha_medi_hdfc_json_data', total_suraksha_medi_hdfc_json_data);
                    form_data.append('years_of_premium', years_of_premium);
                    form_data.append('region', region);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('load_desc', load_desc);
                    form_data.append('load_tot', load_tot);
                    form_data.append('less_disc_per', less_disc_per);
                    form_data.append('less_disc_tot', less_disc_tot);
                    form_data.append('family_disc_per', family_disc_per);
                    form_data.append('family_disc_tot', family_disc_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }else if (floater_policy_type == "Easy Health"){
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_easy_medi_hdfc_json_data = JSON.stringify(Total_Medi_easy_rate_CardHDFC());
                    var years_of_premium = $("#years_of_premium").val();
                    var region = $("#region").val();
                    var tot_premium = $("#tot_premium").val();
                    var protect_ride_prem_tot = $("#protect_ride_prem_tot").val();
                    var hospital_daily_cash_prem_tot = $("#hospital_daily_cash_prem_tot").val();
                    var ipa_rider_prem_tot = $("#ipa_rider_prem_tot").val();
                    var load_desc = $("#load_desc").val();
                    var load_tot = $("#load_tot").val();
                    var family_disc_per = $("#family_disc_per").val();
                    var family_disc_tot = $("#family_disc_tot").val();
                    var less_disc_per = $("#less_disc_per").val();
                    var tot_basic_prem = $("#tot_basic_prem").val();
                    var less_disc_tot = $("#less_disc_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_hdfc_ergo_health_insu_easy_policy_id = $("#medi_hdfc_ergo_health_insu_easy_policy_id").val();

                    form_data.append('medi_hdfc_ergo_health_insu_easy_policy_id', medi_hdfc_ergo_health_insu_easy_policy_id);
                    form_data.append('total_easy_medi_hdfc_json_data', total_easy_medi_hdfc_json_data);
                    form_data.append('years_of_premium', years_of_premium);
                    form_data.append('region', region);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('protect_ride_prem_tot', protect_ride_prem_tot);
                    form_data.append('hospital_daily_cash_prem_tot', hospital_daily_cash_prem_tot);
                    form_data.append('ipa_rider_prem_tot', ipa_rider_prem_tot);
                    form_data.append('load_desc', load_desc);
                    form_data.append('load_tot', load_tot);
                    form_data.append('family_disc_per', family_disc_per);
                    form_data.append('family_disc_tot', family_disc_tot);
                    form_data.append('less_disc_per', less_disc_per);
                    form_data.append('tot_basic_prem', tot_basic_prem);
                    form_data.append('less_disc_tot', less_disc_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }
            }else if(company_txt == "The New India Assurance Co Ltd"){
                if (floater_policy_type == "New India Mediclaim Policy 2017") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_the_new_india_medi_tns_hdfc_json_data = JSON.stringify(Total_Medi_the_new_2017_assu());
                    var tot_premium = $("#tot_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_insu_new_india_tns_assu_ind_policy_id = $("#medi_insu_new_india_tns_assu_ind_policy_id").val();

                    form_data.append('total_the_new_india_medi_tns_hdfc_json_data', total_the_new_india_medi_tns_hdfc_json_data);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('medi_insu_new_india_tns_assu_ind_policy_id', medi_insu_new_india_tns_assu_ind_policy_id);
                }
    
            }else if(company_txt == "Max Bupa Health Insurance Co Ltd"){
                if (floater_policy_type == "Reassure") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_max_bupa_medi_reassure_json_data = JSON.stringify(Total_Medi_max_bupa_reassure());
                    var years_of_premium = $("#years_of_premium").val();
                    var region = $("#region").val();

                    var first_year_rate = $("#first_year_rate").val();
                    var second_year_rate = $("#second_year_rate").val();
                    var third_year_rate = $("#third_year_rate").val();
                    var first_year_tot = $("#first_year_tot").val();
                    var second_year_tot = $("#second_year_tot").val();
                    var third_year_tot = $("#third_year_tot").val();
                    var tot_term_disc = $("#tot_term_disc").val();

                    var tot_premium = $("#tot_premium").val();
                    var stand_instu_rate = $("#stand_instu_rate").val();
                    var stand_instu_tot = $("#stand_instu_tot").val();
                    var doctor_disc_per = $("#doctor_disc_per").val();
                    var doctor_disc_tot = $("#doctor_disc_tot").val();
                    var family_disc_per = $("#family_disc_per").val();
                    var family_disc_tot = $("#family_disc_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();

                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_max_bupa_reassure_ind_policy_id = $("#medi_max_bupa_reassure_ind_policy_id").val();

                    form_data.append('medi_max_bupa_reassure_ind_policy_id', medi_max_bupa_reassure_ind_policy_id);
                    form_data.append('total_max_bupa_medi_reassure_json_data', total_max_bupa_medi_reassure_json_data);
                    form_data.append('years_of_premium', years_of_premium);
                    form_data.append('region', region);
                    form_data.append('first_year_rate', first_year_rate);
                    form_data.append('second_year_rate', second_year_rate);
                    form_data.append('third_year_rate', third_year_rate);
                    form_data.append('first_year_tot', first_year_tot);
                    form_data.append('second_year_tot', second_year_tot);
                    form_data.append('third_year_tot', third_year_tot);
                    form_data.append('tot_term_disc', tot_term_disc);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('stand_instu_rate', stand_instu_rate);
                    form_data.append('stand_instu_tot', stand_instu_tot);
                    form_data.append('doctor_disc_per', doctor_disc_per);
                    form_data.append('doctor_disc_tot', doctor_disc_tot);
                    form_data.append('family_disc_per', family_disc_per);
                    form_data.append('family_disc_tot', family_disc_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);

                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }
    
            }else if(company_txt == "Star Health & Allied Insurance Co Ltd"){
                if (floater_policy_type == "Red Carpet") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_star_health_red_carpet_medi_ind_json_data = JSON.stringify(Total_Medi_starHealth_red_carpet());
                    var years_of_premium = $("#years_of_premium").val();

                    var tot_premium = $("#tot_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_star_health_ind_policy_id = $("#medi_star_health_ind_policy_id").val();
                    // alert(medi_star_health_ind_policy_id);
                    form_data.append('total_star_health_red_carpet_medi_ind_json_data', total_star_health_red_carpet_medi_ind_json_data);
                    form_data.append('years_of_premium', years_of_premium);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('medi_star_health_ind_policy_id', medi_star_health_ind_policy_id);
                }else if (floater_policy_type == "Comprehensive") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_star_health_comprehensive_medi_ind_json_data = JSON.stringify(Total_Medi_starHealth_comprehensive());
                    var years_of_premium = $("#years_of_premium").val();

                    var tot_premium = $("#tot_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_star_health_comp_ind_policy_id = $("#medi_star_health_comp_ind_policy_id").val();
                    // alert(medi_final_premium);
                    // return false;
                    form_data.append('total_star_health_comprehensive_medi_ind_json_data', total_star_health_comprehensive_medi_ind_json_data);
                    form_data.append('years_of_premium', years_of_premium);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('medi_star_health_comp_ind_policy_id', medi_star_health_comp_ind_policy_id);
                }
                
            }else if (company_txt == "United India Insurance Co Ltd"){
                if (floater_policy_type == "Individual Health Insurance Policy") {
                    form_data.append('floater_policy_type', floater_policy_type);

                    var total_mediclaim = JSON.stringify(Total_Mediclaim());
                    var medi_total_ncd_amount = $("#medi_total_ncd_amount").val();
                    var medi_total_amount = $("#medi_total_amount").val();
                    var medi_family_disc_rate = $("#medi_family_disc_rate").val();
                    var medi_family_disc_tot = $("#medi_family_disc_tot").val();
                    var medi_premium_after_fd = $("#medi_premium_after_fd").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var mediclaim_policy_id = $("#mediclaim_policy_id").val();

                    form_data.append('mediclaim_policy_id', mediclaim_policy_id);
                    form_data.append('total_mediclaim', total_mediclaim);
                    form_data.append('medi_total_ncd_amount', medi_total_ncd_amount);
                    form_data.append('medi_total_amount', medi_total_amount);
                    form_data.append('medi_family_disc_rate', medi_family_disc_rate);
                    form_data.append('medi_family_disc_tot', medi_family_disc_tot);
                    form_data.append('medi_premium_after_fd', medi_premium_after_fd);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }else if (floater_policy_type == "Floater 2020(Individual)") {
                    // alert(floater_policy_type);
                    form_data.append('floater_policy_type', floater_policy_type);
                    // form_data.append('restore_cover', restore_cover);
                    // form_data.append('maternity_new_born_baby_cover', maternity_new_born_baby_cover);
                    // form_data.append('daily_cash_allowance_cover', daily_cash_allowance_cover);

                    var total_mediclaim_indi2020 = JSON.stringify(Total_Mediclaim_indi2020());
                    var medi_ind_2020_total_premium = $("#medi_ind_2020_total_premium").val();
                    var medi_ind_2020_family_descount_per = $("#medi_ind_2020_family_descount_per").val();
                    var medi_ind_2020_family_descount_tot = $("#medi_ind_2020_family_descount_tot").val();
                    var medi_ind_2020_load_description = $("#medi_ind_2020_load_description").val();
                    var medi_ind_2020_load_amount = $("#medi_ind_2020_load_amount").val();
                    var medi_ind_2020_restore_cover_premium = $("#medi_ind_2020_restore_cover_premium").val();
                    var medi_ind_2020_maternity_new_bornbaby = $("#medi_ind_2020_maternity_new_bornbaby").val();
                    var medi_ind_2020_daily_cash_allow_hosp = $("#medi_ind_2020_daily_cash_allow_hosp").val();
                    var medi_ind_2020_load_gross_premium = $("#medi_ind_2020_load_gross_premium").val();
                    var new_load_gross_premium = $("#new_load_gross_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_ind_2020_cgst_tot = $("#medi_ind_2020_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_ind_2020_sgst_tot = $("#medi_ind_2020_sgst_tot").val();
                    var medi_ind_2020_final_premium = $("#medi_ind_2020_final_premium").val();
                    var medi_ind2020_policy_id = $("#medi_ind2020_policy_id").val();

                    form_data.append('medi_ind2020_policy_id', medi_ind2020_policy_id);
                    form_data.append('total_mediclaim_indi2020', total_mediclaim_indi2020);
                    form_data.append('medi_ind_2020_total_premium', medi_ind_2020_total_premium);
                    form_data.append('medi_ind_2020_family_descount_per', medi_ind_2020_family_descount_per);
                    form_data.append('medi_ind_2020_family_descount_tot', medi_ind_2020_family_descount_tot);
                    form_data.append('medi_ind_2020_load_description', medi_ind_2020_load_description);
                    form_data.append('medi_ind_2020_load_amount', medi_ind_2020_load_amount);
                    form_data.append('medi_ind_2020_restore_cover_premium', medi_ind_2020_restore_cover_premium);
                    form_data.append('medi_ind_2020_maternity_new_bornbaby', medi_ind_2020_maternity_new_bornbaby);
                    form_data.append('medi_ind_2020_daily_cash_allow_hosp', medi_ind_2020_daily_cash_allow_hosp);
                    form_data.append('medi_ind_2020_load_gross_premium', medi_ind_2020_load_gross_premium);
                    form_data.append('new_load_gross_premium', new_load_gross_premium);
                    form_data.append('medi_ind_2020_cgst_rate', cgst_fire_per);
                    form_data.append('medi_ind_2020_cgst_tot', medi_ind_2020_cgst_tot);
                    form_data.append('medi_ind_2020_sgst_rate', sgst_fire_per);
                    form_data.append('medi_ind_2020_sgst_tot', medi_ind_2020_sgst_tot);
                    form_data.append('medi_ind_2020_final_premium', medi_ind_2020_final_premium);
                }
            }else if(company_txt == "Care Health Insurance Co Ltd"){
                if (floater_policy_type == "Care Advantage") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_care_adv_ind_json_data = JSON.stringify(Total_care_adv_ind());
                    var medi_final_premium = $("#medi_final_premium").val();
                    var care_adv_ind_id = $("#care_adv_ind_id").val();

                    form_data.append('total_care_adv_ind_json_data', total_care_adv_ind_json_data);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('care_adv_ind_id', care_adv_ind_id);
                }else if (floater_policy_type == "Care") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_care_ind_json_data = JSON.stringify(Total_care_ind());
                    var medi_final_premium = $("#medi_final_premium").val();
                    var care_ind_id = $("#care_ind_id").val();

                    form_data.append('total_care_ind_json_data', total_care_ind_json_data);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('care_ind_id', care_ind_id);
                }                
            }
        }

        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Floater"){
            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);
            if(company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd"){
                if (floater_policy_type == "Optima Restore") {
                    form_data.append('floater_policy_type', floater_policy_type);

                    var total_medi_float_hdfc_json_data = JSON.stringify(Total_MediclaimHDFC_float());
                    var hdfc_ergo_health_insu_family_size = $("#hdfc_ergo_health_insu_family_size").val();
                    var hdfc_ergo_health_insu_addition_of_more_child = $("#hdfc_ergo_health_insu_addition_of_more_child").val();
                    var years_of_premium = $("#years_of_premium").val();
                    var region = $("#region").val();
                    var tot_premium = $("#tot_premium").val();
                    var hdfc_ergo_health_insu_child_count = $("#hdfc_ergo_health_insu_child_count").val();
                    var hdfc_ergo_health_insu_child_count_first_premium = $("#hdfc_ergo_health_insu_child_count_first_premium").val();
                    var hdfc_ergo_health_insu_child_total_premium = $("#hdfc_ergo_health_insu_child_total_premium").val();
                    var protect_ride_prem_tot = $("#protect_ride_prem_tot").val();
                    var hospital_daily_cash_prem_tot = $("#hospital_daily_cash_prem_tot").val();
                    var ipa_rider_prem_tot = $("#ipa_rider_prem_tot").val();
                    var load_desc = $("#load_desc").val();
                    var load_tot = $("#load_tot").val();
                    var less_disc_per = $("#less_disc_per").val();
                    var less_disc_tot = $("#less_disc_tot").val();
                    var stay_active_benefit = $("#stay_active_benefit").val();
                    var stay_active_benefit_prem_tot = $("#stay_active_benefit_prem_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    var medi_hdfc_ergo_health_insu_float_policy_id = $("#medi_hdfc_ergo_health_insu_float_policy_id").val();

                    form_data.append('medi_hdfc_ergo_health_insu_float_policy_id', medi_hdfc_ergo_health_insu_float_policy_id);
                    form_data.append('total_medi_float_hdfc_json_data', total_medi_float_hdfc_json_data);
                    form_data.append('hdfc_ergo_health_insu_family_size', hdfc_ergo_health_insu_family_size);
                    form_data.append('hdfc_ergo_health_insu_addition_of_more_child', hdfc_ergo_health_insu_addition_of_more_child);
                    form_data.append('years_of_premium', years_of_premium);
                    form_data.append('region', region);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('hdfc_ergo_health_insu_child_count', hdfc_ergo_health_insu_child_count);
                    form_data.append('hdfc_ergo_health_insu_child_count_first_premium', hdfc_ergo_health_insu_child_count_first_premium);
                    form_data.append('hdfc_ergo_health_insu_child_total_premium', hdfc_ergo_health_insu_child_total_premium);
                    form_data.append('protect_ride_prem_tot', protect_ride_prem_tot);
                    form_data.append('hospital_daily_cash_prem_tot', hospital_daily_cash_prem_tot);
                    form_data.append('ipa_rider_prem_tot', ipa_rider_prem_tot);
                    form_data.append('load_desc', load_desc);
                    form_data.append('load_tot', load_tot);
                    form_data.append('less_disc_per', less_disc_per);
                    form_data.append('less_disc_tot', less_disc_tot);
                    form_data.append('stay_active_benefit', stay_active_benefit);
                    form_data.append('stay_active_benefit_prem_tot', stay_active_benefit_prem_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                }else if (floater_policy_type == "Health Suraksha"){
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_suraksha_float_medi_hdfc_json_data = JSON.stringify(Total_float_Suraksh_Medi_HDFC());
                    var suraksha_float_hdfc_ergo_health_insu_family_size = $("#suraksha_float_hdfc_ergo_health_insu_family_size").val();
                    var hdfc_ergo_health_insu_addition_of_more_child = $("#hdfc_ergo_health_insu_addition_of_more_child").val();
                    var years_of_premium = $("#years_of_premium").val();
                    var region = $("#region").val();
                    var tot_premium = $("#tot_premium").val();
                    var hdfc_ergo_health_insu_child_count = $("#hdfc_ergo_health_insu_child_count").val();
                    var hdfc_ergo_health_insu_child_count_first_premium = $("#hdfc_ergo_health_insu_child_count_first_premium").val();
                    var hdfc_ergo_health_insu_child_total_premium = $("#hdfc_ergo_health_insu_child_total_premium").val();
                    var load_desc = $("#load_desc").val();
                    var load_tot = $("#load_tot").val();
                    var less_disc_per = $("#less_disc_per").val();
                    var less_disc_tot = $("#less_disc_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    var medi_hdfc_ergo_health_float_suraksha_policy_id = $("#medi_hdfc_ergo_health_float_suraksha_policy_id").val();

                    form_data.append('medi_hdfc_ergo_health_float_suraksha_policy_id', medi_hdfc_ergo_health_float_suraksha_policy_id);
                    form_data.append('total_suraksha_float_medi_hdfc_json_data', total_suraksha_float_medi_hdfc_json_data);
                    form_data.append('suraksha_float_hdfc_ergo_health_insu_family_size', suraksha_float_hdfc_ergo_health_insu_family_size);
                    form_data.append('hdfc_ergo_health_insu_addition_of_more_child', hdfc_ergo_health_insu_addition_of_more_child);
                    form_data.append('years_of_premium', years_of_premium);
                    form_data.append('region', region);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('hdfc_ergo_health_insu_child_count', hdfc_ergo_health_insu_child_count);
                    form_data.append('hdfc_ergo_health_insu_child_count_first_premium', hdfc_ergo_health_insu_child_count_first_premium);
                    form_data.append('hdfc_ergo_health_insu_child_total_premium', hdfc_ergo_health_insu_child_total_premium);
                    form_data.append('load_desc', load_desc);
                    form_data.append('load_tot', load_tot);
                    form_data.append('less_disc_per', less_disc_per);
                    form_data.append('less_disc_tot', less_disc_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                }else if (floater_policy_type == "Easy Health"){
                    form_data.append('floater_policy_type', floater_policy_type);
                    var hdfc_ergo_health_insu_family_size = $("#hdfc_ergo_health_insu_family_size").val();
                    var hdfc_ergo_health_insu_addition_of_more_child = $("#hdfc_ergo_health_insu_addition_of_more_child").val();
                    var total_easy_float_medi_hdfc_json_data = JSON.stringify(Total_Medi_float_easy_rate_CardHDFC());
                    var years_of_premium = $("#years_of_premium").val();
                    var region = $("#region").val();
                    var tot_premium = $("#tot_premium").val();
                    var hdfc_ergo_health_insu_child_count = $("#hdfc_ergo_health_insu_child_count").val();
                    var hdfc_ergo_health_insu_child_count_first_premium = $("#hdfc_ergo_health_insu_child_count_first_premium").val();
                    var hdfc_ergo_health_insu_child_total_premium = $("#hdfc_ergo_health_insu_child_total_premium").val();
                    var protect_ride_prem_tot = $("#protect_ride_prem_tot").val();
                    var hospital_daily_cash_prem_tot = $("#hospital_daily_cash_prem_tot").val();
                    var ipa_rider_prem_tot = $("#ipa_rider_prem_tot").val();
                    var load_desc = $("#load_desc").val();
                    var load_tot = $("#load_tot").val();
                    var stay_active_benefit = $("#stay_active_benefit").val();
                    var stay_active_benefit_prem = $("#stay_active_benefit_prem").val();
                    var less_disc_per = $("#less_disc_per").val();
                    var tot_basic_prem = $("#tot_basic_prem").val();
                    var less_disc_tot = $("#less_disc_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    var medi_hdfc_ergo_health_insu_easy_float_policy_id = $("#medi_hdfc_ergo_health_insu_easy_float_policy_id").val();

                    form_data.append('hdfc_ergo_health_insu_family_size', hdfc_ergo_health_insu_family_size);
                    form_data.append('hdfc_ergo_health_insu_addition_of_more_child', hdfc_ergo_health_insu_addition_of_more_child);
                    form_data.append('medi_hdfc_ergo_health_insu_easy_float_policy_id', medi_hdfc_ergo_health_insu_easy_float_policy_id);
                    form_data.append('total_easy_float_medi_hdfc_json_data', total_easy_float_medi_hdfc_json_data);
                    form_data.append('years_of_premium', years_of_premium);
                    form_data.append('region', region);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('hdfc_ergo_health_insu_child_count', hdfc_ergo_health_insu_child_count);
                    form_data.append('hdfc_ergo_health_insu_child_count_first_premium', hdfc_ergo_health_insu_child_count_first_premium);
                    form_data.append('hdfc_ergo_health_insu_child_total_premium', hdfc_ergo_health_insu_child_total_premium);
                    form_data.append('protect_ride_prem_tot', protect_ride_prem_tot);
                    form_data.append('hospital_daily_cash_prem_tot', hospital_daily_cash_prem_tot);
                    form_data.append('ipa_rider_prem_tot', ipa_rider_prem_tot);
                    form_data.append('load_desc', load_desc);
                    form_data.append('load_tot', load_tot);
                    form_data.append('stay_active_benefit', stay_active_benefit);
                    form_data.append('stay_active_benefit_prem', stay_active_benefit_prem);
                    form_data.append('less_disc_per', less_disc_per);
                    form_data.append('tot_basic_prem', tot_basic_prem);
                    form_data.append('less_disc_tot', less_disc_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                }
            }else if(company_txt == "The New India Assurance Co Ltd"){
                if (floater_policy_type == "New India Floater Mediclaim") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_the_new_india_medi_float_json_data = JSON.stringify(Total_Medi_the_new_flaoter_assu());
                    var tot_premium = $("#tot_premium").val();
                    var floater_disc_rate = $("#floater_disc_rate").val();
                    var floater_disc_tot = $("#floater_disc_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var medi_new_india_assu_float_policy_id = $("#medi_new_india_assu_float_policy_id").val();

                    form_data.append('medi_new_india_assu_float_policy_id', medi_new_india_assu_float_policy_id);
                    form_data.append('total_the_new_india_medi_float_json_data', total_the_new_india_medi_float_json_data);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('floater_disc_rate', floater_disc_rate);
                    form_data.append('floater_disc_tot', floater_disc_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }
                
            }else if(company_txt == "Max Bupa Health Insurance Co Ltd"){
                if (floater_policy_type == "Reassure") {
                    var max_bupa_health_insu_medi_reassure_float_family_size = $("#max_bupa_health_insu_medi_reassure_float_family_size").val();
                    form_data.append('floater_policy_type', floater_policy_type);
                    form_data.append('max_bupa_health_insu_medi_reassure_float_family_size', max_bupa_health_insu_medi_reassure_float_family_size);
                    var total_max_bupa_medi_float_reassure_json_data = JSON.stringify(Total_FloatMedi_max_bupa_reassure());
                    var years_of_premium = $("#years_of_premium").val();
                    var region = $("#region").val();

                    var first_year_rate = $("#first_year_rate").val();
                    var second_year_rate = $("#second_year_rate").val();
                    var third_year_rate = $("#third_year_rate").val();
                    var first_year_tot = $("#first_year_tot").val();
                    var second_year_tot = $("#second_year_tot").val();
                    var third_year_tot = $("#third_year_tot").val();
                    var tot_term_disc = $("#tot_term_disc").val();

                    var tot_premium = $("#tot_premium").val();
                    var stand_instu_rate = $("#stand_instu_rate").val();
                    var stand_instu_tot = $("#stand_instu_tot").val();
                    var doctor_disc_per = $("#doctor_disc_per").val();
                    var doctor_disc_tot = $("#doctor_disc_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();

                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    var medi_max_bupa_reassure_float_policy_id = $("#medi_max_bupa_reassure_float_policy_id").val();

                    form_data.append('max_age', max_age);
                    form_data.append('medi_max_bupa_reassure_float_policy_id', medi_max_bupa_reassure_float_policy_id);
                    form_data.append('total_max_bupa_medi_float_reassure_json_data', total_max_bupa_medi_float_reassure_json_data);
                    form_data.append('years_of_premium', years_of_premium);
                    form_data.append('region', region);
                    form_data.append('first_year_rate', first_year_rate);
                    form_data.append('second_year_rate', second_year_rate);
                    form_data.append('third_year_rate', third_year_rate);
                    form_data.append('first_year_tot', first_year_tot);
                    form_data.append('second_year_tot', second_year_tot);
                    form_data.append('third_year_tot', third_year_tot);
                    form_data.append('tot_term_disc', tot_term_disc);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('stand_instu_rate', stand_instu_rate);
                    form_data.append('stand_instu_tot', stand_instu_tot);
                    form_data.append('doctor_disc_per', doctor_disc_per);
                    form_data.append('doctor_disc_tot', doctor_disc_tot);
                    form_data.append('gross_premium_tot', gross_premium_tot);
                    form_data.append('gross_premium_tot_new', gross_premium_tot_new);

                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }
                
            }else if(company_txt == "Star Health & Allied Insurance Co Ltd"){
                if (floater_policy_type == "Red Carpet") {
                    var star_health_allied_insu_red_carpet_float_family_size = $("#star_health_allied_insu_red_carpet_float_family_size").val();
                    form_data.append('star_health_allied_insu_red_carpet_float_family_size', star_health_allied_insu_red_carpet_float_family_size);
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_star_health_red_carpet_medi_float_json_data = JSON.stringify(Total_Medi_starHealth_red_carpet_float());
                    var years_of_premium = $("#years_of_premium").val();

                    var tot_premium = $("#tot_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    var medi_star_health_float_policy_id = $("#medi_star_health_float_policy_id").val();

                    form_data.append('total_star_health_red_carpet_medi_float_json_data', total_star_health_red_carpet_medi_float_json_data);
                    form_data.append('years_of_premium', years_of_premium);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                    form_data.append('medi_star_health_float_policy_id', medi_star_health_float_policy_id);
                }else if (floater_policy_type == "Comprehensive") {
                    var star_health_allied_insu_comprehensive_float_family_size = $("#star_health_allied_insu_comprehensive_float_family_size").val();
                    form_data.append('star_health_allied_insu_comprehensive_float_family_size', star_health_allied_insu_comprehensive_float_family_size);
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_star_health_comprehensive_medi_float_json_data = JSON.stringify(Total_Medi_starHealth_comprehensive_float());
                    var years_of_premium = $("#years_of_premium").val();

                    var tot_premium = $("#tot_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    var medi_star_health_comp_float_policy_id = $("#medi_star_health_comp_float_policy_id").val();

                    form_data.append('total_star_health_comprehensive_medi_float_json_data', total_star_health_comprehensive_medi_float_json_data);
                    form_data.append('years_of_premium', years_of_premium);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                    form_data.append('medi_star_health_comp_float_policy_id', medi_star_health_comp_float_policy_id);
                }
                
            } else if (company_txt == "United India Insurance Co Ltd"){
                if (floater_policy_type == "Family Floater 2014") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_mediclaim_floater2014 = JSON.stringify(Total_Mediclaim_floater2014());
                    var name_insured_sum_insured = $("#name_insured_sum_insured").val();
                    var name_insured_premium = $("#name_insured_premium").val();
                    var medi_float_2014_total_premium = $("#medi_float_2014_total_premium").val();
                    var medi_float_2014_child_count = $("#medi_float_2014_child_count").val();
                    var medi_float_2014_child_count_first_premium = $("#medi_float_2014_child_count_first_premium").val();
                    var medi_float_2014_child_total_premium = $("#medi_float_2014_child_total_premium").val();
                    var medi_float_2014_load_description = $("#medi_float_2014_load_description").val();
                    var medi_float_2014_load_amount = $("#medi_float_2014_load_amount").val();
                    var medi_float_2014_load_gross_premium = $("#medi_float_2014_load_gross_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_float_2014_cgst_tot = $("#medi_float_2014_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_float_2014_sgst_tot = $("#medi_float_2014_sgst_tot").val();
                    var medi_float_2014_final_premium = $("#medi_float_2014_final_premium").val();
                    var max_age = $("#max_age").val();

                    var medi_floater_2014_id = $("#medi_floater_2014_id").val();
                    form_data.append('medi_floater_2014_id', medi_floater_2014_id);

                    form_data.append('total_mediclaim_floater2014', total_mediclaim_floater2014);
                    form_data.append('name_insured_sum_insured', name_insured_sum_insured);
                    form_data.append('name_insured_premium', name_insured_premium);
                    form_data.append('medi_float_2014_total_premium', medi_float_2014_total_premium);
                    form_data.append('medi_float_2014_child_count', medi_float_2014_child_count);
                    form_data.append('medi_float_2014_child_count_first_premium', medi_float_2014_child_count_first_premium);
                    form_data.append('medi_float_2014_child_total_premium', medi_float_2014_child_total_premium);
                    form_data.append('medi_float_2014_load_description', medi_float_2014_load_description);
                    form_data.append('medi_float_2014_load_amount', medi_float_2014_load_amount);
                    form_data.append('medi_float_2014_load_gross_premium', medi_float_2014_load_gross_premium);
                    form_data.append('medi_float_2014_cgst_rate', cgst_fire_per);
                    form_data.append('medi_float_2014_cgst_tot', medi_float_2014_cgst_tot);
                    form_data.append('medi_float_2014_sgst_rate', sgst_fire_per);
                    form_data.append('medi_float_2014_sgst_tot', medi_float_2014_sgst_tot);
                    form_data.append('medi_float_2014_final_premium', medi_float_2014_final_premium);
                    form_data.append('max_age', max_age);
                }else if (floater_policy_type == "Family Floater 2020") {
                    var restore_cover = $("#restore_cover").val();
                    var maternity_new_born_baby_cover = $("#maternity_new_born_baby_cover").val();
                    var daily_cash_allowance_cover = $("#daily_cash_allowance_cover").val();

                    form_data.append('floater_policy_type', floater_policy_type);
                    form_data.append('restore_cover', restore_cover);
                    form_data.append('maternity_new_born_baby_cover', maternity_new_born_baby_cover);
                    form_data.append('daily_cash_allowance_cover', daily_cash_allowance_cover);

                    var total_mediclaim_floater2020 = JSON.stringify(Total_Mediclaim_floater2020());
                    var name_insured_sum_insured = $("#name_insured_sum_insured").val();
                    var name_insured_premium = $("#name_insured_premium").val();
                    var name_insured_ncd = $("#name_insured_ncd").val();
                    var name_insured_premium_after_ncd = $("#name_insured_premium_after_ncd").val();
                    var medi_float_2020_total_premium = $("#medi_float_2020_total_premium").val();
                    var medi_float_2020_child_count = $("#medi_float_2020_child_count").val();
                    var medi_float_2020_child_count_first_premium = $("#medi_float_2020_child_count_first_premium").val();
                    var medi_float_2020_child_total_premium = $("#medi_float_2020_child_total_premium").val();
                    var medi_float_2020_load_description = $("#medi_float_2020_load_description").val();
                    var medi_float_2020_load_amount = $("#medi_float_2020_load_amount").val();
                    var medi_float_2020_restore_cover_premium = $("#medi_float_2020_restore_cover_premium").val();
                    var medi_float_2020_maternity_new_bornbaby = $("#medi_float_2020_maternity_new_bornbaby").val();
                    var medi_float_2020_daily_cash_allow_hosp = $("#medi_float_2020_daily_cash_allow_hosp").val();
                    var medi_float_2020_load_gross_premium = $("#medi_float_2020_load_gross_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_float_2020_cgst_tot = $("#medi_float_2020_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_float_2020_sgst_tot = $("#medi_float_2020_sgst_tot").val();
                    var medi_float_2020_final_premium = $("#medi_float_2020_final_premium").val();
                    var max_age = $("#max_age").val();
                    var medi_floater_2020_id = $("#medi_floater_2020_id").val();

                    form_data.append('total_mediclaim_floater2020', total_mediclaim_floater2020);
                    form_data.append('name_insured_sum_insured', name_insured_sum_insured);
                    form_data.append('name_insured_premium', name_insured_premium);
                    form_data.append('name_insured_ncd', name_insured_ncd);
                    form_data.append('name_insured_premium_after_ncd', name_insured_premium_after_ncd);
                    form_data.append('medi_float_2020_total_premium', medi_float_2020_total_premium);
                    form_data.append('medi_float_2020_child_count', medi_float_2020_child_count);
                    form_data.append('medi_float_2020_child_count_first_premium', medi_float_2020_child_count_first_premium);
                    form_data.append('medi_float_2020_child_total_premium', medi_float_2020_child_total_premium);
                    form_data.append('medi_float_2020_load_description', medi_float_2020_load_description);
                    form_data.append('medi_float_2020_load_amount', medi_float_2020_load_amount);
                    form_data.append('medi_float_2020_restore_cover_premium', medi_float_2020_restore_cover_premium);
                    form_data.append('medi_float_2020_maternity_new_bornbaby', medi_float_2020_maternity_new_bornbaby);
                    form_data.append('medi_float_2020_daily_cash_allow_hosp', medi_float_2020_daily_cash_allow_hosp);
                    form_data.append('medi_float_2020_load_gross_premium', medi_float_2020_load_gross_premium);
                    form_data.append('medi_float_2020_cgst_rate', cgst_fire_per);
                    form_data.append('medi_float_2020_cgst_tot', medi_float_2020_cgst_tot);
                    form_data.append('medi_float_2020_sgst_rate', sgst_fire_per);
                    form_data.append('medi_float_2020_sgst_tot', medi_float_2020_sgst_tot);
                    form_data.append('medi_float_2020_final_premium', medi_float_2020_final_premium);
                    form_data.append('max_age', max_age);
                    form_data.append('medi_floater_2020_id', medi_floater_2020_id);
                }
            }else if(company_txt == "Care Health Insurance Co Ltd"){
                if (floater_policy_type == "Care Advantage") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var care_health_insu_care_advantage_float_family_size = $("#care_health_insu_care_advantage_float_family_size").val();
                    var total_care_adv_float_json_data = JSON.stringify(Total_care_adv_float());
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    var care_adv_float_id = $("#care_adv_float_id").val();

                    form_data.append('care_health_insu_care_advantage_float_family_size', care_health_insu_care_advantage_float_family_size);
                    form_data.append('total_care_adv_float_json_data', total_care_adv_float_json_data);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                    form_data.append('care_adv_float_id', care_adv_float_id);
                }else if (floater_policy_type == "Care") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var care_health_insu_care_advantage_float_family_size = $("#care_health_insu_care_advantage_float_family_size").val();
                    var total_care_float_json_data = JSON.stringify(Total_care_float());
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    var care_float_id = $("#care_float_id").val();

                    form_data.append('care_health_insu_care_advantage_float_family_size', care_health_insu_care_advantage_float_family_size);
                    form_data.append('total_care_float_json_data', total_care_float_json_data);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                    form_data.append('care_float_id', care_float_id);
                }                
            }
        }

        if ((policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness") && (policy_type_txt == "Floater" || policy_type_txt=="Common Floater")){
            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);

            if((company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") && policy_type_txt == "Floater"){
                var hdfc_ergo_health_insu_supertopup_float_family_size = $("#hdfc_ergo_health_insu_supertopup_float_family_size").val();
                form_data.append('hdfc_ergo_health_insu_supertopup_float_family_size', hdfc_ergo_health_insu_supertopup_float_family_size);

                var tot_supertopup_float_hdfc_json = JSON.stringify(Total_supertopup_float_Medi_HDFC());
                var years_of_premium = $("#years_of_premium").val();
                var tot_premium = $("#tot_premium").val();
                var load_desc = $("#load_desc").val();
                var load_tot = $("#load_tot").val();
                var less_disc_per = $("#less_disc_per").val();
                var less_disc_tot = $("#less_disc_tot").val();
                var gross_premium_tot = $("#gross_premium_tot").val();
                var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                var max_age = $("#max_age").val();
                var supertopup_float_policy_id = $("#supertopup_float_policy_id").val();

                form_data.append('supertopup_float_policy_id', supertopup_float_policy_id);
                form_data.append('tot_supertopup_float_hdfc_json', tot_supertopup_float_hdfc_json);
                form_data.append('years_of_premium', years_of_premium);
                form_data.append('tot_premium', tot_premium);
                form_data.append('load_desc', load_desc);
                form_data.append('load_tot', load_tot);
                form_data.append('less_disc_per', less_disc_per);
                form_data.append('less_disc_tot', less_disc_tot);
                form_data.append('gross_premium_tot', gross_premium_tot);
                form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);
                form_data.append('max_age', max_age);
            }else if(company_txt == "The New India Assurance Co Ltd" && policy_type_txt == "Floater"){

                var total_the_new_india_supertopup_ind_json_data = JSON.stringify(Total_supertopup_the_new_assu());
                var tot_premium = $("#tot_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                var the_new_india_supertopup_assu_ind_policy_id = $("#the_new_india_supertopup_assu_ind_policy_id").val();

                form_data.append('the_new_india_supertopup_assu_ind_policy_id', the_new_india_supertopup_assu_ind_policy_id);
                form_data.append('total_the_new_india_supertopup_ind_json_data', total_the_new_india_supertopup_ind_json_data);
                form_data.append('tot_premium', tot_premium);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);

            }else if(company_txt == "Star Health & Allied Insurance Co Ltd" && policy_type_txt == "Floater"){
                var star_health_allied_insu_supertopup_float_family_size = $("#star_health_allied_insu_supertopup_float_family_size").val();
                form_data.append('star_health_allied_insu_supertopup_float_family_size', star_health_allied_insu_supertopup_float_family_size);

                var total_star_health_supertopup_float_json_data = JSON.stringify(Total_Medi_starHealth_supertop_float());
                var tot_premium = $("#tot_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                var max_age = $("#max_age").val();
                var medi_star_health_super_float_policy_id = $("#medi_star_health_super_float_policy_id").val();

                form_data.append('total_star_health_supertopup_float_json_data', total_star_health_supertopup_float_json_data);
                form_data.append('tot_premium', tot_premium);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);
                form_data.append('max_age', max_age);
                form_data.append('medi_star_health_super_float_policy_id', medi_star_health_super_float_policy_id);

            }else{
                var family_size = $("#family_size").val();
                form_data.append('family_size', family_size);

                var tot_supertopup_floater_json = JSON.stringify(Total_supertopup_floater());
                var name_insured_policy_option = $("#name_insured_policy_option").val();
                var name_insured_deductable_thershold = $("#name_insured_deductable_thershold").val();
                var name_insured_sum_insured = $("#name_insured_sum_insured").val();
                var name_insured_premium = $("#name_insured_premium").val();
                var supertopup_floater_total_premium = $("#supertopup_floater_total_premium").val();
                var supertopup_floater_description = $("#supertopup_floater_description").val();
                var supertopup_floater_load_amount = $("#supertopup_floater_load_amount").val();
                var supertopup_floater_load_gross_premium = $("#supertopup_floater_load_gross_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var supertopup_floater_cgst_tot = $("#supertopup_floater_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var supertopup_floater_sgst_tot = $("#supertopup_floater_sgst_tot").val();
                var supertopup_floater_final_premium = $("#supertopup_floater_final_premium").val();
                var max_age = $("#max_age").val();
                var supertopup_floater_policy_id = $("#supertopup_floater_policy_id").val();

                form_data.append('tot_supertopup_floater_json', tot_supertopup_floater_json);
                form_data.append('name_insured_policy_option', name_insured_policy_option);
                form_data.append('name_insured_deductable_thershold', name_insured_deductable_thershold);
                form_data.append('name_insured_sum_insured', name_insured_sum_insured);
                form_data.append('name_insured_premium', name_insured_premium);
                form_data.append('supertopup_floater_total_premium', supertopup_floater_total_premium);
                form_data.append('supertopup_floater_description', supertopup_floater_description);
                form_data.append('supertopup_floater_load_amount', supertopup_floater_load_amount);
                form_data.append('supertopup_floater_load_gross_premium', supertopup_floater_load_gross_premium);
                form_data.append('supertopup_floater_cgst_rate', cgst_fire_per);
                form_data.append('supertopup_floater_cgst_tot', supertopup_floater_cgst_tot);
                form_data.append('supertopup_floater_sgst_rate', sgst_fire_per);
                form_data.append('supertopup_floater_sgst_tot', supertopup_floater_sgst_tot);
                form_data.append('supertopup_floater_final_premium', supertopup_floater_final_premium);
                form_data.append('max_age', max_age);
                form_data.append('supertopup_floater_policy_id', supertopup_floater_policy_id);
            }
        }

        if ((policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness") && (policy_type_txt == "Individual" || policy_type_txt=="Common Individual")){
            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);
            
            if((company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") && policy_type_txt == "Individual"){
                var tot_supertopup_ind_hdfc_json = JSON.stringify(Total_supertopup_ind_Medi_HDFC());
                var years_of_premium = $("#years_of_premium").val();
                var tot_premium = $("#tot_premium").val();
                var load_desc = $("#load_desc").val();
                var load_tot = $("#load_tot").val();
                var less_disc_per = $("#less_disc_per").val();
                var less_disc_tot = $("#less_disc_tot").val();
                var gross_premium_tot = $("#gross_premium_tot").val();
                var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                var supertopup_ind_policy_id = $("#supertopup_ind_policy_id").val();

                form_data.append('supertopup_ind_policy_id', supertopup_ind_policy_id);
                form_data.append('tot_supertopup_ind_hdfc_json', tot_supertopup_ind_hdfc_json);
                form_data.append('years_of_premium', years_of_premium);
                form_data.append('tot_premium', tot_premium);
                form_data.append('load_desc', load_desc);
                form_data.append('load_tot', load_tot);
                form_data.append('less_disc_per', less_disc_per);
                form_data.append('less_disc_tot', less_disc_tot);
                form_data.append('gross_premium_tot', gross_premium_tot);
                form_data.append('gross_premium_tot_new', gross_premium_tot_new);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);
            }else if(company_txt == "The New India Assurance Co Ltd" && policy_type_txt == "Individual"){

                var total_the_new_india_supertopup_ind_single_json_data = JSON.stringify(Total_supertopup_the_new_assu_ind());
                var tot_premium = $("#tot_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                var the_new_india_supertopup_assu_ind_single_policy_id = $("#the_new_india_supertopup_assu_ind_single_policy_id").val();

                form_data.append('total_the_new_india_supertopup_ind_single_json_data', total_the_new_india_supertopup_ind_single_json_data);
                form_data.append('tot_premium', tot_premium);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);
                form_data.append('the_new_india_supertopup_assu_ind_single_policy_id', the_new_india_supertopup_assu_ind_single_policy_id);

            }else if(company_txt == "Star Health & Allied Insurance Co Ltd" && policy_type_txt == "Individual"){
                var total_star_health_supertopup_ind_json_data = JSON.stringify(Total_Medi_starHealth_supertop());
                var tot_premium = $("#tot_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                var medi_star_health_super_ind_policy_id = $("#medi_star_health_super_ind_policy_id").val();

                form_data.append('total_star_health_supertopup_ind_json_data', total_star_health_supertopup_ind_json_data);
                form_data.append('tot_premium', tot_premium);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);
                form_data.append('medi_star_health_super_ind_policy_id', medi_star_health_super_ind_policy_id);

            }else{
                var tot_supertopup_ind_json = JSON.stringify(Total_SuperTopUp_Ind());
                var supertopup_ind_total_premium = $("#supertopup_ind_total_premium").val();
                var supertopup_ind_description = $("#supertopup_ind_description").val();
                var supertopup_ind_load_amount = $("#supertopup_ind_load_amount").val();
                var supertopup_ind_load_gross_premium = $("#supertopup_ind_load_gross_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var supertopup_ind_cgst_tot = $("#supertopup_ind_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var supertopup_ind_sgst_tot = $("#supertopup_ind_sgst_tot").val();
                var supertopup_ind_final_premium = $("#supertopup_ind_final_premium").val();
                var supertopup_ind_policy_id = $("#supertopup_ind_policy_id").val();

                form_data.append('supertopup_ind_policy_id', supertopup_ind_policy_id);
                form_data.append('tot_supertopup_ind_json', tot_supertopup_ind_json);
                form_data.append('supertopup_ind_total_premium', supertopup_ind_total_premium);
                form_data.append('supertopup_ind_description', supertopup_ind_description);
                form_data.append('supertopup_ind_load_amount', supertopup_ind_load_amount);
                form_data.append('supertopup_ind_load_gross_premium', supertopup_ind_load_gross_premium);
                form_data.append('supertopup_ind_cgst_rate', cgst_fire_per);
                form_data.append('supertopup_ind_cgst_tot', supertopup_ind_cgst_tot);
                form_data.append('supertopup_ind_sgst_rate', sgst_fire_per);
                form_data.append('supertopup_ind_sgst_tot', supertopup_ind_sgst_tot);
                form_data.append('supertopup_ind_final_premium', supertopup_ind_final_premium);
            }
        }

        if (policy_name_txt == "GMC" && (policy_type_txt=="Individual" || policy_type_txt=="Floater" || policy_type_txt == "Common Individual" || policy_type_txt == "Common Floater")) {
            // alert("Hi");
            var total_GMC = Total_GMC();
            total_GMC = total_GMC.split("&%$#&")
            var total_GMC_data = total_GMC[0];

            if(total_GMC[1] == "true")
            return false;

            var gmc_family_size = $("#gmc_family_size").val();
            var gmc_total_sum_insured = $("#gmc_total_sum_insured").val();
            var gmc_policy_id = $("#gmc_policy_id").val();

            form_data.append('total_gmc_data', total_GMC_data);
            form_data.append('gmc_family_size', gmc_family_size);
            form_data.append('gmc_total_sum_insured', gmc_total_sum_insured);
            form_data.append('gmc_policy_id', gmc_policy_id);
            // return false;
        }

        if (policy_name_txt == "GPA" && (policy_type_txt=="Individual" || policy_type_txt=="Floater" || policy_type_txt == "Common Individual" || policy_type_txt == "Common Floater")) {
            var total_GPA = Total_GPA();
            total_GPA = total_GPA.split("&%$#&")
            var total_GPA_data = total_GPA[0];

            if(total_GPA[1] == "true")
                return false;

            var gmc_family_size = $("#gmc_family_size").val();
            var gmc_total_sum_insured = $("#gmc_total_sum_insured").val();
            var gpa_policy_id = $("#gpa_policy_id").val();

            form_data.append('total_gpa_data', total_GPA_data);
            form_data.append('gpa_family_size', gmc_family_size);
            form_data.append('gpa_total_sum_insured', gmc_total_sum_insured);
            form_data.append('gpa_policy_id', gpa_policy_id);
            // return false;
        }

        if ((policy_name_txt == "Mediclaim" || policy_name_txt == "Cancer Plan" || policy_name_txt == "Daily Cash" || policy_name_txt == "Overseas Mediclaim" || policy_name_txt == "Student Overseas Mediclaim" || policy_name_txt == "Employment Overseas Mediclaim" || policy_name_txt == "Personal Accident") && (policy_type_txt=="Common Individual" || policy_type_txt=="Common Floater")) {
            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);
            if(policy_type_txt=="Common Individual"){
                var tot_commind_json_data = JSON.stringify(Total_CommonInd());
                // alert(tot_commind_json_data);
                // return false;
                var comm_ind_total_amount = $("#comm_ind_total_amount").val();
                var comm_ind_less_discount_rate = $("#comm_ind_less_discount_rate").val();
                var comm_ind_less_discount_tot = $("#comm_ind_less_discount_tot").val();
                var comm_ind_load_desc = $("#comm_ind_load_desc").val();
                var comm_ind_load_tot = $("#comm_ind_load_tot").val();
                var comm_ind_gross_premium = $("#comm_ind_gross_premium").val();
                var comm_ind_gross_premium_new = $("#comm_ind_gross_premium_new").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var comm_ind_cgst_tot = $("#comm_ind_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var comm_ind_sgst_tot = $("#comm_ind_sgst_tot").val();
                var comm_ind_final_premium = $("#comm_ind_final_premium").val();
                var common_ind_policy_id = $("#common_ind_policy_id").val();

                form_data.append('common_ind_policy_id', common_ind_policy_id);
                form_data.append('tot_commind_json_data', tot_commind_json_data);
                form_data.append('comm_ind_total_amount', comm_ind_total_amount);
                form_data.append('comm_ind_less_discount_rate', comm_ind_less_discount_rate);
                form_data.append('comm_ind_less_discount_tot', comm_ind_less_discount_tot);
                form_data.append('comm_ind_load_desc', comm_ind_load_desc);
                form_data.append('comm_ind_load_tot', comm_ind_load_tot);
                form_data.append('comm_ind_gross_premium', comm_ind_gross_premium);
                form_data.append('comm_ind_gross_premium_new', comm_ind_gross_premium_new);
                form_data.append('comm_ind_cgst_rate', cgst_fire_per);
                form_data.append('comm_ind_cgst_tot', comm_ind_cgst_tot);
                form_data.append('comm_ind_sgst_rate', sgst_fire_per);
                form_data.append('comm_ind_sgst_tot', comm_ind_sgst_tot);
                form_data.append('comm_ind_final_premium', comm_ind_final_premium);

            }else if(policy_type_txt=="Common Floater"){
                var tot_commfloat_json_data = JSON.stringify(Total_CommFloat());
                //                 alert(tot_commfloat_json_data);
                // return false;
                var comm_float_total_amount = $("#comm_float_total_amount").val();
                var comm_float_less_discount_rate = $("#comm_float_less_discount_rate").val();
                var comm_float_less_discount_tot = $("#comm_float_less_discount_tot").val();
                var comm_float_load_desc = $("#comm_float_load_desc").val();
                var comm_float_load_tot = $("#comm_float_load_tot").val();
                var comm_float_gross_premium = $("#comm_float_gross_premium").val();
                var comm_float_gross_premium_new = $("#comm_float_gross_premium_new").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var comm_float_cgst_tot = $("#comm_float_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var comm_float_sgst_tot = $("#comm_float_sgst_tot").val();
                var comm_float_final_premium = $("#comm_float_final_premium").val();
                var common_float_policy_id = $("#common_float_policy_id").val();

                form_data.append('common_float_policy_id', common_float_policy_id);
                form_data.append('tot_commfloat_json_data', tot_commfloat_json_data);
                form_data.append('comm_float_total_amount', comm_float_total_amount);
                form_data.append('comm_float_less_discount_rate', comm_float_less_discount_rate);
                form_data.append('comm_float_less_discount_tot', comm_float_less_discount_tot);
                form_data.append('comm_float_load_desc', comm_float_load_desc);
                form_data.append('comm_float_load_tot', comm_float_load_tot);
                form_data.append('comm_float_gross_premium', comm_float_gross_premium);
                form_data.append('comm_float_gross_premium_new', comm_float_gross_premium_new);
                form_data.append('comm_float_cgst_rate', cgst_fire_per);
                form_data.append('comm_float_cgst_tot', comm_float_cgst_tot);
                form_data.append('comm_float_sgst_rate', sgst_fire_per);
                form_data.append('comm_float_sgst_tot', comm_float_sgst_tot);
                form_data.append('comm_float_final_premium', comm_float_final_premium);
            }
        }

        if(policy_name_txt == "Private Car"){

            var vehicle_make_model = $("#vehicle_make_model").val();
            var vehicle_reg_no = $("#vehicle_reg_no").val();
            var insu_declared_val = $("#insu_declared_val").val();
            var non_elect_access_val = $("#non_elect_access_val").val();
            var elect_access_val = $("#elect_access_val").val();
            var lpg_cng_idv_val = $("#lpg_cng_idv_val").val();
            var trailer_val = $("#trailer_val").val();
            var year_manufact_val = $("#year_manufact_val").val();
            var rta_city_code = $("#rta_city_code").val();
            var rta_city = $("#rta_city").val();
            var rta_city_cat = $("#rta_city_cat").val();
            var cubic_capacity_val = $("#cubic_capacity_val").val();
            var calculation_method = $("#calculation_method").val();
            var type_of_cover = $("#type_of_cover").val();
            var prev_policy_expiry_date = $("#prev_policy_expiry_date").val();
            var policy_period = $("#policy_period").val();
            var inception_date = $("#inception_date").val();
            var expiry_date = $("#expiry_date").val();

            var od_basic_od_tot = $("#od_basic_od_tot").val();
            var od_special_disc_per = $("#od_special_disc_per").val();
            var od_special_disc_tot = $("#od_special_disc_tot").val();
            var od_special_load_per = $("#od_special_load_per").val();
            var od_special_load_tot = $("#od_special_load_tot").val();
            var od_net_basic_od_tot = $("#od_net_basic_od_tot").val();
            var od_non_elec_acc_tot = $("#od_non_elec_acc_tot").val();
            var od_elec_acc_tot = $("#od_elec_acc_tot").val();
            var od_bi_fuel_kit_tot = $("#od_bi_fuel_kit_tot").val();
            var od_od_basic_od1_tot = $("#od_od_basic_od1_tot").val();
            var od_trailer_tot = $("#od_trailer_tot").val();
            var od_geographical_area_tot = $("#od_geographical_area_tot").val();
            var od_embassy_load_tot = $("#od_embassy_load_tot").val();
            var od_fibre_glass_tank_tot = $("#od_fibre_glass_tank_tot").val();
            var od_driving_tut_tot = $("#od_driving_tut_tot").val();
            var od_rallies_tot = $("#od_rallies_tot").val();
            var od_basic_od2_tot = $("#od_basic_od2_tot").val();
            var od_anti_tot = $("#od_anti_tot").val();
            var od_handicap_tot = $("#od_handicap_tot").val();
            var od_aai_tot = $("#od_aai_tot").val();
            var od_vintage_tot = $("#od_vintage_tot").val();
            var od_own_premises_tot = $("#od_own_premises_tot").val();
            var od_voluntary_deduc_tot = $("#od_voluntary_deduc_tot").val();
            var od_basic_od3_tot = $("#od_basic_od3_tot").val();
            var od_ncb_per = $("#od_ncb_per").val();
            var od_ncb_tot = $("#od_ncb_tot").val();
            var od_tot_anual_od_premium = $("#od_tot_anual_od_premium").val();
            var od_tot_od_premium_policy_period = $("#od_tot_od_premium_policy_period").val();

            var tp_basic_tp_tot = $("#tp_basic_tp_tot").val();
            var tp_restr_tppd = $("#tp_restr_tppd").val();
            var tp_trailer_tot = $("#tp_trailer_tot").val();
            var tp_bi_fuel_tot = $("#tp_bi_fuel_tot").val();
            var tp_basic_tp1_tot = $("#tp_basic_tp1_tot").val();
            var tp_compul_own_driv_tot = $("#tp_compul_own_driv_tot").val();
            var tp_geographical_area_tot = $("#tp_geographical_area_tot").val();
            var tp_unnamed_papax_tot = $("#tp_unnamed_papax_tot").val();
            var tp_no_seats_limit_person_tot = $("#tp_no_seats_limit_person_tot").val();
            var tp_ll_drv_emp_tot = $("#tp_ll_drv_emp_tot").val();
            var tp_no_drv_emp_tot = $("#tp_no_drv_emp_tot").val();
            var tp_ll_defe_tot = $("#tp_ll_defe_tot").val();
            var tp_noof_person_tot = $("#tp_noof_person_tot").val();
            var tp_pa_paid_drv_tot = $("#tp_pa_paid_drv_tot").val();
            // var tp_blank_tot = $("#tp_blank_tot").val();
            var tp_basic_tp2_tot = $("#tp_basic_tp2_tot").val();
            var tp_tot_anual_tp_premium = $("#tp_tot_anual_tp_premium").val();
            var tp_tot_premium_policy_period = $("#tp_tot_premium_policy_period").val();
            var tot_othercover_ind_json = JSON.stringify(Total_OtherCover());
            var plan_name = $("#plan_name").val();
            var plan_name_tot = $("#plan_name_tot").val();
            var tot_anual_cover_premium = $("#tot_anual_cover_premium").val();
            var tot_cover_premium_period = $("#tot_cover_premium_period").val();

            var tot_premium = $("#tot_premium").val();
            var cgst_fire_per = $("#cgst_fire_per").val();
            var motor_cgst_tot = $("#motor_cgst_tot").val();
            var sgst_fire_per = $("#sgst_fire_per").val();
            var motor_sgst_tot = $("#motor_sgst_tot").val();
            // var gst_rate = $("#gst_rate").val();
            // var gst_tot = $("#gst_tot").val();
            var tot_payable_premium = $("#tot_payable_premium").val();
            var private_car_policy_id = $("#private_car_policy_id").val();

            form_data.append('private_car_policy_id', private_car_policy_id);
            form_data.append('vehicle_make_model', vehicle_make_model);
            form_data.append('vehicle_reg_no', vehicle_reg_no);
            form_data.append('insu_declared_val', insu_declared_val);
            form_data.append('non_elect_access_val', non_elect_access_val);
            form_data.append('elect_access_val', elect_access_val);
            form_data.append('lpg_cng_idv_val', lpg_cng_idv_val);
            form_data.append('trailer_val', trailer_val);
            form_data.append('year_manufact_val', year_manufact_val);
            form_data.append('rta_city_code', rta_city_code);
            form_data.append('rta_city', rta_city);
            form_data.append('rta_city_cat', rta_city_cat);
            form_data.append('cubic_capacity_val', cubic_capacity_val);
            form_data.append('calculation_method', calculation_method);
            form_data.append('type_of_cover', type_of_cover);
            form_data.append('prev_policy_expiry_date', prev_policy_expiry_date);
            form_data.append('policy_period', policy_period);
            form_data.append('inception_date', inception_date);
            form_data.append('expiry_date', expiry_date);

            form_data.append('od_basic_od_tot', od_basic_od_tot);
            form_data.append('od_special_disc_per', od_special_disc_per);
            form_data.append('od_special_disc_tot', od_special_disc_tot);
            form_data.append('od_special_load_per', od_special_load_per);
            form_data.append('od_special_load_tot', od_special_load_tot);
            form_data.append('od_net_basic_od_tot', od_net_basic_od_tot);
            form_data.append('od_non_elec_acc_tot', od_non_elec_acc_tot);
            form_data.append('od_elec_acc_tot', od_elec_acc_tot);
            form_data.append('od_bi_fuel_kit_tot', od_bi_fuel_kit_tot);
            form_data.append('od_od_basic_od1_tot', od_od_basic_od1_tot);
            form_data.append('od_trailer_tot', od_trailer_tot);
            form_data.append('od_geographical_area_tot', od_geographical_area_tot);
            form_data.append('od_embassy_load_tot', od_embassy_load_tot);
            form_data.append('od_fibre_glass_tank_tot', od_fibre_glass_tank_tot);
            form_data.append('od_driving_tut_tot', od_driving_tut_tot);
            form_data.append('od_rallies_tot', od_rallies_tot);
            form_data.append('od_basic_od2_tot', od_basic_od2_tot);
            form_data.append('od_anti_tot', od_anti_tot);
            form_data.append('od_handicap_tot', od_handicap_tot);
            form_data.append('od_aai_tot', od_aai_tot);
            form_data.append('od_vintage_tot', od_vintage_tot);
            form_data.append('od_own_premises_tot', od_own_premises_tot);
            form_data.append('od_voluntary_deduc_tot', od_voluntary_deduc_tot);
            form_data.append('od_basic_od3_tot', od_basic_od3_tot);
            form_data.append('od_ncb_per', od_ncb_per);
            form_data.append('od_ncb_tot', od_ncb_tot);
            form_data.append('od_tot_anual_od_premium', od_tot_anual_od_premium);
            form_data.append('od_tot_od_premium_policy_period', od_tot_od_premium_policy_period);

            form_data.append('tp_basic_tp_tot', tp_basic_tp_tot);
            form_data.append('tp_restr_tppd', tp_restr_tppd);
            form_data.append('tp_trailer_tot', tp_trailer_tot);
            form_data.append('tp_bi_fuel_tot', tp_bi_fuel_tot);
            form_data.append('tp_basic_tp1_tot', tp_basic_tp1_tot);
            form_data.append('tp_compul_own_driv_tot', tp_compul_own_driv_tot);
            form_data.append('tp_geographical_area_tot', tp_geographical_area_tot);
            form_data.append('tp_unnamed_papax_tot', tp_unnamed_papax_tot);
            form_data.append('tp_no_seats_limit_person_tot', tp_no_seats_limit_person_tot);
            form_data.append('tp_ll_drv_emp_tot', tp_ll_drv_emp_tot);
            form_data.append('tp_no_drv_emp_tot', tp_no_drv_emp_tot);
            form_data.append('tp_noof_person_tot', tp_noof_person_tot);
            form_data.append('tp_pa_paid_drv_tot', tp_pa_paid_drv_tot);
            form_data.append('tp_ll_defe_tot', tp_ll_defe_tot);
            // form_data.append('tp_blank_tot', tp_blank_tot);tp_ll_defe_tot
            form_data.append('tp_basic_tp2_tot', tp_basic_tp2_tot);
            form_data.append('tp_tot_anual_tp_premium', tp_tot_anual_tp_premium);
            form_data.append('tp_tot_premium_policy_period', tp_tot_premium_policy_period);
            form_data.append('plan_name', plan_name);
            form_data.append('plan_name_tot', plan_name_tot);
            form_data.append('tot_othercover_ind_json', tot_othercover_ind_json);
            form_data.append('tot_anual_cover_premium', tot_anual_cover_premium);
            form_data.append('tot_cover_premium_period', tot_cover_premium_period);

            form_data.append('tot_premium', tot_premium);
            form_data.append('motor_cgst_rate', cgst_fire_per);
            form_data.append('motor_cgst_tot', motor_cgst_tot);
            form_data.append('motor_sgst_rate', sgst_fire_per);
            form_data.append('motor_sgst_tot', motor_sgst_tot);
            // form_data.append('gst_rate', gst_rate);
            // form_data.append('gst_tot', gst_tot);
            form_data.append('tot_payable_premium', tot_payable_premium);

        }

        if(policy_name_txt == "2 Wheeler"){
            
            var vehicle_make_model = $("#vehicle_make_model").val();
            var vehicle_reg_no = $("#vehicle_reg_no").val();
            var insu_declared_val = $("#insu_declared_val").val();
            var elect_acc_val = $("#elect_acc_val").val();
            var other_elect_acc_val = $("#other_elect_acc_val").val();
            var policy_period_tenure_years = $("#policy_period_tenure_years").val();
            var previous_policy_expiry_date_tenur = $("#previous_policy_expiry_date_tenur").val();
            var year_manufact_val = $("#year_manufact_val").val();
            var rta_city_code = $("#rta_city_code").val();
            var rta_city = $("#rta_city").val();
            var rta_city_cat = $("#rta_city_cat").val();
            var cubic_capacity_val = $("#cubic_capacity_val").val();
            var type_of_cover = $("#type_of_cover").val();
            var policy_period = $("#policy_period").val();
            var inception_date = $("#inception_date").val();
            var expiry_date = $("#expiry_date").val();

            form_data.append('vehicle_make_model', vehicle_make_model);
            form_data.append('vehicle_reg_no', vehicle_reg_no);
            form_data.append('insu_declared_val', insu_declared_val);
            form_data.append('elect_acc_val', elect_acc_val);
            form_data.append('other_elect_acc_val', other_elect_acc_val);
            form_data.append('policy_period_tenure_years', policy_period_tenure_years);
            form_data.append('previous_policy_expiry_date_tenur', previous_policy_expiry_date_tenur);
            form_data.append('year_manufact_val', year_manufact_val);
            form_data.append('rta_city_code', rta_city_code);
            form_data.append('rta_city', rta_city);
            form_data.append('rta_city_cat', rta_city_cat);
            form_data.append('cubic_capacity_val', cubic_capacity_val);
            form_data.append('type_of_cover', type_of_cover);
            form_data.append('policy_period', policy_period);
            form_data.append('inception_date', inception_date);
            form_data.append('expiry_date', expiry_date);

            var od_basic_od_tot = $("#od_basic_od_tot").val();
            var od_special_disc_per = $("#od_special_disc_per").val();
            var od_special_disc_tot = $("#od_special_disc_tot").val();
            var od_special_load_per = $("#od_special_load_per").val();
            var od_special_load_tot = $("#od_special_load_tot").val();
            var od_net_basic_od_tot = $("#od_net_basic_od_tot").val();
            var od_elec_acc_tot = $("#od_elec_acc_tot").val();
            var od_other_elec_acc_tot = $("#od_other_elec_acc_tot").val();
            var od_od_basic_od1_tot = $("#od_od_basic_od1_tot").val();
            var od_geographical_area_tot = $("#od_geographical_area_tot").val();
            var od_rallies_tot = $("#od_rallies_tot").val();
            var od_embassy_load_tot = $("#od_embassy_load_tot").val();
            var od_basic_od2_tot = $("#od_basic_od2_tot").val();
            var od_anti_theft_tot = $("#od_anti_theft_tot").val();
            var od_handicap_tot = $("#od_handicap_tot").val();
            var od_aai_tot = $("#od_aai_tot").val();
            var od_side_car_tot = $("#od_side_car_tot").val();
            var od_own_premises_tot = $("#od_own_premises_tot").val();
            var od_voluntary_excess_tot = $("#od_voluntary_excess_tot").val();
            var od_basic_od3_tot = $("#od_basic_od3_tot").val();
            var od_ncb_per = $("#od_ncb_per").val();
            var od_ncb_tot = $("#od_ncb_tot").val();
            var od_tot_od_premium_policy_period = $("#od_tot_od_premium_policy_period").val();

            form_data.append('od_basic_od_tot', od_basic_od_tot);
            form_data.append('od_special_disc_per', od_special_disc_per);
            form_data.append('od_special_disc_tot', od_special_disc_tot);
            form_data.append('od_special_load_per', od_special_load_per);
            form_data.append('od_special_load_tot', od_special_load_tot);
            form_data.append('od_net_basic_od_tot', od_net_basic_od_tot);
            form_data.append('od_elec_acc_tot', od_elec_acc_tot);
            form_data.append('od_other_elec_acc_tot', od_other_elec_acc_tot);
            form_data.append('od_od_basic_od1_tot', od_od_basic_od1_tot);
            form_data.append('od_geographical_area_tot', od_geographical_area_tot);
            form_data.append('od_rallies_tot', od_rallies_tot);
            form_data.append('od_embassy_load_tot', od_embassy_load_tot);
            form_data.append('od_basic_od2_tot', od_basic_od2_tot);
            form_data.append('od_anti_theft_tot', od_anti_theft_tot);
            form_data.append('od_handicap_tot', od_handicap_tot);
            form_data.append('od_aai_tot', od_aai_tot);
            form_data.append('od_side_car_tot', od_side_car_tot);
            form_data.append('od_own_premises_tot', od_own_premises_tot);
            form_data.append('od_voluntary_excess_tot', od_voluntary_excess_tot);
            form_data.append('od_basic_od3_tot', od_basic_od3_tot);
            form_data.append('od_ncb_per', od_ncb_per);
            form_data.append('od_ncb_tot', od_ncb_tot);
            form_data.append('od_tot_od_premium_policy_period', od_tot_od_premium_policy_period);

            var tp_basic_tp_tot = $("#tp_basic_tp_tot").val();
            var tp_restr_tppd_tot = $("#tp_restr_tppd_tot").val();
            var tp_basic_tp1_tot = $("#tp_basic_tp1_tot").val();
            var tp_geographical_area_tot = $("#tp_geographical_area_tot").val();
            var tp_compul_pa_own_driv_tot = $("#tp_compul_pa_own_driv_tot").val();
            var tp_unnamed_pa_tot = $("#tp_unnamed_pa_tot").val();
            var tp_ll_drv_emp_imt28_tot = $("#tp_ll_drv_emp_imt28_tot").val();
            var tp_ll_other_emp_tot = $("#tp_ll_other_emp_tot").val();
            var tp_noof_other_emp_tot = $("#tp_noof_other_emp_tot").val();
            var tp_basic_tp2_tot = $("#tp_basic_tp2_tot").val();
            var tp_tot_premium_policy_period = $("#tp_tot_premium_policy_period").val();
            var tot_othercover_ind_json = JSON.stringify(Total_OtherCover());
            // alert(tot_othercover_ind_json);
            // return false;
            var plan_name = $("#plan_name").val();
            var plan_name_tot = $("#plan_name_tot").val();
            var tot_cover_premium_period = $("#tot_cover_premium_period").val();

            form_data.append('tp_basic_tp_tot', tp_basic_tp_tot);
            form_data.append('tp_restr_tppd_tot', tp_restr_tppd_tot);
            form_data.append('tp_basic_tp1_tot', tp_basic_tp1_tot);
            form_data.append('tp_geographical_area_tot', tp_geographical_area_tot);
            form_data.append('tp_compul_pa_own_driv_tot', tp_compul_pa_own_driv_tot);
            form_data.append('tp_unnamed_pa_tot', tp_unnamed_pa_tot);
            form_data.append('tp_ll_drv_emp_imt28_tot', tp_ll_drv_emp_imt28_tot);
            form_data.append('tp_ll_other_emp_tot', tp_ll_other_emp_tot);
            form_data.append('tp_noof_other_emp_tot', tp_noof_other_emp_tot);
            form_data.append('tp_basic_tp2_tot', tp_basic_tp2_tot);
            form_data.append('tp_tot_premium_policy_period', tp_tot_premium_policy_period);
            form_data.append('plan_name', plan_name);
            form_data.append('plan_name_tot', plan_name_tot);
            form_data.append('tot_othercover_ind_json', tot_othercover_ind_json);
            form_data.append('tot_cover_premium_period', tot_cover_premium_period);


            var tot_premium = $("#tot_premium").val();
            var cgst_fire_per = $("#cgst_fire_per").val();
            var motor_cgst_tot = $("#motor_cgst_tot").val();
            var sgst_fire_per = $("#sgst_fire_per").val();
            var motor_sgst_tot = $("#motor_sgst_tot").val();
            // var gst_rate = $("#gst_rate").val();
            // var gst_tot = $("#gst_tot").val();
            var tot_payable_premium = $("#tot_payable_premium").val();
            var two_wheeler_policy_id = $("#two_wheeler_policy_id").val();

            form_data.append('two_wheeler_policy_id', two_wheeler_policy_id);
            form_data.append('tot_premium', tot_premium);
            form_data.append('motor_cgst_rate', cgst_fire_per);
            form_data.append('motor_cgst_tot', motor_cgst_tot);
            form_data.append('motor_sgst_rate', sgst_fire_per);
            form_data.append('motor_sgst_tot', motor_sgst_tot);
            // form_data.append('gst_rate', gst_rate);
            // form_data.append('gst_tot', gst_tot);
            form_data.append('tot_payable_premium', tot_payable_premium);
        }

        if (policy_name_txt == "Commercial Vehicle") {

            var commercial_policy_id = $("#commercial_policy_id").val();
            var vehicle_make_model = $("#vehicle_make_model").val();
            var vehicle_reg_no = $("#vehicle_reg_no").val();
            var insu_declared_val = $("#insu_declared_val").val();
            var elect_acc_val = $("#elect_acc_val").val();
            var lpg_cng_idv_val = $("#lpg_cng_idv_val").val();
            var year_manufact_val = $("#year_manufact_val").val();
            var zone_city_code = $("#zone_city_code").val();
            var zone_city = $("#zone_city").val();
            var zone_city_cat = $("#zone_city_cat").val();
            var gvw_val = $("#gvw_val").val();
            var class_val = $("#class_val").val();
            var type_of_cover = $("#type_of_cover").val();
            var policy_period = $("#policy_period").val();
            var inception_date = $("#inception_date").val();
            var expiry_date = $("#expiry_date").val();

            form_data.append('commercial_policy_id', commercial_policy_id);
            form_data.append('vehicle_make_model', vehicle_make_model);
            form_data.append('vehicle_reg_no', vehicle_reg_no);
            form_data.append('insu_declared_val', insu_declared_val);
            form_data.append('elect_acc_val', elect_acc_val);
            form_data.append('lpg_cng_idv_val', lpg_cng_idv_val);
            form_data.append('year_manufact_val', year_manufact_val);
            form_data.append('zone_city_code', zone_city_code);
            form_data.append('zone_city', zone_city);
            form_data.append('zone_city_cat', zone_city_cat);
            form_data.append('gvw_val', gvw_val);
            form_data.append('class_val', class_val);
            form_data.append('type_of_cover', type_of_cover);
            form_data.append('policy_period', policy_period);
            form_data.append('inception_date', inception_date);
            form_data.append('expiry_date', expiry_date);

            var od_basic_od_tot = $("#od_basic_od_tot").val();
            var od_elec_acc_tot = $("#od_elec_acc_tot").val();
            var od_trailer_tot = $("#od_trailer_tot").val();
            var od_bi_fuel_kit_tot = $("#od_bi_fuel_kit_tot").val();
            var od_od_basic_od1_tot = $("#od_od_basic_od1_tot").val();
            var od_geog_area_tot = $("#od_geog_area_tot").val();
            var od_fiber_glass_tank_tot = $("#od_fiber_glass_tank_tot").val();
            var od_imt_cover_mud_guard_tot = $("#od_imt_cover_mud_guard_tot").val();
            var od_basic_od2_tot = $("#od_basic_od2_tot").val();
            var od_basic_od3_tot = $("#od_basic_od3_tot").val();
            var od_ncb_per = $("#od_ncb_per").val();
            var od_ncb_tot = $("#od_ncb_tot").val();
            var od_tot_anual_od_premium = $("#od_tot_anual_od_premium").val();
            var od_special_disc_per = $("#od_special_disc_per").val();
            var od_special_disc_tot = $("#od_special_disc_tot").val();
            var od_special_load_per = $("#od_special_load_per").val();
            var od_special_load_tot = $("#od_special_load_tot").val();
            var od_tot_od_premium = $("#od_tot_od_premium").val();

            form_data.append('od_basic_od_tot', od_basic_od_tot);
            form_data.append('od_elec_acc_tot', od_elec_acc_tot);
            form_data.append('od_trailer_tot', od_trailer_tot);
            form_data.append('od_bi_fuel_kit_tot', od_bi_fuel_kit_tot);
            form_data.append('od_od_basic_od1_tot', od_od_basic_od1_tot);
            form_data.append('od_geog_area_tot', od_geog_area_tot);
            form_data.append('od_fiber_glass_tank_tot', od_fiber_glass_tank_tot);
            form_data.append('od_imt_cover_mud_guard_tot', od_imt_cover_mud_guard_tot);
            form_data.append('od_basic_od2_tot', od_basic_od2_tot);
            form_data.append('od_basic_od3_tot', od_basic_od3_tot);
            form_data.append('od_ncb_per', od_ncb_per);
            form_data.append('od_ncb_tot', od_ncb_tot);
            form_data.append('od_tot_anual_od_premium', od_tot_anual_od_premium);
            form_data.append('od_special_disc_per', od_special_disc_per);
            form_data.append('od_special_disc_tot', od_special_disc_tot);
            form_data.append('od_special_load_per', od_special_load_per);
            form_data.append('od_special_load_tot', od_special_load_tot);
            form_data.append('od_tot_od_premium', od_tot_od_premium);

            var tp_basic_tp_tot = $("#tp_basic_tp_tot").val();
            var tp_restr_tppd_tot = $("#tp_restr_tppd_tot").val();
            var tp_trailer_tot = $("#tp_trailer_tot").val();
            var tp_bi_fuel_kit_tot = $("#tp_bi_fuel_kit_tot").val();
            var tp_basic_tp1_tot = $("#tp_basic_tp1_tot").val();
            var tp_geog_area_tot = $("#tp_geog_area_tot").val();
            var tp_compul_pa_own_driv_tot = $("#tp_compul_pa_own_driv_tot").val();
            var tp_pa_paid_driver_tot = $("#tp_pa_paid_driver_tot").val();
            var tp_ll_emp_non_fare_tot = $("#tp_ll_emp_non_fare_tot").val();
            var tp_ll_driver_cleaner_tot = $("#tp_ll_driver_cleaner_tot").val();
            var tp_ll_person_operation_tot = $("#tp_ll_person_operation_tot").val();
            var tp_basic_tp2_tot = $("#tp_basic_tp2_tot").val();
            var tp_tot_premium = $("#tp_tot_premium").val();
            var tp_consumables = $("#tp_consumables").val();
            var tp_zero_depreciation = $("#tp_zero_depreciation").val();
            var tp_road_side_ass = $("#tp_road_side_ass").val();
            var tp_tot_addon_premium = $("#tp_tot_addon_premium").val();

            form_data.append('tp_basic_tp_tot', tp_basic_tp_tot);
            form_data.append('tp_restr_tppd_tot', tp_restr_tppd_tot);
            form_data.append('tp_trailer_tot', tp_trailer_tot);
            form_data.append('tp_bi_fuel_kit_tot', tp_bi_fuel_kit_tot);
            form_data.append('tp_basic_tp1_tot', tp_basic_tp1_tot);
            form_data.append('tp_geog_area_tot', tp_geog_area_tot);
            form_data.append('tp_compul_pa_own_driv_tot', tp_compul_pa_own_driv_tot);
            form_data.append('tp_pa_paid_driver_tot', tp_pa_paid_driver_tot);
            form_data.append('tp_ll_emp_non_fare_tot', tp_ll_emp_non_fare_tot);
            form_data.append('tp_ll_driver_cleaner_tot', tp_ll_driver_cleaner_tot);
            form_data.append('tp_ll_person_operation_tot', tp_ll_person_operation_tot);
            form_data.append('tp_basic_tp2_tot', tp_basic_tp2_tot);
            form_data.append('tp_tot_premium', tp_tot_premium);
            form_data.append('tp_consumables', tp_consumables);
            form_data.append('tp_zero_depreciation', tp_zero_depreciation);
            form_data.append('tp_road_side_ass', tp_road_side_ass);
            form_data.append('tp_tot_addon_premium', tp_tot_addon_premium);

            var tot_owd_premium = $("#tot_owd_premium").val();
            var tot_owd_addon_premium = $("#tot_owd_addon_premium").val();
            var tot_btp_premium = $("#tot_btp_premium").val();
            var tot_other_tp_premium = $("#tot_other_tp_premium").val();
            var tot_premium = $("#tot_premium").val();
            var tot_owd_cgst_rate = $("#tot_owd_cgst_rate").val();
            var tot_owd_sgst_rate = $("#tot_owd_sgst_rate").val();
            var tot_owd_addon_cgst_rate = $("#tot_owd_addon_cgst_rate").val();
            var tot_owd_addon_sgst_rate = $("#tot_owd_addon_sgst_rate").val();
            var tot_btp_cgst_rate = $("#tot_btp_cgst_rate").val();
            var tot_btp_sgst_rate = $("#tot_btp_sgst_rate").val();
            var tot_other_tp_cgst_rate = $("#tot_other_tp_cgst_rate").val();
            var tot_other_tp_sgst_rate = $("#tot_other_tp_sgst_rate").val();
            var tot_owd_gst = $("#tot_owd_gst").val();
            var tot_owd_addon_gst = $("#tot_owd_addon_gst").val();
            var tot_btp_gst = $("#tot_btp_gst").val();
            var tot_other_tp_gst = $("#tot_other_tp_gst").val();
            var tot_gst_amt = $("#tot_gst_amt").val();
            var tot_owd_final = $("#tot_owd_final").val();
            var tot_owd_addon_final = $("#tot_owd_addon_final").val();
            var tot_btp_final = $("#tot_btp_final").val();
            var tot_other_tp_final = $("#tot_other_tp_final").val();
            var tot_final_premium = $("#tot_final_premium").val();
            var tot_payable_premium = $("#tot_payable_premium").val();

            form_data.append('tot_owd_premium', tot_owd_premium);
            form_data.append('tot_owd_addon_premium', tot_owd_addon_premium);
            form_data.append('tot_btp_premium', tot_btp_premium);
            form_data.append('tot_other_tp_premium', tot_other_tp_premium);
            form_data.append('tot_premium', tot_premium);
            form_data.append('tot_owd_cgst_rate', tot_owd_cgst_rate);
            form_data.append('tot_owd_sgst_rate', tot_owd_sgst_rate);
            form_data.append('tot_owd_addon_cgst_rate', tot_owd_addon_cgst_rate);
            form_data.append('tot_owd_addon_sgst_rate', tot_owd_addon_sgst_rate);
            form_data.append('tot_btp_cgst_rate', tot_btp_cgst_rate);
            form_data.append('tot_btp_sgst_rate', tot_btp_sgst_rate);
            form_data.append('tot_other_tp_cgst_rate', tot_other_tp_cgst_rate);
            form_data.append('tot_other_tp_sgst_rate', tot_other_tp_sgst_rate);
            form_data.append('tot_owd_gst', tot_owd_gst);
            form_data.append('tot_owd_addon_gst', tot_owd_addon_gst);
            form_data.append('tot_btp_gst', tot_btp_gst);
            form_data.append('tot_other_tp_gst', tot_other_tp_gst);
            form_data.append('tot_gst_amt', tot_gst_amt);
            form_data.append('tot_owd_final', tot_owd_final);
            form_data.append('tot_owd_addon_final', tot_owd_addon_final);
            form_data.append('tot_btp_final', tot_btp_final);
            form_data.append('tot_other_tp_final', tot_other_tp_final);
            form_data.append('tot_final_premium', tot_final_premium);
            form_data.append('tot_payable_premium', tot_payable_premium);

        }

        if ((policy_name_txt == "Personal Accident") && (policy_type_txt == "Individual" || policy_type_txt == "Floater")) {

            // var total_pa_ind_json_data = Total_PAccident();
            var total_pa_ind_json_data = JSON.stringify(Total_PAccident());
            var tot_premium = $("#tot_premium").val();
            var less_disc_rate = $("#less_disc_rate").val();
            var less_disc_tot = $("#less_disc_tot").val();
            var gross_premium = $("#gross_premium").val();
            var gross_premium_new = $("#gross_premium_new").val();
            var cgst_fire_per = $("#cgst_fire_per").val();
            var medi_cgst_tot = $("#medi_cgst_tot").val();
            var sgst_fire_per = $("#sgst_fire_per").val();
            var medi_sgst_tot = $("#medi_sgst_tot").val();
            var medi_final_premium = $("#medi_final_premium").val();
            var paccident_policy_id = $("#paccident_policy_id").val();

            form_data.append('paccident_policy_id', paccident_policy_id);
            form_data.append('total_pa_ind_json_data', total_pa_ind_json_data);
            form_data.append('tot_premium', tot_premium);
            form_data.append('less_disc_rate', less_disc_rate);
            form_data.append('less_disc_tot', less_disc_tot);
            form_data.append('gross_premium', gross_premium);
            form_data.append('gross_premium_new', gross_premium_new);
            form_data.append('medi_cgst_rate', cgst_fire_per);
            form_data.append('medi_cgst_tot', medi_cgst_tot);
            form_data.append('medi_sgst_rate', sgst_fire_per);
            form_data.append('medi_sgst_tot', medi_sgst_tot);
            form_data.append('medi_final_premium', medi_final_premium);
        }
        // Calculation Section End

        var url = "<?php echo $base_url; ?>master/cron_job_test/updatepolicy";

        $.ajax({
            url: url,
            data: form_data,
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},

            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#serial_no").val("");
                    $("#serial_no").removeClass("parsley-error");
                    setTimeout(function() {
                        window.location.href = '<?php echo base_url(); ?>master/policy/index';
                    }, 1000);
                } else {
                    if (data["messages"] != "") {
                        if (data["messages"]["policy_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["policy_upload_err"], message_icone = "error");
                        if (data["messages"]["policy_upload_err"] != "") {
                            $("#policy_upload").addClass("parsley-error");
                            $("#policy_upload_err").addClass("text-danger").html(data["messages"]["policy_upload_err"]);
                        } else {
                            $("#policy_upload").removeClass("parsley-error");
                            $("#policy_upload_err").removeClass("text-danger").html("");
                        }

                        if (data["messages"]["quotation_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["quotation_upload_err"], message_icone = "error");

                        if (data["messages"]["quotation_upload_err"] != "") {
                            $("#quotation_upload").addClass("parsley-error");
                            $("#quotation_upload_err").addClass("text-danger").html(data["messages"]["quotation_upload_err"]);
                        } else {
                            $("#quotation_upload").removeClass("parsley-error");
                            $("#quotation_upload_err").removeClass("text-danger").html("");
                        }
                    } else {
                        if (data["message"]["serial_no_year_err"] != "") {
                            $("#serial_no_year").addClass("parsley-error");
                            $("#serial_no_year_err").addClass("text-danger").html(data["message"]["serial_no_year_err"]);
                            toaster(message_type = "Error", message_txt = data["messages"]["serial_no_year_err"], message_icone = "error");
                        } else {
                            $("#serial_no_year").removeClass("parsley-error");
                            $("#serial_no_year_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["serial_no_month_err"] != "") {
                            $("#serial_no_month").addClass("parsley-error");
                            $("#serial_no_month_err").addClass("text-danger").html(data["message"]["serial_no_month_err"]);
                            toaster(message_type = "Error", message_txt = data["messages"]["serial_no_month_err"], message_icone = "error");
                        } else {
                            $("#serial_no_month").removeClass("parsley-error");
                            $("#serial_no_month_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["serial_no_err"] != "") {
                            toaster(message_type = "Error", message_txt = data["messages"]["serial_no_err"], message_icone = "error");
                            $("#serial_no").addClass("parsley-error");
                            $("#serial_no_err").addClass("text-danger").html(data["message"]["serial_no_err"]);
                        } else {
                            $("#serial_no").removeClass("parsley-error");
                            $("#serial_no_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["company_err"] != "") {
                            $("#company").addClass("parsley-error");
                            $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["company_err"], message_icone = "error");
                        } else {
                            $("#company").removeClass("parsley-error");
                            $("#company_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["department_err"] != "") {
                            $("#department").addClass("parsley-error");
                            $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["department_err"], message_icone = "error");
                        } else {
                            $("#department").removeClass("parsley-error");
                            $("#department_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["policy_name_err"] != "") {
                            $("#policy_name").addClass("parsley-error");
                            $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["policy_name_err"], message_icone = "error");
                        } else {
                            $("#policy_name").removeClass("parsley-error");
                            $("#policy_name_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["policy_type_err"] != "") {
                            $("#policy_type").addClass("parsley-error");
                            $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["policy_type_err"], message_icone = "error");
                        } else {
                            $("#policy_type").removeClass("parsley-error");
                            $("#policy_type_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["agency_code_err"] != "") {
                            $("#agency_code").addClass("parsley-error");
                            $("#agency_code_err").addClass("text-danger").html(data["message"]["agency_code_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["agency_code_err"], message_icone = "error");
                        } else {
                            $("#agency_code").removeClass("parsley-error");
                            $("#agency_code_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["sub_agency_code_err"] != "") {
                            $("#sub_agency_code").addClass("parsley-error");
                            $("#sub_agency_code_err").addClass("text-danger").html(data["message"]["sub_agency_code_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["sub_agency_code_err"], message_icone = "error");
                        } else {
                            $("#sub_agency_code").removeClass("parsley-error");
                            $("#sub_agency_code_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["mode_of_premimum_err"] != "") {
                            $("#mode_of_premimum").addClass("parsley-error");
                            $("#mode_of_premimum_err").addClass("text-danger").html(data["message"]["mode_of_premimum_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["mode_of_premimum_err"], message_icone = "error");
                        } else {
                            $("#mode_of_premimum").removeClass("parsley-error");
                            $("#mode_of_premimum_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["date_from_err"] != "") {
                            $("#date_from").addClass("parsley-error");
                            $("#date_from_err").addClass("text-danger").html(data["message"]["date_from_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["date_from_err"], message_icone = "error");
                        } else {
                            $("#date_from").removeClass("parsley-error");
                            $("#date_from_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["date_to_err"] != "") {
                            $("#date_to").addClass("parsley-error");
                            $("#date_to_err").addClass("text-danger").html(data["message"]["date_to_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["date_to_err"], message_icone = "error");
                        } else {
                            $("#date_to").removeClass("parsley-error");
                            $("#date_to_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["payment_date_from_err"] != "") {
                            $("#payment_date_from").addClass("parsley-error");
                            $("#payment_date_from_err").addClass("text-danger").html(data["message"]["payment_date_from_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["payment_date_from_err"], message_icone = "error");
                        } else {
                            $("#payment_date_from").removeClass("parsley-error");
                            $("#payment_date_from_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["payment_date_to_err"] != "") {
                            $("#payment_date_to").addClass("parsley-error");
                            $("#payment_date_to_err").addClass("text-danger").html(data["message"]["payment_date_to_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["payment_date_to_err"], message_icone = "error");
                        } else {
                            $("#payment_date_to").removeClass("parsley-error");
                            $("#payment_date_to_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["policy_no_err"] != "") {
                            $("#policy_no").addClass("parsley-error");
                            toaster(message_type = "Error", message_txt = data["message"]["policy_no_err"], message_icone = "error");
                            $("#policy_no_err").addClass("text-danger").html(data["message"]["policy_no_err"]);
                        } else {
                            $("#policy_no").removeClass("parsley-error");
                            $("#policy_no_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["group_name_err"] != "") {
                            $("#group_name").addClass("parsley-error");
                            $("#group_name_err").addClass("text-danger").html(data["message"]["group_name_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["group_name_err"], message_icone = "error");
                        } else {
                            $("#group_name").removeClass("parsley-error");
                            $("#group_name_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["policy_holder_name_err"] != "") {
                            $("#policy_holder_name").addClass("parsley-error");
                            $("#policy_holder_name_err").addClass("text-danger").html(data["message"]["policy_holder_name_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["policy_holder_name_err"], message_icone = "error");
                        } else {
                            $("#policy_holder_name").removeClass("parsley-error");
                            $("#policy_holder_name_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["date_commenced_err"] != "") {
                            $("#date_commenced").addClass("parsley-error");
                            $("#date_commenced_err").addClass("text-danger").html(data["message"]["date_commenced_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["date_commenced_err"], message_icone = "error");
                        } else {
                            $("#date_commenced").removeClass("parsley-error");
                            $("#date_commenced_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["policy_upload_err"] != "") {
                            $("#policy_upload").addClass("parsley-error");
                            $("#policy_upload_err").addClass("text-danger").html(data["message"]["policy_upload_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["policy_upload_err"], message_icone = "error");
                        } else {
                            $("#policy_upload").removeClass("parsley-error");
                            $("#policy_upload_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["reg_mobile_err"] != "") {
                            $("#reg_mobile").addClass("parsley-error");
                            $("#reg_mobile_err").addClass("text-danger").html(data["message"]["reg_mobile_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["reg_mobile_err"], message_icone = "error");
                        } else {
                            $("#reg_mobile").removeClass("parsley-error");
                            $("#reg_mobile_err").removeClass("text-danger").html("");
                        }

                        if (data["message"]["reg_email_err"] != "") {
                            $("#reg_email").addClass("parsley-error");
                            $("#reg_email_err").addClass("text-danger").html(data["message"]["reg_email_err"]);
                            toaster(message_type = "Error", message_txt = data["message"]["reg_email_err"], message_icone = "error");
                        } else {
                            $("#reg_email").removeClass("parsley-error");
                            $("#reg_email_err").removeClass("text-danger").html("");
                        }
                    }
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });
</script>

<script>
    $("#add_description,#add_description_floater").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });

    function clearError() {
        $("#description_name").removeClass("parsley-error");
        $("#description_name_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#policy_description_id").text("");
        $("#description_name").val("");
        $("#submit_description").show();
    }

    function DescriptionSave() {
        var description_name = $("#description_name").val();
        var url = "<?php echo $base_url; ?>master/description_policy/add_policy_description";

        $.ajax({
            url: url,
            data: {
                description_name: description_name,
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },

            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#description_name").val("");
                    $("#description_name").removeClass("parsley-error");
                    $("#description_name_err").removeClass("text-danger").html("");
                    $('#form_modal').modal('toggle');
                    get_policy_description();
                } else {
                    if (data["message"]["description_name_err"] != "")
                        $("#description_name").addClass("parsley-error");
                    else
                        $("#description_name").removeClass("parsley-error");
                    $("#description_name_err").addClass("text-danger").html(data["message"]["description_name_err"]);
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function get_policy_description() {
        var url = "<?php echo $base_url; ?>master/description_policy/get_policy_description";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('.risk_description').html("");
                        option_policyDescription_data = "";
                        $('.risk_description').append("<option value=''>Select</option>");
                        for (var i = 0; i < val.length; i++) {
                            var policy_description_id = val[i]["policy_description_id"];
                            var policy_description_name = val[i]["policy_description_name"].charAt(0).toUpperCase() + val[i]["policy_description_name"].slice(1);

                            option_policyDescription_data += '<option value="' + policy_description_id + '">' + policy_description_name + '</option>';

                        }
                        $('.risk_description').append(option_policyDescription_data);

                    } else {
                        $('.risk_description').html("");
                        $('.risk_description').append("<option value=''>Select</option>");
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });

        }
    }

    function Total_Paymentacknowledge() {
        actual_data_Paymentacknowledge = [];
        var actual_data_flag = "false";

        payment_acknowledgement_file_name = "";
        payment_acknowledgement_flag = "";
        $.each(main_paymentacknowledge, function(key, val) {
            var payment_mode = $('#payment_mode_' + val).val();
            var payment_acknowledgement_file_name = PaymentAcknowledgement_file_upload(val);
            payment_acknowledgement_file_name=payment_acknowledgement_file_name.split("$%^&*(&&*%^$%$");
            var payment_acknowledgement_file = payment_acknowledgement_file_name[0];
            var payment_acknowledgement_flag = payment_acknowledgement_file_name[1];
            if(payment_acknowledgement_flag == "true"){
                actual_data_flag = "true";
                return false;
            }

            if(payment_acknowledgement_file == ""){
                payment_acknowledgement_file ="";
                var payment_acknowledgement_file_hidden = $('#payment_acknowledgement_file_hidden_' + val).val();
                if(payment_acknowledgement_file_hidden == undefined || payment_acknowledgement_file_hidden=="null")
                payment_acknowledgement_file_hidden = "";
                payment_acknowledgement_file = payment_acknowledgement_file_hidden;
            }

            actual_data_Paymentacknowledge.push([val, payment_mode, payment_acknowledgement_file]);
            if (payment_mode == '' || payment_mode == 'null')
            actual_data_Paymentacknowledge.splice(val, 1);

        });

        return JSON.stringify(actual_data_Paymentacknowledge)+"&%$#&"+actual_data_flag;
    }

    function AddPaymentAcknowledgement(add_paymentacknowledge_counter) {
        if (main_paymentacknowledge.length == 0) {
            add_paymentacknowledge_counter=0;
            main_paymentacknowledge = [];
        }
        // alert(add_paymentacknowledge_counter);
        
        var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><select name="payment_mode[]" id="payment_mode_'+add_paymentacknowledge_counter+'" class="form-control payment_mode"><option value="null">Select Payment Mode</option><option value="Cheque">Cheque</option><option value="Online Payment Link">Online Payment Link</option><option value="NEFT / IMPS / RTGS">NEFT / IMPS / RTGS</option></select></td><td style="border: 1px solid #dddddd;"><input type="file" name="payment_acknowledgement_file[]" id="payment_acknowledgement_file_'+add_paymentacknowledge_counter+'" class="form-control payment_acknowledgement_file"><span id="payment_acknowledgement_file_err_'+add_paymentacknowledge_counter+'"></span><input type="hidden" id="payment_acknowledgement_file_hidden_'+add_paymentacknowledge_counter+'" name="payment_acknowledgement_file_hidden" class="payment_acknowledgement_file_hidden"></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-sm dripicons-cross" id="payment_acknowledgement_'+add_paymentacknowledge_counter+'" onClick="RemovePaymentAcknowledgement('+add_paymentacknowledge_counter+')" ></button></center></td></tr>';
        $("#append_payment_acknowlege").append(tr_table);
        main_paymentacknowledge.push(add_paymentacknowledge_counter);
        // alert(main_paymentacknowledge);
        add_paymentacknowledge_counter = add_paymentacknowledge_counter + 1;
        $("#Add_PaymentAcknowledgement").attr("onClick", "AddPaymentAcknowledgement(" + add_paymentacknowledge_counter + ")");
        // alert(add_paymentacknowledge_counter);
    }

    function RemovePaymentAcknowledgement(add_paymentacknowledge_counter) {
        $("#payment_acknowledgement_" + add_paymentacknowledge_counter).closest("tr").remove();
        main_paymentacknowledge.splice(main_paymentacknowledge.indexOf(add_paymentacknowledge_counter), 1);
        // alert(main_paymentacknowledge);
        if (main_paymentacknowledge.length == 0) {
            add_paymentacknowledge_counter=0;
            main_paymentacknowledge = [];
            $("#Add_PaymentAcknowledgement").attr("onClick", "AddPaymentAcknowledgement(" + add_paymentacknowledge_counter + ")");
        }
    }

    function PaymentAcknowledgement_file_upload(add_paymentacknowledge_counter){
        event.preventDefault();
        var paymentacknowledgement_file_name="";
        var paymentacknowledgement_file_flag = "false";
        var payment_acknowledgement_file = $('#payment_acknowledgement_file_'+add_paymentacknowledge_counter).prop('files')[0];
        var serial_no_year = $('#serial_no_year').val();
        var serial_no_month = $('#serial_no_month').val();
        var serial_no = $('#serial_no').val();
        var form_data = new FormData();
        form_data.append('payment_acknowledgement_file', payment_acknowledgement_file);
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);
        
        var url = "<?php echo base_url(); ?>master/remote/get_paymentacknowledgement_file_upload";
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    paymentacknowledgement_file_name = data["userdata"];
                    $("#payment_acknowledgement_file_"+add_paymentacknowledge_counter).removeClass("parsley-error");
                    $("#payment_acknowledgement_file_err_"+add_paymentacknowledge_counter).removeClass("text-danger").html("");
                } else {
                    paymentacknowledgement_file_name = "";
                        // $('#payment_acknowledgement_file_'+add_paymentacknowledge_counter).val("");

                    if(data["messages"] != ""){
                        toaster(message_type = "Error", message_txt = "Payment Acknowledgement File : "+data["messages"]["payment_acknowledgement_file_err"], message_icone = "error");
                        $("#payment_acknowledgement_file_"+add_paymentacknowledge_counter).focus();
                        $("#payment_acknowledgement_file_"+add_paymentacknowledge_counter).addClass("parsley-error");
                        $("#payment_acknowledgement_file_err_"+add_paymentacknowledge_counter).addClass("text-danger").html(data["messages"]["payment_acknowledgement_file_err"]);
                        paymentacknowledgement_file_flag = "true";
                        return;
                    }else{
                        $("#payment_acknowledgement_file_"+add_paymentacknowledge_counter).removeClass("parsley-error");
                        $("#payment_acknowledgement_file_err_"+add_paymentacknowledge_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        return paymentacknowledgement_file_name+"$%^&*(&&*%^$%$"+paymentacknowledgement_file_flag;
    }
</script>