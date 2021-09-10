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
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-3 row">
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
                                        </div>
                                        <div class="col-md-3 row">
                                            <label for="filter_staff" class="col-form-label col-md-4 text-right">Staff</label>
                                            <div class="col-md-8">
                                                <select class="form-control" data-toggle="select2" id="filter_staff" name="filter_staff">
                                                    <option value="null">Select Staff</option>
                                                    <?php $staff_list = staff_dropdown();
                                                    if (!empty($staff_list)) : foreach ($staff_list as $row) : ?>
                                                            <option value="<?php echo $row["staff_id"]; ?>"><?php echo ucwords($row["staff_name"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_user_role" class="col-form-label col-md-4 text-right">Role</label>
                                            <div class="col-md-8">
                                                <select name="filter_user_role" id="filter_user_role" class="form-control" data-toggle="select2">
                                                    <option value="null">Select Role</option>
                                                    <?php $userrole = userrole_dropdown();
                                                    if (!empty($userrole)) : foreach ($userrole as $row6) : ?>
                                                            <option value="<?php echo $row6["user_role_id"]; ?>"><?php echo ucwords($row6["user_role_title"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_module" class="col-form-label col-md-4 text-right">Module</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_module" id="filter_module" class="form-control" placeholder="Enter Module Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-1 ml-2">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm mr-4" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <h4 class="header-title"><?php echo $title; ?> <span id="total_download_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4"></div> -->
                            <div class="col-md-6 text-right">
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>
                        </div>

                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>SN.</th>
                                        <th>Staff</th>
                                        <th>Role</th>
                                        <th>Module</th>
                                        <th>Folder Name</th>
                                        <th>File Name</th>
                                        <th>Directory Path</th>
                                        <th>Date</th>
                                        <th>Time</th>
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
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_year = $("#filter_year").val();
        var filter_month = $("#filter_month").val();
        var filter_day = $("#filter_day").val();
        var filter_staff = $("#filter_staff").val();
        var filter_user_role = $("#filter_user_role").val();
        var filter_module = $("#filter_module").val();

        if (filter_year == "null")
            filter_year = "";
        if (filter_month == "null")
            filter_month = "";
        if (filter_day == "null")
            filter_day = "";
        if (filter_staff == "null")
            filter_staff = "";
        if (filter_user_role == "null")
            filter_user_role = "";

        var url = "<?php echo $base_url; ?>master/log_master/filter_download_log";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_day: filter_day,
                    filter_staff: filter_staff,
                    filter_user_role: filter_user_role,
                    filter_module: filter_module,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    $("#tableData").empty();
                    var total_download_data = 0;
                    $("#total_download_data").text("");
                    if (data["status"] == true) {
                        var datas = "";

                        total_download_data = data["total_download_data"];
                        $("#total_download_data").text(" Count ( " + total_download_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            download_id = parseInt(data[key].download_id);
                            module_name = data[key].module_name;
                            file_name = data[key].file_name;
                            staff = data[key].staff_name;
                            user_role = data[key].user_role_title;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            directory_path = data[key].directory_path;
                            folder_name = data[key].folder_name;
                            create_date = data[key].create_date;
                            create_time = data[key].create_time;

                            if (module_name == "null" || module_name == null || module_name == undefined || module_name == "undefined" || module_name == "")
                                module_name = "";
                            else
                                module_name = module_name;

                            if (file_name == "null" || file_name == null || file_name == undefined || file_name == "undefined" || file_name == "")
                                file_name = "";
                            else
                                file_name = file_name;

                            if (directory_path == "null" || directory_path == null || directory_path == undefined || directory_path == "undefined" || directory_path == "")
                                directory_path = "";
                            else
                                directory_path = directory_path;

                            if (folder_name == "null" || folder_name == null || folder_name == undefined || folder_name == "undefined" || folder_name == "")
                                folder_name = "";
                            else
                                folder_name = folder_name;

                            if (staff == "null" || staff == null || staff == undefined || staff == "undefined" || staff == "")
                                staff = "Unknown";
                            else
                                staff = staff;

                            if (user_role == "null" || user_role == null || user_role == undefined || user_role == "undefined" || user_role == "")
                                user_role = "";
                            else
                                user_role = user_role;

                            if (create_date == "null" || create_date == null || create_date == undefined || create_date == "undefined" || create_date == "")
                                create_date = "";
                            else
                                create_date = create_date;

                            if (create_time == "null" || create_time == null || create_time == undefined || create_time == "undefined" || create_time == "")
                                create_time = "";
                            else
                                create_time = create_time;

                            if (!isNaN(download_id)) {

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + staff + '</td><td>' + user_role + '</td><td>' + module_name + '</td><td>' + folder_name + '</td><td>' + file_name + '</td><td>' + directory_path + '</td><td>' + create_date + '</td><td>' + create_time + '</td></tr>';
                            }

                        });
                    } else {
                        <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : $count = 12;
                        else : $count = 10;
                        endif; ?>
                        $("#total_download_data").text(" Count ( " + total_download_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="<?php echo $count; ?>"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
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
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        // $("#filter_year").val();
        $("#filter_month").val("null");
        $("#filter_day").val("null");
        $("#filter_staff").val("null");
        $("#filter_user_role").val("null");
        $("#filter_module").val("");
        $("#filter_staff").prop('selectedIndex', 0);
        get_download_log();
    }
</script>
<script>
    get_download_log();

    function get_download_log() {

        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/log_master/get_download_log";
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
                    $("#tableData").empty();
                    var total_download_data = 0;
                    $("#total_download_data").text("");
                    if (data["status"] == true) {
                        var datas = "";

                        total_download_data = data["total_download_data"];
                        $("#total_download_data").text(" Count ( " + total_download_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            download_id = parseInt(data[key].download_id);
                            module_name = data[key].module_name;
                            file_name = data[key].file_name;
                            staff = data[key].staff_name;
                            user_role = data[key].user_role_title;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            directory_path = data[key].directory_path;
                            folder_name = data[key].folder_name;
                            create_date = data[key].create_date;
                            create_time = data[key].create_time;

                            if (module_name == "null" || module_name == null || module_name == undefined || module_name == "undefined" || module_name == "")
                                module_name = "";
                            else
                                module_name = module_name;

                            if (file_name == "null" || file_name == null || file_name == undefined || file_name == "undefined" || file_name == "")
                                file_name = "";
                            else
                                file_name = file_name;

                            if (directory_path == "null" || directory_path == null || directory_path == undefined || directory_path == "undefined" || directory_path == "")
                                directory_path = "";
                            else
                                directory_path = directory_path;

                            if (folder_name == "null" || folder_name == null || folder_name == undefined || folder_name == "undefined" || folder_name == "")
                                folder_name = "";
                            else
                                folder_name = folder_name;

                            if (staff == "null" || staff == null || staff == undefined || staff == "undefined" || staff == "")
                                staff = "Unknown";
                            else
                                staff = staff;

                            if (user_role == "null" || user_role == null || user_role == undefined || user_role == "undefined" || user_role == "")
                                user_role = "";
                            else
                                user_role = user_role;

                            if (create_date == "null" || create_date == null || create_date == undefined || create_date == "undefined" || create_date == "")
                                create_date = "";
                            else
                                create_date = create_date;

                            if (create_time == "null" || create_time == null || create_time == undefined || create_time == "undefined" || create_time == "")
                                create_time = "";
                            else
                                create_time = create_time;

                            if (!isNaN(download_id)) {

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + staff + '</td><td>' + user_role + '</td><td>' + module_name + '</td><td>' + folder_name + '</td><td>' + file_name + '</td><td>' + directory_path + '</td><td>' + create_date + '</td><td>' + create_time + '</td></tr>';
                            }

                        });
                    } else {
                        <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : $count = 12;
                        else : $count = 10;
                        endif; ?>
                        $("#total_download_data").text(" Count ( " + total_download_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="<?php echo $count; ?>"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
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
                CheckFormAccess(submenu_permission, 14, url);
                check(role_permission, 14);
            }
        }
    });
</script>