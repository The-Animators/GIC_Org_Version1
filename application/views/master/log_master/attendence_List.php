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

                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                            <div class="col-md-8">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="null">Select Status</option>
                                                    <option value="1">Present</option>
                                                    <option value="2">Absent</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-3 row mt-1 ml-1">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-xs mr-1" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <h4 class="header-title"><?php echo $title; ?> <span id="total_atendence_track_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4"></div> -->
                            <div class="col-md-6 text-right">
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-4 mt-1" id="updated_button"></div>
                        </div>
                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="select_all" class="custom-control-input select_all" id="select_all">
                                                    <label class="custom-control-label" for="select_all"></label>
                                                </div>
                                            </center>
                                        </th>
                                        <th>SN.</th>
                                        <th><center>Staff</center></th>
                                        <th>Role</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Halfday / Fullday</th>
                                        <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?>
                                            <th>Sallary</th>
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
    var selectedID = [];
    $(document).ready(function() {
        // Multiple Select Section Start	
        $("#select_all").change(function() {
            $("#updated_button").empty('');
            if (this.checked) {
                var selectedID = [];
                $(".all").each(function() {
                    this.checked = true;
                    selectedID.push(this.id);
                    // alert(selectedID);
                    // alert("multiple checked");
                    console.log("multiple checked");

                });
                $("#updated_button").append('<button id="half_day" onclick="Not_Updated(0)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Present</button><button id="half_day" onclick="Not_Updated(1)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Absent</button><button id="half_day" onclick="Not_Updated(2)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Half Day</button><button id="holiday" onclick="Not_Updated(3)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Holiday</button>');
            } else {
                $(".all").each(function() {
                    this.checked = false;
                    selectedID = [];
                    // alert("multiple unchecked");
                    console.log("multiple unchecked");
                    $("#updated_button").empty('');
                })
            }
        });
        // Multiple Select Section End

        // Single Select Section Start
        $(".all").click(function() {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                // alert("single checked 1");
                console.log("single checked 1");
                $(".all").each(function() {
                    if (!this.checked)
                        isAllChecked = 1;
                    // alert("single checked 2");
                    console.log("single checked 2");

                });
                $("#updated_button").empty('');
                $("#updated_button").append('<button id="half_day" onclick="Not_Updated(0)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Present</button><button id="half_day" onclick="Not_Updated(1)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Absent</button><button id="half_day" onclick="Not_Updated(2)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Half Day</button><button id="holiday" onclick="Not_Updated(3)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Holiday</button>');
                if (isAllChecked == 0) {
                    // alert("single checked 3");
                    console.log("single checked 3");
                    $("#select_all").prop("checked", true);
                }
            } else {
                // alert("single checked 4");
                console.log("single checked 4");
                $("#updated_button").empty('');
                var selectedID = [];
                $(':checkbox[name="log_track_ids[]"]:checked').each(function() {
                    selectedID.push(this.id);
                    // alert(selectedID);
                })
                //~ alert(selectedID);
                if (selectedID == "") {
                    $("#updated_button").empty('');
                }
                // alert("single un-checked");	
                console.log("single un-checked");
                $("#select_all").prop("checked", false);

                $(".all").each(function() {
                    if ($(this).is(":checked")) {
                        console.log("single checked 5");
                        $("#updated_button").empty('');
                        $("#updated_button").append('<button id="half_day" onclick="Not_Updated(0)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Present</button><button id="half_day" onclick="Not_Updated(1)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Absent</button><button id="half_day" onclick="Not_Updated(2)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Half Day</button><button id="holiday" onclick="Not_Updated(3)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Holiday</button>');
                        // alert("single checked 5");

                    }
                })
            }
        });
        //Single Select Section End
    });

    function Not_Updated(holiday_half_day_status) {
        // alert(holiday_half_day_status);
        // return false;
        //off_day 1:Absent, 2:Present
        selectedID = [];
        var renewal_dum_ids = $(':checkbox[name="log_track_ids[]"]:checked').each(function() {
            selectedID.push(this.id);
        });
        if (holiday_half_day_status == 0 || holiday_half_day_status == 1)
            var url = "<?php echo $base_url; ?>master/log_master/update_present_absent";
        else if (holiday_half_day_status == 2 || holiday_half_day_status == 3)
            var url = "<?php echo $base_url; ?>master/log_master/update_attendence_holiday";
        if (selectedID != "") {
            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        "log_track_id_arr": selectedID,
                        "halfday_fullday": holiday_half_day_status, //0:Off 1:Full Day, 2:Half Day, 3:Holiday
                        "off_day": holiday_half_day_status,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {
                        if (holiday_half_day_status == 3) {
                            $("#half_day").text("");
                            $("#half_day").text("Half Day").attr("disabled", false);
                        } else if (holiday_half_day_status == 4) {
                            $("#holiday").text("");
                            $("#holiday").text("Holiday").attr("disabled", false);
                        }
                    },
                    success: function(data) {
                        if (data["status"] == true) {
                            toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        } else {
                            toaster(message_type = "Error", message_txt = data["message"], message_icone = "error");
                        }
                        if (holiday_half_day_status == 3) {
                            $("#half_day").text("");
                            $("#half_day").text("Half Day").attr("disabled", false);
                        } else if (holiday_half_day_status == 4) {
                            $("#holiday").text("");
                            $("#holiday").text("Holiday").attr("disabled", false);
                        }

                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    }

                });
            }
        }
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_year = $("#filter_year").val();
        var filter_month = $("#filter_month").val();
        var filter_day = $("#filter_day").val();
        var filter_staff = $("#filter_staff").val();
        var filter_user_role = $("#filter_user_role").val();
        var filter_status = $("#filter_status").val();

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
        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>master/log_master/filter_atendence_track";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_day: filter_day,
                    filter_staff: filter_staff,
                    filter_user_role: filter_user_role,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var datas = "";
                    var total_atendence_track_data = 0;
                    var total_every_day_sallary = 0;
                    $("#total_atendence_track_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {

                        total_atendence_track_data = data["total_atendence_track_data"];
                        $("#total_atendence_track_data").text(" Count ( " + total_atendence_track_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            log_track_id = parseInt(data[key].log_track_id);
                            log_type = data[key].log_type;
                            log_action_details = data[key].log_action_details;
                            staff = data[key].staff_name;
                            staff_sallary = data[key].staff_sallary;
                            user_role = data[key].user_role_title;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            ip_address = data[key].ip_address;
                            pc_ip_address = data[key].pc_ip_address;
                            message = data[key].message;
                            type = data[key].type;
                            user_name = data[key].user_name;
                            password = data[key].password;
                            log_date = data[key].log_date;
                            log_time = data[key].log_time;
                            // log_time2 = dateFormat(new Date(), "dddd, mmmm dS, yyyy, h:MM:ss TT");
                            // log_time2 = log_time.toLocaleTimeString().toLowerCase();
                            log_time2 = data[key].log_time2;
                            halfday_fullday = data[key].halfday_fullday;
                            create_date = data[key].create_date;
                            off_day = data[key].off_day;

                            if (staff == "null" || staff == null || staff == undefined || staff == "undefined" || staff == "")
                                staff = "Unknown";
                            else
                                staff = staff;

                            if (staff_sallary == "null" || staff_sallary == null || staff_sallary == undefined || staff_sallary == "undefined" || staff_sallary == "")
                                staff_sallary = "";
                            else
                                staff_sallary = staff_sallary;

                            if (user_role == "null" || user_role == null || user_role == undefined || user_role == "undefined" || user_role == "")
                                user_role = "";
                            else
                                user_role = user_role;

                            if (ip_address == "null" || ip_address == null || ip_address == undefined || ip_address == "undefined" || ip_address == "")
                                ip_address = "";
                            else
                                ip_address = ip_address;

                            if (pc_ip_address == "null" || pc_ip_address == null || pc_ip_address == undefined || pc_ip_address == "undefined" || pc_ip_address == "")
                                pc_ip_address = "";
                            else
                                pc_ip_address = pc_ip_address;

                            if (message == "null" || message == null || message == undefined || message == "undefined" || message == "")
                                message = "";
                            else
                                message = message;

                            if (user_name == "null" || user_name == null || user_name == undefined || user_name == "undefined" || user_name == "")
                                user_name = "";
                            else
                                user_name = user_name;

                            if (password == "null" || password == null || password == undefined || password == "undefined" || password == "")
                                password = "";
                            else
                                password = password;

                            if (log_date == "null" || log_date == null || log_date == undefined || log_date == "undefined" || log_date == "")
                                log_date = "";
                            else
                                log_date = log_date;

                            if (log_time == "null" || log_time == null || log_time == undefined || log_time == "undefined" || log_time == "")
                                log_time = "";
                            else
                                log_time = log_time;

                            if (log_time2 == "null" || log_time2 == null || log_time2 == undefined || log_time2 == "undefined" || log_time2 == "")
                                log_time2 = "";
                            else
                                log_time2 = log_time2;

                            if (halfday_fullday == "null" || halfday_fullday == null || halfday_fullday == undefined || halfday_fullday == "undefined" || halfday_fullday == "")
                                halfday_fullday = "";
                            else
                                halfday_fullday = halfday_fullday;

                            if (off_day == "null" || off_day == null || off_day == undefined || off_day == "undefined" || off_day == "")
                                off_day = "";
                            else
                                off_day = off_day;

                            // alert(halfday_fullday);
                            var days_in_current_month = get_day_In_Month();
                            if (!isNaN(log_track_id)) {
                                var half_day_status = "";

                                if (halfday_fullday == 0)
                                    var half_day_status = '<span class="badge badge-danger pl-2">Off</span>';
                                else if (halfday_fullday == 1) //0:Off 1:Full Day, 2:Half Day, 3:Holiday
                                    var half_day_status = '<span class="badge badge-success pl-2">Full Day</span>';
                                else if (halfday_fullday == 2)
                                    var half_day_status = '<span class="badge badge-warning pl-2">Half Day</span>';
                                else if (halfday_fullday == 3)
                                    var half_day_status = '<span class="badge badge-info pl-2">Holiday</span>';

                                if (type == "null" || type == null || type == undefined || type == "undefined" || type == "") {
                                    var local_global_type = "";
                                } else {
                                    if (type == 1) {
                                        var local_global_type = '<span class="badge badge-danger pl-2"> Global</span>';
                                    } else if (type == 2) {
                                        var local_global_type = '<span class="badge badge-success pl-2"> Local</span>';
                                    }
                                }

                                if (log_type == 0) {
                                    var log_action_details_type = '<span class="badge badge-warning pl-2">' + log_action_details + '</span>';
                                } else if (log_type == 1) {
                                    var log_action_details_type = '<span class="badge badge-success pl-2">' + log_action_details + '</span>';
                                } else if (log_type == 2) {
                                    var log_action_details_type = '<span class="badge badge-danger pl-2">' + log_action_details + '</span>';
                                }

                                var timecomp = "02:00:00";
                                // alert(log_time2+"log_time2");
                                // alert(timecomp+"timecomp");

                                // if (log_time2 > timecomp) {
                                //     if(log_time2 == "12:00:00")
                                //         var half_day_status = '<span class="badge badge-success pl-2">Full Day</span>';
                                //     else
                                //         var half_day_status = '<span class="badge badge-warning pl-2">Half Day</span>';
                                // } else if (log_time2 < timecomp) {
                                //     var half_day_status = '<span class="badge badge-success pl-2">Full Day</span>';
                                // }

                                // if (log_time2 > timecomp) {
                                //     if(log_time2 == "12:00:00")
                                //         var status = '<span class="badge badge-success pl-2">Present</span>';
                                //     else
                                //         var status = '<span class="badge badge-success pl-2">Present</span>';
                                // } else if (log_time2 < timecomp) {
                                //     var status = '<span class="badge badge-success pl-2">Present</span>';
                                // }else{
                                //     var status = '<span class="badge badge-danger pl-2">Absent</span>';
                                // }

                                // if (off_day == 1) { //off_day 1:Absent, 2:Present
                                //     var status = '<span class="badge badge-danger pl-2">Absent</span>';
                                // } else if (off_day == 2) {
                                //     var status = '<span class="badge badge-success pl-2">Present</span>';
                                // }

                                staff_sallary = parseInt(staff_sallary);
                                days_in_current_month = parseInt(days_in_current_month);
                                if (isNaN(staff_sallary))
                                    staff_sallary = 0;
                                else
                                    staff_sallary = staff_sallary;
                                if (isNaN(days_in_current_month))
                                    days_in_current_month = 0;
                                else
                                    days_in_current_month = days_in_current_month;

                                if (off_day == 1) {
                                    every_day_sallary = 0;
                                    var status = '<span class="badge badge-danger pl-2">Absent</span>';
                                } else if (off_day == 2) {
                                    // every_day_sallary = Math.round(staff_sallary / days_in_current_month);
                                    every_day_sallary = (staff_sallary / days_in_current_month).toFixed(2);
                                    var status = '<span class="badge badge-success pl-2">Present</span>';
                                }



                                if (total_every_day_sallary == 0) {
                                    total_every_day_sallary = every_day_sallary;
                                } else {
                                    // total_every_day_sallary = total_every_day_sallary + every_day_sallary;
                                    total_every_day_sallary = (every_day_sallary * days_in_current_month).toFixed(2);
                                }

                                check_box = "<div class='custom-control custom-checkbox'><input type='checkbox' name='log_track_ids[]' class='custom-control-input all' id='" + log_track_id + "' value='" + log_track_id + "'><label class='custom-control-label' for='" + log_track_id + "'></label></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + check_box + '</td><td>' + sn + '</td><td><center>' + staff + '</center></td><td>' + user_role + '</td><td>' + log_date + '</td><td>' + log_time + '</td><td>' + status + '</td><td>' + half_day_status + '</td><?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?><td class="every_day_sallary">' + every_day_sallary + '</td><?php endif; ?></tr>';
                            }


                        });
                        <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?>
                            datas += '<tr><td colspan="8" class="text-right"></td><td><input type="text" name="total_every_day_sallary" id="total_every_day_sallary" value="" class="form-control" disabled>Total Sallary :</td></tr>';
                        <?php endif; ?>

                    } else {
                        $("#total_atendence_track_data").text(" Count ( " + total_atendence_track_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="7"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                    $("#total_every_day_sallary").val(total_every_day_sallary);
                    Tot_every_day_sallary();

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
            $(document).ready(function() {
                // Multiple Select Section Start	
                $("#select_all").change(function() {
                    $("#updated_button").empty('');
                    if (this.checked) {
                        var selectedID = [];
                        $(".all").each(function() {
                            this.checked = true;
                            selectedID.push(this.id);
                            // alert(selectedID);
                            // alert("multiple checked");
                            console.log("multiple checked");

                        });
                        $("#updated_button").append('<button id="half_day" onclick="Not_Updated(0)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Present</button><button id="half_day" onclick="Not_Updated(1)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Absent</button><button id="half_day" onclick="Not_Updated(2)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Half Day</button><button id="holiday" onclick="Not_Updated(3)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Holiday</button>');
                    } else {
                        $(".all").each(function() {
                            this.checked = false;
                            selectedID = [];
                            // alert("multiple unchecked");
                            console.log("multiple unchecked");
                            $("#updated_button").empty('');
                        })
                    }
                });
                // Multiple Select Section End

                // Single Select Section Start
                $(".all").click(function() {
                    if ($(this).is(":checked")) {
                        var isAllChecked = 0;
                        // alert("single checked 1");
                        console.log("single checked 1");
                        $(".all").each(function() {
                            if (!this.checked)
                                isAllChecked = 1;
                            // alert("single checked 2");
                            console.log("single checked 2");

                        });
                        $("#updated_button").empty('');
                        $("#updated_button").append('<button id="half_day" onclick="Not_Updated(0)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Present</button><button id="half_day" onclick="Not_Updated(1)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Absent</button><button id="half_day" onclick="Not_Updated(2)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Half Day</button><button id="holiday" onclick="Not_Updated(3)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Holiday</button>');
                        if (isAllChecked == 0) {
                            // alert("single checked 3");
                            console.log("single checked 3");
                            $("#select_all").prop("checked", true);
                        }
                    } else {
                        // alert("single checked 4");
                        console.log("single checked 4");
                        $("#updated_button").empty('');
                        var selectedID = [];
                        $(':checkbox[name="log_track_ids[]"]:checked').each(function() {
                            selectedID.push(this.id);
                            // alert(selectedID);
                        })
                        //~ alert(selectedID);
                        if (selectedID == "") {
                            $("#updated_button").empty('');
                        }
                        // alert("single un-checked");	
                        console.log("single un-checked");
                        $("#select_all").prop("checked", false);

                        $(".all").each(function() {
                            if ($(this).is(":checked")) {
                                console.log("single checked 5");
                                $("#updated_button").empty('');
                                $("#updated_button").append('<button id="half_day" onclick="Not_Updated(0)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Present</button><button id="half_day" onclick="Not_Updated(1)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Absent</button><button id="half_day" onclick="Not_Updated(2)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Half Day</button><button id="holiday" onclick="Not_Updated(3)" class="btn btn-primary btn-xs mb-1 ml-1 holiday_half_day_status">Holiday</button>');
                                // alert("single checked 5");

                            }
                        })
                    }
                });
                //Single Select Section End
            });
        }
    }

    function Tot_every_day_sallary() {
        var inputs = $(".every_day_sallary");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var every_day_sallary = $(inputs[i]).text();
            total = total + parseInt(every_day_sallary);
            if (isNaN(total))
                total = 0;
            else
                total = total;
            $("#total_every_day_sallary").val(total);
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
        $("#filter_status").val("null");
        $("#filter_staff").prop('selectedIndex', 0);
        $("#filter_user_role").prop('selectedIndex', 0);
        get_attendence_List();
    }
</script>
<script>
    get_attendence_List();

    function get_attendence_List() {

        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/log_master/get_attendence_List";
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
                    var total_atendence_track_data = 0;
                    var total_every_day_sallary = 0;
                    $("#total_atendence_track_data").text("");
                    if (data["status"] == true) {
                        var datas = "";

                        total_atendence_track_data = data["total_atendence_track_data"];
                        $("#total_atendence_track_data").text(" Count ( " + total_atendence_track_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            log_track_id = parseInt(data[key].log_track_id);
                            log_type = data[key].log_type;
                            log_action_details = data[key].log_action_details;
                            staff = data[key].staff_name;
                            staff_sallary = data[key].staff_sallary;
                            user_role = data[key].user_role_title;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            ip_address = data[key].ip_address;
                            pc_ip_address = data[key].pc_ip_address;
                            message = data[key].message;
                            type = data[key].type;
                            user_name = data[key].user_name;
                            password = data[key].password;
                            log_date = data[key].log_date;
                            log_time = data[key].log_time;
                            // log_time2 = dateFormat(new Date(), "dddd, mmmm dS, yyyy, h:MM:ss TT");
                            // log_time2 = log_time.toLocaleTimeString().toLowerCase();
                            log_time2 = data[key].log_time2;
                            halfday_fullday = data[key].halfday_fullday;
                            create_date = data[key].create_date;
                            off_day = data[key].off_day;
                            // alert(staff_sallary);
                            // off_day

                            if (staff == "null" || staff == null || staff == undefined || staff == "undefined" || staff == "")
                                staff = "Unknown";
                            else
                                staff = staff;

                            if (staff_sallary == "null" || staff_sallary == null || staff_sallary == undefined || staff_sallary == "undefined" || staff_sallary == "")
                                staff_sallary = "";
                            else
                                staff_sallary = staff_sallary;

                            if (user_role == "null" || user_role == null || user_role == undefined || user_role == "undefined" || user_role == "")
                                user_role = "";
                            else
                                user_role = user_role;

                            if (ip_address == "null" || ip_address == null || ip_address == undefined || ip_address == "undefined" || ip_address == "")
                                ip_address = "";
                            else
                                ip_address = ip_address;

                            if (pc_ip_address == "null" || pc_ip_address == null || pc_ip_address == undefined || pc_ip_address == "undefined" || pc_ip_address == "")
                                pc_ip_address = "";
                            else
                                pc_ip_address = pc_ip_address;

                            if (message == "null" || message == null || message == undefined || message == "undefined" || message == "")
                                message = "";
                            else
                                message = message;

                            if (user_name == "null" || user_name == null || user_name == undefined || user_name == "undefined" || user_name == "")
                                user_name = "";
                            else
                                user_name = user_name;

                            if (password == "null" || password == null || password == undefined || password == "undefined" || password == "")
                                password = "";
                            else
                                password = password;

                            if (log_date == "null" || log_date == null || log_date == undefined || log_date == "undefined" || log_date == "")
                                log_date = "";
                            else
                                log_date = log_date;

                            if (log_time == "null" || log_time == null || log_time == undefined || log_time == "undefined" || log_time == "")
                                log_time = "";
                            else
                                log_time = log_time;

                            if (log_time2 == "null" || log_time2 == null || log_time2 == undefined || log_time2 == "undefined" || log_time2 == "")
                                log_time2 = "";
                            else
                                log_time2 = log_time2;

                            if (halfday_fullday == "null" || halfday_fullday == null || halfday_fullday == undefined || halfday_fullday == "undefined" || halfday_fullday == "")
                                halfday_fullday = "";
                            else
                                halfday_fullday = halfday_fullday;

                            if (off_day == "null" || off_day == null || off_day == undefined || off_day == "undefined" || off_day == "")
                                off_day = "";
                            else
                                off_day = off_day;

                            // alert(halfday_fullday);off_day
                            var days_in_current_month = get_day_In_Month();

                            if (!isNaN(log_track_id)) {
                                var half_day_status = "";
                                if (halfday_fullday == 0)
                                    var half_day_status = '<span class="badge badge-danger pl-2">Off</span>';
                                else if (halfday_fullday == 1) //0:Off 1:Full Day, 2:Half Day, 3:Holiday
                                    var half_day_status = '<span class="badge badge-success pl-2">Full Day</span>';
                                else if (halfday_fullday == 2)
                                    var half_day_status = '<span class="badge badge-warning pl-2">Half Day</span>';
                                else if (halfday_fullday == 3)
                                    var half_day_status = '<span class="badge badge-info pl-2">Holiday</span>';

                                if (type == "null" || type == null || type == undefined || type == "undefined" || type == "") {
                                    var local_global_type = "";
                                } else {
                                    if (type == 1) {
                                        var local_global_type = '<span class="badge badge-danger pl-2"> Global</span>';
                                    } else if (type == 2) {
                                        var local_global_type = '<span class="badge badge-success pl-2"> Local</span>';
                                    }
                                }

                                if (log_type == 0) {
                                    var log_action_details_type = '<span class="badge badge-warning pl-2">' + log_action_details + '</span>';
                                } else if (log_type == 1) {
                                    var log_action_details_type = '<span class="badge badge-success pl-2">' + log_action_details + '</span>';
                                } else if (log_type == 2) {
                                    var log_action_details_type = '<span class="badge badge-danger pl-2">' + log_action_details + '</span>';
                                }

                                var timecomp = "02:00:00";
                                // alert(log_time2+"log_time2");
                                // alert(timecomp+"timecomp");

                                // if (log_time2 > timecomp) {
                                //     if(log_time2 == "12:00:00")
                                //         var half_day_status = '<span class="badge badge-success pl-2">Full Day</span>';
                                //     else
                                //         var half_day_status = '<span class="badge badge-warning pl-2">Half Day</span>';
                                // } else if (log_time2 < timecomp) {
                                //     var half_day_status = '<span class="badge badge-success pl-2">Full Day</span>';
                                // }

                                // if (log_time2 > timecomp) {
                                //     if(log_time2 == "12:00:00")
                                //         var status = '<span class="badge badge-success pl-2">Present</span>';
                                //     else
                                //         var status = '<span class="badge badge-success pl-2">Present</span>';
                                // } else if (log_time2 < timecomp) {
                                //     var status = '<span class="badge badge-success pl-2">Present</span>';
                                // }else{
                                //     var status = '<span class="badge badge-danger pl-2">Absent</span>';
                                // }
                                // alert(staff_sallary);
                                staff_sallary = parseInt(staff_sallary);
                                days_in_current_month = parseInt(days_in_current_month);
                                if (isNaN(staff_sallary))
                                    staff_sallary = 0;
                                else
                                    staff_sallary = staff_sallary;
                                if (isNaN(days_in_current_month))
                                    days_in_current_month = 0;
                                else
                                    days_in_current_month = days_in_current_month;
                                if (off_day == 1) {
                                    every_day_sallary = 0;
                                    var status = '<span class="badge badge-danger pl-2">Absent</span>';
                                } else if (off_day == 2) {
                                    // every_day_sallary = Math.round(staff_sallary / days_in_current_month);
                                    every_day_sallary = (staff_sallary / days_in_current_month).toFixed(2);
                                    // alert(every_day_sallary);
                                    // alert(staff_sallary);
                                    // alert(days_in_current_month);
                                    var status = '<span class="badge badge-success pl-2">Present</span>';
                                }



                                if (total_every_day_sallary == 0) {
                                    total_every_day_sallary = every_day_sallary;
                                } else {
                                    // total_every_day_sallary = total_every_day_sallary + every_day_sallary;
                                    total_every_day_sallary = (every_day_sallary * days_in_current_month).toFixed(2);
                                }

                                check_box = "<div class='custom-control custom-checkbox'><input type='checkbox' name='log_track_ids[]' class='custom-control-input all' id='" + log_track_id + "' value='" + log_track_id + "'><label class='custom-control-label' for='" + log_track_id + "'></label></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + check_box + '</td><td>' + sn + '</td><td><center>' + staff + '</center></td><td>' + user_role + '</td><td>' + log_date + '</td><td>' + log_time + '</td><td>' + status + '</td><td>' + half_day_status + '</td><?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?><td class="every_day_sallary">' + every_day_sallary + '</td><?php endif; ?></tr>';
                            }


                        });
                        <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?>
                            datas += '<tr><td colspan="8" class="text-right"></td><td><input type="text" name="total_every_day_sallary" id="total_every_day_sallary" value="" class="form-control" disabled>Total Sallary :</td></tr>';
                        <?php endif; ?>
                    } else {
                        $("#total_atendence_track_data").text(" Count ( " + total_atendence_track_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="7"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                    $("#total_every_day_sallary").val(total_every_day_sallary);
                    Tot_every_day_sallary();
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function get_day_In_Month() {
        // instantiate a date object
        var dt = new Date();

        // dt.getMonth() will return a month between 0 - 11
        // we add one to get to the last day of the month 
        // so that when getDate() is called it will return the last day of the month
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();

        // this line does the magic (in collab with the lines above)
        var daysInMonth = new Date(year, month, 0).getDate();
        return daysInMonth;
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