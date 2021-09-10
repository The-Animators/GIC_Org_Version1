            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
            if (!empty($company_details)) {
                // print_r($company_details);
                // die("Test");
                $company_id = $company_details["mcompany_id"];
                $company_name = $company_details["company_name"];
                $short_name = $company_details["short_name"];
                $common_email = $company_details["common_email"];
                $address = $company_details["address"];
                $state = $company_details["state"];
                $city = $company_details["city"];
                $pincode = $company_details["zipcode"];
                $office_contact = $company_details["office_contact"];
                $website = $company_details["website"];
                $tollfree_no_1 = $company_details["tollfree_no_1"];
                $tollfree_no_2 = $company_details["tollfree_no_2"];

                $cheque_name = $company_details["cheque_name"];
                $courier_address = $company_details["courier_address"];
                $payment_link = $company_details["payment_link"];
                $payment_steps = $company_details["payment_steps"];

                $account_holder_name = $company_details["account_holder_name"];
                $account_number = $company_details["account_number"];
                $bank_name = $company_details["bank_name"];
                $branch_name = $company_details["branch_name"];
                $ifsc_code = $company_details["ifsc_code"];
                $micr_code = $company_details["micr_code"];
                $account_holder_name_1 = $company_details["account_holder_name_1"];
                $account_number_1 = $company_details["account_number_1"];
                $bank_name_1 = $company_details["bank_name_1"];
                $branch_name_1 = $company_details["branch_name_1"];
                $ifsc_code_1 = $company_details["ifsc_code_1"];
                $micr_code_1 = $company_details["micr_code_1"];
            } else {

                $company_id = "";
                $company_name = "";
                $short_name = "";
                $common_email = "";
                $address = "";
                $state = "";
                $city = "";
                $pincode = "";
                $office_contact = "";
                $website = "";
                $tollfree_no_1 = "";
                $tollfree_no_2 = "";

                $cheque_name = "";
                $courier_address = "";
                $payment_link = "";
                $payment_steps = "";

                $account_holder_name = "";
                $account_number = "";
                $bank_name = "";
                $branch_name = "";
                $ifsc_code = "";
                $micr_code = "";
                $account_holder_name_1 = "";
                $account_number_1 = "";
                $bank_name_1 = "";
                $branch_name_1 = "";
                $ifsc_code_1 = "";
                $micr_code_1 = "";
            }
            ?>
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
                                            <h4 class="header-title"><?php echo "Edit " . $title; ?></h4>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4 text-right">
                                            <input type="hidden" name="company_id" id="company_id" value="<?php echo $company_id; ?>">
                                            <a href="<?php echo base_url() . "master/insurance_company_details/view_company/$company_id"; ?>" class='btn btn-secondary waves-effect btn-xs'>Back</a>
                                        </div>

                                    </div>

                                    <p class="sub-header">

                                    </p>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <u> <strong>Company General Details</strong></u>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="company_name" class="col-form-label col-md-4 text-right">Company Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="company_name" id="company_name" value="<?php echo $company_name; ?>" placeholder="Enter Company Name" class="form-control">
                                                            <span id="company_name_err"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="short_name" class="col-form-label col-md-4 text-right">Short Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="short_name" id="short_name" value="<?php echo $short_name; ?>" placeholder="Enter Short Name" class="form-control">
                                                            <span id="short_name_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="comman_email" class="col-form-label col-md-4  text-right">Common Email<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="comman_email" id="comman_email" value="<?php echo $common_email; ?>" placeholder="Enter Common Email" class="form-control">
                                                            <span id="comman_email_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="address" class="col-form-label col-md-4  text-right">Address<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="address" id="address" value="<?php echo $address; ?>" placeholder="Enter Address" class="form-control">
                                                            <span id="address_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="state" class="col-form-label col-md-4  text-right">State<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="state" id="state" value="<?php echo $state; ?>" placeholder="Enter State" class="form-control">
                                                            <span id="state_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="city" class="col-form-label col-md-4  text-right">City<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="city" id="city" value="<?php echo $city; ?>" placeholder="Enter City" class="form-control">
                                                            <span id="city_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="pincode" class="col-form-label col-md-4  text-right">Pincode<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="pincode" id="pincode" value="<?php echo $pincode; ?>" placeholder="Enter Pincode" class="form-control">
                                                            <span id="pincode_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="office_contact" class="col-form-label col-md-4  text-right">Office Contact<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="office_contact" id="office_contact" value="<?php echo $office_contact; ?>" placeholder="Enter Office Contact" class="form-control">
                                                            <span id="office_contact_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="website" class="col-form-label col-md-4  text-right">Website<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="website" id="website" value="<?php echo $website; ?>" placeholder="Enter Website" class="form-control">
                                                            <span id="website_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="tollfree_1" class="col-form-label col-md-4  text-right">Toll Free No.1</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="tollfree_1" id="tollfree_1" value="<?php echo $tollfree_no_1; ?>" placeholder="Enter Toll Free No.1" class="form-control">
                                                            <span id="tollfree_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="tollfree_2" class="col-form-label col-md-4  text-right">Toll Free No.2</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="tollfree_2" id="tollfree_2" value="<?php echo $tollfree_no_2; ?>" placeholder="Enter Toll Free No.2" class="form-control">
                                                            <span id="tollfree_2_err"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <u><strong>Company Agent Details</strong></u>
                                                </div>
                                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-xs AddAgent" id="AddAgent" onClick="AddAgent(0)">Add Agent</button></div>
                                            </div>

                                            <hr class="mt-2">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                        <thead>
                                                            <tr style="padding:10px;">
                                                                <th style="border: 1px solid #dddddd;padding:10px;">
                                                                    <center>Name</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Agency Code</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Portal Link</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>User Id</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Password</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Status</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Action</center>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="append_agent">
                                                            <tr style="padding:10px;">
                                                                <td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="agent_name[]" id="agent_name_0" value="" placeholder="Enter Agent Name" class="form-control agent_name"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="agency_code[]" id="agency_code_0" value="" placeholder="Enter Agency Code" class="form-control agency_code"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="portal_link[]" id="portal_link_0" value="" placeholder="Enter Portal Link" class="form-control portal_link"></td>
                                                                <td style="border: 1px solid #dddddd;"> <input type="text" name="user_id[]" id="user_id_0" value="" placeholder="Enter User Id" class="form-control user_id"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="password[]" id="password_0" value="" placeholder="Enter Password" class="form-control password"></td>
                                                                <td style="border: 1px solid #dddddd;">
                                                                    <select class="form-control status" name="status[]" id="status_0">
                                                                        <option value="0">In-Active</option>
                                                                        <option value="1">Active</option>
                                                                    </select>
                                                                </td>
                                                                <td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-xs dripicons-cross" id="remove_agent_0" onClick="removeAgent(0)" disabled></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <hr>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <u><strong>Company Employee Details</strong></u>
                                                </div>
                                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-xs AddEmp" id="AddEmp" onClick="AddEmp(0)">Add Employee</button></div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                        <thead>
                                                            <tr style="padding:10px;">
                                                                <th style="border: 1px solid #dddddd;padding:10px;">
                                                                    <center>Name</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Designation</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Mobile 1</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Mobile 2</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Email</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Agency</center>
                                                                </th>
                                                                <th style="border: 1px solid #dddddd;">
                                                                    <center>Action</center>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="append_emp">
                                                            <tr style="padding:10px;">
                                                                <td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="emp_name[]" id="emp_name_0" value="" placeholder="Enter Employee Name" class="form-control emp_name"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="designation[]" id="designation_0" value="" placeholder="Enter Designation" class="form-control designation"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="mobile_1[]" id="mobile_1_0" value="" placeholder="Enter Mobile 1" class="form-control mobile_1"></td>
                                                                <td style="border: 1px solid #dddddd;"> <input type="text" name="mobile_2[]" id="mobile_2_0" value="" placeholder="Enter Mobile 2" class="form-control mobile_2"></td>
                                                                <td style="border: 1px solid #dddddd;"><input type="text" name="email[]" id="email_0" value="" placeholder="Enter Email" class="form-control email"></td>
                                                                <td style="border: 1px solid #dddddd;"><select name="agency" id="agency_0" class="selectpicker agency" multiple data-selected-text-format="count" data-style="btn-secondary">
                                                                        <?php if (!empty($agency_details)) : foreach ($agency_details as $row) : ?>
                                                                                <option value="<?php echo $row["magency_id"]; ?>"><?php echo $row["name"] . " - ( " . $row["code"] . " )"; ?></option>
                                                                        <?php endforeach;
                                                                        endif; ?>
                                                                    </select>
                                                                </td>
                                                                <td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-xs dripicons-cross" id="remove_emp_0" onClick="removeEmp(0)" disabled></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <hr>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <u><strong>Payment Details</strong></u>
                                                </div>
                                                <div class="col-md-6 text-right"></div>
                                            </div>
                                            <div class="form-row mt-2">
                                                <div class="col-md-2"><u><strong class="text-info">Online</strong></u></div>
                                            </div>
                                            <div class="form-row mt-2">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="online_link" class="col-form-label col-md-4 text-right">Link<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="online_link" id="online_link" value="<?php echo $payment_link; ?>" placeholder="Enter Online Link" class="form-control ">
                                                            <span id="online_link_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label for="online_steps" class="col-form-label col-md-2 text-right">Payment Steps<span class="text-danger">*</span></label>
                                                        <div class="col-md-10">
                                                            <textarea rows="5" name="online_steps" id="online_steps" placeholder="Enter Online Steps" class="form-control "><?php echo $payment_steps; ?></textarea>
                                                            <span id="online_steps_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row mt-2">
                                                <div class="col-md-2"><u><strong class="text-info">Cheque</strong></u></div>
                                            </div>
                                            <div class="form-row mt-2">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="name_on_cheque" class="col-form-label col-md-4 text-right">Name on Cheque<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="name_on_cheque" id="name_on_cheque" value="<?php echo $cheque_name; ?>" placeholder="Enter Name on Cheque" class="form-control ">
                                                            <span id="name_on_cheque_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label for="courier_address" class="col-form-label col-md-2 text-right">Courier Address<span class="text-danger">*</span></label>
                                                        <div class="col-md-10">
                                                            <textarea rows="5" name="courier_address" id="courier_address" placeholder="Enter Courier Address" class="form-control "><?php echo $courier_address; ?></textarea>
                                                            <span id="courier_address_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row mt-2">
                                                <div class="col-md-2"><u><strong class="text-info">NEFT / IMPS / RTGS</strong></u></div>
                                            </div>
                                            <hr>
                                            <div class="form-row mt-2">

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="account_holder" class="col-form-label col-md-3 text-primary"><strong><u>Bank 1 Details</strong></u></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-2">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="account_holder" class="col-form-label col-md-4 text-right">Account Holder<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="account_holder" id="account_holder" value="<?php echo $account_holder_name; ?>" placeholder="Enter Account Holder" class="form-control">
                                                            <span id="account_holder_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="account_no" class="col-form-label col-md-4 text-right">Account Number<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="account_no" id="account_no" value="<?php echo $account_number; ?>" placeholder="Enter Account Number" class="form-control">
                                                            <span id="account_no_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="bank_name" class="col-form-label col-md-4 text-right">Bank Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="bank_name" id="bank_name" value="<?php echo $bank_name; ?>" placeholder="Enter Bank Name" class="form-control">
                                                            <span id="bank_name_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="branch_namw" class="col-form-label col-md-4 text-right">Branch Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="branch_namw" id="branch_namw" value="<?php echo $branch_name; ?>" placeholder="Enter Branch Name" class="form-control">
                                                            <span id="branch_namw_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="ifs_code" class="col-form-label col-md-4 text-right">IFSC Code<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="ifs_code" id="ifs_code" value="<?php echo $ifsc_code; ?>" placeholder="Enter IFSC Code" class="form-control">
                                                            <span id="ifs_code_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="micr_code" class="col-form-label col-md-4 text-right">MICR Code<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="micr_code" id="micr_code" value="<?php echo $micr_code; ?>" placeholder="Enter MICR Code" class="form-control">
                                                            <span id="micr_code_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="form-row mt-2">

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="account_holder" class="col-form-label col-md-3 text-primary"><strong><u>Bank 2 Details</strong></u></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row mt-2">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="account_holder_1" class="col-form-label col-md-4 text-right">Account Holder 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="account_holder_1" id="account_holder_1" value="<?php echo $account_holder_name_1; ?>" placeholder="Enter Account Holder 2" class="form-control">
                                                            <span id="account_holder_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="account_no_1" class="col-form-label col-md-4 text-right">Account Number 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="account_no_1" id="account_no_1" value="<?php echo $account_number_1; ?>" placeholder="Enter Account Number 2" class="form-control">
                                                            <span id="account_no_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="bank_name_1" class="col-form-label col-md-4 text-right">Bank Name 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="bank_name_1" id="bank_name_1" value="<?php echo $bank_name_1; ?>" placeholder="Enter Bank Name 2" class="form-control">
                                                            <span id="bank_name_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="branch_namw_1" class="col-form-label col-md-4 text-right">Branch Name 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="branch_namw_1" id="branch_namw_1" value="<?php echo $branch_name_1; ?>" placeholder="Enter Branch Name 2" class="form-control">
                                                            <span id="branch_namw_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="ifs_code_1" class="col-form-label col-md-4 text-right">IFSC Code 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="ifs_code_1" id="ifs_code_1" value="<?php echo $ifsc_code_1; ?>" placeholder="Enter IFSC Code 2" class="form-control">
                                                            <span id="ifs_code_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="micr_code_1" class="col-form-label col-md-4 text-right">MICR Code 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="micr_code_1" id="micr_code_1" value="<?php echo $micr_code_1; ?>" placeholder="Enter MICR Code 2" class="form-control">
                                                            <span id="micr_code_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row mt-2">
                                                <div class="form-group col-md-4">
                                                    <label id="staff_id" hidden></label>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <center>
                                                        <button id="update" onclick='onUpdate()' class="btn btn-primary btn-xs">Update</button>
                                                        <!-- <button id="update" class="btn btn-primary btn-xs">Update <?php echo $title; ?></button> -->

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
                var add_emp = 0;
                var add_agent = 0;
                var deleteAgentID_data = [];
                var deleteEMpID_data = [];
                var main_EMpID_data = [];
                getAgentDetails(<?php echo $company_id; ?>);

                function getAgentDetails(company_id) {
                    // return false;
                    // alert(company_id);
                    $("#tableData").empty();
                    var url = "<?php echo $base_url; ?>master/insurance_company_details/get_agent_details";
                    if (url != "") {
                        $.ajax({
                            url: url,
                            data: {
                                'company_id': company_id
                            },
                            type: 'POST',
                            dataType: 'json',
                            async: false,
                            cache: false,
                            beforeSend: function() {

                            },

                            success: function(data) {
                                $("#append_agent").empty();
                                var emp_tr = '';
                                if (data["status"] == true) {
                                    var agent = data["userdata"];
                                    var add_agent = "";
                                    var length = agent.length;
                                    $.each(agent, function(key, val) {
                                        add_agent = key;
                                        var magency_id = agent[key].magency_id;
                                        var agent_name = agent[key].agent_name;
                                        var code = agent[key].code;
                                        var link = agent[key].link;
                                        var username = agent[key].username;
                                        var password = agent[key].password;
                                        var magency_status = agent[key].magency_status;
                                        var agent_del_flag = agent[key].agent_del_flag;
                                        var fk_mcompany_id = agent[key].fk_mcompany_id;

                                        if (agent_name == "" || agent_name == null || agent_name == "null" || agent_name == undefined || agent_name == "undefined")
                                            agent_name = '';
                                        else
                                            agent_name = agent_name;

                                        if (code == "" || code == null || code == "null" || code == undefined || code == "undefined")
                                            code = '';
                                        else
                                            code = code;

                                        if (username == "" || username == null || username == "null" || username == undefined || username == "undefined")
                                            username = '';
                                        else
                                            username = username;

                                        if (password == "" || password == null || password == "null" || password == undefined || password == "undefined")
                                            password = '';
                                        else
                                            password = password;

                                        if (link == "" || link == null || link == "null" || link == undefined || link == "undefined")
                                            link = '';
                                        else
                                            link = link;

                                        if (magency_status == 1) {
                                            var status_txt = 'Active';
                                            var selected = "selected";
                                        } else if (magency_status == 0) {
                                            var status_txt = 'In-Active';
                                            var selected = "selected";
                                        } else {
                                            var status_txt = '';
                                            var selected = "";
                                        }
                                        // var status_val=$(".status").val(magency_status);
                                        // alert(magency_status);
                                        emp_tr += ' <tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><center><input type="text" name="agent_name[]" id="agent_name_' + add_agent + '" value="' + agent_name + '" placeholder="Enter Agent Name" class="form-control agent_name"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="agency_code[]" id="agency_code_' + add_agent + '" value="' + code + '" placeholder="Enter Agency Code" class="form-control agency_code"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="portal_link[]" id="portal_link_' + add_agent + '" value="' + link + '" placeholder="Enter Portal Link" class="form-control portal_link"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="user_id[]" id="user_id_' + add_agent + '" value="' + username + '" placeholder="Enter User Id" class="form-control user_id"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="password[]" id="password_' + add_agent + '" value="' + password + '" placeholder="Enter password" class="form-control password"></center></td><td style="border: 1px solid #dddddd;"><center><select class="form-control status" name="status[]" id="status_' + add_agent + '"><option value="0" ' + selected + '>In-Active</option><option value="1" ' + selected + '>Active</option></select></center></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-xs dripicons-cross" id="remove_agent_' + add_agent + '" onClick="removeAgent(' + add_agent + ')" data-value="' + magency_id + '" data-id="' + magency_id + '"></button></center></td><input type="hidden" name="agency_id[]" id="agency_id_' + add_agent + '" value="' + magency_id + '"  class="agency_id">  </tr>';
                                    });
                                    $("#append_agent").append(emp_tr);
                                    $("#AddAgent").attr("onClick", "AddAgent(" + (length - 1) + ")");
                                    // $('select[id^="item_name_' + row_id + '"] option[value="' + magency_status + '"]').attr("selected", "selected");
                                    // $('select[id^="status_' + add_agent + '"] option[value="' + magency_status + '"]').attr("selected", "selected");

                                }

                            },
                            error: function(request, status, error) {
                                alert(request.responseText);
                            }
                        });
                    }
                }
                getEmployeeDetails(<?php echo $company_id; ?>);

                function getEmployeeDetails(company_id) {
                    // return false;
                    // alert(company_id);
                    $("#tableData").empty();
                    var url = "<?php echo $base_url; ?>master/insurance_company_details/get_employee_details";
                    if (url != "") {
                        $.ajax({
                            url: url,
                            data: {
                                'company_id': company_id
                            },
                            type: 'POST',
                            dataType: 'json',
                            async: false,
                            cache: false,
                            beforeSend: function() {

                            },

                            success: function(data) {
                                $("#append_emp").empty();
                                var emp_tr = '';

                                if (data["status"] == true) {
                                    var add_emp = "";
                                    var employee = data["userdata"];
                                    var length = employee.length;
                                    var fk_agency_id = "";
                                    $.each(employee, function(key, val) {
                                        add_emp = key;
                                        main_EMpID_data.push(add_emp);
                                        var mmember_id = employee[key].mmember_id;
                                        var member_name = employee[key].member_name;
                                        var designation = employee[key].designation;
                                        var contact1 = employee[key].contact1;
                                        var contact2 = employee[key].contact2;
                                        var email1 = employee[key].email1;
                                        var member_del_flag = employee[key].member_del_flag;
                                        var mmember_status = employee[key].mmember_status;
                                        var fk_mcompany_id = employee[key].fk_mcompany_id;
                                        fk_agency_id = employee[key].fk_agency_id;

                                        emp_tr += ' <tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><center><input type="text" name="emp_name[]" id="emp_name_' + add_emp + '" value="' + member_name + '" placeholder="Enter Employee Name" class="form-control emp_name"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="designation[]" id="designation_' + add_emp + '" value="' + designation + '" placeholder="Enter Designation" class="form-control designation"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="mobile_1[]" id="mobile_1_' + add_emp + '" value="' + contact1 + '" placeholder="Enter Mobile 1" class="form-control mobile_1"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="mobile_2[]" id="mobile_2_' + add_emp + '" value="' + contact2 + '" placeholder="Enter Mobile 2" class="form-control mobile_2"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="email[]" id="email_' + add_emp + '" value="' + email1 + '" placeholder="Enter Email" class="form-control email"></center></td><td><select name="agency[]" id="agency_' + add_emp + '" class="selectpicker agency" multiple data-selected-text-format="count" data-style="btn-secondary"> <?php if (!empty($agency_details)) : foreach ($agency_details as $row) : ?>   <option value="<?php echo $row["magency_id"]; ?>"><?php echo $row["name"] . " - ( " . $row["code"] . " )"; ?></option> <?php endforeach;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                endif; ?> </select></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-xs dripicons-cross" id="remove_emp_' + add_emp + '" onClick="removeEmp(' + add_emp + ')" data-value="' + mmember_id + '" data-id="' + mmember_id + '"></button></center></td> <input type="hidden" name="member_id[]" id="member_id_' + add_emp + '" value="' + mmember_id + '" class="member_id"> </tr>';
                                    });
                                    $("#AddEmp").attr("onClick", "AddEmp(" + (length - 1) + ")");
                                    $("#append_emp").append(emp_tr);
                                    // $('.selectpicker').selectpicker('refresh');
                                    $.each(employee, function(key, val) {
                                        var fk_agency_id = employee[key].fk_agency_id;
                                        if (fk_agency_id != "")
                                            var selectedOptions = fk_agency_id.split(",");
                                        else
                                            var selectedOptions = "";
                                        // alert(selectedOptions);
                                        // var checkboxes = document.getElementsByClassName("agency");
                                        $('#agency_' + key).val(selectedOptions);
                                        // $('#agency_'+key).selectpicker("val", selectedOptions);
                                    });

                                    console.log(main_EMpID_data);
                                }

                            },
                            error: function(request, status, error) {
                                alert(request.responseText);
                            }
                        });
                    }
                }
                $('document').ready(function() {
                    // $('#company_name').keyup(function() {
                    //     var company_short_name = $("#company_name").val().split(" ")[0];
                    //     // alert(company_short_name);
                    //     $("#short_name").val(company_short_name);
                    //     document.getElementById("short_name").disabled = true;
                    // });
                });

                function TotalEmployee() {
                    actual_data_emp = [];
                    $.each(main_EMpID_data, function(key, val) {
                        var emp_name = $("#emp_name_" + val).val();
                        var designation = $("#designation_" + val).val();
                        var mobile_1 = $("#mobile_1_" + val).val();
                        var mobile_2 = $("#mobile_2_" + val).val();
                        var email = $("#email_" + val).val();
                        var member_id = $("#member_id_" + val).val();
                        var agency = $("#agency_" + val).val();
                        // var agency_arr= agency.split(".");
                        actual_data_emp.push([emp_name, designation, mobile_1, mobile_2, email, member_id, agency]);
                        // alert(agency);
                    });
                    return actual_data_emp;
                    // })
                    // $("tr:has(.emp_name)").each(function(index, value) {
                    //     var emp_name = $(".emp_name", this).val();
                    //     var designation = $(".designation", this).val();
                    //     var mobile_1 = $(".mobile_1", this).val();
                    //     var mobile_2 = $(".mobile_2", this).val();
                    //     var email = $(".email", this).val();
                    //     var member_id = $(".member_id", this).val();
                    // var agency = $(".agency option:selected", this).val();
                    // var agency = $(".agency").val();
                    // alert(agency);
                    // alert(agency_txt);
                    //     actual_data_emp.push([emp_name, designation, mobile_1, mobile_2, email, member_id]);
                    // });
                    // return actual_data_emp;
                }


                function removeEmp(add_emp) {
                    var employee_id_val = $("#remove_emp_" + add_emp).data("value");
                    deleteEmployeeID(employee_id_val);
                    $("#remove_emp_" + add_emp).closest("tr").remove();
                    var indexValue = main_EMpID_data.indexOf(add_emp);
                    main_EMpID_data.splice(indexValue, 1);
                    console.log(main_EMpID_data);
                }

                function AddEmp(add_emp) {
                    // alert(add_emp);
                    // $('.selectpicker').selectpicker('refresh');
                    add_emp = add_emp + 1;
                    main_EMpID_data.push(add_emp);
                    $("#AddEmp").attr("onClick", "AddEmp(" + add_emp + ")");
                    var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="emp_name[]" id="emp_name_' + add_emp + '" value="" placeholder="Enter Employee Name" class="form-control emp_name"></td><td style="border: 1px solid #dddddd;"><input type="text" name="designation[]" id="designation_' + add_emp + '" value="" placeholder="Enter Designation" class="form-control designation"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="mobile_1[]" id="mobile_1_' + add_emp + '" value="" placeholder="Enter Mobile 1" class="form-control mobile_1"></td> <td style="border: 1px solid #dddddd;"> <input type="text" name="mobile_2[]" id="mobile_2_' + add_emp + '" value="" placeholder="Enter Mobile 2" class="form-control mobile_2"></td><td style="border: 1px solid #dddddd;"><input type="text" name="email[]" id="email_' + add_emp + '" value="" placeholder="Enter Email" class="form-control email"></td><td><select style="width:80px;" name="agency" id="agency_' + add_emp + '" class="selectpicker agency" multiple data-selected-text-format="count" data-style="btn-secondary"> <?php if (!empty($agency_details)) : foreach ($agency_details as $row) : ?>   <option value="<?php echo $row["magency_id"]; ?>"><?php echo $row["name"] . " - ( " . $row["code"] . " )"; ?></option> <?php endforeach;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            endif; ?> </select></td><td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-xs dripicons-cross" id="remove_emp_' + add_emp + '" onClick="removeEmp(' + add_emp + ')"></button></td> </tr>';
                    $("#append_emp").append(tr_table);
                    $('.selectpicker').selectpicker('refresh');
                    console.log(main_EMpID_data);
                }

                function removeAgent(add_agent) {
                    var agency_id_val = $("#remove_agent_" + add_agent).data("value");
                    //    var agency_id_val = $("#remove_agent_" + add_agent).attr("data-id");
                    deleteAgentID(agency_id_val);
                    $("#remove_agent_" + add_agent).closest("tr").remove();

                }

                function deleteEmployeeID(employee_id_val) {
                    deleteEMpID_data.push([employee_id_val]);
                    return deleteEMpID_data;
                }

                function deleteAgentID(agency_id_val) {
                    deleteAgentID_data.push([agency_id_val]);
                    return deleteAgentID_data;
                }

                function AddAgent(add_agent) {
                    add_agent = add_agent + 1;
                    $("#AddAgent").attr("onClick", "AddAgent(" + add_agent + ")");
                    var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="agent_name[]" id="agent_name_' + add_agent + '" value="" placeholder="Enter Agent Name" class="form-control agent_name"></td><td style="border: 1px solid #dddddd;"><input type="text" name="agency_code[]" id="agency_code_' + add_agent + '" value="" placeholder="Enter Agency Code" class="form-control agency_code"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="portal_link[]" id="portal_link_' + add_agent + '" value="" placeholder="Enter Portal Link" class="form-control portal_link"></td><td style="border: 1px solid #dddddd;"> <input type="text" name="user_id[]" id="user_id_' + add_agent + '" value="" placeholder="Enter User Id" class="form-control user_id"></td><td style="border: 1px solid #dddddd;"><input type="text" name="password[]" id="password_' + add_agent + '" value="" placeholder="Enter password" class="form-control password"></td><td style="border: 1px solid #dddddd;"> <select class="form-control status" name="status[]" id="status_' + add_agent + '"><option value="0">In-Active</option><option value="1">Active</option></select></td><td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-xs dripicons-cross" id="remove_agent_' + add_agent + '" onClick="removeAgent(' + add_agent + ')" ></button></td> </tr>';
                    $("#append_agent").append(tr_table);
                }

                var actual_data_emp = [];
                var actual_data_agent = [];

                function TotalEmployee_back() {
                    actual_data_emp = [];
                    $("tr:has(.emp_name)").each(function(index, value) {
                        var emp_name = $(".emp_name", this).val();
                        var designation = $(".designation", this).val();
                        var mobile_1 = $(".mobile_1", this).val();
                        var mobile_2 = $(".mobile_2", this).val();
                        var email = $(".email", this).val();
                        var member_id = $(".member_id", this).val();
                        // var agency = $(".agency option:selected", this).val();
                        // var agency = $(".agency").val();
                        // alert(agency);
                        // alert(agency_txt);
                        actual_data_emp.push([emp_name, designation, mobile_1, mobile_2, email, member_id]);
                    });
                    return actual_data_emp;
                }

                function TotalAgent() {
                    actual_data_agent = [];
                    $("tr:has(.agent_name)").each(function(index, value) {
                        var agent_name = $(".agent_name", this).val();
                        var agency_code = $(".agency_code", this).val();
                        var portal_link = $(".portal_link", this).val();
                        var user_id = $(".user_id", this).val();
                        var password = $(".password", this).val();
                        var status = $(".status", this).val();
                        var agency_id = $(".agency_id", this).val();
                        actual_data_agent.push([agent_name, agency_code, portal_link, user_id, password, status, agency_id]);
                    });
                    return actual_data_agent;
                }

                function clearError() {
                    $("#company_name").removeClass("parsley-error");
                    $("#company_name_err").removeClass("text-danger").text("");
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
                    $("#company_name").val("");
                    $("#short_name").val("");
                    $("#comman_email").val("");
                    $("#address").val("");
                    $("#state").val("");
                    $("#update").hide();
                    $("#delete").hide();
                    $("#submit").show();
                }

                function onUpdate() {
                    var remove_agent = deleteAgentID();
                    var remove_employee = deleteEmployeeID();
                    // alert(remove_employee);
                    // return false;
                    var company_id = $("#company_id").val();
                    // var company_id = "<?php //echo $company_id; 
                                            ?>";
                    var totalEmployee = TotalEmployee();
                    // totalEmployee = JSON.stringify(totalEmployee);
                    var totalAgent = TotalAgent();
                    // totalAgent = JSON.stringify(totalAgent);
                    // alert(company_id);

                    var company_name = $("#company_name").val();
                    var short_name = $("#short_name").val();
                    var comman_email = $("#comman_email").val();
                    var address = $("#address").val();
                    var state = $("#state").val();
                    var city = $("#city").val();
                    var pincode = $("#pincode").val();
                    var office_contact = $("#office_contact").val();
                    var website = $("#website").val();
                    var tollfree_1 = $("#tollfree_1").val();
                    var tollfree_2 = $("#tollfree_2").val();
                    var online_link = $("#online_link").val();
                    var online_steps = $("#online_steps").val();
                    var name_on_cheque = $("#name_on_cheque").val();
                    var courier_address = $("#courier_address").val();
                    var account_holder = $("#account_holder").val();
                    var account_no = $("#account_no").val();
                    var bank_name = $("#bank_name").val();
                    var branch_namw = $("#branch_namw").val();
                    var ifs_code = $("#ifs_code").val();
                    var micr_code = $("#micr_code").val();

                    var account_holder_1 = $("#account_holder_1").val();
                    var account_no_1 = $("#account_no_1").val();
                    var bank_name_1 = $("#bank_name_1").val();
                    var branch_namw_1 = $("#branch_namw_1").val();
                    var ifs_code_1 = $("#ifs_code_1").val();
                    var micr_code_1 = $("#micr_code_1").val();

                    var url = "<?php echo $base_url; ?>master/insurance_company_details/update_company";

                    $.ajax({
                        url: url,
                        data: {
                            company_name: company_name,
                            short_name: short_name,
                            comman_email: comman_email,
                            address: address,
                            state: state,
                            city: city,
                            pincode: pincode,
                            office_contact: office_contact,
                            website: website,
                            tollfree_1: tollfree_1,
                            tollfree_2: tollfree_2,

                            online_link: online_link,
                            online_steps: online_steps,
                            name_on_cheque: name_on_cheque,
                            courier_address: courier_address,
                            account_holder: account_holder,
                            account_no: account_no,
                            bank_name: bank_name,
                            branch_namw: branch_namw,
                            ifs_code: ifs_code,
                            micr_code: micr_code,

                            account_holder_1: account_holder_1,
                            account_no_1: account_no_1,
                            bank_name_1: bank_name_1,
                            branch_namw_1: branch_namw_1,
                            ifs_code_1: ifs_code_1,
                            micr_code_1: micr_code_1,
                            company_id: company_id,

                            total_employee: totalEmployee,
                            total_agent: totalAgent,
                            remove_agent: remove_agent,
                            remove_employee: remove_employee

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
                                $("#company_name").val("");
                                $("#company_name").removeClass("parsley-error");
                                setTimeout(function() {
                                    // location.reload();
                                    window.location.href = '<?php echo base_url(); ?>master/insurance_company_details/index';
                                }, 1000);
                            } else {
                                if (data["message"]["company_name_err"] != "")
                                    $("#company_name").addClass("parsley-error");
                                else
                                    $("#company_name").removeClass("parsley-error");
                                $("#company_name_err").addClass("text-danger").html(data["message"]["company_name_err"]);
                            }

                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    });
                }
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
                            CheckFormAccess(submenu_permission, 1, url);
                            check(role_permission, 1);
                        }
                    }
                });
            </script>