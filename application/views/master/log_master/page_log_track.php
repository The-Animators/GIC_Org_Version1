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

                                        <div class="col-md-3 row mt-1 ml-1">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-sm  mr-2" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <h4 class="header-title"><?php echo $title; ?> <span id="total_page_login_track_data"></span></h4>
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
                                        <th>
                                            <center>Role</center>
                                        </th>
                                        <th>IP Address</th>
                                        <th>Page Name</th>
                                        <th>Page Path</th>
                                        <th>Browser Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?>
                                            <th>User Name</th>
                                            <th>Password</th>
                                        <?php endif; ?>
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

        var filter_year = $("#filter_year").val();
        var filter_month = $("#filter_month").val();
        var filter_day = $("#filter_day").val();
        var filter_staff = $("#filter_staff").val();
        var filter_user_role = $("#filter_user_role").val();

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

        var url = "<?php echo $base_url; ?>master/log_master/filter_page_log";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_day: filter_day,
                    filter_staff: filter_staff,
                    filter_user_role: filter_user_role,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    $("#tableData").empty();
                    var total_page_login_track_data = 0;
                    $("#total_page_login_track_data").text("");
                    if (data["status"] == true) {
                        var datas = "";

                        total_page_login_track_data = data["total_page_login_track_data"];
                        $("#total_page_login_track_data").text(" Count ( " + total_page_login_track_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            page_log_track_id = parseInt(data[key].page_log_track_id);
                            staff_name = data[key].staff_name;
                            user_role = data[key].user_role;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            route_ip_address = data[key].route_ip_address;
                            page_name = data[key].page_name;
                            page_log_track_path = data[key].page_log_track_path;
                            browser_name = data[key].browser_name;
                            staff_username = data[key].staff_username;
                            staff_password = data[key].staff_password;
                            log_date = data[key].log_date;
                            log_time = data[key].log_time;
                            create_date = data[key].create_date;

                            if (staff_name == "null" || staff_name == null || staff_name == undefined || staff_name == "undefined" || staff_name == "")
                                staff_name = "Unknown";
                            else
                                staff_name = staff_name;

                            if (user_role == "null" || user_role == null || user_role == undefined || user_role == "undefined" || user_role == "")
                                user_role = "";
                            else
                                user_role = user_role;

                            if (route_ip_address == "null" || route_ip_address == null || route_ip_address == undefined || route_ip_address == "undefined" || route_ip_address == "")
                                route_ip_address = "";
                            else
                                route_ip_address = route_ip_address;

                            if (page_name == "null" || page_name == null || page_name == undefined || page_name == "undefined" || page_name == "")
                                page_name = "";
                            else
                                page_name = page_name;

                            if (page_log_track_path == "null" || page_log_track_path == null || page_log_track_path == undefined || page_log_track_path == "undefined" || page_log_track_path == "")
                                page_log_track_path = "";
                            else
                                page_log_track_path = page_log_track_path;

                            if (browser_name == "null" || browser_name == null || browser_name == undefined || browser_name == "undefined" || browser_name == "")
                                browser_name = "";
                            else
                                browser_name = browser_name;

                            if (staff_username == "null" || staff_username == null || staff_username == undefined || staff_username == "undefined" || staff_username == "")
                                staff_username = "";
                            else
                                staff_username = staff_username;


                            if (staff_password == "null" || staff_password == null || staff_password == undefined || staff_password == "undefined" || staff_password == "")
                                staff_password = "";
                            else
                                staff_password = staff_password;

                            if (log_date == "null" || log_date == null || log_date == undefined || log_date == "undefined" || log_date == "")
                                log_date = "";
                            else
                                log_date = log_date;

                            if (log_time == "null" || log_time == null || log_time == undefined || log_time == "undefined" || log_time == "")
                                log_time = "";
                            else
                                log_time = log_time;

                            if (!isNaN(page_log_track_id)) {

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + staff_name + '</td><td><center>' + user_role + '</center></td><td>' + route_ip_address + '</td><td>' + page_name + '</td><td>' + page_log_track_path + '</td><td>' + browser_name + '</td><td>' + log_date + '</td><td>' + log_time + '</td><?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?><td>' + staff_username + '</td><td>' + staff_password + '</td><?php endif; ?></tr>';
                            }

                        });
                    } else {
                        <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : $count = 11;
                        else : $count = 9;
                        endif; ?>
                        $("#total_page_login_track_data").text(" Count ( " + total_page_login_track_data + " ) ");
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
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        // $("#filter_year").val();
        $("#filter_month").val("null");
        $("#filter_day").val("null");
        $("#filter_staff").val("null");
        $("#filter_user_role").val("null");
        $("#filter_staff").prop('selectedIndex', 0);
        get_page_log();
    }
</script>
<script>
    get_page_log();

    function get_page_log() {

        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/log_master/get_page_log";
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
                    var total_page_login_track_data = 0;
                    $("#total_page_login_track_data").text("");
                    if (data["status"] == true) {
                        var datas = "";

                        total_page_login_track_data = data["total_page_login_track_data"];
                        $("#total_page_login_track_data").text(" Count ( " + total_page_login_track_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            page_log_track_id = parseInt(data[key].page_log_track_id);
                            staff_name = data[key].staff_name;
                            user_role = data[key].user_role;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            route_ip_address = data[key].route_ip_address;
                            page_name = data[key].page_name;
                            page_log_track_path = data[key].page_log_track_path;
                            browser_name = data[key].browser_name;
                            staff_username = data[key].staff_username;
                            staff_password = data[key].staff_password;
                            log_date = data[key].log_date;
                            log_time = data[key].log_time;
                            create_date = data[key].create_date;

                            if (staff_name == "null" || staff_name == null || staff_name == undefined || staff_name == "undefined" || staff_name == "")
                                staff_name = "Unknown";
                            else
                                staff_name = staff_name;

                            if (user_role == "null" || user_role == null || user_role == undefined || user_role == "undefined" || user_role == "")
                                user_role = "";
                            else
                                user_role = user_role;

                            if (route_ip_address == "null" || route_ip_address == null || route_ip_address == undefined || route_ip_address == "undefined" || route_ip_address == "")
                                route_ip_address = "";
                            else
                                route_ip_address = route_ip_address;

                            if (page_name == "null" || page_name == null || page_name == undefined || page_name == "undefined" || page_name == "")
                                page_name = "";
                            else
                                page_name = page_name;

                            if (page_log_track_path == "null" || page_log_track_path == null || page_log_track_path == undefined || page_log_track_path == "undefined" || page_log_track_path == "")
                                page_log_track_path = "";
                            else
                                page_log_track_path = page_log_track_path;

                            if (browser_name == "null" || browser_name == null || browser_name == undefined || browser_name == "undefined" || browser_name == "")
                                browser_name = "";
                            else
                                browser_name = browser_name;

                            if (staff_username == "null" || staff_username == null || staff_username == undefined || staff_username == "undefined" || staff_username == "")
                                staff_username = "";
                            else
                                staff_username = staff_username;


                            if (staff_password == "null" || staff_password == null || staff_password == undefined || staff_password == "undefined" || staff_password == "")
                                staff_password = "";
                            else
                                staff_password = staff_password;

                            if (log_date == "null" || log_date == null || log_date == undefined || log_date == "undefined" || log_date == "")
                                log_date = "";
                            else
                                log_date = log_date;

                            if (log_time == "null" || log_time == null || log_time == undefined || log_time == "undefined" || log_time == "")
                                log_time = "";
                            else
                                log_time = log_time;

                            if (!isNaN(page_log_track_id)) {

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + staff_name + '</td><td><center>' + user_role + '</center></td><td>' + route_ip_address + '</td><td>' + page_name + '</td><td>' + page_log_track_path + '</td><td>' + browser_name + '</td><td>' + log_date + '</td><td>' + log_time + '</td><?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?><td>' + staff_username + '</td><td>' + staff_password + '</td><?php endif; ?></tr>';
                            }

                        });
                    } else {
                        <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : $count = 11;
                        else : $count = 9;
                        endif; ?>
                        $("#total_page_login_track_data").text(" Count ( " + total_page_login_track_data + " ) ");
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