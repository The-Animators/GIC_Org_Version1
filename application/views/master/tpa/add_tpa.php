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
                                            <a href="<?php echo base_url() . "master/tpa"; ?>" class='btn btn-secondary waves-effect btn-xs'>Back</a>
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
                                                        <label for="tpa_name" class="col-form-label col-md-4 text-right"><?php echo $title; ?> Name<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="tpa_name" id="tpa_name" value="" placeholder="Enter TPA Name" class="form-control">
                                                            <span id="tpa_name_err"></span>
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

                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="tpa_claim_upload" class="col-form-label col-md-4 text-right">Claim Form Upload</label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="tpa_claim_upload" id="tpa_claim_upload" value="" placeholder="Enter Claim Form Upload" class="form-control" onchange="check_file_upload(id ='tpa_claim_upload')">
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

                                                        <button id="submit" class="btn btn-primary btn-xs">Save</button>

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

                $('document').ready(function() {
                    $('#tpa_name').keyup(function() {
                        var company_short_name = $("#tpa_name").val().split(" ")[0];
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
                    var tr_table = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;"><input type="text" name="emp_name[]" id="emp_name_' + add_emp + '" value="" placeholder="Enter Employee Name" class="form-control emp_name"></td><td style="border: 1px solid #dddddd;"><input type="text" name="designation[]" id="designation_' + add_emp + '" value="" placeholder="Enter Designation" class="form-control designation"></td> <td style="border: 1px solid #dddddd;"><input type="text" name="mobile_1[]" id="mobile_1_' + add_emp + '" value="" placeholder="Enter Mobile 1" class="form-control mobile_1"></td> <td style="border: 1px solid #dddddd;"> <input type="text" name="mobile_2[]" id="mobile_2_' + add_emp + '" value="" placeholder="Enter Mobile 2" class="form-control mobile_2"></td><td style="border: 1px solid #dddddd;"><input type="text" name="email[]" id="email_' + add_emp + '" value="" placeholder="Enter Email" class="form-control email"></td><td style="border: 1px solid #dddddd;"><button class="btn btn-primary btn-xs dripicons-cross" id="remove_emp_' + add_emp + '" onClick="removeEmp(' + add_emp + ')"></button></td> </tr>';
                    $("#append_emp").append(tr_table);
                }

                var actual_data_emp = [];

                function TotalEmployee_arr() {
                    actual_data_emp = [];
                    $("tr:has(.emp_name)").each(function(index, value) {
                        var emp_name = $(".emp_name", this).val();
                        var designation = $(".designation", this).val();
                        var mobile_1 = $(".mobile_1", this).val();
                        var mobile_2 = $(".mobile_2", this).val();
                        var email = $(".email", this).val();
                        actual_data_emp.push([emp_name, designation, mobile_1, mobile_2, email]);
                        if (emp_name == '')
                            actual_data_emp.splice(index, 1);
                    });
                    return actual_data_emp;
                }

                // function TotalEmployee() {
                //     actual_data_emp = [];
                //     $("tr:has(.emp_name)").each(function(index, value) {
                //         var emp_name = $(".emp_name", this).val();
                //         var designation = $(".designation", this).val();
                //         var mobile_1 = $(".mobile_1", this).val();
                //         var mobile_2 = $(".mobile_2", this).val();
                //         var email = $(".email", this).val();
                //         actual_data_emp.push([emp_name, designation, mobile_1, mobile_2, email]);
                //         if (emp_name == '')
                //             actual_data_emp.splice(index, 1);
                //     });
                //     return actual_data_emp;
                // }


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

                $("#submit").click(function() {
                    // var totalEmployee = TotalEmployee();
                    // JSON.stringify(TotalRemarks());
                    var total_employee = JSON.stringify(TotalEmployee_arr());
                    // alert(total_employee);

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

                    var url = "<?php echo $base_url; ?>master/tpa/add_tpa";

                    $.ajax({
                        url: url,
                        data: form_data,
                        // data: {
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

                        // },
                        type: 'POST',
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