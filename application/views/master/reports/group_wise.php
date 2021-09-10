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
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-4 row">
                                            <label for="filter_from_date" class="col-form-label col-md-5 text-right">From Date : </label>
                                            <div class="col-md-7">
                                                <input type="date" class="form-control" id="filter_from_date" name="filter_from_date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_to_date" class="col-form-label col-md-5 text-right">To Date : </label>
                                            <div class="col-md-7">
                                                <input type="date" class="form-control" id="filter_to_date" name="filter_to_date">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row">
                                            <label for="filter_group" class="col-form-label col-md-4 text-right">Group : </label>
                                            <div class="col-md-8">

                                                <select name="filter_group" id="filter_group" class="form-control" data-toggle="select2">
                                                    <option value="null">Select Group Name</option>
                                                    <?php if (!empty($group)) : foreach ($group as $row) : ?>
                                                            <option value="<?php echo $row["grp_id"]; ?>"><?php echo $row["grpname"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                                <!-- <select name="filter_group" id="filter_group" class="form-control">
                                                <option value="null">Select Group Name</option>
                                                <?php if (!empty($group)) : foreach ($group as $row) : ?>
                                                        <option value="<?php echo $row["grp_id"]; ?>"><?php echo $row["grpname"]; ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select> -->
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm mr-1" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
                                            <!-- <div class="col-md-8"><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button></div> -->
                                        </div>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>

                        </div>

                        <!-- <table border="1"> -->
                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>SN.</th>
                                        <th>Serial No.</th>
                                        <th><center>Group Name</center></th>
                                        <th>Policy Holder</th>
                                        <th>Type of Policy</th>
                                        <th>Policy No.</th>
                                        <th width="10%">From Date</th>
                                        <th width="10%">To Date</th>
                                        <th>Company</th>
                                        <th>Department</th>
                                        <!-- <th>Action</th> -->
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
        var filter_from_date = $("#filter_from_date").val();
        var filter_to_date = $("#filter_to_date").val();
        var filter_group = $("#filter_group").val();

        if (filter_from_date == "undefined" || filter_from_date == undefined || filter_from_date == "" || filter_from_date == "null") {
            filter_from_date = "";
        }

        if (filter_to_date == "undefined" || filter_to_date == undefined || filter_to_date == "" || filter_to_date == "null") {
            filter_to_date = "";
        }

        if (filter_group == "null")
            filter_group = "";

        var url = "<?php echo $base_url; ?>master/reports/filter_group_wise";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_from_date: filter_from_date,
                    filter_to_date: filter_to_date,
                    filter_group: filter_group,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_group_wise_data = 0;
                    if (data["status"] == true) {
                        $("#tableData").empty();
                        $("#total_data").text("");
                        var datas = "";
                        total_group_wise_data = data["total_group_wise_data"];

                        $("#total_data").text("Count (" + total_group_wise_data + ")");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_id = parseInt(data[key].policy_id);
                            var serial_no_year = data[key].serial_no_year;
                            var serial_no_month = data[key].serial_no_month;
                            serial_no = data[key].serial_no;

                            var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                            grpname = data[key].grpname;
                            member_name = data[key].member_name;
                            policy_type_title = data[key].policy_type_title;
                            policy_no = data[key].policy_no;
                            date_from = data[key].date_from;
                            date_to = data[key].date_to;
                            company_name = data[key].company_name;
                            department_name = data[key].department_name;


                            if (!isNaN(policy_id)) {
                                var inline_edit = '<button type="button" class="btn btn-danger btn-sm ml-1 editbtn"  id="edit_btn_' + policy_id + '"  onclick="OnInLine_Edit(' + policy_id + ')">Edit</button>';
                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                total_serial_no
                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + total_serial_no + '</td><td><center>' + grpname + '</center></td><td>' + member_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td width="10%">' + date_from + '</td><td width="10%">' + date_to + '</td><td>' + company_name + '</td><td>' + department_name + '</td> </tr>';
                            }
                        });
                    } else {
                        $("#tableData").empty();
                        $("#total_data").text("");
                        $("#total_data").text("Count (" + total_group_wise_data + ")");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="11"><center>Data Not Found</center></td> </tr>';
                    }
                    $('#tableData').append(datas);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function Reset_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        // $("#filter_year").val();
        $("#filter_from_date").val("");
        $("#filter_to_date").val("");
        $("#filter_group").val("null");
        $("#filter_group").prop('selectedIndex', 0);
        get_group_wise_list();
    }

    function company_agency() {
        var filter_company = $("#filter_company").val();

        var url = "<?php echo $base_url; ?>master/policy/get_companybased_agency";

        if (filter_company != "") {
            $.ajax({
                url: url,
                data: {
                    company: filter_company
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        console.log(val);
                        $('#filter_agency').html("<option value='null'>Select Agency Code</option>");
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var magency_id = val[i]["magency_id"];
                            var code = val[i]["code"];
                            var name = val[i]["name"];
                            option_val += '<option value="' + magency_id + '">' + name + ' ( ' + code + ' ) </option>';
                        }
                    } else {
                        $('#filter_agency').html("<option value='null'>Select Agency Code</option>");
                    }
                    $('#filter_agency').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    // $(document).ready(function() {
    //     $('.editbtn').click(function() {
    //         var currentTD = $(this).parents('tr').find('td');
    //         if ($(this).text().trim() == 'Edit') {
    //             currentTD = $(this).parents('tr').find($("td").not(":nth-child(1)")).not(":nth-child(2)").not(":nth-child(3)").not(":nth-child(4)").not(":nth-child(5)").not(":nth-child(6)").not(":nth-child(7)").not(":nth-child(8)").not(":nth-child(9)").not(":nth-child(10)");
    //             $.each(currentTD, function() {
    //                 $(this).parents('tr').find($("td").not(":nth-child(1)")).not(":nth-child(2)").not(":nth-child(3)").not(":nth-child(4)").not(":nth-child(5)").not(":nth-child(6)").not(":nth-child(7)").not(":nth-child(8)").not(":nth-child(9)").not(":nth-child(10)").css({
    //                     'background': '#E6E6E6',
    //                     'color': '#000'
    //                 });
    //                 $(this).prop('contenteditable', true).css({
    //                     'background': '#fff',
    //                     'color': '#000'

    //                 })
    //             });
    //         } else {
    //             $.each(currentTD, function() {
    //                 $(this).prop('contenteditable', false).removeAttr("style");
    //             });
    //         }

    //         $(this).html($(this).html() == 'Edit' ? 'Update' : 'Edit')
    //         if ($(this).html() == 'Update') {
    //             $(this).prop('contenteditable', false)
    //         }

    //     });
    // });

    get_group_wise_list();

    function get_group_wise_list() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/reports/get_group_wise_list";
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
                    var total_group_wise_data = 0;
                    if (data["status"] == true) {
                        $("#tableData").empty();
                        $("#total_data").text("");
                        var datas = "";
                        total_group_wise_data = data["total_group_wise_data"];

                        $("#total_data").text("Count (" + total_group_wise_data + ")");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_id = parseInt(data[key].policy_id);
                            var serial_no_year = data[key].serial_no_year;
                            var serial_no_month = data[key].serial_no_month;
                            serial_no = data[key].serial_no;

                            var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                            grpname = data[key].grpname;
                            member_name = data[key].member_name;
                            policy_type_title = data[key].policy_type_title;
                            policy_no = data[key].policy_no;
                            date_from = data[key].date_from;
                            date_to = data[key].date_to;
                            company_name = data[key].company_name;
                            department_name = data[key].department_name;
                            isActive = data[key].del_flag;


                            if (!isNaN(policy_id)) {
                                var inline_edit = '<button type="button" class="btn btn-danger btn-sm ml-1 editbtn"  id="edit_btn_' + policy_id + '"  onclick="OnInLine_Edit(' + policy_id + ')">Edit</button>';
                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                total_serial_no
                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + total_serial_no + '</td><td><center>' + grpname + '</center></td><td>' + member_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td width="10%">' + date_from + '</td><td width="10%">' + date_to + '</td><td>' + company_name + '</td><td>' + department_name + '</td> </tr>';
                            }
                        });
                    } else {
                        $("#tableData").empty();
                        $("#total_data").text("");
                        $("#total_data").text("Count (" + total_group_wise_data + ")");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="11"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function OnInLine_Edit(policy_id) {
        // var button_val = $(this).parents('tr').find('td').not(":nth-child(12)").html("");

        var button_val = $("#edit_btn_" + policy_id).text();
        // alert(button_val);
        // return false;
        var commission_rece_company = $("#commission_rece_company_" + policy_id).text();
        var commission_amt_rece_company = $("#commission_amt_rece_company_" + policy_id).text();

        var url = "<?php echo $base_url; ?>master/commission/update_policy_commission_data";
        if (button_val == "Update") {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    policy_id: policy_id,
                    commission_rece_company: commission_rece_company,
                    commission_amt_rece_company: commission_amt_rece_company,
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

                        // setTimeout(function() {
                        //     location.reload();
                        // }, 1000);
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
                CheckFormAccess(submenu_permission, 14, url);
                check(role_permission, 14);
            }
        }
    });
</script>