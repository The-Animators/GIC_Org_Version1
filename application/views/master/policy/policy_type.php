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
                            <h4 class="modal-title"><?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="department_name" class="col-form-label col-md-4 text-right">Department Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="department_name" id="department_name">
                                                        <option value="null">Select Department</option>
                                                        <?php if (!empty($department)) : foreach ($department as $row) : ?>
                                                                <option value="<?php echo $row["department_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <!-- <input type="text" name="department_name" id="department_name" value="" placeholder="Enter Department Name" class="form-control"> -->
                                                    <span id="department_name_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="policy_type" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="policy_type" id="policy_type" value="" placeholder="Enter Policy Name" class="form-control">
                                                    <span id="policy_type_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="policy_type_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update</button>
                                                <button id="submit" class="btn btn-primary btn-sm">Save</button>
                                                <!-- <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete <?php echo $title; ?></button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover <?php echo $title; ?></button> -->
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

            <div id="view_form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">View <?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Department Name :</td>
                                                <td><strong><span id="department_name_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Policy Name :</td>
                                                <td><strong><span id="policy_type_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <!-- <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="department_name" class="col-form-label col-md-4 text-right"><strong>Department Name : </strong></label>
                                                <div class="col-md-8 col-form-label" id="department_name_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="policy_type" class="col-form-label col-md-4 text-right"><strong>Policy Type Name : </strong></label>
                                                <div class="col-md-8 col-form-label" id="policy_type_det"></div>
                                            </div>
                                        </div>
                                    </div> -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="filter_form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Filter <?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-4 row">
                                            <label for="filter_department_name" class="col-form-label col-md-5 text-right">Department Name</label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="filter_department_name" id="filter_department_name">
                                                    <option value="null">Select Department</option>
                                                    <?php if (!empty($department)) : foreach ($department as $row) : ?>
                                                            <option value="<?php echo $row["department_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 row">
                                            <label for="filter_policy_type" class="col-form-label col-md-5 text-right">Policy Name</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="filter_policy_type" name="filter_policy_type" placeholder="Enter Policy Name">
                                            </div>
                                        </div>
                                        <div class="col-md-2 row">
                                            <label for="filter_status" class="col-form-label col-md-5 text-right">Status</label>
                                            <div class="col-md-7">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="null">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In-Active</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 row ml-2">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-2" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
                                        </div>
                                        <div class="col-md-4 text-right mt-1"></div>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_policytype_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <input class='btn btn-facebook btn-xs' id='AddForm' value='Add' type='button' />
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
                                        <th>
                                            <center>Department</center>
                                        </th>
                                        <th>
                                            <center>Policy Name</center>
                                        </th>
                                        <!-- <th>Policy Type Status</th>
                                        <th>Delete Status</th> -->
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
    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#policy_type').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#department_name').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#policy_type").removeClass("parsley-error");
        $("#policy_type_err").removeClass("text-danger").text("");
        $("#department_name").removeClass("parsley-error");
        $("#department_name_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#policy_type_id").text("");
        $("#policy_type").val("");
        $("#department_name").val("null");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(policy_type_id) {
        // var policy_type_id = $("#policy_type_id").text();
        var url = "<?php echo $base_url; ?>master/policy_type/recover_policy_type";
        confirmation_alert(id = policy_type_id, url = url, title = "Policy Type", type = "Recover");
    }

    function OnDelete(policy_type_id) {
        // var policy_type_id = $("#policy_type_id").text();
        var url = "<?php echo $base_url; ?>master/policy_type/remove_policy_type";
        confirmation_alert(id = policy_type_id, url = url, title = "Policy Type", type = "Delet");
    }

    function onView(val) {

        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/policy_type/edit_policy_type";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    policy_type_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#policy_type_det").text(data["userdata"].policy_type);
                    $("#department_name_det").text(data["userdata"].department_name);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {
        clearError();
        $("#policy_type_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/policy_type/edit_policy_type";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    policy_type_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    $("#policy_type_id").text(data["userdata"].policy_type_id);
                    $("#policy_type").val(data["userdata"].policy_type);
                    // $("#department_name").val(data["userdata"].fk_department_id);
                    $('select[id^="department_name"] option[value="' + data["userdata"].fk_department_id + '"]').attr("selected", "selected");

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
                    document.getElementById("update").disabled = true;

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onUpdate() {
        var policy_type_id = $("#policy_type_id").text();
        var policy_type = $("#policy_type").val();
        var department_name = $("#department_name").val();
        if (department_name == "null")
            department_name = "";

        var url = "<?php echo $base_url; ?>master/policy_type/update_policy_type";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                policy_type_id: policy_type_id,
                policy_type: policy_type,
                department_name: department_name,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#policy_type").val("");
                    $("#policy_type").removeClass("parsley-error");
                    $("#department_name").val("");
                    $("#department_name").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["policy_type_err"] != "")
                        $("#policy_type").addClass("parsley-error");
                    else
                        $("#policy_type").removeClass("parsley-error");
                    $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);
                    if (data["message"]["department_name_err"] != "")
                        $("#department_name").addClass("parsley-error");
                    else
                        $("#department_name").removeClass("parsley-error");
                    $("#department_name_err").addClass("text-danger").html(data["message"]["department_name_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var policy_type = $("#policy_type").val();
        var department_name = $("#department_name").val();
        if (department_name == "null")
            department_name = "";
        var url = "<?php echo $base_url; ?>master/policy_type/add_policy_type";

        $.ajax({
            url: url,
            data: {
                policy_type: policy_type,
                department_name: department_name,
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
                    $("#policy_type").val("");
                    $("#policy_type").removeClass("parsley-error");
                    $("#department_name").val("");
                    $("#department_name").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["policy_type_err"] != "")
                        $("#policy_type").addClass("parsley-error");
                    else
                        $("#policy_type").removeClass("parsley-error");
                    $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);
                    if (data["message"]["department_name_err"] != "")
                        $("#department_name").addClass("parsley-error");
                    else
                        $("#department_name").removeClass("parsley-error");
                    $("#department_name_err").addClass("text-danger").html(data["message"]["department_name_err"]);

                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_department_name = $("#filter_department_name").val();
        var filter_policy_type = $("#filter_policy_type").val();
        var filter_status = $("#filter_status").val();

        if (filter_department_name == "null")
            filter_department_name = "";

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>master/policy_type/filter_policy_type_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_department_name: filter_department_name,
                    filter_policy_type: filter_policy_type,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_policytype_data = 0;
                    $("#total_policytype_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var policy_type_id = "";
                        var policy_type = "";
                        var policy_type_status = "";
                        var fk_policy_type_id = "";
                        var datas = "";
                        var status = "";
                        total_policytype_data = data["total_policytype_data"];
                        $("#total_policytype_data").text(" Count ( " + total_policytype_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_type_id = parseInt(data[key].policy_type_id);
                            policy_type = data[key].policy_type;
                            policy_type_status = data[key].policy_type_status;
                            fk_policy_type_id = data[key].fk_policy_type_id;
                            department_name = data[key].department_name;
                            var isActive = data[key].del_flag;
                            if (!isNaN(policy_type_id)) {
                                if (policy_type_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_type_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + policy_type_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_type_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_type_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + policy_type_id + ")' >View</button>";
                                edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + policy_type_id + ")' >Edit</button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_type_id + "' value='' type='button' onClick ='updateStatus(" + policy_type_id + "," + policy_type_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + policy_type_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + policy_type_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_type_id + "' href='javascript:void(0);' id='status_btn_" + policy_type_id + "' onClick ='updateStatus(" + policy_type_id + "," + policy_type_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + department_name + '</center></td> <td><center>' + policy_type + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_policytype_data").text(" Count ( " + total_policytype_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="3"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function Reset_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        $("#filter_department_name").val("null");
        $("#filter_policy_type").val("");
        $("#filter_status").val("null");
        getPolicyTypeList();
    }

    getPolicyTypeList();

    function getPolicyTypeList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/policy_type/get_policy_type_list";
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
                    var total_policytype_data = 0;
                    $("#total_policytype_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var policy_type_id = "";
                        var policy_type = "";
                        var policy_type_status = "";
                        var fk_policy_type_id = "";
                        var datas = "";
                        var status = "";
                        total_policytype_data = data["total_policytype_data"];
                        $("#total_policytype_data").text(" Count ( " + total_policytype_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_type_id = parseInt(data[key].policy_type_id);
                            policy_type = data[key].policy_type;
                            policy_type_status = data[key].policy_type_status;
                            fk_policy_type_id = data[key].fk_policy_type_id;
                            department_name = data[key].department_name;
                            var isActive = data[key].del_flag;
                            if (!isNaN(policy_type_id)) {
                                if (policy_type_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_type_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + policy_type_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_type_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_type_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + policy_type_id + ")' >View</button>";
                                edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + policy_type_id + ")' >Edit</button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_type_id + "' value='' type='button' onClick ='updateStatus(" + policy_type_id + "," + policy_type_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + policy_type_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + policy_type_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_type_id + "' href='javascript:void(0);' id='status_btn_" + policy_type_id + "' onClick ='updateStatus(" + policy_type_id + "," + policy_type_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + department_name + '</center></td> <td><center>' + policy_type + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_policytype_data").text(" Count ( " + total_policytype_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="3"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(policy_type_id, policy_type_status) {

        var url = "<?php echo $base_url; ?>master/policy_type/update_policy_type_status";

        if (policy_type_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": policy_type_id,
                    "status": policy_type_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + policy_type_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["policy_type_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + policy_type_id).addClass(status_btn_txt);
                            $("#status_btn_" + policy_type_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + policy_type_id).addClass(status_btn_txt);
                            $("#status_btn_" + policy_type_id).text(status);
                        }

                        $("#status_btn_" + policy_type_id).text(status);


                        $('#status_btn_' + policy_type_id).attr('onClick', 'updateStatus(' + policy_type_id + ',' + data["userdata"]["policy_type_status"] + ')');

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
                CheckFormAccess(submenu_permission, 8, url);
                check(role_permission, 8);
            }
        }
    });
</script>