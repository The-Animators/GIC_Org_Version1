            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
            if (!empty($staff_details)) {
                // print_r($staff_details);
                // die("Test");
                $staff_id = $staff_details["staff_id"];
                $company_name = $staff_details["company_name"];
                $short_name = $staff_details["staff_username"];
                $comman_email = $staff_details["staff_comman_email"];
                $address = $staff_details["staff_address"];
                $state = $staff_details["fk_user_role_id"];
                $del_flag = $staff_details["del_flag"];
            } else {
                $staff_id = "";
                $company_name = "";
                $short_name = "";
                $comman_email = "";
                $address = "";
                $state = "";
                $del_flag = "";
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
                                            <h4 class="header-title"><?php echo "Add " . $title; ?></h4>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a href="<?php echo base_url() . "master/insurance_company_details"; ?>" class='btn btn-secondary waves-effect width-md btn-sm'>Back</a>
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
                                                            <input type="text" name="company_name" id="company_name" value="" placeholder="Enter Company Name" class="form-control">
                                                            <span id="company_name_err"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="short_name" class="col-form-label col-md-4 text-right">Short Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="short_name" id="short_name" value="" placeholder="Enter Short Name" class="form-control">
                                                            <span id="short_name_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="comman_email" class="col-form-label col-md-4  text-right">Common Email<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="comman_email" id="comman_email" value="" placeholder="Enter Common Email" class="form-control">
                                                            <span id="comman_email_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="address" class="col-form-label col-md-4  text-right">Address<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="address" id="address" value="" placeholder="Enter Address" class="form-control">
                                                            <span id="address_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="state" class="col-form-label col-md-4  text-right">State<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="state" id="state" value="" placeholder="Enter State" class="form-control">
                                                            <span id="state_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="city" class="col-form-label col-md-4  text-right">City<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="city" id="city" value="" placeholder="Enter City" class="form-control">
                                                            <span id="city_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="pincode" class="col-form-label col-md-4  text-right">Pincode<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="pincode" id="pincode" value="" placeholder="Enter Pincode" class="form-control">
                                                            <span id="pincode_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="office_contact" class="col-form-label col-md-4  text-right">Office Contact<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="office_contact" id="office_contact" value="" placeholder="Enter Office Contact" class="form-control">
                                                            <span id="office_contact_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="website" class="col-form-label col-md-4  text-right">Website<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="website" id="website" value="" placeholder="Enter Website" class="form-control">
                                                            <span id="website_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="tollfree_1" class="col-form-label col-md-4  text-right">Toll Free No.1</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="tollfree_1" id="tollfree_1" value="" placeholder="Enter Toll Free No.1" class="form-control">
                                                            <span id="tollfree_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="tollfree_2" class="col-form-label col-md-4  text-right">Toll Free No.2</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="tollfree_2" id="tollfree_2" value="" placeholder="Enter Toll Free No.2" class="form-control">
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
                                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddAgent" id="AddAgent" onClick="AddAgent(0)">Add Agent</button></div>
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
                                                                <td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_agent_0" onClick="removeAgent(0)" disabled></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <hr>

                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <u><strong>Company Employee Details</strong></u>
                                                </div>
                                                <div class="col-md-6 text-right"><button class="btn btn-primary btn-sm AddEmp" id="AddEmp" onClick="AddEmp(0)">Add Employee</button></div>
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
                                                                <td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_emp_0" onClick="removeEmp(0)" disabled></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>


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
                                                            <input type="text" name="online_link" id="online_link" value="" placeholder="Enter Online Link" class="form-control ">
                                                            <span id="online_link_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="online_steps" class="col-form-label col-md-4 text-right">Payment Steps<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <textarea rows="2" name="online_steps" id="online_steps" placeholder="Enter Online Steps" class="form-control "></textarea>
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
                                                            <input type="text" name="name_on_cheque" id="name_on_cheque" value="" placeholder="Enter Name on Cheque" class="form-control ">
                                                            <span id="name_on_cheque_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="courier_address" class="col-form-label col-md-4 text-right">Courier Address<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <textarea rows="2" name="courier_address" id="courier_address" placeholder="Enter Courier Address" class="form-control "></textarea>
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
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="account_holder" class="col-form-label col-md-4 text-right">Account Holder<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="account_holder" id="account_holder" value="" placeholder="Enter Account Holder" class="form-control">
                                                            <span id="account_holder_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="account_no" class="col-form-label col-md-4 text-right">Account Number<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="account_no" id="account_no" value="" placeholder="Enter Account Number" class="form-control">
                                                            <span id="account_no_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="bank_name" class="col-form-label col-md-4 text-right">Bank Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="bank_name" id="bank_name" value="" placeholder="Enter Bank Name" class="form-control">
                                                            <span id="bank_name_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="branch_namw" class="col-form-label col-md-4 text-right">Branch Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="branch_namw" id="branch_namw" value="" placeholder="Enter Branch Name" class="form-control">
                                                            <span id="branch_namw_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="ifs_code" class="col-form-label col-md-4 text-right">IFSC Code<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="ifs_code" id="ifs_code" value="" placeholder="Enter IFSC Code" class="form-control">
                                                            <span id="ifs_code_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="micr_code" class="col-form-label col-md-4 text-right">MICR Code<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="micr_code" id="micr_code" value="" placeholder="Enter MICR Code" class="form-control">
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
                                                            <input type="text" name="account_holder_1" id="account_holder_1" value="" placeholder="Enter Account Holder 2" class="form-control">
                                                            <span id="account_holder_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
											
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="account_no_1" class="col-form-label col-md-4 text-right">Account Number 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="account_no_1" id="account_no_1" value="" placeholder="Enter Account Number 2" class="form-control">
                                                            <span id="account_no_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="bank_name_1" class="col-form-label col-md-4 text-right">Bank Name 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="bank_name_1" id="bank_name_1" value="" placeholder="Enter Bank Name 2" class="form-control">
                                                            <span id="bank_name_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="branch_namw_1" class="col-form-label col-md-4 text-right">Branch Name 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="branch_namw_1" id="branch_namw_1" value="" placeholder="Enter Branch Name 2" class="form-control">
                                                            <span id="branch_namw_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="ifs_code_1" class="col-form-label col-md-4 text-right">IFSC Code 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="ifs_code_1" id="ifs_code_1" value="" placeholder="Enter IFSC Code 2" class="form-control">
                                                            <span id="ifs_code_1_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="micr_code_1" class="col-form-label col-md-4 text-right">MICR Code 2<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="micr_code_1" id="micr_code_1" value="" placeholder="Enter MICR Code 2" class="form-control">
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
                $('document').ready(function() {
                    $('#company_name').keyup(function() {
                        var company_short_name = $("#company_name").val().split(" ")[0];
                        // alert(company_short_name);
                        $("#short_name").val(company_short_name);
                        document.getElementById("short_name").disabled = true;
                    });
                });
                var add_emp = 0;
                var add_agent = 0;

                function removeEmp(add_emp) {
                    $("#remove_emp_" + add_emp).closest("tr").remove();
                }

                function AddEmp(add_emp) {
                    add_emp = add_emp + 1;
                    $("#AddEmp").attr("onClick", "AddEmp(" + add_emp + ")");
                    var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;"><input type="text" name="emp_name[]" id="emp_name_' + add_emp + '" value="" placeholder="Enter Employee Name" class="form-control emp_name"></td><td style="border: 1px solid #dddddd;"><input type="text" name="designation[]" id="designation_' + add_emp + '" value="" placeholder="Enter Designation" class="form-control designation"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="mobile_1[]" id="mobile_1_' + add_emp + '" value="" placeholder="Enter Mobile 1" class="form-control mobile_1"></td> <td style="border: 1px solid #dddddd;"> <input type="text" name="mobile_2[]" id="mobile_2_' + add_emp + '" value="" placeholder="Enter Mobile 2" class="form-control mobile_2"></td><td style="border: 1px solid #dddddd;"><input type="text" name="email[]" id="email_' + add_emp + '" value="" placeholder="Enter Email" class="form-control email"></td><td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_emp_' + add_emp + '" onClick="removeEmp(' + add_emp + ')"></button></td> </tr>';
                    $("#append_emp").append(tr_table);
                }

                function removeAgent(add_agent) {
                    $("#remove_agent_" + add_agent).closest("tr").remove();
                }

                function AddAgent(add_agent) {
                    add_agent = add_agent + 1;
                    $("#AddAgent").attr("onClick", "AddAgent(" + add_agent + ")");
                    var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="agent_name[]" id="agent_name_' + add_agent + '" value="" placeholder="Enter Agent Name" class="form-control agent_name"></td><td style="border: 1px solid #dddddd;"><input type="text" name="agency_code[]" id="agency_code_' + add_agent + '" value="" placeholder="Enter Agency Code" class="form-control agency_code"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="portal_link[]" id="portal_link_' + add_agent + '" value="" placeholder="Enter Portal Link" class="form-control portal_link"></td><td style="border: 1px solid #dddddd;"> <input type="text" name="user_id[]" id="user_id_' + add_agent + '" value="" placeholder="Enter User Id" class="form-control user_id"></td><td style="border: 1px solid #dddddd;"><input type="text" name="password[]" id="password_' + add_agent + '" value="" placeholder="Enter password" class="form-control password"></td><td style="border: 1px solid #dddddd;"> <select class="form-control status" name="status[]" id="status_' + add_agent + '"><option value="0">In-Active</option><option value="1">Active</option></select></td><td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_agent_' + add_agent + '" onClick="removeAgent(' + add_agent + ')" ></button></td> </tr>';
                    $("#append_agent").append(tr_table);
                }

                var actual_data_emp = [];
                var actual_data_agent = [];

                function TotalEmployee() {
					actual_data_emp = [];
                    $("tr:has(.emp_name)").each(function(index, value) {
                        var emp_name = $(".emp_name", this).val();
                        var designation = $(".designation", this).val();
                        var mobile_1 = $(".mobile_1", this).val();
                        var mobile_2 = $(".mobile_2", this).val();
                        var email = $(".email", this).val();
                        actual_data_emp.push([emp_name, designation, mobile_1, mobile_2, email]);
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
                        actual_data_agent.push([agent_name, agency_code, portal_link, user_id, password, status]);
                    });
                    return actual_data_agent;
                }

                // $('#company_name').on('keyup', function() {
                //     document.getElementById("update").disabled = false;
                // });
                // $('#short_name').on('keyup', function() {
                //     document.getElementById("update").disabled = false;
                // });
                // $('#comman_email').on('keyup', function() {
                //     document.getElementById("update").disabled = false;
                // });
                // $('#address').on('keyup', function() {
                //     document.getElementById("update").disabled = false;
                // });
                // $('#state').on('change', function() {
                //     document.getElementById("update").disabled = false;
                // });


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

                $("#submit").click(function() {
                    var totalEmployee = TotalEmployee();
                    // totalEmployee = JSON.stringify(totalEmployee);
                    var totalAgent = TotalAgent();
                    // totalAgent = JSON.stringify(totalAgent);

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

                    var url = "<?php echo $base_url; ?>master/insurance_company_details/add_company";

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

                            total_employee: totalEmployee,
                            total_agent: totalAgent,

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
                            CheckFormAccess(submenu_permission, 1, url);
                            check(role_permission, 1);
                        }
                    }
                });
            </script>