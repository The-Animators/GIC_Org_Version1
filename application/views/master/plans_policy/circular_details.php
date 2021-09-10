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
                        <h4 class="page-title">View <?php echo $title; ?></h4>
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
                                <h4 class="header-title"> Circular Document List</h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <!-- <input class='btn btn-facebook btn-xs' id='AddForm' value=' Add <?php echo $title; ?>' type='button' /> -->
                            </div>

                        </div>

                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN</th>
                                        <th>Circular Date</th>
                                        <th>Circular Uploaded</th>
                                        <th>Reason</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody id="append_circular_doc">

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
    function Circular_add() {
        $("#add_circular").hide();
        $("#circular_detail_div").show();
    }

    function check_circular_upload() {
        var ext = $('#circular_upload').val().split('.').pop().toLowerCase();
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

    function update_circular_upload() {
        var plans_policy_id = $("#plans_policy_id").text();
        var company = $("#company").val();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();
        var company_name_txt = $("#company option:selected").text();
        var department_name_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        var policy_type = $("#policy_type").val();
        var document_list = $("#document_list").val();
        var circular_date = $("#circular_date").val();
        var circular_upload = $('#circular_upload').prop('files')[0];
        if (circular_upload == undefined || circular_upload == "") {
            toaster(message_type = "Error", message_txt = "Please Select Circular Upload File!", message_icone = "error");
            return false;
        }
        if (circular_date == undefined || circular_date == "") {
            toaster(message_type = "Error", message_txt = "Please Select Circular Date File!", message_icone = "error");
            return false;
        }
        // alert(circular_upload);

        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        if (document_list == "null")
            document_list = "";

        var form_data = new FormData();
        form_data.append('plans_policy_id', plans_policy_id);
        form_data.append('company', company);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);

        form_data.append('company_name_txt', company_name_txt);
        form_data.append('department_name_txt', department_name_txt);
        form_data.append('policy_name_txt', policy_name_txt);

        form_data.append('policy_type', policy_type);
        form_data.append('document_list', document_list);

        form_data.append('circular_date', circular_date);
        form_data.append('circular_upload', circular_upload);

        var url = "<?php echo $base_url; ?>master/plans_policy/update_circular_upload";

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
                    $("#circular_upload").val("");

                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    $("#policy_type").removeClass("parsley-error");
                    $("#document_list").removeClass("parsley-error");
                    get_circular_doc();
                } else {
                    if (data["messages"] != "") {

                        if (data["messages"]["circular_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["circular_upload_err"], message_icone = "error");
                        if (data["messages"]["circular_upload_err"] != "")
                            $("#circular_upload").addClass("parsley-error");
                        else
                            $("#circular_upload").removeClass("parsley-error");
                        $("#circular_upload_err").addClass("text-danger").html(data["messages"]["circular_upload_err"]);

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

                        if (data["message"]["document_liste_err"] != "")
                            $("#document_list").addClass("parsley-error");
                        else
                            $("#document_list").removeClass("parsley-error");
                        $("#document_list_err").addClass("text-danger").html(data["message"]["document_liste_err"]);

                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
    get_circular_doc();

    function get_circular_doc() {
        var plans_policy_id = <?php echo $plans_policy_id; ?>;
        // alert(plans_policy_id);
        var url = "<?php echo $base_url; ?>master/plans_policy/get_circular_doc_list";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    plans_policy_id: plans_policy_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var circular_doc_val = data["userdata"];
                        $("#append_circular_doc").empty();
                        var append_circular_doc = "";
                        var count = 1;
                        // alert(circular_doc_val);
                        $.each(circular_doc_val, function(key, val) {
                            var circular_doc_id = circular_doc_val[key].circular_doc_id;
                            var circular_doc_date = circular_doc_val[key].circular_doc_date;
                            var circular_doc_name = circular_doc_val[key].circular_doc_name;
                            var circular_doc_reason = circular_doc_val[key].circular_doc_reason;
                            var circular_doc_status = circular_doc_val[key].circular_doc_status;
                            var circular_doc_del_flag = circular_doc_val[key].circular_doc_del_flag;
                            var disabled = "";
                            var delete_circular_doc = "";
                            if (circular_doc_reason == "" || circular_doc_reason == "null" || circular_doc_reason == undefined || circular_doc_reason == null)
                                circular_doc_reason = "NA";

                            // if (circular_doc_del_flag == 1) {
                            //     var del_status = "Delete";
                            //     disabled = "";
                            //     delete_circular_doc = "<a class='dropdown-item recover' href='javascript:void(0);' id='common_del_cir_doc_" + circular_doc_id + "' onClick='On_Circular_doc_Delete(" + plans_policy_id + ")'><b>Delete</b></a>";
                            // } else if (circular_doc_del_flag == 0) {
                            //     disabled = "disabled";
                            //     var del_status = "Recover";

                            //     delete_circular_doc = "<a class='dropdown-item recover' href='javascript:void(0);' id='common_del_cir_doc_" + circular_doc_id + "' onClick='On_Circular_doc_Recover(" + circular_doc_id + "," + circular_doc_del_flag + ")'><b>Recover</b></a>";
                            // }
                            // if (circular_doc_name == "" || circular_doc_name == "null" || circular_doc_name == null || circular_doc_name == undefined) {
                            //     var view_circular_doc = "";
                            //     var download_circular_doc = "";
                            // } else if (circular_doc_name != "") {
                            //     var view_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' class=' delete' id='view_circular_doc_" + circular_doc_id + "'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                            //     var download_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' class=' delete' id='download_circular_doc_" + circular_doc_id + "'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                            // }
                            // circular_doc_btn = delete_circular_doc + "&nbsp;&nbsp;&nbsp;" + view_circular_doc + "&nbsp;&nbsp;&nbsp;" + download_circular_doc;
                            // action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' id='view'><b>View Doc</b></a><a class='dropdown-item edit' href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' id='edit'><b>Download Doc</b></a>" + delete_circular_doc + "</div></div>";


                            if (circular_doc_del_flag == 1) {
                                var del_status = "Delete";
                                disabled = "";
                                delete_circular_doc = "<button class='btn btn-outline-danger waves-effect waves-light btn-xs delete' value='' type='button' onClick ='On_Circular_doc_Delete(" + circular_doc_id + "," + circular_doc_del_flag + ")'   id='common_del_cir_doc_" + circular_doc_id + "'><i class='fa fa-trash'></i></button>";
                            } else if (circular_doc_del_flag == 0) {
                                disabled = "disabled";
                                var del_status = "Recover";
                                // $("#circular_doc_count_" + circular_doc_id);
                                // $("#circular_doc_date_" + circular_doc_id);
                                // $("#circular_doc_name_" + circular_doc_id);
                                // $("#circular_doc_reason_" + circular_doc_id);
                                delete_circular_doc = "<button onclick='On_Circular_doc_Recover(" + circular_doc_id + "," + circular_doc_del_flag + ")' class='btn btn-outline-primary waves-effect waves-light btn-xs delete' id='common_del_cir_doc_" + circular_doc_id + "' ><i class='fa fa-undo'></i></button>";
                            }

                            // alert(disabled);
                            // alert(circular_doc_del_flag);
                            // alert(circular_doc_del_flag);
                            // alert(delete_circular_doc);
                            if (circular_doc_name == "" || circular_doc_name == "null" || circular_doc_name == null || circular_doc_name == undefined) {
                                var view_circular_doc = "";
                                var download_circular_doc = "";
                            } else if (circular_doc_name != "") {
                                var view_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + plans_policy_id + "/" + circular_doc_id + "'  class='btn btn-outline-primary waves-effect waves-light btn-xs delete' id='view_circular_doc_" + circular_doc_id + "' ><button type='button'><b><i class='fas fa-eye'></i></b></button> </a>";
                                var download_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + plans_policy_id + "/" + circular_doc_id + "' class='btn btn-outline-primary waves-effect waves-light btn-xs delete' id='download_circular_doc_" + circular_doc_id + "'><button type='button'><b><i class='mdi mdi-cloud-download-outline'></i></b></button></a>";
                            }
                            circular_doc_btn = delete_circular_doc + " " + view_circular_doc + "  " + download_circular_doc;
                            // alert(circular_doc_btn);circular_doc_reason_
                            append_circular_doc += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)" id="circular_doc_strike_' + circular_doc_id + '"><td>' + circular_doc_btn + '</td><td scope="row"><span id="circular_doc_count_' + circular_doc_id + '">' + count + '</span></td><td><span id="circular_doc_date_' + circular_doc_id + '">' + circular_doc_date + '</span></td><td ><span id="circular_doc_name_' + circular_doc_id + '">' + circular_doc_name + '</span></td><td ><span id="circular_doc_reason_' + circular_doc_id + '">' + circular_doc_reason + '</span></td></tr>';
                            count++;
                        });
                        $("#append_circular_doc").append(append_circular_doc);

                        $.each(circular_doc_val, function(key, val) {
                            var circular_doc_id = circular_doc_val[key].circular_doc_id;
                            var circular_doc_del_flag = circular_doc_val[key].circular_doc_del_flag;
                            if (circular_doc_del_flag == 0) {
                                $("#circular_doc_count_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_date_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_name_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_reason_" + circular_doc_id).wrap("<strike>");

                                $("#view_circular_doc_" + circular_doc_id).hide();
                                $("#download_circular_doc_" + circular_doc_id).hide();
                            } else {
                                $("#view_circular_doc_" + circular_doc_id).show();
                                $("#download_circular_doc_" + circular_doc_id).show();
                            }
                        });
                    }

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });

        }
    }

    function On_Circular_doc_Recover(circular_doc_id, circular_doc_del_flag) {
        var url = "<?php echo $base_url; ?>master/plans_policy/recover_circular_doc";
        Sweet_confirmation_alert(id = circular_doc_id, status = circular_doc_del_flag, url = url, title = "Circular Document", type = "Recover");
    }

    function On_Circular_doc_Delete(circular_doc_id, circular_doc_del_flag) {
        var url = "<?php echo $base_url; ?>master/plans_policy/remove_circular_doc";
        Sweet_confirmation_alert(id = circular_doc_id, status = circular_doc_del_flag, url = url, title = "Circular Document", type = "Delet");
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
                                $("#common_del_cir_doc_" + id).attr("onclick", "On_Circular_doc_Recover(" + id + "," + status + ")");
                                $("#common_del_cir_doc_" + id).removeClass("btn btn-outline-danger waves-effect waves-light btn-xs delete");
                                $("#common_del_cir_doc_" + id).addClass("btn btn-outline-primary waves-effect waves-light btn-xs delete");
                                $("#common_del_cir_doc_" + id).text("");
                                $("#common_del_cir_doc_" + id).text("Recover");

                                $("#circular_doc_count_" + id).wrap("<strike>");
                                $("#circular_doc_date_" + id).wrap("<strike>");
                                $("#circular_doc_name_" + id).wrap("<strike>");
                                $("#circular_doc_reason_" + id).wrap("<strike>");

                                $("#view_circular_doc_" + id).hide();
                                $("#download_circular_doc_" + id).hide();
                            } else if (status == 0) {
                                status = 1;
                                $("#common_del_cir_doc_" + id).attr("onclick", "On_Circular_doc_Delete(" + id + "," + status + ")");
                                $("#common_del_cir_doc_" + id).removeClass("btn btn-outline-primary waves-effect waves-light btn-xs delete");
                                $("#common_del_cir_doc_" + id).addClass("btn btn-outline-danger waves-effect waves-light btn-xs delete");
                                $("#common_del_cir_doc_" + id).text("");
                                $("#common_del_cir_doc_" + id).text("Delete");
                                var span_Tags = $("span");
                                if ($("#circular_doc_count_" + id).parent().is("strike")) {
                                    $("#circular_doc_count_" + id).unwrap();
                                }
                                if ($("#circular_doc_date_" + id).parent().is("strike")) {
                                    $("#circular_doc_date_" + id).unwrap();
                                }
                                if ($("#circular_doc_name_" + id).parent().is("strike")) {
                                    $("#circular_doc_name_" + id).unwrap();
                                }
                                if ($("#circular_doc_reason_" + id).parent().is("strike")) {
                                    $("#circular_doc_reason_" + id).unwrap();
                                }

                                $("#view_circular_doc_" + id).show();
                                $("#download_circular_doc_" + id).show();

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
</script>
<script>
    $(document).ready(function() {
        var date = new Date();

        var day = ("0" + date.getDate()).slice(-2);
        var month = ("0" + (date.getMonth() + 1)).slice(-2);

        var today = date.getFullYear() + "-" + (month) + "-" + (day);
        $('#circular_date').val(today);
    });
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
                CheckFormAccess(submenu_permission, 9, url);
                check(role_permission, 9);
            }
        }
    });
</script>