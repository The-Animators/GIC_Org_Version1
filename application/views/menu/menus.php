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
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="menu_name" class="col-form-label col-md-4 text-right">Menu Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="menu_name" id="menu_name" value="" placeholder="Enter Menu Name" class="form-control">
                                                    <span id="menu_name_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="menu_url" class="col-form-label col-md-4  text-right">Menu Url<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="menu_url" id="menu_url" value="" placeholder="Enter Menu Url" class="form-control">
                                                    <span id="menu_url_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="menu_icon" class="col-form-label col-md-4  text-right">Menu Icon<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="menu_icon" id="menu_icon" value="" placeholder="Enter Menu Icon" class="form-control">
                                                    <span id="menu_icon_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="menu_order" class="col-form-label col-md-4  text-right">Menu order<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="menu_order" id="menu_order" value="" placeholder="Enter Menu Order" class="form-control">
                                                    <span id="menu_order_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="menu_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-xs">Update</button>
                                                <button id="submit" class="btn btn-primary btn-xs">Save</button>
                                                <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-xs">Delete</button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-xs">Recover</button>
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

                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_menu_name" class="col-form-label col-md-4 text-right">Menu Name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_menu_name" id="filter_menu_name" class="form-control filter_menu_name" placeholder="Enter Menu Name">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_menu_url" class="col-form-label col-md-4 text-right">Menu Url</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_menu_url" id="filter_menu_url" class="form-control filter_menu_url" placeholder="Enter Menu Url">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_menu_icon" class="col-form-label col-md-4 text-right">Menu Icon</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_menu_icon" id="filter_menu_icon" class="form-control filter_menu_icon" placeholder="Enter Menu Icon">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3 row mt-1">
                                        <label for="filter_menu_order" class="col-form-label col-md-4 text-right">Menu Order</label>
                                        <div class="col-md-8">
                                            <input type="text" name="filter_menu_order" id="filter_menu_order" class="form-control filter_menu_order" placeholder="Enter Menu Order">
                                        </div>
                                    </div> -->
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

                                        <div class="col-md-12 mt-1">
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
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_menu_data"></span></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
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
                                        <th><center>Menu Name</center></th>
                                        <th>Menu Url</th>
                                        <th>Menu Icon</th>
                                        <th>Menu Order</th>
                                        <!-- <th>Menu Status</th> -->

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

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_menu_name = $("#filter_menu_name").val();
        var filter_menu_url = $("#filter_menu_url").val();
        var filter_menu_icon = $("#filter_menu_icon").val();
        var filter_menu_order = $("#filter_menu_order").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>sup_admin/menu/filter_menu_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_menu_name: filter_menu_name,
                    filter_menu_url: filter_menu_url,
                    filter_menu_icon: filter_menu_icon,
                    filter_menu_order: filter_menu_order,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_menu_data = 0;
                    $("#total_menu_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var menu_id = "";
                        var menu_name = "";
                        var menu_url = "";
                        var menu_icon = "";
                        var menu_order = "";
                        var menu_status = "";
                        var datas = "";
                        var status = "";
                        total_menu_data = data["total_menu_data"];
                        $("#total_menu_data").text(" Count ( " + total_menu_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            menu_id = parseInt(data[key].menu_id);
                            menu_name = data[key].menu_name;
                            menu_url = data[key].menu_url;
                            menu_icon = data[key].menu_icon;
                            menu_order = data[key].menu_order;
                            menu_status = data[key].menu_status;
                            if (!isNaN(menu_id)) {
                                if (menu_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                // var test_switch = '<input type="checkbox" id="switch" class="checkbox" /><label for="switch" class="toggle"></label>';

                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-xs' id='edit_btn' value='' type='button' onClick ='onEdit(" + menu_id + ")' >Edit</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + menu_id + "' value='' type='button' onClick ='updateStatus(" + menu_id + "," + menu_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item edit' id='edit' value='' type='button' onClick ='onEdit(" + menu_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + menu_id + "' href='javascript:void(0);' id='status_btn_" + menu_id + "' value='' type='button' onClick ='updateStatus(" + menu_id + "," + menu_status + ")' ><b>" + status + "</b></a></div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + menu_name + '</center></td> <td>' + menu_url + '</td> <td>' + menu_icon + '</td><td>' + menu_order + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_menu_data").text(" Count ( " + total_menu_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="6"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_menu_name").val("");
        $("#filter_menu_url").val("");
        $("#filter_menu_icon").val("");
        $("#filter_menu_order").val("");
        $("#filter_status").val("null");
        getMenuList();
    }
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#menu_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#menu_url').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#menu_icon').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#menu_order').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#menu_name").removeClass("parsley-error");
        $("#menu_name_err").removeClass("text-danger").text("");
        $("#menu_url").removeClass("parsley-error");
        $("#menu_url_err").removeClass("text-danger").text("");
        $("#menu_icon").removeClass("parsley-error");
        $("#menu_icon_err").removeClass("text-danger").text("");
        $("#menu_order").removeClass("parsley-error");
        $("#menu_order_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#menu_id").text("");
        $("#menu_name").val("");
        $("#menu_url").val("");
        $("#menu_icon").val("");
        $("#menu_order").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover() {
        var menu_id = $("#menu_id").text();
        var url = "<?php echo $base_url; ?>sup_admin/menu/recover_menu";
        confirmation_alert(id = menu_id, url = url, title = "Menu", type = "Recover");
    }

    function OnDelete() {
        var menu_id = $("#menu_id").text();
        var url = "<?php echo $base_url; ?>sup_admin/menu/remove_menu";
        confirmation_alert(id = menu_id, url = url, title = "Menu", type = "Delet");
    }

    function onEdit(val) {
        clearError();
        $("#menu_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>sup_admin/menu/edit_menu";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    menu_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    $("#menu_id").text(data["userdata"].menu_id);
                    $("#menu_name").val(data["userdata"].menu_name);
                    $("#menu_url").val(data["userdata"].menu_url);
                    $("#menu_icon").val(data["userdata"].menu_icon);
                    $("#menu_order").val(data["userdata"].menu_order);

                    var isActive = data["userdata"].del_flag;

                    if (isActive == 0) {
                        $("#recover").show();
                        $("#update").hide();
                        $("#delete").hide();
                        //$("#clearform").hide();
                    } else {
                        $("#recover").hide();
                        $("#update").show();
                        $("#delete").show();
                        //$("#clearform").show();
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
        var menu_id = $("#menu_id").text();
        var menu_name = $("#menu_name").val();
        var menu_url = $("#menu_url").val();
        var menu_icon = $("#menu_icon").val();
        var menu_order = $("#menu_order").val();
        var url = "<?php echo $base_url; ?>sup_admin/menu/update_menu";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                menu_id: menu_id,
                menu_name: menu_name,
                menu_url: menu_url,
                menu_icon: menu_icon,
                menu_order: menu_order,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#menu_name").val("");
                    $("#menu_url").val("");
                    $("#menu_icon").val("");
                    $("#menu_order").val("");
                    $("#menu_name").removeClass("parsley-error");
                    $("#menu_url").removeClass("parsley-error");
                    $("#menu_icon").removeClass("parsley-error");
                    $("#menu_order").removeClass("parsley-error");

                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["menu_name_err"] != "")
                        $("#menu_name").addClass("parsley-error");
                    else
                        $("#menu_name").removeClass("parsley-error");
                    $("#menu_name_err").addClass("text-danger").html(data["message"]["menu_name_err"]);
                    if (data["message"]["menu_url_err"] != "")
                        $("#menu_url").addClass("parsley-error");
                    else
                        $("#menu_url").removeClass("parsley-error");
                    $("#menu_url_err").addClass("text-danger").html(data["message"]["menu_url_err"]);
                    if (data["message"]["menu_icon_err"] != "")
                        $("#menu_icon").addClass("parsley-error");
                    else
                        $("#menu_icon").removeClass("parsley-error");
                    $("#menu_icon_err").addClass("text-danger").html(data["message"]["menu_icon_err"]);
                    if (data["message"]["menu_order_err"] != "")
                        $("#menu_order").addClass("parsley-error");
                    else
                        $("#menu_order").removeClass("parsley-error");
                    $("#menu_order_err").addClass("text-danger").html(data["message"]["menu_order_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var menu_name = $("#menu_name").val();
        var menu_url = $("#menu_url").val();
        var menu_icon = $("#menu_icon").val();
        var menu_order = $("#menu_order").val();
        var url = "<?php echo $base_url; ?>sup_admin/menu/add_menu";

        $.ajax({
            url: url,
            data: {
                menu_name: menu_name,
                menu_url: menu_url,
                menu_icon: menu_icon,
                menu_order: menu_order,
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
                    $("#menu_name").val("");
                    $("#menu_url").val("");
                    $("#menu_icon").val("");
                    $("#menu_order").val("");
                    $("#menu_name").removeClass("parsley-error");
                    $("#menu_url").removeClass("parsley-error");
                    $("#menu_icon").removeClass("parsley-error");
                    $("#menu_order").removeClass("parsley-error");

                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["menu_name_err"] != "")
                        $("#menu_name").addClass("parsley-error");
                    else
                        $("#menu_name").removeClass("parsley-error");
                    $("#menu_name_err").addClass("text-danger").html(data["message"]["menu_name_err"]);
                    if (data["message"]["menu_url_err"] != "")
                        $("#menu_url").addClass("parsley-error");
                    else
                        $("#menu_url").removeClass("parsley-error");
                    $("#menu_url_err").addClass("text-danger").html(data["message"]["menu_url_err"]);
                    if (data["message"]["menu_icon_err"] != "")
                        $("#menu_icon").addClass("parsley-error");
                    else
                        $("#menu_icon").removeClass("parsley-error");
                    $("#menu_icon_err").addClass("text-danger").html(data["message"]["menu_icon_err"]);
                    if (data["message"]["menu_order_err"] != "")
                        $("#menu_order").addClass("parsley-error");
                    else
                        $("#menu_order").removeClass("parsley-error");
                    $("#menu_order_err").addClass("text-danger").html(data["message"]["menu_order_err"]);
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    getMenuList();

    function getMenuList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>sup_admin/menu/get_menu_list";
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
                    var total_menu_data = 0;
                    $("#total_menu_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var menu_id = "";
                        var menu_name = "";
                        var menu_url = "";
                        var menu_icon = "";
                        var menu_order = "";
                        var menu_status = "";
                        var datas = "";
                        var status = "";
                        total_menu_data = data["total_menu_data"];
                        $("#total_menu_data").text(" Count ( " + total_menu_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            menu_id = parseInt(data[key].menu_id);
                            menu_name = data[key].menu_name;
                            menu_url = data[key].menu_url;
                            menu_icon = data[key].menu_icon;
                            menu_order = data[key].menu_order;
                            menu_status = data[key].menu_status;
                            if (!isNaN(menu_id)) {
                                if (menu_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                // var test_switch = '<input type="checkbox" id="switch" class="checkbox" /><label for="switch" class="toggle"></label>';

                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-xs' id='edit_btn' value='' type='button' onClick ='onEdit(" + menu_id + ")' >Edit</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + menu_id + "' value='' type='button' onClick ='updateStatus(" + menu_id + "," + menu_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item edit' id='edit' value='' type='button' onClick ='onEdit(" + menu_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + menu_id + "' href='javascript:void(0);' id='status_btn_" + menu_id + "' value='' type='button' onClick ='updateStatus(" + menu_id + "," + menu_status + ")' ><b>" + status + "</b></a></div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + menu_name + '</center></td> <td>' + menu_url + '</td> <td>' + menu_icon + '</td><td>' + menu_order + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_menu_data").text(" Count ( " + total_menu_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="6"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(menu_id, menu_status) {

        var url = "<?php echo $base_url; ?>sup_admin/menu/update_status";

        if (menu_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": menu_id,
                    "status": menu_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + menu_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["menu_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light";
                            $("#edit_" + menu_id).addClass(status_btn_txt);
                            $("#status_btn_" + menu_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light";
                            $("#edit_" + menu_id).addClass(status_btn_txt);
                            $("#status_btn_" + menu_id).text(status);
                        }

                        $("#status_btn_" + menu_id).text(status);


                        $('#status_btn_' + menu_id).attr('onClick', 'updateStatus(' + menu_id + ',' + data["userdata"]["menu_status"] + ')');

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