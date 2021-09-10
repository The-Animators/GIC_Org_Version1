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
                                                    <select class="form-control" id="menu_name" name="menu_name">
                                                        <option value="null">Select Menu</option>
                                                        <?php foreach ($menu as $row) : ?>
                                                            <option value="<?php echo $row["menu_id"]; ?>"><?php echo $row["menu_name"]; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span id="menu_name_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="submenu_name" class="col-form-label col-md-4 text-right">Sub-Menu Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="submenu_name" id="submenu_name" value="" placeholder="Enter Sub-Menu Name" class="form-control">
                                                    <span id="submenu_name_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="submenu_url" class="col-form-label col-md-4  text-right">Sub-Menu Url<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="submenu_url" id="submenu_url" value="" placeholder="Enter Sub-Menu Url" class="form-control">
                                                    <span id="submenu_url_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="submenu_order" class="col-form-label col-md-4  text-right">Sub-Menu order<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="submenu_order" id="submenu_order" value="" placeholder="Enter Sub-Menu Order" class="form-control">
                                                    <span id="submenu_order_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="submenu_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary  btn-xs">Update</button>
                                                <button id="submit" class="btn btn-primary  btn-xs">Save</button>
                                                <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary  btn-xs">Delete</button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary  btn-xs">Recover</button>
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
                                                <select class="form-control" id="filter_menu_name" name="filter_menu_name">
                                                    <option value="null">Select Menu</option>
                                                    <?php foreach ($menu as $row) : ?>
                                                        <option value="<?php echo $row["menu_id"]; ?>"><?php echo $row["menu_name"]; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_submenu_name" class="col-form-label col-md-4 text-right">Sub-Menu Name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_submenu_name" id="filter_submenu_name" class="form-control filter_submenu_name" placeholder="Enter Sub-Menu Name">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_submenu_url" class="col-form-label col-md-4 text-right">Sub-Menu Url</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_submenu_url" id="filter_submenu_url" class="form-control filter_submenu_url" placeholder="Enter Menu Url">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_submenu_order" class="col-form-label col-md-4 text-right">Sub-Menu Order</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_submenu_order" id="filter_submenu_order" class="form-control filter_submenu_order" placeholder="Enter Sub-Menu Order">
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
                            <div class="col-md-6">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_submenu_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <input class='btn btn-facebook btn-xs ' id='AddForm' value='Add' type='button' />
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                                <a href="<?php echo base_url(); ?>sup_admin/menu" class='btn btn-secondary btn-xs ' id='Back' value='Back' type='button'>Back</a>
                            </div>

                        </div>

                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th><center>Menu Name</center></th>
                                        <th>Sub-Menu Name</th>
                                        <th>Sub-Menu Url</th>
                                        <th>Sub-Menu Order</th>
                                        <!-- <th>Sub-Menu Status</th> -->

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
        var filter_submenu_name = $("#filter_submenu_name").val();
        var filter_submenu_url = $("#filter_submenu_url").val();
        var filter_submenu_icon = $("#filter_submenu_icon").val();
        var filter_submenu_order = $("#filter_submenu_order").val();
        var filter_status = $("#filter_status").val();

        if (filter_menu_name == "null")
            filter_menu_name = "";
        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>sup_admin/menu/filter_submenu_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_menu_name: filter_menu_name,
                    filter_submenu_name: filter_submenu_name,
                    filter_submenu_url: filter_submenu_url,
                    filter_submenu_icon: filter_submenu_icon,
                    filter_submenu_order: filter_submenu_order,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_submenu_data = 0;
                    $("#total_submenu_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var submenu_id = "";
                        var menu_name = "";
                        var submenu_name = "";
                        var submenu_url = "";
                        var submenu_order = "";
                        var submenu_status = "";
                        var datas = "";
                        var status = "";
                        total_submenu_data = data["total_submenu_data"];
                        $("#total_submenu_data").text(" Count ( " + total_submenu_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            submenu_id = parseInt(data[key].submenu_id);
                            fk_menu_id = data[key].fk_menu_id;
                            menu_name = data[key].menu_name;
                            submenu_name = data[key].submenu_name;
                            submenu_url = data[key].submenu_url;
                            submenu_order = data[key].submenu_order;
                            submenu_status = data[key].submenu_status;
                            if (!isNaN(submenu_id)) {
                                if (submenu_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                child_url = '<?php echo base_url(); ?>sup_admin/menu/child_submenu_list/' + fk_menu_id + '/' + submenu_id;
                                add_child_submenu_btn = "<a class='dropdown-item edit' id='edit' href='" + child_url + "' >Child Sub-Menu</a>";
                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-xs' id='edit_btn' value='' type='button' onClick ='onEdit(" + submenu_id + ")' >Edit</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + submenu_id + "' value='' type='button' onClick ='updateStatus(" + submenu_id + "," + submenu_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item edit' id='edit' value='' type='button' onClick ='onEdit(" + submenu_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + submenu_id + "' href='javascript:void(0);' id='status_btn_" + submenu_id + "' value='' type='button' onClick ='updateStatus(" + submenu_id + "," + submenu_status + ")' ><b>" + status + "</b></a>" + add_child_submenu_btn + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + menu_name + '</center></td> <td>' + submenu_name + '</td> <td>' + submenu_url + '</td> <td>' + submenu_order + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_submenu_data").text(" Count ( " + total_submenu_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="5"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_menu_name").val("null");
        $("#filter_submenu_name").val("");
        $("#filter_submenu_url").val("");
        $("#filter_submenu_icon").val("");
        $("#filter_submenu_order").val("");
        $("#filter_status").val("null");
        getSubMenuList();
    }
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#menu_name').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#submenu_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#submenu_url').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#submenu_order').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#menu_name").removeClass("parsley-error");
        $("#menu_name_err").removeClass("text-danger").text("");
        $("#submenu_name").removeClass("parsley-error");
        $("#submenu_name_err").removeClass("text-danger").text("");
        $("#submenu_url").removeClass("parsley-error");
        $("#submenu_url_err").removeClass("text-danger").text("");
        $("#submenu_order").removeClass("parsley-error");
        $("#submenu_order_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#submenu_id").text("");
        $("#menu_name").val("null");
        $("#submenu_name").val("");
        $("#submenu_url").val("");
        $("#submenu_order").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover() {
        var submenu_id = $("#submenu_id").text();
        var url = "<?php echo $base_url; ?>sup_admin/menu/recover_submenu";
        confirmation_alert(id = submenu_id, url = url, title = "Sub-Menu", type = "Recover");
    }

    function OnDelete() {
        var submenu_id = $("#submenu_id").text();
        var url = "<?php echo $base_url; ?>sup_admin/menu/remove_submenu";
        confirmation_alert(id = submenu_id, url = url, title = "Sub-Menu", type = "Delet");
    }

    function onEdit(val) {
        clearError();
        $("#submenu_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>sup_admin/menu/edit_submenu";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    submenu_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    $("#submenu_id").text(data["userdata"].submenu_id);
                    $("#submenu_name").val(data["userdata"].submenu_name);
                    $("#submenu_url").val(data["userdata"].submenu_url);
                    $("#submenu_order").val(data["userdata"].submenu_order);
                    $('select[id^="menu_name"] option[value="' + data["userdata"].fk_menu_id + '"]').attr("selected", "selected");

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
        var submenu_id = $("#submenu_id").text();
        var menu_name = $("#menu_name").val();
        var submenu_name = $("#submenu_name").val();
        var submenu_url = $("#submenu_url").val();
        var submenu_order = $("#submenu_order").val();
        if (menu_name == "null")
            menu_name = "";
        var url = "<?php echo $base_url; ?>sup_admin/menu/update_submenu";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                submenu_id: submenu_id,
                menu_name: menu_name,
                submenu_name: submenu_name,
                submenu_url: submenu_url,
                submenu_order: submenu_order,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#menu_name").val("null");
                    $("#submenu_name").val("");
                    $("#submenu_url").val("");
                    $("#submenu_order").val("");
                    $("#menu_name").removeClass("parsley-error");
                    $("#submenu_name").removeClass("parsley-error");
                    $("#submenu_url").removeClass("parsley-error");
                    $("#submenu_order").removeClass("parsley-error");

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
                    if (data["message"]["submenu_name_err"] != "")
                        $("#submenu_name").addClass("parsley-error");
                    else
                        $("#submenu_name").removeClass("parsley-error");
                    $("#submenu_name_err").addClass("text-danger").html(data["message"]["submenu_name_err"]);
                    if (data["message"]["submenu_url_err"] != "")
                        $("#submenu_url").addClass("parsley-error");
                    else
                        $("#submenu_url").removeClass("parsley-error");
                    $("#submenu_url_err").addClass("text-danger").html(data["message"]["submenu_url_err"]);
                    if (data["message"]["submenu_order_err"] != "")
                        $("#submenu_order").addClass("parsley-error");
                    else
                        $("#submenu_order").removeClass("parsley-error");
                    $("#submenu_order_err").addClass("text-danger").html(data["message"]["submenu_order_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var menu_name = $("#menu_name").val();
        var submenu_name = $("#submenu_name").val();
        var submenu_url = $("#submenu_url").val();
        var submenu_order = $("#submenu_order").val();
        if (menu_name == "null")
            menu_name = "";
        var url = "<?php echo $base_url; ?>sup_admin/menu/add_submenu";

        $.ajax({
            url: url,
            data: {
                menu_name: menu_name,
                submenu_name: submenu_name,
                submenu_url: submenu_url,
                submenu_order: submenu_order,
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
                    $("#menu_name").val("null");
                    $("#submenu_name").val("");
                    $("#submenu_url").val("");
                    $("#submenu_order").val("");
                    $("#menu_name").removeClass("parsley-error");
                    $("#submenu_name").removeClass("parsley-error");
                    $("#submenu_url").removeClass("parsley-error");
                    $("#submenu_order").removeClass("parsley-error");

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
                    if (data["message"]["submenu_name_err"] != "")
                        $("#submenu_name").addClass("parsley-error");
                    else
                        $("#submenu_name").removeClass("parsley-error");
                    $("#submenu_name_err").addClass("text-danger").html(data["message"]["submenu_name_err"]);
                    if (data["message"]["submenu_url_err"] != "")
                        $("#submenu_url").addClass("parsley-error");
                    else
                        $("#submenu_url").removeClass("parsley-error");
                    $("#submenu_url_err").addClass("text-danger").html(data["message"]["submenu_url_err"]);
                    if (data["message"]["submenu_order_err"] != "")
                        $("#submenu_order").addClass("parsley-error");
                    else
                        $("#submenu_order").removeClass("parsley-error");
                    $("#submenu_order_err").addClass("text-danger").html(data["message"]["submenu_order_err"]);
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    getSubMenuList();

    function getSubMenuList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>sup_admin/menu/get_submenu_list";
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
                    var total_submenu_data = 0;
                    $("#total_submenu_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var submenu_id = "";
                        var menu_name = "";
                        var submenu_name = "";
                        var submenu_url = "";
                        var submenu_order = "";
                        var submenu_status = "";
                        var datas = "";
                        var status = "";
                        total_submenu_data = data["total_submenu_data"];
                        $("#total_submenu_data").text(" Count ( " + total_submenu_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            submenu_id = parseInt(data[key].submenu_id);
                            fk_menu_id = data[key].fk_menu_id;
                            menu_name = data[key].menu_name;
                            submenu_name = data[key].submenu_name;
                            submenu_url = data[key].submenu_url;
                            submenu_order = data[key].submenu_order;
                            submenu_status = data[key].submenu_status;
                            if (!isNaN(submenu_id)) {
                                if (submenu_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                child_url = '<?php echo base_url(); ?>sup_admin/menu/child_submenu_list/' + fk_menu_id + '/' + submenu_id;
                                add_child_submenu_btn = "<a class='dropdown-item edit' id='edit' href='" + child_url + "' >Child Sub-Menu</a>";
                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-xs' id='edit_btn' value='' type='button' onClick ='onEdit(" + submenu_id + ")' >Edit</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + submenu_id + "' value='' type='button' onClick ='updateStatus(" + submenu_id + "," + submenu_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item edit' id='edit' value='' type='button' onClick ='onEdit(" + submenu_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + submenu_id + "' href='javascript:void(0);' id='status_btn_" + submenu_id + "' value='' type='button' onClick ='updateStatus(" + submenu_id + "," + submenu_status + ")' ><b>" + status + "</b></a>" + add_child_submenu_btn + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + menu_name + '</center></td> <td>' + submenu_name + '</td> <td>' + submenu_url + '</td> <td>' + submenu_order + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_submenu_data").text(" Count ( " + total_submenu_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="5"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(submenu_id, submenu_status) {

        var url = "<?php echo $base_url; ?>sup_admin/menu/update_sub_menu_status";

        if (submenu_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": submenu_id,
                    "status": submenu_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + submenu_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["submenu_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light";
                            $("#edit_" + submenu_id).addClass(status_btn_txt);
                            $("#status_btn_" + submenu_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light";
                            $("#edit_" + submenu_id).addClass(status_btn_txt);
                            $("#status_btn_" + submenu_id).text(status);
                        }

                        $("#status_btn_" + submenu_id).text(status);


                        $('#status_btn_' + submenu_id).attr('onClick', 'updateStatus(' + submenu_id + ',' + data["userdata"]["submenu_status"] + ')');

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