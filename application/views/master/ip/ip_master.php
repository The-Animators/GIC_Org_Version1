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
                        <h4 class="page-title"><?php echo $title; ?> Master</h4>
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
                            <h4 class="modal-title"><?php echo $title; ?> Master Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <!-- <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="user_role" class="col-form-label col-md-4 text-right">User Roles<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <select name="user_role" id="user_role" class="form-control">
                                                <option value="null">Select Role</option>
                                                <?php $userrole_list = userrole_dropdown();
                                                if (!empty($userrole_list)) : foreach ($userrole_list as $row1) : ?>
                                                        <option value="<?php echo $row1["user_role_id"]; ?>"><?php echo $row1["user_role_title"]; ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                            <span id="user_role_err"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="staff" class="col-form-label col-md-4 text-right">Staff<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <select name="staff" id="staff" class="form-control">
                                                <option value="null">Select Staff</option>
                                                <?php $staff_list = staff_dropdown();
                                                if (!empty($staff_list)) : foreach ($staff_list as $row) : ?>
                                                        <option value="<?php echo $row["ip_address_id"]; ?>"><?php echo $row["staff_name"]; ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                            <span id="staff_err"></span>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="user_name" class="col-form-label col-md-4 text-right">User Name<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name">
                                            <span id="user_name_err"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label for="ip_address" class="col-form-label col-md-2 text-right">IP Address<span class="text-danger">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" name="ip_address" id="ip_address" class="form-control" placeholder="Enter IP Address">
                                            <span id="ip_address_err"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label id="ip_address_id" hidden>1</label>
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

            <div id="view_form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">View <?php echo $title; ?> Master Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <!-- <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="user_role" class="col-form-label col-md-4 text-right">User Roles<span class="text-danger">*</span></label>
                                        <div class="col-form-label col-md-8" id="user_role_det"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="staff" class="col-form-label col-md-4 text-right">Staff<span class="text-danger">*</span></label>
                                        <div class="col-form-label col-md-8" id="staff_det"></div>
                                    </div>
                                </div> -->
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">User Name :</td>
                                                <td><strong><span id="user_name_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">IP Address :</td>
                                                <td><strong><span id="ip_address_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <!-- <div class="form-group row">
                                        <label for="ip_address" class="col-form-label col-md-4 text-right">IP Address<span class="text-danger">*</span></label>
                                        <div class="col-form-label col-md-8" id="ip_address_det"></div>
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
                                        <!-- <div class="col-md-3 row">
                                        <label for="filter_year" class="col-form-label col-md-4 text-right">Year</label>
                                        <div class="col-md-8">
                                            <select class="form-control" id="filter_year" name="filter_year">
                                                <option value="null">Select Year</option>
                                                <?php
                                                $currently_selected = date('Y');
                                                $earliest_year = 1950;
                                                $latest_year = date('Y', strtotime('+20 years'));;
                                                foreach (range($latest_year, $earliest_year) as $i) :
                                                ?>
                                                    <option value="<?php echo $i; ?>" <?php if ($i == $currently_selected) echo "selected"; ?>><?php echo $i; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 row">
                                        <label for="filter_month" class="col-form-label col-md-4 text-right">Month</label>
                                        <div class="col-md-8">
                                            <select class="form-control" id="filter_month" name="filter_month">
                                                <option value="null">Select Month</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 row">
                                        <label for="filter_day" class="col-form-label col-md-4 text-right">Day</label>
                                        <div class="col-md-8">
                                            <select class="form-control" id="filter_day" name="filter_day">
                                                <option value="null">Select Day</option>
                                                <?php for ($i = 1; $i <= 31; $i++) : if ($i < 10) : $i = "0" . $i;
                                                    endif; ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div> -->
                                        <div class="col-md-3 row">
                                            <label for="filter_user_name" class="col-form-label col-md-4 text-right">User Name</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="filter_user_name" name="filter_user_name" placeholder="Enter User Name">
                                            </div>
                                        </div>

                                        <div class="col-md-3 row">
                                            <label for="filter_ip_address" class="col-form-label col-md-4 text-right">IP Address</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="filter_ip_address" name="filter_ip_address" placeholder="Enter Ip Address">
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
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs  mr-4" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_ip_add_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4"></div> -->
                            <div class="col-md-6 text-right">
                                <!-- <input class='btn btn-facebook btn-sm' id='AddForm' value='Add <?php echo $title; ?>' type='button' /> -->
                                <button class='btn btn-facebook btn-xs' id='AddForm' title='Add' type='button'> <i class="fa fa-plus" aria-hidden="true"></i></button>
                                <span id="global_btn"></span>
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>

                        </div>



                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <!-- <th>Staff</th>
                                    <th>Role</th> -->
                                        <th>
                                            <center>User Name</center>
                                        </th>
                                        <th>
                                            <center>IP Address</center>
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
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });

    $('#staff').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#user_role').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#ip_address').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#user_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#user_name").removeClass("parsley-error");
        $("#user_name_err").removeClass("text-danger").text("");

        $("#ip_address").removeClass("parsley-error");
        $("#ip_address_err").removeClass("text-danger").text("");

        $("#staff").removeClass("parsley-error");
        $("#staff_err").removeClass("text-danger").text("");

        $("#user_role").removeClass("parsley-error");
        $("#user_role_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#ip_address_id").text("");
        $("#user_name").val("");
        $("#ip_address").val("");
        $("#staff").val("null");
        $("#user_role").val("null");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(ip_address_id) {
        var url = "<?php echo $base_url; ?>master/ip_master/recover_ip_address";
        confirmation_alert(id = ip_address_id, url = url, title = "IP Address", type = "Recover");
    }

    function OnDelete(ip_address_id) {
        var url = "<?php echo $base_url; ?>master/ip_master/remove_ip_address";
        confirmation_alert(id = ip_address_id, url = url, title = "IP Address", type = "Delet");
    }

    function onView(val) {
        clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/ip_master/edit_ip_address";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    ip_address_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#user_name_det").text(data["userdata"].user_name);
                    $("#ip_address_det").text(data["userdata"].ip_address);
                    $("#staff_det").text(data["userdata"].staff_name);
                    $("#user_role_det").text(data["userdata"].user_role_title);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {

        clearError();
        uninitialize();
        $("#ip_address_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/ip_master/edit_ip_address";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    ip_address_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    fk_ip_address_id = data["userdata"].fk_ip_address_id;
                    fk_user_role_id = data["userdata"].fk_user_role_id;
                    $("#ip_address_id").text(data["userdata"].ip_address_id);
                    $("#user_name").val(data["userdata"].user_name);
                    $("#ip_address").val(data["userdata"].ip_address);
                    $("#staff").val(fk_ip_address_id);
                    $("#user_role").val(fk_user_role_id);

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
        var ip_address_id = $("#ip_address_id").text();
        var user_name = $("#user_name").val();
        var ip_address = $("#ip_address").val();
        var staff = $("#staff").val();
        var user_role = $("#user_role").val();

        if (staff == "null")
            staff = "";

        if (user_role == "null")
            user_role = "";

        var form_data = new FormData();
        form_data.append('ip_address_id', ip_address_id);
        form_data.append('user_name', user_name);
        form_data.append('ip_address', ip_address);
        form_data.append('staff', staff);
        form_data.append('user_role', user_role);

        var url = "<?php echo $base_url; ?>master/ip_master/update_ip_address";

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
                    $("#ip_address").val("");
                    $("#ip_address").removeClass("parsley-error");
                    $("#ip_address_err").removeClass("text-danger");

                    $("#user_name").val("");
                    $("#user_name").removeClass("parsley-error");
                    $("#user_name_err").removeClass("text-danger");

                    $("#staff").val("");
                    $("#staff").removeClass("parsley-error");
                    $("#staff_err").removeClass("text-danger");

                    $("#user_role").val("");
                    $("#user_role").removeClass("parsley-error");
                    $("#user_role_err").removeClass("text-danger");

                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["user_name_err"] != "")
                        $("#user_name").addClass("parsley-error");
                    else
                        $("#user_name").removeClass("parsley-error");
                    $("#user_name_err").addClass("text-danger").html(data["message"]["user_name_err"]);

                    if (data["message"]["ip_address_err"] != "")
                        $("#ip_address").addClass("parsley-error");
                    else
                        $("#ip_address").removeClass("parsley-error");
                    $("#ip_address_err").addClass("text-danger").html(data["message"]["ip_address_err"]);

                    if (data["message"]["staff_err"] != "")
                        $("#staff").addClass("parsley-error");
                    else
                        $("#staff").removeClass("parsley-error");
                    $("#staff_err").addClass("text-danger").html(data["message"]["staff_err"]);

                    if (data["message"]["user_role_err"] != "")
                        $("#user_role").addClass("parsley-error");
                    else
                        $("#user_role").removeClass("parsley-error");
                    $("#user_role_err").addClass("text-danger").html(data["message"]["user_role_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var user_name = $("#user_name").val();
        var ip_address = $("#ip_address").val();
        var staff = $("#staff").val();
        var user_role = $("#user_role").val();

        if (staff == "null")
            staff = "";

        if (user_role == "null")
            user_role = "";

        var form_data = new FormData();
        form_data.append('user_name', user_name);
        form_data.append('ip_address', ip_address);
        form_data.append('staff', staff);
        form_data.append('user_role', user_role);

        var url = "<?php echo $base_url; ?>master/ip_master/add_ip_address";

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
                    $("#ip_address").val("");
                    $("#ip_address").removeClass("parsley-error");
                    $("#ip_address_err").removeClass("text-danger");

                    $("#user_name").val("");
                    $("#user_name").removeClass("parsley-error");
                    $("#user_name_err").removeClass("text-danger");

                    $("#user_role").val("");
                    $("#user_role").removeClass("parsley-error");
                    $("#user_role_err").removeClass("text-danger");

                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["user_name_err"] != "")
                        $("#user_name").addClass("parsley-error");
                    else
                        $("#user_name").removeClass("parsley-error");
                    $("#user_name_err").addClass("text-danger").html(data["message"]["user_name_err"]);

                    if (data["message"]["ip_address_err"] != "")
                        $("#ip_address").addClass("parsley-error");
                    else
                        $("#ip_address").removeClass("parsley-error");
                    $("#ip_address_err").addClass("text-danger").html(data["message"]["ip_address_err"]);

                    if (data["message"]["staff_err"] != "")
                        $("#staff").addClass("parsley-error");
                    else
                        $("#staff").removeClass("parsley-error");
                    $("#staff_err").addClass("text-danger").html(data["message"]["staff_err"]);

                    if (data["message"]["user_role_err"] != "")
                        $("#user_role").addClass("parsley-error");
                    else
                        $("#user_role").removeClass("parsley-error");
                    $("#user_role_err").addClass("text-danger").html(data["message"]["user_role_err"]);
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

        var filter_ip_address = $("#filter_ip_address").val();
        var filter_user_name = $("#filter_user_name").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>master/ip_master/filter_ip_add";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_user_name: filter_user_name,
                    filter_ip_address: filter_ip_address,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var datas = "";
                    var total_ip_add_data = 0;
                    $("#total_ip_add_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var ip_address_id = "";
                        var ip_address = "";
                        var ip_address_status = "";
                        var datas = "";
                        var status = "";

                        total_ip_add_data = data["total_ip_add_data"];
                        $("#total_ip_add_data").text(" Count ( " + total_ip_add_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            ip_address_id = parseInt(data[key].ip_address_id);
                            user_name = data[key].user_name;
                            ip_address = data[key].ip_address;
                            staff = data[key].staff_name;
                            user_role = data[key].user_role_title;
                            fk_ip_address_id = data[key].fk_ip_address_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            ip_address_status = data[key].ip_address_status;
                            var isActive = data[key].del_flag;
                            if (user_name == "" || user_name == null || user_name == undefined)
                                user_name = "";
                            else
                                user_name = user_name;

                            if (!isNaN(ip_address_id)) {
                                if (ip_address_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";

                                    // var delete_btn_txt = "<button class='btn btn-facebook btn-sm mt-1 ml-1 delete' value='' type='button' onClick ='OnDelete(" + ip_address_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='#' id='delete' value='' type='button' onClick ='OnDelete(" + ip_address_id + ")' ><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + ip_address_id + ")' class='btn btn btn-facebook btn-sm mt-1 ml-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button>";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='#' id='recover' value='' type='button' onClick ='OnRecover(" + ip_address_id + ")' ><b>Recover</b></a>";
                                }
                                var view_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 view' id='view' value='' type='button' onClick ='onView(" + ip_address_id + ")' ><i class='fas fa-eye'></i></button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='#' id='view' value='' type='button' onClick ='onView(" + ip_address_id + ")'><b>View</b></a><a class='dropdown-item edit' href='#' id='edit' onClick ='onEdit(" + ip_address_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + ip_address_id + "' href='#' id='status_btn_" + ip_address_id + "' value='' type='button' onClick ='updateStatus(" + ip_address_id + "," + ip_address_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                edit_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 edit' id='edit' value='' type='button' onClick ='onEdit(" + ip_address_id + ")' ><i class='fas fa-pencil-alt'></i></button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + ip_address_id + "' value='' type='button' onClick ='update_ip_address_status(" + ip_address_id + "," + ip_address_status + ")' >" + status + "</button>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + user_name + '</center></td><td><center>' + ip_address + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_ip_add_data").text(" Count ( " + total_ip_add_data + " ) ");
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
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');
        $("#filter_user_name").val("");
        $("#filter_ip_address").val("");
        $("#filter_status").val("null");
        get_ip_address_list();
    }

    get_ip_address_list();

    function get_ip_address_list() {
        // var user_role_id = <?php echo $this->session->userdata("@_user_role_id"); ?>;

        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/ip_master/get_ip_address_list";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var datas = "";
                    var total_ip_add_data = 0;
                    $("#total_ip_add_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var ip_address_id = "";
                        var ip_address = "";
                        var ip_address_status = "";
                        var datas = "";
                        var status = "";

                        total_ip_add_data = data["total_ip_add_data"];
                        $("#total_ip_add_data").text(" Count ( " + total_ip_add_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            ip_address_id = parseInt(data[key].ip_address_id);
                            user_name = data[key].user_name;
                            ip_address = data[key].ip_address;
                            staff = data[key].staff_name;
                            user_role = data[key].user_role_title;
                            fk_ip_address_id = data[key].fk_ip_address_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            ip_address_status = data[key].ip_address_status;
                            var isActive = data[key].del_flag;
                            if (user_name == "" || user_name == null || user_name == undefined)
                                user_name = "";
                            else
                                user_name = user_name;

                            if (!isNaN(ip_address_id)) {
                                if (ip_address_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";

                                    // var delete_btn_txt = "<button class='btn btn-facebook btn-sm mt-1 ml-1 delete' value='' type='button' onClick ='OnDelete(" + ip_address_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='#' id='delete' value='' type='button' onClick ='OnDelete(" + ip_address_id + ")' ><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + ip_address_id + ")' class='btn btn btn-facebook btn-sm mt-1 ml-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button>";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='#' id='recover' value='' type='button' onClick ='OnRecover(" + ip_address_id + ")' ><b>Recover</b></a>";
                                }
                                var view_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 view' id='view' value='' type='button' onClick ='onView(" + ip_address_id + ")' ><i class='fas fa-eye'></i></button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='#' id='view' value='' type='button' onClick ='onView(" + ip_address_id + ")'><b>View</b></a><a class='dropdown-item edit' href='#' id='edit' onClick ='onEdit(" + ip_address_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + ip_address_id + "' href='#' id='status_btn_" + ip_address_id + "' value='' type='button' onClick ='updateStatus(" + ip_address_id + "," + ip_address_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                edit_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 edit' id='edit' value='' type='button' onClick ='onEdit(" + ip_address_id + ")' ><i class='fas fa-pencil-alt'></i></button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + ip_address_id + "' value='' type='button' onClick ='update_ip_address_status(" + ip_address_id + "," + ip_address_status + ")' >" + status + "</button>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + user_name + '</center></td><td><center>' + ip_address + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_ip_add_data").text(" Count ( " + total_ip_add_data + " ) ");
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

    Global_Local();

    function Global_Local() {
        var user_role_id = <?php echo $this->session->userdata("@_user_role_id"); ?>;

        var url = "<?php echo $base_url; ?>master/ip_master/get_global_local_status";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var global_ip_address_btn_status_txt = "";
                    $("#global_btn").empty();

                    if (data["status"] == true) {
                        var global_id = data["userdata"].global_id;
                        var global_ip_address_btn_status = data["userdata"].global_ip_address_btn_status;

                        if (global_ip_address_btn_status == 1) {
                            global_ip_address_btn_status_txt = "Global";
                            var btn_status = 'btn btn-outline-danger waves-effect waves-light btn-xs';
                        } else if (global_ip_address_btn_status == 2) {
                            global_ip_address_btn_status_txt = "Local";
                            var btn_status = 'btn btn-outline-success waves-effect waves-light btn-xs';
                        }

                        if ((user_role_id == 1) || (user_role_id == 2)) {
                            $("#global_btn").append('<button id="global_local" onclick=update_Global_Local_status("' + global_id + '","' + global_ip_address_btn_status + '") class="' + btn_status + '">' + global_ip_address_btn_status_txt + '</button>');
                        }

                    } else {
                        var global_id = "";
                        if ((user_role_id == 1) || (user_role_id == 2)) {
                            $("#global_btn").append('<button id="global_local" onclick=update_Global_Local_status("' + global_id + '",1) class="btn btn-outline-danger waves-effect waves-light btn-xs">Global</button>');
                        }
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function update_Global_Local_status(global_id, global_ip_address_btn_status) {
        var user_role_id = '<?php echo $this->session->userdata("@_user_role_id"); ?>';
        var ip_address_id = '<?php echo $this->session->userdata("@_ip_address_id"); ?>';

        var form_data = new FormData();
        form_data.append('global_id', global_id);
        form_data.append('global_ip_address_btn_status', global_ip_address_btn_status);
        form_data.append('user_role_id', user_role_id);
        form_data.append('ip_address_id', ip_address_id);

        var url = "<?php echo $base_url; ?>master/ip_master/update_global_local_status";

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
                    Global_Local();
                } else {

                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function updateStatus(ip_address_id, ip_address_status) {

        var url = "<?php echo $base_url; ?>master/ip_master/update_ip_address_status";

        if (ip_address_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": ip_address_id,
                    "status": ip_address_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + ip_address_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["ip_address_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + ip_address_id).addClass(status_btn_txt);
                            $("#status_btn_" + ip_address_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + ip_address_id).addClass(status_btn_txt);
                            $("#status_btn_" + ip_address_id).text(status);
                        }

                        $("#status_btn_" + ip_address_id).text(status);


                        $('#status_btn_' + ip_address_id).attr('onClick', 'updateStatus(' + ip_address_id + ',' + data["userdata"]["ip_address_status"] + ')');

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
                CheckFormAccess(submenu_permission, 37, url);
                check(role_permission, 37);
            }
        }
    });
</script>