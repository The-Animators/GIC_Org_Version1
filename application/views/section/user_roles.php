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
                                                <label for="user_role" class="col-form-label col-md-4 text-right">User Role<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="user_role" id="user_role" value="" placeholder="Enter User Role" class="form-control">
                                                    <span id="user_role_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="menu" class="col-form-label col-md-4 text-right">Menu<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="menu" id="menu" class="selectpicker" multiple data-selected-text-format="count" data-style="btn-secondary" onchange="menuBaseSubmenu()">
                                                        <?php if (!empty($menu_list)) : foreach ($menu_list as $row) : ?>
                                                                <option value="<?php echo $row["menu_id"]; ?>"><?php echo $row["menu_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="menu_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="menu" class="col-form-label col-md-4 text-right">Sub-Menu<span class="text-danger">*</span></label>
                                                <div class="col-md-8" id="menu_list">
                                                    <select name="menu" id="menu" class="selectpicker" multiple data-selected-text-format="count" data-style="btn-secondary">
                                                        <?php //if (!empty($submenu_list)) : foreach ($submenu_list as $row) : 
                                                        ?>
                                                        <option value="<?php //echo $row["submenu_id"]; 
                                                                        ?>"><?php //echo $row["submenu_name"]; 
                                                                            ?></option> -->
                                        <?php //endforeach;
                                        //endif; 
                                        ?>
                                        <!-- </select>
                                                    <span id="menu_err"></span>
                                                </div>
                                            </div>
                                        </div>  -->

                                        <div class="col-md-12">
                                            <div class="form-group row" id="submenu_checkbox">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="user_role_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
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
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">User Role :</td>
                                                        <td><strong><span id="user_role_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="user_role" class="col-form-label col-md-4 text-right"><strong>User Role : </strong></label>
                                                <div class="col-md-8 col-form-label" id="user_role_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-8">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="20%">Menus :</td>
                                                        <td><strong><span id="menu_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="menu" class="col-form-label col-md-4 text-right"><strong>Menu : </strong></label>
                                                <div class="col-md-8 col-form-label" id="menu_det"></div>
                                            </div> -->
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row" id="submenu_checkbox">
                                            </div>
                                        </div>

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
                                        <div class="col-md-3 row">
                                            <label for="filter_user_role" class="col-form-label col-md-4 text-right">User Role</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="filter_user_role" name="filter_user_role" placeholder="Enter User Role">
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_userrole_data"></span></h4>
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
                                            <center>User Role</center>
                                        </th>
                                        <!-- <th>Role Status</th>
                                        <th>Delete Status</th>
                                    </tr> -->
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

        var filter_user_role = $("#filter_user_role").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>sup_admin/roles/filter_userrole";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_user_role: filter_user_role,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_userrole_data = 0;
                    $("#total_userrole_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var user_role_id = "";
                        var user_role_status = "";
                        var datas = "";
                        var status = "";
                        var isActive = "";
                        total_userrole_data = data["total_userrole_data"];
                        $("#total_userrole_data").text(" Count ( " + total_userrole_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            user_role_id = parseInt(data[key].user_role_id);
                            user_role = data[key].user_role_title;
                            user_role_status = data[key].user_role_status;
                            isActive = data[key].del_flag;

                            if (isActive == 1) {
                                var del_status = "No";

                                var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' onClick ='OnDelete(" + user_role_id + ")'><b>Delete</b></a>";
                                // <button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + user_role_id + ")' >Delete</button>
                            } else {
                                var del_status = "Yes";
                                var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnRecover(" + user_role_id + ")'><b>Recover</b></a>";
                                // <button id='recover' onclick='OnRecover(" + user_role_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>
                            }
                            // var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + user_role_id + ")' >View</button>";


                            if (!isNaN(user_role_id)) {
                                if (user_role_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + user_role_id + ")' >Edit</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + user_role_id + "' value='' type='button' onClick ='updateStatus(" + user_role_id + "," + user_role_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' value='' type='button' onClick ='onView(" + user_role_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + user_role_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + user_role_id + "' href='javascript:void(0);' id='status_btn_" + user_role_id + "' value='' type='button' onClick ='updateStatus(" + user_role_id + "," + user_role_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + user_role + '</center></td> </tr>';
                            }
                        });

                    } else {
                        $("#total_userrole_data").text(" Count ( " + total_userrole_data + " ) ");
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
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        $("#filter_user_role").val("");
        $("#filter_status").val("null");
        getRoleList();
    }
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#user_role').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#menu').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    function check_checkbox(submenu_id) {
        if ($("#submenu_id_" + submenu_id).prop("checked") == true) {
            document.getElementById("update").disabled = false;
        } else if ($("#submenu_id_" + submenu_id).prop("checked") == false) {
            document.getElementById("update").disabled = false;
        }
    }

    function clearError() {
        $("#user_role").removeClass("parsley-error");
        $("#user_role_err").removeClass("text-danger").text("");
        $("#menu").removeClass("parsley-error");
        $("#menu_err").removeClass("text-danger").text("");
        $('#submenu_checkbox').empty();
        $("#menu").val("null");
    }

    function uninitialize() {
        $("#user_role_id").text("");
        $("#user_role").val("");
        $("#menu").val("");
        $('#submenu_checkbox').empty();
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function menuBaseSubmenu() {
        var menu = $("#menu").val();
        menu = menu.join(",");
        // alert(menu);
        var url = "<?php echo $base_url; ?>sup_admin/roles/menu_base_submenu";

        if (menu != "") {
            $.ajax({
                url: url,
                data: {
                    menu_id: menu
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        // var submenu_list = JSON.parse(val);
                        $('#submenu_checkbox').empty();
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var submenu_id = val[i]["submenu_id"];
                            var submenu_name = val[i]["submenu_name"];

                            option_val += '<div class="col-md-3 mt-1"><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input submenu_id" id="submenu_id_' + submenu_id + '" name="submenu_id[]" onclick="check_checkbox(' + submenu_id + ')"><label class="custom-control-label" for="submenu_id_' + submenu_id + '">' + submenu_name + '</label></div></div>';

                        }
                        $('#submenu_checkbox').append("<span class='col-md-12'><strong><u>Sub-Menu : </u></strong></span><br/><table><tbody><tr>" + option_val + "</tr></tbody></table>");
                        // var finaloption_val = "<select name='menu' id='menu' class='selectpicker' multiple data-selected-text-format='count' data-style='btn-secondary'>" + option_val + "</select>";
                        // $('#submenu_checkbox').append(finaloption_val);
                        // $("#menu").multiselect({
                        //     selectedList: 4
                        // });
                    } else {
                        $('#submenu_checkbox').html("<span class='col-md-12'><center><strong>Data Not Found !</strong></center></span>");
                        // $('#menu_list').html("");
                        // $('#menu_list').append("<option value=''>Select</option>");
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function editmenuBaseSubmenu(menu_permission, submenu_permission, disable) {
        var sub_menu_iddata = submenu_permission.split(',');
        var url = "<?php echo $base_url; ?>sup_admin/roles/menu_base_submenu";

        if (menu != "") {
            $.ajax({
                url: url,
                data: {
                    menu_id: menu_permission
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#submenu_checkbox').empty();
                        var option_val = "";
                        var original_submenu_id = "";
                        for (var i = 0; i < val.length; i++) {
                            var submenu_id = val[i]["submenu_id"];
                            var submenu_name = val[i]["submenu_name"];
                            if (original_submenu_id == "") {
                                original_submenu_id = submenu_id;
                            } else {
                                original_submenu_id += "," + submenu_id;
                            }
                            if (disable == "")
                                disable = "";
                            else
                                disable = "disabled";

                            option_val += '<div class="col-md-3 mt-1"><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input submenu_id" id="submenu_id_' + submenu_id + '" name="submenu_id[]" onclick="check_checkbox(' + submenu_id + ')" ' + disable + '><label class="custom-control-label" for="submenu_id_' + submenu_id + '">' + submenu_name + '</label></div></div>';

                        }
                        $('#submenu_checkbox').append("<span class='col-md-12'><strong><u>Sub-Menu : </u></strong></span><br/><table><tbody><tr>" + option_val + "</tr></tbody></table>");

                        original_submenu_id = original_submenu_id.split(",");
                        $.each(sub_menu_iddata, function(key, val) {
                            var smenu_id = sub_menu_iddata[key];
                            $.each(original_submenu_id, function(key1, val1) {
                                var org_sub_id = original_submenu_id[key1];
                                if (smenu_id == org_sub_id) {
                                    $("#submenu_id_" + org_sub_id).attr("checked", true);
                                }
                            });
                        });

                    } else {
                        $('#submenu_checkbox').html("<span class='col-md-12'><center><strong>Data Not Found !</strong></center></span>");

                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function checkChecked(smenu_id, org_sub_id) {

        $('#submenu_id_' + org_sub_id + ' input[type="checkbox"]').each(function() {
            if (smenu_id == org_sub_id) {
                $("#submenu_id_" + org_sub_id).attr("checked", true);
            } else {
                $("#submenu_id_" + org_sub_id).attr("checked", false);
            }
        });
    }

    var actual_submenu_ids = [];

    function Totalsubmenu_id() {

        $("input[name='submenu_id[]']").each(function(index, value) {
            // var submenu_id = $("input[name='submenu_id[]']", this).is(':checked');
            // var submenu_id = $("input[name='submenu_id']:checked").val();
            if ($(this).is(":checked")) {
                // alert($(this).val());
                var submenu_id = $(this).attr("id");
                submenu_id = submenu_id.split("_");
                // alert(submenu_id[2]);
                var submenu_id_val = submenu_id[2];
            }
            actual_submenu_ids.push([submenu_id_val]);
            if (submenu_id_val === 'null' || submenu_id_val === '')
                actual_submenu_ids.splice(index, 1);
        });
        return actual_submenu_ids;
    }

    function OnRecover(user_role_id) {
        // var user_role_id = $("#user_role_id").text();
        var url = "<?php echo $base_url; ?>sup_admin/roles/recover_role";
        confirmation_alert(id = user_role_id, url = url, title = "User Role", type = "Recover");
    }

    function OnDelete(user_role_id) {
        // var user_role_id = $("#user_role_id").text();
        var url = "<?php echo $base_url; ?>sup_admin/roles/remove_role";
        confirmation_alert(id = user_role_id, url = url, title = "User Role", type = "Delet");
    }

    function onView(val) {
        clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>sup_admin/roles/edit_role";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    user_role_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#user_role_det").text(data["userdata"].user_role_title);
                    $("#menu_det").text(data["userdata"].menu_name);

                    var submenu_permission = data["userdata"].sub_menu_permission;
                    var menu_permission = data["userdata"].menu_permission
                    editmenuBaseSubmenu(menu_permission, submenu_permission, disable = "disabled");
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {
        clearError();
        $("#user_role_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>sup_admin/roles/edit_role";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    user_role_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    $("#user_role_id").text(data["userdata"].user_role_id);
                    $("#user_role").val(data["userdata"].user_role_title);
                    if (data["userdata"].menu_permission != "")
                        var selectedOptions = data["userdata"].menu_permission.split(",");
                    else
                        var selectedOptions = "";

                    var checkboxes = document.getElementsByClassName("menu");
                    $('#menu').selectpicker("val", selectedOptions);


                    var submenu_permission = data["userdata"].sub_menu_permission;
                    var menu_permission = data["userdata"].menu_permission
                    editmenuBaseSubmenu(menu_permission, submenu_permission, disable = "");

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
        var tot_submenu_id = Totalsubmenu_id();
        var user_role_id = $("#user_role_id").text();
        var user_role = $("#user_role").val();

        var menu = $("#menu").val();

        var url = "<?php echo $base_url; ?>sup_admin/roles/update_role";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                user_role_id: user_role_id,
                user_role: user_role,
                menu: menu,
                tot_submenu_id: tot_submenu_id,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#user_role").val("");
                    $("#user_role").removeClass("parsley-error");
                    $("#menu").val("");
                    $("#menu").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["user_role_err"] != "")
                        $("#user_role").addClass("parsley-error");
                    else
                        $("#user_role").removeClass("parsley-error");
                    $("#user_role_err").addClass("text-danger").html(data["message"]["user_role_err"]);
                    if (data["message"]["menu_err"] != "")
                        $("#menu").addClass("parsley-error");
                    else
                        $("#menu").removeClass("parsley-error");
                    $("#menu_err").addClass("text-danger").html(data["message"]["menu_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var tot_submenu_id = Totalsubmenu_id();
        // alert(tot_submenu_id);
        // return false;
        var user_role = $("#user_role").val();
        var menu = $("#menu").val();
        var url = "<?php echo $base_url; ?>sup_admin/roles/add_role";

        $.ajax({
            url: url,
            data: {
                user_role: user_role,
                menu: menu,
                tot_submenu_id: tot_submenu_id,
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
                    $("#user_role").val("");
                    $("#user_role").removeClass("parsley-error");
                    $("#menu").val("");
                    $("#menu").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["user_role_err"] != "")
                        $("#user_role").addClass("parsley-error");
                    else
                        $("#user_role").removeClass("parsley-error");
                    $("#user_role_err").addClass("text-danger").html(data["message"]["user_role_err"]);
                    if (data["message"]["menu_err"] != "")
                        $("#menu").addClass("parsley-error");
                    else
                        $("#menu").removeClass("parsley-error");
                    $("#menu_err").addClass("text-danger").html(data["message"]["menu_err"]);
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    getRoleList();

    function getRoleList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>sup_admin/roles/get_role_list";
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
                    var total_userrole_data = 0;
                    $("#total_userrole_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var user_role_id = "";
                        var user_role_status = "";
                        var datas = "";
                        var status = "";
                        var isActive = "";
                        total_userrole_data = data["total_userrole_data"];
                        $("#total_userrole_data").text(" Count ( " + total_userrole_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            user_role_id = parseInt(data[key].user_role_id);
                            user_role = data[key].user_role_title;
                            user_role_status = data[key].user_role_status;
                            isActive = data[key].del_flag;

                            if (isActive == 1) {
                                var del_status = "No";

                                var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' onClick ='OnDelete(" + user_role_id + ")'><b>Delete</b></a>";
                                // <button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + user_role_id + ")' >Delete</button>
                            } else {
                                var del_status = "Yes";
                                var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnRecover(" + user_role_id + ")'><b>Recover</b></a>";
                                // <button id='recover' onclick='OnRecover(" + user_role_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>
                            }
                            // var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + user_role_id + ")' >View</button>";


                            if (!isNaN(user_role_id)) {
                                if (user_role_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + user_role_id + ")' >Edit</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + user_role_id + "' value='' type='button' onClick ='updateStatus(" + user_role_id + "," + user_role_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' value='' type='button' onClick ='onView(" + user_role_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + user_role_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + user_role_id + "' href='javascript:void(0);' id='status_btn_" + user_role_id + "' value='' type='button' onClick ='updateStatus(" + user_role_id + "," + user_role_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + user_role + '</center></td> </tr>';
                            }
                        });

                    } else {
                        $("#total_userrole_data").text(" Count ( " + total_userrole_data + " ) ");
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

    function updateStatus(user_role_id, menu_status) {

        var url = "<?php echo $base_url; ?>sup_admin/roles/update_role_status";

        if (user_role_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": user_role_id,
                    "status": menu_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + user_role_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["user_role_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + user_role_id).addClass(status_btn_txt);
                            $("#status_btn_" + user_role_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + user_role_id).addClass(status_btn_txt);
                            $("#status_btn_" + user_role_id).text(status);
                        }

                        $("#status_btn_" + user_role_id).text(status);


                        $('#status_btn_' + user_role_id).attr('onClick', 'updateStatus(' + user_role_id + ',' + data["userdata"]["user_role_status"] + ')');

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
        // alert(user_role_id);
        if ((user_role_id != 1) && (user_role_id != 2)) {
            var id = $("#submenu").data("value");
            if (id != "") {
                CheckFormAccess(submenu_permission, 3, url);
                check(role_permission, 3);
            }
        }
    });
</script>