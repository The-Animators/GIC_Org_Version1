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
                                <a href="<?php echo base_url(); ?>master/task_work/" class="btn btn-secondary waves-effect btn-xs mb-1">Back</a>
                            </div>
                        </div>

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-row">

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="task_type" class="col-form-label col-md-4 text-right">Task Type<span class="text-danger">*</span></label>
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio col-form-label ">
                                                    <input type="radio" id="task_type_manual" name="task_type" class="custom-control-input task_type" value="Manual" checked onclick="TaskType()">
                                                    <label class="custom-control-label" for="task_type_manual">Manual</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="custom-control custom-radio col-form-label ">
                                                    <input type="radio" id="task_type_system_task" name="task_type" class="custom-control-input task_type" value="System Task" onchange="TaskType()">
                                                    <label class="custom-control-label" for="task_type_system_task">System Task</label>
                                                </div>
                                            </div>
                                            <span id="task_type_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="task_title" class="col-form-label col-md-4 text-right">Task Title<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="task_title" id="task_title_drop" class="form-control task_title" onchange="getSubTitle()">
                                                    <option value="null">Select Task Title</option>
                                                    <?php $task_title_list = task_title_dropdown(); if(!empty($task_title_list)): foreach($task_title_list as $row): ?>
                                                        <option value="<?php echo $row["task_title"]; ?>"><?php echo $row["task_title"]; ?></option>
                                                    <?php endforeach;endif; ?>
                                                </select>
                                                <input type="text" name="task_title" id="task_title_txt" class="form-control task_title" placeholder="Enter Task Title">
                                                <span id="task_title_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" id="sub_title_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="sub_title" class="col-form-label col-md-4 text-right">Sub Title</label>
                                            <div class="col-md-8">
                                                <select name="sub_title" id="sub_title" class="form-control sub_title">
                                                    <option value="null">Select Sub Title</option>
                                                </select>
                                                <span id="sub_title_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff" class="col-form-label col-md-4 text-right">Staff<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="staff" id="staff" class="selectpicker" multiple data-selected-text-format="count" data-style="btn-secondary">
                                                    <option value="null">Select Staff</option>
                                                    <?php $staff_det = staff_dropdown();
                                                    if (!empty($staff_det)) : foreach ($staff_det as $row) : ?>
                                                            <option value="<?php echo $row["staff_id"]; ?>"><?php echo $row["staff_name"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                                <span id="staff_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="task_desc" class="col-form-label col-md-2 text-right">Task Description<span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <textarea rows="3" name="task_desc" id="task_desc" class="form-control"></textarea>
                                                <span id="task_desc_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="priority" class="col-form-label col-md-4 text-right">Priority<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="priority" id="priority" class="form-control priority">
                                                    <option value="null">Select Priority</option>
                                                    <option value="Simple">Simple</option>
                                                    <option value="Low">Low</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="High">High</option>
                                                    <option value="Very High">Very High</option>
                                                </select>
                                                <span id="priority_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="start_date" class="col-form-label col-md-4 text-right">Start Date<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="start_date" id="start_date" class="form-control start_date" placeholder="Enter Start Date">
                                                <span id="start_date_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="end_date" class="col-form-label col-md-4 text-right">End Date<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="end_date" id="end_date" class="form-control end_date" placeholder="Enter End Date">
                                                <span id="end_date_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="status" class="col-form-label col-md-4 text-right">Status<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="status" id="status" class="form-control status">
                                                    <!-- <option value="null">Select Status</option> -->
                                                    <option value="New">New</option>
                                                    <option value="Under process">Under process</option>
                                                    <option value="FollowUp">FollowUp</option>
                                                    <option value="On Hold">On Hold</option>
                                                    <option value="Completed">Completed</option>
                                                    <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?>
                                                        <option value="CLOSED">Closed</option>
                                                    <?php endif; ?>
                                                </select>
                                                <span id="status_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label id="task_id" hidden>1</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <center>
                                            <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update</button>
                                            <button id="submit" class="btn btn-primary btn-sm">Save</button>
                                            <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete</button>
                                            <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover</button>
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
    function getSubTitle(task_title_drop_old){
        if(task_title_drop_old == "" || task_title_drop_old == undefined || task_title_drop_old == "undefined" || task_title_drop_old == null || task_title_drop_old == "null")
            var task_title_drop = $("#task_title_drop").val();
        else
            var task_title_drop = task_title_drop_old;
        // alert(task_title_drop);

        var url = "<?php echo $base_url; ?>master/task_work/get_sub_title_list";
        if (url != "" && task_title_drop != "") {
            $.ajax({
                url: url,
                data: {
                    task_title: task_title_drop,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    $("#sub_title").empty();
                    if(data["status"] == true){
                        var sub_title_flag = data["userdata"].sub_title_flag;

                        if(sub_title_flag == 1)
                            $("#sub_title_div").show();
                        else
                            $("#sub_title_div").hide();

                        var select_append = '';
                        if(sub_title_flag==1){
                            var sub_title_json = JSON.parse(data["userdata"].sub_title_json);
                            var index = "";
                            $.each(sub_title_json,function(key,val){
                                index = sub_title_json[key][0];
                                var sub_title = sub_title_json[key][1];
                                select_append += '<option value="'+sub_title+'">'+sub_title+'</option>';
                            });
                            $("#sub_title").append('<option value="null">Select Sub Title</option>'+select_append);
                        }else{
                            $("#sub_title").append('<option value="null">Select Sub Title</option>');
                        }
                    }else{
                        $("#sub_title").append('<option value="null">Select Sub Title</option>');
                    }


                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    $(function() {
        $("#start_date").datepicker({
            'format': 'dd-mm-yyyy',
            'autoclose': true,
            'todayHighlight': true
        });
        $("#end_date").datepicker({
            'format': 'dd-mm-yyyy',
            'autoclose': true,
            'todayHighlight': true
        });
    });
    
    function TaskType(task_type_old,task_title_drop_old) {
        // alert(task_type_old);
        // input[name='username']task_type
        if(task_type_old == "" || task_type_old == undefined || task_type_old == "undefined" || task_type_old == null || task_type_old == "null")
            var task_type = $("input[type='radio']:checked").val();
        else
            var task_type = task_type_old;
            
        // alert(task_type);
        if (task_type == "System Task") {
            $("#task_title_txt").hide();
            $("#task_title_drop").show();
            $("#sub_title_div").hide();
            getSubTitle(task_title_drop_old);
        } else if (task_type == "Manual") {
            $("#task_title_txt").show();
            $("#task_title_drop").hide();
            $("#sub_title_div").hide();
        }
    }

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });

    $("input[type='radio']:checked").on('change', function() {
        document.getElementById("update").disabled = false;
    });
    // var hidden = $("#floater_policy_type").is(":visible");
    $('#task_title_txt').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#task_title_drop').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#sub_title').on('change', function() {
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
    <?php if ($method == "assign") : ?>
        var val = '<?php echo $task_id; ?>';
        if(val != "")
            onEdit(val);
        else
            TaskType(task_type_old = "");
    <?php endif; ?>

    function onEdit(val) {
        clearError();
        // alert(val);
        $("#task_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
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
                    var sub_title = data["userdata"].sub_title;
                    var task_desc = data["userdata"].task_desc;
                    var staff = data["userdata"].fk_staff_id;
                    var priority = data["userdata"].priority;
                    var start_date = data["userdata"].start_date;
                    var end_date = data["userdata"].end_date;
                    var status = data["userdata"].status;

                    var task_type_flag = false;
                    // alert(task_type);
                    TaskType(task_type,task_title);
                    if (task_type == "Manual") {
                        task_type_flag = true;
                        var task_type_id = "task_type_manual";
                        var task_title_id = "task_title_txt";
                    } else if (task_type == "System Task") {
                        task_type_flag = true;
                        var task_type_id = "task_type_system_task";
                        var task_title_id = "task_title_drop";
                        getSubTitle(task_title);
                    }
                    if (staff != "")
                        var selectedOptions = staff.split(",");
                    else
                        var selectedOptions = "";
                    $("#task_id").text(data["userdata"].task_id);
                    $("#" + task_type_id).prop('checked', task_type_flag);
                    $("#"+task_title_id).val(task_title);
                    $("#task_desc").val(task_desc);
                    $("#staff").val(selectedOptions);
                    $("#priority").val(priority);
                    $("#start_date").val(start_date);
                    $("#end_date").val(end_date);
                    $("#status").val(status);
                    // alert(sub_title);
                    $("#sub_title").val(sub_title);

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
        var task_id = $("#task_id").text();
        // alert(task_id);
        // var task_type = $("#task_type").val();
        var task_type = $("input[type='radio']:checked").val();
        if (task_type == "Manual") {
            var task_title = $("#task_title_txt").val();
        }else if (task_type == "System Task"){
            var task_title = $("#task_title_drop").val();
        }
        var task_desc = $("#task_desc").val();
        var staff = $("#staff").val();
        var priority = $('#priority').val();
        var start_date = $("#start_date").val();
        var end_date = $('#end_date').val();
        var status = $("#status").val();
        var sub_title = $("#sub_title").val();

        if (start_date == "undefined" || start_date == undefined || start_date == "" || start_date == "null") {
            start_date = "";
        }
        if (end_date == "undefined" || end_date == undefined || end_date == "" || end_date == "null") {
            end_date = "";
        }

        if (task_type == "null")
            task_type = "";

        if (task_title == "null")
            task_title = "";
            
        if (sub_title == "null")
            sub_title = "";

        if (priority == "null")
            priority = "";

        if (status == "null")
            status = "";

        if (staff == "null")
            staff = "";

        var form_data = new FormData();
        form_data.append('task_id', task_id);
        form_data.append('task_type', task_type);
        form_data.append('task_title', task_title);
        form_data.append('sub_title', sub_title);
        form_data.append('task_desc', task_desc);
        form_data.append('staff', staff);
        form_data.append('priority', priority);
        form_data.append('start_date', start_date);
        form_data.append('end_date', end_date);
        form_data.append('status', status);

        var url = "<?php echo $base_url; ?>master/task_work/update_assign_task";

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
                    $("#task_type").val("null");
                    $("#task_title").val("null");
                    $("#sub_title").val("null");
                    $("#task_desc").val("null");
                    $("#staff").val("");
                    $("#priority").val("");
                    $("#start_date").val("null");
                    $("#end_date").val("");
                    $("#status").val("");

                    $("#task_type").removeClass("parsley-error");
                    $("#task_title").removeClass("parsley-error");
                    $("#task_desc").removeClass("parsley-error");
                    $("#staff").removeClass("parsley-error");
                    $("#priority").removeClass("parsley-error");
                    $("#start_date").removeClass("parsley-error");
                    $("#end_date").removeClass("parsley-error");
                    $("#status").removeClass("parsley-error");
                    // $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        // location.reload();
                        document.location.href = "<?php echo base_url(); ?>master/task_work/";
                    }, 1000);
                } else {
                    if (data["message"]["task_type_err"] != "")
                        $("#task_type").addClass("parsley-error");
                    else
                        $("#task_type").removeClass("parsley-error");
                    $("#task_type_err").addClass("text-danger").html(data["message"]["task_type_err"]);

                    if (data["message"]["task_title_err"] != ""){
                        if (task_type == "Manual") {
                            $("#task_title_txt").addClass("parsley-error");
                        }else if (task_type == "System Task"){
                            $("#task_title_drop").addClass("parsley-error");
                        }
                    }else{
                        if (task_type == "Manual") {
                            $("#task_title_txt").removeClass("parsley-error");
                        }else if (task_type == "System Task"){
                            $("#task_title_drop").removeClass("parsley-error");
                        }
                    }
                    $("#task_title_err").addClass("text-danger").html(data["message"]["task_title_err"]);

                    if (data["message"]["task_desc_err"] != "")
                        $("#task_desc").addClass("parsley-error");
                    else
                        $("#task_desc").removeClass("parsley-error");
                    $("#task_desc_err").addClass("text-danger").html(data["message"]["task_desc_err"]);

                    if (data["message"]["staff_err"] != "")
                        $("#staff").addClass("parsley-error");
                    else
                        $("#staff").removeClass("parsley-error");
                    $("#staff_err").addClass("text-danger").html(data["message"]["staff_err"]);

                    if (data["message"]["priority_err"] != "")
                        $("#priority").addClass("parsley-error");
                    else
                        $("#priority").removeClass("parsley-error");
                    $("#priority_err").addClass("text-danger").html(data["message"]["priority_err"]);

                    if (data["message"]["start_date_err"] != "")
                        $("#start_date").addClass("parsley-error");
                    else
                        $("#start_date").removeClass("parsley-error");
                    $("#start_date_err").addClass("text-danger").html(data["message"]["start_date_err"]);

                    if (data["message"]["end_date_err"] != "")
                        $("#end_date").addClass("parsley-error");
                    else
                        $("#end_date").removeClass("parsley-error");
                    $("#end_date_err").addClass("text-danger").html(data["message"]["end_date_err"]);

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

    $("#submit").click(function() {
        // var task_type = $("#task_type").val();
        var task_type = $("input[type='radio']:checked").val();
        // alert(task_type);
        if (task_type == "Manual") {
            var task_title = $("#task_title_txt").val();
        }else if (task_type == "System Task"){
            var task_title = $("#task_title_drop").val();
        }
        
        var task_desc = $("#task_desc").val();
        var staff = $("#staff").val();
        var priority = $('#priority').val();
        var start_date = $("#start_date").val();
        var end_date = $('#end_date').val();
        var status = $("#status").val();
        var sub_title = $("#sub_title").val();

        if (start_date == "undefined" || start_date == undefined || start_date == "" || start_date == "null") {
            start_date = "";
        }
        if (end_date == "undefined" || end_date == undefined || end_date == "" || end_date == "null") {
            end_date = "";
        }

        if (task_type == "null")
            task_type = "";

        if (task_title == "null")
            task_title = "";

        if (sub_title == "null")
            sub_title = "";

            // alert(staff);

        if (priority == "null")
            priority = "";

        if (status == "null")
            status = "";

        if (staff == "undefined" || staff == undefined || staff == "" || staff == "null")
            staff = "";

        var form_data = new FormData();
        form_data.append('task_type', task_type);
        form_data.append('task_title', task_title);
        form_data.append('sub_title', sub_title);
        form_data.append('task_desc', task_desc);
        form_data.append('staff', staff);
        form_data.append('priority', priority);
        form_data.append('start_date', start_date);
        form_data.append('end_date', end_date);
        form_data.append('status', status);

        var url = "<?php echo $base_url; ?>master/task_work/assign_task";

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
                    $("#task_type").val("null");
                    $("#task_title").val("null");
                    $("#sub_title").val("null");
                    $("#task_desc").val("null");
                    $("#staff").val("");
                    $("#priority").val("");
                    $("#start_date").val("null");
                    $("#end_date").val("");
                    $("#status").val("");

                    $("#task_type").removeClass("parsley-error");
                    $("#task_title").removeClass("parsley-error");
                    $("#task_desc").removeClass("parsley-error");
                    $("#staff").removeClass("parsley-error");
                    $("#priority").removeClass("parsley-error");
                    $("#start_date").removeClass("parsley-error");
                    $("#end_date").removeClass("parsley-error");
                    $("#status").removeClass("parsley-error");
                    // $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        // location.reload();
                        document.location.href = "<?php echo base_url(); ?>master/task_work/";
                    }, 1000);
                } else {
                    if (data["message"]["task_type_err"] != "")
                        $("#task_type").addClass("parsley-error");
                    else
                        $("#task_type").removeClass("parsley-error");
                    $("#task_type_err").addClass("text-danger").html(data["message"]["task_type_err"]);

                    if (data["message"]["task_title_err"] != ""){
                        if (task_type == "Manual") {
                            $("#task_title_txt").addClass("parsley-error");
                        }else if (task_type == "System Task"){
                            $("#task_title_drop").addClass("parsley-error");
                        }
                    }else{
                        if (task_type == "Manual") {
                            $("#task_title_txt").removeClass("parsley-error");
                        }else if (task_type == "System Task"){
                            $("#task_title_drop").removeClass("parsley-error");
                        }
                    }
                    $("#task_title_err").addClass("text-danger").html(data["message"]["task_title_err"]);

                    if (data["message"]["task_desc_err"] != "")
                        $("#task_desc").addClass("parsley-error");
                    else
                        $("#task_desc").removeClass("parsley-error");
                    $("#task_desc_err").addClass("text-danger").html(data["message"]["task_desc_err"]);

                    if (data["message"]["staff_err"] != "")
                        $("#staff").addClass("parsley-error");
                    else
                        $("#staff").removeClass("parsley-error");
                    $("#staff_err").addClass("text-danger").html(data["message"]["staff_err"]);

                    if (data["message"]["priority_err"] != "")
                        $("#priority").addClass("parsley-error");
                    else
                        $("#priority").removeClass("parsley-error");
                    $("#priority_err").addClass("text-danger").html(data["message"]["priority_err"]);

                    if (data["message"]["start_date_err"] != "")
                        $("#start_date").addClass("parsley-error");
                    else
                        $("#start_date").removeClass("parsley-error");
                    $("#start_date_err").addClass("text-danger").html(data["message"]["start_date_err"]);

                    if (data["message"]["end_date_err"] != "")
                        $("#end_date").addClass("parsley-error");
                    else
                        $("#end_date").removeClass("parsley-error");
                    $("#end_date_err").addClass("text-danger").html(data["message"]["end_date_err"]);

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