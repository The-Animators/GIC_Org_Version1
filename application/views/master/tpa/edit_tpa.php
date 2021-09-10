            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
            if (!empty($tpa_details)) {
                // print_r($tpa_details);
                // die("Test");
                $tpa_id = $tpa_details["mtpa_id"];
                $tpa_name = $tpa_details["tpa_name"];
                $short_name = $tpa_details["short_name"];
                $common_email = $tpa_details["common_email"];
                $address = $tpa_details["address"];
                $state = $tpa_details["state"];
                $city = $tpa_details["city"];
                $pincode = $tpa_details["zipcode"];
                $office_contact = $tpa_details["office_contact"];
                $website = $tpa_details["website"];
                $tollfree_no_1 = $tpa_details["tollfree_no_1"];
                $tollfree_no_2 = $tpa_details["tollfree_no_2"];
                $tpa_claim_upload = $tpa_details["tpa_claim_upload"];
            } else {

                $tpa_id = "";
                $tpa_name = "";
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
                $tpa_claim_upload = "";
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
                                            <input type="hidden" name="tpa_id" id="tpa_id" value="<?php echo $tpa_id; ?>">
                                            <a href="<?php echo base_url() . "master/tpa/view_tpa/$tpa_id"; ?>" class='btn btn-secondary waves-effect btn-xs'>Back</a>
                                        </div>

                                    </div>

                                    <p class="sub-header">

                                    </p>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <u> <strong><?php echo $title; ?> General Details</strong></u>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="tpa_name" class="col-form-label col-md-4 text-right">TPA Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="tpa_name" id="tpa_name" value="<?php echo $tpa_name; ?>" placeholder="Enter TPA Name" class="form-control">
                                                            <span id="tpa_name_err"></span>
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

                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="tpa_claim_upload" class="col-form-label col-md-4 text-right">Claim Form Upload</label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="tpa_claim_upload" id="tpa_claim_upload" value="" placeholder="Enter Claim Form Upload" class="form-control" onchange="check_file_upload(id ='tpa_claim_upload')">
                                                            <input type="hidden" name="tpa_claim_upload_hidden" id="tpa_claim_upload_hidden" value="<?php echo $tpa_claim_upload; ?>">
                                                            <span id="tpa_claim_upload_details"></span>
                                                            <span id="tpa_claim_upload_err"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <u><strong><?php echo $title; ?> Employee Details</strong></u>
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
                                                                <td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-xs dripicons-cross" id="remove_emp_0" onClick="removeEmp(0)" disabled></button></td>
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
                                                        <button id="update" onclick='onUpdate()' class="btn btn-primary btn-xs">Update</button>
                                                        <!-- <button id="update" class="btn btn-primary btn-xs">Update <?php //echo $title; 
                                                                                                                        ?></button> -->

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
                function OnDelete_Doc(tpa_details) {
                    var tpa_details = tpa_details.split(",");
                    var tpa_id = tpa_details[0];
                    var doc_type = tpa_details[1];
                    var doc_name = tpa_details[2];
                    var url = tpa_details[3];
                    // alert(policy_id);
                    // alert(doc_type);
                    // alert(doc_name);
                    // alert(url);
                    if (doc_type == 1)
                        var title = "TPA Claim Form Document";
                    document_confirmation_alert(id = tpa_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
                }

                TPA_claim_upload_Details();

                function TPA_claim_upload_Details() {
                    var tpa_claim_upload = '<?php echo $tpa_claim_upload; ?>';
                    // alert(tpa_claim_upload);
                    var tpa_id = '<?php echo $tpa_id; ?>';
                    if (tpa_claim_upload == "" || tpa_claim_upload == null || tpa_claim_upload == undefined) {
                        var view_tpa_claim_upload = "";
                        var download_tpa_claim_upload = "";
                        var delete_tpa_claim_upload = "";
                    } else if (tpa_claim_upload != "") {
                        var view_tpa_claim_upload = "<a href='<?php echo base_url(); ?>master/tpa/view_doc/1/" + tpa_id + "/"+tpa_claim_upload+"'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_tpa_claim_upload = "<a href='<?php echo base_url(); ?>master/tpa/download_doc/1/" + tpa_id +  tpa_id + "/"+tpa_claim_upload+"'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_tpa_claim_upload = "<a onclick=OnDelete_Doc('" + tpa_id + ',' + 1 + ',' + tpa_claim_upload + ',' + '<?php echo base_url(); ?>master/tpa/delete_doc' + "') href='#'  class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></b></a>";
                    }
                    $("#tpa_claim_upload_details").html(view_tpa_claim_upload + "  " + download_tpa_claim_upload + "  " + delete_tpa_claim_upload);
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

                getEmployeeDetails(<?php echo $tpa_id; ?>);

                function getEmployeeDetails(tpa_id) {
                    // return false;
                    // alert(tpa_id);
                    $("#tableData").empty();
                    var url = "<?php echo $base_url; ?>master/tpa/get_employee_details";
                    if (url != "") {
                        $.ajax({
                            url: url,
                            data: {
                                'tpa_id': tpa_id
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
                                    $.each(employee, function(key, val) {
                                        add_emp = key;
                                        var mtpa_member_id = employee[key].mtpa_member_id;
                                        var tpa_member_name = employee[key].tpa_member_name;
                                        var designation = employee[key].designation;
                                        var contact1 = employee[key].contact1;
                                        var contact2 = employee[key].contact2;
                                        var email1 = employee[key].email1;
                                        var member_del_flag = employee[key].member_del_flag;
                                        var mmember_status = employee[key].mmember_status;
                                        var fk_mtpa_id = employee[key].fk_mtpa_id;
                                        emp_tr += ' <tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><center><input type="text" name="emp_name[]" id="emp_name_' + add_emp + '" value="' + tpa_member_name + '" placeholder="Enter Employee Name" class="form-control emp_name"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="designation[]" id="designation_' + add_emp + '" value="' + designation + '" placeholder="Enter Designation" class="form-control designation"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="mobile_1[]" id="mobile_1_' + add_emp + '" value="' + contact1 + '" placeholder="Enter Mobile 1" class="form-control mobile_1"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="mobile_2[]" id="mobile_2_' + add_emp + '" value="' + contact2 + '" placeholder="Enter Mobile 2" class="form-control mobile_2"></center></td><td style="border: 1px solid #dddddd;"><center><input type="text" name="email[]" id="email_' + add_emp + '" value="' + email1 + '" placeholder="Enter Email" class="form-control email"></center></td><td style="border: 1px solid #dddddd;"><center><button class="btn btn-primary btn-xs dripicons-cross" id="remove_emp_' + add_emp + '" onClick="removeEmp(' + add_emp + ')" data-value="' + mtpa_member_id + '" data-id="' + mtpa_member_id + '"></button></center></td> <input type="hidden" name="tpa_member_id[]" id="tpa_member_id' + add_emp + '" value="' + mtpa_member_id + '" class="tpa_member_id"> </tr>';
                                    });
                                    $("#AddEmp").attr("onClick", "AddEmp(" + (length - 1) + ")");
                                    $("#append_emp").append(emp_tr);

                                }

                            },
                            error: function(request, status, error) {
                                alert(request.responseText);
                            }
                        });
                    }
                }
                $('document').ready(function() {
                    $('#tpa_name').keyup(function() {
                        var tpa_short_name = $("#tpa_name").val().split(" ")[0];
                        // alert(tpa_short_name);
                        $("#short_name").val(tpa_short_name);
                        document.getElementById("short_name").disabled = true;
                    });
                });
                var add_emp = 0;
                var add_agent = 0;
                var deleteEMpID_data = [];

                function removeEmp(add_emp) {
                    var tpa_employee_id_val = $("#remove_emp_" + add_emp).data("value");
                    deleteEmployeeID(tpa_employee_id_val);
                    $("#remove_emp_" + add_emp).closest("tr").remove();
                }

                function deleteEmployeeID(tpa_employee_id_val) {
                    deleteEMpID_data.push([tpa_employee_id_val]);
                    return deleteEMpID_data;
                }

                function AddEmp(add_emp) {
                    add_emp = add_emp + 1;
                    $("#AddEmp").attr("onClick", "AddEmp(" + add_emp + ")");
                    var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="emp_name[]" id="emp_name_' + add_emp + '" value="" placeholder="Enter Employee Name" class="form-control emp_name"></td><td style="border: 1px solid #dddddd;"><input type="text" name="designation[]" id="designation_' + add_emp + '" value="" placeholder="Enter Designation" class="form-control designation"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="mobile_1[]" id="mobile_1_' + add_emp + '" value="" placeholder="Enter Mobile 1" class="form-control mobile_1"></td> <td style="border: 1px solid #dddddd;"> <input type="text" name="mobile_2[]" id="mobile_2_' + add_emp + '" value="" placeholder="Enter Mobile 2" class="form-control mobile_2"></td><td style="border: 1px solid #dddddd;"><input type="text" name="email[]" id="email_' + add_emp + '" value="" placeholder="Enter Email" class="form-control email"></td><td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-xs dripicons-cross" id="remove_emp_' + add_emp + '" onClick="removeEmp(' + add_emp + ')"></button></td> </tr>';
                    $("#append_emp").append(tr_table);
                }

                function removeAgent(add_agent) {
                    $("#remove_agent_" + add_agent).closest("tr").remove();
                }

                function AddAgent(add_agent) {
                    add_agent = add_agent + 1;
                    $("#AddAgent").attr("onClick", "AddAgent(" + add_agent + ")");
                    var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><input type="text" name="agent_name[]" id="agent_name_' + add_agent + '" value="" placeholder="Enter Agent Name" class="form-control agent_name"></td><td style="border: 1px solid #dddddd;"><input type="text" name="agency_code[]" id="agency_code_' + add_agent + '" value="" placeholder="Enter Agency Code" class="form-control agency_code"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="portal_link[]" id="portal_link_' + add_agent + '" value="" placeholder="Enter Portal Link" class="form-control portal_link"></td><td style="border: 1px solid #dddddd;"> <input type="text" name="user_id[]" id="user_id_' + add_agent + '" value="" placeholder="Enter User Id" class="form-control user_id"></td><td style="border: 1px solid #dddddd;"><input type="text" name="password[]" id="password_' + add_agent + '" value="" placeholder="Enter password" class="form-control password"></td><td style="border: 1px solid #dddddd;"> <select class="form-control status" name="status[]" id="status_' + add_agent + '"><option value="0">In-Active</option><option value="1">Active</option></select></td><td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-xs dripicons-cross" id="remove_agent_' + add_agent + '" onClick="removeAgent(' + add_agent + ')" ></button></td> </tr>';
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
                        var tpa_member_id = $(".tpa_member_id", this).val();
                        actual_data_emp.push([emp_name, designation, mobile_1, mobile_2, email, tpa_member_id]);
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
                    $("#tpa_name").removeClass("parsley-error");
                    $("#tpa_name_err").removeClass("text-danger").text("");
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
                    $("#tpa_name").val("");
                    $("#short_name").val("");
                    $("#comman_email").val("");
                    $("#address").val("");
                    $("#state").val("");
                    $("#update").hide();
                    $("#delete").hide();
                    $("#submit").show();
                }

                function onUpdate() {
                    var tpa_id = $("#tpa_id").val();
                    // var totalEmployee = TotalEmployee();
                    var total_employee = JSON.stringify(TotalEmployee());
                    var remove_employee = JSON.stringify(deleteEmployeeID());
                    // totalEmployee = JSON.stringify(totalEmployee);
                    // alert(remove_employee);
                    // return false;
                    var tpa_name = $("#tpa_name").val();
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
                    var tpa_claim_upload = $('#tpa_claim_upload').prop('files')[0];

                    var form_data = new FormData();
                    form_data.append('tpa_id', tpa_id);
                    form_data.append('tpa_name', tpa_name);
                    form_data.append('short_name', short_name);
                    form_data.append('comman_email', comman_email);
                    form_data.append('address', address);
                    form_data.append('state', state);
                    form_data.append('city', city);
                    form_data.append('pincode', pincode);
                    form_data.append('office_contact', office_contact);
                    form_data.append('website', website);
                    form_data.append('tollfree_1', tollfree_1);
                    form_data.append('tollfree_2', tollfree_2);
                    form_data.append('tpa_claim_upload', tpa_claim_upload);
                    form_data.append('total_employee', total_employee);
                    form_data.append('remove_employee', remove_employee);
                    var url = "<?php echo $base_url; ?>master/tpa/update_tpa";

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form_data,
                        // data: {
                        //     tpa_id: tpa_id,
                        //     tpa_name: tpa_name,
                        //     short_name: short_name,
                        //     comman_email: comman_email,
                        //     address: address,
                        //     state: state,
                        //     city: city,
                        //     pincode: pincode,
                        //     office_contact: office_contact,
                        //     website: website,
                        //     tollfree_1: tollfree_1,
                        //     tollfree_2: tollfree_2,
                        //     form_data: form_data,

                        //     total_employee: totalEmployee,
                        //     remove_employee: remove_employee
                        // },
                        dataType: 'json',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {

                        },
                        success: function(data) {
                            if (data["status"] == true) {
                                toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                                $("#tpa_name").val("");
                                $("#tpa_name").removeClass("parsley-error");
                                setTimeout(function() {
                                    // location.reload();
                                    window.location.href = '<?php echo base_url(); ?>master/tpa/index';
                                }, 1000);
                            } else {
                                if (data["messages"] != "") {
                                    if (data["messages"]["tpa_claim_upload_err"] != "")
                                        toaster(message_type = "Error", message_txt = data["messages"]["tpa_claim_upload_err"], message_icone = "error");
                                    if (data["messages"]["tpa_claim_upload_err"] != "")
                                        $("#tpa_claim_upload").addClass("parsley-error");
                                    else
                                        $("#tpa_claim_upload").removeClass("parsley-error");
                                    $("#tpa_claim_upload_err").addClass("text-danger").html(data["messages"]["tpa_claim_upload_err"]);
                                } else {
                                    if (data["message"]["tpa_name_err"] != "")
                                        $("#tpa_name").addClass("parsley-error");
                                    else
                                        $("#tpa_name").removeClass("parsley-error");
                                    $("#tpa_name_err").addClass("text-danger").html(data["message"]["tpa_name_err"]);
                                }
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
                            CheckFormAccess(submenu_permission, 5, url);
                            check(role_permission, 5);
                        }
                    }
                });
            </script>