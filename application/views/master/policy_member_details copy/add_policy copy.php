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
                                                            <select name="company" id="company" class="form-control" onchange="company_department();company_agency();">
                                                                <option value="null">Select Company</option>
                                                                <?php $company = company_dropdown();
                                                                if (!empty($company)) : foreach ($company as $row) : ?>
                                                                        <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo $row["company_name"]; ?></option>
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
                                                            <select name="department" id="department" class="form-control" onchange="DepartmentBasedPolicyName()">
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
                                                            <select name="policy_name" id="policy_name" class="form-control">
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
                                                            <select name="policy_type" id="policy_type" class="form-control">
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
                                                                <option value="null">Select Sub-Agency Code</option>
                                                                <?php $subagency = subagency_dropdown();
                                                                if (!empty($subagency)) : foreach ($subagency as $row5) : ?>
                                                                        <option value="<?php echo $row5["sub_agent_id"]; ?>"><?php echo $row5["sub_agent_code"]; ?></option>
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
                                                            <select name="mode_of_premimum" id="mode_of_premimum" class="form-control">
                                                                <option value="1">Monthly</option>
                                                                <option value="2">Quaterly</option>
                                                                <option value="3">Half-Yearly</option>
                                                                <option value="4">Yearly</option>
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
                                                                        <option value="<?php echo $row6["id"]; ?>"><?php echo $row6["grpname"]; ?></option>
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
                                                                <!-- <option value="<?php echo $row7["id"]; ?>"><?php echo $row7["name"]; ?></option> -->
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
                                                            <input type="text" name="reg_mobile" id="reg_mobile" value="" placeholder="Enter Registered Mobile No." class="form-control">
                                                            <span id="reg_mobile_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="reg_email" class="col-form-label col-md-4  text-right">Reg. Email Id<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="reg_email" id="reg_email" value="" placeholder="Enter Registered Email Id" class="form-control">
                                                            <input type="hidden" class="form-control" name="policy_counter_no" id="policy_counter_no">
                                                            <span id="reg_email_err"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="policy_no" class="col-form-label col-md-4 text-right">Policy No.<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="policy_no" id="policy_no" value="" placeholder="Enter Policy No." class="form-control" disabled>
                                                            <span id="policy_no_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="policy_upload" class="col-form-label col-md-4  text-right">Policy Upload<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="policy_upload" id="policy_upload" value="" placeholder="Enter Policy Upload" class="form-control" disabled>
                                                            <span id="policy_upload_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                            <tr style="padding:10px;">
                                                                <td style="border: 1px solid #dddddd;padding:10px;"><textarea rows="2" name="remarks[]" id="remarks_0" value="" placeholder="Enter Remarks" class="form-control remarks"></textarea></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="date" name="male_date[]" id="male_date_0" value="" placeholder="Enter Mail Date" class="form-control male_date"></td>
                                                                <td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_remark_0" onClick="removeRemark(0)" disabled></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <hr>

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
                                                                <td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_hypotication_0" onClick="removeHypotication(0)" disabled></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <hr>

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
                                                                <td style="border: 1px solid #dddddd;padding:10px;"><select name="member_name[]" id="member_name_0" class="form-control member_name">
                                                                        <option value="null">Select Member Names</option>
                                                                    </select></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_email[]" id="correspondence_email_0" value="" placeholder="Enter Email Id" class="form-control correspondence_email"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_whatsapp[]" id="correspondence_whatsapp_0" value="" placeholder="Enter Whatsapp" class="form-control correspondence_whatsapp"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_telegram[]" id="correspondence_telegram_0" value="" placeholder="Enter Email Id" class="form-control correspondence_telegram"></td>

                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_cc[]" id="correspondence_cc_0" value="" data-role="tagsinput" placeholder="Enter  CC" class="correspondence_cc  form-control"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_bcc[]" id="correspondence_bcc_0" value="" data-role="tagsinput" placeholder="Enter  Bcc" class="correspondence_bcc form-control"></td>
                                                                <td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_correspondence_0" onClick="removeCorrespondence(0)" disabled></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <hr>

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
                var add_remark = 0;
                var add_hypotication = 0;
                var add_correspondence = 0;

                function removeRemark(add_remark) {
                    $("#remove_remark_" + add_remark).closest("tr").remove();
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

                function AddCorrespondence(add_correspondence) {

                    add_correspondence = add_correspondence + 1;

                    $("#AddCorrespondence").attr("onClick", "AddCorrespondence(" + add_correspondence + ")");
                    var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><select name="member_name[]" id="member_name_' + add_correspondence + '" class="form-control member_name"><option value="null">Select Member Names</option> </select></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_email[]" id="correspondence_email_' + add_correspondence + '" value="" placeholder="Enter Email Id" class="form-control correspondence_email"></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_whatsapp[]" id="correspondence_whatsapp_' + add_correspondence + '" value="" placeholder="Enter Whatsapp" class="form-control correspondence_whatsapp"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_telegram[]" id="correspondence_telegram_' + add_correspondence + '" value="" placeholder="Enter Email Id" class="form-control correspondence_telegram"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_cc[]" id="correspondence_cc_' + add_correspondence + '" value="" data-role="tagsinput" placeholder="Enter  CC" class="correspondence_cc form-control" ></td><td style="border: 1px solid #dddddd;"><input type="text" name="correspondence_bcc[]" id="correspondence_bcc_' + add_correspondence + '" value="" data-role="tagsinput" placeholder="Enter  Bcc" class="correspondence_bcc form-control" ></td><td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_correspondence_' + add_correspondence + '" onClick="removeCorrespondence(' + add_correspondence + ')" ></button></td> < /tr>';
                    $("#append_correspondence").append(tr_table);
                    $('.correspondence_cc').tagsinput('refresh');
                    $('.correspondence_bcc').tagsinput('refresh');
                }


                var actual_data_remarks = [];
                var actual_data_hypotication = [];
                var actual_data_correspondence = [];

                function TotalRemarks() {
                    $("tr:has(.remarks)").each(function(index, value) {
                        var remarks = $(".remarks", this).val();
                        var male_date = $(".male_date", this).val();
                        actual_data_remarks.push([remarks, male_date]);
                    });
                    return actual_data_remarks;
                }

                function TotalHypotication() {
                    $("tr:has(.bank_name)").each(function(index, value) {
                        var bank_name = $(".bank_name", this).val();
                        var branch_name = $(".branch_name", this).val();
                        actual_data_hypotication.push([bank_name, branch_name]);
                    });
                    return actual_data_hypotication;
                }

                function TotalCorrespondence() {
                    $("tr:has(.member_name)").each(function(index, value) {
                        var member_name = $(".member_name", this).val();
                        var correspondence_email = $(".correspondence_email", this).val();
                        var correspondence_whatsapp = $(".correspondence_whatsapp", this).val();
                        var correspondence_telegram = $(".correspondence_telegram", this).val();
                        var correspondence_cc = $(".correspondence_cc", this).val();
                        var correspondence_bcc = $(".correspondence_bcc", this).val();
                        actual_data_hypotication.push([member_name, correspondence_email, correspondence_whatsapp, correspondence_telegram, correspondence_cc, correspondence_bcc]);
                    });
                    return actual_data_hypotication;
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

                function payment_fromdate() {
                    var date_from = $("#date_from").val();

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
                                ~alert('Sorry, there was a problem!');
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
                                ~alert('Sorry, there was a problem!');
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
                                        var department_name = val[i]["department_name"];
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
                                        var policy_type = val[i]["policy_type"];
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
                                    var contact = "";
                                    var email = "";
                                    $('#policy_holder_name').html("<option value='null'>Select Policy Holder Name</option>");
                                    $('.member_name').html("<option value='null'>Select Member Name</option>");
                                    $('.correspondence_whatsapp').val();
                                    $('.correspondence_email').val();
                                    var option_val = "";
                                    for (var i = 0; i < val.length; i++) {
                                        var member_id = val[i]["id"];
                                        var member_name = val[i]["name"];
                                        var contact = val[i]["contact"];
                                        var email = val[i]["email"];
                                        option_val += '<option value="' + member_id + '">' + member_name + '</option>';
                                    }
                                } else {
                                    $('#policy_holder_name').html("<option value='null'>Select Policy Holder Name</option>");
                                    $('.member_name').html("<option value='null'>Select Member Name</option>");
                                    $('.correspondence_whatsapp').val();
                                    $('.correspondence_email').val();

                                }
                                $('#policy_holder_name').append(option_val);
                                $('.policy_holder_name').append(option_val);
                                $('.correspondence_whatsapp').val(contact);
                                $('.correspondence_email').val(email);
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
                    var totalRemarks = JSON.stringify(TotalRemarks());
                    var totalHypotication = TotalHypotication();
                    totalHypotication = JSON.stringify(totalHypotication);

                    var serial_no_year = $("#serial_no_year").val();
                    var serial_no_month = $("#serial_no_month").val();
                    var serial_no = $("#serial_no").val();
                    var company = $("#company").val();
                    var department = $("#department").val();
                    var policy_name = $("#policy_name").val();
                    var policy_type = $("#policy_type").val();
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
                    // alert(policy_type);

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
                                    if (data["message"]["serial_no_year_err"] != "")
                                        $("#serial_no_year").addClass("parsley-error");
                                    else
                                        $("#serial_no_year").removeClass("parsley-error");
                                    $("#serial_no_year_err").addClass("text-danger").html(data["message"]["serial_no_year_err"]);
                                    if (data["message"]["serial_no_month_err"] != "")
                                        $("#serial_no_month").addClass("parsley-error");
                                    else
                                        $("#serial_no_month").removeClass("parsley-error");
                                    $("#serial_no_month_err").addClass("text-danger").html(data["message"]["serial_no_month_err"]);

                                    if (data["message"]["serial_no_err"] != "")
                                        $("#serial_no").addClass("parsley-error");
                                    else
                                        $("#serial_no").removeClass("parsley-error");
                                    $("#serial_no_err").addClass("text-danger").html(data["message"]["serial_no_err"]);
                                    if (data["message"]["company_err"] != "")
                                        $("#company").addClass("parsley-error");
                                    else
                                        $("#company").removeClass("parsley-error");
                                    $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);
                                    if (data["message"]["department_err"] != "")
                                        $("#department").addClass("parsley-error");
                                    else
                                        $("#department").removeClass("parsley-error");
                                    $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);
                                    if (data["message"]["policy_name_err"] != "")
                                        $("#policy_name").addClass("parsley-error");
                                    else
                                        $("#policy_name").removeClass("parsley-error");
                                    $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);
                                    if (data["message"]["policy_type_err"] != "")
                                        $("#policy_type").addClass("parsley-error");
                                    else
                                        $("#policy_type").removeClass("parsley-error");
                                    $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);
                                    if (data["message"]["agency_code_err"] != "")
                                        $("#agency_code").addClass("parsley-error");
                                    else
                                        $("#agency_code").removeClass("parsley-error");
                                    $("#agency_code_err").addClass("text-danger").html(data["message"]["agency_code_err"]);
                                    if (data["message"]["sub_agency_code_err"] != "")
                                        $("#sub_agency_code").addClass("parsley-error");
                                    else
                                        $("#sub_agency_code").removeClass("parsley-error");
                                    $("#sub_agency_code_err").addClass("text-danger").html(data["message"]["sub_agency_code_err"]);
                                    if (data["message"]["mode_of_premimum_err"] != "")
                                        $("#mode_of_premimum").addClass("parsley-error");
                                    else
                                        $("#mode_of_premimum").removeClass("parsley-error");
                                    $("#mode_of_premimum_err").addClass("text-danger").html(data["message"]["mode_of_premimum_err"]);
                                    if (data["message"]["date_from_err"] != "")
                                        $("#date_from").addClass("parsley-error");
                                    else
                                        $("#date_from").removeClass("parsley-error");
                                    $("#date_from_err").addClass("text-danger").html(data["message"]["date_from_err"]);
                                    if (data["message"]["date_to_err"] != "")
                                        $("#date_to").addClass("parsley-error");
                                    else
                                        $("#date_to").removeClass("parsley-error");
                                    $("#date_to_err").addClass("text-danger").html(data["message"]["date_to_err"]);
                                    if (data["message"]["payment_date_from_err"] != "")
                                        $("#payment_date_from").addClass("parsley-error");
                                    else
                                        $("#payment_date_from").removeClass("parsley-error");
                                    $("#payment_date_from_err").addClass("text-danger").html(data["message"]["payment_date_from_err"]);
                                    if (data["message"]["payment_date_to_err"] != "")
                                        $("#payment_date_to").addClass("parsley-error");
                                    else
                                        $("#payment_date_to").removeClass("parsley-error");
                                    $("#payment_date_to_err").addClass("text-danger").html(data["message"]["payment_date_to_err"]);
                                    if (data["message"]["policy_no_err"] != "")
                                        $("#policy_no").addClass("parsley-error");
                                    else
                                        $("#policy_no").removeClass("parsley-error");
                                    $("#policy_no_err").addClass("text-danger").html(data["message"]["policy_no_err"]);
                                    if (data["message"]["group_name_err"] != "")
                                        $("#group_name").addClass("parsley-error");
                                    else
                                        $("#group_name").removeClass("parsley-error");
                                    $("#group_name_err").addClass("text-danger").html(data["message"]["group_name_err"]);
                                    if (data["message"]["policy_holder_name_err"] != "")
                                        $("#policy_holder_name").addClass("parsley-error");
                                    else
                                        $("#policy_holder_name").removeClass("parsley-error");
                                    $("#policy_holder_name_err").addClass("text-danger").html(data["message"]["policy_holder_name_err"]);
                                    if (data["message"]["date_commenced_err"] != "")
                                        $("#date_commenced").addClass("parsley-error");
                                    else
                                        $("#date_commenced").removeClass("parsley-error");
                                    $("#date_commenced_err").addClass("text-danger").html(data["message"]["date_commenced_err"]);
                                    if (data["message"]["policy_upload_err"] != "")
                                        $("#policy_upload").addClass("parsley-error");
                                    else
                                        $("#policy_upload").removeClass("parsley-error");
                                    $("#policy_upload_err").addClass("text-danger").html(data["message"]["policy_upload_err"]);
                                    if (data["message"]["reg_mobile_err"] != "")
                                        $("#reg_mobile").addClass("parsley-error");
                                    else
                                        $("#reg_mobile").removeClass("parsley-error");
                                    $("#reg_mobile_err").addClass("text-danger").html(data["message"]["reg_mobile_err"]);
                                    if (data["message"]["reg_email_err"] != "")
                                        $("#reg_email").addClass("parsley-error");
                                    else
                                        $("#reg_email").removeClass("parsley-error");
                                    $("#reg_email_err").addClass("text-danger").html(data["message"]["reg_email_err"]);
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
                            CheckFormAccess(submenu_permission, 5, url);
                            check(role_permission, 5);
                        }
                    }
                });
            </script>