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
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="task_title" class="col-form-label col-md-2 text-right">Task Title<span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="task_title" id="task_title" value="" placeholder="Enter Task Title" class="form-control">
                                                    <span id="task_title_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="child_type" class="col-form-label col-md-6 text-right">Sub Title<span class="text-danger">*</span></label>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-radio col-form-label ">
                                                        <input type="radio" id="child_type_yes" name="child_type" class="custom-control-input child_type" value="1" onclick="ChildType()">
                                                        <label class="custom-control-label" for="child_type_yes">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-radio col-form-label ">
                                                        <input type="radio" id="child_type_no" name="child_type" class="custom-control-input child_type" value="2" checked="" onclick="ChildType()">
                                                        <label class="custom-control-label" for="child_type_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8" id="child_table_div" style="display:none;">
                                            <table class="table mb-0 table-bordered" id="child_first_table">
                                                <thead>
                                                    <tr>
                                                        <th><button class="btn btn-primary btn-xs Add_Child_Title fa fa-plus" id="Add_Child_Title" onclick="AddChildTitle(0)"></button></th>
                                                        <th>Sub Title</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="child_first_tbody"></tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="task_title_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4 mt-1">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>
                                                <button id="submit" class="btn btn-primary btn-sm">Save <?php echo $title; ?></button>
                                                <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete <?php echo $title; ?></button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover <?php echo $title; ?></button>
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
                                                <td width="40%">Task Title :</td>
                                                <td><strong><span id="task_title_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <!-- <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="task_title" class="col-form-label col-md-2 text-right"><strong>Task Title : </strong></label>
                                                <div class="col-md-10 col-form-label" id="task_title_det"> </div>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                                <div class="col-md-8">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="20%">Sub Title :</td>
                                                <td><strong><span id="task_sub_title_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
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
                                        <div class="col-md-3 row">
                                            <label for="filter_task_title" class="col-form-label col-md-4 text-right">Task Title</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="filter_task_title" name="filter_task_title" placeholder="Enter Task Title">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                            <div class="col-md-8">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="null">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In-Active</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-3 row mt-1 ml-1">
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_tasktitle_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <input class='btn btn-facebook btn-xs' id='AddForm' value='Add' type='button' />
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>

                        </div>

                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">

                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th>
                                            <center>Task Title</center>
                                        </th>
                                        <th>
                                            <center>Sub Title Status</center>
                                        </th>
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

    function ChildType(child_type_old) {
        if (child_type_old == "" || child_type_old == undefined || child_type_old == "undefined" || child_type_old == null || child_type_old == "null")
            var child_type = $("input[name='child_type']:checked").val();
        else
            var child_type = child_type_old;
        if (child_type == 1) {
            $("#child_table_div").show();
        } else if (child_type == 2) {
            $("#child_table_div").hide();
        }
    }
    var add_child_counter = 0;
    var main_Sub_Title_Arr = [];
    var actual_Sub_Title_data_Arr = [];

    function Total_SubTitle() {
        actual_Sub_Title_data_Arr = [];

        $("#child_first_table tr:has(.sub_title)").each(function(key, val) {
            var sub_title = $(".sub_title", this).val();

            actual_Sub_Title_data_Arr.push([key, sub_title]);
            if (sub_title == '')
                actual_Sub_Title_data_Arr.splice(key, 1);
        });
        return actual_Sub_Title_data_Arr;
    }

    function remove_ChildTitle(add_child_counter) {
        $("#remove_sub_title_" + add_child_counter).closest("tr").remove();
        var indexValue = main_Sub_Title_Arr.indexOf(add_child_counter);
        main_Sub_Title_Arr.splice(indexValue, 1);
        if (main_Sub_Title_Arr.length == 0) {
            add_child_counter = 0;
            main_Sub_Title_Arr = [];
            $("#Add_Child_Title").attr("onClick", "AddChildTitle(" + add_child_counter + ")");
        }
    }

    function AddChildTitle(add_child_counter) {
        main_Sub_Title_Arr.push(add_child_counter);
        var tr_table = '<tr><td><button class="btn btn-danger btn-xs fa fa-trash remove_sub_title" id="remove_sub_title_' + add_child_counter + '" onClick=remove_ChildTitle(' + add_child_counter + ') ></td><td><input type="text" name="sub_title" id="sub_title_' + add_child_counter + '" class="form-control sub_title" placeholder="Enter Sub Title"></td> </tr>';
        $("#child_first_tbody").append(tr_table);
        add_child_counter = add_child_counter + 1;
        $("#Add_Child_Title").attr("onClick", "AddChildTitle(" + add_child_counter + ")");
    }

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#task_title').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $("input[type='radio']:checked").on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('.sub_title').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('.remove_sub_title').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('.Add_Child_Title').on('click', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#task_title").removeClass("parsley-error");
        $("#task_title_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#task_title_id").text("");
        $("#task_title").val("");
        $(".sub_title").val("");
        $("#child_first_tbody").empty();
        $("#Add_Child_Title").attr("onClick", "AddChildTitle(0)");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(task_title_id) {
        var url = "<?php echo $base_url; ?>master/task_work/recover_task_title";
        confirmation_alert(id = task_title_id, url = url, title = "Task Title", type = "Recover");
    }

    function OnDelete(task_title_id) {
        var url = "<?php echo $base_url; ?>master/task_work/remove_task_title";
        confirmation_alert(id = task_title_id, url = url, title = "Task Title", type = "Delet");
    }

    function onView(val) {
        clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/task_work/edit_task_title";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    task_title_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#task_title_det").text(data["userdata"].task_title);
                    var sub_title_flag = data["userdata"].sub_title_flag;
                    var sub_title_txt = "";
                    if (sub_title_flag == 1) {
                        var sub_title_json = JSON.parse(data["userdata"].sub_title_json);
                        var index = "";
                        var tr_table = "";
                        var sub_title_json_length = sub_title_json.length;

                        $.each(sub_title_json, function(key, val) {

                            var sub_title = sub_title_json[key][1];
                            if (sub_title_txt == "")
                                sub_title_txt = sub_title;
                            else if (sub_title_txt != "")
                                sub_title_txt = sub_title_txt + " , " + sub_title;
                            // tr_table += '<tr><td><button class="btn btn-danger btn-xs fa fa-trash remove_sub_title" id="remove_sub_title_' + add_child_counter + '" onClick=remove_ChildTitle(' + add_child_counter + ') ></td><td><input type="text" name="sub_title" id="sub_title_' + add_child_counter + '" class="form-control sub_title" placeholder="Enter Sub Title" value="' + sub_title + '"></td> </tr>';
                        });
                        $("#task_sub_title_det").text(sub_title_txt);
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {
        clearError();
        $("#task_title_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/task_work/edit_task_title";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    task_title_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    $("#child_first_tbody").empty();
                    // var myObj = JSON.parse(data);
                    // add_child_counter = 0;
                    $("#task_title_id").text(data["userdata"].task_title_id);
                    $("#task_title").val(data["userdata"].task_title);
                    $("#delete").attr("onclick", "OnDelete(" + data["userdata"].task_title_id + ")");
                    $("#recover").attr("onclick", "OnRecover(" + data["userdata"].task_title_id + ")");
                    var sub_title_flag = data["userdata"].sub_title_flag;
                    // var sub_title_json = JSON.parse(data["userdata"].sub_title_json);

                    var flag = false;
                    ChildType(sub_title_flag);
                    if (sub_title_flag == 1) {
                        flag = true;
                        var sub_title_id = "child_type_yes";
                    } else if (sub_title_flag == 2) {
                        flag = true;
                        var sub_title_id = "child_type_no";
                    }
                    $("#" + sub_title_id).prop('checked', flag);

                    // alert(sub_title_flag);
                    if (sub_title_flag == 1) {
                        var sub_title_json = JSON.parse(data["userdata"].sub_title_json);
                        var index = "";
                        var tr_table = "";
                        var sub_title_json_length = sub_title_json.length;
                        // alert(sub_title_json_length);
                        $.each(sub_title_json, function(key, val) {
                            add_child_counter = key;
                            main_Sub_Title_Arr.push(add_child_counter);
                            index = sub_title_json[key][0];
                            var sub_title = sub_title_json[key][1];
                            tr_table += '<tr><td><button class="btn btn-danger btn-xs fa fa-trash remove_sub_title" id="remove_sub_title_' + add_child_counter + '" onClick=remove_ChildTitle(' + add_child_counter + ') ></td><td><input type="text" name="sub_title" id="sub_title_' + add_child_counter + '" class="form-control sub_title" placeholder="Enter Sub Title" value="' + sub_title + '"></td> </tr>';
                        });
                        $("#child_first_tbody").append(tr_table);
                        $("#Add_Child_Title").attr("onClick", "AddChildTitle(" + sub_title_json_length + ")");
                    }

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
        var task_title_id = $("#task_title_id").text();
        var task_title = $("#task_title").val();
        var sub_title_flag = $("input[name='child_type']:checked").val();
        var sub_title_json = JSON.stringify(Total_SubTitle());

        var url = "<?php echo $base_url; ?>master/task_work/update_task_title";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                task_title_id: task_title_id,
                task_title: task_title,
                sub_title_flag: sub_title_flag,
                sub_title_json: sub_title_json,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#task_title").val("");
                    $("#task_title").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["task_title_err"] != "")
                        $("#task_title").addClass("parsley-error");
                    else
                        $("#task_title").removeClass("parsley-error");
                    $("#task_title_err").addClass("text-danger").html(data["message"]["task_title_err"]);

                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var task_title = $("#task_title").val();
        var sub_title_flag = $("input[name='child_type']:checked").val();
        var sub_title_json = JSON.stringify(Total_SubTitle());
        // alert(sub_title_json);
        // return false;
        var url = "<?php echo $base_url; ?>master/task_work/add_task_title";

        $.ajax({
            url: url,
            data: {
                task_title: task_title,
                sub_title_flag: sub_title_flag,
                sub_title_json: sub_title_json,
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
                    $("#task_title").val("");
                    $("#task_title").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["task_title_err"] != "")
                        $("#task_title").addClass("parsley-error");
                    else
                        $("#task_title").removeClass("parsley-error");
                    $("#task_title_err").addClass("text-danger").html(data["message"]["task_title_err"]);

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

        var filter_task_title = $("#filter_task_title").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>master/task_work/filter_task_title_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_task_title: filter_task_title,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_tasktitle_data = 0;
                    $("#total_tasktitle_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var task_title_id = "";
                        var task_title = "";
                        var task_title_status = "";
                        var datas = "";
                        var status = "";
                        total_tasktitle_data = data["total_tasktitle_data"];
                        $("#total_tasktitle_data").text(" Count ( " + total_tasktitle_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            task_title_id = parseInt(data[key].task_title_id);
                            task_title = data[key].task_title;
                            task_title_status = data[key].task_title_status;
                            var isActive = data[key].del_flag;

                            var sub_title_flag = data[key].sub_title_flag;
                            // alert(sub_title_flag);

                            if (sub_title_flag == 1) {
                                var sub_title_status = '<span class="badge badge-success pl-2"> Yes</span>';
                            } else if (sub_title_flag == 2) {
                                var sub_title_status = '<span class="badge badge-danger pl-2"> No</span>';
                            }
                            var sub_title_txt = "";
                            if (sub_title_flag == 1) {
                                var sub_title_json = JSON.parse(data[key].sub_title_json);
                                var index = "";
                                var sub_title_txt = "";
                                var sub_title_json_length = sub_title_json.length;
                                // alert(sub_title_json_length);
                                $.each(sub_title_json, function(key, val) {
                                    add_child_counter = key;
                                    main_Sub_Title_Arr.push(add_child_counter);
                                    index = sub_title_json[key][0];
                                    var sub_title = sub_title_json[key][1];
                                    if (sub_title_txt == "")
                                        sub_title_txt = sub_title;
                                    else
                                        sub_title_txt = sub_title_txt + " , " + sub_title;
                                });
                                if (sub_title_txt != "")
                                    sub_title_txt = " ( " + sub_title_txt + " ) ";
                            }

                            if (!isNaN(task_title_id)) {
                                if (task_title_status == 1) {
                                    status = 'Active';
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = 'In-Active';
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + task_title_id + ")'><b>Delete</b></a>";
                                    // <button class='btn btn-facebook btn-xs delete' onClick ='OnDelete(" + task_title_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + task_title_id + ")'><b>Recover</b></a>";
                                    // <button id='recover' onclick='OnRecover(" + task_title_id + ")' class='btn btn-facebook btn-xs delete'><i class='fa fa-undo' aria-hidden='true'></i></button>
                                }
                                // var view_btn = "<button class='btn btn-facebook btn-xs view' id='view' onClick ='onView(" + task_title_id + ")' ><i class='fas fa-eye'></i></button>";
                                // edit_btn = "<button class='btn btn-facebook btn-xs edit' id='edit' onClick ='onEdit(" + task_title_id + ")' ><i class='fas fa-pencil-alt'></i></button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + task_title_id + "' onClick ='updateStatus(" + task_title_id + "," + task_title_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + task_title_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + task_title_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + task_title_id + "' href='javascript:void(0);' id='status_btn_" + task_title_id + "' onClick ='updateStatus(" + task_title_id + "," + task_title_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td>  <td><center>' + task_title + '</center></td><td><center>' + sub_title_status + "  " + sub_title_txt + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_tasktitle_data").text(" Count ( " + total_tasktitle_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="4"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_task_title").val("");
        $("#filter_status").val("null");
        getTask_TitleList();
    }

    getTask_TitleList();

    function getTask_TitleList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/task_work/get_task_title_list";
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
                    var total_tasktitle_data = 0;
                    $("#total_tasktitle_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var task_title_id = "";
                        var task_title = "";
                        var task_title_status = "";
                        var datas = "";
                        var status = "";
                        total_tasktitle_data = data["total_tasktitle_data"];
                        $("#total_tasktitle_data").text(" Count ( " + total_tasktitle_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            task_title_id = parseInt(data[key].task_title_id);
                            task_title = data[key].task_title;
                            task_title_status = data[key].task_title_status;
                            var isActive = data[key].del_flag;

                            var sub_title_flag = data[key].sub_title_flag;
                            // alert(sub_title_flag);

                            if (sub_title_flag == 1) {
                                var sub_title_status = '<span class="badge badge-success pl-2"> Yes</span>';
                            } else if (sub_title_flag == 2) {
                                var sub_title_status = '<span class="badge badge-danger pl-2"> No</span>';
                            }
                            var sub_title_txt = "";
                            if (sub_title_flag == 1) {
                                var sub_title_json = JSON.parse(data[key].sub_title_json);
                                var index = "";
                                var sub_title_txt = "";
                                var sub_title_json_length = sub_title_json.length;
                                // alert(sub_title_json_length);
                                $.each(sub_title_json, function(key, val) {
                                    add_child_counter = key;
                                    main_Sub_Title_Arr.push(add_child_counter);
                                    index = sub_title_json[key][0];
                                    var sub_title = sub_title_json[key][1];
                                    if (sub_title_txt == "")
                                        sub_title_txt = sub_title;
                                    else
                                        sub_title_txt = sub_title_txt + " , " + sub_title;
                                });
                                if (sub_title_txt != "")
                                    sub_title_txt = " ( " + sub_title_txt + " ) ";
                            }

                            if (!isNaN(task_title_id)) {
                                if (task_title_status == 1) {
                                    status = 'Active';
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = 'In-Active';
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + task_title_id + ")'><b>Delete</b></a>";
                                    // <button class='btn btn-facebook btn-xs delete' onClick ='OnDelete(" + task_title_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + task_title_id + ")'><b>Recover</b></a>";
                                    // <button id='recover' onclick='OnRecover(" + task_title_id + ")' class='btn btn-facebook btn-xs delete'><i class='fa fa-undo' aria-hidden='true'></i></button>
                                }
                                // var view_btn = "<button class='btn btn-facebook btn-xs view' id='view' onClick ='onView(" + task_title_id + ")' ><i class='fas fa-eye'></i></button>";
                                // edit_btn = "<button class='btn btn-facebook btn-xs edit' id='edit' onClick ='onEdit(" + task_title_id + ")' ><i class='fas fa-pencil-alt'></i></button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + task_title_id + "' onClick ='updateStatus(" + task_title_id + "," + task_title_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + task_title_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + task_title_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + task_title_id + "' href='javascript:void(0);' id='status_btn_" + task_title_id + "' onClick ='updateStatus(" + task_title_id + "," + task_title_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td> <td>' + sn + '</td> <td><center>' + task_title + '</center></td><td><center>' + sub_title_status + "  " + sub_title_txt + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_tasktitle_data").text(" Count ( " + total_tasktitle_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="4"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(task_title_id, task_title_status) {

        var url = "<?php echo $base_url; ?>master/task_work/update_task_title_status";

        if (task_title_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": task_title_id,
                    "status": task_title_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + task_title_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["task_title_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-xs waves-light edit";
                            $("#edit_" + task_title_id).addClass(status_btn_txt);
                            $("#status_btn_" + task_title_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-xs waves-light edit";
                            $("#edit_" + task_title_id).addClass(status_btn_txt);
                            $("#status_btn_" + task_title_id).text(status);
                        }

                        $("#status_btn_" + task_title_id).text(status);


                        $('#status_btn_' + task_title_id).attr('onClick', 'updateStatus(' + task_title_id + ',' + data["userdata"]["task_title_status"] + ')');

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
            // alert(id);
            if (id != "") {
                CheckFormAccess(submenu_permission, 35, url);
                check(role_permission, 35);
            }
        }
    });
</script>