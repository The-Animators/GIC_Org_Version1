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
                                                    $earliest_year = 1999;
                                                    $latest_year = date('Y');
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
                                                <select name="company" id="company" class="form-control" onchange="company_department();DepartmentBasedPolicyName();company_agency();departmentBased_Policy_option();PolicyType_Risk();">
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
                                                <select name="department" id="department" class="form-control" onchange="DepartmentBasedPolicyName();departmentBased_Policy_option();">
                                                    <option value="null">Select Department</option>
                                                    <?php //$department = department_dropdown();
                                                    // if (!empty($department)) : foreach ($department as $row1) : 
                                                    ?>
                                                    <!-- <option value="<?php //echo $row1["department_id"]; 
                                                                        ?>"><?php //echo $row1["department_name"]; 
                                                                            ?></option> -->
                                                    <?php
                                                    // endforeach;
                                                    // endif;
                                                    ?>
                                                </select>
                                                <span id="department_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="policy_name" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="policy_name" id="policy_name" class="form-control" onchange="Policy_typeName();">
                                                    <option value="null">Select Policy Name</option>
                                                    <?php //$policy_type = policy_type_dropdown();
                                                    // if (!empty($policy_type)) : foreach ($policy_type as $row2) : 
                                                    ?>
                                                    <!-- <option value="<?php //echo $row2["policy_type_id"]; 
                                                                        ?>"><?php //echo $row2["policy_type"]; 
                                                                            ?></option> -->
                                                    <?php //endforeach;
                                                    //endif; 
                                                    ?>
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
                                            <label for="agency_code" class="col-form-label col-md-4 text-right">Agency Code<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="agency_code" id="agency_code" class="form-control">
                                                    <option value="null">Select Agency Code</option>
                                                    <?php //$agency = agency_dropdown();
                                                    //if (!empty($agency)) : foreach ($agency as $row4) : 
                                                    ?>
                                                    <!-- <option value="<?php //echo $row4["magency_id"]; 
                                                                        ?>"><?php //echo $row4["code"]; 
                                                                            ?></option> -->
                                                    <?php //endforeach;
                                                    //endif; 
                                                    ?>
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
                                                <select name="policy_holder_name" id="policy_holder_name" class="form-control">
                                                    <option value="null">Select Policy Holder Name</option>
                                                    <?php //$members = members_dropdown();
                                                    //if (!empty($members)) : foreach ($members as $row7) : 
                                                    ?>
                                                    <!-- <option value="<?php //echo $row7["id"]; 
                                                                        ?>"><?php //echo $row7["name"]; 
                                                                            ?></option> -->
                                                    <?php //endforeach;
                                                    //endif; 
                                                    ?>
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
                                                <input type="file" name="policy_upload" id="policy_upload" value="" placeholder="Enter Policy Upload" class="form-control">
                                                <span id="policy_upload_err"></span>
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
                                                <tr style="padding:10px;">
                                                    <td style="border: 1px solid #dddddd;padding:10px;"><textarea rows="2" name="remarks[]" id="remarks_0" value="" placeholder="Enter Remarks" class="form-control remarks"></textarea></td>
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
                                                <tr style="padding:10px;">
                                                    <td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="bank_name[]" id="bank_name_0" value="" placeholder="Enter Bank Name" class="form-control bank_name"></td>
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
                                                <tr style="padding:10px;">
                                                    <td style="border: 1px solid #dddddd;padding:10px;"><select name="member_name[]" id="member_name_0" class="form-control member_name" onchange="MemberNameBaseddetails(0)">
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
    // Policy_typeName();
    var option_policyDescription_data = "";

    function Policy_typeName() {
        var policy_name = $("#policy_name").val();
        var policy_name_txt = $("#policy_name option:selected").text();
        // alert(policy_name_txt);
        // if (policy_name_txt == "Fire Job Worker"){
        // if (policy_name_txt == "Bharat Sooksham Udyam"){
        //    var view = <?php// $this->load->view("master/policy_member_details/fire/fie_policy_view", TRUE); ?>;
        //    alert(view);
        // }

        var url = "<?php echo $base_url; ?>master/policy/load_premium_view";

        if (policy_name_txt != "") {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'html',
                async: false,
                cache: false,
                data: {
                    policy_name_txt: policy_name_txt,
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data == '{"userdata":[],"status":false}') {
                        $("#append_premium_calculator").html("");
                    } else {
                        $("#append_premium_calculator").html(data);
                        $("#cgst_fire_per").val(9);
                        $("#sgst_fire_per").val(9);
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

    PolicyType_Risk();

    function PolicyType_Risk() {
        add_risk = 0;
        counterArray = [];
        mainRiskAddress = [];
        mainRiskAddressDescription = [];
        var policy_option = $("#policy_type").val(); //1: Individual, 2: Floater,3:Residential & Commercial
        if (policy_option == 1) {
            // $("#risk_button_ind").empty();
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
        var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><textarea rows="2" name="remarks[]" id="remarks_' + add_remark + '" value="" placeholder="Enter Remarks" class="form-control remarks"></textarea></td> <td style = "border: 1px solid #dddddd;" > <input type = "date" name = "male_date[]" id = "male_date_' + add_remark + '"   value = "" placeholder = "Enter Mail Date" class = "form-control male_date" > </td> <td style = "border: 1px solid #dddddd;" > <center><button class = "btn btn-primary btn-sm dripicons-cross"  id = "remove_remark_' + add_remark + '" onClick = "removeRemark(' + add_remark + ')" > </button></center></td > < /tr>';
        $("#append_remark").append(tr_table);
    }

    function removeHypotication(add_hypotication) {
        $("#remove_hypotication_" + add_hypotication).closest("tr").remove();
    }

    function AddHypotication(add_hypotication) {
        add_hypotication = add_hypotication + 1;
        $("#AddHypotication").attr("onClick", "AddHypotication(" + add_hypotication + ")");
        var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="bank_name[]" id="bank_name_' + add_hypotication + '" value="" placeholder="Enter Bank Name" class="form-control bank_name"></td> <td style = "border: 1px solid #dddddd;" > <input type = "text" name = "branch_name[]" id = "branch_name_' + add_hypotication + '"   value = "" placeholder = "Enter Branch Name" class = "form-control branch_name" > </td> <td style = "border: 1px solid #dddddd;" ><center> <button class = "btn btn-primary btn-sm dripicons-cross"  id = "remove_hypotication_' + add_hypotication + '" onClick = "removeHypotication(' + add_hypotication + ')" > </button></center></td > < /tr>';
        $("#append_hypotication").append(tr_table);
    }

    function removeCorrespondence(add_correspondence) {
        $("#remove_correspondence_" + add_correspondence).closest("tr").remove();
    }

    function AddCorrespondence(add_correspondence) {

        add_correspondence = add_correspondence + 1;

        $("#AddCorrespondence").attr("onClick", "AddCorrespondence(" + add_correspondence + ")");
        var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><select name="member_name[]" id="member_name_' + add_correspondence + '" class="form-control member_name" onchange="MemberNameBaseddetails(' + add_correspondence + ')"><option value="null">Select Member Names</option>' + option_data + ' </select><input type="hidden" name="member_name_txt[]" class="member_name_txt" id="member_name_txt_' + add_correspondence + '" value="" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_email[]" id="correspondence_email_' + add_correspondence + '" value="" placeholder="Enter Email Id" class="form-control correspondence_email"></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_whatsapp[]" id="correspondence_whatsapp_' + add_correspondence + '" value="" placeholder="Enter Whatsapp" class="form-control correspondence_whatsapp"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_telegram[]" id="correspondence_telegram_' + add_correspondence + '" value="" placeholder="Enter Telegram/Signal" class="form-control correspondence_telegram"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_cc[]" id="correspondence_cc_' + add_correspondence + '" value="" data-role="tagsinput" placeholder="Enter  CC" class="correspondence_cc form-control" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_bcc[]" id="correspondence_bcc_' + add_correspondence + '" value="" data-role="tagsinput" placeholder="Enter  Bcc" class="correspondence_bcc form-control" ></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_correspondence_' + add_correspondence + '" onClick="removeCorrespondence(' + add_correspondence + ')" ></button></center></td> < /tr>';
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

    function Todate_Basedon_Modeofpremium() {
        var mode_of_premimum = $("#mode_of_premimum").val();
        // var date_to = $("#date_to").val();

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
                        $("#date_to").val(data["userdata"]);
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

    function payment_fromdate() {
        var date_from = $("#date_from").val();
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
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function payment_Todate() {
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

        var url = "<?php echo $base_url; ?>master/policy/get_departmentBased_policyname";

        if (department != "") {
            $.ajax({
                url: url,
                data: {
                    department: department
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
    var option_data = "";

    function GroupNameBasedMemberName() {
        var group_name = $("#group_name").val();

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
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var member_id = val[i]["id"];
                            var member_name = val[i]["name"].charAt(0).toUpperCase() + val[i]["name"].slice(1);
                            option_val += '<option value="' + member_id + '">' + member_name + '</option>';
                        }
                    } else {
                        $('#policy_holder_name').html("<option value='null'>Select Policy Holder Name</option>");
                        $('.member_name').html("<option value='null'>Select Member Name</option>");
                    }
                    option_data += option_val;
                    // alert(option_data);
                    $('#policy_holder_name').append(option_val);
                    $('.member_name').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
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

    $("#submit").click(function() {
        // get_total_sum_Assured();
        var TotalRisk_Rc = JSON.stringify(totalRisk_Rc());
        // alert(TotalRisk_Rc);
        // return false;

        var policy_type = $("#policy_type").val();
        if (policy_type == 1) // 1:Individual , 2:Floater
            var totalRisk = JSON.stringify(TotalRisk());
        else if (policy_type == 2)
            var totalRisk = JSON.stringify(TotalRiskFloater());
        else if (policy_type == 3)
        var totalRisk =  JSON.stringify(TotalRisk());

        // alert(totalRisk);
        // return false;
        var totalRemarks = JSON.stringify(TotalRemarks());
        var totalCorrespondence = JSON.stringify(TotalCorrespondence());
        // alert(totalCorrespondence);
        // return false;
        var totalHypotication = TotalHypotication();
        totalHypotication = JSON.stringify(totalHypotication);

        var serial_no_year = $("#serial_no_year").val();
        var serial_no_month = $("#serial_no_month").val();
        var serial_no = $("#serial_no").val();
        var company = $("#company").val();
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
        var date_commenced = $("#date_commenced").val();
        // var policy_upload = $("#policy_upload").val();
        var policy_upload = $('#policy_upload').prop('files')[0];
        var reg_mobile = $("#reg_mobile").val();
        var reg_email = $("#reg_email").val();
        var policy_counter_no = $('#policy_counter_no').val();
        // alert(policy_upload);
        if (policy_no != "") {
            // alert("The Policy Upload field is required.");
            if (policy_upload == undefined) {
                toaster(message_type = "Error", message_txt = "The Policy Upload field is required.", message_icone = "error");
                $("#policy_upload_err").removeClass("text-danger");
                $("#policy_upload_err").addClass("text-danger").html("The Policy Upload field is required.");
                return false;
            }
        } else
            $("#policy_upload_err").removeClass("text-danger").text("");

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
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);
        form_data.append('company', company);
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
        form_data.append('total_remarks', totalRemarks);
        form_data.append('total_hypotication', totalHypotication);
        form_data.append('total_correspondence', totalCorrespondence);
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


        // alert(form_data);
        // return false;
        // Calculation Section End

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
</script>