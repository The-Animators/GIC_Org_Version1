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
                        <h4 class="page-title"><?php if ($method == "edit") : echo "Edit ";
                                                else : echo "";
                                                endif; ?> <?php echo $title; ?></h4>
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
                                <h4 class="header-title"><?php if ($method == "edit") : echo "Edit ";
                                                            else : echo "";
                                                            endif; ?> <?php echo $title; ?></h4>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url(); ?>master/task_work/" class="btn btn-secondary waves-effect btn-xs">Back</a>
                            </div>
                        </div>

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-row">

                                    <div class="col-md-3">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="40%">Task Type :</td>
                                                    <td><strong><span id="task_type" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="task_type" class="col-form-label col-md-4 text-right">Task Type<span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-form-label" id="">
                                                <span id="task_type"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-3">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="40%">Task Title :</td>
                                                    <td><strong><span id="task_title" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="task_title" class="col-form-label col-md-4 text-right">Task Title<span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-form-label" id="task_title">
                                                <span id="task_title_err"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-3">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="40%">Staff :</td>
                                                    <td><strong><span id="staff" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="staff" class="col-form-label col-md-4 text-right">Staff<span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-form-label" id="staff">
                                                <span id="staff_err"></span>
                                            </div>
                                        </div> -->
                                    </div>

                                    <div class="col-md-3">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="40%">Priority :</td>
                                                    <td><strong><span id="priority" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="priority" class="col-form-label col-md-4 text-right">Priority<span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-form-label" id="priority">
                                                <span id="priority_err"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-3">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="40%">Start Date :</td>
                                                    <td><strong><span id="start_date" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="start_date" class="col-form-label col-md-4 text-right">Start Date<span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-form-label" id="start_date">
                                                <span id="start_date_err"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-3">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="40%">End Date :</td>
                                                    <td><strong><span id="end_date" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="end_date" class="col-form-label col-md-4 text-right">End Date<span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-form-label" id="end_date">
                                                <span id="end_date_err"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            <label for="status" class="col-form-label col-md-4 text-right">Status<span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-form-label">
                                                <select name="status" id="status" class="form-control status">
                                                    <option value="New">New</option>
                                                    <option value="Under process">Under process</option>
                                                    <option value="FollowUp">FollowUp</option>
                                                    <option value="On Hold">On Hold</option>
                                                    <option value="Completed">Completed</option>
                                                    <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?>
                                                        <option value="CLOSED">Closed</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="20%">Task Description :</td>
                                                    <td><strong><span id="task_desc" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="task_desc" class="col-form-label col-md-2 text-right">Task Description<span class="text-danger">*</span></label>
                                            <div class="col-md-10  col-form-label" id="task_desc">
                                            </div>
                                        </div> -->
                                    </div>

                                    <div class="col-md-12">
                                        <table class="table mb-0 table-bordered" id="first_table">
                                            <thead>
                                                <tr>
                                                    <th><i class ='mdi mdi-plus-box mdi-18 Add_task_remark' id="Add_task_remark" onclick="AddTask_remark(0)"></i>
                                                    <!-- <button class="btn btn-primary btn-xs Add_task_remark" id="Add_task_remark" onclick="AddTask_remark(0)">Add</button></th> -->
                                                    <th>Current Date</th>
                                                    <th>Remarks</th>
                                                    <th>Document</th>
                                                </tr>
                                            </thead>
                                            <tbody id="first_table_tbody">

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label id="task_id" hidden>1</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <center>
                                            <button id="submit" onclick="onUpdate()" class="btn btn-primary btn-xs mt-1">Save</button>
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
    var add_task_remark_counter = 0;
    var main_Task_remark_Arr = [];
    var actual_task_remark_data = [];

    function removeTask_Remark(add_task_remark_counter) {

        $("#remove_task_remark_" + add_task_remark_counter).closest("tr").remove();
        var indexValue = main_Task_remark_Arr.indexOf(add_task_remark_counter);
        main_Task_remark_Arr.splice(indexValue, 1);
        if (main_Task_remark_Arr.length == 0) {
            add_task_remark_counter = 0;
            main_Task_remark_Arr = [];
            $("#Add_task_remark").attr("onClick", "AddTask_remark(" + add_task_remark_counter + ")");
        }
    }

    function AddTask_remark(add_task_remark_counter) {
        main_Task_remark_Arr.push(add_task_remark_counter);
        // <button class="btn btn-primary btn-xs dripicons-cross" id="remove_task_remark_' + add_task_remark_counter + '" onClick=removeTask_Remark(' + add_task_remark_counter + ') >
        var tr_table = '<tr><td width="3%"><i class="mdi mdi-minus-box"  id="remove_task_remark_' + add_task_remark_counter + '" onClick=removeTask_Remark(' + add_task_remark_counter + ')></i></td><td><input type="date" id="task_remark_date_' + add_task_remark_counter + '" name="task_remark_date[]" value="" class="form-control task_remark_date"></td> <td><textarea type="text" id="task_remark_' + add_task_remark_counter + '" name="task_remark[]" value="" class="form-control task_remark"></textarea></td><td> <input type="file" name="task_remark_file[]" id="task_remark_file_' + add_task_remark_counter + '"  class="form-control task_remark_file" value="" onchange=check_file_upload("task_remark_file_' + add_task_remark_counter + '","' + add_task_remark_counter + '")><span id="task_remark_file_err_' + add_task_remark_counter + '"></span></td> </tr>';
        $("#first_table_tbody").append(tr_table);

        var date = new Date();
        var day = ("0" + date.getDate()).slice(-2);
        var month = ("0" + (date.getMonth() + 1)).slice(-2);

        var today = date.getFullYear() + "-" + (month) + "-" + (day);
        // var today = (day) + "-" + (month) + "-" + date.getFullYear();
        // alert(today);
        $('#task_remark_date_' + add_task_remark_counter).val(today);

        add_task_remark_counter = add_task_remark_counter + 1;
        $("#Add_task_remark").attr("onClick", "AddTask_remark(" + add_task_remark_counter + ")");
    }


    function edit_Task_remark_details(total_task_remark_data) {
        task_remark_length = total_task_remark_data.length;
        var tr_table = "";
        $("#first_table_tbody").empty();
        $.each(total_task_remark_data, function(key1, val1) {

            add_task_remark_counter = key1;
            main_Task_remark_Arr.push(add_task_remark_counter);

            var index = total_task_remark_data[key1][0];
            var task_remark_date = total_task_remark_data[key1][1];
            var task_remark = total_task_remark_data[key1][2];
            var task_remark_file = total_task_remark_data[key1][3];
            // <button class="btn btn-primary btn-xs dripicons-cross" id="remove_task_remark_' + add_task_remark_counter + '" onClick=removeTask_Remark(' + add_task_remark_counter + ') >
            tr_table += '<tr><td width="3%"><i class="mdi mdi-minus-box"  id="remove_task_remark_' + add_task_remark_counter + '" onClick=removeTask_Remark(' + add_task_remark_counter + ')></i></td><td><input type="date" id="task_remark_date_' + add_task_remark_counter + '" name="task_remark_date[]" value="' + task_remark_date + '" class="form-control task_remark_date"></td> <td><textarea type="text" id="task_remark_' + add_task_remark_counter + '" name="task_remark[]" class="form-control task_remark">' + task_remark + '</textarea></td><td> <input type="file" name="task_remark_file[]" id="task_remark_file_' + add_task_remark_counter + '"  class="form-control task_remark_file" value="" onchange=check_file_upload("task_remark_file_' + add_task_remark_counter + '","' + add_task_remark_counter + '")><span id="task_remark_details_' + add_task_remark_counter + '"></span><span id="task_remark_file_err_' + add_task_remark_counter + '"></span><input type="hidden" name="task_remark_hidden" id="task_remark_hidden_' + add_task_remark_counter + '" value="' + task_remark_file + '"></td> </tr>';
        });
        $("#Add_task_remark").attr("onClick", "AddTask_remark(" + (task_remark_length) + ")");
        $("#first_table_tbody").append(tr_table);
        $.each(total_task_remark_data, function(key1, val1) {
            add_task_remark_counter = key1;
            var index = total_task_remark_data[key1][0];
            var task_remark_date = total_task_remark_data[key1][1];
            var task_remark = total_task_remark_data[key1][2];
            var task_remark_file = total_task_remark_data[key1][3];
            if (task_remark_file == "" || task_remark_file == null) {
                // alert("hi")
                var view_task_remark_file = "";
                var download_task_remark_file = "";
            } else if (task_remark_file != "") {
                var view_task_remark_file = "<span ></span><br><a href='<?php echo base_url(); ?>master/task_work/view_doc/1/1/" + task_remark_file + "'  class='text-info'  target='_blank'><b>View</b></a>";
                var download_task_remark_file = "<a href='<?php echo base_url(); ?>master/task_work/download_doc/1/1/" + task_remark_file + "'  class='text-success' target='_blank'><b>Download</b></a>";
            }
            $("#task_remark_details_" + add_task_remark_counter).html(view_task_remark_file + "  " + download_task_remark_file);
        });
    }

    function Total_Task_Remark() {
        actual_task_remark_data = [];
        var new_main_Task_remark_Arr = [];
        actual_data_flag = "false";

        new_main_Task_remark_Arr = main_Task_remark_Arr;
        task_remark = "";

        task_remark_file = "";
        task_remark_flag = "";

        $.each(new_main_Task_remark_Arr, function(key, val) {
            var task_remark_date = $('#task_remark_date_' + val).val();
            var task_remark_txt = $('#task_remark_' + val).val();

            var task_remark = task_remark_file_upload(val);
            task_remark = task_remark.split("$%^&*(&&*%^$%$");
            var task_remark_file = task_remark[0];
            var task_remark_flag = task_remark[1];
            if (task_remark_flag == "true") {
                actual_data_flag = "true";
                return false;
            }
            if (task_remark_file == "") {
                task_remark_file = "";
                var task_remark_hidden = $('#task_remark_hidden_' + val).val();
                if (task_remark_hidden == undefined || task_remark_hidden == "null")
                    task_remark_hidden = "";
                task_remark_file = task_remark_hidden;
            }

            // alert(task_remark_file);
            // alert(task_remark_flag);

            actual_task_remark_data.push([val, task_remark_date, task_remark_txt, task_remark_file]);
            if (task_remark == '')
                actual_task_remark_data.splice(val, 1);

        });
        // alert(actual_task_remark_data);
        return JSON.stringify(actual_task_remark_data) + "&%$#&" + actual_data_flag;

    }

    function task_remark_file_upload(add_task_remark_counter) {
        event.preventDefault();
        var task_remark_txt = $('#task_remark_' + add_task_remark_counter).val();
        var task_remark = $('#task_remark_file_' + add_task_remark_counter).prop('files')[0];
        var form_data = new FormData();
        form_data.append('task_remark_file', task_remark);
        form_data.append('task_remark_txt', task_remark_txt);
        var task_remark_file = "";
        var task_remark_flag = "false";
        var url = "<?php echo base_url(); ?>master/task_work/get_task_remark_file_upload";
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    task_remark_file = data["userdata"];
                    $("#task_remark_file_" + add_task_remark_counter).removeClass("parsley-error");
                    $("#task_remark_file_err_" + add_task_remark_counter).removeClass("text-danger").html("");
                } else {
                    task_remark_file = "";
                    $('#task_remark_file_' + add_task_remark_counter).val("");
                    if (data["messages"] != "") {
                        toaster(message_type = "Error", message_txt = "Excel Attach: " + data["messages"]["task_remark_err"], message_icone = "error");
                        $("#task_remark_file_" + add_task_remark_counter).focus();
                        $("#task_remark_file_" + add_task_remark_counter).addClass("parsley-error");
                        $("#task_remark_file_err_" + add_task_remark_counter).addClass("text-danger").html(data["messages"]["task_remark_err"]);
                        task_remark_flag = "true";
                        return;
                    } else {
                        $("#task_remark_file_" + add_task_remark_counter).removeClass("parsley-error");
                        $("#task_remark_file_err_" + add_task_remark_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        return task_remark_file + "$%^&*(&&*%^$%$" + task_remark_flag;
    }

    // $(function() {
    //     $("#start_date").datepicker({
    //         'format': 'dd-mm-yyyy',
    //         'autoclose': true,
    //         'todayHighlight': true
    //     });
    //     $("#end_date").datepicker({
    //         'format': 'dd-mm-yyyy',
    //         'autoclose': true,
    //         'todayHighlight': true
    //     });
    // });
    TaskType();

    function TaskType() {
        // input[name='username']task_type
        var task_type = $("input[type='radio']:checked").val();
        // alert(task_type);
        if (task_type == "System Task") {
            $("#task_title_txt").hide();
            $("#task_title_drop").show();
        } else if (task_type == "Manual") {
            $("#task_title_txt").show();
            $("#task_title_drop").hide();
        }
    }

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });

    $('#task_type').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('#task_title').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#task_title').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#task_desc').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#staff').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#priority').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#start_date').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#end_date').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#status').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#task_type").removeClass("parsley-error");
        $("#task_type_err").removeClass("text-danger").text("");

        $("#task_title").removeClass("parsley-error");
        $("#task_title_err").removeClass("text-danger").text("");

        $("#task_desc").removeClass("parsley-error");
        $("#task_desc_err").removeClass("text-danger").text("");

        $("#staff").removeClass("parsley-error");
        $("#staff_err").removeClass("text-danger").text("");

        $("#priority").removeClass("parsley-error");
        $("#priority_err").removeClass("text-danger").text("");

        $("#start_date").removeClass("parsley-error");
        $("#start_date_err").removeClass("text-danger").text("");

        $("#end_date").removeClass("parsley-error");
        $("#end_date_err").removeClass("text-danger").text("");

        $("#status").removeClass("parsley-error");
        $("#status_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#task_id").text("");
        $("#task_type").val("null");
        $("#task_title").val("null");
        $("#task_desc").val("null");
        $("#staff").val("");
        $("#priority").val("");
        $("#start_date").val("null");
        $("#end_date").val("");
        $("#status").val("");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover() {
        var task_id = $("#task_id").text();
        var url = "<?php echo $base_url; ?>master/task_work/recover_assign_task";
        confirmation_alert(id = task_id, url = url, title = "Task", type = "Recover");
    }

    function OnDelete() {
        var task_id = $("#task_id").text();
        var url = "<?php echo $base_url; ?>master/task_work/remove_assign_task";
        confirmation_alert(id = task_id, url = url, title = "Task", type = "Delet");
    }
    <?php if ($method == "view_assign") : ?>
        var val = '<?php echo $task_id; ?>';
        onEdit(val);
    <?php endif; ?>

    function onEdit(val) {
        clearError();
        // alert(val);
        $("#task_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").show();
        var url = "<?php echo $base_url; ?>master/task_work/edit_assign_task";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    task_id: val,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    var task_id = data["userdata"].task_id;
                    var task_type = data["userdata"].task_type;
                    var task_title = data["userdata"].task_title;
                    var task_desc = data["userdata"].task_desc;
                    var staff = data["userdata"].fk_staff_id;
                    var staff_name_str_arr = data["userdata"].staff_name_str_arr;
                    var priority = data["userdata"].priority;
                    var start_date = data["userdata"].start_date;
                    var end_date = data["userdata"].end_date;
                    var status = data["userdata"].status;
                    var total_task_remark_data = JSON.parse(data["userdata"].total_task_remark_data);
                    edit_Task_remark_details(total_task_remark_data);

                    var task_type_flag = false;

                    if (task_type == "Manual") {
                        task_type_flag = true;
                        var task_type_id = "task_type_manual";
                        var task_title_id = "task_title_txt";
                    } else if (task_type == "System Task") {
                        task_type_flag = true;
                        var task_type_id = "task_type_system_task";
                        var task_title_id = "task_title_drop";
                    }
                    if (staff != "")
                        var selectedOptions = staff.split(",");
                    else
                        var selectedOptions = "";

                    // alert(task_type);
                    $("#task_id").text(data["userdata"].task_id);
                    $("#task_type").text(task_type);
                    $("#task_title").text(task_title);
                    $("#task_desc").text(task_desc);
                    $("#staff").text(staff_name_str_arr);
                    $("#priority").text(priority);
                    $("#start_date").text(start_date);
                    $("#end_date").text(end_date);
                    $("#status").val(status);

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

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function check_file_upload(id, counter) {
        // alert(id);
        if ($.inArray($('#' + id).val().split('.').pop().toLowerCase(), ['png', 'jpg', 'jpeg', 'pdf', 'jpe', 'doc', 'docx', 'csv', 'xls', 'xlsx']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            $('#' + id).addClass("parsley-error");
            $('#task_remark_file_err_' + counter).addClass("text-danger").html("Please Select Only Valid Document Like PDF,Image,Excel or Doc File Only.");
            toaster(message_type = "Error", message_txt = "Please Select Only Valid Document Like PDF,Image,Excel or Doc File Only.", message_icone = "error");
            return false;
        } else {
            $('#' + id).removeClass("parsley-error");
            $('#task_remark_file_err_' + counter).removeClass("text-danger").html("");
        }
    }

    function onUpdate() {
        var task_id = $("#task_id").text();
        var status = $("#status").val();
        var total_task_remark = Total_Task_Remark();
        total_task_remark = total_task_remark.split("&%$#&")
        var total_task_remark_data = total_task_remark[0];

        // alert(total_task_remark[1]);
        // alert(total_task_remark_data);
        // return false;

        if (total_task_remark[1] == "true")
            return false;

        if (status == "null")
            status = "";

        var form_data = new FormData();
        form_data.append('task_id', task_id);
        form_data.append('status', status);
        form_data.append('total_task_remark_data', total_task_remark_data);

        var url = "<?php echo $base_url; ?>master/task_work/update_task_remark";

        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#status").val("");
                    $("#status").removeClass("parsley-error");
                    // $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        // location.reload();
                        document.location.href = "<?php echo base_url(); ?>master/task_work/";
                    }, 1000);
                } else {

                    if (data["message"]["status_err"] != "")
                        $("#status").addClass("parsley-error");
                    else
                        $("#status").removeClass("parsley-error");
                    $("#status_err").addClass("text-danger").html(data["message"]["status_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }


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