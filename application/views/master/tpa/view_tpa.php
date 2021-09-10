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
                                            <h4 class="header-title"><?php echo "View " . $title; ?></h4>
                                        </div>
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-6 text-right" id="btn_details">
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
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%"><?php echo $title; ?> Name :</td>
                                                                <td><strong><span id="tpa_name" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="tpa_name" class="col-form-label col-md-4 text-right"><?php echo $title; ?> Name : </label>
                                                        <div class="col-form-label col-md-8 text-success" id="tpa_name"></div>
                                                    </div> -->
                                                </div>

                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Short Name :</td>
                                                                <td><strong><span id="short_name" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="short_name" class="col-form-label col-md-4 text-right">Short Name : </label>
                                                        <div class="col-form-label col-md-8" id="short_name"></div>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Common Email :</td>
                                                                <td><strong><span id="comman_email" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="comman_email" class="col-form-label col-md-4  text-right">Common Email : </label>
                                                        <div class="col-form-label col-md-8" id="comman_email"></div>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Address :</td>
                                                                <td><strong><span id="address" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="address" class="col-form-label col-md-4  text-right">Address : </label>
                                                        <div class="col-form-label col-md-8" id="address"></div>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Office Contact :</td>
                                                                <td><strong><span id="office_contact" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="office_contact" class="col-form-label col-md-4  text-right">Office Contact : </label>
                                                        <div class="col-form-label col-md-8" id="office_contact"></div>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Website :</td>
                                                                <td><strong><span id="website" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="website" class="col-form-label col-md-4  text-right">Website : </label>
                                                        <div class="col-form-label col-md-8" id="website"></div>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Toll Free No.1 :</td>
                                                                <td><strong><span id="tollfree_1" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="tollfree_1" class="col-form-label col-md-4  text-right">Toll Free No.1 : </label>
                                                        <div class="col-form-label col-md-8" id="tollfree_1"> </div>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Toll Free No.2 :</td>
                                                                <td><strong><span id="tollfree_2" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="tollfree_2" class="col-form-label col-md-4  text-right">Toll Free No.2 : </label>
                                                        <div class="col-form-label col-md-8" id="tollfree_2"> </div>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Claim Form Upload :</td>
                                                                <td><strong><span id="tpa_claim_upload_details" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!-- <div class="form-group row">
                                                        <label for="tpa_claim_upload_details" class="col-form-label col-md-4  text-right">Claim Form Upload : </label>
                                                        <div class="col-form-label col-md-8" id="tpa_claim_upload_details"> </div>
                                                    </div> -->
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <u><strong><?php echo $title; ?> Employee Details</strong></u>
                                                </div>
                                                <div class="col-md-6 text-right"></div>
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
                                                            </tr>
                                                        </thead>
                                                        <tbody id="append_emp">
                                                            <tr>
                                                                <td style="border: 1px solid #dddddd;"></td>
                                                                <td style="border: 1px solid #dddddd;"></td>
                                                                <td style="border: 1px solid #dddddd;"></td>
                                                                <td style="border: 1px solid #dddddd;"></td>
                                                                <td style="border: 1px solid #dddddd;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>


                                            <hr>


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
                function wordwrap(str = "", width = "", brk = "", cut = "", type = "") { // Type 1:break, 2:not Break
                    // if (str && !str.match(/^.+:\/\/.*/)) {
                    //     str ='https://' + str;
                    // }
                    if (type == 1)
                        brk = brk;
                    else
                        brk = '';
                    brk = brk || 'n';
                    width = width || 75;
                    cut = cut || false;

                    if (!str) {
                        return str;
                    }

                    var regex = '.{1,' + width + '}(\|$)' + (cut ? '|.{' + width + '}|.+$' : '|\S+?(\|$)');

                    return str.match(RegExp(regex, 'g')).join(brk);

                }

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

                // TPA_claim_upload_Details();

                function TPA_claim_upload_Details() {
                    var tpa_claim_upload = '<?php //echo $tpa_claim_upload; 
                                            ?>';
                    // alert(tpa_claim_upload);
                    var tpa_id = '<?php //echo $tpa_id; 
                                    ?>';
                    if (tpa_claim_upload == "" || tpa_claim_upload == null || tpa_claim_upload == undefined) {
                        var view_tpa_claim_upload = "";
                        var download_tpa_claim_upload = "";
                        var delete_tpa_claim_upload = "";
                    } else if (tpa_claim_upload != "") {
                        var view_tpa_claim_upload = "<a href='<?php echo base_url(); ?>master/tpa/view_doc/1/" + tpa_id + "/" + tpa_claim_upload + "'  class='text-info'  target='_blank'><b>View</b></a>";
                        var download_tpa_claim_upload = "<a href='<?php echo base_url(); ?>master/tpa/download_doc/1/" + tpa_id + tpa_id + "/" + tpa_claim_upload + "'  class='text-success'><b>Download</b></a>";
                        var delete_tpa_claim_upload = "<a onclick=OnDelete_Doc('" + tpa_id + ',' + 1 + ',' + tpa_claim_upload + ',' + '<?php echo base_url(); ?>master/tpa/delete_doc' + "') href='#'  class='text-danger'><b>Remove</b></a>";
                    }
                    $("#tpa_claim_upload_details").html(view_tpa_claim_upload + "  " + download_tpa_claim_upload + "  " + delete_tpa_claim_upload);
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
                                    var employee = data["userdata"];
                                    $.each(employee, function(key, val) {
                                        var mtpa_member_id = employee[key].mtpa_member_id;
                                        var tpa_member_name = employee[key].tpa_member_name;
                                        var designation = employee[key].designation;
                                        var contact1 = employee[key].contact1;
                                        var contact2 = employee[key].contact2;
                                        var email1 = employee[key].email1;
                                        var member_del_flag = employee[key].member_del_flag;
                                        var mmember_status = employee[key].mmember_status;
                                        var fk_mtpa_id = employee[key].fk_mtpa_id;
                                        emp_tr += ' <tr><td style="border: 1px solid #dddddd;padding:10px;"><center>' + tpa_member_name + '</center></td><td style="border: 1px solid #dddddd;"><center>' + designation + '</center></td><td style="border: 1px solid #dddddd;"><center>' + contact1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + contact1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + email1 + '</center></td> </tr>';
                                    });
                                    $("#append_emp").append(emp_tr);
                                }

                            },
                            error: function(request, status, error) {
                                alert(request.responseText);
                            }
                        });
                    }
                }

                getTPADetails();

                function getTPADetails() {
                    $("#tableData").empty();
                    var tpa_id = "<?php echo $tpa_id; ?>";
                    // alert(mtpa_id);
                    var url = "<?php echo $base_url; ?>master/tpa/get_tpa_details";
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
                                $("#btn_details").empty();
                                if (data["status"] == true) {

                                    var tpa_id = parseInt(data["userdata"].mtpa_id);
                                    var tpa_name = data["userdata"].tpa_name;
                                    $("#tpa_name").text(tpa_name);

                                    var short_name = data["userdata"].short_name;
                                    $("#short_name").text(short_name);

                                    var common_email = data["userdata"].common_email;
                                    $("#comman_email").text(common_email);

                                    var address = data["userdata"].address;
                                    var state = data["userdata"].state;
                                    var city = data["userdata"].city;
                                    var zipcode = data["userdata"].zipcode;

                                    // var website = data["userdata"].website;
                                    var website = wordwrap(data["userdata"].website, '20', '<br/>', cut = '', type = "2");
                                    if (website == "" || website == null || website == undefined)
                                        website = '';
                                    else
                                        website = '<a href ="' + data["userdata"].website + '" target="_blank">[' + website + ']</a>';
                                    $("#website").html(website);

                                    var office_contact = data["userdata"].office_contact;
                                    $("#office_contact").text(office_contact);

                                    var tollfree_no_1 = data["userdata"].tollfree_no_1;
                                    $("#tollfree_1").text(tollfree_no_1);

                                    var tpa_del_flag = data["userdata"].tpa_del_flag;
                                    var tollfree_no_2 = data["userdata"].tollfree_no_2;
                                    var tpa_claim_upload = data["userdata"].tpa_claim_upload;
                                    $("#tollfree_2").text(tollfree_no_2);

                                    var tpa_status = data["userdata"].tpa_status;

                                    var comman_address = address + " , " + state + " , " + city + " , " + zipcode;
                                    $("#address").text(comman_address);
                                    if (!isNaN(tpa_id)) {
                                        if (tpa_status == 1) {
                                            var status = "fa fa-toggle-on";
                                            var status_btn_txt = "btn btn-outline-success waves-effect waves-light btn-xs edit";
                                        } else {
                                            var status = "fa fa-toggle-off";
                                            var status_btn_txt = "btn btn-outline-danger waves-effect waves-light btn-xs edit";
                                        }

                                        if (tpa_claim_upload == "" || tpa_claim_upload == null || tpa_claim_upload == undefined) {
                                            var view_tpa_claim_upload = "";
                                            var download_tpa_claim_upload = "";
                                            var delete_tpa_claim_upload = "";
                                        } else if (tpa_claim_upload != "") {
                                            var view_tpa_claim_upload = "<a href='<?php echo base_url(); ?>master/tpa/view_doc/1/" + tpa_id + "/" + tpa_claim_upload + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                            var download_tpa_claim_upload = "<a href='<?php echo base_url(); ?>master/tpa/download_doc/1/" + tpa_id + tpa_id + "/" + tpa_claim_upload + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                            var delete_tpa_claim_upload = "<a onclick=OnDelete_Doc('" + tpa_id + ',' + 1 + ',' + tpa_claim_upload + ',' + '<?php echo base_url(); ?>master/tpa/delete_doc' + "') href='#'  class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></b></a>";
                                        }
                                        // alert(tpa_claim_upload);
                                        $("#tpa_claim_upload_details").html(view_tpa_claim_upload + "&nbsp;&nbsp;&nbsp;" + download_tpa_claim_upload + "&nbsp;&nbsp;&nbsp;" + delete_tpa_claim_upload);

                                        var edit_btn = " <a id='edit' href='<?php echo base_url() . "master/tpa/edit_tpa/"; ?>" + tpa_id + "' class='btn btn-facebook btn-xs mr-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a><button id='delete' onclick='OnDelete(" + tpa_id + ")' class='btn btn-danger btn-xs mr-1 delete'><i class='fa fa-trash'></i></button><button id='recover' onclick='OnRecover(" + tpa_id + ")' class='btn btn-success btn-xs mr-1' style='display:none;'><i class='fa fa-undo'></i></button>";
                                        var status_btn = "<button class='" + status_btn_txt + "  mr-1' id='status_btn_" + tpa_id + "' value='' type='button' onClick ='updateStatus(" + tpa_id + "," + tpa_status + ")' ><i class='" + status + "'></i></button>";
                                        var back_btn = '<a href="<?php echo base_url() . "master/tpa"; ?>" class="btn btn-secondary waves-effect btn-xs">Back</a>';
                                        $("#btn_details").append(edit_btn + status_btn + back_btn);

                                        if (tpa_del_flag == 0) {
                                            $("#recover").show();
                                            $("#delete").hide();
                                        } else {
                                            $("#delete").show();
                                            $("#recover").hide();
                                        }

                                    }
                                }

                            },
                            error: function(request, status, error) {
                                alert(request.responseText);
                            }
                        });
                    }
                }

                function OnRecover(tpa_id) {
                    var url = "<?php echo $base_url; ?>master/tpa/recover_tpa";
                    confirmation_alert(id = tpa_id, url = url, title = "TPA Details", type = "Recover");
                }

                function OnDelete(tpa_id) {
                    var url = "<?php echo $base_url; ?>master/tpa/remove_tpa";
                    confirmation_alert(id = tpa_id, url = url, title = "TPA Details", type = "Delet");
                }

                function updateStatus(tpa_id, tpa_status) {

                    var url = "<?php echo $base_url; ?>master/tpa/update_tpa_status";

                    if (tpa_id != "") {

                        $.ajax({
                            url: url,
                            data: {
                                "id": tpa_id,
                                "status": tpa_status
                            },
                            type: 'POST',
                            //dataType : 'json',
                            success: function(data) {
                                var data = JSON.parse(data);
                                var status = "";
                                var update_style = "";
                                $("#status_btn_" + tpa_id).text("");
                                if (data["status"] == true) {
                                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1000);
                                    if (data["userdata"]["tpa_status"] == 1) {
                                        status = "In-Active";
                                        var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                                        $("#edit_" + tpa_id).addClass(status_btn_txt);
                                        $("#status_btn_" + tpa_id).text(status);
                                    } else {
                                        status = "Active";
                                        var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                                        $("#edit_" + tpa_id).addClass(status_btn_txt);
                                        $("#status_btn_" + tpa_id).text(status);
                                    }

                                    $("#status_btn_" + tpa_id).text(status);


                                    $('#status_btn_' + staff_id).attr('onClick', 'updateStatus(' + staff_id + ',' + data["userdata"]["menu_status"] + ')');


                                } else {
                                    toaster(message_type = "Error", message_txt = data["message"], message_icone = "error");
                                }

                            },
                            error: function(xhr, status) {
                                alert('Sorry, there was a problem!');
                            }

                        });
                    }
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