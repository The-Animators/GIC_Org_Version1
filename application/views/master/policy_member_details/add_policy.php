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
                                <h4 class="header-title"><?php echo "Add " . $title; ?></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url() . "master/policy"; ?>" class='btn btn-secondary waves-effect btn-xs'>Back</a>
                            </div>

                        </div>

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

                                                        <!-- <option value="<?php //echo $i; 
                                                                            ?>"><?php //echo $i; 
                                                                                ?></option> -->
                                                        <option value="<?php echo $i; ?>" <?php if ($i == $currently_selected) echo "selected";
                                                                                            ?>>
                                                            <?php echo $i; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="serial_no_year_err"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="serial_no_month" name="serial_no_month" onchange="getPolicyCounter()">
                                                    <option value="null">Select Month</option>
                                                    <?php $month = date('m'); ?>
                                                    <option value="01" <?php if ($month == "01") : echo "selected";
                                                                        endif; ?>>January</option>
                                                    <option value="02" <?php if ($month == "02") : echo "selected";
                                                                        endif; ?>>February</option>
                                                    <option value="03" <?php if ($month == "03") : echo "selected";
                                                                        endif; ?>>March</option>
                                                    <option value="04" <?php if ($month == "04") : echo "selected";
                                                                        endif; ?>>April</option>
                                                    <option value="05" <?php if ($month == "05") : echo "selected";
                                                                        endif; ?>>May</option>
                                                    <option value="06" <?php if ($month == "06") : echo "selected";
                                                                        endif; ?>>June</option>
                                                    <option value="07" <?php if ($month == "07") : echo "selected";
                                                                        endif; ?>>July</option>
                                                    <option value="08" <?php if ($month == "08") : echo "selected";
                                                                        endif; ?>>August</option>
                                                    <option value="09" <?php if ($month == "09") : echo "selected";
                                                                        endif; ?>>September</option>
                                                    <option value="10" <?php if ($month == "10") : echo "selected";
                                                                        endif; ?>>October</option>
                                                    <option value="11" <?php if ($month == "11") : echo "selected";
                                                                        endif; ?>>November</option>
                                                    <option value="12" <?php if ($month == "12") : echo "selected";
                                                                        endif; ?>>December</option>
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
                                                <select name="company" id="company" class="form-control" onchange="company_department();DepartmentBasedPolicyName();company_agency();departmentBased_Policy_option();PolicyType_Risk();Policy_typeName();policyNameBased_Policy_option();">
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
                                                <select name="policy_name" id="policy_name" class="form-control" onchange="Policy_typeName();PolicyType_Risk();policyNameBased_Policy_option();get_sub_policy_details();">
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
                                                <select name="policy_type" id="policy_type" class="form-control" onchange="PolicyType_Risk();get_sub_policy_names();">
                                                    <option value="1">Individual</option>
                                                    <option value="2">Floater</option>
                                                </select>
                                                <span id="policy_type_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sub Policy Section Start -->
                                    <div class="col-md-4" id="sub_policy_name_textbox_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="sub_policy_name_txt_box" id="sub_policy_name_label" class="col-form-label col-md-4 text-right sub_policy_name_label">Sub Policy Name<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input name="sub_policy_name_txt_box" id="sub_policy_name_txt_box" class="form-control" placeholder="Enter Sub Policy Name">
                                                </select>
                                                <span id="sub_policy_name_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="sub_policy_name_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="sub_policy_name" id="sub_policy_name_label" class="col-form-label col-md-4 text-right sub_policy_name_label">Sub Policy Name<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="sub_policy_name" id="sub_policy_name" class="form-control" onchange="get_family_size_child();Floater_policy_type();Individual_policy_type();Policy_typeName();subpolicy_family_size();">
                                                    <option value="null">Select Sub Policy Name</option>
                                                </select>
                                                <span id="sub_policy_name_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="sub_policy_family_size_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="sub_policy_family_size" class="col-form-label col-md-4 text-right">Family Size<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="sub_policy_family_size" id="sub_policy_family_size" class="form-control" onchange="family_Size_Val()">
                                                    <option value="null">Select Family Size</option>
                                                </select>
                                                <span id="sub_policy_family_size_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="sub_policy_add_child_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="sub_policy_add_child" class="col-form-label col-md-4 text-right">Addition of Child<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="sub_policy_add_child" id="sub_policy_add_child" class="form-control" onchange="get_premium_Of_Child()">
                                                    <option value="null">Select Addition of Child</option>
                                                </select>
                                                <span id="sub_policy_add_child_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sub Policy Section End -->

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
                                                            <option value="<?php echo $row5["sub_agent_id"]; ?>"><?php echo ucwords($row5["sub_agent_code"]); ?></option>
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
                                                <!-- <input type="text" name="mode_of_premimum" id="mode_of_premimum" value="" placeholder="Enter Mode Of Premium" class="form-control"> -->
                                                <span id="mode_of_premimum_err"></span>
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
                                            <label for="date_commenced" class="col-form-label col-md-4 text-right">Date Commenced<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="date_commenced" id="date_commenced" value="" placeholder="Enter Date Commenced" class="form-control">
                                                <span id="date_commenced_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="display:none">
                                        <div class="form-group row">
                                            <label for="payment_date_from" class="col-form-label col-md-4 text-right">Payment Date From<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="payment_date_from" id="payment_date_from" value="" placeholder="Enter Payment Date From" class="form-control">
                                                <span id="payment_date_from_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="display:none">
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
                                                <input type="hidden" class="form-control" name="policy_counter_no" id="policy_counter_no">
                                                <span id="reg_email_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="policy_no" class="col-form-label col-md-4 text-right">Policy No.<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="policy_no" id="policy_no" value="" placeholder="Enter Policy No." class="form-control">
                                                <span id="policy_no_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="policy_upload" class="col-form-label col-md-4  text-right">Policy Upload<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="file" name="policy_upload" id="policy_upload" value="" placeholder="Enter Policy Upload" class="form-control" onchange="check_file_upload(id ='policy_upload')">
                                                <span id="policy_upload_err"></span>
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
                                                <input type="file" name="quotation_upload" id="quotation_upload" value="" placeholder="Enter Quotation Upload" class="form-control" onchange="check_file_upload(id ='quotation_upload')">
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
                                    <!-- //riv_div -->
                                    <div class="col-md-4" id="tpa_company_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="tpa_company" class="col-form-label col-md-4  text-right">TPA<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="tpa_company" id="tpa_company">
                                                    <option value="null">Select TPA</option>
                                                    <?php $tpa_company = tpa_dropdown();
                                                    if (!empty($tpa_company)) : foreach ($tpa_company as $tpa_row) : ?>
                                                            <option value="<?php echo $tpa_row["mtpa_id"]; ?>"><?php echo $tpa_row["tpa_name"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
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
                                                <textarea rows="5" type="text" name="description_of_stock" id="description_of_stock" placeholder="Enter Description Of Stock" class="form-control"></textarea>
                                                <span id="description_of_stock_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4" id="individual_policy_type_div" style="display:none;">
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
                                    </div> -->
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
                                    <div class="col-md-4" id="care_health_insu_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="care_health_insu_type" class="col-form-label col-md-4  text-right hdfc_type" id="hdfc_type">Ind. Policy Type<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <!-- onchange="hdfc_ergo_Individual_policy_type()" -->
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
                                                <select class="form-control" name="star_health_allied_insu_supertopup_float_family_size" id="star_health_allied_insu_supertopup_float_family_size" onchange="care_health_insu_care_advantage_float_family_size();family_Size_Val()" style="display:none">
                                                    <option value="null">Select Family Size</option>
                                                    <option value="1A + 1C">1A + 1C</option>
                                                    <option value="1A + 2C">1A + 2C</option>
                                                    <option value="1A + 3C">1A + 3C</option>
                                                    <option value="2A + 0C">2A + 0C</option>
                                                    <option value="2A + 1C">2A + 1C</option>
                                                    <option value="2A + 2C">2A + 2C</option>
                                                    <option value="2A + 3C">2A + 3C</option>
                                                </select>
                                                <select class="form-control" name="care_health_insu_care_advantage_float_family_size" id="care_health_insu_care_advantage_float_family_size" onchange="family_Size_Val()" style="display:none">
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

                                <!-- <div class="form-row" id="family_size_div" style="display:none;">
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
                                </div> -->
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
                                <div class="form-row" id="risk_individual">
                                    <div class="col-md-6">
                                        <u><strong>Risk Details</strong></u>
                                    </div>
                                    <div class="col-md-6 text-right" id="risk_button_ind"><button class="btn btn-primary btn-sm AddRisk" id="AddRisk" onClick="AddRisk(0)" disabled>Add Risk Address</button>
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
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary btn-sm AddRiskFloater" id="AddRiskFloater" onClick="AddRiskFloater(0)">Add Risk Address</button>

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
                                                <!-- <tr>
                                                                <td><select class="form-control risk_description" id="risk_description_0" name="risk_description[]">
                                                                        <option value="null">Select Description</option>
                                                                        <option value="Stock">Stock</option>
                                                                        <option value="FFF">FFF</option>
                                                                        <option value="P & M">P & M</option>
                                                                        <option value="ETC">ETC</option>
                                                                    </select></td>
                                                                <td><input class="form-control risk_sum_assured" type="text" name="risk_sum_assured[]" id="risk_sum_assured_0" value="" placeholder="Risk Sum Assured"></td>
                                                                <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_floater_0" onClick="removeRiskDetails_Floater(0)" disabled></td>
                                                            </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- // Risk floater Details Section End -->
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12" id="append_premium_calculator"></div>
                                </div>

                                <!-- // Remarks Details Section Start -->
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
                                        <table style="border: 1px solid #dddddd; width: 100%;">
                                            <thead>
                                                <tr style="">
                                                    <th style="border: 1px solid #dddddd;">
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
                                                <tr style="">
                                                    <td style="border: 1px solid #dddddd;"><textarea rows="5" name="remarks[]" id="remarks_0" value="" placeholder="Enter Remarks" class="form-control remarks"></textarea></td>
                                                    <td style="border: 1px solid #dddddd;"><input type="date" name="male_date[]" id="male_date_0" value="" placeholder="Enter Mail Date" class="form-control male_date"></td>
                                                    <td style="border: 1px solid #dddddd;">
                                                        <center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_remark_0" onClick="removeRemark(0)" disabled></center></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <hr>
                                <!-- // Remarks Details Section End -->

                                <!-- // Hypotication Details Section Start -->
                                <hr>
                                <span style="display:none;" id="hypotication_details_global">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <u><strong>Hypotication Details</strong></u>
                                        </div>
                                        <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddHypotication" id="AddHypotication" onClick="AddHypotication(0)">Add Hypotication</button></div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <table style="border: 1px solid #dddddd; width: 100%;">
                                                <thead>
                                                    <tr style="">
                                                        <th style="border: 1px solid #dddddd;">
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
                                                    <tr style="">
                                                        <td style="border: 1px solid #dddddd;"><input type="text" name="bank_name[]" id="bank_name_0" value="" placeholder="Enter Bank Name" class="form-control bank_name"></td>
                                                        <td style="border: 1px solid #dddddd;"><input type="text" name="branch_name[]" id="branch_name_0" value="" placeholder="Enter Branch Name" class="form-control branch_name"></td>
                                                        <td style="border: 1px solid #dddddd;">
                                                            <center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_hypotication_0" onClick="removeHypotication(0)" disabled></button></center>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <hr>
                                </span>
                                <!-- // Hypotication Details Section End -->

                                <!-- // Correspondence Details Section Start -->
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <u><strong>Correspondence Details</strong></u>
                                    </div>
                                    <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddCorrespondence" id="AddCorrespondence" onClick="AddCorrespondence(0)">Add Correspondence</button></div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <table style="border: 1px solid #dddddd; width: 100%;">
                                            <thead>
                                                <tr style="">
                                                    <th style="border: 1px solid #dddddd;">
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
                                                <tr style="">
                                                    <td style="border: 1px solid #dddddd;"><select name="member_name[]" id="member_name_0" class="form-control member_name" onchange="MemberNameBaseddetails(0)">
                                                            <option value="null">Select Member Names</option>
                                                        </select><input type="hidden" name="member_name_txt[]" class="member_name_txt" id="member_name_txt_0" value=""></td>
                                                    <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_email[]" id="correspondence_email_0" value="" placeholder="Enter Email Id" class="form-control correspondence_email"></td>
                                                    <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_whatsapp[]" id="correspondence_whatsapp_0" value="" placeholder="Enter Whatsapp" class="form-control correspondence_whatsapp"></td>
                                                    <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_telegram[]" id="correspondence_telegram_0" value="" placeholder="Enter Telegram/Signal" class="form-control correspondence_telegram"></td>

                                                    <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_cc[]" id="correspondence_cc_0" value="" data-role="tagsinput" placeholder="Enter  CC" class="correspondence_cc  form-control"></td>
                                                    <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_bcc[]" id="correspondence_bcc_0" value="" data-role="tagsinput" placeholder="Enter  Bcc" class="correspondence_bcc form-control"></td>
                                                    <td style="border: 1px solid #dddddd;">
                                                        <center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_correspondence_0" onClick="removeCorrespondence(0)" disabled></button>
                                                            <center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <hr>

                                <!-- // Correspondence Details Section End -->

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
                                        <table style="border: 1px solid #dddddd; width: 100%;">
                                            <thead>
                                                <tr style="">
                                                    <th style="border: 1px solid #dddddd;">
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
                                <hr>
                                <!-- // Payment Acknowledgement Details Section End -->

                                <div class="form-row mt-2">
                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <center>

                                            <button id="submit" class="btn btn-primary btn-sm">Save <?php echo $title; ?></button>

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
                    <?php echo date("Y"); ?> &copy; GIC by <a href="">Priyanshu Singh</a>
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
    var option_policyDescription_data = "";

    function subpolicy_family_size() {
        var sub_policy_name = $("#sub_policy_name").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        if (policy_name_txt != "Super Top Up") {
            if (sub_policy_name == "null" || sub_policy_name == "") {
                $('#sub_policy_family_size').prop('selectedIndex', 0);
                $('#sub_policy_add_child').prop('selectedIndex', 0);
                toaster(message_type = "Error", message_txt = "The Floater Sub Policy Name field is required.", message_icone = "error");
                return false;
            }
        }
    }

    function showRIV_FIRESHOPKEEPER() {
        var company_txt = $("#company option:selected").text();
        var department_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        if (policy_name_txt == "Bharat Sookshma Udyam" || policy_name_txt == "Bharat Laghu Udyam" || policy_name_txt == "Bharat Griha Raksha" || policy_name_txt == "Standard Fire & Allied Perils" || policy_name_txt == "Shopkeeper") {
            $("#riv_div").show();
        } else {
            $("#riv_div").hide();
        }
    }

    function show_Type_ofBuss_StockDesc_FIRESHOPKEEPER() {
        var company_txt = $("#company option:selected").text();
        var department_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        if (policy_name_txt == "Bharat Sookshma Udyam" || policy_name_txt == "Bharat Laghu Udyam" || policy_name_txt == "Bharat Griha Raksha" || policy_name_txt == "Standard Fire & Allied Perils" || policy_name_txt == "Shopkeeper" || policy_name_txt == "Burglary" || policy_name_txt == "Money In Transit") {
            $("#type_of_bussiness_div").show();
            $("#desc_of_stock_div").show();
        } else {
            $("#type_of_bussiness_div").hide();
            $("#desc_of_stock_div").hide();
        }
    }

    function Individual_policy_type() {
        var individual_policy_type = $("#sub_policy_name").val();
        var policy_name_txt = $("#policy_name option:selected").text();
        if (policy_name_txt == "Mediclaim") {
            if (individual_policy_type == "Individual Health Insurance Policy") {
                $("#3_cover_div").hide();
                Policy_typeName();
            } else if (individual_policy_type == "Floater 2020(Individual)") {
                Policy_typeName();
            }
        }
    }

    function Floater_policy_type() {
        var policy_name_txt = $("#policy_name option:selected").text();
        if (policy_name_txt == "Mediclaim") {
            $("#family_size").val("null");
            $("#addition_of_more_child").val("null");
            var floater_policy_type = $("#sub_policy_name").val();
            var policy_type_txt = $("#policy_type option:selected").text();
            if (policy_type_txt == "Individual")
                $("#3_cover_div").hide();

            if (floater_policy_type == "Family Floater 2014" || floater_policy_type == "null") {
                $("#3_cover_div").hide();
                Policy_typeName();
            } else if (floater_policy_type == "Family Floater 2020") {
                $("#3_cover_div").show();
                Policy_typeName();
            }
        }
    }

    function Policy_typeName() {
        var policy_name = $("#policy_name").val();
        var company = $("#company option:selected").text();
        var policy_type_txt = $("#policy_type option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();

        var sub_policy_name = $("#sub_policy_name").val();
        var sub_policy_name_hidden = $("#sub_policy_name").is(":visible");
        var new_policy_type = "";

        if (sub_policy_name_hidden == true) {
            new_policy_type = sub_policy_name;
        }

        showRIV_FIRESHOPKEEPER();
        show_Type_ofBuss_StockDesc_FIRESHOPKEEPER();
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

        if (policy_name_txt == "Bharat Sookshma Udyam" || policy_name_txt == "Bharat Laghu Udyam" || policy_name_txt == "Bharat Griha Raksha" || policy_name_txt == "Standard Fire & Allied Perils" || policy_name_txt == "Burglary" || policy_name_txt == "Shopkeeper" || policy_name_txt == "Contractors All Risk") {
            $("#hypotication_details_global").show();
        } else {
            $("#hypotication_details_global").hide();
        }

        if (policy_name_txt != "Mediclaim" && policy_type_txt == "Individual")
            $("#3_cover_div").hide();


        // if((policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up") && (policy_type_txt == "Individual" || policy_type_txt == "Floater")){
        if ((policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up")) {
            $("#tpa_company_div").show();
        } else {
            $("#tpa_company_div").hide();
        }
        if (policy_name_txt == "Term Plan" || policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up" || policy_name_txt == "GMC" || policy_name_txt == "GPA" || policy_name_txt == "Personal Accident" || policy_name_txt == "Private Car" || policy_name_txt == "2 Wheeler" || policy_name_txt == "Commercial Vehicle" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness" || policy_name_txt == "Cancer Plan" || policy_name_txt == "Daily Cash" || policy_name_txt == "Overseas Mediclaim" || policy_name_txt == "Student Overseas Mediclaim" || policy_name_txt == "Employment Overseas Mediclaim") {
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
                        get_gst_rate();
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

    function get_gst_rate() {
        var date_from = $("#date_from").val();
        var date_to = $("#date_to").val();

        var url = "<?php echo $base_url; ?>master/gst_master/get_gst_datewise_from_policy";

        if (url != "") {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                data: {
                    date_from: date_from,
                    date_to: date_to,
                },
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    if (data["status"] == true) {
                        // $("#cgst_fire_per").val("");
                        // $("#sgst_fire_per").val("");
                        // $("#cgst_term_plan").val("");
                        // $("#sgst_term_plan").val("");
                        // $("#shopkeeper_cgst_fire_per").val("");
                        // $("#shopkeeper_sgst_fire_per").val("");
                        // $("#tot_owd_cgst_rate").val("");
                        // $("#tot_owd_sgst_rate").val("");
                        // $("#tot_owd_addon_cgst_rate").val("");
                        // $("#tot_owd_addon_sgst_rate").val("");
                        // $("#tot_btp_cgst_rate").val("");
                        // $("#tot_btp_sgst_rate").val("");
                        // $("#tot_other_tp_cgst_rate").val("");
                        // $("#tot_other_tp_sgst_rate").val("");
                        var cgst = data["userdata"].cgst;
                        var sgst = data["userdata"].sgst;
                        $("#cgst_fire_per").val(cgst);
                        $("#sgst_fire_per").val(sgst);
                        $("#cgst_term_plan").val(cgst);
                        $("#sgst_term_plan").val(sgst);
                        $("#shopkeeper_cgst_fire_per").val(cgst);
                        $("#shopkeeper_sgst_fire_per").val(sgst);
                        $("#tot_owd_cgst_rate").val(cgst);
                        $("#tot_owd_sgst_rate").val(sgst);
                        $("#tot_owd_addon_cgst_rate").val(cgst);
                        $("#tot_owd_addon_sgst_rate").val(sgst);
                        $("#tot_btp_cgst_rate").val(cgst);
                        $("#tot_btp_sgst_rate").val(sgst);
                        $("#tot_other_tp_cgst_rate").val(cgst);
                        $("#tot_other_tp_sgst_rate").val(sgst);
                    } else {
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

    PolicyType_Risk();

    function PolicyType_Risk() {
        add_risk = 0;
        counterArray = [];
        mainRiskAddress = [];
        mainRiskAddressDescription = [];
        $("#sub_policy_family_size").val("null");
        $("#sub_policy_add_child").val("null");
        $('#sub_policy_name').prop('selectedIndex', 0);
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
        if (policy_name_txt == "Term Plan" || policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up" || policy_name_txt == "GMC" || policy_name_txt == "GPA" || policy_name_txt == "Personal Accident" || policy_name_txt == "Private Car" || policy_name_txt == "2 Wheeler" || policy_name_txt == "Commercial Vehicle" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness") {
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

    var add_risk = 0;
    // var add_risk_details = 0;
    var add_remark = 0;
    var add_hypotication = 0;
    var add_correspondence = 0;
    var counterArray = [];
    var mainRiskAddress = [];
    var mainRiskAddressDescription = [];

    var add_risk_desc = 0;
    var add_risk_RC = 0;

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

    function addRisc_R_C() {
        add_risk_2 = add_risk_RC + "_0";
        if (counterArray.length == 0) {
            add_risk_RC = 0;
            add_risk_2 = add_risk_RC + "_0";
        }
        var counter = 0;
        var tr_rc_description = "";
        var removeRiskIDS = "";
        var i = 0;
        var description_Array = ['On Plinth & Foundation', 'On Building – ', 'On Garages', 'On Lifts with its accesorries & wiring ', 'On Pump Room ', 'On Pumps & Other Accessories', 'On Pipes and Plum,bing work', 'On Electric Meter Room', 'On Electric Fittings, Wiring & Accessories', 'On Compound Wall with Iron Fencing ', 'On Gates', 'On Pavments', 'On Watchman Cabin', 'On Society Office Room + Office Equipments & FFFF', 'On Overhead Water Tanks', 'On Underground Water Tanks', 'On Borewells including their pumps Sets', 'On Water Pumps', 'On External and Interior Paint and Plaster of Bldg', 'On Club House Building including shade and interior work and fixtures', 'On Health Club Equipments', 'On Roof Top Solar panel', 'On CCTV System including Switches, Cameras, DVR, Cables etc', 'On Ommission to Insure', 'Additions, escalations , alterations , Extensions during the year', 'On Shops', 'Debris Removal', 'Architect Fees'];
        for (i; i <= 27; i++) {
            // mainRiskRCDescription.push([i]);
            removeRiskIDS = add_risk_RC + '_' + i;
            mainRiskRCDescription.push(removeRiskIDS);
            tr_rc_description += '<tr><td><input type="text" class="form-control" id="description_' + add_risk_RC + '_' + i + '" name="description[]" value="' + description_Array[i] + '"></td><td><input type="number" class="form-control" id="nos_' + add_risk_RC + '_' + i + '" name="nos[]"  onkeyup=Get_total_sum_assured("' + removeRiskIDS + '")></td><td><input type="number" class="form-control" id="value_' + add_risk_RC + '_' + i + '" name="value[]"  onkeyup=Get_total_sum_assured("' + removeRiskIDS + '")></td><td><input type="number" class="form-control" id="sum_assured_' + add_risk_RC + '_' + i + '" name="sum_assured[]" ></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_r_c_' + add_risk_RC + '_' + i + '" onClick=removeRisk_R_C("' + removeRiskIDS + '") ></td></tr>';
        }

        $("#addRisc_R_C").attr("onClick", "addRisc_R_C(" + add_risk_RC + ")");
        var tr_table = ' <div id="div_' + add_risk_RC + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (add_risk_RC + 1) + '</label> <div class="col-md-9"> <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + add_risk_RC + '" value="" placeholder="Risk Address ' + (add_risk_RC + 1) + '"></div><div class="col-md-1"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + add_risk_RC + '" onClick="removeRisk_RC(' + add_risk_RC + ')" > </div> </div></div><div class="col-md-12"> <div  id="r_c_append_' + add_risk_RC + '"   ><table  class="table mb-0 table-bordered" id="append_rcDescription_' + add_risk_RC + '"><tr><td  width="55%">Description</td><td>Nos.</td><td>Value</td><td>Sum Insured</td><td>Action</td></tr>' + tr_rc_description + '</table><button class="btn btn-primary btn-sm dripicons-plus  mt-2" id="addRiskDesc_R_C_' + removeRiskIDS + '" onClick=addRiskDesc_R_C("' + removeRiskIDS + '") ></div></div></div></div>';
        $("#append_risk").append(tr_table);
        counterArray[add_risk_RC] = 0;
        mainRiskRC.push(add_risk_RC);
        var newArray = [0];
        // mainRiskRCDescription.push([add_risk_RC, newArray]);
        add_risk_RC = add_risk_RC + 1;
    }

    function AddRiskFloater() {
        $("#AddRisk").attr("onClick", "AddRisk(" + add_risk + ")");
        var tr_table = ' <div id="div_' + add_risk + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (add_risk + 1) + '</label> <div class="col-md-8"> <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + add_risk + '" value="" placeholder="Risk Address ' + (add_risk + 1) + '"></div><div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + add_risk + '" onClick="removeRisk(' + add_risk + ')" > </div> </div></div></div>';
        $("#append_risk").append(tr_table);
        add_risk = add_risk + 1;
    }
    // var AddRiskDetails_floater = 0;
    function removeRiskDetails_Floater(add_risk_desc) {
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
        $("#AddRiskDetails_floater").attr("onClick", "AddRiskDetails_floater(" + add_risk_desc + ")");
        var tr_table = ' <tr><td><select class="form-control risk_description" id="risk_description_' + add_risk_desc + '" name="risk_description[]"> <option value="null" >Select Description</option>' + option_riskval + '</select></td><td><input class="form-control risk_sum_assured" type="number" name="risk_sum_assured[]" id="risk_sum_assured_' + add_risk_desc + '" value="" placeholder="Risk Sum Assured"  onkeyup="get_total_sum_Assured()"></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_floater_' + add_risk_desc + '" onClick=removeRiskDetails_Floater("' + add_risk_desc + '") ></td></tr>';
        $("#description_data").append(tr_table);
        add_risk_desc = add_risk_desc + 1;
        get_total_sum_Assured();
    }

    function removeRiskFloater(add_risk_floater) {
        $("#div_" + add_risk_floater).remove();
        // mainRiskAddress.splice(mainRiskAddress.indexOf(add_risk_floater), 1);
        get_total_sum_Assured();
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
        $("#AddRisk").attr("onClick", "AddRisk(" + add_risk + ")");
        var tr_table = ' <div id="div_' + add_risk + '" ><hr class="mt-2"><div class="form-row"> <div class="col-md-12"> <div class="form-group row"> <label for="risk_address" class="col-form-label col-md-2 text-right">Risk Address ' + (add_risk + 1) + '</label> <div class="col-md-8"> <input class="form-control risk_address" type="text" name="risk_address[]" id="risk_address_' + add_risk + '" value="" placeholder="Risk Address ' + (add_risk + 1) + '"></div><div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_' + add_risk + '" onClick="removeRisk(' + add_risk + ')" > </div> </div></div><div class="col-md-12"><button class="btn btn-primary btn-sm AddRiskDetails" id="AddRiskDetails" onClick=AddRiskDetails("' + add_risk_2 + '")>Add Risk</button> </div><div  id="details_append_' + add_risk + '"  class="col-md-12 form-group row" ><div id="description_' + add_risk + '_0" class="col-md-12 form-group row description"><div class="col-md-5"><div class="form-group row"> <label for="risk_description" class="col-form-label col-md-5 text-right">Description</label> <div class="col-md-7"><select class="form-control risk_description" id="risk_description_' + add_risk_2 + '" name="risk_description[]"> <option value="null" >Select Description</option>' + option_riskval + '</select></div> </div> </div> <div class="col-md-5"><div class="form-group row"> <label for="risk_sum_assured" class="col-form-label col-md-4 text-right">Sum Assured</label> <div class="col-md-8"><input class="form-control risk_sum_assured" type="number" name="risk_sum_assured[]" id="risk_sum_assured_' + add_risk_2 + '" value="" placeholder="Risk Sum Assured" onkeyup="get_total_sum_Assured()"></div> </div> </div> <div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_' + add_risk_2 + '" onClick="removeRiskDetails("' + add_risk_2 + '")" disabled></div> </div> </div></div>  </div></div>';
        $("#append_risk").append(tr_table);
        counterArray[add_risk] = 0;
        mainRiskAddress.push(add_risk);
        var newArray = [0];
        mainRiskAddressDescription.push([add_risk, newArray]);
        add_risk = add_risk + 1;
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
        get_total_sum_Assured()
    }

    function AddRiskDetails(add_risk_details) {
        // alert(add_risk_details);
        var counter = add_risk_details.split("_");
        var actual_counters = counterArray[counter[0]];
        var details = ++actual_counters;
        var tot_counter = counter[0] + "_" + details;
        if (option_policyDescription_data == "") {
            var option_riskval = '<?php if (!empty($risk_description)) : foreach ($risk_description as $row) : ?><option value="<?php echo  $row["policy_description_id"]; ?>"><?php echo  ucwords($row["policy_description_name"]); ?></option><?php endforeach;
                                                                                                                                                                                                                                        endif; ?>';
        } else {
            var option_riskval = option_policyDescription_data;
        }

        // alert(tot_counter);
        // alert(details);
        var tr_table = '<div class="col-md-12 form-group row description"  id="description_' + tot_counter + '"><div class="col-md-5"><div class="form-group row"> <label for="risk_description" class="col-form-label col-md-5 text-right">Description</label> <div class="col-md-7"><select class="form-control risk_description" id="risk_description_' + tot_counter + '" name="risk_description[]"> <option value="null" >Select Description</option>' + option_riskval + '</select></div> </div> </div> <div class="col-md-5"><div class="form-group row"> <label for="risk_sum_assured" class="col-form-label col-md-4 text-right">Sum Assured</label> <div class="col-md-8"><input class="form-control risk_sum_assured" type="number" name="risk_sum_assured[]" id="risk_sum_assured_' + tot_counter + '" value="" placeholder="Risk Sum Assured"  onkeyup="get_total_sum_Assured()"></div> </div> </div> <div class="col-md-2"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_risk_details_' + tot_counter + '" onClick=removeRiskDetails("' + tot_counter + '") > </div></div></div>';
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

    }

    var actual_data_risk = [];

    function TotalRisk() {
        actual_data_risk = [];
        // console.log(mainRiskAddress);
        // console.log(mainRiskAddressDescription);
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
            // console.log(actual_data_risk_details);
            actual_data_risk.push([value, risk_address, actual_data_risk_details]);
        });

        // console.log(actual_data_risk);
        // alert(actual_data_risk);
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

    function removeRemark(add_remark) {
        $("#remove_remark_" + add_remark).closest("tr").remove();
    }

    function AddRemark(add_remark) {
        add_remark = add_remark + 1;

        $("#AddRemark").attr("onClick", "AddRemark(" + add_remark + ")");
        var tr_table = '<tr style=""><td style="border: 1px solid #dddddd;"><textarea rows="5" name="remarks[]" id="remarks_' + add_remark + '" value="" placeholder="Enter Remarks" class="form-control remarks"></textarea></td> <td style = "border: 1px solid #dddddd;" > <input type = "date" name = "male_date[]" id = "male_date_' + add_remark + '"   value = "" placeholder = "Enter Mail Date" class = "form-control male_date" > </td> <td style = "border: 1px solid #dddddd;" > <center><button class = "btn btn-primary btn-sm dripicons-cross"  id = "remove_remark_' + add_remark + '" onClick = "removeRemark(' + add_remark + ')" > </button></center></td > < /tr>';
        $("#append_remark").append(tr_table);
    }

    function removeHypotication(add_hypotication) {
        $("#remove_hypotication_" + add_hypotication).closest("tr").remove();
    }

    function AddHypotication(add_hypotication) {
        add_hypotication = add_hypotication + 1;
        $("#AddHypotication").attr("onClick", "AddHypotication(" + add_hypotication + ")");
        var tr_table = '<tr style=""><td style="border: 1px solid #dddddd;"><input type="text" name="bank_name[]" id="bank_name_' + add_hypotication + '" value="" placeholder="Enter Bank Name" class="form-control bank_name"></td> <td style = "border: 1px solid #dddddd;" > <input type = "text" name = "branch_name[]" id = "branch_name_' + add_hypotication + '"   value = "" placeholder = "Enter Branch Name" class = "form-control branch_name" > </td> <td style = "border: 1px solid #dddddd;" ><center> <button class = "btn btn-primary btn-sm dripicons-cross"  id = "remove_hypotication_' + add_hypotication + '" onClick = "removeHypotication(' + add_hypotication + ')" > </button></center></td > < /tr>';
        $("#append_hypotication").append(tr_table);
    }

    function removeCorrespondence(add_correspondence) {
        $("#remove_correspondence_" + add_correspondence).closest("tr").remove();
    }

    function AddCorrespondence(add_correspondence) {

        add_correspondence = add_correspondence + 1;

        $("#AddCorrespondence").attr("onClick", "AddCorrespondence(" + add_correspondence + ")");
        var tr_table = '<tr style=""><td style="border: 1px solid #dddddd;"><select name="member_name[]" id="member_name_' + add_correspondence + '" class="form-control member_name" onchange="MemberNameBaseddetails(' + add_correspondence + ')"><option value="null">Select Member Names</option>' + option_val_data + ' </select><input type="hidden" name="member_name_txt[]" class="member_name_txt" id="member_name_txt_' + add_correspondence + '" value="" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_email[]" id="correspondence_email_' + add_correspondence + '" value="" placeholder="Enter Email Id" class="form-control correspondence_email"></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_whatsapp[]" id="correspondence_whatsapp_' + add_correspondence + '" value="" placeholder="Enter Whatsapp" class="form-control correspondence_whatsapp"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_telegram[]" id="correspondence_telegram_' + add_correspondence + '" value="" placeholder="Enter Telegram/Signal" class="form-control correspondence_telegram"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_cc[]" id="correspondence_cc_' + add_correspondence + '" value="" data-role="tagsinput" placeholder="Enter  CC" class="correspondence_cc form-control" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_bcc[]" id="correspondence_bcc_' + add_correspondence + '" value="" data-role="tagsinput" placeholder="Enter  Bcc" class="correspondence_bcc form-control" ></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_correspondence_' + add_correspondence + '" onClick="removeCorrespondence(' + add_correspondence + ')" ></button></center></td> < /tr>';
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
            actual_data_remarks.push([remarks, male_date]);
            if (male_date === '0000-00-00' || male_date === '')
                actual_data_remarks.splice(index, 1);
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
        // $(".male_date").datepicker({
        //     'format': 'yyyy-mm-dd',
        //     'autoclose': true,
        //     'todayHighlight': true
        // });
    });

    Todate_Basedon_Modeofpremium();

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
        // alert(to_date+"minus_day_date_to_date");
        to_date = new Date(to_date);
        var minus_day = to_date.setDate(to_date.getDate() - 1);
        var minus_day_date = new Date(minus_day).toLocaleDateString('en-CA');
        // alert(minus_day_date);
        $("#date_to").val(minus_day_date);

        if (date_from != "") {
            $('#date_commenced').val(date_from);
            $('#date_commenced').attr("disabled", true);
            payment_fromdate();
            payment_Fromedate_based_Todate(date_from, minus_day_date);
        }
        var org_date_to = $("#date_to").val();
        // alert("minus_day_date"+minus_day_date)
        // alert("minus_day_date"+org_date_to)
        // payment_Todate(minus_day_date);
        payment_Todate(org_date_to);
    }

    function payment_Fromedate_based_Todate(date_from, to_date) {
        $('#date_commenced').val(date_from);
        $('#date_commenced').attr("disabled", true);

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
            $('#date_commenced').val(date_from);
            $('#date_commenced').attr("disabled", true);
            var date = new Date(date_from),
                date_from_yr = date.getFullYear(),
                date_from_month = ("0" + (date.getMonth() + 1)).slice(-2);
            // alert(date_from_yr);
            // alert(date_from_month);
            var mode_of_premimum = $("#mode_of_premimum").val();
            // alert(mode_of_premimum);
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
                } else if (mode_of_premimum == 4) { //4: 1Yearly
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
            // alert(date_from_yr);
            // alert(date_from_month);
            if (date_from_month > 12) {
                date_from_month = date_from_month - 12;
                if (date_from_month < 10) {
                    date_from_month = "0" + date_from_month;
                }
                date_from_yr = date_from_yr + 1;
            }

            var date2 = new Date(date_to),
                date_to_yr = date2.getFullYear(),
                date_to_month = ("0" + (date2.getMonth() + 1)).slice(-2);

            // alert(date2);
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
            // alert(newDate);
            $("#date_to").val(newDate);
            // $("#date_to").val(org_dateto_day);
            var img_newDate = new Date(newDate);
            var lastDay = new Date(img_newDate.getFullYear(), img_newDate.getMonth() + 1, 0).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the ;
            var policy_name_txt = $("#policy_name option:selected").text();
            // alert(lastDay);
            if (policy_name_txt == "Specific Policy") {
                $("#period_of_insurance").text(date_from + " To " + lastDay);
            } else {
                $("#period_of_insurance").text(date_from + " To " + newDate);
            }
            // alert(lastDay);
            // $("#period_of_insurance").text(date_from + " To " + newDate);
            // alert(newDate+"newDate");
            payment_Todate(newDate);
            get_gst_rate();
        }
    }

    function payment_Todate(toDate) {
        // alert(toDate+"toDate");
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
        var date_from = $("#date_from").val();
        // alert(date_from);

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
                        // alert(data["userdata"]);
                        if (date_from != "") {
                            var todate = "";
                            // alert(data["userdata"]); 
                            $("#date_to").val(data["userdata"]);
                            payment_Fromedate_based_Todate(date_from, todate = data["userdata"]);
                        } else {
                            $("#date_to").val(data["userdata"]);
                        }


                        payment_Todate();
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
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
        // date.getMonth() + 1;
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
        var date_to = $("#date_to").val();
        var date = new Date(date_to),
            yr = date.getFullYear(),
            // month = date.getMonth() + 1;
            month = ("0" + (date.getMonth() + 1)).slice(-2);
        // alert(month); 
        $("#date_commenced").val(date_from);
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
                        $("#payment_date_from").val(data["userdata"]);
                        newDate = yr + '-' + month + '-' + data["to_date"];
                        // alert(newDate);
                        $("#date_to").val(newDate);
                        $("#period_of_insurance").text(date_from + " To " + newDate);
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
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
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function company_department() {
        var company = $("#company").val();
        $("#sub_policy_name_div").hide();
        $("#sub_policy_family_size_div").hide();
        $("#sub_policy_add_child_div").hide();
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

    function company_agency() {
        var company = $("#company").val();

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

    getPolicyCounter();

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

    function getPolicyCounter_bak() {

        var url = "<?php echo $base_url; ?>master/policy/get_policy_counter";
        var date = "<?php echo date('Y'); ?>/<?php echo date('m'); ?>/";

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
                    var data_details = data["userdata"];
                    var policy_counter = 0;
                    if (data_details == "") {
                        policy_counter = policy_counter + 1;
                    } else {
                        policy_counter = data_details.policy_counter;
                        policy_counter = parseInt(policy_counter) + 1;
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

                    $('#serial_no').val(date + actual_policy_counter);

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
        if ($.inArray($('#' + id).val().split('.').pop().toLowerCase(), ['png', 'jpg', 'jpeg', 'pdf', 'jpe', 'doc', 'docx', 'csv', 'xls']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            $('#' + id).addClass("parsley-error");
            $('#' + id + "_err").addClass("text-danger").html("Please Select Only Valid Document Like PDF,Image,Excel or Doc File Only.");
            toaster(message_type = "Error", message_txt = "Please Select Only Valid Document Like PDF,Image,Excel or Doc File Only.", message_icone = "error");
            return false;
        } else {
            $('#' + id).removeClass("parsley-error");
            $('#' + id + "_err").removeClass("text-danger").html("");
        }
    }
    var actual_data_memberName_Arr = [];

    function get_tot_member_name() {
        actual_data_memberName_Arr = [];

        $("#first_table tr:has(.name_insured_member_name)").each(function(key, val) {
            var name_insured_member_name = $(".name_insured_member_name", this).val();
            actual_data_memberName_Arr.push(name_insured_member_name);
        });
        if (actual_data_memberName_Arr.length === 0) {
            var policy_holder_name = $("#policy_holder_name").val();
            actual_data_memberName_Arr.push(policy_holder_name);
            // alert("Empty");
            // $('#error_message').html("Error");
        }
        // alert(actual_data_memberName_Arr);
        // return false;
        return actual_data_memberName_Arr;
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


    function get_tot_memberNamewise_total_sumassured() {
        actual_data_memberNamewise_total_sumassured = 0;
        var inputs = $(".name_insured_sum_insured");
        var actual_data_memberNamewise_total_sumassured = 0;
        for (var i = 0; i < inputs.length; i++) {
            // alert();
            var number = $(inputs[i]).val();
            if (number.includes(","))
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

    $("#submit").click(function() {
        var member_name_arr = get_tot_member_name();
        var total_basic_sum_insured = get_tot_memberNamewise_total_sumassured();
        // alert(total_basic_sum_insured);
        // return false;
        // get_total_sum_Assured();
        var TotalRisk_Rc = JSON.stringify(totalRisk_Rc());
        // alert(TotalRisk_Rc);
        // return false;
        var policy_name_txt = $("#policy_name option:selected").text();
        var policy_type = $("#policy_type").val();
        if (policy_type == 1) // 1:Individual , 2:Floater
            var totalRisk = JSON.stringify(TotalRisk());
        else if (policy_type == 2 && policy_name_txt != "Mediclaim")
            var totalRisk = JSON.stringify(TotalRiskFloater());
        else if (policy_type == 3)
            var totalRisk = JSON.stringify(TotalRisk());

        // alert(totalRisk);
        // return false;
        var totalRemarks = JSON.stringify(TotalRemarks());
        var totalCorrespondence = JSON.stringify(TotalCorrespondence());
        // alert(totalCorrespondence);
        // return false;
        var totalHypotication = TotalHypotication();
        totalHypotication = JSON.stringify(totalHypotication);

        var total_Paymentacknowledge = Total_Paymentacknowledge();
        total_Paymentacknowledge = total_Paymentacknowledge.split("&%$#&")
        var total_Paymentacknowledge_data = total_Paymentacknowledge[0];
        // alert(total_Paymentacknowledge_data);
        // alert(total_Paymentacknowledge[1]);
        // return false;
        if (total_Paymentacknowledge[1] == "true")
            return false;

        var serial_no_year = $("#serial_no_year").val();
        var serial_no_month = $("#serial_no_month").val();
        var serial_no = $("#serial_no").val();
        var company = $("#company").val();
        var company_txt = $("#company option:selected").text();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();
        var policy_name_txt = $("#policy_name option:selected").text();

        // if (policy_type == 2)
        //     var floater_policy_type = $("#floater_policy_type").val();
        // else if (policy_type == 1)
        //     var floater_policy_type = $("#individual_policy_type").val();
        var sub_policy_name_hidden = false;
        var sub_policy_name_txt_box_hidden = false;
        var floater_policy_type = "";
        var sub_policy_name_txt_box = "";
        // var sub_policy_name = $("#sub_policy_name").val();sub_policy_name_txt_box
        var sub_policy_name_txt_box_hidden = $("#sub_policy_name_txt_box").is(":visible");
        var sub_policy_name_hidden = $("#sub_policy_name").is(":visible");
        if (sub_policy_name_hidden == true){
            floater_policy_type = $("#sub_policy_name").val();
            // form_data.append('floater_policy_type', floater_policy_type);
        }else if(sub_policy_name_txt_box_hidden == true){
            sub_policy_name_txt_box = $("#sub_policy_name_txt_box").val();
        }
            

        // alert(floater_policy_type);return false;


        // var hidden = $("#floater_policy_type").is(":visible");
        // var hidden2 = $("#individual_policy_type").is(":visible");
        // var hidden3 = $("#hdfc_ergo_health_insu_individual_policy_type").is(":visible");
        // var hidden4 = $("#new_india_assur_indi_policy_type").is(":visible");
        // var hidden5 = $("#max_bupa_health_insu_type").is(":visible");
        // var hidden6 = $("#star_health_allied_insu_type").is(":visible");
        // var hidden7 = $("#care_health_insu_type").is(":visible");
        // var floater_policy_type = "";
        // if (hidden == true)
        //     floater_policy_type = $("#floater_policy_type").val();
        // else if (hidden2 == true)
        //     floater_policy_type = $("#individual_policy_type").val();
        // else if (hidden3 == true)
        //     floater_policy_type = $("#hdfc_ergo_health_insu_individual_policy_type").val();
        // else if (hidden4 == true)
        //     floater_policy_type = $("#new_india_assur_indi_policy_type").val();
        // else if (hidden5 == true)
        //     floater_policy_type = $("#max_bupa_health_insu_type").val();
        // else if (hidden6 == true)
        //     floater_policy_type = $("#star_health_allied_insu_type").val();
        // else if (hidden7 == true)
        //     floater_policy_type = $("#care_health_insu_type").val();
        // alert(floater_policy_type);
        // return false;

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
        check_file_upload(id = "policy_upload");
        var reg_mobile = $("#reg_mobile").val();
        var reg_email = $("#reg_email").val();
        var policy_counter_no = $('#policy_counter_no').val();

        var riv = $("#riv").val();
        var type_of_bussiness = $("#type_of_bussiness").val();
        var description_of_stock = $("#description_of_stock").val();

        var quotation_date = $("#quotation_date").val();
        var quotation_upload = $('#quotation_upload').prop('files')[0];
        check_file_upload(id = "quotation_upload");
        var quotation_male_link = $("#quotation_male_link").val();

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

        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Floater") {
            var sub_policy_family_size = $("#sub_policy_family_size").val();
            var sub_policy_add_child = $('#sub_policy_add_child').val();
        }
        // alert(policy_upload);
        // if (policy_no != "") {
        //     // alert("The Policy Upload field is required.");
        //     if (policy_upload == undefined) {
        //         toaster(message_type = "Error", message_txt = "The Policy Upload field is required.", message_icone = "error");
        //         $("#policy_upload_err").removeClass("text-danger");
        //         $("#policy_upload_err").addClass("text-danger").html("The Policy Upload field is required.");
        //         return false;
        //     }
        // } else
        //     $("#policy_upload_err").removeClass("text-danger").text("");

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
        if (final_paybal_premium == "" || final_paybal_premium == 0) {
            toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
            return false;
        }
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
        if (sub_policy_name_hidden == true){
            form_data.append('floater_policy_type', floater_policy_type);
        }else if(sub_policy_name_txt_box_hidden == true){
            form_data.append('sub_policy_name_txt_box', sub_policy_name_txt_box);
        }
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

        form_data.append('date_from', date_from);
        form_data.append('date_to', date_to);
        form_data.append('payment_date_from', payment_date_from);
        form_data.append('payment_date_to', payment_date_to);
        form_data.append('policy_no', policy_no);
        form_data.append('group_name', group_name);
        form_data.append('policy_holder_name', policy_holder_name);
        form_data.append('date_commenced', date_commenced);
        form_data.append('policy_upload', policy_upload);
        form_data.append('reg_mobile', reg_mobile);
        form_data.append('reg_email', reg_email);
        form_data.append('policy_counter_no', policy_counter_no);
        form_data.append('member_name_arr', member_name_arr);

        form_data.append('total_basic_sum_insured', total_basic_sum_insured);
        form_data.append('riv', riv);
        form_data.append('type_of_bussiness', type_of_bussiness);
        form_data.append('description_of_stock', description_of_stock);
        form_data.append('quotation_date', quotation_date);
        form_data.append('quotation_upload', quotation_upload);
        form_data.append('quotation_male_link', quotation_male_link);

        form_data.append('total_remarks', totalRemarks);
        form_data.append('total_hypotication', totalHypotication);
        form_data.append('total_correspondence', totalCorrespondence);
        form_data.append('total_paymentacknowledge_data', total_Paymentacknowledge_data);
        form_data.append('total_risk', totalRisk);
        form_data.append('total_risk_Rc', TotalRisk_Rc);

        // alert(policy_type_txt);
        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Floater") {
            form_data.append('family_size', sub_policy_family_size);
            form_data.append('addition_of_more_child', sub_policy_add_child);
        }

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
            if (term_plan_final_paybal_premium == "" || term_plan_final_paybal_premium == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
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
            if (shopkeeper_final_paybal_premium == "" || shopkeeper_final_paybal_premium == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
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
            if (jweller_final_payble == "" || jweller_final_payble == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
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
        if (policy_name_txt == "Open Policy" || policy_name_txt == "Stop Policy") { //Open/Stop Policy : Marine
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
            if (marine_final_payble_premium == "" || marine_final_payble_premium == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }

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
            if (marine_final_payble_premium == "" || marine_final_payble_premium == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
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
        // alert(policy_type_txt);
        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Individual") {
            // alert(floater_policy_type);
            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);

            if (company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") {
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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
                } else if (floater_policy_type == "Energy") {
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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
                } else if (floater_policy_type == "Health Suraksha") {
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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
                } else if (floater_policy_type == "Easy Health") {
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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
            } else if (company_txt == "The New India Assurance Co Ltd") {
                if (floater_policy_type == "New India Mediclaim Policy 2017") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_the_new_india_medi_tns_hdfc_json_data = JSON.stringify(Total_Medi_the_new_2017_assu());
                    var tot_premium = $("#tot_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_the_new_india_medi_tns_hdfc_json_data', total_the_new_india_medi_tns_hdfc_json_data);
                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }
            } else if ((company_txt == "Max Bupa Health Insurance Co Ltd") || (company_txt == "Niva Bupa Health Insurance Co Ltd")) {
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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

            } else if (company_txt == "Star Health & Allied Insurance Co Ltd") {
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_star_health_red_carpet_medi_ind_json_data', total_star_health_red_carpet_medi_ind_json_data);
                    form_data.append('years_of_premium', years_of_premium);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                } else if (floater_policy_type == "Comprehensive") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_star_health_comprehensive_medi_ind_json_data = JSON.stringify(Total_Medi_starHealth_comprehensive());
                    var years_of_premium = $("#years_of_premium").val();

                    var tot_premium = $("#tot_premium").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_star_health_comprehensive_medi_ind_json_data', total_star_health_comprehensive_medi_ind_json_data);
                    form_data.append('years_of_premium', years_of_premium);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                }

            } else if (company_txt == "United India Insurance Co Ltd") {

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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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
                } else if (floater_policy_type == "Floater 2020(Individual)") {
                    // var restore_cover = $("#restore_cover").val();
                    // var maternity_new_born_baby_cover = $("#maternity_new_born_baby_cover").val();
                    // var daily_cash_allowance_cover = $("#daily_cash_allowance_cover").val();

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
                    if (medi_ind_2020_final_premium == "" || medi_ind_2020_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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
            } else if (company_txt == "Care Health Insurance Co Ltd") {
                if (floater_policy_type == "Care Advantage") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_care_adv_ind_json_data = JSON.stringify(Total_care_adv_ind());
                    var medi_final_premium = $("#medi_final_premium").val();
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_care_adv_ind_json_data', total_care_adv_ind_json_data);
                    form_data.append('medi_final_premium', medi_final_premium);
                } else if (floater_policy_type == "Care") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_care_ind_json_data = JSON.stringify(Total_care_ind());
                    var medi_final_premium = $("#medi_final_premium").val();
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_care_ind_json_data', total_care_ind_json_data);
                    form_data.append('medi_final_premium', medi_final_premium);
                }
            }
        }

        if (policy_name_txt == "Mediclaim" && policy_type_txt == "Floater") {
            // alert(floater_policy_type);

            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);
            if (company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") {
                if (floater_policy_type == "Optima Restore") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_medi_float_hdfc_json_data = JSON.stringify(Total_MediclaimHDFC_float());
                    var sub_policy_family_size = $("#sub_policy_family_size").val();
                    var sub_policy_add_child = $("#sub_policy_add_child").val();
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
                    var stay_active_benefit_prem_tot = $("#stay_active_benefit_prem_tot").val();
                    var gross_premium_tot = $("#gross_premium_tot").val();
                    var gross_premium_tot_new = $("#gross_premium_tot_new").val();
                    var cgst_fire_per = $("#cgst_fire_per").val();
                    var medi_cgst_tot = $("#medi_cgst_tot").val();
                    var sgst_fire_per = $("#sgst_fire_per").val();
                    var medi_sgst_tot = $("#medi_sgst_tot").val();
                    var less_disc_per = $("#less_disc_per").val();
                    var less_disc_tot = $("#less_disc_tot").val();
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_medi_float_hdfc_json_data', total_medi_float_hdfc_json_data);
                    form_data.append('hdfc_ergo_health_insu_family_size', sub_policy_family_size);
                    form_data.append('hdfc_ergo_health_insu_addition_of_more_child', sub_policy_add_child);
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
                } else if (floater_policy_type == "Health Suraksha") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var total_suraksha_float_medi_hdfc_json_data = JSON.stringify(Total_float_Suraksh_Medi_HDFC());
                    var sub_policy_family_size = $("#sub_policy_family_size").val();
                    var sub_policy_add_child = $("#sub_policy_add_child").val();
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_suraksha_float_medi_hdfc_json_data', total_suraksha_float_medi_hdfc_json_data);
                    form_data.append('suraksha_float_hdfc_ergo_health_insu_family_size', sub_policy_family_size);
                    form_data.append('hdfc_ergo_health_insu_addition_of_more_child', sub_policy_add_child);
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
                } else if (floater_policy_type == "Easy Health") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var sub_policy_family_size = $("#sub_policy_family_size").val();
                    var sub_policy_add_child = $("#sub_policy_add_child").val();
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('hdfc_ergo_health_insu_family_size', sub_policy_family_size);
                    form_data.append('hdfc_ergo_health_insu_addition_of_more_child', sub_policy_add_child);
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
            } else if (company_txt == "The New India Assurance Co Ltd") {
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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

            } else if ((company_txt == "Max Bupa Health Insurance Co Ltd") || (company_txt == "Niva Bupa Health Insurance Co Ltd")) {
                if (floater_policy_type == "Reassure") {
                    var sub_policy_family_size = $("#sub_policy_family_size").val();
                    form_data.append('floater_policy_type', floater_policy_type);
                    form_data.append('max_bupa_health_insu_medi_reassure_float_family_size', sub_policy_family_size);
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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
                    form_data.append('max_age', max_age);
                }

            } else if (company_txt == "Star Health & Allied Insurance Co Ltd") {
                if (floater_policy_type == "Red Carpet") {
                    var sub_policy_family_size = $("#sub_policy_family_size").val();
                    form_data.append('star_health_allied_insu_red_carpet_float_family_size', sub_policy_family_size);
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_star_health_red_carpet_medi_float_json_data', total_star_health_red_carpet_medi_float_json_data);
                    form_data.append('years_of_premium', years_of_premium);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                } else if (floater_policy_type == "Comprehensive") {
                    var sub_policy_family_size = $("#sub_policy_family_size").val();
                    form_data.append('star_health_allied_insu_comprehensive_float_family_size', sub_policy_family_size);
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
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('total_star_health_comprehensive_medi_float_json_data', total_star_health_comprehensive_medi_float_json_data);
                    form_data.append('years_of_premium', years_of_premium);

                    form_data.append('tot_premium', tot_premium);
                    form_data.append('medi_cgst_rate', cgst_fire_per);
                    form_data.append('medi_cgst_tot', medi_cgst_tot);
                    form_data.append('medi_sgst_rate', sgst_fire_per);
                    form_data.append('medi_sgst_tot', medi_sgst_tot);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                }

            } else if (company_txt == "United India Insurance Co Ltd") {
                if (floater_policy_type == "Family Floater 2014") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    // alert(floater_policy_type);
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
                    // alert(medi_float_2014_final_premium);
                    if (medi_float_2014_final_premium == "" || medi_float_2014_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    // return false;
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
                } else if (floater_policy_type == "Family Floater 2020") {
                    // alert(floater_policy_type);
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
                    if (medi_float_2020_final_premium == "" || medi_float_2020_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
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
                }
            } else if (company_txt == "Care Health Insurance Co Ltd") {
                if (floater_policy_type == "Care Advantage") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var sub_policy_family_size = $("#sub_policy_family_size").val();
                    var total_care_adv_float_json_data = JSON.stringify(Total_care_adv_float());
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('care_health_insu_care_advantage_float_family_size', sub_policy_family_size);
                    form_data.append('total_care_adv_float_json_data', total_care_adv_float_json_data);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                } else if (floater_policy_type == "Care") {
                    form_data.append('floater_policy_type', floater_policy_type);
                    var sub_policy_family_size = $("#sub_policy_family_size").val();
                    var total_care_float_json_data = JSON.stringify(Total_care_float());
                    var medi_final_premium = $("#medi_final_premium").val();
                    var max_age = $("#max_age").val();
                    if (medi_final_premium == "" || medi_final_premium == 0) {
                        toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                        return false;
                    }
                    form_data.append('care_health_insu_care_advantage_float_family_size', sub_policy_family_size);
                    form_data.append('total_care_float_json_data', total_care_float_json_data);
                    form_data.append('medi_final_premium', medi_final_premium);
                    form_data.append('max_age', max_age);
                }
            }
        }

        if ((policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness") && (policy_type_txt == "Floater" || policy_type_txt == "Common Floater")) {

            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);

            if ((company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") && policy_type_txt == "Floater") {
                var sub_policy_family_size = $("#sub_policy_family_size").val();
                form_data.append('hdfc_ergo_health_insu_supertopup_float_family_size', sub_policy_family_size);

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
                if (medi_final_premium == "" || medi_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
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
            } else if (company_txt == "The New India Assurance Co Ltd" && policy_type_txt == "Floater") {

                var total_the_new_india_supertopup_ind_json_data = JSON.stringify(Total_supertopup_the_new_assu());
                var tot_premium = $("#tot_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                if (medi_final_premium == "" || medi_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
                form_data.append('total_the_new_india_supertopup_ind_json_data', total_the_new_india_supertopup_ind_json_data);
                form_data.append('tot_premium', tot_premium);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);

            } else if (company_txt == "Star Health & Allied Insurance Co Ltd" && policy_type_txt == "Floater") {
                var sub_policy_family_size = $("#sub_policy_family_size").val();
                form_data.append('star_health_allied_insu_supertopup_float_family_size', sub_policy_family_size);

                var total_star_health_supertopup_float_json_data = JSON.stringify(Total_Medi_starHealth_supertop_float());
                var tot_premium = $("#tot_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                var max_age = $("#max_age").val();
                if (medi_final_premium == "" || medi_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
                form_data.append('total_star_health_supertopup_float_json_data', total_star_health_supertopup_float_json_data);
                form_data.append('tot_premium', tot_premium);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);
                form_data.append('max_age', max_age);

            } else {

                var sub_policy_family_size = $("#sub_policy_family_size").val();
                form_data.append('family_size', sub_policy_family_size);

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
                if (supertopup_floater_final_premium == "" || supertopup_floater_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
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
            }
        }

        if ((policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness") && (policy_type_txt == "Individual" || policy_type_txt == "Common Individual")) {

            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);
            if ((company_txt == "HDFC ERGO HEALTH INSURANCE LTD" || company_txt == "HDFC Ergo General Insurance Co Ltd") && policy_type_txt == "Individual") {
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
                if (medi_final_premium == "" || medi_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
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
            } else if (company_txt == "The New India Assurance Co Ltd" && policy_type_txt == "Individual") {

                var total_the_new_india_supertopup_ind_single_json_data = JSON.stringify(Total_supertopup_the_new_assu_ind());
                var tot_premium = $("#tot_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                if (medi_final_premium == "" || medi_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
                form_data.append('total_the_new_india_supertopup_ind_single_json_data', total_the_new_india_supertopup_ind_single_json_data);
                form_data.append('tot_premium', tot_premium);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);

            } else if (company_txt == "Star Health & Allied Insurance Co Ltd" && policy_type_txt == "Individual") {
                var total_star_health_supertopup_ind_json_data = JSON.stringify(Total_Medi_starHealth_supertop());
                var tot_premium = $("#tot_premium").val();
                var cgst_fire_per = $("#cgst_fire_per").val();
                var medi_cgst_tot = $("#medi_cgst_tot").val();
                var sgst_fire_per = $("#sgst_fire_per").val();
                var medi_sgst_tot = $("#medi_sgst_tot").val();
                var medi_final_premium = $("#medi_final_premium").val();
                if (medi_final_premium == "" || medi_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
                form_data.append('total_star_health_supertopup_ind_json_data', total_star_health_supertopup_ind_json_data);
                form_data.append('tot_premium', tot_premium);
                form_data.append('medi_cgst_rate', cgst_fire_per);
                form_data.append('medi_cgst_tot', medi_cgst_tot);
                form_data.append('medi_sgst_rate', sgst_fire_per);
                form_data.append('medi_sgst_tot', medi_sgst_tot);
                form_data.append('medi_final_premium', medi_final_premium);

            } else {
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
                if (supertopup_ind_final_premium == "" || supertopup_ind_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
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

        if (policy_name_txt == "GMC" && (policy_type_txt == "Individual" || policy_type_txt == "Floater" || policy_type_txt == "Common Individual" || policy_type_txt == "Common Floater")) {
            var total_GMC = Total_GMC();
            total_GMC = total_GMC.split("&%$#&")
            var total_GMC_data = total_GMC[0];

            if (total_GMC[1] == "true")
                return false;

            var gmc_family_size = $("#gmc_family_size").val();
            var gmc_total_sum_insured = $("#gmc_total_sum_insured").val();
            if (gmc_total_sum_insured == "" || gmc_total_sum_insured == 0) {
                toaster(message_type = "Error", message_txt = "The Final Sum Insured field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
            form_data.append('total_gmc_data', total_GMC_data);
            form_data.append('gmc_family_size', gmc_family_size);
            form_data.append('gmc_total_sum_insured', gmc_total_sum_insured);
        }

        if (policy_name_txt == "GPA" && (policy_type_txt == "Individual" || policy_type_txt == "Floater" || policy_type_txt == "Common Individual" || policy_type_txt == "Common Floater")) {
            var total_GPA = Total_GPA();
            total_GPA = total_GPA.split("&%$#&")
            var total_GPA_data = total_GPA[0];

            if (total_GPA[1] == "true")
                return false;

            var gmc_family_size = $("#gmc_family_size").val();
            var gmc_total_sum_insured = $("#gmc_total_sum_insured").val();
            if (gmc_total_sum_insured == "" || gmc_total_sum_insured == 0) {
                toaster(message_type = "Error", message_txt = "The Final Sum Insured field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
            form_data.append('total_gpa_data', total_GPA_data);
            form_data.append('gpa_family_size', gmc_family_size);
            form_data.append('gpa_total_sum_insured', gmc_total_sum_insured);
        }

        if ((policy_name_txt == "Mediclaim" || policy_name_txt == "Cancer Plan" || policy_name_txt == "Daily Cash" || policy_name_txt == "Overseas Mediclaim" || policy_name_txt == "Student Overseas Mediclaim" || policy_name_txt == "Employment Overseas Mediclaim" || policy_name_txt == "Personal Accident") && (policy_type_txt == "Common Individual" || policy_type_txt == "Common Floater")) {
            var tpa_company = $("#tpa_company").val();
            form_data.append('tpa_company', tpa_company);
            if (policy_type_txt == "Common Individual") {
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
                if (comm_ind_final_premium == "" || comm_ind_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
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

            } else if (policy_type_txt == "Common Floater") {
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
                if (comm_float_final_premium == "" || comm_float_final_premium == 0) {
                    toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                    return false;
                }
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

        if (policy_name_txt == "Private Car") {

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
            // alert(tot_othercover_ind_json);
            // return false;
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
            if (tot_payable_premium == "" || tot_payable_premium == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
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

        if (policy_name_txt == "2 Wheeler") {

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
            // form_data.append('od_special_disc_tot', od_special_disc_tot);
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
            if (tot_payable_premium == "" || tot_payable_premium == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
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
            if (tot_payable_premium == "" || tot_payable_premium == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
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
            if (medi_final_premium == "" || medi_final_premium == 0) {
                toaster(message_type = "Error", message_txt = "The Final Premium field is Greater Than 0 Required.", message_icone = "error");
                return false;
            }
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
        // alert(total_personal_accident);
        //     alert(total_fidelity_gaur);
        //     return false;
        var url = "<?php echo $base_url; ?>master/policy/addpolicy";

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
                // alert(data["status"]);
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
                        if (data["messages"]["policy_upload_err"] != "")
                            $("#policy_upload").addClass("parsley-error");
                        else
                            $("#policy_upload").removeClass("parsley-error");
                        $("#policy_upload_err").addClass("text-danger").html(data["messages"]["policy_upload_err"]);

                        if (data["messages"]["quotation_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["quotation_upload_err"], message_icone = "error");
                        if (data["messages"]["quotation_upload_err"] != "")
                            $("#quotation_upload").addClass("parsley-error");
                        else
                            $("#quotation_upload").removeClass("parsley-error");
                        $("#quotation_upload_err").addClass("text-danger").html(data["messages"]["quotation_upload_err"]);

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
                            var check_policy_no_isexist = data["message"]["policy_no_err"];
                            var flag = "";
                            if (check_policy_no_isexist != "") {
                                flag = "";
                                flag = check_policy_no_isexist.includes("Policy No is already Used for this Serial No.");
                                //  if(flag == true)
                                //     confirmation_alert(id = "", url = url, title = "Policy Details", type = "Delet");
                                // alert(flag);
                            }
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
    $(document).ready(function() {
        var path = window.location.pathname;
        var page = path.split("/").pop();
        var user_role_id = <?php echo  $this->session->userdata("@_user_role_id"); ?>;
        var submenu_permission = "<?php echo $this->session->userdata("@_user_role_sub_menu_permission"); ?>";
        var role_permission = '<?php echo $this->session->userdata("@_staff_role_permission"); ?>';
        var url = '<?php echo base_url(); ?>login/logout';
        if ((user_role_id != 1) && (user_role_id != 2)) {
            var id = $("#submenu").data("value");
            if (id != "") {
                CheckFormAccess(submenu_permission, 13, url);
                check(role_permission, 13);
            }
        }
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
                        // option_policyDescription_data

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

    function policyNameBased_Policy_option() {
        var policy_name = $("#policy_name").val();
        var policy_name_txt = $("#policy_name option:selected").text();
        //(policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness")
        // if (policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness" || policy_name_txt == "Personal Accident" || policy_name_txt == "GMC" || policy_name_txt == "GPA") {
        if (policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up" || policy_name_txt == "Top Up" || policy_name_txt == "Critical illness" || policy_name_txt == "Personal Accident" || policy_name_txt == "GMC" || policy_name_txt == "GPA" || policy_name_txt == "Cancer Plan" || policy_name_txt == "Daily Cash" || policy_name_txt == "Overseas Mediclaim" || policy_name_txt == "Student Overseas Mediclaim" || policy_name_txt == "Employment Overseas Mediclaim") {
            //(policy_name_txt == "Mediclaim" || policy_name_txt == "Cancer Plan" || policy_name_txt == "Daily Cash" || policy_name_txt == "Overseas Mediclaim" || policy_name_txt == "Student Overseas Mediclaim" || policy_name_txt == "Employment Overseas Mediclaim" || policy_name_txt == "Personal Accident")
            $("#policy_type option[value='4']").remove();
            $("#policy_type option[value='5']").remove();
            var append = '<option value="4">Common Individual</option><option value="5">Common Floater</option>';
            $("#policy_type").append(append);
            // alert(append);
        } else {
            $("#policy_type option[value='4']").remove();
            $("#policy_type option[value='5']").remove();
        }
        Policy_typeName();
    }

    var add_paymentacknowledge_counter = 0;
    var main_paymentacknowledge = [];
    var actual_data_Paymentacknowledge = [];

    function Total_Paymentacknowledge() {
        actual_data_Paymentacknowledge = [];
        var actual_data_flag = "false";

        payment_acknowledgement_file_name = "";
        payment_acknowledgement_flag = "";
        $.each(main_paymentacknowledge, function(key, val) {
            var payment_mode = $('#payment_mode_' + val).val();
            var payment_acknowledgement_file_name = PaymentAcknowledgement_file_upload(val);
            payment_acknowledgement_file_name = payment_acknowledgement_file_name.split("$%^&*(&&*%^$%$");
            var payment_acknowledgement_file = payment_acknowledgement_file_name[0];
            var payment_acknowledgement_flag = payment_acknowledgement_file_name[1];
            if (payment_acknowledgement_flag == "true") {
                actual_data_flag = "true";
                return false;
            }

            if (payment_acknowledgement_file == "") {
                payment_acknowledgement_file = "";
                var payment_acknowledgement_file_hidden = $('#payment_acknowledgement_file_hidden_' + val).val();
                if (payment_acknowledgement_file_hidden == undefined || payment_acknowledgement_file_hidden == "null")
                    payment_acknowledgement_file_hidden = "";
                payment_acknowledgement_file = payment_acknowledgement_file_hidden;
            }

            actual_data_Paymentacknowledge.push([val, payment_mode, payment_acknowledgement_file]);
            if (payment_mode == '' || payment_mode == 'null')
                actual_data_Paymentacknowledge.splice(val, 1);

        });

        return JSON.stringify(actual_data_Paymentacknowledge) + "&%$#&" + actual_data_flag;
    }

    function AddPaymentAcknowledgement(add_paymentacknowledge_counter) {
        if (main_paymentacknowledge.length == 0) {
            add_paymentacknowledge_counter = 0;
            main_paymentacknowledge = [];
        }
        $("#Add_PaymentAcknowledgement").attr("onClick", "AddPaymentAcknowledgement(" + add_paymentacknowledge_counter + ")");
        var tr_table = '<tr style=""><td style="border: 1px solid #dddddd;"><select name="payment_mode[]" id="payment_mode_' + add_paymentacknowledge_counter + '" class="form-control payment_mode"><option value="null">Select Payment Mode</option><option value="Cheque">Cheque</option><option value="Online Payment Link">Online Payment Link</option><option value="NEFT / IMPS / RTGS">NEFT / IMPS / RTGS</option></select></td><td style="border: 1px solid #dddddd;"><input type="file" name="payment_acknowledgement_file[]" id="payment_acknowledgement_file_' + add_paymentacknowledge_counter + '" class="form-control payment_acknowledgement_file"><span id="payment_acknowledgement_file_err_' + add_paymentacknowledge_counter + '"></span><input type="hidden" id="payment_acknowledgement_file_hidden_' + add_paymentacknowledge_counter + '" name="payment_acknowledgement_file_hidden" class="payment_acknowledgement_file_hidden"></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-sm dripicons-cross" id="payment_acknowledgement_' + add_paymentacknowledge_counter + '" onClick="RemovePaymentAcknowledgement(' + add_paymentacknowledge_counter + ')" ></button></center></td></tr>';
        $("#append_payment_acknowlege").append(tr_table);
        main_paymentacknowledge.push(add_paymentacknowledge_counter);
        // alert(main_paymentacknowledge);
        add_paymentacknowledge_counter = add_paymentacknowledge_counter + 1;
    }

    function RemovePaymentAcknowledgement(add_paymentacknowledge_counter) {
        $("#payment_acknowledgement_" + add_paymentacknowledge_counter).closest("tr").remove();
        main_paymentacknowledge.splice(main_paymentacknowledge.indexOf(add_paymentacknowledge_counter), 1);
        // alert(main_paymentacknowledge);
        if (main_paymentacknowledge.length == 0) {
            add_paymentacknowledge_counter = 0;
            main_paymentacknowledge = [];
            $("#Add_PaymentAcknowledgement").attr("onClick", "AddPaymentAcknowledgement(" + add_paymentacknowledge_counter + ")");
        }
    }

    function PaymentAcknowledgement_file_upload(add_paymentacknowledge_counter) {
        event.preventDefault();
        var paymentacknowledgement_file_name = "";
        var paymentacknowledgement_file_flag = "false";
        var payment_acknowledgement_file = $('#payment_acknowledgement_file_' + add_paymentacknowledge_counter).prop('files')[0];
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
                    $("#payment_acknowledgement_file_" + add_paymentacknowledge_counter).removeClass("parsley-error");
                    $("#payment_acknowledgement_file_err_" + add_paymentacknowledge_counter).removeClass("text-danger").html("");
                } else {
                    paymentacknowledgement_file_name = "";
                    // $('#payment_acknowledgement_file_'+add_paymentacknowledge_counter).val("");

                    if (data["messages"] != "") {
                        toaster(message_type = "Error", message_txt = "Payment Acknowledgement File : " + data["messages"]["payment_acknowledgement_file_err"], message_icone = "error");
                        $("#payment_acknowledgement_file_" + add_paymentacknowledge_counter).focus();
                        $("#payment_acknowledgement_file_" + add_paymentacknowledge_counter).addClass("parsley-error");
                        $("#payment_acknowledgement_file_err_" + add_paymentacknowledge_counter).addClass("text-danger").html(data["messages"]["payment_acknowledgement_file_err"]);
                        paymentacknowledgement_file_flag = "true";
                        return;
                    } else {
                        $("#payment_acknowledgement_file_" + add_paymentacknowledge_counter).removeClass("parsley-error");
                        $("#payment_acknowledgement_file_err_" + add_paymentacknowledge_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        return paymentacknowledgement_file_name + "$%^&*(&&*%^$%$" + paymentacknowledgement_file_flag;
    }

    function get_sub_policy_details() {
        var company_id = $("#company").val();
        var department_id = $("#department").val();
        var policy_name_id = $("#policy_name").val();

        var company_txt = $("#company option:selected").text();
        var department_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        // alert(company_txt);return false;
        if (policy_name_id != "") {
            $("#sub_policy_name").empty();
            $("#sub_policy_name_div").hide();
        }
        if (department_txt == "Fire") {
            var append_standard = '<option value="3">Residential & Commercial</option>';
        }

        $("#policy_type").empty();
        $("#policy_type").append('<option value="null">Select Policy Type</option><option value="1">Individual</option><option value="2">Floater</option>' + append_standard);

        var url = "<?php echo $base_url; ?>master/common/get_sub_policy_details";
        if (policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up") {
            $.ajax({
                url: url,
                data: {
                    company_id: company_id,
                    department_id: department_id,
                    policy_name_id: policy_name_id,

                    company_txt: company_txt,
                    department_txt: department_txt,
                    policy_name_txt: policy_name_txt,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var sub_policy_append = '';
                    var policy_type_arr = [];
                    var new_policy_type_arr = [];
                    $("#sub_policy_name").empty();
                    $("#policy_type").empty();
                    if (data["status"] == true) {
                        sub_policy_append = '<option value="null">Select Sub Policy Name</option>';
                        policy_type_append = '<option value="null">Select Policy Type</option>';
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sub_policy_name_id = data[key].sub_policy_name_id;
                            sub_policy_name = data[key].sub_policy_name;
                            policy_type = data[key].policy_type;
                            add_of_child_type = data[key].add_of_child_type;
                            family_size_type = data[key].family_size_type;
                            add_of_child_json = data[key].add_of_child_json;
                            family_size_json = data[key].family_size_json;
                            sub_policy_append += '<option value="' + sub_policy_name_id + '">' + sub_policy_name + '</option>';
                            policy_type_arr.push(policy_type);
                        });
                        policy_type_arr.push(4, 5);
                        // alert(policy_type_arr);
                        $.each($.unique(policy_type_arr), function(i, value) {
                            new_policy_type_arr.push(value);
                            // $('div').eq(1).append(value + ' ');
                        });
                        // alert(new_policy_type_arr);
                        multi_arr = {};
                        $.each(new_policy_type_arr, function(key, val) {
                            policy_type_id = new_policy_type_arr[key];
                            // alert(policy_type_id);
                            if (policy_type_id == 1)
                                policy_type_title = 'Individual';
                            else if (policy_type_id == 2)
                                policy_type_title = 'Floater';
                            else if (policy_type_id == 3)
                                policy_type_title = 'Residencial and Commercial';
                            else if (policy_type_id == 4)
                                policy_type_title = 'Common Individual';
                            else if (policy_type_id == 5)
                                policy_type_title = 'Common Floater';

                            multi_arr[policy_type_id] = policy_type_title;
                        });

                        $.each(multi_arr, function(key, val) {
                            new_policy_type_id = key;
                            new_policy_type_tit = val;
                            // alert(new_policy_type_id);
                            // alert(new_policy_type_tit);
                            policy_type_append += '<option value="' + new_policy_type_id + '">' + new_policy_type_tit + '</option>';
                        });
                        console.log(multi_arr);
                        // alert(policy_type_arr);
                        // alert(new_policy_type_arr);
                    } else {
                        policy_type_append = '<option value="null">Select Policy Type</option><option value="4">Common Individual</option><option value="5">Common Floater</option>';
                    }

                    $("#policy_type").append(policy_type_append);
                    $("#sub_policy_name").append('<option value="null">Select Sub Policy Name</option>');
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });

        } else {
            $("#sub_policy_name_div").hide();
            $("#sub_policy_family_size_div").hide();
            $("#sub_policy_add_child_div").hide();
        }
    }

    function get_sub_policy_names() {
        var company_id = $("#company").val();
        var department_id = $("#department").val();
        var policy_name_id = $("#policy_name").val();
        var policy_type_id = $("#policy_type").val();

        var company_txt = $("#company option:selected").text();
        var department_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        var policy_type_txt = $("#policy_type option:selected").text();

        if (company_id == "null")
            company_id = "";

        if (department_id == "null")
            department_id = "";

        if (policy_name_id == "null")
            policy_name_id = "";

        if (policy_type_id == "null")
            policy_type_id = "";

        if (policy_type_txt == "Common Floater" || policy_type_txt == "Common Individual"){
            $("#sub_policy_name_textbox_div").show();
            $("#3_cover_div").hide();
        }else{
            $("#sub_policy_name_textbox_div").hide();
        }

        if (policy_type_txt == "Individual" || policy_type_txt == "Common Individual")
            $(".sub_policy_name_label").text("Ind. Sub Policy Name");
        else if (policy_type_txt == "Floater" || policy_type_txt == "Common Floater")
            $(".sub_policy_name_label").text("Floater Sub Policy Name");

        var url = "<?php echo $base_url; ?>master/common/get_sub_policy_details";
        if (policy_name_txt == "Mediclaim" || policy_name_txt == "Super Top Up") {
            $.ajax({
                url: url,
                data: {
                    company_id: company_id,
                    department_id: department_id,
                    policy_name_id: policy_name_id,
                    policy_type_id: policy_type_id,

                    company_txt: company_txt,
                    department_txt: department_txt,
                    policy_name_txt: policy_name_txt,
                    policy_type_txt: policy_type_txt,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var sub_policy_append = '';
                    var policy_type_arr = [];
                    var new_policy_type_arr = [];
                    $("#sub_policy_name").empty();
                    if (data["status"] == true) {
                        $("#sub_policy_name_div").show();
                        sub_policy_append = '<option value="null">Select Sub Policy Name</option>';
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sub_policy_name_id = data[key].sub_policy_name_id;
                            sub_policy_name = data[key].sub_policy_name;
                            policy_type = data[key].policy_type;
                            add_of_child_type = data[key].add_of_child_type;
                            family_size_type = data[key].family_size_type;
                            add_of_child_json = data[key].add_of_child_json;
                            family_size_json = data[key].family_size_json;
                            sub_policy_append += '<option value="' + sub_policy_name + '">' + sub_policy_name + '</option>';
                            policy_type_arr.push(policy_type);
                            // alert(family_size_type);
                        });
                    } else {
                        $("#sub_policy_name_div").hide();
                        $("#sub_policy_family_size_div").hide();
                        $("#sub_policy_add_child_div").hide();
                        sub_policy_append = '<option value="null">Select Sub Policy Name</option>';
                    }


                    $("#sub_policy_name").append(sub_policy_append);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });

        }
    }

    function get_family_size_child() {

        var company_id = $("#company").val();
        var department_id = $("#department").val();
        var policy_name_id = $("#policy_name").val();
        var policy_type_id = $("#policy_type").val();
        var sub_policy_id = $("#sub_policy_name").val();

        var company_txt = $("#company option:selected").text();
        var department_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        var policy_type_txt = $("#policy_type option:selected").text();
        var sub_policy_name_txt = $("#sub_policy_name option:selected").text();

        // alert(sub_policy_id);
        if (sub_policy_id == "null") {
            $("#sub_policy_family_size").empty();
            $("#sub_policy_add_child").empty();
            $("#sub_policy_family_size_div").hide();
            $("#sub_policy_add_child_div").hide();
        }

        if (company_id == "null")
            company_id = "";

        if (department_id == "null")
            department_id = "";

        if (policy_name_id == "null")
            policy_name_id = "";

        if (policy_type_id == "null")
            policy_type_id = "";

        if (sub_policy_id == "null")
            sub_policy_id = "";

        if (sub_policy_name_txt == "Select Sub Policy Name") {
            sub_policy_name_txt = "";
        }

        var url = "<?php echo $base_url; ?>master/common/get_single_sub_policy_details";
        if (url != "" && sub_policy_name_txt != "") {
            $.ajax({
                url: url,
                data: {
                    company_id: company_id,
                    department_id: department_id,
                    policy_name_id: policy_name_id,
                    policy_type_id: policy_type_id,
                    sub_policy_id: sub_policy_id,

                    company_txt: company_txt,
                    department_txt: department_txt,
                    policy_name_txt: policy_name_txt,
                    policy_type_txt: policy_type_txt,
                    sub_policy_name_txt: sub_policy_name_txt,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var family_size_append = '';
                    var addition_of_child_append = '';
                    $("#sub_policy_family_size").empty();
                    $("#sub_policy_add_child").empty();
                    if (data["status"] == true) {
                        family_size_append = '<option value="null">Select Family Size</option>';
                        addition_of_child_append = '<option value="null">Select Addition of Child</option>';
                        var add_of_child_type = data["userdata"].add_of_child_type;
                        var family_size_type = data["userdata"].family_size_type;
                        var add_of_child_json = data["userdata"].add_of_child_json;
                        var family_size_json = data["userdata"].family_size_json;

                        if (add_of_child_type == 1) {
                            $("#sub_policy_add_child_div").show();
                            add_of_child_json = JSON.parse(data["userdata"].add_of_child_json);
                            $.each(add_of_child_json, function(key, val) {
                                add_of_child = add_of_child_json[key][1];
                                addition_of_child_append += '<option value="' + add_of_child + '">' + add_of_child + '</option>';
                            });
                        } else {
                            $("#sub_policy_family_size").empty();
                            $("#sub_policy_add_child_div").hide();
                        }

                        if (family_size_type == 1) {
                            $("#sub_policy_family_size_div").show();
                            family_size_json = JSON.parse(data["userdata"].family_size_json);
                            $.each(family_size_json, function(key, val) {
                                family_size = family_size_json[key][1];
                                family_size_append += '<option value="' + family_size + '">' + family_size + '</option>';
                            });
                        } else {
                            $("#sub_policy_add_child").empty();
                            $("#sub_policy_family_size_div").hide();
                        }
                    } else {
                        $("#sub_policy_family_size").empty();
                        $("#sub_policy_add_child").empty();
                        family_size_append = '<option value="null">Select Family Size</option>';
                        addition_of_child_append = '<option value="null">Select Addition of Child</option>';
                    }

                    $("#sub_policy_family_size").append(family_size_append);
                    $("#sub_policy_add_child").append(addition_of_child_append);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });

        } else {
            $("#sub_policy_family_size").empty();
            $("#sub_policy_add_child").empty();
            family_size_append = '<option value="null">Select Family Size</option>';
            addition_of_child_append = '<option value="null">Select Addition of Child</option>';
            $("#sub_policy_family_size").append(family_size_append);
            $("#sub_policy_add_child").append(addition_of_child_append);
            $("#sub_policy_family_size_div").hide();
            $("#sub_policy_add_child_div").hide();
        }
    }
</script>