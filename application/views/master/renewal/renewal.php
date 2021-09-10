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
            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Renewal Premium Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="basic_sum_insured" class="col-form-label col-md-4 text-right">Total Sum Insured<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="basic_sum_insured" id="basic_sum_insured" value="" placeholder="Enter Total Sum Insured" class="form-control">
                                                    <span id="basic_sum_insured_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="basic_gross_premium" class="col-form-label col-md-4 text-right">Total Premium<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="basic_gross_premium" id="basic_gross_premium" value="" placeholder="Enter Total Premium" class="form-control">
                                                    <span id="basic_gross_premium_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="policy_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onPremium_Update()' style="display: none;" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>
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

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_policy_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <!-- <input class='btn btn-facebook btn-sm' id='AddForm' value='Add <?php echo $title; ?>' type='button' />  -->
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>

                        </div>

                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th>Serial No.</th>
                                        <th>Group Name</th>
                                        <th>Policy Holder Name</th>
                                        <th>Department</th>
                                        <th>Policy Type</th>
                                        <th>Policy No.</th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Sum Insured</th>
                                        <th>Premium</th>
                                        <th>Policy PDF</th>
                                        <th>Company</th>
                                    </tr>
                                </thead>
                                <tbody id="tableData">

                                </tbody>
                            </table>
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
    getPOLICYList();

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
        if (doc_type == 1)
            var title = "Policy Upload Document";
        else if (doc_type == 2)
            var title = "Quotation Upload Document";
        document_confirmation_alert(id = policy_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    function getPOLICYList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/renewal/get_renewal_policy_list";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    console.log(data);
                    var total_policy_data = 0;
                    $("#total_policy_data").text("");
                    if (data["status"] == true) {
                        var view_btn = "";
                        var edit_btn = "";
                        var status_btn = "";

                        var datas = "";

                        var status = "";
                        var policy_id = "";
                        var serial_no = "";
                        var policy_member_status = "";
                        var company_name = "";
                        var department_name = "";
                        var policy_type_tit = "";
                        var policy_type_title = "";
                        var member_name = "";
                        var master_agency_code = "";
                        var sub_agent_code = "";
                        var grpname = "";
                        var policy_type = "";
                        var mode_of_premimum = "";
                        var date_from = "";
                        var date_to = "";
                        var payment_date_from = "";
                        var payment_date_to = "";
                        var policy_no = "";
                        var date_commenced = "";
                        var policy_upload = "";
                        var reg_mobile = "";
                        var reg_email = "";

                        total_policy_data = data["total_policy_data"];
                        $("#total_policy_data").text(" Count ( " + total_policy_data + " ) ");

                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_id = parseInt(data[key].policy_id);
                            var serial_no_year = data[key].serial_no_year;
                            var serial_no_month = data[key].serial_no_month;
                            serial_no = data[key].serial_no;

                            var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                            company_name = data[key].company_name;
                            department_name = data[key].department_name;
                            policy_type_title = data[key].policy_type_title;
                            member_name = data[key].member_name;

                            // master_agency_code = data[key].master_agency_code;
                            // sub_agent_code = data[key].sub_agent_code;
                            grpname = data[key].grpname;
                            policy_type = data[key].policy_type;
                            mode_of_premimum = data[key].mode_of_premimum;
                            date_from = data[key].date_from;
                            date_to = data[key].date_to;
                            // alert(date_to);
                            payment_date_from = data[key].payment_date_from;
                            payment_date_to = data[key].payment_date_to;
                            policy_no = data[key].policy_no;
                            date_commenced = data[key].date_commenced;
                            policy_upload = data[key].policy_upload;
                            reg_mobile = data[key].reg_mobile;
                            reg_email = data[key].reg_email;
                            var grpname = data[key].grpname;
                            var sum_insured = data[key].basic_sum_insured;
                            if (sum_insured == undefined || sum_insured == null || sum_insured == "null" || sum_insured == "undefined" || sum_insured == "") {
                                sum_insured = "0";
                            }
                            var gross_premium = data[key].basic_gross_premium;
                            // alert(gross_premium);
                            if (gross_premium == undefined || gross_premium == null || gross_premium == "null" || gross_premium == "undefined" || gross_premium == "") {
                                gross_premium = "0";
                            }
                            var comission = data[key].plan_policy_commission;
                            if (comission == undefined || comission == null || comission == "null" || comission == "undefined" || comission == "") {
                                comission = "0";
                            }
                            var floater_policy_type = data[key].floater_policy_type;
                            master_agency_name = data[key].master_agency_name;
                            master_agency_code = data[key].master_agency_code;
                            sub_agent_name = data[key].sub_agent_name;
                            sub_agent_code = data[key].sub_agent_code;

                            if (master_agency_name == undefined || master_agency_name == null || master_agency_name == "null" || master_agency_name == "")
                                master_agency_name = "";
                            else
                                master_agency_name = master_agency_name;
                            policy_upload = data[key].policy_upload;

                            if (master_agency_code == undefined || master_agency_code == null || master_agency_code == "null" || master_agency_code == "")
                                master_agency_code = "";
                            else
                                master_agency_code = " ( " + master_agency_code + " )";

                            if (sub_agent_name == undefined || sub_agent_name == null || sub_agent_name == "null" || sub_agent_name == "")
                                sub_agent_name = "";
                            else
                                sub_agent_name = sub_agent_name;

                            if (sub_agent_code == undefined || sub_agent_code == null || sub_agent_code == "null" || sub_agent_code != "")
                                sub_agent_code = "";
                            else
                                sub_agent_code = " ( " + sub_agent_code + " )";

                            agency_name_code = master_agency_name + master_agency_code;
                            sub_agent_name_code = sub_agent_name + sub_agent_code;
                            // alert(floater_policy_type);
                            if (floater_policy_type == null || floater_policy_type == "" || floater_policy_type == "null")
                                floater_policy_type = "";
                            else
                                floater_policy_type = " ( " + floater_policy_type + " ) ";

                            if (mode_of_premimum == 1)
                                mode_of_premimum = "Monthly";
                            else if (mode_of_premimum == 2)
                                mode_of_premimum = "Quaterly";
                            else if (mode_of_premimum == 3)
                                mode_of_premimum = "Half-Yearly";
                            else if (mode_of_premimum == 4)
                                mode_of_premimum = "Yearly";
                            else if (mode_of_premimum == 5)
                                mode_of_premimum = "2 Year";
                            else if (mode_of_premimum == 6)
                                mode_of_premimum = "3 Year";
                            else if (mode_of_premimum == 7)
                                mode_of_premimum = "4 Year";
                            else if (mode_of_premimum == 8)
                                mode_of_premimum = "5 Year";
                            else if (mode_of_premimum == 9)
                                mode_of_premimum = "6 Year";
                            else if (mode_of_premimum == 10)
                                mode_of_premimum = "7 Year";
                            else if (mode_of_premimum == 11)
                                mode_of_premimum = "8 Year";
                            else if (mode_of_premimum == 12)
                                mode_of_premimum = "9 Year";
                            else if (mode_of_premimum == 13)
                                mode_of_premimum = "10 Year";

                            policy_member_status = data[key].policy_member_status;
                            var isActive = data[key].del_flag;
                            var dynamic_path = data[key].dynamic_path;

                            if (sub_agent_code == null)
                                sub_agent_code = "";

                            if (policy_type == 1)
                                policy_type_tit = "Individual";
                            else if (policy_type == 2)
                                policy_type_tit = "Floater";
                            else if (policy_type == 3)
                                policy_type_tit = "Residential & Commercial";
                            else if (policy_type == 4)
                                policy_type_tit = "Common Individual";
                            else if (policy_type == 5)
                                policy_type_tit = "Common Floater";

                            if (!isNaN(policy_id)) {
                                if (policy_member_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-facebook btn-xs  mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-facebook btn-xs  mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                }

                                if (policy_upload == "") {
                                    var view_policy_upload = "";
                                    var download_policy_upload = "";
                                    var delete_policy_upload = "";
                                } else if (policy_upload != "") {
                                    var view_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/1/" + policy_id + "'  class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/1/" + policy_id + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_policy_upload = "<a onclick=OnDelete_Doc('" + data["userdata"].policy_id + ',' + 1 + ',' + data["userdata"].policy_upload + ',' + '<?php echo base_url(); ?>master/policy/delete_doc' + "') href='#'  class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                // aler(download_policy_upload);
                                // aler(view_policy_upload);
                                var expiry_date = date_to;
                                var current_date = new Date().toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the ;
                                var renew_btn = "";
                                var intimation_btn = "";
                                // alert(expiry_date);
                                // alert(current_date);
                                // if (current_date <= expiry_date) {
                                //     renew_btn = "";
                                // } else {
                                // renew_btn = " <a id='renew' href='<?php echo base_url() . "master/renewal/renew_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mr-1 mt-1 edit' id='edit'>Renew</a>";
                                // intimation_btn = " <a id='renew' href='<?php echo base_url() . "master/renewal/reminder/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mr-1 mt-1 edit' id='edit'>View Letter</a>";

                                // }
                                // view_btn = " <a href='<?php echo base_url() . "master/policy/view_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mt-1 view' id='view'><i class='fas fa-eye'></i></a>";
                                // edit_btn = " <a href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mt-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_id + "' value='' type='button' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' >" + status + "</button>";
                                // edit_premium_btn = "<button class='btn btn-facebook btn-xs edit' id='edit' value='' type='button' onClick ='onEdit(" + policy_id + ")' >Update Premium</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "master/policy/view_policy/"; ?>" + policy_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' id='edit' ><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_id + "' href='javascript:void(0);' id='status_btn_" + policy_id + "' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "<a class='dropdown-item edit' href='javascript:void(0);' id='edit'  onClick ='onEdit(" + policy_id + ")'><b>Update Premium</b></a><a class='dropdown-item renew' href='<?php echo base_url() . "master/renewal/renew_policy/"; ?>" + policy_id + "' id='renew'><b>Renew</b><a class='dropdown-item view' href='<?php echo base_url() . "master/renewal/reminder/"; ?>" + policy_id + "' id='view'><b>View Letter</b></div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status+ '</td><td>' + sn + '</td><td>' + total_serial_no + '</td> <td>' + grpname + '</td> <td>' + member_name + '</td><td>' + department_name + '</td><td>' + policy_type_tit + floater_policy_type + '</td><td>' + policy_no + '</td><td>' + date_from + '</td><td>' + date_to + '</td><td>' + sum_insured + '</td><td>' + gross_premium + '</td><td>' + view_policy_upload + " " + download_policy_upload + " " + delete_policy_upload + '</td><td>' + company_name + '</td></tr>';
                            }
                        });

                    } else {
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="22"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function clearError() {
        $("#basic_sum_insured").removeClass("parsley-error");
        $("#basic_sum_insured_err").removeClass("text-danger").text("");

        $("#basic_gross_premium").removeClass("parsley-error");
        $("#basic_gross_premium_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#policy_id").text("");
        $("#basic_sum_insured").val("");
        $("#basic_gross_premium").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function onEdit(val) {
        clearError();
        $("#policy_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/renewal/edit_premium";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    policy_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    if (data["status"] == true) {
                        policy_id = data["userdata"].policy_id;
                        basic_sum_insured = data["userdata"].basic_sum_insured;
                        basic_gross_premium = data["userdata"].basic_gross_premium;
                        renewal_letter_premium_flag = data["userdata"].renewal_letter_premium_flag;

                        $("#policy_id").text(policy_id);
                        $("#basic_sum_insured").val(basic_sum_insured);
                        $("#basic_gross_premium").val(basic_gross_premium);

                        var isActive = data["userdata"].del_flag;

                        if (isActive == 0) {
                            $("#recover").show();
                            $("#update").hide();
                            $("#delete").hide();
                        } else {
                            $("#recover").hide();
                            $("#update").show();
                            $("#delete").show();
                        }
                        // document.getElementById("update").disabled = true;
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onPremium_Update() {
        var policy_id = $("#policy_id").text();
        var basic_sum_insured = $("#basic_sum_insured").val();
        var basic_gross_premium = $("#basic_gross_premium").val();

        var url = "<?php echo $base_url; ?>master/renewal/update_premium";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                policy_id: policy_id,
                basic_sum_insured: basic_sum_insured,
                basic_gross_premium: basic_gross_premium,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#basic_sum_insured").val("");
                    $("#basic_sum_insured").removeClass("parsley-error");
                    $("#basic_gross_premium").val("");
                    $("#basic_gross_premium").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["basic_sum_insured_err"] != "")
                        $("#basic_sum_insured").addClass("parsley-error");
                    else
                        $("#basic_sum_insured").removeClass("parsley-error");
                    $("#basic_sum_insured_err").addClass("text-danger").html(data["message"]["basic_sum_insured_err"]);

                    if (data["message"]["basic_gross_premium_err"] != "")
                        $("#basic_gross_premium").addClass("parsley-error");
                    else
                        $("#basic_gross_premium").removeClass("parsley-error");
                    $("#basic_gross_premium_err").addClass("text-danger").html(data["message"]["basic_gross_premium_err"]);

                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function updateStatus(policy_id, policy_member_status) {

        var url = "<?php echo $base_url; ?>master/policy/update_policy_member_status";

        if (policy_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": policy_id,
                    "status": policy_member_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + policy_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["policy_member_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + policy_id).addClass(status_btn_txt);
                            $("#status_btn_" + policy_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + policy_id).addClass(status_btn_txt);
                            $("#status_btn_" + policy_id).text(status);
                        }

                        $("#status_btn_" + policy_id).text(status);


                        $('#status_btn_' + policy_id).attr('onClick', 'updateStatus(' + policy_id + ',' + data["userdata"]["policy_member_status"] + ')');


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

    function OnRecover(policy_id) {
        var url = "<?php echo $base_url; ?>master/policy/recoverpolicy";
        confirmation_alert(id = policy_id, url = url, title = "<?php echo $title; ?>", type = "Recover");
    }

    function OnDelete(policy_id) {
        var url = "<?php echo $base_url; ?>master/policy/removepolicy";
        confirmation_alert(id = policy_id, url = url, title = "<?php echo $title; ?>", type = "Delet");
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
                CheckFormAccess(submenu_permission, 14, url);
                check(role_permission, 14);
            }
        }
    });
</script>