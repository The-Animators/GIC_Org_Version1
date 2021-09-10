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
                                                    <input type="text" name="department_name" id="department_name" value="" placeholder="Enter Department Name" class="form-control">
                                                    <span id="department_name_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="department_id" hidden>1</label>
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
                                    <!-- <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="department_name" class="col-form-label col-md-4 text-right"><strong>Department Name : </strong></label>
                                                <div class="col-md-8 col-form-label" id="department_name_det"> </div>
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
                                                <input type="text" class="form-control" id="filter_department_name" name="filter_department_name" placeholder="Enter Department Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
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
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-4" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_department_data"></span></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
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
                                            <center>Department Name</center>
                                        </th>
                                        <!-- <th>Department Status</th>
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
    $('#department_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#department_name").removeClass("parsley-error");
        $("#department_name_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#department_id").text("");
        $("#department_name").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(department_id) {
        // var department_id = $("#department_id").text();
        var url = "<?php echo $base_url; ?>master/department/recover_department";
        confirmation_alert(id = department_id, url = url, title = "Department", type = "Recover");
    }

    function OnDelete(department_id) {
        // var department_id = $("#department_id").text();
        var url = "<?php echo $base_url; ?>master/department/remove_department";
        confirmation_alert(id = department_id, url = url, title = "Department", type = "Delet");
    }


    function onView(val) {
        clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/department/edit_department";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    department_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
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
        $("#department_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/department/edit_department";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    department_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    $("#department_id").text(data["userdata"].department_id);
                    $("#department_name").val(data["userdata"].department_name);

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
        var department_id = $("#department_id").text();
        var department_name = $("#department_name").val();

        var url = "<?php echo $base_url; ?>master/department/update_department";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                department_id: department_id,
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
                    $("#department_name").val("");
                    $("#department_name").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
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
        var department_name = $("#department_name").val();
        var url = "<?php echo $base_url; ?>master/department/add_department";

        $.ajax({
            url: url,
            data: {
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
                    $("#department_name").val("");
                    $("#department_name").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
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
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_department_name = $("#filter_department_name").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>master/department/filter_department_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_department_name: filter_department_name,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_department_data = 0;
                    $("#total_department_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var department_id = "";
                        var department_name = "";
                        var department_status = "";
                        var datas = "";
                        var status = "";
                        total_department_data = data["total_department_data"];
                        $("#total_department_data").text(" Count ( " + total_department_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            department_id = parseInt(data[key].department_id);
                            department_name = data[key].department_name;
                            department_status = data[key].department_status;
                            var isActive = data[key].del_flag;
                            if (!isNaN(department_id)) {
                                if (department_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + department_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + department_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + department_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + department_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + department_id + ")' >View</button>";
                                edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + department_id + ")' >Edit</button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + department_id + "' value='' type='button' onClick ='updateStatus(" + department_id + "," + department_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + department_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + department_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + department_id + "' href='javascript:void(0);' id='status_btn_" + department_id + "' onClick ='updateStatus(" + department_id + "," + department_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td> <td>' + sn + '</td> <td><center>' + department_name + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_department_data").text(" Count ( " + total_department_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="2"><center>Data Not Found</center></td> </tr>';
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
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        $("#filter_department_name").val("");
        $("#filter_status").val("null");
        getDepartmentList();
    }
    getDepartmentList();

    function getDepartmentList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/department/get_department_list";
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
                    var total_department_data = 0;
                    $("#total_department_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var department_id = "";
                        var department_name = "";
                        var department_status = "";
                        var datas = "";
                        var status = "";
                        total_department_data = data["total_department_data"];
                        $("#total_department_data").text(" Count ( " + total_department_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            department_id = parseInt(data[key].department_id);
                            department_name = data[key].department_name;
                            department_status = data[key].department_status;
                            var isActive = data[key].del_flag;
                            if (!isNaN(department_id)) {
                                if (department_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + department_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + department_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + department_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + department_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                // var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + department_id + ")' >View</button>";
                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + department_id + ")' >Edit</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + department_id + "' value='' type='button' onClick ='updateStatus(" + department_id + "," + department_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + department_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + department_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + department_id + "' href='javascript:void(0);' id='status_btn_" + department_id + "' onClick ='updateStatus(" + department_id + "," + department_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td> <td>' + sn + '</td> <td><center>' + department_name + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_department_data").text(" Count ( " + total_department_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="2"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(department_id, department_status) {

        var url = "<?php echo $base_url; ?>master/department/update_department_status";

        if (department_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": department_id,
                    "status": department_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + department_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["department_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + department_id).addClass(status_btn_txt);
                            $("#status_btn_" + department_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + department_id).addClass(status_btn_txt);
                            $("#status_btn_" + department_id).text(status);
                        }

                        $("#status_btn_" + department_id).text(status);


                        $('#status_btn_' + department_id).attr('onClick', 'updateStatus(' + department_id + ',' + data["userdata"]["department_status"] + ')');

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
                CheckFormAccess(submenu_permission, 6, url);
                check(role_permission, 6);
            }
        }
    });
</script>