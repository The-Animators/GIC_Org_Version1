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
                        <h4 class="page-title">Claim Document</h4>
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
                            <h4 class="modal-title">Claim Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="company" class="col-form-label col-md-4 text-right">Company<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="company" id="company" class="form-control">
                                                        <option value="null">Select Company</option>
                                                        <?php $company = company_dropdown();
                                                        if (!empty($company)) : foreach ($company as $row) : ?>
                                                                <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo $row["company_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="company_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="department" class="col-form-label col-md-4 text-right">Department<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="department" id="department" class="form-control" onchange="departmentBasedPolicy()">
                                                        <option value="null">Select Department</option>
                                                        <?php $department = department_dropdown();
                                                        if (!empty($department)) : foreach ($department as $row) : ?>
                                                                <option value="<?php echo $row["department_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="department_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_name" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="policy_name" id="policy_name" class="form-control">
                                                        <option value="null">Select Policy Name</option>
                                                        <?php $policy_name = policy_type_dropdown();
                                                        if (!empty($policy_name)) : foreach ($policy_name as $row) : ?>
                                                                <option value="<?php echo $row["policy_type_id"]; ?>"><?php echo $row["policy_type"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="policy_name_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-8 m-b-1">
                                            <button type="button" class="btn btn-success waves-effect waves-light btn-sm" id="add_Claim" onclick="claim_add()">Add Claim</button>
                                        </div> -->
                                    </div>

                                    <!-- <div class="form-row" style="display:none;" id="claim_detail_div"> -->
                                    <div class="form-row" id="claim_detail_div">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="claim_date" class="col-form-label col-md-4 text-right">Claim Date<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="claim_date" id="claim_date" value="" placeholder="Enter Short Name" class="form-control claim_date">
                                                    <span id="claim_date_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="claim_upload" class="col-form-label col-md-4 text-right">Claim Upload<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="claim_upload" id="claim_upload" class="form-control filestyle claim_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_claim_upload()">
                                                    <span id="claim_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="claim_doc_reason" class="col-form-label col-md-2 text-right">Claim Remark</label>
                                                <div class="col-md-10">
                                                    <textarea rows="3" name="claim_doc_reason" id="claim_doc_reason" value="" placeholder="Enter Claim Remark" class="form-control claim_doc_reason"></textarea>
                                                    <span id="claim_doc_reason_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="plans_policy_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button onclick='update_claim_upload()' class="btn btn-primary btn-sm mt-2">Save Claim</button>
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
                            <div class="col-md-4">
                                <h4 class="header-title">Claim Document List <span id="member_list_count"></span></h4>

                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <input class='btn btn-facebook btn-sm' id='AddForm' value=' Add Claim' type='button' />
                            </div>

                        </div>

                        <p class="sub-header">

                        </p>

                        <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th width="5%">Action</th>
                                    <!-- <th>SN</th> -->
                                    <th width="10%">Company</th>
                                    <th width="10%">Remark</th>
                                    <th width="10%">Claim Uploaded</th>
                                    <th>Claim Date</th>
                                    <th>Department</th>
                                    <th>Policy</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Action</th>
                                    <!-- <th>SN</th> -->
                                    <th>Company</th>
                                    <th>Remark</th>
                                    <th>Claim Uploaded</th>
                                    <th>Claim Date</th>
                                    <th>Department</th>
                                    <th>Policy</th>
                                </tr>
                            </tfoot>
                            <tbody id="tableData">

                            </tbody>
                        </table>
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
    function departmentBasedPolicy() {
        var department = $("#department").val();
        // alert(department);
        var url = "<?php echo $base_url; ?>master/plans_policy/department_based_policy";

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
                    var option_val = "";
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                        for (var i = 0; i < val.length; i++) {
                            var policy_type_id = val[i]["policy_type_id"];
                            var policy_type = val[i]["policy_type"];
                            option_val += '<option value=' + policy_type_id + '>' + policy_type + '</option>';
                        }
                    } else {
                        $('#policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
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
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#document_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#document_name").removeClass("parsley-error");
        $("#document_name_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#document_id").text("");
        $("#document_name").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(member_id) {
        // var document_id = $("#document_id").text();
        var url = "<?php echo $base_url; ?>member/recover_member";
        confirmation_alert(id = member_id, url = url, title = "Member", type = "Recover");
    }

    function OnDelete(member_id) {
        // var document_id = $("#document_id").text();
        var url = "<?php echo $base_url; ?>member/remove_member";
        confirmation_alert(id = member_id, url = url, title = "Member", type = "Delet");
    }


    get_claim_doc_list();

    function get_claim_doc_list() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>member/get_claim_doc_list";
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
                    if (data["status"] == true) {
                        var view_btn = "";
                        var status_btn = "";
                        var member_id = "";
                        var member_name = "";
                        var member_contact = "";
                        var dob = "";
                        var document = [];
                        var member_email = "";
                        var group_name = "";
                        var member_status = "";
                        var del_flag = "";
                        var datas = "";
                        var status = "";

                        // alert(data["count_member"]);
                        $("#member_list_count").text(" Count (" + data["count_doc"] + ")");
                        var claim_doc_val = data["userdata"];
                        $("#tableData").empty();
                        var append_claim_doc = "";
                        var count = 1;
                        // alert(claim_doc_val);
                        $.each(claim_doc_val, function(key, val) {
                            var claim_doc_id = claim_doc_val[key].claim_doc_id;
                            var claim_doc_date = claim_doc_val[key].claim_doc_date;
                            var claim_doc_name = claim_doc_val[key].claim_doc_name;
                            var claim_doc_reason = claim_doc_val[key].claim_doc_reason;
                            var claim_doc_status = claim_doc_val[key].claim_doc_status;
                            var claim_doc_del_flag = claim_doc_val[key].claim_doc_del_flag;
                            // claim_doc_name = claim_doc_name.substr(0, 10);
                            var company_name = claim_doc_val[key].company_name;
                            var department_name = claim_doc_val[key].department_name;
                            var policy_name = claim_doc_val[key].policy_name;

                            if (company_name == "" || company_name == "null" || company_name == undefined || company_name == null)
                                company_name = "NA";

                            if (department_name == "" || department_name == "null" || department_name == undefined || department_name == null)
                                department_name = "NA";

                            if (policy_name == "" || policy_name == "null" || policy_name == undefined || policy_name == null)
                                policy_name = "NA";

                            var disabled = "";
                            var delete_claim_doc = "";
                            if (claim_doc_reason == "" || claim_doc_reason == "null" || claim_doc_reason == undefined || claim_doc_reason == null)
                                claim_doc_reason = "NA";

                            if (claim_doc_del_flag == 1) {
                                var del_status = "Delete";
                                disabled = "";
                                delete_claim_doc = "<button class='btn btn-outline-danger waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='On_claim_doc_Delete(" + claim_doc_id + "," + claim_doc_del_flag + ")'   id='common_del_cir_doc_" + claim_doc_id + "'>Delete</button>";
                            } else if (claim_doc_del_flag == 0) {
                                disabled = "disabled";
                                var del_status = "Recover";
                                // $("#claim_doc_count_" + claim_doc_id);
                                // $("#claim_doc_date_" + claim_doc_id);
                                // $("#claim_doc_name_" + claim_doc_id);
                                // $("#claim_doc_reason_" + claim_doc_id);
                                delete_claim_doc = "<button onclick='On_claim_doc_Recover(" + claim_doc_id + "," + claim_doc_del_flag + ")' class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete' id='common_del_cir_doc_" + claim_doc_id + "' >Recover</button>";
                            }

                            // alert(disabled);
                            // alert(claim_doc_del_flag);
                            // alert(claim_doc_del_flag);
                            // alert(delete_claim_doc);
                            if (claim_doc_name == "" || claim_doc_name == "null" || claim_doc_name == null || claim_doc_name == undefined) {
                                var view_claim_doc = "";
                                var download_claim_doc = "";
                            } else if (claim_doc_name != "") {
                                var view_claim_doc = "<a href='<?php echo base_url(); ?>member/view_all_doc/2/" + claim_doc_id +"/"+claim_doc_name+"'  class='btn btn-outline-primary waves-effect width-md waves-light btn-sm mt-1 delete' id='view_claim_doc_" + claim_doc_id + "' ><b>View</b></a>";
                                var download_claim_doc = "<a href='<?php echo base_url(); ?>member/download_all_doc/2/" + claim_doc_id +"/"+claim_doc_name+"' class='btn btn-outline-primary waves-effect width-md waves-light btn-sm mt-1 delete' id='download_claim_doc_" + claim_doc_id + "'><b>Download</b></a>";
                            }
                            claim_doc_btn = delete_claim_doc + "<br/>" + view_claim_doc + " <br/>" + download_claim_doc;
                            // alert(claim_doc_btn);claim_doc_reason_
                            append_claim_doc += '<tr id="claim_doc_strike_' + claim_doc_id + '"><td>' + claim_doc_btn + '</td><td><span id="company_name_' + claim_doc_id + '">' + company_name + '</span></td><td ><span id="claim_doc_reason_' + claim_doc_id + '">' + claim_doc_reason + '</span></td><td ><a href="<?php echo base_url(); ?>member/view_all_doc/2/' + claim_doc_id +"/"+claim_doc_name+'" ><span id="claim_doc_name_' + claim_doc_id + '" class="mdi mdi-file-pdf" style="font-size: 30px;color:red;" title="' + claim_doc_name + '"></span></a></td><td><span id="claim_doc_date_' + claim_doc_id + '">' + claim_doc_date + '</span></td><td><span id="department_name_' + claim_doc_id + '">' + department_name + '</span></td><td><span id="policy_name_' + claim_doc_id + '">' + policy_name + '</span></td></tr>';
                            // append_claim_doc += '<tr id="claim_doc_strike_' + claim_doc_id + '"><td>' + claim_doc_btn + '</td><td>' + company_name + '</td><td >' + claim_doc_reason + '</td><td >' + claim_doc_name + '</td><td>' + claim_doc_date + '</td><td>' + department_name + '</td><td>' + policy_name + '</span></td></tr>';
                            count++;
                            // $("#claim_doc_name_" + claim_doc_id ).replace("_",'<br/>');
                        });
                        $("#tableData").append(append_claim_doc);
                       
                        $.each(claim_doc_val, function(key, val) {
                            var claim_doc_id = claim_doc_val[key].claim_doc_id;
                            var claim_doc_del_flag = claim_doc_val[key].claim_doc_del_flag;
                            if (claim_doc_del_flag == 0) {
                                $("#claim_doc_count_" + claim_doc_id).wrap("<strike>");
                                $("#claim_doc_date_" + claim_doc_id).wrap("<strike>");
                                $("#claim_doc_name_" + claim_doc_id).wrap("<strike>");
                                $("#claim_doc_reason_" + claim_doc_id).wrap("<strike>");

                                $("#company_name_" + claim_doc_id).wrap("<strike>");
                                $("#department_name_" + claim_doc_id).wrap("<strike>");
                                $("#policy_name_" + claim_doc_id).wrap("<strike>");

                                $("#view_claim_doc_" + claim_doc_id).hide();
                                $("#download_claim_doc_" + claim_doc_id).hide();
                            } else {
                                $("#view_claim_doc_" + claim_doc_id).show();
                                $("#download_claim_doc_" + claim_doc_id).show();
                            }
                        });
                        // $("table #datatable th").attr("style","");
                        // $("table #datatable th").attr("style","width:100px;");
                        // $("table #datatable th").removeAttr("style");​
                                          // $("table #datatable th").attr("style","");​
                                          $("table #datatable th" ).removeAttr("style");
                        // $("table #datatable th" ).css("width:", "")
                    } else {
                        datas = '<tr><td colspan="4"><center>Data Not Found</center></td> </tr>';
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function claim_add() {
        $("#add_Claim").hide();
        $("#claim_detail_div").show();
    }

    function check_claim_upload() {
        var ext = $('#claim_upload').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            toaster(message_type = "Error", message_txt = "Please Select Only PDF And Image Document Only.", message_icone = "error");
            // alert('invalid extension!');
            var attr = $('#upload').attr('disabled');
            // alert(attr);
            if (attr == undefined || attr == false) {
                // alert("NO");
                $('#upload').attr("disabled", true);
            }
        } else {
            $('#upload').removeAttr('disabled');
        }
    }

    function update_claim_upload() {
        var company = $("#company").val();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();

        var company_name_txt = $("#company option:selected").text();
        var department_name_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();

        var claim_date = $("#claim_date").val();
        var claim_upload = $('#claim_upload').prop('files')[0];
        var claim_doc_reason = $("#claim_doc_reason").val();

        if (claim_upload == undefined || claim_upload == "") {
            toaster(message_type = "Error", message_txt = "Please Select Claim Upload File!", message_icone = "error");
            return false;
        }
        if (claim_date == undefined || claim_date == "") {
            toaster(message_type = "Error", message_txt = "Please Select Claim Date File!", message_icone = "error");
            return false;
        }
        // alert(claim_upload);

        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        var form_data = new FormData();
        form_data.append('company', company);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);

        form_data.append('company_name_txt', company_name_txt);
        form_data.append('department_name_txt', department_name_txt);
        form_data.append('policy_name_txt', policy_name_txt);

        form_data.append('claim_date', claim_date);
        form_data.append('claim_upload', claim_upload);
        form_data.append('claim_doc_reason', claim_doc_reason);

        var url = "<?php echo $base_url; ?>member/update_claim_upload";

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
                    // $("#company").val("null");
                    // $("#department").val("null");
                    // $("#policy_name").val("null");
                    // $("#policy_type").val("");
                    // $("#document_list").val("null");
                    $("#claim_upload").val("");
                    $("#claim_doc_reason").val("");

                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    get_claim_doc_list();
                } else {
                    if (data["messages"] != "") {

                        if (data["messages"]["claim_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["claim_upload_err"], message_icone = "error");
                        if (data["messages"]["claim_upload_err"] != "")
                            $("#claim_upload").addClass("parsley-error");
                        else
                            $("#claim_upload").removeClass("parsley-error");
                        $("#claim_upload_err").addClass("text-danger").html(data["messages"]["claim_upload_err"]);

                    } else {
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
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function On_claim_doc_Recover(claim_doc_id, claim_doc_del_flag) {
        var url = "<?php echo $base_url; ?>member/recover_claim_doc";
        Sweet_confirmation_alert(id = claim_doc_id, status = claim_doc_del_flag, url = url, title = "Claim Document", type = "Recover");
    }

    function On_claim_doc_Delete(claim_doc_id, claim_doc_del_flag) {
        var url = "<?php echo $base_url; ?>member/remove_claim_doc";
        Sweet_confirmation_alert(id = claim_doc_id, status = claim_doc_del_flag, url = url, title = "Claim Document", type = "Delet");
    }

    function Sweet_confirmation_alert(id = "", status = "", url = "", title = "", type = "") {
        swal.fire({
            title: "Are you sure to " + type + "e This " + title + " ",
            text: "Would you like to proceed ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        }).
        then(function(t) {
            // alert(t.value);
            if (t.value == true) {
                $.ajax({
                    url: url,
                    data: {
                        id: id
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {

                    },
                    success: function(data) {
                        if (data["status"] == true) {
                            swal.fire(title + " " + type + "ed Successfully! ", {
                                icon: "success",
                                type: "success",
                                timer: 2000,
                            });
                            if (status == 1) {
                                status = 0;
                                $("#common_del_cir_doc_" + id).attr("onclick", "On_claim_doc_Recover(" + id + "," + status + ")");
                                $("#common_del_cir_doc_" + id).removeClass("btn btn-outline-danger waves-effect width-md waves-light btn-sm delete");
                                $("#common_del_cir_doc_" + id).addClass("btn btn-outline-primary waves-effect width-md waves-light btn-sm delete");
                                $("#common_del_cir_doc_" + id).text("");
                                $("#common_del_cir_doc_" + id).text("Recover");

                                $("#claim_doc_count_" + id).wrap("<strike>");
                                $("#claim_doc_date_" + id).wrap("<strike>");
                                $("#claim_doc_name_" + id).wrap("<strike>");
                                $("#claim_doc_reason_" + id).wrap("<strike>");

                                $("#company_name_" + id).wrap("<strike>");
                                $("#department_name_" + id).wrap("<strike>");
                                $("#policy_name_" + id).wrap("<strike>");

                                $("#view_claim_doc_" + id).hide();
                                $("#download_claim_doc_" + id).hide();
                            } else if (status == 0) {
                                status = 1;
                                $("#common_del_cir_doc_" + id).attr("onclick", "On_claim_doc_Delete(" + id + "," + status + ")");
                                $("#common_del_cir_doc_" + id).removeClass("btn btn-outline-primary waves-effect width-md waves-light btn-sm delete");
                                $("#common_del_cir_doc_" + id).addClass("btn btn-outline-danger waves-effect width-md waves-light btn-sm delete");
                                $("#common_del_cir_doc_" + id).text("");
                                $("#common_del_cir_doc_" + id).text("Delete");
                                var span_Tags = $("span");
                                if ($("#claim_doc_count_" + id).parent().is("strike")) {
                                    $("#claim_doc_count_" + id).unwrap();
                                }
                                if ($("#claim_doc_date_" + id).parent().is("strike")) {
                                    $("#claim_doc_date_" + id).unwrap();
                                }
                                if ($("#claim_doc_name_" + id).parent().is("strike")) {
                                    $("#claim_doc_name_" + id).unwrap();
                                }
                                if ($("#claim_doc_reason_" + id).parent().is("strike")) {
                                    $("#claim_doc_reason_" + id).unwrap();
                                }
                                if ($("#company_name_" + id).parent().is("strike")) {
                                    $("#company_name_" + id).unwrap();
                                }
                                if ($("#department_name_" + id).parent().is("strike")) {
                                    $("#department_name_" + id).unwrap();
                                }
                                if ($("#policy_name_" + id).parent().is("strike")) {
                                    $("#policy_name_" + id).unwrap();
                                }

                                $("#view_claim_doc_" + id).show();
                                $("#download_claim_doc_" + id).show();

                            }
                        } else {
                            swal.fire("Error On Deleteing " + title + "!", {
                                icon: "danger",
                                type: "warning",
                                timer: 2000,
                            });
                        }
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            } else {
                swal.fire("Cancelled", "", "error");
            }

        })
    }

    $(document).ready(function() {
        var date = new Date();

        var day = ("0" + date.getDate()).slice(-2);
        var month = ("0" + (date.getMonth() + 1)).slice(-2);

        var today = date.getFullYear() + "-" + (month) + "-" + (day);
        $('#claim_date').val(today);
    });
</script>
<script>
    // $(document).ready(function() {
    //     var path = window.location.pathname;
    //     var page = path.split("/").pop();
    //     var user_role_id = <?php echo  $this->session->userdata("@_user_role_id"); ?>;
    //     var submenu_permission = "<?php echo $this->session->userdata("@_user_role_sub_menu_permission"); ?>";
    //     var role_permission = '<?php echo $this->session->userdata("@_staff_role_permission"); ?>';
    //     var url = '<?php echo base_url(); ?>login/logout';
    //     if ((user_role_id != 1) && (user_role_id != 2)) {
    //         var id = $("#submenu").data("value");
    //         if (id != "") {
    //             CheckFormAccess(submenu_permission, 7, url);
    //             check(role_permission, 7);
    //         }
    //     }
    // });
</script>