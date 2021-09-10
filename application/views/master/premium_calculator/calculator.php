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
            <div id="filter_form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Filter <?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="filter_company" class="col-form-label col-md-4 text-right">Company : </label>
                                        <div class="col-md-8">
                                            <select class="form-control" data-toggle="select2" id="filter_company" name="filter_company" onchange="company_agency()">
                                                <option value="null">Select Company</option>
                                                <?php $company = company_dropdown();
                                                if (!empty($company)) : foreach ($company as $row) : ?>
                                                        <option value="<?php echo $row["company_name"]; ?>"><?php echo ucwords($row["company_name"]); ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                        <div class="col-md-8">
                                            <select name="filter_status" id="filter_status" class="form-control">
                                                <option value="null">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="2">In-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-2" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_calculator_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <a href="<?php echo base_url(); ?>master/premium_calculator/add_cal" class='btn btn-facebook btn-xs AddForm' id='AddForm'>Add</a>
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
                                        <th>Company</th>
                                        <th>Policy Name</th>
                                        <th>Policy Type</th>
                                        <th>Sum Insured</th>
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

    function OnRecover(premium_calculator_data_id) {
        // var premium_calculator_data_id = $("#premium_calculator_data_id").text();
        var url = "<?php echo $base_url; ?>master/premium_calculator/recover_department";
        confirmation_alert(id = premium_calculator_data_id, url = url, title = "Department", type = "Recover");
    }

    function OnDelete(premium_calculator_data_id) {
        // var premium_calculator_data_id = $("#premium_calculator_data_id").text();
        var url = "<?php echo $base_url; ?>master/premium_calculator/remove_department";
        confirmation_alert(id = premium_calculator_data_id, url = url, title = "Department", type = "Delet");
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_company = $("#filter_company").val();
        var filter_policy_name = $("#filter_policy_name").val();
        var filter_status = $("#filter_status").val();

        if (filter_company == "null")
            filter_company = "";
        if (filter_policy_name == "null")
            filter_policy_name = "";
        if (filter_status == "null")
            filter_status = "";
        var url = "<?php echo $base_url; ?>master/premium_calculator/filter_calculator_datalist";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_company: filter_company,
                    filter_policy_name: filter_policy_name,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_calculator_data = 0;
                    $("#total_calculator_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var premium_calculator_data_id = "";
                        var company_name = "";
                        var department_status = "";
                        var datas = "";
                        var status = "";
                        total_calculator_data = data["total_calculator_data"];
                        var data = data["userdata"];
                        $("#total_calculator_data").text(" Count ( " + total_calculator_data + " ) ");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            premium_calculator_data_id = parseInt(data[key].premium_calculator_data_id);
                            company_name = data[key].company_name;
                            policy_name = data[key].policy_name;
                            policy_type = data[key].policy_type;
                            not_converted_sum_insured = data[key].not_converted_sum_insured;
                            premium_calculator_status = data[key].premium_calculator_status;

                            var isActive = data[key].del_flag;
                            if (!isNaN(premium_calculator_data_id)) {
                                if (premium_calculator_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + premium_calculator_data_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + premium_calculator_data_id + ")'><b>Recover</b></a>";
                                }

                                var view_url = '<?php echo $base_url; ?>master/premium_calculator/view_cal/' + premium_calculator_data_id;

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='" + view_url + "' id='view'><b>View</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + premium_calculator_data_id + "' href='javascript:void(0);' id='status_btn_" + premium_calculator_data_id + "' onClick ='updateStatus(" + premium_calculator_data_id + "," + premium_calculator_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td>  <td>' + sn + '</td><td>' + company_name + '</td><td>' + policy_name + '</td> <td>' + policy_type + '</td><td>' + not_converted_sum_insured + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_calculator_data").text(" Count ( " + total_calculator_data + " ) ");
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

        $("#filter_company").val("null");
        $("#filter_policy_name").val("null");
        $("#filter_status").val("null");
        getCalculator_dataList();
    }
    getCalculator_dataList();

    function getCalculator_dataList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/premium_calculator/getcalculator_datalist";
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
                    var total_calculator_data = 0;
                    $("#total_calculator_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var premium_calculator_data_id = "";
                        var company_name = "";
                        var department_status = "";
                        var datas = "";
                        var status = "";
                        total_calculator_data = data["total_calculator_data"];
                        var data = data["userdata"];
                        $("#total_calculator_data").text(" Count ( " + total_calculator_data + " ) ");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            premium_calculator_data_id = parseInt(data[key].premium_calculator_data_id);
                            company_name = data[key].company_name;
                            policy_name = data[key].policy_name;
                            policy_type = data[key].policy_type;
                            not_converted_sum_insured = data[key].not_converted_sum_insured;
                            premium_calculator_status = data[key].premium_calculator_status;

                            var isActive = data[key].del_flag;
                            if (!isNaN(premium_calculator_data_id)) {
                                if (premium_calculator_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + premium_calculator_data_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + premium_calculator_data_id + ")'><b>Recover</b></a>";
                                }

                                // if (isActive == 1) {
                                //     var del_status = "No";

                                //     var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + premium_calculator_data_id + ")' >Delete</button>";
                                // } else {
                                //     var del_status = "Yes";
                                //     var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + premium_calculator_data_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                // }
                                // var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + premium_calculator_data_id + ")' >View</button>";



                                var view_url = '<?php echo $base_url; ?>master/premium_calculator/view_cal/' + premium_calculator_data_id;
                                edit_btn = "<a href='" + view_url + "' class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit'>View</a>";
                                // <button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + premium_calculator_data_id + ")' >Edit</button>';
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + premium_calculator_data_id + "' value='' type='button' onClick ='updateStatus(" + premium_calculator_data_id + "," + isActive + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='" + view_url + "' id='view'><b>View</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + premium_calculator_data_id + "' href='javascript:void(0);' id='status_btn_" + premium_calculator_data_id + "' onClick ='updateStatus(" + premium_calculator_data_id + "," + premium_calculator_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td>  <td>' + sn + '</td><td>' + company_name + '</td><td>' + policy_name + '</td> <td>' + policy_type + '</td><td>' + not_converted_sum_insured + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_calculator_data").text(" Count ( " + total_calculator_data + " ) ");
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

    function OnRecover(premium_calculator_data_id) {
        var url = "<?php echo $base_url; ?>master/premium_calculator/recover_calculator";
        confirmation_alert(id = premium_calculator_data_id, url = url, title = "Premium Calculator Data", type = "Recover");
    }

    function OnDelete(premium_calculator_data_id) {
        var url = "<?php echo $base_url; ?>master/premium_calculator/remove_calculator";
        confirmation_alert(id = premium_calculator_data_id, url = url, title = "Premium Calculator Data", type = "Delet");
    }

    function updateStatus(premium_calculator_data_id, premium_calculator_status) {

        var url = "<?php echo $base_url; ?>master/premium_calculator/update_calculator_status";

        if (premium_calculator_data_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": premium_calculator_data_id,
                    "status": premium_calculator_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + premium_calculator_data_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["premium_calculator_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-xs waves-light edit";
                            $("#edit_" + premium_calculator_data_id).addClass(status_btn_txt);
                            $("#status_btn_" + premium_calculator_data_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-xs waves-light edit";
                            $("#edit_" + premium_calculator_data_id).addClass(status_btn_txt);
                            $("#status_btn_" + premium_calculator_data_id).text(status);
                        }

                        $("#status_btn_" + premium_calculator_data_id).text(status);


                        $('#status_btn_' + premium_calculator_data_id).attr('onClick', 'updateStatus(' + premium_calculator_data_id + ',' + data["userdata"]["premium_calculator_status"] + ')');

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