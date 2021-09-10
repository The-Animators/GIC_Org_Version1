<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<style>
    .table td,
    .table th {
        padding: .2rem;
    }
</style>
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
                                <div class="col-md-4">
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
                                                        <option value="<?php echo $row["staff_id"]; ?>"><?php echo $row["staff_name"]; ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                            <span id="staff_err"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="ip_address" class="col-form-label col-md-4 text-right">IP Address<span class="text-danger">*</span></label>
                                        <div class="col-md-8" id="ip_add_table_div">
                                            <table class="table mb-0 table-bordered" id="ip_add_first_table">
                                                <thead>
                                                    <tr>
                                                        <th><button class="btn btn-primary btn-xs ip_address fa fa-plus" id="Ip_Address" onclick="Add_IP_Address(0)"></button></th>
                                                        <th>Device IP</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ip_add_first_tbody"></tbody>
                                            </table>
                                        </div>
                                        <!-- <div class="col-md-8">
                                            <input type="text" name="ip_address" id="ip_address" class="form-control" placeholder="Enter IP Address">
                                            <span id="ip_address_err"></span>
                                        </div> -->
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
                                <div class="col-md-4">
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
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="ip_address" class="col-form-label col-md-4 text-right">IP Address<span class="text-danger">*</span></label>
                                        <div class="col-form-label col-md-8" id="ip_address_det"></div>
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
                                <h4 class="header-title"><?php echo $title; ?> List</h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <!-- <input class='btn btn-facebook btn-sm' id='AddForm' value='Add <?php echo $title; ?>' type='button' /> -->
                                <button class='btn btn-facebook btn-sm' id='AddForm' title='Add <?php echo $title; ?>' type='button'> <i class="fa fa-plus" aria-hidden="true"></i></button>
                                <span id="global_btn"></span>
                            </div>

                        </div>


                        <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Staff</th>
                                    <th>Role</th>
                                    <th>IP Address</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Action</th>
                                    <th>Staff</th>
                                    <th>Role</th>
                                    <th>IP Address</th>
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
    var add_ip_counter = 0;
    var main_Ip_Address_Arr = [];
    var actual_Ip_Address_data_Arr = [];

    function Total_IP_Address() {
        actual_Ip_Address_data_Arr = [];

        $("#ip_add_first_table tr:has(.ip_address)").each(function(key, val) {
            var ip_address = $(".ip_address", this).val();

            actual_Ip_Address_data_Arr.push([key, ip_address]);
            if (ip_address == '')
                actual_Ip_Address_data_Arr.splice(key, 1);
        });
        return actual_Ip_Address_data_Arr;
    }

    function remove_IP_Address(add_ip_counter) {
        $("#remove_ip_address_" + add_ip_counter).closest("tr").remove();
        var indexValue = main_Ip_Address_Arr.indexOf(add_ip_counter);
        main_Ip_Address_Arr.splice(indexValue, 1);
        if (main_Ip_Address_Arr.length == 0) {
            add_ip_counter = 0;
            main_Ip_Address_Arr = [];
            $("#Ip_Address").attr("onClick", "Add_IP_Address(" + add_ip_counter + ")");
        }
    }

    function Add_IP_Address(add_ip_counter) {
        main_Ip_Address_Arr.push(add_ip_counter);
        var tr_table = '<tr><td style="padding: .1rem;"><button class="btn btn-danger btn-xs fa fa-trash remove_ip_address" id="remove_ip_address_' + add_ip_counter + '" onClick="remove_IP_Address(' + add_ip_counter + ');remove_click(' + add_ip_counter + ')" ></td><td style="padding: .1rem;"><input type="text" name="ip_address" id="ip_address_' + add_ip_counter + '" class="form-control ip_address" placeholder="Enter IP Address" onkeyup="keyup(' + add_ip_counter + ')"></td> </tr>';
        $("#ip_add_first_tbody").append(tr_table);
        add_ip_counter = add_ip_counter + 1;
        $("#Ip_Address").attr("onClick", "Add_IP_Address(" + add_ip_counter + ")");
    }

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });

    function keyup_back(){
        $.each(main_Ip_Address_Arr, function(key, val) {
            $('#ip_address_' + key).on('keyup', function() {
                document.getElementById("update").disabled = false;
            });
            $('#remove_ip_address_' + key).on('click', function() {
                document.getElementById("update").disabled = false;
            });
        });
    }

    function keyup(add_ip_counter){
        $('#ip_address_' + add_ip_counter).on('keyup', function() {
            document.getElementById("update").disabled = false;
        });
    }

    function remove_click(add_ip_counter){
        document.getElementById("update").disabled = false;
    }
    $('#Ip_Address').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('#staff').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#user_role').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#ip_address").removeClass("parsley-error");
        $("#ip_address_err").removeClass("text-danger").text("");

        $("#staff").removeClass("parsley-error");
        $("#staff_err").removeClass("text-danger").text("");

        $("#user_role").removeClass("parsley-error");
        $("#user_role_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#ip_address_id").text("");
        $("#ip_address").val("");
        $("#staff").val("null");
        $("#user_role").val("null");
        $(".ip_address").val("");
        $("#ip_add_first_tbody").empty();
        $("#IP_Address").attr("onClick", "Add_IP_Address(0)");
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
                    fk_staff_id = data["userdata"].fk_staff_id;
                    fk_user_role_id = data["userdata"].fk_user_role_id;
                    $("#ip_address_id").text(data["userdata"].ip_address_id);
                    // $("#ip_address").val(data["userdata"].ip_address);
                    $("#staff").val(fk_staff_id);
                    $("#user_role").val(fk_user_role_id);

                    var ip_address = JSON.parse(data["userdata"].ip_address);
                    var index = "";
                    var tr_table = "";
                    var ip_address_length = ip_address.length;
                    $("#Ip_Address").attr("onClick", "Add_IP_Address(" + ip_address_length + ")");
                    // alert(ip_address_length);
                    $.each(ip_address,function(key,val){
                        add_ip_counter = key;
                        main_Ip_Address_Arr.push(add_ip_counter);
                        index = ip_address[key][0];
                        var ip_address_name = ip_address[key][1];
                        // alert(ip_address_length);
                        tr_table += '<tr><td style="padding: .1rem;"><button class="btn btn-danger btn-xs fa fa-trash remove_ip_address" id="remove_ip_address_' + add_ip_counter + '" onClick="remove_IP_Address(' + add_ip_counter + ');remove_click(' + add_ip_counter + ')" ></td><td style="padding: .1rem;"><input type="text" name="ip_address" id="ip_address_' + add_ip_counter + '" class="form-control ip_address" placeholder="Enter IP Address" onkeyup="keyup(' + add_ip_counter + ')" value="'+ip_address_name+'"></td> </tr>';
                    });
                    $("#ip_add_first_tbody").append(tr_table);
                    // $("#IP_Address").attr("onClick", "Add_IP_Address(" + ip_address_length + ")");

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
        // var ip_address = $("#ip_address").val();
        var ip_address = JSON.stringify(Total_IP_Address());
        // alert(ip_address);
        // return false;
        var staff = $("#staff").val();
        var user_role = $("#user_role").val();

        if (staff == "null")
            staff = "";

        if (user_role == "null")
            user_role = "";

        var form_data = new FormData();
        form_data.append('ip_address_id', ip_address_id);
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
        // var ip_address = $("#ip_address").val();
        var ip_address = JSON.stringify(Total_IP_Address());
        var staff = $("#staff").val();
        var user_role = $("#user_role").val();

        if (staff == "null")
            staff = "";

        if (user_role == "null")
            user_role = "";

        var form_data = new FormData();
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
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var ip_address_id = "";
                        var ip_address = "";
                        var ip_address_status = "";
                        var datas = "";
                        var status = "";
                        $.each(data, function(key, val) {

                            ip_address_id = parseInt(data[key].ip_address_id);
                            ip_address = data[key].ip_address;
                            staff = data[key].staff_name;
                            user_role = data[key].user_role_title;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            ip_address_status = data[key].ip_address_status;
                            var isActive = data[key].del_flag;

                            if (!isNaN(ip_address_id)) {
                                if (ip_address_status == 1) {
                                    status = '<i class="fa fa-toggle-on" aria-hidden="true"></i>';
                                    var status_btn_txt = "btn btn-outline-success waves-effect waves-light mt-1 btn-sm edit";
                                } else {
                                    status = '<i class="fa fa-toggle-off" aria-hidden="true"></i>';
                                    var status_btn_txt = "btn btn-outline-danger waves-effect waves-light mt-1 btn-sm edit";
                                }

                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<button class='btn btn-facebook btn-sm mt-1 ml-1 delete' value='' type='button' onClick ='OnDelete(" + ip_address_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + ip_address_id + ")' class='btn btn btn-facebook btn-sm mt-1 ml-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button>";
                                }
                                var view_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 view' id='view' value='' type='button' onClick ='onView(" + ip_address_id + ")' ><i class='fas fa-eye'></i></button>";

                                // if ((user_role_id == 1) || (user_role_id == 2)) {
                                //     $("#global_btn").append('<button id="global_local" onclick="Global_Local()" class="btn btn-primary btn-sm">Update</button>');
                                // }


                                edit_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 edit' id='edit' value='' type='button' onClick ='onEdit(" + ip_address_id + ")' ><i class='fas fa-pencil-alt'></i></button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + ip_address_id + "' value='' type='button' onClick ='update_ip_address_status(" + ip_address_id + "," + ip_address_status + ")' >" + status + "</button>";

                                datas += '<tr><td>' + edit_btn + ' ' + view_btn + ' ' + status_btn + ' ' + delete_btn_txt + '</td><td>' + staff + '</td><td>' + user_role + '</td><td>' + ip_address + '</td></tr>';
                            }
                        });

                    } else {
                        datas = '<tr><td colspan="7"><center>Data Not Found</center></td> </tr>';
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
        var user_role_id = <?php echo $this->session->userdata("@_user_role_id"); ?>;
        var staff_id = <?php echo $this->session->userdata("@_staff_id"); ?>;

        var form_data = new FormData();
        form_data.append('global_id', global_id);
        form_data.append('global_ip_address_btn_status', global_ip_address_btn_status);
        form_data.append('user_role_id', user_role_id);
        form_data.append('staff_id', staff_id);

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

    function update_ip_address_status(ip_address_id, ip_address_status) {

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